<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/inventarios.php
 * PROPÓSITO: Módulo Gestión de Inventarios (admin)
 * ============================================================
 * Pestañas:
 *   1. Bodega 1 – Herramientas  → tabla con CRUD completo
 *   2. Bodega 2 – Insumos       → tabla con CRUD completo
 *
 * Conecta con:
 *   models/Inventario.php          (lectura directa)
 *   controllers/InventarioController.php (POST via fetch)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Inventario.php';

$db    = (new Database())->conectar();
$model = new Inventario($db);

$tab        = $_GET['tab'] ?? 'herramientas';
$resumen    = $model->resumen();
$herramientas = $model->listarHerramientas();
$insumos      = $model->listarInsumos();

$titulo_pagina = 'Inventarios - AgroFinca';
$modulo_activo = 'inventarios';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── CABECERA ─────────────────────────────────────────── -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Inventarios</h1>
    <p class="mod-subtitulo">Administra las bodegas de herramientas e insumos</p>
  </div>
</div>

<!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
<div class="inv-resumen">
  <div class="lote-card-stat lote-stat-verde">
    <span class="lote-stat-label">Herramientas Disponibles</span>
    <span class="lote-stat-valor"><?= $resumen['herramientas_disponibles'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-amarillo">
    <span class="lote-stat-label">En Mantenimiento</span>
    <span class="lote-stat-valor"><?= $resumen['herramientas_mantenimiento'] ?></span>
  </div>
  <div class="lote-card-stat" style="background:#fef2f2;border:1px solid #fecaca;">
    <span class="lote-stat-label">Herramientas Dañadas</span>
    <span class="lote-stat-valor" style="color:#dc2626;"><?= $resumen['herramientas_danadas'] ?></span>
  </div>
  <div class="lote-card-stat lote-stat-azul">
    <span class="lote-stat-label">Insumos en Alerta</span>
    <span class="lote-stat-valor" style="color:#1e40af;"><?= $resumen['insumos_alerta'] ?></span>
  </div>
</div>

<!-- ── PESTAÑAS ─────────────────────────────────────────── -->
<div class="tabs-wrap">
  <a href="inventarios.php?tab=herramientas"
     class="tab <?= $tab === 'herramientas' ? 'tab-activo' : '' ?>">
    🔧 Bodega 1 – Herramientas
  </a>
  <a href="inventarios.php?tab=insumos"
     class="tab <?= $tab === 'insumos' ? 'tab-activo' : '' ?>">
    🧪 Bodega 2 – Insumos
  </a>
</div>

<!-- ══════════════════════════════════════════════════════
     PESTAÑA 1: HERRAMIENTAS
══════════════════════════════════════════════════════════ -->
<?php if ($tab === 'herramientas'): ?>

  <div class="mod-header" style="margin-bottom:16px;">
    <h2 style="font-size:17px;font-weight:700;color:#111827;margin:0;">Herramientas</h2>
    <button class="btn-primary" onclick="abrirModalHerramienta()">+ Registrar Herramienta</button>
  </div>

  <!-- Mensaje de feedback -->
  <div id="msgHerramienta" class="msg-form" style="display:none;"></div>

  <div class="tabla-wrap">
    <table class="tabla" id="tablaHerramientas">
      <thead>
        <tr>
          <th>Foto</th>
          <th>ID</th>
          <th>Nombre</th>
          <th>Cantidad</th>
          <th>Estado</th>
          <th>Fecha Registro</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($herramientas)): ?>
          <tr><td colspan="7" class="tabla-vacia">No hay herramientas registradas</td></tr>
        <?php else: ?>
          <?php foreach ($herramientas as $h): ?>
            <?php
              $estado = strtoupper($h['estado'] ?? '');
              [$cls, $label] = match($estado) {
                'DISPONIBLE'    => ['badge-activo',   'Disponible'],
                'EN LABOR',
                'EN_LABOR'      => ['badge-labor',    'En labor'],
                'MANTENIMIENTO' => ['badge-mant',     'Mantenimiento'],
                'DAÑADA',
                'DANADA'        => ['badge-danada',   'Dañada'],
                default         => ['badge-inactivo', htmlspecialchars($h['estado'] ?? '—')],
              };
              $fotoSrc = !empty($h['foto_referencia'])
                ? '../../uploads/inventario/' . htmlspecialchars($h['foto_referencia'])
                : null;
            ?>
            <tr>
              <td>
                <?php if ($fotoSrc): ?>
                  <img src="<?= $fotoSrc ?>" alt="<?= htmlspecialchars($h['nombre']) ?>"
                       class="tabla-foto" onclick="verFoto('<?= $fotoSrc ?>', '<?= addslashes($h['nombre']) ?>')">
                <?php else: ?>
                  <div class="tabla-foto-vacia">📷</div>
                <?php endif; ?>
              </td>
              <td><?= $h['id_herramienta'] ?></td>
              <td><?= htmlspecialchars($h['nombre']) ?></td>
              <td><?= $h['cantidad_total'] ?></td>
              <td><span class="badge <?= $cls ?>"><?= $label ?></span></td>
              <td><?= htmlspecialchars($h['fecha_registro'] ?? '—') ?></td>
              <td class="acciones">
                <button class="btn-icono" title="Editar"
                  onclick="editarHerramienta(<?= $h['id_herramienta'] ?>, '<?= addslashes($h['nombre']) ?>', <?= $h['cantidad_total'] ?>, '<?= $h['estado'] ?>', '<?= $h['fecha_registro'] ?>', '<?= $fotoSrc ?? '' ?>')">
                  ✏️
                </button>
                <button class="btn-icono" title="Eliminar"
                  onclick="confirmarEliminarHerramienta(<?= $h['id_herramienta'] ?>, '<?= addslashes($h['nombre']) ?>')">
                  🗑️
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

