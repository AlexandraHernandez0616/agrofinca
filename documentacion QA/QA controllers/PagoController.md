Línea 1: <?php
Qué hace: Abre el archivo como código PHP.
Con qué se conecta: Con el servidor PHP, para que interprete todo lo que sigue como instrucciones PHP.
Para qué sirve: Permite ejecutar lógica del backend.
Si se quita: El servidor no interpretaría correctamente el archivo como PHP.

Líneas 2 a 13: Comentario de documentación
Qué hace: Explica el nombre del archivo, propósito, acciones disponibles y respuesta esperada.
Con qué se conecta: Con la documentación interna del proyecto.
Para qué sirve: Ayuda a entender que este controlador maneja pagos.
Si se quita: El código funciona igual, pero pierde claridad para otros programadores.

Línea 15: session_start();
Qué hace: Inicia o reanuda la sesión del usuario.
Con qué se conecta: Con $_SESSION, donde están guardados id_usuario y rol.
Para qué sirve: Permite saber qué usuario está usando el sistema.
Si se quita: No se podría validar si el usuario es administrador.

Línea 17: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
Qué hace: Valida si no hay usuario logueado o si el rol no es ADMINISTRADOR.
Con qué se conecta: Con las variables de sesión creadas en LoginController.php.
Para qué sirve: Protege el controlador para que solo administradores registren o eliminen pagos.
Si se quita: Cualquier usuario podría intentar manipular pagos.

Línea 18: http_response_code(403);
Qué hace: Envía código HTTP 403.
Con qué se conecta: Con la respuesta del servidor hacia el navegador o fetch().
Para qué sirve: Indica técnicamente que el acceso está prohibido.
Si se quita: El JSON diría acceso denegado, pero sin código HTTP correcto.

Línea 19: echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
Qué hace: Devuelve una respuesta JSON de error.
Con qué se conecta: Con el JavaScript de la vista que recibe la respuesta.
Para qué sirve: Informa al frontend que el usuario no tiene permiso.
Si se quita: El usuario no recibiría mensaje claro.

Línea 20: exit;
Qué hace: Detiene la ejecución del archivo.
Con qué se conecta: Con el flujo de seguridad del controlador.
Para qué sirve: Evita que el código siga y registre pagos sin permiso.
Si se quita: Aunque se muestre error, el código podría continuar ejecutándose.

Línea 21: }
Qué hace: Cierra el bloque if de autorización.
Con qué se conecta: Con la condición iniciada en la línea 17.
Para qué sirve: Marca el final de la validación de permisos.
Si se quita: Habría error de sintaxis.

Línea 23: require_once __DIR__ . '/../config/database.php';
Qué hace: Incluye el archivo de configuración de base de datos.
Con qué se conecta: Con la clase Database.
Para qué sirve: Permite crear la conexión a la base de datos.
Si se quita: No existiría la clase Database y fallaría la conexión.

Línea 24: require_once __DIR__ . '/../models/Pago.php';
Qué hace: Incluye el modelo Pago.
Con qué se conecta: Con models/Pago.php.
Para qué sirve: Permite usar métodos como crear() y eliminar().
Si se quita: No se podría crear el objeto Pago.

Línea 25: require_once __DIR__ . '/../models/Notificacion.php';
Qué hace: Incluye el modelo Notificacion.
Con qué se conecta: Con models/Notificacion.php y la tabla de notificaciones.
Para qué sirve: Permite enviar avisos al trabajador cuando se registra un pago.
Si se quita: Fallaría Notificacion::enviar().

Línea 27: header('Content-Type: application/json');
Qué hace: Define que la respuesta será JSON.
Con qué se conecta: Con el navegador o fetch() del frontend.
Para qué sirve: Hace que la vista interprete correctamente la respuesta.
Si se quita: La respuesta podría no ser tratada como JSON.

Línea 29: $db = (new Database())->conectar();
Qué hace: Crea una instancia de Database y llama al método conectar().
Con qué se conecta: Con config/database.php y la base de datos MySQL.
Para qué sirve: Obtiene la conexión PDO para consultar o guardar datos.
Si se quita: No habría conexión para registrar pagos.

Línea 30: $model = new Pago($db);
Qué hace: Crea el modelo Pago usando la conexión $db.
Con qué se conecta: Con models/Pago.php.
Para qué sirve: Permite ejecutar métodos relacionados con pagos.
Si se quita: No se podrían llamar $model->crear() ni $model->eliminar().

