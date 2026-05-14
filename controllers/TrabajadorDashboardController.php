<?php
/**
 * ============================================================
 * ARCHIVO: controllers/TrabajadorDashboardController.php
 * PROPÓSITO: Obtiene todos los datos del dashboard del trabajador
 * ============================================================
 *
 * Solo contiene la clase — sin session_start() ni require database.
 * Eso lo hace views/trabajador/dashboard.php antes de incluirlo.
 *
 * Uso desde la vista:
 *   require_once __DIR__ . '/../../controllers/TrabajadorDashboardController.php';
 *   $controller = new TrabajadorDashboardController($db, $id_trabajador);
 *   $datos = $controller->obtenerDatos();
 *
 * Todas las consultas están filtradas por $id_trabajador para que
 * cada trabajador solo vea sus propios datos.
 *
 * Tablas consultadas:
 *   tarea_trabajador → tareas asignadas al trabajador
 *   tarea            → datos de la tarea (nombre, lote, fecha fin)
 *   lote             → nombre del lote de la tarea
 *   prestamo         → préstamos de herramientas activos
 *   trabajador       → estado actual del trabajador
 *   usuario          → nombres y apellidos
 *   asistencia       → registro de entrada/salida del día
 *   notificacion_operativa → notificaciones del trabajador
 * ============================================================
 */
class TrabajadorDashboardController {

    private $db;
    private $id; // ID del trabajador logueado ($_SESSION['id_usuario'])

    public function __construct($db, $id_trabajador) {
        $this->db = $db;
        $this->id = (int) $id_trabajador;
    }

    /**
     * Retorna array con todos los datos necesarios para el dashboard.
     */
    public function obtenerDatos() {
        return [
            // Datos del trabajador (nombre, estado, asistencia hoy)
            'trabajador'         => $this->obtenerTrabajador(),

            // Tarjeta 1: tareas asignadas con estado PENDIENTE
            'tareas_pendientes'  => $this->contarTareas('PENDIENTE'),

            // Tarjeta 2: tareas asignadas con estado EN_PROGRESO
            'tareas_en_proceso'  => $this->contarTareas('EN_PROGRESO'),

            // Tarjeta 3: préstamos de herramientas activos (no devueltos)
            'herramientas_prestadas' => $this->contarHerramientas(),

            // Lista de tareas recientes (últimas 5)
            'tareas_recientes'   => $this->obtenerTareasRecientes(),

            // Notificaciones del trabajador (últimas 5)
            'notificaciones'     => $this->obtenerNotificaciones(),
        ];
    }

    /**
     * Obtiene los datos del trabajador logueado:
     * nombre completo, estado actual y asistencia de hoy.
     * Usado para el hero banner y el topbar.
     */
    private function obtenerTrabajador() {
        try {
            $sql  = "SELECT u.nombres, u.apellidos, t.estado_trabajador,
                            a.hora_entrada, a.hora_salida
                     FROM trabajador t
                     INNER JOIN usuario u ON u.id_usuario = t.id_trabajador
                     LEFT JOIN asistencia a
                         ON a.id_trabajador = t.id_trabajador
                         AND a.fecha = CURDATE()
                     WHERE t.id_trabajador = :id
                     LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
        } catch (Exception $e) { return []; }
    }

    /**
     * Cuenta las tareas del trabajador filtradas por estado.
     * @param string $estado 'PENDIENTE' | 'EN_PROGRESO' | 'COMPLETADA'
     */
    private function contarTareas($estado) {
        try {
            $sql  = "SELECT COUNT(*)
                     FROM tarea_trabajador tt
                     INNER JOIN tarea t ON t.id_tarea = tt.id_tarea
                     WHERE tt.id_trabajador = :id
                       AND t.estado_tarea = :estado";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id',     $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':estado', $estado);
            $stmt->execute();
            return (int) $stmt->fetchColumn();
        } catch (Exception $e) { return 0; }
    }

    /**
     * Cuenta las herramientas prestadas activas del trabajador.
     * Un préstamo está activo cuando estado_prestamo = 'APROBADO'
     * y aún no ha sido devuelto completamente.
     */
    private function contarHerramientas() {
        try {
            $sql  = "SELECT COALESCE(SUM(dp.cantidad - dp.cantidad_devuelta), 0)
                     FROM prestamo p
                     INNER JOIN detalle_prestamo dp ON dp.id_prestamo = p.id_prestamo
                     WHERE p.id_trabajador = :id
                       AND p.estado_prestamo = 'APROBADO'
                       AND dp.cantidad_devuelta < dp.cantidad";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            return (int) $stmt->fetchColumn();
        } catch (Exception $e) { return 0; }
    }

    /**
     * Obtiene las últimas 5 tareas asignadas al trabajador.
     * Incluye nombre de la tarea, lote, fecha fin estimada y estado.
     * Ordenadas por fecha_fin_estimada ASC (las más urgentes primero).
     */
    private function obtenerTareasRecientes() {
        try {
            $sql  = "SELECT t.id_tarea, t.nombre, t.estado_tarea,
                            t.fecha_fin_estimada, l.nombre AS lote_nombre
                     FROM tarea_trabajador tt
                     INNER JOIN tarea t ON t.id_tarea = tt.id_tarea
                     LEFT JOIN lote l ON l.id_lote = t.id_lote
                     WHERE tt.id_trabajador = :id
                     ORDER BY t.fecha_fin_estimada ASC
                     LIMIT 5";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) { return []; }
    }

    /**
     * Obtiene las últimas 5 notificaciones del trabajador.
     * Filtra por id_usuario_destino = $this->id.
     */
    private function obtenerNotificaciones() {
        try {
            $sql  = "SELECT id_notificacion, tipo, mensaje, link, fecha_hora, leida
                     FROM notificacion_operativa
                     WHERE id_usuario_destino = :id
                     ORDER BY fecha_hora DESC
                     LIMIT 5";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) { return []; }
    }
}
?>
