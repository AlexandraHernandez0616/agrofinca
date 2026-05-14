Línea 1: <?php
Qué hace: Abre PHP.
Con qué se conecta: Con servidor PHP.
Para qué sirve: Ejecutar backend de asistencia.
Si se quita: No se interpretaría correctamente.

Líneas 2 a 24: Comentario de documentación
Qué hace: Explica entrada/salida del trabajador.
Con qué se conecta: Con documentación del dashboard del trabajador.
Para qué sirve: Aclara diferencia con AsistenciaController del mayordomo.
Si se quita: Código funciona, pero pierde contexto.

Línea 25: session_start();
Qué hace: Inicia sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Identificar trabajador.
Si se quita: No se sabe quién marca asistencia.

Línea 26: header('Content-Type: application/json');
Qué hace: Define respuesta JSON.
Con qué se conecta: Con fetch() del dashboard.
Para qué sirve: Responder al frontend.
Si se quita: Puede no interpretarse como JSON.

Línea 28: require_once __DIR__ . '/../config/database.php';
Qué hace: Incluye conexión.
Con qué se conecta: Con Database.
Para qué sirve: Usar la base de datos.
Si se quita: No se podría guardar asistencia.

Línea 31: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
Qué hace: Valida sesión y rol trabajador.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Solo el trabajador puede marcar su propia asistencia.
Si se quita: Otros roles podrían marcar asistencia.

Líneas 32 a 33:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Bloquear acceso.
Si se quitan: Continuaría sin autorización.

Línea 36: if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
Qué hace: Valida método POST.
Con qué se conecta: Con fetch() del dashboard.
Para qué sirve: Evita uso directo por GET.
Si se quita: Podría llamarse desde URL.

Líneas 37 a 38:
Qué hacen: Devuelven método no permitido y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Proteger flujo.
Si se quitan: Continuaría.

Línea 41: $accion = trim($_POST['accion'] ?? '');
Qué hace: Obtiene acción marcar_entrada o marcar_salida.
Con qué se conecta: Con botón del dashboard.
Para qué sirve: Decide qué operación ejecutar.
Si se quita: No se sabría qué hacer.

Línea 42: $id = (int) $_SESSION['id_usuario'];
Qué hace: Obtiene ID del trabajador logueado.
Con qué se conecta: Con sesión.
Para qué sirve: Asociar asistencia al trabajador correcto.
Si se quita: No habría trabajador objetivo.

Línea 43: $db = (new Database())->conectar();
Qué hace: Crea conexión a BD.
Con qué se conecta: Con config/database.php.
Para qué sirve: Insertar o actualizar asistencia.
Si se quita: No habría base de datos.

Línea 44: $hora = date('H:i:s');
Qué hace: Obtiene hora actual del servidor.
Con qué se conecta: Con el servidor.
Para qué sirve: Registrar entrada o salida automáticamente.
Si se quita: No habría hora que guardar.

