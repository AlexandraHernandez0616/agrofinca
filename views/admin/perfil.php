<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/perfil.php
 * PROPÓSITO: Módulo Perfil del Administrador
 * ============================================================
 * Secciones:
 *   - Banner verde con avatar, nombre completo y botón Editar Perfil
 *   - Información Personal: nombre, apellido, documento, teléfono
 *   - Seguridad y Estado: cambiar contraseña, estado cuenta, miembro desde
 *
 * Conecta con:
 *   models/Perfil.php              (lectura directa)
 *   controllers/PerfilController.php (POST via fetch → JSON)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Perfil.php';

$db    = (new Database())->conectar();
$model = new Perfil($db);
$user  = $model->obtener((int) $_SESSION['id_usuario']);

if (!$user) {
    header("Location: ../../views/usuarios/login.php"); exit;
}

// Calcular "miembro desde" formateado
$fechaCreacion = new DateTime($user['fecha_creacion']);
$miembroDesde  = $fechaCreacion->format('d/m/Y');

// Iniciales para el avatar
$iniciales = strtoupper(
    substr($user['nombres'],   0, 1) .
    substr($user['apellidos'], 0, 1)
);

$titulo_pagina = 'Mi Perfil - AgroFinca';
$modulo_activo = 'perfil';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- ── MENSAJE FEEDBACK GLOBAL ──────────────────────────── -->
<div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:16px;"></div>

<!-- ══════════════════════════════════════════════════════
     TARJETA PRINCIPAL DE PERFIL
