<?php
/**
 * ============================================================
 * ARCHIVO: views/trabajador/dashboard.php
 * PROPÓSITO: Dashboard personal del trabajador
 * ============================================================
 *
 * Protección de ruta:
 *   Solo usuarios con rol = 'TRABAJADOR' pueden acceder.
 *   Si no hay sesión o el rol es diferente → redirige al login.
 *
 * Datos que carga (via TrabajadorDashboardController):
 *   trabajador          → nombre, apellidos, estado, asistencia hoy
 *   tareas_pendientes   → COUNT tareas con estado PENDIENTE
 *   tareas_en_proceso   → COUNT tareas con estado EN_PROGRESO
 *   herramientas_prestadas → COUNT herramientas activas prestadas
 *   tareas_recientes    → últimas 5 tareas asignadas
 *   notificaciones      → últimas 5 notificaciones
 *
 * Hero Banner (lógica de dos estados):
 *   Estado Inactivo → muestra botón "Marcarme como Activo"
 *                     → POST a TrabajadorAsistenciaController (accion=marcar_entrada)
 *                     → registra hora_entrada en asistencia + estado='ACTIVO'
 *
 *   Estado Activo   → muestra botón "Registrar Salida"
 *                     → POST a TrabajadorAsistenciaController (accion=marcar_salida)
 *                     → registra hora_salida en asistencia + estado='Inactivo'
 *
 * Sidebar — 4 módulos del trabajador:
 *   Dashboard     → dashboard.php (esta página)
 *   Mis Tareas    → mis_tareas.php
 *   Mis Préstamos → mis_prestamos.php
 *   Solicitar Herramienta → solicitar_herramienta.php
 *
 * Estilos: views/trabajador/styles/dashboard.css
 * Fuente:  Inter (Google Fonts)
 * ============================================================
 */
session_start();

// ── Protección de ruta ────────────────────────────────────
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
    header("Location: ../../views/usuarios/login.php");
    exit;
}

// ── Dependencias ──────────────────────────────────────────
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../controllers/TrabajadorDashboardController.php';

// ── Conexión y datos ──────────────────────────────────────
$db         = (new Database())->conectar();
$controller = new TrabajadorDashboardController($db, $_SESSION['id_usuario']);
$datos      = $controller->obtenerDatos();

// Datos del trabajador para el hero banner
$trabajador = $datos['trabajador'];
$nombre_completo = htmlspecialchars(
    ($trabajador['nombres'] ?? '') . ' ' . ($trabajador['apellidos'] ?? '')
);
$estado_actual = $trabajador['estado_trabajador'] ?? 'Inactivo';

// Determinar estado de asistencia del día para controlar el botón
$hora_entrada = $trabajador['hora_entrada'] ?? null;
$hora_salida  = $trabajador['hora_salida']  ?? null;

// 3 estados posibles del botón:
//   'sin_entrada'    → no ha marcado entrada hoy
//   'con_entrada'    → marcó entrada pero no salida
//   'jornada_completa' → marcó entrada y salida
if ($hora_entrada && $hora_salida) {
    $estado_boton = 'jornada_completa';
} elseif ($hora_entrada && !$hora_salida) {
    $estado_boton = 'con_entrada';
} else {
    $estado_boton = 'sin_entrada';
}

$esta_activo = ($estado_boton === 'con_entrada');

// Helper tiempo relativo para notificaciones
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
  <title>Mi Dashboard - AgroFinca</title>
  <link rel="stylesheet" href="styles/dashboard.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>
<body>

<!-- ══════════════════════════════════════════════════════════
     SIDEBAR
     Menú lateral del trabajador con 4 módulos.
     Más simple que el del admin/mayordomo porque el trabajador
     solo accede a sus propias tareas, préstamos y solicitudes.
══════════════════════════════════════════════════════════ -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <img src="../../img/logo.png" alt="AgroFinca" class="sidebar-logo-img" />
    <span>AgroFinca</span>
  </div>
  <nav class="sidebar-nav">

    <!-- Dashboard → esta misma página (resumen personal) -->
    <a href="dashboard.php" class="nav-item active">
      <span class="nav-icon">⊞</span> Dashboard
    </a>

    <!-- Mis Tareas → lista de tareas asignadas al trabajador -->
    <a href="mis_tareas.php" class="nav-item">
      <span class="nav-icon">📋</span> Mis Tareas
    </a>

    <!-- Mis Préstamos → herramientas prestadas al trabajador -->
    <a href="mis_prestamos.php" class="nav-item">
      <span class="nav-icon">🔑</span> Mis Préstamos
    </a>

    <!-- Solicitar Herramienta → formulario para pedir herramienta al mayordomo -->
    <a href="solicitar_herramienta.php" class="nav-item">
      <span class="nav-icon">+</span> Solicitar Herramienta
    </a>

  </nav>
</aside>

<!-- ══════════════════════════════════════════════════════════
     CONTENIDO PRINCIPAL
