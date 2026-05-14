<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/bitacora.php
 * PROPÓSITO: Módulo Bitácora de Operaciones (admin) — solo lectura
 * ============================================================
 * Funcionalidades:
 *   - 4 tarjetas resumen: total registros, operaciones hoy,
 *     usuarios activos, módulos registrados
 *   - Buscador en tiempo real (JS) sobre la tabla cargada
 *   - Filtros dropdown: Módulo y Tipo de Operación
 *   - Tabla: Fecha | Hora | Usuario | Rol | Módulo | Acción | Descripción
 *   - Badges de color por tipo de operación
 *   - Modal de detalle al hacer clic en 👁
 *
 * Conecta con:
 *   models/Bitacora.php  (lectura directa, sin controlador POST)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Bitacora.php';

$db         = (new Database())->conectar();
$model      = new Bitacora($db);
$resumen    = $model->resumen();
$modulos    = $model->listarModulos();
$operaciones= $model->listarOperaciones();
$lista      = $model->listar();   // últimos 200 registros

$titulo_pagina = 'Bitácora - AgroFinca';
$modulo_activo = 'bitacora';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Bitácora de Operaciones</h1>
    <p class="mod-subtitulo">Auditoría y trazabilidad de acciones críticas del sistema</p>
  </div>
</div>

<!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
<div class="bit-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Total Registros</span>
    <span class="lote-stat-valor"><?= number_format($resumen['total']) ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Operaciones Hoy</span>
    <span class="lote-stat-valor"><?= $resumen['hoy'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">Usuarios con Actividad</span>
    <span class="lote-stat-valor"><?= $resumen['usuarios_activos'] ?></span>
  </div>
  <div class="lote-card-stat" style="background:#f0fdf4;border:1px solid #bbf7d0;">
    <span class="lote-stat-label">Módulos Registrados</span>
    <span class="lote-stat-valor" style="color:#166534;"><?= $resumen['modulos'] ?></span>
  </div>
</div>

<!-- ── FILTROS ───────────────────────────────────────────── -->
<div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
  <input type="text" id="inputBusqueda" class="buscador"
         placeholder="🔍  Buscar en bitácora..."
         oninput="filtrarTabla()">

  <select class="select-filtro" id="filtroModulo" onchange="filtrarTabla()">
    <option value="">Todos los módulos</option>
    <?php foreach ($modulos as $m): ?>
      <option value="<?= htmlspecialchars($m) ?>"><?= htmlspecialchars($m) ?></option>
    <?php endforeach; ?>
  </select>

  <select class="select-filtro" id="filtroOperacion" onchange="filtrarTabla()">
    <option value="">Todas las acciones</option>
    <?php foreach ($operaciones as $op): ?>
      <option value="<?= htmlspecialchars($op) ?>"><?= htmlspecialchars($op) ?></option>
    <?php endforeach; ?>
  </select>
</div>

<!-- ── TABLA ─────────────────────────────────────────────── -->
<div class="tabla-wrap">
  <table class="tabla" id="tablaBitacora">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Módulo</th>
        <th>Acción</th>
        <th>Descripción</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($lista)): ?>
        <tr><td colspan="8" class="tabla-vacia">No hay registros en la bitácora</td></tr>
      <?php else: ?>
        <?php foreach ($lista as $r): ?>
          <?php
            // Badge de color según tipo de operación
            $op  = strtolower($r['operacion']);
            $cls = 'badge-bit-otro';
            if (str_contains($op, 'creaci') || str_contains($op, 'registro') || str_contains($op, 'generaci')) {
                $cls = 'badge-bit-crear';
            } elseif (str_contains($op, 'modific') || str_contains($op, 'actuali') || str_contains($op, 'cambio')) {
                $cls = 'badge-bit-editar';
            } elseif (str_contains($op, 'eliminaci') || str_contains($op, 'borrado')) {
                $cls = 'badge-bit-eliminar';
            } elseif (str_contains($op, 'aprobaci') || str_contains($op, 'liquidaci') || str_contains($op, 'pago')) {
                $cls = 'badge-bit-aprobar';
            }

            $rolLabel = match(strtoupper($r['rol'])) {
              'ADMINISTRADOR' => 'Administrador',
              'MAYORDOMO'     => 'Mayordomo',
              'TRABAJADOR'    => 'Trabajador',
              default         => htmlspecialchars($r['rol']),
            };
          ?>
          <tr data-busqueda="<?= strtolower(
                htmlspecialchars($r['username'] . ' ' . $r['rol'] . ' ' .
                $r['modulo'] . ' ' . $r['operacion'] . ' ' . ($r['detalle'] ?? ''))
              ) ?>"
              data-modulo="<?= htmlspecialchars($r['modulo']) ?>"
              data-operacion="<?= htmlspecialchars($r['operacion']) ?>">
            <td><?= htmlspecialchars($r['fecha']) ?></td>
            <td style="font-family:monospace;font-size:13px;"><?= htmlspecialchars($r['hora']) ?></td>
            <td><strong><?= htmlspecialchars($r['username']) ?></strong></td>
            <td><?= $rolLabel ?></td>
            <td><?= htmlspecialchars($r['modulo']) ?></td>
            <td><span class="badge <?= $cls ?>"><?= htmlspecialchars($r['operacion']) ?></span></td>
            <td class="bit-detalle-celda"><?= htmlspecialchars($r['detalle'] ?? '—') ?></td>
            <td>
              <button class="btn-icono" title="Ver detalle completo"
                onclick="verDetalle(
                  '<?= htmlspecialchars($r['fecha']) ?>',
                  '<?= htmlspecialchars($r['hora']) ?>',
                  '<?= addslashes($r['username']) ?>',
                  '<?= addslashes($rolLabel) ?>',
                  '<?= addslashes($r['modulo']) ?>',
                  '<?= addslashes($r['operacion']) ?>',
                  '<?= addslashes($r['detalle'] ?? '') ?>'
                )">👁</button>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Contador de registros visibles -->
