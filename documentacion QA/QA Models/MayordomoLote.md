Línea 1: <?php
Qué hace exactamente: Abre el archivo PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Ejecutar el modelo MayordomoLote.
Qué pasaría si se quita: No se interpretaría correctamente.

Líneas 2 a 10: Comentario de documentación
Qué hace exactamente: Explica que maneja lotes desde el mayordomo.
Con qué se conecta: Con lote, cultivo, MayordomoLoteController.php y views/mayordomo/lotes.php.
Para qué sirve: Documentar uso y tablas.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 11: class MayordomoLote {
Qué hace exactamente: Declara la clase.
Con qué se conecta: Con MayordomoLoteController.php.
Para qué sirve: Agrupar operaciones de lotes.
Qué pasaría si se quita: No se podría usar el modelo.

Líneas 13 a 17: private $conn y constructor
Qué hace exactamente: Guarda la conexión a BD.
Con qué se conecta: Con Database::conectar().
Para qué sirve: Ejecutar consultas.
Qué pasaría si se quita: Los métodos fallarían.

Línea 28: public function listar(string $busqueda = ''): array {
Qué hace exactamente: Declara método para listar lotes con búsqueda opcional.
Con qué se conecta: Con la vista de lotes del mayordomo.
Para qué sirve: Mostrar lotes y cultivos asociados.
Qué pasaría si se quita: No se podrían listar lotes.

Línea 29: $where = ['1=1'];
Qué hace exactamente: Crea condiciones dinámicas.
Con qué se conecta: Con WHERE de la consulta.
Para qué sirve: Agregar búsqueda fácilmente.
Qué pasaría si se quita: Habría que armar condiciones manuales.

Línea 30: $params = [];
Qué hace exactamente: Crea parámetros.
Con qué se conecta: Con execute($params).
Para qué sirve: Guardar valores seguros.
Qué pasaría si se quita: No se podrían pasar filtros.

Líneas 32 a 35: if búsqueda
Qué hace exactamente: Filtra por nombre de lote, ubicación o cultivo.
Con qué se conecta: Con lote.nombre, lote.ubicacion_descripcion y cultivo.nombre.
Para qué sirve: Buscar lotes.
Qué pasaría si se quita: No habría búsqueda.

Líneas 37 a 50: SELECT lotes
Qué hace exactamente: Consulta datos del lote y cultivo asociado.
Con qué se conecta: Con lote l y cultivo c.
Para qué sirve: Mostrar nombre, ubicación, extensión, fecha y cultivo.
Qué pasaría si se quita: No habría listado.

Línea 45: LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
Qué hace exactamente: Une lote con cultivo.
Con qué se conecta: Con lote.id_cultivo.
Para qué sirve: Mostrar cultivo del lote, incluso si falta relación.
Qué pasaría si se quita: No se mostraría cultivo_nombre.

Líneas 52 a 54: prepare, execute, fetchAll
Qué hace exactamente: Ejecuta consulta y devuelve lotes.
Con qué se conecta: Con PDO y vista.
Para qué sirve: Entregar datos.
Qué pasaría si se quita: No habría resultados.

Línea 60: public function listarCultivos(): array {
Qué hace exactamente: Declara método para listar cultivos activos.
Con qué se conecta: Con el formulario de lotes.
Para qué sirve: Llenar select de cultivos.
Qué pasaría si se quita: No se podrían seleccionar cultivos.

Líneas 61 a 67: SELECT cultivos activos
Qué hace exactamente: Trae id, nombre y variedad de cultivos activos.
Con qué se conecta: Con tabla cultivo.
Para qué sirve: Asociar un lote a un cultivo válido.
Qué pasaría si se quita: El formulario no tendría opciones.

Línea 73: public function resumen(): array {
Qué hace exactamente: Declara método de métricas.
Con qué se conecta: Con tarjetas superiores de lotes.
Para qué sirve: Obtener total, extensión total y tipos de cultivo.
Qué pasaría si se quita: No habría resumen.

Líneas 74 a 80: SELECT resumen
Qué hace exactamente: Cuenta lotes, suma extensión y cuenta cultivos distintos.
Con qué se conecta: Con tabla lote.
Para qué sirve: Mostrar estadísticas del módulo.
Qué pasaría si se quita: No se mostrarían métricas.

Líneas 82 a 86: return resumen
Qué hace exactamente: Devuelve datos convertidos a int/float.
Con qué se conecta: Con la vista.
Para qué sirve: Entregar datos limpios.
Qué pasaría si se quita: El método no devolvería métricas.

Línea 99: public function registrar(...)
Qué hace exactamente: Declara método para crear lote.
Con qué se conecta: Con MayordomoLoteController.php accion registrar.
Para qué sirve: Insertar lote nuevo.
Qué pasaría si se quita: No se podrían registrar lotes.

Líneas 106 a 109: INSERT INTO lote
Qué hace exactamente: Prepara inserción de nombre, ubicación, extensión, cultivo y fecha.
Con qué se conecta: Con tabla lote.
Para qué sirve: Guardar nuevo lote.
Qué pasaría si se quita: No se insertaría.

Líneas 110 a 115: bindParam registrar
Qué hace exactamente: Vincula datos del formulario.
Con qué se conecta: Con columnas de lote.
Para qué sirve: Insertar de forma segura.
Qué pasaría si se quita: El INSERT fallaría.

Línea 116: return $stmt->execute();
Qué hace exactamente: Ejecuta inserción.
Con qué se conecta: Con base de datos.
Para qué sirve: Guardar y devolver resultado.
Qué pasaría si se quita: No se guardaría.

Línea 122: public function editar(...)
Qué hace exactamente: Declara método para editar lote.
Con qué se conecta: Con accion editar.
Para qué sirve: Actualizar datos de un lote.
Qué pasaría si se quita: No se podrían editar lotes.

Líneas 131 a 139: UPDATE lote
Qué hace exactamente: Actualiza nombre, ubicación, extensión, cultivo y fecha.
Con qué se conecta: Con lote.id_lote.
Para qué sirve: Guardar cambios del lote seleccionado.
Qué pasaría si se quita: No habría actualización.

Líneas 140 a 146: bindParam editar
Qué hace exactamente: Vincula ID y nuevos valores.
Con qué se conecta: Con formulario y tabla lote.
Para qué sirve: Actualizar de forma segura.
Qué pasaría si se quita: El UPDATE fallaría.

Conclusión:
Este modelo permite al mayordomo consultar, resumir, registrar y editar lotes. Se conecta con lote y cultivo, y es usado por el controlador y la vista de lotes del mayordomo.