<?php
/**
 * ============================================================
 * ARCHIVO: models/Usuario.php
 * PROPÓSITO: Modelo que maneja todas las operaciones de BD
 *            relacionadas con usuarios y solicitudes de registro
 * ============================================================
 *
 * Tablas que usa:
 *   - usuario           → usuarios activos del sistema
 *   - solicitud_registro → solicitudes pendientes de aprobación
 *
 * Lo usan:
 *   - LoginController.php    → para autenticar usuarios
 *   - UsuarioController.php  → para registrar nuevas solicitudes
 * ============================================================
 */
class Usuario {

    private $conn;
    private $tabla = "usuario"; // Tabla principal de usuarios activos

    /**
     * Recibe la conexión PDO desde el controller.
     * @param PDO $db
     */
    public function __construct($db) {
        $this->conn = $db;
    }

    // ──────────────────────────────────────────────────────
    // MÉTODO: existeUsuario
    // Verifica si un username ya está registrado en la tabla
    // usuario. Se usa para evitar duplicados antes de insertar.
    // Retorna: true si existe, false si no.
    // ──────────────────────────────────────────────────────
    public function existeUsuario($nombre_de_usuario) {
        $sql  = "SELECT id_usuario FROM " . $this->tabla . " WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":username", $nombre_de_usuario);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    // ──────────────────────────────────────────────────────
    // MÉTODO: obtenerPorUsuario
    // Busca un usuario activo por su username.
    // Lo usa LoginController para verificar credenciales.
    // Solo retorna usuarios con activo = 1 (no desactivados).
    // Retorna: array con todos los datos del usuario, o false.
    // ──────────────────────────────────────────────────────
    public function obtenerPorUsuario($username) {
        $sql  = "SELECT * FROM " . $this->tabla . " WHERE username = :username AND activo = 1 LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ──────────────────────────────────────────────────────
    // MÉTODO: registrar
    // Inserta una nueva solicitud de registro en la tabla
    // solicitud_registro. El registro queda en estado
    // 'PENDIENTE' hasta que un mayordomo lo apruebe.
    //
    // IMPORTANTE: NO inserta directamente en la tabla usuario.
    // El flujo es: solicitud → aprobación → usuario activo.
    //
    // Recibe: array $datos con las claves:
    //   nombres, apellidos, documento, telefono, eps,
    //   RH, nombre_de_usuario, contraseña (ya hasheada)
    //
    // Retorna: true si fue exitoso, string con error si falló.
    // ──────────────────────────────────────────────────────
    public function registrar($datos) {
        try {
            $this->conn->beginTransaction();

            $sql = "INSERT INTO solicitud_registro
                        (nombres, apellidos, documento, telefono, eps, rh, username, password_hash)
                    VALUES
                        (:nombres, :apellidos, :documento, :telefono, :eps, :rh, :username, :password_hash)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nombres",       $datos['nombres']);
            $stmt->bindParam(":apellidos",     $datos['apellidos']);
            $stmt->bindParam(":documento",     $datos['documento']);
            $stmt->bindParam(":telefono",      $datos['telefono']);
            $stmt->bindParam(":eps",           $datos['eps']);
            $stmt->bindParam(":rh",            $datos['RH']);
            $stmt->bindParam(":username",      $datos['nombre_de_usuario']);
            $stmt->bindParam(":password_hash", $datos['contraseña']); // Ya viene hasheada con bcrypt
            $stmt->execute();

            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            // Si algo falla, revierte todos los cambios
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            return "Error al registrar: " . $e->getMessage();
        }
    }
}
?>
