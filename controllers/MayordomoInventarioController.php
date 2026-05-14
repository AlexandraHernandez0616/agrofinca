<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoInventarioController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Inventarios (mayordomo)
 * ============================================================
 *
 * Reutiliza models/Inventario.php (mismas tablas herramienta e insumo
 * que gestiona el administrador — inventario compartido).
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   Herramientas:
 *     crear_herramienta    → Registra una nueva herramienta (con foto)
 *     editar_herramienta   → Actualiza una herramienta existente
 *
 *   Insumos:
 *     crear_insumo         → Registra un nuevo insumo (con foto)
 *     editar_insumo        → Actualiza un insumo existente
 *
 * NOTA: El mayordomo NO puede eliminar herramientas ni insumos.
 *       Esa operación queda reservada al administrador.
 *
 * Fotos:
 *   - Se guardan en /uploads/inventario/ (misma carpeta que el admin)
 *   - Formatos: jpg, jpeg, png, webp — máx. 3 MB
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
require_once __DIR__ . '/../models/Inventario.php';

$db     = (new Database())->conectar();
$model  = new Inventario($db);
$accion = $_POST['accion'] ?? '';

// ── Directorio de uploads (compartido con el admin) ────────
if (!defined('UPLOAD_DIR')) {
    define('UPLOAD_DIR', __DIR__ . '/../uploads/inventario/');
}
if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

/**
 * Procesa y guarda la foto subida.
 * Devuelve el nombre del archivo guardado, o null si no se subió nada.
 */
function procesarFotoMayordomo(string $campo, string $prefijo): ?string {
    if (!isset($_FILES[$campo]) || $_FILES[$campo]['error'] === UPLOAD_ERR_NO_FILE) {
        return null;
    }
    $file = $_FILES[$campo];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Error al subir la imagen (código ' . $file['error'] . ')');
    }
    if ($file['size'] > 3 * 1024 * 1024) {
        throw new Exception('La imagen no puede superar 3 MB');
    }
    $mime = mime_content_type($file['tmp_name']);
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];
    if (!in_array($mime, $tiposPermitidos, true)) {
        throw new Exception('Formato no permitido. Usa JPG, PNG o WEBP');
    }
    $ext = match($mime) {
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp',
    };
    $nombreArchivo = $prefijo . '_' . time() . '_' . uniqid() . '.' . $ext;
    $destino       = UPLOAD_DIR . $nombreArchivo;
    if (!move_uploaded_file($file['tmp_name'], $destino)) {
        throw new Exception('No se pudo guardar la imagen en el servidor');
    }
    return $nombreArchivo;
}

function borrarFotoMayordomo(?string $nombre): void {
    if ($nombre && file_exists(UPLOAD_DIR . $nombre)) {
        @unlink(UPLOAD_DIR . $nombre);
    }
}

header('Content-Type: application/json');

try {
    switch ($accion) {

        // ── CREAR HERRAMIENTA ─────────────────────────────
        case 'crear_herramienta':
            $nombre   = trim($_POST['nombre']   ?? '');
            $cantidad = (int)   ($_POST['cantidad'] ?? 0);
            $estado   = trim($_POST['estado']   ?? 'DISPONIBLE');
            $fecha    = trim($_POST['fecha']    ?? date('Y-m-d'));

            if ($nombre === '' || $cantidad <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Nombre y cantidad son obligatorios']);
                exit;
            }

            $foto = procesarFotoMayordomo('foto', 'herramienta');
            $ok   = $model->crearHerramienta($nombre, $cantidad, $estado, $fecha, $foto);
            if (!$ok && $foto) borrarFotoMayordomo($foto);

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Herramienta registrada correctamente' : 'Error al registrar herramienta',
            ]);
            break;

        // ── EDITAR HERRAMIENTA ────────────────────────────
        case 'editar_herramienta':
            $id       = (int)   ($_POST['id']       ?? 0);
            $nombre   = trim($_POST['nombre']   ?? '');
            $cantidad = (int)   ($_POST['cantidad'] ?? 0);
            $estado   = trim($_POST['estado']   ?? 'DISPONIBLE');
            $fecha    = trim($_POST['fecha']    ?? date('Y-m-d'));

            if ($id <= 0 || $nombre === '' || $cantidad <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
                exit;
            }

            $foto = procesarFotoMayordomo('foto', 'herramienta');
            if ($foto) {
                $anterior = $model->obtenerHerramienta($id);
                if ($anterior && $anterior['foto_referencia']) {
                    borrarFotoMayordomo($anterior['foto_referencia']);
                }
            }

            $ok = $model->actualizarHerramienta($id, $nombre, $cantidad, $estado, $fecha, $foto);
            if (!$ok && $foto) borrarFotoMayordomo($foto);

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Herramienta actualizada correctamente' : 'Error al actualizar herramienta',
            ]);
            break;

        // ── CREAR INSUMO ──────────────────────────────────
        case 'crear_insumo':
            $nombre      = trim($_POST['nombre']      ?? '');
            $stock       = (float) ($_POST['stock']       ?? 0);
            $unidad      = trim($_POST['unidad']      ?? '');
            $vencimiento = trim($_POST['vencimiento'] ?? '') ?: null;
            $minimo      = (float) ($_POST['minimo']      ?? 0);
            $fecha       = trim($_POST['fecha']       ?? date('Y-m-d'));

            if ($nombre === '' || $stock < 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Nombre y stock son obligatorios']);
                exit;
            }

            $foto = procesarFotoMayordomo('foto', 'insumo');
            $ok   = $model->crearInsumo($nombre, $stock, $unidad, $vencimiento, $minimo, $fecha, $foto);
            if (!$ok && $foto) borrarFotoMayordomo($foto);

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Insumo registrado correctamente' : 'Error al registrar insumo',
            ]);
            break;

        // ── EDITAR INSUMO ─────────────────────────────────
        case 'editar_insumo':
            $id          = (int)   ($_POST['id']          ?? 0);
            $nombre      = trim($_POST['nombre']      ?? '');
            $stock       = (float) ($_POST['stock']       ?? 0);
            $unidad      = trim($_POST['unidad']      ?? '');
            $vencimiento = trim($_POST['vencimiento'] ?? '') ?: null;
            $minimo      = (float) ($_POST['minimo']      ?? 0);
            $fecha       = trim($_POST['fecha']       ?? date('Y-m-d'));

            if ($id <= 0 || $nombre === '') {
                echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
                exit;
            }

            $foto = procesarFotoMayordomo('foto', 'insumo');
            if ($foto) {
                $anterior = $model->obtenerInsumo($id);
                if ($anterior && $anterior['foto_referencia']) {
                    borrarFotoMayordomo($anterior['foto_referencia']);
                }
            }

            $ok = $model->actualizarInsumo($id, $nombre, $stock, $unidad, $vencimiento, $minimo, $fecha, $foto);
            if (!$ok && $foto) borrarFotoMayordomo($foto);

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Insumo actualizado correctamente' : 'Error al actualizar insumo',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => $e->getMessage()]);
}
?>
