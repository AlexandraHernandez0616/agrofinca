Línea 1: <?php
Qué hace exactamente: Abre el archivo como PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Permite ejecutar la clase Inventario.
Qué pasaría si se quita: El archivo no se interpretaría correctamente.

Líneas 2 a 10: Comentario de documentación
Qué hace exactamente: Explica que este modelo maneja operaciones del módulo Inventarios.
Con qué se conecta: Con las tablas herramienta e insumo y con InventarioController.php.
Para qué sirve: Documentar el propósito del archivo.
Qué pasaría si se quita: El código funciona, pero se pierde claridad.

Línea 11: class Inventario {
Qué hace exactamente: Declara la clase Inventario.
Con qué se conecta: Con controllers/InventarioController.php y MayordomoInventarioController.php.
Para qué sirve: Agrupar métodos para herramientas e insumos.
Qué pasaría si se quita: No se podrían crear objetos Inventario.

Línea 13: private $conn;
Qué hace exactamente: Declara la propiedad privada de conexión.
Con qué se conecta: Con la conexión PDO.
Para qué sirve: Guardar acceso a la base de datos.
Qué pasaría si se quita: Los métodos no tendrían conexión.

Línea 15: public function __construct($db) {
Qué hace exactamente: Declara el constructor.
Con qué se conecta: Con new Inventario($db).
Para qué sirve: Recibir la conexión desde el controlador.
Qué pasaría si se quita: No se inicializaría $conn.

Línea 16: $this->conn = $db;
Qué hace exactamente: Guarda la conexión en la clase.
Con qué se conecta: Con $db recibido desde Database::conectar().
Para qué sirve: Permitir consultas SQL en todos los métodos.
Qué pasaría si se quita: $this->conn quedaría vacío.

Línea 17: }
Qué hace exactamente: Cierra el constructor.
Con qué se conecta: Con línea 15.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Error de sintaxis.

Líneas 19 a 21: Comentario HERRAMIENTAS
Qué hace exactamente: Separa la sección de métodos para herramientas.
Con qué se conecta: Con la tabla herramienta.
Para qué sirve: Organizar el código.
Qué pasaría si se quita: El código funciona igual.

Líneas 23 a 25: Comentario de listarHerramientas
Qué hace exactamente: Explica que el método lista herramientas por fecha.
Con qué se conecta: Con la tabla herramienta.
Para qué sirve: Documentar el método.
Qué pasaría si se quita: El método funciona igual.

Línea 26: public function listarHerramientas() {
Qué hace exactamente: Declara método para listar herramientas.
Con qué se conecta: Con vistas de inventario que muestran herramientas.
Para qué sirve: Obtener herramientas registradas.
Qué pasaría si se quita: No se podrían listar herramientas.

Líneas 27 a 30: $sql = "SELECT..."
Qué hace exactamente: Construye consulta para obtener id, nombre, cantidad, estado, foto y fecha de herramientas.
Con qué se conecta: Con la tabla herramienta.
Para qué sirve: Traer datos necesarios para la tabla del inventario.
Qué pasaría si se quita: No habría consulta para mostrar herramientas.

Línea 31: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta SQL.
Con qué se conecta: Con PDO.
Para qué sirve: Crear una sentencia ejecutable.
Qué pasaría si se quita: No habría objeto para ejecutar.

Línea 32: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtener las herramientas.
Qué pasaría si se quita: No se consultarían datos.

Línea 33: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todas las herramientas como arreglo asociativo.
Con qué se conecta: Con la vista o controlador.
Para qué sirve: Entregar datos para mostrarlos.
Qué pasaría si se quita: El método no retornaría resultados.

Línea 34: }
Qué hace exactamente: Cierra listarHerramientas().
Con qué se conecta: Con línea 26.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 36 a 38: Comentario de obtenerHerramienta
Qué hace exactamente: Explica que busca una herramienta por ID.
Con qué se conecta: Con editar/eliminar herramienta.
Para qué sirve: Documentar el método.
Qué pasaría si se quita: Código funciona igual.

Línea 39: public function obtenerHerramienta($id) {
Qué hace exactamente: Declara método que recibe un ID.
Con qué se conecta: Con controladores que necesitan cargar una herramienta específica.
Para qué sirve: Obtener datos de una herramienta para editarla o borrar su foto.
Qué pasaría si se quita: No se podría consultar una herramienta individual.

Líneas 40 a 42: SELECT * FROM herramienta WHERE id_herramienta = :id LIMIT 1
Qué hace exactamente: Prepara consulta para traer una sola herramienta por ID.
Con qué se conecta: Con herramienta.id_herramienta.
Para qué sirve: Buscar el registro exacto.
Qué pasaría si se quita: No habría consulta individual.

Línea 43: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Vincula el ID recibido con :id.
Con qué se conecta: Con el WHERE de la consulta.
Para qué sirve: Ejecutar consulta segura.
Qué pasaría si se quita: :id no tendría valor.

Línea 44: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtener el registro.
Qué pasaría si se quita: No se buscaría la herramienta.

Línea 45: return $stmt->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve una herramienta como arreglo asociativo.
Con qué se conecta: Con el controlador.
Para qué sirve: Usar sus datos, por ejemplo foto_referencia.
Qué pasaría si se quita: No se devolvería la herramienta.

Línea 46: }
Qué hace exactamente: Cierra obtenerHerramienta().
Con qué se conecta: Con línea 39.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 48 a 51: Comentario de crearHerramienta
Qué hace exactamente: Explica que registra una herramienta y que la foto puede ser null.
Con qué se conecta: Con subida de fotos del controlador.
Para qué sirve: Documentar parámetros.
Qué pasaría si se quita: Código funciona igual.

Línea 52: public function crearHerramienta($nombre, $cantidad, $estado, $fecha, $foto = null) {
Qué hace exactamente: Declara método para crear una herramienta.
Con qué se conecta: Con InventarioController.php cuando accion = crear_herramienta.
Para qué sirve: Insertar una nueva herramienta en la base de datos.
Qué pasaría si se quita: No se podrían registrar herramientas.

Líneas 53 a 56: INSERT INTO herramienta...
Qué hace exactamente: Prepara el INSERT con nombre, cantidad_total, estado, foto_referencia y fecha_registro.
Con qué se conecta: Con la tabla herramienta.
Para qué sirve: Guardar la nueva herramienta.
Qué pasaría si se quita: No se insertaría ningún registro.

Líneas 57 a 61: bindParam de nombre, cantidad, estado, foto y fecha
Qué hace exactamente: Relaciona cada parámetro SQL con su variable PHP.
Con qué se conecta: Con los campos enviados desde el controlador.
Para qué sirve: Insertar datos de forma segura y ordenada.
Qué pasaría si se quitan: La consulta tendría parámetros sin valor y fallaría.

Línea 62: return $stmt->execute();
Qué hace exactamente: Ejecuta el INSERT y devuelve true o false.
Con qué se conecta: Con el controlador que valida $ok.
Para qué sirve: Saber si la herramienta se guardó.
Qué pasaría si se quita: No se ejecutaría el registro.

Línea 63: }
Qué hace exactamente: Cierra crearHerramienta().
Con qué se conecta: Con línea 52.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 65 a 68: Comentario de actualizarHerramienta
Qué hace exactamente: Explica que actualiza una herramienta y solo cambia foto si se envía.
Con qué se conecta: Con lógica de reemplazo de imágenes.
Para qué sirve: Documentar comportamiento importante.
Qué pasaría si se quita: Código funciona, pero se entiende menos.

Línea 69: public function actualizarHerramienta(...)
Qué hace exactamente: Declara método para editar herramienta.
Con qué se conecta: Con InventarioController.php y MayordomoInventarioController.php.
Para qué sirve: Actualizar datos de una herramienta existente.
Qué pasaría si se quita: No se podrían editar herramientas.

Línea 70: if ($foto !== null) {
Qué hace exactamente: Verifica si llegó una foto nueva.
Con qué se conecta: Con el parámetro $foto.
Para qué sirve: Decidir si se actualiza foto_referencia o no.
Qué pasaría si se quita: No se diferenciaría entre editar con foto o sin foto.

Líneas 71 a 75: UPDATE herramienta con foto_referencia
Qué hace exactamente: Construye SQL para actualizar datos y foto.
Con qué se conecta: Con columnas de herramienta.
Para qué sirve: Reemplazar imagen cuando se sube una nueva.
Qué pasaría si se quita: No se podría actualizar foto.

Líneas 76 a 80: UPDATE herramienta sin foto_referencia
Qué hace exactamente: Construye SQL para actualizar datos sin tocar la foto.
Con qué se conecta: Con herramienta.
Para qué sirve: Mantener la imagen anterior si no se sube una nueva.
Qué pasaría si se quita: Podría perderse o sobrescribirse la foto.

Línea 82: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara el SQL elegido.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar la actualización.
Qué pasaría si se quita: No se podría ejecutar.

Líneas 83 a 87: bindParam de id, nombre, cantidad, estado y fecha
Qué hace exactamente: Vincula valores al UPDATE.
Con qué se conecta: Con columnas de herramienta.
Para qué sirve: Actualizar el registro correcto con datos nuevos.
Qué pasaría si se quitan: La consulta fallaría.

Líneas 88 a 90: if ($foto !== null) bindParam(':foto'...)
Qué hace exactamente: Solo vincula :foto cuando la consulta lo necesita.
Con qué se conecta: Con foto_referencia.
Para qué sirve: Evitar error si no hay parámetro :foto en el SQL sin foto.
Qué pasaría si se quita: Si hay foto, la consulta no tendría valor para :foto.

Línea 91: return $stmt->execute();
Qué hace exactamente: Ejecuta el UPDATE.
Con qué se conecta: Con el controlador.
Para qué sirve: Informar si la edición funcionó.
Qué pasaría si se quita: No se actualizaría.

Línea 92: }
Qué hace exactamente: Cierra actualizarHerramienta().
Con qué se conecta: Con línea 69.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 94 a 96: Comentario de eliminarHerramienta
Qué hace exactamente: Explica que elimina una herramienta por ID.
Con qué se conecta: Con acción eliminar_herramienta.
Para qué sirve: Documentar método.
Qué pasaría si se quita: Código funciona igual.

Línea 97: public function eliminarHerramienta($id) {
Qué hace exactamente: Declara método para eliminar herramienta.
Con qué se conecta: Con controlador de inventario.
Para qué sirve: Borrar una herramienta de la base de datos.
Qué pasaría si se quita: No se podrían eliminar herramientas.

Líneas 98 a 100: DELETE FROM herramienta WHERE id_herramienta = :id
Qué hace exactamente: Prepara eliminación por ID.
Con qué se conecta: Con herramienta.id_herramienta.
Para qué sirve: Borrar solo la herramienta seleccionada.
Qué pasaría si se quita: No habría consulta de eliminación.

Línea 101: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Vincula el ID.
Con qué se conecta: Con :id.
Para qué sirve: Evitar borrar registros incorrectos.
Qué pasaría si se quita: La consulta fallaría.

Línea 102: return $stmt->execute();
Qué hace exactamente: Ejecuta el DELETE.
Con qué se conecta: Con la base de datos.
Para qué sirve: Eliminar el registro.
Qué pasaría si se quita: No se borraría.

Línea 103: }
Qué hace exactamente: Cierra eliminarHerramienta().
Con qué se conecta: Con línea 97.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 105 a 107: Comentario INSUMOS
Qué hace exactamente: Separa la sección de métodos para insumos.
Con qué se conecta: Con la tabla insumo.
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: Código funciona igual.

Línea 112: public function listarInsumos() {
Qué hace exactamente: Declara método para listar insumos.
Con qué se conecta: Con vistas de inventario.
Para qué sirve: Obtener todos los insumos registrados.
Qué pasaría si se quita: No se podrían mostrar insumos.

Líneas 113 a 117: SELECT de insumos
Qué hace exactamente: Trae id, nombre, stock, unidad, vencimiento, mínimo, foto y fecha.
Con qué se conecta: Con la tabla insumo.
Para qué sirve: Mostrar datos completos de inventario de insumos.
Qué pasaría si se quita: No habría consulta para la tabla de insumos.

Líneas 118 a 120: prepare, execute, fetchAll
Qué hace exactamente: Prepara, ejecuta y devuelve resultados.
Con qué se conecta: Con PDO y la vista.
Para qué sirve: Entregar insumos en arreglo asociativo.
Qué pasaría si se quitan: No se obtendrían datos.

Línea 126: public function obtenerInsumo($id) {
Qué hace exactamente: Declara método para buscar un insumo por ID.
Con qué se conecta: Con editar/eliminar insumo.
Para qué sirve: Obtener un registro específico.
Qué pasaría si se quita: No se podría consultar insumo individual.

Líneas 127 a 132: SELECT * FROM insumo...
Qué hace exactamente: Busca un insumo exacto por id_insumo.
Con qué se conecta: Con la tabla insumo.
Para qué sirve: Traer datos del insumo, incluida foto_referencia.
Qué pasaría si se quita: No se podría recuperar el insumo.

Línea 139: public function crearInsumo(...)
Qué hace exactamente: Declara método para registrar insumo.
Con qué se conecta: Con InventarioController.php y MayordomoInventarioController.php.
Para qué sirve: Insertar insumos con stock, unidad, vencimiento, mínimo, fecha y foto.
Qué pasaría si se quita: No se podrían crear insumos.

Líneas 140 a 145: INSERT INTO insumo...
Qué hace exactamente: Prepara inserción en tabla insumo.
Con qué se conecta: Con columnas de insumo.
Para qué sirve: Guardar nuevo insumo.
Qué pasaría si se quita: No se insertaría el registro.

Líneas 146 a 152: bindParam de datos de insumo
Qué hace exactamente: Vincula nombre, stock, unidad, vencimiento, mínimo, foto y fecha.
Con qué se conecta: Con valores recibidos del controlador.
Para qué sirve: Insertar datos de forma segura.
Qué pasaría si se quitan: El INSERT fallaría.

Línea 153: return $stmt->execute();
Qué hace exactamente: Ejecuta la inserción.
Con qué se conecta: Con la base de datos.
Para qué sirve: Guardar el insumo y devolver resultado.
Qué pasaría si se quita: No se crearía el insumo.

Línea 160: public function actualizarInsumo(...)
Qué hace exactamente: Declara método para actualizar un insumo.
Con qué se conecta: Con controladores de inventario.
Para qué sirve: Editar datos y opcionalmente foto de insumo.
Qué pasaría si se quita: No se podrían editar insumos.

Líneas 161 a 173: if/else SQL con o sin foto
Qué hace exactamente: Decide si actualiza foto_referencia o conserva la anterior.
Con qué se conecta: Con la columna foto_referencia.
Para qué sirve: Evitar borrar la foto cuando el usuario no sube una nueva.
Qué pasaría si se quita: Podría fallar la actualización o sobrescribirse la foto incorrectamente.

Líneas 174 a 185: prepare, bindParam, bind foto opcional, execute
Qué hace exactamente: Prepara y ejecuta la actualización del insumo.
Con qué se conecta: Con la tabla insumo y los datos del formulario.
Para qué sirve: Guardar cambios en el insumo correcto.
Qué pasaría si se quitan: No se actualizaría el registro.

Línea 191: public function eliminarInsumo($id) {
Qué hace exactamente: Declara método para borrar un insumo.
Con qué se conecta: Con acción eliminar_insumo.
Para qué sirve: Eliminar un insumo por ID.
Qué pasaría si se quita: No se podrían eliminar insumos.

Líneas 192 a 196: DELETE FROM insumo...
Qué hace exactamente: Prepara, vincula y ejecuta eliminación por id_insumo.
Con qué se conecta: Con la tabla insumo.
Para qué sirve: Borrar solo el insumo indicado.
Qué pasaría si se quita: No habría eliminación.

Líneas 199 a 201: Comentario RESUMEN
Qué hace exactamente: Separa estadísticas para tarjetas.
Con qué se conecta: Con dashboard o vista del inventario.
Para qué sirve: Organizar métricas.
Qué pasaría si se quita: Código funciona igual.

Línea 206: public function resumen() {
Qué hace exactamente: Declara método para obtener estadísticas del inventario.
Con qué se conecta: Con tarjetas superiores del módulo.
Para qué sirve: Mostrar totales de herramientas e insumos.
Qué pasaría si se quita: No habría resumen.

Líneas 208 a 214: Consulta de herramientas
Qué hace exactamente: Cuenta herramientas totales, disponibles, en mantenimiento y dañadas.
Con qué se conecta: Con la tabla herramienta y la columna estado.
Para qué sirve: Alimentar tarjetas estadísticas.
Qué pasaría si se quita: No habría métricas de herramientas.

Líneas 217 a 221: Consulta de insumos
Qué hace exactamente: Cuenta insumos totales y en alerta por stock bajo.
Con qué se conecta: Con stock_actual y cantidad_minima de insumo.
Para qué sirve: Detectar insumos críticos.
Qué pasaría si se quita: No habría métricas de insumos.

Líneas 223 a 230: return [...]
Qué hace exactamente: Devuelve todas las métricas convertidas a enteros.
Con qué se conecta: Con la vista que muestra las tarjetas.
Para qué sirve: Entregar datos limpios al frontend.
Qué pasaría si se quitan: No se mostraría el resumen.

Línea 232: }
Qué hace exactamente: Cierra la clase Inventario.
Con qué se conecta: Con línea 11.
Para qué sirve: Finaliza el modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 233: ?>
Qué hace exactamente: Cierra PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Fin del archivo.
Qué pasaría si se quita: Puede funcionar, pero aquí se usa cierre formal.

Conclusión:
Este modelo administra las operaciones de inventario. Se conecta con las tablas herramienta e insumo para listar, consultar por ID, crear, editar, eliminar y generar estadísticas. Es usado por controladores de inventario tanto del administrador como del mayordomo.