<p id="contadorRegistros" style="font-size:12px;color:#9ca3af;margin-top:8px;text-align:right;">
  Mostrando <?= count($lista) ?> registros
</p>


<!-- ══════════════════════════════════════════════════════
     MODAL: VER DETALLE
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalDetalle">
  <div class="modal" style="max-width:520px;">
    <h2 class="modal-titulo">Detalle de Operación</h2>
    <div class="detalle-grid">
      <div class="detalle-item">
        <span class="detalle-label">Fecha</span>
        <span id="dFecha"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Hora</span>
        <span id="dHora" style="font-family:monospace;"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Usuario</span>
        <span id="dUsuario"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Rol</span>
        <span id="dRol"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Módulo</span>
        <span id="dModulo"></span>
      </div>
      <div class="detalle-item">
        <span class="detalle-label">Acción</span>
        <span id="dAccion"></span>
      </div>
      <div class="detalle-item" style="grid-column:1/-1;">
        <span class="detalle-label">Descripción completa</span>
        <p id="dDetalle"
           style="font-size:14px;color:#374151;margin:6px 0 0;
                  line-height:1.6;word-break:break-word;"></p>
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
  .bit-resumen {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 24px;
  }

  /* Celda descripción: truncar texto largo */
  .bit-detalle-celda {
    max-width: 320px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-size: 13px;
    color: #374151;
  }

  /* Badges de operación */
  .badge-bit-crear    { background: #dcfce7; color: #166534; }   /* verde  */
  .badge-bit-editar   { background: #dbeafe; color: #1e40af; }   /* azul   */
  .badge-bit-eliminar { background: #fdecea; color: #b91c1c; }   /* rojo   */
  .badge-bit-aprobar  { background: #fef3c7; color: #92400e; }   /* amarillo */
  .badge-bit-otro     { background: #f3f4f6; color: #374151; }   /* gris   */

  /* Selects en filtros */
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

  @media (max-width: 768px) {
    .bit-resumen { grid-template-columns: 1fr 1fr; }
    .buscador-con-filtro { flex-wrap: wrap; }
    .bit-detalle-celda { max-width: 180px; }
  }
  @media (max-width: 480px) {
    .bit-resumen { grid-template-columns: 1fr; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
/* ── Filtro en tiempo real ──────────────────────────────── */
function filtrarTabla() {
  const q        = document.getElementById('inputBusqueda').value.toLowerCase();
  const modulo   = document.getElementById('filtroModulo').value;
  const operacion= document.getElementById('filtroOperacion').value;

  let visibles = 0;
  document.querySelectorAll('#tablaBitacora tbody tr[data-busqueda]').forEach(tr => {
    const matchQ = tr.dataset.busqueda.includes(q);
    const matchM = !modulo    || tr.dataset.modulo    === modulo;
    const matchO = !operacion || tr.dataset.operacion === operacion;
    const visible = matchQ && matchM && matchO;
    tr.style.display = visible ? '' : 'none';
    if (visible) visibles++;
  });

  document.getElementById('contadorRegistros').textContent =
    'Mostrando ' + visibles + ' registro' + (visibles !== 1 ? 's' : '');
}

/* ── Modal detalle ──────────────────────────────────────── */
function verDetalle(fecha, hora, usuario, rol, modulo, accion, detalle) {
  document.getElementById('dFecha').textContent   = fecha;
  document.getElementById('dHora').textContent    = hora;
  document.getElementById('dUsuario').textContent = usuario;
  document.getElementById('dRol').textContent     = rol;
  document.getElementById('dModulo').textContent  = modulo;
  document.getElementById('dAccion').textContent  = accion;
  document.getElementById('dDetalle').textContent = detalle || '—';
  document.getElementById('modalDetalle').classList.add('modal-visible');
}

function cerrarModal(id) {
  document.getElementById(id).classList.remove('modal-visible');
}

/* Cerrar al hacer clic fuera */
document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('modal-visible');
  });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
