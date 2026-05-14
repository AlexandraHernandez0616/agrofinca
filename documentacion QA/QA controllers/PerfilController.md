Línea 1: <?php
Qué hace: Abre el archivo como código PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Permite ejecutar instrucciones PHP.
Si se quita: El archivo no se interpretaría correctamente como PHP.

Líneas 2 a 13: Comentario de documentación
Qué hace: Explica el propósito del archivo, las acciones disponibles y el formato JSON.
Con qué se conecta: Con la documentación interna del proyecto.
Para qué sirve: Ayuda a entender que este controlador maneja el perfil del usuario.
Si se quita: El código funciona, pero pierde claridad.

Línea 15: session_start();
Qué hace: Inicia o reanuda la sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Permite identificar al usuario logueado.
Si se quita: No se podría saber qué usuario está actualizando su perfil.

Línea 17: if (!isset($_SESSION['id_usuario'])) {
Qué hace: Verifica si no existe un usuario en sesión.
Con qué se conecta: Con LoginController.php, que guarda id_usuario en sesión.
Para qué sirve: Evita que alguien sin iniciar sesión modifique datos.
Si se quita: Usuarios no autenticados podrían intentar usar el controlador.

Línea 18: http_response_code(403);
Qué hace: Envía código HTTP 403.
Con qué se conecta: Con la respuesta del servidor.
Para qué sirve: Indica acceso prohibido.
Si se quita: El frontend recibiría error, pero sin código HTTP adecuado.

Línea 19: echo json_encode(['ok' => false, 'mensaje' => 'Sesión no iniciada']);
Qué hace: Devuelve un JSON indicando que no hay sesión.
Con qué se conecta: Con el JavaScript de la vista Perfil.
Para qué sirve: Muestra un mensaje claro al usuario.
Si se quita: No habría respuesta clara.

Línea 20: exit;
Qué hace: Detiene la ejecución.
Con qué se conecta: Con la validación de sesión.
Para qué sirve: Evita que el código continúe sin usuario.
Si se quita: El archivo podría seguir ejecutándose sin permisos.

Línea 21: }
Qué hace: Cierra el if de validación.
Con qué se conecta: Con la línea 17.
Para qué sirve: Finaliza la condición.
Si se quita: Error de sintaxis.

Línea 23: require_once __DIR__ . '/../config/database.php';
Qué hace: Incluye la configuración de base de datos.
Con qué se conecta: Con la clase Database.
Para qué sirve: Permite conectarse a la base de datos.
Si se quita: No se podría crear la conexión $db.

Línea 24: require_once __DIR__ . '/../models/Perfil.php';
Qué hace: Incluye el modelo Perfil.
Con qué se conecta: Con models/Perfil.php.
Para qué sirve: Permite usar métodos como actualizarDatos(), verificarPassword() y cambiarPassword().
Si se quita: No existiría la clase Perfil.

Línea 26: header('Content-Type: application/json');
Qué hace: Define que la respuesta será JSON.
Con qué se conecta: Con fetch() o JavaScript de la vista.
Para qué sirve: Permite que el frontend interprete correctamente la respuesta.
Si se quita: La respuesta podría no ser tratada como JSON.

Línea 28: $db = (new Database())->conectar();
Qué hace: Crea una conexión PDO a la base de datos.
Con qué se conecta: Con config/database.php.
Para qué sirve: Permite consultar y actualizar datos del usuario.
Si se quita: El modelo no tendría conexión a la BD.

Línea 29: $model = new Perfil($db);
Qué hace: Crea un objeto del modelo Perfil.
Con qué se conecta: Con models/Perfil.php.
Para qué sirve: Permite ejecutar operaciones del perfil.
Si se quita: No se podrían llamar métodos del modelo.

Línea 30: $id = (int) $_SESSION['id_usuario'];
Qué hace: Obtiene el ID del usuario logueado.
Con qué se conecta: Con la sesión del usuario.
Para qué sirve: Define qué usuario será actualizado.
Si se quita: No se sabría qué perfil modificar.

Línea 31: $accion = trim($_POST['accion'] ?? '');
Qué hace: Obtiene la acción enviada por POST.
Con qué se conecta: Con el formulario o fetch del módulo Perfil.
Para qué sirve: Decide si se actualizan datos o contraseña.
Si se quita: El switch no sabría qué ejecutar.

