<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/mayordomos.php
 * PROPÓSITO: Módulo de gestión de mayordomos
 * ============================================================
 * Funcionalidades:
 *   - Listado con búsqueda en tiempo real
 *   - Modal para registrar nuevo mayordomo
 *   - Modal para editar mayordomo existente
 *   - Ver detalle (ícono ojo)
 * Conecta con: controllers/MayordomoController.php (fetch/AJAX)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Mayordomo.php';

$db       = (new Database())->conectar();
$model    = new Mayordomo($db);
$busqueda = trim($_GET['q'] ?? '');
$lista    = $model->listar($busqueda);

$titulo_pagina = 'Mayordomos - AgroFinca';
$modulo_activo = 'mayordomos';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- CABECERA DEL MÓDULO -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Mayordomos</h1>
    <p class="mod-subtitulo">Administra los mayordomos del sistema</p>
  </div>
  <button class="btn-primary" onclick="abrirModalRegistrar()">
    + Registrar Nuevo Mayordomo
  </button>
</div>

<!-- BUSCADOR -->
<div class="buscador-wrap">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="🔍  Buscar por nombre, apellido o documento..."
         value="<?= htmlspecialchars($busqueda) ?>"
         oninput="filtrarTabla(this.value)" />
</div>

<!-- TABLA -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaMayordomos">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Documento</th>
        <th>Usuario</th>
        <th>Estado</th>
        <th>Fecha Creación</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($lista)): ?>
        <tr><td colspan="7" class="tabla-vacia">No se encontraron mayordomos</td></tr>
      <?php else: ?>
        <?php foreach ($lista as $m): ?>
          <tr data-busqueda="<?= strtolower($m['nombres'] . ' ' . $m['apellidos'] . ' ' . $m['documento']) ?>">
            <td><?= htmlspecialchars($m['nombres']) ?></td>
            <td><?= htmlspecialchars($m['apellidos']) ?></td>
            <td><?= htmlspecialchars($m['documento']) ?></td>
            <td><?= htmlspecialchars($m['username']) ?></td>
            <td>
              <span class="badge <?= $m['activo'] ? 'badge-activo' : 'badge-inactivo' ?>">
                <?= $m['activo'] ? 'Activo' : 'Inactivo' ?>
              </span>
            </td>
            <td><?= htmlspecialchars(substr($m['fecha_creacion'], 0, 10)) ?></td>
            <td class="acciones">
              <button class="btn-icono btn-ver" title="Ver detalle"
                onclick="verDetalle(<?= $m['id_usuario'] ?>, '<?= htmlspecialchars($m['nombres']) ?>', '<?= htmlspecialchars($m['apellidos']) ?>', '<?= htmlspecialchars($m['documento']) ?>', '<?= htmlspecialchars($m['username']) ?>', <?= $m['activo'] ?>, '<?= htmlspecialchars(substr($m['fecha_creacion'],0,10)) ?>')">
                👁
              </button>
              <button class="btn-icono btn-editar" title="Editar"
                onclick="abrirModalEditar(<?= $m['id_usuario'] ?>, '<?= htmlspecialchars($m['nombres']) ?>', '<?= htmlspecialchars($m['apellidos']) ?>', '<?= htmlspecialchars($m['documento']) ?>', '<?= htmlspecialchars($m['username']) ?>', <?= $m['activo'] ?>)">
                ✏️
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- ===== MODAL REGISTRAR ===== -->
<div class="modal-overlay" id="modalRegistrar">
  <div class="modal">
    <h2 class="modal-titulo">Registrar Nuevo Mayordomo</h2>
    <form id="formRegistrar" onsubmit="submitRegistrar(event)">
      <div class="form-grid-2">
        <div class="form-group">
          <label>Nombre *</label>
          <input type="text" name="nombres" required />
        </div>
        <div class="form-group">
          <label>Apellido *</label>
          <input type="text" name="apellidos" required />
        </div>
      </div>
      <div class="form-group">
        <label>Documento *</label>
        <input type="text" name="documento" required />
      </div>
      <div class="form-group">
        <label>Usuario *</label>
        <input type="text" name="username" required />
      </div>
      <div class="form-group">
        <label>Contraseña *</label>
        <input type="password" name="password" required minlength="6" />
      </div>
      <label class="checkbox-label">
        <input type="checkbox" name="activo" checked /> Cuenta Activa
      </label>
      <div id="msgRegistrar" class="msg-form"></div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalRegistrar')">Cancelar</button>
        <button type="submit" class="btn-primary">Registrar</button>
      </div>
    </form>
  </div>
</div>

