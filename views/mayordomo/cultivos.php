<?php
/**
 * ============================================================
 * ARCHIVO: views/mayordomo/cultivos.php
 * PROPÓSITO: Módulo Gestión de Cultivos (vista mayordomo)
 * ============================================================
 * Funcionalidades:
 *   - 3 tarjetas resumen: total, activos, inhabilitados
 *   - Buscador en tiempo real + filtro por estado
 *   - Tabla: Nombre | Variedad | Cantidad Cultivada | Fecha Registro
 *            | Estado | Lotes Asociados | Acciones
 *   - Botón "+ Registrar Cultivo" → modal crear
 *   - Botón ✏️ editar | 🚫 toggle estado | 🗑️ eliminar por fila
 *
 * Conecta con:
 *   models/MayordomoCultivo.php              (lectura directa)
 *   controllers/MayordomoCultivoController.php (POST via fetch → JSON)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/MayordomoCultivo.php';

$db      = (new Database())->conectar();
$model   = new MayordomoCultivo($db);
$resumen = $model->resumen();
$cultivos= $model->listar();

$titulo_pagina = 'Cultivos - AgroFinca';
$modulo_activo = 'cultivos';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Cultivos</h1>
    <p class="mod-subtitulo">Consulta, registra y administra los cultivos de la finca</p>
  </div>
  <button class="btn-primary" onclick="abrirModalRegistrar()">+ Registrar Cultivo</button>
</div>

<!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
<div class="cult-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Cultivos</span>
    <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Activos</span>
    <span class="lote-stat-valor"><?= $resumen['activos'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Inhabilitados</span>
    <span class="lote-stat-valor"><?= $resumen['inhabilitados'] ?></span>
  </div>
</div>

<!-- ── FILTROS ───────────────────────────────────────────── -->
<div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="🔍  Buscar por nombre o variedad..."
         oninput="filtrarTabla()">
  <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
    <option value="">Todos</option>
    <option value="ACTIVO">Activo</option>
    <option value="INHABILITADO">Inhabilitado</option>
  </select>
</div>

<!-- ── MENSAJE FEEDBACK ─────────────────────────────────── -->
<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>

<!-- ── TABLA ─────────────────────────────────────────────── -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaCultivos">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Variedad</th>
        <th>Cantidad Cultivada</th>
        <th>Fecha Registro</th>
        <th>Estado</th>
        <th>Lotes Asociados</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($cultivos)): ?>
        <tr><td colspan="7" class="tabla-vacia">No hay cultivos registrados</td></tr>
      <?php else: ?>
        <?php foreach ($cultivos as $c): ?>
          <?php
            $activo    = strtoupper($c['estado']) === 'ACTIVO';
            $clsEstado = $activo ? 'badge-activo' : 'badge-inactivo';
            $lblEstado = $activo ? 'Activo' : 'Inhabilitado';
            $lotes     = (int) $c['lotes_asociados'];
            $lblLotes  = $lotes > 0
              ? $lotes . ' activo' . ($lotes !== 1 ? 's' : '')
              : 'Historial';
          ?>
          <tr data-busqueda="<?= strtolower(htmlspecialchars($c['nombre'] . ' ' . $c['variedad'])) ?>"
              data-estado="<?= strtoupper($c['estado']) ?>">
            <td><strong><?= htmlspecialchars($c['nombre']) ?></strong></td>
            <td><?= htmlspecialchars($c['variedad']) ?></td>
            <td><?= number_format((float)$c['cantidad_cultivada'], 0) ?> hectáreas</td>
            <td><?= htmlspecialchars($c['fecha_registro'] ?? '—') ?></td>
            <td><span class="badge <?= $clsEstado ?>"><?= $lblEstado ?></span></td>
            <td>
              <span class="cult-lotes-badge <?= $lotes > 0 ? 'cult-lotes-activos' : 'cult-lotes-historial' ?>">
                <?= $lblLotes ?>
              </span>
            </td>
            <td class="acciones">
              <!-- Editar -->
              <button class="btn-icono" title="Editar"
                onclick="abrirModalEditar(
                  <?= $c['id_cultivo'] ?>,
                  '<?= addslashes($c['nombre']) ?>',
                  '<?= addslashes($c['variedad']) ?>',
                  <?= (float)$c['cantidad_cultivada'] ?>,
                  '<?= $c['fecha_registro'] ?? '' ?>',
                  '<?= $c['estado'] ?>'
                )">✏️</button>

              <!-- Toggle estado -->
              <button class="btn-icono" title="<?= $activo ? 'Inhabilitar' : 'Habilitar' ?>"
                onclick="toggleEstado(<?= $c['id_cultivo'] ?>, '<?= $activo ? 'INHABILITADO' : 'ACTIVO' ?>', '<?= addslashes($c['nombre']) ?>')">
                <?= $activo ? '🚫' : '✅' ?>
              </button>

              <!-- Eliminar -->
              <button class="btn-icono" title="Eliminar"
                onclick="confirmarEliminar(<?= $c['id_cultivo'] ?>, '<?= addslashes($c['nombre']) ?>', <?= $lotes ?>)">
                🗑️
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: REGISTRAR CULTIVO
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalRegistrar">
  <div class="modal">
    <h2 class="modal-titulo">Registrar Cultivo</h2>
    <div id="msgModalRegistrar" class="msg-form" style="display:none;"></div>

    <form id="formRegistrar" onsubmit="submitRegistrar(event)">
      <input type="hidden" name="accion" value="registrar">

      <div class="form-grid-2">
        <div class="form-group">
          <label for="rNombre">Nombre *</label>
          <input type="text" id="rNombre" name="nombre"
                 placeholder="Ej: Café" maxlength="100" required>
        </div>
        <div class="form-group">
          <label for="rVariedad">Variedad *</label>
          <input type="text" id="rVariedad" name="variedad"
                 placeholder="Ej: Castillo" maxlength="100" required>
        </div>
        <div class="form-group">
          <label for="rCantidad">Cantidad Cultivada (ha)</label>
          <input type="number" id="rCantidad" name="cantidad_cultivada"
                 min="0" step="0.01" placeholder="Ej: 5">
        </div>
        <div class="form-group">
          <label for="rFecha">Fecha Registro *</label>
          <input type="date" id="rFecha" name="fecha_registro" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="rEstado">Estado</label>
          <select id="rEstado" name="estado">
            <option value="ACTIVO">Activo</option>
            <option value="INHABILITADO">Inhabilitado</option>
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


<!-- ══════════════════════════════════════════════════════
     MODAL: EDITAR CULTIVO
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalEditar">
  <div class="modal">
    <h2 class="modal-titulo">Editar Cultivo</h2>
    <div id="msgModalEditar" class="msg-form" style="display:none;"></div>

    <form id="formEditar" onsubmit="submitEditar(event)">
      <input type="hidden" name="accion" value="editar">
      <input type="hidden" name="id" id="eId">

      <div class="form-grid-2">
        <div class="form-group">
          <label for="eNombre">Nombre *</label>
          <input type="text" id="eNombre" name="nombre" maxlength="100" required>
        </div>
        <div class="form-group">
          <label for="eVariedad">Variedad *</label>
          <input type="text" id="eVariedad" name="variedad" maxlength="100" required>
        </div>
        <div class="form-group">
          <label for="eCantidad">Cantidad Cultivada (ha)</label>
          <input type="number" id="eCantidad" name="cantidad_cultivada" min="0" step="0.01">
        </div>
        <div class="form-group">
          <label for="eFecha">Fecha Registro *</label>
          <input type="date" id="eFecha" name="fecha_registro" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eEstado">Estado</label>
          <select id="eEstado" name="estado">
            <option value="ACTIVO">Activo</option>
            <option value="INHABILITADO">Inhabilitado</option>
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


<!-- ══════════════════════════════════════════════════════
     MODAL: CONFIRMAR ELIMINAR
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalEliminar">
  <div class="modal" style="max-width:420px;text-align:center;">
    <div style="font-size:40px;margin-bottom:12px;">🗑️</div>
    <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar cultivo?</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;" id="subEliminar">
      Esta acción no se puede deshacer.
    </p>
    <div class="modal-acciones">
      <button class="btn-cancelar" onclick="cerrarModal('modalEliminar')">Cancelar</button>
      <button class="btn-primary" style="background:#dc2626;" id="btnConfirmarEliminar">Eliminar</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     ESTILOS PROPIOS DEL MÓDULO
══════════════════════════════════════════════════════════ -->
<style>
  /* Tarjetas resumen */
  .cult-resumen {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-bottom: 24px;
  }

  /* Badge de lotes asociados */
  .cult-lotes-badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
  }
  .cult-lotes-activos  { background: #dbeafe; color: #1e40af; }
  .cult-lotes-historial{ background: #f3f4f6; color: #6b7280; }

  /* Selects en formulario */
  .form-group select {
    height: 40px;
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
  .form-group select:focus { border-color: #2e9e4f; }

  /* Select filtro en barra */
  .select-filtro {
    height: 42px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 0 12px;
    font-size: 14px;
    color: #374151;
    background: #fff;
    outline: none;
    cursor: pointer;
    min-width: 130px;
  }
  .select-filtro:focus { border-color: #2e9e4f; }

  .buscador-con-filtro {
    display: flex;
    gap: 12px;
    align-items: center;
  }

  @media (max-width: 768px) {
    .cult-resumen { grid-template-columns: 1fr 1fr; }
    .buscador-con-filtro { flex-wrap: wrap; }
  }
  @media (max-width: 480px) {
    .cult-resumen { grid-template-columns: 1fr; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
const CTRL = '../../controllers/MayordomoCultivoController.php';
const hoy  = new Date().toISOString().split('T')[0];

/* ── Utilidades ─────────────────────────────────────────── */
function mostrarMsg(id, texto, tipo) {
  const el = document.getElementById(id);
  if (!el) return;
  el.textContent   = texto;
  el.className     = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
  el.style.display = 'block';
  setTimeout(() => { el.style.display = 'none'; }, 4500);
}

function recargar() { setTimeout(() => location.reload(), 800); }

function cerrarModal(id) {
  document.getElementById(id).classList.remove('modal-visible');
}

/* ── Filtro en tiempo real ──────────────────────────────── */
function filtrarTabla() {
  const q      = document.getElementById('inputBusqueda').value.toLowerCase();
  const estado = document.getElementById('filtroEstado').value;

  document.querySelectorAll('#tablaCultivos tbody tr[data-busqueda]').forEach(tr => {
    const matchQ = tr.dataset.busqueda.includes(q);
    const matchE = !estado || tr.dataset.estado === estado;
    tr.style.display = (matchQ && matchE) ? '' : 'none';
  });
}

/* ══════════════════════════════════════════════════════════
   MODAL REGISTRAR
══════════════════════════════════════════════════════════ */
function abrirModalRegistrar() {
  document.getElementById('formRegistrar').reset();
  document.getElementById('rFecha').value  = hoy;
  document.getElementById('rEstado').value = 'ACTIVO';
  document.getElementById('msgModalRegistrar').style.display = 'none';
  document.getElementById('modalRegistrar').classList.add('modal-visible');
}

async function submitRegistrar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnRegistrar');
  btn.disabled    = true;
  btn.textContent = 'Registrando…';

  const fd = new FormData(e.target);
  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) {
      cerrarModal('modalRegistrar');
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgModalRegistrar', json.mensaje, 'error');
      btn.disabled    = false;
      btn.textContent = 'Registrar';
    }
  } catch {
    mostrarMsg('msgModalRegistrar', 'Error de conexión', 'error');
    btn.disabled    = false;
    btn.textContent = 'Registrar';
  }
}

/* ══════════════════════════════════════════════════════════
   MODAL EDITAR
══════════════════════════════════════════════════════════ */
function abrirModalEditar(id, nombre, variedad, cantidad, fecha, estado) {
  document.getElementById('eId').value        = id;
  document.getElementById('eNombre').value    = nombre;
  document.getElementById('eVariedad').value  = variedad;
  document.getElementById('eCantidad').value  = cantidad;
  document.getElementById('eFecha').value     = fecha;
  document.getElementById('eEstado').value    = estado;
  document.getElementById('msgModalEditar').style.display = 'none';
  document.getElementById('modalEditar').classList.add('modal-visible');
}

async function submitEditar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnEditar');
  btn.disabled    = true;
  btn.textContent = 'Guardando…';

  const fd = new FormData(e.target);
  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) {
      cerrarModal('modalEditar');
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgModalEditar', json.mensaje, 'error');
      btn.disabled    = false;
      btn.textContent = 'Guardar cambios';
    }
  } catch {
    mostrarMsg('msgModalEditar', 'Error de conexión', 'error');
    btn.disabled    = false;
    btn.textContent = 'Guardar cambios';
  }
}

/* ══════════════════════════════════════════════════════════
   TOGGLE ESTADO
══════════════════════════════════════════════════════════ */
async function toggleEstado(id, nuevoEstado, nombre) {
  const accion = nuevoEstado === 'INHABILITADO' ? 'inhabilitar' : 'habilitar';
  if (!confirm(`¿${accion.charAt(0).toUpperCase() + accion.slice(1)} el cultivo "${nombre}"?`)) return;

  const fd = new FormData();
  fd.append('accion', 'toggle_estado');
  fd.append('id',     id);
  fd.append('estado', nuevoEstado);

  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
    if (json.ok) recargar();
  } catch {
    mostrarMsg('msgGlobal', 'Error de conexión', 'error');
  }
}

