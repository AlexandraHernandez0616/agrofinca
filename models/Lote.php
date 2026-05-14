<?php
/**
 * ============================================================
 * ARCHIVO: models/Lote.php
 * PROPÓSITO: Operaciones de BD para el módulo Lotes y Producción
 * ============================================================
 * Tablas: lote, cultivo, produccion, trabajador, usuario
 * Usado por: LoteController.php
 * ============================================================
 */
class Lote {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lista todos los lotes con su cultivo y producción total.
     * @return array
     */
    public function listar() {
        $sql = "SELECT l.id_lote, l.nombre, l.ubicacion_descripcion,
                       l.extension, l.fecha_registro,
                       c.nombre AS cultivo_nombre, c.variedad,
                       COALESCE(SUM(p.cantidad), 0) AS produccion_total
                FROM lote l
                LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
                LEFT JOIN produccion p ON p.id_lote = l.id_lote
                GROUP BY l.id_lote
                ORDER BY l.fecha_registro DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen de estadísticas para las tarjetas del módulo.
     * @return array [total_lotes, extension_total, por_cultivo[]]
     */
    public function resumen() {
        // Total lotes y extensión
        $stmt = $this->conn->query(
            "SELECT COUNT(*) AS total, COALESCE(SUM(extension), 0) AS extension
             FROM lote"
        );
        $base = $stmt->fetch(PDO::FETCH_ASSOC);

        // Conteo por tipo de cultivo
        $stmt = $this->conn->query(
            "SELECT c.nombre AS cultivo, COUNT(l.id_lote) AS cantidad
             FROM lote l
             LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
             GROUP BY c.nombre"
        );
        $por_cultivo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'total_lotes'    => (int) $base['total'],
            'extension_total'=> (float) $base['extension'],
            'por_cultivo'    => $por_cultivo,
        ];
    }

    /**
     * Lista los lotes con sus cultivos (para la pestaña Cultivos por Lote).
     * @return array
     */
    public function listarConCultivos() {
        $sql = "SELECT l.id_lote, l.nombre, l.ubicacion_descripcion,
                       l.extension, c.nombre AS cultivo_nombre,
                       COUNT(DISTINCT c2.id_cultivo) AS variedades
                FROM lote l
                LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
                LEFT JOIN cultivo c2 ON c2.id_cultivo = l.id_cultivo
                GROUP BY l.id_lote
                ORDER BY l.nombre";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene el detalle de cultivos de un lote específico.
     * @param int $id_lote
     * @return array
     */
    public function cultivosPorLote($id_lote) {
        // Info del lote
        $stmt = $this->conn->prepare(
            "SELECT l.nombre, l.ubicacion_descripcion, l.extension, c.nombre AS cultivo_nombre
             FROM lote l LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
             WHERE l.id_lote = :id LIMIT 1"
        );
        $stmt->bindParam(':id', $id_lote, PDO::PARAM_INT);
        $stmt->execute();
        $lote = $stmt->fetch(PDO::FETCH_ASSOC);

        // Variedades del cultivo del lote
        $stmt = $this->conn->prepare(
            "SELECT c.variedad, c.cantidad_cultivada,
                    c.estado AS estado_salud
             FROM cultivo c
             INNER JOIN lote l ON l.id_cultivo = c.id_cultivo
             WHERE l.id_lote = :id"
        );
        $stmt->bindParam(':id', $id_lote, PDO::PARAM_INT);
        $stmt->execute();
        $variedades = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return ['lote' => $lote, 'variedades' => $variedades];
    }

    /**
     * Lista todos los lotes con su producción total (para la pestaña Producción por Lote).
     * @return array
     */
    public function listarConProduccion() {
        $sql = "SELECT l.id_lote, l.nombre, c.nombre AS cultivo_nombre,
                       l.extension,
                       COALESCE(SUM(p.cantidad), 0) AS produccion_total,
                       COUNT(p.id_produccion) AS registros
                FROM lote l
                LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
                LEFT JOIN produccion p ON p.id_lote = l.id_lote
                GROUP BY l.id_lote
                ORDER BY l.nombre";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene el detalle de producción de un lote específico.
     * @param int $id_lote
     * @return array
     */
    public function produccionPorLote($id_lote) {
        // Info del lote
        $stmt = $this->conn->prepare(
            "SELECT l.nombre, c.nombre AS cultivo_nombre, l.extension,
                    COALESCE(SUM(p.cantidad), 0) AS produccion_total
             FROM lote l
             LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
             LEFT JOIN produccion p ON p.id_lote = l.id_lote
             WHERE l.id_lote = :id
             GROUP BY l.id_lote
             LIMIT 1"
        );
        $stmt->bindParam(':id', $id_lote, PDO::PARAM_INT);
        $stmt->execute();
        $lote = $stmt->fetch(PDO::FETCH_ASSOC);

        // Registros de producción
        $stmt = $this->conn->prepare(
            "SELECT p.fecha, CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                    p.cantidad, p.unidad_medida
             FROM produccion p
             INNER JOIN trabajador t ON t.id_trabajador = p.id_trabajador
             INNER JOIN usuario u ON u.id_usuario = t.id_trabajador
             WHERE p.id_lote = :id
             ORDER BY p.fecha DESC"
        );
        $stmt->bindParam(':id', $id_lote, PDO::PARAM_INT);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return ['lote' => $lote, 'registros' => $registros];
    }
}
?>
