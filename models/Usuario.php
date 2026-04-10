<?php
class Usuario {
    private $conn;
    private $tabla = "usuarios";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function existeCorreo($usuario) {
        $sql = "SELECT id_usuario FROM " . $this->tabla . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function obtenerPorUusuario($usuario) {
        $sql = "SELECT * FROM " . $this->tabla . " WHERE email = :email AND activo = 1 LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function registrar($datos) {
        try {
            $this->conn->beginTransaction();

            $sqlUsuario = "INSERT INTO usuarios
                (nombres, apellidos, documento, eps, RH, nombre_de_usuario, contraseña, created_at)
                VALUES
                (:nombres, :apellidos, :documento, :eps, :RH, :nombre_de_usuario, :contraseña, 1, NOW())";

            $stmtUsuario = $this->conn->prepare($sqlUsuario);
            $stmtUsuario->bindParam(":nombres", $datos['nombres']);
            $stmtUsuario->bindParam(":apellidos", $datos['apellidos']);
            $stmtUsuario->bindParam(":documento", $datos['documento']);
            $stmtUsuario->bindParam(":eps", $datos['eps']);
            $stmtUsuario->bindParam(":RH", $datos['RH']);
            $stmtUsuario->bindParam(":nombre_de_usuario", $datos['nombre_de_usuario']);
            $stmtUsuario->bindParam(":contraseña", $datos['contraeña']);
            $stmtUsuario->execute();

            $id_usuario = $this->conn->lastInsertId();


            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            return "Error al registrar: " . $e->getMessage();
        }
    }
}
?>