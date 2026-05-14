<?php
/**
 * ============================================================
 * ARCHIVO: models/AutorizacionDelegada.php
 * PROPÓSITO: Operaciones de BD para el módulo Liquidaciones Temporales
 * ============================================================
 * Tabla: autorizacion_delegada
 *
 * Columnas:
 *   id_autorizacion      INT PK AUTO_INCREMENT
 *   id_administrador     INT FK → usuario (rol ADMINISTRADOR)
 *   id_mayordomo         INT FK → usuario (rol MAYORDOMO)
 *   fecha_inicio         DATE
 *   fecha_fin            DATE
 *   acciones_permitidas  VARCHAR(255)
 *   monto_maximo         DECIMAL(10,2) nullable
 *   estado               VARCHAR(30) → ACTIVA | REVOCADA | EXPIRADA
 * ============================================================
 */
class AutorizacionDelegada {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista todas las autorizaciones con datos del mayordomo y admin.
     * Actualiza automáticamente el estado a EXPIRADA si la fecha_fin ya pasó.
     */
    public function listar(string $busqueda = '', string $estado = ''): array {
        // Actualizar expiradas antes de listar
        $this->conn->exec(
            "UPDATE autorizacion_delegada
             SET estado = 'EXPIRADA'
             WHERE estado = 'ACTIVA' AND fecha_fin < CURDATE()"
        );

        $where  = ['1=1'];
        $params = [];

        if ($busqueda !== '') {
            $where[]      = "(CONCAT(um.nombres,' ',um.apellidos) LIKE :b
                              OR CONCAT(ua.nombres,' ',ua.apellidos) LIKE :b)";
            $params[':b'] = '%' . $busqueda . '%';
        }
        if ($estado !== '') {
            $where[]          = "a.estado = :estado";
            $params[':estado'] = $estado;
        }

        $sql = "SELECT a.id_autorizacion,
                       CONCAT(um.nombres, ' ', um.apellidos) AS mayordomo,
                       CONCAT(ua.nombres, ' ', ua.apellidos) AS administrador,
                       a.fecha_inicio,
                       a.fecha_fin,
                       a.acciones_permitidas,
                       a.monto_maximo,
                       a.estado,
                       (SELECT COUNT(*) FROM liquidacion l
                        WHERE l.id_autorizacion = a.id_autorizacion) AS total_liquidaciones
                FROM autorizacion_delegada a
                INNER JOIN usuario um ON um.id_usuario = a.id_mayordomo
                INNER JOIN usuario ua ON ua.id_usuario = a.id_administrador
                WHERE " . implode(' AND ', $where) . "
                ORDER BY a.id_autorizacion DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen para las tarjetas superiores.
     */
    public function resumen(): array {
        // Actualizar expiradas
        $this->conn->exec(
            "UPDATE autorizacion_delegada
             SET estado = 'EXPIRADA'
             WHERE estado = 'ACTIVA' AND fecha_fin < CURDATE()"
        );

        $row = $this->conn->query(
            "SELECT COUNT(*)                      AS total,
                    SUM(estado = 'ACTIVA')         AS activas,
                    SUM(estado = 'EXPIRADA')       AS expiradas,
                    SUM(estado = 'REVOCADA')       AS revocadas
             FROM autorizacion_delegada"
        )->fetch(PDO::FETCH_ASSOC);

        return [
            'total'    => (int) ($row['total']    ?? 0),
            'activas'  => (int) ($row['activas']  ?? 0),
            'expiradas'=> (int) ($row['expiradas'] ?? 0),
            'revocadas'=> (int) ($row['revocadas'] ?? 0),
        ];
    }

    /**
     * Lista los mayordomos activos para el select del formulario.
     */
    public function listarMayordomos(): array {
        $stmt = $this->conn->query(
            "SELECT id_usuario,
                    CONCAT(nombres, ' ', apellidos) AS nombre_completo
             FROM usuario
             WHERE rol = 'MAYORDOMO' AND activo = 1
             ORDER BY nombres, apellidos"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene las liquidaciones asociadas a una autorización.
     */
    public function liquidacionesDe(int $id_autorizacion): array {
        $stmt = $this->conn->prepare(
            "SELECT l.id_liquidacion,
                    CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                    l.periodo_inicio,
                    l.periodo_fin,
                    l.valor_calculado,
                    l.estado
             FROM liquidacion l
             INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
             INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
             WHERE l.id_autorizacion = :id
             ORDER BY l.fecha_generacion DESC"
        );
        $stmt->bindParam(':id', $id_autorizacion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Otorga una nueva autorización delegada.
     */
    public function otorgar(
        int    $id_administrador,
        int    $id_mayordomo,
        string $fecha_inicio,
        string $fecha_fin,
        string $acciones_permitidas,
        ?float $monto_maximo
    ): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO autorizacion_delegada
               (id_administrador, id_mayordomo, fecha_inicio, fecha_fin,
                acciones_permitidas, monto_maximo, estado)
             VALUES
               (:admin, :mayordomo, :inicio, :fin, :acciones, :monto, 'ACTIVA')"
        );
        $stmt->bindParam(':admin',    $id_administrador, PDO::PARAM_INT);
        $stmt->bindParam(':mayordomo',$id_mayordomo,     PDO::PARAM_INT);
        $stmt->bindParam(':inicio',   $fecha_inicio,     PDO::PARAM_STR);
        $stmt->bindParam(':fin',      $fecha_fin,        PDO::PARAM_STR);
        $stmt->bindParam(':acciones', $acciones_permitidas, PDO::PARAM_STR);
        $stmt->bindParam(':monto',    $monto_maximo);
        return $stmt->execute();
    }

    /**
     * Revoca una autorización activa.
     */
    public function revocar(int $id): bool {
        $stmt = $this->conn->prepare(
            "UPDATE autorizacion_delegada
             SET estado = 'REVOCADA'
             WHERE id_autorizacion = :id AND estado = 'ACTIVA'"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?>
