<?php
/**
 * ARCHIVO: views/mayordomo/reportes.php
 * PROPÓSITO: Módulo Reportes del Sistema (mayordomo)
 * Tipos: Asistencia | Producción | Tareas | Préstamos
 * Conecta con: controllers/MayordomoReporteController.php
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}
require_once __DIR__ . '/../../config/database.php';
$db           = (new Database())->conectar();
$id_mayordomo = (int) $_SESSION['id_usuario'];

// Trabajadores del mayordomo para el select
$stmtT = $db->prepare(
    "SELECT tr.id_trabajador, CONCAT(u.nombres,' ',u.apellidos) AS nombre_completo
     FROM trabajador tr
     INNER JOIN usuario u ON u.id_usuario = tr.id_trabajador
     WHERE tr.estado_trabajador = 'ACTIVO'
       AND EXISTS (
         SELECT 1 FROM tarea_trabajador tt
         INNER JOIN tarea ta ON ta.id_tarea = tt.id_tarea
         WHERE tt.id_trabajador = tr.id_trabajador AND ta.id_mayordomo = :id
       )
     ORDER BY u.nombres, u.apellidos"
);
$stmtT->bindParam(':id', $id_mayordomo, PDO::PARAM_INT);
$stmtT->execute();
$trabajadores = $stmtT->fetchAll(PDO::FETCH_ASSOC);

$titulo_pagina = 'Reportes - AgroFinca';
$modulo_activo = 'reportes';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- CABECERA -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Reportes del Sistema</h1>
    <p class="mod-subtitulo">Genera y exporta reportes operativos</p>
  </div>
</div>

<!-- PANEL DE FILTROS -->
<div class="rep-panel">
  <h2 class="rep-panel-titulo">Generar Reporte</h2>
  <form id="formReporte" onsubmit="generarReporte(event)">
    <div class="rep-filtros-grid">
      <div class="form-group">
        <label for="rTipo">Tipo de Reporte</label>
        <select id="rTipo" name="tipo">
          <option value="asistencia">Asistencia</option>
          <option value="produccion">Producción</option>
          <option value="tareas">Tareas</option>
          <option value="prestamos">Préstamos</option>
        </select>
      </div>
      <div class="form-group">
        <label for="rTrabajador">Trabajador</label>
        <select id="rTrabajador" name="id_trabajador">
          <option value="0">Todos</option>
          <?php foreach ($trabajadores as $t): ?>
            <option value="<?= $t['id_trabajador'] ?>"><?= htmlspecialchars($t['nombre_completo']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="rInicio">Fecha Inicio</label>
        <input type="date" id="rInicio" name="fecha_inicio">
      </div>
      <div class="form-group">
        <label for="rFin">Fecha Fin</label>
        <input type="date" id="rFin" name="fecha_fin">
      </div>
    </div>
    <button type="submit" class="btn-primary rep-btn-generar" id="btnGenerar">
      📋 Generar Reporte
    </button>
  </form>
</div>

<!-- RESULTADOS -->
<div id="seccionResultados" style="display:none;">
  <div class="rep-resultados-header">
    <h2 class="rep-panel-titulo" style="margin:0;">
      Resultados del Reporte
      <span id="repTotalBadge" class="rep-total-badge"></span>
    </h2>
    <div class="rep-export-btns">
      <button class="btn-export btn-pdf"   onclick="exportarPDF()">↓ PDF</button>
      <button class="btn-export btn-excel" onclick="exportarExcel()">↓ Excel</button>
    </div>
  </div>
  <div id="repMsg" class="msg-form" style="display:none;margin-bottom:12px;"></div>
  <div class="tabla-wrap" id="repTablaWrap">
    <table class="tabla" id="repTabla">
      <thead id="repThead"></thead>
      <tbody id="repTbody"></tbody>
    </table>
  </div>
</div>

<style>
  .rep-panel { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:24px 28px; margin-bottom:28px; box-shadow:0 1px 4px rgba(0,0,0,0.06); }
  .rep-panel-titulo { font-size:16px; font-weight:700; color:#111827; margin:0 0 20px; }
  .rep-filtros-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:16px; margin-bottom:20px; }
  .form-group select,
  .form-group input[type="date"] { height:42px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
  .form-group select:focus,
  .form-group input[type="date"]:focus { border-color:#2e9e4f; }
  .rep-btn-generar { display:inline-flex; align-items:center; gap:8px; font-size:14px; }
  .rep-resultados-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:16px; flex-wrap:wrap; gap:12px; }
  .rep-total-badge { display:inline-block; background:#f3f4f6; color:#374151; font-size:12px; font-weight:600; padding:2px 10px; border-radius:20px; margin-left:10px; vertical-align:middle; }
  .rep-export-btns { display:flex; gap:10px; }
  .btn-export { display:inline-flex; align-items:center; gap:6px; border:none; border-radius:8px; padding:8px 18px; font-size:13px; font-weight:600; cursor:pointer; transition:opacity 0.15s; }
  .btn-export:hover { opacity:0.85; }
  .btn-pdf   { background:#dc2626; color:#fff; }
  .btn-excel { background:#16a34a; color:#fff; }
  .rep-spinner { display:flex; align-items:center; justify-content:center; padding:40px; font-size:14px; color:#6b7280; gap:10px; }
  .rep-spinner::before { content:''; width:20px; height:20px; border:3px solid #e5e7eb; border-top-color:#2e9e4f; border-radius:50%; animation:spin 0.7s linear infinite; flex-shrink:0; }
  @keyframes spin { to { transform:rotate(360deg); } }
  @media print {
    body * { visibility:hidden; }
    #repTablaWrap, #repTablaWrap * { visibility:visible; }
    #repTablaWrap { position:fixed; top:0; left:0; width:100%; border:none; box-shadow:none; }
    .sidebar, .topbar, .mod-header, .rep-panel, .rep-resultados-header { display:none !important; }
  }
  @media (max-width:900px) { .rep-filtros-grid { grid-template-columns:1fr 1fr; } }
  @media (max-width:560px) { .rep-filtros-grid { grid-template-columns:1fr; } .rep-resultados-header { flex-direction:column; align-items:flex-start; } }
</style>

<script>
const CTRL = '../../controllers/MayordomoReporteController.php';
let _ultimoReporte = {};

// Formatos especiales por tipo
const FORMATOS = {
  tareas: {
    5: v => {
      const map = { PENDIENTE:'badge-tarea-pendiente', EN_PROGRESO:'badge-tarea-progreso', COMPLETADA:'badge-tarea-completada' };
      const lbl = { PENDIENTE:'Pendiente', EN_PROGRESO:'En progreso', COMPLETADA:'Completada' };
      return `<span class="badge ${map[v]??''}">${lbl[v]??v}</span>`;
    }
  },
  prestamos: {
    4: v => {
      const map = { PENDIENTE:'badge-pres-pendiente', APROBADO:'badge-pres-aprobado', NEGADO:'badge-pres-negado', DEVUELTO:'badge-pres-devuelto' };
      const lbl = { PENDIENTE:'Pendiente', APROBADO:'Aprobada', NEGADO:'Negada', DEVUELTO:'Devuelta' };
      return `<span class="badge ${map[v]??''}">${lbl[v]??v}</span>`;
    }
  }
};

async function generarReporte(e) {
  e.preventDefault();
  const tipo        = document.getElementById('rTipo').value;
  const trabajador  = document.getElementById('rTrabajador').value;
  const fechaInicio = document.getElementById('rInicio').value;
  const fechaFin    = document.getElementById('rFin').value;

  _ultimoReporte = { tipo, trabajador, fechaInicio, fechaFin };

  const seccion = document.getElementById('seccionResultados');
  seccion.style.display = 'block';
  document.getElementById('repMsg').style.display = 'none';
  document.getElementById('repThead').innerHTML = '';
  document.getElementById('repTbody').innerHTML =
    '<tr><td colspan="10"><div class="rep-spinner">Cargando datos…</div></td></tr>';
  document.getElementById('repTotalBadge').textContent = '';

  const btn = document.getElementById('btnGenerar');
  btn.disabled = true; btn.textContent = 'Generando…';

  const url = `${CTRL}?tipo=${tipo}&id_trabajador=${trabajador}&fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}&formato=json`;

  try {
    const res  = await fetch(url);
    const json = await res.json();

    if (!json.ok) {
      mostrarRepMsg(json.mensaje ?? 'Error al generar el reporte', 'error');
      document.getElementById('repTbody').innerHTML = '';
      return;
    }

    renderTabla(json.columnas, json.filas, tipo);
    document.getElementById('repTotalBadge').textContent =
      json.total + ' registro' + (json.total !== 1 ? 's' : '');

    if (json.total === 0) {
      mostrarRepMsg('No se encontraron registros con los filtros seleccionados.', 'info');
    }
  } catch {
    mostrarRepMsg('Error de conexión al generar el reporte.', 'error');
    document.getElementById('repTbody').innerHTML = '';
  } finally {
    btn.disabled = false; btn.textContent = '📋 Generar Reporte';
    document.getElementById('seccionResultados').scrollIntoView({ behavior:'smooth', block:'start' });
  }
}

function renderTabla(columnas, filas, tipo) {
  document.getElementById('repThead').innerHTML =
    '<tr>' + columnas.map(c => `<th>${c}</th>`).join('') + '</tr>';

  const tbody = document.getElementById('repTbody');
  const fmts  = FORMATOS[tipo] ?? {};

  if (filas.length === 0) {
    tbody.innerHTML = `<tr><td colspan="${columnas.length}" class="tabla-vacia">Sin registros</td></tr>`;
    return;
  }

  tbody.innerHTML = filas.map(fila => {
    const vals = Object.values(fila);
    const celdas = vals.map((v, i) => {
      const fmt = fmts[i];
      const contenido = fmt ? fmt(v ?? '') : (v ?? '—');
      return `<td>${contenido}</td>`;
    }).join('');
    return `<tr>${celdas}</tr>`;
  }).join('');
}

function mostrarRepMsg(texto, tipo) {
  const el = document.getElementById('repMsg');
  el.textContent = texto;
  el.className = 'msg-form ' + (tipo === 'error' ? 'msg-error' : 'msg-form');
  el.style.display = 'block';
}

function exportarPDF() {
  if (!_ultimoReporte.tipo) { alert('Primero genera un reporte.'); return; }
  window.print();
}

function exportarExcel() {
  if (!_ultimoReporte.tipo) { alert('Primero genera un reporte.'); return; }
  const { tipo, trabajador, fechaInicio, fechaFin } = _ultimoReporte;
  window.location.href = `${CTRL}?tipo=${tipo}&id_trabajador=${trabajador}&fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}&formato=csv`;
}
</script>

<!-- Estilos de badges necesarios en esta vista -->
<style>
  .badge-tarea-pendiente  { background:#fef3c7; color:#92400e; }
  .badge-tarea-progreso   { background:#dbeafe; color:#1e40af; }
  .badge-tarea-completada { background:#dcfce7; color:#166534; }
  .badge-pres-pendiente   { background:#fef3c7; color:#92400e; }
  .badge-pres-aprobado    { background:#dcfce7; color:#166534; }
  .badge-pres-negado      { background:#fdecea; color:#b91c1c; }
  .badge-pres-devuelto    { background:#dbeafe; color:#1e40af; }
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
