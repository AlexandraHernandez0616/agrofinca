Línea 1: <?php
Qué hace exactamente: Abre PHP.
Con qué se conecta: Con el servidor.
Para qué sirve: Ejecutar el modelo.
Qué pasaría si se quita: No se interpreta correctamente.

Líneas 2 a 8: Comentario de documentación
Qué hace exactamente: Explica que el modelo maneja liquidaciones temporales del mayordomo.
Con qué se conecta: Con autorizacion_delegada, liquidacion, tarifa, trabajador y usuario.
Para qué sirve: Documentar el alcance del modelo.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 9: class MayordomoLiquidacionTemporal {
Qué hace exactamente: Declara la clase.
Con qué se conecta: Con MayordomoLiquidacionTemporalController.php.
Para qué sirve: Agrupar operaciones de permisos y liquidaciones temporales.
Qué pasaría si se quita: No se podría usar el modelo.

Líneas 11 a 15: private $conn y constructor
Qué hace exactamente: Guarda la conexión PDO.
Con qué se conecta: Con Database::conectar().
Para qué sirve: Ejecutar consultas.
Qué pasaría si se quita: No habría conexión.

Línea 26: public function obtenerPermisoActivo(int $id_mayordomo): array|false {
Qué hace exactamente: Declara método para buscar permiso activo de un mayordomo.
Con qué se conecta: Con autorizacion_delegada.
Para qué sirve: Saber si el mayordomo puede generar liquidaciones temporales.
Qué pasaría si se quita: No se podría validar permiso.

Líneas 28 a 33: UPDATE expiradas
Qué hace exactamente: Cambia a EXPIRADA permisos activos con fecha_fin vencida.
Con qué se conecta: Con autorizacion_delegada.estado y fecha_fin.
Para qué sirve: Mantener permisos actualizados automáticamente.
Qué pasaría si se quita: Un permiso vencido podría seguir apareciendo activo.

Líneas 35 a 51: SELECT permiso activo
Qué hace exactamente: Consulta autorización activa con fechas, acciones, monto y nombres del admin/mayordomo.
Con qué se conecta: Con autorizacion_delegada y usuario.
Para qué sirve: Obtener todos los datos del permiso vigente.
Qué pasaría si se quita: No se sabría si hay permiso activo.

Línea 52: $stmt->bindParam(':id', $id_mayordomo, PDO::PARAM_INT);
Qué hace exactamente: Vincula el ID del mayordomo.
Con qué se conecta: Con a.id_mayordomo = :id.
Para qué sirve: Buscar permiso del mayordomo correcto.
Qué pasaría si se quita: La consulta fallaría.

Líneas 53 a 54: execute y fetch
Qué hace exactamente: Ejecuta y devuelve un permiso o false.
Con qué se conecta: Con el controlador.
Para qué sirve: Autorizar o bloquear acciones.
Qué pasaría si se quita: No habría resultado.

Línea 64: public function listarTrabajadores(int $id_mayordomo): array {
Qué hace exactamente: Declara método para listar trabajadores activos asignados a tareas del mayordomo.
Con qué se conecta: Con trabajador, usuario, tarea_trabajador y tarea.
Para qué sirve: Mostrar trabajadores válidos para liquidar temporalmente.
Qué pasaría si se quita: No habría lista de trabajadores en el formulario.

Líneas 65 a 79: SELECT trabajadores asignados
Qué hace exactamente: Consulta trabajadores activos que existen en tareas del mayordomo.
Con qué se conecta: Con estado_trabajador, tarea_trabajador y tarea.id_mayordomo.
Para qué sirve: Evitar que el mayordomo liquide trabajadores que no le pertenecen.
Qué pasaría si se quita: Podrían aparecer trabajadores no asignados.

Líneas 80 a 82: bind, execute, fetchAll
Qué hace exactamente: Filtra por mayordomo y devuelve resultados.
Con qué se conecta: Con la vista.
Para qué sirve: Llenar el select de trabajadores.
Qué pasaría si se quita: No se obtendrían datos.

Línea 88: public function listarTarifas(): array {
Qué hace exactamente: Declara método para listar tarifas activas.
Con qué se conecta: Con tabla tarifa.
Para qué sirve: Llenar select de tarifas.
Qué pasaría si se quita: No se podrían elegir tarifas.

Líneas 89 a 95: SELECT tarifas activas
Qué hace exactamente: Trae id_tarifa, tipo_pago y valor donde activa = 1.
Con qué se conecta: Con tarifa.
Para qué sirve: Usar solo tarifas válidas.
Qué pasaría si se quita: No habría tarifas disponibles.

Línea 103: public function jornadasTrabajador(...)
Qué hace exactamente: Declara método para contar jornadas de asistencia en un rango.
Con qué se conecta: Con tabla asistencia.
Para qué sirve: Autocompletar días trabajados.
Qué pasaría si se quita: El sistema no calcularía jornadas automáticamente.

Líneas 104 a 109: SELECT COUNT asistencia
Qué hace exactamente: Cuenta registros de asistencia entre fecha inicio y fin.
Con qué se conecta: Con asistencia.id_trabajador y asistencia.fecha.
Para qué sirve: Saber cuántos días trabajó el trabajador.
Qué pasaría si se quita: No habría cálculo de jornadas.

Líneas 110 a 114: bindParam y retorno
Qué hace exactamente: Vincula trabajador, inicio, fin y devuelve entero.
Con qué se conecta: Con el controlador GET jornadas.
Para qué sirve: Enviar conteo al frontend.
Qué pasaría si se quita: La consulta fallaría.

Línea 124: public function listarMias(int $id_autorizacion): array {
Qué hace exactamente: Lista liquidaciones generadas bajo una autorización.
Con qué se conecta: Con liquidacion.id_autorizacion.
Para qué sirve: Mostrar al mayordomo sus liquidaciones temporales.
Qué pasaría si se quita: No se podrían listar liquidaciones temporales propias.

Líneas 125 a 148: SELECT liquidaciones temporales
Qué hace exactamente: Trae código, trabajador, período, valor, fecha, hora, estado, observación, tipo de pago y jornadas.
Con qué se conecta: Con liquidacion, trabajador, usuario y tarifa.
Para qué sirve: Mostrar historial de liquidaciones temporales.
Qué pasaría si se quita: No habría listado.

Línea 149: $stmt->bindParam(':id_aut', $id_autorizacion, PDO::PARAM_INT);
Qué hace exactamente: Filtra por autorización.
Con qué se conecta: Con l.id_autorizacion = :id_aut.
Para qué sirve: Mostrar solo las liquidaciones del permiso activo.
Qué pasaría si se quita: La consulta fallaría o traería datos incorrectos.

Líneas 150 a 151: execute y fetchAll
Qué hace exactamente: Ejecuta y devuelve datos.
Con qué se conecta: Con la vista.
Para qué sirve: Mostrar resultados.
Qué pasaría si se quita: No habría datos.

Línea 157: public function obtenerDetalle(int $id_liquidacion): array|false {
Qué hace exactamente: Declara método para detalle de liquidación.
Con qué se conecta: Con GET accion=detalle.
Para qué sirve: Ver información completa de una liquidación específica.
Qué pasaría si se quita: No se podría abrir detalle.

Líneas 158 a 170: SELECT detalle
Qué hace exactamente: Trae todos los datos de liquidación, trabajador, documento, tarifa y código.
Con qué se conecta: Con liquidacion, trabajador, usuario y tarifa.
Para qué sirve: Mostrar detalle completo.
Qué pasaría si se quita: No habría datos de detalle.

Líneas 171 a 173: bind, execute, fetch
Qué hace exactamente: Busca por ID y devuelve una fila.
Con qué se conecta: Con :id.
Para qué sirve: Obtener la liquidación correcta.
Qué pasaría si se quita: La consulta no funcionaría.

Línea 186: public function generar(...)
Qué hace exactamente: Declara método para generar liquidación temporal.
Con qué se conecta: Con MayordomoLiquidacionTemporalController.php accion generar.
Para qué sirve: Insertar una liquidación vinculada a una autorización.
Qué pasaría si se quita: No se podrían crear liquidaciones temporales.

Líneas 196 a 205: INSERT INTO liquidacion
Qué hace exactamente: Inserta trabajador, tarifa, autorización, período, jornadas, valor, fecha actual, estado GENERADA y observación.
Con qué se conecta: Con tabla liquidacion.
Para qué sirve: Crear liquidación ya autorizada por permiso delegado.
Qué pasaría si se quita: No se guardaría la liquidación temporal.

Líneas 206 a 214: bindParam y execute
Qué hace exactamente: Vincula todos los datos y ejecuta.
Con qué se conecta: Con valores enviados desde el controlador.
Para qué sirve: Guardar liquidación de forma segura.
Qué pasaría si se quita: El INSERT fallaría.

Conclusión:
Este modelo controla liquidaciones temporales del mayordomo. Primero valida permisos activos desde autorizacion_delegada, luego permite listar trabajadores/tarifas, calcular jornadas, listar liquidaciones propias, ver detalles y generar liquidaciones asociadas a una autorización.