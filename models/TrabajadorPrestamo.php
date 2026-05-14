<?php
/**
 * ============================================================
 * ARCHIVO: models/TrabajadorPrestamo.php
 * PROPÓSITO: Consultas de BD para el módulo Mis Préstamos (trabajador)
 * ============================================================
 * Tablas: prestamo, detalle_prestamo, herramienta
 * ============================================================
 */
class TrabajadorPrestamo {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lista todos los préstamos del trabajador con el detalle
     * de cada herramienta solicitada.
     * Cada fila = una herramienta de un préstamo.
     */
    public function listar(int $id_trabajador): array {
        $stmt = $this->conn->prepare(
            "SELECT p.id_prestamo,
                    h.nombre                AS herramienta,
                    dp.cantidad,
                    p.fecha_solicitud,
                    dp.fecha_entrega_real   AS fecha_entrega,
                    p.estado_prestamo       AS estado,
                    dp.estado_devolucion,
                    dp.fecha_devolucion
             FROM prestamo p
             INNER JOIN detalle_prestamo dp ON dp.id_prestamo   = p.id_prestamo
             INNER JOIN herramienta      h  ON h.id_herramienta = dp.id_herramienta
             WHERE p.id_trabajador = :id
             ORDER BY p.fecha_solicitud DESC, p.id_prestamo DESC"
        );
        $stmt->bindParam(':id', $id_trabajador, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen rápido para las tarjetas superiores.
     */
    public function resumen(int $id_trabajador): array {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*)                                AS total,
                    SUM(estado_prestamo = 'PENDIENTE')       AS pendientes,
                    SUM(estado_prestamo = 'APROBADO')        AS aprobados,
                    SUM(estado_prestamo = 'NEGADO')          AS negados,
                    SUM(estado_prestamo = 'DEVUELTO')        AS devueltos
             FROM prestamo
             WHERE id_trabajador = :id"
        );
        $stmt->bindParam(':id', $id_trabajador, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'total'     => (int) ($row['total']     ?? 0),
            'pendientes'=> (int) ($row['pendientes'] ?? 0),
            'aprobados' => (int) ($row['aprobados']  ?? 0),
            'negados'   => (int) ($row['negados']    ?? 0),
            'devueltos' => (int) ($row['devueltos']  ?? 0),
        ];
    }
}
?>
