Línea 1: <?php
Abre PHP.

Líneas 2 a 14: Comentario de documentación
Explica el módulo de producción del mayordomo.

Línea 16: session_start();
Inicia sesión.

Línea 18: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Valida rol.

Líneas 19 a 21:
Devuelve acceso denegado.

Línea 24: require_once __DIR__ . '/../config/database.php';
Incluye conexión.

Línea 25: require_once __DIR__ . '/../models/MayordomoProduccion.php';
Incluye modelo de producción.

Línea 27: header('Content-Type: application/json');
Define respuesta JSON.

Línea 29: $db = (new Database())->conectar();
Conecta BD.

Línea 30: $model = new MayordomoProduccion($db);
Crea modelo.

Línea 31: $id_mayordomo = (int) $_SESSION['id_usuario'];
Obtiene ID del mayordomo.

Línea 32: $accion = trim($_POST['accion'] ?? '');
Obtiene acción.

Línea 35: switch ($accion) {
Evalúa acción.

Línea 38: case 'registrar':
Caso registrar producción.

Líneas 39 a 43:
Obtiene trabajador, lote, fecha, cantidad y unidad.

Líneas 45 a 63:
Valida trabajador, lote, fecha, cantidad y unidad.

Línea 65: $ok = $model->registrar(...)
Registra producción.

Líneas 66 a 69:
Devuelve JSON.

Línea 73: case 'editar':
Caso editar producción.

Líneas 74 a 79:
Obtiene ID y datos.

Línea 81: if ($id <= 0 || ...)
Valida datos incompletos.

Línea 86: $ok = $model->editar(...)
Actualiza registro.

Líneas 87 a 90:
Devuelve JSON.

Línea 94: case 'eliminar':
Caso eliminar producción.

Línea 95: $id = (int) ($_POST['id'] ?? 0);
Obtiene ID.

Línea 96: if ($id <= 0) {
Valida ID.

Línea 100: $ok = $model->eliminar($id);
Elimina registro.

Líneas 101 a 104:
Devuelve JSON.

Línea 108: default:
Acción no reconocida.

Línea 113: catch (Exception $e)
Captura errores.

Línea 114: echo json_encode(...)
Devuelve error interno.

Línea 116: ?>
Cierra PHP.

Conclusión:
Este controlador administra registros de producción del mayordomo. Permite registrar, editar y eliminar producción validando trabajador, lote, fecha, cantidad y unidad.