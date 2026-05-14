Línea 1: <?php
Qué hace exactamente: Abre PHP.
Con qué se conecta: Con el servidor.
Para qué sirve: Ejecutar el modelo.
Qué pasaría si se quita: No se interpretaría correctamente.

Líneas 2 a 33: Comentario de documentación
Qué hace exactamente: Explica el flujo de préstamos, tablas y columnas principales.
Con qué se conecta: Con prestamo, detalle_prestamo, trabajador, usuario y herramienta.
Para qué sirve: Entender que el trabajador solicita y el mayordomo gestiona.
Qué pasaría si se quita: Código funciona, pero pierde contexto importante.

Línea 34: class MayordomoPrestamo {
Qué hace exactamente: Declara la clase.
Con qué se conecta: Con MayordomoPrestamoController.php.
Para qué sirve: Agrupar operaciones de préstamos.
Qué pasaría si se quita: No se podría usar el modelo.

Líneas 36 a 40: private $conn y constructor
Qué hace exactamente: Guarda la conexión PDO.
Con qué se conecta: Con Database::conectar().
Para qué sirve: Ejecutar consultas.
Qué pasaría si se quita: Los métodos fallarían.

Línea 51: public function listar(int $id_mayordomo, string $busqueda = '', string $estado = ''): array {
Qué hace exactamente: Declara método para listar préstamos del mayordomo.
Con qué se conecta: Con la vista de préstamos del mayordomo.
Para qué sirve: Mostrar solicitudes gestionadas por ese mayordomo.
Qué pasaría si se quita: No habría listado de préstamos.

Línea 52: $where = ['p.id_mayordomo = :mayordomo'];
Qué hace exactamente: Inicia filtro obligatorio por mayordomo.
Con qué se conecta: Con prestamo.id_mayordomo.
Para qué sirve: Evitar que un mayordomo vea préstamos de otro.
Qué pasaría si se quita: Podrían mostrarse préstamos ajenos.

Línea 53: $params = [':mayordomo' => $id_mayordomo];
Qué hace exactamente: Guarda el ID del mayordomo como parámetro.
Con qué se conecta: Con :mayordomo.
Para qué sirve: Ejecutar filtro seguro.
Qué pasaría si se quita: La consulta fallaría.

Líneas 55 a 58: if búsqueda
Qué hace exactamente: Filtra por nombre del trabajador o herramienta.
Con qué se conecta: Con usuario y herramienta.
Para qué sirve: Buscar préstamos específicos.
Qué pasaría si se quita: No habría búsqueda.

Líneas 59 a 62: if estado
Qué hace exactamente: Filtra por estado del préstamo.
Con qué se conecta: Con prestamo.estado_prestamo.
Para qué sirve: Mostrar pendientes, aprobados, devueltos, etc.
Qué pasaría si se quita: No habría filtro por estado.

Líneas 64 a 83: SELECT préstamos
Qué hace exactamente: Consulta préstamo, trabajador, documento, herramientas agrupadas, cantidades y estado.
Con qué se conecta: Con prestamo p, trabajador tr, usuario u, detalle_prestamo dp y herramienta h.
Para qué sirve: Mostrar una tabla clara de préstamos.
Qué pasaría si se quita: No habría información para la vista.

Línea 73: GROUP_CONCAT(h.nombre...)
Qué hace exactamente: Une nombres de herramientas en un solo texto.
Con qué se conecta: Con detalle_prestamo y herramienta.
Para qué sirve: Mostrar varias herramientas de un préstamo en una fila.
Qué pasaría si se quita: No se verían herramientas agrupadas.

Línea 74: SUM(dp.cantidad) AS cantidad_total
Qué hace exactamente: Suma cantidades solicitadas.
Con qué se conecta: Con detalle_prestamo.cantidad.
Para qué sirve: Mostrar cantidad total del préstamo.
Qué pasaría si se quita: No habría total de herramientas.

Líneas 85 a 87: prepare, execute, fetchAll
Qué hace exactamente: Ejecuta consulta y devuelve préstamos.
Con qué se conecta: Con PDO y vista.
Para qué sirve: Entregar datos filtrados.
Qué pasaría si se quita: No habría resultados.

Línea 93: public function detalle(int $id_prestamo): array {
Qué hace exactamente: Declara método para detalle de préstamo.
Con qué se conecta: Con GET detalle del controlador.
Para qué sirve: Ver herramientas individuales de un préstamo.
Qué pasaría si se quita: No se podría ver detalle.

Líneas 94 a 106: SELECT detalle
Qué hace exactamente: Consulta detalle_prestamo con nombre de herramienta, cantidades, fechas, estado y observación.
Con qué se conecta: Con detalle_prestamo y herramienta.
Para qué sirve: Mostrar el detalle de cada herramienta prestada.
Qué pasaría si se quita: No habría información detallada.

Líneas 107 a 110: bind, execute, fetchAll
Qué hace exactamente: Filtra por id_prestamo y devuelve detalles.
Con qué se conecta: Con :id.
Para qué sirve: Mostrar solo el préstamo seleccionado.
Qué pasaría si se quita: No se ejecutaría correctamente.

Línea 116: public function resumen(int $id_mayordomo): array {
Qué hace exactamente: Declara método para estadísticas de préstamos.
Con qué se conecta: Con tarjetas superiores.
Para qué sirve: Contar total, pendientes, aprobados y devueltos.
Qué pasaría si se quita: No habría resumen.

Líneas 117 a 125: SELECT resumen
Qué hace exactamente: Cuenta préstamos del mayordomo por estado.
Con qué se conecta: Con prestamo.
Para qué sirve: Mostrar métricas del módulo.
Qué pasaría si se quita: No habría estadísticas.

Líneas 126 a 135: bind, execute, fetch y return
Qué hace exactamente: Ejecuta consulta y devuelve conteos.
Con qué se conecta: Con la vista.
Para qué sirve: Alimentar tarjetas.
Qué pasaría si se quita: No habría datos de resumen.

Línea 143: public function listarTrabajadores(): array {
Qué hace exactamente: Lista trabajadores activos.
Con qué se conecta: Con trabajador y usuario.
Para qué sirve: Método mantenido por compatibilidad.
Qué pasaría si se quita: Si alguna vista antigua lo usa, fallaría.

Líneas 144 a 153: SELECT trabajadores
Qué hace exactamente: Trae trabajadores activos con nombre completo.
Con qué se conecta: Con trabajador.estado_trabajador y usuario.
Para qué sirve: Posible selector de trabajadores.
Qué pasaría si se quita: No habría lista compatible.

Línea 160: public function listarHerramientas(): array {
Qué hace exactamente: Lista herramientas disponibles.
Con qué se conecta: Con tabla herramienta.
Para qué sirve: Compatibilidad con formularios antiguos.
Qué pasaría si se quita: Si alguna vista lo usa, fallaría.

Líneas 161 a 168: SELECT herramientas disponibles
Qué hace exactamente: Consulta herramientas con estado DISPONIBLE.
Con qué se conecta: Con herramienta.estado.
Para qué sirve: Mostrar solo herramientas prestables.
Qué pasaría si se quita: No se obtendrían herramientas.

Línea 181: public function crear(...)
Qué hace exactamente: Declara método para crear préstamo con detalles.
Con qué se conecta: Con prestamo y detalle_prestamo.
Para qué sirve: Registrar préstamo y herramientas en una transacción.
Qué pasaría si se quita: No se podrían crear préstamos desde este modelo.

Línea 188: if (empty($herramientas)) return false;
Qué hace exactamente: Cancela si no hay herramientas.
Con qué se conecta: Con el arreglo $herramientas.
Para qué sirve: Evitar préstamos vacíos.
Qué pasaría si se quita: Se podrían crear préstamos sin detalle.

Línea 190: $this->conn->beginTransaction();
Qué hace exactamente: Inicia transacción.
Con qué se conecta: Con PDO.
Para qué sirve: Garantizar que préstamo y detalles se guarden juntos.
Qué pasaría si se quita: Podría guardarse préstamo sin detalles si algo falla.

Líneas 193 a 201: INSERT prestamo
Qué hace exactamente: Inserta préstamo con trabajador, mayordomo, fecha, estado PENDIENTE y observación.
Con qué se conecta: Con tabla prestamo.
Para qué sirve: Crear cabecera del préstamo.
Qué pasaría si se quita: No habría préstamo principal.

Línea 205: $id_prestamo = (int) $this->conn->lastInsertId();
Qué hace exactamente: Obtiene el ID del préstamo recién creado.
Con qué se conecta: Con el INSERT anterior.
Para qué sirve: Usarlo en detalle_prestamo.
Qué pasaría si se quita: No se sabría a qué préstamo asociar herramientas.

Líneas 208 a 225: INSERT detalle por cada herramienta
Qué hace exactamente: Recorre herramientas y guarda cada una en detalle_prestamo.
Con qué se conecta: Con id_prestamo, id_herramienta y cantidad.
Para qué sirve: Registrar qué herramientas componen el préstamo.
Qué pasaría si se quita: El préstamo quedaría sin herramientas.

Línea 227: $this->conn->commit();
Qué hace exactamente: Confirma la transacción.
Con qué se conecta: Con beginTransaction().
Para qué sirve: Guardar definitivamente préstamo y detalles.
Qué pasaría si se quita: La transacción podría no cerrarse correctamente.

Líneas 229 a 232: catch con rollBack
Qué hace exactamente: Si algo falla, revierte todo.
Con qué se conecta: Con la transacción.
Para qué sirve: Evitar datos incompletos.
Qué pasaría si se quita: Podrían quedar registros a medias.

Línea 238: public function aprobar(int $id_prestamo): bool {
Qué hace exactamente: Declara método para aprobar préstamo.
Con qué se conecta: Con controlador accion aprobar.
Para qué sirve: Cambiar estado PENDIENTE a APROBADO.
Qué pasaría si se quita: No se podrían aprobar préstamos.

Líneas 239 a 247: UPDATE aprobar
Qué hace exactamente: Cambia estado_prestamo a APROBADO y fecha_aprobacion a hoy.
Con qué se conecta: Con tabla prestamo.
Para qué sirve: Registrar aprobación del préstamo.
Qué pasaría si se quita: No se actualizaría estado.

Línea 248: return $stmt->rowCount() > 0;
Qué hace exactamente: Devuelve true solo si se modificó una fila.
Con qué se conecta: Con controlador.
Para qué sirve: Saber si estaba pendiente y se aprobó.
Qué pasaría si se quita: No habría confirmación real.

Línea 254: public function negar(...)
Qué hace exactamente: Declara método para negar préstamo.
Con qué se conecta: Con controlador accion negar.
Para qué sirve: Cambiar PENDIENTE a NEGADO.
Qué pasaría si se quita: No se podrían negar préstamos.

Líneas 255 a 264: UPDATE negar
Qué hace exactamente: Cambia estado a NEGADO y guarda observación si existe.
Con qué se conecta: Con prestamo.estado_prestamo y observacion.
Para qué sirve: Registrar motivo de rechazo.
Qué pasaría si se quita: No se negaría préstamo.

Línea 276: public function registrarDevolucion(...)
Qué hace exactamente: Declara método para devolver préstamo.
Con qué se conecta: Con controlador accion registrar_devolucion.
Para qué sirve: Actualizar detalles y marcar préstamo como DEVUELTO.
Qué pasaría si se quita: No se podrían registrar devoluciones.

Línea 283: $this->conn->beginTransaction();
Qué hace exactamente: Inicia transacción para devolución.
Con qué se conecta: Con PDO.
Para qué sirve: Actualizar detalle y préstamo juntos.
Qué pasaría si se quita: Podrían quedar datos incompletos.

Líneas 286 a 300: UPDATE detalle_prestamo
Qué hace exactamente: Marca cantidad devuelta, fecha, estado, recibido_por y observación.
Con qué se conecta: Con detalle_prestamo.
Para qué sirve: Registrar devolución de herramientas.
Qué pasaría si se quita: No se actualizaría el detalle.

Líneas 303 a 309: UPDATE prestamo DEVUELTO
Qué hace exactamente: Cambia el estado del préstamo a DEVUELTO si estaba APROBADO.
Con qué se conecta: Con prestamo.estado_prestamo.
Para qué sirve: Cerrar el préstamo.
Qué pasaría si se quita: El detalle se marcaría devuelto, pero el préstamo seguiría aprobado.

Línea 312: $this->conn->commit();
Qué hace exactamente: Confirma cambios.
Con qué se conecta: Con transacción.
Para qué sirve: Guardar devolución completa.
Qué pasaría si se quita: No se consolidaría correctamente.

Líneas 314 a 317: catch con rollBack
Qué hace exactamente: Revierte si hay error.
Con qué se conecta: Con transacción.
Para qué sirve: Mantener consistencia.
Qué pasaría si se quita: Podrían quedar cambios parciales.

Conclusión:
Este modelo gestiona préstamos desde el mayordomo. Se conecta con prestamo, detalle_prestamo, trabajador, usuario y herramienta. Permite listar, ver detalle, resumir, aprobar, negar y registrar devoluciones, usando transacciones para procesos importantes.