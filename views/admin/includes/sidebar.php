<?php
/**
 * ARCHIVO: views/admin/includes/sidebar.php
 * PROPÓSITO: Sidebar y topbar compartidos por todas las vistas del admin.
 * Se incluye al inicio de cada vista con:
 *   $modulo_activo = 'mayordomos'; // nombre del módulo actual
 *   require_once __DIR__ . '/../includes/sidebar.php';
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $titulo_pagina ?? 'AgroFinca' ?></title>
  <link rel="stylesheet" href="<?= $css_path ?? 'styles/dashboard.css' ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <?php if (!empty($css_extra)): ?>
    <link rel="stylesheet" href="<?= $css_extra ?>" />
  <?php endif; ?>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <img src="<?= $img_path ?? '../../img/logo.png' ?>" alt="AgroFinca" class="sidebar-logo-img" />
    <span>AgroFinca</span>
  </div>
  <nav class="sidebar-nav">
    <?php
    $items = [
      'dashboard'   => ['icon' => '⊞',  'label' => 'Dashboard',         'href' => 'dashboard.php'],
      'mayordomos'  => ['icon' => '👤',  'label' => 'Mayordomos',        'href' => 'mayordomos.php'],
      'trabajadores'=> ['icon' => '🔧',  'label' => 'Trabajadores',      'href' => 'trabajadores.php'],
      'lotes'       => ['icon' => '🌍',  'label' => 'Lotes y Producción','href' => 'lotes.php'],
      'inventarios' => ['icon' => '📦',  'label' => 'Inventarios',       'href' => 'inventarios.php'],
      'tarifas'     => ['icon' => '$',   'label' => 'Tarifas',           'href' => 'tarifas.php'],
      'liquidaciones'=> ['icon' => '📋', 'label' => 'Liquidaciones',     'href' => 'liquidaciones.php'],
      'autorizaciones'=> ['icon' => '🔐', 'label' => 'Liq. Temporales',  'href' => 'autorizaciones.php'],
      'pagos'       => ['icon' => '💳',  'label' => 'Pagos',             'href' => 'pagos.php'],
      'reportes'    => ['icon' => '📊',  'label' => 'Reportes',          'href' => 'reportes.php'],
      'bitacora'    => ['icon' => '📖',  'label' => 'Bitácora',          'href' => 'bitacora.php'],
    ];
    foreach ($items as $key => $item):
      $activo = ($modulo_activo ?? '') === $key ? 'active' : '';
    ?>
      <a href="<?= $item['href'] ?>" class="nav-item <?= $activo ?>">
        <span class="nav-icon"><?= $item['icon'] ?></span> <?= $item['label'] ?>
      </a>
    <?php endforeach; ?>
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
      <div class="notif-wrapper">
        <button class="notif-btn" onclick="toggleNotifPanel()" aria-label="Notificaciones">🔔</button>
      </div>
      <a href="perfil.php" class="topbar-user" title="Mi perfil">
        👤 <?= htmlspecialchars($_SESSION['username']) ?>
      </a>
      <a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>
    </div>
  </header>

  <!-- CONTENIDO DE LA PÁGINA -->
  <main class="content">

<!-- ══════════════════════════════════════════════════════════
     OVERLAY NOTIFICACIONES — disponible en todas las vistas
     Se carga dinámicamente via fetch a NotificacionController
══════════════════════════════════════════════════════════ -->
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
(function() {
  // ── Rutas relativas al controlador ──────────────────────
  // Detecta la profundidad de la vista actual para construir la ruta correcta
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

  function escAttr(str) {
    return String(str || '')
      .replace(/&/g, '&amp;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#39;')
      .replace(/</g, '&lt;');
  }

  function linkSeguro(href) {
    if (!href || typeof href !== 'string') return '';
    var h = href.trim();
    if (h.indexOf('../../views/') !== 0) return '';
    if (h.indexOf('..', 3) !== -1) return '';
    return h;
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

    list.innerHTML = notifs.map(function(n) {
      var tipo  = n.tipo || 'info';
      var icono = iconos[tipo] || 'ℹ';
      var unread = !parseInt(n.leida, 10) ? 'notif-unread' : '';
      var href = linkSeguro(n.link);
      var linkHtml = href
        ? '<a href="' + escAttr(href) + '" class="notif-item-link" onclick="marcarUnaLeida(' + parseInt(n.id_notificacion, 10) + ')">Ver →</a>'
        : '';
      return '<div class="notif-item notif-tipo-' + escAttr(tipo) + ' ' + unread + '" data-id="' + parseInt(n.id_notificacion, 10) + '">'
        + '<div class="notif-item-icon">' + icono + '</div>'
        + '<div class="notif-item-body">'
        + '<p class="notif-msg">' + escHtml(n.mensaje) + '</p>'
        + '<span class="notif-time">' + tiempoRelativo(n.fecha_hora) + '</span>'
        + '</div>'
        + linkHtml
        + '</div>';
    }).join('');
  }

  function actualizarBadge(noLeidas) {
    var badge = document.querySelector('.notif-btn .notif-count');
    if (noLeidas > 0) {
      if (!badge) {
        badge = document.createElement('span');
        badge.className = 'notif-count';
        document.querySelector('.notif-btn').appendChild(badge);
      }
      badge.textContent = noLeidas;
    } else {
      if (badge) badge.remove();
    }
  }

  function cargarNotificaciones() {
    fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
      .then(function(r) { return r.json(); })
      .then(function(data) {
        if (data.ok) {
          renderNotificaciones(data.notificaciones, data.no_leidas);
          actualizarBadge(data.no_leidas);
        }
      })
      .catch(function() {
        var list = document.getElementById('notifList');
        if (list) list.innerHTML = '<p class="notif-empty">Error al cargar notificaciones.</p>';
      });
  }

  window.toggleNotifPanel = function() {
    var overlay = document.getElementById('notifOverlay');
    if (!overlay) return;
    var visible = overlay.classList.toggle('notif-overlay-visible');
    if (visible) cargarNotificaciones();
  };

  window.cerrarNotifPanel = function() {
    var overlay = document.getElementById('notifOverlay');
    if (overlay) overlay.classList.remove('notif-overlay-visible');
  };

  window.marcarTodasLeidas = function() {
    var fd = new FormData();
    fd.append('accion', 'marcar_leidas');
    fetch(NOTIF_URL, { method: 'POST', body: fd, credentials: 'same-origin' })
      .then(function() { cargarNotificaciones(); });
  };

  window.marcarUnaLeida = function(id) {
    var fd = new FormData();
    fd.append('accion', 'marcar_una');
    fd.append('id_notificacion', id);
    fetch(NOTIF_URL, { method: 'POST', body: fd, credentials: 'same-origin' });
  };

  // Cerrar al hacer clic fuera del panel
  document.addEventListener('click', function(e) {
    var overlay = document.getElementById('notifOverlay');
    var panel   = document.getElementById('notifPanel');
    var btn     = document.querySelector('.notif-btn');
    if (overlay && overlay.classList.contains('notif-overlay-visible')) {
      if (panel && btn && !panel.contains(e.target) && !btn.contains(e.target)) {
        overlay.classList.remove('notif-overlay-visible');
      }
    }
  });

  // Cerrar con Escape
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') cerrarNotifPanel();
  });

  // Cargar badge al iniciar la página
  fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
    .then(function(r) { return r.json(); })
    .then(function(data) {
      if (data.ok) actualizarBadge(data.no_leidas);
    })
    .catch(function() {});

  // Refrescar badge cada 60 segundos
  setInterval(function() {
    fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
      .then(function(r) { return r.json(); })
      .then(function(data) {
        if (data.ok) actualizarBadge(data.no_leidas);
      })
      .catch(function() {});
  }, 60000);

})();
</script>
