<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/MayordomoPrestamo.php';
$db           = (new Database())->conectar();
$model        = new MayordomoPrestamo($db);
$id_mayordomo = (int) $_SESSION['id_usuario'];
$resumen      = $model->resumen($id_mayordomo);
$prestamos    = $model->listar($id_mayordomo);
$titulo_pagina = 'Prestamos - AgroFinca';
$modulo_activo = 'prestamos';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Préstamos</h1>
    <p class="mod-subtitulo">Aprueba, niega y registra devolución de herramientas solicitadas por trabajadores</p>
  </div>
</div>
<div class="pres-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Préstamos</span>
    <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Pendientes</span>
    <span class="lote-stat-valor"><?= $resumen['pendientes'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Aprobados</span>
    <span class="lote-stat-valor"><?= $resumen['aprobados'] ?></span>
  </div>
  <div class="lote-card-stat" style="background:#f0fdf4;border:1px solid #bbf7d0;">
    <span class="lote-stat-label">Devueltos</span>
    <span class="lote-stat-valor" style="color:#166534;"><?= $resumen['devueltos'] ?></span>
  </div>
</div>
<div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador" placeholder="Buscar por trabajador o herramienta..." oninput="filtrarTabla()">
  <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
    <option value="">Todos los estados</option>
    <option value="PENDIENTE">Pendiente</option>
    <option value="APROBADO">Aprobada</option>
    <option value="NEGADO">Negada</option>
    <option value="DEVUELTO">Devuelta</option>
  </select>
</div>
<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>
<div class="tabla-wrap">
  <table class="tabla" id="tablaPrestamos">
    <thead>
      <tr><th>Trabajador</th><th>Herramienta</th><th>Cantidad</th><th>Fecha Solicitud</th><th>Estado</th><th>Acciones</th></tr>
    </thead>
    <tbody>
      <?php if (empty($prestamos)): ?>
        <tr><td colspan="6" class="tabla-vacia">No hay préstamos registrados</td></tr>
      <?php else: foreach ($prestamos as $p):
        [$cls,$lbl] = match($p['estado_prestamo']) {
          'PENDIENTE' => ['badge-pres-pendiente','Pendiente'],
          'APROBADO'  => ['badge-pres-aprobado', 'Aprobada'],
          'NEGADO'    => ['badge-pres-negado',   'Negada'],
          'DEVUELTO'  => ['badge-pres-devuelto', 'Devuelta'],
          default     => ['badge-inactivo', htmlspecialchars($p['estado_prestamo'])],
        };
      ?>
        <tr data-busqueda="<?= strtolower(htmlspecialchars(($p['trabajador']??'').' '.($p['herramientas']??''))) ?>"
            data-estado="<?= htmlspecialchars($p['estado_prestamo']) ?>">
          <td><?= htmlspecialchars($p['trabajador']) ?></td>
          <td class="pres-herr-celda"><?= htmlspecialchars($p['herramientas'] ?? '—') ?></td>
          <td><?= (int)($p['cantidad_total'] ?? 0) ?></td>
          <td><?= htmlspecialchars($p['fecha_solicitud']) ?></td>
          <td><span class="badge <?= $cls ?>"><?= $lbl ?></span></td>
          <td class="acciones">
            <button class="btn-icono" title="Ver detalle" onclick="verDetalle(<?= $p['id_prestamo'] ?>)">👁</button>
            <?php if ($p['estado_prestamo'] === 'PENDIENTE'): ?>
              <button class="btn-pres btn-aprobar" onclick="accionPrestamo(<?= $p['id_prestamo'] ?>,'aprobar')">✓ Aprobar</button>
              <button class="btn-pres btn-negar"   onclick="abrirModalNegar(<?= $p['id_prestamo'] ?>,'<?= addslashes($p['trabajador']) ?>')">✕ Negar</button>
            <?php elseif ($p['estado_prestamo'] === 'APROBADO'): ?>
              <button class="btn-pres btn-devolucion" onclick="abrirModalDevolucion(<?= $p['id_prestamo'] ?>,'<?= addslashes($p['trabajador']) ?>')">Registrar Devolución</button>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>

<!-- MODAL NEGAR -->
<div class="modal-overlay" id="modalNegar">
  <div class="modal" style="max-width:440px;">
    <h2 class="modal-titulo" id="tituloNegar">Negar Préstamo</h2>
    <div id="msgModalNegar" class="msg-form" style="display:none;"></div>
    <form id="formNegar" onsubmit="submitNegar(event)">
      <input type="hidden" name="accion" value="negar">
      <input type="hidden" name="id" id="negarId">
      <div class="form-group" style="margin-bottom:16px;">
        <label for="negarObs">Motivo / Observación</label>
        <textarea id="negarObs" name="observacion" rows="3" class="tarea-textarea" placeholder="Indica el motivo del rechazo (opcional)"></textarea>
      </div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalNegar')">Cancelar</button>
        <button type="submit" class="btn-primary" style="background:#dc2626;" id="btnNegar">Negar Préstamo</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL DEVOLUCIÓN -->
<div class="modal-overlay" id="modalDevolucion">
  <div class="modal" style="max-width:480px;">
    <h2 class="modal-titulo" id="tituloDevolucion">Registrar Devolución</h2>
    <div id="msgModalDevolucion" class="msg-form" style="display:none;"></div>
    <form id="formDevolucion" onsubmit="submitDevolucion(event)">
      <input type="hidden" name="accion" value="registrar_devolucion">
      <input type="hidden" name="id" id="devId">
      <div class="form-grid-2">
        <div class="form-group">
          <label for="devFecha">Fecha Devolución *</label>
          <input type="date" id="devFecha" name="fecha_devolucion" required>
        </div>
        <div class="form-group">
          <label for="devEstado">Estado de las Herramientas *</label>
          <select id="devEstado" name="estado_devolucion" required>
            <option value="BUENO">Buen estado</option>
            <option value="DAÑADO">Dañado</option>
            <option value="PARCIAL">Devolución parcial</option>
          </select>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="devObs">Observación</label>
          <textarea id="devObs" name="observacion" rows="2" class="tarea-textarea" placeholder="Notas sobre la devolución (opcional)"></textarea>
        </div>
      </div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalDevolucion')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnDevolucion">Registrar Devolución</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL VER DETALLE -->
<div class="modal-overlay" id="modalDetalle">
  <div class="modal" style="max-width:520px;">
    <h2 class="modal-titulo">Detalle del Préstamo</h2>
    <div id="detalleContenido" style="min-height:80px;"></div>
    <div class="modal-acciones" style="margin-top:16px;">
      <button class="btn-primary" onclick="cerrarModal('modalDetalle')">Cerrar</button>
    </div>
  </div>
</div>

<style>
  .pres-resumen { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:24px; }
  .badge-pres-pendiente { background:#fef3c7; color:#92400e; }
  .badge-pres-aprobado  { background:#dcfce7; color:#166534; }
  .badge-pres-negado    { background:#fdecea; color:#b91c1c; }
  .badge-pres-devuelto  { background:#dbeafe; color:#1e40af; }
  .pres-herr-celda { max-width:180px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; font-size:13px; }
  .btn-pres { border:none; border-radius:6px; padding:5px 12px; font-size:12px; font-weight:600; cursor:pointer; transition:opacity 0.15s; white-space:nowrap; }
  .btn-pres:hover { opacity:0.82; }
  .btn-aprobar   { background:#dcfce7; color:#166534; }
  .btn-negar     { background:#fdecea; color:#b91c1c; }
  .btn-devolucion{ background:#dbeafe; color:#1e40af; }
  .herr-fila { display:none; }
  .herr-select { display:none; }
  .herr-cant { display:none; }
  .btn-add-herr { display:none; }
  .btn-remove-herr { display:none; }
  .tarea-textarea { width:100%; border:1px solid #d1d5db; border-radius:8px; padding:8px 12px; font-size:14px; font-family:inherit; resize:vertical; outline:none; transition:border-color 0.2s; color:#111827; background:#fff; }
  .tarea-textarea:focus { border-color:#2e9e4f; }
  .form-group select { height:40px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
  .form-group select:focus { border-color:#2e9e4f; }
  .select-filtro { height:42px; border:1px solid #e5e7eb; border-radius:8px; padding:0 12px; font-size:14px; color:#374151; background:#fff; outline:none; cursor:pointer; min-width:160px; }
  .select-filtro:focus { border-color:#2e9e4f; }
  .buscador-con-filtro { display:flex; gap:12px; align-items:center; }
  .detalle-herr-tabla { width:100%; border-collapse:collapse; font-size:13px; margin-top:8px; }
  .detalle-herr-tabla th { background:#f9fafb; padding:8px 12px; text-align:left; font-weight:600; color:#374151; border-bottom:1px solid #e5e7eb; }
  .detalle-herr-tabla td { padding:8px 12px; border-bottom:1px solid #f3f4f6; color:#374151; }
  @media (max-width:900px) { .pres-resumen { grid-template-columns:1fr 1fr; } }
  @media (max-width:560px) { .pres-resumen { grid-template-columns:1fr; } .buscador-con-filtro { flex-wrap:wrap; } }
</style>

<script>
const CTRL = '../../controllers/MayordomoPrestamoController.php';
const hoy  = new Date().toISOString().split('T')[0];

function mostrarMsg(id, texto, tipo) {
  const el = document.getElementById(id);
  if (!el) return;
  el.textContent = texto;
  el.className = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
  el.style.display = 'block';
  setTimeout(() => { el.style.display = 'none'; }, 4500);
}
function recargar() { setTimeout(() => location.reload(), 800); }
function cerrarModal(id) { document.getElementById(id).classList.remove('modal-visible'); }

function filtrarTabla() {
  const q = document.getElementById('inputBusqueda').value.toLowerCase();
  const estado = document.getElementById('filtroEstado').value;
  document.querySelectorAll('#tablaPrestamos tbody tr[data-busqueda]').forEach(tr => {
    const matchQ = tr.dataset.busqueda.includes(q);
    const matchE = !estado || tr.dataset.estado === estado;
    tr.style.display = (matchQ && matchE) ? '' : 'none';
  });
}

// APROBAR directo
async function accionPrestamo(id, accion) {
  const fd = new FormData();
  fd.append('accion', accion); fd.append('id', id);
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
    if (json.ok) recargar();
  } catch { mostrarMsg('msgGlobal', 'Error de conexión', 'error'); }
}

// MODAL NEGAR
function abrirModalNegar(id, trabajador) {
  document.getElementById('negarId').value = id;
  document.getElementById('tituloNegar').textContent = `Negar préstamo de "${trabajador}"`;
  document.getElementById('negarObs').value = '';
  document.getElementById('msgModalNegar').style.display = 'none';
  document.getElementById('modalNegar').classList.add('modal-visible');
}
async function submitNegar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnNegar');
  btn.disabled = true; btn.textContent = 'Negando…';
  const fd = new FormData(e.target);
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) { cerrarModal('modalNegar'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
    else { mostrarMsg('msgModalNegar', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Negar Préstamo'; }
  } catch { mostrarMsg('msgModalNegar', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Negar Préstamo'; }
}

// MODAL DEVOLUCIÓN
function abrirModalDevolucion(id, trabajador) {
  document.getElementById('devId').value = id;
  document.getElementById('tituloDevolucion').textContent = `Devolución — ${trabajador}`;
  document.getElementById('devFecha').value = hoy;
  document.getElementById('devEstado').value = 'BUENO';
  document.getElementById('devObs').value = '';
  document.getElementById('msgModalDevolucion').style.display = 'none';
  document.getElementById('modalDevolucion').classList.add('modal-visible');
}
async function submitDevolucion(e) {
  e.preventDefault();
  const btn = document.getElementById('btnDevolucion');
  btn.disabled = true; btn.textContent = 'Registrando…';
  const fd = new FormData(e.target);
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) { cerrarModal('modalDevolucion'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
    else { mostrarMsg('msgModalDevolucion', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Registrar Devolución'; }
  } catch { mostrarMsg('msgModalDevolucion', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Registrar Devolución'; }
}

// VER DETALLE (fetch al servidor)
async function verDetalle(id) {
  document.getElementById('detalleContenido').innerHTML = '<p style="color:#9ca3af;padding:16px;">Cargando...</p>';
  document.getElementById('modalDetalle').classList.add('modal-visible');
  try {
    const res = await fetch(`${CTRL}?accion=detalle&id=${id}`);
    const json = await res.json();
    if (json.ok && json.detalle.length > 0) {
      let html = '<table class="detalle-herr-tabla"><thead><tr><th>Herramienta</th><th>Cantidad</th><th>Devuelta</th><th>Estado Dev.</th></tr></thead><tbody>';
      json.detalle.forEach(d => {
        html += `<tr><td>${d.herramienta}</td><td>${d.cantidad}</td><td>${d.cantidad_devuelta}</td><td>${d.estado_devolucion||'—'}</td></tr>`;
      });
      html += '</tbody></table>';
      document.getElementById('detalleContenido').innerHTML = html;
    } else {
      document.getElementById('detalleContenido').innerHTML = '<p style="color:#9ca3af;padding:16px;">Sin detalle disponible.</p>';
    }
  } catch {
    document.getElementById('detalleContenido').innerHTML = '<p style="color:#dc2626;padding:16px;">Error al cargar el detalle.</p>';
  }
}

document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('modal-visible');
  });
});
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
