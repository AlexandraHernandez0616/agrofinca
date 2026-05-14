Línea 1: <?php
Qué hace exactamente: Abre un bloque PHP.
Con qué se conecta: Con el intérprete PHP del servidor.
Para qué sirve: Permite usar variables PHP como $titulo_pagina, $css_path, $css_extra, $img_path, $modulo_activo y $_SESSION.
Qué pasaría si se quita: El servidor no interpretaría correctamente las instrucciones PHP iniciales.

Líneas 2 a 8: Comentario de documentación
Qué hace exactamente: Explica que este archivo contiene el sidebar y topbar compartidos por las vistas del administrador.
Con qué se conecta: Con todas las vistas admin que hacen require_once de este archivo.
Para qué sirve: Indica cómo se usa, especialmente con $modulo_activo.
Qué pasaría si se quita: El archivo funciona, pero se pierde documentación importante.

Línea 9: ?>
Qué hace exactamente: Cierra el bloque PHP.
Con qué se conecta: Con la apertura PHP de la línea 1.
Para qué sirve: Permite empezar a escribir HTML.
Qué pasaría si se quita: El HTML siguiente podría ser interpretado incorrectamente como PHP.

Línea 10: <!DOCTYPE html>
Qué hace exactamente: Declara que el documento usa HTML5.
Con qué se conecta: Con el navegador.
Para qué sirve: Ayuda a renderizar la página con estándares modernos.
Qué pasaría si se quita: El navegador podría entrar en modo de compatibilidad.

Línea 11: <html lang="es">
Qué hace exactamente: Abre el documento HTML e indica idioma español.
Con qué se conecta: Con todo el contenido de la página.
Para qué sirve: Mejora accesibilidad, SEO y lectura del navegador.
Qué pasaría si se quita: El documento HTML quedaría incompleto.

Línea 12: <head>
Qué hace exactamente: Abre la sección de metadatos.
Con qué se conecta: Con título, estilos y fuentes.
Para qué sirve: Contiene configuración que no se muestra directamente en el cuerpo.
Qué pasaría si se quita: Metadatos y estilos podrían quedar mal ubicados.

Línea 13: <meta charset="UTF-8" />
Qué hace exactamente: Define la codificación de caracteres.
Con qué se conecta: Con textos como emojis, tildes y ñ.
Para qué sirve: Evita errores visuales en caracteres especiales.
Qué pasaría si se quita: Podrían aparecer caracteres raros.

Línea 14: <meta name="viewport" content="width=device-width, initial-scale=1.0" />
Qué hace exactamente: Configura la escala en dispositivos móviles.
Con qué se conecta: Con el diseño responsive.
Para qué sirve: Hace que la página se adapte mejor a celulares y tablets.
Qué pasaría si se quita: El diseño móvil podría verse mal.

Línea 15: <title><?= $titulo_pagina ?? 'AgroFinca' ?></title>
Qué hace exactamente: Define el título de la pestaña del navegador.
Con qué se conecta: Con la variable $titulo_pagina definida en cada vista.
Para qué sirve: Si la vista envía título, lo usa; si no, muestra AgroFinca.
Qué pasaría si se quita: La pestaña no tendría título personalizado.

Línea 16: <link rel="stylesheet" href="<?= $css_path ?? 'styles/dashboard.css' ?>" />
Qué hace exactamente: Carga la hoja de estilos principal.
Con qué se conecta: Con la variable $css_path o con styles/dashboard.css por defecto.
Para qué sirve: Aplica el diseño general del panel.
Qué pasaría si se quita: La página perdería estilos principales.

Línea 17: <link rel="preconnect" href="https://fonts.googleapis.com" />
Qué hace exactamente: Preconecta con Google Fonts.
Con qué se conecta: Con fonts.googleapis.com.
Para qué sirve: Optimiza la carga de la fuente.
Qué pasaría si se quita: La fuente aún podría cargar, pero un poco menos optimizada.

Línea 18: <link href="https://fonts.googleapis.com/..." rel="stylesheet" />
Qué hace exactamente: Carga la fuente Inter.
Con qué se conecta: Con Google Fonts.
Para qué sirve: Da una tipografía moderna al panel.
Qué pasaría si se quita: El sistema usará una fuente por defecto o definida en CSS.

Línea 19: <?php if (!empty($css_extra)): ?>
Qué hace exactamente: Verifica si existe una hoja CSS extra.
Con qué se conecta: Con la variable $css_extra que puede definir cada vista.
Para qué sirve: Permite que una vista cargue estilos adicionales.
Qué pasaría si se quita: No se podrían cargar estilos extra de módulos.

Línea 20: <link rel="stylesheet" href="<?= $css_extra ?>" />
Qué hace exactamente: Carga el CSS extra.
Con qué se conecta: Con $css_extra.
Para qué sirve: Aplica estilos específicos de una página.
Qué pasaría si se quita: El módulo podría perder estilos particulares.

Línea 21: <?php endif; ?>
Qué hace exactamente: Cierra la condición PHP del CSS extra.
Con qué se conecta: Con el if de la línea 19.
Para qué sirve: Finaliza la validación.
Qué pasaría si se quita: Habría error de sintaxis PHP.

Línea 22: </head>
Qué hace exactamente: Cierra la sección head.
Con qué se conecta: Con la línea 12.
Para qué sirve: Finaliza metadatos y enlaces CSS.
Qué pasaría si se quita: El HTML quedaría mal estructurado.

