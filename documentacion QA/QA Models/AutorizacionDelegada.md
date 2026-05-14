Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Se conecta con el intérprete de PHP del servidor.
Para qué sirve: Sirve para que el servidor entienda que todo lo que viene después debe ejecutarse como PHP.
Qué pasaría si se quita: El servidor podría mostrar el contenido como texto o no ejecutar correctamente la clase.

Líneas 2 a 19: Comentario de documentación
Qué hace exactamente: Explica que este archivo es el modelo AutorizacionDelegada.php, usado para operaciones de base de datos del módulo Liquidaciones Temporales.
Con qué se conecta: Se conecta conceptualmente con la tabla autorizacion_delegada y con los controladores que usan este modelo, especialmente AutorizacionDelegadaController.php.
Para qué sirve: Sirve como documentación para entender qué tabla maneja, qué columnas tiene y qué estados puede usar.
Qué pasaría si se quita: El código seguiría funcionando, pero sería más difícil entender la estructura de la tabla y el propósito del modelo.

Línea 20: class AutorizacionDelegada {
Qué hace exactamente: Declara una clase llamada AutorizacionDelegada.
Con qué se conecta: Se conecta con controllers/AutorizacionDelegadaController.php, donde normalmente se crea un objeto así: new AutorizacionDelegada($db).
Para qué sirve: Sirve para agrupar todos los métodos relacionados con autorizaciones delegadas: listar, resumir, otorgar, revocar y consultar liquidaciones.
Qué pasaría si se quita: No existiría el modelo y el controlador no podría usar sus métodos.

Línea 22: private $conn;
Qué hace exactamente: Declara una propiedad privada llamada $conn.
Con qué se conecta: Se conecta con la conexión PDO recibida desde config/database.php.
Para qué sirve: Sirve para guardar dentro del modelo la conexión a la base de datos.
Qué pasaría si se quita: Los métodos no tendrían una conexión interna para ejecutar consultas SQL.

Línea 24: public function __construct($db) {
Qué hace exactamente: Declara el constructor de la clase.
Con qué se conecta: Se conecta con el momento en que el controlador crea el modelo y le pasa $db.
Para qué sirve: Sirve para recibir la conexión a la base de datos al crear el objeto.
Qué pasaría si se quita: No se guardaría automáticamente la conexión dentro del modelo.

Línea 25: $this->conn = $db;
Qué hace exactamente: Guarda la conexión recibida en la propiedad interna $conn.
Con qué se conecta: Con la variable $db que viene del controlador y con $this->conn que se usará en todas las consultas.
Para qué sirve: Permite que todos los métodos del modelo puedan usar la base de datos.
Qué pasaría si se quita: $this->conn quedaría vacío y las consultas fallarían.

Línea 26: }
Qué hace exactamente: Cierra el constructor.
Con qué se conecta: Con la línea 24.
Para qué sirve: Indica que terminó la función __construct.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 28 a 30: Comentario separador de LECTURA
Qué hace exactamente: Marca visualmente la sección de métodos que consultan información.
Con qué se conecta: Con los métodos listar(), resumen(), listarMayordomos() y liquidacionesDe().
Para qué sirve: Sirve para organizar el archivo.
Qué pasaría si se quita: El código funciona igual, pero se pierde orden visual.

Líneas 32 a 35: Comentario del método listar
Qué hace exactamente: Explica que listar() muestra autorizaciones con datos del mayordomo y administrador.
Con qué se conecta: Con la tabla autorizacion_delegada y la tabla usuario.
Para qué sirve: Documenta la función antes de declararla.
Qué pasaría si se quita: El método funciona igual, pero queda menos claro.

Línea 36: public function listar(string $busqueda = '', string $estado = ''): array {
Qué hace exactamente: Declara el método público listar(), que recibe dos filtros opcionales: búsqueda y estado.
Con qué se conecta: Se conecta con la vista o controlador que necesita mostrar autorizaciones en una tabla.
Para qué sirve: Sirve para obtener una lista de autorizaciones delegadas desde la base de datos.
Qué pasaría si se quita: No se podrían listar autorizaciones desde este modelo.

Línea 37: // Actualizar expiradas antes de listar
Qué hace exactamente: Comentario que indica que antes de listar se marcarán como expiradas las autorizaciones vencidas.
Con qué se conecta: Con la consulta UPDATE de las líneas siguientes.
Para qué sirve: Ayuda a entender por qué se ejecuta un UPDATE antes del SELECT.
Qué pasaría si se quita: El código funciona, pero se pierde explicación.

Línea 38: $this->conn->exec(
Qué hace exactamente: Ejecuta directamente una consulta SQL sin preparar parámetros.
Con qué se conecta: Con la conexión PDO guardada en $this->conn.
Para qué sirve: Sirve para actualizar estados vencidos antes de listar.
Qué pasaría si se quita: Las autorizaciones vencidas podrían seguir apareciendo como ACTIVA.

Línea 39: "UPDATE autorizacion_delegada
Qué hace exactamente: Inicia una consulta SQL UPDATE sobre la tabla autorizacion_delegada.
Con qué se conecta: Con la tabla autorizacion_delegada de la base de datos.
Para qué sirve: Sirve para modificar registros existentes de autorizaciones.
Qué pasaría si se quita: La consulta quedaría incompleta.

Línea 40: SET estado = 'EXPIRADA'
Qué hace exactamente: Cambia el campo estado a EXPIRADA.
Con qué se conecta: Con la columna estado de la tabla autorizacion_delegada.
Para qué sirve: Marca una autorización como vencida.
Qué pasaría si se quita: No se actualizaría el estado de las autorizaciones vencidas.

Línea 41: WHERE estado = 'ACTIVA' AND fecha_fin < CURDATE()"
Qué hace exactamente: Aplica el cambio solo a autorizaciones activas cuya fecha_fin ya pasó.
Con qué se conecta: Con las columnas estado y fecha_fin de autorizacion_delegada.
Para qué sirve: Evita cambiar autorizaciones revocadas o vigentes.
Qué pasaría si se quita: El UPDATE podría afectar demasiados registros o no tendría condición válida.

Línea 42: );
Qué hace exactamente: Cierra la ejecución de la consulta exec().
Con qué se conecta: Con la línea 38.
Para qué sirve: Finaliza la instrucción.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 44: $where = ['1=1'];
Qué hace exactamente: Crea un arreglo de condiciones SQL empezando con una condición siempre verdadera.
Con qué se conecta: Con el WHERE dinámico que se arma en la consulta SELECT.
Para qué sirve: Facilita agregar filtros con AND sin preocuparse por si es el primer filtro.
Qué pasaría si se quita: Habría que manejar manualmente el primer WHERE y los AND.

Línea 45: $params = [];
Qué hace exactamente: Crea un arreglo vacío para guardar los parámetros de la consulta preparada.
Con qué se conecta: Con $stmt->execute($params).
Para qué sirve: Permite enviar valores seguros a la consulta SQL.
Qué pasaría si se quita: No se podrían pasar correctamente los valores :b o :estado.

Línea 47: if ($busqueda !== '') {
Qué hace exactamente: Verifica si el usuario escribió algo en el campo de búsqueda.
Con qué se conecta: Con el parámetro $busqueda recibido por listar().
Para qué sirve: Decide si se agrega un filtro por nombre del mayordomo o administrador.
Qué pasaría si se quita: No se podría filtrar por texto de búsqueda.

Línea 48: $where[] = "(CONCAT(um.nombres,' ',um.apellidos) LIKE :b
Qué hace exactamente: Agrega una condición para buscar en el nombre completo del mayordomo.
Con qué se conecta: Con el alias um de la tabla usuario, que representa al mayordomo.
Para qué sirve: Permite encontrar autorizaciones por nombre o apellido del mayordomo.
Qué pasaría si se quita: La búsqueda no tendría en cuenta al mayordomo.

Línea 49: OR CONCAT(ua.nombres,' ',ua.apellidos) LIKE :b)";
Qué hace exactamente: Completa la condición anterior agregando búsqueda por administrador.
Con qué se conecta: Con el alias ua de la tabla usuario, que representa al administrador.
Para qué sirve: Permite buscar autorizaciones por nombre o apellido del administrador.
Qué pasaría si se quita: La búsqueda no tendría en cuenta al administrador.

Línea 50: $params[':b'] = '%' . $busqueda . '%';
Qué hace exactamente: Guarda el valor de búsqueda rodeado con %, para usarlo con LIKE.
Con qué se conecta: Con el parámetro :b de las líneas 48 y 49.
Para qué sirve: Permite buscar coincidencias parciales.
Qué pasaría si se quita: La consulta tendría :b sin valor y fallaría.

Línea 51: }
Qué hace exactamente: Cierra el if de búsqueda.
Con qué se conecta: Con la línea 47.
Para qué sirve: Termina la condición del filtro de búsqueda.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 52: if ($estado !== '') {
Qué hace exactamente: Verifica si se envió un filtro por estado.
Con qué se conecta: Con el parámetro $estado recibido por listar().
Para qué sirve: Permite filtrar autorizaciones por ACTIVA, REVOCADA o EXPIRADA.
Qué pasaría si se quita: No se podría filtrar por estado.

Línea 53: $where[] = "a.estado = :estado";
Qué hace exactamente: Agrega una condición SQL para comparar el estado.
Con qué se conecta: Con la columna estado de la tabla autorizacion_delegada, alias a.
Para qué sirve: Filtra registros según el estado seleccionado.
Qué pasaría si se quita: El filtro por estado no se aplicaría.

Línea 54: $params[':estado'] = $estado;
Qué hace exactamente: Guarda el valor del estado para enviarlo a la consulta preparada.
Con qué se conecta: Con el parámetro :estado de la línea 53.
Para qué sirve: Evita insertar directamente el valor en SQL y ayuda a prevenir inyección SQL.
Qué pasaría si se quita: La consulta tendría :estado sin valor y fallaría.

Línea 55: }
Qué hace exactamente: Cierra el if de estado.
Con qué se conecta: Con la línea 52.
Para qué sirve: Finaliza el filtro por estado.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 57: $sql = "SELECT a.id_autorizacion,
Qué hace exactamente: Empieza a construir la consulta SQL principal.
Con qué se conecta: Con la tabla autorizacion_delegada usando el alias a.
Para qué sirve: Selecciona el ID de cada autorización.
Qué pasaría si se quita: No se construiría la consulta de listado.

Línea 58: CONCAT(um.nombres, ' ', um.apellidos) AS mayordomo,
Qué hace exactamente: Une nombres y apellidos del mayordomo en un solo campo llamado mayordomo.
Con qué se conecta: Con la tabla usuario alias um.
Para qué sirve: Mostrar el nombre completo del mayordomo en la vista.
Qué pasaría si se quita: No aparecería el nombre del mayordomo en el listado.

Línea 59: CONCAT(ua.nombres, ' ', ua.apellidos) AS administrador,
Qué hace exactamente: Une nombres y apellidos del administrador en un campo llamado administrador.
Con qué se conecta: Con la tabla usuario alias ua.
Para qué sirve: Mostrar quién otorgó la autorización.
Qué pasaría si se quita: No se vería el administrador responsable.

Líneas 60 a 64: a.fecha_inicio, a.fecha_fin, a.acciones_permitidas, a.monto_maximo, a.estado,
Qué hace exactamente: Seleccionan los datos principales de la autorización.
Con qué se conecta: Con columnas de la tabla autorizacion_delegada.
Para qué sirve: Mostrar fechas, permisos, monto máximo y estado.
Qué pasaría si se quitan: La vista no tendría esos datos para mostrar.

Línea 65: (SELECT COUNT(*) FROM liquidacion l
Qué hace exactamente: Inicia una subconsulta para contar liquidaciones relacionadas.
Con qué se conecta: Con la tabla liquidacion.
Para qué sirve: Saber cuántas liquidaciones se hicieron bajo esa autorización.
Qué pasaría si se quita: No se mostraría el total de liquidaciones asociadas.

Línea 66: WHERE l.id_autorizacion = a.id_autorizacion) AS total_liquidaciones
Qué hace exactamente: Cuenta solo las liquidaciones cuyo id_autorizacion coincide con la autorización actual.
Con qué se conecta: Con liquidacion.id_autorizacion y autorizacion_delegada.id_autorizacion.
Para qué sirve: Relaciona cada autorización con sus liquidaciones.
Qué pasaría si se quita: La subconsulta no sabría qué contar.

Línea 67: FROM autorizacion_delegada a
Qué hace exactamente: Indica que la tabla principal será autorizacion_delegada con alias a.
Con qué se conecta: Con todos los campos a.algo usados en el SELECT.
Para qué sirve: Define el origen principal de los datos.
Qué pasaría si se quita: La consulta no sabría de qué tabla sacar las autorizaciones.

Línea 68: INNER JOIN usuario um ON um.id_usuario = a.id_mayordomo
Qué hace exactamente: Une la autorización con el usuario que es mayordomo.
Con qué se conecta: Con usuario.id_usuario y autorizacion_delegada.id_mayordomo.
Para qué sirve: Obtener nombres y apellidos del mayordomo.
Qué pasaría si se quita: No se podría mostrar el nombre del mayordomo.

Línea 69: INNER JOIN usuario ua ON ua.id_usuario = a.id_administrador
Qué hace exactamente: Une la autorización con el usuario administrador.
Con qué se conecta: Con usuario.id_usuario y autorizacion_delegada.id_administrador.
Para qué sirve: Obtener nombres y apellidos del administrador.
Qué pasaría si se quita: No se podría mostrar quién otorgó la autorización.

Línea 70: WHERE " . implode(' AND ', $where) . "
Qué hace exactamente: Inserta en la consulta todas las condiciones guardadas en $where unidas con AND.
Con qué se conecta: Con los filtros dinámicos de búsqueda y estado.
Para qué sirve: Hace que la consulta sea flexible según los filtros enviados.
Qué pasaría si se quita: No se aplicarían filtros y la consulta quedaría incompleta en esa parte.

Línea 71: ORDER BY a.id_autorizacion DESC";
Qué hace exactamente: Ordena las autorizaciones desde la más reciente hasta la más antigua.
Con qué se conecta: Con la columna id_autorizacion.
Para qué sirve: Mostrar primero las autorizaciones nuevas.
Qué pasaría si se quita: El orden podría ser impredecible.

Línea 73: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta SQL para ejecutarla de forma segura.
Con qué se conecta: Con la conexión PDO y la variable $sql.
Para qué sirve: Permite ejecutar la consulta usando parámetros.
Qué pasaría si se quita: No habría objeto $stmt para ejecutar ni obtener resultados.

Línea 74: $stmt->execute($params);
Qué hace exactamente: Ejecuta la consulta usando los parámetros guardados.
Con qué se conecta: Con $params, que puede tener :b y :estado.
Para qué sirve: Traer los datos filtrados desde la base de datos.
Qué pasaría si se quita: La consulta no se ejecutaría.

Línea 75: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todos los resultados como arreglo asociativo.
Con qué se conecta: Con el controlador o vista que llama listar().
Para qué sirve: Entrega datos listos para recorrer y mostrar.
Qué pasaría si se quita: El método no devolvería las autorizaciones.

Línea 76: }
Qué hace exactamente: Cierra el método listar().
Con qué se conecta: Con la línea 36.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 78 a 80: Comentario del método resumen
Qué hace exactamente: Explica que el método devuelve datos para tarjetas superiores.
Con qué se conecta: Con las métricas del módulo.
Para qué sirve: Documenta la utilidad de resumen().
Qué pasaría si se quita: El código funciona, pero pierde explicación.

