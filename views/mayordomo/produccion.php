<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/MayordomoProduccion.php';
$db           = (new Database())->conectar();
$model        = new MayordomoProduccion($db);
$id_mayordomo = (int) $_SESSION['id_usuario'];
$resumen      = $model->resumen($id_mayordomo);
$registros    = $model->listar($id_mayordomo);
$trabajadores = $model->listarTrabajadores($id_mayordomo);
$lotes        = $model->listarLotes();
$titulo_pagina = 'Produccion - AgroFinca';
$modulo_activo = 'produccion';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- CABECERA -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Producción</h1>
    <p class="mod-subtitulo">Registra la producción recolectada por trabajador</p>
  </div>
  <button class="btn-primary" onclick="abrirModalRegistrar()">+ Registrar Producción</button>
</div>

<!-- TARJETAS RESUMEN -->
<div class="prod-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Registros</span>
    <span class="lote-stat-valor"><?= $resumen['total_registros'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Total Producción</span>
    <span class="lote-stat-valor" style="font-size:20px;"><?= number_format($resumen['total_kg'], 0, '.', ',') ?> kg</span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Trabajadores</span>
    <span class="lote-stat-valor"><?= $resumen['trabajadores'] ?></span>
  </div>
  <div class="lote-card-stat" style="background:#f0fdf4;border:1px solid #bbf7d0;">
    <span class="lote-stat-label">Lotes Activos</span>
    <span class="lote-stat-valor" style="color:#166534;"><?= $resumen['lotes'] ?></span>
  </div>
</div>

<!-- FILTROS -->
<div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="Buscar por trabajador o lote..."
         oninput="filtrarTabla()">
</div>

<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>

<!-- TABLA -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaProduccion">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Trabajador</th>
        <th>Lote</th>
        <th>Cantidad</th>
        <th>Unidad</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($registros)): ?>
        <tr><td colspan="6" class="tabla-vacia">No hay registros de producción</td></tr>
      <?php else: foreach ($registros as $r): ?>
        <tr data-busqueda="<?= strtolower(htmlspecialchars(($r['trabajador']??'').' '.($r['lote']??''))) ?>">
          <td><?= htmlspecialchars($r['fecha']) ?></td>
          <td><?= htmlspecialchars($r['trabajador']) ?></td>
          <td><?= htmlspecialchars($r['lote']) ?></td>
          <td><strong><?= number_format((float)$r['cantidad'], 2) ?></strong></td>
          <td><?= htmlspecialchars($r['unidad']) ?></td>
          <td class="acciones">
            <button class="btn-icono" title="Editar"
              onclick="abrirModalEditar(
                <?= $r['id_produccion'] ?>,
                <?= (int)($r['id_trabajador'] ?? 0) ?>,
                <?= (int)($r['id_lote'] ?? 0) ?>,
                '<?= $r['fecha'] ?>',
                <?= (float)$r['cantidad'] ?>,
                '<?= addslashes($r['unidad']) ?>'
              )">✏️</button>
            <button class="btn-icono" title="Eliminar"
              onclick="confirmarEliminar(<?= $r['id_produccion'] ?>, '<?= addslashes($r['trabajador']) ?>')">
              🗑️
            </button>
          </td>
        </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>

