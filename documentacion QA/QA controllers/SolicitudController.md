Línea 1: <?php
Qué hace: Abre código PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Ejecutar backend.
Si se quita: No se interpretaría correctamente.

Líneas 2 a 18: Comentario de documentación
Qué hace: Explica que aprueba o rechaza solicitudes de trabajadores.
Con qué se conecta: Con documentación del módulo solicitudes.
Para qué sirve: Describe quién lo llama y qué acciones tiene.
Si se quita: El código funciona, pero pierde explicación.

Línea 19: session_start();
Qué hace: Inicia sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Permite validar al mayordomo.
Si se quita: No se podría verificar rol.

Línea 20: header('Content-Type: application/json');
Qué hace: Define respuesta JSON.
Con qué se conecta: Con fetch() de la vista solicitudes.
Para qué sirve: El frontend interpreta correctamente la respuesta.
Si se quita: Puede no detectarse como JSON.

Línea 22: require_once __DIR__ . '/../config/database.php';
Qué hace: Incluye conexión.
Con qué se conecta: Con Database.
Para qué sirve: Permite acceder a BD.
Si se quita: No habría conexión.

Línea 23: require_once __DIR__ . '/../models/Solicitud.php';
Qué hace: Incluye modelo Solicitud.
Con qué se conecta: Con Solicitud.php.
Para qué sirve: Usa aprobar() y rechazar().
Si se quita: No existiría la clase Solicitud.

Línea 24: require_once __DIR__ . '/../models/Notificacion.php';
Qué hace: Incluye modelo Notificacion.
Con qué se conecta: Con notificaciones operativas.
Para qué sirve: Avisar a administradores.
Si se quita: Fallaría Notificacion::enviarAVarios().

Línea 27: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Qué hace: Valida sesión y rol MAYORDOMO.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Solo mayordomos pueden aprobar/rechazar.
Si se quita: Cualquier usuario podría gestionar solicitudes.

Líneas 28 a 29:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Bloquean acceso no autorizado.
Si se quitan: Seguiría ejecutándose.

Línea 32: if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
Qué hace: Verifica que la petición sea POST.
Con qué se conecta: Con fetch() de solicitudes.php.
Para qué sirve: Evita uso por GET.
Si se quita: Podrían llamar acciones por URL.

Líneas 33 a 34:
Qué hacen: Devuelven método no permitido y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Protegen el flujo.
Si se quitan: Continuaría sin método correcto.

Línea 37: $accion = trim($_POST['accion'] ?? '');
Qué hace: Obtiene acción aprobar o rechazar.
Con qué se conecta: Con campo POST accion.
Para qué sirve: Decide qué proceso ejecutar.
Si se quita: No se sabría qué hacer.

Línea 38: $id_solicitud = (int)($_POST['id_solicitud'] ?? 0);
Qué hace: Obtiene ID de solicitud.
Con qué se conecta: Con solicitud_registro en BD.
Para qué sirve: Identifica qué solicitud procesar.
Si se quita: No se podría aprobar/rechazar una solicitud concreta.

Línea 39: $id_mayordomo = (int) $_SESSION['id_usuario'];
Qué hace: Obtiene ID del mayordomo.
Con qué se conecta: Con sesión.
Para qué sirve: Registra quién aprobó o rechazó.
Si se quita: No quedaría responsable del proceso.