Línea 81: public function resumen(): array {
Qué hace exactamente: Declara el método público resumen().
Con qué se conecta: Con la vista que muestra tarjetas de total, activas, expiradas y revocadas.
Para qué sirve: Obtener estadísticas rápidas.
Qué pasaría si se quita: No se podrían mostrar esas tarjetas desde este modelo.

Línea 82: // Actualizar expiradas
Qué hace exactamente: Comentario que avisa que se actualizarán autorizaciones vencidas.
Con qué se conecta: Con el UPDATE de las líneas 83 a 87.
Para qué sirve: Explicar la lógica previa al conteo.
Qué pasaría si se quita: El código funciona igual.

Línea 83: $this->conn->exec(
Qué hace exactamente: Ejecuta directamente una consulta SQL.
Con qué se conecta: Con PDO y la tabla autorizacion_delegada.
Para qué sirve: Actualizar permisos vencidos antes de contar.
Qué pasaría si se quita: El resumen podría contar como activas algunas autorizaciones ya vencidas.

Líneas 84 a 86: UPDATE autorizacion_delegada SET estado = 'EXPIRADA' WHERE estado = 'ACTIVA' AND fecha_fin < CURDATE()
Qué hace exactamente: Cambia a EXPIRADA las autorizaciones activas cuya fecha final ya pasó.
Con qué se conecta: Con columnas estado y fecha_fin.
Para qué sirve: Mantener los estados actualizados automáticamente.
Qué pasaría si se quita: El resumen podría mostrar datos incorrectos.

Línea 87: );
Qué hace exactamente: Cierra la ejecución del UPDATE.
Con qué se conecta: Con la línea 83.
Para qué sirve: Finaliza la instrucción.
Qué pasaría si se quita: Error de sintaxis.

Línea 89: $row = $this->conn->query(
Qué hace exactamente: Ejecuta una consulta directa y guarda una fila de resumen.
Con qué se conecta: Con la tabla autorizacion_delegada.
Para qué sirve: Obtener conteos generales.
Qué pasaría si se quita: No habría datos para retornar en el resumen.

Línea 90: "SELECT COUNT(*) AS total,
Qué hace exactamente: Cuenta todas las autorizaciones.
Con qué se conecta: Con la tabla autorizacion_delegada.
Para qué sirve: Obtener el total general.
Qué pasaría si se quita: No se tendría la métrica total.

Línea 91: SUM(estado = 'ACTIVA') AS activas,
Qué hace exactamente: Suma las filas cuyo estado es ACTIVA.
Con qué se conecta: Con la columna estado.
Para qué sirve: Contar autorizaciones activas.
Qué pasaría si se quita: No se tendría la métrica de activas.

Línea 92: SUM(estado = 'EXPIRADA') AS expiradas,
Qué hace exactamente: Cuenta autorizaciones expiradas.
Con qué se conecta: Con la columna estado.
Para qué sirve: Mostrar cuántas autorizaciones vencieron.
Qué pasaría si se quita: No se tendría la métrica de expiradas.

Línea 93: SUM(estado = 'REVOCADA') AS revocadas
Qué hace exactamente: Cuenta autorizaciones revocadas.
Con qué se conecta: Con la columna estado.
Para qué sirve: Mostrar cuántas fueron canceladas.
Qué pasaría si se quita: No se tendría la métrica de revocadas.

Línea 94: FROM autorizacion_delegada"
Qué hace exactamente: Indica que los conteos salen de autorizacion_delegada.
Con qué se conecta: Con la tabla principal del módulo.
Para qué sirve: Define el origen del resumen.
Qué pasaría si se quita: La consulta sería inválida.

Línea 95: )->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Ejecuta la consulta y obtiene una fila como arreglo asociativo.
Con qué se conecta: Con $row.
Para qué sirve: Permite acceder a $row['total'], $row['activas'], etc.
Qué pasaría si se quita: No se obtendrían los resultados.

Línea 97: return [
Qué hace exactamente: Inicia el arreglo que se devolverá al controlador o vista.
Con qué se conecta: Con el método resumen().
Para qué sirve: Entregar métricas listas para usar.
Qué pasaría si se quita: El método no devolvería estructura.

Líneas 98 a 101: total, activas, expiradas, revocadas
Qué hace exactamente: Convierte cada valor del resumen a entero y usa 0 si no existe.
Con qué se conecta: Con los datos obtenidos en $row.
Para qué sirve: Evita errores si la base de datos devuelve null.
Qué pasaría si se quitan: La vista no tendría esas métricas.

Línea 102: ];
Qué hace exactamente: Cierra el arreglo de retorno.
Con qué se conecta: Con la línea 97.
Para qué sirve: Finaliza la estructura de datos.
Qué pasaría si se quita: Error de sintaxis.

Línea 103: }
Qué hace exactamente: Cierra el método resumen().
Con qué se conecta: Con la línea 81.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 105 a 107: Comentario de listarMayordomos
Qué hace exactamente: Explica que el método obtiene mayordomos activos para un select.
Con qué se conecta: Con formularios donde el administrador elige un mayordomo.
Para qué sirve: Documenta el método.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 108: public function listarMayordomos(): array {
Qué hace exactamente: Declara el método listarMayordomos().
Con qué se conecta: Con formularios de autorizaciones delegadas.
Para qué sirve: Obtener mayordomos activos para mostrarlos en un selector.
Qué pasaría si se quita: No se podrían cargar mayordomos desde este modelo.

Línea 109: $stmt = $this->conn->query(
Qué hace exactamente: Ejecuta una consulta SQL directa.
Con qué se conecta: Con la conexión PDO y la tabla usuario.
Para qué sirve: Obtener una lista simple de mayordomos.
Qué pasaría si se quita: No habría consulta para traer mayordomos.

Línea 110: "SELECT id_usuario,
Qué hace exactamente: Selecciona el ID del usuario.
Con qué se conecta: Con usuario.id_usuario.
Para qué sirve: Ese ID será el valor del select.
Qué pasaría si se quita: No se sabría qué mayordomo se seleccionó.

Línea 111: CONCAT(nombres, ' ', apellidos) AS nombre_completo
Qué hace exactamente: Une nombres y apellidos en un campo nombre_completo.
Con qué se conecta: Con columnas nombres y apellidos de usuario.
Para qué sirve: Mostrar un nombre legible en el select.
Qué pasaría si se quita: Solo habría ID, no nombre visible.

Línea 112: FROM usuario
Qué hace exactamente: Define que los datos vienen de la tabla usuario.
Con qué se conecta: Con la tabla donde están administradores, mayordomos y trabajadores.
Para qué sirve: Buscar usuarios con rol MAYORDOMO.
Qué pasaría si se quita: SQL inválido.

Línea 113: WHERE rol = 'MAYORDOMO' AND activo = 1
Qué hace exactamente: Filtra solo usuarios con rol MAYORDOMO y activos.
Con qué se conecta: Con columnas rol y activo.
Para qué sirve: Evita seleccionar usuarios inactivos o de otro rol.
Qué pasaría si se quita: Podrían aparecer administradores, trabajadores o mayordomos inactivos.

Línea 114: ORDER BY nombres, apellidos"
Qué hace exactamente: Ordena alfabéticamente.
Con qué se conecta: Con columnas nombres y apellidos.
Para qué sirve: Mostrar el select organizado.
Qué pasaría si se quita: Los resultados podrían aparecer desordenados.

Línea 115: );
Qué hace exactamente: Cierra la llamada a query().
Con qué se conecta: Con la línea 109.
Para qué sirve: Finaliza la consulta.
Qué pasaría si se quita: Error de sintaxis.

Línea 116: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todos los mayordomos como arreglo asociativo.
Con qué se conecta: Con la vista o controlador que llenará el select.
Para qué sirve: Entregar id_usuario y nombre_completo.
Qué pasaría si se quita: El método no devolvería mayordomos.

Línea 117: }
Qué hace exactamente: Cierra listarMayordomos().
Con qué se conecta: Con línea 108.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 119 a 121: Comentario de liquidacionesDe
Qué hace exactamente: Explica que el método obtiene liquidaciones asociadas a una autorización.
Con qué se conecta: Con la tabla liquidacion.
Para qué sirve: Documentar el método.
Qué pasaría si se quita: El código funciona, pero queda menos claro.

