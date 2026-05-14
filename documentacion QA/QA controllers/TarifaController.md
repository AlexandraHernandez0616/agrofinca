Línea 1: <?php
Qué hace: Abre código PHP.
Con qué se conecta: Con servidor PHP.
Para qué sirve: Ejecutar el controlador.
Si se quita: El archivo no funcionaría como PHP.

Líneas 2 a 14: Comentario de documentación
Qué hace: Explica acciones crear, editar, toggle y eliminar.
Con qué se conecta: Con documentación del módulo Tarifas.
Para qué sirve: Aclara el uso del controlador.
Si se quita: El código funciona, pero es menos claro.

Línea 16: session_start();
Qué hace: Inicia sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Validar administrador.
Si se quita: No se podría verificar rol.

Línea 18: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
Qué hace: Valida sesión y rol administrador.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Protege tarifas.
Si se quita: Otros roles podrían modificar tarifas.

Líneas 19 a 21:
Qué hacen: Envían 403, JSON de error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Bloquear acceso.
Si se quitan: Continuaría sin permiso.

Línea 24: require_once __DIR__ . '/../config/database.php';
Qué hace: Incluye Database.
Con qué se conecta: Con config/database.php.
Para qué sirve: Conectarse a BD.
Si se quita: No habría conexión.

Línea 25: require_once __DIR__ . '/../models/Tarifa.php';
Qué hace: Incluye modelo Tarifa.
Con qué se conecta: Con Tarifa.php.
Para qué sirve: Usar crear, actualizar, toggleActiva, tieneUso y eliminar.
Si se quita: No existiría el modelo.

Línea 27: header('Content-Type: application/json');
Qué hace: Define salida JSON.
Con qué se conecta: Con fetch() de la vista.
Para qué sirve: Responder al frontend.
Si se quita: Puede no interpretarse como JSON.

Línea 29: $db = (new Database())->conectar();
Qué hace: Crea conexión.
Con qué se conecta: Con base de datos.
Para qué sirve: Operar sobre tarifas.
Si se quita: No se consulta nada.

Línea 30: $model = new Tarifa($db);
Qué hace: Crea modelo Tarifa.
Con qué se conecta: Con Tarifa.php.
Para qué sirve: Ejecutar métodos del módulo.
Si se quita: No se pueden modificar tarifas.

Línea 31: $accion = trim($_POST['accion'] ?? '');
Qué hace: Obtiene acción.
Con qué se conecta: Con formulario POST.
Para qué sirve: Decide operación.
Si se quita: Switch no funciona.