<?php endif; ?>

<!-- ══════════════════════════════════════════════════════
     PESTAÑA 2: INSUMOS
══════════════════════════════════════════════════════════ -->
<?php if ($tab === 'insumos'): ?>

  <div class="mod-header" style="margin-bottom:16px;">
    <h2 style="font-size:17px;font-weight:700;color:#111827;margin:0;">Insumos</h2>
    <button class="btn-primary" onclick="abrirModalInsumo()">+ Registrar Insumo</button>
  </div>

  <!-- Mensaje de feedback -->
  <div id="msgInsumo" class="msg-form" style="display:none;"></div>

  <div class="tabla-wrap">
    <table class="tabla" id="tablaInsumos">
      <thead>
        <tr>
          <th>Foto</th>
          <th>ID</th>
          <th>Nombre</th>
          <th>Stock Actual</th>
          <th>Unidad</th>
          <th>Stock Mínimo</th>
          <th>Vencimiento</th>
          <th>Estado</th>
          <th>Fecha Registro</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($insumos)): ?>
          <tr><td colspan="10" class="tabla-vacia">No hay insumos registrados</td></tr>
        <?php else: ?>
          <?php foreach ($insumos as $i): ?>
            <?php
              $enAlerta = ($i['stock_actual'] <= $i['cantidad_minima']);
              $clsStock = $enAlerta ? 'badge-danada' : 'badge-activo';
              $lblStock = $enAlerta ? 'Stock crítico' : 'Normal';
              $fotoSrc  = !empty($i['foto_referencia'])
                ? '../../uploads/inventario/' . htmlspecialchars($i['foto_referencia'])
                : null;
            ?>
            <tr>
              <td>
                <?php if ($fotoSrc): ?>
                  <img src="<?= $fotoSrc ?>" alt="<?= htmlspecialchars($i['nombre']) ?>"
                       class="tabla-foto" onclick="verFoto('<?= $fotoSrc ?>', '<?= addslashes($i['nombre']) ?>')">
                <?php else: ?>
                  <div class="tabla-foto-vacia">📷</div>
                <?php endif; ?>
              </td>
              <td><?= $i['id_insumo'] ?></td>
              <td><?= htmlspecialchars($i['nombre']) ?></td>
              <td><strong><?= number_format($i['stock_actual'], 2) ?></strong></td>
              <td><?= htmlspecialchars($i['unidad_medida'] ?? '—') ?></td>
              <td><?= $i['cantidad_minima'] !== null ? number_format($i['cantidad_minima'], 2) : '—' ?></td>
              <td><?= htmlspecialchars($i['fecha_vencimiento'] ?? '—') ?></td>
              <td><span class="badge <?= $clsStock ?>"><?= $lblStock ?></span></td>
              <td><?= htmlspecialchars($i['fecha_registro'] ?? '—') ?></td>
              <td class="acciones">
                <button class="btn-icono" title="Editar"
                  onclick="editarInsumo(<?= $i['id_insumo'] ?>, '<?= addslashes($i['nombre']) ?>', <?= $i['stock_actual'] ?>, '<?= addslashes($i['unidad_medida'] ?? '') ?>', '<?= $i['fecha_vencimiento'] ?? '' ?>', <?= $i['cantidad_minima'] ?? 0 ?>, '<?= $i['fecha_registro'] ?? '' ?>', '<?= $fotoSrc ?? '' ?>')">
                  ✏️
                </button>
                <button class="btn-icono" title="Eliminar"
                  onclick="confirmarEliminarInsumo(<?= $i['id_insumo'] ?>, '<?= addslashes($i['nombre']) ?>')">
                  🗑️
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

