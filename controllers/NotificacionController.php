<?php
/**
 * ============================================================
 * ARCHIVO: controllers/NotificacionController.php
 * PROPÓSITO: Endpoint JSON para el panel de notificaciones.
 * ============================================================
 * GET  → Devuelve las últimas 20 notificaciones del usuario
 *         logueado + conteo de no leídas.
 * POST accion=marcar_leidas → Marca todas como leídas.
 * POST accion=marcar_una    → Marca una notificación como leída.
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario'])) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Sin autorización']);
    exit;
}
header('Content-Type: application/json');
require_once __DIR__ . '/../config/database.php';
$db = (new Database())->conectar();
$id = (int) $_SESSION['id_usuario'];

// Auto-migración: agregar columna 'link' si no existe
try {
    $db->exec("ALTER TABLE notificacion_operativa ADD COLUMN IF NOT EXISTS link VARCHAR(255) NULL AFTER mensaje");
} catch (Exception $e) { /* ignorar si ya existe o no soporta IF NOT EXISTS */ }

// ── GET: obtener notificaciones ───────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $stmt = $db->prepare(
            "SELECT id_notificacion, tipo, mensaje, link, fecha_hora, leida
             FROM notificacion_operativa
             WHERE id_usuario_destino = :id
             ORDER BY fecha_hora DESC
             LIMIT 20"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $notifs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($notifs as &$n) {
            $n['id_notificacion'] = (int) ($n['id_notificacion'] ?? 0);
            $raw                  = $n['leida'] ?? 0;
            $n['leida']           = ($raw === true || $raw === 1 || $raw === '1') ? 1 : 0;
            if (!isset($n['link']) || $n['link'] === '') {
                $n['link'] = null;
            }
        }
        unset($n);
        $no_leidas = count(array_filter($notifs, static fn($n) => (int) ($n['leida'] ?? 0) === 0));
        echo json_encode([
            'ok'            => true,
            'notificaciones' => $notifs,
            'no_leidas'     => (int) $no_leidas,
        ]);
    } catch (Exception $e) {
        echo json_encode(['ok' => false, 'notificaciones' => [], 'no_leidas' => 0]);
    }
    exit;
}

// ── POST: acciones ────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = trim($_POST['accion'] ?? '');

    // Marcar todas como leídas
    if ($accion === 'marcar_leidas') {
        try {
            $stmt = $db->prepare(
                "UPDATE notificacion_operativa
                 SET leida = 1
                 WHERE id_usuario_destino = :id AND leida = 0"
            );
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            echo json_encode(['ok' => true]);
        } catch (Exception $e) {
            echo json_encode(['ok' => false]);
        }
        exit;
    }

    // Marcar una notificación como leída
    if ($accion === 'marcar_una') {
        $id_notif = (int) ($_POST['id_notificacion'] ?? 0);
        if ($id_notif <= 0) {
            echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
            exit;
        }
        try {
            $stmt = $db->prepare(
                "UPDATE notificacion_operativa
                 SET leida = 1
                 WHERE id_notificacion = :nid AND id_usuario_destino = :uid"
            );
            $stmt->bindParam(':nid', $id_notif, PDO::PARAM_INT);
            $stmt->bindParam(':uid', $id,       PDO::PARAM_INT);
            $stmt->execute();
            echo json_encode(['ok' => true]);
        } catch (Exception $e) {
            echo json_encode(['ok' => false]);
        }
        exit;
    }
}

echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
?>
