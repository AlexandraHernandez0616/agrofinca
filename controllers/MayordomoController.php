<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoController.php
 * PROPÓSITO: Maneja las acciones del módulo Mayordomos
 * ============================================================
 * Acciones disponibles (via POST campo 'accion'):
 *   registrar  → crea un nuevo mayordomo
 *   actualizar → edita datos de un mayordomo existente
 *
 * Todas las respuestas son JSON para ser consumidas por fetch()
 * desde la vista mayordomos.php
 * ============================================================
 */
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Mayordomo.php';

// Solo administradores
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    echo json_encode(['ok' => false, 'msg' => 'Sin autorización']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
    exit;
}

$accion = trim($_POST['accion'] ?? '');
$db     = (new Database())->conectar();
$model  = new Mayordomo($db);

// ── REGISTRAR ────────────────────────────────────────────────
if ($accion === 'registrar') {

    $nombres   = trim($_POST['nombres']   ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $documento = trim($_POST['documento'] ?? '');
    $username  = trim($_POST['username']  ?? '');
    $password  = trim($_POST['password']  ?? '');
    $activo    = isset($_POST['activo']) ? 1 : 0;

    // Validaciones
    if (empty($nombres) || empty($apellidos) || empty($documento) || empty($username) || empty($password)) {
        echo json_encode(['ok' => false, 'msg' => 'Todos los campos son obligatorios']);
        exit;
    }
    if (strlen($password) < 6) {
        echo json_encode(['ok' => false, 'msg' => 'La contraseña debe tener al menos 6 caracteres']);
        exit;
    }
    if ($model->existeUsername($username)) {
        echo json_encode(['ok' => false, 'msg' => 'El nombre de usuario ya está en uso']);
        exit;
    }
    if ($model->existeDocumento($documento)) {
        echo json_encode(['ok' => false, 'msg' => 'El documento ya está registrado']);
        exit;
    }

    $datos = [
        'nombres'       => $nombres,
        'apellidos'     => $apellidos,
        'documento'     => $documento,
        'username'      => $username,
        'password_hash' => password_hash($password, PASSWORD_BCRYPT),
        'activo'        => $activo,
    ];

    $resultado = $model->registrar($datos);
    if ($resultado === true) {
        echo json_encode(['ok' => true, 'msg' => 'Mayordomo registrado correctamente']);
    } else {
        echo json_encode(['ok' => false, 'msg' => $resultado]);
    }
    exit;
}

// ── ACTUALIZAR ───────────────────────────────────────────────
if ($accion === 'actualizar') {

    $id        = (int) ($_POST['id']        ?? 0);
    $nombres   = trim($_POST['nombres']     ?? '');
    $apellidos = trim($_POST['apellidos']   ?? '');
    $documento = trim($_POST['documento']   ?? '');
    $username  = trim($_POST['username']    ?? '');
    $password  = trim($_POST['password']    ?? '');
    $activo    = isset($_POST['activo']) ? 1 : 0;

    if (!$id || empty($nombres) || empty($apellidos) || empty($documento) || empty($username)) {
        echo json_encode(['ok' => false, 'msg' => 'Datos incompletos']);
        exit;
    }
    if ($model->existeUsername($username, $id)) {
        echo json_encode(['ok' => false, 'msg' => 'El nombre de usuario ya está en uso']);
        exit;
    }
    if ($model->existeDocumento($documento, $id)) {
        echo json_encode(['ok' => false, 'msg' => 'El documento ya está registrado']);
        exit;
    }

    $datos = [
        'nombres'   => $nombres,
        'apellidos' => $apellidos,
        'documento' => $documento,
        'username'  => $username,
        'activo'    => $activo,
    ];

    if (!empty($password)) {
        if (strlen($password) < 6) {
            echo json_encode(['ok' => false, 'msg' => 'La contraseña debe tener al menos 6 caracteres']);
            exit;
        }
        $datos['password_hash'] = password_hash($password, PASSWORD_BCRYPT);
    }

    $resultado = $model->actualizar($id, $datos);
    if ($resultado === true) {
        echo json_encode(['ok' => true, 'msg' => 'Mayordomo actualizado correctamente']);
    } else {
        echo json_encode(['ok' => false, 'msg' => $resultado]);
    }
    exit;
}

echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
?>