══════════════════════════════════════════════════════════ -->
<div class="prf-card">

  <!-- Banner verde -->
  <div class="prf-banner"></div>

  <!-- Cabecera: avatar + nombre + botón editar -->
  <div class="prf-header">
    <div class="prf-avatar-wrap">
      <div class="prf-avatar" id="avatarCircle">
        <?= htmlspecialchars($iniciales) ?>
      </div>
    </div>

    <div class="prf-header-info">
      <h1 class="prf-nombre" id="displayNombre">
        <?= htmlspecialchars($user['nombres'] . ' ' . $user['apellidos']) ?>
      </h1>
      <p class="prf-meta">
        <span class="prf-meta-rol">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
               stroke="#2e9e4f" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
          </svg>
          <?= htmlspecialchars(ucfirst(strtolower($user['rol']))) ?>
        </span>
        <span class="prf-meta-sep">•</span>
        <span>Finca AgroFinca</span>
      </p>
    </div>

    <button class="prf-btn-editar" id="btnEditarPerfil" onclick="toggleEdicion()">
      Editar Perfil
    </button>
  </div>

  <!-- ── CUERPO: dos columnas ─────────────────────────── -->
  <div class="prf-body">

    <!-- ── COLUMNA IZQUIERDA: Información Personal ─────── -->
    <div class="prf-col">
      <h2 class="prf-seccion-titulo">Información Personal</h2>

      <form id="formDatos" onsubmit="submitDatos(event)">
        <input type="hidden" name="accion" value="actualizar_datos">

        <div class="prf-campo">
          <label class="prf-label">Nombre Completo</label>
          <div class="prf-input-wrap">
            <svg class="prf-input-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
              <circle cx="12" cy="7" r="4"/>
            </svg>
            <div class="prf-nombre-grid">
              <input type="text" id="fNombres" name="nombres"
                     value="<?= htmlspecialchars($user['nombres']) ?>"
                     placeholder="Nombres" class="prf-input" readonly>
              <input type="text" id="fApellidos" name="apellidos"
                     value="<?= htmlspecialchars($user['apellidos']) ?>"
                     placeholder="Apellidos" class="prf-input" readonly>
            </div>
          </div>
        </div>

        <div class="prf-campo">
          <label class="prf-label">Documento</label>
          <div class="prf-input-wrap">
            <svg class="prf-input-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="5" width="20" height="14" rx="2"/>
              <line x1="2" y1="10" x2="22" y2="10"/>
            </svg>
            <input type="text" id="fDocumento" name="documento"
                   value="<?= htmlspecialchars($user['documento']) ?>"
                   placeholder="Número de documento" class="prf-input" readonly>
          </div>
        </div>

        <div class="prf-campo">
          <label class="prf-label">Teléfono</label>
          <div class="prf-input-wrap">
            <svg class="prf-input-icon" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.18 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
            </svg>
            <input type="text" id="fTelefono" name="telefono"
                   value="<?= htmlspecialchars($user['telefono'] ?? '') ?>"
                   placeholder="+57 300 000 0000" class="prf-input" readonly>
          </div>
        </div>

        <!-- Botones de edición (ocultos por defecto) -->
        <div id="accionesDatos" style="display:none;margin-top:16px;">
          <div id="msgDatos" class="msg-form" style="display:none;margin-bottom:10px;"></div>
          <div style="display:flex;gap:10px;">
            <button type="submit" class="btn-primary" id="btnGuardarDatos">Guardar cambios</button>
            <button type="button" class="btn-cancelar" onclick="cancelarEdicion()">Cancelar</button>
          </div>
        </div>
      </form>
    </div>

    <!-- ── COLUMNA DERECHA: Seguridad y Estado ──────────── -->
    <div class="prf-col">
      <h2 class="prf-seccion-titulo">Seguridad y Estado</h2>

      <!-- Tarjeta contraseña -->
      <div class="prf-seg-card">
        <div class="prf-seg-card-header">
          <div class="prf-seg-card-left">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                 stroke="#374151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="16" r="1"/>
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <div>
              <p class="prf-seg-titulo">Contraseña</p>
              <p class="prf-seg-sub">Mantén tu cuenta segura con una contraseña fuerte</p>
            </div>
          </div>
          <button class="prf-btn-cambiar" onclick="toggleCambioPassword()">Cambiar</button>
        </div>

        <!-- Formulario cambio de contraseña (oculto por defecto) -->
        <div id="formPasswordWrap" style="display:none;margin-top:16px;border-top:1px solid #f3f4f6;padding-top:16px;">
          <form id="formPassword" onsubmit="submitPassword(event)">
            <input type="hidden" name="accion" value="cambiar_password">
            <div class="form-group" style="margin-bottom:12px;">
              <label style="font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:4px;">
                Contraseña actual *
              </label>
              <input type="password" name="password_actual" class="prf-input prf-input-activo"
                     placeholder="••••••••" required>
            </div>
            <div class="form-group" style="margin-bottom:12px;">
              <label style="font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:4px;">
                Nueva contraseña *
              </label>
              <input type="password" name="password_nueva" class="prf-input prf-input-activo"
                     placeholder="Mínimo 6 caracteres" minlength="6" required>
            </div>
            <div class="form-group" style="margin-bottom:16px;">
              <label style="font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:4px;">
                Confirmar nueva contraseña *
              </label>
              <input type="password" name="password_confirmar" class="prf-input prf-input-activo"
                     placeholder="Repite la nueva contraseña" required>
            </div>
            <div id="msgPassword" class="msg-form" style="display:none;margin-bottom:10px;"></div>
            <div style="display:flex;gap:10px;">
              <button type="submit" class="btn-primary" id="btnGuardarPassword">Actualizar contraseña</button>
              <button type="button" class="btn-cancelar" onclick="toggleCambioPassword()">Cancelar</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Tarjeta 2FA (informativa) -->
      <div class="prf-seg-card prf-seg-card-warning">
        <div style="display:flex;align-items:flex-start;gap:12px;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
               stroke="#d97706" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               style="flex-shrink:0;margin-top:2px;">
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
            <line x1="12" y1="9" x2="12" y2="13"/>
            <line x1="12" y1="17" x2="12.01" y2="17"/>
          </svg>
          <div>
            <p class="prf-seg-titulo" style="color:#92400e;">Autenticación de 2 Factores</p>
            <p class="prf-seg-sub" style="color:#78350f;">
              No activada. Mejora la seguridad de tu cuenta configurando 2FA.
            </p>
            <a href="#" class="prf-link-2fa">Configurar ahora</a>
          </div>
        </div>
      </div>

      <!-- Estado y membresía -->
      <div class="prf-estado-grid">
        <div class="prf-estado-row">
          <span class="prf-estado-label">Estado de la cuenta</span>
          <span class="badge <?= $user['activo'] ? 'badge-activo' : 'badge-inactivo' ?>">
            <?= $user['activo'] ? 'Activo' : 'Inactivo' ?>
          </span>
        </div>
        <div class="prf-estado-row">
          <span class="prf-estado-label">Miembro desde</span>
          <strong class="prf-estado-valor"><?= $miembroDesde ?></strong>
        </div>
        <div class="prf-estado-row">
          <span class="prf-estado-label">Usuario</span>
          <span class="prf-estado-valor">@<?= htmlspecialchars($user['username']) ?></span>
        </div>
        <div class="prf-estado-row">
          <span class="prf-estado-label">Rol</span>
          <span class="prf-estado-valor"><?= htmlspecialchars(ucfirst(strtolower($user['rol']))) ?></span>
        </div>
      </div>
    </div>

  </div><!-- /prf-body -->
</div><!-- /prf-card -->


<!-- ══════════════════════════════════════════════════════
     ESTILOS PROPIOS DEL MÓDULO
