Líneas 1 a 3: Comentario VARIABLES
Qué hace exactamente: Indica que empieza la sección de variables CSS.
Con qué se conecta: Con todas las reglas que usan var(--nombre-variable).
Para qué sirve: Organizar los colores, medidas, sombras y fuente principal del sistema.
Qué pasaría si se quita: El CSS funciona igual, pero sería menos claro dónde están las variables.

Línea 4: :root {
Qué hace exactamente: Abre el bloque global de variables CSS.
Con qué se conecta: Con todo el documento CSS.
Para qué sirve: Permite declarar variables reutilizables en todo el dashboard.
Qué pasaría si se quita: Las variables no quedarían declaradas correctamente.

Línea 5: --sidebar-w: 200px;
Qué hace exactamente: Define el ancho del sidebar.
Con qué se conecta: Con .sidebar y .main-wrapper.
Para qué sirve: Hace que el menú lateral mida 200px y que el contenido se corra esa misma distancia.
Qué pasaría si se quita: El ancho del sidebar no tendría una medida centralizada.

Líneas 6 a 14: Variables de colores principales
Qué hace exactamente: Definen colores verdes, azules, amarillos y rojos.
Con qué se conecta: Con botones, badges, alertas, iconos y notificaciones.
Para qué sirve: Mantener colores consistentes en todo el sistema.
Qué pasaría si se quitan: Muchas reglas con var(--green), var(--red), etc., perderían el color.

Líneas 15 a 19: Variables de texto, borde, fondo y blanco
Qué hace exactamente: Definen colores base para texto, texto suave, bordes, fondo general y blanco.
Con qué se conecta: Con body, paneles, tarjetas, tablas, sidebar y topbar.
Para qué sirve: Mantener una identidad visual uniforme.
Qué pasaría si se quitan: El diseño perdería colores base reutilizables.

Línea 20: --shadow: 0 1px 4px rgba(0,0,0,0.08);
Qué hace exactamente: Define una sombra suave reutilizable.
Con qué se conecta: Con .stat-card, .panel y otros contenedores.
Para qué sirve: Dar profundidad visual a tarjetas y paneles.
Qué pasaría si se quita: Los elementos que usen var(--shadow) perderían sombra.

Línea 21: --radius: 12px;
Qué hace exactamente: Define un radio de borde global.
Con qué se conecta: Con tarjetas, paneles y modales.
Para qué sirve: Dar bordes redondeados consistentes.
Qué pasaría si se quita: Los elementos que usen var(--radius) no tendrían ese redondeo.

Línea 22: --font: "Inter", "Segoe UI", sans-serif;
Qué hace exactamente: Define la fuente principal.
Con qué se conecta: Con body.
Para qué sirve: Usar Inter como tipografía principal del sistema.
Qué pasaría si se quita: El sistema usaría otra fuente por defecto.

Línea 23: }
Qué hace exactamente: Cierra el bloque :root.
Con qué se conecta: Con la línea 4.
Para qué sirve: Finalizar la declaración de variables.
Qué pasaría si se quita: El CSS tendría error de estructura.

Líneas 25 a 27: Comentario RESET
Qué hace exactamente: Indica que empieza la sección de reinicio de estilos.
Con qué se conecta: Con las reglas globales de la línea 28.
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: No afecta el funcionamiento.

Línea 28: *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
Qué hace exactamente: Aplica a todos los elementos, y a sus pseudo-elementos, un modelo de caja más controlado y elimina márgenes/rellenos por defecto.
Con qué se conecta: Con todo el HTML del sistema.
Para qué sirve: Evita diferencias visuales entre navegadores.
Qué pasaría si se quita: Los elementos podrían tener márgenes o tamaños inesperados.

Líneas 30 a 36: body
Qué hace exactamente: Define fuente, fondo, color de texto, display flex y altura mínima.
Con qué se conecta: Con toda la página HTML.
Para qué sirve: Hace que el layout se organice con sidebar a un lado y contenido al otro.
Qué pasaría si se quita: El diseño general del panel podría romperse.

Línea 38: a { text-decoration: none; color: inherit; }
Qué hace exactamente: Quita subrayado a enlaces y hace que hereden el color del elemento padre.
Con qué se conecta: Con enlaces del sidebar, topbar, alertas y botones tipo enlace.
Para qué sirve: Mantener diseño limpio.
Qué pasaría si se quita: Los enlaces aparecerían subrayados y con color azul por defecto.

