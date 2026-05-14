Línea 1: <?php
Abre el bloque de código PHP. Indica que desde aquí empieza el código PHP.

Líneas 2 a 14: Comentario de documentación
Explica el propósito del archivo, las acciones soportadas y el formato de respuesta JSON. No ejecuta código.

Línea 16: session_start();
Inicia o reanuda la sesión del usuario. Permite usar variables $_SESSION.

Línea 18: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
Verifica si el usuario no ha iniciado sesión o si no es ADMINISTRADOR.

Línea 19: http_response_code(403);
Envía el código HTTP 403 (Acceso prohibido).

Línea 20: echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
Devuelve una respuesta JSON indicando que el acceso fue denegado.

Línea 21: exit;
Detiene completamente la ejecución del archivo.

Línea 22: }
Cierra el bloque if de validación.

Línea 24: require_once __DIR__ . '/../config/database.php';
Incluye el archivo de conexión a la base de datos.

Línea 25: require_once __DIR__ . '/../models/Liquidacion.php';
Incluye el modelo Liquidacion para manejar las liquidaciones.

Línea 26: require_once __DIR__ . '/../models/Notificacion.php';
Incluye el modelo Notificacion para enviar notificaciones.

Línea 28: header('Content-Type: application/json');
Indica que las respuestas serán en formato JSON.

Línea 30: $db = (new Database())->conectar();
Crea una conexión a la base de datos.

Línea 31: $model = new Liquidacion($db);
Crea un objeto del modelo Liquidacion.

Línea 32: $accion = trim($_POST['accion'] ?? '');
Obtiene la acción enviada por POST y elimina espacios innecesarios.