Línea 23: <body>
Qué hace exactamente: Abre el cuerpo visible de la página.
Con qué se conecta: Con sidebar, topbar, contenido y footer.
Para qué sirve: Todo lo visible al usuario va dentro de body.
Qué pasaría si se quita: El documento quedaría mal formado.

Línea 25: <!-- SIDEBAR -->
Qué hace exactamente: Comentario que indica el inicio del menú lateral.
Con qué se conecta: Con el aside sidebar.
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: No afecta funcionamiento.

Línea 26: <aside class="sidebar" id="sidebar">
Qué hace exactamente: Crea el menú lateral.
Con qué se conecta: Con CSS .sidebar y con toggleSidebar() del footer.
Para qué sirve: Mostrar navegación principal del administrador.
Qué pasaría si se quita: No habría menú lateral.

Línea 27: <div class="sidebar-logo">
Qué hace exactamente: Crea el contenedor del logo.
Con qué se conecta: Con la imagen y texto AgroFinca.
Para qué sirve: Mostrar identidad visual del sistema.
Qué pasaría si se quita: El logo y nombre no tendrían contenedor.

Línea 28: <img src="<?= $img_path ?? '../../img/logo.png' ?>" ... />
Qué hace exactamente: Muestra el logo de AgroFinca.
Con qué se conecta: Con $img_path o con ../../img/logo.png.
Para qué sirve: Cargar la imagen del logo.
Qué pasaría si se quita: No se mostraría el logo.

Línea 29: <span>AgroFinca</span>
Qué hace exactamente: Muestra el nombre del sistema.
Con qué se conecta: Con el logo visual del sidebar.
Para qué sirve: Identificar la aplicación.
Qué pasaría si se quita: Solo aparecería la imagen, sin texto.

Línea 30: </div>
Qué hace exactamente: Cierra el contenedor del logo.
Con qué se conecta: Con línea 27.
Para qué sirve: Finaliza la sección logo.
Qué pasaría si se quita: El HTML quedaría mal estructurado.

Línea 31: <nav class="sidebar-nav">
Qué hace exactamente: Abre el contenedor de navegación.
Con qué se conecta: Con los enlaces del menú.
Para qué sirve: Agrupar los módulos del sistema.
Qué pasaría si se quita: Los enlaces quedarían sin estructura de navegación.

Línea 32: <?php
Qué hace exactamente: Abre PHP dentro del HTML.
Con qué se conecta: Con el arreglo $items.
Para qué sirve: Permite construir el menú de forma dinámica.
Qué pasaría si se quita: No se podría declarar el arreglo de módulos.

Líneas 33 a 45: $items = [...]
Qué hace exactamente: Crea un arreglo con los módulos del menú: Dashboard, Mayordomos, Trabajadores, Lotes, Inventarios, Tarifas, Liquidaciones, Liq. Temporales, Pagos, Reportes y Bitácora.
Con qué se conecta: Con el foreach de la línea 46.
Para qué sirve: Centraliza icono, nombre visible y ruta de cada opción del sidebar.
Qué pasaría si se quita: No se generarían enlaces de navegación.

Línea 46: foreach ($items as $key => $item):
Qué hace exactamente: Recorre cada elemento del menú.
Con qué se conecta: Con el arreglo $items.
Para qué sirve: Crear automáticamente un enlace por cada módulo.
Qué pasaría si se quita: El menú no se imprimiría.

Línea 47: $activo = ($modulo_activo ?? '') === $key ? 'active' : '';
Qué hace exactamente: Comprueba si el módulo actual coincide con el item del menú.
Con qué se conecta: Con la variable $modulo_activo definida en cada vista.
Para qué sirve: Agregar la clase active al módulo seleccionado.
Qué pasaría si se quita: El menú no marcaría visualmente la sección actual.

Línea 48: ?>
Qué hace exactamente: Cierra temporalmente PHP.
Con qué se conecta: Con el bloque HTML del enlace.
Para qué sirve: Permite imprimir HTML por cada item.
Qué pasaría si se quita: El HTML del enlace podría interpretarse mal.

Línea 49: <a href="<?= $item['href'] ?>" class="nav-item <?= $activo ?>">
Qué hace exactamente: Crea un enlace del menú con ruta y clase dinámica.
Con qué se conecta: Con $item['href'] y $activo.
Para qué sirve: Permite navegar a cada módulo y marcar el activo.
Qué pasaría si se quita: No habría enlace clicable para el módulo.

Línea 50: <span class="nav-icon"><?= $item['icon'] ?></span> <?= $item['label'] ?>
Qué hace exactamente: Muestra el icono y el texto del módulo.
Con qué se conecta: Con $item['icon'] y $item['label'].
Para qué sirve: Hace visible la opción del menú.
Qué pasaría si se quita: El enlace estaría vacío o sin identificación clara.

Línea 51: </a>
Qué hace exactamente: Cierra el enlace del menú.
Con qué se conecta: Con línea 49.
Para qué sirve: Finaliza cada opción de navegación.
Qué pasaría si se quita: El HTML quedaría mal estructurado.

Línea 52: <?php endforeach; ?>
Qué hace exactamente: Cierra el foreach.
Con qué se conecta: Con línea 46.
Para qué sirve: Termina la generación dinámica del menú.
Qué pasaría si se quita: Error de sintaxis PHP.

