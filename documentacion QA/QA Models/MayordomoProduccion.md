Línea 1: <?php
Qué hace exactamente: Abre PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Ejecutar el modelo.
Qué pasaría si se quita: No se interpretaría correctamente.

Líneas 2 a 14: Comentario de documentación
Qué hace exactamente: Explica que maneja producción del mayordomo.
Con qué se conecta: Con produccion, trabajador, usuario y lote.
Para qué sirve: Documentar columnas y propósito.
Qué pasaría si se quita: Código funciona, pero pierde explicación.

Línea 15: class MayordomoProduccion {
Qué hace exactamente: Declara clase.
Con qué se conecta: Con MayordomoProduccionController.php.
Para qué sirve: Agrupar operaciones de producción.
Qué pasaría si se quita: No se podría usar el modelo.

Líneas 17 a 21: private $conn y constructor
Qué hace exactamente: Guarda conexión PDO.
Con qué se conecta: Con Database::conectar().
Para qué sirve: Ejecutar consultas.
Qué pasaría si se quita: Métodos fallarían.

Línea 31: public function listar(...)
Qué hace exactamente: Declara método para listar producción filtrada.
Con qué se conecta: Con vista de producción del mayordomo.
Para qué sirve: Mostrar registros de trabajadores asignados a ese mayordomo.
Qué pasaría si se quita: No habría listado.

Línea 37: $where = ['1=1'];
Qué hace exactamente: Inicia condiciones dinámicas.
Con qué se conecta: Con el WHERE de SQL.
Para qué sirve: Agregar filtros.
Qué pasaría si se quita: Habría que construir WHERE manual.

Línea 38: $params = [];
Qué hace exactamente: Crea arreglo de parámetros.
Con qué se conecta: Con execute($params).
Para qué sirve: Guardar valores seguros.
Qué pasaría si se quita: Filtros fallarían.

Líneas 41 a 47: EXISTS tareas del mayordomo
Qué hace exactamente: Filtra producción solo de trabajadores asignados a tareas del mayordomo.
Con qué se conecta: Con tarea_trabajador y tarea.
Para qué sirve: Evitar que el mayordomo vea producción de trabajadores que no le corresponden.
Qué pasaría si se quita: Podría ver producción de todos.

Línea 48: $params[':mayordomo'] = $id_mayordomo;
Qué hace exactamente: Guarda ID del mayordomo.
Con qué se conecta: Con :mayordomo.
Para qué sirve: Aplicar filtro de pertenencia.
Qué pasaría si se quita: Consulta fallaría.

Líneas 50 a 53: if búsqueda
Qué hace exactamente: Filtra por nombre de trabajador o lote.
Con qué se conecta: Con usuario y lote.
Para qué sirve: Buscar registros específicos.
Qué pasaría si se quita: No habría búsqueda.

Líneas 54 a 61: filtros de fecha
Qué hace exactamente: Agrega filtros por fecha inicio y fecha fin.
Con qué se conecta: Con produccion.fecha.
Para qué sirve: Consultar producción en rango.
Qué pasaría si se quita: No se podría filtrar por fechas.

Líneas 64 a 78: SELECT producción
Qué hace exactamente: Consulta producción con trabajador y lote.
Con qué se conecta: Con produccion p, trabajador tr, usuario u y lote l.
Para qué sirve: Mostrar fecha, trabajador, lote, cantidad y unidad.
Qué pasaría si se quita: No habría datos para la tabla.

Líneas 80 a 82: prepare, execute, fetchAll
Qué hace exactamente: Ejecuta consulta y devuelve resultados.
Con qué se conecta: Con PDO y la vista.
Para qué sirve: Entregar registros de producción.
Qué pasaría si se quita: No habría resultados.

Línea 88: public function resumen(int $id_mayordomo): array {
Qué hace exactamente: Declara método de estadísticas.
Con qué se conecta: Con tarjetas de producción.
Para qué sirve: Mostrar total de registros, kg, trabajadores y lotes.
Qué pasaría si se quita: No habría resumen.

Líneas 89 a 102: SELECT resumen producción
Qué hace exactamente: Calcula conteos y sumas de producción del ámbito del mayordomo.
Con qué se conecta: Con produccion, tarea_trabajador y tarea.
Para qué sirve: Mostrar métricas solo de sus trabajadores.
Qué pasaría si se quita: No habría estadísticas o podrían ser globales.

Líneas 103 a 113: bind, execute, fetch y return
Qué hace exactamente: Ejecuta resumen y devuelve valores convertidos.
Con qué se conecta: Con la vista.
Para qué sirve: Entregar datos para tarjetas.
Qué pasaría si se quita: No habría métricas.

Línea 119: public function listarTrabajadores(int $id_mayordomo): array {
Qué hace exactamente: Declara método para trabajadores activos del mayordomo.
Con qué se conecta: Con trabajador, usuario, tarea_trabajador y tarea.
Para qué sirve: Llenar select de trabajador.
Qué pasaría si se quita: No habría trabajadores disponibles para registrar producción.

Líneas 120 a 137: SELECT trabajadores
Qué hace exactamente: Trae trabajadores activos asignados a tareas del mayordomo.
Con qué se conecta: Con estado_trabajador y tareas.
Para qué sirve: Controlar que registre producción de trabajadores bajo su gestión.
Qué pasaría si se quita: Podrían aparecer trabajadores incorrectos.

Línea 143: public function listarLotes(): array {
Qué hace exactamente: Declara método para listar lotes.
Con qué se conecta: Con lote y cultivo.
Para qué sirve: Llenar select de lote.
Qué pasaría si se quita: No se podrían elegir lotes.

Líneas 144 a 151: SELECT lotes
Qué hace exactamente: Trae lotes con cultivo asociado.
Con qué se conecta: Con lote y cultivo.
Para qué sirve: Mostrar el lote y su cultivo en el formulario.
Qué pasaría si se quita: No habría listado de lotes.

Línea 164: public function registrar(...)
Qué hace exactamente: Declara método para insertar producción.
Con qué se conecta: Con MayordomoProduccionController.php accion registrar.
Para qué sirve: Guardar nuevo registro productivo.
Qué pasaría si se quita: No se podría registrar producción.

Líneas 171 a 174: INSERT INTO produccion
Qué hace exactamente: Inserta trabajador, lote, fecha, cantidad y unidad.
Con qué se conecta: Con tabla produccion.
Para qué sirve: Registrar producción.
Qué pasaría si se quita: No se guardaría.

Líneas 175 a 180: bindParam registrar
Qué hace exactamente: Vincula valores del formulario.
Con qué se conecta: Con columnas de produccion.
Para qué sirve: Insertar seguro.
Qué pasaría si se quita: INSERT fallaría.

Línea 187: public function editar(...)
Qué hace exactamente: Declara método para actualizar producción.
Con qué se conecta: Con accion editar.
Para qué sirve: Modificar un registro existente.
Qué pasaría si se quita: No se podría editar producción.

Líneas 196 a 204: UPDATE produccion
Qué hace exactamente: Actualiza trabajador, lote, fecha, cantidad y unidad.
Con qué se conecta: Con produccion.id_produccion.
Para qué sirve: Guardar correcciones.
Qué pasaría si se quita: No habría actualización.

Líneas 205 a 211: bindParam editar
Qué hace exactamente: Vincula ID y datos nuevos.
Con qué se conecta: Con la tabla produccion.
Para qué sirve: Actualizar de forma segura.
Qué pasaría si se quita: UPDATE fallaría.

Línea 218: public function eliminar(int $id): bool {
Qué hace exactamente: Declara método para eliminar producción.
Con qué se conecta: Con accion eliminar.
Para qué sirve: Borrar un registro por ID.
Qué pasaría si se quita: No se podrían eliminar registros.

Líneas 219 a 223: DELETE FROM produccion
Qué hace exactamente: Borra producción por id_produccion.
Con qué se conecta: Con tabla produccion.
Para qué sirve: Eliminar el registro seleccionado.
Qué pasaría si se quita: No se borraría.

Conclusión:
Este modelo maneja la producción registrada por el mayordomo. Se conecta con producción, trabajadores, usuarios, lotes y tareas para asegurar que el mayordomo solo vea y registre producción de trabajadores bajo su gestión.