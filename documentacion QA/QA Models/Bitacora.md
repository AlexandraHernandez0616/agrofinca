Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete PHP del servidor.
Para qué sirve: Permite que el servidor ejecute la clase Bitacora.
Qué pasaría si se quita: El archivo no se interpretaría correctamente como PHP.

Líneas 2 a 17: Comentario de documentación
Qué hace exactamente: Describe el archivo, su propósito, la tabla que consulta y las columnas principales.
Con qué se conecta: Con la tabla bitacora_operacion y con la tabla usuario.
Para qué sirve: Explica que este modelo sirve para consultar registros de acciones realizadas en el sistema.
Qué pasaría si se quita: El código funcionaría igual, pero sería más difícil entender qué hace el modelo.

Línea 18: class Bitacora {
Qué hace exactamente: Crea la clase Bitacora.
Con qué se conecta: Con el controlador o vista que necesite consultar la bitácora.
Para qué sirve: Agrupa los métodos relacionados con la lectura de registros de bitácora.
Qué pasaría si se quita: No existiría la clase y no se podrían usar sus métodos.

Línea 20: private $conn;
Qué hace exactamente: Declara una propiedad privada llamada $conn.
Con qué se conecta: Con la conexión PDO de la base de datos.
Para qué sirve: Guarda la conexión para usarla en todos los métodos del modelo.
Qué pasaría si se quita: Los métodos no tendrían cómo consultar la base de datos.

Línea 22: public function __construct($db) {
Qué hace exactamente: Declara el constructor de la clase.
Con qué se conecta: Con el momento en que se crea el objeto Bitacora desde un controlador o vista.
Para qué sirve: Recibe la conexión a la base de datos.
Qué pasaría si se quita: No se inicializaría automáticamente la conexión.

Línea 23: $this->conn = $db;
Qué hace exactamente: Guarda la conexión recibida en la propiedad $conn.
Con qué se conecta: Con la variable $db enviada desde fuera del modelo.
Para qué sirve: Permite usar $this->conn para preparar y ejecutar consultas SQL.
Qué pasaría si se quita: Las consultas fallarían porque $this->conn no tendría valor.

Línea 24: }
Qué hace exactamente: Cierra el constructor.
Con qué se conecta: Con la línea 22.
Para qué sirve: Finaliza la función __construct.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 26 a 28: Comentario separador de LECTURA
Qué hace exactamente: Separa visualmente los métodos que consultan información.
Con qué se conecta: Con listar(), listarModulos(), listarOperaciones() y resumen().
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: El código funciona igual, pero pierde orden visual.

Líneas 30 a 40: Comentario del método listar
Qué hace exactamente: Explica qué hace listar() y qué parámetros recibe.
Con qué se conecta: Con filtros de búsqueda, módulo, operación, fechas y límite.
Para qué sirve: Documenta cómo usar el método.
Qué pasaría si se quita: El método funciona, pero sería menos claro para quien lo lea.

Líneas 41 a 48: public function listar(...)
Qué hace exactamente: Declara el método listar() con filtros opcionales.
Con qué se conecta: Con formularios o filtros de una vista de bitácora.
Para qué sirve: Permite consultar registros de bitácora según búsqueda, módulo, operación, fechas y límite.
Qué pasaría si se quita: No se podrían listar registros de bitácora desde este modelo.

Línea 49: $where = ['1=1'];
Qué hace exactamente: Crea un arreglo de condiciones SQL empezando con una condición siempre verdadera.
Con qué se conecta: Con el WHERE dinámico de la consulta.
Para qué sirve: Facilita agregar condiciones con AND sin complicar la consulta.
Qué pasaría si se quita: Habría que manejar manualmente si ya existe o no una condición previa.

Línea 50: $params = [];
Qué hace exactamente: Crea un arreglo vacío de parámetros.
Con qué se conecta: Con execute($params).
Para qué sirve: Guarda valores seguros para la consulta preparada.
Qué pasaría si se quita: No se podrían enviar correctamente parámetros como :b, :modulo, :operacion, :inicio y :fin.

Línea 52: if ($busqueda !== '') {
Qué hace exactamente: Verifica si el usuario escribió texto de búsqueda.
Con qué se conecta: Con el parámetro $busqueda.
Para qué sirve: Agregar filtro de búsqueda solo cuando existe texto.
Qué pasaría si se quita: La búsqueda general no funcionaría.

Líneas 53 a 55: $where[] = "(u.username LIKE :b OR b.modulo LIKE :b ...)";
Qué hace exactamente: Agrega una condición para buscar en usuario, módulo, operación, detalle o rol.
Con qué se conecta: Con la tabla usuario alias u y bitacora_operacion alias b.
Para qué sirve: Permite encontrar registros por diferentes campos.
Qué pasaría si se quita: El buscador no filtraría por texto general.

Línea 56: $params[':b'] = '%' . $busqueda . '%';
Qué hace exactamente: Guarda el valor de búsqueda con comodines %.
Con qué se conecta: Con el parámetro :b usado en LIKE.
Para qué sirve: Permite coincidencias parciales.
Qué pasaría si se quita: La consulta tendría :b sin valor y fallaría.

Línea 57: }
Qué hace exactamente: Cierra el if de búsqueda.
Con qué se conecta: Con la línea 52.
Para qué sirve: Finaliza esa validación.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 58: if ($modulo !== '') {
Qué hace exactamente: Verifica si se quiere filtrar por módulo.
Con qué se conecta: Con el parámetro $modulo.
Para qué sirve: Permite mostrar solo operaciones de un módulo específico.
Qué pasaría si se quita: No se podría filtrar por módulo.

Línea 59: $where[] = "b.modulo = :modulo";
Qué hace exactamente: Agrega condición exacta para el módulo.
Con qué se conecta: Con la columna modulo de bitacora_operacion.
Para qué sirve: Filtrar por un módulo concreto.
Qué pasaría si se quita: El filtro de módulo no se aplicaría.

Línea 60: $params[':modulo'] = $modulo;
Qué hace exactamente: Guarda el valor del módulo.
Con qué se conecta: Con el parámetro :modulo.
Para qué sirve: Ejecutar la consulta de forma segura.
Qué pasaría si se quita: La consulta fallaría porque :modulo no tendría valor.

Línea 61: }
Qué hace exactamente: Cierra el if de módulo.
Con qué se conecta: Con línea 58.
Para qué sirve: Finaliza el bloque.
Qué pasaría si se quita: Error de sintaxis.

Línea 62: if ($operacion !== '') {
Qué hace exactamente: Verifica si se filtrará por operación.
Con qué se conecta: Con el parámetro $operacion.
Para qué sirve: Permite mostrar solo acciones como creación, modificación, eliminación, etc.
Qué pasaría si se quita: No habría filtro por operación.

Línea 63: $where[] = "b.operacion = :operacion";
Qué hace exactamente: Agrega condición por operación.
Con qué se conecta: Con bitacora_operacion.operacion.
Para qué sirve: Filtrar por tipo de operación.
Qué pasaría si se quita: El filtro no se aplicaría.

Línea 64: $params[':operacion'] = $operacion;
Qué hace exactamente: Guarda el valor del filtro operación.
Con qué se conecta: Con :operacion.
Para qué sirve: Pasar el dato a la consulta preparada.
Qué pasaría si se quita: La consulta fallaría si se usa ese filtro.

Línea 65: }
Qué hace exactamente: Cierra el if de operación.
Con qué se conecta: Con línea 62.
Para qué sirve: Finalizar validación.
Qué pasaría si se quita: Error de sintaxis.

Línea 66: if ($fecha_inicio !== '') {
Qué hace exactamente: Verifica si hay fecha inicial.
Con qué se conecta: Con el filtro fecha_inicio.
Para qué sirve: Permite consultar bitácora desde una fecha.
Qué pasaría si se quita: No habría filtro por fecha inicial.

Línea 67: $where[] = "DATE(b.fecha_hora) >= :inicio";
Qué hace exactamente: Agrega condición para registros desde cierta fecha.
Con qué se conecta: Con bitacora_operacion.fecha_hora.
Para qué sirve: Filtrar registros desde el día indicado.
Qué pasaría si se quita: No se limitaría por fecha inicial.

Línea 68: $params[':inicio'] = $fecha_inicio;
Qué hace exactamente: Guarda fecha inicial como parámetro.
Con qué se conecta: Con :inicio.
Para qué sirve: Pasar la fecha de forma segura.
Qué pasaría si se quita: :inicio no tendría valor.

Línea 69: }
Qué hace exactamente: Cierra el if de fecha inicial.
Con qué se conecta: Con línea 66.
Para qué sirve: Finaliza el filtro.
Qué pasaría si se quita: Error de sintaxis.

Línea 70: if ($fecha_fin !== '') {
Qué hace exactamente: Verifica si hay fecha final.
Con qué se conecta: Con el filtro fecha_fin.
Para qué sirve: Permite limitar registros hasta una fecha.
Qué pasaría si se quita: No se podría filtrar por fecha final.

Línea 71: $where[] = "DATE(b.fecha_hora) <= :fin";
Qué hace exactamente: Agrega condición de fecha máxima.
Con qué se conecta: Con b.fecha_hora.
Para qué sirve: Mostrar registros hasta el día indicado.
Qué pasaría si se quita: No se aplicaría límite superior de fecha.

Línea 72: $params[':fin'] = $fecha_fin;
Qué hace exactamente: Guarda fecha final.
Con qué se conecta: Con :fin.
Para qué sirve: Ejecutar el filtro de forma segura.
Qué pasaría si se quita: La consulta fallaría si usa :fin.

Línea 73: }
Qué hace exactamente: Cierra el if de fecha final.
Con qué se conecta: Con línea 70.
Para qué sirve: Finaliza bloque.
Qué pasaría si se quita: Error de sintaxis.

Línea 75: $limitSql = $limite > 0 ? " LIMIT {$limite}" : '';
Qué hace exactamente: Crea una parte SQL LIMIT si el límite es mayor que 0.
Con qué se conecta: Con el parámetro $limite.
Para qué sirve: Limitar la cantidad de registros mostrados.
Qué pasaría si se quita: Podrían cargarse demasiados registros.

Líneas 77 a 89: $sql = "SELECT..."
Qué hace exactamente: Construye la consulta principal de bitácora.
Con qué se conecta: Con bitacora_operacion b y usuario u.
Para qué sirve: Trae ID, fecha, hora, usuario, rol, módulo, operación y detalle.
Qué pasaría si se quita: No habría consulta para listar registros.

Línea 85: FROM bitacora_operacion b
Qué hace exactamente: Define la tabla principal de la consulta.
Con qué se conecta: Con la tabla bitacora_operacion.
Para qué sirve: Leer los registros de auditoría.
Qué pasaría si se quita: La consulta sería inválida.

Línea 86: INNER JOIN usuario u ON u.id_usuario = b.id_usuario
Qué hace exactamente: Une cada registro de bitácora con el usuario que hizo la acción.
Con qué se conecta: Con usuario.id_usuario y bitacora_operacion.id_usuario.
Para qué sirve: Mostrar username y rol junto al registro.
Qué pasaría si se quita: No se podrían mostrar los datos del usuario.

Línea 87: WHERE " . implode(' AND ', $where) . "
Qué hace exactamente: Une todas las condiciones dinámicas.
Con qué se conecta: Con el arreglo $where.
Para qué sirve: Aplicar filtros seleccionados.
Qué pasaría si se quita: No se aplicarían filtros y la consulta quedaría incompleta.

Línea 88: ORDER BY b.fecha_hora DESC"
Qué hace exactamente: Ordena los registros del más reciente al más antiguo.
Con qué se conecta: Con fecha_hora.
Para qué sirve: Mostrar primero las acciones recientes.
Qué pasaría si se quita: El orden puede ser confuso.

Línea 89: . $limitSql;
Qué hace exactamente: Agrega el LIMIT al final de la consulta.
Con qué se conecta: Con $limitSql.
Para qué sirve: Controlar cuántos registros se devuelven.
Qué pasaría si se quita: No se limitarían registros.

Línea 91: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta SQL.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar la consulta de forma segura.
Qué pasaría si se quita: No habría objeto para ejecutar la consulta.

Línea 92: $stmt->execute($params);
Qué hace exactamente: Ejecuta la consulta con los filtros guardados.
Con qué se conecta: Con el arreglo $params.
Para qué sirve: Obtener datos filtrados de la base de datos.
Qué pasaría si se quita: No se ejecutaría la consulta.

Línea 93: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todos los registros como arreglo asociativo.
Con qué se conecta: Con la vista o controlador que mostrará la bitácora.
Para qué sirve: Entregar los datos listos para mostrar.
Qué pasaría si se quita: El método no devolvería resultados.

Línea 94: }
Qué hace exactamente: Cierra listar().
Con qué se conecta: Con línea 41.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 96 a 98: Comentario de listarModulos
Qué hace exactamente: Explica que devuelve módulos únicos.
Con qué se conecta: Con filtros desplegables de la vista.
Para qué sirve: Documentar el método.
Qué pasaría si se quita: El código funciona igual.