Línea 53: </nav>
Qué hace exactamente: Cierra la navegación del sidebar.
Con qué se conecta: Con línea 31.
Para qué sirve: Finaliza el bloque de enlaces.
Qué pasaría si se quita: El nav quedaría abierto.

Línea 54: </aside>
Qué hace exactamente: Cierra el sidebar.
Con qué se conecta: Con línea 26.
Para qué sirve: Finaliza el menú lateral completo.
Qué pasaría si se quita: El layout podría romperse.

Línea 56: <!-- CONTENIDO PRINCIPAL -->
Qué hace exactamente: Comentario que indica el inicio del wrapper principal.
Con qué se conecta: Con main-wrapper.
Para qué sirve: Organizar visualmente el archivo.
Qué pasaría si se quita: No afecta funcionamiento.

Línea 57: <div class="main-wrapper">
Qué hace exactamente: Abre el contenedor principal de la página.
Con qué se conecta: Con footer.php, que lo cierra.
Para qué sirve: Agrupa topbar y contenido.
Qué pasaría si se quita: El topbar y contenido perderían su estructura principal.

Línea 59: <!-- TOPBAR -->
Qué hace exactamente: Comentario que marca la barra superior.
Con qué se conecta: Con header.topbar.
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: No afecta.

Línea 60: <header class="topbar">
Qué hace exactamente: Crea la barra superior.
Con qué se conecta: Con CSS .topbar.
Para qué sirve: Mostrar menú móvil, título, rol, notificaciones, perfil y logout.
Qué pasaría si se quita: No habría barra superior.

Línea 61: <button class="menu-toggle" onclick="toggleSidebar()" ...>☰</button>
Qué hace exactamente: Crea el botón para abrir/cerrar sidebar.
Con qué se conecta: Con toggleSidebar() definido en footer.php.
Para qué sirve: Permite controlar el menú lateral, especialmente en pantallas pequeñas.
Qué pasaría si se quita: No habría botón para abrir/cerrar el menú.

Línea 62: <div class="topbar-title">Sistema de Gestión de Finca</div>
Qué hace exactamente: Muestra el título general del sistema.
Con qué se conecta: Con la topbar.
Para qué sirve: Identificar el sistema en la parte superior.
Qué pasaría si se quita: La topbar perdería el título.

Línea 63: <div class="topbar-right">
Qué hace exactamente: Abre el contenedor derecho del topbar.
Con qué se conecta: Con badge de rol, notificaciones, perfil y logout.
Para qué sirve: Agrupar controles del usuario.
Qué pasaría si se quita: Los elementos derechos quedarían sin contenedor.

Línea 64: <span class="badge-rol">Administrador</span>
Qué hace exactamente: Muestra la etiqueta del rol.
Con qué se conecta: Con el panel admin.
Para qué sirve: Indicar que el usuario está en modo Administrador.
Qué pasaría si se quita: No se vería el rol en la topbar.

Línea 65: <div class="notif-wrapper">
Qué hace exactamente: Abre el contenedor del botón de notificaciones.
Con qué se conecta: Con notif-btn y badge dinámico.
Para qué sirve: Agrupar la campana de notificaciones.
Qué pasaría si se quita: La campana quedaría sin wrapper.

Línea 66: <button class="notif-btn" onclick="toggleNotifPanel()" ...>🔔</button>
Qué hace exactamente: Crea el botón de notificaciones.
Con qué se conecta: Con toggleNotifPanel() definido más abajo en este archivo.
Para qué sirve: Abrir/cerrar el panel de notificaciones.
Qué pasaría si se quita: No se podrían abrir las notificaciones desde la topbar.

Línea 67: </div>
Qué hace exactamente: Cierra notif-wrapper.
Con qué se conecta: Con línea 65.
Para qué sirve: Finalizar el contenedor de notificaciones.
Qué pasaría si se quita: HTML mal estructurado.

Línea 68: <a href="perfil.php" class="topbar-user" title="Mi perfil">
Qué hace exactamente: Crea un enlace al perfil del usuario.
Con qué se conecta: Con views/admin/perfil.php.
Para qué sirve: Permite ir al perfil desde la topbar.
Qué pasaría si se quita: El usuario no tendría acceso rápido a su perfil.

Línea 69: 👤 <?= htmlspecialchars($_SESSION['username']) ?>
Qué hace exactamente: Muestra el nombre de usuario de la sesión, protegido con htmlspecialchars.
Con qué se conecta: Con $_SESSION['username'].
Para qué sirve: Mostrar quién está logueado y evitar inyección HTML.
Qué pasaría si se quita: No se mostraría el usuario actual.

Línea 70: </a>
Qué hace exactamente: Cierra el enlace del perfil.
Con qué se conecta: Con línea 68.
Para qué sirve: Finalizar el enlace.
Qué pasaría si se quita: HTML mal estructurado.

Línea 71: <a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>
Qué hace exactamente: Crea enlace para cerrar sesión.
Con qué se conecta: Con LogoutController.php y con footer.php, que intercepta .btn-logout para abrir el modal.
Para qué sirve: Permite salir del sistema con confirmación.
Qué pasaría si se quita: No habría opción visible para cerrar sesión.

Línea 72: </div>
Qué hace exactamente: Cierra topbar-right.
Con qué se conecta: Con línea 63.
Para qué sirve: Finalizar controles derechos.
Qué pasaría si se quita: HTML mal estructurado.

