Línea 1: <?php
Abre PHP.

Líneas 2 a 24: Comentario de documentación
Explica el módulo de inventario del mayordomo, acciones permitidas y fotos.

Línea 26: session_start();
Inicia sesión.

Línea 28: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Valida rol MAYORDOMO.

Línea 29: http_response_code(403);
Envía código 403.

Línea 30: echo json_encode(...)
Devuelve acceso denegado.

Línea 31: exit;
Detiene ejecución.

Línea 34: require_once __DIR__ . '/../config/database.php';
Incluye conexión.

Línea 35: require_once __DIR__ . '/../models/Inventario.php';
Incluye modelo Inventario.

Línea 37: $db = (new Database())->conectar();
Conecta a BD.

Línea 38: $model = new Inventario($db);
Crea modelo.

Línea 39: $accion = $_POST['accion'] ?? '';
Obtiene acción.

Línea 42: if (!defined('UPLOAD_DIR')) {
Verifica si la constante no existe.

Línea 43: define('UPLOAD_DIR', ...)
Define carpeta de uploads.

Línea 45: if (!is_dir(UPLOAD_DIR)) {
Verifica carpeta.

Línea 46: mkdir(UPLOAD_DIR, 0755, true);
Crea carpeta si no existe.

Línea 53: function procesarFotoMayordomo(...)
Función para subir fotos.

Línea 54: if (!isset($_FILES[$campo])...)
Verifica si no se subió archivo.

Línea 55: return null;
Devuelve null si no hay foto.

Línea 57: $file = $_FILES[$campo];
Guarda datos del archivo.

Línea 58: if ($file['error'] !== UPLOAD_ERR_OK) {
Valida error de subida.

Línea 61: if ($file['size'] > 3 * 1024 * 1024) {
Valida máximo 3 MB.

Línea 64: $mime = mime_content_type(...)
Obtiene tipo real.

Línea 65: $tiposPermitidos = [...]
Define formatos permitidos.

Línea 66: if (!in_array(...)) {
Valida formato.

Línea 69: $ext = match($mime) {
Define extensión segura.

Líneas 70 a 72:
Asigna jpg, png o webp.

Línea 74: $nombreArchivo = ...
Genera nombre único.

Línea 75: $destino = UPLOAD_DIR . $nombreArchivo;
Define ruta final.

Línea 76: if (!move_uploaded_file(...)) {
Mueve archivo al servidor.

Línea 79: return $nombreArchivo;
Devuelve nombre guardado.

Línea 82: function borrarFotoMayordomo(...)
Función para borrar fotos.

Línea 83: if ($nombre && file_exists(...)) {
Verifica existencia.

Línea 84: @unlink(...)
Elimina archivo.

Línea 88: header('Content-Type: application/json');
Define JSON.

Línea 91: switch ($accion) {
Evalúa acción.

Línea 94: case 'crear_herramienta':
Crear herramienta.

Líneas 95 a 98:
Obtiene nombre, cantidad, estado y fecha.

Línea 100: if ($nombre === '' || $cantidad <= 0) {
Valida datos.

Línea 105: $foto = procesarFotoMayordomo(...)
Procesa foto.

Línea 106: $ok = $model->crearHerramienta(...)
Crea herramienta.

Línea 107: if (!$ok && $foto) borrarFotoMayordomo($foto);
Borra foto si falla.

Líneas 109 a 112:
Devuelve JSON.

Línea 117: case 'editar_herramienta':
Editar herramienta.

Líneas 118 a 121:
Obtiene datos.

Línea 123: if ($id <= 0 || ...)
Valida datos.

Línea 128: $foto = procesarFotoMayordomo(...)
Procesa foto.

Línea 130: $anterior = $model->obtenerHerramienta($id);
Busca herramienta anterior.

Línea 132: borrarFotoMayordomo(...)
Borra foto anterior.

Línea 136: $ok = $model->actualizarHerramienta(...)
Actualiza herramienta.

Líneas 139 a 142:
Devuelve JSON.

Línea 147: case 'crear_insumo':
Crear insumo.

Líneas 148 a 153:
Obtiene datos del insumo.

Línea 155: if ($nombre === '' || $stock < 0) {
Valida datos.

Línea 160: $foto = procesarFotoMayordomo(...)
Procesa foto.

Línea 161: $ok = $model->crearInsumo(...)
Crea insumo.

Líneas 164 a 167:
Devuelve JSON.

Línea 172: case 'editar_insumo':
Editar insumo.

Líneas 173 a 178:
Obtiene datos.

Línea 180: if ($id <= 0 || $nombre === '') {
Valida datos.

Línea 185: $foto = procesarFotoMayordomo(...)
Procesa foto.

Línea 187: $anterior = $model->obtenerInsumo($id);
Busca insumo anterior.

Línea 189: borrarFotoMayordomo(...)
Borra foto anterior.

Línea 193: $ok = $model->actualizarInsumo(...)
Actualiza insumo.

Líneas 196 a 199:
Devuelve JSON.

Línea 203: default:
Acción no reconocida.

Línea 204: echo json_encode(...)
Devuelve error.

Línea 208: catch (Exception $e)
Captura errores.

Línea 209: echo json_encode(...)
Devuelve mensaje de error.

Línea 211: ?>
Cierra PHP.

Conclusión:
Este controlador permite al mayordomo crear y editar herramientas e insumos, incluyendo carga y reemplazo de imágenes. No permite eliminar inventario.