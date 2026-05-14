Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Permite ejecutar la clase Trabajador.
Qué pasaría si se quita: El archivo podría no interpretarse correctamente.

Líneas 2 a 9: Comentario de documentación
Qué hace exactamente: Explica que el modelo maneja operaciones de trabajadores.
Con qué se conecta: Con las tablas usuario y trabajador.
Para qué sirve: Documentar que lo usa TrabajadorController.php.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 10: class Trabajador {
Qué hace exactamente: Declara la clase Trabajador.
Con qué se conecta: Con TrabajadorController.php.
Para qué sirve: Agrupar consultas del módulo trabajadores.
Qué pasaría si se quita: No se podría crear new Trabajador($db).

Línea 12: private $conn;
Qué hace exactamente: Declara la propiedad privada de conexión.
Con qué se conecta: Con PDO.
Para qué sirve: Guardar acceso a la base de datos.
Qué pasaría si se quita: Los métodos no podrían consultar datos.

Línea 14: public function __construct($db) {
Qué hace exactamente: Declara el constructor.
Con qué se conecta: Con el controlador que envía $db.
Para qué sirve: Recibir la conexión.
Qué pasaría si se quita: No se inicializaría $conn.

Línea 15: $this->conn = $db;
Qué hace exactamente: Guarda la conexión.
Con qué se conecta: Con todos los métodos.
Para qué sirve: Permitir consultas SQL.
Qué pasaría si se quita: Las consultas fallarían.

Línea 16: }
Qué hace exactamente: Cierra constructor.
Con qué se conecta: Con línea 14.
Para qué sirve: Finaliza inicialización.
Qué pasaría si se quita: Error de sintaxis.

Líneas 18 a 23: Comentario de listar()
Qué hace exactamente: Explica que lista trabajadores con búsqueda y filtro de estado.
Con qué se conecta: Con listar().
Para qué sirve: Documentar parámetros y retorno.
Qué pasaría si se quita: No afecta funcionamiento.

Línea 24: public function listar($busqueda = '', $estado = '') {
Qué hace exactamente: Declara método para listar trabajadores.
Con qué se conecta: Con la vista administrativa de trabajadores.
Para qué sirve: Mostrar trabajadores filtrados por texto o estado.
Qué pasaría si se quita: No se podrían listar trabajadores.

Líneas 25 a 30: SELECT usuario y trabajador
Qué hace exactamente: Consulta datos personales y laborales.
Con qué se conecta: Con trabajador t y usuario u.
Para qué sirve: Mostrar nombres, documento, EPS, RH, estado y fecha de ingreso.
Qué pasaría si se quita: No habría consulta base.

Línea 28: INNER JOIN usuario u ON u.id_usuario = t.id_trabajador
Qué hace exactamente: Une trabajador con usuario.
Con qué se conecta: Con trabajador.id_trabajador y usuario.id_usuario.
Para qué sirve: Obtener datos personales del trabajador.
Qué pasaría si se quita: No se mostrarían nombres ni documento.

Línea 30: WHERE 1=1
Qué hace exactamente: Agrega una condición siempre verdadera.
Con qué se conecta: Con filtros dinámicos posteriores.
Para qué sirve: Permite agregar AND sin problemas.
Qué pasaría si se quita: Habría que construir filtros manualmente.

Líneas 32 a 34: if (!empty($busqueda))
Qué hace exactamente: Si hay texto, agrega filtro por nombre, apellido o documento.
Con qué se conecta: Con columnas de usuario.
Para qué sirve: Buscar trabajadores.
Qué pasaría si se quita: No habría búsqueda.

Líneas 35 a 37: if (!empty($estado))
Qué hace exactamente: Si hay estado, filtra por estado_trabajador.
Con qué se conecta: Con trabajador.estado_trabajador.
Para qué sirve: Mostrar solo trabajadores activos, en labor o inactivos.
Qué pasaría si se quita: No habría filtro por estado.

Línea 39: $sql .= " ORDER BY t.fecha_ingreso DESC";
Qué hace exactamente: Ordena por fecha de ingreso descendente.
Con qué se conecta: Con trabajador.fecha_ingreso.
Para qué sirve: Mostrar primero los trabajadores más recientes.
Qué pasaría si se quita: El orden podría ser confuso.

Línea 41: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar de forma segura.
Qué pasaría si se quita: No habría sentencia.

Líneas 43 a 46: bind de búsqueda
Qué hace exactamente: Crea %texto% y lo vincula a :b.
Con qué se conecta: Con los LIKE de la consulta.
Para qué sirve: Permitir coincidencias parciales.
Qué pasaría si se quita: La búsqueda fallaría.

Líneas 47 a 49: bind de estado
Qué hace exactamente: Vincula el estado seleccionado.
Con qué se conecta: Con :estado.
Para qué sirve: Aplicar filtro de estado.
Qué pasaría si se quita: El filtro fallaría.

Línea 51: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtener trabajadores.
Qué pasaría si se quita: No se consultaría nada.

Línea 52: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todos los trabajadores encontrados.
Con qué se conecta: Con la vista o controlador.
Para qué sirve: Entregar datos para mostrar.
Qué pasaría si se quita: El método no devolvería resultados.

Línea 53: }
Qué hace exactamente: Cierra listar().
Con qué se conecta: Con línea 24.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 55 a 59: Comentario obtenerPorId()
Qué hace exactamente: Explica que obtiene un trabajador completo por ID.
Con qué se conecta: Con obtenerPorId().
Para qué sirve: Documentar el método.
Qué pasaría si se quita: No afecta funcionamiento.

Línea 60: public function obtenerPorId($id) {
Qué hace exactamente: Declara método para buscar trabajador específico.
Con qué se conecta: Con edición o detalle de trabajador.
Para qué sirve: Obtener datos completos de un trabajador.
Qué pasaría si se quita: No se podría consultar trabajador individual.

Líneas 61 a 67: SELECT trabajador por ID
Qué hace exactamente: Consulta usuario y trabajador usando id_trabajador.
Con qué se conecta: Con trabajador y usuario.
Para qué sirve: Cargar datos completos del trabajador.
Qué pasaría si se quita: No habría detalle del trabajador.

Línea 68: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar de forma segura.
Qué pasaría si se quita: No se podría ejecutar.

Línea 69: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Vincula ID.
Con qué se conecta: Con WHERE t.id_trabajador = :id.
Para qué sirve: Buscar el trabajador correcto.
Qué pasaría si se quita: La consulta fallaría.

Línea 70: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con base de datos.
Para qué sirve: Obtener el trabajador.
Qué pasaría si se quita: No se consultaría.

Línea 71: return $stmt->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve una fila o false.
Con qué se conecta: Con el controlador.
Para qué sirve: Entregar datos del trabajador seleccionado.
Qué pasaría si se quita: No habría retorno.

Línea 72: }
Qué hace exactamente: Cierra obtenerPorId().
Con qué se conecta: Con línea 60.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 74 a 77: Comentario obtenerEstados()
Qué hace exactamente: Explica que lista estados únicos.
Con qué se conecta: Con obtenerEstados().
Para qué sirve: Documentar el método.
Qué pasaría si se quita: No afecta.

Línea 78: public function obtenerEstados() {
Qué hace exactamente: Declara método para obtener estados.
Con qué se conecta: Con filtros de la vista.
Para qué sirve: Llenar un select con estados reales.
Qué pasaría si se quita: No habría filtro dinámico de estados.

Línea 79: $stmt = $this->conn->query("SELECT DISTINCT estado_trabajador FROM trabajador ORDER BY estado_trabajador");
Qué hace exactamente: Consulta estados únicos de trabajadores.
Con qué se conecta: Con trabajador.estado_trabajador.
Para qué sirve: Evitar opciones repetidas en el filtro.
Qué pasaría si se quita: No se obtendrían estados.

Línea 80: return $stmt->fetchAll(PDO::FETCH_COLUMN);
Qué hace exactamente: Devuelve una lista simple de estados.
Con qué se conecta: Con la vista del filtro.
Para qué sirve: Entregar solo los valores de estado.
Qué pasaría si se quita: El método no devolvería datos.

Línea 81: }
Qué hace exactamente: Cierra obtenerEstados().
Con qué se conecta: Con línea 78.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 82: }
Qué hace exactamente: Cierra la clase Trabajador.
Con qué se conecta: Con línea 10.
Para qué sirve: Finaliza modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 83: ?>
Qué hace exactamente: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin formal.
Qué pasaría si se quita: Puede funcionar, pero aquí se usa cierre formal.

Conclusión:
Este modelo consulta trabajadores desde el módulo administrativo. Se conecta con usuario y trabajador para listar, buscar por ID y obtener estados disponibles para filtros.