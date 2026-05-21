# Documentación línea por línea: `views/trabajador/solicitar_herramienta.php`

Archivo documentado: `solicitar_herramienta.php`. Propósito general: Módulo Solicitar Herramienta del trabajador. Esta documentación está organizada por bloques para no enredar el flujo, pero cada línea de código queda explicada completa en una sola entrada continua: qué hace, con qué se conecta, por qué importa y qué pasa si se quita. No se documentan las líneas que son únicamente comentarios del código original.

Trazabilidad general: esta vista permite al trabajador solicitar herramientas. Depende de la sesión iniciada, de `config/database.php`, del modelo `models/TrabajadorSolicitudHerramienta.php`, del controlador `controllers/TrabajadorSolicitudHerramientaController.php` para registrar solicitudes, del CSS base `styles/dashboard.css`, del panel `includes/notificaciones_panel.php` y del inventario de herramientas disponible.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 1: <code>&lt;?php</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 6: <code>session_start();</code> → inicia o reanuda la sesión del usuario para poder leer `$_SESSION`; se conecta con el login, con `id_usuario`, `rol` y `username`; si se quita, el archivo no puede saber quién está logueado y la protección de ruta podría fallar.

Línea 7: <code>if (!isset($_SESSION[&#x27;id_usuario&#x27;]) || $_SESSION[&#x27;rol&#x27;] !== &#x27;TRABAJADOR&#x27;) {</code> → valida que exista un usuario autenticado y que su rol sea `TRABAJADOR`; se conecta con los datos guardados por el login en `$_SESSION`; si se quita, cualquier usuario sin permiso podría entrar a esta vista del trabajador.

Línea 8: <code>    header(&quot;Location: ../../views/usuarios/login.php&quot;); exit;</code> → redirige al login cuando la validación de sesión falla; se conecta con `views/usuarios/login.php`; si se quita, el usuario no autorizado no sería enviado fuera de la página y podría quedar viendo una pantalla insegura o rota.

Línea 9: <code>}</code> → cierra el bloque lógico anterior; se conecta con la estructura `if`, `foreach`, `try`, `catch`, función o regla que esté abierta justo antes; si se quita, el archivo queda con llaves desbalanceadas y puede romper PHP, JavaScript o CSS según el bloque.

Línea 11: <code>require_once __DIR__ . &#x27;/../../config/database.php&#x27;;</code> → carga una sola vez la clase `Database`; se conecta con `config/database.php`, que contiene el método para abrir la conexión; si se quita, `new Database()` no existiría y no se podrían consultar datos de la base de datos.

Línea 12: <code>require_once __DIR__ . &#x27;/../../models/TrabajadorSolicitudHerramienta.php&#x27;;</code> → carga el modelo `TrabajadorSolicitudHerramienta` que contiene las consultas propias de esta vista; se conecta con `models/TrabajadorSolicitudHerramienta.php` y con la conexión `$db`; si se quita, no se podría crear `$model` ni traer la información que se muestra en pantalla.

Línea 14: <code>$db            = (new Database())-&gt;conectar();</code> → crea la conexión a la base de datos usando la clase `Database`; se conecta con `config/database.php` y con los modelos que necesitan ejecutar consultas SQL; si se quita, el modelo no recibe conexión y la vista no puede obtener datos reales.

Línea 15: <code>$model         = new TrabajadorSolicitudHerramienta($db);</code> → instancia el modelo `TrabajadorSolicitudHerramienta` y le entrega la conexión `$db`; se conecta con la capa de datos encargada de consultar tablas del sistema; si se quita, la vista no tendría objeto para pedir información al sistema.

Línea 16: <code>$herramientas  = $model-&gt;listarHerramientas();</code> → consulta las herramientas disponibles para llenar el selector del formulario; se conecta con `TrabajadorSolicitudHerramienta::listarHerramientas()` y con las opciones del `<select>`; si se quita, el trabajador no tendría herramientas para elegir.

Línea 17: <code>?&gt;</code> → cierra el bloque PHP inicial y permite que el archivo continúe escribiendo HTML normal; se conecta con todo el marcado que viene después porque libera la salida hacia el navegador; si se quita en este punto, el HTML podría quedar mezclado dentro de PHP y producir errores de sintaxis.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 18: <code>&lt;!DOCTYPE html&gt;</code> → declara que el documento usa HTML5; se conecta con el navegador para que interprete correctamente la página; si se quita, algunos navegadores podrían activar modos antiguos de renderizado.

Línea 19: <code>&lt;html lang=&quot;es&quot;&gt;</code> → abre el documento HTML e indica que el idioma principal es español; se conecta con accesibilidad, traducción automática y SEO básico; si se quita, la estructura raíz de la página quedaría inválida.

Línea 20: <code>&lt;head&gt;</code> → abre la sección técnica de la página donde se cargan metadatos, título, estilos y fuentes; se conecta con el navegador antes de pintar el cuerpo; si se quita, esos recursos quedarían mal ubicados.

Línea 21: <code>  &lt;meta charset=&quot;UTF-8&quot;/&gt;</code> → define la codificación UTF-8 para que tildes, ñ e iconos se vean correctamente; se conecta con todo el texto del sistema; si se quita, podrían aparecer caracteres dañados.

Línea 22: <code>  &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;</code> → configura la escala responsive para móviles; se conecta con los estilos CSS y media queries; si se quita, la página puede verse demasiado pequeña o mal ajustada en celular.

Línea 23: <code>  &lt;title&gt;Solicitar Herramienta - AgroFinca&lt;/title&gt;</code> → define el título que aparece en la pestaña del navegador; se conecta con la identidad de esta vista; si se quita, la pestaña no mostraría un nombre claro para el usuario.

Línea 24: <code>  &lt;link rel=&quot;stylesheet&quot; href=&quot;styles/dashboard.css&quot;/&gt;</code> → carga la hoja de estilos base del dashboard; se conecta con clases como `sidebar`, `topbar`, `content` y botones comunes; si se quita, la vista perdería gran parte del diseño general.

Línea 25: <code>  &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.googleapis.com&quot;/&gt;</code> → prepara la conexión con Google Fonts para cargar la fuente más rápido; se conecta con el enlace de fuente `Inter`; si se quita, la fuente puede tardar más en descargarse.

Línea 26: <code>  &lt;link href=&quot;https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap&quot; rel=&quot;stylesheet&quot;/&gt;</code> → carga la familia tipográfica Inter con varios pesos; se conecta con el diseño visual del sistema; si se quita, el navegador usará una fuente por defecto y cambiará la apariencia.

Línea 27: <code>&lt;/head&gt;</code> → cierra la sección técnica del documento; se conecta con el inicio del cuerpo; si se quita, el HTML queda mal estructurado.

Línea 28: <code>&lt;body&gt;</code> → abre el cuerpo visible de la página; se conecta con todo lo que el usuario ve e interactúa; si se quita, el documento pierde su contenedor visual principal.


## Bloque 3: Sidebar o menú lateral del trabajador

Línea 31: <code>&lt;aside class=&quot;sidebar&quot; id=&quot;sidebar&quot;&gt;</code> → abre el menú lateral del trabajador y le asigna el id `sidebar`; se conecta con `toggleSidebar()` en JavaScript y con los estilos de navegación; si se quita, el usuario pierde el menú lateral.

Línea 32: <code>  &lt;div class=&quot;sidebar-logo&quot;&gt;</code> → crea el contenedor del logo dentro del menú lateral; se conecta con el estilo visual de marca; si se quita, la barra lateral quedaría sin encabezado institucional.

Línea 33: <code>    &lt;img src=&quot;../../img/logo.png&quot; alt=&quot;AgroFinca&quot; class=&quot;sidebar-logo-img&quot;/&gt;</code> → crea el contenedor del logo dentro del menú lateral; se conecta con el estilo visual de marca; si se quita, la barra lateral quedaría sin encabezado institucional.

Línea 34: <code>    &lt;span&gt;AgroFinca&lt;/span&gt;</code> → muestra el nombre de la aplicación al lado del logo; se conecta con el encabezado del sidebar; si se quita, el menú queda menos identificable para el usuario.

Línea 35: <code>  &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 36: <code>  &lt;nav class=&quot;sidebar-nav&quot;&gt;</code> → abre la navegación del menú lateral; se conecta con los enlaces a módulos del trabajador; si se quita, los accesos del menú no quedan agrupados correctamente.

Línea 37: <code>    &lt;a href=&quot;dashboard.php&quot;             class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;⊞&lt;/span&gt; Dashboard&lt;/a&gt;</code> → crea el enlace hacia el dashboard del trabajador; se conecta con `views/trabajador/dashboard.php`; si se quita, el usuario pierde acceso directo al resumen principal.

Línea 38: <code>    &lt;a href=&quot;mis_tareas.php&quot;            class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;📋&lt;/span&gt; Mis Tareas&lt;/a&gt;</code> → crea el enlace hacia Mis Tareas; se conecta con esta vista de tareas del trabajador; si se quita, el usuario no podría navegar fácilmente a sus tareas desde el sidebar.

Línea 39: <code>    &lt;a href=&quot;mis_prestamos.php&quot;         class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;🔑&lt;/span&gt; Mis Préstamos&lt;/a&gt;</code> → crea el enlace hacia Mis Préstamos; se conecta con el módulo de herramientas prestadas; si se quita, el trabajador pierde acceso rápido a sus préstamos.

Línea 40: <code>    &lt;a href=&quot;solicitar_herramienta.php&quot; class=&quot;nav-item active&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;+&lt;/span&gt; Solicitar Herramienta&lt;/a&gt;</code> → crea el enlace hacia Solicitar Herramienta; se conecta con el módulo donde el trabajador pide herramientas; si se quita, se rompe la navegación rápida hacia solicitudes.

Línea 41: <code>  &lt;/nav&gt;</code> → cierra el grupo de navegación lateral; se conecta con el `<nav>` abierto antes; si se quita, el HTML del sidebar queda incompleto.

Línea 42: <code>&lt;/aside&gt;</code> → cierra el menú lateral; se conecta con el `<aside>` inicial; si se quita, el resto de la página podría quedar dentro del sidebar por error.


## Bloque 4: Contenedor principal, barra superior, usuario, notificaciones y cierre de sesión

Línea 45: <code>&lt;div class=&quot;main-wrapper&quot;&gt;</code> → abre el contenedor principal que envuelve topbar y contenido; se conecta con el CSS base del dashboard; si se quita, la distribución entre menú y contenido puede romperse.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 48: <code>  &lt;header class=&quot;topbar&quot;&gt;</code> → abre la sección técnica de la página donde se cargan metadatos, título, estilos y fuentes; se conecta con el navegador antes de pintar el cuerpo; si se quita, esos recursos quedarían mal ubicados.

Línea 49: <code>    &lt;button class=&quot;menu-toggle&quot; onclick=&quot;toggleSidebar()&quot; aria-label=&quot;Abrir menú&quot;&gt;☰&lt;/button&gt;</code> → crea el botón hamburguesa que abre o cierra el sidebar en pantallas pequeñas; se conecta con `toggleSidebar()` y el id `sidebar`; si se quita, en móvil sería más difícil abrir el menú.


## Bloque 4: Contenedor principal, barra superior, usuario, notificaciones y cierre de sesión

Línea 50: <code>    &lt;div class=&quot;topbar-title&quot;&gt;Sistema de Gestión de Finca&lt;/div&gt;</code> → muestra el nombre general del sistema en la barra superior; se conecta con la identidad visual de AgroFinca; si se quita, la cabecera queda menos clara.

Línea 51: <code>    &lt;div class=&quot;topbar-right&quot;&gt;</code> → abre el contenedor derecho de la barra superior; se conecta con rol, campana, usuario y salida; si se quita, esos elementos pierden su agrupación y alineación.

Línea 52: <code>      &lt;span class=&quot;badge-rol&quot;&gt;Trabajador&lt;/span&gt;</code> → muestra visualmente el rol `Trabajador`; se conecta con la protección PHP que exige ese rol; si se quita, el usuario pierde una pista visual de su tipo de cuenta.

Línea 53: <code>      &lt;div class=&quot;notif-wrapper&quot;&gt;</code> → agrupa el botón de notificaciones; se conecta con el panel incluido al final y con `toggleNotifPanel()`; si se quita, la campana puede quedar sin posición o sin contenedor.

Línea 54: <code>        &lt;button type=&quot;button&quot; class=&quot;notif-btn&quot; onclick=&quot;toggleNotifPanel()&quot; aria-label=&quot;Notificaciones&quot;&gt;🔔&lt;/button&gt;</code> → crea el botón de campana para abrir notificaciones; se conecta con `toggleNotifPanel()` del panel incluido; si se quita, el trabajador no podría abrir sus notificaciones desde esta vista.

Línea 55: <code>      &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 56: <code>      &lt;a href=&quot;perfil.php&quot; class=&quot;topbar-user&quot; title=&quot;Mi perfil&quot;&gt;</code> → crea el enlace al perfil del trabajador; se conecta con `perfil.php` y con el nombre de usuario de la sesión; si se quita, el usuario pierde acceso rápido a su perfil.

Línea 57: <code>        👤 &lt;?= htmlspecialchars($_SESSION[&#x27;username&#x27;]) ?&gt;</code> → imprime el username de la sesión escapado para evitar HTML malicioso; se conecta con el login que guardó `$_SESSION['username']`; si se quita, no se mostraría el usuario logueado.

Línea 58: <code>      &lt;/a&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 59: <code>      &lt;a href=&quot;../../controllers/LogoutController.php&quot; class=&quot;btn-logout&quot;&gt;↪ Cerrar sesión&lt;/a&gt;</code> → crea el enlace de cierre de sesión hacia `LogoutController.php`; se conecta con el controlador que destruye la sesión; si se quita, el usuario no tendría forma visible de salir.

Línea 60: <code>    &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 61: <code>  &lt;/header&gt;</code> → cierra la sección técnica del documento; se conecta con el inicio del cuerpo; si se quita, el HTML queda mal estructurado.

Línea 63: <code>  &lt;main class=&quot;content&quot;&gt;</code> → abre el área principal del contenido de la vista; se conecta con los estilos `content`; si se quita, el contenido perdería el contenedor que controla márgenes y ancho.


## Bloque 5: Cabecera visual de Solicitar Herramienta

Línea 66: <code>    &lt;div style=&quot;margin-bottom:24px;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 67: <code>      &lt;h1 style=&quot;font-size:22px;font-weight:700;color:#111827;margin:0 0 4px;&quot;&gt;Solicitar Herramienta&lt;/h1&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 68: <code>      &lt;p style=&quot;font-size:14px;color:#6b7280;margin:0;&quot;&gt;Envía una solicitud de herramienta al mayordomo&lt;/p&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 69: <code>    &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 6: Mensaje global de retroalimentación

Línea 72: <code>    &lt;div id=&quot;msgGlobal&quot; style=&quot;display:none;padding:12px 16px;border-radius:8px;margin-bottom:20px;font-size:14px;font-weight:500;&quot;&gt;&lt;/div&gt;</code> → crea un contenedor oculto para mensajes de éxito o error; se conecta con JavaScript que cambia su texto y estilos; si se quita, el usuario no vería respuesta después de completar tareas, editar perfil o enviar solicitudes.

Línea 75: <code>    &lt;div class=&quot;sh-panel&quot;&gt;</code> → crea el panel visual del formulario de solicitud; se conecta con los estilos `sh-*`; si se quita, el formulario perdería su contenedor y diseño.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 76: <code>      &lt;form id=&quot;formSolicitud&quot; onsubmit=&quot;enviarSolicitud(event)&quot;&gt;</code> → abre el formulario de solicitud y lo conecta con `enviarSolicitud(event)`; se conecta con el controlador de solicitudes por JavaScript; si se quita, el trabajador no podría enviar solicitudes.

Línea 77: <code>        &lt;input type=&quot;hidden&quot; name=&quot;accion&quot; value=&quot;solicitar&quot;&gt;</code> → envía el valor oculto `solicitar` al backend; se conecta con `TrabajadorSolicitudHerramientaController.php`; si se quita, el controlador no sabría qué acción procesar.

Línea 80: <code>        &lt;div class=&quot;sh-campo&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 81: <code>          &lt;label class=&quot;sh-label&quot; for=&quot;sHerramienta&quot;&gt;Herramienta *&lt;/label&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 82: <code>          &lt;select id=&quot;sHerramienta&quot; name=&quot;id_herramienta&quot; class=&quot;sh-select&quot; required&gt;</code> → crea el selector obligatorio de herramienta; se conecta con `$herramientas` y con el JavaScript que valida disponibilidad; si se quita, el usuario no podría elegir qué herramienta necesita.

Línea 83: <code>            &lt;option value=&quot;&quot;&gt;Seleccionar herramienta&lt;/option&gt;</code> → crea una opción inicial vacía para obligar al usuario a seleccionar una herramienta real; se conecta con el atributo `required`; si se quita, podría quedar preseleccionada una opción sin intención clara.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 84: <code>            &lt;?php foreach ($herramientas as $h): ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 85: <code>              &lt;option value=&quot;&lt;?= $h[&#x27;id_herramienta&#x27;] ?&gt;&quot;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 86: <code>                      data-disponible=&quot;&lt;?= $h[&#x27;cantidad_total&#x27;] ?&gt;&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 87: <code>                &lt;?= htmlspecialchars($h[&#x27;nombre&#x27;]) ?&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 88: <code>                (&lt;?= $h[&#x27;cantidad_total&#x27;] ?&gt; disponibles)</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 89: <code>              &lt;/option&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 90: <code>            &lt;?php endforeach; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 91: <code>            &lt;?php if (empty($herramientas)): ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 92: <code>              &lt;option value=&quot;&quot; disabled&gt;No hay herramientas disponibles&lt;/option&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 93: <code>            &lt;?php endif; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 94: <code>          &lt;/select&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 95: <code>        &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 98: <code>        &lt;div class=&quot;sh-campo&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 99: <code>          &lt;label class=&quot;sh-label&quot; for=&quot;sCantidad&quot;&gt;Cantidad *&lt;/label&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 100: <code>          &lt;input type=&quot;number&quot; id=&quot;sCantidad&quot; name=&quot;cantidad&quot;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 101: <code>                 class=&quot;sh-input&quot; min=&quot;1&quot; placeholder=&quot;Ingresa la cantidad&quot; required&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 102: <code>          &lt;span id=&quot;cantidadHint&quot; class=&quot;sh-hint&quot;&gt;&lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 103: <code>        &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 106: <code>        &lt;div class=&quot;sh-campo&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 107: <code>          &lt;label class=&quot;sh-label&quot; for=&quot;sObs&quot;&gt;Observación (Opcional)&lt;/label&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 108: <code>          &lt;textarea id=&quot;sObs&quot; name=&quot;observacion&quot; class=&quot;sh-textarea&quot; rows=&quot;4&quot;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 109: <code>                    placeholder=&quot;Describe para qué necesitas la herramienta...&quot;&gt;&lt;/textarea&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 110: <code>        &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 113: <code>        &lt;button type=&quot;submit&quot; class=&quot;sh-btn-enviar&quot; id=&quot;btnEnviar&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 114: <code>          ✈ Enviar Solicitud</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 115: <code>        &lt;/button&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 116: <code>      &lt;/form&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 117: <code>    &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 8: Panel informativo para el trabajador

Línea 120: <code>    &lt;div class=&quot;sh-info-panel&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 121: <code>      &lt;h3 class=&quot;sh-info-titulo&quot;&gt;Información&lt;/h3&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 122: <code>      &lt;ul class=&quot;sh-info-lista&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 4: Contenedor principal, barra superior, usuario, notificaciones y cierre de sesión

Línea 123: <code>        &lt;li&gt;Tu solicitud será enviada al mayordomo y recibirás una notificación cuando sea aprobada o rechazada.&lt;/li&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 8: Panel informativo para el trabajador

Línea 124: <code>        &lt;li&gt;Solo puedes solicitar la cantidad de herramientas disponibles en el inventario.&lt;/li&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 125: <code>        &lt;li&gt;Recuerda devolver las herramientas en buen estado al finalizar tu jornada.&lt;/li&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 126: <code>      &lt;/ul&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 127: <code>    &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 129: <code>  &lt;/main&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 130: <code>&lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 9: Estilos CSS propios de la vista

Línea 132: <code>&lt;style&gt;</code> → abre un bloque de estilos internos propios de esta vista; se conecta con las clases usadas en el HTML del mismo archivo; si se quita, estos estilos específicos no se aplicarían.

Línea 134: <code>  .sh-panel {</code> → abre la regla CSS para `.sh-panel`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 135: <code>    background: #fff;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 136: <code>    border: 1px solid #e5e7eb;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 137: <code>    border-radius: 12px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 138: <code>    padding: 28px 32px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 139: <code>    margin-bottom: 20px;</code> → define separación inferior mediante la propiedad CSS `margin-bottom`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 140: <code>    box-shadow: 0 1px 4px rgba(0,0,0,0.06);</code> → agrega sombra para profundidad mediante la propiedad CSS `box-shadow`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 141: <code>    max-width: 640px;</code> → limita el ancho máximo mediante la propiedad CSS `max-width`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 142: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 145: <code>  .sh-campo { margin-bottom: 20px; }</code> → define en una sola línea estilos para `.sh-campo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 147: <code>  .sh-label {</code> → abre la regla CSS para `.sh-label`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 148: <code>    display: block;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 149: <code>    font-size: 14px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 150: <code>    font-weight: 600;</code> → define el grosor del texto mediante la propiedad CSS `font-weight`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 151: <code>    color: #374151;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 152: <code>    margin-bottom: 8px;</code> → define separación inferior mediante la propiedad CSS `margin-bottom`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 153: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 155: <code>  .sh-select,</code> → aplica una propiedad visual mediante la propiedad CSS `.sh-select,`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 156: <code>  .sh-input {</code> → abre la regla CSS para `.sh-input`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 157: <code>    width: 100%;</code> → define el ancho mediante la propiedad CSS `width`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 158: <code>    height: 44px;</code> → define la altura mediante la propiedad CSS `height`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 159: <code>    border: 1px solid #d1d5db;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 160: <code>    border-radius: 8px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 161: <code>    padding: 0 14px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 162: <code>    font-size: 14px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 163: <code>    color: #111827;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 164: <code>    background: #fff;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 165: <code>    outline: none;</code> → controla el contorno de foco mediante la propiedad CSS `outline`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 166: <code>    transition: border-color 0.2s, box-shadow 0.2s;</code> → suaviza cambios visuales mediante la propiedad CSS `transition`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 167: <code>    font-family: inherit;</code> → define la familia de fuente mediante la propiedad CSS `font-family`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 168: <code>    cursor: pointer;</code> → cambia el cursor del mouse mediante la propiedad CSS `cursor`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 169: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 170: <code>  .sh-select:focus,</code> → aplica una propiedad visual mediante la propiedad CSS `.sh-select`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 171: <code>  .sh-input:focus {</code> → abre la regla CSS para `.sh-input:focus`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 172: <code>    border-color: #2e9e4f;</code> → aplica una propiedad visual mediante la propiedad CSS `border-color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 173: <code>    box-shadow: 0 0 0 3px rgba(46,158,79,0.1);</code> → agrega sombra para profundidad mediante la propiedad CSS `box-shadow`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 174: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 176: <code>  .sh-textarea {</code> → abre la regla CSS para `.sh-textarea`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 177: <code>    width: 100%;</code> → define el ancho mediante la propiedad CSS `width`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 178: <code>    border: 1px solid #d1d5db;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 179: <code>    border-radius: 8px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 180: <code>    padding: 12px 14px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 181: <code>    font-size: 14px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 182: <code>    color: #111827;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 183: <code>    background: #fff;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 184: <code>    outline: none;</code> → controla el contorno de foco mediante la propiedad CSS `outline`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 185: <code>    transition: border-color 0.2s, box-shadow 0.2s;</code> → suaviza cambios visuales mediante la propiedad CSS `transition`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 186: <code>    font-family: inherit;</code> → define la familia de fuente mediante la propiedad CSS `font-family`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 187: <code>    resize: vertical;</code> → controla si el textarea puede redimensionarse mediante la propiedad CSS `resize`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 188: <code>    min-height: 100px;</code> → define altura mínima mediante la propiedad CSS `min-height`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 189: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 190: <code>  .sh-textarea:focus {</code> → abre la regla CSS para `.sh-textarea:focus`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 191: <code>    border-color: #2e9e4f;</code> → aplica una propiedad visual mediante la propiedad CSS `border-color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 192: <code>    box-shadow: 0 0 0 3px rgba(46,158,79,0.1);</code> → agrega sombra para profundidad mediante la propiedad CSS `box-shadow`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 193: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 196: <code>  .sh-hint {</code> → abre la regla CSS para `.sh-hint`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 197: <code>    display: block;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 198: <code>    font-size: 12px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 199: <code>    color: #9ca3af;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 200: <code>    margin-top: 5px;</code> → aplica una propiedad visual mediante la propiedad CSS `margin-top`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 201: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 204: <code>  .sh-btn-enviar {</code> → abre la regla CSS para `.sh-btn-enviar`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 205: <code>    width: 100%;</code> → define el ancho mediante la propiedad CSS `width`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 206: <code>    background: #2e9e4f;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 207: <code>    color: #fff;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 208: <code>    border: none;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 209: <code>    border-radius: 8px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 210: <code>    padding: 14px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 211: <code>    font-size: 15px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 212: <code>    font-weight: 700;</code> → define el grosor del texto mediante la propiedad CSS `font-weight`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 213: <code>    cursor: pointer;</code> → cambia el cursor del mouse mediante la propiedad CSS `cursor`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 214: <code>    transition: background 0.2s, opacity 0.2s;</code> → suaviza cambios visuales mediante la propiedad CSS `transition`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 215: <code>    display: flex;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 216: <code>    align-items: center;</code> → alinea elementos en el eje transversal mediante la propiedad CSS `align-items`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 217: <code>    justify-content: center;</code> → distribuye elementos en el eje principal mediante la propiedad CSS `justify-content`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 218: <code>    gap: 8px;</code> → define separación entre hijos mediante la propiedad CSS `gap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 219: <code>    margin-top: 8px;</code> → aplica una propiedad visual mediante la propiedad CSS `margin-top`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 220: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 221: <code>  .sh-btn-enviar:hover    { background: #237a3d; }</code> → define en una sola línea estilos para `.sh-btn-enviar:hover`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 222: <code>  .sh-btn-enviar:disabled { opacity: 0.6; cursor: not-allowed; }</code> → define en una sola línea estilos para `.sh-btn-enviar:disabled`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 8: Panel informativo para el trabajador

Línea 225: <code>  .sh-info-panel {</code> → abre la regla CSS para `.sh-info-panel`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 226: <code>    background: #f8fafc;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 227: <code>    border: 1px solid #e2e8f0;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 228: <code>    border-radius: 12px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 229: <code>    padding: 20px 24px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 230: <code>    max-width: 640px;</code> → limita el ancho máximo mediante la propiedad CSS `max-width`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 231: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 8: Panel informativo para el trabajador

Línea 232: <code>  .sh-info-titulo {</code> → abre la regla CSS para `.sh-info-titulo`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 233: <code>    font-size: 15px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 234: <code>    font-weight: 700;</code> → define el grosor del texto mediante la propiedad CSS `font-weight`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 235: <code>    color: #111827;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 236: <code>    margin: 0 0 12px;</code> → aplica una propiedad visual mediante la propiedad CSS `margin`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 237: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 8: Panel informativo para el trabajador

Línea 238: <code>  .sh-info-lista {</code> → abre la regla CSS para `.sh-info-lista`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 239: <code>    list-style: none;</code> → controla viñetas de listas mediante la propiedad CSS `list-style`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 240: <code>    padding: 0;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 241: <code>    margin: 0;</code> → aplica una propiedad visual mediante la propiedad CSS `margin`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 242: <code>    display: flex;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 243: <code>    flex-direction: column;</code> → define dirección de elementos flex mediante la propiedad CSS `flex-direction`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 244: <code>    gap: 8px;</code> → define separación entre hijos mediante la propiedad CSS `gap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 245: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 8: Panel informativo para el trabajador

Línea 246: <code>  .sh-info-lista li {</code> → abre la regla CSS para `.sh-info-lista li`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 247: <code>    font-size: 13px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 248: <code>    color: #475569;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 249: <code>    padding-left: 16px;</code> → aplica una propiedad visual mediante la propiedad CSS `padding-left`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 250: <code>    position: relative;</code> → define el tipo de posicionamiento mediante la propiedad CSS `position`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 251: <code>    line-height: 1.5;</code> → define altura de línea mediante la propiedad CSS `line-height`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 252: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 8: Panel informativo para el trabajador

Línea 253: <code>  .sh-info-lista li::before {</code> → abre la regla CSS para `.sh-info-lista li::before`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 254: <code>    content: &#x27;•&#x27;;</code> → aplica una propiedad visual mediante la propiedad CSS `content`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 255: <code>    position: absolute;</code> → define el tipo de posicionamiento mediante la propiedad CSS `position`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 256: <code>    left: 0;</code> → posiciona desde la izquierda mediante la propiedad CSS `left`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 257: <code>    color: #2e9e4f;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 258: <code>    font-weight: 700;</code> → define el grosor del texto mediante la propiedad CSS `font-weight`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 259: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 261: <code>  @media (max-width: 600px) {</code> → abre una regla responsive para pantallas pequeñas; se conecta con el diseño móvil de la vista; si se quita, la pantalla puede verse mal en celulares.


## Bloque 8: Panel informativo para el trabajador

Línea 262: <code>    .sh-panel, .sh-info-panel { padding: 20px 16px; }</code> → define en una sola línea estilos para `.sh-panel, .sh-info-panel`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 263: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 264: <code>&lt;/style&gt;</code> → cierra el bloque de CSS interno; se conecta con el `<style>` abierto antes; si se quita, el navegador podría interpretar mal el resto del documento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 266: <code>&lt;script&gt;</code> → abre el bloque JavaScript que se ejecutará en el navegador; se conecta con botones, formularios, ids del HTML y controladores PHP por `fetch`; si se quita, la vista pierde interacciones dinámicas.

Línea 267: <code>  function toggleSidebar() {</code> → declara la función que abre o cierra el menú lateral; se conecta con el botón hamburguesa de la topbar; si se quita, ese botón dejaría de funcionar.

Línea 268: <code>    document.getElementById(&#x27;sidebar&#x27;).classList.toggle(&#x27;sidebar-open&#x27;);</code> → agrega o quita la clase `sidebar-open` al elemento `sidebar`; se conecta con CSS responsive del menú; si se quita, el sidebar no cambiaría de estado al hacer clic.

Línea 269: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 272: <code>  document.getElementById(&#x27;sHerramienta&#x27;).addEventListener(&#x27;change&#x27;, function() {</code> → escucha cuando el usuario cambia la herramienta seleccionada; se conecta con el selector `sHerramienta`; si se quita, no se actualizaría el máximo disponible en la cantidad.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 273: <code>    const opt = this.options[this.selectedIndex];</code> → obtiene la opción seleccionada actualmente; se conecta con los atributos `data-disponible` de cada herramienta; si se quita, no se puede leer la disponibilidad elegida.

Línea 274: <code>    const disp = opt?.dataset?.disponible ?? &#x27;&#x27;;</code> → lee de forma segura la cantidad disponible guardada en el option; se conecta con `data-disponible`; si se quita, no habría validación local del inventario.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 275: <code>    const hint = document.getElementById(&#x27;cantidadHint&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.

Línea 276: <code>    const input = document.getElementById(&#x27;sCantidad&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 278: <code>    if (disp) {</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 279: <code>      hint.textContent = `Máximo disponible: ${disp} unidades`;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 280: <code>      input.max = disp;</code> → asigna el máximo permitido al input de cantidad; se conecta con la disponibilidad de la herramienta; si se quita, el navegador no ayudaría a limitar la cantidad.

Línea 281: <code>    } else {</code> → abre el camino alternativo cuando la condición anterior no se cumple; se conecta con errores o casos negativos; si se quita, no habría manejo visual cuando el backend rechaza la operación.

Línea 282: <code>      hint.textContent = &#x27;&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 283: <code>      input.removeAttribute(&#x27;max&#x27;);</code> → quita el máximo cuando no hay herramienta válida seleccionada; se conecta con el campo cantidad; si se quita, podría quedar un límite viejo de otra herramienta.

Línea 284: <code>    }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 285: <code>  });</code> → cierra una función anónima y el registro del evento asociado; se conecta con `addEventListener`; si se quita, el listener queda incompleto y JavaScript falla.

Línea 287: <code>  async function enviarSolicitud(e) {</code> → declara una función asíncrona para enviar datos al servidor sin recargar inmediatamente; se conecta con `fetch`, formularios y controladores PHP; si se quita, esa acción dinámica no existirá.

Línea 288: <code>    e.preventDefault();</code> → evita que el formulario recargue la página de forma tradicional; se conecta con el envío por AJAX; si se quita, el navegador recargaría y se perdería el control del mensaje dinámico.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 289: <code>    const btn = document.getElementById(&#x27;btnEnviar&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 290: <code>    btn.disabled = true;</code> → deshabilita el botón mientras se procesa la acción; se conecta con prevención de doble envío; si se quita, el usuario podría enviar varias veces la misma solicitud.

Línea 291: <code>    btn.textContent = &#x27;Enviando…&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 294: <code>    const sel   = document.getElementById(&#x27;sHerramienta&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 295: <code>    const opt   = sel.options[sel.selectedIndex];</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 296: <code>    const disp  = parseInt(opt?.dataset?.disponible ?? 0);</code> → lee de forma segura la cantidad disponible guardada en el option; se conecta con `data-disponible`; si se quita, no habría validación local del inventario.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 297: <code>    const cant  = parseInt(document.getElementById(&#x27;sCantidad&#x27;).value);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 299: <code>    if (disp &gt; 0 &amp;&amp; cant &gt; disp) {</code> → valida que el trabajador no pida más unidades de las disponibles; se conecta con el inventario cargado en el selector; si se quita, se podrían enviar solicitudes superiores al stock.

Línea 300: <code>      mostrarMsg(`Solo hay ${disp} unidades disponibles de esta herramienta.`, false);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 301: <code>      btn.disabled = false;</code> → vuelve a habilitar el botón después de un error o finalización; se conecta con recuperación de la interfaz; si se quita, el botón podría quedar bloqueado.

Línea 302: <code>      btn.textContent = &#x27;✈ Enviar Solicitud&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 303: <code>      return;</code> → detiene la función en ese punto; se conecta con validaciones previas; si se quita, el código seguiría ejecutándose aunque exista un error.

Línea 304: <code>    }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 306: <code>    const fd = new FormData(e.target);</code> → crea un paquete con los datos del formulario para enviarlo al backend; se conecta con los campos `name` del HTML; si se quita, el controlador no recibiría los datos necesarios.

Línea 307: <code>    try {</code> → abre un bloque para intentar una petición que puede fallar; se conecta con `catch` para manejar errores; si se quita, los fallos de red podrían romper la ejecución sin mensaje claro.

Línea 308: <code>      const res  = await fetch(&#x27;../../controllers/TrabajadorSolicitudHerramientaController.php&#x27;, {</code> → envía una petición HTTP al controlador `TrabajadorSolicitudHerramientaController.php`; se conecta con el backend que actualiza o registra datos en la base de datos; si se quita, la acción del usuario no llegaría al servidor.

Línea 309: <code>        method: &#x27;POST&#x27;, body: fd</code> → configura la petición para enviar datos por POST y adjunta el `FormData`; se conecta con el controlador PHP que lee `$_POST`; si se quita, el backend puede no recibir correctamente la información.

Línea 310: <code>      });</code> → cierra una función anónima y el registro del evento asociado; se conecta con `addEventListener`; si se quita, el listener queda incompleto y JavaScript falla.

Línea 311: <code>      const data = await res.json();</code> → convierte la respuesta del servidor en un objeto JavaScript; se conecta con los campos esperados como `ok`, `msg` o `mensaje`; si se quita, no se podría saber si la operación fue exitosa.

Línea 312: <code>      mostrarMsg(data.msg, data.ok);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 314: <code>      if (data.ok) {</code> → valida si el servidor respondió que la operación fue correcta; se conecta con la respuesta JSON del controlador; si se quita, la vista no distinguiría éxito de error.

Línea 315: <code>        e.target.reset();</code> → limpia los campos del formulario; se conecta con el formulario de contraseña o solicitud; si se quita, podrían quedar valores anteriores escritos.


## Bloque 7: Formulario para solicitar herramienta, cantidad y observación

Línea 316: <code>        document.getElementById(&#x27;cantidadHint&#x27;).textContent = &#x27;&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 317: <code>        btn.textContent = &#x27;✈ Enviar Solicitud&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 318: <code>        btn.disabled    = false;</code> → vuelve a habilitar el botón después de un error o finalización; se conecta con recuperación de la interfaz; si se quita, el botón podría quedar bloqueado.

Línea 319: <code>      } else {</code> → abre el camino alternativo cuando la condición anterior no se cumple; se conecta con errores o casos negativos; si se quita, no habría manejo visual cuando el backend rechaza la operación.

Línea 320: <code>        btn.disabled    = false;</code> → vuelve a habilitar el botón después de un error o finalización; se conecta con recuperación de la interfaz; si se quita, el botón podría quedar bloqueado.

Línea 321: <code>        btn.textContent = &#x27;✈ Enviar Solicitud&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 322: <code>      }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 323: <code>    } catch {</code> → captura errores de conexión o ejecución de la petición; se conecta con el bloque `try`; si se quita, un fallo de red dejaría errores en consola sin avisar al usuario.

Línea 324: <code>      mostrarMsg(&#x27;Error de conexión. Intenta de nuevo.&#x27;, false);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 325: <code>      btn.disabled    = false;</code> → vuelve a habilitar el botón después de un error o finalización; se conecta con recuperación de la interfaz; si se quita, el botón podría quedar bloqueado.

Línea 326: <code>      btn.textContent = &#x27;✈ Enviar Solicitud&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 327: <code>    }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 328: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 330: <code>  function mostrarMsg(texto, ok) {</code> → declara una función reutilizable para mostrar mensajes visuales; se conecta con `msgGlobal`, `msgDatos` o `msgPassword`; si se quita, las respuestas de éxito o error no se mostrarían de forma centralizada.


## Bloque 6: Mensaje global de retroalimentación

Línea 331: <code>    const el = document.getElementById(&#x27;msgGlobal&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 332: <code>    el.textContent   = texto;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 333: <code>    el.style.display = &#x27;block&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 334: <code>    el.style.background = ok ? &#x27;#dcfce7&#x27; : &#x27;#fdecea&#x27;;</code> → cambia el fondo según éxito o error; se conecta con la variable booleana `ok`; si se quita, los mensajes perderían color de estado.

Línea 335: <code>    el.style.color      = ok ? &#x27;#166534&#x27; : &#x27;#b91c1c&#x27;;</code> → cambia el color del texto según éxito o error; se conecta con la variable `ok`; si se quita, el mensaje sería menos claro visualmente.

Línea 336: <code>    el.style.border     = ok ? &#x27;1px solid #bbf7d0&#x27; : &#x27;1px solid #fecaca&#x27;;</code> → cambia el borde del mensaje según éxito o error; se conecta con la función de mensajes; si se quita, el aviso mantiene menos diferenciación visual.

Línea 337: <code>    if (ok) setTimeout(() =&gt; { el.style.display = &#x27;none&#x27;; }, 5000);</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 338: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 339: <code>&lt;/script&gt;</code> → cierra el bloque JavaScript; se conecta con el `<script>` abierto antes; si se quita, el HTML posterior podría interpretarse como JavaScript y fallar.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 341: <code>&lt;?php require_once __DIR__ . &#x27;/includes/notificaciones_panel.php&#x27;; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.


## Bloque 11: Inclusión del panel de notificaciones y cierre del documento

Línea 343: <code>&lt;/body&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 344: <code>&lt;/html&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.
