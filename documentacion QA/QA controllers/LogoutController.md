Línea 1: <?php
Abre el bloque PHP.

Líneas 2 a 14: Comentario de documentación
Explica que este archivo cierra la sesión y redirige al login.

Línea 15: session_start();
Inicia la sesión para poder modificarla.

Línea 16: session_unset();
Elimina todas las variables guardadas en $_SESSION.

Línea 17: session_destroy();
Destruye la sesión en el servidor.

Línea 19: header("Location: ../views/usuarios/login.php");
Redirige al usuario al login.

Línea 20: exit;
Detiene la ejecución.

Línea 21: ?>
Cierra PHP.

Conclusión:
Este controlador cierra completamente la sesión del usuario y lo envía nuevamente al formulario de login.