<?php endif; ?>


<!-- ══════════════════════════════════════════════════════
     MODAL: HERRAMIENTA (crear / editar)
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalHerramienta">
  <div class="modal">
    <h2 class="modal-titulo" id="tituloModalHerramienta">Registrar Herramienta</h2>
    <div id="msgModalHerramienta" class="msg-form" style="display:none;"></div>

    <form id="formHerramienta" onsubmit="submitHerramienta(event)">
      <input type="hidden" id="hId" name="id" value="">
      <input type="hidden" name="accion" id="hAccion" value="crear_herramienta">

      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="hNombre">Nombre *</label>
          <input type="text" id="hNombre" name="nombre" placeholder="Ej: Machete" required maxlength="100">
        </div>
        <div class="form-group">
          <label for="hCantidad">Cantidad *</label>
          <input type="number" id="hCantidad" name="cantidad" min="1" placeholder="Ej: 15" required>
        </div>
        <div class="form-group">
          <label for="hEstado">Estado *</label>
          <select id="hEstado" name="estado" class="select-filtro" style="height:40px;width:100%;" required>
            <option value="DISPONIBLE">Disponible</option>
            <option value="EN LABOR">En labor</option>
            <option value="MANTENIMIENTO">Mantenimiento</option>
            <option value="DAÑADA">Dañada</option>
          </select>
        </div>
        <div class="form-group">
          <label for="hFecha">Fecha Registro *</label>
          <input type="date" id="hFecha" name="fecha" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="hFoto">Foto de la herramienta <span id="hFotoReq" style="color:#dc2626;">*</span></label>
          <div class="foto-upload-wrap" id="hFotoWrap" onclick="document.getElementById('hFoto').click()">
            <img id="hFotoPreview" src="" alt="" style="display:none;">
            <div class="foto-upload-placeholder" id="hFotoPlaceholder">
              <span class="foto-upload-icon">📷</span>
              <span class="foto-upload-texto">Haz clic para subir una foto</span>
              <span class="foto-upload-hint">JPG, PNG o WEBP · máx. 3 MB</span>
            </div>
          </div>
          <input type="file" id="hFoto" name="foto" accept="image/jpeg,image/png,image/webp"
                 style="display:none;" onchange="previewFoto(this,'hFotoPreview','hFotoPlaceholder','hFotoWrap')">
        </div>
      </div>

      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModalHerramienta()">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnSubmitHerramienta">Registrar</button>
      </div>
    </form>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════
     MODAL: INSUMO (crear / editar)
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalInsumo">
  <div class="modal">
    <h2 class="modal-titulo" id="tituloModalInsumo">Registrar Insumo</h2>
    <div id="msgModalInsumo" class="msg-form" style="display:none;"></div>

    <form id="formInsumo" onsubmit="submitInsumo(event)">
      <input type="hidden" id="iId" name="id" value="">
      <input type="hidden" name="accion" id="iAccion" value="crear_insumo">

      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;">
          <label for="iNombre">Nombre *</label>
          <input type="text" id="iNombre" name="nombre" placeholder="Ej: Fertilizante NPK" required maxlength="100">
        </div>
        <div class="form-group">
          <label for="iStock">Stock Actual *</label>
          <input type="number" id="iStock" name="stock" min="0" step="0.01" placeholder="Ej: 50" required>
        </div>
        <div class="form-group">
          <label for="iUnidad">Unidad de Medida</label>
          <input type="text" id="iUnidad" name="unidad" placeholder="Ej: kg, litros" maxlength="50">
        </div>
        <div class="form-group">
          <label for="iMinimo">Stock Mínimo</label>
          <input type="number" id="iMinimo" name="minimo" min="0" step="0.01" placeholder="Ej: 10">
        </div>
        <div class="form-group">
          <label for="iVencimiento">Fecha Vencimiento</label>
          <input type="date" id="iVencimiento" name="vencimiento">
        </div>
        <div class="form-group">
          <label for="iFecha">Fecha Registro *</label>
          <input type="date" id="iFecha" name="fecha" required>
        </div>
        <div class="form-group" style="grid-column:1/-1;">
          <label for="iFoto">Foto del insumo <span id="iFotoReq" style="color:#dc2626;">*</span></label>
          <div class="foto-upload-wrap" id="iFotoWrap" onclick="document.getElementById('iFoto').click()">
            <img id="iFotoPreview" src="" alt="" style="display:none;">
            <div class="foto-upload-placeholder" id="iFotoPlaceholder">
              <span class="foto-upload-icon">📷</span>
              <span class="foto-upload-texto">Haz clic para subir una foto</span>
              <span class="foto-upload-hint">JPG, PNG o WEBP · máx. 3 MB</span>
            </div>
          </div>
          <input type="file" id="iFoto" name="foto" accept="image/jpeg,image/png,image/webp"
                 style="display:none;" onchange="previewFoto(this,'iFotoPreview','iFotoPlaceholder','iFotoWrap')">
        </div>
      </div>

      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModalInsumo()">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnSubmitInsumo">Registrar</button>
      </div>
    </form>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════
     MODAL: CONFIRMACIÓN ELIMINAR
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalEliminar">
  <div class="modal" style="max-width:420px;text-align:center;">
    <div style="font-size:40px;margin-bottom:12px;">🗑️</div>
    <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar elemento?</h2>
    <p style="font-size:14px;color:#6b7280;margin-bottom:24px;" id="subEliminar">Esta acción no se puede deshacer.</p>
    <div class="modal-acciones">
      <button class="btn-cancelar" onclick="cerrarModalEliminar()">Cancelar</button>
      <button class="btn-primary" style="background:#dc2626;" id="btnConfirmarEliminar">Eliminar</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════════════════
     MODAL: VER FOTO AMPLIADA
