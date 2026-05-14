<?php
/**
 * ============================================================
 * ARCHIVO: models/MayordomoProduccion.php
 * PROPÓSITO: Operaciones de BD para el módulo Producción (mayordomo)
 * ============================================================
 * Tabla: produccion JOIN trabajador JOIN usuario JOIN lote
 *
 * Columnas de produccion:
 *   id_produccion  INT PK AUTO_INCREMENT
 *   id_trabajador  INT FK → trabajador
 *   id_lote        INT FK → lote
 *   fecha          DATE
 *   cantidad       DECIMAL(10,2)
 *   unidad_medida  VARCHAR(50)
 * ============================================================
 */
class MayordomoProduccion {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista los registros de producción de los trabajadores
     * asignados a tareas de este mayordomo.
     * Acepta filtros por búsqueda (trabajador/lote) y fecha.
     */
    public function listar(
        int    $id_mayordomo,
        string $busqueda     = '',
        string $fecha_inicio = '',
        string $fecha_fin    = ''
    ): array {
        $where  = ['1=1'];
        $params = [];

        // Solo producción de trabajadores en tareas de este mayordomo
        $where[] = "EXISTS (
            SELECT 1 FROM tarea_trabajador tt
            INNER JOIN tarea ta ON ta.id_tarea = tt.id_tarea
            WHERE tt.id_trabajador = p.id_trabajador
              AND ta.id_mayordomo  = :mayordomo
        )";
        $params[':mayordomo'] = $id_mayordomo;

        if ($busqueda !== '') {
            $where[]      = "(CONCAT(u.nombres,' ',u.apellidos) LIKE :b OR l.nombre LIKE :b)";
            $params[':b'] = '%' . $busqueda . '%';
        }
        if ($fecha_inicio !== '') {
            $where[]           = "p.fecha >= :inicio";
            $params[':inicio'] = $fecha_inicio;
        }
        if ($fecha_fin !== '') {
            $where[]        = "p.fecha <= :fin";
            $params[':fin'] = $fecha_fin;
        }

        $sql = "SELECT p.id_produccion,
                       p.fecha,
                       p.id_trabajador,
                       p.id_lote,
                       CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                       l.nombre  AS lote,
                       p.cantidad,
                       p.unidad_medida AS unidad
                FROM produccion p
                INNER JOIN trabajador tr ON tr.id_trabajador = p.id_trabajador
                INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                INNER JOIN lote       l  ON l.id_lote        = p.id_lote
                WHERE " . implode(' AND ', $where) . "
                ORDER BY p.fecha DESC, p.id_produccion DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen de producción para las tarjetas superiores.
     */
    public function resumen(int $id_mayordomo): array {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*)                          AS total_registros,
                    COALESCE(SUM(p.cantidad), 0)       AS total_kg,
                    COUNT(DISTINCT p.id_trabajador)    AS trabajadores,
                    COUNT(DISTINCT p.id_lote)          AS lotes
             FROM produccion p
             WHERE EXISTS (
               SELECT 1 FROM tarea_trabajador tt
               INNER JOIN tarea ta ON ta.id_tarea = tt.id_tarea
               WHERE tt.id_trabajador = p.id_trabajador
                 AND ta.id_mayordomo  = :id
             )"
        );
        $stmt->bindParam(':id', $id_mayordomo, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'total_registros' => (int)   ($row['total_registros'] ?? 0),
            'total_kg'        => (float) ($row['total_kg']        ?? 0),
            'trabajadores'    => (int)   ($row['trabajadores']    ?? 0),
            'lotes'           => (int)   ($row['lotes']           ?? 0),
        ];
    }

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
     * Lista los lotes disponibles para el select del formulario.
     */
    public function listarLotes(): array {
        $stmt = $this->conn->query(
            "SELECT l.id_lote, l.nombre,
                    c.nombre AS cultivo
             FROM lote l
             LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
             ORDER BY l.nombre"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Registra un nuevo registro de producción.
     */
    public function registrar(
        int    $id_trabajador,
        int    $id_lote,
        string $fecha,
        float  $cantidad,
        string $unidad_medida
    ): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO produccion (id_trabajador, id_lote, fecha, cantidad, unidad_medida)
             VALUES (:trabajador, :lote, :fecha, :cantidad, :unidad)"
        );
        $stmt->bindParam(':trabajador', $id_trabajador, PDO::PARAM_INT);
        $stmt->bindParam(':lote',       $id_lote,       PDO::PARAM_INT);
        $stmt->bindParam(':fecha',      $fecha,         PDO::PARAM_STR);
        $stmt->bindParam(':cantidad',   $cantidad);
        $stmt->bindParam(':unidad',     $unidad_medida, PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Actualiza un registro de producción existente.
     */
    public function editar(
        int    $id,
        int    $id_trabajador,
        int    $id_lote,
        string $fecha,
        float  $cantidad,
        string $unidad_medida
    ): bool {
        $stmt = $this->conn->prepare(
            "UPDATE produccion
             SET id_trabajador = :trabajador,
                 id_lote       = :lote,
                 fecha         = :fecha,
                 cantidad      = :cantidad,
                 unidad_medida = :unidad
             WHERE id_produccion = :id"
        );
        $stmt->bindParam(':id',         $id,            PDO::PARAM_INT);
        $stmt->bindParam(':trabajador', $id_trabajador, PDO::PARAM_INT);
        $stmt->bindParam(':lote',       $id_lote,       PDO::PARAM_INT);
        $stmt->bindParam(':fecha',      $fecha,         PDO::PARAM_STR);
        $stmt->bindParam(':cantidad',   $cantidad);
        $stmt->bindParam(':unidad',     $unidad_medida, PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Elimina un registro de producción por ID.
     */
    public function eliminar(int $id): bool {
        $stmt = $this->conn->prepare(
            "DELETE FROM produccion WHERE id_produccion = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
