<?php
/**
 * ============================================================
 * ARCHIVO: models/Liquidacion.php
 * PROPÓSITO: Operaciones de BD para el módulo Liquidaciones
 * ============================================================
 * Tablas principales: liquidacion, tarifa, trabajador, usuario
 *
 * Columnas de liquidacion:
 *   id_liquidacion          INT PK AUTO_INCREMENT
 *   id_trabajador           INT FK → trabajador
 *   id_tarifa               INT FK → tarifa
 *   id_autorizacion         INT FK → autorizacion_delegada (nullable)
 *   periodo_inicio          DATE
 *   periodo_fin             DATE
 *   jornadas_consideradas   DECIMAL(10,2)
 *   produccion_considerada  DECIMAL(10,2)
 *   valor_calculado         DECIMAL(10,2)
 *   fecha_generacion        DATE
 *   fecha_liquidacion       DATE (nullable)
 *   estado                  VARCHAR(30) → PENDIENTE | GENERADA | LIQUIDADA
 *   observacion             TEXT (nullable)
 * ============================================================
 */
class Liquidacion {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista todas las liquidaciones con datos del trabajador y tarifa.
     * Acepta filtros opcionales por estado y búsqueda de nombre.
     */
    public function listar(string $busqueda = '', string $estado = ''): array {
        $where  = ['1=1'];
        $params = [];

        if ($busqueda !== '') {
            $where[]           = "(u.nombres LIKE :b OR u.apellidos LIKE :b OR u.documento LIKE :b)";
            $params[':b']      = '%' . $busqueda . '%';
        }
        if ($estado !== '') {
            $where[]           = "l.estado = :estado";
            $params[':estado'] = $estado;
        }

        $sql = "SELECT l.id_liquidacion,
                       CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                       u.documento,
                       t.tipo_pago,
                       t.valor AS tarifa_valor,
                       l.periodo_inicio,
                       l.periodo_fin,
                       l.jornadas_consideradas,
                       l.produccion_considerada,
                       l.valor_calculado,
                       l.fecha_generacion,
                       l.fecha_liquidacion,
                       l.estado,
                       l.observacion
                FROM liquidacion l
                INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
                INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                INNER JOIN tarifa     t  ON t.id_tarifa      = l.id_tarifa
                WHERE " . implode(' AND ', $where) . "
                ORDER BY l.id_liquidacion DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una liquidación por su ID (con datos completos).
     */
    public function obtener(int $id): array|false {
        $stmt = $this->conn->prepare(
            "SELECT l.*,
                    CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                    u.documento,
                    t.tipo_pago, t.valor AS tarifa_valor
             FROM liquidacion l
             INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
             INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
             INNER JOIN tarifa     t  ON t.id_tarifa      = l.id_tarifa
             WHERE l.id_liquidacion = :id
             LIMIT 1"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen para las tarjetas superiores.
     */
    public function resumen(): array {
        $row = $this->conn->query(
            "SELECT COUNT(*)                                    AS total,
                    SUM(estado = 'PENDIENTE')                   AS pendientes,
                    SUM(estado = 'GENERADA')                    AS generadas,
                    SUM(estado = 'LIQUIDADA')                   AS liquidadas,
                    COALESCE(SUM(valor_calculado), 0)           AS valor_total
             FROM liquidacion"
        )->fetch(PDO::FETCH_ASSOC);

        return [
            'total'       => (int)   ($row['total']       ?? 0),
            'pendientes'  => (int)   ($row['pendientes']  ?? 0),
            'generadas'   => (int)   ($row['generadas']   ?? 0),
            'liquidadas'  => (int)   ($row['liquidadas']  ?? 0),
            'valor_total' => (float) ($row['valor_total'] ?? 0),
        ];
    }

    /**
     * Lista los trabajadores activos para el select del formulario.
     */
    public function listarTrabajadores(): array {
        $stmt = $this->conn->query(
            "SELECT tr.id_trabajador,
                    CONCAT(u.nombres, ' ', u.apellidos) AS nombre_completo,
                    u.documento
             FROM trabajador tr
             INNER JOIN usuario u ON u.id_usuario = tr.id_trabajador
             WHERE tr.estado_trabajador = 'ACTIVO'
             ORDER BY u.nombres, u.apellidos"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lista las tarifas activas para el select del formulario.
     */
    public function listarTarifas(): array {
        $stmt = $this->conn->query(
            "SELECT id_tarifa, tipo_pago, valor
             FROM tarifa
             WHERE activa = 1
             ORDER BY tipo_pago, valor"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Genera una nueva liquidación.
     */
    public function crear(
        int    $id_trabajador,
        int    $id_tarifa,
        string $periodo_inicio,
        string $periodo_fin,
        float  $jornadas,
        float  $produccion,
        float  $valor_calculado,
        string $fecha_generacion,
        ?string $observacion
    ): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO liquidacion
               (id_trabajador, id_tarifa, periodo_inicio, periodo_fin,
                jornadas_consideradas, produccion_considerada,
                valor_calculado, fecha_generacion, estado, observacion)
             VALUES
               (:trabajador, :tarifa, :inicio, :fin,
                :jornadas, :produccion,
                :valor, :fecha_gen, 'PENDIENTE', :obs)"
        );
        $stmt->bindParam(':trabajador', $id_trabajador, PDO::PARAM_INT);
        $stmt->bindParam(':tarifa',     $id_tarifa,     PDO::PARAM_INT);
        $stmt->bindParam(':inicio',     $periodo_inicio, PDO::PARAM_STR);
        $stmt->bindParam(':fin',        $periodo_fin,    PDO::PARAM_STR);
        $stmt->bindParam(':jornadas',   $jornadas);
        $stmt->bindParam(':produccion', $produccion);
        $stmt->bindParam(':valor',      $valor_calculado);
        $stmt->bindParam(':fecha_gen',  $fecha_generacion, PDO::PARAM_STR);
        $stmt->bindParam(':obs',        $observacion,      PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Actualiza el estado de una liquidación.
     * Estados válidos: PENDIENTE | GENERADA | LIQUIDADA
     */
    public function cambiarEstado(int $id, string $estado, ?string $fecha_liquidacion = null): bool {
        $stmt = $this->conn->prepare(
            "UPDATE liquidacion
             SET estado = :estado, fecha_liquidacion = :fecha_liq
             WHERE id_liquidacion = :id"
        );
        $stmt->bindParam(':estado',     $estado,            PDO::PARAM_STR);
        $stmt->bindParam(':fecha_liq',  $fecha_liquidacion, PDO::PARAM_STR);
        $stmt->bindParam(':id',         $id,                PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Elimina una liquidación (solo si está en estado PENDIENTE).
     */
    public function eliminar(int $id): bool {
        $stmt = $this->conn->prepare(
            "DELETE FROM liquidacion WHERE id_liquidacion = :id AND estado = 'PENDIENTE'"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Verifica si una liquidación tiene pagos asociados.
     */
    public function tienePagos(int $id): bool {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) FROM pago WHERE id_liquidacion = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $stmt->fetchColumn() > 0;
    }
}
?>
