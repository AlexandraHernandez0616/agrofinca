<?php
/**
 * ============================================================
 * ARCHIVO: models/Mayordomo.php
 * PROPÓSITO: Operaciones de BD para el módulo de Mayordomos
 * ============================================================
 * Tabla principal: usuario (WHERE rol = 'MAYORDOMO')
 * Usado por: MayordomoController.php
 * ============================================================
 */
class Mayordomo {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lista todos los mayordomos con búsqueda opcional por nombre,
     * apellido o documento.
     * @param string $busqueda Texto a buscar (vacío = todos)
     * @return array
     */
    public function listar($busqueda = '') {
        $sql = "SELECT id_usuario, nombres, apellidos, documento,
                       username, activo, fecha_creacion
                FROM usuario
                WHERE rol = 'MAYORDOMO'";

        if (!empty($busqueda)) {
            $sql .= " AND (nombres LIKE :b OR apellidos LIKE :b OR documento LIKE :b)";
        }

        $sql .= " ORDER BY fecha_creacion DESC";

        $stmt = $this->conn->prepare($sql);

        if (!empty($busqueda)) {
            $like = '%' . $busqueda . '%';
            $stmt->bindParam(':b', $like);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un mayordomo por su ID.
     * @param int $id
     * @return array|false
     */
    public function obtenerPorId($id) {
        $sql  = "SELECT id_usuario, nombres, apellidos, documento,
                        username, activo, fecha_creacion
                 FROM usuario
                 WHERE id_usuario = :id AND rol = 'MAYORDOMO'
                 LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Verifica si un username ya existe en la tabla usuario.
     * @param string $username
     * @param int|null $excluir_id ID a excluir (para edición)
     * @return bool
     */
    public function existeUsername($username, $excluir_id = null) {
        $sql  = "SELECT id_usuario FROM usuario WHERE username = :u";
        if ($excluir_id) $sql .= " AND id_usuario != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':u', $username);
        if ($excluir_id) $stmt->bindParam(':id', $excluir_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Verifica si un documento ya existe en la tabla usuario.
     * @param string $documento
     * @param int|null $excluir_id
     * @return bool
     */
    public function existeDocumento($documento, $excluir_id = null) {
        $sql  = "SELECT id_usuario FROM usuario WHERE documento = :d";
        if ($excluir_id) $sql .= " AND id_usuario != :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':d', $documento);
        if ($excluir_id) $stmt->bindParam(':id', $excluir_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    /**
     * Registra un nuevo mayordomo en la tabla usuario.
     * @param array $datos [nombres, apellidos, documento, username, password_hash, activo]
     * @return true|string true si éxito, mensaje de error si falla
     */
    public function registrar($datos) {
        try {
            $sql  = "INSERT INTO usuario
                        (nombres, apellidos, documento, username, password_hash, rol, activo, fecha_creacion)
                     VALUES
                        (:nombres, :apellidos, :documento, :username, :password_hash, 'MAYORDOMO', :activo, NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombres',       $datos['nombres']);
            $stmt->bindParam(':apellidos',     $datos['apellidos']);
            $stmt->bindParam(':documento',     $datos['documento']);
            $stmt->bindParam(':username',      $datos['username']);
            $stmt->bindParam(':password_hash', $datos['password_hash']);
            $stmt->bindParam(':activo',        $datos['activo'], PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al registrar: " . $e->getMessage();
        }
    }

    /**
     * Actualiza los datos de un mayordomo.
     * Si se envía nueva contraseña la actualiza, si no la deja igual.
     * @param int $id
     * @param array $datos
     * @return true|string
     */
    public function actualizar($id, $datos) {
        try {
            $sql = "UPDATE usuario SET
                        nombres   = :nombres,
                        apellidos = :apellidos,
                        documento = :documento,
                        username  = :username,
                        activo    = :activo";

            if (!empty($datos['password_hash'])) {
                $sql .= ", password_hash = :password_hash";
            }

            $sql .= " WHERE id_usuario = :id AND rol = 'MAYORDOMO'";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombres',   $datos['nombres']);
            $stmt->bindParam(':apellidos', $datos['apellidos']);
            $stmt->bindParam(':documento', $datos['documento']);
            $stmt->bindParam(':username',  $datos['username']);
            $stmt->bindParam(':activo',    $datos['activo'], PDO::PARAM_INT);
            $stmt->bindParam(':id',        $id, PDO::PARAM_INT);

            if (!empty($datos['password_hash'])) {
                $stmt->bindParam(':password_hash', $datos['password_hash']);
            }

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al actualizar: " . $e->getMessage();
        }
    }
}
?>
