<?php
/**
 * ============================================================
 * ARCHIVO: views/admin/lotes.php
 * PROPÓSITO: Módulo Lotes y Producción con 3 pestañas
 * ============================================================
 * Pestañas:
 *   1. Lotes          → tabla con tarjetas resumen + listado
 *   2. Cultivos x Lote → tarjetas de lotes, al hacer clic
 *                        muestra las variedades del lote
 *   3. Producción x Lote → tarjetas con totales, al hacer clic
 *                          muestra registros de producción
 * Conecta con: models/Lote.php (datos directos, sin AJAX)
 * ============================================================
 */
session_start();
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
    header("Location: ../../views/usuarios/login.php"); exit;
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Lote.php';

$db    = (new Database())->conectar();
$model = new Lote($db);

// Datos para las 3 pestañas
$resumen          = $model->resumen();
$lotes            = $model->listar();
$lotes_cultivos   = $model->listarConCultivos();
$lotes_produccion = $model->listarConProduccion();

// Detalle al hacer clic en un lote (pestaña cultivos o producción)
$tab          = $_GET['tab']    ?? 'lotes';
$id_lote_sel  = (int)($_GET['lote'] ?? 0);
$detalle_cult = $id_lote_sel && $tab === 'cultivos' ? $model->cultivosPorLote($id_lote_sel)   : null;
$detalle_prod = $id_lote_sel && $tab === 'produccion' ? $model->produccionPorLote($id_lote_sel) : null;

$titulo_pagina = 'Lotes y Producción - AgroFinca';
$modulo_activo = 'lotes';
$css_path      = 'styles/dashboard.css';
$css_extra     = 'styles/modulos.css';
require_once __DIR__ . '/includes/sidebar.php';
?>

<!-- CABECERA -->
<div class="mod-header">
  <div>
    <h1 class="mod-titulo">Lotes y Producción</h1>
    <p class="mod-subtitulo">Vista estratégica de lotes, cultivos y producción de la finca</p>
  </div>
</div>

<!-- PESTAÑAS -->
<div class="tabs-wrap">
  <a href="lotes.php?tab=lotes"
     class="tab <?= $tab === 'lotes' ? 'tab-activo' : '' ?>">
    🌍 Lotes
  </a>
  <a href="lotes.php?tab=cultivos"
     class="tab <?= $tab === 'cultivos' ? 'tab-activo' : '' ?>">
    🌿 Cultivos por Lote
  </a>
  <a href="lotes.php?tab=produccion"
     class="tab <?= $tab === 'produccion' ? 'tab-activo' : '' ?>">
    📈 Producción por Lote
  </a>
</div>

<!-- ══════════════════════════════════════════════════════════
     PESTAÑA 1: LOTES
══════════════════════════════════════════════════════════ -->
<?php if ($tab === 'lotes'): ?>

  <!-- Tarjetas resumen -->
  <div class="lotes-resumen">
    <div class="lote-card-stat lote-stat-verde">
      <span class="lote-stat-label">Total Lotes</span>
      <span class="lote-stat-valor"><?= $resumen['total_lotes'] ?></span>
    </div>
    <div class="lote-card-stat lote-stat-azul">
      <span class="lote-stat-label">Extensión Total</span>
      <span class="lote-stat-valor"><?= $resumen['extension_total'] ?> ha</span>
    </div>
    <?php foreach ($resumen['por_cultivo'] as $pc): ?>
      <div class="lote-card-stat lote-stat-amarillo">
        <span class="lote-stat-label">Lotes <?= htmlspecialchars($pc['cultivo']) ?></span>
        <span class="lote-stat-valor"><?= $pc['cantidad'] ?></span>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- Tabla de lotes -->
  <div class="tabla-wrap">
    <table class="tabla">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Ubicación</th>
          <th>Extensión</th>
          <th>Tipo Cultivo</th>
          <th>Producción Total</th>
          <th>Fecha Registro</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($lotes)): ?>
          <tr><td colspan="7" class="tabla-vacia">No hay lotes registrados</td></tr>
        <?php else: ?>
          <?php foreach ($lotes as $l): ?>
            <tr>
              <td><?= htmlspecialchars($l['nombre']) ?></td>
              <td><?= htmlspecialchars($l['ubicacion_descripcion'] ?? '—') ?></td>
              <td><?= $l['extension'] ? $l['extension'] . ' hectáreas' : '—' ?></td>
              <td>
                <?php if ($l['cultivo_nombre']): ?>
                  <span class="badge-cultivo"><?= htmlspecialchars($l['cultivo_nombre']) ?></span>
                <?php else: ?>—<?php endif; ?>
              </td>
              <td><?= number_format($l['produccion_total'], 0) ?> kg</td>
              <td><?= htmlspecialchars($l['fecha_registro'] ?? '—') ?></td>
              <td>
                <a href="lotes.php?tab=cultivos&lote=<?= $l['id_lote'] ?>" class="link-ver">Ver detalles &rsaquo;</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

