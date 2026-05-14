Línea 1: <?php
Qué hace: Abre PHP.
Con qué se conecta: Con servidor PHP.
Para qué sirve: Ejecutar clase del dashboard.
Si se quita: No se interpreta como PHP.

Líneas 2 a 25: Comentario de documentación
Qué hace: Explica uso, tablas consultadas y propósito.
Con qué se conecta: Con documentación del dashboard trabajador.
Para qué sirve: Entender qué datos devuelve.
Si se quita: Código funciona, pero pierde claridad.

Línea 26: class TrabajadorDashboardController {
Qué hace: Define la clase.
Con qué se conecta: Con views/trabajador/dashboard.php.
Para qué sirve: Agrupar lógica del dashboard.
Si se quita: No existiría el controlador.

Línea 28: private $db;
Qué hace: Declara propiedad de conexión.
Con qué se conecta: Con PDO.
Para qué sirve: Usar la base de datos en métodos.
Si se quita: No habría conexión interna.

Línea 29: private $id;
Qué hace: Guarda ID del trabajador.
Con qué se conecta: Con $_SESSION['id_usuario'].
Para qué sirve: Filtrar datos propios del trabajador.
Si se quita: No se sabría qué datos consultar.

Línea 31: public function __construct($db, $id_trabajador) {
Qué hace: Constructor de la clase.
Con qué se conecta: Con la vista que instancia el controlador.
Para qué sirve: Recibe conexión e ID.
Si se quita: No se inicializarían datos.

Línea 32: $this->db = $db;
Qué hace: Guarda la conexión.
Con qué se conecta: Con propiedad $db.
Para qué sirve: Consultar base de datos.
Si se quita: Los métodos no podrían consultar.

Línea 33: $this->id = (int) $id_trabajador;
Qué hace: Guarda ID como entero.
Con qué se conecta: Con propiedad $id.
Para qué sirve: Evitar usar ID inválido o texto.
Si se quita: No habría filtro seguro.

Línea 39: public function obtenerDatos() {
Qué hace: Método principal del dashboard.
Con qué se conecta: Con la vista dashboard.php.
Para qué sirve: Retorna todos los datos necesarios.
Si se quita: La vista no tendría datos.

Línea 40: return [
Qué hace: Inicia arreglo de respuesta.
Con qué se conecta: Con $datos en la vista.
Para qué sirve: Agrupa métricas.
Si se quita: No retorna estructura.

Línea 42: 'trabajador' => $this->obtenerTrabajador(),
Qué hace: Obtiene datos personales y asistencia de hoy.
Con qué se conecta: Con método obtenerTrabajador().
Para qué sirve: Mostrar nombre, estado, entrada y salida.
Si se quita: El dashboard no tendría información principal.

Línea 45: 'tareas_pendientes' => $this->contarTareas('PENDIENTE'),
Qué hace: Cuenta tareas pendientes.
Con qué se conecta: Con tabla tarea y tarea_trabajador.
Para qué sirve: Mostrar tarjeta de pendientes.
Si se quita: No se mostraría ese conteo.

Línea 48: 'tareas_en_proceso' => $this->contarTareas('EN_PROGRESO'),
Qué hace: Cuenta tareas en progreso.
Con qué se conecta: Con contarTareas().
Para qué sirve: Mostrar trabajo activo.
Si se quita: Falta métrica.

Línea 51: 'herramientas_prestadas' => $this->contarHerramientas(),
Qué hace: Cuenta herramientas activas prestadas.
Con qué se conecta: Con prestamo y detalle_prestamo.
Para qué sirve: Mostrar herramientas no devueltas.
Si se quita: No se vería esa tarjeta.

Línea 54: 'tareas_recientes' => $this->obtenerTareasRecientes(),
Qué hace: Obtiene últimas tareas.
Con qué se conecta: Con método obtenerTareasRecientes().
Para qué sirve: Mostrar lista de tareas.
Si se quita: No habría listado reciente.

Línea 57: 'notificaciones' => $this->obtenerNotificaciones(),
Qué hace: Obtiene notificaciones.
Con qué se conecta: Con notificacion_operativa.
Para qué sirve: Mostrar alertas del trabajador.
Si se quita: No se verían notificaciones.

Línea 58: ];
Qué hace: Cierra arreglo.
Con qué se conecta: Con return.
Para qué sirve: Finaliza datos.
Si se quita: Error de sintaxis.

Línea 67: private function obtenerTrabajador() {
Qué hace: Define método privado.
Con qué se conecta: Con obtenerDatos().
Para qué sirve: Consultar datos del trabajador.
Si se quita: Fallaría la clave trabajador.

Líneas 69 a 79: $sql = "SELECT..."
Qué hacen: Construyen consulta que une trabajador, usuario y asistencia.
Con qué se conectan: Con tablas trabajador, usuario y asistencia.
Para qué sirven: Obtener nombres, apellidos, estado, entrada y salida del día.
Si se quitan: No habría consulta.

Línea 80: $stmt = $this->db->prepare($sql);
Qué hace: Prepara SQL.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar consulta segura.
Si se quita: No se ejecutaría.

Línea 81: $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
Qué hace: Vincula ID.
Con qué se conecta: Con WHERE t.id_trabajador = :id.
Para qué sirve: Filtrar trabajador correcto.
Si se quita: Consulta no tendría ID.

Línea 82: $stmt->execute();
Qué hace: Ejecuta consulta.
Con qué se conecta: Con BD.
Para qué sirve: Obtener datos.
Si se quita: No habría resultado.

Línea 83: return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
Qué hace: Devuelve fila o arreglo vacío.
Con qué se conecta: Con la vista.
Para qué sirve: Evita errores si no encuentra datos.
Si se quita: No retorna trabajador.

Línea 84: catch (Exception $e) { return []; }
Qué hace: Si falla, retorna vacío.
Con qué se conecta: Con try.
Para qué sirve: No romper dashboard.
Si se quita: Error fatal posible.

Línea 91: private function contarTareas($estado) {
Qué hace: Define método para contar tareas por estado.
Con qué se conecta: Con obtenerDatos().
Para qué sirve: Reutilizar lógica.
Si se quita: No habría conteo.

Líneas 93 a 97:
Qué hacen: Consulta tareas asignadas al trabajador y estado.
Con qué se conectan: Con tarea_trabajador y tarea.
Para qué sirven: Contar PENDIENTE, EN_PROGRESO o COMPLETADA.
Si se quitan: No habría SQL.

Líneas 98 a 101:
Qué hacen: Preparan, vinculan ID y estado, ejecutan.
Con qué se conectan: Con PDO.
Para qué sirven: Consulta segura.
Si se quitan: No se ejecuta conteo.

Línea 102: return (int) $stmt->fetchColumn();
Qué hace: Devuelve número de tareas.
Con qué se conecta: Con tarjetas del dashboard.
Para qué sirve: Mostrar conteo.
Si se quita: No retorna valor.

Línea 103: catch (Exception $e) { return 0; }
Qué hace: Retorna 0 si hay error.
Con qué se conecta: Con try.
Para qué sirve: Evita romper dashboard.
Si se quita: Error fatal posible.

Línea 111: private function contarHerramientas() {
Qué hace: Define método para herramientas prestadas.
Con qué se conecta: Con obtenerDatos().
Para qué sirve: Calcular cantidad no devuelta.
Si se quita: No habría métrica.

Líneas 113 a 118:
Qué hacen: Suman cantidad pendiente de devolución.
Con qué se conectan: Con prestamo y detalle_prestamo.
Para qué sirven: Saber herramientas activas.
Si se quitan: No habría consulta.

Líneas 119 a 122:
Qué hacen: Preparan, vinculan ID y ejecutan.
Con qué se conectan: Con PDO.
Para qué sirven: Consulta segura.
Si se quitan: No hay resultado.

Línea 123: return (int) $stmt->fetchColumn();
Qué hace: Devuelve cantidad de herramientas.
Con qué se conecta: Con tarjeta del dashboard.
Para qué sirve: Mostrar herramientas prestadas.
Si se quita: No retorna valor.

Línea 132: private function obtenerTareasRecientes() {
Qué hace: Define método para últimas 5 tareas.
Con qué se conecta: Con obtenerDatos().
Para qué sirve: Mostrar lista de tareas recientes.
Si se quita: No habría lista.

Líneas 134 a 142:
Qué hacen: Consulta tareas, lote y fecha fin.
Con qué se conectan: Con tarea_trabajador, tarea y lote.
Para qué sirven: Mostrar tareas asignadas.
Si se quitan: No habría consulta.

Líneas 143 a 146:
Qué hacen: Preparan, vinculan ID, ejecutan y retornan.
Con qué se conectan: Con PDO y vista.
Para qué sirven: Obtener registros.
Si se quitan: No se mostrarían tareas.

Línea 155: private function obtenerNotificaciones() {
Qué hace: Define método para notificaciones.
Con qué se conecta: Con obtenerDatos().
Para qué sirve: Traer últimas 5 notificaciones.
Si se quita: No habría notificaciones.

Líneas 157 a 162:
Qué hacen: Consultan notificaciones del trabajador.
Con qué se conectan: Con notificacion_operativa.
Para qué sirven: Mostrar mensajes recientes.
Si se quitan: No habría SQL.

Líneas 163 a 166:
Qué hacen: Preparan, vinculan ID, ejecutan y retornan.
Con qué se conectan: Con PDO.
Para qué sirven: Obtener notificaciones.
Si se quitan: No se mostrarían.

Línea 169: }
Qué hace: Cierra la clase.
Con qué se conecta: Con class TrabajadorDashboardController.
Para qué sirve: Finaliza definición.
Si se quita: Error de sintaxis.

Línea 170: ?>
Qué hace: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin del archivo.
Si se quita: Puede funcionar, pero aquí cierra formalmente.

Conclusión:
Este controlador construye todos los datos del dashboard del trabajador. Se conecta con la base de datos, tareas, préstamos, asistencia, usuario y notificaciones, siempre filtrando por el ID del trabajador logueado.