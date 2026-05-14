Línea 1: <?php
Abre PHP.

Líneas 2 a 19: Comentario de documentación
Explica los reportes, parámetros GET y formatos JSON/CSV.

Línea 21: session_start();
Inicia sesión.

Línea 23: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Valida rol mayordomo.

Líneas 24 a 26:
Devuelve acceso denegado.

Línea 29: require_once __DIR__ . '/../config/database.php';
Incluye conexión.

Línea 31: $db = (new Database())->conectar();
Conecta BD.

Línea 32: $id_mayordomo = (int) $_SESSION['id_usuario'];
Obtiene ID del mayordomo.

Líneas 34 a 38:
Obtiene tipo, trabajador, fechas y formato desde GET.

Línea 41: $tiposValidos = [...]
Define reportes permitidos.

Línea 42: if (!in_array($tipo, $tiposValidos, true)) {
Valida tipo.

Líneas 43 a 45:
Devuelve error si el tipo no existe.

Líneas 49 a 54: $columnas = [...]
Define columnas para cada reporte.

Línea 57: function addFechaFiltros(...)
Crea función para agregar filtros de fecha.

Línea 58: if ($inicio !== '') ...
Agrega filtro de fecha inicio.

Línea 59: if ($fin !== '') ...
Agrega filtro de fecha fin.

Línea 64: switch ($tipo) {
Evalúa tipo de reporte.

Línea 67: case 'asistencia':
Reporte de asistencia.

Líneas 68 a 80:
Prepara filtros para trabajadores del mayordomo.

Líneas 82 a 99:
Construye consulta SQL de asistencia.

Línea 103: case 'produccion':
Reporte de producción.

Líneas 104 a 116:
Prepara filtros.

Líneas 118 a 130:
Construye consulta SQL de producción.

Línea 134: case 'tareas':
Reporte de tareas.

Líneas 135 a 138:
Prepara filtros por mayordomo y fecha.

Líneas 140 a 158:
Construye consulta SQL de tareas.

Línea 162: case 'prestamos':
Reporte de préstamos.

Líneas 163 a 172:
Prepara filtros.

Líneas 174 a 189:
Construye consulta SQL de préstamos.

Línea 193: $stmt = $db->prepare($sql);
Prepara consulta.

Línea 194: $stmt->execute($params);
Ejecuta consulta con parámetros.

Línea 195: $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);
Obtiene resultados.

Línea 197: catch (Exception $e)
Captura errores.

Líneas 198 a 200:
Devuelve error JSON.

Línea 204: if ($formato === 'csv') {
Verifica si se pidió CSV.

Línea 205: $nombreArchivo = ...
Crea nombre del archivo.

Línea 206: header('Content-Type: text/csv; charset=utf-8');
Define descarga CSV.

Línea 207: header('Content-Disposition: attachment; filename="..."');
Indica nombre de descarga.

Línea 209: $out = fopen('php://output', 'w');
Abre salida del archivo.

Línea 210: fputs($out, "\xEF\xBB\xBF");
Agrega BOM UTF-8 para Excel.

Línea 211: fputcsv($out, $columnas[$tipo], ';');
Escribe encabezados.

Líneas 212 a 214:
Escribe cada fila del reporte.

Línea 215: fclose($out);
Cierra salida.

Línea 216: exit;
Detiene ejecución.

Línea 220: header('Content-Type: application/json');
Define JSON.

Líneas 221 a 227:
Devuelve reporte en JSON.

Línea 228: ?>
Cierra PHP.

Conclusión:
Este controlador genera reportes operativos del mayordomo en JSON o CSV, filtrando datos por trabajador, fecha y ámbito del mayordomo.