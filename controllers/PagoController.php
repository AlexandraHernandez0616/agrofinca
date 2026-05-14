<?php
/**
 * ============================================================
 * ARCHIVO: controllers/PagoController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Pagos
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   registrar  → Registra un nuevo pago sobre una liquidación GENERADA
 *   eliminar   → Elimina un pago por ID
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
require_once __DIR__ . '/../models/Pago.php';
require_once __DIR__ . '/../models/Notificacion.php';

header('Content-Type: application/json');

$db     = (new Database())->conectar();
$model  = new Pago($db);
$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── REGISTRAR PAGO ────────────────────────────────
        case 'registrar':
            $id_liq     = (int)   ($_POST['id_liquidacion'] ?? 0);
            $fecha      = trim($_POST['fecha_pago']         ?? '');
            $monto      = (float) ($_POST['monto']          ?? 0);
            $metodo     = trim($_POST['metodo_pago']        ?? '');
            $referencia = trim($_POST['referencia_pago']    ?? '') ?: null;
            $obs        = trim($_POST['observacion']        ?? '') ?: null;
            $id_usuario = (int) $_SESSION['id_usuario'];

            if ($id_liq <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona una liquidación']);
                exit;
            }
            if ($fecha === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha de pago es obligatoria']);
                exit;
            }
            if ($monto <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'El monto debe ser mayor a 0']);
                exit;
            }
            $metodosValidos = ['Efectivo', 'Transferencia', 'Cheque'];
            if (!in_array($metodo, $metodosValidos, true)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Método de pago inválido']);
                exit;
            }

            $ok = $model->crear($id_liq, $id_usuario, $fecha, $monto, $metodo, $referencia, $obs);
            if ($ok) {
                try {
                    $q = $db->prepare(
                        "SELECT id_trabajador FROM liquidacion WHERE id_liquidacion = :id LIMIT 1"
                    );
                    $q->bindParam(':id', $id_liq, PDO::PARAM_INT);
                    $q->execute();
                    $id_t = (int) ($q->fetchColumn() ?: 0);
                    if ($id_t > 0) {
                        $montoFmt = number_format($monto, 2, ',', '.');
                        Notificacion::enviar(
                            $db,
                            $id_t,
                            'success',
                            "Se registró un pago por $" . $montoFmt . " asociado a tu liquidación.",
                            '../../views/trabajador/dashboard.php'
                        );
                    }
                } catch (Exception $e) { /* no interrumpir */ }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Pago registrado correctamente' : 'Error al registrar el pago',
            ]);
            break;

        // ── ELIMINAR PAGO ─────────────────────────────────
        case 'eliminar':
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            $ok = $model->eliminar($id);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Pago eliminado correctamente' : 'Error al eliminar el pago',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
