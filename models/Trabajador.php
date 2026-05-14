<?php
/**
 * ============================================================
 * ARCHIVO: models/Trabajador.php
 * PROPÓSITO: Operaciones de BD para el módulo de Trabajadores
 * ============================================================
 * Tablas: usuario JOIN trabajador
 * Usado por: TrabajadorController.php
 * ============================================================
 */
class Trabajador {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lista todos los trabajadores con búsqueda y filtro de estado.
     * @param string $busqueda  Texto libre (nombre, apellido, documento)
     * @param string $estado    'ACTIVO', 'En labor', 'Inactivo' o '' para todos
     * @return array
     */
    public function listar($busqueda = '', $estado = '') {
        $sql = "SELECT u.id_usuario, u.nombres, u.apellidos, u.documento,
                       t.eps, t.rh, t.estado_trabajador, t.fecha_ingreso
                FROM trabajador t
                INNER JOIN usuario u ON u.id_usuario = t.id_trabajador
                WHERE 1=1";

        if (!empty($busqueda)) {
            $sql .= " AND (u.nombres LIKE :b OR u.apellidos LIKE :b OR u.documento LIKE :b)";
        }
        if (!empty($estado)) {
            $sql .= " AND t.estado_trabajador = :estado";
        }

        $sql .= " ORDER BY t.fecha_ingreso DESC";

        $stmt = $this->conn->prepare($sql);

        if (!empty($busqueda)) {
            $like = '%' . $busqueda . '%';
            $stmt->bindParam(':b', $like);
        }
        if (!empty($estado)) {
            $stmt->bindParam(':estado', $estado);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un trabajador completo por su ID.
     * @param int $id
     * @return array|false
     */
    public function obtenerPorId($id) {
        $sql  = "SELECT u.id_usuario, u.nombres, u.apellidos, u.documento,
                        u.username, u.activo,
                        t.eps, t.rh, t.estado_trabajador, t.fecha_ingreso
                 FROM trabajador t
                 INNER JOIN usuario u ON u.id_usuario = t.id_trabajador
                 WHERE t.id_trabajador = :id
                 LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lista los estados únicos disponibles para el filtro.
     * @return array
     */
    public function obtenerEstados() {
        $stmt = $this->conn->query("SELECT DISTINCT estado_trabajador FROM trabajador ORDER BY estado_trabajador");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
?>
