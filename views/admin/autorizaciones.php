<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/autorizaciones.php
 * PROPÓSITO: Módulo Gestión de Liquidaciones Temporales (admin)
 * ============================================================
 * Funcionalidades:
 *   - 4 tarjetas resumen: total, activas, expiradas, revocadas
 *   - Buscador en tiempo real + filtro por estado
 *   - Tabla: Mayordomo | Fecha inicio | Fecha fin | Estado | Liquidaciones | Autorizado por | Acciones
 *   - Botón "+ Otorgar Permiso" → modal crear
 *   - Botón "Ver registros" → modal con liquidaciones asociadas
 *   - Botón "Revocar" (solo autorizaciones ACTIVAS)
 *
 * Conecta con:
 *   models/AutorizacionDelegada.php              (lectura directa)
 *   controllers/AutorizacionDelegadaController.php (POST/GET via fetch → JSON)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/AutorizacionDelegada.php';

$db         = (new Database())->conectar();
$model      = new AutorizacionDelegada($db);
$resumen    = $model->resumen();
$lista      = $model->listar();
$mayordomos = $model->listarMayordomos();

$titulo_pagina = 'Liquidaciones Temporales - AgroFinca';
$modulo_activo = 'autorizaciones';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Liquidaciones Temporales</h1>
    <p class="mod-subtitulo">Otorga y controla permisos temporales para que los Mayordomos puedan realizar liquidaciones autorizadas</p>
  </div>
</div>

<!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
<div class="aut-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Permisos</span>
    <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Activos</span>
    <span class="lote-stat-valor"><?= $resumen['activas'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Expirados</span>
    <span class="lote-stat-valor"><?= $resumen['expiradas'] ?></span>
  </div>
  <div class="lote-card-stat" style="background:#fef2f2;border:1px solid #fecaca;">
    <span class="lote-stat-label">Revocados</span>
    <span class="lote-stat-valor" style="color:#dc2626;"><?= $resumen['revocadas'] ?></span>
  </div>
</div>

<!-- ── PANEL PRINCIPAL ──────────────────────────────────── -->
<div class="aut-panel">

  <!-- Cabecera del panel -->
  <div class="aut-panel-header">
    <h2 class="aut-panel-titulo">Permisos Otorgados</h2>
    <button class="btn-primary" onclick="abrirModalOtorgar()">+ Otorgar Permiso</button>
  </div>

  <!-- Filtros -->
  <div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
    <input type="text" id="inputBusqueda" class="buscador"
           placeholder="🔍  Buscar por mayordomo..."
           oninput="filtrarTabla()">
    <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
      <option value="">Todos los estados</option>
      <option value="ACTIVA">Activo</option>
      <option value="EXPIRADA">Vencido</option>
      <option value="REVOCADA">Revocado</option>
    </select>
  </div>

  <!-- Mensaje feedback -->
  <div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>

  <!-- Tabla -->
  <div class="tabla-wrap">
    <table class="tabla" id="tablaAutorizaciones">
      <thead>
        <tr>
          <th>Mayordomo autorizado</th>
          <th>Fecha inicio</th>
          <th>Fecha fin</th>
          <th>Estado</th>
          <th>Liquidaciones</th>
          <th>Autorizado por</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($lista)): ?>
          <tr><td colspan="7" class="tabla-vacia">No hay permisos registrados</td></tr>
        <?php else: ?>
          <?php foreach ($lista as $a): ?>
            <?php
              [$clsEstado, $lblEstado, $iconoEstado] = match($a['estado']) {
                'ACTIVA'   => ['badge-aut-activa',   'Activo',   '✅'],
                'EXPIRADA' => ['badge-aut-expirada', 'Vencido',  '⏱'],
                'REVOCADA' => ['badge-aut-revocada', 'Revocado', '🚫'],
                default    => ['badge-inactivo',     htmlspecialchars($a['estado']), ''],
              };
            ?>
            <tr data-busqueda="<?= strtolower(htmlspecialchars($a['mayordomo'])) ?>"
                data-estado="<?= htmlspecialchars($a['estado']) ?>">
              <td><strong><?= htmlspecialchars($a['mayordomo']) ?></strong></td>
              <td><?= htmlspecialchars($a['fecha_inicio']) ?></td>
              <td><?= htmlspecialchars($a['fecha_fin']) ?></td>
              <td>
                <span class="badge <?= $clsEstado ?>">
                  <?= $iconoEstado ?> <?= $lblEstado ?>
                </span>
              </td>
              <td><?= (int) $a['total_liquidaciones'] ?></td>
              <td><?= htmlspecialchars($a['administrador']) ?></td>
              <td class="acciones">
                <!-- Ver registros -->
                <button class="btn-aut btn-ver-reg"
                  onclick="verLiquidaciones(<?= $a['id_autorizacion'] ?>, '<?= addslashes($a['mayordomo']) ?>')">
                  👁 Ver registros
                </button>
                <!-- Revocar (solo ACTIVA) -->
                <?php if ($a['estado'] === 'ACTIVA'): ?>
                  <button class="btn-aut btn-revocar"
                    onclick="confirmarRevocar(<?= $a['id_autorizacion'] ?>, '<?= addslashes($a['mayordomo']) ?>')">
                    🚫 Revocar
                  </button>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: OTORGAR PERMISO
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalOtorgar">
  <div class="modal" style="max-width:580px;">
    <h2 class="modal-titulo">Otorgar Permiso de Liquidación</h2>
    <div id="msgModalOtorgar" class="msg-form" style="display:none;"></div>

    <form id="formOtorgar" onsubmit="submitOtorgar(event)">
      <input type="hidden" name="accion" value="otorgar">

      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="oMayordomo">Mayordomo *</label>
          <select id="oMayordomo" name="id_mayordomo" required>
            <option value="">Selecciona un mayordomo</option>
            <?php foreach ($mayordomos as $m): ?>
              <option value="<?= $m['id_usuario'] ?>"><?= htmlspecialchars($m['nombre_completo']) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="oInicio">Fecha Inicio *</label>
          <input type="date" id="oInicio" name="fecha_inicio" required>
        </div>
        <div class="form-group">
          <label for="oFin">Fecha Fin *</label>
          <input type="date" id="oFin" name="fecha_fin" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="oAcciones">Acciones Permitidas *</label>
          <input type="text" id="oAcciones" name="acciones_permitidas"
                 placeholder="Ej: Generar liquidaciones, Aprobar pagos"
                 maxlength="255" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="oMonto">Monto Máximo (COP)</label>
          <input type="number" id="oMonto" name="monto_maximo"
                 min="0" step="0.01" placeholder="Opcional — sin límite si se deja vacío">
        </div>
      </div>

      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalOtorgar')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnOtorgar">Otorgar Permiso</button>
      </div>
    </form>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: VER LIQUIDACIONES
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalLiquidaciones">
  <div class="modal" style="max-width:640px;">
    <h2 class="modal-titulo" id="tituloLiquidaciones">Liquidaciones del Permiso</h2>
    <div id="liquidacionesContenido" style="min-height:60px;"></div>
    <div class="modal-acciones" style="margin-top:16px;">
      <button class="btn-primary" onclick="cerrarModal('modalLiquidaciones')">Cerrar</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: CONFIRMAR REVOCAR
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalRevocar">
  <div class="modal" style="max-width:420px;text-align:center;">
    <div style="font-size:40px;margin-bottom:12px;">🚫</div>
    <h2 class="modal-titulo" style="text-align:center;" id="tituloRevocar">¿Revocar permiso?</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;" id="subRevocar">
      El mayordomo perderá inmediatamente el permiso de liquidación.
    </p>
    <div class="modal-acciones">
      <button class="btn-cancelar" onclick="cerrarModal('modalRevocar')">Cancelar</button>
      <button class="btn-primary" style="background:#dc2626;" id="btnConfirmarRevocar">Revocar</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     ESTILOS PROPIOS DEL MÓDULO