Líneas 40 a 42: Comentario SIDEBAR
Qué hace exactamente: Marca la sección de estilos del menú lateral.
Con qué se conecta: Con sidebar.php.
Para qué sirve: Organizar los estilos del sidebar.
Qué pasaría si se quita: No afecta ejecución.

Líneas 43 a 55: .sidebar
Qué hace exactamente: Define ancho, fondo, borde, posición fija, altura completa y animación del menú lateral.
Con qué se conecta: Con <aside class="sidebar" id="sidebar"> en sidebar.php.
Para qué sirve: Mantener el menú fijo al lado izquierdo.
Qué pasaría si se quita: El sidebar perdería su estructura fija.

Líneas 57 a 67: .sidebar-logo
Qué hace exactamente: Alinea logo y texto, agrega padding, borde inferior, fuente y color verde.
Con qué se conecta: Con el div sidebar-logo de sidebar.php.
Para qué sirve: Mostrar la identidad AgroFinca en la parte superior del menú.
Qué pasaría si se quita: El logo se vería desordenado.

Líneas 69 a 73: .sidebar-logo-img
Qué hace exactamente: Define tamaño y ajuste de la imagen del logo.
Con qué se conecta: Con la etiqueta img del logo.
Para qué sirve: Evitar que el logo se vea demasiado grande o deformado.
Qué pasaría si se quita: La imagen podría tener tamaño incorrecto.

Líneas 75 a 81: .sidebar-nav
Qué hace exactamente: Organiza los enlaces del menú en columna y permite scroll vertical.
Con qué se conecta: Con <nav class="sidebar-nav">.
Para qué sirve: Permite que el menú tenga muchas opciones sin romper la pantalla.
Qué pasaría si se quita: Los enlaces podrían desbordarse.

Líneas 83 a 96: .nav-item
Qué hace exactamente: Estiliza cada enlace del menú con flex, gap, padding, color, margen, radio y transición.
Con qué se conecta: Con cada <a class="nav-item"> generado en sidebar.php.
Para qué sirve: Dar apariencia de opción de menú.
Qué pasaría si se quita: Los módulos se verían como enlaces normales.

Líneas 98 a 101: .nav-item:hover
Qué hace exactamente: Cambia fondo y color cuando el usuario pasa el mouse.
Con qué se conecta: Con enlaces del sidebar.
Para qué sirve: Dar respuesta visual al usuario.
Qué pasaría si se quita: El menú no tendría efecto hover.

Líneas 103 a 106: .nav-item.active
Qué hace exactamente: Da fondo verde y texto blanco al módulo activo.
Con qué se conecta: Con la clase active que agrega sidebar.php usando $modulo_activo.
Para qué sirve: Indicar en qué módulo está el usuario.
Qué pasaría si se quita: El usuario no sabría visualmente qué sección está activa.

Líneas 108 a 112: .nav-icon
Qué hace exactamente: Define tamaño, ancho y alineación del icono del menú.
Con qué se conecta: Con <span class="nav-icon">.
Para qué sirve: Alinear iconos de todos los módulos.
Qué pasaría si se quita: Los iconos podrían quedar desalineados.

Líneas 115 a 121: .main-wrapper
Qué hace exactamente: Corre el contenido principal a la derecha del sidebar y lo organiza en columna.
Con qué se conecta: Con <div class="main-wrapper"> en sidebar.php.
Para qué sirve: Evita que el contenido quede debajo del sidebar.
Qué pasaría si se quita: El contenido podría quedar tapado por el menú lateral.

Líneas 125 a 137: .topbar
Qué hace exactamente: Define la barra superior con fondo blanco, borde inferior, altura, flex, posición sticky y z-index.
Con qué se conecta: Con <header class="topbar">.
Para qué sirve: Mantener la barra superior visible al hacer scroll.
Qué pasaría si se quita: La topbar perdería su diseño y posición fija superior.

Líneas 139 a 146: .menu-toggle
Qué hace exactamente: Oculta inicialmente el botón del menú móvil y define su estilo.
Con qué se conecta: Con el botón ☰ de sidebar.php.
Para qué sirve: Mostrarlo solo en pantallas pequeñas mediante media query.
Qué pasaría si se quita: El botón podría verse siempre o sin estilo.