Línea 73: </header>
Qué hace exactamente: Cierra la topbar.
Con qué se conecta: Con línea 60.
Para qué sirve: Finalizar la barra superior.
Qué pasaría si se quita: HTML mal estructurado.

Línea 75: <!-- CONTENIDO DE LA PÁGINA -->
Qué hace exactamente: Comentario que indica dónde empieza el contenido específico de cada vista.
Con qué se conecta: Con <main class="content">.
Para qué sirve: Organizar el layout.
Qué pasaría si se quita: No afecta.

Línea 76: <main class="content">
Qué hace exactamente: Abre el contenedor del contenido principal.
Con qué se conecta: Con footer.php, que lo cierra en la línea 1.
Para qué sirve: Aquí se inserta el contenido de cada página admin.
Qué pasaría si se quita: Las vistas no tendrían contenedor principal correcto.

Líneas 78 a 81: Comentario overlay notificaciones
Qué hace exactamente: Explica que el panel de notificaciones está disponible en todas las vistas.
Con qué se conecta: Con NotificacionController.php.
Para qué sirve: Documentar la funcionalidad global de notificaciones.
Qué pasaría si se quita: No afecta ejecución.

Línea 82: <div class="notif-overlay" id="notifOverlay">
Qué hace exactamente: Crea el fondo/capa del panel de notificaciones.
Con qué se conecta: Con toggleNotifPanel() y cerrarNotifPanel().
Para qué sirve: Mostrar u ocultar el panel flotante.
Qué pasaría si se quita: No habría overlay de notificaciones.

Línea 83: <div class="notif-panel" id="notifPanel" ...>
Qué hace exactamente: Crea el panel interno de notificaciones.
Con qué se conecta: Con notifOverlay y funciones JS.
Para qué sirve: Contener la lista de notificaciones.
Qué pasaría si se quita: El overlay no tendría panel visible.

Línea 84: <div class="notif-panel-header">
Qué hace exactamente: Abre la cabecera del panel.
Con qué se conecta: Con título, subtítulo y botones del panel.
Para qué sirve: Organizar la parte superior de notificaciones.
Qué pasaría si se quita: El encabezado no tendría estructura.

Línea 85: <div class="notif-panel-header-left">
Qué hace exactamente: Abre la parte izquierda de la cabecera.
Con qué se conecta: Con h2 y notifSubtitulo.
Para qué sirve: Agrupar título y subtítulo.
Qué pasaría si se quita: El texto de la cabecera quedaría sin agrupación.

Línea 86: <h2>🔔 Notificaciones</h2>
Qué hace exactamente: Muestra el título del panel.
Con qué se conecta: Con el panel de notificaciones.
Para qué sirve: Identifica la ventana de notificaciones.
Qué pasaría si se quita: El panel no tendría título.

Línea 87: <p id="notifSubtitulo">Cargando...</p>
Qué hace exactamente: Crea el subtítulo dinámico.
Con qué se conecta: Con renderNotificaciones().
Para qué sirve: Mostrar si hay notificaciones sin leer o si todas están leídas.
Qué pasaría si se quita: No se mostraría resumen de estado.

Línea 88: </div>
Qué hace exactamente: Cierra notif-panel-header-left.
Con qué se conecta: Con línea 85.
Para qué sirve: Finaliza la parte izquierda.
Qué pasaría si se quita: HTML mal estructurado.

Línea 89: <div class="notif-panel-header-right">
Qué hace exactamente: Abre la parte derecha de la cabecera.
Con qué se conecta: Con botones marcar leídas y cerrar.
Para qué sirve: Agrupar acciones del panel.
Qué pasaría si se quita: Los botones quedarían sin contenedor.

Línea 90: <button class="btn-marcar-leidas" id="btnMarcarLeidas" ...>
Qué hace exactamente: Crea botón para marcar todas las notificaciones como leídas.
Con qué se conecta: Con marcarTodasLeidas().
Para qué sirve: Permite limpiar todas las notificaciones pendientes.
Qué pasaría si se quita: No habría acción global de marcar leídas.

Línea 91: <button class="btn-cerrar-notif" onclick="cerrarNotifPanel()" ...>✕</button>
Qué hace exactamente: Crea botón para cerrar el panel.
Con qué se conecta: Con cerrarNotifPanel().
Para qué sirve: Permite cerrar notificaciones manualmente.
Qué pasaría si se quita: Solo se podrían cerrar con clic fuera o Escape.

Línea 92: </div>
Qué hace exactamente: Cierra notif-panel-header-right.
Con qué se conecta: Con línea 89.
Para qué sirve: Finaliza el área de botones.
Qué pasaría si se quita: HTML mal estructurado.

Línea 93: </div>
Qué hace exactamente: Cierra la cabecera del panel.
Con qué se conecta: Con línea 84.
Para qué sirve: Finaliza header de notificaciones.
Qué pasaría si se quita: HTML mal estructurado.

Línea 94: <div class="notif-list" id="notifList">
Qué hace exactamente: Crea el contenedor donde se insertarán las notificaciones.
Con qué se conecta: Con renderNotificaciones().
Para qué sirve: Recibir dinámicamente los elementos de notificación.
Qué pasaría si se quita: No habría lugar para mostrar notificaciones.

