<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoLoteController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Lotes (mayordomo)
 * ============================================================
 *
 * El mayordomo puede REGISTRAR nuevos lotes y EDITAR los existentes.
 * No puede eliminar lotes (operación reservada al administrador).
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   registrar  → Crea un nuevo lote asociado a un cultivo
 *   editar     → Actualiza nombre, ubicación y extensión de un lote
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
require_once __DIR__ . '/../models/MayordomoLote.php';

header('Content-Type: application/json');

$db     = (new Database())->conectar();
$model  = new MayordomoLote($db);
$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── REGISTRAR LOTE ────────────────────────────────
        case 'registrar':
            $nombre    = trim($_POST['nombre']              ?? '');
            $ubicacion = trim($_POST['ubicacion_descripcion'] ?? '');
            $extension = (float) ($_POST['extension']       ?? 0);
            $id_cultivo= (int)   ($_POST['id_cultivo']      ?? 0);
            $fecha     = trim($_POST['fecha_registro']      ?? date('Y-m-d'));

            if ($nombre === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'El nombre del lote es obligatorio']);
                exit;
            }
            if ($id_cultivo <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona un tipo de cultivo']);
                exit;
            }

            $ok = $model->registrar($nombre, $ubicacion, $extension, $id_cultivo, $fecha);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Lote registrado correctamente' : 'Error al registrar el lote',
            ]);
            break;

        // ── EDITAR LOTE ───────────────────────────────────
        case 'editar':
            $id        = (int)   ($_POST['id']                    ?? 0);
            $nombre    = trim($_POST['nombre']                    ?? '');
            $ubicacion = trim($_POST['ubicacion_descripcion']     ?? '');
            $extension = (float) ($_POST['extension']             ?? 0);
            $id_cultivo= (int)   ($_POST['id_cultivo']            ?? 0);
            $fecha     = trim($_POST['fecha_registro']            ?? '');

            if ($id <= 0 || $nombre === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
                exit;
            }
            if ($id_cultivo <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona un tipo de cultivo']);
                exit;
            }

            $ok = $model->editar($id, $nombre, $ubicacion, $extension, $id_cultivo, $fecha);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Lote actualizado correctamente' : 'Error al actualizar el lote',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
