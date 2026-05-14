<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoCultivoController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Cultivos (mayordomo)
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   registrar     → Crea un nuevo cultivo
 *   editar        → Actualiza un cultivo existente
 *   toggle_estado → Cambia estado ACTIVO ↔ INHABILITADO
 *   eliminar      → Elimina un cultivo (solo si no tiene lotes)
 *
 * Responde con JSON: { "ok": true/false, "mensaje": "..." }
 * ============================================================
 */

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
    exit;
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/MayordomoCultivo.php';

header('Content-Type: application/json');

$db     = (new Database())->conectar();
$model  = new MayordomoCultivo($db);
$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── REGISTRAR ─────────────────────────────────────
        case 'registrar':
            $nombre   = trim($_POST['nombre']             ?? '');
            $variedad = trim($_POST['variedad']           ?? '');
            $cantidad = (float) ($_POST['cantidad_cultivada'] ?? 0);
            $fecha    = trim($_POST['fecha_registro']     ?? date('Y-m-d'));
            $estado   = trim($_POST['estado']             ?? 'ACTIVO');

            if ($nombre === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'El nombre del cultivo es obligatorio']);
                exit;
            }
            if ($variedad === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'La variedad es obligatoria']);
                exit;
            }
            if ($model->existeDuplicado($nombre, $variedad)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Ya existe un cultivo con ese nombre y variedad']);
                exit;
            }

            $ok = $model->registrar($nombre, $variedad, $cantidad, $fecha, $estado);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Cultivo registrado correctamente' : 'Error al registrar el cultivo',
            ]);
            break;

        // ── EDITAR ────────────────────────────────────────
        case 'editar':
            $id       = (int)   ($_POST['id']                 ?? 0);
            $nombre   = trim($_POST['nombre']                 ?? '');
            $variedad = trim($_POST['variedad']               ?? '');
            $cantidad = (float) ($_POST['cantidad_cultivada'] ?? 0);
            $fecha    = trim($_POST['fecha_registro']         ?? '');
            $estado   = trim($_POST['estado']                 ?? 'ACTIVO');

            if ($id <= 0 || $nombre === '' || $variedad === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
                exit;
            }
            if ($model->existeDuplicado($nombre, $variedad, $id)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Ya existe otro cultivo con ese nombre y variedad']);
                exit;
            }

            $ok = $model->editar($id, $nombre, $variedad, $cantidad, $fecha, $estado);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Cultivo actualizado correctamente' : 'Error al actualizar el cultivo',
            ]);
            break;

        // ── TOGGLE ESTADO ─────────────────────────────────
        case 'toggle_estado':
            $id     = (int)   ($_POST['id']     ?? 0);
            $estado = strtoupper(trim($_POST['estado'] ?? ''));

            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            if (!in_array($estado, ['ACTIVO', 'INHABILITADO'], true)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Estado inválido']);
                exit;
            }

            $ok = $model->toggleEstado($id, $estado);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok
                    ? ($estado === 'ACTIVO' ? 'Cultivo habilitado' : 'Cultivo inhabilitado')
                    : 'Error al cambiar el estado',
            ]);
            break;

        // ── ELIMINAR ──────────────────────────────────────
        case 'eliminar':
            $id = (int) ($_POST['id'] ?? 0);

            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            if ($model->tieneLotes($id)) {
                echo json_encode([
                    'ok'      => false,
                    'mensaje' => 'No se puede eliminar: el cultivo tiene lotes asociados',
                ]);
                exit;
            }

            $ok = $model->eliminar($id);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Cultivo eliminado correctamente' : 'Error al eliminar el cultivo',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
