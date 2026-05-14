Línea 1: <?php
Abre PHP.

Líneas 2 a 20: Comentario de documentación
Explica liquidaciones temporales, seguridad, acciones POST y GET.

Línea 22: session_start();
Inicia sesión.

Línea 24: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Valida que sea mayordomo.

Líneas 25 a 27:
Responde acceso denegado y detiene ejecución.

Líneas 30 a 32:
Incluyen base de datos, modelo y notificaciones.

Línea 34: header('Content-Type: application/json');
Define respuesta JSON.

Línea 36: $db = (new Database())->conectar();
Conecta a BD.

Línea 37: $model = new MayordomoLiquidacionTemporal($db);
Crea modelo.

Línea 38: $id_mayordomo = (int) $_SESSION['id_usuario'];
Obtiene ID del mayordomo.

Línea 41: $permiso = $model->obtenerPermisoActivo($id_mayordomo);
Consulta permiso activo.

Línea 42: if (!$permiso) {
Valida si no tiene permiso.

Línea 43: echo json_encode(...)
Devuelve error.

Línea 46: $id_autorizacion = (int) $permiso['id_autorizacion'];
Obtiene ID de autorización.

Línea 49: if ($_SERVER['REQUEST_METHOD'] === 'GET') {
Procesa solicitudes GET.

Línea 50: $accionGet = trim($_GET['accion'] ?? '');
Obtiene acción GET.

Línea 52: if ($accionGet === 'jornadas') {
Caso para consultar jornadas.

Líneas 53 a 55:
Obtiene trabajador, fecha inicio y fecha fin.

Línea 56: if ($id_t <= 0 || ...)
Valida datos.

Línea 60: $jornadas = $model->jornadasTrabajador(...)
Consulta jornadas.

Línea 61: echo json_encode(...)
Devuelve jornadas.

Línea 65: if ($accionGet === 'detalle') {
Caso para detalle.

Línea 66: $id = (int) ($_GET['id'] ?? 0);
Obtiene ID.

Línea 67: if ($id <= 0) {
Valida ID.

Línea 72: $detalle = $model->obtenerDetalle($id);
Obtiene detalle.

Línea 73: echo json_encode(...)
Devuelve detalle.

Línea 77: echo json_encode(['ok' => false, 'mensaje' => 'Acción GET no reconocida']);
Responde si la acción GET no existe.

Línea 82: $accion = trim($_POST['accion'] ?? '');
Obtiene acción POST.

Línea 85: switch ($accion) {
Evalúa acción.

Línea 87: case 'generar':
Caso para generar liquidación temporal.

Líneas 88 a 94:
Obtiene trabajador, tarifa, fechas, jornadas, valor y observación.

Líneas 96 a 119:
Valida trabajador, tarifa, fechas y valor calculado.

Línea 122: if ($inicio < $permiso['fecha_inicio'] || $fin > $permiso['fecha_fin']) {
Verifica que el período esté dentro del permiso.

Líneas 123 a 127:
Devuelve error si se sale del rango autorizado.

Línea 131: if ($permiso['monto_maximo'] !== null && $valor > ...)
Valida monto máximo autorizado.

Líneas 132 a 136:
Devuelve error si supera el monto.

Línea 140: $ok = $model->generar(...)
Genera la liquidación temporal.

Línea 144: if ($ok) {
Si se generó, intenta notificar.

Líneas 146 a 152:
Notifica al trabajador.

Líneas 153 a 164:
Busca administradores activos y les notifica.

Líneas 168 a 171:
Devuelve respuesta JSON.

Línea 175: default:
Acción no reconocida.

Línea 180: catch (Exception $e)
Captura errores.

Línea 181: echo json_encode(...)
Devuelve error interno.

Línea 183: ?>
Cierra PHP.

Conclusión:
Este controlador permite que un mayordomo genere liquidaciones temporales solo si tiene autorización activa, validando fechas, monto máximo y enviando notificaciones.