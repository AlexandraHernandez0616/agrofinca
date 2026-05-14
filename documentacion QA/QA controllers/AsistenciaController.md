Línea 1: <?php
Abre el bloque de código PHP. Sirve para indicar que desde aquí empieza código PHP.

Líneas 2 a 22: Comentario de documentación
Explica el propósito del archivo, quién lo llama, qué acción permite, qué datos recibe, qué responde y qué protección tiene. No ejecuta nada.

Línea 23: session_start();
Inicia o reanuda la sesión del usuario. Sirve para poder usar $_SESSION y verificar si el usuario está logueado.

Línea 24: header('Content-Type: application/json');
Indica que la respuesta del archivo será en formato JSON. Sirve para que JavaScript pueda interpretar correctamente la respuesta.

Línea 26: require_once __DIR__ . '/../config/database.php';
Incluye el archivo de conexión a la base de datos. Sirve para poder usar la clase Database.

Línea 27: require_once __DIR__ . '/../models/TrabajadorMayordomo.php';
Incluye el modelo TrabajadorMayordomo. Sirve para usar sus métodos, como marcarAsistencia.

Línea 30: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Verifica si no hay usuario en sesión o si el rol no es MAYORDOMO.

Línea 31: echo json_encode(['ok' => false, 'msg' => 'Sin autorización']);
Devuelve una respuesta JSON indicando que el usuario no tiene autorización.

Línea 32: exit;
Detiene la ejecución del archivo para que no continúe procesando nada.

Línea 33: }
Cierra el bloque if de autorización.

Línea 35: if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
Verifica si la petición no fue enviada por método POST.

Línea 36: echo json_encode(['ok' => false, 'msg' => 'Método no permitido']);
Devuelve una respuesta JSON indicando que el método usado no está permitido.

Línea 37: exit;
Detiene la ejecución del archivo.

Línea 38: }
Cierra el bloque if que valida el método POST.

Línea 40: $accion = trim($_POST['accion'] ?? '');
Obtiene el valor de accion enviado por POST. Si no existe, usa una cadena vacía. trim elimina espacios al inicio y al final.

Línea 41: $id_trabajador = (int)($_POST['id_trabajador'] ?? 0);
Obtiene el ID del trabajador enviado por POST. Si no existe, usa 0. Luego lo convierte a entero.

Línea 42: $hora_entrada = trim($_POST['hora_entrada'] ?? '');
Obtiene la hora de entrada enviada por POST. Si no existe, usa una cadena vacía.

Línea 43: $hora_salida = trim($_POST['hora_salida'] ?? '') ?: null;
Obtiene la hora de salida. Si está vacía, guarda null. Sirve porque la hora de salida es opcional.

Línea 45: // ── MARCAR ASISTENCIA ─────────────────────────────────────
Comentario visual que separa la sección donde se procesa la asistencia.

Línea 46: if ($accion === 'marcar') {
Verifica si la acción recibida es marcar. Si es así, ejecuta el proceso para registrar asistencia.

Línea 48: if (!$id_trabajador) {
Verifica si el ID del trabajador es inválido o igual a 0.

Línea 49: echo json_encode(['ok' => false, 'msg' => 'Trabajador no válido']);
Devuelve un JSON indicando que el trabajador no es válido.

Línea 50: exit;
Detiene la ejecución para que no se registre una asistencia incorrecta.

Línea 51: }
Cierra el if que valida el trabajador.

Línea 52: if (empty($hora_entrada)) {
Verifica si la hora de entrada está vacía.

Línea 53: echo json_encode(['ok' => false, 'msg' => 'La hora de entrada es obligatoria']);
Devuelve un JSON indicando que la hora de entrada es obligatoria.

Línea 54: exit;
Detiene la ejecución porque no se puede marcar asistencia sin hora de entrada.

Línea 55: }
Cierra el if que valida la hora de entrada.

Línea 57: $db = (new Database())->conectar();
Crea una instancia de Database y llama al método conectar. Sirve para obtener la conexión a la base de datos.

Línea 58: $model = new TrabajadorMayordomo($db);
Crea un objeto del modelo TrabajadorMayordomo y le pasa la conexión a la base de datos.

Línea 59: $resultado = $model->marcarAsistencia($id_trabajador, $hora_entrada, $hora_salida);
Llama al método marcarAsistencia del modelo. Envía el ID del trabajador, la hora de entrada y la hora de salida.

Línea 61: if ($resultado === true) {
Verifica si el resultado fue true, lo que significa que la asistencia se registró correctamente.

Línea 62: echo json_encode(['ok' => true, 'msg' => 'Asistencia registrada correctamente']);
Devuelve un JSON indicando que la asistencia fue registrada correctamente.

Línea 63: } else {
Indica qué hacer si el resultado no fue true.

Línea 64: echo json_encode(['ok' => false, 'msg' => $resultado]);
Devuelve un JSON con error. El mensaje será el resultado devuelto por el modelo.

Línea 65: }
Cierra el if que verifica si la asistencia fue registrada correctamente.

Línea 66: exit;
Detiene la ejecución después de responder al cliente.

Línea 67: }
Cierra el if de la acción marcar.

Línea 69: echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
Devuelve un JSON indicando que la acción enviada no existe o no está permitida.

Línea 70: ?>
Cierra el bloque PHP.

Conclusión:
Este archivo funciona como un controlador para registrar la asistencia de trabajadores. Primero valida que el usuario sea un MAYORDOMO, luego verifica que la petición sea POST, recibe los datos enviados, valida el trabajador y la hora de entrada, conecta con la base de datos y usa el modelo TrabajadorMayordomo para registrar o actualizar la asistencia del día.