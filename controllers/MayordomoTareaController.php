<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoTareaController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Tareas (mayordomo)
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   crear          → Crea una tarea y asigna trabajadores
 *   editar         → Actualiza tarea y reemplaza trabajadores
 *   cambiar_estado → Cambia estado: PENDIENTE | EN_PROGRESO | COMPLETADA
 *   eliminar       → Elimina tarea (solo si está PENDIENTE)
 *
 * Trabajadores se envían como array: trabajadores[] = id1, id2, ...
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
require_once __DIR__ . '/../models/MayordomoTarea.php';
require_once __DIR__ . '/../models/Notificacion.php';

header('Content-Type: application/json');

$db          = (new Database())->conectar();
$model       = new MayordomoTarea($db);
$id_mayordomo= (int) $_SESSION['id_usuario'];
$accion      = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── CREAR TAREA ───────────────────────────────────
        case 'crear':
            $id_lote     = (int)   ($_POST['id_lote']          ?? 0);
            $nombre      = trim($_POST['nombre']               ?? '');
            $descripcion = trim($_POST['descripcion']          ?? '');
            $inicio      = trim($_POST['fecha_inicio']         ?? '');
            $fin         = trim($_POST['fecha_fin_estimada']   ?? '');
            $estado      = trim($_POST['estado_tarea']         ?? 'PENDIENTE');
            $trabajadores= $_POST['trabajadores'] ?? [];

            if ($nombre === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'El nombre de la tarea es obligatorio']);
                exit;
            }
            if ($id_lote <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona un lote']);
                exit;
            }
            if ($inicio === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha de inicio es obligatoria']);
                exit;
            }
            if ($fin !== '' && $fin < $inicio) {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha fin no puede ser anterior al inicio']);
                exit;
            }

            $estadosValidos = ['PENDIENTE', 'EN_PROGRESO', 'COMPLETADA'];
            if (!in_array($estado, $estadosValidos, true)) {
                $estado = 'PENDIENTE';
            }

            $ok = $model->crear(
                $id_mayordomo, $id_lote, $nombre, $descripcion,
                $inicio, $fin, $estado, (array) $trabajadores
            );
            if ($ok && !empty($trabajadores)) {
                // Notificar a cada trabajador asignado
                Notificacion::enviarAVarios(
                    $db,
                    array_map('intval', (array) $trabajadores),
                    'info',
                    "Se te ha asignado una nueva tarea: \"$nombre\".",
                    '../../views/trabajador/mis_tareas.php'
                );
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Tarea creada correctamente' : 'Error al crear la tarea',
            ]);
            break;

        // ── EDITAR TAREA ──────────────────────────────────
        case 'editar':
            $id_tarea    = (int)   ($_POST['id']                ?? 0);
            $id_lote     = (int)   ($_POST['id_lote']           ?? 0);
            $nombre      = trim($_POST['nombre']                ?? '');
            $descripcion = trim($_POST['descripcion']           ?? '');
            $inicio      = trim($_POST['fecha_inicio']          ?? '');
            $fin         = trim($_POST['fecha_fin_estimada']    ?? '');
            $estado      = trim($_POST['estado_tarea']          ?? 'PENDIENTE');
            $trabajadores= $_POST['trabajadores'] ?? [];

            if ($id_tarea <= 0 || $nombre === '' || $id_lote <= 0 || $inicio === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
                exit;
            }

            $ok = $model->editar(
                $id_tarea, $id_lote, $nombre, $descripcion,
                $inicio, $fin, $estado, (array) $trabajadores
            );
            if ($ok && !empty($trabajadores)) {
                // Notificar a los trabajadores que la tarea fue actualizada
                Notificacion::enviarAVarios(
                    $db,
                    array_map('intval', (array) $trabajadores),
                    'info',
                    "La tarea \"$nombre\" ha sido actualizada.",
                    '../../views/trabajador/mis_tareas.php'
                );
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Tarea actualizada correctamente' : 'Error al actualizar la tarea',
            ]);
            break;

        // ── CAMBIAR ESTADO ────────────────────────────────
        case 'cambiar_estado':
            $id_tarea = (int)   ($_POST['id']     ?? 0);
            $estado   = strtoupper(trim($_POST['estado'] ?? ''));

            if ($id_tarea <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            $estadosValidos = ['PENDIENTE', 'EN_PROGRESO', 'COMPLETADA'];
            if (!in_array($estado, $estadosValidos, true)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Estado inválido']);
                exit;
            }

            $ok = $model->cambiarEstado($id_tarea, $estado);
            $lblEstado = match($estado) {
                'PENDIENTE'   => 'Pendiente',
                'EN_PROGRESO' => 'En progreso',
                'COMPLETADA'  => 'Completada',
            };
            if ($ok) {
                // Notificar a los trabajadores asignados sobre el cambio de estado
                try {
                    $wks = $db->prepare(
                        "SELECT id_trabajador FROM tarea_trabajador WHERE id_tarea = :id"
                    );
                    $wks->bindParam(':id', $id_tarea, PDO::PARAM_INT);
                    $wks->execute();
                    $ids = $wks->fetchAll(PDO::FETCH_COLUMN);
                    if (!empty($ids)) {
                        Notificacion::enviarAVarios(
                            $db,
                            array_map('intval', $ids),
                            $estado === 'COMPLETADA' ? 'success' : 'info',
                            "El estado de una tarea asignada cambió a: $lblEstado.",
                            '../../views/trabajador/mis_tareas.php'
                        );
                    }
                } catch (Exception $e) { /* no interrumpir */ }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? "Estado cambiado a {$lblEstado}" : 'Error al cambiar el estado',
            ]);
            break;

        // ── ELIMINAR TAREA ────────────────────────────────
        case 'eliminar':
            $id_tarea = (int) ($_POST['id'] ?? 0);

            if ($id_tarea <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }

            $ok = $model->eliminar($id_tarea);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok
                    ? 'Tarea eliminada correctamente'
                    : 'Solo se pueden eliminar tareas en estado Pendiente',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
