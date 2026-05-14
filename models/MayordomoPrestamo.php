<?php
/**
 * ============================================================
 * ARCHIVO: models/MayordomoPrestamo.php
 * PROPÓSITO: Operaciones de BD para el módulo Préstamos (mayordomo)
 * ============================================================
 * Flujo correcto:
 *   1. El TRABAJADOR solicita el préstamo (crea el registro en BD)
 *   2. El MAYORDOMO gestiona: aprueba, niega o registra devolución
 *
 * Tablas: prestamo, detalle_prestamo, trabajador, usuario, herramienta
 *
 * Columnas de prestamo:
 *   id_prestamo      INT PK AUTO_INCREMENT
 *   id_trabajador    INT FK → trabajador
 *   id_mayordomo     INT FK → usuario (rol MAYORDOMO)
 *   fecha_solicitud  DATE
 *   fecha_aprobacion DATE (nullable)
 *   estado_prestamo  VARCHAR(30) → PENDIENTE | APROBADO | NEGADO | DEVUELTO
 *   observacion      TEXT (nullable)
 *
 * Columnas de detalle_prestamo:
 *   id_detalle_prestamo INT PK AUTO_INCREMENT
 *   id_prestamo         INT FK
 *   id_herramienta      INT FK
 *   cantidad            INT
 *   cantidad_devuelta   INT DEFAULT 0
 *   fecha_entrega_real  DATE (nullable)
 *   fecha_devolucion    DATE (nullable)
 *   estado_devolucion   VARCHAR(50) (nullable)
 *   observacion         TEXT (nullable)
 *   recibido_por        INT FK → usuario (nullable)
 * ============================================================
 */