Líneas 148 a 152: .topbar-title
Qué hace exactamente: Define peso, tamaño y flex del título superior.
Con qué se conecta: Con “Sistema de Gestión de Finca”.
Para qué sirve: Ocupa el espacio disponible entre botón y controles del usuario.
Qué pasaría si se quita: El título podría quedar mal alineado.

Líneas 154 a 158: .topbar-right
Qué hace exactamente: Alinea rol, notificaciones, perfil y logout en fila.
Con qué se conecta: Con el contenedor derecho de la topbar.
Para qué sirve: Organizar los controles superiores.
Qué pasaría si se quita: Los controles podrían verse desordenados.

Líneas 160 a 167: .badge-rol
Qué hace exactamente: Estiliza la etiqueta de rol Administrador.
Con qué se conecta: Con <span class="badge-rol">.
Para qué sirve: Mostrar el rol con apariencia de badge verde.
Qué pasaría si se quita: El rol se vería como texto normal.

Líneas 169 a 180: .topbar-user y hover
Qué hace exactamente: Estiliza el enlace al perfil y cambia color/fondo al pasar el mouse.
Con qué se conecta: Con <a class="topbar-user">.
Para qué sirve: Mostrar el usuario actual como botón de perfil.
Qué pasaría si se quita: El perfil se vería como enlace básico.

Líneas 183 a 187: Estilos legacy de perfil
Qué hace exactamente: Ocultan clases antiguas de perfil que ya no se usan.
Con qué se conecta: Con posibles versiones anteriores del topbar.
Para qué sirve: Mantener compatibilidad sin mostrar elementos viejos.
Qué pasaría si se quita: Si algún HTML antiguo usa esas clases, podrían aparecer elementos no deseados.

Líneas 189 a 202: .topbar-user-btn y hover
Qué hace exactamente: Define estilo para un botón de usuario alternativo.
Con qué se conecta: Con componentes antiguos o alternativos de perfil.
Para qué sirve: Compatibilidad visual.
Qué pasaría si se quita: Solo afectaría si alguna vista usa topbar-user-btn.

Líneas 204 a 214: .btn-logout y hover
Qué hace exactamente: Estiliza el botón de cerrar sesión con fondo oscuro, texto blanco y hover.
Con qué se conecta: Con <a class="btn-logout"> en sidebar.php.
Para qué sirve: Mostrar el cierre de sesión como botón visible.
Qué pasaría si se quita: El logout se vería como enlace normal.

Líneas 216 a 241: Botón y contador de notificaciones
Qué hace exactamente: Estiliza el wrapper, la campana y el contador rojo.
Con qué se conecta: Con .notif-wrapper, .notif-btn y .notif-count de sidebar.php.
Para qué sirve: Mostrar notificaciones no leídas en la topbar.
Qué pasaría si se quita: La campana y el contador perderían diseño.

Líneas 243 a 256: .notif-overlay
Qué hace exactamente: Crea el fondo oscuro de pantalla completa para el panel de notificaciones.
Con qué se conecta: Con <div id="notifOverlay">.
Para qué sirve: Mostrar un overlay cuando se abre la campana.
Qué pasaría si se quita: El panel no tendría fondo ni posicionamiento correcto.

Líneas 258 a 260: .notif-overlay.notif-overlay-visible
Qué hace exactamente: Cambia display a flex cuando el overlay debe verse.
Con qué se conecta: Con JavaScript toggleNotifPanel().
Para qué sirve: Mostrar u ocultar el panel.
Qué pasaría si se quita: El panel no aparecería aunque JS agregue la clase.

Líneas 263 a 276: .notif-panel
Qué hace exactamente: Define caja blanca, ancho, altura máxima, sombra, flex y animación del panel.
Con qué se conecta: Con <div id="notifPanel">.
Para qué sirve: Mostrar las notificaciones en una ventana elegante.
Qué pasaría si se quita: Las notificaciones perderían contenedor visual.

Líneas 278 a 281: @keyframes notifSlideIn
Qué hace exactamente: Define animación de entrada del panel.
Con qué se conecta: Con animation: notifSlideIn.
Para qué sirve: Hacer que el panel aparezca suavemente.
Qué pasaría si se quita: El panel aparecería sin animación.

