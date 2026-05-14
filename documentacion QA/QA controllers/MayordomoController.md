Línea 1: <?php
Abre PHP.

Líneas 2 a 13: Comentario de documentación
Explica que maneja el módulo Mayordomos y responde JSON.

Línea 14: session_start();
Inicia la sesión.

Línea 15: header('Content-Type: application/json');
Indica que la respuesta será JSON.

Línea 17: require_once __DIR__ . '/../config/database.php';
Incluye la conexión a base de datos.

Línea 18: require_once __DIR__ . '/../models/Mayordomo.php';
Incluye el modelo Mayordomo.

Línea 21: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
Valida que el usuario sea administrador.

Línea 22: echo json_encode(['ok' => false, 'msg' => 'Sin autorización']);
Devuelve error de autorización.

Línea 23: exit;
Detiene ejecución.

Línea 26: if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
Verifica que la petición sea POST.

Línea 27: echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
Devuelve error si no es POST.

Línea 28: exit;
Detiene ejecución.

Línea 31: $accion = trim($_POST['accion'] ?? '');
Obtiene la acción enviada.

Línea 32: $db = (new Database())->conectar();
Crea conexión a la base de datos.

Línea 33: $model = new Mayordomo($db);
Crea el modelo Mayordomo.

Línea 36: if ($accion === 'registrar') {
Inicia el proceso de registrar mayordomo.

Líneas 38 a 43:
Obtienen nombres, apellidos, documento, username, password y estado activo.

Línea 46: if (empty(...)) {
Valida campos obligatorios.

Línea 47: echo json_encode(...)
Devuelve error si faltan campos.

Línea 50: if (strlen($password) < 6) {
Valida longitud mínima de contraseña.

Línea 54: if ($model->existeUsername($username)) {
Verifica si el usuario ya existe.

Línea 58: if ($model->existeDocumento($documento)) {
Verifica si el documento ya está registrado.

Líneas 63 a 70: $datos = [...]
Arma el arreglo con los datos del mayordomo.

Línea 68: password_hash($password, PASSWORD_BCRYPT)
Encripta la contraseña.

Línea 73: $resultado = $model->registrar($datos);
Registra el mayordomo.

Líneas 74 a 78:
Devuelve JSON de éxito o error.

Línea 82: if ($accion === 'actualizar') {
Inicia el proceso de actualizar mayordomo.

Líneas 84 a 90:
Obtienen ID, nombres, apellidos, documento, username, password y activo.

Línea 92: if (!$id || empty(...)) {
Valida datos incompletos.

Línea 96: if ($model->existeUsername($username, $id)) {
Verifica que otro usuario no tenga el mismo username.

Línea 100: if ($model->existeDocumento($documento, $id)) {
Verifica que otro usuario no tenga el mismo documento.

Líneas 105 a 111: $datos = [...]
Prepara los datos actualizables.

Línea 113: if (!empty($password)) {
Verifica si se desea cambiar contraseña.

Línea 114: if (strlen($password) < 6) {
Valida contraseña nueva.

Línea 118: $datos['password_hash'] = password_hash(...)
Guarda la contraseña nueva encriptada.

Línea 121: $resultado = $model->actualizar($id, $datos);
Actualiza el mayordomo.

Líneas 122 a 126:
Devuelve JSON de éxito o error.

Línea 131: echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
Responde si la acción no existe.

Línea 132: ?>
Cierra PHP.

Conclusión:
Este controlador permite al administrador registrar y actualizar mayordomos, validando datos, evitando duplicados y encriptando contraseñas.