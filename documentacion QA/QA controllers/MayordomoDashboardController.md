Línea 1: <?php
Abre PHP.

Líneas 2 a 20: Comentario de documentación
Explica que obtiene métricas del dashboard del mayordomo.

Línea 21: class MayordomoDashboardController {
Crea la clase del dashboard.

Línea 23: private $db;
Guarda la conexión a la base de datos.

Línea 24: private $id;
Guarda el ID del mayordomo logueado.

Línea 26: public function __construct($db, $id_mayordomo) {
Constructor de la clase.

Línea 27: $this->db = $db;
Guarda la conexión.

Línea 28: $this->id = (int) $id_mayordomo;
Guarda el ID como entero.

Línea 32: public function obtenerDatos() {
Método que obtiene las métricas.

Línea 33: return [
Retorna un arreglo.

Línea 35: 'trabajadores_activos' => ...
Cuenta trabajadores activos.

Línea 36: 'trabajadores_en_labor' => ...
Cuenta trabajadores en labor.

Línea 37: 'asistencia_hoy' => $this->contarAsistenciaHoy(),
Cuenta asistencias del día.

Línea 40: 'solicitudes_pendientes' => ...
Cuenta solicitudes pendientes.

Línea 41: 'tareas_pendientes' => ...
Cuenta tareas pendientes del mayordomo.

Línea 42: 'tareas_en_progreso' => ...
Cuenta tareas en progreso.

Línea 45: 'prestamos_pendientes' => ...
Cuenta préstamos pendientes.

Línea 46: 'produccion_hoy' => ...
Suma producción del día.

Línea 49: 'notificaciones' => $this->obtenerNotificaciones(),
Obtiene últimas notificaciones.

Línea 50: ];
Cierra el arreglo.

Línea 54: private function contar($sql) {
Crea función genérica para COUNT.

Línea 56: return (int) $this->db->query($sql)->fetchColumn();
Ejecuta consulta y devuelve entero.

Línea 57: catch (Exception $e) { return 0; }
Si falla, retorna 0.

Línea 61: private function sumar($sql) {
Crea función para SUM.

Línea 63: return number_format(...)
Devuelve suma formateada.

Línea 64: catch (Exception $e) { return '0'; }
Si falla, retorna '0'.

Línea 70: private function contarAsistenciaHoy() {
Cuenta asistencias de hoy.

Línea 72: $sql = "SELECT COUNT(*) FROM asistencia WHERE fecha = CURDATE()";
Consulta asistencias del día.

Línea 73: return (int) ...
Devuelve el conteo.

Línea 82: private function obtenerNotificaciones() {
Obtiene notificaciones del mayordomo.

Líneas 84 a 88: $sql = "SELECT..."
Consulta las últimas 5 notificaciones.

Línea 89: $stmt = $this->db->prepare($sql);
Prepara la consulta.

Línea 90: $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
Vincula el ID del mayordomo.

Línea 91: $stmt->execute();
Ejecuta la consulta.

Línea 92: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Devuelve las notificaciones.

Línea 95: }
Cierra la clase.

Línea 96: ?>
Cierra PHP.

Conclusión:
Este controlador obtiene las métricas principales del dashboard del mayordomo: trabajadores, asistencia, tareas, préstamos, producción y notificaciones.