══════════════════════════════════════════════════════════ -->
<div class="main-wrapper">

  <!-- TOPBAR
       Muestra: título | badge Trabajador | campana | nombre | cerrar sesión -->
  <header class="topbar">
    <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Abrir menú">☰</button>
    <div class="topbar-title">Sistema de Gestión de Finca</div>
    <div class="topbar-right">

      <!-- Badge de rol -->
      <span class="badge-rol">Trabajador</span>

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

      <!-- Nombre del trabajador logueado -->
      <a href="perfil.php" class="topbar-user" title="Mi perfil">
        👤 <?= htmlspecialchars($_SESSION['username']) ?>
      </a>

      <!-- Cerrar sesión → LogoutController destruye la sesión -->
      <a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>
    </div>
  </header>

  <!-- CONTENIDO -->
  <main class="content">

    <!-- ══════════════════════════════════════════════════════
         HERO BANNER — Bienvenida + Estado + Botón asistencia
         ──────────────────────────────────────────────────────
         Tiene DOS estados visuales según estado_trabajador:
         1. Inactivo → botón verde "Marcarme como Activo"
            → llama TrabajadorAsistenciaController (marcar_entrada)
            → registra hora_entrada + cambia estado a ACTIVO
         2. Activo   → botón rojo "Registrar Salida"
            → llama TrabajadorAsistenciaController (marcar_salida)
            → registra hora_salida + cambia estado a Inactivo
    ══════════════════════════════════════════════════════ -->
    <div class="hero-banner">
      <h1 class="hero-nombre">Bienvenido, <?= $nombre_completo ?></h1>
      <p class="hero-rol">Trabajador</p>

      <div class="hero-estado">
        <span class="hero-estado-label">Estado Actual:</span>

        <!-- Badge de estado actual -->
        <span class="badge-estado <?= $esta_activo ? 'badge-estado-activo' : 'badge-estado-inactivo' ?>">
          <?= $esta_activo ? 'Activo' : 'Inactivo' ?>
        </span>

        <?php if ($estado_boton === 'sin_entrada'): ?>
          <!-- Sin entrada hoy: botón para marcar entrada -->
          <button class="btn-hero btn-hero-activo" id="btnAsistencia" onclick="marcarEntrada()">
            ✓ Registrar Entrada
          </button>

        <?php elseif ($estado_boton === 'con_entrada'): ?>
          <!-- Con entrada, sin salida: mostrar hora de entrada + botón salida -->
          <span class="hero-hora-entrada">
            Entrada: <?= substr($hora_entrada, 0, 5) ?>
          </span>
          <button class="btn-hero btn-hero-salida" id="btnAsistencia" onclick="marcarSalida()">
            ↪ Registrar Salida
          </button>

        <?php else: ?>
          <!-- Jornada completa: mostrar ambas horas -->
          <span class="hero-jornada-completa">
            ✓ Jornada completada — Entrada: <?= substr($hora_entrada, 0, 5) ?> · Salida: <?= substr($hora_salida, 0, 5) ?>
          </span>

        <?php endif; ?>

        <!-- Mensaje de respuesta (aparece tras la acción) -->
        <span class="msg-asistencia" id="msgAsistencia"></span>
      </div>
    </div>

    <!-- ══════════════════════════════════════════════════════
         TARJETAS DE ESTADÍSTICAS (3 tarjetas)
         Tareas Pendientes | Tareas en Proceso | Herramientas Prestadas
         Datos: tabla tarea_trabajador + tarea + prestamo
    ══════════════════════════════════════════════════════ -->
    <div class="cards-grid">

      <!-- Tareas Pendientes: COUNT tarea_trabajador WHERE estado = 'PENDIENTE' -->
      <div class="stat-card">
        <span class="stat-icon-top">📋</span>
        <p class="stat-card-titulo">Tareas Pendientes</p>
        <p class="stat-card-valor"><?= $datos['tareas_pendientes'] ?></p>
        <p class="stat-card-desc">Tienes tareas asignadas por completar</p>
      </div>

      <!-- Tareas en Proceso: COUNT tarea_trabajador WHERE estado = 'EN_PROGRESO' -->
      <div class="stat-card">
        <span class="stat-icon-top">📝</span>
        <p class="stat-card-titulo">Tareas en Proceso</p>
        <p class="stat-card-valor"><?= $datos['tareas_en_proceso'] ?></p>
        <p class="stat-card-desc">Tareas que estás realizando actualmente</p>
      </div>

      <!-- Herramientas Prestadas: SUM herramientas activas en préstamos -->
      <div class="stat-card">
        <span class="stat-icon-top">🔧</span>
        <p class="stat-card-titulo">Herramientas Prestadas</p>
        <p class="stat-card-valor"><?= $datos['herramientas_prestadas'] ?></p>
        <p class="stat-card-desc">Herramientas que tienes asignadas</p>
      </div>

    </div>

    <!-- ══════════════════════════════════════════════════════
         PANEL TAREAS RECIENTES
         Muestra las últimas 5 tareas asignadas al trabajador.
         Ordenadas por fecha_fin_estimada ASC (más urgentes primero).
         Cada fila muestra: nombre, lote, fecha vence y badge de estado.
    ══════════════════════════════════════════════════════ -->
    <div class="panel">
      <h2 class="panel-title">Tareas Recientes</h2>

      <?php if (empty($datos['tareas_recientes'])): ?>
        <p class="tareas-vacia">No tienes tareas asignadas actualmente</p>
      <?php else: ?>
        <?php foreach ($datos['tareas_recientes'] as $t): ?>
          <?php
            // Determinar clase del badge según estado de la tarea
            $badgeClass = match($t['estado_tarea']) {
              'PENDIENTE'   => 'badge-pendiente',
              'EN_PROGRESO' => 'badge-en-proceso',
              'COMPLETADA'  => 'badge-completada',
              default       => 'badge-pendiente',
            };
            // Etiqueta legible del estado
            $badgeLabel = match($t['estado_tarea']) {
              'PENDIENTE'   => 'Pendiente',
              'EN_PROGRESO' => 'En proceso',
              'COMPLETADA'  => 'Completada',
              default       => $t['estado_tarea'],
            };
          ?>
          <div class="tarea-row">
            <div class="tarea-info">
              <!-- Nombre de la tarea -->
              <p class="tarea-nombre"><?= htmlspecialchars($t['nombre']) ?></p>
              <!-- Lote y fecha de vencimiento -->
              <p class="tarea-meta">
                <?= htmlspecialchars($t['lote_nombre'] ?? 'Sin lote') ?>
                <?php if ($t['fecha_fin_estimada']): ?>
                  • Vence: <?= htmlspecialchars($t['fecha_fin_estimada']) ?>
                <?php endif; ?>
              </p>
            </div>
            <!-- Badge de estado de la tarea -->
            <span class="badge-tarea <?= $badgeClass ?>"><?= $badgeLabel ?></span>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

  </main>
