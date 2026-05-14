<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoLiquidacionTemporalController.php
 * PROPÓSITO: Maneja las acciones del módulo Liquidaciones Temporales
 *            del mayordomo
 * ============================================================
 *
 * SEGURIDAD: Antes de cualquier acción verifica que el mayordomo
 * tenga una autorización ACTIVA. Si no la tiene → 403.
 *
 * Acciones POST:
 *   generar  → Crea una liquidación temporal vinculada al permiso activo
 *
 * Acciones GET:
 *   ?accion=jornadas&id_trabajador=X&inicio=Y&fin=Z
 *            → Devuelve el conteo de jornadas de asistencia del trabajador
 *   ?accion=detalle&id=X
 *            → Devuelve el detalle completo de una liquidación
 *
 * Responde con JSON: { "ok": true/false, "mensaje": "...", ... }
 * ============================================================
 */

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
    exit;
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/MayordomoLiquidacionTemporal.php';
require_once __DIR__ . '/../models/Notificacion.php';

header('Content-Type: application/json');

$db           = (new Database())->conectar();
$model        = new MayordomoLiquidacionTemporal($db);
$id_mayordomo = (int) $_SESSION['id_usuario'];

// ── Verificar permiso activo ───────────────────────────────
$permiso = $model->obtenerPermisoActivo($id_mayordomo);
if (!$permiso) {
    echo json_encode(['ok' => false, 'mensaje' => 'No tienes un permiso activo para realizar liquidaciones']);
    exit;
}
$id_autorizacion = (int) $permiso['id_autorizacion'];

// ── GET ────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $accionGet = trim($_GET['accion'] ?? '');

    if ($accionGet === 'jornadas') {
        $id_t   = (int)   ($_GET['id_trabajador'] ?? 0);
        $inicio = trim($_GET['inicio']            ?? '');
        $fin    = trim($_GET['fin']               ?? '');
        if ($id_t <= 0 || $inicio === '' || $fin === '') {
            echo json_encode(['ok' => false, 'jornadas' => 0]);
            exit;
        }
        $jornadas = $model->jornadasTrabajador($id_t, $inicio, $fin);
        echo json_encode(['ok' => true, 'jornadas' => $jornadas]);
        exit;
    }

    if ($accionGet === 'detalle') {
        $id = (int) ($_GET['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
            exit;
        }
        $detalle = $model->obtenerDetalle($id);
        echo json_encode(['ok' => (bool) $detalle, 'detalle' => $detalle ?: null]);
        exit;
    }

    echo json_encode(['ok' => false, 'mensaje' => 'Acción GET no reconocida']);
    exit;
}

// ── POST ──────────────────────────────────────────────────
$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        case 'generar':
            $id_trabajador = (int)   ($_POST['id_trabajador']  ?? 0);
            $id_tarifa     = (int)   ($_POST['id_tarifa']      ?? 0);
            $inicio        = trim($_POST['periodo_inicio']     ?? '');
            $fin           = trim($_POST['periodo_fin']        ?? '');
            $jornadas      = (float) ($_POST['jornadas']       ?? 0);
            $valor         = (float) ($_POST['valor_calculado']?? 0);
            $obs           = trim($_POST['observacion']        ?? '') ?: null;

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

            // Verificar que las fechas estén dentro del rango del permiso
            if ($inicio < $permiso['fecha_inicio'] || $fin > $permiso['fecha_fin']) {
                echo json_encode([
                    'ok'      => false,
                    'mensaje' => "El período debe estar dentro del rango autorizado ({$permiso['fecha_inicio']} — {$permiso['fecha_fin']})",
                ]);
                exit;
            }

            // Verificar monto máximo si aplica
            if ($permiso['monto_maximo'] !== null && $valor > (float) $permiso['monto_maximo']) {
                echo json_encode([
                    'ok'      => false,
                    'mensaje' => 'El valor supera el monto máximo autorizado ($' . number_format($permiso['monto_maximo'], 0, '.', ',') . ')',
                ]);
                exit;
            }

            $ok = $model->generar(
                $id_trabajador, $id_tarifa, $id_autorizacion,
                $inicio, $fin, $jornadas, $valor, $obs
            );
            if ($ok) {
                try {
                    Notificacion::enviar(
                        $db,
                        $id_trabajador,
                        'info',
                        'Se generó una liquidación temporal a tu nombre (permiso delegado).',
                        '../../views/trabajador/dashboard.php'
                    );
                    $admins = $db->query(
                        "SELECT id_usuario FROM usuario WHERE rol = 'ADMINISTRADOR' AND activo = 1"
                    )->fetchAll(PDO::FETCH_COLUMN);
                    if (!empty($admins)) {
                        Notificacion::enviarAVarios(
                            $db,
                            array_map('intval', $admins),
                            'info',
                            'Un mayordomo generó una liquidación temporal bajo permiso delegado.',
                            '../../views/admin/liquidaciones.php'
                        );
                    }
                } catch (Exception $e) { /* no interrumpir */ }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Liquidación temporal generada correctamente' : 'Error al generar la liquidación',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
