<?php
/**
 * ============================================================
 * ARCHIVO: models/Bitacora.php
 * PROPÓSITO: Consultas de BD para el módulo Bitácora
 * ============================================================
 * Tabla: bitacora_operacion JOIN usuario
 *
 * Columnas de bitacora_operacion:
 *   id_bitacora   INT PK AUTO_INCREMENT
 *   id_usuario    INT FK → usuario
 *   fecha_hora    DATETIME
 *   operacion     VARCHAR(100)  → acción realizada (Creación, Modificación, etc.)
 *   modulo        VARCHAR(100)  → módulo del sistema
 *   detalle       TEXT          → descripción legible de la operación
 * ============================================================
 */
class Bitacora {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista registros de bitácora con filtros opcionales.
     * Devuelve los más recientes primero.
     *
     * @param string $busqueda     Texto libre (usuario, módulo, operación, detalle)
     * @param string $modulo       Filtro exacto por módulo
     * @param string $operacion    Filtro exacto por tipo de operación
     * @param string $fecha_inicio 'Y-m-d' o ''
     * @param string $fecha_fin    'Y-m-d' o ''
     * @param int    $limite       Máximo de registros (0 = sin límite)
     */
    public function listar(
        string $busqueda    = '',
        string $modulo      = '',
        string $operacion   = '',
        string $fecha_inicio = '',
        string $fecha_fin    = '',
        int    $limite       = 200
    ): array {
        $where  = ['1=1'];
        $params = [];

        if ($busqueda !== '') {
            $where[]      = "(u.username LIKE :b OR b.modulo LIKE :b
                              OR b.operacion LIKE :b OR b.detalle LIKE :b
                              OR u.rol LIKE :b)";
            $params[':b'] = '%' . $busqueda . '%';
        }
        if ($modulo !== '') {
            $where[]          = "b.modulo = :modulo";
            $params[':modulo'] = $modulo;
        }
        if ($operacion !== '') {
            $where[]             = "b.operacion = :operacion";
            $params[':operacion'] = $operacion;
        }
        if ($fecha_inicio !== '') {
            $where[]           = "DATE(b.fecha_hora) >= :inicio";
            $params[':inicio'] = $fecha_inicio;
        }
        if ($fecha_fin !== '') {
            $where[]        = "DATE(b.fecha_hora) <= :fin";
            $params[':fin'] = $fecha_fin;
        }

        $limitSql = $limite > 0 ? " LIMIT {$limite}" : '';

        $sql = "SELECT b.id_bitacora,
                       DATE(b.fecha_hora)                    AS fecha,
                       TIME_FORMAT(b.fecha_hora, '%H:%i:%s') AS hora,
                       u.username,
                       u.rol,
                       b.modulo,
                       b.operacion,
                       b.detalle
                FROM bitacora_operacion b
                INNER JOIN usuario u ON u.id_usuario = b.id_usuario
                WHERE " . implode(' AND ', $where) . "
                ORDER BY b.fecha_hora DESC"
             . $limitSql;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lista los módulos únicos registrados (para el filtro dropdown).
     */
    public function listarModulos(): array {
        $stmt = $this->conn->query(
            "SELECT DISTINCT modulo FROM bitacora_operacion ORDER BY modulo"
        );
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Lista las operaciones únicas registradas (para el filtro dropdown).
     */
    public function listarOperaciones(): array {
        $stmt = $this->conn->query(
            "SELECT DISTINCT operacion FROM bitacora_operacion ORDER BY operacion"
        );
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Resumen rápido para las tarjetas superiores.
     */
    public function resumen(): array {
        $row = $this->conn->query(
            "SELECT COUNT(*)                                AS total,
                    SUM(DATE(fecha_hora) = CURDATE())       AS hoy,
                    COUNT(DISTINCT id_usuario)              AS usuarios_activos,
                    COUNT(DISTINCT modulo)                  AS modulos
             FROM bitacora_operacion"
        )->fetch(PDO::FETCH_ASSOC);

        return [
            'total'           => (int) ($row['total']           ?? 0),
            'hoy'             => (int) ($row['hoy']             ?? 0),
            'usuarios_activos'=> (int) ($row['usuarios_activos'] ?? 0),
            'modulos'         => (int) ($row['modulos']         ?? 0),
        ];
    }
}
?>
