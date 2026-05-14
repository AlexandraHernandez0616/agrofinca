<?php
/**
 * ============================================================
 * ARCHIVO: views/mayordomo/dashboard.php
 * PROPÓSITO: Dashboard operativo del mayordomo
 * ============================================================
 *
 * Protección de ruta:
 *   Solo usuarios con rol = 'MAYORDOMO' pueden acceder.
 *   Si no hay sesión o el rol es diferente → redirige al login.
 *
 * Datos que carga (via MayordomoDashboardController):
 *   Fila 1: Trabajadores Activos | Trabajadores en Labor | Asistencia Marcada Hoy
 *   Fila 2: Solicitudes Pendientes | Tareas Pendientes | Tareas en Progreso
 *   Fila 3: Préstamos Pendientes | Producción del Día (kg)
 *   Panel izquierdo: Notificaciones Recientes
 *   Panel derecho:   Accesos Rápidos (4 botones)
 *
 * Accesos rápidos conectados:
 *   Asignar Tarea    → tareas.php
 *   Aprobar Préstamo → prestamos.php
 *   Ver Solicitudes  → solicitudes.php
 *   Registrar Producción → produccion.php
 *
 * Estilos: views/mayordomo/styles/dashboard.css
 * Fuente:  Inter (Google Fonts)
 * ============================================================
 */
session_start();

// ── Protección de ruta ────────────────────────────────────
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
    header("Location: ../../views/usuarios/login.php");
    exit;
}

// ── Dependencias ──────────────────────────────────────────
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../controllers/MayordomoDashboardController.php';

// ── Conexión y datos ──────────────────────────────────────
$db         = (new Database())->conectar();
$controller = new MayordomoDashboardController($db, $_SESSION['id_usuario']);
$datos      = $controller->obtenerDatos();

// ── Helper tiempo relativo ────────────────────────────────
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
  <title>Dashboard Mayordomo - AgroFinca</title>
  <link rel="stylesheet" href="styles/dashboard.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>
<body>

<!-- ══════════════════════════════════════════════════════════
     SIDEBAR
     Menú de navegación del mayordomo con 8 módulos.
     El ítem activo se marca con la clase CSS 'active'.
══════════════════════════════════════════════════════════ -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <img src="../../img/logo.png" alt="AgroFinca" class="sidebar-logo-img" />
    <span>AgroFinca</span>
  </div>
  <nav class="sidebar-nav">
    <!-- Dashboard → esta misma página -->
    <a href="dashboard.php" class="nav-item active">
      <span class="nav-icon">⊞</span> Dashboard
    </a>
    <!-- Solicitudes → aprobación de nuevos trabajadores -->
    <a href="solicitudes.php" class="nav-item">
      <span class="nav-icon">📋</span> Solicitudes
    </a>
    <!-- Trabajadores → listado de trabajadores asignados -->
    <a href="trabajadores.php" class="nav-item">
      <span class="nav-icon">👷</span> Trabajadores
    </a>
    <!-- Cultivos → gestión de cultivos de la finca -->
    <a href="cultivos.php" class="nav-item">
      <span class="nav-icon">🌿</span> Cultivos
    </a>
    <!-- Lotes → lotes de la finca -->
    <a href="lotes.php" class="nav-item">
      <span class="nav-icon">🌍</span> Lotes
    </a>
    <!-- Tareas → asignación y seguimiento de tareas -->
    <a href="tareas.php" class="nav-item">
      <span class="nav-icon">✅</span> Tareas
    </a>
    <!-- Inventarios → herramientas e insumos -->
    <a href="inventarios.php" class="nav-item">
      <span class="nav-icon">📦</span> Inventarios
    </a>
    <!-- Préstamos → gestión de préstamos de herramientas -->
    <a href="prestamos.php" class="nav-item">
      <span class="nav-icon">🔑</span> Préstamos
    </a>
    <!-- Producción → registro de producción diaria -->
    <a href="produccion.php" class="nav-item">
      <span class="nav-icon">📈</span> Producción
    </a>
    <!-- Reportes → reportes operativos -->
    <a href="reportes.php" class="nav-item">
      <span class="nav-icon">📊</span> Reportes
    </a>
  </nav>
</aside>

<!-- ══════════════════════════════════════════════════════════
     CONTENIDO PRINCIPAL
