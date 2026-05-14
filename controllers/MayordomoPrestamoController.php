<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoPrestamoController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Préstamos (mayordomo)
 * ============================================================
 *
 * Flujo correcto:
 *   - Los TRABAJADORES crean las solicitudes de préstamo
 *   - El MAYORDOMO solo gestiona: aprueba, niega o registra devolución
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   aprobar              → Aprueba un préstamo PENDIENTE
 *   negar                → Niega un préstamo PENDIENTE
 *   registrar_devolucion → Registra la devolución de un préstamo APROBADO
 *
 * GET ?accion=detalle&id=X → Devuelve el detalle de herramientas del préstamo
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
require_once __DIR__ . '/../models/MayordomoPrestamo.php';
require_once __DIR__ . '/../models/Notificacion.php';

header('Content-Type: application/json');

$db           = (new Database())->conectar();
$model        = new MayordomoPrestamo($db);
$id_mayordomo = (int) $_SESSION['id_usuario'];

// ── Soporte GET para obtener detalle de un préstamo ────────
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $accionGet = trim($_GET['accion'] ?? '');
    if ($accionGet === 'detalle') {
        $id = (int) ($_GET['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
            exit;
        }
        $detalle = $model->detalle($id);
        echo json_encode(['ok' => true, 'detalle' => $detalle]);
        exit;
    }
}

$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── APROBAR ───────────────────────────────────────
        case 'aprobar':
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            $ok = $model->aprobar($id);
            if ($ok) {
                // Notificar al trabajador que su préstamo fue aprobado
                $info = $db->prepare(
                    "SELECT id_trabajador FROM prestamo WHERE id_prestamo = :id LIMIT 1"
                );
                $info->bindParam(':id', $id, PDO::PARAM_INT);
                $info->execute();
                $row = $info->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    Notificacion::enviar(
                        $db,
                        (int) $row['id_trabajador'],
                        'success',
                        'Tu solicitud de préstamo de herramienta fue aprobada.',
                        '../../views/trabajador/mis_prestamos.php'
                    );
                }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Préstamo aprobado correctamente' : 'No se pudo aprobar (ya no está Pendiente)',
            ]);
            break;

        // ── NEGAR ─────────────────────────────────────────
        case 'negar':
            $id  = (int)   ($_POST['id']          ?? 0);
            $obs = trim($_POST['observacion']     ?? '') ?: null;
            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            $ok = $model->negar($id, $obs);
            if ($ok) {
                // Notificar al trabajador que su préstamo fue negado
                $info = $db->prepare(
                    "SELECT id_trabajador FROM prestamo WHERE id_prestamo = :id LIMIT 1"
                );
                $info->bindParam(':id', $id, PDO::PARAM_INT);
                $info->execute();
                $row = $info->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    $motivo = $obs ? " Motivo: $obs" : '';
                    Notificacion::enviar(
                        $db,
                        (int) $row['id_trabajador'],
                        'error',
                        "Tu solicitud de préstamo de herramienta fue negada.$motivo",
                        '../../views/trabajador/mis_prestamos.php'
                    );
                }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Préstamo negado' : 'No se pudo negar (ya no está Pendiente)',
            ]);
            break;

        // ── REGISTRAR DEVOLUCIÓN ──────────────────────────
        case 'registrar_devolucion':
            $id             = (int)   ($_POST['id']               ?? 0);
            $fecha_dev      = trim($_POST['fecha_devolucion']     ?? date('Y-m-d'));
            $estado_dev     = trim($_POST['estado_devolucion']    ?? 'BUENO');
            $obs            = trim($_POST['observacion']          ?? '') ?: null;

            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            if ($fecha_dev === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha de devolución es obligatoria']);
                exit;
            }
            $estadosValidos = ['BUENO', 'DAÑADO', 'PARCIAL'];
            if (!in_array($estado_dev, $estadosValidos, true)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Estado de devolución inválido']);
                exit;
            }

            $ok = $model->registrarDevolucion($id, $id_mayordomo, $fecha_dev, $estado_dev, $obs);
            if ($ok) {
                // Notificar al trabajador que su herramienta fue devuelta/registrada
                $info = $db->prepare(
                    "SELECT id_trabajador FROM prestamo WHERE id_prestamo = :id LIMIT 1"
                );
                $info->bindParam(':id', $id, PDO::PARAM_INT);
                $info->execute();
                $row = $info->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    Notificacion::enviar(
                        $db,
                        (int) $row['id_trabajador'],
                        'info',
                        'La devolución de tu préstamo de herramienta ha sido registrada.',
                        '../../views/trabajador/mis_prestamos.php'
                    );
                }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Devolución registrada correctamente' : 'No se pudo registrar (el préstamo no está Aprobado)',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
