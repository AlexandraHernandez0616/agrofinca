Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete PHP del servidor.
Para qué sirve: Permite ejecutar la clase Reporte.
Qué pasaría si se quita: El servidor podría no interpretar correctamente el archivo como PHP.

Líneas 2 a 25: Comentario de documentación
Qué hace exactamente: Explica que este modelo maneja consultas de reportes: asistencia, producción, pagos y liquidaciones.
Con qué se conecta: Con las tablas asistencia, produccion, pago, liquidacion, trabajador, usuario, lote y tarifa.
Para qué sirve: Sirve para entender qué reportes genera el archivo y qué columnas devuelve cada uno.
Qué pasaría si se quita: El código funciona igual, pero sería más difícil entender el propósito del modelo.

Línea 26: class Reporte {
Qué hace exactamente: Declara la clase Reporte.
Con qué se conecta: Con ReporteController.php, que usa este modelo para generar reportes.
Para qué sirve: Agrupa todos los métodos de consulta de reportes.
Qué pasaría si se quita: No existiría la clase y el controlador no podría crear new Reporte($db).

Línea 28: private $conn;
Qué hace exactamente: Declara una propiedad privada llamada $conn.
Con qué se conecta: Con la conexión PDO enviada desde config/database.php.
Para qué sirve: Guarda la conexión a la base de datos dentro del modelo.
Qué pasaría si se quita: Los métodos no tendrían conexión para consultar la base de datos.

Línea 30: public function __construct($db) {
Qué hace exactamente: Declara el constructor.
Con qué se conecta: Con el momento en que el controlador crea el modelo: new Reporte($db).
Para qué sirve: Recibe la conexión de base de datos.
Qué pasaría si se quita: La conexión no se guardaría automáticamente.

Línea 31: $this->conn = $db;
Qué hace exactamente: Guarda la conexión recibida en la propiedad interna $conn.
Con qué se conecta: Con todos los métodos del modelo que usan $this->conn.
Para qué sirve: Permite ejecutar consultas SQL dentro del modelo.
Qué pasaría si se quita: Las consultas fallarían porque $this->conn no tendría valor.

Línea 32: }
Qué hace exactamente: Cierra el constructor.
Con qué se conecta: Con la línea 30.
Para qué sirve: Finaliza la inicialización del modelo.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 34 a 36: Comentario separador TRABAJADORES
Qué hace exactamente: Separa visualmente la sección que carga trabajadores para filtros.
Con qué se conecta: Con listarTrabajadores().
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: No afecta el funcionamiento.

Línea 38: public function listarTrabajadores(): array {
Qué hace exactamente: Declara un método público que devuelve un arreglo.
Con qué se conecta: Con el select de trabajador en la vista de reportes.
Para qué sirve: Cargar los trabajadores disponibles para filtrar reportes.
Qué pasaría si se quita: La vista de reportes no tendría lista de trabajadores para seleccionar.

Línea 39: $stmt = $this->conn->query(
Qué hace exactamente: Ejecuta una consulta SQL directa.
Con qué se conecta: Con la conexión PDO guardada en $this->conn.
Para qué sirve: Obtener trabajadores sin parámetros externos.
Qué pasaría si se quita: No se ejecutaría la consulta.

Líneas 40 a 45: SELECT tr.id_trabajador, CONCAT(...) FROM trabajador JOIN usuario
Qué hace exactamente: Consulta el ID del trabajador y su nombre completo.
Con qué se conecta: Con trabajador.id_trabajador y usuario.id_usuario.
Para qué sirve: Mostrar nombres claros en el filtro de reportes.
Qué pasaría si se quita: No se podrían cargar trabajadores en el filtro.

Línea 46: );
Qué hace exactamente: Cierra la llamada a query().
Con qué se conecta: Con la línea 39.
Para qué sirve: Finaliza la consulta.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 47: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todos los trabajadores como arreglo asociativo.
Con qué se conecta: Con la vista o controlador que necesita llenar el select.
Para qué sirve: Entregar datos listos para mostrar.
Qué pasaría si se quita: El método no devolvería nada.

Línea 48: }
Qué hace exactamente: Cierra listarTrabajadores().
Con qué se conecta: Con la línea 38.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 50 a 52: Comentario REPORTE: ASISTENCIA
Qué hace exactamente: Separa la sección del reporte de asistencia.
Con qué se conecta: Con el método asistencia().
Para qué sirve: Organizar visualmente el código.
Qué pasaría si se quita: No afecta el funcionamiento.

Líneas 54 a 57: Comentario del método asistencia()
Qué hace exactamente: Explica que retorna registros de asistencia y calcula horas trabajadas.
Con qué se conecta: Con la tabla asistencia.
Para qué sirve: Documentar el comportamiento del método.
Qué pasaría si se quita: El código funciona, pero se pierde claridad.

Línea 58: public function asistencia(int $id_trabajador, string $fecha_inicio, string $fecha_fin): array {
Qué hace exactamente: Declara el método para generar reporte de asistencia.
Con qué se conecta: Con ReporteController.php cuando el tipo de reporte es asistencia.
Para qué sirve: Consultar asistencias filtradas por trabajador y rango de fechas.
Qué pasaría si se quita: No existiría el reporte de asistencia.

Línea 59: $where = ['1=1'];
Qué hace exactamente: Crea un arreglo de condiciones SQL con una condición siempre verdadera.
Con qué se conecta: Con el WHERE dinámico de la consulta.
Para qué sirve: Permite agregar filtros con AND fácilmente.
Qué pasaría si se quita: Habría que construir el WHERE manualmente.

Línea 60: $params = [];
Qué hace exactamente: Crea un arreglo vacío para parámetros.
Con qué se conecta: Con $stmt->execute($params).
Para qué sirve: Guardar valores como trabajador, inicio y fin.
Qué pasaría si se quita: No se podrían enviar filtros de forma segura.

Líneas 62 a 65: if ($id_trabajador > 0)
Qué hace exactamente: Si se seleccionó un trabajador específico, agrega filtro por id_trabajador.
Con qué se conecta: Con asistencia.id_trabajador.
Para qué sirve: Permite generar reporte de un solo trabajador o de todos.
Qué pasaría si se quita: El reporte no podría filtrarse por trabajador.

Líneas 66 a 69: if ($fecha_inicio !== '')
Qué hace exactamente: Si existe fecha inicial, agrega filtro a.fecha >= :inicio.
Con qué se conecta: Con asistencia.fecha.
Para qué sirve: Permite mostrar asistencias desde una fecha.
Qué pasaría si se quita: No habría filtro de fecha inicial.

Líneas 70 a 73: if ($fecha_fin !== '')
Qué hace exactamente: Si existe fecha final, agrega filtro a.fecha <= :fin.
Con qué se conecta: Con asistencia.fecha.
Para qué sirve: Permite mostrar asistencias hasta una fecha.
Qué pasaría si se quita: No habría filtro de fecha final.

Líneas 75 a 91: $sql = SELECT asistencia
Qué hace exactamente: Construye la consulta que trae fecha, trabajador, entrada, salida y horas trabajadas.
Con qué se conecta: Con asistencia a, trabajador tr y usuario u.
Para qué sirve: Generar la información visible del reporte de asistencia.
Qué pasaría si se quita: No habría consulta para obtener el reporte.

Líneas 79 a 86: CASE para calcular horas
Qué hace exactamente: Si hay hora de entrada y salida, calcula la diferencia en minutos y la convierte a horas.
Con qué se conecta: Con asistencia.hora_entrada y asistencia.hora_salida.
Para qué sirve: Mostrar las horas trabajadas.
Qué pasaría si se quita: El reporte no calcularía horas.

Línea 92: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta de asistencia.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar el SQL de forma segura.
Qué pasaría si se quita: No habría sentencia para ejecutar.

Línea 93: $stmt->execute($params);
Qué hace exactamente: Ejecuta la consulta usando filtros.
Con qué se conecta: Con $params.
Para qué sirve: Obtener los registros filtrados.
Qué pasaría si se quita: No se consultaría el reporte.

Línea 94: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todas las filas del reporte.
Con qué se conecta: Con ReporteController.php.
Para qué sirve: Entregar datos para JSON o CSV.
Qué pasaría si se quita: El método no devolvería resultados.

Línea 95: }
Qué hace exactamente: Cierra asistencia().
Con qué se conecta: Con línea 58.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 97 a 99: Comentario REPORTE: PRODUCCIÓN
Qué hace exactamente: Separa la sección del reporte de producción.
Con qué se conecta: Con produccion().
Para qué sirve: Orden visual.
Qué pasaría si se quita: No afecta.

Línea 101: public function produccion(int $id_trabajador, string $fecha_inicio, string $fecha_fin): array {
Qué hace exactamente: Declara método para consultar producción.
Con qué se conecta: Con ReporteController.php cuando tipo = produccion.
Para qué sirve: Generar reporte de producción por trabajador y fechas.
Qué pasaría si se quita: No habría reporte de producción.

Líneas 102 a 117: Filtros de producción
Qué hace exactamente: Arman condiciones por trabajador, fecha inicio y fecha fin.
Con qué se conecta: Con produccion.id_trabajador y produccion.fecha.
Para qué sirve: Limitar los datos del reporte.
Qué pasaría si se quitan: El reporte no tendría filtros.

Líneas 119 a 131: SELECT producción
Qué hace exactamente: Consulta fecha, trabajador, lote, cantidad y unidad.
Con qué se conecta: Con produccion p, trabajador tr, usuario u y lote l.
Para qué sirve: Mostrar producción registrada por trabajador y lote.
Qué pasaría si se quita: No habría datos de producción.

Líneas 133 a 135: prepare, execute, fetchAll
Qué hace exactamente: Prepara, ejecuta y devuelve el reporte de producción.
Con qué se conecta: Con PDO y ReporteController.php.
Para qué sirve: Entregar filas para mostrar o exportar.
Qué pasaría si se quitan: El reporte no se generaría.

Líneas 138 a 140: Comentario REPORTE: PAGOS
Qué hace exactamente: Separa la sección de pagos.
Con qué se conecta: Con pagos().
Para qué sirve: Orden visual.
Qué pasaría si se quita: No afecta.

Línea 142: public function pagos(int $id_trabajador, string $fecha_inicio, string $fecha_fin): array {
Qué hace exactamente: Declara método para reporte de pagos.
Con qué se conecta: Con ReporteController.php cuando tipo = pagos.
Para qué sirve: Consultar pagos realizados, filtrados por trabajador y fechas.
Qué pasaría si se quita: No habría reporte de pagos.

Líneas 143 a 156: Filtros de pagos
Qué hace exactamente: Agregan filtros por trabajador, fecha inicial y fecha final.
Con qué se conecta: Con trabajador.id_trabajador y pago.fecha_pago.
Para qué sirve: Limitar qué pagos se muestran.
Qué pasaría si se quitan: El reporte de pagos no podría filtrarse.

Líneas 158 a 169: SELECT pagos
Qué hace exactamente: Consulta fecha, trabajador, liquidación, monto, método y referencia.
Con qué se conecta: Con pago pg, liquidacion l, trabajador tr y usuario u.
Para qué sirve: Mostrar historial de pagos.
Qué pasaría si se quita: No habría datos para el reporte de pagos.

Línea 163: COALESCE(pg.referencia_pago, '—') AS referencia
Qué hace exactamente: Muestra un guion si la referencia está vacía o null.
Con qué se conecta: Con pago.referencia_pago.
Para qué sirve: Evita mostrar campos vacíos en el reporte.
Qué pasaría si se quita: Podrían aparecer valores null o vacíos.

Líneas 171 a 173: prepare, execute, fetchAll
Qué hace exactamente: Prepara, ejecuta y devuelve pagos.
Con qué se conecta: Con PDO y controlador.
Para qué sirve: Entregar datos del reporte.
Qué pasaría si se quitan: El reporte no se generaría.

Líneas 176 a 178: Comentario REPORTE: LIQUIDACIONES
Qué hace exactamente: Separa la sección de liquidaciones.
Con qué se conecta: Con liquidaciones().
Para qué sirve: Orden visual.
Qué pasaría si se quita: No afecta.

Línea 180: public function liquidaciones(int $id_trabajador, string $fecha_inicio, string $fecha_fin): array {
Qué hace exactamente: Declara método para reporte de liquidaciones.
Con qué se conecta: Con ReporteController.php cuando tipo = liquidaciones.
Para qué sirve: Consultar liquidaciones por trabajador y período.
Qué pasaría si se quita: No habría reporte de liquidaciones.

Líneas 181 a 195: Filtros de liquidaciones
Qué hace exactamente: Filtran por trabajador, período inicio y período fin.
Con qué se conecta: Con liquidacion.id_trabajador, periodo_inicio y periodo_fin.
Para qué sirve: Mostrar solo liquidaciones del rango seleccionado.
Qué pasaría si se quitan: No habría filtros.

Líneas 197 a 209: SELECT liquidaciones
Qué hace exactamente: Consulta trabajador, tipo de tarifa, período, jornadas, valor y estado.
Con qué se conecta: Con liquidacion l, trabajador tr, usuario u y tarifa t.
Para qué sirve: Generar el reporte de liquidaciones.
Qué pasaría si se quita: No habría datos de liquidaciones.

Líneas 211 a 213: prepare, execute, fetchAll
Qué hace exactamente: Prepara, ejecuta y devuelve el reporte.
Con qué se conecta: Con PDO y ReporteController.php.
Para qué sirve: Entregar datos al controlador.
Qué pasaría si se quitan: El reporte no se generaría.

Línea 214: }
Qué hace exactamente: Cierra la clase Reporte.
Con qué se conecta: Con línea 26.
Para qué sirve: Finalizar el modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 215: ?>
Qué hace exactamente: Cierra el bloque PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Marca fin del archivo.
Qué pasaría si se quita: En PHP puro normalmente puede funcionar, pero aquí se usa como cierre formal.

Conclusión:
Este modelo centraliza los reportes del sistema. Se conecta con asistencia, producción, pagos y liquidaciones, además de trabajador, usuario, lote y tarifa. Su función principal es devolver datos filtrados para que ReporteController.php los muestre en JSON o los exporte a CSV.