<?php
/**
 * ============================================================
 * ARCHIVO: controllers/PerfilController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Perfil
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   actualizar_datos   → Actualiza nombres, apellidos, documento, teléfono
 *   cambiar_password   → Cambia la contraseña verificando la actual
 *
 * Responde con JSON: { "ok": true/false, "mensaje": "..." }
 * ============================================================
 */

session_start();

if (!isset($_SESSION['id_usuario'])) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Sesión no iniciada']);
    exit;
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Perfil.php';

header('Content-Type: application/json');

$db     = (new Database())->conectar();
$model  = new Perfil($db);
$id     = (int) $_SESSION['id_usuario'];
$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── ACTUALIZAR DATOS PERSONALES ───────────────────
        case 'actualizar_datos':
            $nombres   = trim($_POST['nombres']   ?? '');
            $apellidos = trim($_POST['apellidos'] ?? '');
            $documento = trim($_POST['documento'] ?? '');
            $telefono  = trim($_POST['telefono']  ?? '');

            if ($nombres === '' || $apellidos === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'Nombre y apellido son obligatorios']);
                exit;
            }
            if ($documento === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'El documento es obligatorio']);
                exit;
            }
            if ($model->documentoEnUso($documento, $id)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Ese documento ya está registrado por otro usuario']);
                exit;
            }

            $ok = $model->actualizarDatos($id, $nombres, $apellidos, $documento, $telefono);

            // Actualizar nombre en sesión para que el topbar lo refleje
            if ($ok) {
                $_SESSION['nombre_completo'] = $nombres . ' ' . $apellidos;
            }

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Datos actualizados correctamente' : 'Error al actualizar los datos',
            ]);
            break;

        // ── CAMBIAR CONTRASEÑA ────────────────────────────
        case 'cambiar_password':
            $actual    = $_POST['password_actual']    ?? '';
            $nueva     = $_POST['password_nueva']     ?? '';
            $confirmar = $_POST['password_confirmar'] ?? '';

            if ($actual === '' || $nueva === '' || $confirmar === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'Todos los campos de contraseña son obligatorios']);
                exit;
            }
            if (strlen($nueva) < 6) {
                echo json_encode(['ok' => false, 'mensaje' => 'La nueva contraseña debe tener al menos 6 caracteres']);
                exit;
            }
            if ($nueva !== $confirmar) {
                echo json_encode(['ok' => false, 'mensaje' => 'La nueva contraseña y su confirmación no coinciden']);
                exit;
            }
            if (!$model->verificarPassword($id, $actual)) {
                echo json_encode(['ok' => false, 'mensaje' => 'La contraseña actual es incorrecta']);
                exit;
            }

            $hash = password_hash($nueva, PASSWORD_BCRYPT);
            $ok   = $model->cambiarPassword($id, $hash);

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Contraseña actualizada correctamente' : 'Error al cambiar la contraseña',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
