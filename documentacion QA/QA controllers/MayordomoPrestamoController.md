Línea 1: <?php
Abre PHP.

Líneas 2 a 18: Comentario de documentación
Explica el manejo de préstamos por parte del mayordomo.

Línea 20: session_start();
Inicia sesión.

Línea 22: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Valida rol mayordomo.

Líneas 23 a 25:
Devuelve acceso denegado.

Líneas 28 a 30:
Incluyen base de datos, modelo y notificaciones.

Línea 32: header('Content-Type: application/json');
Define JSON.

Línea 34: $db = (new Database())->conectar();
Conecta BD.

Línea 35: $model = new MayordomoPrestamo($db);
Crea modelo.

Línea 36: $id_mayordomo = (int) $_SESSION['id_usuario'];
Guarda ID del mayordomo.

Línea 39: if ($_SERVER['REQUEST_METHOD'] === 'GET') {
Procesa detalle por GET.

Línea 40: $accionGet = trim($_GET['accion'] ?? '');
Obtiene acción GET.

Línea 41: if ($accionGet === 'detalle') {
Valida acción detalle.

Línea 42: $id = (int) ($_GET['id'] ?? 0);
Obtiene ID.

Línea 43: if ($id <= 0) {
Valida ID.

Línea 48: $detalle = $model->detalle($id);
Consulta detalle del préstamo.

Línea 49: echo json_encode(...)
Devuelve detalle.

Línea 54: $accion = trim($_POST['accion'] ?? '');
Obtiene acción POST.

Línea 57: switch ($accion) {
Evalúa acción.

Línea 60: case 'aprobar':
Caso aprobar préstamo.

Línea 61: $id = (int) ($_POST['id'] ?? 0);
Obtiene ID.

Línea 62: if ($id <= 0) {
Valida ID.

Línea 66: $ok = $model->aprobar($id);
Aprueba el préstamo.

Línea 67: if ($ok) {
Si aprueba, notifica.

Líneas 69 a 74:
Busca el trabajador dueño del préstamo.

Líneas 77 a 83:
Envía notificación de aprobación.

Líneas 87 a 90:
Devuelve JSON.

Línea 94: case 'negar':
Caso negar préstamo.

Líneas 95 a 96:
Obtiene ID y observación.

Línea 97: if ($id <= 0) {
Valida ID.

Línea 101: $ok = $model->negar($id, $obs);
Niega el préstamo.

Líneas 104 a 109:
Busca trabajador relacionado.

Línea 112: $motivo = $obs ? " Motivo: $obs" : '';
Prepara motivo opcional.

Líneas 113 a 119:
Envía notificación de negación.

Líneas 124 a 127:
Devuelve JSON.

Línea 131: case 'registrar_devolucion':
Caso registrar devolución.

Líneas 132 a 135:
Obtiene ID, fecha, estado y observación.

Línea 137: if ($id <= 0) {
Valida ID.

Línea 141: if ($fecha_dev === '') {
Valida fecha.

Línea 145: $estadosValidos = ['BUENO', 'DAÑADO', 'PARCIAL'];
Define estados válidos.

Línea 146: if (!in_array(...)) {
Valida estado.

Línea 151: $ok = $model->registrarDevolucion(...)
Registra devolución.

Líneas 154 a 159:
Busca trabajador.

Líneas 162 a 168:
Envía notificación.

Líneas 173 a 176:
Devuelve JSON.

Línea 180: default:
Acción no reconocida.

Línea 185: catch (Exception $e)
Captura errores.

Línea 186: echo json_encode(...)
Devuelve error interno.

Línea 188: ?>
Cierra PHP.

Conclusión:
Este controlador permite al mayordomo aprobar, negar y registrar devoluciones de préstamos, además de notificar al trabajador en cada proceso.