Línea 31: $accion = trim($_POST['accion'] ?? '');
Qué hace: Obtiene la acción enviada por formulario o fetch POST.
Con qué se conecta: Con el campo accion enviado desde la vista de pagos.
Para qué sirve: Decide si se va a registrar o eliminar un pago.
Si se quita: El switch no sabría qué acción ejecutar.

Línea 33: try {
Qué hace: Inicia un bloque para capturar errores.
Con qué se conecta: Con el catch final.
Para qué sirve: Evita que errores internos rompan la respuesta JSON.
Si se quita: Un error podría mostrarse como error fatal de PHP.

Línea 34: switch ($accion) {
Qué hace: Evalúa el valor de $accion.
Con qué se conecta: Con los case registrar, eliminar y default.
Para qué sirve: Decide qué operación realizar.
Si se quita: No habría control claro de acciones.

Línea 37: case 'registrar':
Qué hace: Inicia el caso para registrar un pago.
Con qué se conecta: Con la acción enviada desde la vista, accion=registrar.
Para qué sirve: Ejecuta la lógica de creación de pagos.
Si se quita: No se podrían registrar pagos.

Línea 38: $id_liq = (int) ($_POST['id_liquidacion'] ?? 0);
Qué hace: Obtiene el ID de la liquidación y lo convierte a entero.
Con qué se conecta: Con el campo id_liquidacion del formulario y la tabla liquidacion.
Para qué sirve: Indica a qué liquidación pertenece el pago.
Si se quita: No se sabría qué liquidación pagar.

Línea 39: $fecha = trim($_POST['fecha_pago'] ?? '');
Qué hace: Obtiene la fecha del pago.
Con qué se conecta: Con el campo fecha_pago del formulario.
Para qué sirve: Guarda cuándo se realizó el pago.
Si se quita: No se registraría la fecha del pago.

Línea 40: $monto = (float) ($_POST['monto'] ?? 0);
Qué hace: Obtiene el monto y lo convierte a decimal.
Con qué se conecta: Con el campo monto del formulario.
Para qué sirve: Define cuánto dinero se pagó.
Si se quita: No se podría guardar el valor del pago.

Línea 41: $metodo = trim($_POST['metodo_pago'] ?? '');
Qué hace: Obtiene el método de pago.
Con qué se conecta: Con el campo metodo_pago del formulario.
Para qué sirve: Guarda si fue Efectivo, Transferencia o Cheque.
Si se quita: No se sabría cómo se pagó.

Línea 42: $referencia = trim($_POST['referencia_pago'] ?? '') ?: null;
Qué hace: Obtiene la referencia del pago; si está vacía, guarda null.
Con qué se conecta: Con el campo referencia_pago.
Para qué sirve: Guarda número de comprobante o referencia si aplica.
Si se quita: No se guardaría referencia de transferencia o cheque.

Línea 43: $obs = trim($_POST['observacion'] ?? '') ?: null;
Qué hace: Obtiene la observación; si está vacía, guarda null.
Con qué se conecta: Con el campo observacion.
Para qué sirve: Permite guardar notas adicionales del pago.
Si se quita: No se registrarían observaciones.

Línea 44: $id_usuario = (int) $_SESSION['id_usuario'];
Qué hace: Obtiene el ID del administrador logueado.
Con qué se conecta: Con la sesión creada al iniciar sesión.
Para qué sirve: Registra qué usuario hizo el pago.
Si se quita: El pago no quedaría asociado al administrador.

Línea 46: if ($id_liq <= 0) {
Qué hace: Valida que la liquidación sea válida.
Con qué se conecta: Con la variable $id_liq.
Para qué sirve: Evita registrar pagos sin liquidación.
Si se quita: Podrían intentarse pagos con liquidación inválida.

Línea 47: echo json_encode(['ok' => false, 'mensaje' => 'Selecciona una liquidación']);
Qué hace: Devuelve error JSON.
Con qué se conecta: Con el frontend.
Para qué sirve: Informa que falta seleccionar liquidación.
Si se quita: El usuario no sabría qué error ocurrió.

Línea 48: exit;
Qué hace: Detiene el proceso.
Con qué se conecta: Con la validación anterior.
Para qué sirve: Evita continuar con datos inválidos.
Si se quita: El código seguiría intentando guardar.

Línea 50: if ($fecha === '') {
Qué hace: Valida que la fecha no esté vacía.
Con qué se conecta: Con $fecha.
Para qué sirve: Hace obligatoria la fecha de pago.
Si se quita: Podrían guardarse pagos sin fecha.

Línea 51: echo json_encode(['ok' => false, 'mensaje' => 'La fecha de pago es obligatoria']);
Qué hace: Responde error de fecha.
Con qué se conecta: Con el frontend.
Para qué sirve: Muestra mensaje claro al usuario.
Si se quita: No habría aviso específico.

Línea 52: exit;
Qué hace: Detiene ejecución.
Con qué se conecta: Con la validación de fecha.
Para qué sirve: Evita registrar datos incompletos.
Si se quita: Continuaría el proceso.

Línea 54: if ($monto <= 0) {
Qué hace: Valida que el monto sea mayor que cero.
Con qué se conecta: Con $monto.
Para qué sirve: Evita pagos con valor cero o negativo.
Si se quita: Se podrían guardar pagos inválidos.

Línea 55: echo json_encode(['ok' => false, 'mensaje' => 'El monto debe ser mayor a 0']);
Qué hace: Devuelve error de monto.
Con qué se conecta: Con el frontend.
Para qué sirve: Informa el problema al usuario.
Si se quita: No habría mensaje específico.

Línea 56: exit;
Qué hace: Detiene ejecución.
Con qué se conecta: Con la validación del monto.
Para qué sirve: Evita guardar pagos inválidos.
Si se quita: El pago podría seguir procesándose.

Línea 58: $metodosValidos = ['Efectivo', 'Transferencia', 'Cheque'];
Qué hace: Define los métodos de pago permitidos.
Con qué se conecta: Con $metodo.
Para qué sirve: Controla que solo se acepten métodos válidos.
Si se quita: No habría lista para validar.

Línea 59: if (!in_array($metodo, $metodosValidos, true)) {
Qué hace: Verifica si el método recibido no está permitido.
Con qué se conecta: Con $metodo y $metodosValidos.
Para qué sirve: Evita guardar métodos incorrectos.
Si se quita: Se podrían guardar textos inválidos como método.

Línea 60: echo json_encode(['ok' => false, 'mensaje' => 'Método de pago inválido']);
Qué hace: Devuelve error de método.
Con qué se conecta: Con el frontend.
Para qué sirve: Informa que el método no es válido.
Si se quita: No habría mensaje al usuario.

Línea 61: exit;
Qué hace: Detiene el proceso.
Con qué se conecta: Con la validación del método.
Para qué sirve: Evita registrar pago con método inválido.
Si se quita: El proceso continuaría.

Línea 64: $ok = $model->crear($id_liq, $id_usuario, $fecha, $monto, $metodo, $referencia, $obs);
Qué hace: Llama al método crear() del modelo Pago.
Con qué se conecta: Con models/Pago.php y la tabla de pagos en la base de datos.
Para qué sirve: Guarda el pago asociado a una liquidación.
Si se quita: El pago nunca se registraría.

Línea 65: if ($ok) {
Qué hace: Verifica si el pago se guardó correctamente.
Con qué se conecta: Con el resultado de $model->crear().
Para qué sirve: Solo envía notificación si el pago fue exitoso.
Si se quita: Podría notificarse aunque el pago no exista.

Línea 66: try {
Qué hace: Inicia bloque seguro para notificaciones.
Con qué se conecta: Con el catch de la línea 84.
Para qué sirve: Evita que un error notificando dañe el registro del pago.
Si se quita: Un error de notificación podría romper el flujo.

Línea 67: $q = $db->prepare(
Qué hace: Prepara una consulta SQL.
Con qué se conecta: Con la conexión PDO $db.
Para qué sirve: Busca el trabajador dueño de la liquidación.
Si se quita: No se podría saber a quién notificar.

Línea 68: "SELECT id_trabajador FROM liquidacion WHERE id_liquidacion = :id LIMIT 1"
Qué hace: Consulta el trabajador asociado a una liquidación.
Con qué se conecta: Con la tabla liquidacion.
Para qué sirve: Obtiene el destinatario de la notificación.
Si se quita: La consulta quedaría incompleta.

Línea 70: $q->bindParam(':id', $id_liq, PDO::PARAM_INT);
Qué hace: Une :id con el ID de liquidación.
Con qué se conecta: Con la consulta preparada.
Para qué sirve: Evita inyección SQL y envía el valor correcto.
Si se quita: La consulta no tendría valor para :id.

Línea 71: $q->execute();
Qué hace: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtiene el trabajador relacionado.
Si se quita: No se consultaría nada.

Línea 72: $id_t = (int) ($q->fetchColumn() ?: 0);
Qué hace: Obtiene el ID del trabajador o 0 si no existe.
Con qué se conecta: Con el resultado SQL.
Para qué sirve: Define a quién se le enviará la notificación.
Si se quita: No habría destinatario.

Línea 73: if ($id_t > 0) {
Qué hace: Verifica que exista un trabajador válido.
Con qué se conecta: Con $id_t.
Para qué sirve: Evita enviar notificaciones sin destinatario.
Si se quita: Podría intentar enviar a ID inválido.

Línea 74: $montoFmt = number_format($monto, 2, ',', '.');
Qué hace: Formatea el monto con 2 decimales.
Con qué se conecta: Con el mensaje de notificación.
Para qué sirve: Muestra el valor de forma legible.
Si se quita: El monto se vería sin formato.

Línea 75: Notificacion::enviar(
Qué hace: Llama al método estático enviar().
Con qué se conecta: Con models/Notificacion.php y notificacion_operativa.
Para qué sirve: Crea una notificación para el trabajador.
Si se quita: El trabajador no recibiría aviso.

Línea 76: $db,
Qué hace: Pasa la conexión a la base de datos.
Con qué se conecta: Con Notificacion::enviar().
Para qué sirve: Permite guardar la notificación.
Si se quita: El método no tendría conexión.

Línea 77: $id_t,
Qué hace: Pasa el ID del trabajador destinatario.
Con qué se conecta: Con la tabla usuario/notificacion_operativa.
Para qué sirve: Indica quién recibe la notificación.
Si se quita: No habría destinatario.

Línea 78: 'success',
Qué hace: Define el tipo de notificación como éxito.
Con qué se conecta: Con la forma visual de la notificación.
Para qué sirve: Permite mostrarla como positiva.
Si se quita: Faltaría el tipo requerido.

Línea 79: "Se registró un pago por $" . $montoFmt . " asociado a tu liquidación.",
Qué hace: Construye el mensaje de la notificación.
Con qué se conecta: Con $montoFmt.
Para qué sirve: Informa al trabajador cuánto se pagó.
Si se quita: La notificación no tendría mensaje útil.

Línea 80: '../../views/trabajador/dashboard.php'
Qué hace: Define el enlace de la notificación.
Con qué se conecta: Con el dashboard del trabajador.
Para qué sirve: Permite ir al panel donde revisa su liquidación.
Si se quita: La notificación no tendría destino.

Línea 81: );
Qué hace: Cierra la llamada a Notificacion::enviar().
Con qué se conecta: Con la línea 75.
Para qué sirve: Finaliza el envío.
Si se quita: Habría error de sintaxis.

Línea 84: } catch (Exception $e) { /* no interrumpir */ }
Qué hace: Captura errores de notificación sin detener el pago.
Con qué se conecta: Con el try de la línea 66.
Para qué sirve: El pago queda registrado aunque falle la notificación.
Si se quita: Podría romperse el flujo por un error secundario.

Línea 86: echo json_encode([
Qué hace: Inicia la respuesta JSON final.
Con qué se conecta: Con el frontend.
Para qué sirve: Devuelve el resultado de registrar pago.
Si se quita: El frontend no recibiría respuesta.

Línea 87: 'ok' => $ok,
Qué hace: Devuelve true o false según el resultado.
Con qué se conecta: Con $ok.
Para qué sirve: Permite saber si el registro fue exitoso.
Si se quita: Faltaría indicador de éxito.

Línea 88: 'mensaje' => $ok ? 'Pago registrado correctamente' : 'Error al registrar el pago',
Qué hace: Devuelve mensaje según resultado.
Con qué se conecta: Con $ok.
Para qué sirve: Muestra mensaje claro al usuario.
Si se quita: No habría explicación del resultado.

Línea 89: ]);
Qué hace: Cierra el arreglo JSON.
Con qué se conecta: Con echo json_encode().
Para qué sirve: Finaliza la respuesta.
Si se quita: Habría error de sintaxis.

Línea 90: break;
Qué hace: Sale del caso registrar.
Con qué se conecta: Con el switch.
Para qué sirve: Evita que siga a otros casos.
Si se quita: Podría continuar al siguiente case.

Línea 93: case 'eliminar':
Qué hace: Inicia el caso para eliminar pago.
Con qué se conecta: Con accion=eliminar enviada desde la vista.
Para qué sirve: Ejecuta la eliminación de un pago.
Si se quita: No se podrían eliminar pagos.

Línea 94: $id = (int) ($_POST['id'] ?? 0);
Qué hace: Obtiene el ID del pago a eliminar.
Con qué se conecta: Con el formulario o botón de eliminar.
Para qué sirve: Identifica qué pago borrar.
Si se quita: No se sabría qué pago eliminar.

Línea 95: if ($id <= 0) {
Qué hace: Valida que el ID sea correcto.
Con qué se conecta: Con $id.
Para qué sirve: Evita eliminar con ID inválido.
Si se quita: Podría intentarse eliminar un registro inexistente.

Línea 96: echo json_encode(['ok' => false, 'mensaje' => 'ID inválido']);
Qué hace: Devuelve error JSON.
Con qué se conecta: Con frontend.
Para qué sirve: Informa que el ID no sirve.
Si se quita: No habría mensaje claro.

Línea 97: exit;
Qué hace: Detiene ejecución.
Con qué se conecta: Con la validación de ID.
Para qué sirve: Evita continuar con un ID incorrecto.
Si se quita: El modelo intentaría eliminar igual.

Línea 99: $ok = $model->eliminar($id);
Qué hace: Llama al método eliminar() del modelo Pago.
Con qué se conecta: Con models/Pago.php y la tabla de pagos.
Para qué sirve: Borra el pago de la base de datos.
Si se quita: No se eliminaría el pago.

Línea 100: echo json_encode([
Qué hace: Inicia respuesta JSON.
Con qué se conecta: Con frontend.
Para qué sirve: Devuelve resultado de eliminación.
Si se quita: No habría respuesta.

Línea 101: 'ok' => $ok,
Qué hace: Indica si se eliminó correctamente.
Con qué se conecta: Con $ok.
Para qué sirve: Permite al frontend actualizar la vista.
Si se quita: No se sabría si funcionó.

Línea 102: 'mensaje' => $ok ? 'Pago eliminado correctamente' : 'Error al eliminar el pago',
Qué hace: Devuelve mensaje según resultado.
Con qué se conecta: Con $ok.
Para qué sirve: Informa al usuario.
Si se quita: Faltaría mensaje.

Línea 103: ]);
Qué hace: Cierra respuesta JSON.
Con qué se conecta: Con echo json_encode().
Para qué sirve: Finaliza respuesta.
Si se quita: Error de sintaxis.

Línea 104: break;
Qué hace: Termina el caso eliminar.
Con qué se conecta: Con switch.
Para qué sirve: Evita continuar.
Si se quita: Podría pasar al default.

Línea 106: default:
Qué hace: Caso por defecto.
Con qué se conecta: Con acciones no reconocidas.
Para qué sirve: Responde cuando accion no es registrar ni eliminar.
Si se quita: Una acción inválida no tendría respuesta clara.

Línea 107: echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
Qué hace: Devuelve error JSON.
Con qué se conecta: Con frontend.
Para qué sirve: Informa que la acción enviada no existe.
Si se quita: El frontend podría quedar esperando respuesta.

Línea 108: }
Qué hace: Cierra el switch.
Con qué se conecta: Con la línea 34.
Para qué sirve: Finaliza la selección de acciones.
Si se quita: Error de sintaxis.

Línea 110: } catch (Exception $e) {
Qué hace: Captura errores generales.
Con qué se conecta: Con el try de la línea 33.
Para qué sirve: Evita errores fatales visibles.
Si se quita: Los errores podrían romper la respuesta JSON.

Línea 111: echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
Qué hace: Devuelve error interno en JSON.
Con qué se conecta: Con el frontend.
Para qué sirve: Informa que ocurrió un error en backend.
Si se quita: No habría respuesta controlada ante errores.

Línea 112: }
Qué hace: Cierra el catch.
Con qué se conecta: Con la línea 110.
Para qué sirve: Finaliza manejo de errores.
Si se quita: Error de sintaxis.

Línea 113: ?>
Qué hace: Cierra el bloque PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Indica fin del código PHP.
Si se quita: En archivos PHP puros no siempre es obligatorio, pero aquí está usado para cerrar formalmente.

Conclusión:
Este archivo es el controlador del módulo de pagos. Recibe acciones desde una vista mediante POST, valida que el usuario sea ADMINISTRADOR, conecta con la base de datos, usa el modelo Pago para registrar o eliminar pagos y usa el modelo Notificacion para avisar al trabajador cuando se registra un pago asociado a su liquidación.