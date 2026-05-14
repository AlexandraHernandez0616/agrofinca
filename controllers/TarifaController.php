<?php
/**
 * ============================================================
 * ARCHIVO: controllers/TarifaController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Tarifas
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   crear      → Registra una nueva tarifa
 *   editar     → Actualiza una tarifa existente
 *   toggle     → Habilita o deshabilita una tarifa (campo 'activa')
 *   eliminar   → Elimina una tarifa (solo si no tiene liquidaciones)
 *
 * Responde con JSON: { "ok": true/false, "mensaje": "..." }
 * ============================================================
 */

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
    exit;
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Tarifa.php';

header('Content-Type: application/json');

$db     = (new Database())->conectar();
$model  = new Tarifa($db);
$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── CREAR ─────────────────────────────────────────
        case 'crear':
            $tipo   = strtoupper(trim($_POST['tipo_pago']            ?? ''));
            $valor  = (float)          ($_POST['valor']              ?? 0);
            $inicio = trim($_POST['fecha_inicio_vigencia']           ?? '');
            $fin    = trim($_POST['fecha_fin_vigencia']              ?? '') ?: null;
            $activa = isset($_POST['activa']) && $_POST['activa'] === '1';

            if (!in_array($tipo, ['JORNAL', 'PRODUCCION', 'MIXTO'], true)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Tipo de tarifa inválido']);
                exit;
            }
            if ($valor <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'El valor debe ser mayor a 0']);
                exit;
            }
            if ($inicio === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha de inicio es obligatoria']);
                exit;
            }

            $ok = $model->crear($tipo, $valor, $inicio, $fin, $activa);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Tarifa registrada correctamente' : 'Error al registrar la tarifa',
            ]);
            break;

        // ── EDITAR ────────────────────────────────────────
        case 'editar':
            $id     = (int)            ($_POST['id']                 ?? 0);
            $tipo   = strtoupper(trim($_POST['tipo_pago']            ?? ''));
            $valor  = (float)          ($_POST['valor']              ?? 0);
            $inicio = trim($_POST['fecha_inicio_vigencia']           ?? '');
            $fin    = trim($_POST['fecha_fin_vigencia']              ?? '') ?: null;
            $activa = isset($_POST['activa']) && $_POST['activa'] === '1';

            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            if (!in_array($tipo, ['JORNAL', 'PRODUCCION', 'MIXTO'], true)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Tipo de tarifa inválido']);
                exit;
            }
            if ($valor <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'El valor debe ser mayor a 0']);
                exit;
            }
            if ($inicio === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha de inicio es obligatoria']);
                exit;
            }

            $ok = $model->actualizar($id, $tipo, $valor, $inicio, $fin, $activa);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Tarifa actualizada correctamente' : 'Error al actualizar la tarifa',
            ]);
            break;

        // ── TOGGLE (habilitar / deshabilitar) ─────────────
        case 'toggle':
            $id     = (int) ($_POST['id']     ?? 0);
            $activa = (int) ($_POST['activa'] ?? 0) === 1;

            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }

            $ok = $model->toggleActiva($id, $activa);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok
                    ? ($activa ? 'Tarifa habilitada' : 'Tarifa deshabilitada')
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
            if ($model->tieneUso($id)) {
                echo json_encode([
                    'ok'      => false,
                    'mensaje' => 'No se puede eliminar: la tarifa tiene liquidaciones asociadas',
                ]);
                exit;
            }

            $ok = $model->eliminar($id);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Tarifa eliminada correctamente' : 'Error al eliminar la tarifa',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
