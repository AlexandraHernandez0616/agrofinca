<?php
/**
 * ============================================================
 * ARCHIVO: models/Pago.php
 * PROPÓSITO: Operaciones de BD para el módulo Pagos
 * ============================================================
 * Tablas: pago, liquidacion, trabajador, usuario
 *
 * Columnas de pago:
 *   id_pago              INT PK AUTO_INCREMENT
 *   id_liquidacion       INT FK → liquidacion
 *   id_autorizacion      INT FK nullable
 *   id_usuario_registra  INT FK → usuario
 *   fecha_pago           DATE
 *   monto                DECIMAL(10,2)
 *   metodo_pago          VARCHAR(30) → Efectivo | Transferencia | Cheque
 *   referencia_pago      VARCHAR(100) nullable
 *   observacion          TEXT nullable
 * ============================================================
 */
class Pago {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista todos los pagos con datos del trabajador y liquidación.
     * Acepta filtros por búsqueda (nombre/documento) y método de pago.
     */
    public function listar(string $busqueda = '', string $metodo = ''): array {
        $where  = ['1=1'];
        $params = [];

        if ($busqueda !== '') {
            $where[]      = "(u.nombres LIKE :b OR u.apellidos LIKE :b OR u.documento LIKE :b)";
            $params[':b'] = '%' . $busqueda . '%';
        }
        if ($metodo !== '') {
            $where[]           = "p.metodo_pago = :metodo";
            $params[':metodo'] = $metodo;
        }

        $sql = "SELECT p.id_pago,
                       CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                       u.documento,
                       p.id_liquidacion,
                       CONCAT('LIQ-', LPAD(p.id_liquidacion, 3, '0')) AS liq_codigo,
                       l.valor_calculado,
                       l.estado AS liq_estado,
                       p.fecha_pago,
                       p.monto,
                       p.metodo_pago,
                       p.referencia_pago,
                       p.observacion,
                       CONCAT(ur.nombres, ' ', ur.apellidos) AS registrado_por
                FROM pago p
                INNER JOIN liquidacion l  ON l.id_liquidacion  = p.id_liquidacion
                INNER JOIN trabajador  tr ON tr.id_trabajador  = l.id_trabajador
                INNER JOIN usuario     u  ON u.id_usuario      = tr.id_trabajador
                INNER JOIN usuario     ur ON ur.id_usuario     = p.id_usuario_registra
                WHERE " . implode(' AND ', $where) . "
                ORDER BY p.id_pago DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un pago por su ID.
     */
    public function obtener(int $id): array|false {
        $stmt = $this->conn->prepare(
            "SELECT p.*,
                    CONCAT(u.nombres, ' ', u.apellidos)  AS trabajador,
                    u.documento,
                    CONCAT('LIQ-', LPAD(p.id_liquidacion, 3, '0')) AS liq_codigo,
                    l.valor_calculado, l.estado AS liq_estado,
                    CONCAT(ur.nombres, ' ', ur.apellidos) AS registrado_por
             FROM pago p
             INNER JOIN liquidacion l  ON l.id_liquidacion  = p.id_liquidacion
             INNER JOIN trabajador  tr ON tr.id_trabajador  = l.id_trabajador
             INNER JOIN usuario     u  ON u.id_usuario      = tr.id_trabajador
             INNER JOIN usuario     ur ON ur.id_usuario     = p.id_usuario_registra
             WHERE p.id_pago = :id LIMIT 1"
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
            "SELECT COUNT(*)                           AS total,
                    COALESCE(SUM(monto), 0)            AS monto_total,
                    SUM(metodo_pago = 'Efectivo')      AS efectivo,
                    SUM(metodo_pago = 'Transferencia') AS transferencia,
                    SUM(metodo_pago = 'Cheque')        AS cheque
             FROM pago"
        )->fetch(PDO::FETCH_ASSOC);

        return [
            'total'         => (int)   ($row['total']         ?? 0),
            'monto_total'   => (float) ($row['monto_total']   ?? 0),
            'efectivo'      => (int)   ($row['efectivo']      ?? 0),
            'transferencia' => (int)   ($row['transferencia'] ?? 0),
            'cheque'        => (int)   ($row['cheque']        ?? 0),
        ];
    }

    /**
     * Lista las liquidaciones en estado GENERADA disponibles para pagar.
     */
    public function listarLiquidacionesPagables(): array {
        $stmt = $this->conn->query(
            "SELECT l.id_liquidacion,
                    CONCAT('LIQ-', LPAD(l.id_liquidacion, 3, '0')) AS codigo,
                    CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                    l.valor_calculado,
                    l.estado
             FROM liquidacion l
             INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
             INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
             WHERE l.estado = 'GENERADA'
             ORDER BY l.id_liquidacion DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Registra un nuevo pago.
     */
    public function crear(
        int    $id_liquidacion,
        int    $id_usuario_registra,
        string $fecha_pago,
        float  $monto,
        string $metodo_pago,
        ?string $referencia,
        ?string $observacion
    ): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO pago
               (id_liquidacion, id_usuario_registra, fecha_pago,
                monto, metodo_pago, referencia_pago, observacion)
             VALUES
               (:liq, :usuario, :fecha, :monto, :metodo, :ref, :obs)"
        );
        $stmt->bindParam(':liq',     $id_liquidacion,      PDO::PARAM_INT);
        $stmt->bindParam(':usuario', $id_usuario_registra, PDO::PARAM_INT);
        $stmt->bindParam(':fecha',   $fecha_pago,          PDO::PARAM_STR);
        $stmt->bindParam(':monto',   $monto);
        $stmt->bindParam(':metodo',  $metodo_pago,         PDO::PARAM_STR);
        $stmt->bindParam(':ref',     $referencia,          PDO::PARAM_STR);
        $stmt->bindParam(':obs',     $observacion,         PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Elimina un pago por ID.
     */
    public function eliminar(int $id): bool {
        $stmt = $this->conn->prepare(
            "DELETE FROM pago WHERE id_pago = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