Línea 122: public function liquidacionesDe(int $id_autorizacion): array {
Qué hace exactamente: Declara un método que recibe el ID de una autorización.
Con qué se conecta: Con AutorizacionDelegadaController.php cuando se consulta ?accion=liquidaciones&id=X.
Para qué sirve: Obtener las liquidaciones generadas bajo una autorización delegada.
Qué pasaría si se quita: No se podría consultar el detalle de liquidaciones por autorización.

Línea 123: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta SQL con parámetro.
Con qué se conecta: Con PDO y con :id.
Para qué sirve: Consultar liquidaciones de forma segura.
Qué pasaría si se quita: No habría consulta preparada.

Línea 124: "SELECT l.id_liquidacion,
Qué hace exactamente: Selecciona el ID de cada liquidación.
Con qué se conecta: Con liquidacion.id_liquidacion.
Para qué sirve: Identificar cada liquidación.
Qué pasaría si se quita: No se tendría el ID del registro.

Línea 125: CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
Qué hace exactamente: Une nombres y apellidos del trabajador.
Con qué se conecta: Con tabla usuario alias u.
Para qué sirve: Mostrar el trabajador asociado a la liquidación.
Qué pasaría si se quita: No se vería el nombre del trabajador.

Líneas 126 a 129: l.periodo_inicio, l.periodo_fin, l.valor_calculado, l.estado
Qué hace exactamente: Selecciona fechas del período, valor y estado de la liquidación.
Con qué se conecta: Con columnas de liquidacion.
Para qué sirve: Mostrar el detalle básico de cada liquidación.
Qué pasaría si se quitan: El detalle quedaría incompleto.

Línea 130: FROM liquidacion l
Qué hace exactamente: Define la tabla principal de la consulta.
Con qué se conecta: Con la tabla liquidacion.
Para qué sirve: Buscar liquidaciones.
Qué pasaría si se quita: SQL inválido.

Línea 131: INNER JOIN trabajador tr ON tr.id_trabajador = l.id_trabajador
Qué hace exactamente: Une liquidación con trabajador.
Con qué se conecta: Con liquidacion.id_trabajador y trabajador.id_trabajador.
Para qué sirve: Confirmar el trabajador asociado.
Qué pasaría si se quita: No se podría conectar correctamente con usuario.

Línea 132: INNER JOIN usuario u ON u.id_usuario = tr.id_trabajador
Qué hace exactamente: Une trabajador con usuario para obtener nombres y apellidos.
Con qué se conecta: Con trabajador.id_trabajador y usuario.id_usuario.
Para qué sirve: Mostrar nombre completo.
Qué pasaría si se quita: No se podría usar u.nombres ni u.apellidos.

Línea 133: WHERE l.id_autorizacion = :id
Qué hace exactamente: Filtra liquidaciones por autorización.
Con qué se conecta: Con liquidacion.id_autorizacion y el parámetro :id.
Para qué sirve: Traer solo liquidaciones de una autorización específica.
Qué pasaría si se quita: Traería liquidaciones de todas las autorizaciones.

Línea 134: ORDER BY l.fecha_generacion DESC"
Qué hace exactamente: Ordena liquidaciones de más reciente a más antigua.
Con qué se conecta: Con liquidacion.fecha_generacion.
Para qué sirve: Mostrar primero las últimas generadas.
Qué pasaría si se quita: El orden podría ser confuso.

Línea 135: );
Qué hace exactamente: Cierra la consulta preparada.
Con qué se conecta: Con línea 123.
Para qué sirve: Finaliza el SQL.
Qué pasaría si se quita: Error de sintaxis.