Línea 95: <p class="notif-empty">Cargando notificaciones...</p>
Qué hace exactamente: Muestra mensaje inicial mientras carga.
Con qué se conecta: Con notifList.
Para qué sirve: Informar que el sistema está cargando datos.
Qué pasaría si se quita: El panel aparecería vacío durante la carga.

Línea 96: </div>
Qué hace exactamente: Cierra notifList.
Con qué se conecta: Con línea 94.
Para qué sirve: Finaliza lista de notificaciones.
Qué pasaría si se quita: HTML mal estructurado.

Línea 97: </div>
Qué hace exactamente: Cierra notifPanel.
Con qué se conecta: Con línea 83.
Para qué sirve: Finaliza panel interno.
Qué pasaría si se quita: HTML mal estructurado.

Línea 98: </div>
Qué hace exactamente: Cierra notifOverlay.
Con qué se conecta: Con línea 82.
Para qué sirve: Finaliza overlay de notificaciones.
Qué pasaría si se quita: HTML mal estructurado.

Línea 100: <script>
Qué hace exactamente: Abre bloque JavaScript.
Con qué se conecta: Con funciones de notificaciones.
Para qué sirve: Hacer que el panel de notificaciones funcione dinámicamente.
Qué pasaría si se quita: No funcionaría la lógica de notificaciones.