<!-- ══════════════════════════════════════════════════════════
     PESTAÑA 2: CULTIVOS POR LOTE
══════════════════════════════════════════════════════════ -->
<?php elseif ($tab === 'cultivos'): ?>

  <?php if ($detalle_cult): ?>
    <!-- Detalle de un lote específico -->
    <div class="detalle-lote-header">
      <div>
        <p class="detalle-lote-nombre"><?= htmlspecialchars($detalle_cult['lote']['nombre']) ?></p>
        <p class="detalle-lote-meta">
          <?= htmlspecialchars($detalle_cult['lote']['ubicacion_descripcion'] ?? '') ?>
          • <?= $detalle_cult['lote']['extension'] ?> hectáreas
          • <?= htmlspecialchars($detalle_cult['lote']['cultivo_nombre'] ?? '') ?>
        </p>
      </div>
      <div class="detalle-lote-badge">
        <span class="detalle-lote-badge-label">Variedades</span>
        <span class="detalle-lote-badge-valor"><?= count($detalle_cult['variedades']) ?></span>
      </div>
    </div>

    <a href="lotes.php?tab=cultivos" class="link-volver">← Volver a listado</a>

    <div class="tabla-wrap" style="margin-top:16px">
      <table class="tabla">
        <thead>
          <tr>
            <th>Variedad</th>
            <th>Cantidad Plantas</th>
            <th>Estado Salud</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($detalle_cult['variedades'])): ?>
            <tr><td colspan="3" class="tabla-vacia">Sin variedades registradas</td></tr>
          <?php else: ?>
            <?php foreach ($detalle_cult['variedades'] as $v): ?>
              <?php
                $estadoSalud = $v['estado_salud'] ?? 'ACTIVO';
                $clsSalud = match(strtoupper($estadoSalud)) {
                  'ACTIVO'      => 'badge-activo',
                  'INHABILITADO'=> 'badge-inactivo',
                  default       => 'badge-labor',
                };
                $labelSalud = match(strtoupper($estadoSalud)) {
                  'ACTIVO'      => 'Excelente',
                  'INHABILITADO'=> 'Inhabilitado',
                  default       => 'Regular',
                };
              ?>
              <tr>
                <td><?= htmlspecialchars($v['variedad']) ?></td>
                <td><?= number_format($v['cantidad_cultivada'], 0) ?></td>
                <td><span class="badge <?= $clsSalud ?>"><?= $labelSalud ?></span></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  <?php else: ?>
    <!-- Tarjetas de lotes -->
    <div style="margin-bottom: 24px;">
      <h2 style="font-size: 18px; font-weight: 700; color: #111827; margin: 0 0 4px;">Cultivos por Lote</h2>
      <p style="font-size: 14px; color: #6b7280; margin: 0;">Selecciona un lote para ver sus cultivos</p>
    </div>
    <div class="lotes-cards-grid">
      <?php if (empty($lotes_cultivos)): ?>
        <p class="tabla-vacia">No hay lotes registrados</p>
      <?php else: ?>
        <?php foreach ($lotes_cultivos as $l): ?>
          <a href="lotes.php?tab=cultivos&lote=<?= $l['id_lote'] ?>" class="lote-card-link">
            <div class="lote-card">
              <div class="lote-card-header">
                <p class="lote-card-nombre"><?= htmlspecialchars($l['nombre']) ?></p>
                <?php if ($l['cultivo_nombre']): ?>
                  <span class="badge-cultivo"><?= htmlspecialchars($l['cultivo_nombre']) ?></span>
                <?php endif; ?>
              </div>
              <p class="lote-card-meta">
                <?= htmlspecialchars($l['ubicacion_descripcion'] ?? '') ?> <?php if(isset($l['ubicacion_descripcion']) && $l['extension']): ?>-<?php endif; ?> <?= $l['extension'] ?> hectáreas
              </p>
              <div class="lote-card-footer">
                <p class="lote-card-variedades"><?= $l['variedades'] ?> variedades cultivadas</p>
                <span class="lote-card-arrow">›</span>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>

