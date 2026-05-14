<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/reportes.php
 * PROPÓSITO: Módulo Reportes del Sistema (admin)
 * ============================================================
 * Funcionalidades:
 *   - Formulario de filtros: tipo, trabajador, fecha inicio/fin
 *   - Botón "Generar Reporte" → carga tabla dinámica via fetch
 *   - Tabla de resultados con columnas dinámicas según el tipo
 *   - Botón "↓ PDF"   → imprime la tabla con window.print()
 *   - Botón "↓ Excel" → descarga CSV via ReporteController
 *
 * Conecta con:
 *   models/Reporte.php               (lectura directa para trabajadores)
 *   controllers/ReporteController.php (GET via fetch → JSON | CSV)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Reporte.php';

$db           = (new Database())->conectar();
$model        = new Reporte($db);
$trabajadores = $model->listarTrabajadores();

$titulo_pagina = 'Reportes - AgroFinca';
$modulo_activo = 'reportes';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Reportes del Sistema</h1>
    <p class="mod-subtitulo">Genera y exporta reportes operativos y administrativos</p>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════
     PANEL DE FILTROS
══════════════════════════════════════════════════════════ -->
<div class="rep-panel">
  <h2 class="rep-panel-titulo">Generar Reporte</h2>

  <form id="formReporte" onsubmit="generarReporte(event)">

    <div class="rep-filtros-grid">

      <!-- Tipo de reporte -->
      <div class="form-group">
        <label for="rTipo">Tipo de Reporte</label>
        <select id="rTipo" name="tipo">
          <option value="asistencia">Asistencia</option>
          <option value="produccion">Producción</option>
          <option value="pagos">Pagos</option>
          <option value="liquidaciones">Liquidaciones</option>
        </select>
      </div>

      <!-- Trabajador -->
      <div class="form-group">
        <label for="rTrabajador">Trabajador</label>
        <select id="rTrabajador" name="id_trabajador">
          <option value="0">Todos</option>
          <?php foreach ($trabajadores as $t): ?>
            <option value="<?= $t['id_trabajador'] ?>">
              <?= htmlspecialchars($t['nombre_completo']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Fecha inicio -->
      <div class="form-group">
        <label for="rInicio">Fecha Inicio</label>
        <input type="date" id="rInicio" name="fecha_inicio">
      </div>

      <!-- Fecha fin -->
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

<!-- ══════════════════════════════════════════════════════
     RESULTADOS
══════════════════════════════════════════════════════════ -->
<div id="seccionResultados" style="display:none;">

  <!-- Cabecera resultados + botones exportar -->
  <div class="rep-resultados-header">
    <h2 class="rep-panel-titulo" style="margin:0;">
      Resultados del Reporte
      <span id="repTotalBadge" class="rep-total-badge"></span>
    </h2>
    <div class="rep-export-btns">
      <button class="btn-export btn-pdf" onclick="exportarPDF()">
        ↓ PDF
      </button>
      <button class="btn-export btn-excel" onclick="exportarExcel()">
        ↓ Excel
      </button>
    </div>
  </div>

  <!-- Mensaje de error / vacío -->
  <div id="repMsg" class="msg-form" style="display:none;margin-bottom:12px;"></div>

  <!-- Tabla dinámica -->
  <div class="tabla-wrap" id="repTablaWrap">
    <table class="tabla" id="repTabla">
      <thead id="repThead"></thead>
      <tbody id="repTbody"></tbody>
    </table>
  </div>

</div>


<!-- ══════════════════════════════════════════════════════
     ESTILOS PROPIOS DEL MÓDULO
══════════════════════════════════════════════════════════ -->
<style>
  /* Panel de filtros */
  .rep-panel {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px 28px;
    margin-bottom: 28px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
  }
  .rep-panel-titulo {
    font-size: 16px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 20px;
  }

  /* Grid de filtros: 4 columnas */
  .rep-filtros-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 20px;
  }

  /* Selects e inputs del formulario */
  .form-group select,
  .form-group input[type="date"] {
    height: 42px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    padding: 0 12px;
    font-size: 14px;
    color: #111827;
    outline: none;
    transition: border-color 0.2s;
    background: #fff;
    cursor: pointer;
    width: 100%;
    font-family: inherit;
  }
  .form-group select:focus,
  .form-group input[type="date"]:focus { border-color: #2e9e4f; }

  /* Botón generar */
  .rep-btn-generar {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
  }

  /* Cabecera de resultados */
  .rep-resultados-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
    flex-wrap: wrap;
    gap: 12px;
  }

  /* Badge total de registros */
  .rep-total-badge {
    display: inline-block;
    background: #f3f4f6;
    color: #374151;
    font-size: 12px;
    font-weight: 600;
    padding: 2px 10px;
    border-radius: 20px;
    margin-left: 10px;
    vertical-align: middle;
  }

  /* Botones de exportación */
  .rep-export-btns {
    display: flex;
    gap: 10px;
  }
  .btn-export {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border: none;
    border-radius: 8px;
    padding: 8px 18px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: opacity 0.15s;
  }
  .btn-export:hover { opacity: 0.85; }
  .btn-pdf   { background: #dc2626; color: #fff; }
  .btn-excel { background: #16a34a; color: #fff; }

  /* Spinner de carga */
  .rep-spinner {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px;
    font-size: 14px;
    color: #6b7280;
    gap: 10px;
  }
  .rep-spinner::before {
    content: '';
    width: 20px;
    height: 20px;
    border: 3px solid #e5e7eb;
    border-top-color: #2e9e4f;
    border-radius: 50%;
    animation: spin 0.7s linear infinite;
    flex-shrink: 0;
  }
  @keyframes spin { to { transform: rotate(360deg); } }

  /* Badges de estado en liquidaciones */
  .badge-pendiente { background: #fef3c7; color: #92400e; }
  .badge-generada  { background: #dbeafe; color: #1e40af; }
  .badge-liquidada { background: #dcfce7; color: #166534; }

  /* ── Estilos de impresión PDF ── */
  @media print {
    body * { visibility: hidden; }
    #repTablaWrap, #repTablaWrap * { visibility: visible; }
    #repTablaWrap {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      border: none;
      box-shadow: none;
    }
    .sidebar, .topbar, .mod-header,
    .rep-panel, .rep-resultados-header,
    .rep-export-btns { display: none !important; }
  }

  @media (max-width: 900px) {
    .rep-filtros-grid { grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 560px) {
    .rep-filtros-grid { grid-template-columns: 1fr; }
    .rep-resultados-header { flex-direction: column; align-items: flex-start; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
const CTRL = '../../controllers/ReporteController.php';

// Guarda los parámetros del último reporte generado (para exportar)
let _ultimoReporte = {};

/* ── Formatos de celda por tipo de reporte ──────────────── */
const FORMATOS = {
  pagos: {
    // índice de columna → función de formato
    3: v => '$' + parseFloat(v).toLocaleString('es-CO'),  // Monto
    4: v => {                                              // Método (badge)
      const map = {
        'Efectivo':      'badge-activo',
        'Transferencia': 'badge-labor',
        'Cheque':        'badge-cultivo',
      };
      return `<span class="badge ${map[v] ?? ''}">${v}</span>`;
    },
  },
  liquidaciones: {
    5: v => '$' + parseFloat(v).toLocaleString('es-CO'),  // Valor
    6: v => {                                              // Estado (badge)
      const map = {
        'PENDIENTE': 'badge-pendiente',
        'GENERADA':  'badge-generada',
        'LIQUIDADA': 'badge-liquidada',
      };
      const lbl = { PENDIENTE:'Pendiente', GENERADA:'Generada', LIQUIDADA:'Liquidada' };
      return `<span class="badge ${map[v] ?? ''}">${lbl[v] ?? v}</span>`;
    },
  },
};

/* ── Generar reporte ────────────────────────────────────── */
async function generarReporte(e) {
  e.preventDefault();

  const tipo         = document.getElementById('rTipo').value;
  const trabajador   = document.getElementById('rTrabajador').value;
  const fechaInicio  = document.getElementById('rInicio').value;
  const fechaFin     = document.getElementById('rFin').value;

  // Guardar para exportaciones
  _ultimoReporte = { tipo, trabajador, fechaInicio, fechaFin };

  // Mostrar sección y spinner
  const seccion = document.getElementById('seccionResultados');
  seccion.style.display = 'block';
  document.getElementById('repMsg').style.display = 'none';
  document.getElementById('repThead').innerHTML = '';
  document.getElementById('repTbody').innerHTML =
    '<tr><td colspan="10"><div class="rep-spinner">Cargando datos…</div></td></tr>';
  document.getElementById('repTotalBadge').textContent = '';

  // Deshabilitar botón
  const btn = document.getElementById('btnGenerar');
  btn.disabled    = true;
  btn.textContent = 'Generando…';

  const url = `${CTRL}?tipo=${tipo}&id_trabajador=${trabajador}`
            + `&fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}&formato=json`;

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

  } catch (err) {
    mostrarRepMsg('Error de conexión al generar el reporte.', 'error');
    document.getElementById('repTbody').innerHTML = '';
  } finally {
    btn.disabled    = false;
    btn.textContent = '📋 Generar Reporte';
    seccion.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
}

/* ── Renderizar tabla dinámica ──────────────────────────── */
function renderTabla(columnas, filas, tipo) {
  // Cabecera
  const thead = document.getElementById('repThead');
  thead.innerHTML = '<tr>' + columnas.map(c => `<th>${c}</th>`).join('') + '</tr>';

  // Cuerpo
  const tbody  = document.getElementById('repTbody');
  const fmts   = FORMATOS[tipo] ?? {};

  if (filas.length === 0) {
    tbody.innerHTML =
      `<tr><td colspan="${columnas.length}" class="tabla-vacia">Sin registros</td></tr>`;
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

/* ── Mensaje dentro de la sección resultados ────────────── */
function mostrarRepMsg(texto, tipo) {
  const el = document.getElementById('repMsg');
  el.textContent   = texto;
  el.className     = 'msg-form ' + (tipo === 'error' ? 'msg-error' : 'msg-form');
  el.style.display = 'block';
}

/* ── Exportar PDF (impresión del navegador) ─────────────── */
function exportarPDF() {
  if (!_ultimoReporte.tipo) {
    alert('Primero genera un reporte.');
    return;
  }
  window.print();
}

/* ── Exportar Excel (CSV) ───────────────────────────────── */
function exportarExcel() {
  if (!_ultimoReporte.tipo) {
    alert('Primero genera un reporte.');
    return;
  }
  const { tipo, trabajador, fechaInicio, fechaFin } = _ultimoReporte;
  const url = `${CTRL}?tipo=${tipo}&id_trabajador=${trabajador}`
            + `&fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}&formato=csv`;
  window.location.href = url;
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
