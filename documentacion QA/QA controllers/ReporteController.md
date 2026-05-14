Línea 1: <?php
Qué hace: Abre código PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Permite ejecutar el backend de reportes.
Si se quita: El archivo no se interpreta correctamente.

Líneas 2 a 17: Comentario de documentación
Qué hace: Describe el archivo, parámetros GET, formatos y respuestas.
Con qué se conecta: Con la documentación del módulo Reportes.
Para qué sirve: Explica cómo usar el controlador.
Si se quita: El código funciona, pero pierde claridad.

Línea 19: session_start();
Qué hace: Inicia sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Permite validar usuario y rol.
Si se quita: No se podría validar administrador.

Línea 21: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
Qué hace: Verifica sesión y rol ADMINISTRADOR.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Protege reportes administrativos.
Si se quita: Cualquier usuario podría consultar reportes.

Línea 22: http_response_code(403);
Qué hace: Envía código prohibido.
Con qué se conecta: Con respuesta HTTP.
Para qué sirve: Indica acceso denegado.
Si se quita: No habría código HTTP correcto.

Línea 23: echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
Qué hace: Devuelve JSON de error.
Con qué se conecta: Con frontend.
Para qué sirve: Informa falta de permisos.
Si se quita: No habría mensaje.

Línea 24: exit;
Qué hace: Detiene ejecución.
Con qué se conecta: Con validación de seguridad.
Para qué sirve: Evita generar reportes sin permiso.
Si se quita: El código continuaría.

Línea 27: require_once __DIR__ . '/../config/database.php';
Qué hace: Incluye conexión.
Con qué se conecta: Con clase Database.
Para qué sirve: Permite conectarse a MySQL.
Si se quita: No habría conexión.

Línea 28: require_once __DIR__ . '/../models/Reporte.php';
Qué hace: Incluye el modelo Reporte.
Con qué se conecta: Con models/Reporte.php.
Para qué sirve: Usa métodos asistencia(), produccion(), pagos(), liquidaciones().
Si se quita: No existiría la clase Reporte.

Línea 30: $db = (new Database())->conectar();
Qué hace: Crea conexión PDO.
Con qué se conecta: Con la base de datos.
Para qué sirve: Permite consultar reportes.
Si se quita: El modelo no tendría conexión.

Línea 31: $model = new Reporte($db);
Qué hace: Crea el modelo Reporte.
Con qué se conecta: Con Reporte.php.
Para qué sirve: Centraliza consultas de reportes.
Si se quita: No se podrían obtener filas.

Línea 33: $tipo = trim($_GET['tipo'] ?? 'asistencia');
Qué hace: Obtiene el tipo de reporte o usa asistencia.
Con qué se conecta: Con parámetros GET de la URL.
Para qué sirve: Decide qué reporte generar.
Si se quita: No se sabría qué reporte mostrar.

Línea 34: $id_trabajador = (int) ($_GET['id_trabajador'] ?? 0);
Qué hace: Obtiene filtro de trabajador.
Con qué se conecta: Con selector de trabajador en la vista.
Para qué sirve: Permite reportar uno o todos los trabajadores.
Si se quita: No habría filtro por trabajador.

Línea 35: $fecha_inicio = trim($_GET['fecha_inicio'] ?? '');
Qué hace: Obtiene fecha inicial.
Con qué se conecta: Con filtro de fechas.
Para qué sirve: Limita reporte desde una fecha.
Si se quita: No habría filtro inicial.

Línea 36: $fecha_fin = trim($_GET['fecha_fin'] ?? '');
Qué hace: Obtiene fecha final.
Con qué se conecta: Con filtro de fechas.
Para qué sirve: Limita reporte hasta una fecha.
Si se quita: No habría filtro final.

Línea 37: $formato = trim($_GET['formato'] ?? 'json');
Qué hace: Obtiene formato de salida.
Con qué se conecta: Con botones de exportar JSON/CSV.
Para qué sirve: Decide si devuelve JSON o descarga CSV.
Si se quita: No habría selección de formato.

Línea 40: $tiposValidos = ['asistencia', 'produccion', 'pagos', 'liquidaciones'];
Qué hace: Define reportes permitidos.
Con qué se conecta: Con $tipo.
Para qué sirve: Evita ejecutar tipos no válidos.
Si se quita: No habría validación de tipo.

