<?php
/**
 * ARCHIVO: views/trabajador/mis_prestamos.php
 * PROPÓSITO: Módulo Mis Préstamos (vista trabajador) — solo lectura
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/TrabajadorPrestamo.php';

$db            = (new Database())->conectar();
$model         = new TrabajadorPrestamo($db);
$id_trabajador = (int) $_SESSION['id_usuario'];

$resumen  = $model->resumen($id_trabajador);
$prestamos= $model->listar($id_trabajador);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mis Préstamos - AgroFinca</title>
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
    <a href="mis_prestamos.php"         class="nav-item active"><span class="nav-icon">🔑</span> Mis Préstamos</a>
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
    <div style="margin-bottom:20px;">
      <h1 style="font-size:22px;font-weight:700;color:#111827;margin:0 0 4px;">Mis Préstamos</h1>
      <p style="font-size:14px;color:#6b7280;margin:0;">Consulta el historial de tus solicitudes de herramientas</p>
    </div>

    <!-- TARJETAS RESUMEN -->
    <div class="mp-resumen">
      <div class="mp-stat">
        <span class="mp-stat-num"><?= $resumen['total'] ?></span>
        <span class="mp-stat-lbl">Total</span>
      </div>
      <div class="mp-stat">
        <span class="mp-stat-num" style="color:#92400e;"><?= $resumen['pendientes'] ?></span>
        <span class="mp-stat-lbl">Pendientes</span>
      </div>
      <div class="mp-stat">
        <span class="mp-stat-num" style="color:#166534;"><?= $resumen['aprobados'] ?></span>
        <span class="mp-stat-lbl">Aprobados</span>
      </div>
      <div class="mp-stat">
        <span class="mp-stat-num" style="color:#b91c1c;"><?= $resumen['negados'] ?></span>
        <span class="mp-stat-lbl">Rechazados</span>
      </div>
      <div class="mp-stat">
        <span class="mp-stat-num" style="color:#1e40af;"><?= $resumen['devueltos'] ?></span>
        <span class="mp-stat-lbl">Devueltos</span>
      </div>
    </div>

    <!-- TABLA -->
    <div class="mp-tabla-wrap">
      <table class="mp-tabla">
        <thead>
          <tr>
            <th>Herramienta</th>
            <th>Cantidad</th>
            <th>Fecha Solicitud</th>
            <th>Fecha Entrega</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($prestamos)): ?>
            <tr>
              <td colspan="5" class="mp-vacia">No tienes solicitudes de herramientas registradas</td>
            </tr>
          <?php else: ?>
            <?php foreach ($prestamos as $p):
              [$cls, $lbl] = match(strtoupper($p['estado'])) {
                'PENDIENTE' => ['mp-badge-pendiente', 'Pendiente'],
                'APROBADO'  => ['mp-badge-aprobado',  'Aprobado'],
                'NEGADO'    => ['mp-badge-negado',    'Rechazado'],
                'DEVUELTO'  => ['mp-badge-devuelto',  'Devuelto'],
                default     => ['mp-badge-pendiente', htmlspecialchars($p['estado'])],
              };
            ?>
              <tr>
                <td><strong><?= htmlspecialchars($p['herramienta']) ?></strong></td>
                <td><?= (int) $p['cantidad'] ?></td>
                <td><?= htmlspecialchars($p['fecha_solicitud'] ?? '—') ?></td>
                <td><?= htmlspecialchars($p['fecha_entrega'] ?? '—') ?></td>
                <td><span class="mp-badge <?= $cls ?>"><?= $lbl ?></span></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </main>
</div>

<style>
  /* Tarjetas resumen */
  .mp-resumen {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }
  .mp-stat {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 14px 22px;
    min-width: 90px;
  }
  .mp-stat-num { font-size: 26px; font-weight: 700; color: #111827; line-height: 1; }
  .mp-stat-lbl { font-size: 12px; color: #6b7280; font-weight: 500; }

  /* Tabla */
  .mp-tabla-wrap {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.06);
  }
  .mp-tabla {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
  }
  .mp-tabla thead tr {
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
  }
  .mp-tabla th {
    padding: 12px 20px;
    text-align: left;
    font-weight: 600;
    color: #374151;
    font-size: 13px;
  }
  .mp-tabla td {
    padding: 14px 20px;
    color: #374151;
    border-bottom: 1px solid #f3f4f6;
  }
  .mp-tabla tbody tr:last-child td { border-bottom: none; }
  .mp-tabla tbody tr:hover { background: #f9fafb; }
  .mp-vacia {
    text-align: center;
    color: #9ca3af;
    padding: 40px !important;
  }

  /* Badges de estado */
  .mp-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
  }
  .mp-badge-pendiente { background: #fef3c7; color: #92400e; }
  .mp-badge-aprobado  { background: #dcfce7; color: #166534; }
  .mp-badge-negado    { background: #fdecea; color: #b91c1c; }
  .mp-badge-devuelto  { background: #dbeafe; color: #1e40af; }

  @media (max-width: 600px) {
    .mp-tabla th:nth-child(4),
    .mp-tabla td:nth-child(4) { display: none; }
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
  function abrirLogoutModal() { document.getElementById('logoutOverlay').style.display = 'flex'; }
  function cerrarLogoutModal() { document.getElementById('logoutOverlay').style.display = 'none'; }
  document.querySelectorAll('.btn-logout').forEach(function(btn) {
    btn.addEventListener('click', function(e) { e.preventDefault(); abrirLogoutModal(); });
  });
  document.getElementById('logoutOverlay').addEventListener('click', function(e) {
    if (e.target === this) cerrarLogoutModal();
  });

</script>

<?php require_once __DIR__ . '/includes/notificaciones_panel.php'; ?>

</body>
</html>
