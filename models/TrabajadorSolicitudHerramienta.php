<?php
/**
 * ============================================================
 * ARCHIVO: models/TrabajadorSolicitudHerramienta.php
 * PROPÓSITO: Operaciones de BD para el módulo Solicitar Herramienta
 * ============================================================
 * Tablas: prestamo, detalle_prestamo, herramienta, usuario
 * ============================================================
 */
class TrabajadorSolicitudHerramienta {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lista las herramientas disponibles para el select.
     * Solo muestra las que tienen estado DISPONIBLE.
     */
    public function listarHerramientas(): array {
        $stmt = $this->conn->query(
            "SELECT id_herramienta, nombre, cantidad_total
             FROM herramienta
             WHERE estado = 'DISPONIBLE'
             ORDER BY nombre"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene el mayordomo al que se enviará la solicitud.
     * Prioridad:
     *   1. Mayordomo de la tarea activa más reciente del trabajador
     *   2. Si no tiene tareas, cualquier mayordomo activo del sistema
     * Siempre retorna un ID válido si existe al menos un mayordomo.
     */
    public function obtenerMayordomo(int $id_trabajador): ?int {
        // 1. Mayordomo de tarea activa del trabajador
        $stmt = $this->conn->prepare(
            "SELECT ta.id_mayordomo
             FROM tarea_trabajador tt
             INNER JOIN tarea ta ON ta.id_tarea = tt.id_tarea
             WHERE tt.id_trabajador = :id
               AND ta.estado_tarea IN ('PENDIENTE', 'EN_PROGRESO')
             ORDER BY ta.fecha_inicio DESC
             LIMIT 1"
        );
        $stmt->bindParam(':id', $id_trabajador, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) return (int) $row['id_mayordomo'];

        // 2. Cualquier mayordomo activo del sistema
        $stmt2 = $this->conn->query(
            "SELECT id_usuario FROM usuario
             WHERE rol = 'MAYORDOMO' AND activo = 1
             ORDER BY id_usuario ASC
             LIMIT 1"
        );
        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        return $row2 ? (int) $row2['id_usuario'] : null;
    }

    /**
     * Registra la solicitud de préstamo:
     * 1. Inserta en prestamo (estado PENDIENTE)
     * 2. Inserta en detalle_prestamo (herramienta + cantidad)
     * Usa transacción para garantizar consistencia.
     */
    public function solicitar(
        int    $id_trabajador,
        int    $id_mayordomo,
        int    $id_herramienta,
        int    $cantidad,
        ?string $observacion
    ): bool {
        $this->conn->beginTransaction();
        try {
            // Insertar préstamo
            $stmt = $this->conn->prepare(
                "INSERT INTO prestamo
                   (id_trabajador, id_mayordomo, fecha_solicitud,
                    estado_prestamo, observacion)
                 VALUES
                   (:trabajador, :mayordomo, CURDATE(),
                    'PENDIENTE', :obs)"
            );
            $stmt->bindParam(':trabajador', $id_trabajador, PDO::PARAM_INT);
            $stmt->bindParam(':mayordomo',  $id_mayordomo,  PDO::PARAM_INT);
            $stmt->bindParam(':obs',        $observacion,   PDO::PARAM_STR);
            $stmt->execute();

            $id_prestamo = (int) $this->conn->lastInsertId();

            // Insertar detalle
            $det = $this->conn->prepare(
                "INSERT INTO detalle_prestamo (id_prestamo, id_herramienta, cantidad)
                 VALUES (:prestamo, :herramienta, :cantidad)"
            );
            $det->bindParam(':prestamo',    $id_prestamo,    PDO::PARAM_INT);
            $det->bindParam(':herramienta', $id_herramienta, PDO::PARAM_INT);
            $det->bindParam(':cantidad',    $cantidad,       PDO::PARAM_INT);
            $det->execute();

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }
}
?>
