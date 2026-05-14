<?php
/**
 * ============================================================
 * ARCHIVO: views/mayordomo/trabajadores.php
 * PROPÓSITO: Módulo de Trabajadores del mayordomo.
 *            Muestra los trabajadores activos con su asistencia
 *            del día actual y permite marcar/actualizar asistencia.
 * ============================================================
 * Protección: solo rol MAYORDOMO puede acceder.
 *
 * Columnas de la tabla:
 *   Nombre | Documento | EPS | RH | Estado | Entrada | Salida | Asistencia
 *
 * Estado de asistencia (calculado en el modelo):
 *   Completa   → tiene hora_entrada Y hora_salida (badge verde)
 *   Incompleta → tiene hora_entrada pero NO hora_salida (badge amarillo)
 *   Sin marcar → sin registro hoy (badge gris)
 *
 * Acción disponible:
 *   Ícono ✏️ → abre modal para registrar/actualizar asistencia del día
 *              (hora entrada + hora salida opcional)
 *              POST a AsistenciaController (accion=marcar)
 *
 * Conecta con:
 *   models/TrabajadorMayordomo.php    → listarConAsistenciaHoy()
 *   controllers/AsistenciaController.php → marcar asistencia (fetch JSON)
 *
 * Estilos: styles/dashboard.css + styles/modulos.css
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/TrabajadorMayordomo.php';

$db          = (new Database())->conectar();
$model       = new TrabajadorMayordomo($db);
$trabajadores = $model->listarConAsistenciaHoy();

$titulo_pagina = 'Trabajadores - AgroFinca';
$modulo_activo = 'trabajadores';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- CABECERA DEL MÓDULO -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Trabajadores</h1>
    <p class="mod-subtitulo">
      Consulta trabajadores y su asistencia marcada —
      <strong><?= date('d/m/Y') ?></strong>
    </p>
  </div>
</div>

<!-- TABLA DE TRABAJADORES -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaTrabajadores">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Documento</th>
        <th>EPS</th>
        <th>RH</th>
        <th>Estado</th>
        <th>Entrada</th>
        <th>Salida</th>
        <th>Asistencia</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($trabajadores)): ?>
        <tr>
          <td colspan="9" class="tabla-vacia">No hay trabajadores activos registrados</td>
        </tr>
      <?php else: ?>
        <?php foreach ($trabajadores as $t): ?>
          <?php
            // Badge de estado del trabajador
            $estadoClass = match($t['estado_trabajador']) {
              'ACTIVO'   => 'badge-activo',
              'En labor' => 'badge-labor',
              default    => 'badge-inactivo',
            };

            // Badge de asistencia
            $asistClass = match($t['estado_asistencia']) {
              'Completa'   => 'badge-completa',
              'Incompleta' => 'badge-incompleta',
              default      => 'badge-inactivo',
            };
          ?>
          <tr>
            <td>
              <strong><?= htmlspecialchars($t['nombres']) ?></strong>
              <?= htmlspecialchars($t['apellidos']) ?>
            </td>
            <td><?= htmlspecialchars($t['documento']) ?></td>
            <td><?= htmlspecialchars($t['eps'] ?? '—') ?></td>
            <td><?= htmlspecialchars($t['rh']  ?? '—') ?></td>
            <td>
              <span class="badge <?= $estadoClass ?>">
                <?= htmlspecialchars($t['estado_trabajador']) ?>
              </span>
            </td>
            <!-- Hora de entrada (— si no hay registro) -->
            <td><?= $t['hora_entrada'] ? htmlspecialchars(substr($t['hora_entrada'], 0, 5)) : '—' ?></td>
            <!-- Hora de salida (— si no ha salido) -->
            <td><?= $t['hora_salida']  ? htmlspecialchars(substr($t['hora_salida'],  0, 5)) : '—' ?></td>
            <!-- Estado de asistencia calculado -->
            <td>
              <span class="badge <?= $asistClass ?>">
                <?= $t['estado_asistencia'] ?>
              </span>
            </td>
            <td>
              <!-- Botón para marcar/actualizar asistencia -->
              <button class="btn-icono" title="Marcar asistencia"
                onclick="abrirModalAsistencia(
                  <?= $t['id_usuario'] ?>,
                  '<?= htmlspecialchars($t['nombres'] . ' ' . $t['apellidos']) ?>',
                  '<?= $t['hora_entrada'] ? substr($t['hora_entrada'], 0, 5) : '' ?>',
                  '<?= $t['hora_salida']  ? substr($t['hora_salida'],  0, 5) : '' ?>'
                )">✏️</button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- ══ MODAL MARCAR ASISTENCIA ════════════════════════════════
     Permite registrar o actualizar la asistencia del día.
     Si ya tiene entrada, el campo se prellenará.
     POST a AsistenciaController (accion=marcar)
════════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalAsistencia">
  <div class="modal">
    <h2 class="modal-titulo">Marcar Asistencia</h2>
    <p class="modal-subtitulo" id="nombreTrabajador"></p>

    <input type="hidden" id="idTrabajador" />

    <div class="form-group">
      <label for="horaEntrada">Hora de Entrada *</label>
      <input type="time" id="horaEntrada" required />
    </div>

    <div class="form-group">
      <label for="horaSalida">
        Hora de Salida
        <span style="color:#9ca3af;font-weight:400">(dejar vacío si aún no ha salido)</span>
      </label>
      <input type="time" id="horaSalida" />
    </div>

    <div id="msgAsistencia" class="msg-form"></div>

    <div class="modal-acciones">
      <button class="btn-cancelar" onclick="cerrarModal('modalAsistencia')">Cancelar</button>
      <button class="btn-primary"  onclick="guardarAsistencia()">Guardar</button>
    </div>
  </div>
</div>

<script>
// ── Abrir modal de asistencia ─────────────────────────────
function abrirModalAsistencia(id, nombre, entrada, salida) {
  document.getElementById('idTrabajador').value       = id;
  document.getElementById('nombreTrabajador').textContent = nombre;
  document.getElementById('horaEntrada').value        = entrada || '';
  document.getElementById('horaSalida').value         = salida  || '';
  document.getElementById('msgAsistencia').textContent = '';
  document.getElementById('msgAsistencia').className  = 'msg-form';
  document.getElementById('modalAsistencia').classList.add('modal-visible');
}

function cerrarModal(id) {
  document.getElementById(id).classList.remove('modal-visible');
}

// Cerrar al hacer clic en el overlay
document.querySelectorAll('.modal-overlay').forEach(o => {
  o.addEventListener('click', e => { if (e.target === o) o.classList.remove('modal-visible'); });
});

// ── Guardar asistencia ────────────────────────────────────
// POST a AsistenciaController con accion=marcar
async function guardarAsistencia() {
  const msg          = document.getElementById('msgAsistencia');
  const id           = document.getElementById('idTrabajador').value;
  const horaEntrada  = document.getElementById('horaEntrada').value;
  const horaSalida   = document.getElementById('horaSalida').value;

  if (!horaEntrada) {
    msg.textContent = 'La hora de entrada es obligatoria';
    msg.className   = 'msg-form msg-error';
    return;
  }

  msg.textContent = 'Guardando...';
  msg.className   = 'msg-form';

  const fd = new FormData();
  fd.append('accion',        'marcar');
  fd.append('id_trabajador', id);
  fd.append('hora_entrada',  horaEntrada);
  fd.append('hora_salida',   horaSalida);

  const res  = await fetch('../../controllers/AsistenciaController.php', { method: 'POST', body: fd });
  const data = await res.json();

  if (data.ok) {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-ok';
    // Recargar la página para reflejar los cambios en la tabla
    setTimeout(() => location.reload(), 1000);
  } else {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-error';
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