Línea 41: if (!in_array($tipo, $tiposValidos, true)) {
Qué hace: Valida que el tipo exista.
Con qué se conecta: Con $tiposValidos.
Para qué sirve: Bloquea reportes inválidos.
Si se quita: Podría fallar el match.

Líneas 42 a 44:
Qué hacen: Devuelven error JSON y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Informan tipo inválido.
Si se quitan: Continuaría con datos inválidos.

Líneas 48 a 53: $columnas = [...]
Qué hacen: Definen encabezados de cada reporte.
Con qué se conectan: Con JSON y CSV.
Para qué sirven: Permiten mostrar o exportar columnas correctas.
Si se quitan: No habría cabecera para reportes.

Línea 57: try {
Qué hace: Inicia bloque seguro.
Con qué se conecta: Con catch.
Para qué sirve: Controla errores al generar reportes.
Si se quita: Errores podrían romper la salida.

Línea 58: $filas = match($tipo) {
Qué hace: Usa match para elegir método del modelo según tipo.
Con qué se conecta: Con el modelo Reporte.
Para qué sirve: Ejecuta la consulta correcta.
Si se quita: No se obtendrían datos.

Línea 59: 'asistencia' => $model->asistencia(...)
Qué hace: Genera filas de asistencia.
Con qué se conecta: Con método asistencia del modelo y tablas de asistencia.
Para qué sirve: Reporta entradas y salidas.
Si se quita: No habría reporte de asistencia.

Línea 60: 'produccion' => $model->produccion(...)
Qué hace: Genera reporte de producción.
Con qué se conecta: Con tabla produccion.
Para qué sirve: Muestra cantidades producidas.
Si se quita: No habría reporte de producción.

Línea 61: 'pagos' => $model->pagos(...)
Qué hace: Genera reporte de pagos.
Con qué se conecta: Con tablas pago/liquidacion/trabajador.
Para qué sirve: Muestra pagos realizados.
Si se quita: No habría reporte de pagos.

Línea 62: 'liquidaciones' => $model->liquidaciones(...)
Qué hace: Genera reporte de liquidaciones.
Con qué se conecta: Con tabla liquidacion.
Para qué sirve: Muestra liquidaciones por trabajador.
Si se quita: No habría reporte de liquidaciones.

Línea 64: } catch (Exception $e) {
Qué hace: Captura errores al consultar.
Con qué se conecta: Con try.
Para qué sirve: Devuelve error controlado.
Si se quita: Podría romperse el archivo.

Líneas 65 a 67:
Qué hacen: Devuelven error JSON y detienen.
Con qué se conectan: Con frontend.
Para qué sirven: Informan fallo al generar reporte.
Si se quitan: No habría respuesta clara.

Línea 71: if ($formato === 'csv') {
Qué hace: Verifica si se pidió CSV.
Con qué se conecta: Con parámetro formato.
Para qué sirve: Cambia salida de JSON a archivo descargable.
Si se quita: No habría exportación CSV.

Línea 72: $nombreArchivo = 'reporte_' . $tipo . '_' . date('Ymd_His') . '.csv';
Qué hace: Genera nombre único para el CSV.
Con qué se conecta: Con $tipo y fecha actual.
Para qué sirve: Nombra el archivo descargado.
Si se quita: No habría nombre dinámico.

Línea 73: header('Content-Type: text/csv; charset=utf-8');
Qué hace: Define salida CSV.
Con qué se conecta: Con navegador.
Para qué sirve: Indica que se descargará CSV.
Si se quita: El navegador podría no reconocer el archivo.

Línea 74: header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');
Qué hace: Fuerza descarga con nombre.
Con qué se conecta: Con el navegador.
Para qué sirve: Descarga el archivo en vez de mostrar texto.
Si se quita: Podría abrirse en pantalla.

Línea 76: $out = fopen('php://output', 'w');
Qué hace: Abre la salida directa.
Con qué se conecta: Con la respuesta HTTP.
Para qué sirve: Escribe el CSV al navegador.
Si se quita: No se podría escribir archivo.

Línea 78: fputs($out, "\xEF\xBB\xBF");
Qué hace: Escribe BOM UTF-8.
Con qué se conecta: Con Excel.
Para qué sirve: Permite ver tildes correctamente.
Si se quita: Excel podría mostrar caracteres raros.

Línea 80: fputcsv($out, $columnas[$tipo], ';');
Qué hace: Escribe encabezados del CSV.
Con qué se conecta: Con $columnas.
Para qué sirve: Da títulos a las columnas.
Si se quita: El CSV no tendría encabezado.

Línea 82: foreach ($filas as $fila) {
Qué hace: Recorre cada fila del reporte.
Con qué se conecta: Con $filas.
Para qué sirve: Exporta todos los registros.
Si se quita: No se escribirían datos.

Línea 83: fputcsv($out, array_values($fila), ';');
Qué hace: Escribe una fila en CSV.
Con qué se conecta: Con cada resultado de la base de datos.
Para qué sirve: Guarda datos en el archivo.
Si se quita: El CSV saldría vacío.

Línea 85: fclose($out);
Qué hace: Cierra la salida CSV.
Con qué se conecta: Con php://output.
Para qué sirve: Finaliza escritura.
Si se quita: Podría quedar salida incompleta.

Línea 86: exit;
Qué hace: Detiene ejecución tras descargar CSV.
Con qué se conecta: Con flujo de formato CSV.
Para qué sirve: Evita que también se imprima JSON.
Si se quita: El CSV podría mezclarse con JSON.

Línea 90: header('Content-Type: application/json');
Qué hace: Define salida JSON.
Con qué se conecta: Con frontend.
Para qué sirve: Respuesta por defecto para mostrar en pantalla.
Si se quita: Podría no interpretarse como JSON.

Líneas 91 a 97:
Qué hacen: Devuelven ok, tipo, columnas, filas y total.
Con qué se conectan: Con la vista de reportes.
Para qué sirven: Permiten renderizar tabla y conteo.
Si se quitan: No habría respuesta del reporte.

Línea 98: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Final formal del archivo.
Si se quita: Puede funcionar, pero aquí cierra el bloque.

Conclusión:
Este controlador genera reportes administrativos. Recibe filtros por GET, valida que el usuario sea ADMINISTRADOR, usa el modelo Reporte para consultar datos y devuelve la información en JSON o CSV.