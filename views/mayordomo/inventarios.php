<?php
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php"); exit;
}
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Inventario.php';
$db           = (new Database())->conectar();
$model        = new Inventario($db);
$tab          = $_GET['tab'] ?? 'herramientas';
$resumen      = $model->resumen();
$herramientas = $model->listarHerramientas();
$insumos      = $model->listarInsumos();
$titulo_pagina = 'Inventarios - AgroFinca';
$modulo_activo = 'inventarios';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Gestión de Inventarios</h1>
    <p class="mod-subtitulo">Administra las bodegas de herramientas e insumos</p>
  </div>
</div>
<div class="inv-resumen-may">
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
<div class="tabs-wrap">
  <a href="inventarios.php?tab=herramientas" class="tab <?= $tab==='herramientas'?'tab-activo':'' ?>">🔧 Bodega 1 - Herramientas</a>
  <a href="inventarios.php?tab=insumos"      class="tab <?= $tab==='insumos'?'tab-activo':'' ?>">🧪 Bodega 2 - Insumos</a>
</div>
<?php if ($tab === 'herramientas'): ?>
<div class="mod-header" style="margin-bottom:16px;">
  <h2 style="font-size:17px;font-weight:700;color:#111827;margin:0;">Herramientas</h2>
  <button class="btn-primary" onclick="abrirModalHerramienta()">+ Registrar Herramienta</button>
</div>
<div id="msgHerramienta" class="msg-form" style="display:none;"></div>
<div class="tabla-wrap">
  <table class="tabla">
    <thead><tr><th>Foto</th><th>Nombre</th><th>Cantidad</th><th>Estado</th><th>Fecha Registro</th><th>Acciones</th></tr></thead>
    <tbody>
      <?php if (empty($herramientas)): ?>
        <tr><td colspan="7" class="tabla-vacia">No hay herramientas registradas</td></tr>
      <?php else: foreach ($herramientas as $h):
        $estado = strtoupper($h['estado'] ?? '');
        [$cls,$label] = match($estado) {
          'DISPONIBLE'    => ['badge-activo','Disponible'],
          'EN LABOR','EN_LABOR' => ['badge-labor','En labor'],
          'MANTENIMIENTO' => ['badge-mant','Mantenimiento'],
          'DAÑADA','DANADA' => ['badge-danada','Dañada'],
          default => ['badge-inactivo', htmlspecialchars($h['estado']??'—')],
        };
        $fotoSrc = !empty($h['foto_referencia']) ? '../../uploads/inventario/'.htmlspecialchars($h['foto_referencia']) : null;
      ?>
        <tr>
          <td><?php if($fotoSrc): ?><img src="<?=$fotoSrc?>" class="tabla-foto" onclick="verFoto('<?=$fotoSrc?>','<?=addslashes($h['nombre'])?>')"><?php else: ?><div class="tabla-foto-vacia">📷</div><?php endif; ?></td>
          <td><?=htmlspecialchars($h['nombre'])?></td>
          <td><?=$h['cantidad_total']?></td>
          <td><span class="badge <?=$cls?>"><?=$label?></span></td>
          <td><?=htmlspecialchars($h['fecha_registro']??'—')?></td>
          <td class="acciones">
            <button class="btn-icono" title="Editar" onclick="editarHerramienta(<?=$h['id_herramienta']?>,'<?=addslashes($h['nombre'])?>',<?=$h['cantidad_total']?>,'<?=$h['estado']?>','<?=$h['fecha_registro']?>','<?=$fotoSrc??''?>')">✏️</button>
          </td>
        </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
<?php endif; ?>
<?php if ($tab === 'insumos'): ?>
<div class="mod-header" style="margin-bottom:16px;">
  <h2 style="font-size:17px;font-weight:700;color:#111827;margin:0;">Insumos</h2>
  <button class="btn-primary" onclick="abrirModalInsumo()">+ Registrar Insumo</button>