<!-- ===== MODAL EDITAR ===== -->
<div class="modal-overlay" id="modalEditar">
  <div class="modal">
    <h2 class="modal-titulo">Editar Mayordomo</h2>
    <form id="formEditar" onsubmit="submitEditar(event)">
      <input type="hidden" name="id" id="editId" />
      <div class="form-grid-2">
        <div class="form-group">
          <label>Nombre *</label>
          <input type="text" name="nombres" id="editNombres" required />
        </div>
        <div class="form-group">
          <label>Apellido *</label>
          <input type="text" name="apellidos" id="editApellidos" required />
        </div>
      </div>
      <div class="form-group">
        <label>Documento *</label>
        <input type="text" name="documento" id="editDocumento" required />
      </div>
      <div class="form-group">
        <label>Usuario *</label>
        <input type="text" name="username" id="editUsername" required />
      </div>
      <div class="form-group">
        <label>Nueva Contraseña <span style="color:#6b7280;font-weight:400">(dejar vacío para no cambiar)</span></label>
        <input type="password" name="password" minlength="6" />
      </div>
      <label class="checkbox-label">
        <input type="checkbox" name="activo" id="editActivo" /> Cuenta Activa
      </label>
      <div id="msgEditar" class="msg-form"></div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalEditar')">Cancelar</button>
        <button type="submit" class="btn-primary">Guardar Cambios</button>
      </div>
    </form>
  </div>
</div>

<!-- ===== MODAL VER DETALLE ===== -->
<div class="modal-overlay" id="modalVer">
  <div class="modal">
    <h2 class="modal-titulo">Detalle del Mayordomo</h2>
    <div class="detalle-grid">
      <div class="detalle-item"><span class="detalle-label">Nombre</span><span id="verNombres"></span></div>
      <div class="detalle-item"><span class="detalle-label">Apellido</span><span id="verApellidos"></span></div>
      <div class="detalle-item"><span class="detalle-label">Documento</span><span id="verDocumento"></span></div>
      <div class="detalle-item"><span class="detalle-label">Usuario</span><span id="verUsername"></span></div>
      <div class="detalle-item"><span class="detalle-label">Estado</span><span id="verEstado"></span></div>
      <div class="detalle-item"><span class="detalle-label">Fecha Creación</span><span id="verFecha"></span></div>
    </div>
    <div class="modal-acciones">
      <button type="button" class="btn-primary" onclick="cerrarModal('modalVer')">Cerrar</button>
    </div>
  </div>
</div>

<script>
// ── Filtro en tiempo real ──────────────────────────────────
function filtrarTabla(q) {
  const filas = document.querySelectorAll('#tablaMayordomos tbody tr[data-busqueda]');
  const texto = q.toLowerCase();
  filas.forEach(f => {
    f.style.display = f.dataset.busqueda.includes(texto) ? '' : 'none';
  });
}

// ── Modales ───────────────────────────────────────────────
function abrirModalRegistrar() {
  document.getElementById('formRegistrar').reset();
  document.getElementById('msgRegistrar').textContent = '';
  document.getElementById('modalRegistrar').classList.add('modal-visible');
}
function abrirModalEditar(id, nombres, apellidos, documento, username, activo) {
  document.getElementById('editId').value       = id;
  document.getElementById('editNombres').value  = nombres;
  document.getElementById('editApellidos').value= apellidos;
  document.getElementById('editDocumento').value= documento;
  document.getElementById('editUsername').value = username;
  document.getElementById('editActivo').checked = activo == 1;
  document.getElementById('msgEditar').textContent = '';
  document.getElementById('modalEditar').classList.add('modal-visible');
}
function verDetalle(id, nombres, apellidos, documento, username, activo, fecha) {
  document.getElementById('verNombres').textContent  = nombres;
  document.getElementById('verApellidos').textContent= apellidos;
  document.getElementById('verDocumento').textContent= documento;
  document.getElementById('verUsername').textContent = username;
  document.getElementById('verEstado').innerHTML     = activo
    ? '<span class="badge badge-activo">Activo</span>'
    : '<span class="badge badge-inactivo">Inactivo</span>';
  document.getElementById('verFecha').textContent    = fecha;
  document.getElementById('modalVer').classList.add('modal-visible');
}
function cerrarModal(id) {
  document.getElementById(id).classList.remove('modal-visible');
}
// Cerrar al hacer clic en el overlay
document.querySelectorAll('.modal-overlay').forEach(o => {
  o.addEventListener('click', e => { if (e.target === o) o.classList.remove('modal-visible'); });
});

// ── Submit Registrar ──────────────────────────────────────
async function submitRegistrar(e) {
  e.preventDefault();
  const form = e.target;
  const msg  = document.getElementById('msgRegistrar');
  const fd   = new FormData(form);
  fd.append('accion', 'registrar');
  msg.textContent = 'Guardando...';
  msg.className   = 'msg-form';

  const res  = await fetch('../../controllers/MayordomoController.php', { method: 'POST', body: fd });
  const data = await res.json();

  if (data.ok) {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-ok';
    setTimeout(() => location.reload(), 1000);
  } else {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-error';
  }
}

// ── Submit Editar ─────────────────────────────────────────
async function submitEditar(e) {
  e.preventDefault();
  const form = e.target;
  const msg  = document.getElementById('msgEditar');
  const fd   = new FormData(form);
  fd.append('accion', 'actualizar');
  msg.textContent = 'Guardando...';
  msg.className   = 'msg-form';

  const res  = await fetch('../../controllers/MayordomoController.php', { method: 'POST', body: fd });
  const data = await res.json();

  if (data.ok) {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-ok';
    setTimeout(() => location.reload(), 1000);
  } else {
    msg.textContent = data.msg;
    msg.className   = 'msg-form msg-error';
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
