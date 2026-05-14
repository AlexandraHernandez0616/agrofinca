<?php
/**
 * ============================================================
 * ARCHIVO: controllers/TrabajadorAsistenciaController.php
 * PROPÓSITO: Permite al trabajador marcar su propia entrada
 *            o registrar su salida desde el dashboard.
 * ============================================================
 *
 * Quién lo llama:
 *   views/trabajador/dashboard.php → fetch() POST con JSON
 *
 * Acciones disponibles (campo POST 'accion'):
 *   marcar_entrada → registra hora de entrada con la hora actual
 *                    y cambia estado_trabajador a 'ACTIVO'
 *   marcar_salida  → registra hora de salida con la hora actual
 *                    y cambia estado_trabajador a 'Inactivo'
 *
 * Diferencia con AsistenciaController.php (del mayordomo):
 *   - Este lo usa el TRABAJADOR para marcarse a sí mismo
 *   - AsistenciaController lo usa el MAYORDOMO para marcar a otros
 *   - Este cambia el estado_trabajador automáticamente
 *
 * Responde JSON: { ok: true/false, msg: '...' }
 *
 * Protección: solo rol TRABAJADOR puede usar este controller.
 * ============================================================
 */
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/database.php';

// Solo trabajadores
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
    echo json_encode(['ok' => false, 'msg' => 'Sin autorización']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
    exit;
}

$accion = trim($_POST['accion'] ?? '');
$id     = (int) $_SESSION['id_usuario'];
$db     = (new Database())->conectar();
$hora   = date('H:i:s'); // Hora actual del servidor

// ── MARCAR ENTRADA ────────────────────────────────────────
if ($accion === 'marcar_entrada') {
    try {
        // Verificar si ya marcó entrada hoy
        $check = $db->prepare(
            "SELECT id_asistencia FROM asistencia
             WHERE id_trabajador = :id AND fecha = CURDATE() LIMIT 1"
        );
        $check->bindParam(':id', $id, PDO::PARAM_INT);
        $check->execute();

        if ($check->rowCount() > 0) {
            echo json_encode(['ok' => false, 'msg' => 'Ya registraste tu entrada hoy']);
            exit;
        }

        // Insertar registro de asistencia con hora de entrada
        $stmt = $db->prepare(
            "INSERT INTO asistencia (id_trabajador, fecha, hora_entrada)
             VALUES (:id, CURDATE(), :hora)"
        );
        $stmt->bindParam(':id',   $id, PDO::PARAM_INT);
        $stmt->bindParam(':hora', $hora);
        $stmt->execute();

        // Cambiar estado del trabajador a ACTIVO
        $db->prepare(
            "UPDATE trabajador SET estado_trabajador = 'ACTIVO'
             WHERE id_trabajador = :id"
        )->execute([':id' => $id]);

        echo json_encode(['ok' => true, 'msg' => 'Entrada registrada a las ' . substr($hora, 0, 5)]);

    } catch (Exception $e) {
        echo json_encode(['ok' => false, 'msg' => 'Error: ' . $e->getMessage()]);
    }
    exit;
}

// ── MARCAR SALIDA ─────────────────────────────────────────
if ($accion === 'marcar_salida') {
    try {
        // Verificar que existe registro de entrada hoy
        $check = $db->prepare(
            "SELECT id_asistencia FROM asistencia
             WHERE id_trabajador = :id AND fecha = CURDATE()
             AND hora_entrada IS NOT NULL LIMIT 1"
        );
        $check->bindParam(':id', $id, PDO::PARAM_INT);
        $check->execute();

        if ($check->rowCount() === 0) {
            echo json_encode(['ok' => false, 'msg' => 'Primero debes registrar tu entrada']);
            exit;
        }

        // Actualizar hora de salida
        $stmt = $db->prepare(
            "UPDATE asistencia SET hora_salida = :hora
             WHERE id_trabajador = :id AND fecha = CURDATE()"
        );
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':id',   $id, PDO::PARAM_INT);
        $stmt->execute();

        // Cambiar estado del trabajador a Inactivo
        $db->prepare(
            "UPDATE trabajador SET estado_trabajador = 'Inactivo'
             WHERE id_trabajador = :id"
        )->execute([':id' => $id]);

        echo json_encode(['ok' => true, 'msg' => 'Salida registrada a las ' . substr($hora, 0, 5)]);

    } catch (Exception $e) {
        echo json_encode(['ok' => false, 'msg' => 'Error: ' . $e->getMessage()]);
    }
    exit;
}

echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
?>
