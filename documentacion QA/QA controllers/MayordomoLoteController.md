Línea 1: <?php
Abre PHP.

Líneas 2 a 15: Comentario de documentación
Explica que el mayordomo puede registrar y editar lotes.

Línea 17: session_start();
Inicia sesión.

Línea 19: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Valida rol mayordomo.

Líneas 20 a 22:
Devuelve acceso denegado y detiene ejecución.

Línea 25: require_once __DIR__ . '/../config/database.php';
Incluye conexión.

Línea 26: require_once __DIR__ . '/../models/MayordomoLote.php';
Incluye modelo de lotes.

Línea 28: header('Content-Type: application/json');
Define respuesta JSON.

Línea 30: $db = (new Database())->conectar();
Conecta a BD.

Línea 31: $model = new MayordomoLote($db);
Crea modelo.

Línea 32: $accion = trim($_POST['accion'] ?? '');
Obtiene acción.

Línea 35: switch ($accion) {
Evalúa acción.

Línea 38: case 'registrar':
Caso registrar lote.

Líneas 39 a 43:
Obtiene nombre, ubicación, extensión, cultivo y fecha.

Línea 45: if ($nombre === '') {
Valida nombre.

Línea 49: if ($id_cultivo <= 0) {
Valida cultivo.

Línea 54: $ok = $model->registrar(...)
Registra lote.

Líneas 55 a 58:
Devuelve JSON.

Línea 62: case 'editar':
Caso editar lote.

Líneas 63 a 68:
Obtiene ID y datos del lote.

Línea 70: if ($id <= 0 || $nombre === '') {
Valida datos principales.

Línea 74: if ($id_cultivo <= 0) {
Valida cultivo.

Línea 79: $ok = $model->editar(...)
Actualiza lote.

Líneas 80 a 83:
Devuelve JSON.

Línea 87: default:
Acción no reconocida.

Línea 88: echo json_encode(...)
Devuelve error.

Línea 92: catch (Exception $e)
Captura errores.

Línea 93: echo json_encode(...)
Devuelve error interno.

Línea 95: ?>
Cierra PHP.

Conclusión:
Este controlador permite al mayordomo registrar y editar lotes, pero no eliminarlos. Valida nombre y cultivo antes de guardar.