══════════════════════════════════════════════════════════ -->
<div class="main-wrapper">

  <!-- TOPBAR
       Muestra: título del sistema | badge rol | campana | nombre | cerrar sesión -->
  <header class="topbar">
    <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Abrir menú">☰</button>
    <div class="topbar-title">Sistema de Gestión de Finca</div>
    <div class="topbar-right">

      <!-- Badge de rol -->
      <span class="badge-rol">Mayordomo</span>

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

      <!-- Nombre del mayordomo logueado (viene de $_SESSION) -->
      <span class="topbar-user">👤 <?= htmlspecialchars($_SESSION['username']) ?></span>

      <!-- Cerrar sesión → LogoutController destruye la sesión -->
      <a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>
    </div>
  </header>

  <!-- CONTENIDO -->
  <main class="content">

    <!-- Encabezado de la página -->
    <div class="page-header">
      <h1>Dashboard Operativo</h1>
      <p>Vista consolidada de las operaciones diarias</p>
    </div>

    <!-- ══════════════════════════════════════════════════════
         FILA 1 DE TARJETAS
         Trabajadores Activos | En Labor | Asistencia Hoy
         Datos: tabla trabajador + tabla asistencia
    ══════════════════════════════════════════════════════ -->
    <div class="cards-grid">

      <!-- Trabajadores Activos: COUNT WHERE estado = 'ACTIVO' -->
      <div class="stat-card">
        <div class="stat-info">
          <span class="stat-label">Trabajadores Activos</span>
          <span class="stat-value"><?= $datos['trabajadores_activos'] ?></span>
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

      <!-- Trabajadores en Labor: COUNT WHERE estado = 'En labor' -->
      <div class="stat-card">
        <div class="stat-info">
          <span class="stat-label">Trabajadores en Labor</span>
          <span class="stat-value"><?= $datos['trabajadores_en_labor'] ?></span>
        </div>
        <div class="stat-icon icon-blue">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <polyline points="16 11 18 13 22 9"/>
          </svg>
        </div>
      </div>

      <!-- Asistencia Hoy: COUNT en tabla asistencia WHERE fecha = HOY -->
      <div class="stat-card">
        <div class="stat-info">
          <span class="stat-label">Asistencia Marcada Hoy</span>
          <span class="stat-value"><?= $datos['asistencia_hoy'] ?></span>
        </div>
        <div class="stat-icon icon-green-soft">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
            <line x1="16" y1="2" x2="16" y2="6"/>
            <line x1="8"  y1="2" x2="8"  y2="6"/>
            <line x1="3"  y1="10" x2="21" y2="10"/>
            <polyline points="9 16 11 18 15 14"/>
          </svg>
        </div>
      </div>

    </div>

    <!-- ══════════════════════════════════════════════════════
         FILA 2 DE TARJETAS
         Solicitudes Pendientes | Tareas Pendientes | Tareas en Progreso
         Datos: tabla solicitud_registro + tabla tarea (filtrado por mayordomo)
    ══════════════════════════════════════════════════════ -->
    <div class="cards-grid">

      <!-- Solicitudes Pendientes: solicitud_registro WHERE estado = 'PENDIENTE' -->
      <div class="stat-card">
        <div class="stat-info">
          <span class="stat-label">Solicitudes Pendientes</span>
          <span class="stat-value"><?= $datos['solicitudes_pendientes'] ?></span>
        </div>
        <div class="stat-icon icon-yellow">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
            <line x1="12" y1="9"  x2="12" y2="13"/>
            <line x1="12" y1="17" x2="12.01" y2="17"/>
          </svg>
        </div>
      </div>

      <!-- Tareas Pendientes: tarea WHERE id_mayordomo = ID AND estado = 'PENDIENTE' -->
      <div class="stat-card">
        <div class="stat-info">
          <span class="stat-label">Tareas Pendientes</span>
          <span class="stat-value"><?= $datos['tareas_pendientes'] ?></span>
        </div>
        <div class="stat-icon icon-yellow">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
            <line x1="16" y1="13" x2="8" y2="13"/>
            <line x1="16" y1="17" x2="8" y2="17"/>
            <polyline points="10 9 9 9 8 9"/>
          </svg>
        </div>
      </div>

      <!-- Tareas en Progreso: tarea WHERE id_mayordomo = ID AND estado = 'EN_PROGRESO' -->
      <div class="stat-card">
        <div class="stat-info">
          <span class="stat-label">Tareas en Progreso</span>
          <span class="stat-value"><?= $datos['tareas_en_progreso'] ?></span>
        </div>
        <div class="stat-icon icon-blue">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
            <line x1="16" y1="13" x2="8" y2="13"/>
            <line x1="16" y1="17" x2="8" y2="17"/>
          </svg>
        </div>
      </div>

    </div>

    <!-- ══════════════════════════════════════════════════════
         FILA 3 DE TARJETAS (2 tarjetas)
         Préstamos Pendientes | Producción del Día
         Datos: tabla prestamo + tabla produccion (filtrado por mayordomo)
    ══════════════════════════════════════════════════════ -->
    <div class="cards-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 680px;">

      <!-- Préstamos Pendientes: prestamo WHERE id_mayordomo = ID AND estado = 'PENDIENTE' -->
      <div class="stat-card">
        <div class="stat-info">
          <span class="stat-label">Préstamos Pendientes</span>
          <span class="stat-value"><?= $datos['prestamos_pendientes'] ?></span>
        </div>
        <div class="stat-icon icon-purple">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/>
          </svg>
        </div>
      </div>

      <!-- Producción del Día: SUM produccion WHERE fecha = HOY y tareas del mayordomo -->
      <div class="stat-card">
        <div class="stat-info">
          <span class="stat-label">Producción del Día (kg)</span>
          <span class="stat-value"><?= $datos['produccion_hoy'] ?></span>
        </div>
        <div class="stat-icon icon-green">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
            <polyline points="17 6 23 6 23 12"/>
          </svg>
        </div>
      </div>

    </div>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN INFERIOR
         Izquierda: Notificaciones Recientes (tabla notificacion_operativa)
         Derecha:   Accesos Rápidos (4 botones de navegación)
    ══════════════════════════════════════════════════════ -->
    <div class="bottom-grid">

      <!-- Panel Notificaciones Recientes -->
      <div class="panel">
        <h2 class="panel-title">Notificaciones Recientes</h2>
        <?php if (empty($datos['notificaciones'])): ?>
          <p class="notif-empty">Sin notificaciones recientes.</p>
        <?php else: ?>
          <?php foreach ($datos['notificaciones'] as $n): ?>
            <div class="notif-row <?= !$n['leida'] ? 'notif-row-unread' : '' ?>">
              <div class="notif-row-info">
                <p class="notif-row-msg"><?= htmlspecialchars($n['mensaje']) ?></p>
                <span class="notif-row-time"><?= tiempoRelativo($n['fecha_hora']) ?></span>
              </div>
              <?php if (!empty($n['link'])): ?>
                <a href="<?= htmlspecialchars($n['link'], ENT_QUOTES, 'UTF-8') ?>" class="notif-row-link" onclick="marcarUnaLeida(<?= (int)($n['id_notificacion'] ?? 0) ?>)">Ver →</a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Panel Accesos Rápidos
           4 botones que llevan directamente a los módulos más usados -->
      <div class="panel">
        <h2 class="panel-title">Accesos Rápidos</h2>
        <div class="accesos-grid">

          <!-- Asignar Tarea → tareas.php -->
          <a href="tareas.php" class="acceso-btn">
            <div class="acceso-icon acceso-verde">📋</div>
            <span>Asignar Tarea</span>
          </a>

          <!-- Aprobar Préstamo → prestamos.php -->
          <a href="prestamos.php" class="acceso-btn">
            <div class="acceso-icon acceso-azul">🔑</div>
            <span>Aprobar Préstamo</span>
          </a>

          <!-- Ver Solicitudes → solicitudes.php -->
          <a href="solicitudes.php" class="acceso-btn">
            <div class="acceso-icon acceso-amarillo">👤</div>
            <span>Ver Solicitudes</span>
          </a>

          <!-- Registrar Producción → produccion.php -->
          <a href="produccion.php" class="acceso-btn">
            <div class="acceso-icon acceso-purple">📈</div>
            <span>Registrar Producción</span>
          </a>

        </div>
      </div>

    </div>
  </main>
</div>

<script>
  // Abre/cierra el sidebar en pantallas móviles
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
