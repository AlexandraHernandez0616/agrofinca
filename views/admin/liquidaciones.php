<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/liquidaciones.php
 * PROPÓSITO: Módulo Gestión de Liquidaciones (admin)
 * ============================================================
 * Funcionalidades:
 *   - 4 tarjetas resumen: total, pendientes, generadas, liquidadas
 *   - Tabla con filtros por búsqueda, estado y tipo de tarifa
 *   - Botón "+ Generar Liquidación" → modal con formulario completo
 *   - Cambio de estado por fila (PENDIENTE → GENERADA → LIQUIDADA)
 *   - Ver detalle de liquidación
 *   - Eliminar (solo PENDIENTE sin pagos)
 *
 * Conecta con:
 *   models/Liquidacion.php              (lectura directa)
 *   controllers/LiquidacionController.php (POST via fetch → JSON)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Liquidacion.php';

$db          = (new Database())->conectar();
$model       = new Liquidacion($db);
$resumen     = $model->resumen();
$lista       = $model->listar();
$trabajadores = $model->listarTrabajadores();
$tarifas      = $model->listarTarifas();

$titulo_pagina = 'Liquidaciones - AgroFinca';
$modulo_activo = 'liquidaciones';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Liquidaciones</h1>
    <p class="mod-subtitulo">Genera y administra las liquidaciones de trabajadores</p>
  </div>
  <button class="btn-primary" onclick="abrirModalGenerar()">+ Generar Liquidación</button>
</div>

