<?php
/**
 * ============================================================
 * ARCHIVO: models/MayordomoLiquidacionTemporal.php
 * PROPÓSITO: Operaciones de BD para el módulo Liquidaciones Temporales
 *            del mayordomo (solo disponible con permiso activo)
 * ============================================================
 * Tablas: autorizacion_delegada, liquidacion, tarifa, trabajador, usuario
 * ============================================================
 */
class MayordomoLiquidacionTemporal {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  PERMISO
    // ══════════════════════════════════════════════════════

    /**
     * Obtiene la autorización ACTIVA del mayordomo (si existe).
     * Expira automáticamente las vencidas antes de consultar.
     * Retorna false si no tiene permiso activo.
     */
    public function obtenerPermisoActivo(int $id_mayordomo): array|false {
        // Auto-expirar
        $this->conn->prepare(
            "UPDATE autorizacion_delegada
             SET estado = 'EXPIRADA'
             WHERE estado = 'ACTIVA' AND fecha_fin < CURDATE()"
        )->execute();

        $stmt = $this->conn->prepare(
            "SELECT a.id_autorizacion,
                    a.fecha_inicio,
                    a.fecha_fin,
                    a.acciones_permitidas,
                    a.monto_maximo,
                    a.estado,
                    CONCAT(ua.nombres, ' ', ua.apellidos) AS administrador,
                    CONCAT(um.nombres, ' ', um.apellidos) AS mayordomo
             FROM autorizacion_delegada a
             INNER JOIN usuario ua ON ua.id_usuario = a.id_administrador
             INNER JOIN usuario um ON um.id_usuario = a.id_mayordomo
             WHERE a.id_mayordomo = :id
               AND a.estado = 'ACTIVA'
             ORDER BY a.id_autorizacion DESC
             LIMIT 1"
        );
        $stmt->bindParam(':id', $id_mayordomo, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  DATOS PARA EL FORMULARIO
    // ══════════════════════════════════════════════════════

    /**
     * Lista los trabajadores activos asignados a tareas del mayordomo.
     */
    public function listarTrabajadores(int $id_mayordomo): array {
        $stmt = $this->conn->prepare(
            "SELECT tr.id_trabajador,
                    CONCAT(u.nombres, ' ', u.apellidos) AS nombre_completo
             FROM trabajador tr
             INNER JOIN usuario u ON u.id_usuario = tr.id_trabajador
             WHERE tr.estado_trabajador = 'ACTIVO'
               AND EXISTS (
                 SELECT 1 FROM tarea_trabajador tt
                 INNER JOIN tarea ta ON ta.id_tarea = tt.id_tarea
                 WHERE tt.id_trabajador = tr.id_trabajador
                   AND ta.id_mayordomo  = :id
               )
             ORDER BY u.nombres, u.apellidos"
        );
        $stmt->bindParam(':id', $id_mayordomo, PDO::PARAM_INT);
        $stmt->execute();
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

    /**
     * Obtiene los días trabajados (jornadas de asistencia) de un trabajador
     * en un rango de fechas — para autocompletar el campo "días trabajados".
     */
    public function jornadasTrabajador(int $id_trabajador, string $inicio, string $fin): int {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) FROM asistencia
             WHERE id_trabajador = :id
               AND fecha BETWEEN :inicio AND :fin"
        );
        $stmt->bindParam(':id',     $id_trabajador, PDO::PARAM_INT);
        $stmt->bindParam(':inicio', $inicio,        PDO::PARAM_STR);
        $stmt->bindParam(':fin',    $fin,           PDO::PARAM_STR);
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }

    // ══════════════════════════════════════════════════════
    //  LIQUIDACIONES DEL MAYORDOMO
    // ══════════════════════════════════════════════════════

    /**
     * Lista las liquidaciones generadas por este mayordomo bajo su autorización.
     */
    public function listarMias(int $id_autorizacion): array {
        $stmt = $this->conn->prepare(
            "SELECT l.id_liquidacion,
                    CONCAT('LIQ-', YEAR(l.fecha_generacion), '-', LPAD(l.id_liquidacion, 3, '0')) AS codigo,
                    CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                    CONCAT(l.periodo_inicio, ' - ', l.periodo_fin) AS periodo,
                    l.valor_calculado,
                    DATE(l.fecha_generacion)                        AS fecha,
                    TIME_FORMAT(l.fecha_generacion, '%H:%i')        AS hora,
                    l.estado,
                    l.observacion,
                    t.tipo_pago,
                    l.jornadas_consideradas
             FROM liquidacion l
             INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
             INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
             INNER JOIN tarifa     t  ON t.id_tarifa      = l.id_tarifa
             WHERE l.id_autorizacion = :id_aut
             ORDER BY l.fecha_generacion DESC"
        );
        $stmt->bindParam(':id_aut', $id_autorizacion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene el detalle de una liquidación específica.
     */
    public function obtenerDetalle(int $id_liquidacion): array|false {
        $stmt = $this->conn->prepare(
            "SELECT l.*,
                    CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                    u.documento,
                    t.tipo_pago, t.valor AS tarifa_valor,
                    CONCAT('LIQ-', YEAR(l.fecha_generacion), '-', LPAD(l.id_liquidacion, 3, '0')) AS codigo
             FROM liquidacion l
             INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
             INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
             INNER JOIN tarifa     t  ON t.id_tarifa      = l.id_tarifa
             WHERE l.id_liquidacion = :id
             LIMIT 1"
        );
        $stmt->bindParam(':id', $id_liquidacion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Genera una liquidación temporal vinculada a la autorización del mayordomo.
     * El estado inicial es 'GENERADA' (ya autorizada por el permiso).
     */
    public function generar(
        int    $id_trabajador,
        int    $id_tarifa,
        int    $id_autorizacion,
        string $periodo_inicio,
        string $periodo_fin,
        float  $jornadas,
        float  $valor_calculado,
        ?string $observacion
    ): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO liquidacion
               (id_trabajador, id_tarifa, id_autorizacion,
                periodo_inicio, periodo_fin,
                jornadas_consideradas, produccion_considerada,
                valor_calculado, fecha_generacion, estado, observacion)
             VALUES
               (:trabajador, :tarifa, :autorizacion,
                :inicio, :fin,
                :jornadas, 0,
                :valor, NOW(), 'GENERADA', :obs)"
        );
        $stmt->bindParam(':trabajador',   $id_trabajador,   PDO::PARAM_INT);
        $stmt->bindParam(':tarifa',       $id_tarifa,       PDO::PARAM_INT);
        $stmt->bindParam(':autorizacion', $id_autorizacion, PDO::PARAM_INT);
        $stmt->bindParam(':inicio',       $periodo_inicio,  PDO::PARAM_STR);
        $stmt->bindParam(':fin',          $periodo_fin,     PDO::PARAM_STR);
        $stmt->bindParam(':jornadas',     $jornadas);
        $stmt->bindParam(':valor',        $valor_calculado);
        $stmt->bindParam(':obs',          $observacion,     PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>
