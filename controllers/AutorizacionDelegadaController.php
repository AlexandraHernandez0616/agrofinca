<?php
/**
 * ============================================================
 * ARCHIVO: controllers/AutorizacionDelegadaController.php
 * PROPÓSITO: Maneja las acciones del módulo Liquidaciones Temporales
 * ============================================================
 *
 * Acciones POST:
 *   otorgar  → Crea una nueva autorización delegada
 *   revocar  → Revoca una autorización activa
 *
 * Acciones GET:
 *   ?accion=liquidaciones&id=X → Devuelve las liquidaciones de una autorización
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
require_once __DIR__ . '/../models/AutorizacionDelegada.php';
require_once __DIR__ . '/../models/Notificacion.php';

header('Content-Type: application/json');

$db    = (new Database())->conectar();
$model = new AutorizacionDelegada($db);
$id_admin = (int) $_SESSION['id_usuario'];

// ── GET: liquidaciones de una autorización ─────────────────
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $accionGet = trim($_GET['accion'] ?? '');
    if ($accionGet === 'liquidaciones') {
        $id = (int) ($_GET['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
            exit;
        }
        $liquidaciones = $model->liquidacionesDe($id);
        echo json_encode(['ok' => true, 'liquidaciones' => $liquidaciones]);
        exit;
    }
    echo json_encode(['ok' => false, 'mensaje' => 'Acción GET no reconocida']);
    exit;
}

// ── POST ──────────────────────────────────────────────────
$accion = trim($_POST['accion'] ?? '');

try {
    switch ($accion) {

        // ── OTORGAR ───────────────────────────────────────
        case 'otorgar':
            $id_mayordomo = (int)   ($_POST['id_mayordomo']         ?? 0);
            $inicio       = trim($_POST['fecha_inicio']             ?? '');
            $fin          = trim($_POST['fecha_fin']                ?? '');
            $acciones     = trim($_POST['acciones_permitidas']      ?? '');
            $monto        = trim($_POST['monto_maximo']             ?? '') !== ''
                            ? (float) $_POST['monto_maximo']
                            : null;

            if ($id_mayordomo <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Selecciona un mayordomo']);
                exit;
            }
            if ($inicio === '' || $fin === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'Las fechas de inicio y fin son obligatorias']);
                exit;
            }
            if ($inicio > $fin) {
                echo json_encode(['ok' => false, 'mensaje' => 'La fecha de inicio no puede ser posterior al fin']);
                exit;
            }
            if ($acciones === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'Las acciones permitidas son obligatorias']);
                exit;
            }

            $ok = $model->otorgar($id_admin, $id_mayordomo, $inicio, $fin, $acciones, $monto);
            if ($ok) {
                try {
                    Notificacion::enviar(
                        $db,
                        $id_mayordomo,
                        'success',
                        'El administrador te otorgó permiso temporal para liquidaciones. Revisa el módulo de liquidaciones temporales.',
                        '../../views/mayordomo/liquidaciones_temporales.php'
                    );
                } catch (Exception $e) { /* no interrumpir */ }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Permiso otorgado correctamente' : 'Error al otorgar el permiso',
            ]);
            break;

        // ── REVOCAR ───────────────────────────────────────
        case 'revocar':
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            $id_mayordomo_aviso = 0;
            try {
                $q = $db->prepare(
                    "SELECT id_mayordomo FROM autorizacion_delegada
                     WHERE id_autorizacion = :id AND estado = 'ACTIVA' LIMIT 1"
                );
                $q->bindParam(':id', $id, PDO::PARAM_INT);
                $q->execute();
                $id_mayordomo_aviso = (int) ($q->fetchColumn() ?: 0);
            } catch (Exception $e) {
                $id_mayordomo_aviso = 0;
            }
            $ok = $model->revocar($id);
            if ($ok && $id_mayordomo_aviso > 0) {
                try {
                    Notificacion::enviar(
                        $db,
                        $id_mayordomo_aviso,
                        'warning',
                        'El administrador revocó tu permiso temporal de liquidaciones.',
                        '../../views/mayordomo/liquidaciones_temporales.php'
                    );
                } catch (Exception $e) { /* no interrumpir */ }
            }
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Autorización revocada correctamente' : 'No se pudo revocar (ya no está Activa)',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
}
?>
