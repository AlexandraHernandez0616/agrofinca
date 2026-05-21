<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/trabajadores.php
 * PROPÓSITO: Módulo de consulta de trabajadores
 * ============================================================
 * Funcionalidades:
 *   - Listado con búsqueda en tiempo real
 *   - Filtro por estado (Todos / ACTIVO / En labor / Inactivo)
 *   - Ver detalle del trabajador (ícono ojo)
 * Nota: Los trabajadores se crean por aprobación de solicitudes,
 *       no se registran directamente desde aquí.
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Trabajador.php';

$db       = (new Database())->conectar();
$model    = new Trabajador($db);
$busqueda = trim($_GET['q']      ?? '');
$estado   = trim($_GET['estado'] ?? '');
$lista    = $model->listar($busqueda, $estado);

$titulo_pagina = 'Trabajadores - AgroFinca';
$modulo_activo = 'trabajadores';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- CABECERA -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Trabajadores</h1>
    <p class="mod-subtitulo">Consulta y administra los trabajadores de la finca</p>
  </div>
</div>

<!-- BUSCADOR + FILTRO -->
<div class="buscador-wrap buscador-con-filtro">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="🔍  Buscar por nombre, apellido o documento..."
         value="<?= htmlspecialchars($busqueda) ?>"
         oninput="filtrarTabla(this.value)" />

  <select class="select-filtro" id="filtroEstado" onchange="filtrarEstado(this.value)">
    <option value="">Todos</option>
    <option value="ACTIVO"   <?= $estado === 'ACTIVO'   ? 'selected' : '' ?>>Activo</option>
    <option value="En labor" <?= $estado === 'En labor' ? 'selected' : '' ?>>En labor</option>
    <option value="Inactivo" <?= $estado === 'Inactivo' ? 'selected' : '' ?>>Inactivo</option>
  </select>
</div>

<!-- TABLA -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaTrabajadores">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Documento</th>
        <th>EPS</th>
        <th>RH</th>
        <th>Estado</th>
        <th>Fecha Registro</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($lista)): ?>
        <tr><td colspan="8" class="tabla-vacia">No se encontraron trabajadores</td></tr>
      <?php else: ?>
        <?php foreach ($lista as $t): ?>
          <?php
            $estadoClass = match($t['estado_trabajador']) {
              'ACTIVO'   => 'badge-activo',
              'En labor' => 'badge-labor',
              default    => 'badge-inactivo',
            };
          ?>
          <tr data-busqueda="<?= strtolower($t['nombres'] . ' ' . $t['apellidos'] . ' ' . $t['documento']) ?>"
              data-estado="<?= htmlspecialchars($t['estado_trabajador']) ?>">
            <td><?= htmlspecialchars($t['nombres']) ?></td>
            <td><?= htmlspecialchars($t['apellidos']) ?></td>
            <td><?= htmlspecialchars($t['documento']) ?></td>
            <td><?= htmlspecialchars($t['eps'] ?? '—') ?></td>
            <td><?= htmlspecialchars($t['rh']  ?? '—') ?></td>
            <td><span class="badge <?= $estadoClass ?>"><?= htmlspecialchars($t['estado_trabajador']) ?></span></td>
            <td><?= htmlspecialchars($t['fecha_ingreso'] ?? '—') ?></td>
            <td class="acciones">
              <button class="btn-icono btn-ver" title="Ver detalle"
                onclick="verDetalle(
                  '<?= htmlspecialchars($t['nombres']) ?>',
                  '<?= htmlspecialchars($t['apellidos']) ?>',
                  '<?= htmlspecialchars($t['documento']) ?>',
                  '<?= htmlspecialchars($t['eps'] ?? '') ?>',
                  '<?= htmlspecialchars($t['rh']  ?? '') ?>',
                  '<?= htmlspecialchars($t['estado_trabajador']) ?>',
                  '<?= htmlspecialchars($t['fecha_ingreso'] ?? '') ?>'
                )">👁</button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- MODAL VER DETALLE -->
<div class="modal-overlay" id="modalVer">
  <div class="modal">
    <h2 class="modal-titulo">Detalle del Trabajador</h2>
    <div class="detalle-grid">
      <div class="detalle-item"><span class="detalle-label">Nombre</span><span id="verNombres"></span></div>
      <div class="detalle-item"><span class="detalle-label">Apellido</span><span id="verApellidos"></span></div>
      <div class="detalle-item"><span class="detalle-label">Documento</span><span id="verDocumento"></span></div>
      <div class="detalle-item"><span class="detalle-label">EPS</span><span id="verEps"></span></div>
      <div class="detalle-item"><span class="detalle-label">RH</span><span id="verRh"></span></div>
      <div class="detalle-item"><span class="detalle-label">Estado</span><span id="verEstado"></span></div>
      <div class="detalle-item"><span class="detalle-label">Fecha Ingreso</span><span id="verFecha"></span></div>
    </div>
    <div class="modal-acciones">
      <button class="btn-primary" onclick="cerrarModal('modalVer')">Cerrar</button>
    </div>
  </div>
</div>

<script>
function filtrarTabla(q) {
  const texto = q.toLowerCase();
  const estado = document.getElementById('filtroEstado').value.toLowerCase();
  document.querySelectorAll('#tablaTrabajadores tbody tr[data-busqueda]').forEach(f => {
    const matchQ = f.dataset.busqueda.includes(texto);
    const matchE = !estado || f.dataset.estado.toLowerCase() === estado;
    f.style.display = (matchQ && matchE) ? '' : 'none';
  });
}
function filtrarEstado(val) {
  const q = document.getElementById('inputBusqueda').value;
  filtrarTabla(q);
}
function verDetalle(nombres, apellidos, documento, eps, rh, estado, fecha) {
  document.getElementById('verNombres').textContent  = nombres;
  document.getElementById('verApellidos').textContent= apellidos;
  document.getElementById('verDocumento').textContent= documento;
  document.getElementById('verEps').textContent      = eps || '—';
  document.getElementById('verRh').textContent       = rh  || '—';
  const cls = estado === 'ACTIVO' ? 'badge-activo' : estado === 'En labor' ? 'badge-labor' : 'badge-inactivo';
  document.getElementById('verEstado').innerHTML = `<span class="badge ${cls}">${estado}</span>`;
  document.getElementById('verFecha').textContent = fecha || '—';
  document.getElementById('modalVer').classList.add('modal-visible');
}
function cerrarModal(id) {
  document.getElementById(id).classList.remove('modal-visible');
}
document.querySelectorAll('.modal-overlay').forEach(o => {
  o.addEventListener('click', e => { if (e.target === o) o.classList.remove('modal-visible'); });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
