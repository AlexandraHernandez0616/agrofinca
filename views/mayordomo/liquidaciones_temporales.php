<?php
/**
 * ARCHIVO: views/mayordomo/liquidaciones_temporales.php
 * PROPÓSITO: Módulo Liquidaciones Temporales (mayordomo)
 * Solo accesible si el administrador otorgó un permiso ACTIVO.
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/MayordomoLiquidacionTemporal.php';

$db           = (new Database())->conectar();
$model        = new MayordomoLiquidacionTemporal($db);
$id_mayordomo = (int) $_SESSION['id_usuario'];

// Verificar permiso activo
$permiso = $model->obtenerPermisoActivo($id_mayordomo);

$titulo_pagina = 'Liquidaciones Temporales - AgroFinca';
$modulo_activo = 'liquidaciones_temporales';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';

// Si no hay permiso, mostrar pantalla de acceso denegado
if (!$permiso):
?>
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Liquidaciones Temporales</h1>
    <p class="mod-subtitulo">Realiza liquidaciones durante el periodo autorizado por el Administrador</p>
  </div>
</div>
<div class="liq-temp-sin-permiso">
  <div class="liq-temp-sin-permiso-icon">🔒</div>
  <h2>Módulo no disponible</h2>
  <p>No tienes un permiso activo para realizar liquidaciones temporales.</p>
  <p style="font-size:13px;color:#9ca3af;margin-top:8px;">Solicita al Administrador que te otorgue un permiso de liquidación temporal.</p>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php return; endif; ?>

<?php
// Con permiso activo: cargar datos del formulario
$trabajadores = $model->listarTrabajadores($id_mayordomo);
$tarifas      = $model->listarTarifas();
$liquidaciones= $model->listarMias((int) $permiso['id_autorizacion']);
?>

<!-- CABECERA -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Liquidaciones Temporales</h1>
    <p class="mod-subtitulo">Realiza liquidaciones durante el periodo autorizado por el Administrador</p>
  </div>
</div>

<!-- BANNER PERMISO ACTIVO -->
<div class="liq-temp-permiso-banner">
  <div class="liq-temp-permiso-titulo">
    <span class="liq-temp-permiso-icon">✅</span>
    <strong>Permiso Activo</strong>
  </div>
  <div class="liq-temp-permiso-datos">
    <div class="liq-temp-permiso-dato">
      <span class="liq-temp-permiso-label">Autorizado por</span>
      <span class="liq-temp-permiso-valor"><?= htmlspecialchars($permiso['administrador']) ?></span>
    </div>
    <div class="liq-temp-permiso-dato">
      <span class="liq-temp-permiso-label">Fecha inicio</span>
      <span class="liq-temp-permiso-valor"><?= htmlspecialchars($permiso['fecha_inicio']) ?></span>
    </div>
    <div class="liq-temp-permiso-dato">
      <span class="liq-temp-permiso-label">Fecha fin</span>
      <span class="liq-temp-permiso-valor"><?= htmlspecialchars($permiso['fecha_fin']) ?></span>
    </div>
    <div class="liq-temp-permiso-dato">
      <span class="liq-temp-permiso-label">Mayordomo autorizado</span>
      <span class="liq-temp-permiso-valor"><?= htmlspecialchars($permiso['mayordomo']) ?></span>
    </div>
    <?php if ($permiso['monto_maximo']): ?>
    <div class="liq-temp-permiso-dato">
      <span class="liq-temp-permiso-label">Monto máximo</span>
      <span class="liq-temp-permiso-valor">$<?= number_format((float)$permiso['monto_maximo'], 0, '.', ',') ?></span>
    </div>
    <?php endif; ?>
  </div>
</div>

<!-- AVISO IMPORTANTE -->
<div class="liq-temp-aviso">
  <span class="liq-temp-aviso-icon">⚠</span>
  <p><strong>Importante:</strong> Todas las liquidaciones realizadas en este módulo quedarán registradas con tu nombre, fecha y hora. Estos registros no podrán ser editados.</p>
</div>

<!-- MENSAJE FEEDBACK -->
<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:16px;"></div>

<!-- FORMULARIO GENERAR LIQUIDACIÓN -->
<div class="liq-temp-panel">
  <h2 class="liq-temp-panel-titulo">Generar Nueva Liquidación</h2>

  <form id="formGenerar" onsubmit="submitGenerar(event)">
    <input type="hidden" name="accion" value="generar">

    <div class="liq-temp-form-grid">

      <!-- Trabajador -->
      <div class="form-group">
        <label for="gTrabajador">Trabajador</label>
        <select id="gTrabajador" name="id_trabajador" required onchange="actualizarJornadas()">
          <option value="">Seleccionar trabajador</option>
          <?php foreach ($trabajadores as $t): ?>
            <option value="<?= $t['id_trabajador'] ?>"><?= htmlspecialchars($t['nombre_completo']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Período -->
      <div class="form-group">
        <label for="gPeriodo">Periodo</label>
        <select id="gPeriodo" name="periodo_key" onchange="aplicarPeriodo()">
          <option value="">Seleccionar periodo</option>
          <?php
            // Generar semanas dentro del rango del permiso
            $inicio_p = new DateTime($permiso['fecha_inicio']);
            $fin_p    = new DateTime($permiso['fecha_fin']);
            $semana   = 1;
            $cur      = clone $inicio_p;
            while ($cur <= $fin_p):
              $fin_sem = clone $cur;
              $fin_sem->modify('+6 days');
              if ($fin_sem > $fin_p) $fin_sem = clone $fin_p;
              $label = $cur->format('Y') . ' - Semana ' . $semana;
              $val   = $cur->format('Y-m-d') . '|' . $fin_sem->format('Y-m-d');
          ?>
            <option value="<?= $val ?>"><?= $label ?> (<?= $cur->format('d/m') ?> - <?= $fin_sem->format('d/m') ?>)</option>
          <?php
              $cur->modify('+7 days');
              $semana++;
            endwhile;
          ?>
        </select>
        <input type="hidden" id="gInicio" name="periodo_inicio">
        <input type="hidden" id="gFin"    name="periodo_fin">
      </div>

      <!-- Tarifa -->
      <div class="form-group">
        <label for="gTarifa">Tarifa aplicada ($/día)</label>
        <div class="liq-temp-input-prefix">
          <span>$</span>
          <select id="gTarifa" name="id_tarifa" required onchange="calcularValor()">
            <option value="">Seleccionar tarifa</option>
            <?php foreach ($tarifas as $t):
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
      </div>

      <!-- Días trabajados -->
      <div class="form-group">
        <label for="gJornadas">Cantidad base / Días trabajados</label>
        <div class="liq-temp-input-prefix">
          <span>📅</span>
          <input type="number" id="gJornadas" name="jornadas"
                 min="0" step="0.5" value="0"
                 oninput="calcularValor()" placeholder="0">
        </div>
        <span id="jornadasHint" style="font-size:11px;color:#9ca3af;margin-top:3px;display:block;"></span>
      </div>

    </div>

    <!-- Valor calculado -->
    <div class="liq-temp-valor-row">
      <span class="liq-temp-valor-label">Valor calculado:</span>
      <span class="liq-temp-valor-monto" id="valorCalculado">$0</span>
      <input type="hidden" id="gValor" name="valor_calculado" value="0">
    </div>

    <!-- Observación -->
    <div class="form-group" style="margin-top:16px;">
      <label for="gObs">Observación</label>
      <textarea id="gObs" name="observacion" rows="3"
                placeholder="Agregar observaciones sobre esta liquidación..."
                class="liq-temp-textarea"></textarea>
    </div>

    <!-- Botón generar -->
    <button type="submit" class="btn-primary liq-temp-btn-generar" id="btnGenerar">
      Generar Liquidación Temporal
    </button>
  </form>
</div>

<!-- TABLA MIS LIQUIDACIONES -->
<div class="liq-temp-panel" style="margin-top:24px;">
  <h2 class="liq-temp-panel-titulo">Mis Liquidaciones Realizadas</h2>

  <?php if (empty($liquidaciones)): ?>
    <p class="tabla-vacia" style="padding:32px;text-align:center;">No has generado liquidaciones en este período.</p>
  <?php else: ?>
    <div class="tabla-wrap">
      <table class="tabla" id="tablaLiqTemp">
        <thead>
          <tr>
            <th>Código</th>
            <th>Trabajador</th>
            <th>Periodo</th>
            <th>Valor liquidado</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($liquidaciones as $l): ?>
            <tr>
              <td style="font-family:monospace;font-size:13px;"><?= htmlspecialchars($l['codigo']) ?></td>
              <td><?= htmlspecialchars($l['trabajador']) ?></td>
              <td style="font-size:13px;"><?= htmlspecialchars($l['periodo']) ?></td>
              <td><strong>$<?= number_format((float)$l['valor_calculado'], 0, '.', ',') ?></strong></td>
              <td><?= htmlspecialchars($l['fecha']) ?></td>
              <td style="font-family:monospace;"><?= htmlspecialchars($l['hora']) ?></td>
              <td><span class="badge badge-liq-completada">Completada</span></td>
              <td>
                <button class="btn-aut btn-ver-reg"
                  onclick="verDetalle(<?= $l['id_liquidacion'] ?>)">
                  �� Ver detalle
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>

<!-- MODAL VER DETALLE -->
<div class="modal-overlay" id="modalDetalle">
  <div class="modal" style="max-width:520px;">
    <h2 class="modal-titulo" id="tituloDetalle">Detalle de Liquidación</h2>
    <div id="detalleContenido" style="min-height:60px;"></div>
    <div class="modal-acciones" style="margin-top:16px;">
      <button class="btn-primary" onclick="cerrarModal('modalDetalle')">Cerrar</button>
    </div>
  </div>
</div>

<style>
  /* Sin permiso */
  .liq-temp-sin-permiso { text-align:center; padding:60px 20px; background:#fff; border:1px solid #e5e7eb; border-radius:12px; }
  .liq-temp-sin-permiso-icon { font-size:48px; margin-bottom:16px; }
  .liq-temp-sin-permiso h2 { font-size:20px; font-weight:700; color:#111827; margin-bottom:8px; }
  .liq-temp-sin-permiso p { font-size:14px; color:#6b7280; }

  /* Banner permiso activo */
  .liq-temp-permiso-banner { background:#f0fdf4; border:1px solid #bbf7d0; border-radius:12px; padding:18px 24px; margin-bottom:16px; }
  .liq-temp-permiso-titulo { display:flex; align-items:center; gap:8px; font-size:16px; font-weight:700; color:#166534; margin-bottom:14px; }
  .liq-temp-permiso-icon { font-size:20px; }
  .liq-temp-permiso-datos { display:grid; grid-template-columns:repeat(auto-fit, minmax(160px, 1fr)); gap:12px; }
  .liq-temp-permiso-dato { display:flex; flex-direction:column; gap:2px; }
  .liq-temp-permiso-label { font-size:11px; color:#6b7280; font-weight:500; text-transform:uppercase; letter-spacing:0.04em; }
  .liq-temp-permiso-valor { font-size:14px; font-weight:600; color:#111827; }

  /* Aviso importante */
  .liq-temp-aviso { background:#fffbeb; border:1px solid #fde68a; border-radius:10px; padding:12px 16px; margin-bottom:20px; display:flex; align-items:flex-start; gap:10px; font-size:13px; color:#78350f; }
  .liq-temp-aviso-icon { font-size:16px; flex-shrink:0; margin-top:1px; }

  /* Panel formulario */
  .liq-temp-panel { background:#fff; border:1px solid #e5e7eb; border-radius:12px; padding:24px; box-shadow:0 1px 4px rgba(0,0,0,0.06); }
  .liq-temp-panel-titulo { font-size:16px; font-weight:700; color:#111827; margin:0 0 20px; padding-bottom:14px; border-bottom:1px solid #f3f4f6; }

  /* Grid del formulario */
  .liq-temp-form-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px; }

  /* Inputs con prefijo */
  .liq-temp-input-prefix { display:flex; align-items:center; gap:8px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; background:#fff; transition:border-color 0.2s; }
  .liq-temp-input-prefix:focus-within { border-color:#2e9e4f; }
  .liq-temp-input-prefix span { font-size:14px; color:#9ca3af; flex-shrink:0; }
  .liq-temp-input-prefix select,
  .liq-temp-input-prefix input { flex:1; height:40px; border:none; outline:none; font-size:14px; color:#111827; background:transparent; font-family:inherit; }

  /* Selects normales en formulario */
  .form-group select { height:40px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
  .form-group select:focus { border-color:#2e9e4f; }

  /* Valor calculado */
  .liq-temp-valor-row { display:flex; align-items:center; gap:16px; background:#f9fafb; border:1px solid #e5e7eb; border-radius:10px; padding:14px 20px; margin-top:4px; }
  .liq-temp-valor-label { font-size:15px; font-weight:600; color:#374151; flex:1; }
  .liq-temp-valor-monto { font-size:24px; font-weight:700; color:#2e9e4f; }

  /* Textarea */
  .liq-temp-textarea { width:100%; border:1px solid #d1d5db; border-radius:8px; padding:10px 14px; font-size:14px; font-family:inherit; resize:vertical; outline:none; transition:border-color 0.2s; color:#111827; background:#fff; }
  .liq-temp-textarea:focus { border-color:#2e9e4f; }

  /* Botón generar */
  .liq-temp-btn-generar { width:100%; margin-top:20px; padding:14px; font-size:15px; font-weight:700; border-radius:10px; }

  /* Badge completada */
  .badge-liq-completada { background:#dcfce7; color:#166534; }

  /* Botón ver registros (reutilizado del admin) */
  .btn-aut { border:1.5px solid; border-radius:6px; padding:5px 12px; font-size:12px; font-weight:600; cursor:pointer; background:#fff; transition:background 0.15s; white-space:nowrap; }
  .btn-ver-reg { border-color:#2e9e4f; color:#2e9e4f; }
  .btn-ver-reg:hover { background:#f0fdf4; }

  /* Detalle en modal */
  .det-grid { display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-bottom:16px; }
  .det-item { display:flex; flex-direction:column; gap:3px; }
  .det-label { font-size:11px; font-weight:600; color:#9ca3af; text-transform:uppercase; letter-spacing:0.04em; }
  .det-valor { font-size:14px; color:#111827; font-weight:500; }

  @media (max-width:768px) {
    .liq-temp-form-grid { grid-template-columns:1fr; }
    .liq-temp-permiso-datos { grid-template-columns:1fr 1fr; }
  }
</style>

<script>
const CTRL = '../../controllers/MayordomoLiquidacionTemporalController.php';

function mostrarMsg(id, texto, tipo) {
  const el = document.getElementById(id);
  if (!el) return;
  el.textContent = texto;
  el.className = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
  el.style.display = 'block';
  setTimeout(() => { el.style.display = 'none'; }, 5000);
}
function recargar() { setTimeout(() => location.reload(), 900); }
function cerrarModal(id) { document.getElementById(id).classList.remove('modal-visible'); }

// Aplicar período seleccionado a los campos ocultos
function aplicarPeriodo() {
  const sel = document.getElementById('gPeriodo');
  const val = sel.value;
  if (!val) {
    document.getElementById('gInicio').value = '';
    document.getElementById('gFin').value    = '';
    return;
  }
  const [inicio, fin] = val.split('|');
  document.getElementById('gInicio').value = inicio;
  document.getElementById('gFin').value    = fin;
  actualizarJornadas();
}

// Consultar jornadas de asistencia del trabajador en el período
async function actualizarJornadas() {
  const idT   = document.getElementById('gTrabajador').value;
  const inicio= document.getElementById('gInicio').value;
  const fin   = document.getElementById('gFin').value;
  if (!idT || !inicio || !fin) return;

  try {
    const res  = await fetch(`${CTRL}?accion=jornadas&id_trabajador=${idT}&inicio=${inicio}&fin=${fin}`);
    const json = await res.json();
    if (json.ok) {
      document.getElementById('gJornadas').value = json.jornadas;
      document.getElementById('jornadasHint').textContent =
        `${json.jornadas} jornada(s) de asistencia registradas en este período`;
      calcularValor();
    }
  } catch {}
}

// Calcular valor según tarifa × jornadas
function calcularValor() {
  const sel      = document.getElementById('gTarifa');
  const opt      = sel.options[sel.selectedIndex];
  const tarVal   = parseFloat(opt?.dataset?.valor ?? 0);
  const tipo     = opt?.dataset?.tipo ?? '';
  const jornadas = parseFloat(document.getElementById('gJornadas').value) || 0;

  let valor = 0;
  if (tarVal > 0) {
    valor = jornadas * tarVal;
  }

  document.getElementById('valorCalculado').textContent =
    '$' + valor.toLocaleString('es-CO', { minimumFractionDigits: 0 });
  document.getElementById('gValor').value = valor.toFixed(2);
}

// Enviar formulario
async function submitGenerar(e) {
  e.preventDefault();
  const btn = document.getElementById('btnGenerar');
  btn.disabled = true; btn.textContent = 'Generando…';

  const fd = new FormData(e.target);
  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) {
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgGlobal', json.mensaje, 'error');
      btn.disabled = false; btn.textContent = 'Generar Liquidación Temporal';
    }
  } catch {
    mostrarMsg('msgGlobal', 'Error de conexión', 'error');
    btn.disabled = false; btn.textContent = 'Generar Liquidación Temporal';
  }
}

// Ver detalle de una liquidación
async function verDetalle(id) {
  document.getElementById('detalleContenido').innerHTML =
    '<p style="color:#9ca3af;padding:16px;">Cargando…</p>';
  document.getElementById('modalDetalle').classList.add('modal-visible');

  try {
    const res  = await fetch(`${CTRL}?accion=detalle&id=${id}`);
    const json = await res.json();
    if (json.ok && json.detalle) {
      const d = json.detalle;
      document.getElementById('tituloDetalle').textContent = d.codigo;
      document.getElementById('detalleContenido').innerHTML = `
        <div class="det-grid">
          <div class="det-item"><span class="det-label">Trabajador</span><span class="det-valor">${d.trabajador}</span></div>
          <div class="det-item"><span class="det-label">Documento</span><span class="det-valor">${d.documento}</span></div>
          <div class="det-item"><span class="det-label">Período inicio</span><span class="det-valor">${d.periodo_inicio}</span></div>
          <div class="det-item"><span class="det-label">Período fin</span><span class="det-valor">${d.periodo_fin}</span></div>
          <div class="det-item"><span class="det-label">Tipo tarifa</span><span class="det-valor">${d.tipo_pago}</span></div>
          <div class="det-item"><span class="det-label">Valor tarifa</span><span class="det-valor">$${parseFloat(d.tarifa_valor).toLocaleString('es-CO')}</span></div>
          <div class="det-item"><span class="det-label">Jornadas</span><span class="det-valor">${d.jornadas_consideradas}</span></div>
          <div class="det-item"><span class="det-label">Valor calculado</span><span class="det-valor" style="color:#2e9e4f;font-size:16px;">$${parseFloat(d.valor_calculado).toLocaleString('es-CO')}</span></div>
          <div class="det-item" style="grid-column:1/-1;"><span class="det-label">Observación</span><span class="det-valor">${d.observacion || '—'}</span></div>
        </div>`;
    } else {
      document.getElementById('detalleContenido').innerHTML =
        '<p style="color:#9ca3af;padding:16px;">No se pudo cargar el detalle.</p>';
    }
  } catch {
    document.getElementById('detalleContenido').innerHTML =
      '<p style="color:#dc2626;padding:16px;">Error al cargar el detalle.</p>';
  }
}

document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('modal-visible');
  });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