</div>
<div id="msgInsumo" class="msg-form" style="display:none;"></div>
<div class="tabla-wrap">
  <table class="tabla">
    <thead><tr><th>Foto</th><th>Nombre</th><th>Stock Actual</th><th>Unidad</th><th>Stock Mínimo</th><th>Vencimiento</th><th>Estado</th><th>Fecha Registro</th><th>Acciones</th></tr></thead>
    <tbody>
      <?php if (empty($insumos)): ?>
        <tr><td colspan="10" class="tabla-vacia">No hay insumos registrados</td></tr>
      <?php else: foreach ($insumos as $i):
        $enAlerta = ($i['stock_actual'] <= $i['cantidad_minima']);
        $clsStock = $enAlerta ? 'badge-danada' : 'badge-activo';
        $lblStock = $enAlerta ? 'Stock crítico' : 'Normal';
        $fotoSrc  = !empty($i['foto_referencia']) ? '../../uploads/inventario/'.htmlspecialchars($i['foto_referencia']) : null;
      ?>
        <tr>
          <td><?php if($fotoSrc): ?><img src="<?=$fotoSrc?>" class="tabla-foto" onclick="verFoto('<?=$fotoSrc?>','<?=addslashes($i['nombre'])?>')"><?php else: ?><div class="tabla-foto-vacia">📷</div><?php endif; ?></td>
          <td><?=htmlspecialchars($i['nombre'])?></td>
          <td><strong><?=number_format($i['stock_actual'],2)?></strong></td>
          <td><?=htmlspecialchars($i['unidad_medida']??'—')?></td>
          <td><?=$i['cantidad_minima']!==null?number_format($i['cantidad_minima'],2):'—'?></td>
          <td><?=htmlspecialchars($i['fecha_vencimiento']??'—')?></td>
          <td><span class="badge <?=$clsStock?>"><?=$lblStock?></span></td>
          <td><?=htmlspecialchars($i['fecha_registro']??'—')?></td>
          <td class="acciones">
            <button class="btn-icono" title="Editar" onclick="editarInsumo(<?=$i['id_insumo']?>,'<?=addslashes($i['nombre'])?>',<?=$i['stock_actual']?>,'<?=addslashes($i['unidad_medida']??'')?>','<?=$i['fecha_vencimiento']??''?>',<?=$i['cantidad_minima']??0?>,'<?=$i['fecha_registro']??''?>','<?=$fotoSrc??''?>')">✏️</button>
          </td>
        </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
<?php endif; ?>

<!-- MODAL HERRAMIENTA -->
<div class="modal-overlay" id="modalHerramienta">
  <div class="modal">
    <h2 class="modal-titulo" id="tituloModalH">Registrar Herramienta</h2>
    <div id="msgModalH" class="msg-form" style="display:none;"></div>
    <form id="formH" onsubmit="submitH(event)">
      <input type="hidden" id="hId" name="id">
      <input type="hidden" id="hAccion" name="accion" value="crear_herramienta">
      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;"><label>Nombre *</label><input type="text" id="hNombre" name="nombre" required maxlength="100"></div>
        <div class="form-group"><label>Cantidad *</label><input type="number" id="hCantidad" name="cantidad" min="1" required></div>
        <div class="form-group"><label>Estado *</label>
          <select id="hEstado" name="estado" required>
            <option value="DISPONIBLE">Disponible</option>
            <option value="EN LABOR">En labor</option>
            <option value="MANTENIMIENTO">Mantenimiento</option>
            <option value="DAÑADA">Dañada</option>
          </select>
        </div>
        <div class="form-group"><label>Fecha Registro *</label><input type="date" id="hFecha" name="fecha" required></div>
        <div class="form-group" style="grid-column:1/-1;">
          <label>Foto <span id="hFotoReq" style="color:#dc2626;">*</span></label>
          <div class="foto-upload-wrap" id="hFotoWrap" onclick="document.getElementById('hFoto').click()">
            <img id="hFotoPreview" src="" style="display:none;max-width:100%;max-height:160px;border-radius:6px;">
            <div id="hFotoPlaceholder" class="foto-upload-placeholder"><span class="foto-upload-icon">📷</span><span class="foto-upload-texto">Haz clic para subir una foto</span><span class="foto-upload-hint">JPG, PNG o WEBP · máx. 3 MB</span></div>
          </div>
          <input type="file" id="hFoto" name="foto" accept="image/jpeg,image/png,image/webp" style="display:none;" onchange="previewFoto(this,'hFotoPreview','hFotoPlaceholder','hFotoWrap')">
        </div>
      </div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalHerramienta')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnH">Registrar</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL INSUMO -->
