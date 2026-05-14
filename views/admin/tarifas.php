<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/tarifas.php
 * PROPÓSITO: Módulo Gestión de Tarifas de Pago (admin)
 * ============================================================
 * Funcionalidades:
 *   - Tarjetas resumen (total, activas, inactivas)
 *   - Tabla con filtro por tipo y estado
 *   - Botón "+ Nueva Tarifa" → modal crear
 *   - Botón editar por fila → modal editar
 *   - Botón Deshabilitar / Habilitar por fila (toggle inline)
 *   - Botón eliminar con confirmación
 *
 * Conecta con:
 *   models/Tarifa.php              (lectura directa)
 *   controllers/TarifaController.php (POST via fetch → JSON)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Tarifa.php';

$db      = (new Database())->conectar();
$model   = new Tarifa($db);
$resumen = $model->resumen();
$lista   = $model->listar();

$titulo_pagina = 'Tarifas - AgroFinca';
$modulo_activo = 'tarifas';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Tarifas de Pago</h1>
    <p class="mod-subtitulo">Administra las tarifas de pago del sistema</p>
  </div>
  <button class="btn-primary" onclick="abrirModalCrear()">+ Nueva Tarifa</button>
</div>

<!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
<div class="tar-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Tarifas</span>
    <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Tarifas Activas</span>
    <span class="lote-stat-valor"><?= $resumen['activas'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Tarifas Inactivas</span>
    <span class="lote-stat-valor"><?= $resumen['inactivas'] ?></span>
  </div>
</div>

<!-- ── FILTROS ───────────────────────────────────────────── -->
<div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="🔍  Buscar por tipo de tarifa..."
         oninput="filtrarTabla()">
  <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
    <option value="">Todos los estados</option>
    <option value="activa">Activa</option>
    <option value="inactiva">Inactiva</option>
  </select>
  <select class="select-filtro" id="filtroTipo" onchange="filtrarTabla()">
    <option value="">Todos los tipos</option>
    <option value="JORNAL">Jornada</option>
    <option value="PRODUCCION">Producción</option>
    <option value="MIXTO">Mixta</option>
  </select>
</div>

<!-- ── MENSAJE FEEDBACK ─────────────────────────────────── -->
<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>

<!-- ── TABLA ─────────────────────────────────────────────── -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaTarifas">
    <thead>
      <tr>
        <th>Tipo de Tarifa</th>
        <th>Valor (COP)</th>
        <th>Fecha de Inicio</th>
        <th>Fecha Fin</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($lista)): ?>
        <tr><td colspan="6" class="tabla-vacia">No hay tarifas registradas</td></tr>
      <?php else: ?>
        <?php foreach ($lista as $t): ?>
          <?php
            $activa   = (bool) $t['activa'];
            $clsEstado = $activa ? 'badge-activo' : 'badge-inactivo';
            $lblEstado = $activa ? 'Activa'       : 'Inactiva';
            $lblTipo   = match($t['tipo_pago']) {
              'JORNAL'     => 'Jornada',
              'PRODUCCION' => 'Producción',
              'MIXTO'      => 'Mixta',
              default      => htmlspecialchars($t['tipo_pago']),
            };
            $finVig = $t['fecha_fin_vigencia'] ?? '—';
          ?>
          <tr data-tipo="<?= $t['tipo_pago'] ?>"
              data-estado="<?= $activa ? 'activa' : 'inactiva' ?>"
              data-busqueda="<?= strtolower($lblTipo) ?>">
            <td><?= $lblTipo ?></td>
            <td>$<?= number_format((float)$t['valor'], 0, '.', ',') ?></td>
            <td><?= htmlspecialchars($t['fecha_inicio_vigencia']) ?></td>
            <td><?= htmlspecialchars($finVig) ?></td>
            <td><span class="badge <?= $clsEstado ?>"><?= $lblEstado ?></span></td>
            <td class="acciones">
              <!-- Editar -->
              <button class="btn-icono" title="Editar"
                onclick="abrirModalEditar(
                  <?= $t['id_tarifa'] ?>,
                  '<?= $t['tipo_pago'] ?>',
                  <?= $t['valor'] ?>,
                  '<?= $t['fecha_inicio_vigencia'] ?>',
                  '<?= $t['fecha_fin_vigencia'] ?? '' ?>',
                  <?= $activa ? 1 : 0 ?>
                )">✏️</button>

              <!-- Toggle habilitar / deshabilitar -->
              <button class="btn-toggle <?= $activa ? 'btn-deshabilitar' : 'btn-habilitar' ?>"
                onclick="toggleTarifa(<?= $t['id_tarifa'] ?>, <?= $activa ? 0 : 1 ?>)">
                <?= $activa ? 'Deshabilitar' : 'Habilitar' ?>
              </button>

              <!-- Eliminar -->
              <button class="btn-icono" title="Eliminar"
                onclick="confirmarEliminar(<?= $t['id_tarifa'] ?>, '<?= $lblTipo ?>')">🗑️</button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: CREAR TARIFA
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalCrear">
  <div class="modal">
    <h2 class="modal-titulo">Nueva Tarifa</h2>
    <div id="msgModalCrear" class="msg-form" style="display:none;"></div>

    <form id="formCrear" onsubmit="submitCrear(event)">
      <input type="hidden" name="accion" value="crear">

      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="cTipo">Tipo de Tarifa *</label>
          <select id="cTipo" name="tipo_pago" required>
            <option value="">Selecciona un tipo</option>
            <option value="JORNAL">Jornada</option>
            <option value="PRODUCCION">Producción</option>
            <option value="MIXTO">Mixta</option>
          </select>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="cValor">Valor (COP) *</label>
          <input type="number" id="cValor" name="valor" min="1" step="0.01"
                 placeholder="Ej: 50000" required>
        </div>
        <div class="form-group">
          <label for="cInicio">Fecha Inicio Vigencia *</label>
          <input type="date" id="cInicio" name="fecha_inicio_vigencia" required>
        </div>
        <div class="form-group">
          <label for="cFin">Fecha Fin Vigencia</label>
          <input type="date" id="cFin" name="fecha_fin_vigencia">
        </div>
      </div>

      <label class="checkbox-label" style="margin-bottom:20px;">
        <input type="checkbox" id="cActiva" name="activa" value="1" checked>
        Tarifa activa al registrar
      </label>

      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalCrear')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnCrear">Registrar</button>
      </div>
    </form>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: EDITAR TARIFA
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalEditar">
  <div class="modal">
    <h2 class="modal-titulo">Editar Tarifa</h2>
    <div id="msgModalEditar" class="msg-form" style="display:none;"></div>

    <form id="formEditar" onsubmit="submitEditar(event)">
      <input type="hidden" name="accion" value="editar">
      <input type="hidden" name="id"     id="eId">

      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eTipo">Tipo de Tarifa *</label>
          <select id="eTipo" name="tipo_pago" required>
            <option value="JORNAL">Jornada</option>
            <option value="PRODUCCION">Producción</option>
            <option value="MIXTO">Mixta</option>
          </select>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="eValor">Valor (COP) *</label>
          <input type="number" id="eValor" name="valor" min="1" step="0.01" required>
        </div>
        <div class="form-group">
          <label for="eInicio">Fecha Inicio Vigencia *</label>
          <input type="date" id="eInicio" name="fecha_inicio_vigencia" required>
        </div>
        <div class="form-group">
          <label for="eFin">Fecha Fin Vigencia</label>
          <input type="date" id="eFin" name="fecha_fin_vigencia">
        </div>
      </div>

      <label class="checkbox-label" style="margin-bottom:20px;">
        <input type="checkbox" id="eActiva" name="activa" value="1">
        Tarifa activa
      </label>

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
    <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar tarifa?</h2>
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
  .tar-resumen {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
    margin-bottom: 24px;
  }

  /* Selects dentro de formulario */
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
  }
  .form-group select:focus { border-color: #2e9e4f; }

  /* Botones toggle en tabla */
  .btn-toggle {
    border: none;
    border-radius: 6px;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: opacity 0.15s;
    white-space: nowrap;
  }
  .btn-toggle:hover { opacity: 0.82; }
  .btn-deshabilitar { background: #fdecea; color: #b91c1c; }
  .btn-habilitar    { background: #dcfce7; color: #166534; }

  @media (max-width: 768px) {
    .tar-resumen { grid-template-columns: 1fr 1fr; }
    .buscador-con-filtro { flex-wrap: wrap; }
  }
  @media (max-width: 480px) {
    .tar-resumen { grid-template-columns: 1fr; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
const CTRL = '../../controllers/TarifaController.php';

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
  const tipo   = document.getElementById('filtroTipo').value;

  document.querySelectorAll('#tablaTarifas tbody tr[data-busqueda]').forEach(tr => {
    const matchQ = tr.dataset.busqueda.includes(q);
    const matchE = !estado || tr.dataset.estado === estado;
    const matchT = !tipo   || tr.dataset.tipo   === tipo;
    tr.style.display = (matchQ && matchE && matchT) ? '' : 'none';
  });
}

/* ══════════════════════════════════════════════════════════
   MODAL CREAR
══════════════════════════════════════════════════════════ */
function abrirModalCrear() {
  document.getElementById('formCrear').reset();
  document.getElementById('cActiva').checked = true;
  document.getElementById('msgModalCrear').style.display = 'none';
  document.getElementById('modalCrear').classList.add('modal-visible');
}

async function submitCrear(e) {
  e.preventDefault();
  const btn = document.getElementById('btnCrear');
  btn.disabled = true;
  btn.textContent = 'Guardando…';

  const fd = new FormData(e.target);
  // Checkbox no enviado si no está marcado → asegurar valor
  if (!e.target.querySelector('[name="activa"]').checked) {
    fd.set('activa', '0');
  }

  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) {
      cerrarModal('modalCrear');
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgModalCrear', json.mensaje, 'error');
      btn.disabled = false;
      btn.textContent = 'Registrar';
    }
  } catch {
    mostrarMsg('msgModalCrear', 'Error de conexión', 'error');
    btn.disabled = false;
    btn.textContent = 'Registrar';
  }
}

/* ══════════════════════════════════════════════════════════
   MODAL EDITAR
══════════════════════════════════════════════════════════ */
function abrirModalEditar(id, tipo, valor, inicio, fin, activa) {
  document.getElementById('eId').value      = id;
  document.getElementById('eTipo').value    = tipo;
  document.getElementById('eValor').value   = valor;
  document.getElementById('eInicio').value  = inicio;
  document.getElementById('eFin').value     = fin;
  document.getElementById('eActiva').checked = activa == 1;
  document.getElementById('msgModalEditar').style.display = 'none';
  document.getElementById('modalEditar').classList.add('modal-visible');
}

async function submitEditar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnEditar');
  btn.disabled = true;
  btn.textContent = 'Guardando…';

  const fd = new FormData(e.target);
  if (!e.target.querySelector('[name="activa"]').checked) {
    fd.set('activa', '0');
  }

  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) {
      cerrarModal('modalEditar');
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgModalEditar', json.mensaje, 'error');
      btn.disabled = false;
      btn.textContent = 'Guardar cambios';
    }
  } catch {
    mostrarMsg('msgModalEditar', 'Error de conexión', 'error');
    btn.disabled = false;
    btn.textContent = 'Guardar cambios';
  }
}

/* ══════════════════════════════════════════════════════════
   TOGGLE HABILITAR / DESHABILITAR
══════════════════════════════════════════════════════════ */
async function toggleTarifa(id, nuevoEstado) {
  const fd = new FormData();
  fd.append('accion', 'toggle');
  fd.append('id',     id);
  fd.append('activa', nuevoEstado);

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

function confirmarEliminar(id, tipo) {
  _idEliminar = id;
  document.getElementById('tituloEliminar').textContent = `¿Eliminar tarifa "${tipo}"?`;
  document.getElementById('subEliminar').textContent    =
    'Si la tarifa tiene liquidaciones asociadas no podrá eliminarse.';
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
