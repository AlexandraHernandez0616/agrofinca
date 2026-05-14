<?php
/**
 * ARCHIVO: views/trabajador/solicitar_herramienta.php
 * PROPÓSITO: Módulo Solicitar Herramienta (vista trabajador)
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/TrabajadorSolicitudHerramienta.php';

$db            = (new Database())->conectar();
$model         = new TrabajadorSolicitudHerramienta($db);
$herramientas  = $model->listarHerramientas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Solicitar Herramienta - AgroFinca</title>
  <link rel="stylesheet" href="styles/dashboard.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <img src="../../img/logo.png" alt="AgroFinca" class="sidebar-logo-img"/>
    <span>AgroFinca</span>
  </div>
  <nav class="sidebar-nav">
    <a href="dashboard.php"             class="nav-item"><span class="nav-icon">⊞</span> Dashboard</a>
    <a href="mis_tareas.php"            class="nav-item"><span class="nav-icon">📋</span> Mis Tareas</a>
    <a href="mis_prestamos.php"         class="nav-item"><span class="nav-icon">🔑</span> Mis Préstamos</a>
    <a href="solicitar_herramienta.php" class="nav-item active"><span class="nav-icon">+</span> Solicitar Herramienta</a>
  </nav>
</aside>

<!-- CONTENIDO PRINCIPAL -->
<div class="main-wrapper">

  <!-- TOPBAR -->
  <header class="topbar">
    <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Abrir menú">☰</button>
    <div class="topbar-title">Sistema de Gestión de Finca</div>
    <div class="topbar-right">
      <span class="badge-rol">Trabajador</span>
      <div class="notif-wrapper">
        <button type="button" class="notif-btn" onclick="toggleNotifPanel()" aria-label="Notificaciones">🔔</button>
      </div>
      <a href="perfil.php" class="topbar-user" title="Mi perfil">
        👤 <?= htmlspecialchars($_SESSION['username']) ?>
      </a>
      <a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>
    </div>
  </header>

  <main class="content">

    <!-- CABECERA -->
    <div style="margin-bottom:24px;">
      <h1 style="font-size:22px;font-weight:700;color:#111827;margin:0 0 4px;">Solicitar Herramienta</h1>
      <p style="font-size:14px;color:#6b7280;margin:0;">Envía una solicitud de herramienta al mayordomo</p>
    </div>

    <!-- MENSAJE FEEDBACK -->
    <div id="msgGlobal" style="display:none;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:14px;font-weight:500;"></div>

    <!-- FORMULARIO -->
    <div class="sh-panel">
      <form id="formSolicitud" onsubmit="enviarSolicitud(event)">
        <input type="hidden" name="accion" value="solicitar">

        <!-- Herramienta -->
        <div class="sh-campo">
          <label class="sh-label" for="sHerramienta">Herramienta *</label>
          <select id="sHerramienta" name="id_herramienta" class="sh-select" required>
            <option value="">Seleccionar herramienta</option>
            <?php foreach ($herramientas as $h): ?>
              <option value="<?= $h['id_herramienta'] ?>"
                      data-disponible="<?= $h['cantidad_total'] ?>">
                <?= htmlspecialchars($h['nombre']) ?>
                (<?= $h['cantidad_total'] ?> disponibles)
              </option>
            <?php endforeach; ?>
            <?php if (empty($herramientas)): ?>
              <option value="" disabled>No hay herramientas disponibles</option>
            <?php endif; ?>
          </select>
        </div>

        <!-- Cantidad -->
        <div class="sh-campo">
          <label class="sh-label" for="sCantidad">Cantidad *</label>
          <input type="number" id="sCantidad" name="cantidad"
                 class="sh-input" min="1" placeholder="Ingresa la cantidad" required>
          <span id="cantidadHint" class="sh-hint"></span>
        </div>

        <!-- Observación -->
        <div class="sh-campo">
          <label class="sh-label" for="sObs">Observación (Opcional)</label>
          <textarea id="sObs" name="observacion" class="sh-textarea" rows="4"
                    placeholder="Describe para qué necesitas la herramienta..."></textarea>
        </div>

        <!-- Botón enviar -->
        <button type="submit" class="sh-btn-enviar" id="btnEnviar">
          ✈ Enviar Solicitud
        </button>
      </form>
    </div>

    <!-- PANEL INFORMATIVO -->
    <div class="sh-info-panel">
      <h3 class="sh-info-titulo">Información</h3>
      <ul class="sh-info-lista">
        <li>Tu solicitud será enviada al mayordomo y recibirás una notificación cuando sea aprobada o rechazada.</li>
        <li>Solo puedes solicitar la cantidad de herramientas disponibles en el inventario.</li>
        <li>Recuerda devolver las herramientas en buen estado al finalizar tu jornada.</li>
      </ul>
    </div>

  </main>
</div>

<style>
  /* Panel del formulario */
  .sh-panel {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 28px 32px;
    margin-bottom: 20px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
    max-width: 640px;
  }

  /* Campos */
  .sh-campo { margin-bottom: 20px; }

  .sh-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
  }

  .sh-select,
  .sh-input {
    width: 100%;
    height: 44px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    padding: 0 14px;
    font-size: 14px;
    color: #111827;
    background: #fff;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    font-family: inherit;
    cursor: pointer;
  }
  .sh-select:focus,
  .sh-input:focus {
    border-color: #2e9e4f;
    box-shadow: 0 0 0 3px rgba(46,158,79,0.1);
  }

  .sh-textarea {
    width: 100%;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    padding: 12px 14px;
    font-size: 14px;
    color: #111827;
    background: #fff;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    font-family: inherit;
    resize: vertical;
    min-height: 100px;
  }
  .sh-textarea:focus {
    border-color: #2e9e4f;
    box-shadow: 0 0 0 3px rgba(46,158,79,0.1);
  }

  /* Hint de cantidad */
  .sh-hint {
    display: block;
    font-size: 12px;
    color: #9ca3af;
    margin-top: 5px;
  }

  /* Botón enviar */
  .sh-btn-enviar {
    width: 100%;
    background: #2e9e4f;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 14px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s, opacity 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 8px;
  }
  .sh-btn-enviar:hover    { background: #237a3d; }
  .sh-btn-enviar:disabled { opacity: 0.6; cursor: not-allowed; }

  /* Panel informativo */
  .sh-info-panel {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 20px 24px;
    max-width: 640px;
  }
  .sh-info-titulo {
    font-size: 15px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 12px;
  }
  .sh-info-lista {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  .sh-info-lista li {
    font-size: 13px;
    color: #475569;
    padding-left: 16px;
    position: relative;
    line-height: 1.5;
  }
  .sh-info-lista li::before {
    content: '•';
    position: absolute;
    left: 0;
    color: #2e9e4f;
    font-weight: 700;
  }

  @media (max-width: 600px) {
    .sh-panel, .sh-info-panel { padding: 20px 16px; }
  }
</style>

<script>
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('sidebar-open');
  }

  // Actualizar hint de cantidad disponible al seleccionar herramienta
  document.getElementById('sHerramienta').addEventListener('change', function() {
    const opt = this.options[this.selectedIndex];
    const disp = opt?.dataset?.disponible ?? '';
    const hint = document.getElementById('cantidadHint');
    const input = document.getElementById('sCantidad');

    if (disp) {
      hint.textContent = `Máximo disponible: ${disp} unidades`;
      input.max = disp;
    } else {
      hint.textContent = '';
      input.removeAttribute('max');
    }
  });

  async function enviarSolicitud(e) {
    e.preventDefault();
    const btn = document.getElementById('btnEnviar');
    btn.disabled = true;
    btn.textContent = 'Enviando…';

    // Validar cantidad vs disponible
    const sel   = document.getElementById('sHerramienta');
    const opt   = sel.options[sel.selectedIndex];
    const disp  = parseInt(opt?.dataset?.disponible ?? 0);
    const cant  = parseInt(document.getElementById('sCantidad').value);

    if (disp > 0 && cant > disp) {
      mostrarMsg(`Solo hay ${disp} unidades disponibles de esta herramienta.`, false);
      btn.disabled = false;
      btn.textContent = '✈ Enviar Solicitud';
      return;
    }

    const fd = new FormData(e.target);
    try {
      const res  = await fetch('../../controllers/TrabajadorSolicitudHerramientaController.php', {
        method: 'POST', body: fd
      });
      const data = await res.json();
      mostrarMsg(data.msg, data.ok);

      if (data.ok) {
        e.target.reset();
        document.getElementById('cantidadHint').textContent = '';
        btn.textContent = '✈ Enviar Solicitud';
        btn.disabled    = false;
      } else {
        btn.disabled    = false;
        btn.textContent = '✈ Enviar Solicitud';
      }
    } catch {
      mostrarMsg('Error de conexión. Intenta de nuevo.', false);
      btn.disabled    = false;
      btn.textContent = '✈ Enviar Solicitud';
    }
  }

  function mostrarMsg(texto, ok) {
    const el = document.getElementById('msgGlobal');
    el.textContent   = texto;
    el.style.display = 'block';
    el.style.background = ok ? '#dcfce7' : '#fdecea';
    el.style.color      = ok ? '#166534' : '#b91c1c';
    el.style.border     = ok ? '1px solid #bbf7d0' : '1px solid #fecaca';
    if (ok) setTimeout(() => { el.style.display = 'none'; }, 5000);
  }
</script>

<?php require_once __DIR__ . '/includes/notificaciones_panel.php'; ?>

</body>
</html>
