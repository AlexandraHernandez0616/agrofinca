<?php
/**
 * ARCHIVO: views/trabajador/mis_tareas.php
 * PROPÓSITO: Módulo Mis Tareas (vista trabajador)
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/TrabajadorTarea.php';

$db           = (new Database())->conectar();
$model        = new TrabajadorTarea($db);
$id_trabajador= (int) $_SESSION['id_usuario'];

$filtro  = trim($_GET['estado'] ?? '');
$resumen = $model->resumen($id_trabajador);
$tareas  = $model->listar($id_trabajador, $filtro);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mis Tareas - AgroFinca</title>
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
    <a href="dashboard.php"          class="nav-item"><span class="nav-icon">⊞</span> Dashboard</a>
    <a href="mis_tareas.php"         class="nav-item active"><span class="nav-icon">📋</span> Mis Tareas</a>
    <a href="mis_prestamos.php"      class="nav-item"><span class="nav-icon">🔑</span> Mis Préstamos</a>
    <a href="solicitar_herramienta.php" class="nav-item"><span class="nav-icon">+</span> Solicitar Herramienta</a>
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
        <button class="notif-btn" onclick="toggleNotifPanel()" aria-label="Notificaciones">🔔</button>
      </div>
      <a href="perfil.php" class="topbar-user" title="Mi perfil">
        👤 <?= htmlspecialchars($_SESSION['username']) ?>
      </a>
      <a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>
    </div>
  </header>

  <main class="content">

    <!-- CABECERA -->
    <div class="mt-header">
      <div>
        <h1 class="mt-titulo">Mis Tareas</h1>
        <p class="mt-subtitulo">Consulta y completa tus tareas asignadas</p>
      </div>
    </div>

    <!-- TARJETAS RESUMEN -->
    <div class="mt-resumen">
      <a href="mis_tareas.php" class="mt-stat <?= $filtro===''?'mt-stat-activo':'' ?>">
        <span class="mt-stat-num"><?= $resumen['total'] ?></span>
        <span class="mt-stat-lbl">Todas</span>
      </a>
      <a href="mis_tareas.php?estado=PENDIENTE" class="mt-stat <?= $filtro==='PENDIENTE'?'mt-stat-activo':'' ?>">
        <span class="mt-stat-num mt-num-pendiente"><?= $resumen['pendientes'] ?></span>
        <span class="mt-stat-lbl">Pendientes</span>
      </a>
      <a href="mis_tareas.php?estado=EN_PROGRESO" class="mt-stat <?= $filtro==='EN_PROGRESO'?'mt-stat-activo':'' ?>">
        <span class="mt-stat-num mt-num-proceso"><?= $resumen['en_proceso'] ?></span>
        <span class="mt-stat-lbl">En proceso</span>
      </a>
      <a href="mis_tareas.php?estado=COMPLETADA" class="mt-stat <?= $filtro==='COMPLETADA'?'mt-stat-activo':'' ?>">
        <span class="mt-stat-num mt-num-completada"><?= $resumen['completadas'] ?></span>
        <span class="mt-stat-lbl">Completadas</span>
      </a>
    </div>

    <!-- MENSAJE FEEDBACK -->
    <div id="msgGlobal" style="display:none;padding:10px 16px;border-radius:8px;margin-bottom:16px;font-size:14px;font-weight:500;"></div>

    <!-- LISTA DE TAREAS -->
    <?php if (empty($tareas)): ?>
      <div class="mt-vacia">
        <span style="font-size:40px;">📋</span>
        <p>No tienes tareas <?= $filtro ? 'con ese estado' : 'asignadas' ?> actualmente.</p>
      </div>
    <?php else: ?>
      <?php foreach ($tareas as $t):
        [$clsBadge, $lblBadge] = match($t['estado_tarea']) {
          'PENDIENTE'   => ['mt-badge-pendiente', 'Pendiente'],
          'EN_PROGRESO' => ['mt-badge-proceso',   'En proceso'],
          'COMPLETADA'  => ['mt-badge-completada','Completada'],
          default       => ['', htmlspecialchars($t['estado_tarea'])],
        };
        $completada = ($t['estado_tarea'] === 'COMPLETADA');
      ?>
      <div class="mt-card <?= $completada ? 'mt-card-completada' : '' ?>">

        <!-- Cabecera de la tarjeta -->
        <div class="mt-card-header">
          <div class="mt-card-info">
            <h2 class="mt-card-nombre"><?= htmlspecialchars($t['nombre']) ?></h2>
            <p class="mt-card-lote"><?= htmlspecialchars($t['lote']) ?></p>
            <?php if ($t['descripcion']): ?>
              <p class="mt-card-desc"><?= htmlspecialchars($t['descripcion']) ?></p>
            <?php endif; ?>
          </div>
          <span class="mt-badge <?= $clsBadge ?>"><?= $lblBadge ?></span>
        </div>

        <!-- Fechas -->
        <div class="mt-card-fechas">
          <div class="mt-fecha-item">
            <span class="mt-fecha-label">Fecha Asignación</span>
            <span class="mt-fecha-valor"><?= htmlspecialchars($t['fecha_inicio'] ?? '—') ?></span>
          </div>
          <div class="mt-fecha-item">
            <span class="mt-fecha-label">Fecha Vencimiento</span>
            <span class="mt-fecha-valor <?= (!$completada && $t['fecha_fin_estimada'] && $t['fecha_fin_estimada'] < date('Y-m-d')) ? 'mt-fecha-vencida' : '' ?>">
              <?= htmlspecialchars($t['fecha_fin_estimada'] ?? '—') ?>
            </span>
          </div>
          <div class="mt-fecha-item">
            <span class="mt-fecha-label">Asignado por</span>
            <span class="mt-fecha-valor"><?= htmlspecialchars($t['mayordomo']) ?></span>
          </div>
        </div>

        <!-- Botón completar (solo si no está completada) -->
        <?php if (!$completada): ?>
          <button class="mt-btn-completar"
                  id="btn-<?= $t['id_tarea'] ?>"
                  onclick="completarTarea(<?= $t['id_tarea'] ?>)">
            ✓ Completar Tarea
          </button>
        <?php else: ?>
          <div class="mt-completada-label">✓ Tarea completada</div>
        <?php endif; ?>

      </div>
      <?php endforeach; ?>
    <?php endif; ?>

  </main>
</div>

<style>
  /* ── Cabecera ─────────────────────────────────────────── */
  .mt-header { margin-bottom: 20px; }
  .mt-titulo  { font-size: 22px; font-weight: 700; color: #111827; margin: 0 0 4px; }
  .mt-subtitulo { font-size: 14px; color: #6b7280; margin: 0; }

  /* ── Tarjetas resumen (filtros) ──────────────────────── */
  .mt-resumen {
    display: flex;
    gap: 12px;
    margin-bottom: 24px;
    flex-wrap: wrap;
  }
  .mt-stat {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    background: #fff;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    padding: 14px 24px;
    text-decoration: none;
    transition: border-color 0.2s, box-shadow 0.2s;
    min-width: 90px;
  }
  .mt-stat:hover { border-color: #2e9e4f; box-shadow: 0 2px 8px rgba(46,158,79,0.12); }
  .mt-stat-activo { border-color: #2e9e4f; background: #f0fdf4; }
  .mt-stat-num { font-size: 26px; font-weight: 700; color: #111827; line-height: 1; }
  .mt-stat-lbl { font-size: 12px; color: #6b7280; font-weight: 500; }
  .mt-num-pendiente  { color: #92400e; }
  .mt-num-proceso    { color: #1e40af; }
  .mt-num-completada { color: #166534; }

  /* ── Tarjeta de tarea ────────────────────────────────── */
  .mt-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 22px 24px;
    margin-bottom: 16px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
    transition: box-shadow 0.2s;
  }
  .mt-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.09); }
  .mt-card-completada { opacity: 0.75; }

  .mt-card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 16px;
  }
  .mt-card-nombre { font-size: 17px; font-weight: 700; color: #111827; margin: 0 0 4px; }
  .mt-card-lote   { font-size: 13px; color: #2e9e4f; font-weight: 600; margin: 0 0 6px; }
  .mt-card-desc   { font-size: 13px; color: #6b7280; margin: 0; }

  /* Badges de estado */
  .mt-badge {
    display: inline-block;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
    flex-shrink: 0;
  }
  .mt-badge-pendiente  { background: #fef3c7; color: #92400e; }
  .mt-badge-proceso    { background: #dbeafe; color: #1e40af; }
  .mt-badge-completada { background: #dcfce7; color: #166534; }

  /* Fechas */
  .mt-card-fechas {
    display: flex;
    gap: 32px;
    flex-wrap: wrap;
    margin-bottom: 18px;
    padding-top: 14px;
    border-top: 1px solid #f3f4f6;
  }
  .mt-fecha-item { display: flex; flex-direction: column; gap: 3px; }
  .mt-fecha-label { font-size: 11px; color: #9ca3af; font-weight: 500; text-transform: uppercase; letter-spacing: 0.04em; }
  .mt-fecha-valor { font-size: 14px; font-weight: 600; color: #111827; }
  .mt-fecha-vencida { color: #dc2626; }

  /* Botón completar */
  .mt-btn-completar {
    width: 100%;
    background: #2e9e4f;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 13px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: background 0.2s, opacity 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  .mt-btn-completar:hover    { background: #237a3d; }
  .mt-btn-completar:disabled { opacity: 0.6; cursor: not-allowed; }

  /* Label completada */
  .mt-completada-label {
    width: 100%;
    text-align: center;
    padding: 12px;
    font-size: 14px;
    font-weight: 600;
    color: #166534;
    background: #f0fdf4;
    border-radius: 8px;
    border: 1px solid #bbf7d0;
  }

  /* Sin tareas */
  .mt-vacia {
    text-align: center;
    padding: 60px 20px;
    color: #9ca3af;
    font-size: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }

  @media (max-width: 600px) {
    .mt-card-fechas { gap: 16px; }
    .mt-resumen { gap: 8px; }
    .mt-stat { padding: 10px 16px; min-width: 70px; }
  }
</style>

<!-- MODAL CERRAR SESIÓN -->
<div id="logoutOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:9999;align-items:center;justify-content:center;">
  <div style="background:#fff;border-radius:16px;padding:32px 36px;max-width:380px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.25);text-align:center;">
    <p style="font-size:18px;font-weight:700;color:#111827;margin:0 0 24px;">¿Deseas cerrar sesión?</p>
    <div style="display:flex;gap:12px;justify-content:center;">
      <button onclick="cerrarLogoutModal()" style="background:#f3f4f6;color:#374151;border:none;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:600;cursor:pointer;">Cancelar</button>
      <a href="../../controllers/LogoutController.php" style="background:#e53935;color:#fff;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;">Confirmar</a>
    </div>
  </div>
</div>

<script>
  function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('sidebar-open');
  }

  /* ── Modal cerrar sesión ── */
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

  async function completarTarea(idTarea) {
    const btn = document.getElementById('btn-' + idTarea);
    if (!btn) return;
    btn.disabled = true;
    btn.textContent = 'Completando…';

    const fd = new FormData();
    fd.append('accion',   'completar');
    fd.append('id_tarea', idTarea);

    try {
      const res  = await fetch('../../controllers/TrabajadorTareaController.php', {
        method: 'POST', body: fd
      });
      const data = await res.json();

      const msg = document.getElementById('msgGlobal');
      msg.textContent   = data.msg;
      msg.style.display = 'block';
      msg.style.background = data.ok ? '#dcfce7' : '#fdecea';
      msg.style.color      = data.ok ? '#166534' : '#b91c1c';

      if (data.ok) {
        setTimeout(() => location.reload(), 1000);
      } else {
        btn.disabled    = false;
        btn.textContent = '✓ Completar Tarea';
      }
    } catch {
      btn.disabled    = false;
      btn.textContent = '✓ Completar Tarea';
    }
  }
</script>

<?php require_once __DIR__ . '/includes/notificaciones_panel.php'; ?>

</body>
</html>