Línea 41: if (!$id_solicitud) {
Qué hace: Valida que el ID exista.
Con qué se conecta: Con $id_solicitud.
Para qué sirve: Evita operar sobre ID inválido.
Si se quita: Podría fallar el modelo.

Líneas 42 a 43:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Informan ID inválido.
Si se quitan: Continuaría con error.

Línea 46: $db = (new Database())->conectar();
Qué hace: Conecta a base de datos.
Con qué se conecta: Con Database.
Para qué sirve: Permite actualizar solicitudes.
Si se quita: No habría conexión.

Línea 47: $model = new Solicitud($db);
Qué hace: Crea modelo Solicitud.
Con qué se conecta: Con Solicitud.php.
Para qué sirve: Ejecuta aprobar/rechazar.
Si se quita: No se podrían llamar métodos.

Línea 50: if ($accion === 'aprobar') {
Qué hace: Detecta acción aprobar.
Con qué se conecta: Con $accion.
Para qué sirve: Inicia flujo de aprobación.
Si se quita: No se aprobarían solicitudes.

Línea 51: $resultado = $model->aprobar($id_solicitud, $id_mayordomo);
Qué hace: Aprueba la solicitud en el modelo.
Con qué se conecta: Con Solicitud.php, solicitud_registro, usuario/trabajador.
Para qué sirve: Crea o activa cuenta del trabajador.
Si se quita: No se aprobaría nada.

Línea 52: if ($resultado === true) {
Qué hace: Verifica si aprobar fue exitoso.
Con qué se conecta: Con resultado del modelo.
Para qué sirve: Solo notifica si realmente aprobó.
Si se quita: Podría notificar aunque falle.

Línea 55: $admins = $db->query(...)->fetchAll(PDO::FETCH_COLUMN);
Qué hace: Consulta IDs de administradores activos.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Define destinatarios de notificación.
Si se quita: No sabría a quién avisar.

Línea 58: Notificacion::enviarAVarios(
Qué hace: Envía notificación a varios usuarios.
Con qué se conecta: Con Notificacion.php.
Para qué sirve: Avisa a administradores.
Si se quita: Nadie se entera de la aprobación.

Líneas 59 a 63:
Qué hacen: Pasan conexión, admins, tipo, mensaje y enlace.
Con qué se conectan: Con notificacion_operativa y vista admin/trabajadores.php.
Para qué sirven: Crear notificación completa.
Si se quitan: Faltan datos para enviar.

Línea 65: } catch (Exception $e) { /* no interrumpir */ }
Qué hace: Ignora errores de notificación.
Con qué se conecta: Con try interno.
Para qué sirve: La aprobación no falla por notificación.
Si se quita: Un error secundario podría dañar el flujo.

Línea 66: echo json_encode(['ok' => true, 'msg' => 'Trabajador aprobado y cuenta creada correctamente']);
Qué hace: Devuelve éxito.
Con qué se conecta: Con frontend.
Para qué sirve: Confirma aprobación.
Si se quita: No habría respuesta.

Línea 68: echo json_encode(['ok' => false, 'msg' => $resultado]);
Qué hace: Devuelve error del modelo.
Con qué se conecta: Con Solicitud.php.
Para qué sirve: Muestra causa del fallo.
Si se quita: No habría mensaje de error.

Línea 70: exit;
Qué hace: Detiene ejecución tras aprobar.
Con qué se conecta: Con flujo aprobar.
Para qué sirve: Evita llegar a rechazar o default.
Si se quita: Podría seguir procesando.

Línea 74: if ($accion === 'rechazar') {
Qué hace: Detecta acción rechazar.
Con qué se conecta: Con $accion.
Para qué sirve: Inicia rechazo.
Si se quita: No se podrían rechazar solicitudes.

Línea 75: $observacion = trim($_POST['observacion'] ?? '');
Qué hace: Obtiene motivo de rechazo.
Con qué se conecta: Con formulario de rechazo.
Para qué sirve: Guarda explicación.
Si se quita: No habría motivo.

Línea 76: $resultado = $model->rechazar($id_solicitud, $id_mayordomo, $observacion);
Qué hace: Rechaza solicitud en modelo.
Con qué se conecta: Con Solicitud.php y solicitud_registro.
Para qué sirve: Cambia estado de solicitud.
Si se quita: No se rechazaría.

Línea 77: if ($resultado === true) {
Qué hace: Verifica éxito.
Con qué se conecta: Con resultado del modelo.
Para qué sirve: Solo notifica si se rechazó.
Si se quita: Podría notificar mal.

Línea 80: $admins = $db->query(...)->fetchAll(PDO::FETCH_COLUMN);
Qué hace: Busca administradores activos.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Destinatarios de aviso.
Si se quita: No habría notificados.

Línea 83: $motivo = $observacion ? " Motivo: $observacion" : '';
Qué hace: Arma texto del motivo si existe.
Con qué se conecta: Con $observacion.
Para qué sirve: Personaliza notificación.
Si se quita: No se mostraría motivo.

Líneas 84 a 90:
Qué hacen: Envían notificación de rechazo.
Con qué se conectan: Con Notificacion.php y admin/trabajadores.php.
Para qué sirven: Informar a administradores.
Si se quitan: No se avisaría.

Línea 93: echo json_encode(['ok' => true, 'msg' => 'Solicitud rechazada correctamente']);
Qué hace: Devuelve éxito.
Con qué se conecta: Con frontend.
Para qué sirve: Confirma rechazo.
Si se quita: No habría respuesta.

Línea 95: echo json_encode(['ok' => false, 'msg' => $resultado]);
Qué hace: Devuelve error.
Con qué se conecta: Con modelo Solicitud.
Para qué sirve: Muestra qué falló.
Si se quita: No habría explicación.

Línea 97: exit;
Qué hace: Detiene ejecución.
Con qué se conecta: Con flujo rechazar.
Para qué sirve: Evita llegar al final.
Si se quita: Podría devolver otra respuesta.

Línea 100: echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
Qué hace: Responde si la acción no existe.
Con qué se conecta: Con frontend.
Para qué sirve: Maneja errores de acción.
Si se quita: No habría respuesta para acciones inválidas.

Línea 101: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin del archivo.
Si se quita: Puede funcionar, pero aquí cierra formalmente.

Conclusión:
Este controlador permite al mayordomo aprobar o rechazar solicitudes de registro de trabajadores. Se conecta con la sesión, la base de datos, el modelo Solicitud y el modelo Notificacion para cambiar estados y avisar a administradores.