<div class="modal-overlay" id="modalInsumo">
  <div class="modal">
    <h2 class="modal-titulo" id="tituloModalI">Registrar Insumo</h2>
    <div id="msgModalI" class="msg-form" style="display:none;"></div>
    <form id="formI" onsubmit="submitI(event)">
      <input type="hidden" id="iId" name="id">
      <input type="hidden" id="iAccion" name="accion" value="crear_insumo">
      <div class="form-grid-2">
        <div class="form-group" style="grid-column:1/-1;"><label>Nombre *</label><input type="text" id="iNombre" name="nombre" required maxlength="100"></div>
        <div class="form-group"><label>Stock Actual *</label><input type="number" id="iStock" name="stock" min="0" step="0.01" required></div>
        <div class="form-group"><label>Unidad de Medida</label><input type="text" id="iUnidad" name="unidad" maxlength="50"></div>
        <div class="form-group"><label>Stock Mínimo</label><input type="number" id="iMinimo" name="minimo" min="0" step="0.01"></div>
        <div class="form-group"><label>Fecha Vencimiento</label><input type="date" id="iVencimiento" name="vencimiento"></div>
        <div class="form-group"><label>Fecha Registro *</label><input type="date" id="iFecha" name="fecha" required></div>
        <div class="form-group" style="grid-column:1/-1;">
          <label>Foto <span id="iFotoReq" style="color:#dc2626;">*</span></label>
          <div class="foto-upload-wrap" id="iFotoWrap" onclick="document.getElementById('iFoto').click()">
            <img id="iFotoPreview" src="" style="display:none;max-width:100%;max-height:160px;border-radius:6px;">
            <div id="iFotoPlaceholder" class="foto-upload-placeholder"><span class="foto-upload-icon">📷</span><span class="foto-upload-texto">Haz clic para subir una foto</span><span class="foto-upload-hint">JPG, PNG o WEBP · máx. 3 MB</span></div>
          </div>
          <input type="file" id="iFoto" name="foto" accept="image/jpeg,image/png,image/webp" style="display:none;" onchange="previewFoto(this,'iFotoPreview','iFotoPlaceholder','iFotoWrap')">
        </div>
      </div>
      <div class="modal-acciones">
        <button type="button" class="btn-cancelar" onclick="cerrarModal('modalInsumo')">Cancelar</button>
        <button type="submit" class="btn-primary" id="btnI">Registrar</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL FOTO AMPLIADA -->
<div class="modal-overlay" id="modalFoto" onclick="cerrarModal('modalFoto')">
  <div class="modal-foto-inner" onclick="event.stopPropagation()">
    <button class="modal-foto-cerrar" onclick="cerrarModal('modalFoto')">✕</button>
    <img id="modalFotoImg" src="" alt="">
    <p id="modalFotoNombre" style="text-align:center;font-size:14px;color:#6b7280;margin-top:10px;"></p>
  </div>
</div>