<!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
<div class="liq-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Liquidaciones</span>
    <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Pendientes</span>
    <span class="lote-stat-valor"><?= $resumen['pendientes'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Generadas</span>
    <span class="lote-stat-valor"><?= $resumen['generadas'] ?></span>
  </div>
  <div class="lote-card-stat" style="background:#f0fdf4;border:1px solid #bbf7d0;">
    <span class="lote-stat-label">Liquidadas</span>
    <span class="lote-stat-valor" style="color:#166534;"><?= $resumen['liquidadas'] ?></span>
  </div>
</div>

<!-- ── FILTROS ───────────────────────────────────────────── -->
<div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="🔍  Buscar por trabajador o documento..."
         oninput="filtrarTabla()">
  <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
    <option value="">Todos los estados</option>
    <option value="PENDIENTE">Pendiente</option>
    <option value="GENERADA">Generada</option>
    <option value="LIQUIDADA">Liquidada</option>
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
  <table class="tabla" id="tablaLiquidaciones">
    <thead>
      <tr>
        <th>Trabajador</th>
        <th>Tipo Tarifa</th>
        <th>Período Inicio</th>
        <th>Período Fin</th>
        <th>Jornadas</th>
        <th>Valor</th>
        <th>Estado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($lista)): ?>
        <tr><td colspan="8" class="tabla-vacia">No hay liquidaciones registradas</td></tr>
      <?php else: ?>
        <?php foreach ($lista as $l): ?>
          <?php
            [$clsEstado, $lblEstado] = match($l['estado']) {
              'PENDIENTE' => ['badge-pendiente', 'Pendiente'],
              'GENERADA'  => ['badge-generada',  'Generada'],
              'LIQUIDADA' => ['badge-liquidada', 'Liquidada'],
              default     => ['badge-inactivo',  htmlspecialchars($l['estado'])],
            };
            $lblTipo = match($l['tipo_pago']) {
              'JORNAL'     => 'Jornada',
              'PRODUCCION' => 'Producción',
              'MIXTO'      => 'Mixta',
              default      => htmlspecialchars($l['tipo_pago']),
            };
          ?>
          <tr data-estado="<?= $l['estado'] ?>"
              data-tipo="<?= $l['tipo_pago'] ?>"
              data-busqueda="<?= strtolower($l['trabajador'] . ' ' . $l['documento']) ?>">
            <td><?= htmlspecialchars($l['trabajador']) ?></td>
            <td><?= $lblTipo ?></td>
            <td><?= htmlspecialchars($l['periodo_inicio']) ?></td>
            <td><?= htmlspecialchars($l['periodo_fin']) ?></td>
            <td><?= number_format((float)$l['jornadas_consideradas'], 0) ?></td>
            <td><strong>$<?= number_format((float)$l['valor_calculado'], 0, '.', ',') ?></strong></td>
            <td><span class="badge <?= $clsEstado ?>"><?= $lblEstado ?></span></td>
            <td class="acciones">
              <!-- Ver detalle -->
              <button class="btn-icono" title="Ver detalle"
                onclick="verDetalle(
                  '<?= addslashes($l['trabajador']) ?>',
                  '<?= addslashes($lblTipo) ?>',
                  '<?= $l['periodo_inicio'] ?>',
                  '<?= $l['periodo_fin'] ?>',
                  <?= (float)$l['jornadas_consideradas'] ?>,
                  <?= (float)$l['produccion_considerada'] ?>,
                  <?= (float)$l['valor_calculado'] ?>,
                  '<?= $l['fecha_generacion'] ?>',
                  '<?= $l['fecha_liquidacion'] ?? '' ?>',
                  '<?= $l['estado'] ?>',
                  '<?= addslashes($l['observacion'] ?? '') ?>'
                )">👁</button>

              <!-- Cambiar estado -->
              <?php if ($l['estado'] === 'PENDIENTE'): ?>
                <button class="btn-toggle btn-estado-generada"
                  onclick="cambiarEstado(<?= $l['id_liquidacion'] ?>, 'GENERADA')">
                  Generar
                </button>
              <?php elseif ($l['estado'] === 'GENERADA'): ?>
                <button class="btn-toggle btn-estado-liquidada"
                  onclick="cambiarEstado(<?= $l['id_liquidacion'] ?>, 'LIQUIDADA')">
                  Liquidar
                </button>
              <?php endif; ?>

              <!-- Eliminar (solo PENDIENTE) -->
              <?php if ($l['estado'] === 'PENDIENTE'): ?>
                <button class="btn-icono" title="Eliminar"
                  onclick="confirmarEliminar(<?= $l['id_liquidacion'] ?>, '<?= addslashes($l['trabajador']) ?>')">
                  🗑️
                </button>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: GENERAR LIQUIDACIÓN
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalGenerar">
  <div class="modal" style="max-width:600px;">
    <h2 class="modal-titulo">Generar Liquidación</h2>
    <div id="msgModalGenerar" class="msg-form" style="display:none;"></div>

    <form id="formGenerar" onsubmit="submitGenerar(event)">
      <input type="hidden" name="accion" value="generar">

      <div class="form-grid-2">

        <!-- Trabajador -->
        <div class="form-group" style="grid-column:1/-1;">
          <label for="gTrabajador">Trabajador *</label>
          <select id="gTrabajador" name="id_trabajador" required>
            <option value="">Selecciona un trabajador</option>
            <?php foreach ($trabajadores as $t): ?>
              <option value="<?= $t['id_trabajador'] ?>">
                <?= htmlspecialchars($t['nombre_completo']) ?> — <?= htmlspecialchars($t['documento']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Tarifa -->
        <div class="form-group" style="grid-column:1/-1;">
          <label for="gTarifa">Tarifa *</label>
          <select id="gTarifa" name="id_tarifa" required onchange="actualizarValorSugerido()">
            <option value="">Selecciona una tarifa</option>
            <?php foreach ($tarifas as $t): ?>
              <?php
                $lblT = match($t['tipo_pago']) {
                  'JORNAL'     => 'Jornada',
                  'PRODUCCION' => 'Producción',
                  'MIXTO'      => 'Mixta',
                  default      => $t['tipo_pago'],
                };
              ?>
              <option value="<?= $t['id_tarifa'] ?>"
                      data-valor="<?= $t['valor'] ?>"
                      data-tipo="<?= $t['tipo_pago'] ?>">
                <?= $lblT ?> — $<?= number_format((float)$t['valor'], 0, '.', ',') ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Período -->
        <div class="form-group">
          <label for="gInicio">Período Inicio *</label>
          <input type="date" id="gInicio" name="periodo_inicio" required
                 onchange="actualizarValorSugerido()">
        </div>
        <div class="form-group">
          <label for="gFin">Período Fin *</label>
          <input type="date" id="gFin" name="periodo_fin" required
                 onchange="actualizarValorSugerido()">
        </div>

        <!-- Jornadas y Producción -->
        <div class="form-group">
          <label for="gJornadas">Jornadas Trabajadas</label>
          <input type="number" id="gJornadas" name="jornadas" min="0" step="0.5"
                 placeholder="Ej: 15" value="0"
                 oninput="actualizarValorSugerido()">
        </div>
        <div class="form-group">
          <label for="gProduccion">Producción (kg)</label>
          <input type="number" id="gProduccion" name="produccion" min="0" step="0.01"
                 placeholder="Ej: 320" value="0"
                 oninput="actualizarValorSugerido()">
        </div>

        <!-- Valor calculado -->
        <div class="form-group" style="grid-column:1/-1;">
          <label for="gValor">Valor Calculado (COP) *</label>
          <div style="position:relative;">
            <span class="liq-cop-prefix">$</span>
            <input type="number" id="gValor" name="valor_calculado"
                   min="1" step="0.01" required
                   placeholder="Se calcula automáticamente o ingresa manualmente"
                   style="padding-left:28px;">
          </div>
          <span id="gValorHint" class="liq-hint"></span>
        </div>

        <!-- Observación -->
        <div class="form-group" style="grid-column:1/-1;">
          <label for="gObs">Observación</label>
          <textarea id="gObs" name="observacion" rows="2"
                    placeholder="Notas adicionales (opcional)"
                    style="width:100%;border:1px solid #d1d5db;border-radius:8px;
                           padding:8px 12px;font-size:14px;resize:vertical;
                           font-family:inherit;outline:none;"></textarea>
        </div>

      </div>

      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalGenerar')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnGenerar">Generar</button>
      </div>
    </form>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: VER DETALLE
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalDetalle">
  <div class="modal" style="max-width:560px;">
    <h2 class="modal-titulo">Detalle de Liquidación</h2>
    <div class="detalle-grid">
      <div class="detalle-item"><span class="detalle-label">Trabajador</span>    <span id="dTrabajador"></span></div>
      <div class="detalle-item"><span class="detalle-label">Tipo Tarifa</span>   <span id="dTipo"></span></div>
      <div class="detalle-item"><span class="detalle-label">Período Inicio</span><span id="dInicio"></span></div>
      <div class="detalle-item"><span class="detalle-label">Período Fin</span>   <span id="dFin"></span></div>
      <div class="detalle-item"><span class="detalle-label">Jornadas</span>      <span id="dJornadas"></span></div>
      <div class="detalle-item"><span class="detalle-label">Producción (kg)</span><span id="dProduccion"></span></div>
      <div class="detalle-item"><span class="detalle-label">Valor Calculado</span><span id="dValor"></span></div>
      <div class="detalle-item"><span class="detalle-label">Fecha Generación</span><span id="dFechaGen"></span></div>
      <div class="detalle-item"><span class="detalle-label">Fecha Liquidación</span><span id="dFechaLiq"></span></div>
      <div class="detalle-item"><span class="detalle-label">Estado</span>        <span id="dEstado"></span></div>
      <div class="detalle-item" style="grid-column:1/-1;">
        <span class="detalle-label">Observación</span>
        <span id="dObs" style="font-size:13px;color:#374151;"></span>
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
    <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar liquidación?</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;" id="subEliminar">
      Solo se pueden eliminar liquidaciones en estado Pendiente sin pagos asociados.
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
  .liq-resumen {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 24px;
  }

  /* Badges de estado */
  .badge-pendiente { background: #fef3c7; color: #92400e; }
  .badge-generada  { background: #dbeafe; color: #1e40af; }
  .badge-liquidada { background: #dcfce7; color: #166534; }

  /* Botones de cambio de estado en tabla */
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
  .btn-estado-generada  { background: #dbeafe; color: #1e40af; }
  .btn-estado-liquidada { background: #dcfce7; color: #166534; }

  /* Selects en formulario */
  .form-group select,
  .form-group textarea {
    width: 100%;
  }
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
  }
  .form-group select:focus { border-color: #2e9e4f; }

  /* Prefijo $ en campo valor */
  .liq-cop-prefix {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 14px;
    color: #6b7280;
    pointer-events: none;
  }

  /* Hint de cálculo automático */
  .liq-hint {
    font-size: 12px;
    color: #6b7280;
    margin-top: 4px;
    display: block;
  }

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
const CTRL = '../../controllers/LiquidacionController.php';

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

  document.querySelectorAll('#tablaLiquidaciones tbody tr[data-busqueda]').forEach(tr => {
    const matchQ = tr.dataset.busqueda.includes(q);
    const matchE = !estado || tr.dataset.estado === estado;
    const matchT = !tipo   || tr.dataset.tipo   === tipo;
    tr.style.display = (matchQ && matchE && matchT) ? '' : 'none';
  });
}

/* ══════════════════════════════════════════════════════════
   CÁLCULO AUTOMÁTICO DEL VALOR
   Lógica:
     JORNAL     → jornadas × valor_tarifa
     PRODUCCION → produccion × valor_tarifa
     MIXTO      → (jornadas × valor_tarifa) + (produccion × valor_tarifa)
══════════════════════════════════════════════════════════ */
function actualizarValorSugerido() {
  const sel      = document.getElementById('gTarifa');
  const opt      = sel.options[sel.selectedIndex];
  const tipo     = opt?.dataset?.tipo   ?? '';
  const tarVal   = parseFloat(opt?.dataset?.valor ?? 0);
  const jornadas = parseFloat(document.getElementById('gJornadas').value)   || 0;
  const prod     = parseFloat(document.getElementById('gProduccion').value) || 0;

  let sugerido = 0;
  let hint     = '';

  if (tarVal > 0) {
    if (tipo === 'JORNAL') {
      sugerido = jornadas * tarVal;
      hint     = `${jornadas} jornadas × $${tarVal.toLocaleString('es-CO')} = $${sugerido.toLocaleString('es-CO')}`;
    } else if (tipo === 'PRODUCCION') {
      sugerido = prod * tarVal;
      hint     = `${prod} kg × $${tarVal.toLocaleString('es-CO')} = $${sugerido.toLocaleString('es-CO')}`;
    } else if (tipo === 'MIXTO') {
      sugerido = (jornadas * tarVal) + (prod * tarVal);
      hint     = `(${jornadas} jornadas + ${prod} kg) × $${tarVal.toLocaleString('es-CO')} = $${sugerido.toLocaleString('es-CO')}`;
    }
  }

  if (sugerido > 0) {
    document.getElementById('gValor').value = sugerido.toFixed(2);
  }
  document.getElementById('gValorHint').textContent = hint;
}

/* ══════════════════════════════════════════════════════════
   MODAL GENERAR
══════════════════════════════════════════════════════════ */
function abrirModalGenerar() {
  document.getElementById('formGenerar').reset();
  document.getElementById('gValorHint').textContent = '';
  document.getElementById('msgModalGenerar').style.display = 'none';
  document.getElementById('modalGenerar').classList.add('modal-visible');
}

async function submitGenerar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnGenerar');
  btn.disabled    = true;
  btn.textContent = 'Generando…';

  const fd = new FormData(e.target);

  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) {
      cerrarModal('modalGenerar');
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgModalGenerar', json.mensaje, 'error');
      btn.disabled    = false;
      btn.textContent = 'Generar';
    }
  } catch {
    mostrarMsg('msgModalGenerar', 'Error de conexión', 'error');
    btn.disabled    = false;
    btn.textContent = 'Generar';
  }
}

/* ══════════════════════════════════════════════════════════
   VER DETALLE
══════════════════════════════════════════════════════════ */
function verDetalle(trabajador, tipo, inicio, fin, jornadas, produccion,
                    valor, fechaGen, fechaLiq, estado, obs) {
  const badges = {
    PENDIENTE: '<span class="badge badge-pendiente">Pendiente</span>',
    GENERADA:  '<span class="badge badge-generada">Generada</span>',
    LIQUIDADA: '<span class="badge badge-liquidada">Liquidada</span>',
  };
  document.getElementById('dTrabajador').textContent  = trabajador;
  document.getElementById('dTipo').textContent        = tipo;
  document.getElementById('dInicio').textContent      = inicio;
  document.getElementById('dFin').textContent         = fin;
  document.getElementById('dJornadas').textContent    = jornadas;
  document.getElementById('dProduccion').textContent  = produccion + ' kg';
  document.getElementById('dValor').textContent       = '$' + parseFloat(valor).toLocaleString('es-CO');
  document.getElementById('dFechaGen').textContent    = fechaGen;
  document.getElementById('dFechaLiq').textContent    = fechaLiq || '—';
  document.getElementById('dEstado').innerHTML        = badges[estado] ?? estado;
  document.getElementById('dObs').textContent         = obs || '—';
  document.getElementById('modalDetalle').classList.add('modal-visible');
}

/* ══════════════════════════════════════════════════════════
   CAMBIAR ESTADO
══════════════════════════════════════════════════════════ */
async function cambiarEstado(id, nuevoEstado) {
  const fd = new FormData();
  fd.append('accion', 'cambiar_estado');
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

function confirmarEliminar(id, trabajador) {
  _idEliminar = id;
  document.getElementById('tituloEliminar').textContent =
    `¿Eliminar liquidación de "${trabajador}"?`;
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