Línea 33: try {
Qué hace: Inicia bloque de errores.
Con qué se conecta: Con catch.
Para qué sirve: Respuestas controladas.
Si se quita: Errores fatales.

Línea 34: switch ($accion) {
Qué hace: Evalúa acción.
Con qué se conecta: Con case crear, editar, toggle, eliminar.
Para qué sirve: Dirige flujo.
Si se quita: No hay selección.

Línea 37: case 'crear':
Qué hace: Inicia creación de tarifa.
Con qué se conecta: Con accion=crear.
Para qué sirve: Registrar nueva tarifa.
Si se quita: No se crearían tarifas.

Línea 38: $tipo = strtoupper(trim($_POST['tipo_pago'] ?? ''));
Qué hace: Obtiene tipo y lo pasa a mayúsculas.
Con qué se conecta: Con input tipo_pago.
Para qué sirve: Define si es JORNAL, PRODUCCION o MIXTO.
Si se quita: No se sabría tipo.

Línea 39: $valor = (float) ($_POST['valor'] ?? 0);
Qué hace: Obtiene valor numérico.
Con qué se conecta: Con input valor.
Para qué sirve: Define cuánto vale la tarifa.
Si se quita: No habría valor.

Línea 40: $inicio = trim($_POST['fecha_inicio_vigencia'] ?? '');
Qué hace: Obtiene fecha de inicio.
Con qué se conecta: Con input fecha_inicio_vigencia.
Para qué sirve: Define desde cuándo aplica.
Si se quita: No habría vigencia inicial.

Línea 41: $fin = trim($_POST['fecha_fin_vigencia'] ?? '') ?: null;
Qué hace: Obtiene fecha fin o null.
Con qué se conecta: Con input fecha_fin_vigencia.
Para qué sirve: Permite tarifa sin fecha final.
Si se quita: No se guardaría fin.

Línea 42: $activa = isset($_POST['activa']) && $_POST['activa'] === '1';
Qué hace: Convierte checkbox/valor activa a booleano.
Con qué se conecta: Con input activa.
Para qué sirve: Define si la tarifa queda habilitada.
Si se quita: No habría estado activo.

Línea 44: if (!in_array($tipo, ['JORNAL', 'PRODUCCION', 'MIXTO'], true)) {
Qué hace: Valida tipo permitido.
Con qué se conecta: Con $tipo.
Para qué sirve: Evita tipos inválidos.
Si se quita: Se guardarían tipos incorrectos.

Líneas 45 a 46:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisar tipo inválido.
Si se quitan: Continuaría.

Línea 48: if ($valor <= 0) {
Qué hace: Valida valor positivo.
Con qué se conecta: Con $valor.
Para qué sirve: Evita tarifas de cero o negativas.
Si se quita: Se guardarían valores inválidos.

Líneas 49 a 50:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisar valor inválido.
Si se quitan: Continuaría.

Línea 52: if ($inicio === '') {
Qué hace: Valida fecha inicio.
Con qué se conecta: Con $inicio.
Para qué sirve: Hace obligatoria la vigencia.
Si se quita: Tarifas sin fecha inicial.

Líneas 53 a 54:
Qué hacen: Devuelven error y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Avisar fecha faltante.
Si se quitan: Continuaría.

Línea 57: $ok = $model->crear($tipo, $valor, $inicio, $fin, $activa);
Qué hace: Guarda la tarifa.
Con qué se conecta: Con Tarifa.php y tabla tarifa.
Para qué sirve: Inserta una nueva tarifa.
Si se quita: No se registraría.

Líneas 58 a 61:
Qué hacen: Devuelven respuesta JSON.
Con qué se conectan: Con frontend.
Para qué sirven: Informar resultado.
Si se quitan: No habría respuesta.

Línea 62: break;
Qué hace: Termina crear.
Con qué se conecta: Con switch.
Para qué sirve: Evita pasar a otro caso.
Si se quita: Podría continuar.

Línea 65: case 'editar':
Qué hace: Inicia edición de tarifa.
Con qué se conecta: Con accion=editar.
Para qué sirve: Actualizar tarifa existente.
Si se quita: No se editaría.

Líneas 66 a 71:
Qué hacen: Obtienen ID, tipo, valor, fechas y activa.
Con qué se conectan: Con formulario.
Para qué sirven: Datos para actualizar.
Si se quitan: No habría datos.

Línea 73: if ($id <= 0) {
Qué hace: Valida ID.
Con qué se conecta: Con $id.
Para qué sirve: Identifica tarifa válida.
Si se quita: Podría actualizar ID inválido.

Líneas 77 a 87:
Qué hacen: Validan tipo, valor e inicio.
Con qué se conectan: Con datos del formulario.
Para qué sirven: Evitar datos incorrectos.
Si se quitan: Podrían guardarse datos malos.

Línea 91: $ok = $model->actualizar($id, $tipo, $valor, $inicio, $fin, $activa);
Qué hace: Actualiza tarifa.
Con qué se conecta: Con Tarifa.php y tabla tarifa.
Para qué sirve: Guarda cambios.
Si se quita: No se actualizaría.

Líneas 92 a 95:
Qué hacen: Devuelven JSON.
Con qué se conectan: Con frontend.
Para qué sirven: Informar resultado.
Si se quitan: No habría respuesta.

Línea 99: case 'toggle':
Qué hace: Inicia habilitar/deshabilitar.
Con qué se conecta: Con accion=toggle.
Para qué sirve: Cambiar estado activa.
Si se quita: No se podría activar/desactivar.

Línea 100: $id = (int) ($_POST['id'] ?? 0);
Qué hace: Obtiene ID.
Con qué se conecta: Con botón de toggle.
Para qué sirve: Identificar tarifa.
Si se quita: No se sabría cuál cambiar.

Línea 101: $activa = (int) ($_POST['activa'] ?? 0) === 1;
Qué hace: Convierte activa a booleano.
Con qué se conecta: Con estado enviado desde frontend.
Para qué sirve: Define nuevo estado.
Si se quita: No se sabría si habilitar o deshabilitar.

Líneas 103 a 106:
Qué hacen: Validan ID.
Con qué se conectan: Con $id.
Para qué sirven: Evitar ID inválido.
Si se quitan: Podría fallar.

Línea 108: $ok = $model->toggleActiva($id, $activa);
Qué hace: Cambia estado de la tarifa.
Con qué se conecta: Con Tarifa.php y campo activa.
Para qué sirve: Habilita o deshabilita.
Si se quita: No cambiaría estado.

Líneas 109 a 114:
Qué hacen: Devuelven mensaje según estado.
Con qué se conectan: Con frontend.
Para qué sirven: Informar si quedó habilitada o deshabilitada.
Si se quitan: No habría respuesta.

Línea 119: case 'eliminar':
Qué hace: Inicia eliminación.
Con qué se conecta: Con accion=eliminar.
Para qué sirve: Eliminar tarifa.
Si se quita: No se elimina.

Línea 120: $id = (int) ($_POST['id'] ?? 0);
Qué hace: Obtiene ID.
Con qué se conecta: Con botón eliminar.
Para qué sirve: Identificar tarifa.
Si se quita: No habría objetivo.

Líneas 122 a 125:
Qué hacen: Validan ID.
Con qué se conectan: Con $id.
Para qué sirven: Evitar error.
Si se quitan: Continuaría inválido.

Línea 126: if ($model->tieneUso($id)) {
Qué hace: Verifica si la tarifa tiene liquidaciones asociadas.
Con qué se conecta: Con Tarifa.php y tabla liquidacion.
Para qué sirve: Evita borrar tarifas usadas.
Si se quita: Se podría romper historial de liquidaciones.

Líneas 127 a 131:
Qué hacen: Devuelven error si tiene uso.
Con qué se conectan: Con frontend.
Para qué sirven: Explicar por qué no se elimina.
Si se quitan: No habría protección visible.

Línea 134: $ok = $model->eliminar($id);
Qué hace: Elimina tarifa.
Con qué se conecta: Con Tarifa.php y tabla tarifa.
Para qué sirve: Borra registro si se puede.
Si se quita: No se eliminaría.

Líneas 135 a 138:
Qué hacen: Devuelven JSON.
Con qué se conectan: Con frontend.
Para qué sirven: Informar resultado.
Si se quitan: No habría respuesta.

Línea 142: default:
Qué hace: Maneja acción desconocida.
Con qué se conecta: Con $accion.
Para qué sirve: Responder error.
Si se quita: No habría respuesta para acciones inválidas.

Línea 147: catch (Exception $e)
Qué hace: Captura errores generales.
Con qué se conecta: Con try.
Para qué sirve: Devolver error controlado.
Si se quita: Errores fatales.

Línea 148: echo json_encode(['ok' => false, 'mensaje' => 'Error interno: ' . $e->getMessage()]);
Qué hace: Devuelve error interno.
Con qué se conecta: Con frontend.
Para qué sirve: Informar fallo.
Si se quita: No habría respuesta.

Línea 150: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin del archivo.
Si se quita: Puede funcionar, pero aquí cierra formalmente.

Conclusión:
Este controlador administra tarifas del sistema. Solo el administrador puede crear, editar, habilitar, deshabilitar o eliminar tarifas. Se conecta con sesión, base de datos y el modelo Tarifa para proteger la integridad de las liquidaciones.