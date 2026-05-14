Línea 1: <?php
Qué hace exactamente: Abre el archivo como PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Permite ejecutar la clase TrabajadorTarea.
Qué pasaría si se quita: El archivo podría no interpretarse correctamente.

Líneas 2 a 8: Comentario de documentación
Qué hace exactamente: Explica que el modelo maneja Mis Tareas del trabajador.
Con qué se conecta: Con tarea, tarea_trabajador, lote y usuario.
Para qué sirve: Documentar las tablas usadas.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 9: class TrabajadorTarea {
Qué hace exactamente: Declara la clase TrabajadorTarea.
Con qué se conecta: Con TrabajadorTareaController.php.
Para qué sirve: Agrupar métodos para listar, resumir y completar tareas.
Qué pasaría si se quita: No se podría usar el modelo.

Línea 11: private $conn;
Qué hace exactamente: Declara conexión privada.
Con qué se conecta: Con PDO.
Para qué sirve: Guardar conexión a la base de datos.
Qué pasaría si se quita: Los métodos no podrían consultar ni actualizar.

Línea 13: public function __construct($db) {
Qué hace exactamente: Declara constructor.
Con qué se conecta: Con new TrabajadorTarea($db).
Para qué sirve: Recibir conexión.
Qué pasaría si se quita: No se inicializaría $conn.

Línea 14: $this->conn = $db;
Qué hace exactamente: Guarda la conexión.
Con qué se conecta: Con todos los métodos.
Para qué sirve: Ejecutar consultas SQL.
Qué pasaría si se quita: Las consultas fallarían.

Línea 15: }
Qué hace exactamente: Cierra constructor.
Con qué se conecta: Con línea 13.
Para qué sirve: Finaliza inicialización.
Qué pasaría si se quita: Error de sintaxis.

Líneas 17 a 20: Comentario listar()
Qué hace exactamente: Explica que lista tareas asignadas al trabajador.
Con qué se conecta: Con tarea_trabajador.
Para qué sirve: Documentar filtro por estado.
Qué pasaría si se quita: No afecta.

Línea 21: public function listar(int $id_trabajador, string $estado = ''): array {
Qué hace exactamente: Declara método para listar tareas del trabajador.
Con qué se conecta: Con la vista Mis Tareas.
Para qué sirve: Mostrar solo tareas asignadas al trabajador logueado.
Qué pasaría si se quita: El trabajador no podría ver sus tareas.

Línea 22: $where = ['tt.id_trabajador = :id'];
Qué hace exactamente: Crea condición obligatoria por trabajador.
Con qué se conecta: Con tarea_trabajador.id_trabajador.
Para qué sirve: Evitar mostrar tareas de otros trabajadores.
Qué pasaría si se quita: Podrían aparecer tareas ajenas.

Línea 23: $params = [':id' => $id_trabajador];
Qué hace exactamente: Guarda el ID del trabajador como parámetro.
Con qué se conecta: Con :id.
Para qué sirve: Ejecutar filtro seguro.
Qué pasaría si se quita: La consulta fallaría.

Líneas 25 a 28: Filtro por estado
Qué hace exactamente: Si se envía estado, agrega condición t.estado_tarea = :estado.
Con qué se conecta: Con tarea.estado_tarea.
Para qué sirve: Filtrar pendientes, en progreso o completadas.
Qué pasaría si se quita: No habría filtro por estado.

Líneas 30 a 47: SELECT tareas asignadas
Qué hace exactamente: Consulta datos de tarea, lote, mayordomo y asignación.
Con qué se conecta: Con tarea_trabajador, tarea, lote y usuario.
Para qué sirve: Mostrar nombre, descripción, estado, fechas, lote y mayordomo.
Qué pasaría si se quita: No habría listado de tareas.

Líneas 41 a 43: INNER JOIN tarea, lote, usuario
Qué hace exactamente: Relaciona asignación con tarea, lote y mayordomo.
Con qué se conecta: Con id_tarea, id_lote e id_mayordomo.
Para qué sirve: Obtener información completa de la tarea.
Qué pasaría si se quita: Faltarían datos importantes.

Líneas 45 a 47: ORDER BY FIELD(...)
Qué hace exactamente: Ordena tareas por estado y fecha final.
Con qué se conecta: Con tarea.estado_tarea y fecha_fin_estimada.
Para qué sirve: Mostrar primero pendientes, luego en progreso y completadas.
Qué pasaría si se quita: El orden sería menos lógico.

Líneas 49 a 51: prepare, execute, fetchAll
Qué hace exactamente: Prepara, ejecuta y devuelve resultados.
Con qué se conecta: Con PDO y la vista.
Para qué sirve: Entregar tareas del trabajador.
Qué pasaría si se quitan: No habría resultados.

Línea 52: }
Qué hace exactamente: Cierra listar().
Con qué se conecta: Con línea 21.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 54 a 56: Comentario resumen()
Qué hace exactamente: Explica que genera resumen para tarjetas.
Con qué se conecta: Con resumen().
Para qué sirve: Documentar métricas.
Qué pasaría si se quita: No afecta.

Línea 57: public function resumen(int $id_trabajador): array {
Qué hace exactamente: Declara método para resumir tareas.
Con qué se conecta: Con tarjetas del módulo Mis Tareas.
Para qué sirve: Contar tareas totales, pendientes, en proceso y completadas.
Qué pasaría si se quita: No habría métricas.

Líneas 58 a 66: SELECT resumen
Qué hace exactamente: Cuenta tareas por estado del trabajador.
Con qué se conecta: Con tarea_trabajador y tarea.
Para qué sirve: Generar estadísticas del trabajador.
Qué pasaría si se quita: No habría resumen.

Líneas 67 a 69: bind, execute y fetch
Qué hace exactamente: Vincula ID, ejecuta y obtiene fila.
Con qué se conecta: Con :id.
Para qué sirve: Calcular métricas del trabajador correcto.
Qué pasaría si se quitan: No se generaría resumen.

Líneas 71 a 76: return resumen
Qué hace exactamente: Devuelve métricas convertidas a enteros.
Con qué se conecta: Con la vista.
Para qué sirve: Mostrar tarjetas sin valores null.
Qué pasaría si se quitan: No habría retorno.

Línea 77: }
Qué hace exactamente: Cierra resumen().
Con qué se conecta: Con línea 57.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 79 a 83: Comentario completar()
Qué hace exactamente: Explica que completa una tarea desde la perspectiva del trabajador.
Con qué se conecta: Con tarea_trabajador.estado_detalle y tarea.estado_tarea.
Para qué sirve: Documentar cómo cambia el estado individual y general.
Qué pasaría si se quita: No afecta.

Línea 84: public function completar(int $id_tarea, int $id_trabajador): bool {
Qué hace exactamente: Declara método para completar tarea.
Con qué se conecta: Con TrabajadorTareaController.php.
Para qué sirve: Marcar como completada la asignación de un trabajador.
Qué pasaría si se quita: No se podrían completar tareas.

Línea 85: $this->conn->beginTransaction();
Qué hace exactamente: Inicia transacción.
Con qué se conecta: Con commit y rollBack.
Para qué sirve: Asegura que detalle y tarea se actualicen juntos.
Qué pasaría si se quita: Podrían quedar datos incompletos.

Línea 86: try {
Qué hace exactamente: Inicia manejo de errores.
Con qué se conecta: Con catch.
Para qué sirve: Revertir si algo falla.
Qué pasaría si se quita: No habría control de errores.

Líneas 88 a 96: UPDATE tarea_trabajador
Qué hace exactamente: Marca el detalle del trabajador como COMPLETADA y guarda fecha_finalizacion.
Con qué se conecta: Con tarea_trabajador.
Para qué sirve: Registrar que ese trabajador terminó.
Qué pasaría si se quita: No se actualizaría la tarea del trabajador.

Líneas 99 a 106: SELECT pendientes
Qué hace exactamente: Cuenta trabajadores de la tarea que aún no completan.
Con qué se conecta: Con tarea_trabajador.estado_detalle.
Para qué sirve: Saber si la tarea global puede pasar a COMPLETADA.
Qué pasaría si se quita: No se sabría si todos terminaron.

Línea 109: if ($pendientes === 0) {
Qué hace exactamente: Verifica si todos los trabajadores completaron.
Con qué se conecta: Con el conteo $pendientes.
Para qué sirve: Decidir si tarea general se marca como COMPLETADA.
Qué pasaría si se quita: No se actualizaría correctamente el estado general.

Líneas 110 a 115: UPDATE tarea COMPLETADA
Qué hace exactamente: Cambia estado_tarea a COMPLETADA.
Con qué se conecta: Con tabla tarea.
Para qué sirve: Finalizar tarea global.
Qué pasaría si se quita: La tarea seguiría sin completarse aunque todos terminen.

Líneas 116 a 123: UPDATE tarea EN_PROGRESO
Qué hace exactamente: Si aún hay pendientes, cambia la tarea a EN_PROGRESO si estaba PENDIENTE.
Con qué se conecta: Con tabla tarea.
Para qué sirve: Indicar avance parcial.
Qué pasaría si se quita: La tarea podría quedar pendiente aunque alguien ya trabajó.

Línea 126: $this->conn->commit();
Qué hace exactamente: Confirma la transacción.
Con qué se conecta: Con beginTransaction().
Para qué sirve: Guarda todos los cambios.
Qué pasaría si se quita: Podrían no confirmarse cambios.

Línea 127: return true;
Qué hace exactamente: Devuelve éxito.
Con qué se conecta: Con el controlador.
Para qué sirve: Informar que se completó la tarea.
Qué pasaría si se quita: El controlador no sabría si funcionó.

Líneas 128 a 131: catch
Qué hace exactamente: Reversa la transacción y devuelve false.
Con qué se conecta: Con rollBack().
Para qué sirve: Evitar cambios parciales.
Qué pasaría si se quita: Podrían quedar datos inconsistentes.

Línea 132: }
Qué hace exactamente: Cierra completar().
Con qué se conecta: Con línea 84.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 133: }
Qué hace exactamente: Cierra clase.
Con qué se conecta: Con línea 9.
Para qué sirve: Finaliza modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 134: ?>
Qué hace exactamente: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin formal.
Qué pasaría si se quita: Puede funcionar, pero aquí se usa cierre formal.

Conclusión:
Este modelo maneja las tareas desde la perspectiva del trabajador. Se conecta con tarea, tarea_trabajador, lote y usuario. Permite listar tareas asignadas, generar resumen y marcar tareas como completadas, actualizando tanto el estado individual como el general.