══════════════════════════════════════════════════════════ -->
<style>
  /* ── Tarjeta principal ─────────────────────────────── */
  .prf-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    max-width: 960px;
  }

  /* ── Banner verde ──────────────────────────────────── */
  .prf-banner {
    height: 110px;
    background: linear-gradient(135deg, #2e9e4f 0%, #1a7a38 100%);
  }

  /* ── Cabecera (avatar + nombre + botón) ────────────── */
  .prf-header {
    display: flex;
    align-items: flex-end;
    gap: 20px;
    padding: 0 32px 20px;
    margin-top: -44px;
    flex-wrap: wrap;
  }

  .prf-avatar-wrap { position: relative; flex-shrink: 0; }

  .prf-avatar {
    width: 88px;
    height: 88px;
    border-radius: 50%;
    background: #e8f5ec;
    border: 4px solid #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    font-weight: 700;
    color: #2e9e4f;
    box-shadow: 0 2px 8px rgba(0,0,0,0.12);
    user-select: none;
  }

  .prf-header-info { flex: 1; padding-bottom: 4px; }

  .prf-nombre {
    font-size: 22px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 4px;
  }

  .prf-meta {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #6b7280;
    margin: 0;
  }

  .prf-meta-rol {
    display: flex;
    align-items: center;
    gap: 4px;
    color: #2e9e4f;
    font-weight: 600;
  }

  .prf-meta-sep { color: #d1d5db; }

  .prf-btn-editar {
    background: #fff;
    border: 1.5px solid #d1d5db;
    color: #374151;
    font-size: 14px;
    font-weight: 600;
    padding: 8px 20px;
    border-radius: 8px;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
    white-space: nowrap;
    align-self: center;
    margin-bottom: 4px;
  }
  .prf-btn-editar:hover,
  .prf-btn-editar.activo {
    border-color: #2e9e4f;
    background: #f0fdf4;
    color: #2e9e4f;
  }

  /* ── Cuerpo: dos columnas ──────────────────────────── */
  .prf-body {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
    padding: 0 32px 32px;
  }

  .prf-col:first-child {
    padding-right: 32px;
    border-right: 1px solid #f3f4f6;
  }
  .prf-col:last-child { padding-left: 32px; }

  .prf-seccion-titulo {
    font-size: 15px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid #f3f4f6;
  }

  /* ── Campos de información ─────────────────────────── */
  .prf-campo { margin-bottom: 16px; }

  .prf-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 6px;
  }

  .prf-input-wrap {
    display: flex;
    align-items: center;
    gap: 10px;
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 0 14px;
    transition: border-color 0.2s, background 0.2s;
  }
  .prf-input-wrap:focus-within {
    border-color: #2e9e4f;
    background: #fff;
  }

  .prf-input-icon {
    width: 16px;
    height: 16px;
    color: #9ca3af;
    flex-shrink: 0;
  }

  .prf-nombre-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    flex: 1;
    padding: 2px 0;
  }

  .prf-input {
    flex: 1;
    height: 42px;
    border: none;
    background: transparent;
    font-size: 14px;
    color: #374151;
    outline: none;
    font-family: inherit;
    width: 100%;
  }
  .prf-input[readonly] { cursor: default; color: #6b7280; }
  .prf-input-activo {
    background: #fff;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    padding: 0 12px;
    height: 40px;
    font-size: 14px;
    color: #111827;
    outline: none;
    transition: border-color 0.2s;
    width: 100%;
    font-family: inherit;
  }
  .prf-input-activo:focus { border-color: #2e9e4f; }

  /* ── Tarjetas de seguridad ─────────────────────────── */
  .prf-seg-card {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 16px 18px;
    margin-bottom: 14px;
  }
  .prf-seg-card-warning {
    background: #fffbeb;
    border-color: #fde68a;
  }

  .prf-seg-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 12px;
  }

  .prf-seg-card-left {
    display: flex;
    align-items: flex-start;
    gap: 12px;
  }

  .prf-seg-titulo {
    font-size: 14px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 2px;
  }

  .prf-seg-sub {
    font-size: 12px;
    color: #6b7280;
    margin: 0;
  }

  .prf-btn-cambiar {
    background: none;
    border: none;
    color: #2e9e4f;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    padding: 0;
    white-space: nowrap;
    flex-shrink: 0;
  }
  .prf-btn-cambiar:hover { text-decoration: underline; }

  .prf-link-2fa {
    font-size: 13px;
    font-weight: 700;
    color: #92400e;
    text-decoration: underline;
    display: inline-block;
    margin-top: 6px;
  }

  /* ── Estado y membresía ────────────────────────────── */
  .prf-estado-grid { margin-top: 4px; }

  .prf-estado-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #f3f4f6;
    font-size: 14px;
  }
  .prf-estado-row:last-child { border-bottom: none; }

  .prf-estado-label { color: #6b7280; }
  .prf-estado-valor { font-weight: 600; color: #111827; }

  /* ── Responsive ────────────────────────────────────── */
  @media (max-width: 768px) {
    .prf-body {
      grid-template-columns: 1fr;
      padding: 0 20px 24px;
    }
    .prf-col:first-child {
      padding-right: 0;
      border-right: none;
      border-bottom: 1px solid #f3f4f6;
      padding-bottom: 24px;
      margin-bottom: 24px;
    }
    .prf-col:last-child { padding-left: 0; }
    .prf-header { padding: 0 20px 16px; }
    .prf-nombre-grid { grid-template-columns: 1fr; }
  }
</style>


<!-- ══════════════════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════════════════════ -->
<script>
const CTRL = '../../controllers/PerfilController.php';

/* ── Utilidades ─────────────────────────────────────────── */
function mostrarMsg(id, texto, tipo) {
  const el = document.getElementById(id);
  if (!el) return;
  el.textContent   = texto;
  el.className     = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
  el.style.display = 'block';
  setTimeout(() => { el.style.display = 'none'; }, 5000);
}

/* ══════════════════════════════════════════════════════════
   EDICIÓN DE DATOS PERSONALES
══════════════════════════════════════════════════════════ */
let _modoEdicion = false;

function toggleEdicion() {
  _modoEdicion = !_modoEdicion;
  const inputs  = ['fNombres', 'fApellidos', 'fDocumento', 'fTelefono'];
  const acciones = document.getElementById('accionesDatos');
  const btn      = document.getElementById('btnEditarPerfil');

  inputs.forEach(id => {
    const el = document.getElementById(id);
    if (_modoEdicion) {
      el.removeAttribute('readonly');
      el.closest('.prf-input-wrap')?.classList.add('prf-input-wrap-edit');
    } else {
      el.setAttribute('readonly', true);
      el.closest('.prf-input-wrap')?.classList.remove('prf-input-wrap-edit');
    }
  });

  acciones.style.display = _modoEdicion ? 'block' : 'none';
  btn.classList.toggle('activo', _modoEdicion);
  btn.textContent = _modoEdicion ? 'Cancelar edición' : 'Editar Perfil';
}

function cancelarEdicion() {
  // Recargar para restaurar valores originales
  location.reload();
}

async function submitDatos(e) {
  e.preventDefault();
  const btn = document.getElementById('btnGuardarDatos');
  btn.disabled    = true;
  btn.textContent = 'Guardando…';

  const fd = new FormData(e.target);

  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();

    if (json.ok) {
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      // Actualizar nombre visible en la página
      const nombres   = document.getElementById('fNombres').value.trim();
      const apellidos = document.getElementById('fApellidos').value.trim();
      document.getElementById('displayNombre').textContent = nombres + ' ' + apellidos;
      // Actualizar iniciales del avatar
      const ini = (nombres[0] ?? '') + (apellidos[0] ?? '');
      document.getElementById('avatarCircle').textContent = ini.toUpperCase();
      // Salir del modo edición
      toggleEdicion();
    } else {
      mostrarMsg('msgDatos', json.mensaje, 'error');
      btn.disabled    = false;
      btn.textContent = 'Guardar cambios';
    }
  } catch {
    mostrarMsg('msgDatos', 'Error de conexión', 'error');
    btn.disabled    = false;
    btn.textContent = 'Guardar cambios';
  }
}

/* ══════════════════════════════════════════════════════════
   CAMBIO DE CONTRASEÑA
══════════════════════════════════════════════════════════ */
function toggleCambioPassword() {
  const wrap = document.getElementById('formPasswordWrap');
  const visible = wrap.style.display !== 'none';
  wrap.style.display = visible ? 'none' : 'block';
  if (!visible) {
    document.getElementById('formPassword').reset();
    document.getElementById('msgPassword').style.display = 'none';
  }
}

async function submitPassword(e) {
  e.preventDefault();
  const btn = document.getElementById('btnGuardarPassword');
  btn.disabled    = true;
  btn.textContent = 'Actualizando…';

  const fd = new FormData(e.target);

  try {
    const res  = await fetch(CTRL, { method: 'POST', body: fd });
    const json = await res.json();

    if (json.ok) {
      toggleCambioPassword();
      mostrarMsg('msgGlobal', json.mensaje, 'ok');
      document.getElementById('formPassword').reset();
    } else {
      mostrarMsg('msgPassword', json.mensaje, 'error');
      btn.disabled    = false;
      btn.textContent = 'Actualizar contraseña';
    }
  } catch {
    mostrarMsg('msgPassword', 'Error de conexión', 'error');
    btn.disabled    = false;
    btn.textContent = 'Actualizar contraseña';
  }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