Líneas 284 a 292: .notif-panel-header
Qué hace exactamente: Organiza la cabecera del panel de notificaciones.
Con qué se conecta: Con notif-panel-header de sidebar.php.
Para qué sirve: Separar título, subtítulo y botones.
Qué pasaría si se quita: La cabecera se vería desordenada.

Líneas 294 a 311: Título y subtítulo del panel
Qué hace exactamente: Define tamaño, peso, color y separación de h2 y p.
Con qué se conecta: Con “Notificaciones” y notifSubtitulo.
Para qué sirve: Mejorar lectura del encabezado.
Qué pasaría si se quita: Usaría estilos por defecto.

Líneas 313 a 343: Botones del panel de notificaciones
Qué hace exactamente: Estiliza botón “Marcar todas como leídas” y botón cerrar.
Con qué se conecta: Con btnMarcarLeidas y btn-cerrar-notif.
Para qué sirve: Hacer claras las acciones del panel.
Qué pasaría si se quita: Los botones se verían básicos.

Líneas 346 a 368: .notif-list y .notif-item
Qué hace exactamente: Da scroll a la lista y estilo a cada notificación.
Con qué se conecta: Con los elementos generados por JavaScript en sidebar.php.
Para qué sirve: Mostrar notificaciones ordenadas, separadas y con hover.
Qué pasaría si se quita: La lista no tendría estructura visual.

Líneas 371 a 385: Iconos por tipo de notificación
Qué hace exactamente: Crea círculos para iconos y colores según error, warning, success o info.
Con qué se conecta: Con clases notif-tipo-error, notif-tipo-warning, notif-tipo-success y notif-tipo-info.
Para qué sirve: Diferenciar visualmente cada tipo de mensaje.
Qué pasaría si se quita: Todas las notificaciones se verían iguales.

Líneas 388 a 390: Fondos para notificaciones no leídas
Qué hace exactamente: Aplica fondos suaves a notificaciones sin leer.
Con qué se conecta: Con la clase notif-unread.
Para qué sirve: Resaltar mensajes pendientes.
Qué pasaría si se quita: No habría diferencia visual entre leídas y no leídas.

Líneas 392 a 415: Cuerpo, mensaje, tiempo y vacío de notificaciones
Qué hace exactamente: Define flex del cuerpo, tamaño de mensaje, tiempo y mensaje vacío.
Con qué se conecta: Con notif-item-body, notif-msg, notif-time y notif-empty.
Para qué sirve: Mantener legibilidad dentro del panel.
Qué pasaría si se quita: Los textos podrían verse mal alineados.

Líneas 417 a 439: Contenido y encabezado de página
Qué hace exactamente: Define padding del contenido principal y estilos de page-header.
Con qué se conecta: Con <main class="content"> y encabezados de dashboard.php.
Para qué sirve: Dar espacio interior y estilo a títulos.
Qué pasaría si se quita: El contenido quedaría pegado a los bordes.

Líneas 441 a 451: .cards-grid
Qué hace exactamente: Crea una cuadrícula de cuatro columnas para tarjetas.
Con qué se conecta: Con tarjetas estadísticas del dashboard.
Para qué sirve: Mostrar indicadores en filas ordenadas.
Qué pasaría si se quita: Las tarjetas no se organizarían en grid.

Líneas 453 a 466: .stat-card
Qué hace exactamente: Estiliza cada tarjeta estadística con fondo, borde, radio, padding, flex y sombra.
Con qué se conecta: Con las tarjetas del dashboard.
Para qué sirve: Mostrar métricas como bloques visuales.
Qué pasaría si se quita: Las estadísticas perderían diseño.

Líneas 468 a 471: .stat-card:hover
Qué hace exactamente: Aumenta la sombra al pasar el mouse.
Con qué se conecta: Con tarjetas estadísticas.
Para qué sirve: Dar interacción visual.
Qué pasaría si se quita: No habría efecto hover.

Líneas 473 a 490: .stat-info, .stat-label y .stat-value
Qué hace exactamente: Organiza texto de la tarjeta, etiqueta y número grande.
Con qué se conecta: Con datos estadísticos del dashboard.
Para qué sirve: Diferenciar título y valor numérico.
Qué pasaría si se quita: Las métricas serían menos claras.

Líneas 492 a 506: .stat-icon y variantes de color
Qué hace exactamente: Crea contenedor de iconos y colores según tipo.
Con qué se conecta: Con iconos de tarjetas.
Para qué sirve: Identificar visualmente cada métrica.
Qué pasaría si se quita: Los iconos perderían estilo.

