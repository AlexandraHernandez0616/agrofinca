<!-- ══════════════════════════════════════════════════════════
     INCLUDE: views/trabajador/includes/notificaciones_panel.php
     PROPÓSITO: Overlay de notificaciones + JS dinámico.
     Incluir al final del <body> en todas las vistas del trabajador.
══════════════════════════════════════════════════════════ -->

<!-- OVERLAY NOTIFICACIONES -->
<div class="notif-overlay" id="notifOverlay">
  <div class="notif-panel" id="notifPanel" role="dialog" aria-modal="true" aria-label="Notificaciones">
    <div class="notif-panel-header">
      <div class="notif-panel-header-left">
        <h2>🔔 Notificaciones</h2>
        <p id="notifSubtitulo">Cargando...</p>
      </div>
      <div class="notif-panel-header-right">
        <button class="btn-marcar-leidas" id="btnMarcarLeidas" onclick="marcarTodasLeidas()" style="display:none;">
          ✓ Marcar todas como leídas
        </button>
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
        var btn = document.querySelector('.notif-btn');
        if (btn) btn.appendChild(badge);
      }
      badge.textContent = noLeidas;
    } else {
      if (badge) badge.remove();
    }
  }

  function cargarNotificaciones() {
    fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (data.ok) {
          renderNotificaciones(data.notificaciones, data.no_leidas);
          actualizarBadge(data.no_leidas);
        }
      })
      .catch(function () {
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

  /* Cerrar al hacer clic fuera del panel */
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

  /* Cerrar con Escape */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') cerrarNotifPanel();
  });

  /* Cargar badge al iniciar la página */
  fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
    .then(function (r) { return r.json(); })
    .then(function (data) { if (data.ok) actualizarBadge(data.no_leidas); })
    .catch(function () {});

  /* Refrescar badge cada 60 segundos */
  setInterval(function () {
    fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
      .then(function (r) { return r.json(); })
      .then(function (data) { if (data.ok) actualizarBadge(data.no_leidas); })
      .catch(function () {});
  }, 60000);
})();
</script>