Línea 136: $stmt->bindParam(':id', $id_autorizacion, PDO::PARAM_INT);
Qué hace exactamente: Asocia el parámetro :id con el valor $id_autorizacion.
Con qué se conecta: Con el WHERE de la línea 133.
Para qué sirve: Evita inyección SQL y asegura que sea entero.
Qué pasaría si se quita: La consulta no tendría valor para :id.

Línea 137: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtener las liquidaciones relacionadas.
Qué pasaría si se quita: No se ejecutaría la consulta.

Línea 138: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todas las liquidaciones encontradas.
Con qué se conecta: Con el controlador que enviará JSON.
Para qué sirve: Entregar los datos al frontend.
Qué pasaría si se quita: No se devolvería el detalle.

Línea 139: }
Qué hace exactamente: Cierra liquidacionesDe().
Con qué se conecta: Con línea 122.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 141 a 143: Comentario separador de ESCRITURA
Qué hace exactamente: Marca la sección donde están métodos que modifican datos.
Con qué se conecta: Con otorgar() y revocar().
Para qué sirve: Organiza el modelo.
Qué pasaría si se quita: El código funciona, pero pierde orden.

Líneas 145 a 147: Comentario de otorgar
Qué hace exactamente: Explica que el método crea una autorización delegada.
Con qué se conecta: Con la tabla autorizacion_delegada.
Para qué sirve: Documenta el método.
Qué pasaría si se quita: El código funciona igual.

