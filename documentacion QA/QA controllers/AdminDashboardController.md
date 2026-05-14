Línea 1: <?php
Abre el bloque de código PHP. Sirve para indicar que desde aquí empieza código PHP.

Líneas 2 a 22: Comentario de documentación
Explica el propósito del archivo, cómo se usa y qué métodos contiene. No ejecuta nada.

Línea 23: class AdminDashboardController {
Crea una clase llamada AdminDashboardController. Sirve para agrupar toda la lógica del dashboard del administrador.

Línea 25: private $db;
Declara una propiedad privada llamada $db. Sirve para guardar la conexión a la base de datos.

Líneas 27 a 30: Comentario
Explica que el constructor recibe una conexión PDO.

Línea 31: public function __construct($db) {
Define el constructor de la clase. Se ejecuta automáticamente cuando se crea un objeto de esta clase.

Línea 32: $this->db = $db;
Guarda la conexión recibida en la propiedad $db de la clase. Sirve para poder usar la base de datos en los demás métodos.

Línea 33: }
Cierra el constructor.

Líneas 35 a 39: Comentario
Explica que el método devuelve todas las métricas del dashboard.

Línea 40: public function obtenerDatos() {
Crea un método público llamado obtenerDatos. Sirve para obtener toda la información que se mostrará en el dashboard.

Línea 41: return [
Empieza a retornar un arreglo asociativo. Ese arreglo contiene las estadísticas, alertas y notificaciones.

Línea 43: 'trabajadores_registrados' => $this->contarFilas("SELECT COUNT(*) FROM trabajador"),
Cuenta todos los trabajadores registrados en la tabla trabajador.

Línea 46: 'trabajadores_activos' => $this->contarFilas("SELECT COUNT(*) FROM trabajador WHERE estado_trabajador = 'ACTIVO'"),
Cuenta los trabajadores cuyo estado es ACTIVO.

Línea 49: 'solicitudes_pendientes' => $this->contarFilas("SELECT COUNT(*) FROM solicitud_registro WHERE estado = 'PENDIENTE'"),
Cuenta las solicitudes de registro que todavía están pendientes.

Línea 52: 'mayordomos_activos' => $this->contarFilas("SELECT COUNT(*) FROM usuario WHERE rol = 'MAYORDOMO' AND activo = 1"),
Cuenta los usuarios que son mayordomos y están activos.

Línea 55: 'lotes_registrados' => $this->contarFilas("SELECT COUNT(*) FROM lote"),
Cuenta todos los lotes registrados.

Línea 58: 'insumos_alerta' => $this->contarFilas("SELECT COUNT(*) FROM insumo WHERE stock_actual <= cantidad_minima"),
Cuenta los insumos que tienen stock bajo o crítico.

Línea 61: 'herramientas_mantenimiento' => $this->contarFilas("SELECT COUNT(*) FROM herramienta WHERE estado = 'MANTENIMIENTO'"),
Cuenta las herramientas que están en mantenimiento.

Línea 64: 'produccion_total' => $this->sumarCampo("SELECT COALESCE(SUM(cantidad), 0) FROM produccion"),
Suma toda la producción registrada. Si no hay datos, usa 0.

Línea 67: 'alertas' => $this->obtenerAlertas(),
Obtiene la lista de alertas activas del sistema.

Línea 70: 'notificaciones' => $this->obtenerNotificaciones(),
Obtiene las últimas notificaciones del administrador.

Línea 71: ];
Cierra el arreglo que se está retornando.

Línea 72: }
Cierra el método obtenerDatos.

Líneas 74 a 78: Comentario
Explica el método contarFilas.

Línea 79: private function contarFilas($sql) {
Crea un método privado llamado contarFilas. Sirve para ejecutar consultas COUNT(*).

Línea 80: try {
Inicia un bloque try. Sirve para intentar ejecutar código que podría generar error.

Línea 81: $stmt = $this->db->query($sql);
Ejecuta la consulta SQL recibida usando la conexión a la base de datos.

Línea 82: return (int) $stmt->fetchColumn();
Obtiene el primer valor de la consulta y lo convierte en entero.

Línea 83: } catch (Exception $e) {
Captura cualquier error que ocurra en el try.

Línea 84: return 0;
Si hay error, devuelve 0 para que el dashboard no se rompa.

Línea 85: }
Cierra el bloque catch.

Línea 86: }
Cierra el método contarFilas.

Líneas 88 a 92: Comentario
Explica el método sumarCampo.

Línea 93: private function sumarCampo($sql) {
Crea un método privado llamado sumarCampo. Sirve para ejecutar consultas SUM().

Línea 94: try {
Inicia un bloque try.

Línea 95: $stmt = $this->db->query($sql);
Ejecuta la consulta SQL recibida.

Línea 96: return number_format((float) $stmt->fetchColumn(), 0, '.', ',');
Obtiene el resultado, lo convierte a decimal y lo formatea con separador de miles.

Línea 97: } catch (Exception $e) {
Captura errores si la consulta falla.

Línea 98: return '0';
Si hay error, devuelve el texto '0'.

Línea 99: }
Cierra el catch.

Línea 100: }
Cierra el método sumarCampo.

Líneas 102 a 107: Comentario
Explica que se generan alertas activas.

Línea 108: private function obtenerAlertas() {
Crea el método privado obtenerAlertas.

Línea 109: $alertas = [];
Crea un arreglo vacío donde se guardarán las alertas.

Línea 110: try {
Inicia el bloque try.

Línea 112: $n = (int) $this->db->query("SELECT COUNT(*) FROM insumo WHERE stock_actual <= cantidad_minima")->fetchColumn();
Cuenta los insumos con stock crítico y guarda el resultado en $n.

Línea 113: if ($n > 0) {
Verifica si hay al menos un insumo en alerta.

Línea 114: $alertas[] = ['tipo' => 'error', 'mensaje' => "$n insumos en stock crítico", 'link' => '#inventarios'];
Agrega una alerta roja al arreglo de alertas.

Línea 115: }
Cierra el if.

Línea 118: $n = (int) $this->db->query("SELECT COUNT(*) FROM herramienta WHERE estado = 'MANTENIMIENTO'")->fetchColumn();
Cuenta las herramientas en mantenimiento.

Línea 119: if ($n > 0) {
Verifica si existen herramientas en mantenimiento.

Línea 120: $alertas[] = ['tipo' => 'warning', 'mensaje' => "$n herramientas en mantenimiento", 'link' => '#inventarios'];
Agrega una alerta amarilla.

Línea 121: }
Cierra el if.

Línea 124: $n = (int) $this->db->query("SELECT COUNT(*) FROM solicitud_registro WHERE estado = 'PENDIENTE'")->fetchColumn();
Cuenta las solicitudes pendientes.

Línea 125: if ($n > 0) {
Verifica si hay solicitudes pendientes.

Línea 126: $alertas[] = ['tipo' => 'info', 'mensaje' => "$n solicitudes de registro pendientes", 'link' => '#trabajadores'];
Agrega una alerta informativa.

Línea 127: }
Cierra el if.

Línea 128: } catch (Exception $e) {
Captura errores de base de datos.

Línea 130: }
Cierra el catch.

Línea 131: return $alertas;
Devuelve el arreglo con las alertas encontradas.

Línea 132: }
Cierra el método obtenerAlertas.

Líneas 134 a 139: Comentario
Explica que se obtienen las últimas 5 notificaciones del administrador.

Línea 140: private function obtenerNotificaciones() {
Crea el método privado obtenerNotificaciones.

Línea 141: try {
Inicia un bloque try.

Línea 142: $id = $_SESSION['id_usuario'];
Obtiene el ID del usuario que inició sesión.

Línea 143: $sql = "SELECT id_notificacion, tipo, mensaje, link, fecha_hora, leida
Empieza a construir la consulta SQL para traer notificaciones.

Línea 144: FROM notificacion_operativa
Indica que los datos vienen de la tabla notificacion_operativa.

Línea 145: WHERE id_usuario_destino = :id
Filtra las notificaciones para el usuario actual.

Línea 146: ORDER BY fecha_hora DESC
Ordena las notificaciones desde la más reciente hasta la más antigua.

Línea 147: LIMIT 5";
Limita el resultado a máximo 5 notificaciones.

Línea 148: $stmt = $this->db->prepare($sql);
Prepara la consulta SQL para ejecutarla de forma segura.

Línea 149: $stmt->bindParam(":id", $id, PDO::PARAM_INT);
Vincula el valor de $id al parámetro :id como entero.

Línea 150: $stmt->execute();
Ejecuta la consulta preparada.

Línea 151: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Devuelve todas las notificaciones como arreglo asociativo.

Línea 152: } catch (Exception $e) {
Captura errores si ocurre algún problema.

Línea 153: return [];
Si hay error, devuelve un arreglo vacío.

Línea 154: }
Cierra el catch.

Línea 155: }
Cierra el método obtenerNotificaciones.

Línea 156: }
Cierra la clase AdminDashboardController.

Línea 157: ?>
Cierra el bloque PHP.

Conclusión:
Este archivo funciona como controlador del dashboard del administrador. Su trabajo principal es consultar la base de datos, contar registros importantes, sumar la producción total, generar alertas y traer las últimas notificaciones del usuario administrador.