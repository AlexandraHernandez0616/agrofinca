<?php
/**
 * ============================================================
 * ARCHIVO: controllers/MayordomoReporteController.php
 * PROPÓSITO: Genera reportes operativos para el mayordomo
 * ============================================================
 *
 * Parámetros GET:
 *   tipo          → asistencia | produccion | tareas | prestamos
 *   id_trabajador → INT (0 = todos los del mayordomo)
 *   fecha_inicio  → Y-m-d o vacío
 *   fecha_fin     → Y-m-d o vacío
 *   formato       → json | csv (default: json)
 *
 * Respuestas:
 *   formato=json → { ok, tipo, columnas[], filas[], total }
 *   formato=csv  → descarga directa del archivo CSV con BOM UTF-8
 *
 * NOTA: Los datos se filtran automáticamente al ámbito del mayordomo
 *       (solo trabajadores y tareas que le pertenecen).
 * ============================================================
 */

session_start();

if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Acceso denegado']);
    exit;
}

require_once __DIR__ . '/../config/database.php';

$db           = (new Database())->conectar();
$id_mayordomo = (int) $_SESSION['id_usuario'];

$tipo          = trim($_GET['tipo']          ?? 'asistencia');
$id_trabajador = (int) ($_GET['id_trabajador'] ?? 0);
$fecha_inicio  = trim($_GET['fecha_inicio']  ?? '');
$fecha_fin     = trim($_GET['fecha_fin']     ?? '');
$formato       = trim($_GET['formato']       ?? 'json');

// ── Tipos válidos para el mayordomo ───────────────────────
$tiposValidos = ['asistencia', 'produccion', 'tareas', 'prestamos'];
if (!in_array($tipo, $tiposValidos, true)) {
    header('Content-Type: application/json');
    echo json_encode(['ok' => false, 'mensaje' => 'Tipo de reporte inválido']);
    exit;
}

// ── Definición de columnas por tipo ───────────────────────
$columnas = [
    'asistencia' => ['Fecha', 'Trabajador', 'Entrada', 'Salida', 'Horas'],
    'produccion' => ['Fecha', 'Trabajador', 'Lote', 'Cantidad', 'Unidad'],
    'tareas'     => ['Tarea', 'Lote', 'Fecha Inicio', 'Fecha Fin', 'Trabajadores', 'Estado'],
    'prestamos'  => ['Trabajador', 'Herramienta', 'Cantidad', 'Fecha Solicitud', 'Estado'],
];

// ── Helpers de filtro por fecha ────────────────────────────
function addFechaFiltros(array &$where, array &$params, string $campo, string $inicio, string $fin): void {
    if ($inicio !== '') { $where[] = "{$campo} >= :inicio"; $params[':inicio'] = $inicio; }
    if ($fin    !== '') { $where[] = "{$campo} <= :fin";    $params[':fin']    = $fin;    }
}