Líneas 508 a 528: .bottom-grid y .panel
Qué hace exactamente: Crea dos columnas inferiores y paneles blancos.
Con qué se conecta: Con alertas y notificaciones recientes del dashboard.
Para qué sirve: Organizar secciones inferiores.
Qué pasaría si se quita: Las secciones se verían sin estructura.

Líneas 530 a 541: .panel-title y .alerta
Qué hace exactamente: Define título de panel y estilo base de alertas.
Con qué se conecta: Con paneles de alertas del dashboard.
Para qué sirve: Mostrar mensajes importantes con diseño uniforme.
Qué pasaría si se quita: Las alertas se verían simples.

Líneas 543 a 569: Variantes de alertas y links
Qué hace exactamente: Define colores para alerta error, warning, info y ok, además de enlaces.
Con qué se conecta: Con alertas generadas por dashboard.php.
Para qué sirve: Diferenciar visualmente tipos de alertas.
Qué pasaría si se quita: Las alertas no tendrían colores por prioridad.

Líneas 571 a 606: Notificaciones recientes
Qué hace exactamente: Estiliza filas recientes, mensajes, hora y enlaces.
Con qué se conecta: Con sección de notificaciones recientes del dashboard.
Para qué sirve: Mostrar avisos recientes en forma ordenada.
Qué pasaría si se quita: Esa sección perdería diseño.

Líneas 608 a 649: Responsive
Qué hace exactamente: Cambia layout según tamaño de pantalla.
Con qué se conecta: Con sidebar, cards-grid, bottom-grid, topbar y content.
Para qué sirve: Adaptar el dashboard a tablets y celulares.
Qué pasaría si se quita: El sistema se vería mal en pantallas pequeñas.

Líneas 612 a 614:
Qué hace exactamente: En pantallas menores a 1100px, las tarjetas pasan de 4 columnas a 2.
Con qué se conecta: Con .cards-grid.
Para qué sirve: Evitar que las tarjetas queden muy estrechas.
Qué pasaría si se quita: En pantallas medianas podrían verse comprimidas.

Líneas 616 a 638:
Qué hace exactamente: En pantallas menores a 768px, oculta sidebar hacia la izquierda, elimina margen del main-wrapper, muestra botón de menú y ajusta grids.
Con qué se conecta: Con toggleSidebar() de footer.php.
Para qué sirve: Hacer el panel usable en móviles.
Qué pasaría si se quita: El sidebar ocuparía espacio y el contenido quedaría mal en celular.

Líneas 640 a 649:
Qué hace exactamente: En pantallas menores a 480px, tarjetas pasan a una columna, reduce valor estadístico y oculta badge de rol.
Con qué se conecta: Con dashboard móvil.
Para qué sirve: Optimizar para teléfonos pequeños.
Qué pasaría si se quita: La vista móvil se vería saturada.

Líneas 651 a 655: Comentario animación de escritura
Qué hace exactamente: Explica la animación typing-active.
Con qué se conecta: Con JavaScript de footer.php.
Para qué sirve: Documentar el efecto visual cuando el usuario escribe.
Qué pasaría si se quita: La animación funciona igual, pero se entiende menos.

Líneas 656 a 660: @keyframes typingPulse
Qué hace exactamente: Define una animación de borde verde pulsante.
Con qué se conecta: Con input.typing-active, textarea.typing-active y select.typing-active.
Para qué sirve: Mostrar visualmente que el usuario está escribiendo.
Qué pasaría si se quita: No habría animación.

Líneas 662 a 668: input.typing-active, textarea.typing-active, select.typing-active
Qué hace exactamente: Aplica la animación, borde verde y elimina outline.
Con qué se conecta: Con la clase que JavaScript agrega en footer.php.
Para qué sirve: Activar el efecto en campos de formulario.
Qué pasaría si se quita: JavaScript agregaría la clase, pero no habría efecto visible.

Conclusión:
dashboard.css es la hoja principal del panel administrativo. Define variables globales, resetea estilos, diseña sidebar, topbar, notificaciones, contenido principal, tarjetas estadísticas, alertas, diseño responsive y la animación de escritura. Se conecta directamente con sidebar.php, footer.php y dashboard.php, además de servir como base visual para muchas vistas del administrador.