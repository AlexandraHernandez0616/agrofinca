Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete PHP del servidor.
Para qué sirve: Permite que el servidor ejecute la clase Pago.
Qué pasaría si se quita: El archivo podría no interpretarse correctamente como PHP.

Líneas 2 a 19: Comentario de documentación
Qué hace exactamente: Explica que este archivo es el modelo Pago.php y que maneja operaciones de base de datos para el módulo Pagos.
Con qué se conecta: Con las tablas pago, liquidacion, trabajador y usuario.
Para qué sirve: Sirve como guía para entender qué columnas usa la tabla pago y cuál es el propósito del modelo.
Qué pasaría si se quita: El código seguiría funcionando, pero sería más difícil entender qué hace este archivo.

Línea 20: class Pago {
Qué hace exactamente: Declara la clase Pago.
Con qué se conecta: Con PagoController.php, donde normalmente se crea el modelo usando new Pago($db).
Para qué sirve: Agrupa todos los métodos relacionados con pagos: listar, obtener, resumir, crear y eliminar.
Qué pasaría si se quita: No existiría la clase Pago y el controlador no podría usar este modelo.

Línea 22: private $conn;
Qué hace exactamente: Declara una propiedad privada llamada $conn.
Con qué se conecta: Con la conexión PDO que viene desde config/database.php.
Para qué sirve: Guarda la conexión a la base de datos dentro del modelo.
Qué pasaría si se quita: Los métodos no tendrían una conexión interna para ejecutar consultas SQL.

Línea 24: public function __construct($db) {
Qué hace exactamente: Declara el constructor de la clase.
Con qué se conecta: Con el momento en que PagoController.php crea el objeto Pago.
Para qué sirve: Recibe la conexión de base de datos enviada desde el controlador.
Qué pasaría si se quita: La clase no guardaría automáticamente la conexión.

Línea 25: $this->conn = $db;
Qué hace exactamente: Guarda la conexión recibida en la propiedad $conn.
Con qué se conecta: Con la variable $db que viene del controlador y con $this->conn que se usa en todos los métodos.
Para qué sirve: Permite que listar(), obtener(), resumen(), crear() y eliminar() puedan consultar la base de datos.
Qué pasaría si se quita: $this->conn quedaría sin valor y las consultas fallarían.

Línea 26: }
Qué hace exactamente: Cierra el constructor.
Con qué se conecta: Con la línea 24.
Para qué sirve: Indica que terminó la función __construct().
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 28 a 30: Comentario separador de LECTURA
Qué hace exactamente: Marca visualmente la sección donde están los métodos que consultan información.
Con qué se conecta: Con listar(), obtener(), resumen() y listarLiquidacionesPagables().
Para qué sirve: Organiza el archivo separando lectura de escritura.
Qué pasaría si se quita: El código funciona igual, pero pierde orden visual.

Líneas 32 a 35: Comentario del método listar()
Qué hace exactamente: Explica que listar() trae pagos con datos del trabajador y de la liquidación.
Con qué se conecta: Con el método listar() de la línea 36.
Para qué sirve: Documenta que acepta filtros por búsqueda y método de pago.
Qué pasaría si se quita: El método funciona, pero se entiende menos.

Línea 36: public function listar(string $busqueda = '', string $metodo = ''): array {
Qué hace exactamente: Declara el método público listar().
Con qué se conecta: Con PagoController.php o con la vista del módulo Pagos que necesita mostrar una tabla de pagos.
Para qué sirve: Devuelve una lista de pagos, opcionalmente filtrada por trabajador/documento o método de pago.
Qué pasaría si se quita: No se podrían listar pagos desde este modelo.

Línea 37: $where  = ['1=1'];
Qué hace exactamente: Crea un arreglo con una condición SQL que siempre es verdadera.
Con qué se conecta: Con el WHERE dinámico que se arma más adelante en la consulta.
Para qué sirve: Facilita agregar filtros usando AND sin preocuparse por si es el primer filtro.
Qué pasaría si se quita: Habría que construir el WHERE manualmente y podría ser más fácil cometer errores.

Línea 38: $params = [];
Qué hace exactamente: Crea un arreglo vacío para guardar parámetros de la consulta.
Con qué se conecta: Con $stmt->execute($params).
Para qué sirve: Permite enviar valores seguros a la consulta preparada.
Qué pasaría si se quita: No se podrían enviar correctamente valores como :b o :metodo.

Línea 40: if ($busqueda !== '') {
Qué hace exactamente: Verifica si el usuario escribió algo en el campo de búsqueda.
Con qué se conecta: Con el parámetro $busqueda recibido por listar().
Para qué sirve: Decide si se debe agregar un filtro por nombres, apellidos o documento del trabajador.
Qué pasaría si se quita: El listado no podría filtrar pagos por texto de búsqueda.

Línea 41: $where[] = "(u.nombres LIKE :b OR u.apellidos LIKE :b OR u.documento LIKE :b)";
Qué hace exactamente: Agrega una condición SQL para buscar coincidencias en nombres, apellidos o documento.
Con qué se conecta: Con la tabla usuario usando el alias u.
Para qué sirve: Permite encontrar pagos asociados a un trabajador específico.
Qué pasaría si se quita: La búsqueda no revisaría datos del trabajador.

Línea 42: $params[':b'] = '%' . $busqueda . '%';
Qué hace exactamente: Guarda el valor de búsqueda con signos % antes y después.
Con qué se conecta: Con el parámetro :b usado en la línea 41.
Para qué sirve: Permite buscar coincidencias parciales, por ejemplo escribir “Juan” y encontrar “Juan Carlos”.
Qué pasaría si se quita: La consulta tendría :b sin valor y fallaría cuando haya búsqueda.

Línea 43: }
Qué hace exactamente: Cierra el if de búsqueda.
Con qué se conecta: Con la línea 40.
Para qué sirve: Finaliza la condición que agrega filtro por texto.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 44: if ($metodo !== '') {
Qué hace exactamente: Verifica si se seleccionó un método de pago para filtrar.
Con qué se conecta: Con el parámetro $metodo recibido por listar().
Para qué sirve: Decide si se debe filtrar por Efectivo, Transferencia o Cheque.
Qué pasaría si se quita: No se podría filtrar por método de pago.

Línea 45: $where[] = "p.metodo_pago = :metodo";
Qué hace exactamente: Agrega una condición SQL para comparar el método de pago.
Con qué se conecta: Con la columna metodo_pago de la tabla pago usando el alias p.
Para qué sirve: Muestra solo pagos que coincidan con el método seleccionado.
Qué pasaría si se quita: El filtro por método no se aplicaría.

Línea 46: $params[':metodo'] = $metodo;
Qué hace exactamente: Guarda el método seleccionado dentro del arreglo de parámetros.
Con qué se conecta: Con el parámetro :metodo de la línea 45.
Para qué sirve: Envía el método de forma segura a la consulta.
Qué pasaría si se quita: La consulta fallaría si se usa el filtro por método.

Línea 47: }
Qué hace exactamente: Cierra el if del método de pago.
Con qué se conecta: Con la línea 44.
Para qué sirve: Finaliza la condición de filtro por método.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 49: $sql = "SELECT p.id_pago,
Qué hace exactamente: Empieza a construir la consulta SQL principal y selecciona el ID del pago.
Con qué se conecta: Con la tabla pago usando el alias p.
Para qué sirve: Identifica cada pago en la tabla de resultados.
Qué pasaría si se quita: No se empezaría correctamente la consulta de listado.

Línea 50: CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
Qué hace exactamente: Une nombres y apellidos del trabajador en un solo campo llamado trabajador.
Con qué se conecta: Con la tabla usuario usando el alias u.
Para qué sirve: Mostrar el nombre completo del trabajador en la vista.
Qué pasaría si se quita: El listado no mostraría el nombre completo del trabajador.

Línea 51: u.documento,
Qué hace exactamente: Selecciona el documento del trabajador.
Con qué se conecta: Con la columna documento de la tabla usuario.
Para qué sirve: Mostrar o identificar al trabajador por documento.
Qué pasaría si se quita: El listado no mostraría el documento.

Línea 52: p.id_liquidacion,
Qué hace exactamente: Selecciona el ID de la liquidación asociada al pago.
Con qué se conecta: Con pago.id_liquidacion y liquidacion.id_liquidacion.
Para qué sirve: Saber qué liquidación fue pagada.
Qué pasaría si se quita: No se tendría el ID de la liquidación relacionada.

Línea 53: CONCAT('LIQ-', LPAD(p.id_liquidacion, 3, '0')) AS liq_codigo,
Qué hace exactamente: Crea un código visual para la liquidación, por ejemplo LIQ-001.
Con qué se conecta: Con p.id_liquidacion.
Para qué sirve: Mostrar un código más amigable en la vista.
Qué pasaría si se quita: Solo se tendría el número de liquidación, no el código formateado.

Línea 54: l.valor_calculado,
Qué hace exactamente: Selecciona el valor calculado de la liquidación.
Con qué se conecta: Con la tabla liquidacion usando el alias l.
Para qué sirve: Permite comparar el valor liquidado con el monto pagado.
Qué pasaría si se quita: No se mostraría el valor original de la liquidación.

Línea 55: l.estado AS liq_estado,
Qué hace exactamente: Selecciona el estado de la liquidación y lo renombra como liq_estado.
Con qué se conecta: Con liquidacion.estado.
Para qué sirve: Mostrar si la liquidación está GENERADA, PENDIENTE, LIQUIDADA, etc.
Qué pasaría si se quita: No se sabría el estado de la liquidación asociada.

Línea 56: p.fecha_pago,
Qué hace exactamente: Selecciona la fecha en que se registró el pago.
Con qué se conecta: Con pago.fecha_pago.
Para qué sirve: Mostrar cuándo se realizó el pago.
Qué pasaría si se quita: No se vería la fecha del pago.

Línea 57: p.monto,
Qué hace exactamente: Selecciona el monto pagado.
Con qué se conecta: Con pago.monto.
Para qué sirve: Mostrar cuánto dinero se pagó.
Qué pasaría si se quita: No se vería el valor del pago.

Línea 58: p.metodo_pago,
Qué hace exactamente: Selecciona el método de pago.
Con qué se conecta: Con pago.metodo_pago.
Para qué sirve: Mostrar si fue Efectivo, Transferencia o Cheque.
Qué pasaría si se quita: No se sabría cómo se pagó.

Línea 59: p.referencia_pago,
Qué hace exactamente: Selecciona la referencia del pago.
Con qué se conecta: Con pago.referencia_pago.
Para qué sirve: Mostrar comprobante, número de transferencia o referencia si existe.
Qué pasaría si se quita: No se vería la referencia del pago.

Línea 60: p.observacion,
Qué hace exactamente: Selecciona la observación del pago.
Con qué se conecta: Con pago.observacion.
Para qué sirve: Mostrar notas adicionales registradas al pagar.
Qué pasaría si se quita: No se mostrarían observaciones.

Línea 61: CONCAT(ur.nombres, ' ', ur.apellidos) AS registrado_por
Qué hace exactamente: Une nombres y apellidos del usuario que registró el pago.
Con qué se conecta: Con la tabla usuario usando el alias ur.
Para qué sirve: Mostrar qué administrador o usuario registró el pago.
Qué pasaría si se quita: No se sabría quién registró el pago.

Línea 62: FROM pago p
Qué hace exactamente: Indica que la tabla principal de la consulta es pago.
Con qué se conecta: Con todas las columnas p.id_pago, p.monto, p.fecha_pago, etc.
Para qué sirve: Define desde dónde salen los pagos.
Qué pasaría si se quita: La consulta SQL sería inválida.

Línea 63: INNER JOIN liquidacion l ON l.id_liquidacion = p.id_liquidacion
Qué hace exactamente: Une cada pago con su liquidación.
Con qué se conecta: Con pago.id_liquidacion y liquidacion.id_liquidacion.
Para qué sirve: Permite mostrar valor_calculado y estado de la liquidación.
Qué pasaría si se quita: No se podrían obtener datos de la liquidación del pago.

Línea 64: INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
Qué hace exactamente: Une la liquidación con el trabajador correspondiente.
Con qué se conecta: Con liquidacion.id_trabajador y trabajador.id_trabajador.
Para qué sirve: Permite saber a qué trabajador pertenece la liquidación pagada.
Qué pasaría si se quita: No se podría conectar el pago con los datos personales del trabajador.

Línea 65: INNER JOIN usuario u ON u.id_usuario = tr.id_trabajador
Qué hace exactamente: Une el trabajador con su usuario.
Con qué se conecta: Con trabajador.id_trabajador y usuario.id_usuario.
Para qué sirve: Permite obtener nombres, apellidos y documento del trabajador.
Qué pasaría si se quita: No se podrían mostrar los datos personales del trabajador.

Línea 66: INNER JOIN usuario ur ON ur.id_usuario = p.id_usuario_registra
Qué hace exactamente: Une el pago con el usuario que lo registró.
Con qué se conecta: Con pago.id_usuario_registra y usuario.id_usuario.
Para qué sirve: Permite mostrar el campo registrado_por.
Qué pasaría si se quita: No se sabría quién registró el pago.

Línea 67: WHERE " . implode(' AND ', $where) . "
Qué hace exactamente: Inserta todas las condiciones guardadas en $where unidas por AND.
Con qué se conecta: Con los filtros de búsqueda y método.
Para qué sirve: Aplica los filtros dinámicos al listado.
Qué pasaría si se quita: La consulta no aplicaría filtros y además quedaría incompleta en esa parte.

Línea 68: ORDER BY p.id_pago DESC";
Qué hace exactamente: Ordena los pagos desde el más reciente hasta el más antiguo.
Con qué se conecta: Con pago.id_pago.
Para qué sirve: Muestra primero los últimos pagos registrados.
Qué pasaría si se quita: El orden de los pagos podría aparecer desorganizado.

Línea 70: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta SQL completa.
Con qué se conecta: Con la conexión PDO guardada en $this->conn.
Para qué sirve: Crea una sentencia segura para ejecutar el SELECT.
Qué pasaría si se quita: No habría objeto $stmt para ejecutar la consulta.

Línea 71: $stmt->execute($params);
Qué hace exactamente: Ejecuta la consulta usando los parámetros almacenados en $params.
Con qué se conecta: Con :b y :metodo si esos filtros existen.
Para qué sirve: Obtiene los pagos desde la base de datos.
Qué pasaría si se quita: La consulta no se ejecutaría.

Línea 72: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todos los pagos encontrados como arreglo asociativo.
Con qué se conecta: Con PagoController.php o la vista que mostrará la tabla.
Para qué sirve: Entrega los datos listos para recorrer y mostrar.
Qué pasaría si se quita: El método no devolvería pagos.

Línea 73: }
Qué hace exactamente: Cierra el método listar().
Con qué se conecta: Con la línea 36.
Para qué sirve: Finaliza la función de listado.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 75 a 77: Comentario del método obtener()
Qué hace exactamente: Explica que el método obtiene un pago por su ID.
Con qué se conecta: Con el método obtener() de la línea 78.
Para qué sirve: Documenta la función de consulta individual.
Qué pasaría si se quita: El código funciona igual, pero se entiende menos.

Línea 78: public function obtener(int $id): array|false {
Qué hace exactamente: Declara el método obtener() y recibe un ID de pago.
Con qué se conecta: Con PagoController.php cuando se necesita consultar el detalle de un pago.
Para qué sirve: Devuelve los datos completos de un pago específico.
Qué pasaría si se quita: No se podría consultar un pago individual desde este modelo.

Línea 79: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta SQL para obtener un pago específico.
Con qué se conecta: Con $this->conn y con el SELECT que empieza en la línea 80.
Para qué sirve: Crea una consulta segura con parámetro :id.
Qué pasaría si se quita: No se podría preparar la consulta individual.

Líneas 80 a 93: SELECT p.* con trabajador, liquidación y registrado_por
Qué hace exactamente: Consulta todos los campos del pago y además agrega nombre del trabajador, documento, código de liquidación, valor calculado, estado de liquidación y usuario que registró.
Con qué se conecta: Con las tablas pago, liquidacion, trabajador y usuario.
Para qué sirve: Permite mostrar un detalle completo del pago.
Qué pasaría si se quita: No se obtendría la información completa del pago.

Línea 94: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Asocia el parámetro :id con el ID recibido.
Con qué se conecta: Con WHERE p.id_pago = :id.
Para qué sirve: Busca exactamente el pago solicitado y evita inyección SQL.
Qué pasaría si se quita: La consulta fallaría porque :id no tendría valor.

Línea 95: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta del pago individual.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtiene el registro correspondiente.
Qué pasaría si se quita: No se consultaría el pago.

Línea 96: return $stmt->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve una sola fila como arreglo asociativo o false si no encuentra nada.
Con qué se conecta: Con el controlador o vista que pidió el detalle.
Para qué sirve: Entrega la información de un pago específico.
Qué pasaría si se quita: El método no devolvería datos.

Línea 97: }
Qué hace exactamente: Cierra el método obtener().
Con qué se conecta: Con la línea 78.
Para qué sirve: Finaliza la consulta individual.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 99 a 101: Comentario del método resumen()
Qué hace exactamente: Explica que el método genera un resumen para tarjetas superiores.
Con qué se conecta: Con el método resumen() de la línea 102.
Para qué sirve: Documenta que este método entrega estadísticas del módulo pagos.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 102: public function resumen(): array {
Qué hace exactamente: Declara el método resumen().
Con qué se conecta: Con la vista de pagos, especialmente con tarjetas como total de pagos, monto total y pagos por método.
Para qué sirve: Devuelve métricas generales del módulo.
Qué pasaría si se quita: No se podrían mostrar estadísticas de pagos.

Línea 103: $row = $this->conn->query(
Qué hace exactamente: Ejecuta directamente una consulta SQL y guarda una fila de resultado.
Con qué se conecta: Con la conexión PDO y la tabla pago.
Para qué sirve: Obtiene conteos y sumas generales.
Qué pasaría si se quita: No habría datos para el resumen.

Líneas 104 a 110: SELECT COUNT, SUM y métodos de pago
Qué hace exactamente: Cuenta todos los pagos, suma el monto total y cuenta cuántos pagos son en Efectivo, Transferencia o Cheque.
Con qué se conecta: Con la tabla pago y las columnas monto y metodo_pago.
Para qué sirve: Generar estadísticas rápidas para la interfaz.
Qué pasaría si se quita: No habría resumen numérico del módulo pagos.

Línea 111: )->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Ejecuta la consulta y obtiene una fila como arreglo asociativo.
Con qué se conecta: Con la variable $row.
Para qué sirve: Permite acceder a valores como $row['total'] y $row['monto_total'].
Qué pasaría si se quita: No se obtendrían los resultados del resumen.

Línea 113: return [
Qué hace exactamente: Inicia el arreglo que devolverá el método.
Con qué se conecta: Con la vista o controlador que usa resumen().
Para qué sirve: Organiza los valores del resumen.
Qué pasaría si se quita: El método no devolvería una estructura clara.

Línea 114: 'total' => (int) ($row['total'] ?? 0),
Qué hace exactamente: Devuelve el total de pagos convertido a entero.
Con qué se conecta: Con el alias total del SELECT.
Para qué sirve: Evita que el valor llegue como null o string.
Qué pasaría si se quita: La vista no tendría el total de pagos.

Línea 115: 'monto_total' => (float) ($row['monto_total'] ?? 0),
Qué hace exactamente: Devuelve la suma de todos los pagos como número decimal.
Con qué se conecta: Con el alias monto_total del SELECT.
Para qué sirve: Mostrar cuánto se ha pagado en total.
Qué pasaría si se quita: No se tendría el monto total pagado.

Línea 116: 'efectivo' => (int) ($row['efectivo'] ?? 0),
Qué hace exactamente: Devuelve la cantidad de pagos hechos en efectivo.
Con qué se conecta: Con el alias efectivo del SELECT.
Para qué sirve: Mostrar estadísticas por método de pago.
Qué pasaría si se quita: No se sabría cuántos pagos fueron en efectivo.

Línea 117: 'transferencia' => (int) ($row['transferencia'] ?? 0),
Qué hace exactamente: Devuelve la cantidad de pagos por transferencia.
Con qué se conecta: Con el alias transferencia del SELECT.
Para qué sirve: Mostrar cuántos pagos se hicieron por transferencia.
Qué pasaría si se quita: No se tendría esa métrica.

Línea 118: 'cheque' => (int) ($row['cheque'] ?? 0),
Qué hace exactamente: Devuelve la cantidad de pagos con cheque.
Con qué se conecta: Con el alias cheque del SELECT.
Para qué sirve: Mostrar cuántos pagos se hicieron con cheque.
Qué pasaría si se quita: No se tendría esa métrica.

Línea 119: ];
Qué hace exactamente: Cierra el arreglo de resumen.
Con qué se conecta: Con el return de la línea 113.
Para qué sirve: Finaliza la estructura de datos.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 120: }
Qué hace exactamente: Cierra el método resumen().
Con qué se conecta: Con la línea 102.
Para qué sirve: Finaliza el método de estadísticas.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 122 a 124: Comentario del método listarLiquidacionesPagables()
Qué hace exactamente: Explica que lista liquidaciones en estado GENERADA disponibles para pagar.
Con qué se conecta: Con el método listarLiquidacionesPagables() de la línea 125.
Para qué sirve: Documenta que este método se usa para llenar un select o formulario de pagos.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 125: public function listarLiquidacionesPagables(): array {
Qué hace exactamente: Declara el método que lista liquidaciones disponibles para pagar.
Con qué se conecta: Con el formulario de registro de pagos.
Para qué sirve: Permite seleccionar una liquidación que está lista para ser pagada.
Qué pasaría si se quita: El formulario de pagos no tendría liquidaciones disponibles para elegir.

Línea 126: $stmt = $this->conn->query(
Qué hace exactamente: Ejecuta una consulta directa.
Con qué se conecta: Con la conexión PDO.
Para qué sirve: Obtiene liquidaciones sin usar parámetros porque no hay filtros externos.
Qué pasaría si se quita: No se consultaría ninguna liquidación pagable.

Líneas 127 a 138: SELECT liquidaciones en estado GENERADA
Qué hace exactamente: Consulta liquidaciones generadas con código, trabajador, valor calculado y estado.
Con qué se conecta: Con las tablas liquidacion, trabajador y usuario.
Para qué sirve: Traer opciones válidas para registrar un pago.
Qué pasaría si se quita: No se podrían cargar liquidaciones listas para pagar.

Línea 139: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todas las liquidaciones pagables como arreglo asociativo.
Con qué se conecta: Con el controlador o vista del formulario.
Para qué sirve: Entrega las opciones para mostrar en pantalla.
Qué pasaría si se quita: El método no devolvería liquidaciones.

Línea 140: }
Qué hace exactamente: Cierra listarLiquidacionesPagables().
Con qué se conecta: Con la línea 125.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 142 a 144: Comentario separador de ESCRITURA
Qué hace exactamente: Marca visualmente la sección de métodos que modifican la base de datos.
Con qué se conecta: Con crear() y eliminar().
Para qué sirve: Organiza el archivo separando consultas de operaciones de escritura.
Qué pasaría si se quita: El código funciona igual, pero pierde orden visual.

Líneas 146 a 148: Comentario del método crear()
Qué hace exactamente: Explica que el método registra un nuevo pago.
Con qué se conecta: Con el método crear() de la línea 149.
Para qué sirve: Documenta la operación de inserción.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 149: public function crear(
Qué hace exactamente: Declara el método crear().
Con qué se conecta: Con PagoController.php cuando la acción es registrar.
Para qué sirve: Inserta un nuevo pago en la tabla pago.
Qué pasaría si se quita: No se podrían registrar pagos desde el sistema.

Línea 150: int $id_liquidacion,
Qué hace exactamente: Recibe el ID de la liquidación que se va a pagar.
Con qué se conecta: Con pago.id_liquidacion y liquidacion.id_liquidacion.
Para qué sirve: Relaciona el pago con una liquidación específica.
Qué pasaría si se quita: No se sabría qué liquidación está siendo pagada.

Línea 151: int $id_usuario_registra,
Qué hace exactamente: Recibe el ID del usuario que registra el pago.
Con qué se conecta: Con pago.id_usuario_registra y usuario.id_usuario.
Para qué sirve: Guarda quién realizó el registro del pago.
Qué pasaría si se quita: No quedaría trazabilidad de quién registró el pago.

Línea 152: string $fecha_pago,
Qué hace exactamente: Recibe la fecha del pago.
Con qué se conecta: Con pago.fecha_pago.
Para qué sirve: Guarda cuándo se hizo el pago.
Qué pasaría si se quita: No se podría registrar la fecha.

Línea 153: float $monto,
Qué hace exactamente: Recibe el monto pagado.
Con qué se conecta: Con pago.monto.
Para qué sirve: Guarda el valor económico del pago.
Qué pasaría si se quita: No se podría guardar cuánto se pagó.

Línea 154: string $metodo_pago,
Qué hace exactamente: Recibe el método de pago.
Con qué se conecta: Con pago.metodo_pago.
Para qué sirve: Guarda si el pago fue por Efectivo, Transferencia o Cheque.
Qué pasaría si se quita: No se sabría cómo se realizó el pago.

Línea 155: ?string $referencia,
Qué hace exactamente: Recibe una referencia opcional.
Con qué se conecta: Con pago.referencia_pago.
Para qué sirve: Guarda número de comprobante, transferencia o referencia si aplica.
Qué pasaría si se quita: No se podría guardar referencia del pago.

Línea 156: ?string $observacion
Qué hace exactamente: Recibe una observación opcional.
Con qué se conecta: Con pago.observacion.
Para qué sirve: Guarda notas adicionales sobre el pago.
Qué pasaría si se quita: No se podrían guardar observaciones.

Línea 157: ): bool {
Qué hace exactamente: Cierra la declaración del método e indica que devuelve true o false.
Con qué se conecta: Con return $stmt->execute().
Para qué sirve: Permite al controlador saber si el pago se guardó correctamente.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 158: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara la consulta INSERT.
Con qué se conecta: Con la conexión PDO.
Para qué sirve: Crea una sentencia segura para registrar el pago.
Qué pasaría si se quita: No se podría preparar la inserción.

Líneas 159 a 164: INSERT INTO pago
Qué hace exactamente: Define la inserción de id_liquidacion, id_usuario_registra, fecha_pago, monto, metodo_pago, referencia_pago y observacion.
Con qué se conecta: Con la tabla pago.
Para qué sirve: Guarda el nuevo pago en la base de datos.
Qué pasaría si se quita: No se insertaría el pago.

Línea 165: );
Qué hace exactamente: Cierra la preparación del INSERT.
Con qué se conecta: Con la línea 158.
Para qué sirve: Finaliza la consulta preparada.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 166: $stmt->bindParam(':liq', $id_liquidacion, PDO::PARAM_INT);
Qué hace exactamente: Vincula :liq con el ID de liquidación.
Con qué se conecta: Con la columna id_liquidacion.
Para qué sirve: Guarda a qué liquidación pertenece el pago.
Qué pasaría si se quita: El INSERT fallaría porque :liq no tendría valor.

Línea 167: $stmt->bindParam(':usuario', $id_usuario_registra, PDO::PARAM_INT);
Qué hace exactamente: Vincula :usuario con el usuario que registra.
Con qué se conecta: Con id_usuario_registra.
Para qué sirve: Guarda quién registró el pago.
Qué pasaría si se quita: El INSERT fallaría porque :usuario no tendría valor.

Línea 168: $stmt->bindParam(':fecha', $fecha_pago, PDO::PARAM_STR);
Qué hace exactamente: Vincula :fecha con la fecha de pago.
Con qué se conecta: Con fecha_pago.
Para qué sirve: Guarda la fecha del pago.
Qué pasaría si se quita: El INSERT fallaría porque :fecha no tendría valor.

Línea 169: $stmt->bindParam(':monto', $monto);
Qué hace exactamente: Vincula :monto con el monto del pago.
Con qué se conecta: Con monto.
Para qué sirve: Guarda el valor pagado.
Qué pasaría si se quita: El INSERT fallaría porque :monto no tendría valor.

Línea 170: $stmt->bindParam(':metodo', $metodo_pago, PDO::PARAM_STR);
Qué hace exactamente: Vincula :metodo con el método de pago.
Con qué se conecta: Con metodo_pago.
Para qué sirve: Guarda el tipo de pago usado.
Qué pasaría si se quita: El INSERT fallaría porque :metodo no tendría valor.

Línea 171: $stmt->bindParam(':ref', $referencia, PDO::PARAM_STR);
Qué hace exactamente: Vincula :ref con la referencia del pago.
Con qué se conecta: Con referencia_pago.
Para qué sirve: Guarda la referencia si existe; si es null, se guarda como valor nulo según la base de datos.
Qué pasaría si se quita: El INSERT fallaría porque :ref no tendría valor.

Línea 172: $stmt->bindParam(':obs', $observacion, PDO::PARAM_STR);
Qué hace exactamente: Vincula :obs con la observación.
Con qué se conecta: Con observacion.
Para qué sirve: Guarda notas opcionales del pago.
Qué pasaría si se quita: El INSERT fallaría porque :obs no tendría valor.

Línea 173: return $stmt->execute();
Qué hace exactamente: Ejecuta el INSERT y devuelve true o false.
Con qué se conecta: Con la base de datos y con PagoController.php.
Para qué sirve: Guarda el pago e informa si la operación fue exitosa.
Qué pasaría si se quita: No se insertaría el pago y el controlador no recibiría resultado.

Línea 174: }
Qué hace exactamente: Cierra el método crear().
Con qué se conecta: Con la línea 149.
Para qué sirve: Finaliza el método de registro de pago.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 176 a 178: Comentario del método eliminar()
Qué hace exactamente: Explica que el método elimina un pago por ID.
Con qué se conecta: Con el método eliminar() de la línea 179.
Para qué sirve: Documenta la operación de eliminación.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 179: public function eliminar(int $id): bool {
Qué hace exactamente: Declara el método eliminar().
Con qué se conecta: Con PagoController.php cuando la acción es eliminar.
Para qué sirve: Elimina un pago específico de la base de datos.
Qué pasaría si se quita: No se podrían eliminar pagos desde este modelo.

Línea 180: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta DELETE.
Con qué se conecta: Con la conexión PDO.
Para qué sirve: Crea una sentencia segura para eliminar un pago.
Qué pasaría si se quita: No se podría preparar la eliminación.

Línea 181: "DELETE FROM pago WHERE id_pago = :id"
Qué hace exactamente: Define la consulta para borrar un pago por su ID.
Con qué se conecta: Con la tabla pago y la columna id_pago.
Para qué sirve: Elimina únicamente el pago seleccionado.
Qué pasaría si se quita: No habría consulta de eliminación.

Línea 182: );
Qué hace exactamente: Cierra la llamada a prepare().
Con qué se conecta: Con la línea 180.
Para qué sirve: Finaliza la preparación del DELETE.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 183: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Vincula el parámetro :id con el ID del pago.
Con qué se conecta: Con WHERE id_pago = :id.
Para qué sirve: Indica qué pago exacto se va a eliminar.
Qué pasaría si se quita: La consulta fallaría porque :id no tendría valor.

Línea 184: return $stmt->execute();
Qué hace exactamente: Ejecuta la eliminación y devuelve true o false.
Con qué se conecta: Con la base de datos y con PagoController.php.
Para qué sirve: Borra el pago e informa si se ejecutó correctamente.
Qué pasaría si se quita: No se eliminaría el pago.

Línea 185: }
Qué hace exactamente: Cierra el método eliminar().
Con qué se conecta: Con la línea 179.
Para qué sirve: Finaliza la operación de eliminación.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 186: }
Qué hace exactamente: Cierra la clase Pago.
Con qué se conecta: Con la línea 20.
Para qué sirve: Finaliza todo el modelo.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 187: ?>
Qué hace exactamente: Cierra el bloque PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Marca el final del archivo.
Qué pasaría si se quita: En archivos PHP puros normalmente puede funcionar, pero aquí se usa como cierre formal.

Conclusión:
Este archivo es el modelo del módulo Pagos. Se conecta principalmente con las tablas pago, liquidacion, trabajador y usuario. Sirve para listar pagos con información completa del trabajador y la liquidación, consultar un pago específico, generar estadísticas, listar liquidaciones disponibles para pagar, registrar pagos nuevos y eliminar pagos existentes.