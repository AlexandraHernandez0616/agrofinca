<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/pagos.php
 * PROPÓSITO: Módulo Gestión de Pagos (admin)
 * ============================================================
 * Funcionalidades:
 *   - 4 tarjetas resumen: total pagos, monto total, transferencias, efectivo
 *   - Tabla con filtros por búsqueda y método de pago
 *   - Botón "+ Registrar Pago" → modal con formulario completo
 *   - Ver detalle de pago
 *   - Eliminar pago con confirmación
 *
 * Conecta con:
 *   models/Pago.php                (lectura directa)
 *   controllers/PagoController.php (POST via fetch → JSON)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Pago.php';

$db            = (new Database())->conectar();
$model         = new Pago($db);
$resumen       = $model->resumen();
$lista         = $model->listar();
$liquidaciones = $model->listarLiquidacionesPagables();

$titulo_pagina = 'Pagos - AgroFinca';
$modulo_activo = 'pagos';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Pagos</h1>
    <p class="mod-subtitulo">Registra y administra los pagos a trabajadores</p>
  </div>
  <button class="btn-primary" onclick="abrirModalRegistrar()">+ Registrar Pago</button>
</div>

<!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
<div class="liq-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Pagos</span>
    <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Monto Total COP</span>
    <span class="lote-stat-valor" style="font-size:20px;">
      $<?= number_format($resumen['monto_total'], 0, '.', ',') ?>
    </span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Por Transferencia</span>
    <span class="lote-stat-valor"><?= $resumen['transferencia'] ?></span>
  </div>
  <div class="lote-card-stat" style="background:#f0fdf4;border:1px solid #bbf7d0;">
    <span class="lote-stat-label">Por Efectivo</span>
    <span class="lote-stat-valor" style="color:#166534;"><?= $resumen['efectivo'] ?></span>
  </div>
</div>

<!-- ── FILTROS ───────────────────────────────────────────── -->
<div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="🔍  Buscar por trabajador o documento..."
         oninput="filtrarTabla()">
  <select class="select-filtro" id="filtroMetodo" onchange="filtrarTabla()">
    <option value="">Todos los métodos</option>
    <option value="Efectivo">Efectivo</option>
    <option value="Transferencia">Transferencia</option>
    <option value="Cheque">Cheque</option>
  </select>
</div>

<!-- ── MENSAJE FEEDBACK ─────────────────────────────────── -->
<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>

