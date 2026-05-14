<?php
/**
 * ============================================================
 * ARCHIVO: views/mayordomo/tareas.php
 * PROPÓSITO: Módulo Gestión de Tareas (vista mayordomo)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/MayordomoTarea.php';

$db           = (new Database())->conectar();
$model        = new MayordomoTarea($db);
$id_mayordomo = (int) $_SESSION['id_usuario'];

$resumen      = $model->resumen($id_mayordomo);
$tareas       = $model->listar($id_mayordomo);
$lotes        = $model->listarLotes();
$trabajadores = $model->listarTrabajadores();

$titulo_pagina = 'Tareas - AgroFinca';
$modulo_activo = 'tareas';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- CABECERA -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Tareas</h1>
    <p class="mod-subtitulo">Crea y asigna tareas a trabajadores</p>
  </div>
  <button class="btn-primary" onclick="abrirModalCrear()">+ Crear Tarea</button>
</div>

<!-- TARJETAS RESUMEN -->
<div class="tar-resumen-4">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Tareas</span>
    <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Pendientes</span>
    <span class="lote-stat-valor"><?= $resumen['pendientes'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">En Progreso</span>
    <span class="lote-stat-valor"><?= $resumen['en_progreso'] ?></span>
  </div>
  <div class="lote-card-stat" style="background:#f0fdf4;border:1px solid #bbf7d0;">
    <span class="lote-stat-label">Completadas</span>
    <span class="lote-stat-valor" style="color:#166534;"><?= $resumen['completadas'] ?></span>
  </div>
</div>

<!-- FILTROS -->
<div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="Buscar por nombre de tarea o lote..."
         oninput="filtrarTabla()">
  <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
    <option value="">Todos los estados</option>
    <option value="PENDIENTE">Pendiente</option>
    <option value="EN_PROGRESO">En progreso</option>
    <option value="COMPLETADA">Completada</option>
  </select>
</div>

<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>

<!-- TABLA -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaTareas">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Lote</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Trabajadores</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($tareas)): ?>
        <tr><td colspan="7" class="tabla-vacia">No hay tareas registradas</td></tr>
      <?php else: ?>
        <?php foreach ($tareas as $t): ?>
          <?php
            [$clsEstado, $lblEstado] = match($t['estado_tarea']) {
              'PENDIENTE'   => ['badge-tarea-pendiente',  'Pendiente'],
              'EN_PROGRESO' => ['badge-tarea-progreso',   'En progreso'],
              'COMPLETADA'  => ['badge-tarea-completada', 'Completada'],
              default       => ['badge-inactivo',          htmlspecialchars($t['estado_tarea'])],
            };
            $trabajadoresIds = $model->trabajadoresDeTarea((int)$t['id_tarea']);
          ?>
          <tr data-busqueda="<?= strtolower(htmlspecialchars(($t['nombre'] ?? '') . ' ' . ($t['lote'] ?? ''))) ?>"
              data-estado="<?= htmlspecialchars($t['estado_tarea']) ?>">
            <td><strong><?= htmlspecialchars($t['nombre']) ?></strong></td>
            <td><?= htmlspecialchars($t['lote'] ?? '—') ?></td>
            <td><?= htmlspecialchars($t['fecha_inicio'] ?? '—') ?></td>
            <td><?= htmlspecialchars($t['fecha_fin_estimada'] ?? '—') ?></td>
            <td class="tarea-trabajadores-celda"><?= htmlspecialchars($t['trabajadores'] ?? '—') ?></td>
            <td><span class="badge <?= $clsEstado ?>"><?= $lblEstado ?></span></td>
            <td class="acciones">
              <button class="btn-icono" title="Editar"
                onclick="abrirModalEditar(
                  <?= $t['id_tarea'] ?>,
                  '<?= addslashes($t['nombre']) ?>',
                  <?= (int)($t['id_lote'] ?? 0) ?>,
                  '<?= $t['fecha_inicio'] ?? '' ?>',
                  '<?= $t['fecha_fin_estimada'] ?? '' ?>',
                  '<?= $t['estado_tarea'] ?>',
                  '<?= addslashes($t['descripcion'] ?? '') ?>',
                  [<?= implode(',', array_map('intval', $trabajadoresIds)) ?>]
                )">✏️</button>
              <?php if ($t['estado_tarea'] === 'PENDIENTE'): ?>
                <button class="btn-estado btn-estado-progreso"
                  onclick="cambiarEstado(<?= $t['id_tarea'] ?>, 'EN_PROGRESO')">Iniciar</button>
              <?php elseif ($t['estado_tarea'] === 'EN_PROGRESO'): ?>
                <button class="btn-estado btn-estado-completar"
                  onclick="cambiarEstado(<?= $t['id_tarea'] ?>, 'COMPLETADA')">Completar</button>
              <?php endif; ?>
              <?php if ($t['estado_tarea'] === 'PENDIENTE'): ?>
                <button class="btn-icono" title="Eliminar"
                  onclick="confirmarEliminar(<?= $t['id_tarea'] ?>, '<?= addslashes($t['nombre']) ?>')">🗑️</button>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- MODAL CREAR -->
<div class="modal-overlay" id="modalCrear">
  <div class="modal" style="max-width:620px;">
    <h2 class="modal-titulo">Crear Tarea</h2>
    <div id="msgModalCrear" class="msg-form" style="display:none;"></div>
    <form id="formCrear" onsubmit="submitCrear(event)">
      <input type="hidden" name="accion" value="crear">
      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="cNombre">Nombre de la Tarea *</label>
          <input type="text" id="cNombre" name="nombre" placeholder="Ej: Poda de cafetos" maxlength="100" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="cDescripcion">Descripción</label>
          <textarea id="cDescripcion" name="descripcion" rows="2" class="tarea-textarea" placeholder="Descripción detallada (opcional)"></textarea>
        </div>
        <div class="form-group">
          <label for="cLote">Lote *</label>
          <select id="cLote" name="id_lote" required>
            <option value="">Selecciona un lote</option>
            <?php foreach ($lotes as $l): ?>
              <option value="<?= $l['id_lote'] ?>"><?= htmlspecialchars($l['nombre']) ?><?= $l['cultivo'] ? ' — ' . htmlspecialchars($l['cultivo']) : '' ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="cEstado">Estado</label>
          <select id="cEstado" name="estado_tarea">
            <option value="PENDIENTE">Pendiente</option>
            <option value="EN_PROGRESO">En progreso</option>
            <option value="COMPLETADA">Completada</option>
          </select>
        </div>
        <div class="form-group">
          <label for="cInicio">Fecha Inicio *</label>
          <input type="date" id="cInicio" name="fecha_inicio" required>
        </div>
        <div class="form-group">
          <label for="cFin">Fecha Fin Estimada</label>
          <input type="date" id="cFin" name="fecha_fin_estimada">
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label>Trabajadores Asignados</label>
          <div class="tarea-trabajadores-grid" id="cTrabajadoresGrid">
            <?php foreach ($trabajadores as $tr): ?>
              <label class="tarea-check-label">
                <input type="checkbox" name="trabajadores[]" value="<?= $tr['id_trabajador'] ?>">
                <?= htmlspecialchars($tr['nombre_completo']) ?>
              </label>
            <?php endforeach; ?>
            <?php if (empty($trabajadores)): ?><p style="font-size:13px;color:#9ca3af;">No hay trabajadores activos.</p><?php endif; ?>
          </div>
        </div>
      </div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalCrear')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnCrear">Crear Tarea</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL EDITAR -->
<div class="modal-overlay" id="modalEditar">
  <div class="modal" style="max-width:620px;">
    <h2 class="modal-titulo">Editar Tarea</h2>
    <div id="msgModalEditar" class="msg-form" style="display:none;"></div>
    <form id="formEditar" onsubmit="submitEditar(event)">
      <input type="hidden" name="accion" value="editar">
      <input type="hidden" name="id" id="eId">
      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eNombre">Nombre de la Tarea *</label>
          <input type="text" id="eNombre" name="nombre" maxlength="100" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eDescripcion">Descripción</label>
          <textarea id="eDescripcion" name="descripcion" rows="2" class="tarea-textarea"></textarea>
        </div>
        <div class="form-group">
          <label for="eLote">Lote *</label>
          <select id="eLote" name="id_lote" required>
            <option value="">Selecciona un lote</option>
            <?php foreach ($lotes as $l): ?>
              <option value="<?= $l['id_lote'] ?>"><?= htmlspecialchars($l['nombre']) ?><?= $l['cultivo'] ? ' — ' . htmlspecialchars($l['cultivo']) : '' ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="eEstado">Estado</label>
          <select id="eEstado" name="estado_tarea">
            <option value="PENDIENTE">Pendiente</option>
            <option value="EN_PROGRESO">En progreso</option>
            <option value="COMPLETADA">Completada</option>
          </select>
        </div>
        <div class="form-group">
          <label for="eInicio">Fecha Inicio *</label>
          <input type="date" id="eInicio" name="fecha_inicio" required>
        </div>
        <div class="form-group">
          <label for="eFin">Fecha Fin Estimada</label>
          <input type="date" id="eFin" name="fecha_fin_estimada">
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label>Trabajadores Asignados</label>
          <div class="tarea-trabajadores-grid" id="eTrabajadoresGrid">
            <?php foreach ($trabajadores as $tr): ?>
              <label class="tarea-check-label">
                <input type="checkbox" name="trabajadores[]" value="<?= $tr['id_trabajador'] ?>" class="e-trabajador-check">
                <?= htmlspecialchars($tr['nombre_completo']) ?>
              </label>
            <?php endforeach; ?>
          </div>
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
    <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar tarea?</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;">Solo se pueden eliminar tareas en estado Pendiente.</p>
    <div class="modal-acciones">
      <button class="btn-cancelar" onclick="cerrarModal('modalEliminar')">Cancelar</button>
      <button class="btn-primary" style="background:#dc2626;" id="btnConfirmarEliminar">Eliminar</button>
    </div>
  </div>
</div>

<style>
  .tar-resumen-4 { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:24px; }
  .badge-tarea-pendiente  { background:#fef3c7; color:#92400e; }
  .badge-tarea-progreso   { background:#dbeafe; color:#1e40af; }
  .badge-tarea-completada { background:#dcfce7; color:#166534; }
  .btn-estado { border:none; border-radius:6px; padding:4px 10px; font-size:12px; font-weight:600; cursor:pointer; transition:opacity 0.15s; white-space:nowrap; }
  .btn-estado:hover { opacity:0.82; }
  .btn-estado-progreso  { background:#dbeafe; color:#1e40af; }
  .btn-estado-completar { background:#dcfce7; color:#166534; }
  .tarea-trabajadores-celda { max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; font-size:13px; color:#374151; }
  .tarea-textarea { width:100%; border:1px solid #d1d5db; border-radius:8px; padding:8px 12px; font-size:14px; font-family:inherit; resize:vertical; outline:none; transition:border-color 0.2s; color:#111827; background:#fff; }
  .tarea-textarea:focus { border-color:#2e9e4f; }
  .tarea-trabajadores-grid { display:grid; grid-template-columns:1fr 1fr; gap:8px; max-height:180px; overflow-y:auto; border:1px solid #e5e7eb; border-radius:8px; padding:10px 12px; background:#fafafa; }
  .tarea-check-label { display:flex; align-items:center; gap:8px; font-size:13px; color:#374151; cursor:pointer; padding:4px 6px; border-radius:6px; transition:background 0.15s; }
  .tarea-check-label:hover { background:#f0fdf4; }
  .tarea-check-label input[type="checkbox"] { width:16px; height:16px; accent-color:#2e9e4f; cursor:pointer; flex-shrink:0; }
  .form-group select { height:40px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
  .form-group select:focus { border-color:#2e9e4f; }
  .select-filtro { height:42px; border:1px solid #e5e7eb; border-radius:8px; padding:0 12px; font-size:14px; color:#374151; background:#fff; outline:none; cursor:pointer; min-width:160px; }
  .select-filtro:focus { border-color:#2e9e4f; }
  .buscador-con-filtro { display:flex; gap:12px; align-items:center; }
  @media (max-width:900px) { .tar-resumen-4 { grid-template-columns:1fr 1fr; } }
  @media (max-width:560px) { .tar-resumen-4 { grid-template-columns:1fr; } .tarea-trabajadores-grid { grid-template-columns:1fr; } .buscador-con-filtro { flex-wrap:wrap; } }
</style>

<script>
const CTRL = '../../controllers/MayordomoTareaController.php';
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
  document.querySelectorAll('#tablaTareas tbody tr[data-busqueda]').forEach(tr => {
    const matchQ = tr.dataset.busqueda.includes(q);
    const matchE = !estado || tr.dataset.estado === estado;
    tr.style.display = (matchQ && matchE) ? '' : 'none';
  });
}

function abrirModalCrear() {
  document.getElementById('formCrear').reset();
  document.getElementById('cInicio').value = hoy;
  document.getElementById('cEstado').value = 'PENDIENTE';
  document.querySelectorAll('#cTrabajadoresGrid input[type="checkbox"]').forEach(cb => cb.checked = false);
  document.getElementById('msgModalCrear').style.display = 'none';
  document.getElementById('modalCrear').classList.add('modal-visible');
}

async function submitCrear(e) {
  e.preventDefault();
  const btn = document.getElementById('btnCrear');
  btn.disabled = true; btn.textContent = 'Creando…';
  const fd = new FormData(e.target);
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) { cerrarModal('modalCrear'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
    else { mostrarMsg('msgModalCrear', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Crear Tarea'; }
  } catch { mostrarMsg('msgModalCrear', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Crear Tarea'; }
}

function abrirModalEditar(id, nombre, idLote, inicio, fin, estado, descripcion, trabajadoresIds) {
  document.getElementById('eId').value = id;
  document.getElementById('eNombre').value = nombre;
  document.getElementById('eLote').value = idLote;
  document.getElementById('eInicio').value = inicio;
  document.getElementById('eFin').value = fin;
  document.getElementById('eEstado').value = estado;
  document.getElementById('eDescripcion').value = descripcion;
  document.querySelectorAll('#eTrabajadoresGrid input[type="checkbox"]').forEach(cb => {
    cb.checked = trabajadoresIds.includes(parseInt(cb.value));
  });
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

async function cambiarEstado(id, nuevoEstado) {
  const fd = new FormData();
  fd.append('accion', 'cambiar_estado'); fd.append('id', id); fd.append('estado', nuevoEstado);
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
    if (json.ok) recargar();
  } catch { mostrarMsg('msgGlobal', 'Error de conexión', 'error'); }
}

let _idEliminar = null;
function confirmarEliminar(id, nombre) {
  _idEliminar = id;
  document.getElementById('tituloEliminar').textContent = `¿Eliminar "${nombre}"?`;
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
