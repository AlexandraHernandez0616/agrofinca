Línea 1: <?php
Qué hace: Abre PHP.
Con qué se conecta: Con servidor PHP.
Para qué sirve: Ejecutar controlador de registro.
Si se quita: No se interpreta como PHP.

Líneas 2 a 25: Comentario de documentación
Qué hace: Explica el flujo de registro de trabajadores.
Con qué se conecta: Con documentación del formulario registre.php.
Para qué sirve: Aclara que el registro queda pendiente.
Si se quita: Código funciona, pero pierde contexto.

Línea 26: session_start();
Qué hace: Inicia sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Guardar alertas para mostrar en vistas.
Si se quita: No se podrían guardar mensajes de alerta.

Línea 28: require_once __DIR__ . '/../config/database.php';
Qué hace: Incluye conexión.
Con qué se conecta: Con Database.
Para qué sirve: Insertar solicitud en BD.
Si se quita: No habría conexión.

Línea 29: require_once __DIR__ . '/../models/Usuario.php';
Qué hace: Incluye modelo Usuario.
Con qué se conecta: Con Usuario.php.
Para qué sirve: Usar registrar().
Si se quita: No existiría el modelo.

Línea 30: require_once __DIR__ . '/../models/Notificacion.php';
Qué hace: Incluye Notificacion.
Con qué se conecta: Con Notificacion.php.
Para qué sirve: Avisar a mayordomos.
Si se quita: Fallaría notificación.

