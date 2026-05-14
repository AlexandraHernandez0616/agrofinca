<?php
/**
 * ============================================================
 * ARCHIVO: views/mayordomo/lotes.php
 * PROPÓSITO: Módulo Gestión de Lotes (vista mayordomo)
 * ============================================================
 * Funcionalidades:
 *   - 3 tarjetas resumen: total lotes, extensión total, tipos de cultivo
 *   - Buscador en tiempo real (nombre, ubicación, cultivo)
 *   - Tabla: Nombre | Ubicación | Extensión | Tipo de Cultivo | Fecha Registro | Acciones
 *   - Botón "+ Registrar Lote" → modal crear
 *   - Botón ✏️ por fila → modal editar
 *   - Botón 👁 por fila → modal ver detalle
 *
 * Conecta con:
 *   models/MayordomoLote.php              (lectura directa)
 *   controllers/MayordomoLoteController.php (POST via fetch → JSON)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/MayordomoLote.php';

$db      = (new Database())->conectar();
$model   = new MayordomoLote($db);
$resumen = $model->resumen();
$lotes   = $model->listar();
$cultivos= $model->listarCultivos();

$titulo_pagina = 'Lotes - AgroFinca';
$modulo_activo = 'lotes';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Lotes</h1>
    <p class="mod-subtitulo">Registra y consulta los lotes de la finca</p>
  </div>
  <button class="btn-primary" onclick="abrirModalRegistrar()">+ Registrar Lote</button>
</div>

<!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
<div class="lot-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Lotes</span>
    <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Extensión Total</span>
    <span class="lote-stat-valor"><?= number_format($resumen['extension_total'], 1) ?> ha</span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Tipos de Cultivo</span>
    <span class="lote-stat-valor"><?= $resumen['tipos_cultivo'] ?></span>
  </div>
</div>

<!-- ── BUSCADOR ──────────────────────────────────────────── -->
<div class="buscador-wrap" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="🔍  Buscar por nombre, ubicación o cultivo..."
         oninput="filtrarTabla()">
</div>

<!-- ── MENSAJE FEEDBACK ─────────────────────────────────── -->
<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>

<!-- ── TABLA ─────────────────────────────────────────────── -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaLotes">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Ubicación</th>
        <th>Extensión</th>
        <th>Tipo de Cultivo</th>
        <th>Fecha Registro</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($lotes)): ?>
        <tr><td colspan="6" class="tabla-vacia">No hay lotes registrados</td></tr>
      <?php else: ?>
        <?php foreach ($lotes as $l): ?>
          <tr data-busqueda="<?= strtolower(
                htmlspecialchars(
                  ($l['nombre'] ?? '') . ' ' .
                  ($l['ubicacion_descripcion'] ?? '') . ' ' .
                  ($l['cultivo_nombre'] ?? '')
                )
              ) ?>">
            <td><strong><?= htmlspecialchars($l['nombre']) ?></strong></td>
            <td><?= htmlspecialchars($l['ubicacion_descripcion'] ?? '—') ?></td>
            <td><?= $l['extension'] ? number_format((float)$l['extension'], 1) . ' hectáreas' : '—' ?></td>
            <td>
              <?php if ($l['cultivo_nombre']): ?>
                <span class="badge badge-cultivo"><?= htmlspecialchars($l['cultivo_nombre']) ?></span>
              <?php else: ?>—<?php endif; ?>
            </td>
            <td><?= htmlspecialchars($l['fecha_registro'] ?? '—') ?></td>
            <td class="acciones">
              <!-- Ver detalle -->
              <button class="btn-icono" title="Ver detalle"
                onclick="verDetalle(
                  '<?= addslashes($l['nombre']) ?>',
                  '<?= addslashes($l['ubicacion_descripcion'] ?? '') ?>',
                  '<?= $l['extension'] ?>',
                  '<?= addslashes($l['cultivo_nombre'] ?? '') ?>',
                  '<?= $l['fecha_registro'] ?? '' ?>'
                )">👁</button>
              <!-- Editar -->
              <button class="btn-icono" title="Editar"
                onclick="abrirModalEditar(
                  <?= $l['id_lote'] ?>,
                  '<?= addslashes($l['nombre']) ?>',
                  '<?= addslashes($l['ubicacion_descripcion'] ?? '') ?>',
                  <?= (float)($l['extension'] ?? 0) ?>,
                  <?= (int)($l['id_cultivo'] ?? 0) ?>,
                  '<?= $l['fecha_registro'] ?? '' ?>'
                )">✏️</button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: REGISTRAR LOTE
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalRegistrar">
  <div class="modal">
    <h2 class="modal-titulo">Registrar Lote</h2>
    <div id="msgModalRegistrar" class="msg-form" style="display:none;"></div>

    <form id="formRegistrar" onsubmit="submitRegistrar(event)">
      <input type="hidden" name="accion" value="registrar">

      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="rNombre">Nombre del Lote *</label>
          <input type="text" id="rNombre" name="nombre"
                 placeholder="Ej: Lote Norte" maxlength="100" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="rUbicacion">Ubicación / Descripción</label>
          <input type="text" id="rUbicacion" name="ubicacion_descripcion"
                 placeholder="Ej: Zona A, sector norte" maxlength="150">
        </div>
        <div class="form-group">
          <label for="rExtension">Extensión (hectáreas)</label>
          <input type="number" id="rExtension" name="extension"
                 min="0" step="0.01" placeholder="Ej: 5.5">
        </div>
        <div class="form-group">
          <label for="rFecha">Fecha Registro *</label>
          <input type="date" id="rFecha" name="fecha_registro" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="rCultivo">Tipo de Cultivo *</label>
          <select id="rCultivo" name="id_cultivo" required>
            <option value="">Selecciona un cultivo</option>
            <?php foreach ($cultivos as $c): ?>
              <option value="<?= $c['id_cultivo'] ?>">
                <?= htmlspecialchars($c['nombre']) ?>
                <?= $c['variedad'] ? '— ' . htmlspecialchars($c['variedad']) : '' ?>
              </option>
            <?php endforeach; ?>
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
     MODAL: EDITAR LOTE
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalEditar">
  <div class="modal">
    <h2 class="modal-titulo">Editar Lote</h2>
    <div id="msgModalEditar" class="msg-form" style="display:none;"></div>

    <form id="formEditar" onsubmit="submitEditar(event)">
      <input type="hidden" name="accion" value="editar">
      <input type="hidden" name="id" id="eId">

      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eNombre">Nombre del Lote *</label>
          <input type="text" id="eNombre" name="nombre" maxlength="100" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eUbicacion">Ubicación / Descripción</label>
          <input type="text" id="eUbicacion" name="ubicacion_descripcion" maxlength="150">
        </div>
        <div class="form-group">
          <label for="eExtension">Extensión (hectáreas)</label>
          <input type="number" id="eExtension" name="extension" min="0" step="0.01">
        </div>
        <div class="form-group">
          <label for="eFecha">Fecha Registro *</label>
          <input type="date" id="eFecha" name="fecha_registro" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eCultivo">Tipo de Cultivo *</label>
          <select id="eCultivo" name="id_cultivo" required>
            <option value="">Selecciona un cultivo</option>
            <?php foreach ($cultivos as $c): ?>
              <option value="<?= $c['id_cultivo'] ?>">
                <?= htmlspecialchars($c['nombre']) ?>
                <?= $c['variedad'] ? '— ' . htmlspecialchars($c['variedad']) : '' ?>
              </option>
            <?php endforeach; ?>
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
     MODAL: VER DETALLE
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalDetalle">
  <div class="modal" style="max-width:480px;">
    <h2 class="modal-titulo">Detalle del Lote</h2>
    <div class="detalle-grid">
      <div class="detalle-item">
        <span class="detalle-label">Nombre</span>
        <span id="dNombre"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Ubicación</span>
        <span id="dUbicacion"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Extensión</span>
        <span id="dExtension"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Tipo de Cultivo</span>
        <span id="dCultivo"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Fecha Registro</span>
        <span id="dFecha"></span>
      </div>
    </div>
    <div class="modal-acciones">
      <button class="btn-primary" onclick="cerrarModal('modalDetalle')">Cerrar</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     ESTILOS PROPIOS DEL MÓDULO
══════════════════════════════════════════════════════════ -->
<style>
  /* Tarjetas resumen */
  .lot-resumen {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-bottom: 24px;
  }

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

  @media (max-width: 768px) {
    .lot-resumen { grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 480px) {
    .lot-resumen { grid-template-columns: 1fr; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
const CTRL = '../../controllers/MayordomoLoteController.php';
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
  const q = document.getElementById('inputBusqueda').value.toLowerCase();
  document.querySelectorAll('#tablaLotes tbody tr[data-busqueda]').forEach(tr => {
    tr.style.display = tr.dataset.busqueda.includes(q) ? '' : 'none';
  });
}

/* ══════════════════════════════════════════════════════════
   MODAL REGISTRAR
══════════════════════════════════════════════════════════ */
function abrirModalRegistrar() {
  document.getElementById('formRegistrar').reset();
  document.getElementById('rFecha').value = hoy;
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
function abrirModalEditar(id, nombre, ubicacion, extension, idCultivo, fecha) {
  document.getElementById('eId').value        = id;
  document.getElementById('eNombre').value    = nombre;
  document.getElementById('eUbicacion').value = ubicacion;
  document.getElementById('eExtension').value = extension;
  document.getElementById('eCultivo').value   = idCultivo;
  document.getElementById('eFecha').value     = fecha;
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
   VER DETALLE
══════════════════════════════════════════════════════════ */
function verDetalle(nombre, ubicacion, extension, cultivo, fecha) {
  document.getElementById('dNombre').textContent    = nombre;
  document.getElementById('dUbicacion').textContent = ubicacion || '—';
  document.getElementById('dExtension').textContent = extension ? extension + ' hectáreas' : '—';
  document.getElementById('dCultivo').textContent   = cultivo || '—';
  document.getElementById('dFecha').textContent     = fecha || '—';
  document.getElementById('modalDetalle').classList.add('modal-visible');
}

/* ── Cerrar modales al hacer clic fuera ──────────────── */
document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('modal-visible');
  });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