/* ══════════════════════════════════════════════════════════
   ELIMINAR
══════════════════════════════════════════════════════════ */
let _idEliminar = null;

function confirmarEliminar(id, nombre, lotes) {
  _idEliminar = id;
  document.getElementById('tituloEliminar').textContent = `¿Eliminar "${nombre}"?`;
  document.getElementById('subEliminar').textContent = lotes > 0
    ? `Este cultivo tiene ${lotes} lote(s) asociado(s) y no podrá eliminarse.`
    : 'Esta acción no se puede deshacer.';
  document.getElementById('modalEliminar').classList.add('modal-visible');
}

document.getElementById('btnConfirmarEliminar').addEventListener('click', async () => {
  if (!_idEliminar) return;
  const btn = document.getElementById('btnConfirmarEliminar');
  btn.disabled = true;

  const fd = new FormData();
  fd.append('accion', 'eliminar');
  fd.append('id',     _idEliminar);

  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    cerrarModal('modalEliminar');
    mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
    if (json.ok) recargar();
  } catch {
    mostrarMsg('msgGlobal', 'Error de conexión', 'error');
  } finally {
    btn.disabled = false;
    _idEliminar  = null;
  }
});

/* ── Cerrar modales al hacer clic fuera ──────────────── */
document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('modal-visible');
  });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
