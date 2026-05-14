<?php
/**
 * ============================================================
 * ARCHIVO: views/mayordomo/solicitudes.php
 * PROPÓSITO: Módulo de Solicitudes de Registro del mayordomo.
 *            Permite aprobar o rechazar solicitudes de nuevos
 *            trabajadores que enviaron el formulario de registro.
 * ============================================================
 * Protección: solo rol MAYORDOMO puede acceder.
 *
 * Datos que muestra:
 *   Tabla con solicitudes en estado 'PENDIENTE':
 *   Nombre completo | Documento | Usuario | EPS | RH | Fecha | Acciones
 *
 * Acciones disponibles:
 *   ✓ Aprobar  → abre modal de confirmación → POST a SolicitudController
 *                Crea usuario + trabajador en BD y marca solicitud APROBADA
 *   ✗ Rechazar → abre modal con campo de observación → POST a SolicitudController
 *                Marca solicitud RECHAZADA con el motivo
 *
 * Conecta con:
 *   models/Solicitud.php          → listarPendientes()
 *   controllers/SolicitudController.php → aprobar / rechazar (fetch JSON)
 *
 * Estilos: styles/dashboard.css + styles/modulos.css
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Solicitud.php';

$db        = (new Database())->conectar();
$model     = new Solicitud($db);
$solicitudes = $model->listarPendientes();

$titulo_pagina = 'Solicitudes - AgroFinca';
$modulo_activo = 'solicitudes';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- CABECERA DEL MÓDULO -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Solicitudes de Registro</h1>
    <p class="mod-subtitulo">Aprueba o rechaza las solicitudes de trabajadores</p>
  </div>
  <!-- Contador de pendientes -->
  <?php if (count($solicitudes) > 0): ?>
    <span style="background:#fef9c3;color:#854d0e;padding:6px 14px;border-radius:20px;font-size:13px;font-weight:600;">
      <?= count($solicitudes) ?> pendiente<?= count($solicitudes) > 1 ? 's' : '' ?>
    </span>
  <?php endif; ?>
</div>

<!-- TABLA DE SOLICITUDES -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaSolicitudes">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Documento</th>
        <th>Usuario</th>
        <th>EPS</th>
        <th>RH</th>
        <th>Fecha Solicitud</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($solicitudes)): ?>
        <tr>
          <td colspan="7" class="tabla-vacia">
            ✅ No hay solicitudes pendientes
          </td>
        </tr>
      <?php else: ?>
        <?php foreach ($solicitudes as $s): ?>
          <tr id="fila-<?= $s['id_solicitud'] ?>">
            <td>
              <strong><?= htmlspecialchars($s['nombres']) ?></strong>
              <?= htmlspecialchars($s['apellidos']) ?>
            </td>
            <td><?= htmlspecialchars($s['documento']) ?></td>
            <td><?= htmlspecialchars($s['username']) ?></td>
            <td><?= htmlspecialchars($s['eps'] ?? '—') ?></td>
            <td><?= htmlspecialchars($s['rh']  ?? '—') ?></td>
            <td><?= htmlspecialchars(substr($s['fecha_solicitud'], 0, 10)) ?></td>
            <td>
              <div class="acciones-td">
                <!-- Botón Aprobar: abre modal de confirmación -->
                <button class="btn-aprobar"
                  onclick="abrirModalAprobar(
                    <?= $s['id_solicitud'] ?>,
                    '<?= htmlspecialchars($s['nombres'] . ' ' . $s['apellidos']) ?>'
                  )">
                  ✓ Aprobar
                </button>
                <!-- Botón Rechazar: abre modal con campo de observación -->
                <button class="btn-rechazar"
                  onclick="abrirModalRechazar(
                    <?= $s['id_solicitud'] ?>,
                    '<?= htmlspecialchars($s['nombres'] . ' ' . $s['apellidos']) ?>'
                  )">
                  ✕ Rechazar
                </button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- ══ MODAL APROBAR ══════════════════════════════════════════
     Confirmación antes de aprobar.
     Al confirmar → POST a SolicitudController (accion=aprobar)
════════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalAprobar">
  <div class="modal">
    <h2 class="modal-titulo">Aprobar Solicitud</h2>
    <p class="modal-subtitulo" id="textoAprobar"></p>
    <p style="font-size:14px;color:#374151;margin-bottom:20px;">
      Al aprobar, se creará la cuenta del trabajador y podrá iniciar sesión en el sistema.
    </p>
    <div id="msgAprobar" class="msg-form"></div>
    <div class="modal-acciones">
      <button class="btn-cancelar" onclick="cerrarModal('modalAprobar')">Cancelar</button>
      <button class="btn-aprobar" id="btnConfirmarAprobar" onclick="confirmarAprobar()">
        ✓ Confirmar Aprobación
      </button>
    </div>
  </div>
</div>

<!-- ══ MODAL RECHAZAR ═════════════════════════════════════════
     Permite ingresar un motivo de rechazo (opcional).
     Al confirmar → POST a SolicitudController (accion=rechazar)
════════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalRechazar">
  <div class="modal">
    <h2 class="modal-titulo">Rechazar Solicitud</h2>
    <p class="modal-subtitulo" id="textoRechazar"></p>
    <div class="form-group">
      <label for="observacion">Motivo del rechazo <span style="color:#9ca3af;font-weight:400">(opcional)</span></label>
      <textarea id="observacion" placeholder="Ej: Documento duplicado, información incompleta..."></textarea>
    </div>
    <div id="msgRechazar" class="msg-form"></div>
    <div class="modal-acciones">
      <button class="btn-cancelar" onclick="cerrarModal('modalRechazar')">Cancelar</button>
      <button class="btn-rechazar" onclick="confirmarRechazar()">
        ✕ Confirmar Rechazo
      </button>
    </div>
  </div>
</div>

<script>
// ID de la solicitud actualmente seleccionada
let idSolicitudActual = null;

// ── Abrir modales ─────────────────────────────────────────
function abrirModalAprobar(id, nombre) {
  idSolicitudActual = id;
  document.getElementById('textoAprobar').textContent = '¿Aprobar la solicitud de ' + nombre + '?';
  document.getElementById('msgAprobar').textContent   = '';
  document.getElementById('msgAprobar').className     = 'msg-form';
  document.getElementById('modalAprobar').classList.add('modal-visible');
}

function abrirModalRechazar(id, nombre) {
  idSolicitudActual = id;
  document.getElementById('textoRechazar').textContent = '¿Rechazar la solicitud de ' + nombre + '?';
  document.getElementById('observacion').value         = '';
  document.getElementById('msgRechazar').textContent   = '';
  document.getElementById('msgRechazar').className     = 'msg-form';
  document.getElementById('modalRechazar').classList.add('modal-visible');
}

function cerrarModal(id) {
  document.getElementById(id).classList.remove('modal-visible');
}

// Cerrar al hacer clic en el overlay
document.querySelectorAll('.modal-overlay').forEach(o => {
  o.addEventListener('click', e => { if (e.target === o) o.classList.remove('modal-visible'); });
});

// ── Confirmar Aprobar ─────────────────────────────────────
// Envía POST a SolicitudController con accion=aprobar
async function confirmarAprobar() {
  const msg = document.getElementById('msgAprobar');
  msg.textContent = 'Procesando...';
  msg.className   = 'msg-form';

  const fd = new FormData();
  fd.append('accion',       'aprobar');
  fd.append('id_solicitud', idSolicitudActual);

  const res  = await fetch('../../controllers/SolicitudController.php', { method: 'POST', body: fd });
  const data = await res.json();

  if (data.ok) {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-ok';
    // Eliminar la fila de la tabla sin recargar
    const fila = document.getElementById('fila-' + idSolicitudActual);
    if (fila) fila.remove();
    // Si no quedan filas, mostrar mensaje vacío
    verificarTablaVacia();
    setTimeout(() => cerrarModal('modalAprobar'), 1200);
  } else {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-error';
  }
}

// ── Confirmar Rechazar ────────────────────────────────────
// Envía POST a SolicitudController con accion=rechazar
async function confirmarRechazar() {
  const msg         = document.getElementById('msgRechazar');
  const observacion = document.getElementById('observacion').value;
  msg.textContent   = 'Procesando...';
  msg.className     = 'msg-form';

  const fd = new FormData();
  fd.append('accion',       'rechazar');
  fd.append('id_solicitud', idSolicitudActual);
  fd.append('observacion',  observacion);

  const res  = await fetch('../../controllers/SolicitudController.php', { method: 'POST', body: fd });
  const data = await res.json();

  if (data.ok) {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-ok';
    const fila = document.getElementById('fila-' + idSolicitudActual);
    if (fila) fila.remove();
    verificarTablaVacia();
    setTimeout(() => cerrarModal('modalRechazar'), 1200);
  } else {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-error';
  }
}

// ── Verificar si la tabla quedó vacía ────────────────────
function verificarTablaVacia() {
  const tbody = document.querySelector('#tablaSolicitudes tbody');
  if (tbody && tbody.querySelectorAll('tr[id]').length === 0) {
    tbody.innerHTML = '<tr><td colspan="7" class="tabla-vacia">✅ No hay solicitudes pendientes</td></tr>';
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
