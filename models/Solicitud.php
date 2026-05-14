<?php
/**
 * ============================================================
 * ARCHIVO: models/Solicitud.php
 * PROPÓSITO: Operaciones de BD para el módulo de Solicitudes
 *            de registro de trabajadores.
 * ============================================================
 * Tablas que usa:
 *   - solicitud_registro  → solicitudes pendientes/gestionadas
 *   - usuario             → se inserta aquí al aprobar
 *   - trabajador          → se inserta aquí al aprobar
 *
 * Usado por: SolicitudController.php
 *
 * Flujo de aprobación:
 *   1. Mayordomo aprueba → INSERT en usuario (rol=TRABAJADOR)
 *   2.                   → INSERT en trabajador
 *   3.                   → UPDATE solicitud_registro estado='APROBADA'
 *
 * Flujo de rechazo:
 *   1. Mayordomo rechaza → UPDATE solicitud_registro estado='RECHAZADA'
 * ============================================================
 */
class Solicitud {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lista todas las solicitudes con estado PENDIENTE.
     * Solo estas se muestran en la tabla del mayordomo.
     * @return array
     */
    public function listarPendientes() {
        $sql = "SELECT id_solicitud, nombres, apellidos, documento,
                       username, eps, rh, fecha_solicitud
                FROM solicitud_registro
                WHERE estado = 'PENDIENTE'
                ORDER BY fecha_solicitud ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una solicitud por su ID.
     * Se usa para verificar que existe antes de aprobar/rechazar.
     * @param int $id
     * @return array|false
     */
    public function obtenerPorId($id) {
        $sql  = "SELECT * FROM solicitud_registro WHERE id_solicitud = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Aprueba una solicitud:
     *   1. Inserta el usuario en tabla 'usuario' con rol TRABAJADOR
     *   2. Inserta en tabla 'trabajador' con los datos de la solicitud
     *   3. Actualiza solicitud_registro a estado 'APROBADA'
     * Todo dentro de una transacción para garantizar integridad.
     *
     * @param int   $id_solicitud
     * @param int   $id_mayordomo  ID del mayordomo que aprueba
     * @return true|string  true si éxito, mensaje de error si falla
     */
    public function aprobar($id_solicitud, $id_mayordomo) {
        try {
            $this->conn->beginTransaction();

            // Obtener datos de la solicitud
            $sol = $this->obtenerPorId($id_solicitud);
            if (!$sol) throw new Exception("Solicitud no encontrada");

            // 1. Insertar en tabla usuario
            $sqlU = "INSERT INTO usuario
                        (nombres, apellidos, documento, telefono, username,
                         password_hash, rol, activo, fecha_creacion)
                     VALUES
                        (:nombres, :apellidos, :documento, :telefono, :username,
                         :password_hash, 'TRABAJADOR', 1, NOW())";
            $stmtU = $this->conn->prepare($sqlU);
            $stmtU->bindParam(':nombres',       $sol['nombres']);
            $stmtU->bindParam(':apellidos',     $sol['apellidos']);
            $stmtU->bindParam(':documento',     $sol['documento']);
            $stmtU->bindParam(':telefono',      $sol['telefono']);
            $stmtU->bindParam(':username',      $sol['username']);
            $stmtU->bindParam(':password_hash', $sol['password_hash']);
            $stmtU->execute();

            $id_usuario = $this->conn->lastInsertId();

            // 2. Insertar en tabla trabajador
            $sqlT = "INSERT INTO trabajador
                        (id_trabajador, eps, rh, estado_trabajador, fecha_ingreso)
                     VALUES
                        (:id, :eps, :rh, 'ACTIVO', CURDATE())";
            $stmtT = $this->conn->prepare($sqlT);
            $stmtT->bindParam(':id',  $id_usuario, PDO::PARAM_INT);
            $stmtT->bindParam(':eps', $sol['eps']);
            $stmtT->bindParam(':rh',  $sol['rh']);
            $stmtT->execute();

            // 3. Actualizar solicitud a APROBADA
            $sqlS = "UPDATE solicitud_registro
                     SET estado = 'APROBADA',
                         fecha_gestion = NOW(),
                         id_mayordomo_gestor = :mayordomo
                     WHERE id_solicitud = :id";
            $stmtS = $this->conn->prepare($sqlS);
            $stmtS->bindParam(':mayordomo', $id_mayordomo, PDO::PARAM_INT);
            $stmtS->bindParam(':id',        $id_solicitud, PDO::PARAM_INT);
            $stmtS->execute();

            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            if ($this->conn->inTransaction()) $this->conn->rollBack();
            return "Error al aprobar: " . $e->getMessage();
        }
    }

    /**
     * Rechaza una solicitud:
     *   Actualiza solicitud_registro a estado 'RECHAZADA'
     *   y guarda la observación del mayordomo.
     *
     * @param int    $id_solicitud
     * @param int    $id_mayordomo
     * @param string $observacion  Motivo del rechazo
     * @return true|string
     */
    public function rechazar($id_solicitud, $id_mayordomo, $observacion = '') {
        try {
            $sql  = "UPDATE solicitud_registro
                     SET estado = 'RECHAZADA',
                         fecha_gestion = NOW(),
                         id_mayordomo_gestor = :mayordomo,
                         observacion = :obs
                     WHERE id_solicitud = :id AND estado = 'PENDIENTE'";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':mayordomo', $id_mayordomo, PDO::PARAM_INT);
            $stmt->bindParam(':obs',       $observacion);
            $stmt->bindParam(':id',        $id_solicitud, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                return "La solicitud no existe o ya fue gestionada";
            }
            return true;
        } catch (Exception $e) {
            return "Error al rechazar: " . $e->getMessage();
        }
    }
}
?>
