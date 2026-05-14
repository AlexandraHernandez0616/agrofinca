Línea 1: <?php
Abre el bloque de código PHP. Indica que desde aquí empieza el código PHP.

Líneas 2 a 25: Comentario de documentación
Explica el propósito del archivo, las acciones soportadas, manejo de fotos y el formato de respuesta JSON. No ejecuta código.

Línea 27: session_start();
Inicia o reanuda la sesión del usuario. Permite usar variables de sesión como $_SESSION.

Línea 30: // Solo administradores pueden ejecutar estas acciones
Comentario que explica que solo administradores pueden usar este controlador.

Línea 31: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
Verifica si el usuario no ha iniciado sesión o si no tiene el rol ADMINISTRADOR.

Línea 32: http_response_code(403);
Envía el código HTTP 403 (Acceso prohibido).

Línea 33: echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
Devuelve un JSON indicando que el acceso fue denegado.

Línea 34: exit;
Detiene completamente la ejecución del archivo.

Línea 35: }
Cierra el bloque if de validación de permisos.

Línea 37: require_once __DIR__ . '/../config/database.php';
Incluye el archivo de conexión a la base de datos.

Línea 38: require_once __DIR__ . '/../models/Inventario.php';
Incluye el modelo Inventario para manejar herramientas e insumos.

Línea 40: $db = (new Database())->conectar();
Crea una conexión a la base de datos.

Línea 41: $model = new Inventario($db);
Crea un objeto del modelo Inventario y le pasa la conexión.

Línea 42: $accion = $_POST['accion'] ?? '';
Obtiene la acción enviada por POST. Si no existe, usa una cadena vacía.

Línea 44: // ── Directorio de uploads ──────────────────────────────────
Comentario visual que separa la sección de uploads.

Línea 45: define('UPLOAD_DIR', __DIR__ . '/../uploads/inventario/');
Define la carpeta física donde se guardarán las imágenes.

Línea 46: define('UPLOAD_URL', '../../uploads/inventario/');
Define la URL pública de acceso a las imágenes.

Línea 48: if (!is_dir(UPLOAD_DIR)) {
Verifica si la carpeta de uploads no existe.

Línea 49: mkdir(UPLOAD_DIR, 0755, true);
Crea la carpeta uploads/inventario con permisos 755.

Línea 50: }
Cierra el if de creación de carpeta.

Líneas 52 a 58: Comentario
Explica la función procesarFoto.

Línea 59: function procesarFoto(string $campo, string $prefijo): ?string {
Define la función procesarFoto que procesa y guarda imágenes.

Línea 60: if (!isset($_FILES[$campo]) || $_FILES[$campo]['error'] === UPLOAD_ERR_NO_FILE) {
Verifica si no se subió ningún archivo.

Línea 61: return null;
Devuelve null porque la foto es opcional.

Línea 62: }
Cierra el if.

Línea 64: $file = $_FILES[$campo];
Obtiene la información del archivo subido.

Línea 66: if ($file['error'] !== UPLOAD_ERR_OK) {
Verifica si hubo un error al subir el archivo.

Línea 67: throw new Exception('Error al subir la imagen (código ' . $file['error'] . ')');
Lanza una excepción si ocurrió un error.

Línea 68: }
Cierra el if.

Línea 70: // Validar tamaño (máx 3 MB)
Comentario que explica la validación de tamaño.

Línea 71: if ($file['size'] > 3 * 1024 * 1024) {
Verifica si la imagen supera los 3 MB.

Línea 72: throw new Exception('La imagen no puede superar 3 MB');
Lanza una excepción si la imagen es demasiado grande.

Línea 73: }
Cierra el if.

Línea 75: // Validar tipo MIME real (no confiar solo en la extensión)
Comentario que explica la validación MIME.

Línea 76: $mime = mime_content_type($file['tmp_name']);
Obtiene el tipo MIME real del archivo.

Línea 77: $tiposPermitidos = ['image/jpeg', 'image/png', 'image/webp'];
Define los formatos permitidos.

Línea 78: if (!in_array($mime, $tiposPermitidos, true)) {
Verifica si el tipo MIME no está permitido.

Línea 79: throw new Exception('Formato no permitido. Usa JPG, PNG o WEBP');
Lanza una excepción si el formato es inválido.

Línea 80: }
Cierra el if.

Línea 82: // Extensión segura basada en MIME
Comentario sobre la extensión segura.

Línea 83: $ext = match($mime) {
Usa match para definir la extensión correcta según el MIME.

Línea 84: 'image/jpeg' => 'jpg',
Si el MIME es JPEG, usa extensión jpg.

Línea 85: 'image/png' => 'png',
Si el MIME es PNG, usa extensión png.

Línea 86: 'image/webp' => 'webp',
Si el MIME es WEBP, usa extensión webp.

Línea 87: };
Cierra el match.

Línea 89: $nombreArchivo = $prefijo . '_' . time() . '_' . uniqid() . '.' . $ext;
Genera un nombre único para la imagen.

Línea 90: $destino = UPLOAD_DIR . $nombreArchivo;
Construye la ruta final donde se guardará la imagen.

Línea 92: if (!move_uploaded_file($file['tmp_name'], $destino)) {
Intenta mover la imagen al servidor.

Línea 93: throw new Exception('No se pudo guardar la imagen en el servidor');
Lanza una excepción si falla el guardado.

Línea 94: }
Cierra el if.

Línea 96: return $nombreArchivo;
Devuelve el nombre final de la imagen guardada.

Línea 97: }
Cierra la función procesarFoto.