<!-- ── TABLA ─────────────────────────────────────────────── -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaPagos">
    <thead>
      <tr>
        <th>ID</th>
        <th>Trabajador</th>
        <th>Liquidación</th>
        <th>Fecha Pago</th>
        <th>Monto</th>
        <th>Método</th>
        <th>Referencia</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($lista)): ?>
        <tr><td colspan="8" class="tabla-vacia">No hay pagos registrados</td></tr>
      <?php else: ?>
        <?php foreach ($lista as $p): ?>
          <?php
            $clsMetodo = match($p['metodo_pago']) {
              'Efectivo'      => 'badge-efectivo',
              'Transferencia' => 'badge-transferencia',
              'Cheque'        => 'badge-cheque',
              default         => 'badge-inactivo',
            };
          ?>
          <tr data-busqueda="<?= strtolower(htmlspecialchars($p['trabajador'] . ' ' . $p['documento'])) ?>"
              data-metodo="<?= htmlspecialchars($p['metodo_pago']) ?>">
            <td><?= $p['id_pago'] ?></td>
            <td><?= htmlspecialchars($p['trabajador']) ?></td>
            <td><?= htmlspecialchars($p['liq_codigo']) ?></td>
            <td><?= htmlspecialchars($p['fecha_pago']) ?></td>
            <td><strong>$<?= number_format((float)$p['monto'], 0, '.', ',') ?></strong></td>
            <td><span class="badge <?= $clsMetodo ?>"><?= htmlspecialchars($p['metodo_pago']) ?></span></td>
            <td><?= htmlspecialchars($p['referencia_pago'] ?? '—') ?></td>
            <td class="acciones">
              <button class="btn-icono" title="Ver detalle"
                onclick="verDetalle(
                  <?= $p['id_pago'] ?>,
                  '<?= addslashes($p['trabajador']) ?>',
                  '<?= addslashes($p['liq_codigo']) ?>',
                  '<?= $p['fecha_pago'] ?>',
                  <?= (float)$p['monto'] ?>,
                  '<?= addslashes($p['metodo_pago']) ?>',
                  '<?= addslashes($p['referencia_pago'] ?? '') ?>',
                  '<?= addslashes($p['registrado_por']) ?>',
                  '<?= addslashes($p['observacion'] ?? '') ?>'
                )">👁</button>
              <button class="btn-icono" title="Eliminar"
                onclick="confirmarEliminar(<?= $p['id_pago'] ?>, '<?= addslashes($p['trabajador']) ?>')">
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
     MODAL: REGISTRAR PAGO
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalRegistrar">
  <div class="modal" style="max-width:580px;">
    <h2 class="modal-titulo">Registrar Pago</h2>
    <div id="msgModalRegistrar" class="msg-form" style="display:none;"></div>

    <form id="formRegistrar" onsubmit="submitRegistrar(event)">
      <input type="hidden" name="accion" value="registrar">

      <div class="form-grid-2">

        <!-- Liquidación -->
        <div class="form-group" style="grid-column:1/-1;">
          <label for="rLiquidacion">Liquidación *</label>
          <select id="rLiquidacion" name="id_liquidacion" required onchange="autocompletarMonto()">
            <option value="">Selecciona una liquidación</option>
            <?php foreach ($liquidaciones as $liq): ?>
              <option value="<?= $liq['id_liquidacion'] ?>"
                      data-valor="<?= $liq['valor_calculado'] ?>">
                <?= htmlspecialchars($liq['codigo']) ?> — <?= htmlspecialchars($liq['trabajador']) ?>
                ($<?= number_format((float)$liq['valor_calculado'], 0, '.', ',') ?>)
              </option>
            <?php endforeach; ?>
          </select>
          <?php if (empty($liquidaciones)): ?>
            <span style="font-size:12px;color:#f59e0b;margin-top:4px;display:block;">
              ⚠ No hay liquidaciones en estado "Generada" disponibles para pagar.
            </span>
          <?php endif; ?>
        </div>

        <!-- Fecha de pago -->
        <div class="form-group">
          <label for="rFecha">Fecha de Pago *</label>
          <input type="date" id="rFecha" name="fecha_pago" required>
        </div>

        <!-- Monto -->
        <div class="form-group">
          <label for="rMonto">Monto (COP) *</label>
          <input type="number" id="rMonto" name="monto"
                 min="0.01" step="0.01" placeholder="Ej: 500000" required>
        </div>

        <!-- Método de pago -->
        <div class="form-group">
          <label for="rMetodo">Método de Pago *</label>
          <select id="rMetodo" name="metodo_pago" required>
            <option value="">Selecciona un método</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Transferencia">Transferencia</option>
            <option value="Cheque">Cheque</option>
          </select>
        </div>

        <!-- Referencia -->
        <div class="form-group">
          <label for="rReferencia">Referencia de Pago</label>
          <input type="text" id="rReferencia" name="referencia_pago"
                 placeholder="Nro. transferencia, cheque, etc." maxlength="100">
        </div>

        <!-- Observación -->
        <div class="form-group" style="grid-column:1/-1;">
          <label for="rObservacion">Observación</label>
          <textarea id="rObservacion" name="observacion" rows="2"
                    placeholder="Notas adicionales (opcional)"
                    style="width:100%;border:1px solid #d1d5db;border-radius:8px;
                           padding:8px 12px;font-size:14px;resize:vertical;
                           font-family:inherit;outline:none;transition:border-color 0.2s;"></textarea>
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
     MODAL: VER DETALLE
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalDetalle">
  <div class="modal" style="max-width:540px;">
    <h2 class="modal-titulo">Detalle del Pago</h2>
    <div class="detalle-grid">
      <div class="detalle-item">
        <span class="detalle-label">Trabajador</span>
        <span id="dTrabajador"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Liquidación</span>
        <span id="dLiquidacion"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Fecha Pago</span>
        <span id="dFecha"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Monto</span>
        <span id="dMonto"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Método</span>
        <span id="dMetodo"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Referencia</span>
        <span id="dReferencia"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Registrado por</span>
        <span id="dRegistradoPor"></span>
      </div>
      <div class="detalle-item" style="grid-column:1/-1;">
        <span class="detalle-label">Observación</span>
        <span id="dObservacion" style="font-size:13px;color:#374151;"></span>
      </div>
    </div>
    <div class="modal-acciones">
      <button class="btn-primary" onclick="cerrarModal('modalDetalle')">Cerrar</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: CONFIRMAR ELIMINAR
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalEliminar">
  <div class="modal" style="max-width:420px;text-align:center;">
    <div style="font-size:40px;margin-bottom:12px;">🗑️</div>
    <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar pago?</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;">
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
  .liq-resumen {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 24px;
  }

  /* Badges de método de pago */
  .badge-efectivo      { background: #dcfce7; color: #166534; }
  .badge-transferencia { background: #dbeafe; color: #1e40af; }
  .badge-cheque        { background: #fef3c7; color: #92400e; }

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

  @media (max-width: 768px) {
    .liq-resumen { grid-template-columns: 1fr 1fr; }
    .buscador-con-filtro { flex-wrap: wrap; }
  }
  @media (max-width: 480px) {
    .liq-resumen { grid-template-columns: 1fr; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
const CTRL = '../../controllers/PagoController.php';
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
  const metodo = document.getElementById('filtroMetodo').value;

  document.querySelectorAll('#tablaPagos tbody tr[data-busqueda]').forEach(tr => {
    const matchQ = tr.dataset.busqueda.includes(q);
    const matchM = !metodo || tr.dataset.metodo === metodo;
    tr.style.display = (matchQ && matchM) ? '' : 'none';
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

/**
 * Al seleccionar una liquidación autocompleta el monto
 * con el valor_calculado de esa liquidación.
 */
function autocompletarMonto() {
  const sel = document.getElementById('rLiquidacion');
  const opt = sel.options[sel.selectedIndex];
  const val = opt?.dataset?.valor ?? '';
  document.getElementById('rMonto').value = val ? parseFloat(val).toFixed(2) : '';
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
   VER DETALLE
══════════════════════════════════════════════════════════ */
function verDetalle(id, trabajador, liqCodigo, fecha, monto,
                    metodo, referencia, registradoPor, obs) {
  const badgeMap = {
    'Efectivo':      '<span class="badge badge-efectivo">Efectivo</span>',
    'Transferencia': '<span class="badge badge-transferencia">Transferencia</span>',
    'Cheque':        '<span class="badge badge-cheque">Cheque</span>',
  };

  document.getElementById('dTrabajador').textContent    = trabajador;
  document.getElementById('dLiquidacion').textContent   = liqCodigo;
  document.getElementById('dFecha').textContent         = fecha;
  document.getElementById('dMonto').textContent         = '$' + parseFloat(monto).toLocaleString('es-CO');
  document.getElementById('dMetodo').innerHTML          = badgeMap[metodo] ?? metodo;
  document.getElementById('dReferencia').textContent    = referencia || '—';
  document.getElementById('dRegistradoPor').textContent = registradoPor;
  document.getElementById('dObservacion').textContent   = obs || '—';

  document.getElementById('modalDetalle').classList.add('modal-visible');
}

/* ══════════════════════════════════════════════════════════
   ELIMINAR
══════════════════════════════════════════════════════════ */
let _idEliminar = null;

function confirmarEliminar(id, trabajador) {
  _idEliminar = id;
  document.getElementById('tituloEliminar').textContent =
    `¿Eliminar pago de "${trabajador}"?`;
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