Línea 34: try {
Inicia un bloque try para capturar errores.

Línea 35: switch ($accion) {
Evalúa la acción recibida.

Línea 38: case 'generar':
Caso para generar una nueva liquidación.

Línea 39: $id_trabajador = (int) ($_POST['id_trabajador'] ?? 0);
Obtiene el ID del trabajador.

Línea 40: $id_tarifa = (int) ($_POST['id_tarifa'] ?? 0);
Obtiene el ID de la tarifa.

Línea 41: $inicio = trim($_POST['periodo_inicio'] ?? '');
Obtiene la fecha de inicio del período.

Línea 42: $fin = trim($_POST['periodo_fin'] ?? '');
Obtiene la fecha final del período.

Línea 43: $jornadas = (float) ($_POST['jornadas'] ?? 0);
Obtiene la cantidad de jornadas trabajadas.

Línea 44: $produccion = (float) ($_POST['produccion'] ?? 0);
Obtiene la producción registrada.

Línea 45: $valor = (float) ($_POST['valor_calculado'] ?? 0);
Obtiene el valor calculado de la liquidación.

Línea 46: $fecha_gen = date('Y-m-d');
Guarda la fecha actual de generación.

Línea 47: $obs = trim($_POST['observacion'] ?? '') ?: null;
Obtiene la observación. Si está vacía, guarda null.

Línea 50: if ($id_trabajador <= 0) {
Valida que el trabajador sea válido.

Línea 51: echo json_encode(['ok' => false, 'mensaje' => 'Selecciona un trabajador']);
Devuelve error JSON.

Línea 52: exit;
Detiene ejecución.

Línea 53: }
Cierra el if.

Línea 54: if ($id_tarifa <= 0) {
Valida que la tarifa sea válida.

Línea 55: echo json_encode(['ok' => false, 'mensaje' => 'Selecciona una tarifa']);
Devuelve error JSON.

Línea 56: exit;
Detiene ejecución.

Línea 57: }
Cierra el if.

Línea 58: if ($inicio === '' || $fin === '') {
Verifica que ambas fechas existan.

Línea 59: echo json_encode(['ok' => false, 'mensaje' => 'El período de inicio y fin son obligatorios']);
Devuelve error JSON.

Línea 60: exit;
Detiene ejecución.

Línea 61: }
Cierra el if.

Línea 62: if ($inicio > $fin) {
Verifica que la fecha de inicio no sea mayor a la final.

Línea 63: echo json_encode(['ok' => false, 'mensaje' => 'La fecha de inicio no puede ser posterior al fin']);
Devuelve error JSON.

Línea 64: exit;
Detiene ejecución.

Línea 65: }
Cierra el if.

Línea 66: if ($valor <= 0) {
Verifica que el valor calculado sea mayor que cero.

Línea 67: echo json_encode(['ok' => false, 'mensaje' => 'El valor calculado debe ser mayor a 0']);
Devuelve error JSON.

Línea 68: exit;
Detiene ejecución.

Línea 69: }
Cierra el if.

Línea 71: $ok = $model->crear(
Llama al método crear del modelo Liquidacion.

Línea 72: $id_trabajador, $id_tarifa,
Envía trabajador y tarifa.

Línea 73: $inicio, $fin,
Envía fechas del período.

Línea 74: $jornadas, $produccion,
Envía jornadas y producción.

Línea 75: $valor, $fecha_gen, $obs
Envía valor, fecha y observación.

Línea 76: );
Cierra la llamada al método crear.

Línea 77: if ($ok) {
Verifica si la liquidación se creó correctamente.

Línea 78: try {
Inicia un try interno para enviar notificaciones.

Línea 79: Notificacion::enviar(
Llama al método enviar de la clase Notificacion.

Línea 80: $db,
Envía la conexión a la base de datos.

Línea 81: $id_trabajador,
Indica que la notificación será enviada al trabajador.

Línea 82: 'info',
Define el tipo de notificación.

Línea 83: 'Se generó una nueva liquidación a tu nombre. Consulta el resumen en tu panel.',
Define el mensaje de la notificación.

Línea 84: '../../views/trabajador/dashboard.php'
Define el enlace relacionado con la notificación.

Línea 85: );
Cierra el método enviar.

Línea 86: } catch (Exception $e) { /* no interrumpir */ }
Captura errores sin detener el proceso.

Línea 87: }
Cierra el if.

Línea 89: echo json_encode([
Empieza la respuesta JSON.

Línea 90: 'ok' => $ok,
Devuelve si la operación fue exitosa.

Línea 91: 'mensaje' => $ok ? 'Liquidación generada correctamente' : 'Error al generar la liquidación',
Devuelve mensaje según el resultado.

Línea 92: ]);
Cierra el JSON.

Línea 93: break;
Finaliza el caso generar.

Línea 96: case 'cambiar_estado':
Caso para cambiar el estado de una liquidación.

Línea 97: $id = (int) ($_POST['id'] ?? 0);
Obtiene el ID de la liquidación.

Línea 98: $estado = strtoupper(trim($_POST['estado'] ?? ''));
Obtiene el estado y lo convierte a mayúsculas.

Línea 100: if ($id <= 0) {
Valida el ID.

Línea 101: echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
Devuelve error JSON.

Línea 102: exit;
Detiene ejecución.

Línea 103: }
Cierra el if.

Línea 105: $estadosValidos = ['PENDIENTE', 'GENERADA', 'LIQUIDADA'];
Define los estados permitidos.

Línea 106: if (!in_array($estado, $estadosValidos, true)) {
Verifica si el estado no es válido.

Línea 107: echo json_encode(['ok' => false, 'mensaje' => 'Estado inválido']);
Devuelve error JSON.

Línea 108: exit;
Detiene ejecución.

Línea 109: }
Cierra el if.

Línea 112: $fecha_liq = ($estado === 'LIQUIDADA') ? date('Y-m-d') : null;
Si el estado es LIQUIDADA, guarda la fecha actual.

Línea 114: $ok = $model->cambiarEstado($id, $estado, $fecha_liq);
Actualiza el estado de la liquidación.

Línea 115: if ($ok) {
Verifica si el cambio fue exitoso.

Línea 116: try {
Inicia un try interno.

Línea 117: $w = $db->prepare(
Prepara una consulta SQL.

Línea 118: "SELECT id_trabajador FROM liquidacion WHERE id_liquidacion = :id LIMIT 1"
Busca el trabajador relacionado con la liquidación.

Línea 119: );
Cierra la preparación.

Línea 120: $w->bindParam(':id', $id, PDO::PARAM_INT);
Vincula el parámetro :id.

Línea 121: $w->execute();
Ejecuta la consulta.

Línea 122: $id_t = (int) ($w->fetchColumn() ?: 0);
Obtiene el ID del trabajador.

Línea 123: if ($id_t > 0) {
Verifica que exista trabajador.

Línea 124: $msg = match ($estado) {
Define un mensaje según el estado.

Línea 125: 'GENERADA' => 'Tu liquidación fue marcada como generada (pendiente de pago).',
Mensaje para estado GENERADA.

Línea 126: 'LIQUIDADA' => 'Tu liquidación fue marcada como liquidada.',
Mensaje para estado LIQUIDADA.

Línea 127: default => 'El estado de una de tus liquidaciones fue actualizado.',
Mensaje por defecto.

Línea 128: };
Cierra el match.

Línea 129: Notificacion::enviar(
Envía notificación al trabajador.

Línea 130: $db,
Envía conexión.

Línea 131: $id_t,
Envía ID del trabajador.

Línea 132: $estado === 'LIQUIDADA' ? 'success' : 'info',
Define tipo de notificación.

Línea 133: $msg,
Envía mensaje.

Línea 134: '../../views/trabajador/dashboard.php'
Envía enlace.

Línea 135: );
Cierra método enviar.

Línea 136: }
Cierra el if.

Línea 137: } catch (Exception $e) { /* no interrumpir */ }
Captura errores.

Línea 138: }
Cierra el if principal.

Línea 139: echo json_encode([
Empieza respuesta JSON.

Línea 140: 'ok' => $ok,
Indica éxito o error.

Línea 141: 'mensaje' => $ok
Define mensaje dinámico.

Línea 142: ? 'Estado actualizado a ' . ucfirst(strtolower($estado))
Mensaje si fue exitoso.

Línea 143: : 'Error al actualizar el estado',
Mensaje si falló.

Línea 144: ]);
Cierra el JSON.

Línea 145: break;
Finaliza el caso cambiar_estado.

Línea 148: case 'eliminar':
Caso para eliminar liquidaciones.

Línea 149: $id = (int) ($_POST['id'] ?? 0);
Obtiene el ID.

Línea 151: if ($id <= 0) {
Valida ID.

Línea 152: echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
Devuelve error.

Línea 153: exit;
Detiene ejecución.

Línea 154: }
Cierra el if.

Línea 155: if ($model->tienePagos($id)) {
Verifica si la liquidación tiene pagos registrados.

Línea 156: echo json_encode([
Empieza respuesta JSON.

Línea 157: 'ok' => false,
Indica error.

Línea 158: 'mensaje' => 'No se puede eliminar: la liquidación tiene pagos registrados',
Mensaje de restricción.

Línea 159: ]);
Cierra el JSON.

Línea 160: exit;
Detiene ejecución.

Línea 161: }
Cierra el if.

Línea 163: $ok = $model->eliminar($id);
Elimina la liquidación.

Línea 164: echo json_encode([
Empieza respuesta JSON.

Línea 165: 'ok' => $ok,
Indica éxito o error.

Línea 166: 'mensaje' => $ok
Mensaje dinámico.

Línea 167: ? 'Liquidación eliminada correctamente'
Mensaje si fue exitoso.

Línea 168: : 'Solo se pueden eliminar liquidaciones en estado PENDIENTE',
Mensaje si falló.

Línea 169: ]);
Cierra el JSON.

Línea 170: break;
Finaliza el caso eliminar.

Línea 172: default:
Caso por defecto si la acción no existe.

Línea 173: echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
Devuelve error JSON.

Línea 174: }
Cierra el switch.

Línea 176: } catch (Exception $e) {
Captura errores generales.

Línea 177: echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
Devuelve mensaje de error interno.

Línea 178: }
Cierra el catch.

Línea 179: ?>
Cierra el bloque PHP.

Conclusión:
Este controlador administra completamente el módulo de liquidaciones. Permite generar nuevas liquidaciones, cambiar estados entre PENDIENTE, GENERADA y LIQUIDADA, eliminar liquidaciones válidas y enviar notificaciones automáticas a los trabajadores cuando ocurren cambios importantes.