Línea 148: public function otorgar(
Qué hace exactamente: Inicia la declaración del método otorgar().
Con qué se conecta: Con AutorizacionDelegadaController.php, específicamente cuando accion = otorgar.
Para qué sirve: Crear un permiso temporal para que un mayordomo pueda hacer liquidaciones.
Qué pasaría si se quita: No se podrían otorgar autorizaciones desde este modelo.

Línea 149: int $id_administrador,
Qué hace exactamente: Recibe el ID del administrador que otorga el permiso.
Con qué se conecta: Con usuario.id_usuario de rol ADMINISTRADOR.
Para qué sirve: Guardar quién autorizó.
Qué pasaría si se quita: La autorización no tendría administrador responsable.

Línea 150: int $id_mayordomo,
Qué hace exactamente: Recibe el ID del mayordomo autorizado.
Con qué se conecta: Con usuario.id_usuario de rol MAYORDOMO.
Para qué sirve: Saber quién recibe el permiso.
Qué pasaría si se quita: No se sabría a quién otorgar autorización.

Línea 151: string $fecha_inicio,
Qué hace exactamente: Recibe la fecha desde la cual será válida.
Con qué se conecta: Con autorizacion_delegada.fecha_inicio.
Para qué sirve: Definir inicio del permiso.
Qué pasaría si se quita: No habría fecha inicial.

Línea 152: string $fecha_fin,
Qué hace exactamente: Recibe la fecha hasta la cual será válida.
Con qué se conecta: Con autorizacion_delegada.fecha_fin.
Para qué sirve: Definir vencimiento del permiso.
Qué pasaría si se quita: No habría fecha final.

Línea 153: string $acciones_permitidas,
Qué hace exactamente: Recibe descripción de acciones permitidas.
Con qué se conecta: Con autorizacion_delegada.acciones_permitidas.
Para qué sirve: Guardar qué puede hacer el mayordomo.
Qué pasaría si se quita: No se sabría el alcance del permiso.

Línea 154: ?float $monto_maximo
Qué hace exactamente: Recibe un monto máximo opcional.
Con qué se conecta: Con autorizacion_delegada.monto_maximo.
Para qué sirve: Limitar el valor máximo de liquidaciones temporales.
Qué pasaría si se quita: No habría control de monto máximo.

Línea 155: ): bool {
Qué hace exactamente: Indica que el método devuelve true o false.
Con qué se conecta: Con el controlador que evalúa $ok.
Para qué sirve: Saber si se insertó correctamente.
Qué pasaría si se quita: La firma del método quedaría incompleta.

Línea 156: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta INSERT.
Con qué se conecta: Con la conexión PDO.
Para qué sirve: Insertar la autorización de forma segura.
Qué pasaría si se quita: No habría consulta para insertar.

Líneas 157 a 161: INSERT INTO autorizacion_delegada (...)
Qué hace exactamente: Inserta una nueva autorización con administrador, mayordomo, fechas, acciones, monto y estado ACTIVA.
Con qué se conecta: Con la tabla autorizacion_delegada.
Para qué sirve: Crear el permiso temporal en la base de datos.
Qué pasaría si se quitan: No se registraría la autorización.

Línea 162: );
Qué hace exactamente: Cierra la preparación del INSERT.
Con qué se conecta: Con línea 156.
Para qué sirve: Finaliza la consulta SQL.
Qué pasaría si se quita: Error de sintaxis.

