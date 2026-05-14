<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/dashboard.php
 * PROPÓSITO: Vista principal del administrador
 * ============================================================
 */
session_start();

// Proteger la ruta: solo administradores
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php");
    exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../controllers/AdminDashboardController.php';

$database   = new Database();
$db         = $database->conectar();
$controller = new AdminDashboardController($db);
$datos      = $controller->obtenerDatos();

function tiempoRelativo($fecha) {
    if (empty($fecha)) return '';
    $diff = time() - strtotime($fecha);
    if ($diff < 60)    return 'Hace ' . $diff . ' seg';
    if ($diff < 3600)  return 'Hace ' . floor($diff / 60) . ' min';
    if ($diff < 86400) return 'Hace ' . floor($diff / 3600) . ' h';
    return 'Hace ' . floor($diff / 86400) . ' días';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AgroFinca</title>
  <link rel="stylesheet" href="styles/dashboard.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>
<body>

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
      <img src="../../img/logo.png" alt="AgroFinca" class="sidebar-logo-img" />
      <span>AgroFinca</span>
    </div>
    <nav class="sidebar-nav">
      <a href="dashboard.php"    class="nav-item active"><span class="nav-icon">⊞</span> Dashboard</a>
      <a href="mayordomos.php"   class="nav-item"><span class="nav-icon">👤</span> Mayordomos</a>
      <a href="trabajadores.php" class="nav-item"><span class="nav-icon">🔧</span> Trabajadores</a>
      <a href="lotes.php"        class="nav-item"><span class="nav-icon">🌍</span> Lotes y Producción</a>
      <a href="inventarios.php"  class="nav-item"><span class="nav-icon">📦</span> Inventarios</a>
      <a href="tarifas.php"      class="nav-item"><span class="nav-icon">$</span> Tarifas</a>
      <a href="liquidaciones.php"class="nav-item"><span class="nav-icon">📋</span> Liquidaciones</a>
      <a href="autorizaciones.php"class="nav-item"><span class="nav-icon">🔐</span> Liq. Temporales</a>
      <a href="pagos.php"        class="nav-item"><span class="nav-icon">💳</span> Pagos</a>
      <a href="reportes.php"     class="nav-item"><span class="nav-icon">📊</span> Reportes</a>
      <a href="bitacora.php"     class="nav-item"><span class="nav-icon">📖</span> Bitácora</a>
    </nav>
  </aside>

  <!-- CONTENIDO PRINCIPAL -->
  <div class="main-wrapper">

    <!-- TOPBAR -->
        <header class="topbar">
      <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Abrir menú">☰</button>
      <div class="topbar-title">Sistema de Gestión de Finca</div>
      <div class="topbar-right">
        <span class="badge-rol">Administrador</span>

        <!-- Campana de notificaciones -->
        <div class="notif-wrapper">
          <button class="notif-btn" onclick="toggleNotifPanel()" aria-label="Notificaciones">
            🔔
            <?php
              $no_leidas = count(array_filter($datos['notificaciones'], fn($n) => !$n['leida']));
              if ($no_leidas > 0):
            ?>
              <span class="notif-count"><?= $no_leidas ?></span>
            <?php endif; ?>
          </button>
        </div>

        <a href="perfil.php" class="topbar-user" title="Mi perfil">
          👤 <?= htmlspecialchars($_SESSION['username']) ?>
        </a>
        <a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>
      </div>
    </header>

    <!-- CONTENIDO -->
    <main class="content">
      <div class="page-header">
        <h1>Dashboard General</h1>
        <p>Vista ejecutiva del sistema de gestión de finca</p>
      </div>

      <!-- FILA 1 DE TARJETAS -->
      <div class="cards-grid">

        <div class="stat-card">
          <div class="stat-info">
            <span class="stat-label">Trabajadores Registrados</span>
            <span class="stat-value"><?= $datos['trabajadores_registrados'] ?></span>
          </div>
          <div class="stat-icon icon-green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-info">
            <span class="stat-label">Trabajadores Activos</span>
            <span class="stat-value"><?= $datos['trabajadores_activos'] ?></span>
          </div>
          <div class="stat-icon icon-blue">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <polyline points="16 11 18 13 22 9"/>
            </svg>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-info">
            <span class="stat-label">Solicitudes Pendientes</span>
            <span class="stat-value"><?= $datos['solicitudes_pendientes'] ?></span>
          </div>
          <div class="stat-icon icon-yellow">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
              <line x1="12" y1="9" x2="12" y2="13"/>
              <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-info">
            <span class="stat-label">Mayordomos en Labor</span>
            <span class="stat-value"><?= $datos['mayordomos_activos'] ?></span>
          </div>
          <div class="stat-icon icon-green-soft">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
              <circle cx="12" cy="7" r="4"/>
            </svg>
          </div>
        </div>

      </div><!-- /cards-grid row 1 -->

      <!-- FILA 2 DE TARJETAS -->
      <div class="cards-grid">

        <div class="stat-card">
          <div class="stat-info">
            <span class="stat-label">Lotes Registrados</span>
            <span class="stat-value"><?= $datos['lotes_registrados'] ?></span>
          </div>
          <div class="stat-icon icon-green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"/>
              <line x1="2" y1="12" x2="22" y2="12"/>
              <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
            </svg>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-info">
            <span class="stat-label">Insumos en Alerta</span>
            <span class="stat-value"><?= $datos['insumos_alerta'] ?></span>
          </div>
          <div class="stat-icon icon-red">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
            </svg>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-info">
            <span class="stat-label">Herramientas en Mantenimiento</span>
            <span class="stat-value"><?= $datos['herramientas_mantenimiento'] ?></span>
          </div>
          <div class="stat-icon icon-yellow">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
            </svg>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-info">
            <span class="stat-label">Producción Total (kg)</span>
            <span class="stat-value"><?= $datos['produccion_total'] ?></span>
          </div>
          <div class="stat-icon icon-green">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
              <polyline points="17 6 23 6 23 12"/>
            </svg>
          </div>
        </div>

      </div><!-- /cards-grid row 2 -->

      <!-- SECCIÓN INFERIOR -->
      <div class="bottom-grid">

        <!-- Panel Alertas del Sistema -->
        <div class="panel">
          <h2 class="panel-title">Alertas del Sistema</h2>
          <?php if (empty($datos['alertas'])): ?>
            <div class="alerta alerta-ok">
              <span class="alerta-icon">✓</span>
              <span>Sin alertas activas. Todo en orden.</span>
            </div>
          <?php else: ?>
            <?php foreach ($datos['alertas'] as $alerta): ?>
              <div class="alerta alerta-<?= htmlspecialchars($alerta['tipo']) ?>">
                <div class="alerta-left">
                  <span class="alerta-icon"><?= $alerta['tipo'] === 'info' ? 'ℹ' : '△' ?></span>
                  <span><?= htmlspecialchars($alerta['mensaje']) ?></span>
                </div>
                <a href="<?= htmlspecialchars($alerta['link']) ?>" class="alerta-link">Ver más</a>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <!-- Panel Notificaciones Recientes -->
        <div class="panel">
          <h2 class="panel-title">Notificaciones Recientes</h2>
          <?php if (empty($datos['notificaciones'])): ?>
            <p class="notif-empty">Sin notificaciones recientes.</p>
          <?php else: ?>
            <?php foreach ($datos['notificaciones'] as $n): ?>
              <div class="notif-row <?= $n['leida'] ? '' : 'notif-row-unread' ?>">
                <div class="notif-row-info">
                  <p class="notif-row-msg"><?= htmlspecialchars($n['mensaje']) ?></p>
                  <span class="notif-row-time"><?= tiempoRelativo($n['fecha_hora']) ?></span>
                </div>
                <?php if (!empty($n['link'])): ?>
                  <a href="<?= htmlspecialchars($n['link'], ENT_QUOTES, 'UTF-8') ?>" class="notif-row-link" onclick="marcarUnaLeida(<?= (int)($n['id_notificacion'] ?? 0) ?>)">Ver detalles</a>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

      </div><!-- /bottom-grid -->
    </main>
  </div><!-- /main-wrapper -->

  <!-- SCRIPTS DEL DASHBOARD -->
  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('sidebar-open');
    }
    document.querySelectorAll('.nav-item').forEach(function(item) {
      item.addEventListener('click', function() {
        document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>

  <!-- OVERLAY NOTIFICACIONES (dinámico) -->
  <div class="notif-overlay" id="notifOverlay">
    <div class="notif-panel" id="notifPanel" role="dialog" aria-modal="true" aria-label="Notificaciones">
      <div class="notif-panel-header">
        <div class="notif-panel-header-left">
          <h2>🔔 Notificaciones</h2>
          <p id="notifSubtitulo">Cargando...</p>
        </div>
        <div class="notif-panel-header-right">
          <button class="btn-marcar-leidas" id="btnMarcarLeidas" onclick="marcarTodasLeidas()" style="display:none;">✓ Marcar todas como leídas</button>
          <button class="btn-cerrar-notif" onclick="cerrarNotifPanel()" aria-label="Cerrar">✕</button>
        </div>
      </div>
      <div class="notif-list" id="notifList">
        <p class="notif-empty">Cargando notificaciones...</p>
      </div>
    </div>
  </div>

  <script>
  (function () {
    var NOTIF_URL = '../../controllers/NotificacionController.php';
    var iconos = { error: '⚠', warning: '△', success: '✓', info: 'ℹ' };

    function tiempoRelativo(fechaStr) {
      if (!fechaStr) return '';
      var diff = Math.floor((Date.now() - new Date(fechaStr).getTime()) / 1000);
      if (diff < 60)    return 'Hace ' + diff + ' seg';
      if (diff < 3600)  return 'Hace ' + Math.floor(diff / 60) + ' min';
      if (diff < 86400) return 'Hace ' + Math.floor(diff / 3600) + ' h';
      return 'Hace ' + Math.floor(diff / 86400) + ' días';
    }
    function escHtml(str) {
      var d = document.createElement('div');
      d.appendChild(document.createTextNode(str || ''));
      return d.innerHTML;
    }
    function renderNotificaciones(notifs, noLeidas) {
      var list = document.getElementById('notifList');
      var sub  = document.getElementById('notifSubtitulo');
      var btn  = document.getElementById('btnMarcarLeidas');
      if (!list) return;
      sub.textContent = noLeidas > 0
        ? 'Tienes ' + noLeidas + ' notificación' + (noLeidas === 1 ? '' : 'es') + ' sin leer'
        : 'Todas las notificaciones leídas';
      if (btn) btn.style.display = noLeidas > 0 ? 'inline-flex' : 'none';
      if (!notifs || notifs.length === 0) {
        list.innerHTML = '<p class="notif-empty">Sin notificaciones nuevas</p>';
        return;
      }
      list.innerHTML = notifs.map(function (n) {
        var tipo   = n.tipo || 'info';
        var icono  = iconos[tipo] || 'ℹ';
        var unread = !parseInt(n.leida) ? 'notif-unread' : '';
        var linkHtml = n.link
          ? '<a href="' + escHtml(n.link) + '" class="notif-item-link" onclick="marcarUnaLeida(' + n.id_notificacion + ')">Ver →</a>'
          : '';
        return '<div class="notif-item notif-tipo-' + tipo + ' ' + unread + '">'
          + '<div class="notif-item-icon">' + icono + '</div>'
          + '<div class="notif-item-body">'
          + '<p class="notif-msg">' + escHtml(n.mensaje) + '</p>'
          + '<span class="notif-time">' + tiempoRelativo(n.fecha_hora) + '</span>'
          + '</div>' + linkHtml + '</div>';
      }).join('');
    }
    function actualizarBadge(noLeidas) {
      var badge = document.querySelector('.notif-btn .notif-count');
      if (noLeidas > 0) {
        if (!badge) {
          badge = document.createElement('span');
          badge.className = 'notif-count';
          var btn = document.querySelector('.notif-btn');
          if (btn) btn.appendChild(badge);
        }
        badge.textContent = noLeidas;
      } else { if (badge) badge.remove(); }
    }
    function cargarNotificaciones() {
      fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (data.ok) { renderNotificaciones(data.notificaciones, data.no_leidas); actualizarBadge(data.no_leidas); }
        }).catch(function () {
          var list = document.getElementById('notifList');
          if (list) list.innerHTML = '<p class="notif-empty">Error al cargar notificaciones.</p>';
        });
    }
    window.toggleNotifPanel = function () {
      var overlay = document.getElementById('notifOverlay');
      if (!overlay) return;
      var visible = overlay.classList.toggle('notif-overlay-visible');
      if (visible) cargarNotificaciones();
    };
    window.cerrarNotifPanel = function () {
      var overlay = document.getElementById('notifOverlay');
      if (overlay) overlay.classList.remove('notif-overlay-visible');
    };
    window.marcarTodasLeidas = function () {
      var fd = new FormData();
      fd.append('accion', 'marcar_leidas');
      fetch(NOTIF_URL, { method: 'POST', body: fd, credentials: 'same-origin' })
        .then(function () { cargarNotificaciones(); });
    };
    window.marcarUnaLeida = function (id) {
      var fd = new FormData();
      fd.append('accion', 'marcar_una');
      fd.append('id_notificacion', id);
      fetch(NOTIF_URL, { method: 'POST', body: fd, credentials: 'same-origin' });
    };
    document.addEventListener('click', function (e) {
      var overlay = document.getElementById('notifOverlay');
      var panel   = document.getElementById('notifPanel');
      var btn     = document.querySelector('.notif-btn');
      if (overlay && overlay.classList.contains('notif-overlay-visible')) {
        if (panel && btn && !panel.contains(e.target) && !btn.contains(e.target)) {
          overlay.classList.remove('notif-overlay-visible');
        }
      }
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') cerrarNotifPanel();
    });
    fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
      .then(function (r) { return r.json(); })
      .then(function (data) { if (data.ok) actualizarBadge(data.no_leidas); })
      .catch(function () {});
    setInterval(function () {
      fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
        .then(function (r) { return r.json(); })
        .then(function (data) { if (data.ok) actualizarBadge(data.no_leidas); })
        .catch(function () {});
    }, 60000);
  })();
  </script>

</body>
</html>
