<?php
/**
 * ============================================================
 * ARCHIVO: controllers/SolicitudController.php
 * PROPÓSITO: Procesa las acciones de aprobar y rechazar
 *            solicitudes de registro de trabajadores.
 * ============================================================
 * Quién lo llama:
 *   views/mayordomo/solicitudes.php → fetch() POST con JSON
 *
 * Acciones disponibles (campo POST 'accion'):
 *   aprobar  → llama Solicitud::aprobar()
 *   rechazar → llama Solicitud::rechazar()
 *
 * Responde siempre JSON: { ok: true/false, msg: '...' }
 *
 * Protección:
 *   Solo usuarios con rol = 'MAYORDOMO' pueden usar este controller.
 * ============================================================
 */
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Solicitud.php';
require_once __DIR__ . '/../models/Notificacion.php';

// Solo mayordomos
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    echo json_encode(['ok' => false, 'msg' => 'Sin autorización']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
    exit;
}

$accion       = trim($_POST['accion']       ?? '');
$id_solicitud = (int)($_POST['id_solicitud'] ?? 0);
$id_mayordomo = (int) $_SESSION['id_usuario'];

if (!$id_solicitud) {
    echo json_encode(['ok' => false, 'msg' => 'ID de solicitud inválido']);
    exit;
}

$db    = (new Database())->conectar();
$model = new Solicitud($db);

// ── APROBAR ───────────────────────────────────────────────
if ($accion === 'aprobar') {
    $resultado = $model->aprobar($id_solicitud, $id_mayordomo);
    if ($resultado === true) {
        // Notificar a todos los administradores que se aprobó un trabajador
        try {
            $admins = $db->query(
                "SELECT id_usuario FROM usuario WHERE rol = 'ADMINISTRADOR' AND activo = 1"
            )->fetchAll(PDO::FETCH_COLUMN);
            Notificacion::enviarAVarios(
                $db,
                $admins,
                'success',
                "El mayordomo aprobó una solicitud de registro de trabajador.",
                '../../views/admin/trabajadores.php'
            );
        } catch (Exception $e) { /* no interrumpir */ }
        echo json_encode(['ok' => true, 'msg' => 'Trabajador aprobado y cuenta creada correctamente']);
    } else {
        echo json_encode(['ok' => false, 'msg' => $resultado]);
    }
    exit;
}

// ── RECHAZAR ──────────────────────────────────────────────
if ($accion === 'rechazar') {
    $observacion = trim($_POST['observacion'] ?? '');
    $resultado   = $model->rechazar($id_solicitud, $id_mayordomo, $observacion);
    if ($resultado === true) {
        // Notificar a todos los administradores que se rechazó una solicitud
        try {
            $admins = $db->query(
                "SELECT id_usuario FROM usuario WHERE rol = 'ADMINISTRADOR' AND activo = 1"
            )->fetchAll(PDO::FETCH_COLUMN);
            $motivo = $observacion ? " Motivo: $observacion" : '';
            Notificacion::enviarAVarios(
                $db,
                $admins,
                'warning',
                "El mayordomo rechazó una solicitud de registro de trabajador.$motivo",
                '../../views/admin/trabajadores.php'
            );
        } catch (Exception $e) { /* no interrumpir */ }
        echo json_encode(['ok' => true, 'msg' => 'Solicitud rechazada correctamente']);
    } else {
        echo json_encode(['ok' => false, 'msg' => $resultado]);
    }
    exit;
}

echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
?>
