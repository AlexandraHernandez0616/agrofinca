<?php
/**
 * ============================================================
 * ARCHIVO: models/Reporte.php
 * PROPÓSITO: Consultas de BD para el módulo Reportes
 * ============================================================
 * Tipos de reporte disponibles:
 *
 *   asistencia   → asistencia JOIN trabajador JOIN usuario
 *                  Columnas: Fecha, Trabajador, Entrada, Salida, Horas
 *
 *   produccion   → produccion JOIN trabajador JOIN usuario JOIN lote
 *                  Columnas: Fecha, Trabajador, Lote, Cantidad, Unidad
 *
 *   pagos        → pago JOIN liquidacion JOIN trabajador JOIN usuario
 *                  Columnas: Fecha, Trabajador, Liquidación, Monto, Método, Referencia
 *
 *   liquidaciones → liquidacion JOIN trabajador JOIN usuario JOIN tarifa
 *                  Columnas: Trabajador, Tipo Tarifa, Período, Jornadas, Valor, Estado
 *
 * Todos los métodos aceptan:
 *   $id_trabajador  INT|null  → 0 = todos
 *   $fecha_inicio   string    → 'Y-m-d' o ''
 *   $fecha_fin      string    → 'Y-m-d' o ''
 * ============================================================
 */
class Reporte {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  TRABAJADORES (para el select de filtro)
    // ══════════════════════════════════════════════════════

    public function listarTrabajadores(): array {
        $stmt = $this->conn->query(
            "SELECT tr.id_trabajador,
                    CONCAT(u.nombres, ' ', u.apellidos) AS nombre_completo
             FROM trabajador tr
             INNER JOIN usuario u ON u.id_usuario = tr.id_trabajador
             ORDER BY u.nombres, u.apellidos"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  REPORTE: ASISTENCIA
    // ══════════════════════════════════════════════════════

    /**
     * Retorna registros de asistencia filtrados.
     * Calcula horas trabajadas como diferencia hora_salida - hora_entrada.
     */
    public function asistencia(int $id_trabajador, string $fecha_inicio, string $fecha_fin): array {
        $where  = ['1=1'];
        $params = [];

        if ($id_trabajador > 0) {
            $where[]              = "a.id_trabajador = :trabajador";
            $params[':trabajador'] = $id_trabajador;
        }
        if ($fecha_inicio !== '') {
            $where[]               = "a.fecha >= :inicio";
            $params[':inicio']     = $fecha_inicio;
        }
        if ($fecha_fin !== '') {
            $where[]               = "a.fecha <= :fin";
            $params[':fin']        = $fecha_fin;
        }

        $sql = "SELECT a.fecha,
                       CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                       TIME_FORMAT(a.hora_entrada, '%H:%i') AS entrada,
                       TIME_FORMAT(a.hora_salida,  '%H:%i') AS salida,
                       CASE
                         WHEN a.hora_entrada IS NOT NULL AND a.hora_salida IS NOT NULL
                         THEN CONCAT(
                           FLOOR(TIMESTAMPDIFF(MINUTE, a.hora_entrada, a.hora_salida) / 60),
                           ' hrs'
                         )
                         ELSE '—'
                       END AS horas
                FROM asistencia a
                INNER JOIN trabajador tr ON tr.id_trabajador = a.id_trabajador
                INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                WHERE " . implode(' AND ', $where) . "
                ORDER BY a.fecha DESC, u.nombres";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  REPORTE: PRODUCCIÓN
    // ══════════════════════════════════════════════════════

    public function produccion(int $id_trabajador, string $fecha_inicio, string $fecha_fin): array {
        $where  = ['1=1'];
        $params = [];

        if ($id_trabajador > 0) {
            $where[]              = "p.id_trabajador = :trabajador";
            $params[':trabajador'] = $id_trabajador;
        }
        if ($fecha_inicio !== '') {
            $where[]           = "p.fecha >= :inicio";
            $params[':inicio'] = $fecha_inicio;
        }
        if ($fecha_fin !== '') {
            $where[]        = "p.fecha <= :fin";
            $params[':fin'] = $fecha_fin;
        }

        $sql = "SELECT p.fecha,
                       CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                       l.nombre AS lote,
                       p.cantidad,
                       p.unidad_medida AS unidad
                FROM produccion p
                INNER JOIN trabajador tr ON tr.id_trabajador = p.id_trabajador
                INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                INNER JOIN lote       l  ON l.id_lote        = p.id_lote
                WHERE " . implode(' AND ', $where) . "
                ORDER BY p.fecha DESC, u.nombres";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  REPORTE: PAGOS
    // ══════════════════════════════════════════════════════

    public function pagos(int $id_trabajador, string $fecha_inicio, string $fecha_fin): array {
        $where  = ['1=1'];
        $params = [];

        if ($id_trabajador > 0) {
            $where[]              = "tr.id_trabajador = :trabajador";
            $params[':trabajador'] = $id_trabajador;
        }
        if ($fecha_inicio !== '') {
            $where[]           = "pg.fecha_pago >= :inicio";
            $params[':inicio'] = $fecha_inicio;
        }
        if ($fecha_fin !== '') {
            $where[]        = "pg.fecha_pago <= :fin";
            $params[':fin'] = $fecha_fin;
        }

        $sql = "SELECT pg.fecha_pago AS fecha,
                       CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                       CONCAT('LIQ-', LPAD(pg.id_liquidacion, 3, '0')) AS liquidacion,
                       pg.monto,
                       pg.metodo_pago AS metodo,
                       COALESCE(pg.referencia_pago, '—') AS referencia
                FROM pago pg
                INNER JOIN liquidacion l  ON l.id_liquidacion  = pg.id_liquidacion
                INNER JOIN trabajador  tr ON tr.id_trabajador  = l.id_trabajador
                INNER JOIN usuario     u  ON u.id_usuario      = tr.id_trabajador
                WHERE " . implode(' AND ', $where) . "
                ORDER BY pg.fecha_pago DESC, u.nombres";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  REPORTE: LIQUIDACIONES
    // ══════════════════════════════════════════════════════

    public function liquidaciones(int $id_trabajador, string $fecha_inicio, string $fecha_fin): array {
        $where  = ['1=1'];
        $params = [];

        if ($id_trabajador > 0) {
            $where[]              = "l.id_trabajador = :trabajador";
            $params[':trabajador'] = $id_trabajador;
        }
        if ($fecha_inicio !== '') {
            $where[]           = "l.periodo_inicio >= :inicio";
            $params[':inicio'] = $fecha_inicio;
        }
        if ($fecha_fin !== '') {
            $where[]        = "l.periodo_fin <= :fin";
            $params[':fin'] = $fecha_fin;
        }

        $sql = "SELECT CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                       t.tipo_pago AS tipo_tarifa,
                       l.periodo_inicio,
                       l.periodo_fin,
                       l.jornadas_consideradas AS jornadas,
                       l.valor_calculado AS valor,
                       l.estado
                FROM liquidacion l
                INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
                INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                INNER JOIN tarifa     t  ON t.id_tarifa      = l.id_tarifa
                WHERE " . implode(' AND ', $where) . "
                ORDER BY l.periodo_inicio DESC, u.nombres";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