class MayordomoPrestamo {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista los préstamos gestionados por este mayordomo.
     * Muestra trabajador, herramienta(s), cantidad y estado.
     * Acepta filtros por búsqueda y estado.
     */
    public function listar(int $id_mayordomo, string $busqueda = '', string $estado = ''): array {
        $where  = ['p.id_mayordomo = :mayordomo'];
        $params = [':mayordomo' => $id_mayordomo];

        if ($busqueda !== '') {
            $where[]      = "(CONCAT(u.nombres,' ',u.apellidos) LIKE :b OR h.nombre LIKE :b)";
            $params[':b'] = '%' . $busqueda . '%';
        }
        if ($estado !== '') {
            $where[]          = "p.estado_prestamo = :estado";
            $params[':estado'] = $estado;
        }

        $sql = "SELECT p.id_prestamo,
                       CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                       u.documento,
                       GROUP_CONCAT(h.nombre ORDER BY h.nombre SEPARATOR ', ') AS herramientas,
                       SUM(dp.cantidad)                    AS cantidad_total,
                       p.fecha_solicitud,
                       p.fecha_aprobacion,
                       p.estado_prestamo,
                       p.observacion
                FROM prestamo p
                INNER JOIN trabajador tr ON tr.id_trabajador = p.id_trabajador
                INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                LEFT  JOIN detalle_prestamo dp ON dp.id_prestamo  = p.id_prestamo
                LEFT  JOIN herramienta      h  ON h.id_herramienta = dp.id_herramienta
                WHERE " . implode(' AND ', $where) . "
                GROUP BY p.id_prestamo
                ORDER BY p.fecha_solicitud DESC, p.id_prestamo DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene el detalle completo de un préstamo (herramientas individuales).
     */
    public function detalle(int $id_prestamo): array {
        $stmt = $this->conn->prepare(
            "SELECT dp.id_detalle_prestamo,
                    h.nombre AS herramienta,
                    dp.cantidad,
                    dp.cantidad_devuelta,
                    dp.fecha_entrega_real,
                    dp.fecha_devolucion,
                    dp.estado_devolucion,
                    dp.observacion
             FROM detalle_prestamo dp
             INNER JOIN herramienta h ON h.id_herramienta = dp.id_herramienta
             WHERE dp.id_prestamo = :id
             ORDER BY h.nombre"
        );
        $stmt->bindParam(':id', $id_prestamo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen de préstamos del mayordomo para las tarjetas superiores.
     */
    public function resumen(int $id_mayordomo): array {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*)                                  AS total,
                    SUM(estado_prestamo = 'PENDIENTE')         AS pendientes,
                    SUM(estado_prestamo = 'APROBADO')          AS aprobados,
                    SUM(estado_prestamo = 'DEVUELTO')          AS devueltos
             FROM prestamo
             WHERE id_mayordomo = :id"
        );
        $stmt->bindParam(':id', $id_mayordomo, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'total'      => (int) ($row['total']      ?? 0),
            'pendientes' => (int) ($row['pendientes'] ?? 0),
            'aprobados'  => (int) ($row['aprobados']  ?? 0),
            'devueltos'  => (int) ($row['devueltos']  ?? 0),
        ];
    }

    /**
     * Lista los trabajadores activos para el select del formulario.
     * Mantenido por compatibilidad — no se usa en la vista del mayordomo
     * (los préstamos los crean los trabajadores, no el mayordomo).
     */
    public function listarTrabajadores(): array {
        $stmt = $this->conn->query(
            "SELECT tr.id_trabajador,
                    CONCAT(u.nombres, ' ', u.apellidos) AS nombre_completo
             FROM trabajador tr
             INNER JOIN usuario u ON u.id_usuario = tr.id_trabajador
             WHERE tr.estado_trabajador = 'ACTIVO'
             ORDER BY u.nombres, u.apellidos"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lista las herramientas disponibles.
     * Mantenido por compatibilidad — no se usa en la vista del mayordomo.
     */
    public function listarHerramientas(): array {
        $stmt = $this->conn->query(
            "SELECT id_herramienta, nombre, cantidad_total, estado
             FROM herramienta
             WHERE estado = 'DISPONIBLE'
             ORDER BY nombre"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Registra un nuevo préstamo con su detalle de herramientas.
     * Usa transacción para garantizar consistencia.
     *
     * @param array $herramientas  [['id_herramienta' => X, 'cantidad' => Y], ...]
     */
    public function crear(
        int    $id_mayordomo,
        int    $id_trabajador,
        string $fecha_solicitud,
        ?string $observacion,
        array  $herramientas
    ): bool {
        if (empty($herramientas)) return false;

        $this->conn->beginTransaction();
        try {
            // Insertar préstamo
            $stmt = $this->conn->prepare(
                "INSERT INTO prestamo
                   (id_trabajador, id_mayordomo, fecha_solicitud, estado_prestamo, observacion)
                 VALUES
                   (:trabajador, :mayordomo, :fecha, 'PENDIENTE', :obs)"
            );
            $stmt->bindParam(':trabajador', $id_trabajador, PDO::PARAM_INT);
            $stmt->bindParam(':mayordomo',  $id_mayordomo,  PDO::PARAM_INT);
            $stmt->bindParam(':fecha',      $fecha_solicitud, PDO::PARAM_STR);
            $stmt->bindParam(':obs',        $observacion,    PDO::PARAM_STR);
            $stmt->execute();

            $id_prestamo = (int) $this->conn->lastInsertId();

            // Insertar detalle por cada herramienta
            $det = $this->conn->prepare(
                "INSERT INTO detalle_prestamo (id_prestamo, id_herramienta, cantidad)
                 VALUES (:prestamo, :herramienta, :cantidad)"
            );
            foreach ($herramientas as $h) {
                $id_h = (int) ($h['id_herramienta'] ?? 0);
                $cant = (int) ($h['cantidad']        ?? 0);
                if ($id_h <= 0 || $cant <= 0) continue;
                $det->bindParam(':prestamo',    $id_prestamo, PDO::PARAM_INT);
                $det->bindParam(':herramienta', $id_h,        PDO::PARAM_INT);
                $det->bindParam(':cantidad',    $cant,        PDO::PARAM_INT);
                $det->execute();
            }

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    /**
     * Aprueba un préstamo: cambia estado a APROBADO y registra fecha de aprobación.
     */
    public function aprobar(int $id_prestamo): bool {
        $stmt = $this->conn->prepare(
            "UPDATE prestamo
             SET estado_prestamo = 'APROBADO',
                 fecha_aprobacion = CURDATE()
             WHERE id_prestamo = :id AND estado_prestamo = 'PENDIENTE'"
        );
        $stmt->bindParam(':id', $id_prestamo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Niega un préstamo: cambia estado a NEGADO.
     */
    public function negar(int $id_prestamo, ?string $observacion = null): bool {
        $stmt = $this->conn->prepare(
            "UPDATE prestamo
             SET estado_prestamo = 'NEGADO',
                 observacion = COALESCE(:obs, observacion)
             WHERE id_prestamo = :id AND estado_prestamo = 'PENDIENTE'"
        );
        $stmt->bindParam(':obs', $observacion, PDO::PARAM_STR);
        $stmt->bindParam(':id',  $id_prestamo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Registra la devolución de un préstamo aprobado.
     * Actualiza detalle_prestamo y cambia estado del préstamo a DEVUELTO.
     *
     * @param int    $id_prestamo
     * @param int    $id_usuario_recibe  ID del mayordomo que recibe
     * @param string $fecha_devolucion
     * @param string $estado_devolucion  Ej: 'BUENO', 'DAÑADO', 'PARCIAL'
     */
    public function registrarDevolucion(
        int    $id_prestamo,
        int    $id_usuario_recibe,
        string $fecha_devolucion,
        string $estado_devolucion,
        ?string $observacion
    ): bool {
        $this->conn->beginTransaction();
        try {
            // Actualizar todos los detalles del préstamo
            $stmt = $this->conn->prepare(
                "UPDATE detalle_prestamo
                 SET cantidad_devuelta = cantidad,
                     fecha_devolucion  = :fecha,
                     estado_devolucion = :estado_dev,
                     recibido_por      = :recibido,
                     observacion       = COALESCE(:obs, observacion)
                 WHERE id_prestamo = :id"
            );
            $stmt->bindParam(':fecha',      $fecha_devolucion,  PDO::PARAM_STR);
            $stmt->bindParam(':estado_dev', $estado_devolucion, PDO::PARAM_STR);
            $stmt->bindParam(':recibido',   $id_usuario_recibe, PDO::PARAM_INT);
            $stmt->bindParam(':obs',        $observacion,       PDO::PARAM_STR);
            $stmt->bindParam(':id',         $id_prestamo,       PDO::PARAM_INT);
            $stmt->execute();

            // Cambiar estado del préstamo a DEVUELTO
            $upd = $this->conn->prepare(
                "UPDATE prestamo
                 SET estado_prestamo = 'DEVUELTO'
                 WHERE id_prestamo = :id AND estado_prestamo = 'APROBADO'"
            );
            $upd->bindParam(':id', $id_prestamo, PDO::PARAM_INT);
            $upd->execute();

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }
}
?>
