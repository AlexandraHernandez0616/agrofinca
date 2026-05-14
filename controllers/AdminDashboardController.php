<?php
/**
 * ============================================================
 * ARCHIVO: controllers/AdminDashboardController.php
 * PROPÓSITO: Obtiene todos los datos que muestra el dashboard
 *            del administrador (estadísticas, alertas, notifs)
 * ============================================================
 *
 * IMPORTANTE: Este archivo solo contiene la clase.
 * NO llama session_start() ni require database.php.
 * Eso lo hace views/admin/dashboard.php antes de incluirlo.
 *
 * Cómo se usa desde dashboard.php:
 *   require_once __DIR__ . '/../../controllers/AdminDashboardController.php';
 *   $controller = new AdminDashboardController($db);
 *   $datos = $controller->obtenerDatos();
 *
 * Métodos públicos:
 *   obtenerDatos() → retorna array con todas las métricas
 *
 * Métodos privados (internos):
 *   contarFilas()         → ejecuta un COUNT(*) y retorna entero
 *   sumarCampo()          → ejecuta un SUM() y retorna string formateado
 *   obtenerAlertas()      → genera lista de alertas activas
 *   obtenerNotificaciones() → trae las últimas 5 notificaciones del usuario
 * ============================================================
 */
class AdminDashboardController {

    private $db; // Conexión PDO recibida desde dashboard.php

    /**
     * Recibe la conexión PDO activa.
     * @param PDO $db
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Retorna un array con todas las métricas del dashboard.
     * Cada clave corresponde a una tarjeta o sección de la vista.
     */
    public function obtenerDatos() {
        return [
            // Tarjeta 1: total de trabajadores en la tabla trabajador
            'trabajadores_registrados'   => $this->contarFilas("SELECT COUNT(*) FROM trabajador"),

            // Tarjeta 2: trabajadores con estado_trabajador = 'ACTIVO'
            'trabajadores_activos'       => $this->contarFilas("SELECT COUNT(*) FROM trabajador WHERE estado_trabajador = 'ACTIVO'"),

            // Tarjeta 3: solicitudes de registro aún sin aprobar
            'solicitudes_pendientes'     => $this->contarFilas("SELECT COUNT(*) FROM solicitud_registro WHERE estado = 'PENDIENTE'"),

            // Tarjeta 4: usuarios con rol MAYORDOMO activos
            'mayordomos_activos'         => $this->contarFilas("SELECT COUNT(*) FROM usuario WHERE rol = 'MAYORDOMO' AND activo = 1"),

            // Tarjeta 5: total de lotes registrados en la finca
            'lotes_registrados'          => $this->contarFilas("SELECT COUNT(*) FROM lote"),

            // Tarjeta 6: insumos cuyo stock_actual bajó del mínimo permitido
            'insumos_alerta'             => $this->contarFilas("SELECT COUNT(*) FROM insumo WHERE stock_actual <= cantidad_minima"),

            // Tarjeta 7: herramientas marcadas como en mantenimiento
            'herramientas_mantenimiento' => $this->contarFilas("SELECT COUNT(*) FROM herramienta WHERE estado = 'MANTENIMIENTO'"),

            // Tarjeta 8: suma total de kg producidos en todos los lotes
            'produccion_total'           => $this->sumarCampo("SELECT COALESCE(SUM(cantidad), 0) FROM produccion"),

            // Panel izquierdo inferior: lista de alertas activas
            'alertas'                    => $this->obtenerAlertas(),

            // Panel derecho inferior: últimas 5 notificaciones del admin
            'notificaciones'             => $this->obtenerNotificaciones(),
        ];
    }

    /**
     * Ejecuta un SELECT COUNT(*) y retorna el resultado como entero.
     * Si la consulta falla, retorna 0 para no romper la vista.
     */
    private function contarFilas($sql) {
        try {
            $stmt = $this->db->query($sql);
            return (int) $stmt->fetchColumn();
        } catch (Exception $e) {
            return 0;
        }
    }

    /**
     * Ejecuta un SELECT SUM() y retorna el resultado formateado
     * con separador de miles. Ej: 4690 → "4,690"
     */
    private function sumarCampo($sql) {
        try {
            $stmt = $this->db->query($sql);
            return number_format((float) $stmt->fetchColumn(), 0, '.', ',');
        } catch (Exception $e) {
            return '0';
        }
    }

    /**
     * Genera la lista de alertas activas del sistema.
     * Cada alerta tiene: tipo (error/warning/info), mensaje y link.
     * Solo aparece si el contador es mayor a 0.
     */
    private function obtenerAlertas() {
        $alertas = [];
        try {
            // Alerta roja: insumos por debajo del stock mínimo
            $n = (int) $this->db->query("SELECT COUNT(*) FROM insumo WHERE stock_actual <= cantidad_minima")->fetchColumn();
            if ($n > 0) {
                $alertas[] = ['tipo' => 'error', 'mensaje' => "$n insumos en stock crítico", 'link' => '#inventarios'];
            }

            // Alerta amarilla: herramientas en mantenimiento
            $n = (int) $this->db->query("SELECT COUNT(*) FROM herramienta WHERE estado = 'MANTENIMIENTO'")->fetchColumn();
            if ($n > 0) {
                $alertas[] = ['tipo' => 'warning', 'mensaje' => "$n herramientas en mantenimiento", 'link' => '#inventarios'];
            }

            // Alerta azul: solicitudes de registro sin gestionar
            $n = (int) $this->db->query("SELECT COUNT(*) FROM solicitud_registro WHERE estado = 'PENDIENTE'")->fetchColumn();
            if ($n > 0) {
                $alertas[] = ['tipo' => 'info', 'mensaje' => "$n solicitudes de registro pendientes", 'link' => '#trabajadores'];
            }
        } catch (Exception $e) {
            // Si hay error de BD, simplemente no muestra alertas
        }
        return $alertas;
    }

    /**
     * Trae las últimas 5 notificaciones dirigidas al admin logueado.
     * Usa $_SESSION['id_usuario'] para filtrar por destinatario.
     * Retorna array vacío si no hay notificaciones o hay error.
     */
    private function obtenerNotificaciones() {
        try {
            $id  = $_SESSION['id_usuario'];
            $sql = "SELECT id_notificacion, tipo, mensaje, link, fecha_hora, leida
                    FROM notificacion_operativa
                    WHERE id_usuario_destino = :id
                    ORDER BY fecha_hora DESC
                    LIMIT 5";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }
}
?>