<!-- ══════════════════════════════════════════════════════════
     PESTAÑA 3: PRODUCCIÓN POR LOTE
══════════════════════════════════════════════════════════ -->
<?php elseif ($tab === 'produccion'): ?>

  <?php if ($detalle_prod): ?>
    <!-- Detalle de producción de un lote -->
    <div class="detalle-lote-header detalle-prod-header">
      <div>
        <p class="detalle-lote-nombre"><?= htmlspecialchars($detalle_prod['lote']['nombre']) ?></p>
        <p class="detalle-lote-meta">
          <?= htmlspecialchars($detalle_prod['lote']['cultivo_nombre'] ?? '') ?>
          • <?= $detalle_prod['lote']['extension'] ?> hectáreas
        </p>
      </div>
      <div class="detalle-lote-badge detalle-prod-badge">
        <span class="detalle-lote-badge-label">Producción Total</span>
        <span class="detalle-lote-badge-valor"><?= number_format($detalle_prod['lote']['produccion_total'], 0) ?> kg</span>
      </div>
    </div>

    <a href="lotes.php?tab=produccion" class="link-volver">← Volver a listado</a>

    <div class="tabla-wrap" style="margin-top:16px">
      <table class="tabla">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Trabajador</th>
            <th>Cantidad</th>
            <th>Unidad</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($detalle_prod['registros'])): ?>
            <tr><td colspan="4" class="tabla-vacia">Sin registros de producción</td></tr>
          <?php else: ?>
            <?php foreach ($detalle_prod['registros'] as $r): ?>
              <tr>
                <td><?= htmlspecialchars($r['fecha']) ?></td>
                <td><?= htmlspecialchars($r['trabajador']) ?></td>
                <td><strong><?= number_format($r['cantidad'], 0) ?></strong></td>
                <td><?= htmlspecialchars($r['unidad_medida']) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  <?php else: ?>
    <!-- Tarjetas de producción por lote -->
    <div class="lotes-cards-grid">
      <?php if (empty($lotes_produccion)): ?>
        <p class="tabla-vacia">No hay datos de producción</p>
      <?php else: ?>
        <?php foreach ($lotes_produccion as $l): ?>
          <a href="lotes.php?tab=produccion&lote=<?= $l['id_lote'] ?>" class="lote-card-link">
            <div class="lote-card">
              <div class="lote-card-top">
                <div>
                  <p class="lote-card-nombre"><?= htmlspecialchars($l['nombre']) ?></p>
                  <p class="lote-card-meta"><?= htmlspecialchars($l['cultivo_nombre'] ?? '—') ?></p>
                  <p class="lote-card-meta">Producción total: <strong><?= number_format($l['produccion_total'], 0) ?> kg</strong></p>
                  <p class="lote-card-meta">Registros: <strong><?= $l['registros'] ?></strong></p>
                </div>
                <span class="lote-prod-icon">📊</span>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>

<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