// ── Ejecutar consulta según tipo ──────────────────────────
try {
    switch ($tipo) {

        // ── ASISTENCIA ────────────────────────────────────
        case 'asistencia':
            $where  = ['1=1'];
            $params = [];

            // Solo trabajadores asignados a tareas del mayordomo
            $where[] = "EXISTS (
                SELECT 1 FROM tarea_trabajador tt
                INNER JOIN tarea ta ON ta.id_tarea = tt.id_tarea
                WHERE tt.id_trabajador = a.id_trabajador
                  AND ta.id_mayordomo  = :mayordomo
            )";
            $params[':mayordomo'] = $id_mayordomo;

            if ($id_trabajador > 0) {
                $where[]              = "a.id_trabajador = :trabajador";
                $params[':trabajador'] = $id_trabajador;
            }
            addFechaFiltros($where, $params, 'a.fecha', $fecha_inicio, $fecha_fin);

            $sql = "SELECT a.fecha,
                           CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                           TIME_FORMAT(a.hora_entrada, '%H:%i') AS entrada,
                           TIME_FORMAT(a.hora_salida,  '%H:%i') AS salida,
                           CASE
                             WHEN a.hora_entrada IS NOT NULL AND a.hora_salida IS NOT NULL
                             THEN CONCAT(FLOOR(TIMESTAMPDIFF(MINUTE, a.hora_entrada, a.hora_salida)/60), ' hrs')
                             ELSE '—'
                           END AS horas
                    FROM asistencia a
                    INNER JOIN trabajador tr ON tr.id_trabajador = a.id_trabajador
                    INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                    WHERE " . implode(' AND ', $where) . "
                    ORDER BY a.fecha DESC, u.nombres";
            break;

        // ── PRODUCCIÓN ────────────────────────────────────
        case 'produccion':
            $where  = ['1=1'];
            $params = [];

            $where[] = "EXISTS (
                SELECT 1 FROM tarea_trabajador tt
                INNER JOIN tarea ta ON ta.id_tarea = tt.id_tarea
                WHERE tt.id_trabajador = p.id_trabajador
                  AND ta.id_mayordomo  = :mayordomo
            )";
            $params[':mayordomo'] = $id_mayordomo;

            if ($id_trabajador > 0) {
                $where[]              = "p.id_trabajador = :trabajador";
                $params[':trabajador'] = $id_trabajador;
            }
            addFechaFiltros($where, $params, 'p.fecha', $fecha_inicio, $fecha_fin);

            $sql = "SELECT p.fecha,
                           CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                           l.nombre AS lote,
                           p.cantidad,
                           p.unidad_medida AS unidad
                    FROM produccion p
                    INNER JOIN trabajador tr ON tr.id_trabajador = p.id_trabajador
                    INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                    INNER JOIN lote       l  ON l.id_lote        = p.id_lote
                    WHERE " . implode(' AND ', $where) . "
                    ORDER BY p.fecha DESC, u.nombres";
            break;

        // ── TAREAS ────────────────────────────────────────
        case 'tareas':
            $where  = ['t.id_mayordomo = :mayordomo'];
            $params = [':mayordomo' => $id_mayordomo];

            addFechaFiltros($where, $params, 't.fecha_inicio', $fecha_inicio, $fecha_fin);

            $sql = "SELECT t.nombre AS tarea,
                           l.nombre AS lote,
                           t.fecha_inicio,
                           t.fecha_fin_estimada,
                           COALESCE(
                             GROUP_CONCAT(CONCAT(u.nombres,' ',u.apellidos) ORDER BY u.nombres SEPARATOR ', '),
                             '—'
                           ) AS trabajadores,
                           t.estado_tarea AS estado
                    FROM tarea t
                    INNER JOIN lote l ON l.id_lote = t.id_lote
                    LEFT JOIN tarea_trabajador tt ON tt.id_tarea = t.id_tarea
                    LEFT JOIN trabajador tr ON tr.id_trabajador = tt.id_trabajador
                    LEFT JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                    WHERE " . implode(' AND ', $where) . "
                    GROUP BY t.id_tarea
                    ORDER BY t.fecha_inicio DESC";
            break;

        // ── PRÉSTAMOS ─────────────────────────────────────
        case 'prestamos':
            $where  = ['p.id_mayordomo = :mayordomo'];
            $params = [':mayordomo' => $id_mayordomo];

            if ($id_trabajador > 0) {
                $where[]              = "p.id_trabajador = :trabajador";
                $params[':trabajador'] = $id_trabajador;
            }
            addFechaFiltros($where, $params, 'p.fecha_solicitud', $fecha_inicio, $fecha_fin);

            $sql = "SELECT CONCAT(u.nombres, ' ', u.apellidos) AS trabajador,
                           GROUP_CONCAT(h.nombre ORDER BY h.nombre SEPARATOR ', ') AS herramienta,
                           SUM(dp.cantidad) AS cantidad,
                           p.fecha_solicitud,
                           p.estado_prestamo AS estado
                    FROM prestamo p
                    INNER JOIN trabajador tr ON tr.id_trabajador = p.id_trabajador
                    INNER JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                    LEFT  JOIN detalle_prestamo dp ON dp.id_prestamo   = p.id_prestamo
                    LEFT  JOIN herramienta      h  ON h.id_herramienta = dp.id_herramienta
                    WHERE " . implode(' AND ', $where) . "
                    GROUP BY p.id_prestamo
                    ORDER BY p.fecha_solicitud DESC";
            break;
    }

    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    fputs($out, "\xEF\xBB\xBF"); // BOM para Excel
    fputcsv($out, $columnas[$tipo], ';');
    foreach ($filas as $fila) {
        fputcsv($out, array_values($fila), ';');
    }
    fclose($out);
    exit;
}

// ── Formato JSON ──────────────────────────────────────────
header('Content-Type: application/json');
echo json_encode([
    'ok'      => true,
    'tipo'    => $tipo,
    'columnas'=> $columnas[$tipo],
    'filas'   => $filas,
    'total'   => count($filas),
]);
?>
