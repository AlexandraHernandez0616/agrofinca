<?php
/**
 * ============================================================
 * ARCHIVO: controllers/TrabajadorTareaController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Mis Tareas (trabajador)
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *   completar → Marca la tarea como completada por este trabajador
 *
 * Responde con JSON: { "ok": true/false, "msg": "..." }
 * ============================================================
 */

session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
    echo json_encode(['ok' => false, 'msg' => 'Sin autorización']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
    exit;
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/TrabajadorTarea.php';

$db           = (new Database())->conectar();
$model        = new TrabajadorTarea($db);
$id_trabajador= (int) $_SESSION['id_usuario'];
$accion       = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        case 'completar':
            $id_tarea = (int) ($_POST['id_tarea'] ?? 0);

            if ($id_tarea <= 0) {
                echo json_encode(['ok' => false, 'msg' => 'ID de tarea inválido']);
                exit;
            }

            $ok = $model->completar($id_tarea, $id_trabajador);
            echo json_encode([
                'ok'  => $ok,
                'msg' => $ok ? 'Tarea marcada como completada' : 'Error al completar la tarea',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'msg' => 'Error interno: ' . $e->getMessage()]);
}
?>