Línea 99: public function listarModulos(): array {
Qué hace exactamente: Declara método para traer módulos únicos.
Con qué se conecta: Con el filtro dropdown de módulos.
Para qué sirve: Llenar un selector de módulos.
Qué pasaría si se quita: La vista no podría cargar módulos desde este modelo.

Líneas 100 a 102: SELECT DISTINCT modulo...
Qué hace exactamente: Consulta los módulos distintos registrados en bitacora_operacion.
Con qué se conecta: Con la columna modulo.
Para qué sirve: Evitar repetir módulos en el filtro.
Qué pasaría si se quita: No se obtendría la lista.

Línea 103: return $stmt->fetchAll(PDO::FETCH_COLUMN);
Qué hace exactamente: Devuelve una lista simple de valores.
Con qué se conecta: Con el dropdown de módulos.
Para qué sirve: Entregar solo los nombres de módulos.
Qué pasaría si se quita: No retornaría datos.

Línea 104: }
Qué hace exactamente: Cierra listarModulos().
Con qué se conecta: Con línea 99.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 106 a 108: Comentario de listarOperaciones
Qué hace exactamente: Explica que devuelve operaciones únicas.
Con qué se conecta: Con el filtro de operación.
Para qué sirve: Documentar el método.
Qué pasaría si se quita: Código funciona igual.