Líneas 99 a 101: Comentario
Explica la función borrarFoto.

Línea 102: function borrarFoto(?string $nombre): void {
Define una función para eliminar imágenes del servidor.

Línea 103: if ($nombre && file_exists(UPLOAD_DIR . $nombre)) {
Verifica si el archivo existe.

Línea 104: @unlink(UPLOAD_DIR . $nombre);
Elimina físicamente la imagen del servidor.

Línea 105: }
Cierra el if.

Línea 106: }
Cierra la función borrarFoto.

Línea 108: try {
Inicia un bloque try para capturar errores.

Línea 109: switch ($accion) {
Evalúa la acción enviada por POST.

Línea 113: case 'crear_herramienta':
Caso para registrar una nueva herramienta.

Línea 114: $nombre = trim($_POST['nombre'] ?? '');
Obtiene el nombre de la herramienta.

Línea 115: $cantidad = (int) ($_POST['cantidad'] ?? 0);
Obtiene la cantidad y la convierte a entero.

Línea 116: $estado = trim($_POST['estado'] ?? 'DISPONIBLE');
Obtiene el estado o usa DISPONIBLE por defecto.

Línea 117: $fecha = trim($_POST['fecha'] ?? date('Y-m-d'));
Obtiene la fecha o usa la fecha actual.

Línea 119: if ($nombre === '' || $cantidad <= 0) {
Valida que el nombre y la cantidad sean válidos.

Línea 120: echo json_encode(['ok' => false, 'mensaje' => 'Nombre y cantidad son obligatorios']);
Devuelve un JSON de error.

Línea 121: exit;
Detiene la ejecución.

Línea 122: }
Cierra el if.

Línea 124: $foto = procesarFoto('foto', 'herramienta');
Procesa la imagen subida.

Línea 125: $ok = $model->crearHerramienta($nombre, $cantidad, $estado, $fecha, $foto);
Registra la herramienta en la base de datos.

Línea 127: if (!$ok && $foto) borrarFoto($foto);
Si falla la BD, elimina la foto subida.

Línea 129: echo json_encode([
Empieza la respuesta JSON.

Línea 130: 'ok' => $ok,
Devuelve si la operación fue exitosa.

Línea 131: 'mensaje' => $ok ? 'Herramienta registrada correctamente' : 'Error al registrar herramienta',
Devuelve un mensaje según el resultado.

Línea 132: ]);
Cierra el JSON.

Línea 133: break;
Finaliza el caso crear_herramienta.

Línea 135: case 'editar_herramienta':
Caso para actualizar herramientas.

Líneas 136 a 139:
Obtienen ID, nombre, cantidad, estado y fecha.

Línea 141: if ($id <= 0 || $nombre === '' || $cantidad <= 0) {
Valida datos obligatorios.

Línea 142: echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
Devuelve error JSON.

Línea 143: exit;
Detiene ejecución.

Línea 144: }
Cierra el if.

Línea 146: $foto = procesarFoto('foto', 'herramienta');
Procesa la nueva foto.

Línea 149: $anterior = $model->obtenerHerramienta($id);
Obtiene la herramienta anterior.

Línea 151: borrarFoto($anterior['foto_referencia']);
Elimina la imagen anterior.

Línea 155: $ok = $model->actualizarHerramienta(...);
Actualiza la herramienta en BD.

Línea 157: if (!$ok && $foto) borrarFoto($foto);
Elimina la foto nueva si la BD falla.

Líneas 159 a 162:
Devuelven respuesta JSON.

Línea 163: break;
Finaliza el caso editar_herramienta.

Línea 165: case 'eliminar_herramienta':
Caso para eliminar herramientas.

Línea 166: $id = (int) ($_POST['id'] ?? 0);
Obtiene el ID de la herramienta.

Línea 167: if ($id <= 0) {
Valida el ID.

Línea 168: echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
Devuelve error JSON.

Línea 169: exit;
Detiene ejecución.

Línea 170: }
Cierra el if.

Línea 172: $registro = $model->obtenerHerramienta($id);
Obtiene el registro de la herramienta.

Línea 174: borrarFoto($registro['foto_referencia']);
Elimina la imagen física.

Línea 176: $ok = $model->eliminarHerramienta($id);
Elimina la herramienta de la BD.

Líneas 177 a 180:
Devuelven respuesta JSON.

Línea 181: break;
Finaliza el caso eliminar_herramienta.

Línea 183: // ── INSUMOS ───────────────────────────────────────
Comentario que separa la sección de insumos.

Línea 185: case 'crear_insumo':
Caso para crear insumos.

Líneas 186 a 191:
Obtienen datos del insumo.

Línea 193: if ($nombre === '' || $stock < 0) {
Valida nombre y stock.

Línea 194: echo json_encode(['ok' => false, 'mensaje' => 'Nombre y stock son obligatorios']);
Devuelve error JSON.

Línea 195: exit;
Detiene ejecución.

Línea 198: $foto = procesarFoto('foto', 'insumo');
Procesa la imagen del insumo.

Línea 199: $ok = $model->crearInsumo(...);
Registra el insumo en BD.

Línea 201: if (!$ok && $foto) borrarFoto($foto);
Elimina la imagen si falla la BD.

Líneas 203 a 206:
Devuelven respuesta JSON.

Línea 207: break;
Finaliza el caso crear_insumo.

Línea 209: case 'editar_insumo':
Caso para editar insumos.

Líneas 210 a 215:
Obtienen datos del insumo.

Línea 217: if ($id <= 0 || $nombre === '') {
Valida datos obligatorios.

Línea 218: echo json_encode(['ok' => false, 'mensaje' => 'Datos incompletos']);
Devuelve error JSON.

Línea 219: exit;
Detiene ejecución.

Línea 222: $foto = procesarFoto('foto', 'insumo');
Procesa nueva foto.

Línea 225: $anterior = $model->obtenerInsumo($id);
Obtiene el insumo anterior.

Línea 227: borrarFoto($anterior['foto_referencia']);
Elimina imagen anterior.

Línea 231: $ok = $model->actualizarInsumo(...);
Actualiza el insumo.

Línea 233: if (!$ok && $foto) borrarFoto($foto);
Elimina la foto nueva si falla la BD.

Líneas 235 a 238:
Devuelven respuesta JSON.

Línea 239: break;
Finaliza el caso editar_insumo.

Línea 241: case 'eliminar_insumo':
Caso para eliminar insumos.

Línea 242: $id = (int) ($_POST['id'] ?? 0);
Obtiene el ID del insumo.

Línea 243: if ($id <= 0) {
Valida el ID.

Línea 244: echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
Devuelve error JSON.

Línea 245: exit;
Detiene ejecución.

Línea 247: $registro = $model->obtenerInsumo($id);
Obtiene el insumo.

Línea 249: borrarFoto($registro['foto_referencia']);
Elimina la imagen física.

Línea 251: $ok = $model->eliminarInsumo($id);
Elimina el insumo de la BD.

Líneas 252 a 255:
Devuelven respuesta JSON.

Línea 256: break;
Finaliza el caso eliminar_insumo.

Línea 258: default:
Caso por defecto si la acción no existe.

Línea 259: echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
Devuelve error JSON.

Línea 260: }
Cierra el switch.

Línea 262: } catch (Exception $e) {
Captura errores generales.

Línea 263: echo json_encode(['ok' => false, 'mensaje' => $e->getMessage()]);
Devuelve el mensaje del error.

Línea 264: }
Cierra el catch.

Línea 265: ?>
Cierra el bloque PHP.

Conclusión:
Este controlador administra completamente el módulo de inventarios del administrador. Permite crear, editar y eliminar herramientas e insumos, además de gestionar imágenes subidas al servidor validando tamaño, formato y almacenamiento seguro.