Línea 32: class UsuarioController {
Qué hace: Define clase.
Con qué se conecta: Con instancia al final del archivo.
Para qué sirve: Agrupar lógica de registro.
Si se quita: No existiría controlador.

Línea 34: public function registrar() {
Qué hace: Define método de registro.
Con qué se conecta: Con $controller->registrar().
Para qué sirve: Procesar formulario.
Si se quita: No se ejecuta registro.

Línea 37: if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
Qué hace: Verifica si no es POST.
Con qué se conecta: Con formulario registre.php.
Para qué sirve: Evita acceso directo por GET.
Si se quita: Podría ejecutarse sin formulario.

Líneas 38 a 39:
Qué hacen: Redirigen al formulario y detienen.
Con qué se conectan: Con views/usuarios/registre.php.
Para qué sirven: Mantener flujo correcto.
Si se quitan: Continuaría sin datos.

Líneas 43 a 51:
Qué hacen: Recogen y limpian nombres, apellidos, documento, teléfono, eps, RH, usuario, contraseña y confirmación.
Con qué se conectan: Con inputs del formulario registre.php.
Para qué sirven: Preparar datos para validar y registrar.
Si se quitan: No habría datos del usuario.

Línea 54: if (empty($nombres) || empty($apellidos) || ...)
Qué hace: Valida que ningún campo esté vacío.
Con qué se conecta: Con todas las variables del formulario.
Para qué sirve: Evitar solicitudes incompletas.
Si se quita: Podrían enviarse registros incompletos.

Líneas 57 a 61:
Qué hacen: Guardan alerta de campos incompletos.
Con qué se conectan: Con $_SESSION['alert'] y la vista.
Para qué sirven: Mostrar mensaje al usuario.
Si se quitan: No habría aviso visual.

Líneas 62 a 63:
Qué hacen: Redirigen al formulario y detienen.
Con qué se conectan: Con registre.php.
Para qué sirven: Permitir corregir datos.
Si se quitan: Continuaría con errores.

Línea 67: if ($contraseña !== $confirmar_contraseña) {
Qué hace: Compara contraseñas.
Con qué se conecta: Con inputs contraseña y confirmar_contraseña.
Para qué sirve: Evitar errores de escritura.
Si se quita: Podría guardarse una contraseña mal confirmada.

Líneas 68 a 74:
Qué hacen: Guardan alerta y redirigen.
Con qué se conectan: Con sesión y registre.php.
Para qué sirven: Informar que no coinciden.
Si se quitan: No habría validación visible.

Línea 78: if (strlen($contraseña) < 6) {
Qué hace: Valida longitud mínima.
Con qué se conecta: Con variable contraseña.
Para qué sirve: Seguridad mínima.
Si se quita: Se aceptarían contraseñas débiles.

Líneas 79 a 85:
Qué hacen: Guardan alerta y redirigen.
Con qué se conectan: Con sesión y vista.
Para qué sirven: Avisar contraseña inválida.
Si se quitan: Continuaría.

Línea 89: $database = new Database();
Qué hace: Crea objeto Database.
Con qué se conecta: Con config/database.php.
Para qué sirve: Preparar conexión.
Si se quita: No habría objeto de BD.

Línea 90: $db = $database->conectar();
Qué hace: Obtiene conexión.
Con qué se conecta: Con MySQL/PDO.
Para qué sirve: Insertar solicitud.
Si se quita: No hay BD.

Línea 91: $usuario = new Usuario($db);
Qué hace: Crea modelo Usuario.
Con qué se conecta: Con Usuario.php.
Para qué sirve: Registrar solicitud.
Si se quita: No se puede llamar registrar().

Líneas 96 a 105: $datos = [...]
Qué hacen: Arman arreglo con datos del formulario.
Con qué se conectan: Con Usuario::registrar().
Para qué sirven: Enviar datos organizados al modelo.
Si se quitan: El modelo no recibiría información.

Línea 104: 'contraseña' => password_hash($contraseña, PASSWORD_BCRYPT)
Qué hace: Encripta la contraseña.
Con qué se conecta: Con login futuro usando password_verify().
Para qué sirve: No guardar contraseña en texto plano.
Si se quita: Riesgo grave de seguridad.

Línea 108: $resultado = $usuario->registrar($datos);
Qué hace: Envía datos al modelo.
Con qué se conecta: Con Usuario.php y tabla solicitud_registro.
Para qué sirve: Crear solicitud pendiente.
Si se quita: No se registra solicitud.

Línea 110: if ($resultado === true) {
Qué hace: Verifica éxito.
Con qué se conecta: Con resultado del modelo.
Para qué sirve: Solo notifica/redirige si guardó.
Si se quita: No se sabría si funcionó.

Línea 113: $idsMayordomos = $db->query(...)->fetchAll(PDO::FETCH_COLUMN);
Qué hace: Busca mayordomos activos.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Saber a quién notificar.
Si se quita: No habría destinatarios.

Línea 116: if (!empty($idsMayordomos)) {
Qué hace: Verifica que existan mayordomos.
Con qué se conecta: Con resultado anterior.
Para qué sirve: Evitar enviar a lista vacía.
Si se quita: Podría intentar notificar sin destinatarios.

Líneas 117 a 123:
Qué hacen: Envían notificación a mayordomos.
Con qué se conectan: Con Notificacion.php y solicitudes.php.
Para qué sirven: Avisar nueva solicitud.
Si se quitan: El mayordomo no recibe aviso.

Líneas 125 a 127:
Qué hacen: Capturan errores de notificación sin interrumpir.
Con qué se conectan: Con try interno.
Para qué sirven: Registro continúa aunque falle notificación.
Si se quitan: Fallo de notificación podría afectar registro.

Líneas 130 a 135:
Qué hacen: Guardan alerta de registro exitoso.
Con qué se conectan: Con $_SESSION['alert'] y login.php.
Para qué sirven: Mostrar mensaje al usuario.
Si se quitan: No habría confirmación visual.

Líneas 136 a 137:
Qué hacen: Redirigen al login y detienen.
Con qué se conectan: Con views/usuarios/login.php.
Para qué sirven: Enviar al usuario después del registro.
Si se quitan: Quedaría en controlador.

Líneas 140 a 145:
Qué hacen: Guardan alerta de error con mensaje del modelo.
Con qué se conectan: Con $_SESSION['alert'].
Para qué sirven: Mostrar problema de BD o duplicado.
Si se quitan: No habría error visible.

Líneas 146 a 147:
Qué hacen: Redirigen al formulario y detienen.
Con qué se conectan: Con registre.php.
Para qué sirven: Permitir corregir.
Si se quitan: No volvería a la vista.

Línea 151: }
Qué hace: Cierra la clase.
Con qué se conecta: Con UsuarioController.
Para qué sirve: Finaliza definición.
Si se quita: Error de sintaxis.

Línea 154: $controller = new UsuarioController();
Qué hace: Crea instancia del controlador.
Con qué se conecta: Con la clase UsuarioController.
Para qué sirve: Poder ejecutar registrar().
Si se quita: No se ejecutaría el registro.

Línea 155: $controller->registrar();
Qué hace: Ejecuta el método registrar.
Con qué se conecta: Con formulario POST.
Para qué sirve: Procesa la solicitud.
Si se quita: El archivo no haría nada.

Línea 156: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin del archivo.
Si se quita: Puede funcionar, pero aquí cierra formalmente.

Conclusión:
Este controlador procesa el registro de nuevos trabajadores. No crea directamente un usuario activo, sino una solicitud pendiente. Se conecta con el formulario registre.php, la base de datos, el modelo Usuario y el sistema de notificaciones para avisar a los mayordomos.