Línea 1: <?php
Qué hace exactamente: Abre el archivo como PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Permite ejecutar la clase TrabajadorMayordomo.
Qué pasaría si se quita: El archivo podría no interpretarse correctamente.

Líneas 2 a 17: Comentario de documentación
Qué hace exactamente: Explica que este modelo maneja trabajadores desde el panel del mayordomo e incluye asistencia del día.
Con qué se conecta: Con trabajador, usuario y asistencia.
Para qué sirve: Diferenciarlo del modelo Trabajador.php del administrador.
Qué pasaría si se quita: El código funciona, pero se perdería contexto.

Línea 18: class TrabajadorMayordomo {
Qué hace exactamente: Declara la clase TrabajadorMayordomo.
Con qué se conecta: Con views/mayordomo/trabajadores.php y AsistenciaController.php.
Para qué sirve: Agrupar operaciones de trabajadores vistas por mayordomo.
Qué pasaría si se quita: No se podría usar este modelo.

Línea 20: private $conn;
Qué hace exactamente: Declara conexión privada.
Con qué se conecta: Con PDO.
Para qué sirve: Guardar conexión a la base de datos.
Qué pasaría si se quita: Los métodos no podrían consultar datos.

Línea 22: public function __construct($db) {
Qué hace exactamente: Declara constructor.
Con qué se conecta: Con new TrabajadorMayordomo($db).
Para qué sirve: Recibir conexión.
Qué pasaría si se quita: No se inicializaría $conn.

Línea 23: $this->conn = $db;
Qué hace exactamente: Guarda la conexión.
Con qué se conecta: Con métodos del modelo.
Para qué sirve: Permitir consultas SQL.
Qué pasaría si se quita: Las consultas fallarían.

Línea 24: }
Qué hace exactamente: Cierra constructor.
Con qué se conecta: Con línea 22.
Para qué sirve: Finaliza inicialización.
Qué pasaría si se quita: Error de sintaxis.

Líneas 26 a 37: Comentario listarConAsistenciaHoy()
Qué hace exactamente: Explica que lista trabajadores activos con asistencia del día.
Con qué se conecta: Con asistencia.fecha = CURDATE().
Para qué sirve: Documentar estados: Completa, Incompleta y Sin marcar.
Qué pasaría si se quita: No afecta, pero se pierde explicación.

Línea 38: public function listarConAsistenciaHoy() {
Qué hace exactamente: Declara método para listar trabajadores con asistencia actual.
Con qué se conecta: Con la vista del mayordomo.
Para qué sirve: Mostrar hora de entrada, salida y estado de asistencia.
Qué pasaría si se quita: No se podría mostrar asistencia de hoy.

Líneas 39 a 57: SELECT trabajadores y asistencia
Qué hace exactamente: Consulta datos personales, laborales, horas de asistencia y calcula estado_asistencia.
Con qué se conecta: Con trabajador, usuario y asistencia.
Para qué sirve: Crear la tabla diaria de control de asistencia.
Qué pasaría si se quita: No habría datos para la vista.

Líneas 49 a 55: CASE estado_asistencia
Qué hace exactamente: Calcula Completa, Incompleta o Sin marcar según hora_entrada y hora_salida.
Con qué se conecta: Con asistencia.hora_entrada y asistencia.hora_salida.
Para qué sirve: Evitar que la vista tenga que calcular el estado.
Qué pasaría si se quita: La vista no tendría estado de asistencia listo.

Línea 58: FROM trabajador t
Qué hace exactamente: Define trabajador como tabla principal.
Con qué se conecta: Con tabla trabajador.
Para qué sirve: Listar empleados desde sus datos laborales.
Qué pasaría si se quita: SQL inválido.

Línea 59: INNER JOIN usuario u ON u.id_usuario = t.id_trabajador
Qué hace exactamente: Une trabajador con usuario.
Con qué se conecta: Con usuario.id_usuario y trabajador.id_trabajador.
Para qué sirve: Obtener nombres, apellidos y documento.
Qué pasaría si se quita: No se verían datos personales.

Líneas 60 a 62: LEFT JOIN asistencia a
Qué hace exactamente: Une asistencia del día actual.
Con qué se conecta: Con asistencia.id_trabajador y asistencia.fecha.
Para qué sirve: Mostrar asistencia aunque no exista registro.
Qué pasaría si se quita: No se sabría si marcó asistencia hoy.

Línea 63: WHERE t.estado_trabajador IN ('ACTIVO', 'En labor')
Qué hace exactamente: Filtra trabajadores activos o en labor.
Con qué se conecta: Con trabajador.estado_trabajador.
Para qué sirve: Evitar mostrar inactivos.
Qué pasaría si se quita: Aparecerían trabajadores que no deberían marcar asistencia.

Línea 64: ORDER BY u.nombres ASC";
Qué hace exactamente: Ordena alfabéticamente.
Con qué se conecta: Con usuario.nombres.
Para qué sirve: Facilitar lectura en la vista.
Qué pasaría si se quita: El listado podría salir desordenado.

Línea 66: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Crear sentencia ejecutable.
Qué pasaría si se quita: No habría consulta preparada.

Línea 67: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con base de datos.
Para qué sirve: Obtener trabajadores y asistencia.
Qué pasaría si se quita: No se consultaría nada.

Línea 68: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todos los resultados.
Con qué se conecta: Con la vista del mayordomo.
Para qué sirve: Mostrar tabla de trabajadores.
Qué pasaría si se quita: No habría datos de retorno.

Línea 69: }
Qué hace exactamente: Cierra listarConAsistenciaHoy().
Con qué se conecta: Con línea 38.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 71 a 80: Comentario marcarAsistencia()
Qué hace exactamente: Explica que registra o actualiza asistencia.
Con qué se conecta: Con AsistenciaController.php.
Para qué sirve: Documentar parámetros y retorno.
Qué pasaría si se quita: No afecta ejecución.

Línea 81: public function marcarAsistencia($id_trabajador, $hora_entrada, $hora_salida = null) {
Qué hace exactamente: Declara método para marcar asistencia.
Con qué se conecta: Con AsistenciaController.php.
Para qué sirve: Insertar entrada o actualizar salida del trabajador.
Qué pasaría si se quita: No se podría marcar asistencia desde el mayordomo.

Línea 82: try {
Qué hace exactamente: Inicia manejo de errores.
Con qué se conecta: Con catch.
Para qué sirve: Capturar errores SQL.
Qué pasaría si se quita: Un error podría romper el sistema.

Líneas 84 a 87: SELECT asistencia de hoy
Qué hace exactamente: Verifica si ya existe registro de asistencia hoy.
Con qué se conecta: Con asistencia.id_trabajador y fecha actual.
Para qué sirve: Decidir si actualizar o insertar.
Qué pasaría si se quita: No se sabría qué operación hacer.

Líneas 88 a 90: bind, execute y fetch
Qué hace exactamente: Busca la asistencia del trabajador.
Con qué se conecta: Con el SELECT anterior.
Para qué sirve: Guardar si existe registro.
Qué pasaría si se quitan: No se verificaría nada.

Línea 92: if ($existe) {
Qué hace exactamente: Si ya hay asistencia hoy, entra a actualizar salida.
Con qué se conecta: Con $existe.
Para qué sirve: Evitar duplicar registros.
Qué pasaría si se quita: Se podría insertar asistencia duplicada.

Líneas 94 a 99: UPDATE hora_salida
Qué hace exactamente: Actualiza hora_salida del trabajador en la fecha actual.
Con qué se conecta: Con tabla asistencia.
Para qué sirve: Completar la asistencia del día.
Qué pasaría si se quita: No se podría registrar salida.

Línea 100: } else {
Qué hace exactamente: Si no existe registro, entra a insertar asistencia.
Con qué se conecta: Con el if de línea 92.
Para qué sirve: Crear nueva entrada.
Qué pasaría si se quita: No habría alternativa para asistencia nueva.

Líneas 102 a 109: INSERT asistencia
Qué hace exactamente: Inserta id_trabajador, fecha actual, hora_entrada y hora_salida.
Con qué se conecta: Con tabla asistencia.
Para qué sirve: Crear registro diario de asistencia.
Qué pasaría si se quita: No se podría registrar entrada.

Línea 110: }
Qué hace exactamente: Cierra el else.
Con qué se conecta: Con línea 100.
Para qué sirve: Finaliza decisión insertar/actualizar.
Qué pasaría si se quita: Error de sintaxis.

Línea 112: $stmt->execute();
Qué hace exactamente: Ejecuta el INSERT o UPDATE preparado.
Con qué se conecta: Con $stmt.
Para qué sirve: Guardar realmente la asistencia.
Qué pasaría si se quita: No se haría ningún cambio.

Línea 113: return true;
Qué hace exactamente: Devuelve éxito.
Con qué se conecta: Con AsistenciaController.php.
Para qué sirve: Informar que se marcó asistencia.
Qué pasaría si se quita: El controlador no sabría si funcionó.

Líneas 114 a 116: catch
Qué hace exactamente: Captura errores y devuelve mensaje.
Con qué se conecta: Con excepciones de PDO.
Para qué sirve: Responder con error controlado.
Qué pasaría si se quita: Un error podría romper la respuesta.

Línea 117: }
Qué hace exactamente: Cierra marcarAsistencia().
Con qué se conecta: Con línea 81.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 118: }
Qué hace exactamente: Cierra la clase.
Con qué se conecta: Con línea 18.
Para qué sirve: Finaliza modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 119: ?>
Qué hace exactamente: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin formal.
Qué pasaría si se quita: Puede funcionar, pero aquí se usa cierre formal.

Conclusión:
Este modelo permite al mayordomo consultar trabajadores activos con su asistencia del día y marcar entrada o salida. Se conecta con trabajador, usuario y asistencia, y trabaja junto a AsistenciaController.php.