Línea 163: $stmt->bindParam(':admin', $id_administrador, PDO::PARAM_INT);
Qué hace exactamente: Une el parámetro :admin con el ID del administrador.
Con qué se conecta: Con id_administrador del INSERT.
Para qué sirve: Guardar el administrador correcto.
Qué pasaría si se quita: El INSERT no tendría valor para :admin.

Línea 164: $stmt->bindParam(':mayordomo',$id_mayordomo, PDO::PARAM_INT);
Qué hace exactamente: Une :mayordomo con el ID del mayordomo.
Con qué se conecta: Con id_mayordomo.
Para qué sirve: Guardar el usuario autorizado.
Qué pasaría si se quita: El INSERT no tendría mayordomo.

Línea 165: $stmt->bindParam(':inicio', $fecha_inicio, PDO::PARAM_STR);
Qué hace exactamente: Une :inicio con la fecha de inicio.
Con qué se conecta: Con fecha_inicio.
Para qué sirve: Guardar desde cuándo aplica el permiso.
Qué pasaría si se quita: Faltaría la fecha inicial.

Línea 166: $stmt->bindParam(':fin', $fecha_fin, PDO::PARAM_STR);
Qué hace exactamente: Une :fin con la fecha final.
Con qué se conecta: Con fecha_fin.
Para qué sirve: Guardar hasta cuándo aplica.
Qué pasaría si se quita: Faltaría la fecha final.