══════════════════════════════════════════════════════════ -->
<style>
  /* Tarjetas resumen */
  .aut-resumen {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 24px;
  }

  /* Panel principal */
  .aut-panel {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
  }
  .aut-panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 12px;
  }
  .aut-panel-titulo {
    font-size: 16px;
    font-weight: 700;
    color: #111827;
    margin: 0;
  }

  /* Badges de estado */
  .badge-aut-activa   { background: #dcfce7; color: #166534; }
  .badge-aut-expirada { background: #f3f4f6; color: #6b7280; }
  .badge-aut-revocada { background: #fdecea; color: #b91c1c; }

  /* Botones de acción en tabla */
  .btn-aut {
    border: 1.5px solid;
    border-radius: 6px;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    background: #fff;
    transition: background 0.15s, opacity 0.15s;
    white-space: nowrap;
  }
  .btn-aut:hover { opacity: 0.82; }
  .btn-ver-reg  { border-color: #2e9e4f; color: #2e9e4f; }
  .btn-ver-reg:hover  { background: #f0fdf4; }
  .btn-revocar  { border-color: #dc2626; color: #dc2626; }
  .btn-revocar:hover  { background: #fef2f2; }

  /* Tabla de liquidaciones en modal */
  .liq-tabla { width:100%; border-collapse:collapse; font-size:13px; margin-top:8px; }
  .liq-tabla th { background:#f9fafb; padding:8px 12px; text-align:left; font-weight:600; color:#374151; border-bottom:1px solid #e5e7eb; }
  .liq-tabla td { padding:8px 12px; border-bottom:1px solid #f3f4f6; color:#374151; }
  .liq-tabla tr:last-child td { border-bottom:none; }

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
    min-width: 160px;
  }
  .select-filtro:focus { border-color: #2e9e4f; }

  .buscador-con-filtro { display: flex; gap: 12px; align-items: center; }

  @media (max-width: 768px) {
    .aut-resumen { grid-template-columns: 1fr 1fr; }
    .buscador-con-filtro { flex-wrap: wrap; }
  }
  @media (max-width: 480px) {
    .aut-resumen { grid-template-columns: 1fr; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
const CTRL = '../../controllers/AutorizacionDelegadaController.php';
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
function cerrarModal(id) { document.getElementById(id).classList.remove('modal-visible'); }

/* ── Filtro en tiempo real ──────────────────────────────── */
function filtrarTabla() {
  const q      = document.getElementById('inputBusqueda').value.toLowerCase();
  const estado = document.getElementById('filtroEstado').value;
  document.querySelectorAll('#tablaAutorizaciones tbody tr[data-busqueda]').forEach(tr => {
    const matchQ = tr.dataset.busqueda.includes(q);
    const matchE = !estado || tr.dataset.estado === estado;
    tr.style.display = (matchQ && matchE) ? '' : 'none';
  });
}

/* ══════════════════════════════════════════════════════════
   MODAL OTORGAR
══════════════════════════════════════════════════════════ */
function abrirModalOtorgar() {
  document.getElementById('formOtorgar').reset();
  document.getElementById('oInicio').value = hoy;
  document.getElementById('msgModalOtorgar').style.display = 'none';
  document.getElementById('modalOtorgar').classList.add('modal-visible');
}

async function submitOtorgar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnOtorgar');
  btn.disabled = true; btn.textContent = 'Otorgando…';

  const fd = new FormData(e.target);
  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) {
      cerrarModal('modalOtorgar');
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgModalOtorgar', json.mensaje, 'error');
      btn.disabled = false; btn.textContent = 'Otorgar Permiso';
    }
  } catch {
    mostrarMsg('msgModalOtorgar', 'Error de conexión', 'error');
    btn.disabled = false; btn.textContent = 'Otorgar Permiso';
  }
}

/* ══════════════════════════════════════════════════════════
   VER LIQUIDACIONES
══════════════════════════════════════════════════════════ */
async function verLiquidaciones(id, mayordomo) {
  document.getElementById('tituloLiquidaciones').textContent = `Liquidaciones — ${mayordomo}`;
  document.getElementById('liquidacionesContenido').innerHTML =
    '<p style="color:#9ca3af;padding:16px;">Cargando…</p>';
  document.getElementById('modalLiquidaciones').classList.add('modal-visible');

  try {
    const res  = await fetch(`${CTRL}?accion=liquidaciones&id=${id}`);
    const json = await res.json();

    if (json.ok && json.liquidaciones.length > 0) {
      const estadoBadge = (e) => {
        const map = { PENDIENTE:'badge-pendiente', GENERADA:'badge-generada', LIQUIDADA:'badge-liquidada' };
        const lbl = { PENDIENTE:'Pendiente', GENERADA:'Generada', LIQUIDADA:'Liquidada' };
        return `<span class="badge ${map[e]??''}">${lbl[e]??e}</span>`;
      };
      let html = `<table class="liq-tabla">
        <thead><tr><th>Trabajador</th><th>Período</th><th>Valor</th><th>Estado</th></tr></thead>
        <tbody>`;
      json.liquidaciones.forEach(l => {
        html += `<tr>
          <td>${l.trabajador}</td>
          <td>${l.periodo_inicio} → ${l.periodo_fin}</td>
          <td>$${parseFloat(l.valor_calculado).toLocaleString('es-CO')}</td>
          <td>${estadoBadge(l.estado)}</td>
        </tr>`;
      });
      html += '</tbody></table>';
      document.getElementById('liquidacionesContenido').innerHTML = html;
    } else {
      document.getElementById('liquidacionesContenido').innerHTML =
        '<p style="color:#9ca3af;padding:16px;text-align:center;">Sin liquidaciones asociadas a este permiso.</p>';
    }
  } catch {
    document.getElementById('liquidacionesContenido').innerHTML =
      '<p style="color:#dc2626;padding:16px;">Error al cargar las liquidaciones.</p>';
  }
}

/* ══════════════════════════════════════════════════════════
   REVOCAR
══════════════════════════════════════════════════════════ */
let _idRevocar = null;

function confirmarRevocar(id, mayordomo) {
  _idRevocar = id;
  document.getElementById('tituloRevocar').textContent = `¿Revocar permiso de "${mayordomo}"?`;
  document.getElementById('modalRevocar').classList.add('modal-visible');
}

document.getElementById('btnConfirmarRevocar').addEventListener('click', async () => {
  if (!_idRevocar) return;
  const btn = document.getElementById('btnConfirmarRevocar');
  btn.disabled = true;

  const fd = new FormData();
  fd.append('accion', 'revocar');
  fd.append('id',     _idRevocar);

  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    cerrarModal('modalRevocar');
    mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
    if (json.ok) recargar();
  } catch {
    mostrarMsg('msgGlobal', 'Error de conexión', 'error');
  } finally {
    btn.disabled = false;
    _idRevocar   = null;
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