</div>

<!-- MODAL CERRAR SESIÓN -->
<div id="logoutOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:9999;align-items:center;justify-content:center;">
  <div style="background:#fff;border-radius:16px;padding:32px 36px;max-width:380px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.25);text-align:center;">
    <p style="font-size:18px;font-weight:700;color:#111827;margin:0 0 24px;">¿Deseas cerrar sesión?</p>
    <div style="display:flex;gap:12px;justify-content:center;">
      <button onclick="cerrarLogoutModal()"
              style="background:#f3f4f6;color:#374151;border:none;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:600;cursor:pointer;">
        Cancelar
      </button>
      <a href="../../controllers/LogoutController.php"
         style="background:#e53935;color:#fff;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;">
        Confirmar
      </a>
    </div>
  </div>
</div>

<script>
  // ── Sidebar y notificaciones ──────────────────────────────
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('sidebar-open');
  }

  // ── Modal cerrar sesión ───────────────────────────────────
  function abrirLogoutModal() {
    document.getElementById('logoutOverlay').style.display = 'flex';
  }
  function cerrarLogoutModal() {
    document.getElementById('logoutOverlay').style.display = 'none';
  }
  document.querySelectorAll('.btn-logout').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      abrirLogoutModal();
    });
  });
  document.getElementById('logoutOverlay').addEventListener('click', function(e) {
    if (e.target === this) cerrarLogoutModal();
  });

  // ── Marcar Entrada ────────────────────────────────────────
  async function marcarEntrada() {
    const btn = document.getElementById('btnAsistencia');
    const msg = document.getElementById('msgAsistencia');
    if (btn) { btn.disabled = true; btn.textContent = 'Registrando…'; }

    const fd = new FormData();
    fd.append('accion', 'marcar_entrada');

    const res  = await fetch('../../controllers/TrabajadorAsistenciaController.php', {
      method: 'POST', body: fd
    });
    const data = await res.json();

    msg.textContent = data.msg;
    msg.className   = 'msg-asistencia ' + (data.ok ? 'msg-ok' : 'msg-error');

    if (data.ok) setTimeout(() => location.reload(), 1200);
    else if (btn) { btn.disabled = false; btn.textContent = '✓ Registrar Entrada'; }
  }

  // ── Registrar Salida ──────────────────────────────────────
  async function marcarSalida() {
    const btn = document.getElementById('btnAsistencia');
    const msg = document.getElementById('msgAsistencia');
    if (btn) { btn.disabled = true; btn.textContent = 'Registrando…'; }

    const fd = new FormData();
    fd.append('accion', 'marcar_salida');

    const res  = await fetch('../../controllers/TrabajadorAsistenciaController.php', {
      method: 'POST', body: fd
    });
    const data = await res.json();

    msg.textContent = data.msg;
    msg.className   = 'msg-asistencia ' + (data.ok ? 'msg-ok' : 'msg-error');

    if (data.ok) setTimeout(() => location.reload(), 1200);
    else if (btn) { btn.disabled = false; btn.textContent = '↪ Registrar Salida'; }
  }
</script>

<?php require_once __DIR__ . '/includes/notificaciones_panel.php'; ?>

</body>
</html>
