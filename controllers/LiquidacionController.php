<?php
/**
 * ============================================================
 * ARCHIVO: controllers/LiquidacionController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Liquidaciones
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   generar         → Crea una nueva liquidación en estado PENDIENTE
 *   cambiar_estado  → Cambia el estado: PENDIENTE → GENERADA → LIQUIDADA
 *   eliminar        → Elimina una liquidación (solo si está PENDIENTE y sin pagos)
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
require_once __DIR__ . '/../models/Liquidacion.php';
require_once __DIR__ . '/../models/Notificacion.php';

header('Content-Type: application/json');

$db     = (new Database())->conectar();
$model  = new Liquidacion($db);
$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── GENERAR LIQUIDACIÓN ───────────────────────────
        case 'generar':
            $id_trabajador = (int)   ($_POST['id_trabajador']  ?? 0);
            $id_tarifa     = (int)   ($_POST['id_tarifa']      ?? 0);
            $inicio        = trim($_POST['periodo_inicio']     ?? '');
            $fin           = trim($_POST['periodo_fin']        ?? '');
            $jornadas      = (float) ($_POST['jornadas']       ?? 0);
            $produccion    = (float) ($_POST['produccion']     ?? 0);
            $valor         = (float) ($_POST['valor_calculado']?? 0);
            $fecha_gen     = date('Y-m-d');
            $obs           = trim($_POST['observacion']        ?? '') ?: null;

            // Validaciones
            if ($id_trabajador <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona un trabajador']);
                exit;
            }
            if ($id_tarifa <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona una tarifa']);
                exit;
            }
            if ($inicio === '' || $fin === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'El período de inicio y fin son obligatorios']);
                exit;
            }
            if ($inicio > $fin) {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha de inicio no puede ser posterior al fin']);
                exit;
            }
            if ($valor <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'El valor calculado debe ser mayor a 0']);
                exit;
            }

            $ok = $model->crear(
                $id_trabajador, $id_tarifa,
                $inicio, $fin,
                $jornadas, $produccion,
                $valor, $fecha_gen, $obs
            );
            if ($ok) {
                try {
                    Notificacion::enviar(
                        $db,
                        $id_trabajador,
                        'info',
                        'Se generó una nueva liquidación a tu nombre. Consulta el resumen en tu panel.',
                        '../../views/trabajador/dashboard.php'
                    );
                } catch (Exception $e) { /* no interrumpir */ }
            }

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Liquidación generada correctamente' : 'Error al generar la liquidación',
            ]);
            break;

        // ── CAMBIAR ESTADO ────────────────────────────────
        case 'cambiar_estado':
            $id     = (int)   ($_POST['id']     ?? 0);
            $estado = strtoupper(trim($_POST['estado'] ?? ''));

            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }

            $estadosValidos = ['PENDIENTE', 'GENERADA', 'LIQUIDADA'];
            if (!in_array($estado, $estadosValidos, true)) {
                echo json_encode(['ok' => false, 'mensaje' => 'Estado inválido']);
                exit;
            }

            // Si pasa a LIQUIDADA registrar la fecha de hoy
            $fecha_liq = ($estado === 'LIQUIDADA') ? date('Y-m-d') : null;

            $ok = $model->cambiarEstado($id, $estado, $fecha_liq);
            if ($ok) {
                try {
                    $w = $db->prepare(
                        "SELECT id_trabajador FROM liquidacion WHERE id_liquidacion = :id LIMIT 1"
                    );
                    $w->bindParam(':id', $id, PDO::PARAM_INT);
                    $w->execute();
                    $id_t = (int) ($w->fetchColumn() ?: 0);
                    if ($id_t > 0) {
                        $msg = match ($estado) {
                            'GENERADA'  => 'Tu liquidación fue marcada como generada (pendiente de pago).',
                            'LIQUIDADA' => 'Tu liquidación fue marcada como liquidada.',
                            default     => 'El estado de una de tus liquidaciones fue actualizado.',
                        };
                        Notificacion::enviar(
                            $db,
                            $id_t,
                            $estado === 'LIQUIDADA' ? 'success' : 'info',
                            $msg,
                            '../../views/trabajador/dashboard.php'
                        );
                    }
                } catch (Exception $e) { /* no interrumpir */ }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok
                    ? 'Estado actualizado a ' . ucfirst(strtolower($estado))
                    : 'Error al actualizar el estado',
            ]);
            break;

        // ── ELIMINAR ──────────────────────────────────────
        case 'eliminar':
            $id = (int) ($_POST['id'] ?? 0);

            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            if ($model->tienePagos($id)) {
                echo json_encode([
                    'ok'      => false,
                    'mensaje' => 'No se puede eliminar: la liquidación tiene pagos registrados',
                ]);
                exit;
            }

            $ok = $model->eliminar($id);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok
                    ? 'Liquidación eliminada correctamente'
                    : 'Solo se pueden eliminar liquidaciones en estado PENDIENTE',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
