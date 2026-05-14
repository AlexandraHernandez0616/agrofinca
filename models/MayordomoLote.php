<?php
/**
 * ============================================================
 * ARCHIVO: models/MayordomoLote.php
 * PROPÓSITO: Operaciones de BD para el módulo Lotes (mayordomo)
 * ============================================================
 * Tablas: lote, cultivo
 * Usado por: controllers/MayordomoLoteController.php
 *            views/mayordomo/lotes.php
 * ============================================================
 */
class MayordomoLote {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista todos los lotes con su cultivo asociado.
     * Acepta búsqueda opcional por nombre, ubicación o cultivo.
     */
    public function listar(string $busqueda = ''): array {
        $where  = ['1=1'];
        $params = [];

        if ($busqueda !== '') {
            $where[]      = "(l.nombre LIKE :b OR l.ubicacion_descripcion LIKE :b OR c.nombre LIKE :b)";
            $params[':b'] = '%' . $busqueda . '%';
        }

        $sql = "SELECT l.id_lote,
                       l.nombre,
                       l.ubicacion_descripcion,
                       l.extension,
                       l.fecha_registro,
                       c.id_cultivo,
                       c.nombre AS cultivo_nombre
                FROM lote l
                LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
                WHERE " . implode(' AND ', $where) . "
                ORDER BY l.fecha_registro DESC, l.nombre";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lista los cultivos activos para el select del formulario.
     */
    public function listarCultivos(): array {
        $stmt = $this->conn->query(
            "SELECT id_cultivo, nombre, variedad
             FROM cultivo
             WHERE estado = 'ACTIVO'
             ORDER BY nombre, variedad"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen rápido para las tarjetas superiores.
     */
    public function resumen(): array {
        $row = $this->conn->query(
            "SELECT COUNT(*)                        AS total,
                    COALESCE(SUM(l.extension), 0)   AS extension_total,
                    COUNT(DISTINCT l.id_cultivo)     AS tipos_cultivo
             FROM lote l"
        )->fetch(PDO::FETCH_ASSOC);

        return [
            'total'         => (int)   ($row['total']          ?? 0),
            'extension_total'=> (float) ($row['extension_total'] ?? 0),
            'tipos_cultivo' => (int)   ($row['tipos_cultivo']  ?? 0),
        ];
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Registra un nuevo lote.
     */
    public function registrar(
        string $nombre,
        string $ubicacion,
        float  $extension,
        int    $id_cultivo,
        string $fecha
    ): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO lote (nombre, ubicacion_descripcion, extension, id_cultivo, fecha_registro)
             VALUES (:nombre, :ubicacion, :extension, :cultivo, :fecha)"
        );
        $stmt->bindParam(':nombre',    $nombre,     PDO::PARAM_STR);
        $stmt->bindParam(':ubicacion', $ubicacion,  PDO::PARAM_STR);
        $stmt->bindParam(':extension', $extension);
        $stmt->bindParam(':cultivo',   $id_cultivo, PDO::PARAM_INT);
        $stmt->bindParam(':fecha',     $fecha,      PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Actualiza un lote existente.
     */
    public function editar(
        int    $id,
        string $nombre,
        string $ubicacion,
        float  $extension,
        int    $id_cultivo,
        string $fecha
    ): bool {
        $stmt = $this->conn->prepare(
            "UPDATE lote
             SET nombre                = :nombre,
                 ubicacion_descripcion = :ubicacion,
                 extension             = :extension,
                 id_cultivo            = :cultivo,
                 fecha_registro        = :fecha
             WHERE id_lote = :id"
        );
        $stmt->bindParam(':id',        $id,         PDO::PARAM_INT);
        $stmt->bindParam(':nombre',    $nombre,     PDO::PARAM_STR);
        $stmt->bindParam(':ubicacion', $ubicacion,  PDO::PARAM_STR);
        $stmt->bindParam(':extension', $extension);
        $stmt->bindParam(':cultivo',   $id_cultivo, PDO::PARAM_INT);
        $stmt->bindParam(':fecha',     $fecha,      PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>
