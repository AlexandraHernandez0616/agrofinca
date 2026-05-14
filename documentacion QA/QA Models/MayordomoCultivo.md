Línea 1: <?php
Qué hace exactamente: Abre el archivo PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Ejecutar la clase MayordomoCultivo.
Qué pasaría si se quita: El archivo no se interpretaría correctamente.

Líneas 2 a 14: Comentario de documentación
Qué hace exactamente: Explica que el modelo maneja cultivos del mayordomo.
Con qué se conecta: Con la tabla cultivo.
Para qué sirve: Documentar columnas y estados posibles.
Qué pasaría si se quita: Código funciona, pero se pierde explicación.

Línea 15: class MayordomoCultivo {
Qué hace exactamente: Declara la clase.
Con qué se conecta: Con MayordomoCultivoController.php.
Para qué sirve: Agrupar métodos de cultivos.
Qué pasaría si se quita: No se podría usar el modelo.

Líneas 17 a 21: private $conn y constructor
Qué hace exactamente: Guarda la conexión PDO en el modelo.
Con qué se conecta: Con Database::conectar().
Para qué sirve: Permitir consultas a la base de datos.
Qué pasaría si se quita: Los métodos no funcionarían.

Línea 31: public function listar(string $busqueda = '', string $estado = ''): array {
Qué hace exactamente: Declara método para listar cultivos con filtros.
Con qué se conecta: Con la vista de cultivos del mayordomo.
Para qué sirve: Mostrar cultivos por búsqueda o estado.
Qué pasaría si se quita: No se podrían listar cultivos.

Línea 32: $where = ['1=1'];
Qué hace exactamente: Inicia condiciones SQL dinámicas.
Con qué se conecta: Con el WHERE final.
Para qué sirve: Agregar filtros fácilmente.
Qué pasaría si se quita: Habría que armar manualmente el WHERE.

Línea 33: $params = [];
Qué hace exactamente: Crea arreglo de parámetros.
Con qué se conecta: Con execute($params).
Para qué sirve: Guardar valores de búsqueda y estado.
Qué pasaría si se quita: Los filtros no tendrían parámetros.

Líneas 35 a 38: if búsqueda
Qué hace exactamente: Si hay búsqueda, filtra por nombre o variedad.
Con qué se conecta: Con cultivo.nombre y cultivo.variedad.
Para qué sirve: Buscar cultivos específicos.
Qué pasaría si se quita: No habría búsqueda textual.

Líneas 39 a 42: if estado
Qué hace exactamente: Si hay estado, filtra por ACTIVO o INHABILITADO.
Con qué se conecta: Con cultivo.estado.
Para qué sirve: Mostrar solo cultivos de un estado.
Qué pasaría si se quita: No habría filtro por estado.

Líneas 44 a 56: SELECT cultivo con lotes asociados
Qué hace exactamente: Consulta datos del cultivo y cuenta lotes relacionados.
Con qué se conecta: Con cultivo c y lote l.
Para qué sirve: Mostrar cultivos y cuántos lotes usan cada cultivo.
Qué pasaría si se quita: No habría listado completo.

Línea 53: LEFT JOIN lote l ON l.id_cultivo = c.id_cultivo
Qué hace exactamente: Une cultivo con lote.
Con qué se conecta: Con lote.id_cultivo.
Para qué sirve: Contar lotes asociados aunque sean cero.
Qué pasaría si se quita: No se podría calcular lotes_asociados.

Línea 55: GROUP BY c.id_cultivo
Qué hace exactamente: Agrupa por cultivo.
Con qué se conecta: Con COUNT(l.id_lote).
Para qué sirve: Evitar duplicados y contar correctamente.
Qué pasaría si se quita: El conteo podría ser incorrecto.

Líneas 58 a 60: prepare, execute, fetchAll
Qué hace exactamente: Ejecuta la consulta y devuelve cultivos.
Con qué se conecta: Con PDO y la vista.
Para qué sirve: Entregar datos filtrados.
Qué pasaría si se quita: No se obtendrían resultados.

Línea 66: public function resumen(): array {
Qué hace exactamente: Declara método de estadísticas.
Con qué se conecta: Con tarjetas superiores de cultivos.
Para qué sirve: Calcular total, activos, inhabilitados y cantidad total cultivada.
Qué pasaría si se quita: No habría resumen.

Líneas 67 a 74: SELECT resumen cultivo
Qué hace exactamente: Cuenta cultivos por estado y suma cantidad_cultivada.
Con qué se conecta: Con la tabla cultivo.
Para qué sirve: Mostrar métricas del módulo.
Qué pasaría si se quita: No habría datos estadísticos.

Líneas 76 a 81: return resumen
Qué hace exactamente: Devuelve métricas convertidas a int o float.
Con qué se conecta: Con la vista.
Para qué sirve: Evitar valores nulos.
Qué pasaría si se quita: No se devolvería resumen.

Línea 94: public function registrar(...)
Qué hace exactamente: Declara método para registrar un cultivo.
Con qué se conecta: Con MayordomoCultivoController.php accion registrar.
Para qué sirve: Insertar un cultivo nuevo.
Qué pasaría si se quita: No se podrían registrar cultivos.

Líneas 101 a 104: INSERT INTO cultivo
Qué hace exactamente: Prepara inserción de nombre, variedad, cantidad, fecha y estado.
Con qué se conecta: Con la tabla cultivo.
Para qué sirve: Guardar cultivo nuevo.
Qué pasaría si se quita: No se insertaría.

Líneas 105 a 109: bindParam registrar
Qué hace exactamente: Vincula variables al INSERT.
Con qué se conecta: Con los datos del formulario.
Para qué sirve: Guardar datos de forma segura.
Qué pasaría si se quita: El INSERT fallaría.

Línea 110: return $stmt->execute();
Qué hace exactamente: Ejecuta el INSERT.
Con qué se conecta: Con la base de datos.
Para qué sirve: Registrar y devolver resultado.
Qué pasaría si se quita: No se guardaría.

Línea 116: public function editar(...)
Qué hace exactamente: Declara método para actualizar cultivo.
Con qué se conecta: Con accion editar del controlador.
Para qué sirve: Modificar un cultivo existente.
Qué pasaría si se quita: No se podrían editar cultivos.

Líneas 125 a 133: UPDATE cultivo
Qué hace exactamente: Actualiza nombre, variedad, cantidad, fecha y estado.
Con qué se conecta: Con cultivo.id_cultivo.
Para qué sirve: Guardar cambios del cultivo correcto.
Qué pasaría si se quita: No habría actualización.

Líneas 134 a 140: bindParam editar
Qué hace exactamente: Vincula ID y datos nuevos.
Con qué se conecta: Con el formulario.
Para qué sirve: Ejecutar actualización segura.
Qué pasaría si se quita: El UPDATE fallaría.

Línea 147: public function toggleEstado(int $id, string $estado): bool {
Qué hace exactamente: Declara método para cambiar solo el estado.
Con qué se conecta: Con accion toggle_estado.
Para qué sirve: Activar o inhabilitar un cultivo.
Qué pasaría si se quita: No se podría cambiar estado rápido.

Líneas 148 a 153: UPDATE estado
Qué hace exactamente: Actualiza cultivo.estado por ID.
Con qué se conecta: Con tabla cultivo.
Para qué sirve: Cambiar entre ACTIVO e INHABILITADO.
Qué pasaría si se quita: No se cambiaría estado.

Línea 161: public function eliminar(int $id): bool {
Qué hace exactamente: Declara método para borrar cultivo.
Con qué se conecta: Con accion eliminar.
Para qué sirve: Eliminar cultivo si el controlador ya validó que no tiene lotes.
Qué pasaría si se quita: No se podrían eliminar cultivos.

Líneas 162 a 166: DELETE cultivo
Qué hace exactamente: Borra cultivo por id_cultivo.
Con qué se conecta: Con tabla cultivo.
Para qué sirve: Eliminar el registro seleccionado.
Qué pasaría si se quita: No se borraría.

Línea 172: public function tieneLotes(int $id): bool {
Qué hace exactamente: Declara método para verificar lotes asociados.
Con qué se conecta: Con la tabla lote.
Para qué sirve: Evitar eliminar cultivos que están siendo usados.
Qué pasaría si se quita: Podrían eliminarse cultivos con lotes relacionados.

Líneas 173 a 178: SELECT COUNT FROM lote
Qué hace exactamente: Cuenta lotes cuyo id_cultivo coincide.
Con qué se conecta: Con lote.id_cultivo.
Para qué sirve: Validar dependencia.
Qué pasaría si se quita: No habría control de relaciones.

Línea 184: public function existeDuplicado(...)
Qué hace exactamente: Declara método para detectar cultivo repetido.
Con qué se conecta: Con cultivo.nombre y cultivo.variedad.
Para qué sirve: Evitar duplicados.
Qué pasaría si se quita: Podrían registrarse cultivos repetidos.

Líneas 185 a 194: SELECT duplicado
Qué hace exactamente: Busca si ya existe un cultivo con mismo nombre y variedad, excluyendo ID en edición.
Con qué se conecta: Con tabla cultivo.
Para qué sirve: Validar unicidad lógica.
Qué pasaría si se quita: No se detectarían duplicados.

Conclusión:
Este modelo maneja los cultivos desde el rol mayordomo. Se conecta con cultivo y lote para listar, resumir, crear, editar, activar, inhabilitar, eliminar y validar duplicados o relaciones con lotes.