Línea 101: (function() {
Qué hace exactamente: Inicia función anónima autoejecutable.
Con qué se conecta: Con todo el bloque JS de notificaciones.
Para qué sirve: Encapsular variables y funciones para no contaminar el entorno global.
Qué pasaría si se quita: Habría que reorganizar todo el JavaScript.

Líneas 102 a 103: Comentario de rutas
Qué hace exactamente: Explica que se construye la ruta hacia el controlador.
Con qué se conecta: Con NOTIF_URL.
Para qué sirve: Documentar la ubicación del controlador.
Qué pasaría si se quita: No afecta ejecución.

Línea 104: var NOTIF_URL = '../../controllers/NotificacionController.php';
Qué hace exactamente: Guarda la ruta del controlador de notificaciones.
Con qué se conecta: Con controllers/NotificacionController.php.
Para qué sirve: Todas las peticiones fetch usan esta ruta.
Qué pasaría si se quita: Las notificaciones no sabrían de dónde cargar o marcar datos.

Línea 106: var iconos = { error: '⚠', warning: '△', success: '✓', info: 'ℹ' };
Qué hace exactamente: Define iconos según tipo de notificación.
Con qué se conecta: Con n.tipo dentro de renderNotificaciones().
Para qué sirve: Mostrar visualmente si es error, advertencia, éxito o información.
Qué pasaría si se quita: Las notificaciones no tendrían icono por tipo.

Línea 108: function tiempoRelativo(fechaStr) {
Qué hace exactamente: Declara una función para convertir fechas en texto relativo.
Con qué se conecta: Con n.fecha_hora.
Para qué sirve: Mostrar “Hace 5 min”, “Hace 2 h” o “Hace X días”.
Qué pasaría si se quita: Las notificaciones mostrarían fechas crudas o no mostrarían tiempo.

Línea 109: if (!fechaStr) return '';
Qué hace exactamente: Si no hay fecha, devuelve texto vacío.
Con qué se conecta: Con fechaStr.
Para qué sirve: Evitar errores si una notificación no trae fecha.
Qué pasaría si se quita: Podría intentar calcular con una fecha inválida.

Línea 110: var diff = Math.floor((Date.now() - new Date(fechaStr).getTime()) / 1000);
Qué hace exactamente: Calcula la diferencia en segundos entre ahora y la fecha recibida.
Con qué se conecta: Con Date.now() y new Date(fechaStr).
Para qué sirve: Base para calcular segundos, minutos, horas o días.
Qué pasaría si se quita: No se podría calcular tiempo relativo.

Líneas 111 a 114: Condiciones de tiempo relativo
Qué hace exactamente: Devuelven texto según la diferencia sea menor a 60 segundos, menor a 1 hora, menor a 1 día o más.
Con qué se conecta: Con la variable diff.
Para qué sirve: Mostrar tiempo entendible para el usuario.
Qué pasaría si se quita: La función no devolvería una descripción clara.

Línea 115: }
Qué hace exactamente: Cierra tiempoRelativo().
Con qué se conecta: Con línea 108.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Error de sintaxis.

Línea 117: function escHtml(str) {
Qué hace exactamente: Declara función para escapar texto HTML.
Con qué se conecta: Con mensajes de notificaciones.
Para qué sirve: Evitar que un mensaje inserte HTML peligroso.
Qué pasaría si se quita: Aumentaría el riesgo de inyección HTML/XSS.

Líneas 118 a 120: Crear div, insertar texto y devolver innerHTML
Qué hace exactamente: Convierte texto normal en HTML seguro.
Con qué se conecta: Con document.createElement y createTextNode.
Para qué sirve: Escapar caracteres como <, > o &.
Qué pasaría si se quita: Los mensajes podrían interpretarse como HTML real.

Línea 121: }
Qué hace exactamente: Cierra escHtml().
Con qué se conecta: Con línea 117.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Error de sintaxis.

Línea 123: function escAttr(str) {
Qué hace exactamente: Declara función para escapar texto usado en atributos HTML.
Con qué se conecta: Con href, class y data-id dentro del HTML dinámico.
Para qué sirve: Evitar caracteres peligrosos en atributos.
Qué pasaría si se quita: Podrían generarse atributos inseguros o rotos.

Líneas 124 a 128: Reemplazos de caracteres peligrosos
Qué hace exactamente: Convierte &, comillas, apóstrofes y < en entidades HTML.
Con qué se conecta: Con el string recibido.
Para qué sirve: Proteger atributos HTML generados con JavaScript.
Qué pasaría si se quita: Podría haber inyección o errores en el HTML generado.

Línea 129: }
Qué hace exactamente: Cierra escAttr().
Con qué se conecta: Con línea 123.
Para qué sirve: Finaliza función.
Qué pasaría si se quita: Error de sintaxis.

Línea 131: function linkSeguro(href) {
Qué hace exactamente: Declara función para validar si un link de notificación es seguro.
Con qué se conecta: Con n.link.
Para qué sirve: Permitir solo rutas internas válidas.
Qué pasaría si se quita: Se podrían mostrar links no seguros.

Línea 132: if (!href || typeof href !== 'string') return '';
Qué hace exactamente: Rechaza links vacíos o que no sean texto.
Con qué se conecta: Con href.
Para qué sirve: Evitar errores y links inválidos.
Qué pasaría si se quita: Podría procesar datos incorrectos.

Línea 133: var h = href.trim();
Qué hace exactamente: Quita espacios al inicio y final del link.
Con qué se conecta: Con href.
Para qué sirve: Validar la ruta limpia.
Qué pasaría si se quita: Un link con espacios podría fallar la validación.

Línea 134: if (h.indexOf('../../views/') !== 0) return '';
Qué hace exactamente: Solo permite links que empiecen por ../../views/.
Con qué se conecta: Con las rutas internas de vistas.
Para qué sirve: Evita enlaces externos o rutas inesperadas.
Qué pasaría si se quita: Se podrían permitir links peligrosos o externos.

Línea 135: if (h.indexOf('..', 3) !== -1) return '';
Qué hace exactamente: Bloquea rutas que contengan .. después del inicio.
Con qué se conecta: Con validación de seguridad de rutas.
Para qué sirve: Evitar navegación fuera de directorios permitidos.
Qué pasaría si se quita: Podrían pasar rutas con traversal.

Línea 136: return h;
Qué hace exactamente: Devuelve el link validado.
Con qué se conecta: Con renderNotificaciones().
Para qué sirve: Usar el enlace en el botón “Ver”.
Qué pasaría si se quita: Nunca se devolvería el link seguro.

Línea 137: }
Qué hace exactamente: Cierra linkSeguro().
Con qué se conecta: Con línea 131.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Error de sintaxis.

Línea 139: function renderNotificaciones(notifs, noLeidas) {
Qué hace exactamente: Declara función para pintar notificaciones en pantalla.
Con qué se conecta: Con cargarNotificaciones().
Para qué sirve: Convertir los datos JSON en HTML visible.
Qué pasaría si se quita: No se podrían mostrar notificaciones.

Líneas 140 a 142: Variables list, sub y btn
Qué hace exactamente: Obtienen elementos del DOM para lista, subtítulo y botón marcar leídas.
Con qué se conecta: Con notifList, notifSubtitulo y btnMarcarLeidas.
Para qué sirve: Poder modificar el panel desde JavaScript.
Qué pasaría si se quitan: La función no sabría dónde renderizar.

Línea 144: if (!list) return;
Qué hace exactamente: Detiene la función si no existe la lista.
Con qué se conecta: Con notifList.
Para qué sirve: Evitar errores si el elemento no está en la página.
Qué pasaría si se quita: Podría producir error si list es null.

Líneas 146 a 148: sub.textContent = ...
Qué hace exactamente: Actualiza el subtítulo según la cantidad de no leídas.
Con qué se conecta: Con noLeidas.
Para qué sirve: Informar al usuario si tiene notificaciones pendientes.
Qué pasaría si se quita: El subtítulo no se actualizaría.

Línea 150: if (btn) btn.style.display = noLeidas > 0 ? 'inline-flex' : 'none';
Qué hace exactamente: Muestra el botón “Marcar todas” solo si hay no leídas.
Con qué se conecta: Con btnMarcarLeidas.
Para qué sirve: Evita mostrar una acción innecesaria.
Qué pasaría si se quita: El botón podría aparecer siempre o nunca.

Líneas 152 a 155: Validación de lista vacía
Qué hace exactamente: Si no hay notificaciones, muestra “Sin notificaciones nuevas”.
Con qué se conecta: Con notifList.
Para qué sirve: Evitar que el panel quede vacío.
Qué pasaría si se quita: Si no hay notificaciones, no habría mensaje.

Línea 157: list.innerHTML = notifs.map(function(n) {
Qué hace exactamente: Recorre las notificaciones y construye HTML para cada una.
Con qué se conecta: Con el arreglo notifs del JSON.
Para qué sirve: Renderizar todas las notificaciones.
Qué pasaría si se quita: No se pintarían las notificaciones.

Líneas 158 a 164: tipo, icono, unread, href y linkHtml
Qué hace exactamente: Calculan el tipo, icono, clase de no leída, link seguro y HTML del enlace “Ver”.
Con qué se conecta: Con n.tipo, n.leida, n.link y n.id_notificacion.
Para qué sirve: Preparar cada notificación visualmente.
Qué pasaría si se quita: Las notificaciones perderían estado, icono o enlace.

Líneas 165 a 172: return del HTML de cada notificación
Qué hace exactamente: Construye el bloque HTML con clase, icono, mensaje, tiempo y link.
Con qué se conecta: Con escAttr(), escHtml(), tiempoRelativo() y marcarUnaLeida().
Para qué sirve: Mostrar cada notificación de forma segura y ordenada.
Qué pasaría si se quita: No se generaría el contenido visible.

Línea 173: }).join('');
Qué hace exactamente: Une todos los bloques HTML en un solo string.
Con qué se conecta: Con map().
Para qué sirve: Insertar todo en list.innerHTML.
Qué pasaría si se quita: Podría quedar un array en lugar de HTML unido.

Línea 174: }
Qué hace exactamente: Cierra renderNotificaciones().
Con qué se conecta: Con línea 139.
Para qué sirve: Finalizar renderizado.
Qué pasaría si se quita: Error de sintaxis.

Línea 176: function actualizarBadge(noLeidas) {
Qué hace exactamente: Declara función para actualizar el contador de la campana.
Con qué se conecta: Con cargarNotificaciones() y fetch inicial.
Para qué sirve: Mostrar número de notificaciones sin leer.
Qué pasaría si se quita: La campana no tendría contador actualizado.

Línea 177: var badge = document.querySelector('.notif-btn .notif-count');
Qué hace exactamente: Busca si ya existe el contador.
Con qué se conecta: Con el botón .notif-btn.
Para qué sirve: Reutilizar o eliminar el badge existente.
Qué pasaría si se quita: No se sabría si ya hay contador.

Línea 178: if (noLeidas > 0) {
Qué hace exactamente: Verifica si hay notificaciones sin leer.
Con qué se conecta: Con noLeidas.
Para qué sirve: Decidir si se muestra contador.
Qué pasaría si se quita: No habría control del estado del badge.

Líneas 179 a 183: Crear badge si no existe
Qué hace exactamente: Si no hay contador, crea un span y lo agrega a la campana.
Con qué se conecta: Con document.createElement y .notif-btn.
Para qué sirve: Mostrar contador visual por primera vez.
Qué pasaría si se quita: Si no existía badge, no se crearía.

Línea 184: badge.textContent = noLeidas;
Qué hace exactamente: Pone el número de no leídas en el badge.
Con qué se conecta: Con noLeidas.
Para qué sirve: Mostrar la cantidad real.
Qué pasaría si se quita: El badge existiría, pero sin número correcto.

Líneas 185 a 187: else remove badge
Qué hace exactamente: Si no hay no leídas, elimina el contador.
Con qué se conecta: Con badge.remove().
Para qué sirve: Evitar mostrar contador en cero.
Qué pasaría si se quita: Podría quedar un badge viejo visible.

Línea 188: }
Qué hace exactamente: Cierra actualizarBadge().
Con qué se conecta: Con línea 176.
Para qué sirve: Finaliza función.
Qué pasaría si se quita: Error de sintaxis.

Línea 190: function cargarNotificaciones() {
Qué hace exactamente: Declara función para pedir notificaciones al servidor.
Con qué se conecta: Con NotificacionController.php.
Para qué sirve: Cargar datos reales de notificaciones.
Qué pasaría si se quita: El panel no podría obtener notificaciones.

Línea 191: fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
Qué hace exactamente: Envía una petición GET al controlador.
Con qué se conecta: Con NOTIF_URL.
Para qué sirve: Pedir notificaciones del usuario actual.
Qué pasaría si se quita: No se haría la solicitud al servidor.

Línea 192: .then(function(r) { return r.json(); })
Qué hace exactamente: Convierte la respuesta en JSON.
Con qué se conecta: Con la respuesta del controlador.
Para qué sirve: Poder leer data.ok, data.notificaciones y data.no_leidas.
Qué pasaría si se quita: No se podría manejar la respuesta como objeto.

Líneas 193 a 198: Procesamiento de respuesta
Qué hace exactamente: Si data.ok es verdadero, renderiza notificaciones y actualiza badge.
Con qué se conecta: Con renderNotificaciones() y actualizarBadge().
Para qué sirve: Mostrar datos recibidos.
Qué pasaría si se quita: La respuesta se recibiría, pero no se mostraría.

Líneas 199 a 202: catch error
Qué hace exactamente: Si falla la carga, muestra mensaje de error.
Con qué se conecta: Con notifList.
Para qué sirve: Informar que no se pudieron cargar notificaciones.
Qué pasaría si se quita: Los errores quedarían silenciosos.

Línea 203: }
Qué hace exactamente: Cierra cargarNotificaciones().
Con qué se conecta: Con línea 190.
Para qué sirve: Finaliza función.
Qué pasaría si se quita: Error de sintaxis.

Línea 205: window.toggleNotifPanel = function() {
Qué hace exactamente: Crea una función global para abrir/cerrar el panel.
Con qué se conecta: Con onclick="toggleNotifPanel()" en la campana.
Para qué sirve: Permitir que el botón de notificaciones use esta función.
Qué pasaría si se quita: La campana no abriría el panel.

Líneas 206 a 209: Abrir/cerrar overlay y cargar notificaciones
Qué hace exactamente: Busca notifOverlay, alterna la clase visible y carga notificaciones si se abrió.
Con qué se conecta: Con notifOverlay y cargarNotificaciones().
Para qué sirve: Mostrar el panel actualizado.
Qué pasaría si se quita: El panel no se abriría o no cargaría datos.

Línea 210: };
Qué hace exactamente: Cierra la función toggleNotifPanel.
Con qué se conecta: Con línea 205.
Para qué sirve: Finaliza la función global.
Qué pasaría si se quita: Error de sintaxis.

Línea 212: window.cerrarNotifPanel = function() {
Qué hace exactamente: Crea una función global para cerrar notificaciones.
Con qué se conecta: Con botón X, Escape y footer.php.
Para qué sirve: Ocultar el panel desde diferentes lugares.
Qué pasaría si se quita: No se podría cerrar el panel por función.

Líneas 213 a 214: Quitar clase visible
Qué hace exactamente: Busca notifOverlay y quita notif-overlay-visible.
Con qué se conecta: Con CSS del overlay.
Para qué sirve: Ocultar el panel.
Qué pasaría si se quita: La función no cerraría nada.

Línea 215: };
Qué hace exactamente: Cierra cerrarNotifPanel.
Con qué se conecta: Con línea 212.
Para qué sirve: Finalizar función.
Qué pasaría si se quita: Error de sintaxis.

Línea 217: window.marcarTodasLeidas = function() {
Qué hace exactamente: Declara función global para marcar todas las notificaciones como leídas.
Con qué se conecta: Con el botón btnMarcarLeidas.
Para qué sirve: Enviar acción masiva al controlador.
Qué pasaría si se quita: El botón “Marcar todas como leídas” no funcionaría.

Líneas 218 a 221: FormData y fetch POST marcar_leidas
Qué hace exactamente: Crea datos con accion=marcar_leidas, envía POST y recarga notificaciones.
Con qué se conecta: Con NotificacionController.php.
Para qué sirve: Actualizar el estado de lectura en base de datos.
Qué pasaría si se quita: No se marcarían como leídas.

Línea 222: };
Qué hace exactamente: Cierra marcarTodasLeidas.
Con qué se conecta: Con línea 217.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Error de sintaxis.

Línea 224: window.marcarUnaLeida = function(id) {
Qué hace exactamente: Declara función para marcar una notificación específica como leída.
Con qué se conecta: Con el enlace “Ver →” de cada notificación.
Para qué sirve: Marcar como leída al abrir una notificación.
Qué pasaría si se quita: Las notificaciones individuales no cambiarían a leídas al abrirse.

Líneas 225 a 228: FormData y fetch POST marcar_una
Qué hace exactamente: Envía accion=marcar_una e id_notificacion al controlador.
Con qué se conecta: Con NotificacionController.php.
Para qué sirve: Actualizar una sola notificación.
Qué pasaría si se quita: No se actualizaría esa notificación en base de datos.

Línea 229: };
Qué hace exactamente: Cierra marcarUnaLeida.
Con qué se conecta: Con línea 224.
Para qué sirve: Finaliza función.
Qué pasaría si se quita: Error de sintaxis.

Líneas 231 a 241: Evento click fuera del panel
Qué hace exactamente: Detecta clics en el documento y cierra el panel si el clic fue fuera del panel y fuera del botón campana.
Con qué se conecta: Con notifOverlay, notifPanel y notif-btn.
Para qué sirve: Mejorar la experiencia de usuario cerrando el panel al hacer clic fuera.
Qué pasaría si se quita: El panel solo se cerraría con X o Escape.

Líneas 243 a 246: Evento Escape
Qué hace exactamente: Cierra el panel de notificaciones al presionar Escape.
Con qué se conecta: Con cerrarNotifPanel().
Para qué sirve: Permitir cierre rápido por teclado.
Qué pasaría si se quita: Escape no cerraría el panel desde este archivo.

Líneas 248 a 254: Fetch inicial del badge
Qué hace exactamente: Al cargar la página, pide notificaciones y actualiza solo el contador.
Con qué se conecta: Con NotificacionController.php y actualizarBadge().
Para qué sirve: Mostrar el número de no leídas sin abrir el panel.
Qué pasaría si se quita: La campana no mostraría contador al iniciar.

Líneas 256 a 264: setInterval cada 60 segundos
Qué hace exactamente: Cada minuto consulta notificaciones y actualiza el badge.
Con qué se conecta: Con NotificacionController.php.
Para qué sirve: Mantener actualizado el contador sin recargar la página.
Qué pasaría si se quita: El contador podría quedar desactualizado hasta recargar.

Línea 266: })();
Qué hace exactamente: Cierra y ejecuta la función autoejecutable.
Con qué se conecta: Con línea 101.
Para qué sirve: Activa toda la lógica de notificaciones al cargar el archivo.
Qué pasaría si se quita: El bloque no se ejecutaría correctamente.

Línea 267: </script>
Qué hace exactamente: Cierra el bloque JavaScript.
Con qué se conecta: Con <script> de la línea 100.
Para qué sirve: Finaliza la lógica de notificaciones.
Qué pasaría si se quita: El navegador podría interpretar mal el documento.

Conclusión:
sidebar.php es el archivo que construye la estructura inicial del panel administrativo. Abre el HTML, carga estilos, muestra el sidebar, genera el menú dinámicamente según $items, marca el módulo activo con $modulo_activo, construye la topbar, abre el contenedor principal de contenido y añade el sistema global de notificaciones conectado con NotificacionController.php. Este archivo se complementa directamente con footer.php, porque sidebar.php abre la estructura y footer.php la cierra.