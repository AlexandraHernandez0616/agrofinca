<?php
/**
 * ============================================================
 * ARCHIVO: models/Perfil.php
 * PROPÓSITO: Operaciones de BD para el módulo Perfil de usuario
 * ============================================================
 * Tabla: usuario
 * Columnas usadas:
 *   id_usuario, nombres, apellidos, documento, telefono,
 *   username, rol, activo, fecha_creacion
 * ============================================================
 */
class Perfil {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Obtiene todos los datos del usuario logueado.
     */
    public function obtener(int $id): array|false {
        $stmt = $this->conn->prepare(
            "SELECT id_usuario, nombres, apellidos, documento,
                    telefono, username, rol, activo, fecha_creacion
             FROM usuario
             WHERE id_usuario = :id
             LIMIT 1"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Actualiza los datos personales del usuario.
     * No toca password_hash ni rol.
     */
    public function actualizarDatos(
        int    $id,
        string $nombres,
        string $apellidos,
        string $documento,
        string $telefono
    ): bool {
        $stmt = $this->conn->prepare(
            "UPDATE usuario
             SET nombres   = :nombres,
                 apellidos = :apellidos,
                 documento = :documento,
                 telefono  = :telefono
             WHERE id_usuario = :id"
        );
        $stmt->bindParam(':nombres',   $nombres,   PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':documento', $documento, PDO::PARAM_STR);
        $stmt->bindParam(':telefono',  $telefono,  PDO::PARAM_STR);
        $stmt->bindParam(':id',        $id,        PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Cambia la contraseña del usuario.
     * Recibe el hash ya generado con password_hash().
     */
    public function cambiarPassword(int $id, string $hash): bool {
        $stmt = $this->conn->prepare(
            "UPDATE usuario SET password_hash = :hash WHERE id_usuario = :id"
        );
        $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
        $stmt->bindParam(':id',   $id,   PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Verifica si la contraseña actual es correcta.
     */
    public function verificarPassword(int $id, string $password_actual): bool {
        $stmt = $this->conn->prepare(
            "SELECT password_hash FROM usuario WHERE id_usuario = :id LIMIT 1"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return false;
        return password_verify($password_actual, $row['password_hash']);
    }

    /**
     * Verifica si un documento ya está en uso por otro usuario.
     */
    public function documentoEnUso(string $documento, int $excluir_id): bool {
        $stmt = $this->conn->prepare(
            "SELECT id_usuario FROM usuario
             WHERE documento = :doc AND id_usuario != :id
             LIMIT 1"
        );
        $stmt->bindParam(':doc', $documento, PDO::PARAM_STR);
        $stmt->bindParam(':id',  $excluir_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
?>