Línea 167: $stmt->bindParam(':acciones', $acciones_permitidas, PDO::PARAM_STR);
Qué hace exactamente: Une :acciones con las acciones permitidas.
Con qué se conecta: Con acciones_permitidas.
Para qué sirve: Guardar el detalle del permiso.
Qué pasaría si se quita: Faltaría el alcance del permiso.

Línea 168: $stmt->bindParam(':monto', $monto_maximo);
Qué hace exactamente: Une :monto con el monto máximo.
Con qué se conecta: Con monto_maximo.
Para qué sirve: Guardar el límite económico, o null si no hay límite.
Qué pasaría si se quita: El INSERT no tendría valor para :monto.

Línea 169: return $stmt->execute();
Qué hace exactamente: Ejecuta el INSERT y devuelve true o false.
Con qué se conecta: Con el controlador que espera saber si la operación fue exitosa.
Para qué sirve: Crear la autorización y reportar el resultado.
Qué pasaría si se quita: No se insertaría la autorización ni habría respuesta.

Línea 170: }
Qué hace exactamente: Cierra otorgar().
Con qué se conecta: Con línea 148.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 172 a 174: Comentario de revocar
Qué hace exactamente: Explica que el método revoca una autorización activa.
Con qué se conecta: Con autorizacion_delegada.estado.
Para qué sirve: Documentar la función.
Qué pasaría si se quita: El código funciona, pero es menos claro.