<style>
  .inv-resumen-may { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:24px; }
  .badge-mant   { background:#fef3c7; color:#92400e; }
  .badge-danada { background:#fdecea; color:#b91c1c; }
  .tabs-wrap { display:flex; gap:4px; border-bottom:2px solid #e5e7eb; margin-bottom:24px; }
  .tab { padding:10px 18px; font-size:14px; font-weight:500; color:#6b7280; text-decoration:none; border-bottom:2px solid transparent; margin-bottom:-2px; transition:color 0.15s,border-color 0.15s; }
  .tab:hover { color:#2e9e4f; }
  .tab-activo { color:#2e9e4f; border-bottom-color:#2e9e4f; font-weight:600; }
  .tabla-foto { width:48px; height:48px; object-fit:cover; border-radius:8px; border:1px solid #e5e7eb; cursor:zoom-in; transition:transform 0.15s,box-shadow 0.15s; display:block; }
  .tabla-foto:hover { transform:scale(1.08); box-shadow:0 4px 12px rgba(0,0,0,0.15); }
  .tabla-foto-vacia { width:48px; height:48px; border-radius:8px; border:1px dashed #d1d5db; background:#f9fafb; display:flex; align-items:center; justify-content:center; font-size:20px; color:#9ca3af; }
  .foto-upload-wrap { border:2px dashed #d1d5db; border-radius:10px; padding:16px; cursor:pointer; transition:border-color 0.2s,background 0.2s; display:flex; align-items:center; justify-content:center; min-height:110px; background:#fafafa; }
  .foto-upload-wrap:hover { border-color:#2e9e4f; background:#f0fdf4; }
  .foto-upload-wrap.tiene-foto { border-color:#2e9e4f; border-style:solid; padding:6px; min-height:auto; }
  .foto-upload-placeholder { display:flex; flex-direction:column; align-items:center; gap:4px; pointer-events:none; }
  .foto-upload-icon { font-size:28px; }
  .foto-upload-texto { font-size:13px; font-weight:600; color:#374151; }
  .foto-upload-hint { font-size:11px; color:#9ca3af; }
  .modal-foto-inner { position:relative; background:#fff; border-radius:14px; padding:20px; max-width:560px; width:90%; box-shadow:0 20px 60px rgba(0,0,0,0.3); }
  .modal-foto-inner img { width:100%; max-height:420px; object-fit:contain; border-radius:8px; display:block; }
  .modal-foto-cerrar { position:absolute; top:10px; right:12px; background:#f3f4f6; border:none; border-radius:50%; width:30px; height:30px; font-size:14px; cursor:pointer; display:flex; align-items:center; justify-content:center; }
  .modal-foto-cerrar:hover { background:#e5e7eb; }
  .form-group select { height:40px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
  .form-group select:focus { border-color:#2e9e4f; }
  @media (max-width:768px) { .inv-resumen-may { grid-template-columns:1fr 1fr; } }
  @media (max-width:480px) { .inv-resumen-may { grid-template-columns:1fr; } }
</style>

<script>
const CTRL = '../../controllers/MayordomoInventarioController.php';
const hoy  = new Date().toISOString().split('T')[0];

function mostrarMsg(id, texto, tipo) {
  const el = document.getElementById(id);
  if (!el) return;
  el.textContent = texto;
  el.className = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
  el.style.display = 'block';
  setTimeout(() => { el.style.display = 'none'; }, 4000);
}
function recargar() { setTimeout(() => location.reload(), 800); }
function cerrarModal(id) { document.getElementById(id).classList.remove('modal-visible'); }

function previewFoto(input, previewId, placeholderId, wrapId) {
  const file = input.files[0];
  if (!file) return;
  if (file.size > 3 * 1024 * 1024) { alert('La imagen no puede superar 3 MB'); input.value = ''; return; }
  const reader = new FileReader();
  reader.onload = (e) => {
    const preview = document.getElementById(previewId);
    const placeholder = document.getElementById(placeholderId);
    const wrap = document.getElementById(wrapId);
    preview.src = e.target.result; preview.style.display = 'block';
    placeholder.style.display = 'none'; wrap.classList.add('tiene-foto');
  };
  reader.readAsDataURL(file);
}
function resetFotoWrap(previewId, placeholderId, wrapId) {
  const preview = document.getElementById(previewId);
  const placeholder = document.getElementById(placeholderId);
  const wrap = document.getElementById(wrapId);
  if (preview) { preview.src = ''; preview.style.display = 'none'; }
  if (placeholder) { placeholder.style.display = 'flex'; }
  if (wrap) { wrap.classList.remove('tiene-foto'); }
}
function cargarFotoExistente(src, previewId, placeholderId, wrapId) {
  if (!src) return;
  const preview = document.getElementById(previewId);
  const placeholder = document.getElementById(placeholderId);
  const wrap = document.getElementById(wrapId);
  preview.src = src; preview.style.display = 'block';
  placeholder.style.display = 'none'; wrap.classList.add('tiene-foto');
}
function verFoto(src, nombre) {
  document.getElementById('modalFotoImg').src = src;
  document.getElementById('modalFotoNombre').textContent = nombre;
  document.getElementById('modalFoto').classList.add('modal-visible');
}

// HERRAMIENTAS
function abrirModalHerramienta() {
  document.getElementById('tituloModalH').textContent = 'Registrar Herramienta';
  document.getElementById('btnH').textContent = 'Registrar';
  document.getElementById('hAccion').value = 'crear_herramienta';
  document.getElementById('hId').value = '';
  document.getElementById('formH').reset();
  document.getElementById('hFecha').value = hoy;
  document.getElementById('hFoto').required = true;
  document.getElementById('hFotoReq').style.display = 'inline';
  resetFotoWrap('hFotoPreview','hFotoPlaceholder','hFotoWrap');
  document.getElementById('msgModalH').style.display = 'none';
  document.getElementById('modalHerramienta').classList.add('modal-visible');
}
function editarHerramienta(id, nombre, cantidad, estado, fecha, fotoSrc) {
  document.getElementById('tituloModalH').textContent = 'Editar Herramienta';
  document.getElementById('btnH').textContent = 'Guardar cambios';
  document.getElementById('hAccion').value = 'editar_herramienta';
  document.getElementById('hId').value = id;
  document.getElementById('hNombre').value = nombre;
  document.getElementById('hCantidad').value = cantidad;
  document.getElementById('hEstado').value = estado;
  document.getElementById('hFecha').value = fecha;
  document.getElementById('hFoto').required = false;
  document.getElementById('hFotoReq').style.display = 'none';
  resetFotoWrap('hFotoPreview','hFotoPlaceholder','hFotoWrap');
  if (fotoSrc) cargarFotoExistente(fotoSrc,'hFotoPreview','hFotoPlaceholder','hFotoWrap');
  document.getElementById('msgModalH').style.display = 'none';
  document.getElementById('modalHerramienta').classList.add('modal-visible');
}
async function submitH(e) {
  e.preventDefault();
  const btn = document.getElementById('btnH');
  const accion = document.getElementById('hAccion').value;
  if (accion === 'crear_herramienta' && !document.getElementById('hFoto').files.length) {
    mostrarMsg('msgModalH','Debes subir una foto de la herramienta','error'); return;
  }
  btn.disabled = true; btn.textContent = 'Guardando…';
  const fd = new FormData(document.getElementById('formH'));
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) { cerrarModal('modalHerramienta'); mostrarMsg('msgHerramienta', json.mensaje, 'ok'); recargar(); }
    else { mostrarMsg('msgModalH', json.mensaje, 'error'); btn.disabled = false; btn.textContent = accion === 'crear_herramienta' ? 'Registrar' : 'Guardar cambios'; }
  } catch { mostrarMsg('msgModalH','Error de conexión','error'); btn.disabled = false; }
}

// INSUMOS
function abrirModalInsumo() {
  document.getElementById('tituloModalI').textContent = 'Registrar Insumo';
  document.getElementById('btnI').textContent = 'Registrar';
  document.getElementById('iAccion').value = 'crear_insumo';
  document.getElementById('iId').value = '';
  document.getElementById('formI').reset();
  document.getElementById('iFecha').value = hoy;
  document.getElementById('iFoto').required = true;
  document.getElementById('iFotoReq').style.display = 'inline';
  resetFotoWrap('iFotoPreview','iFotoPlaceholder','iFotoWrap');
  document.getElementById('msgModalI').style.display = 'none';
  document.getElementById('modalInsumo').classList.add('modal-visible');
}
function editarInsumo(id, nombre, stock, unidad, vencimiento, minimo, fecha, fotoSrc) {
  document.getElementById('tituloModalI').textContent = 'Editar Insumo';
  document.getElementById('btnI').textContent = 'Guardar cambios';
  document.getElementById('iAccion').value = 'editar_insumo';
  document.getElementById('iId').value = id;
  document.getElementById('iNombre').value = nombre;
  document.getElementById('iStock').value = stock;
  document.getElementById('iUnidad').value = unidad;
  document.getElementById('iVencimiento').value = vencimiento;
  document.getElementById('iMinimo').value = minimo;
  document.getElementById('iFecha').value = fecha;
  document.getElementById('iFoto').required = false;
  document.getElementById('iFotoReq').style.display = 'none';
  resetFotoWrap('iFotoPreview','iFotoPlaceholder','iFotoWrap');
  if (fotoSrc) cargarFotoExistente(fotoSrc,'iFotoPreview','iFotoPlaceholder','iFotoWrap');
  document.getElementById('msgModalI').style.display = 'none';
  document.getElementById('modalInsumo').classList.add('modal-visible');
}
async function submitI(e) {
  e.preventDefault();
  const btn = document.getElementById('btnI');
  const accion = document.getElementById('iAccion').value;
  if (accion === 'crear_insumo' && !document.getElementById('iFoto').files.length) {
    mostrarMsg('msgModalI','Debes subir una foto del insumo','error'); return;
  }
  btn.disabled = true; btn.textContent = 'Guardando…';
  const fd = new FormData(document.getElementById('formI'));
  try {
    const res = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();
    if (json.ok) { cerrarModal('modalInsumo'); mostrarMsg('msgInsumo', json.mensaje, 'ok'); recargar(); }
    else { mostrarMsg('msgModalI', json.mensaje, 'error'); btn.disabled = false; btn.textContent = accion === 'crear_insumo' ? 'Registrar' : 'Guardar cambios'; }
  } catch { mostrarMsg('msgModalI','Error de conexión','error'); btn.disabled = false; }
}

document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', function(e) {
    if (e.target === this) this.classList.remove('modal-visible');
  });
});
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
