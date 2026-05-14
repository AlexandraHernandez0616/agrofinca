<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoProduccionController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Producción (mayordomo)
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   registrar  → Crea un nuevo registro de producción
 *   editar     → Actualiza un registro existente
 *   eliminar   → Elimina un registro por ID
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
require_once __DIR__ . '/../models/MayordomoProduccion.php';

header('Content-Type: application/json');

$db           = (new Database())->conectar();
$model        = new MayordomoProduccion($db);
$id_mayordomo = (int) $_SESSION['id_usuario'];
$accion       = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── REGISTRAR ─────────────────────────────────────
        case 'registrar':
            $id_trabajador = (int)   ($_POST['id_trabajador'] ?? 0);
            $id_lote       = (int)   ($_POST['id_lote']       ?? 0);
            $fecha         = trim($_POST['fecha']             ?? '');
            $cantidad      = (float) ($_POST['cantidad']      ?? 0);
            $unidad        = trim($_POST['unidad_medida']     ?? 'kg');

            if ($id_trabajador <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona un trabajador']);
                exit;
            }
            if ($id_lote <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona un lote']);
                exit;
            }
            if ($fecha === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha es obligatoria']);
                exit;
            }
            if ($cantidad <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'La cantidad debe ser mayor a 0']);
                exit;
            }
            if ($unidad === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'La unidad de medida es obligatoria']);
                exit;
            }

            $ok = $model->registrar($id_trabajador, $id_lote, $fecha, $cantidad, $unidad);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Producción registrada correctamente' : 'Error al registrar la producción',
            ]);
            break;

        // ── EDITAR ────────────────────────────────────────
        case 'editar':
            $id            = (int)   ($_POST['id']            ?? 0);
            $id_trabajador = (int)   ($_POST['id_trabajador'] ?? 0);
            $id_lote       = (int)   ($_POST['id_lote']       ?? 0);
            $fecha         = trim($_POST['fecha']             ?? '');
            $cantidad      = (float) ($_POST['cantidad']      ?? 0);
            $unidad        = trim($_POST['unidad_medida']     ?? 'kg');

            if ($id <= 0 || $id_trabajador <= 0 || $id_lote <= 0 || $fecha === '' || $cantidad <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
                exit;
            }

            $ok = $model->editar($id, $id_trabajador, $id_lote, $fecha, $cantidad, $unidad);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Registro actualizado correctamente' : 'Error al actualizar el registro',
            ]);
            break;

        // ── ELIMINAR ──────────────────────────────────────
        case 'eliminar':
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            $ok = $model->eliminar($id);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Registro eliminado correctamente' : 'Error al eliminar el registro',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