Línea 109: public function listarOperaciones(): array {
Qué hace exactamente: Declara método para listar operaciones únicas.
Con qué se conecta: Con bitacora_operacion.operacion.
Para qué sirve: Llenar un filtro desplegable.
Qué pasaría si se quita: No habría lista de operaciones para filtrar.

Líneas 110 a 112: SELECT DISTINCT operacion...
Qué hace exactamente: Consulta operaciones distintas.
Con qué se conecta: Con la columna operacion.
Para qué sirve: Mostrar opciones sin repetir.
Qué pasaría si se quita: No habría consulta.

Línea 113: return $stmt->fetchAll(PDO::FETCH_COLUMN);
Qué hace exactamente: Devuelve solo una columna.
Con qué se conecta: Con el selector de operaciones.
Para qué sirve: Entregar una lista simple.
Qué pasaría si se quita: No habría retorno.

Línea 114: }
Qué hace exactamente: Cierra listarOperaciones().
Con qué se conecta: Con línea 109.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 116 a 118: Comentario de resumen
Qué hace exactamente: Explica que genera datos para tarjetas superiores.
Con qué se conecta: Con dashboard o vista de bitácora.
Para qué sirve: Documenta el resumen.
Qué pasaría si se quita: Código funciona igual.

Línea 119: public function resumen(): array {
Qué hace exactamente: Declara el método resumen().
Con qué se conecta: Con tarjetas estadísticas.
Para qué sirve: Obtener total, registros de hoy, usuarios activos y módulos.
Qué pasaría si se quita: No habría resumen estadístico.

Líneas 120 a 126: Consulta SELECT COUNT/SUM/COUNT DISTINCT
Qué hace exactamente: Consulta métricas generales de la bitácora.
Con qué se conecta: Con bitacora_operacion.
Para qué sirve: Contar registros totales, registros de hoy, usuarios distintos y módulos distintos.
Qué pasaría si se quita: No habría datos para las tarjetas.

Línea 128: return [
Qué hace exactamente: Inicia arreglo de retorno.
Con qué se conecta: Con la vista que mostrará las tarjetas.
Para qué sirve: Organizar los datos del resumen.
Qué pasaría si se quita: No se devolvería estructura.

Líneas 129 a 132: total, hoy, usuarios_activos, modulos
Qué hace exactamente: Convierte los valores a enteros y usa 0 si no existen.
Con qué se conecta: Con $row.
Para qué sirve: Evitar errores por valores nulos.
Qué pasaría si se quitan: La vista no tendría esas métricas.

Línea 133: ];
Qué hace exactamente: Cierra arreglo de retorno.
Con qué se conecta: Con línea 128.
Para qué sirve: Finaliza estructura.
Qué pasaría si se quita: Error de sintaxis.

Línea 134: }
Qué hace exactamente: Cierra resumen().
Con qué se conecta: Con línea 119.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Línea 135: }
Qué hace exactamente: Cierra la clase Bitacora.
Con qué se conecta: Con línea 18.
Para qué sirve: Finaliza el modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 136: ?>
Qué hace exactamente: Cierra el bloque PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Marca el fin del archivo.
Qué pasaría si se quita: En archivos PHP puros puede funcionar, pero aquí se usa como cierre formal.

Conclusión:
Este modelo se encarga de consultar la bitácora del sistema. Se conecta con bitacora_operacion y usuario para mostrar quién hizo cada acción, en qué módulo, cuándo y qué operación realizó. También entrega filtros y métricas para una vista administrativa de auditoría.