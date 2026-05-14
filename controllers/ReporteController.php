<?php
/**
 * ============================================================
 * ARCHIVO: controllers/ReporteController.php
 * PROPÓSITO: Genera los datos de reportes y exportaciones
 * ============================================================
 *
 * Parámetros GET:
 *   tipo          → asistencia | produccion | pagos | liquidaciones
 *   id_trabajador → INT (0 = todos)
 *   fecha_inicio  → Y-m-d o vacío
 *   fecha_fin     → Y-m-d o vacío
 *   formato       → json | csv (default: json)
 *
 * Respuestas:
 *   formato=json → { ok, tipo, columnas[], filas[], total }
 *   formato=csv  → descarga directa del archivo CSV
 * ============================================================
 */

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
    exit;
}

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Reporte.php';

$db     = (new Database())->conectar();
$model  = new Reporte($db);

$tipo          = trim($_GET['tipo']          ?? 'asistencia');
$id_trabajador = (int) ($_GET['id_trabajador'] ?? 0);
$fecha_inicio  = trim($_GET['fecha_inicio']  ?? '');
$fecha_fin     = trim($_GET['fecha_fin']     ?? '');
$formato       = trim($_GET['formato']       ?? 'json');

// ── Tipos válidos ──────────────────────────────────────────
$tiposValidos = ['asistencia', 'produccion', 'pagos', 'liquidaciones'];
if (!in_array($tipo, $tiposValidos, true)) {
    header('Content-Type: application/json');
    echo json_encode(['ok' => false, 'mensaje' => 'Tipo de reporte inválido']);
    exit;
}

// ── Definición de columnas por tipo ───────────────────────
$columnas = [
    'asistencia'   => ['Fecha', 'Trabajador', 'Entrada', 'Salida', 'Horas'],
    'produccion'   => ['Fecha', 'Trabajador', 'Lote', 'Cantidad', 'Unidad'],
    'pagos'        => ['Fecha', 'Trabajador', 'Liquidación', 'Monto', 'Método', 'Referencia'],
    'liquidaciones'=> ['Trabajador', 'Tipo Tarifa', 'Período Inicio', 'Período Fin',
                       'Jornadas', 'Valor', 'Estado'],
];

// ── Ejecutar consulta ──────────────────────────────────────
try {
    $filas = match($tipo) {
        'asistencia'    => $model->asistencia($id_trabajador, $fecha_inicio, $fecha_fin),
        'produccion'    => $model->produccion($id_trabajador, $fecha_inicio, $fecha_fin),
        'pagos'         => $model->pagos($id_trabajador, $fecha_inicio, $fecha_fin),
        'liquidaciones' => $model->liquidaciones($id_trabajador, $fecha_inicio, $fecha_fin),
    };
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['ok' => false, 'mensaje' => 'Error al generar el reporte: ' . $e->getMessage()]);
    exit;
}

// ── Formato CSV ────────────────────────────────────────────
if ($formato === 'csv') {
    $nombreArchivo = 'reporte_' . $tipo . '_' . date('Ymd_His') . '.csv';
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $nombreArchivo . '"');

    $out = fopen('php://output', 'w');
    // BOM para que Excel abra correctamente con tildes
    fputs($out, "\xEF\xBB\xBF");
    // Cabecera
    fputcsv($out, $columnas[$tipo], ';');
    // Filas
    foreach ($filas as $fila) {
        fputcsv($out, array_values($fila), ';');
    }
    fclose($out);
    exit;
}

// ── Formato JSON (default) ─────────────────────────────────
header('Content-Type: application/json');
echo json_encode([
    'ok'      => true,
    'tipo'    => $tipo,
    'columnas'=> $columnas[$tipo],
    'filas'   => $filas,
    'total'   => count($filas),
]);
?>
