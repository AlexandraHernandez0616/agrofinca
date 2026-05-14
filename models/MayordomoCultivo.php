<?php
/**
 * ============================================================
 * ARCHIVO: models/MayordomoCultivo.php
 * PROPÓSITO: Operaciones de BD para el módulo Cultivos (mayordomo)
 * ============================================================
 * Tabla principal: cultivo
 * Columnas:
 *   id_cultivo        INT PK AUTO_INCREMENT
 *   nombre            VARCHAR(100)
 *   variedad          VARCHAR(100)
 *   cantidad_cultivada DECIMAL(10,2)
 *   fecha_registro    DATE
 *   estado            VARCHAR(20) → ACTIVO | INHABILITADO
 * ============================================================
 */
class MayordomoCultivo {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista todos los cultivos con el conteo de lotes asociados.
     * Acepta filtro por búsqueda (nombre/variedad) y estado.
     */
    public function listar(string $busqueda = '', string $estado = ''): array {
        $where  = ['1=1'];
        $params = [];

        if ($busqueda !== '') {
            $where[]      = "(c.nombre LIKE :b OR c.variedad LIKE :b)";
            $params[':b'] = '%' . $busqueda . '%';
        }
        if ($estado !== '') {
            $where[]          = "c.estado = :estado";
            $params[':estado'] = $estado;
        }

        $sql = "SELECT c.id_cultivo,
                       c.nombre,
                       c.variedad,
                       c.cantidad_cultivada,
                       c.fecha_registro,
                       c.estado,
                       COUNT(l.id_lote) AS lotes_asociados
                FROM cultivo c
                LEFT JOIN lote l ON l.id_cultivo = c.id_cultivo
                WHERE " . implode(' AND ', $where) . "
                GROUP BY c.id_cultivo
                ORDER BY c.fecha_registro DESC, c.nombre";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen rápido para las tarjetas superiores.
     */
    public function resumen(): array {
        $row = $this->conn->query(
            "SELECT COUNT(*)                          AS total,
                    SUM(estado = 'ACTIVO')             AS activos,
                    SUM(estado = 'INHABILITADO')       AS inhabilitados,
                    COALESCE(SUM(cantidad_cultivada),0) AS cantidad_total
             FROM cultivo"
        )->fetch(PDO::FETCH_ASSOC);

        return [
            'total'          => (int)   ($row['total']          ?? 0),
            'activos'        => (int)   ($row['activos']        ?? 0),
            'inhabilitados'  => (int)   ($row['inhabilitados']  ?? 0),
            'cantidad_total' => (float) ($row['cantidad_total'] ?? 0),
        ];
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Registra un nuevo cultivo.
     */
    public function registrar(
        string $nombre,
        string $variedad,
        float  $cantidad,
        string $fecha,
        string $estado = 'ACTIVO'
    ): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO cultivo (nombre, variedad, cantidad_cultivada, fecha_registro, estado)
             VALUES (:nombre, :variedad, :cantidad, :fecha, :estado)"
        );
        $stmt->bindParam(':nombre',   $nombre,   PDO::PARAM_STR);
        $stmt->bindParam(':variedad', $variedad, PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':fecha',    $fecha,    PDO::PARAM_STR);
        $stmt->bindParam(':estado',   $estado,   PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Actualiza un cultivo existente.
     */
    public function editar(
        int    $id,
        string $nombre,
        string $variedad,
        float  $cantidad,
        string $fecha,
        string $estado
    ): bool {
        $stmt = $this->conn->prepare(
            "UPDATE cultivo
             SET nombre             = :nombre,
                 variedad           = :variedad,
                 cantidad_cultivada = :cantidad,
                 fecha_registro     = :fecha,
                 estado             = :estado
             WHERE id_cultivo = :id"
        );
        $stmt->bindParam(':id',       $id,       PDO::PARAM_INT);
        $stmt->bindParam(':nombre',   $nombre,   PDO::PARAM_STR);
        $stmt->bindParam(':variedad', $variedad, PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':fecha',    $fecha,    PDO::PARAM_STR);
        $stmt->bindParam(':estado',   $estado,   PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Cambia solo el estado de un cultivo (ACTIVO ↔ INHABILITADO).
     */
    public function toggleEstado(int $id, string $estado): bool {
        $stmt = $this->conn->prepare(
            "UPDATE cultivo SET estado = :estado WHERE id_cultivo = :id"
        );
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindParam(':id',     $id,     PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Elimina un cultivo.
     * Solo se permite si no tiene lotes asociados.
     */
    public function eliminar(int $id): bool {
        $stmt = $this->conn->prepare(
            "DELETE FROM cultivo WHERE id_cultivo = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Verifica si un cultivo tiene lotes asociados.
     */
    public function tieneLotes(int $id): bool {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) FROM lote WHERE id_cultivo = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $stmt->fetchColumn() > 0;
    }

    /**
     * Verifica si ya existe un cultivo con el mismo nombre y variedad.
     */
    public function existeDuplicado(string $nombre, string $variedad, int $excluir_id = 0): bool {
        $sql = "SELECT id_cultivo FROM cultivo
                WHERE nombre = :nombre AND variedad = :variedad";
        if ($excluir_id > 0) $sql .= " AND id_cultivo != :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nombre',   $nombre,   PDO::PARAM_STR);
        $stmt->bindParam(':variedad', $variedad, PDO::PARAM_STR);
        if ($excluir_id > 0) $stmt->bindParam(':id', $excluir_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?>
