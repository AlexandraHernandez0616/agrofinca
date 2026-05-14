<?php
/**
 * ============================================================
 * ARCHIVO: controllers/LogoutController.php
 * PROPÓSITO: Cierra la sesión del usuario y redirige al login
 * ============================================================
 *
 * Se llama desde el botón "Cerrar sesión" del dashboard:
 *   <a href="../../controllers/LogoutController.php">Cerrar sesión</a>
 *
 * Pasos:
 *   1. Inicia la sesión para poder acceder a ella
 *   2. Elimina todas las variables de sesión
 *   3. Destruye la sesión completamente
 *   4. Redirige al login
 * ============================================================
 */
session_start();
session_unset();   // Limpia todas las variables de $_SESSION
session_destroy(); // Destruye el archivo de sesión en el servidor

header("Location: ../views/usuarios/login.php");
exit;
?>