Línea 175: public function revocar(int $id): bool {
Qué hace exactamente: Declara el método revocar(), que recibe el ID de la autorización.
Con qué se conecta: Con AutorizacionDelegadaController.php cuando accion = revocar.
Para qué sirve: Cambiar una autorización ACTIVA a REVOCADA.
Qué pasaría si se quita: No se podrían revocar permisos.

Línea 176: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta UPDATE.
Con qué se conecta: Con PDO y la tabla autorizacion_delegada.
Para qué sirve: Actualizar el estado de forma segura.
Qué pasaría si se quita: No habría consulta para revocar.

Línea 177: "UPDATE autorizacion_delegada
Qué hace exactamente: Inicia una actualización sobre la tabla de autorizaciones.
Con qué se conecta: Con autorizacion_delegada.
Para qué sirve: Modificar un permiso existente.
Qué pasaría si se quita: La consulta quedaría incompleta.

Línea 178: SET estado = 'REVOCADA'
Qué hace exactamente: Cambia el estado a REVOCADA.
Con qué se conecta: Con la columna estado.
Para qué sirve: Indicar que el permiso ya no es válido.
Qué pasaría si se quita: No se revocaría realmente.

Línea 179: WHERE id_autorizacion = :id AND estado = 'ACTIVA'"
Qué hace exactamente: Solo modifica la autorización indicada si todavía está ACTIVA.
Con qué se conecta: Con id_autorizacion y estado.
Para qué sirve: Evita revocar permisos ya revocados o expirados.
Qué pasaría si se quita: Podría modificar registros incorrectos.

Línea 180: );
Qué hace exactamente: Cierra la consulta preparada.
Con qué se conecta: Con línea 176.
Para qué sirve: Finaliza el SQL.
Qué pasaría si se quita: Error de sintaxis.

Línea 181: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Une el parámetro :id con el ID recibido.
Con qué se conecta: Con el WHERE de la línea 179.
Para qué sirve: Indicar qué autorización se va a revocar.
Qué pasaría si se quita: La consulta no tendría valor para :id.

Línea 182: $stmt->execute();
Qué hace exactamente: Ejecuta el UPDATE.
Con qué se conecta: Con la base de datos.
Para qué sirve: Aplicar la revocación.
Qué pasaría si se quita: No se cambiaría el estado.

Línea 183: return $stmt->rowCount() > 0;
Qué hace exactamente: Devuelve true si alguna fila fue modificada.
Con qué se conecta: Con el controlador que evalúa si la revocación funcionó.
Para qué sirve: Saber si realmente había una autorización activa para revocar.
Qué pasaría si se quita: El controlador no sabría si se revocó o no.

Línea 184: }
Qué hace exactamente: Cierra revocar().
Con qué se conecta: Con línea 175.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Línea 185: }
Qué hace exactamente: Cierra la clase AutorizacionDelegada.
Con qué se conecta: Con línea 20.
Para qué sirve: Finaliza el modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 186: ?>
Qué hace exactamente: Cierra el bloque PHP.
Con qué se conecta: Con el intérprete de PHP.
Para qué sirve: Indica el fin del archivo PHP.
Qué pasaría si se quita: En archivos PHP puros normalmente puede funcionar, pero aquí se usa como cierre formal.

Conclusión:
Este archivo es el modelo que maneja las autorizaciones delegadas para liquidaciones temporales. Se conecta principalmente con la tabla autorizacion_delegada, la tabla usuario y la tabla liquidacion. Sus métodos permiten listar permisos, generar resúmenes, traer mayordomos activos, consultar liquidaciones asociadas, otorgar nuevos permisos y revocar autorizaciones activas.