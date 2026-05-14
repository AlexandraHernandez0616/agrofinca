Línea 1: <?php
Abre PHP.

Líneas 2 a 15: Comentario de documentación
Explica que maneja cultivos del mayordomo y sus acciones.

Línea 17: session_start();
Inicia sesión.

Línea 19: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Valida que sea mayordomo.

Línea 20: http_response_code(403);
Envía acceso prohibido.

Línea 21: echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
Devuelve error JSON.

Línea 22: exit;
Detiene ejecución.

Línea 25: require_once __DIR__ . '/../config/database.php';
Incluye base de datos.

Línea 26: require_once __DIR__ . '/../models/MayordomoCultivo.php';
Incluye el modelo MayordomoCultivo.

Línea 28: header('Content-Type: application/json');
Define respuesta JSON.

Línea 30: $db = (new Database())->conectar();
Conecta a la base de datos.

Línea 31: $model = new MayordomoCultivo($db);
Crea el modelo.

Línea 32: $accion = trim($_POST['accion'] ?? '');
Obtiene la acción.

Línea 34: try {
Inicia control de errores.

Línea 35: switch ($accion) {
Evalúa la acción.

Línea 38: case 'registrar':
Caso para registrar cultivo.

Líneas 39 a 43:
Obtienen nombre, variedad, cantidad, fecha y estado.

Línea 45: if ($nombre === '') {
Valida nombre obligatorio.

Línea 49: if ($variedad === '') {
Valida variedad obligatoria.

Línea 53: if ($model->existeDuplicado($nombre, $variedad)) {
Evita registrar cultivo duplicado.

Línea 58: $ok = $model->registrar(...)
Registra el cultivo.

Líneas 59 a 62:
Devuelve respuesta JSON.

Línea 66: case 'editar':
Caso para editar cultivo.

Líneas 67 a 72:
Obtienen ID y datos del cultivo.

Línea 74: if ($id <= 0 || $nombre === '' || $variedad === '') {
Valida datos obligatorios.

Línea 78: if ($model->existeDuplicado($nombre, $variedad, $id)) {
Evita duplicados al editar.

Línea 83: $ok = $model->editar(...)
Actualiza el cultivo.

Líneas 84 a 87:
Devuelve JSON.

Línea 91: case 'toggle_estado':
Caso para cambiar estado.

Línea 92: $id = (int) ($_POST['id'] ?? 0);
Obtiene ID.

Línea 93: $estado = strtoupper(trim($_POST['estado'] ?? ''));
Obtiene estado en mayúsculas.

Línea 95: if ($id <= 0) {
Valida ID.

Línea 99: if (!in_array($estado, ['ACTIVO', 'INHABILITADO'], true)) {
Valida estado permitido.

Línea 104: $ok = $model->toggleEstado($id, $estado);
Cambia el estado.

Líneas 105 a 110:
Devuelve mensaje según el nuevo estado.

Línea 114: case 'eliminar':
Caso para eliminar cultivo.

Línea 115: $id = (int) ($_POST['id'] ?? 0);
Obtiene ID.

Línea 117: if ($id <= 0) {
Valida ID.

Línea 121: if ($model->tieneLotes($id)) {
Verifica si el cultivo tiene lotes asociados.

Línea 128: $ok = $model->eliminar($id);
Elimina el cultivo.

Líneas 129 a 132:
Devuelve JSON.

Línea 136: default:
Acción no reconocida.

Línea 137: echo json_encode(...)
Devuelve error.

Línea 140: } catch (Exception $e) {
Captura errores.

Línea 141: echo json_encode(...)
Devuelve error interno.

Línea 143: ?>
Cierra PHP.

Conclusión:
Este controlador permite al mayordomo registrar, editar, activar, inhabilitar y eliminar cultivos, siempre validando datos y evitando eliminar cultivos con lotes asociados.