Línea 47: if ($accion === 'marcar_entrada') {
Qué hace: Inicia proceso de entrada.
Con qué se conecta: Con accion del formulario.
Para qué sirve: Registrar inicio de jornada.
Si se quita: No se podría marcar entrada.

Línea 48: try {
Qué hace: Inicia bloque seguro.
Con qué se conecta: Con catch.
Para qué sirve: Capturar errores de BD.
Si se quita: Errores podrían romper la respuesta.

Línea 50: $check = $db->prepare(...)
Qué hace: Prepara consulta para verificar asistencia de hoy.
Con qué se conecta: Con tabla asistencia.
Para qué sirve: Evita doble entrada en el mismo día.
Si se quita: Podría marcar entrada varias veces.

Líneas 51 a 52:
Qué hacen: Buscan id_asistencia del trabajador para CURDATE().
Con qué se conectan: Con asistencia.id_trabajador y fecha.
Para qué sirven: Saber si ya marcó hoy.
Si se quitan: La consulta queda incompleta.

Línea 54: $check->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace: Vincula ID del trabajador.
Con qué se conecta: Con parámetro :id de SQL.
Para qué sirve: Consulta segura.
Si se quita: La consulta no tendría ID.

Línea 55: $check->execute();
Qué hace: Ejecuta consulta.
Con qué se conecta: Con BD.
Para qué sirve: Verificar si ya existe registro.
Si se quita: No se valida duplicado.

Línea 57: if ($check->rowCount() > 0) {
Qué hace: Verifica si ya existe asistencia hoy.
Con qué se conecta: Con resultado de $check.
Para qué sirve: Evita registrar entrada duplicada.
Si se quita: Podrían duplicarse entradas.

Líneas 58 a 59:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisar que ya marcó entrada.
Si se quitan: Continuaría duplicando.

Línea 63: $stmt = $db->prepare(...)
Qué hace: Prepara inserción de asistencia.
Con qué se conecta: Con tabla asistencia.
Para qué sirve: Guardar entrada.
Si se quita: No se registraría.

Líneas 64 a 65:
Qué hacen: Insertan id_trabajador, fecha actual y hora_entrada.
Con qué se conectan: Con columnas asistencia.
Para qué sirven: Crear registro del día.
Si se quitan: SQL incompleto.

Líneas 67 a 69:
Qué hacen: Vinculan ID y hora, luego ejecutan.
Con qué se conectan: Con consulta INSERT.
Para qué sirven: Guardar datos reales.
Si se quitan: No se ejecuta la inserción.

Líneas 72 a 75:
Qué hacen: Actualizan trabajador a estado ACTIVO.
Con qué se conectan: Con tabla trabajador.
Para qué sirven: Reflejar que el trabajador está activo.
Si se quitan: La asistencia se registra, pero el estado no cambia.

Línea 77: echo json_encode(['ok' => true, 'msg' => 'Entrada registrada a las ' . substr($hora, 0, 5)]);
Qué hace: Devuelve éxito con hora HH:MM.
Con qué se conecta: Con frontend.
Para qué sirve: Mostrar confirmación al trabajador.
Si se quita: No habría confirmación.

Líneas 79 a 81:
Qué hacen: Capturan error y devuelven JSON.
Con qué se conectan: Con try.
Para qué sirven: Manejar fallos de BD.
Si se quitan: Error fatal.

Línea 82: exit;
Qué hace: Detiene tras entrada.
Con qué se conecta: Con flujo marcar_entrada.
Para qué sirve: Evita continuar.
Si se quita: Podría llegar al final.

Línea 86: if ($accion === 'marcar_salida') {
Qué hace: Inicia proceso de salida.
Con qué se conecta: Con accion POST.
Para qué sirve: Registrar fin de jornada.
Si se quita: No se podría marcar salida.

Línea 89: $check = $db->prepare(...)
Qué hace: Prepara consulta para verificar entrada.
Con qué se conecta: Con tabla asistencia.
Para qué sirve: Asegura que primero haya entrada.
Si se quita: Podría marcar salida sin entrada.

Líneas 90 a 92:
Qué hacen: Buscan asistencia de hoy con hora_entrada.
Con qué se conectan: Con asistencia.
Para qué sirven: Validar jornada abierta.
Si se quitan: Consulta incompleta.

Líneas 94 a 95:
Qué hacen: Vinculan ID y ejecutan.
Con qué se conectan: Con consulta preparada.
Para qué sirven: Buscar registro del trabajador.
Si se quitan: No consulta.

Línea 97: if ($check->rowCount() === 0) {
Qué hace: Verifica si no hay entrada registrada.
Con qué se conecta: Con resultado SQL.
Para qué sirve: Evita salida sin entrada.
Si se quita: Podrían guardarse salidas inválidas.

Líneas 98 a 99:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisar que falta entrada.
Si se quitan: Continuaría.

Línea 103: $stmt = $db->prepare(...)
Qué hace: Prepara actualización de hora_salida.
Con qué se conecta: Con tabla asistencia.
Para qué sirve: Registrar salida del día.
Si se quita: No se guardaría salida.

Líneas 104 a 105:
Qué hacen: Actualizan hora_salida para trabajador y fecha actual.
Con qué se conectan: Con asistencia.
Para qué sirven: Cerrar jornada.
Si se quitan: SQL incompleto.

Líneas 107 a 109:
Qué hacen: Vinculan hora e ID y ejecutan.
Con qué se conectan: Con UPDATE.
Para qué sirven: Guardar salida.
Si se quitan: No se actualizaría.

Líneas 112 a 115:
Qué hacen: Cambian trabajador a Inactivo.
Con qué se conectan: Con tabla trabajador.
Para qué sirven: Reflejar que ya salió.
Si se quitan: El trabajador seguiría apareciendo activo.

Línea 117: echo json_encode(['ok' => true, 'msg' => 'Salida registrada a las ' . substr($hora, 0, 5)]);
Qué hace: Devuelve confirmación.
Con qué se conecta: Con frontend.
Para qué sirve: Mostrar hora de salida.
Si se quita: No habría respuesta de éxito.

Líneas 119 a 121:
Qué hacen: Capturan errores y responden.
Con qué se conectan: Con try.
Para qué sirven: Manejar fallos.
Si se quitan: Error fatal.

Línea 122: exit;
Qué hace: Detiene tras salida.
Con qué se conecta: Con flujo marcar_salida.
Para qué sirve: Evita respuesta adicional.
Si se quita: Podría llegar al final.

Línea 125: echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
Qué hace: Responde acción inválida.
Con qué se conecta: Con frontend.
Para qué sirve: Manejar errores.
Si se quita: No habría respuesta.

Línea 126: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin del archivo.
Si se quita: Puede funcionar, pero aquí cierra formalmente.

Conclusión:
Este controlador permite que el trabajador marque entrada y salida desde su dashboard. Se conecta con la sesión, la tabla asistencia y la tabla trabajador para registrar horas y cambiar automáticamente el estado del trabajador.