══════════════════════════════════════════════════════════ -->
<div class="modal-overlay" id="modalFoto" onclick="cerrarModalFoto()">
  <div class="modal-foto-inner" onclick="event.stopPropagation()">
    <button class="modal-foto-cerrar" onclick="cerrarModalFoto()" aria-label="Cerrar">✕</button>
    <img id="modalFotoImg" src="" alt="">
    <p id="modalFotoNombre" style="text-align:center;font-size:14px;color:#6b7280;margin-top:10px;"></p>
  </div>
</div>

<!-- ══════════════════════════════════════════════════════
     ESTILOS EXTRA (badges inventario)
══════════════════════════════════════════════════════════ -->
<style>
  .inv-resumen {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 14px;
    margin-bottom: 24px;
  }
  .badge-mant  { background: #fef3c7; color: #92400e; }
  .badge-danada{ background: #fdecea; color: #b91c1c; }

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

  /* ── Foto en tabla ─────────────────────────────────── */
  .tabla-foto {
    width: 48px;
    height: 48px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
    cursor: zoom-in;
    transition: transform 0.15s, box-shadow 0.15s;
    display: block;
  }
  .tabla-foto:hover {
    transform: scale(1.08);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }
  .tabla-foto-vacia {
    width: 48px;
    height: 48px;
    border-radius: 8px;
    border: 1px dashed #d1d5db;
    background: #f9fafb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    color: #9ca3af;
  }

  /* ── Zona de subida de foto ────────────────────────── */
  .foto-upload-wrap {
    border: 2px dashed #d1d5db;
    border-radius: 10px;
    padding: 16px;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 110px;
    position: relative;
    overflow: hidden;
    background: #fafafa;
  }
  .foto-upload-wrap:hover {
    border-color: #2e9e4f;
    background: #f0fdf4;
  }
  .foto-upload-wrap.tiene-foto {
    border-color: #2e9e4f;
    border-style: solid;
    padding: 6px;
    min-height: auto;
  }
  .foto-upload-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    pointer-events: none;
  }
  .foto-upload-icon  { font-size: 28px; }
  .foto-upload-texto { font-size: 13px; font-weight: 600; color: #374151; }
  .foto-upload-hint  { font-size: 11px; color: #9ca3af; }

  .foto-upload-wrap img {
    max-width: 100%;
    max-height: 160px;
    border-radius: 6px;
    object-fit: contain;
    display: block;
  }

  /* ── Modal foto ampliada ───────────────────────────── */
  .modal-foto-inner {
    position: relative;
    background: #fff;
    border-radius: 14px;
    padding: 20px;
    max-width: 560px;
    width: 90%;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
  }
  .modal-foto-inner img {
    width: 100%;
    max-height: 420px;
    object-fit: contain;
    border-radius: 8px;
    display: block;
  }
  .modal-foto-cerrar {
    position: absolute;
    top: 10px;
    right: 12px;
    background: #f3f4f6;
    border: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.15s;
  }
  .modal-foto-cerrar:hover { background: #e5e7eb; }

  @media (max-width: 768px) {
    .inv-resumen { grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 480px) {
    .inv-resumen { grid-template-columns: 1fr; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
const CTRL = '../../controllers/InventarioController.php';
const hoy  = new Date().toISOString().split('T')[0];

/* ── Utilidades generales ───────────────────────────────── */
function mostrarMsg(id, texto, tipo) {
  const el = document.getElementById(id);
  if (!el) return;
  el.textContent = texto;
  el.className   = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
  el.style.display = 'block';
  setTimeout(() => { el.style.display = 'none'; }, 4000);
}

function recargar() {
  setTimeout(() => location.reload(), 800);
}

/* ── Preview de foto ────────────────────────────────────── */
function previewFoto(input, previewId, placeholderId, wrapId) {
  const file = input.files[0];
  if (!file) return;

  // Validación en cliente (refuerzo visual)
  if (file.size > 3 * 1024 * 1024) {
    alert('La imagen no puede superar 3 MB');
    input.value = '';
    return;
  }

  const reader = new FileReader();
  reader.onload = (e) => {
    const preview = document.getElementById(previewId);
    const placeholder = document.getElementById(placeholderId);
    const wrap = document.getElementById(wrapId);
    preview.src = e.target.result;
    preview.style.display = 'block';
    placeholder.style.display = 'none';
    wrap.classList.add('tiene-foto');
  };
  reader.readAsDataURL(file);
}

function resetFotoWrap(previewId, placeholderId, wrapId) {
  const preview = document.getElementById(previewId);
  const placeholder = document.getElementById(placeholderId);
  const wrap = document.getElementById(wrapId);
  if (preview)     { preview.src = ''; preview.style.display = 'none'; }
  if (placeholder) { placeholder.style.display = 'flex'; }
  if (wrap)        { wrap.classList.remove('tiene-foto'); }
}

function cargarFotoExistente(src, previewId, placeholderId, wrapId) {
  if (!src) return;
  const preview = document.getElementById(previewId);
  const placeholder = document.getElementById(placeholderId);
  const wrap = document.getElementById(wrapId);
  preview.src = src;
  preview.style.display = 'block';
  placeholder.style.display = 'none';
  wrap.classList.add('tiene-foto');
}

/* ── Modal foto ampliada ────────────────────────────────── */
function verFoto(src, nombre) {
  document.getElementById('modalFotoImg').src    = src;
  document.getElementById('modalFotoNombre').textContent = nombre;
  document.getElementById('modalFoto').classList.add('modal-visible');
}
function cerrarModalFoto() {
  document.getElementById('modalFoto').classList.remove('modal-visible');
}

/* ══════════════════════════════════════════════════════════
   HERRAMIENTAS
══════════════════════════════════════════════════════════ */
function abrirModalHerramienta() {
  document.getElementById('tituloModalHerramienta').textContent = 'Registrar Herramienta';
  document.getElementById('btnSubmitHerramienta').textContent   = 'Registrar';
  document.getElementById('hAccion').value  = 'crear_herramienta';
  document.getElementById('hId').value      = '';
  document.getElementById('formHerramienta').reset();
  document.getElementById('hFecha').value   = hoy;
  // Foto obligatoria al crear
  document.getElementById('hFoto').required = true;
  document.getElementById('hFotoReq').style.display = 'inline';
  resetFotoWrap('hFotoPreview', 'hFotoPlaceholder', 'hFotoWrap');
  document.getElementById('msgModalHerramienta').style.display = 'none';
  document.getElementById('modalHerramienta').classList.add('modal-visible');
}

function editarHerramienta(id, nombre, cantidad, estado, fecha, fotoSrc) {
  document.getElementById('tituloModalHerramienta').textContent = 'Editar Herramienta';
  document.getElementById('btnSubmitHerramienta').textContent   = 'Guardar cambios';
  document.getElementById('hAccion').value   = 'editar_herramienta';
  document.getElementById('hId').value       = id;
  document.getElementById('hNombre').value   = nombre;
  document.getElementById('hCantidad').value = cantidad;
  document.getElementById('hEstado').value   = estado;
  document.getElementById('hFecha').value    = fecha;
  // Foto opcional al editar (ya tiene una)
  document.getElementById('hFoto').required = false;
  document.getElementById('hFotoReq').style.display = 'none';
  resetFotoWrap('hFotoPreview', 'hFotoPlaceholder', 'hFotoWrap');
  if (fotoSrc) cargarFotoExistente(fotoSrc, 'hFotoPreview', 'hFotoPlaceholder', 'hFotoWrap');
  document.getElementById('msgModalHerramienta').style.display = 'none';
  document.getElementById('modalHerramienta').classList.add('modal-visible');
}

function cerrarModalHerramienta() {
  document.getElementById('modalHerramienta').classList.remove('modal-visible');
}

async function submitHerramienta(e) {
  e.preventDefault();
  const btn    = document.getElementById('btnSubmitHerramienta');
  const accion = document.getElementById('hAccion').value;

  // Validar foto obligatoria al crear
  if (accion === 'crear_herramienta' && !document.getElementById('hFoto').files.length) {
    mostrarMsg('msgModalHerramienta', 'Debes subir una foto de la herramienta', 'error');
    return;
  }

  btn.disabled = true;
  btn.textContent = 'Guardando…';

  const data = new FormData(document.getElementById('formHerramienta'));
  try {
    const res  = await fetch(CTRL, { method: 'POST', body: data });
    const json = await res.json();
    if (json.ok) {
      cerrarModalHerramienta();
      mostrarMsg('msgHerramienta', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgModalHerramienta', json.mensaje, 'error');
      btn.disabled = false;
      btn.textContent = accion === 'crear_herramienta' ? 'Registrar' : 'Guardar cambios';
    }
  } catch {
    mostrarMsg('msgModalHerramienta', 'Error de conexión', 'error');
    btn.disabled = false;
  }
}

/* ── Eliminar herramienta ─────────────────────────────── */
let _eliminarAccion = null;

function confirmarEliminarHerramienta(id, nombre) {
  document.getElementById('tituloEliminar').textContent = '¿Eliminar herramienta?';
  document.getElementById('subEliminar').textContent    = `Se eliminará "${nombre}". Esta acción no se puede deshacer.`;
  _eliminarAccion = async () => {
    const data = new FormData();
    data.append('accion', 'eliminar_herramienta');
    data.append('id', id);
    const res  = await fetch(CTRL, { method: 'POST', body: data });
    const json = await res.json();
    cerrarModalEliminar();
    mostrarMsg('msgHerramienta', json.mensaje, json.ok ? 'ok' : 'error');
    if (json.ok) recargar();
  };
  document.getElementById('modalEliminar').classList.add('modal-visible');
}

/* ══════════════════════════════════════════════════════════
   INSUMOS
══════════════════════════════════════════════════════════ */
function abrirModalInsumo() {
  document.getElementById('tituloModalInsumo').textContent = 'Registrar Insumo';
  document.getElementById('btnSubmitInsumo').textContent   = 'Registrar';
  document.getElementById('iAccion').value  = 'crear_insumo';
  document.getElementById('iId').value      = '';
  document.getElementById('formInsumo').reset();
  document.getElementById('iFecha').value   = hoy;
  // Foto obligatoria al crear
  document.getElementById('iFoto').required = true;
  document.getElementById('iFotoReq').style.display = 'inline';
  resetFotoWrap('iFotoPreview', 'iFotoPlaceholder', 'iFotoWrap');
  document.getElementById('msgModalInsumo').style.display = 'none';
  document.getElementById('modalInsumo').classList.add('modal-visible');
}

function editarInsumo(id, nombre, stock, unidad, vencimiento, minimo, fecha, fotoSrc) {
  document.getElementById('tituloModalInsumo').textContent = 'Editar Insumo';
  document.getElementById('btnSubmitInsumo').textContent   = 'Guardar cambios';
  document.getElementById('iAccion').value      = 'editar_insumo';
  document.getElementById('iId').value          = id;
  document.getElementById('iNombre').value      = nombre;
  document.getElementById('iStock').value       = stock;
  document.getElementById('iUnidad').value      = unidad;
  document.getElementById('iVencimiento').value = vencimiento;
  document.getElementById('iMinimo').value      = minimo;
  document.getElementById('iFecha').value       = fecha;
  // Foto opcional al editar
  document.getElementById('iFoto').required = false;
  document.getElementById('iFotoReq').style.display = 'none';
  resetFotoWrap('iFotoPreview', 'iFotoPlaceholder', 'iFotoWrap');
  if (fotoSrc) cargarFotoExistente(fotoSrc, 'iFotoPreview', 'iFotoPlaceholder', 'iFotoWrap');
  document.getElementById('msgModalInsumo').style.display = 'none';
  document.getElementById('modalInsumo').classList.add('modal-visible');
}

function cerrarModalInsumo() {
  document.getElementById('modalInsumo').classList.remove('modal-visible');
}

async function submitInsumo(e) {
  e.preventDefault();
  const btn    = document.getElementById('btnSubmitInsumo');
  const accion = document.getElementById('iAccion').value;

  // Validar foto obligatoria al crear
  if (accion === 'crear_insumo' && !document.getElementById('iFoto').files.length) {
    mostrarMsg('msgModalInsumo', 'Debes subir una foto del insumo', 'error');
    return;
  }

  btn.disabled = true;
  btn.textContent = 'Guardando…';

  const data = new FormData(document.getElementById('formInsumo'));
  try {
    const res  = await fetch(CTRL, { method: 'POST', body: data });
    const json = await res.json();
    if (json.ok) {
      cerrarModalInsumo();
      mostrarMsg('msgInsumo', json.mensaje, 'ok');
      recargar();
    } else {
      mostrarMsg('msgModalInsumo', json.mensaje, 'error');
      btn.disabled = false;
      btn.textContent = accion === 'crear_insumo' ? 'Registrar' : 'Guardar cambios';
    }
  } catch {
    mostrarMsg('msgModalInsumo', 'Error de conexión', 'error');
    btn.disabled = false;
  }
}

/* ── Eliminar insumo ─────────────────────────────────── */
function confirmarEliminarInsumo(id, nombre) {
  document.getElementById('tituloEliminar').textContent = '¿Eliminar insumo?';
  document.getElementById('subEliminar').textContent    = `Se eliminará "${nombre}". Esta acción no se puede deshacer.`;
  _eliminarAccion = async () => {
    const data = new FormData();
    data.append('accion', 'eliminar_insumo');
    data.append('id', id);
    const res  = await fetch(CTRL, { method: 'POST', body: data });
    const json = await res.json();
    cerrarModalEliminar();
    mostrarMsg('msgInsumo', json.mensaje, json.ok ? 'ok' : 'error');
    if (json.ok) recargar();
  };
  document.getElementById('modalEliminar').classList.add('modal-visible');
}

/* ── Modal eliminar compartido ───────────────────────── */
function cerrarModalEliminar() {
  document.getElementById('modalEliminar').classList.remove('modal-visible');
  _eliminarAccion = null;
}

document.getElementById('btnConfirmarEliminar').addEventListener('click', async () => {
  if (_eliminarAccion) {
    document.getElementById('btnConfirmarEliminar').disabled = true;
    await _eliminarAccion();
    document.getElementById('btnConfirmarEliminar').disabled = false;
  }
});

/* ── Cerrar modales al hacer clic fuera ──────────────── */
document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) {
      this.classList.remove('modal-visible');
      _eliminarAccion = null;
    }
  });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
