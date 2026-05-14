Línea 1: <?php
Abre PHP.

Líneas 2 a 16: Comentario de documentación
Explica acciones del módulo Tareas.

Línea 18: session_start();
Inicia sesión.

Línea 20: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Valida que sea mayordomo.

Líneas 21 a 23:
Devuelve acceso denegado.

Líneas 26 a 28:
Incluyen conexión, modelo y notificaciones.

Línea 30: header('Content-Type: application/json');
Define JSON.

Línea 32: $db = (new Database())->conectar();
Conecta BD.

Línea 33: $model = new MayordomoTarea($db);
Crea modelo.

Línea 34: $id_mayordomo = (int) $_SESSION['id_usuario'];
Obtiene ID del mayordomo.

Línea 35: $accion = trim($_POST['accion'] ?? '');
Obtiene acción.

Línea 38: switch ($accion) {
Evalúa acción.

Línea 41: case 'crear':
Caso crear tarea.

Líneas 42 a 48:
Obtiene lote, nombre, descripción, fechas, estado y trabajadores.

Líneas 50 a 64:
Valida nombre, lote, fecha inicio y fecha fin.

Línea 66: $estadosValidos = [...]
Define estados permitidos.

Línea 67: if (!in_array($estado, $estadosValidos, true)) {
Valida estado.

Línea 68: $estado = 'PENDIENTE';
Si no es válido, usa PENDIENTE.

Línea 71: $ok = $model->crear(...)
Crea la tarea.

Línea 75: if ($ok && !empty($trabajadores)) {
Si se creó y hay trabajadores, notifica.

Líneas 77 a 83:
Envía notificación a trabajadores asignados.

Líneas 86 a 89:
Devuelve JSON.

Línea 93: case 'editar':
Caso editar tarea.

Líneas 94 a 101:
Obtiene datos de la tarea.

Línea 103: if ($id_tarea <= 0 || ...)
Valida datos incompletos.

Línea 108: $ok = $model->editar(...)
Actualiza tarea y trabajadores.

Línea 112: if ($ok && !empty($trabajadores)) {
Si actualiza, notifica.

Líneas 114 a 120:
Envía notificación de actualización.

Líneas 123 a 126:
Devuelve JSON.

Línea 130: case 'cambiar_estado':
Caso cambiar estado.

Línea 131: $id_tarea = (int) ($_POST['id'] ?? 0);
Obtiene ID.

Línea 132: $estado = strtoupper(trim($_POST['estado'] ?? ''));
Obtiene estado.

Línea 134: if ($id_tarea <= 0) {
Valida ID.

Línea 138: $estadosValidos = [...]
Define estados.

Línea 139: if (!in_array(...)) {
Valida estado.

Línea 144: $ok = $model->cambiarEstado($id_tarea, $estado);
Cambia estado.

Línea 145: $lblEstado = match($estado) {
Convierte estado a texto bonito.

Líneas 146 a 148:
Define Pendiente, En progreso o Completada.

Línea 151: if ($ok) {
Si cambia correctamente, notifica.

Líneas 154 a 159:
Busca trabajadores asignados.

Líneas 161 a 168:
Envía notificación.

Líneas 173 a 176:
Devuelve JSON.

Línea 180: case 'eliminar':
Caso eliminar tarea.

Línea 181: $id_tarea = (int) ($_POST['id'] ?? 0);
Obtiene ID.

Línea 183: if ($id_tarea <= 0) {
Valida ID.

Línea 188: $ok = $model->eliminar($id_tarea);
Elimina tarea.

Líneas 189 a 194:
Devuelve JSON, indicando que solo se eliminan tareas pendientes.

Línea 198: default:
Acción no reconocida.

Línea 203: catch (Exception $e)
Captura errores.

Línea 204: echo json_encode(...)
Devuelve error interno.

Línea 206: ?>
Cierra PHP.

Conclusión:
Este controlador administra tareas del mayordomo. Permite crear, editar, cambiar estado y eliminar tareas, asignando trabajadores y enviando notificaciones cuando corresponde.