<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoDashboardController.php
 * PROPÓSITO: Obtiene todas las métricas del dashboard del mayordomo
 * ============================================================
 *
 * Solo contiene la clase — sin session_start() ni require database.
 * Eso lo hace views/mayordomo/dashboard.php antes de incluirlo.
 *
 * Uso desde la vista:
 *   require_once __DIR__ . '/../../controllers/MayordomoDashboardController.php';
 *   $controller = new MayordomoDashboardController($db, $id_mayordomo);
 *   $datos = $controller->obtenerDatos();
 *
 * Todas las consultas están filtradas por $id_mayordomo para que
 * cada mayordomo solo vea sus propios datos operativos.
 *
 * Tablas consultadas:
 *   trabajador, asistencia, solicitud_registro,
 *   tarea, prestamo, produccion, notificacion_operativa
 * ============================================================
 */
class MayordomoDashboardController {

    private $db;
    private $id; // ID del mayordomo logueado

    public function __construct($db, $id_mayordomo) {
        $this->db  = $db;
        $this->id  = (int) $id_mayordomo;
    }

    /**
     * Retorna array con todas las métricas y datos del dashboard.
     */
    public function obtenerDatos() {
        return [
            // Fila 1 de tarjetas
            'trabajadores_activos'  => $this->contar("SELECT COUNT(*) FROM trabajador WHERE estado_trabajador = 'ACTIVO'"),
            'trabajadores_en_labor' => $this->contar("SELECT COUNT(*) FROM trabajador WHERE estado_trabajador = 'En labor'"),
            'asistencia_hoy'        => $this->contarAsistenciaHoy(),

            // Fila 2 de tarjetas
            'solicitudes_pendientes'=> $this->contar("SELECT COUNT(*) FROM solicitud_registro WHERE estado = 'PENDIENTE'"),
            'tareas_pendientes'     => $this->contar("SELECT COUNT(*) FROM tarea WHERE id_mayordomo = {$this->id} AND estado_tarea = 'PENDIENTE'"),
            'tareas_en_progreso'    => $this->contar("SELECT COUNT(*) FROM tarea WHERE id_mayordomo = {$this->id} AND estado_tarea = 'EN_PROGRESO'"),

            // Fila 3 de tarjetas
            'prestamos_pendientes'  => $this->contar("SELECT COUNT(*) FROM prestamo WHERE id_mayordomo = {$this->id} AND estado_prestamo = 'PENDIENTE'"),
            'produccion_hoy'        => $this->sumar("SELECT COALESCE(SUM(p.cantidad),0) FROM produccion p INNER JOIN tarea_trabajador tt ON tt.id_trabajador = p.id_trabajador INNER JOIN tarea t ON t.id_tarea = tt.id_tarea WHERE t.id_mayordomo = {$this->id} AND p.fecha = CURDATE()"),

            // Panel notificaciones
            'notificaciones'        => $this->obtenerNotificaciones(),
        ];
    }

    /** COUNT genérico — retorna 0 si hay error */
    private function contar($sql) {
        try {
            return (int) $this->db->query($sql)->fetchColumn();
        } catch (Exception $e) { return 0; }
    }

    /** SUM genérico — retorna string formateado */
    private function sumar($sql) {
        try {
            return number_format((float) $this->db->query($sql)->fetchColumn(), 0, '.', ',');
        } catch (Exception $e) { return '0'; }
    }

    /**
     * Cuenta trabajadores con asistencia registrada hoy.
     * Usa la tabla asistencia con fecha = CURDATE().
     */
    private function contarAsistenciaHoy() {
        try {
            $sql  = "SELECT COUNT(*) FROM asistencia WHERE fecha = CURDATE()";
            return (int) $this->db->query($sql)->fetchColumn();
        } catch (Exception $e) { return 0; }
    }

    /**
     * Últimas 5 notificaciones del mayordomo logueado.
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
