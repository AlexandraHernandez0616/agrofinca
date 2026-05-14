Línea 1: <?php
Qué hace: Abre PHP.
Con qué se conecta: Con servidor PHP.
Para qué sirve: Ejecutar controlador.
Si se quita: No se interpreta como PHP.

Líneas 2 a 11: Comentario de documentación
Qué hace: Explica solicitud de herramientas.
Con qué se conecta: Con documentación del módulo trabajador.
Para qué sirve: Aclara acción solicitar.
Si se quita: Código funciona, pero pierde explicación.

Línea 13: session_start();
Qué hace: Inicia sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Identificar trabajador.
Si se quita: No se sabría quién solicita.

Línea 14: header('Content-Type: application/json');
Qué hace: Define respuesta JSON.
Con qué se conecta: Con fetch().
Para qué sirve: Responder al frontend.
Si se quita: Puede no interpretarse bien.

Línea 16: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
Qué hace: Valida rol trabajador.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Solo trabajadores solicitan herramientas.
Si se quita: Otros usuarios podrían solicitar.

Líneas 17 a 18:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Bloquear acceso.
Si se quitan: Continuaría.

Línea 21: if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
Qué hace: Valida método POST.
Con qué se conecta: Con formulario/fetch.
Para qué sirve: Evita solicitudes por GET.
Si se quita: Se podría llamar por URL.

Líneas 22 a 23:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Proteger flujo.
Si se quitan: Continuaría.

Líneas 26 a 28:
Qué hacen: Incluyen Database, modelo de solicitud y Notificacion.
Con qué se conectan: Con config/database.php, TrabajadorSolicitudHerramienta.php y Notificacion.php.
Para qué sirven: Conectar BD, crear solicitud y notificar.
Si se quitan: Fallaría la lógica.

Línea 30: $db = (new Database())->conectar();
Qué hace: Conecta a BD.
Con qué se conecta: Con Database.
Para qué sirve: Guardar préstamo.
Si se quita: No se podría registrar.

Línea 31: $model = new TrabajadorSolicitudHerramienta($db);
Qué hace: Crea modelo.
Con qué se conecta: Con TrabajadorSolicitudHerramienta.php.
Para qué sirve: Solicitar herramienta y buscar mayordomo.
Si se quita: No habría métodos.

Línea 32: $id_trabajador = (int) $_SESSION['id_usuario'];
Qué hace: Obtiene trabajador logueado.
Con qué se conecta: Con sesión.
Para qué sirve: Asociar solicitud al trabajador.
Si se quita: No se sabría solicitante.

Línea 33: $accion = trim($_POST['accion'] ?? '');
Qué hace: Obtiene acción.
Con qué se conecta: Con POST accion.
Para qué sirve: Validar que sea solicitar.
Si se quita: No se controla acción.

Línea 36: if ($accion !== 'solicitar') {
Qué hace: Rechaza acciones distintas.
Con qué se conecta: Con $accion.
Para qué sirve: Solo permite solicitud.
Si se quita: Podrían pasar acciones no esperadas.

Líneas 37 a 38:
Qué hacen: Devuelven acción no reconocida y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Respuesta clara.
Si se quitan: Continuaría.

Línea 41: $id_herramienta = (int) ($_POST['id_herramienta'] ?? 0);
Qué hace: Obtiene herramienta solicitada.
Con qué se conecta: Con selector de herramienta y tabla herramienta.
Para qué sirve: Saber qué herramienta pide.
Si se quita: No habría herramienta.

Línea 42: $cantidad = (int) ($_POST['cantidad'] ?? 0);
Qué hace: Obtiene cantidad.
Con qué se conecta: Con input cantidad.
Para qué sirve: Saber cuántas unidades pide.
Si se quita: No habría cantidad.

Línea 43: $observacion = trim($_POST['observacion'] ?? '') ?: null;
Qué hace: Obtiene observación o null.
Con qué se conecta: Con campo observacion.
Para qué sirve: Agregar detalle opcional.
Si se quita: No se guardan observaciones.

Línea 46: if ($id_herramienta <= 0) {
Qué hace: Valida herramienta.
Con qué se conecta: Con $id_herramienta.
Para qué sirve: Evita solicitudes sin herramienta.
Si se quita: Se podrían crear solicitudes inválidas.

Líneas 47 a 48:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisar que falta herramienta.
Si se quitan: Continuaría.

Línea 50: if ($cantidad <= 0) {
Qué hace: Valida cantidad positiva.
Con qué se conecta: Con $cantidad.
Para qué sirve: Evita cantidades inválidas.
Si se quita: Se podrían pedir 0 o negativo.

Líneas 51 a 52:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisar cantidad inválida.
Si se quitan: Continuaría.

Línea 56: $id_mayordomo = $model->obtenerMayordomo($id_trabajador);
Qué hace: Busca mayordomo asignado o disponible.
Con qué se conecta: Con modelo y tabla usuario/mayordomo.
Para qué sirve: Saber quién revisará la solicitud.
Si se quita: No habría destinatario del préstamo.

Línea 57: if (!$id_mayordomo) {
Qué hace: Verifica si no hay mayordomo.
Con qué se conecta: Con resultado anterior.
Para qué sirve: Evita crear solicitud sin responsable.
Si se quita: Podría guardarse sin mayordomo.

Líneas 58 a 62:
Qué hacen: Devuelven error claro.
Con qué se conectan: Con frontend.
Para qué sirven: Pedir contactar administrador.
Si se quitan: No habría aviso.

Línea 66: $ok = $model->solicitar(...)
Qué hace: Crea solicitud/préstamo pendiente.
Con qué se conecta: Con modelo, tablas prestamo y detalle_prestamo.
Para qué sirve: Registrar solicitud de herramienta.
Si se quita: No se enviaría solicitud.

Línea 67: if ($ok) {
Qué hace: Verifica si se creó.
Con qué se conecta: Con resultado del modelo.
Para qué sirve: Solo notifica si guardó.
Si se quita: Podría notificar sin solicitud.

Línea 69: $nombreTrabajador = $_SESSION['username'] ?? 'Un trabajador';
Qué hace: Obtiene nombre de usuario.
Con qué se conecta: Con sesión.
Para qué sirve: Personalizar notificación.
Si se quita: Mensaje sería menos claro.

Líneas 70 a 76:
Qué hacen: Envían notificación al mayordomo.
Con qué se conectan: Con Notificacion.php y vista mayordomo/prestamos.php.
Para qué sirven: Avisar solicitud pendiente.
Si se quitan: El mayordomo no recibe aviso.

Líneas 79 a 84:
Qué hacen: Devuelven JSON final.
Con qué se conectan: Con frontend.
Para qué sirven: Confirmar si se envió o falló.
Si se quitan: No habría respuesta.

Línea 86: } catch (Exception $e) {
Qué hace: Captura errores.
Con qué se conecta: Con try.
Para qué sirve: Respuesta controlada.
Si se quita: Error fatal.

Línea 87: echo json_encode(['ok' => false, 'msg' => 'Error interno: ' . $e->getMessage()]);
Qué hace: Devuelve error interno.
Con qué se conecta: Con frontend.
Para qué sirve: Informar fallo.
Si se quita: No habría respuesta controlada.

Línea 89: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin del archivo.
Si se quita: Puede funcionar, pero aquí cierra formalmente.

Conclusión:
Este controlador permite que un trabajador solicite una herramienta. Se conecta con sesión, base de datos, modelo de solicitud, módulo de préstamos y notificaciones para avisar al mayordomo.