Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Permite ejecutar la clase Tarifa.
Qué pasaría si se quita: El archivo podría no interpretarse correctamente.

Líneas 2 a 14: Comentario de documentación
Qué hace exactamente: Explica que este modelo maneja tarifas de pago y muestra las columnas principales.
Con qué se conecta: Con la tabla tarifa.
Para qué sirve: Ayuda a entender qué campos maneja el modelo.
Qué pasaría si se quita: El código funciona, pero se pierde claridad.

Línea 15: class Tarifa {
Qué hace exactamente: Declara la clase Tarifa.
Con qué se conecta: Con TarifaController.php y con módulos que necesitan tarifas para liquidaciones.
Para qué sirve: Agrupa métodos para listar, consultar, crear, editar, activar/desactivar y eliminar tarifas.
Qué pasaría si se quita: No se podría crear new Tarifa($db).

Línea 17: private $conn;
Qué hace exactamente: Declara propiedad privada para conexión.
Con qué se conecta: Con PDO.
Para qué sirve: Guardar la conexión a la base de datos.
Qué pasaría si se quita: Los métodos no podrían consultar ni modificar datos.

Línea 19: public function __construct($db) {
Qué hace exactamente: Declara el constructor.
Con qué se conecta: Con el controlador que envía $db.
Para qué sirve: Recibir la conexión.
Qué pasaría si se quita: No se inicializaría la conexión.

Línea 20: $this->conn = $db;
Qué hace exactamente: Guarda la conexión en $this->conn.
Con qué se conecta: Con todos los métodos del modelo.
Para qué sirve: Permitir ejecutar consultas sobre la tabla tarifa.
Qué pasaría si se quita: Las consultas fallarían.

Línea 21: }
Qué hace exactamente: Cierra el constructor.
Con qué se conecta: Con línea 19.
Para qué sirve: Finaliza inicialización.
Qué pasaría si se quita: Error de sintaxis.

Líneas 23 a 25: Comentario LECTURA
Qué hace exactamente: Separa métodos que consultan datos.
Con qué se conecta: Con listar(), obtener() y resumen().
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: No afecta.

Líneas 27 a 33: Comentario de listar()
Qué hace exactamente: Explica que lista tarifas y acepta filtros.
Con qué se conecta: Con el método listar().
Para qué sirve: Documentar los parámetros $busqueda y $filtro.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 34: public function listar(string $busqueda = '', string $filtro = ''): array {
Qué hace exactamente: Declara el método para listar tarifas.
Con qué se conecta: Con la vista administrativa de tarifas.
Para qué sirve: Mostrar tarifas por tipo de pago o estado.
Qué pasaría si se quita: No se podrían listar tarifas.

Línea 35: $where = [];
Qué hace exactamente: Crea arreglo vacío de condiciones.
Con qué se conecta: Con la construcción dinámica del WHERE.
Para qué sirve: Guardar filtros solo si existen.
Qué pasaría si se quita: No se podrían agregar filtros fácilmente.

Línea 36: $params = [];
Qué hace exactamente: Crea arreglo vacío de parámetros.
Con qué se conecta: Con execute($params).
Para qué sirve: Guardar valores seguros para consultas preparadas.
Qué pasaría si se quita: La búsqueda no tendría parámetros.

Líneas 38 a 41: if ($busqueda !== '')
Qué hace exactamente: Si hay texto de búsqueda, filtra por tipo_pago.
Con qué se conecta: Con tarifa.tipo_pago.
Para qué sirve: Buscar tarifas por JORNAL, PRODUCCION o MIXTO.
Qué pasaría si se quita: No habría búsqueda por tipo.

Líneas 43 a 47: filtro activa/inactiva
Qué hace exactamente: Agrega condición activa = 1 o activa = 0.
Con qué se conecta: Con tarifa.activa.
Para qué sirve: Filtrar tarifas habilitadas o deshabilitadas.
Qué pasaría si se quita: No se podría filtrar por estado.

Líneas 49 a 53: $sql = SELECT tarifas
Qué hace exactamente: Construye la consulta para traer id, tipo, valor, fechas y estado activa.
Con qué se conecta: Con la tabla tarifa.
Para qué sirve: Mostrar la tabla de tarifas.
Qué pasaría si se quita: No habría consulta principal.

Línea 54: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutarla de forma segura.
Qué pasaría si se quita: No habría sentencia.

Línea 55: $stmt->execute($params);
Qué hace exactamente: Ejecuta la consulta con filtros.
Con qué se conecta: Con $params.
Para qué sirve: Obtener tarifas filtradas.
Qué pasaría si se quita: No se consultaría nada.

Línea 56: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todas las tarifas.
Con qué se conecta: Con la vista.
Para qué sirve: Entregar datos listos para mostrar.
Qué pasaría si se quita: El método no devolvería resultados.

Línea 57: }
Qué hace exactamente: Cierra listar().
Con qué se conecta: Con línea 34.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 59 a 61: Comentario obtener()
Qué hace exactamente: Explica que obtiene una tarifa por ID.
Con qué se conecta: Con el método obtener().
Para qué sirve: Documentar consulta individual.
Qué pasaría si se quita: No afecta funcionamiento.

Línea 62: public function obtener(int $id): array|false {
Qué hace exactamente: Declara método para consultar una tarifa específica.
Con qué se conecta: Con edición o detalle de tarifas.
Para qué sirve: Cargar datos de una tarifa por ID.
Qué pasaría si se quita: No se podría consultar una tarifa individual.

Líneas 63 a 67: SELECT tarifa por ID
Qué hace exactamente: Busca una tarifa exacta usando id_tarifa.
Con qué se conecta: Con tarifa.id_tarifa.
Para qué sirve: Obtener todos los datos de una tarifa.
Qué pasaría si se quita: No habría consulta individual.

Línea 68: }
Qué hace exactamente: Cierra obtener().
Con qué se conecta: Con línea 62.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 70 a 72: Comentario resumen()
Qué hace exactamente: Explica que genera resumen rápido para tarjetas.
Con qué se conecta: Con resumen().
Para qué sirve: Documentar métricas.
Qué pasaría si se quita: No afecta.

Línea 73: public function resumen(): array {
Qué hace exactamente: Declara método de resumen.
Con qué se conecta: Con tarjetas superiores del módulo tarifas.
Para qué sirve: Contar tarifas totales, activas e inactivas.
Qué pasaría si se quita: No habría métricas.

Líneas 74 a 80: SELECT resumen tarifa
Qué hace exactamente: Cuenta total, activas e inactivas.
Con qué se conecta: Con tabla tarifa y columna activa.
Para qué sirve: Generar estadísticas.
Qué pasaría si se quita: No habría resumen.

Líneas 82 a 86: return resumen
Qué hace exactamente: Devuelve métricas convertidas a enteros.
Con qué se conecta: Con la vista.
Para qué sirve: Evitar valores null y entregar datos limpios.
Qué pasaría si se quitan: El método no devolvería métricas.

Línea 87: }
Qué hace exactamente: Cierra resumen().
Con qué se conecta: Con línea 73.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 89 a 91: Comentario ESCRITURA
Qué hace exactamente: Separa métodos que modifican datos.
Con qué se conecta: Con crear(), actualizar(), toggleActiva(), eliminar() y tieneUso().
Para qué sirve: Ordenar el archivo.
Qué pasaría si se quita: No afecta.

Líneas 93 a 95: Comentario crear()
Qué hace exactamente: Explica que registra una nueva tarifa.
Con qué se conecta: Con crear().
Para qué sirve: Documentar el método.
Qué pasaría si se quita: No afecta.

Línea 96: public function crear(
Qué hace exactamente: Declara método para crear tarifa.
Con qué se conecta: Con TarifaController.php accion crear.
Para qué sirve: Insertar una tarifa nueva.
Qué pasaría si se quita: No se podrían crear tarifas.

Líneas 97 a 101: Parámetros de crear()
Qué hace exactamente: Reciben tipo, valor, fecha inicio, fecha fin y activa.
Con qué se conecta: Con campos del formulario.
Para qué sirve: Enviar datos al INSERT.
Qué pasaría si se quitan: No habría datos suficientes.

Líneas 103 a 108: INSERT INTO tarifa
Qué hace exactamente: Prepara la inserción de la tarifa.
Con qué se conecta: Con tabla tarifa.
Para qué sirve: Guardar una tarifa nueva.
Qué pasaría si se quita: No se insertaría.

Líneas 109 a 113: bindParam crear
Qué hace exactamente: Vincula cada dato con su parámetro SQL.
Con qué se conecta: Con tipo_pago, valor, fechas y activa.
Para qué sirve: Insertar de forma segura.
Qué pasaría si se quitan: El INSERT fallaría.

Línea 114: return $stmt->execute();
Qué hace exactamente: Ejecuta el INSERT.
Con qué se conecta: Con base de datos.
Para qué sirve: Guardar y devolver true/false.
Qué pasaría si se quita: No se crearía la tarifa.

Línea 115: }
Qué hace exactamente: Cierra crear().
Con qué se conecta: Con línea 96.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 120: public function actualizar(
Qué hace exactamente: Declara método para actualizar tarifa existente.
Con qué se conecta: Con TarifaController.php accion editar.
Para qué sirve: Modificar datos de una tarifa.
Qué pasaría si se quita: No se podrían editar tarifas.

Líneas 121 a 127: Parámetros actualizar()
Qué hace exactamente: Reciben ID y nuevos datos.
Con qué se conecta: Con formulario de edición y tabla tarifa.
Para qué sirve: Saber qué tarifa actualizar.
Qué pasaría si se quitan: No habría datos suficientes.

Líneas 129 a 137: UPDATE tarifa
Qué hace exactamente: Actualiza tipo_pago, valor, fechas y activa.
Con qué se conecta: Con tarifa.id_tarifa.
Para qué sirve: Guardar cambios de la tarifa.
Qué pasaría si se quita: No se actualizaría.

Líneas 138 a 144: bindParam actualizar
Qué hace exactamente: Vincula ID y valores nuevos.
Con qué se conecta: Con el UPDATE.
Para qué sirve: Actualizar de forma segura.
Qué pasaría si se quitan: El UPDATE fallaría.

Línea 145: return $stmt->execute();
Qué hace exactamente: Ejecuta la actualización.
Con qué se conecta: Con la base de datos.
Para qué sirve: Guardar cambios.
Qué pasaría si se quita: No se actualizaría la tarifa.

Línea 146: }
Qué hace exactamente: Cierra actualizar().
Con qué se conecta: Con línea 120.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 151: public function toggleActiva(int $id, bool $activa): bool {
Qué hace exactamente: Declara método para habilitar o deshabilitar una tarifa.
Con qué se conecta: Con TarifaController.php accion toggle.
Para qué sirve: Cambiar solo el campo activa.
Qué pasaría si se quita: No se podría activar/desactivar rápido una tarifa.

Líneas 152 a 157: UPDATE activa
Qué hace exactamente: Actualiza activa por id_tarifa.
Con qué se conecta: Con tarifa.activa.
Para qué sirve: Habilitar o deshabilitar.
Qué pasaría si se quita: No cambiaría el estado.

Línea 158: }
Qué hace exactamente: Cierra toggleActiva().
Con qué se conecta: Con línea 151.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 164: public function eliminar(int $id): bool {
Qué hace exactamente: Declara método para eliminar tarifa.
Con qué se conecta: Con TarifaController.php accion eliminar.
Para qué sirve: Borrar una tarifa por ID.
Qué pasaría si se quita: No se podrían eliminar tarifas.

Líneas 165 a 169: DELETE tarifa
Qué hace exactamente: Prepara y ejecuta eliminación por id_tarifa.
Con qué se conecta: Con tabla tarifa.
Para qué sirve: Eliminar la tarifa seleccionada.
Qué pasaría si se quita: No se borraría.

Línea 170: }
Qué hace exactamente: Cierra eliminar().
Con qué se conecta: Con línea 164.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 176: public function tieneUso(int $id): bool {
Qué hace exactamente: Declara método para verificar si una tarifa está en uso.
Con qué se conecta: Con tabla liquidacion.
Para qué sirve: Evitar eliminar tarifas usadas en liquidaciones.
Qué pasaría si se quita: Podrían borrarse tarifas históricas y afectar liquidaciones.

Líneas 177 a 182: SELECT COUNT liquidacion
Qué hace exactamente: Cuenta liquidaciones asociadas a una tarifa.
Con qué se conecta: Con liquidacion.id_tarifa.
Para qué sirve: Saber si la tarifa puede eliminarse.
Qué pasaría si se quita: No habría validación de uso.

Línea 183: }
Qué hace exactamente: Cierra tieneUso().
Con qué se conecta: Con línea 176.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 184: }
Qué hace exactamente: Cierra la clase Tarifa.
Con qué se conecta: Con línea 15.
Para qué sirve: Finaliza modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 185: ?>
Qué hace exactamente: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin formal del archivo.
Qué pasaría si se quita: Puede funcionar en PHP puro, pero aquí se usa cierre formal.

Conclusión:
Este modelo administra tarifas de pago. Se conecta con la tabla tarifa y con liquidacion para validar si una tarifa ya fue usada. Permite listar, consultar, resumir, crear, actualizar, activar/desactivar, eliminar y validar uso.