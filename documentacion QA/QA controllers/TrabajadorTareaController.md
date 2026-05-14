Línea 1: <?php
Qué hace: Abre PHP.
Con qué se conecta: Con servidor PHP.
Para qué sirve: Ejecutar controlador.
Si se quita: No se interpreta como PHP.

Líneas 2 a 10: Comentario de documentación
Qué hace: Explica que marca tareas como completadas.
Con qué se conecta: Con documentación de Mis Tareas.
Para qué sirve: Aclara acción completar.
Si se quita: Código funciona, pero menos claro.

Línea 12: session_start();
Qué hace: Inicia sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Identificar trabajador.
Si se quita: No se sabe quién completa la tarea.

Línea 13: header('Content-Type: application/json');
Qué hace: Define respuesta JSON.
Con qué se conecta: Con fetch() de la vista.
Para qué sirve: Responder correctamente al frontend.
Si se quita: Puede no interpretarse como JSON.

Línea 15: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
Qué hace: Valida sesión y rol.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Solo trabajadores completan sus tareas.
Si se quita: Otros roles podrían modificar tareas.

Líneas 16 a 17:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Bloquear acceso.
Si se quitan: Continuaría.

Línea 20: if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
Qué hace: Valida POST.
Con qué se conecta: Con fetch().
Para qué sirve: Evita llamadas por GET.
Si se quita: Podría ejecutarse desde URL.

Líneas 21 a 22:
Qué hacen: Devuelven método no permitido y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Proteger flujo.
Si se quitan: Continuaría.

Línea 25: require_once __DIR__ . '/../config/database.php';
Qué hace: Incluye conexión.
Con qué se conecta: Con Database.
Para qué sirve: Usar BD.
Si se quita: No habría conexión.

Línea 26: require_once __DIR__ . '/../models/TrabajadorTarea.php';
Qué hace: Incluye modelo TrabajadorTarea.
Con qué se conecta: Con TrabajadorTarea.php.
Para qué sirve: Usar completar().
Si se quita: No existiría el modelo.

Línea 28: $db = (new Database())->conectar();
Qué hace: Conecta a BD.
Con qué se conecta: Con config/database.php.
Para qué sirve: Actualizar tarea.
Si se quita: No habría BD.

Línea 29: $model = new TrabajadorTarea($db);
Qué hace: Crea modelo.
Con qué se conecta: Con TrabajadorTarea.php.
Para qué sirve: Ejecutar completar.
Si se quita: No se podría llamar al método.

Línea 30: $id_trabajador = (int) $_SESSION['id_usuario'];
Qué hace: Obtiene ID del trabajador.
Con qué se conecta: Con sesión.
Para qué sirve: Asegurar que completa su propia tarea.
Si se quita: No se sabría quién realiza la acción.

Línea 31: $accion = trim($_POST['accion'] ?? '');
Qué hace: Obtiene acción.
Con qué se conecta: Con POST accion.
Para qué sirve: Decide qué proceso ejecutar.
Si se quita: No habría selección.

Línea 33: try {
Qué hace: Inicia bloque seguro.
Con qué se conecta: Con catch.
Para qué sirve: Manejar errores.
Si se quita: Error fatal posible.

Línea 34: switch ($accion) {
Qué hace: Evalúa acción.
Con qué se conecta: Con case completar.
Para qué sirve: Controlar acciones.
Si se quita: No habría flujo.

Línea 36: case 'completar':
Qué hace: Inicia completar tarea.
Con qué se conecta: Con accion=completar.
Para qué sirve: Marcar tarea completada.
Si se quita: No se completarían tareas.

Línea 37: $id_tarea = (int) ($_POST['id_tarea'] ?? 0);
Qué hace: Obtiene ID de tarea.
Con qué se conecta: Con botón/formulario de tarea.
Para qué sirve: Saber qué tarea completar.
Si se quita: No habría tarea objetivo.

Línea 39: if ($id_tarea <= 0) {
Qué hace: Valida ID.
Con qué se conecta: Con $id_tarea.
Para qué sirve: Evitar ID inválido.
Si se quita: Podría fallar modelo.

Líneas 40 a 41:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisar ID inválido.
Si se quitan: Continuaría.

Línea 44: $ok = $model->completar($id_tarea, $id_trabajador);
Qué hace: Llama al modelo para completar tarea.
Con qué se conecta: Con TrabajadorTarea.php, tarea_trabajador y tarea.
Para qué sirve: Marca tarea como completada para ese trabajador.
Si se quita: No se actualiza la tarea.

Líneas 45 a 48:
Qué hacen: Devuelven JSON de éxito o error.
Con qué se conectan: Con frontend.
Para qué sirven: Confirmar resultado.
Si se quitan: No habría respuesta.

Línea 49: break;
Qué hace: Termina case completar.
Con qué se conecta: Con switch.
Para qué sirve: Evitar pasar a default.
Si se quita: Podría continuar.

Línea 51: default:
Qué hace: Maneja acción desconocida.
Con qué se conecta: Con $accion.
Para qué sirve: Responder errores.
Si se quita: No habría respuesta para acciones inválidas.

Línea 52: echo json_encode(['ok' => false, 'msg' => 'Acción no reconocida']);
Qué hace: Devuelve error.
Con qué se conecta: Con frontend.
Para qué sirve: Informar acción inválida.
Si se quita: No habría aviso.

Línea 56: } catch (Exception $e) {
Qué hace: Captura errores.
Con qué se conecta: Con try.
Para qué sirve: Controlar fallos.
Si se quita: Error fatal.

Línea 57: echo json_encode(['ok' => false, 'msg' => 'Error interno: ' . $e->getMessage()]);
Qué hace: Devuelve error interno.
Con qué se conecta: Con frontend.
Para qué sirve: Informar problema del servidor.
Si se quita: No habría respuesta.

Línea 59: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin del archivo.
Si se quita: Puede funcionar, pero aquí cierra formalmente.

Conclusión:
Este controlador permite al trabajador marcar una tarea como completada. Se conecta con la sesión, la base de datos y el modelo TrabajadorTarea para asegurar que el cambio pertenece al trabajador logueado.