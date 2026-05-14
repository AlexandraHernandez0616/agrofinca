<?php
/**
 * ============================================================
 * ARCHIVO: models/Inventario.php
 * PROPÓSITO: Operaciones de BD para el módulo Inventarios
 * ============================================================
 * Tablas: herramienta, insumo
 * Usado por: controllers/InventarioController.php
 * ============================================================
 */
class Inventario {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  HERRAMIENTAS
    // ══════════════════════════════════════════════════════

    /**
     * Lista todas las herramientas ordenadas por fecha de registro.
     */
    public function listarHerramientas() {
        $sql = "SELECT id_herramienta, nombre, cantidad_total, estado,
                       foto_referencia, fecha_registro
                FROM herramienta
                ORDER BY fecha_registro DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una herramienta por su ID.
     */
    public function obtenerHerramienta($id) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM herramienta WHERE id_herramienta = :id LIMIT 1"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Registra una nueva herramienta.
     * @param string|null $foto  Ruta relativa guardada en disco (o null)
     */
    public function crearHerramienta($nombre, $cantidad, $estado, $fecha, $foto = null) {
        $stmt = $this->conn->prepare(
            "INSERT INTO herramienta (nombre, cantidad_total, estado, foto_referencia, fecha_registro)
             VALUES (:nombre, :cantidad, :estado, :foto, :fecha)"
        );
        $stmt->bindParam(':nombre',   $nombre,   PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':estado',   $estado,   PDO::PARAM_STR);
        $stmt->bindParam(':foto',     $foto,     PDO::PARAM_STR);
        $stmt->bindParam(':fecha',    $fecha,    PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Actualiza una herramienta existente.
     * Si $foto es null no se toca la columna foto_referencia.
     */
    public function actualizarHerramienta($id, $nombre, $cantidad, $estado, $fecha, $foto = null) {
        if ($foto !== null) {
            $sql = "UPDATE herramienta
                    SET nombre = :nombre, cantidad_total = :cantidad,
                        estado = :estado, foto_referencia = :foto,
                        fecha_registro = :fecha
                    WHERE id_herramienta = :id";
        } else {
            $sql = "UPDATE herramienta
                    SET nombre = :nombre, cantidad_total = :cantidad,
                        estado = :estado, fecha_registro = :fecha
                    WHERE id_herramienta = :id";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',       $id,       PDO::PARAM_INT);
        $stmt->bindParam(':nombre',   $nombre,   PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':estado',   $estado,   PDO::PARAM_STR);
        $stmt->bindParam(':fecha',    $fecha,    PDO::PARAM_STR);
        if ($foto !== null) {
            $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
        }
        return $stmt->execute();
    }

    /**
     * Elimina una herramienta por su ID.
     */
    public function eliminarHerramienta($id) {
        $stmt = $this->conn->prepare(
            "DELETE FROM herramienta WHERE id_herramienta = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // ══════════════════════════════════════════════════════
    //  INSUMOS
    // ══════════════════════════════════════════════════════

    /**
     * Lista todos los insumos ordenados por fecha de registro.
     */
    public function listarInsumos() {
        $sql = "SELECT id_insumo, nombre, stock_actual, unidad_medida,
                       fecha_vencimiento, cantidad_minima,
                       foto_referencia, fecha_registro
                FROM insumo
                ORDER BY fecha_registro DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un insumo por su ID.
     */
    public function obtenerInsumo($id) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM insumo WHERE id_insumo = :id LIMIT 1"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Registra un nuevo insumo.
     * @param string|null $foto  Ruta relativa guardada en disco (o null)
     */
    public function crearInsumo($nombre, $stock, $unidad, $vencimiento, $minimo, $fecha, $foto = null) {
        $stmt = $this->conn->prepare(
            "INSERT INTO insumo (nombre, stock_actual, unidad_medida,
                                 fecha_vencimiento, cantidad_minima,
                                 foto_referencia, fecha_registro)
             VALUES (:nombre, :stock, :unidad, :vencimiento, :minimo, :foto, :fecha)"
        );
        $stmt->bindParam(':nombre',      $nombre,      PDO::PARAM_STR);
        $stmt->bindParam(':stock',       $stock);
        $stmt->bindParam(':unidad',      $unidad,      PDO::PARAM_STR);
        $stmt->bindParam(':vencimiento', $vencimiento, PDO::PARAM_STR);
        $stmt->bindParam(':minimo',      $minimo);
        $stmt->bindParam(':foto',        $foto,        PDO::PARAM_STR);
        $stmt->bindParam(':fecha',       $fecha,       PDO::PARAM_STR);
        return $stmt->execute();
    }

    /**
     * Actualiza un insumo existente.
     * Si $foto es null no se toca la columna foto_referencia.
     */
    public function actualizarInsumo($id, $nombre, $stock, $unidad, $vencimiento, $minimo, $fecha, $foto = null) {
        if ($foto !== null) {
            $sql = "UPDATE insumo
                    SET nombre = :nombre, stock_actual = :stock, unidad_medida = :unidad,
                        fecha_vencimiento = :vencimiento, cantidad_minima = :minimo,
                        foto_referencia = :foto, fecha_registro = :fecha
                    WHERE id_insumo = :id";
        } else {
            $sql = "UPDATE insumo
                    SET nombre = :nombre, stock_actual = :stock, unidad_medida = :unidad,
                        fecha_vencimiento = :vencimiento, cantidad_minima = :minimo,
                        fecha_registro = :fecha
                    WHERE id_insumo = :id";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',          $id,          PDO::PARAM_INT);
        $stmt->bindParam(':nombre',      $nombre,      PDO::PARAM_STR);
        $stmt->bindParam(':stock',       $stock);
        $stmt->bindParam(':unidad',      $unidad,      PDO::PARAM_STR);
        $stmt->bindParam(':vencimiento', $vencimiento, PDO::PARAM_STR);
        $stmt->bindParam(':minimo',      $minimo);
        $stmt->bindParam(':fecha',       $fecha,       PDO::PARAM_STR);
        if ($foto !== null) {
            $stmt->bindParam(':foto', $foto, PDO::PARAM_STR);
        }
        return $stmt->execute();
    }

    /**
     * Elimina un insumo por su ID.
     */
    public function eliminarInsumo($id) {
        $stmt = $this->conn->prepare(
            "DELETE FROM insumo WHERE id_insumo = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // ══════════════════════════════════════════════════════
    //  RESUMEN (tarjetas superiores)
    // ══════════════════════════════════════════════════════

    /**
     * Estadísticas rápidas para las tarjetas del módulo.
     */
    public function resumen() {
        // Herramientas
        $h = $this->conn->query(
            "SELECT COUNT(*) AS total,
                    SUM(CASE WHEN estado = 'DISPONIBLE'    THEN 1 ELSE 0 END) AS disponibles,
                    SUM(CASE WHEN estado = 'MANTENIMIENTO' THEN 1 ELSE 0 END) AS mantenimiento,
                    SUM(CASE WHEN estado = 'DAÑADA'        THEN 1 ELSE 0 END) AS danadas
             FROM herramienta"
        )->fetch(PDO::FETCH_ASSOC);

        // Insumos
        $i = $this->conn->query(
            "SELECT COUNT(*) AS total,
                    SUM(CASE WHEN stock_actual <= cantidad_minima THEN 1 ELSE 0 END) AS en_alerta
             FROM insumo"
        )->fetch(PDO::FETCH_ASSOC);

        return [
            'herramientas_total'       => (int) $h['total'],
            'herramientas_disponibles' => (int) $h['disponibles'],
            'herramientas_mantenimiento'=> (int) $h['mantenimiento'],
            'herramientas_danadas'     => (int) $h['danadas'],
            'insumos_total'            => (int) $i['total'],
            'insumos_alerta'           => (int) $i['en_alerta'],
        ];
    }
}
?>
