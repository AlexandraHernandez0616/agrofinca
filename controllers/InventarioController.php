<?php
/**
 * ============================================================
 * ARCHIVO: controllers/InventarioController.php
 * PROPÓSITO: Maneja las acciones POST del módulo Inventarios
 * ============================================================
 *
 * Acciones soportadas (campo 'accion' en POST):
 *
 *   Herramientas:
 *     crear_herramienta    → Registra una nueva herramienta (con foto opcional)
 *     editar_herramienta   → Actualiza una herramienta existente (foto reemplazable)
 *     eliminar_herramienta → Elimina una herramienta por ID
 *
 *   Insumos:
 *     crear_insumo         → Registra un nuevo insumo (con foto opcional)
 *     editar_insumo        → Actualiza un insumo existente (foto reemplazable)
 *     eliminar_insumo      → Elimina un insumo por ID
 *
 * Fotos:
 *   - Se guardan en /uploads/inventario/
 *   - Formatos permitidos: jpg, jpeg, png, webp
 *   - Tamaño máximo: 3 MB
 *   - Nombre generado: {tipo}_{id_o_timestamp}_{uniqid}.{ext}
 *
 * Responde con JSON: { "ok": true/false, "mensaje": "..." }
 * ============================================================
 */

session_start();

// Solo administradores pueden ejecutar estas acciones
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
    exit;
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Inventario.php';

header('Content-Type: application/json');

$db     = (new Database())->conectar();
$model  = new Inventario($db);
$accion = $_POST['accion'] ?? '';

// ── Directorio de uploads ──────────────────────────────────
define('UPLOAD_DIR', __DIR__ . '/../uploads/inventario/');
define('UPLOAD_URL', '../../uploads/inventario/');

if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

/**
 * Procesa y guarda la foto subida.
 * Devuelve la ruta relativa guardada, o null si no se subió nada.
 * Lanza Exception si el archivo es inválido.
 *
 * @param string $campo   Nombre del campo en $_FILES
 * @param string $prefijo Prefijo del nombre de archivo (herramienta|insumo)
 */
function procesarFoto(string $campo, string $prefijo): ?string {
    if (!isset($_FILES[$campo]) || $_FILES[$campo]['error'] === UPLOAD_ERR_NO_FILE) {
        return null; // No se subió foto — es opcional
    }

    $file = $_FILES[$campo];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Error al subir la imagen (código ' . $file['error'] . ')');
    }

    // Validar tamaño (máx 3 MB)
    if ($file['size'] > 3 * 1024 * 1024) {
        throw new Exception('La imagen no puede superar 3 MB');
    }

    // Validar tipo MIME real (no confiar solo en la extensión)
    $mime = mime_content_type($file['tmp_name']);
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];
    if (!in_array($mime, $tiposPermitidos, true)) {
        throw new Exception('Formato no permitido. Usa JPG, PNG o WEBP');
    }

    // Extensión segura basada en MIME
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

    return $nombreArchivo; // Solo el nombre; la URL base se construye en la vista
}

/**
 * Elimina una foto del disco si existe.
 */
function borrarFoto(?string $nombre): void {
    if ($nombre && file_exists(UPLOAD_DIR . $nombre)) {
        @unlink(UPLOAD_DIR . $nombre);
    }
}

try {
    switch ($accion) {

        // ── HERRAMIENTAS ──────────────────────────────────

        case 'crear_herramienta':
            $nombre   = trim($_POST['nombre']   ?? '');
            $cantidad = (int) ($_POST['cantidad'] ?? 0);
            $estado   = trim($_POST['estado']   ?? 'DISPONIBLE');
            $fecha    = trim($_POST['fecha']    ?? date('Y-m-d'));

            if ($nombre === '' || $cantidad <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Nombre y cantidad son obligatorios']);
                exit;
            }

            $foto = procesarFoto('foto', 'herramienta');
            $ok   = $model->crearHerramienta($nombre, $cantidad, $estado, $fecha, $foto);

            if (!$ok && $foto) borrarFoto($foto); // revertir si falla la BD

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Herramienta registrada correctamente' : 'Error al registrar herramienta',
            ]);
            break;

        case 'editar_herramienta':
            $id       = (int) ($_POST['id']       ?? 0);
            $nombre   = trim($_POST['nombre']   ?? '');
            $cantidad = (int) ($_POST['cantidad'] ?? 0);
            $estado   = trim($_POST['estado']   ?? 'DISPONIBLE');
            $fecha    = trim($_POST['fecha']    ?? date('Y-m-d'));

            if ($id <= 0 || $nombre === '' || $cantidad <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
                exit;
            }

            $foto = procesarFoto('foto', 'herramienta');

            // Si se subió foto nueva, borrar la anterior
            if ($foto) {
                $anterior = $model->obtenerHerramienta($id);
                if ($anterior && $anterior['foto_referencia']) {
                    borrarFoto($anterior['foto_referencia']);
                }
            }

            $ok = $model->actualizarHerramienta($id, $nombre, $cantidad, $estado, $fecha, $foto);

            if (!$ok && $foto) borrarFoto($foto);

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Herramienta actualizada correctamente' : 'Error al actualizar herramienta',
            ]);
            break;

        case 'eliminar_herramienta':
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            // Borrar foto del disco antes de eliminar el registro
            $registro = $model->obtenerHerramienta($id);
            if ($registro && $registro['foto_referencia']) {
                borrarFoto($registro['foto_referencia']);
            }
            $ok = $model->eliminarHerramienta($id);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Herramienta eliminada' : 'Error al eliminar herramienta',
            ]);
            break;

        // ── INSUMOS ───────────────────────────────────────

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

            $foto = procesarFoto('foto', 'insumo');
            $ok   = $model->crearInsumo($nombre, $stock, $unidad, $vencimiento, $minimo, $fecha, $foto);

            if (!$ok && $foto) borrarFoto($foto);

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Insumo registrado correctamente' : 'Error al registrar insumo',
            ]);
            break;

        case 'editar_insumo':
            $id          = (int) ($_POST['id']          ?? 0);
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

            $foto = procesarFoto('foto', 'insumo');

            if ($foto) {
                $anterior = $model->obtenerInsumo($id);
                if ($anterior && $anterior['foto_referencia']) {
                    borrarFoto($anterior['foto_referencia']);
                }
            }

            $ok = $model->actualizarInsumo($id, $nombre, $stock, $unidad, $vencimiento, $minimo, $fecha, $foto);

            if (!$ok && $foto) borrarFoto($foto);

            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Insumo actualizado correctamente' : 'Error al actualizar insumo',
            ]);
            break;

        case 'eliminar_insumo':
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
                exit;
            }
            $registro = $model->obtenerInsumo($id);
            if ($registro && $registro['foto_referencia']) {
                borrarFoto($registro['foto_referencia']);
            }
            $ok = $model->eliminarInsumo($id);
            echo json_encode([
                'ok'      => $ok,
                'mensaje' => $ok ? 'Insumo eliminado' : 'Error al eliminar insumo',
            ]);
            break;

        default:
            echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => $e->getMessage()]);
}
?>