Línea 33: try {
Qué hace: Inicia bloque de manejo de errores.
Con qué se conecta: Con el catch final.
Para qué sirve: Evita errores fatales sin respuesta JSON.
Si se quita: Un error podría romper la aplicación.

Línea 34: switch ($accion) {
Qué hace: Evalúa la acción enviada.
Con qué se conecta: Con los case actualizar_datos y cambiar_password.
Para qué sirve: Selecciona el proceso correcto.
Si se quita: No habría control de acciones.

Línea 37: case 'actualizar_datos':
Qué hace: Inicia el proceso para actualizar datos personales.
Con qué se conecta: Con accion=actualizar_datos enviada desde la vista.
Para qué sirve: Actualiza nombres, apellidos, documento y teléfono.
Si se quita: No se podrían actualizar datos personales.

Línea 38: $nombres = trim($_POST['nombres'] ?? '');
Qué hace: Obtiene los nombres enviados.
Con qué se conecta: Con el input nombres del formulario.
Para qué sirve: Guarda el nuevo nombre del usuario.
Si se quita: No se actualizarían nombres.

Línea 39: $apellidos = trim($_POST['apellidos'] ?? '');
Qué hace: Obtiene los apellidos enviados.
Con qué se conecta: Con el input apellidos.
Para qué sirve: Guarda los nuevos apellidos.
Si se quita: No se actualizarían apellidos.

Línea 40: $documento = trim($_POST['documento'] ?? '');
Qué hace: Obtiene el documento.
Con qué se conecta: Con el input documento y la tabla usuario.
Para qué sirve: Actualiza el número de documento.
Si se quita: No se validaría ni actualizaría documento.

Línea 41: $telefono = trim($_POST['telefono'] ?? '');
Qué hace: Obtiene el teléfono.
Con qué se conecta: Con el input telefono.
Para qué sirve: Actualiza el teléfono del usuario.
Si se quita: No se guardaría teléfono.

Línea 43: if ($nombres === '' || $apellidos === '') {
Qué hace: Valida que nombres y apellidos no estén vacíos.
Con qué se conecta: Con las variables $nombres y $apellidos.
Para qué sirve: Evita guardar datos incompletos.
Si se quita: Podrían guardarse nombres vacíos.

Línea 44: echo json_encode(['ok' => false, 'mensaje' => 'Nombre y apellido son obligatorios']);
Qué hace: Devuelve error JSON.
Con qué se conecta: Con el frontend.
Para qué sirve: Informa al usuario qué falta.
Si se quita: No habría mensaje claro.

Línea 45: exit;
Qué hace: Detiene la ejecución.
Con qué se conecta: Con la validación anterior.
Para qué sirve: Evita continuar con datos incompletos.
Si se quita: Se intentaría actualizar igualmente.

Línea 47: if ($documento === '') {
Qué hace: Valida que el documento no esté vacío.
Con qué se conecta: Con $documento.
Para qué sirve: Hace obligatorio el documento.
Si se quita: Podría guardarse documento vacío.

Línea 48: echo json_encode(['ok' => false, 'mensaje' => 'El documento es obligatorio']);
Qué hace: Devuelve error JSON.
Con qué se conecta: Con el frontend.
Para qué sirve: Avisa que falta documento.
Si se quita: No habría aviso.

Línea 49: exit;
Qué hace: Detiene ejecución.
Con qué se conecta: Con la validación del documento.
Para qué sirve: Evita actualizar sin documento.
Si se quita: Continuaría con error de datos.

Línea 51: if ($model->documentoEnUso($documento, $id)) {
Qué hace: Consulta si otro usuario ya usa ese documento.
Con qué se conecta: Con Perfil.php y la tabla usuario.
Para qué sirve: Evita documentos duplicados.
Si se quita: Dos usuarios podrían tener el mismo documento.

Línea 52: echo json_encode(['ok' => false, 'mensaje' => 'Ese documento ya está registrado por otro usuario']);
Qué hace: Responde error por documento duplicado.
Con qué se conecta: Con el frontend.
Para qué sirve: Informa al usuario.
Si se quita: No habría mensaje de duplicado.

Línea 53: exit;
Qué hace: Detiene el proceso.
Con qué se conecta: Con la validación de duplicado.
Para qué sirve: Evita guardar documento repetido.
Si se quita: Podría continuar.

Línea 56: $ok = $model->actualizarDatos($id, $nombres, $apellidos, $documento, $telefono);
Qué hace: Llama al modelo para actualizar los datos.
Con qué se conecta: Con Perfil.php y la tabla usuario.
Para qué sirve: Guarda los cambios en base de datos.
Si se quita: No se actualizaría nada.

Línea 59: if ($ok) {
Qué hace: Verifica si la actualización fue exitosa.
Con qué se conecta: Con el resultado de actualizarDatos().
Para qué sirve: Solo actualiza la sesión si la BD se actualizó.
Si se quita: Podría actualizar sesión aunque falle la BD.

Línea 60: $_SESSION['nombre_completo'] = $nombres . ' ' . $apellidos;
Qué hace: Actualiza el nombre completo en sesión.
Con qué se conecta: Con el topbar o interfaz que muestra el nombre.
Para qué sirve: Refleja el cambio inmediatamente en la vista.
Si se quita: El nombre visible podría quedar viejo hasta nuevo login.

Líneas 63 a 66: echo json_encode([...]);
Qué hace: Devuelve respuesta JSON de éxito o error.
Con qué se conecta: Con el frontend.
Para qué sirve: Informa si los datos se actualizaron.
Si se quita: La vista no sabría el resultado.

Línea 67: break;
Qué hace: Termina el caso actualizar_datos.
Con qué se conecta: Con el switch.
Para qué sirve: Evita pasar a otros casos.
Si se quita: Podría continuar indebidamente.

Línea 70: case 'cambiar_password':
Qué hace: Inicia el proceso para cambiar contraseña.
Con qué se conecta: Con accion=cambiar_password del formulario.
Para qué sirve: Permite modificar la contraseña del usuario logueado.
Si se quita: No se podría cambiar contraseña.

Líneas 71 a 73:
Qué hacen: Obtienen contraseña actual, nueva y confirmación.
Con qué se conectan: Con los inputs password_actual, password_nueva y password_confirmar.
Para qué sirven: Permiten validar el cambio.
Si se quitan: No habría datos para cambiar contraseña.

Línea 75: if ($actual === '' || $nueva === '' || $confirmar === '') {
Qué hace: Valida que los campos de contraseña no estén vacíos.
Con qué se conecta: Con las tres variables de contraseña.
Para qué sirve: Evita cambios incompletos.
Si se quita: Podrían enviarse datos vacíos.

Líneas 76 a 77:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Informan el problema.
Si se quitan: Continuaría con datos inválidos.

Línea 79: if (strlen($nueva) < 6) {
Qué hace: Valida que la nueva contraseña tenga mínimo 6 caracteres.
Con qué se conecta: Con $nueva.
Para qué sirve: Mantiene una regla mínima de seguridad.
Si se quita: Se aceptarían contraseñas débiles.

Líneas 80 a 81:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisan que la contraseña es corta.
Si se quitan: No habría validación visible.

Línea 83: if ($nueva !== $confirmar) {
Qué hace: Compara nueva contraseña con confirmación.
Con qué se conecta: Con $nueva y $confirmar.
Para qué sirve: Evita errores al escribir contraseña.
Si se quita: Podría guardarse una contraseña no confirmada.

Líneas 84 a 85:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisan que no coinciden.
Si se quitan: Continuaría el proceso.

Línea 87: if (!$model->verificarPassword($id, $actual)) {
Qué hace: Verifica que la contraseña actual sea correcta.
Con qué se conecta: Con Perfil.php, password_verify y la tabla usuario.
Para qué sirve: Evita que alguien cambie contraseña sin conocer la actual.
Si se quita: Sería un riesgo de seguridad.

Líneas 88 a 89:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Informan contraseña actual incorrecta.
Si se quitan: Continuaría sin seguridad.

Línea 92: $hash = password_hash($nueva, PASSWORD_BCRYPT);
Qué hace: Encripta la nueva contraseña.
Con qué se conecta: Con el sistema de autenticación del LoginController.
Para qué sirve: Guarda contraseña segura, no texto plano.
Si se quita: No habría hash seguro.

Línea 93: $ok = $model->cambiarPassword($id, $hash);
Qué hace: Actualiza la contraseña en la base de datos.
Con qué se conecta: Con Perfil.php y tabla usuario.
Para qué sirve: Guarda el nuevo hash.
Si se quita: La contraseña no cambiaría.

Líneas 95 a 98:
Qué hacen: Devuelven JSON de éxito o error.
Con qué se conectan: Con frontend.
Para qué sirven: Informan el resultado.
Si se quitan: No habría respuesta.

Línea 99: break;
Qué hace: Finaliza el caso cambiar_password.
Con qué se conecta: Con switch.
Para qué sirve: Evita continuar.
Si se quita: Podría llegar al default.

Línea 101: default:
Qué hace: Maneja acciones desconocidas.
Con qué se conecta: Con $accion.
Para qué sirve: Responde si la acción no existe.
Si se quita: Acciones inválidas quedarían sin respuesta.

Línea 102: echo json_encode(['ok' => false, 'mensaje' => 'Acción no reconocida']);
Qué hace: Devuelve error JSON.
Con qué se conecta: Con frontend.
Para qué sirve: Informa que la acción no es válida.
Si se quita: No habría mensaje.

Línea 106: } catch (Exception $e) {
Qué hace: Captura errores generales.
Con qué se conecta: Con el try.
Para qué sirve: Devuelve errores controlados.
Si se quita: Podrían aparecer errores fatales.

Línea 107: echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
Qué hace: Devuelve error interno.
Con qué se conecta: Con frontend.
Para qué sirve: Informa que falló el backend.
Si se quita: No habría respuesta controlada.

Línea 109: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Marca fin del archivo.
Si se quita: En PHP puro puede funcionar, pero aquí se usa como cierre formal.

Conclusión:
Este controlador maneja el perfil del usuario logueado. Permite actualizar datos personales y cambiar contraseña, conectándose con la sesión, la base de datos y el modelo Perfil para validar documentos, verificar contraseña actual y guardar cambios seguros.