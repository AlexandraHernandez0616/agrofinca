<?php
/**
 * ============================================================
 * ARCHIVO: controllers/TrabajadorSolicitudHerramientaController.php
 * PROPÓSITO: Procesa la solicitud de herramienta del trabajador
 * ============================================================
 *
 * Acción POST:
 *   solicitar → Crea un préstamo en estado PENDIENTE dirigido
 *               al mayordomo asignado al trabajador.
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
require_once __DIR__ . '/../models/TrabajadorSolicitudHerramienta.php';
require_once __DIR__ . '/../models/Notificacion.php';

$db            = (new Database())->conectar();
$model         = new TrabajadorSolicitudHerramienta($db);
$id_trabajador = (int) $_SESSION['id_usuario'];
$accion        = trim($_POST['accion'] ?? '');

try {
    if ($accion !== 'solicitar') {
        echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
        exit;
    }

    $id_herramienta = (int)   ($_POST['id_herramienta'] ?? 0);
    $cantidad       = (int)   ($_POST['cantidad']       ?? 0);
    $observacion    = trim($_POST['observacion']        ?? '') ?: null;

    // Validaciones
    if ($id_herramienta <= 0) {
        echo json_encode(['ok' => false, 'msg' => 'Selecciona una herramienta']);
        exit;
    }
    if ($cantidad <= 0) {
        echo json_encode(['ok' => false, 'msg' => 'La cantidad debe ser mayor a 0']);
        exit;
    }

    // Obtener mayordomo asignado
    $id_mayordomo = $model->obtenerMayordomo($id_trabajador);
    if (!$id_mayordomo) {
        echo json_encode([
            'ok'  => false,
            'msg' => 'No hay mayordomos activos en el sistema. Contacta al administrador.',
        ]);
        exit;
    }

    $ok = $model->solicitar($id_trabajador, $id_mayordomo, $id_herramienta, $cantidad, $observacion);
    if ($ok) {
        // Notificar al mayordomo que hay una nueva solicitud de herramienta
        $nombreTrabajador = $_SESSION['username'] ?? 'Un trabajador';
        Notificacion::enviar(
            $db,
            $id_mayordomo,
            'warning',
            "$nombreTrabajador solicitó un préstamo de herramienta. Revisa los préstamos pendientes.",
            '../../views/mayordomo/prestamos.php'
        );
    }
    echo json_encode([
        'ok'  => $ok,
        'msg' => $ok
            ? 'Solicitud enviada correctamente. El mayordomo la revisará pronto.'
            : 'Error al enviar la solicitud. Intenta de nuevo.',
    ]);

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'msg' => 'Error interno: ' . $e->getMessage()]);
}
?>
