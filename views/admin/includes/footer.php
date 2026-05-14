</main><!-- /content -->
</div><!-- /main-wrapper -->

<!-- ══════════════════════════════════════════════════════
     MODAL: CONFIRMAR CERRAR SESIÓN
══════════════════════════════════════════════════════════ -->
<div id="logoutOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:9999;align-items:center;justify-content:center;">
  <div style="background:#fff;border-radius:16px;padding:32px 36px;max-width:380px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.25);text-align:center;">
    <p style="font-size:18px;font-weight:700;color:#111827;margin:0 0 24px;">¿Deseas cerrar sesión?</p>
    <div style="display:flex;gap:12px;justify-content:center;">
      <button onclick="cerrarLogoutModal()"
              style="background:#f3f4f6;color:#374151;border:none;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:600;cursor:pointer;transition:background 0.15s;">
        Cancelar
      </button>
      <a id="logoutConfirmBtn" href="../../controllers/LogoutController.php"
         style="background:#e53935;color:#fff;border:none;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:700;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;transition:background 0.15s;">
        Confirmar
      </a>
    </div>
  </div>
</div>

<script>
  /* Panel de notificaciones: ver includes/sidebar.php */

  /* ── Sidebar ── */
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
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      if (typeof cerrarNotifPanel === 'function') cerrarNotifPanel();
      cerrarLogoutModal();
    }
  });

  /* ── Animación de escritura (typing indicator) ──────────
     Cada vez que el usuario escribe en un input, textarea
     o select se añade la clase .typing-active que dispara
     la animación CSS typingPulse (borde verde pulsante).
     La clase se elimina 700 ms después de dejar de escribir.
  ─────────────────────────────────────────────────────── */
  (function() {
    let _typingTimer = null;
    document.addEventListener('input', function(e) {
      const el = e.target;
      if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(el.tagName)) return;
      el.classList.remove('typing-active');
      void el.offsetWidth; // forzar reflow para reiniciar la animación CSS
      el.classList.add('typing-active');
      clearTimeout(_typingTimer);
      _typingTimer = setTimeout(function() {
        el.classList.remove('typing-active');
      }, 700);
    }, true);
  })();
</script>
</body>
</html>
