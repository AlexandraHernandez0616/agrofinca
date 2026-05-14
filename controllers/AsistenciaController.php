<?php
/**
 * ============================================================
 * ARCHIVO: controllers/AsistenciaController.php
 * PROPÓSITO: Procesa el registro de asistencia de trabajadores
 *            desde el módulo Trabajadores del mayordomo.
 * ============================================================
 * Quién lo llama:
 *   views/mayordomo/trabajadores.php → fetch() POST con JSON
 *
 * Acción disponible (campo POST 'accion'):
 *   marcar → registra o actualiza la asistencia del día
 *
 * Campos POST requeridos:
 *   accion        → 'marcar'
 *   id_trabajador → ID del trabajador
 *   hora_entrada  → HH:MM
 *   hora_salida   → HH:MM (opcional, puede estar vacío)
 *
 * Responde JSON: { ok: true/false, msg: '...' }
 *
 * Protección: solo rol MAYORDOMO puede usar este controller.
 * ============================================================
 */
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/TrabajadorMayordomo.php';

// Solo mayordomos
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    echo json_encode(['ok' => false, 'msg' => 'Sin autorización']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
    exit;
}

$accion        = trim($_POST['accion']        ?? '');
$id_trabajador = (int)($_POST['id_trabajador'] ?? 0);
$hora_entrada  = trim($_POST['hora_entrada']   ?? '');
$hora_salida   = trim($_POST['hora_salida']    ?? '') ?: null;

// ── MARCAR ASISTENCIA ─────────────────────────────────────
if ($accion === 'marcar') {

    if (!$id_trabajador) {
        echo json_encode(['ok' => false, 'msg' => 'Trabajador no válido']);
        exit;
    }
    if (empty($hora_entrada)) {
        echo json_encode(['ok' => false, 'msg' => 'La hora de entrada es obligatoria']);
        exit;
    }

    $db        = (new Database())->conectar();
    $model     = new TrabajadorMayordomo($db);
    $resultado = $model->marcarAsistencia($id_trabajador, $hora_entrada, $hora_salida);

    if ($resultado === true) {
        echo json_encode(['ok' => true, 'msg' => 'Asistencia registrada correctamente']);
    } else {
        echo json_encode(['ok' => false, 'msg' => $resultado]);
    }
    exit;
}

echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
?>