<!-- MODAL REGISTRAR -->
<div class="modal-overlay" id="modalRegistrar">
  <div class="modal" style="max-width:560px;">
    <h2 class="modal-titulo">Registrar Producción</h2>
    <div id="msgModalRegistrar" class="msg-form" style="display:none;"></div>
    <form id="formRegistrar" onsubmit="submitRegistrar(event)">
      <input type="hidden" name="accion" value="registrar">
      <div class="form-grid-2">
        <div class="form-group">
          <label for="rTrabajador">Trabajador *</label>
          <select id="rTrabajador" name="id_trabajador" required>
            <option value="">Selecciona un trabajador</option>
            <?php foreach ($trabajadores as $t): ?>
              <option value="<?= $t['id_trabajador'] ?>"><?= htmlspecialchars($t['nombre_completo']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="rLote">Lote *</label>
          <select id="rLote" name="id_lote" required>
            <option value="">Selecciona un lote</option>
            <?php foreach ($lotes as $l): ?>
              <option value="<?= $l['id_lote'] ?>"><?= htmlspecialchars($l['nombre']) ?><?= $l['cultivo'] ? ' — '.htmlspecialchars($l['cultivo']) : '' ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="rFecha">Fecha *</label>
          <input type="date" id="rFecha" name="fecha" required>
        </div>
        <div class="form-group">
          <label for="rCantidad">Cantidad *</label>
          <input type="number" id="rCantidad" name="cantidad" min="0.01" step="0.01" placeholder="Ej: 45" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="rUnidad">Unidad de Medida *</label>
          <select id="rUnidad" name="unidad_medida" required>
            <option value="kg">kg (kilogramos)</option>
            <option value="lb">lb (libras)</option>
            <option value="ton">ton (toneladas)</option>
            <option value="unidades">unidades</option>
            <option value="cajas">cajas</option>
            <option value="bultos">bultos</option>
          </select>
        </div>
      </div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalRegistrar')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnRegistrar">Registrar</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL EDITAR -->
<div class="modal-overlay" id="modalEditar">
  <div class="modal" style="max-width:560px;">
    <h2 class="modal-titulo">Editar Registro</h2>
    <div id="msgModalEditar" class="msg-form" style="display:none;"></div>
    <form id="formEditar" onsubmit="submitEditar(event)">
      <input type="hidden" name="accion" value="editar">
      <input type="hidden" name="id" id="eId">
      <div class="form-grid-2">
        <div class="form-group">
          <label for="eTrabajador">Trabajador *</label>
          <select id="eTrabajador" name="id_trabajador" required>
            <option value="">Selecciona un trabajador</option>
            <?php foreach ($trabajadores as $t): ?>
              <option value="<?= $t['id_trabajador'] ?>"><?= htmlspecialchars($t['nombre_completo']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="eLote">Lote *</label>
          <select id="eLote" name="id_lote" required>
            <option value="">Selecciona un lote</option>
            <?php foreach ($lotes as $l): ?>
              <option value="<?= $l['id_lote'] ?>"><?= htmlspecialchars($l['nombre']) ?><?= $l['cultivo'] ? ' — '.htmlspecialchars($l['cultivo']) : '' ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="eFecha">Fecha *</label>
          <input type="date" id="eFecha" name="fecha" required>
        </div>
        <div class="form-group">
          <label for="eCantidad">Cantidad *</label>
          <input type="number" id="eCantidad" name="cantidad" min="0.01" step="0.01" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eUnidad">Unidad de Medida *</label>
          <select id="eUnidad" name="unidad_medida" required>
            <option value="kg">kg (kilogramos)</option>
            <option value="lb">lb (libras)</option>
            <option value="ton">ton (toneladas)</option>
            <option value="unidades">unidades</option>
            <option value="cajas">cajas</option>
            <option value="bultos">bultos</option>
          </select>
        </div>
      </div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalEditar')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnEditar">Guardar cambios</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL ELIMINAR -->
<div class="modal-overlay" id="modalEliminar">
  <div class="modal" style="max-width:420px;text-align:center;">
    <div style="font-size:40px;margin-bottom:12px;">🗑️</div>
    <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar registro?</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;">Esta acción no se puede deshacer.</p>
    <div class="modal-acciones">
      <button class="btn-cancelar" onclick="cerrarModal('modalEliminar')">Cancelar</button>
      <button class="btn-primary" style="background:#dc2626;" id="btnConfirmarEliminar">Eliminar</button>
    </div>
  </div>
</div>

<style>
  .prod-resumen { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:24px; }
  .form-group select { height:40px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
  .form-group select:focus { border-color:#2e9e4f; }
  .buscador-con-filtro { display:flex; gap:12px; align-items:center; }
  @media (max-width:900px) { .prod-resumen { grid-template-columns:1fr 1fr; } }
  @media (max-width:560px) { .prod-resumen { grid-template-columns:1fr; } }
</style>

<script>
const CTRL = '../../controllers/MayordomoProduccionController.php';
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
  document.querySelectorAll('#tablaProduccion tbody tr[data-busqueda]').forEach(tr => {
    tr.style.display = tr.dataset.busqueda.includes(q) ? '' : 'none';
  });
}

// MODAL REGISTRAR
function abrirModalRegistrar() {
  document.getElementById('formRegistrar').reset();
  document.getElementById('rFecha').value  = hoy;
  document.getElementById('rUnidad').value = 'kg';
  document.getElementById('msgModalRegistrar').style.display = 'none';
  document.getElementById('modalRegistrar').classList.add('modal-visible');
}
async function submitRegistrar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnRegistrar');
  btn.disabled = true; btn.textContent = 'Registrando…';
  const fd = new FormData(e.target);
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) { cerrarModal('modalRegistrar'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
    else { mostrarMsg('msgModalRegistrar', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Registrar'; }
  } catch { mostrarMsg('msgModalRegistrar', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Registrar'; }
}

// MODAL EDITAR
function abrirModalEditar(id, idTrabajador, idLote, fecha, cantidad, unidad) {
  document.getElementById('eId').value           = id;
  document.getElementById('eTrabajador').value   = idTrabajador;
  document.getElementById('eLote').value         = idLote;
  document.getElementById('eFecha').value        = fecha;
  document.getElementById('eCantidad').value     = cantidad;
  document.getElementById('eUnidad').value       = unidad;
  document.getElementById('msgModalEditar').style.display = 'none';
  document.getElementById('modalEditar').classList.add('modal-visible');
}
async function submitEditar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnEditar');
  btn.disabled = true; btn.textContent = 'Guardando…';
  const fd = new FormData(e.target);
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) { cerrarModal('modalEditar'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
    else { mostrarMsg('msgModalEditar', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Guardar cambios'; }
  } catch { mostrarMsg('msgModalEditar', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Guardar cambios'; }
}

// ELIMINAR
let _idEliminar = null;
function confirmarEliminar(id, trabajador) {
  _idEliminar = id;
  document.getElementById('tituloEliminar').textContent = `¿Eliminar registro de "${trabajador}"?`;
  document.getElementById('modalEliminar').classList.add('modal-visible');
}
document.getElementById('btnConfirmarEliminar').addEventListener('click', async () => {
  if (!_idEliminar) return;
  const btn = document.getElementById('btnConfirmarEliminar');
  btn.disabled = true;
  const fd = new FormData(); fd.append('accion', 'eliminar'); fd.append('id', _idEliminar);
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    cerrarModal('modalEliminar');
    mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
    if (json.ok) recargar();
  } catch { mostrarMsg('msgGlobal', 'Error de conexión', 'error'); }
  finally { btn.disabled = false; _idEliminar = null; }
});

document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('modal-visible');
  });
});
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
