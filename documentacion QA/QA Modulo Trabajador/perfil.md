# Documentación línea por línea: `views/trabajador/perfil.php`

Archivo documentado: `perfil(5).php`. Propósito general: Módulo Perfil del Trabajador. Esta documentación está organizada por bloques para no enredar el flujo, pero cada línea de código queda explicada completa en una sola entrada continua: qué hace, con qué se conecta, por qué importa y qué pasa si se quita. No se documentan las líneas que son únicamente comentarios del código original.

Trazabilidad general: esta vista permite al trabajador consultar y actualizar datos de perfil. Depende de la sesión iniciada, de `config/database.php`, del modelo `models/Perfil.php`, del controlador `controllers/PerfilController.php` para actualizar datos y contraseña, del CSS base `styles/dashboard.css`, del panel `includes/notificaciones_panel.php` y de la navegación del módulo trabajador.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 1: <code>&lt;?php</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 8: <code>session_start();</code> → inicia o reanuda la sesión del usuario para poder leer `$_SESSION`; se conecta con el login, con `id_usuario`, `rol` y `username`; si se quita, el archivo no puede saber quién está logueado y la protección de ruta podría fallar.

Línea 9: <code>if (!isset($_SESSION[&#x27;id_usuario&#x27;]) || $_SESSION[&#x27;rol&#x27;] !== &#x27;TRABAJADOR&#x27;) {</code> → valida que exista un usuario autenticado y que su rol sea `TRABAJADOR`; se conecta con los datos guardados por el login en `$_SESSION`; si se quita, cualquier usuario sin permiso podría entrar a esta vista del trabajador.

Línea 10: <code>    header(&quot;Location: ../../views/usuarios/login.php&quot;); exit;</code> → redirige al login cuando la validación de sesión falla; se conecta con `views/usuarios/login.php`; si se quita, el usuario no autorizado no sería enviado fuera de la página y podría quedar viendo una pantalla insegura o rota.

Línea 11: <code>}</code> → cierra el bloque lógico anterior; se conecta con la estructura `if`, `foreach`, `try`, `catch`, función o regla que esté abierta justo antes; si se quita, el archivo queda con llaves desbalanceadas y puede romper PHP, JavaScript o CSS según el bloque.

Línea 13: <code>require_once __DIR__ . &#x27;/../../config/database.php&#x27;;</code> → carga una sola vez la clase `Database`; se conecta con `config/database.php`, que contiene el método para abrir la conexión; si se quita, `new Database()` no existiría y no se podrían consultar datos de la base de datos.

Línea 14: <code>require_once __DIR__ . &#x27;/../../models/Perfil.php&#x27;;</code> → carga el modelo `Perfil` que contiene las consultas propias de esta vista; se conecta con `models/Perfil.php` y con la conexión `$db`; si se quita, no se podría crear `$model` ni traer la información que se muestra en pantalla.

Línea 16: <code>$db    = (new Database())-&gt;conectar();</code> → crea la conexión a la base de datos usando la clase `Database`; se conecta con `config/database.php` y con los modelos que necesitan ejecutar consultas SQL; si se quita, el modelo no recibe conexión y la vista no puede obtener datos reales.

Línea 17: <code>$model = new Perfil($db);</code> → instancia el modelo `Perfil` y le entrega la conexión `$db`; se conecta con la capa de datos encargada de consultar tablas del sistema; si se quita, la vista no tendría objeto para pedir información al sistema.

Línea 18: <code>$user  = $model-&gt;obtener((int) $_SESSION[&#x27;id_usuario&#x27;]);</code> → consulta los datos completos del usuario autenticado; se conecta con `Perfil::obtener()` y con los campos del formulario de perfil; si se quita, la vista no sabría qué nombre, documento, teléfono, rol o estado mostrar.

Línea 20: <code>if (!$user) {</code> → verifica que el modelo sí haya encontrado un usuario válido; se conecta con la consulta anterior a `Perfil::obtener()`; si se quita, la vista podría intentar usar datos inexistentes y generar errores o mostrar información vacía.

Línea 21: <code>    header(&quot;Location: ../../views/usuarios/login.php&quot;); exit;</code> → redirige al login cuando la validación de sesión falla; se conecta con `views/usuarios/login.php`; si se quita, el usuario no autorizado no sería enviado fuera de la página y podría quedar viendo una pantalla insegura o rota.

Línea 22: <code>}</code> → cierra el bloque lógico anterior; se conecta con la estructura `if`, `foreach`, `try`, `catch`, función o regla que esté abierta justo antes; si se quita, el archivo queda con llaves desbalanceadas y puede romper PHP, JavaScript o CSS según el bloque.

Línea 24: <code>$fechaCreacion = new DateTime($user[&#x27;fecha_creacion&#x27;]);</code> → convierte la fecha de creación del usuario en un objeto `DateTime`; se conecta con el campo `fecha_creacion` de la base de datos; si se quita, no se puede formatear correctamente la fecha de miembro desde.


## Bloque 9: Estado de la cuenta, fecha de membresía, usuario y rol

Línea 25: <code>$miembroDesde  = $fechaCreacion-&gt;format(&#x27;d/m/Y&#x27;);</code> → formatea la fecha de creación como día/mes/año para mostrarla amigable; se conecta con `$fechaCreacion` y con la sección de estado del perfil; si se quita, la tarjeta no mostraría la fecha de membresía en formato claro.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 26: <code>$iniciales     = strtoupper(substr($user[&#x27;nombres&#x27;],0,1) . substr($user[&#x27;apellidos&#x27;],0,1));</code> → construye las iniciales del trabajador usando la primera letra de nombres y apellidos; se conecta con los datos `$user['nombres']` y `$user['apellidos']` y con el avatar visual; si se quita, el círculo del perfil quedaría vacío o sin identidad visual.

Línea 27: <code>?&gt;</code> → cierra el bloque PHP inicial y permite que el archivo continúe escribiendo HTML normal; se conecta con todo el marcado que viene después porque libera la salida hacia el navegador; si se quita en este punto, el HTML podría quedar mezclado dentro de PHP y producir errores de sintaxis.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 28: <code>&lt;!DOCTYPE html&gt;</code> → declara que el documento usa HTML5; se conecta con el navegador para que interprete correctamente la página; si se quita, algunos navegadores podrían activar modos antiguos de renderizado.

Línea 29: <code>&lt;html lang=&quot;es&quot;&gt;</code> → abre el documento HTML e indica que el idioma principal es español; se conecta con accesibilidad, traducción automática y SEO básico; si se quita, la estructura raíz de la página quedaría inválida.

Línea 30: <code>&lt;head&gt;</code> → abre la sección técnica de la página donde se cargan metadatos, título, estilos y fuentes; se conecta con el navegador antes de pintar el cuerpo; si se quita, esos recursos quedarían mal ubicados.

Línea 31: <code>  &lt;meta charset=&quot;UTF-8&quot;/&gt;</code> → define la codificación UTF-8 para que tildes, ñ e iconos se vean correctamente; se conecta con todo el texto del sistema; si se quita, podrían aparecer caracteres dañados.

Línea 32: <code>  &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;</code> → configura la escala responsive para móviles; se conecta con los estilos CSS y media queries; si se quita, la página puede verse demasiado pequeña o mal ajustada en celular.

Línea 33: <code>  &lt;title&gt;Mi Perfil - AgroFinca&lt;/title&gt;</code> → define el título que aparece en la pestaña del navegador; se conecta con la identidad de esta vista; si se quita, la pestaña no mostraría un nombre claro para el usuario.

Línea 34: <code>  &lt;link rel=&quot;stylesheet&quot; href=&quot;styles/dashboard.css&quot;/&gt;</code> → carga la hoja de estilos base del dashboard; se conecta con clases como `sidebar`, `topbar`, `content` y botones comunes; si se quita, la vista perdería gran parte del diseño general.

Línea 35: <code>  &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.googleapis.com&quot;/&gt;</code> → prepara la conexión con Google Fonts para cargar la fuente más rápido; se conecta con el enlace de fuente `Inter`; si se quita, la fuente puede tardar más en descargarse.

Línea 36: <code>  &lt;link href=&quot;https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap&quot; rel=&quot;stylesheet&quot;/&gt;</code> → carga la familia tipográfica Inter con varios pesos; se conecta con el diseño visual del sistema; si se quita, el navegador usará una fuente por defecto y cambiará la apariencia.

Línea 37: <code>&lt;/head&gt;</code> → cierra la sección técnica del documento; se conecta con el inicio del cuerpo; si se quita, el HTML queda mal estructurado.

Línea 38: <code>&lt;body&gt;</code> → abre el cuerpo visible de la página; se conecta con todo lo que el usuario ve e interactúa; si se quita, el documento pierde su contenedor visual principal.


## Bloque 3: Sidebar o menú lateral del trabajador

Línea 41: <code>&lt;aside class=&quot;sidebar&quot; id=&quot;sidebar&quot;&gt;</code> → abre el menú lateral del trabajador y le asigna el id `sidebar`; se conecta con `toggleSidebar()` en JavaScript y con los estilos de navegación; si se quita, el usuario pierde el menú lateral.

Línea 42: <code>  &lt;div class=&quot;sidebar-logo&quot;&gt;</code> → crea el contenedor del logo dentro del menú lateral; se conecta con el estilo visual de marca; si se quita, la barra lateral quedaría sin encabezado institucional.

Línea 43: <code>    &lt;img src=&quot;../../img/logo.png&quot; alt=&quot;AgroFinca&quot; class=&quot;sidebar-logo-img&quot;/&gt;</code> → crea el contenedor del logo dentro del menú lateral; se conecta con el estilo visual de marca; si se quita, la barra lateral quedaría sin encabezado institucional.

Línea 44: <code>    &lt;span&gt;AgroFinca&lt;/span&gt;</code> → muestra el nombre de la aplicación al lado del logo; se conecta con el encabezado del sidebar; si se quita, el menú queda menos identificable para el usuario.

Línea 45: <code>  &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 46: <code>  &lt;nav class=&quot;sidebar-nav&quot;&gt;</code> → abre la navegación del menú lateral; se conecta con los enlaces a módulos del trabajador; si se quita, los accesos del menú no quedan agrupados correctamente.

Línea 47: <code>    &lt;a href=&quot;dashboard.php&quot;             class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;⊞&lt;/span&gt; Dashboard&lt;/a&gt;</code> → crea el enlace hacia el dashboard del trabajador; se conecta con `views/trabajador/dashboard.php`; si se quita, el usuario pierde acceso directo al resumen principal.

Línea 48: <code>    &lt;a href=&quot;mis_tareas.php&quot;            class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;📋&lt;/span&gt; Mis Tareas&lt;/a&gt;</code> → crea el enlace hacia Mis Tareas; se conecta con esta vista de tareas del trabajador; si se quita, el usuario no podría navegar fácilmente a sus tareas desde el sidebar.

Línea 49: <code>    &lt;a href=&quot;mis_prestamos.php&quot;         class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;🔑&lt;/span&gt; Mis Préstamos&lt;/a&gt;</code> → crea el enlace hacia Mis Préstamos; se conecta con el módulo de herramientas prestadas; si se quita, el trabajador pierde acceso rápido a sus préstamos.

Línea 50: <code>    &lt;a href=&quot;solicitar_herramienta.php&quot; class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;+&lt;/span&gt; Solicitar Herramienta&lt;/a&gt;</code> → crea el enlace hacia Solicitar Herramienta; se conecta con el módulo donde el trabajador pide herramientas; si se quita, se rompe la navegación rápida hacia solicitudes.

Línea 51: <code>  &lt;/nav&gt;</code> → cierra el grupo de navegación lateral; se conecta con el `<nav>` abierto antes; si se quita, el HTML del sidebar queda incompleto.

Línea 52: <code>&lt;/aside&gt;</code> → cierra el menú lateral; se conecta con el `<aside>` inicial; si se quita, el resto de la página podría quedar dentro del sidebar por error.


## Bloque 4: Contenedor principal, barra superior, usuario, notificaciones y cierre de sesión

Línea 55: <code>&lt;div class=&quot;main-wrapper&quot;&gt;</code> → abre el contenedor principal que envuelve topbar y contenido; se conecta con el CSS base del dashboard; si se quita, la distribución entre menú y contenido puede romperse.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 58: <code>  &lt;header class=&quot;topbar&quot;&gt;</code> → abre la sección técnica de la página donde se cargan metadatos, título, estilos y fuentes; se conecta con el navegador antes de pintar el cuerpo; si se quita, esos recursos quedarían mal ubicados.

Línea 59: <code>    &lt;button class=&quot;menu-toggle&quot; onclick=&quot;toggleSidebar()&quot; aria-label=&quot;Abrir menú&quot;&gt;☰&lt;/button&gt;</code> → crea el botón hamburguesa que abre o cierra el sidebar en pantallas pequeñas; se conecta con `toggleSidebar()` y el id `sidebar`; si se quita, en móvil sería más difícil abrir el menú.


## Bloque 4: Contenedor principal, barra superior, usuario, notificaciones y cierre de sesión

Línea 60: <code>    &lt;div class=&quot;topbar-title&quot;&gt;Sistema de Gestión de Finca&lt;/div&gt;</code> → muestra el nombre general del sistema en la barra superior; se conecta con la identidad visual de AgroFinca; si se quita, la cabecera queda menos clara.

Línea 61: <code>    &lt;div class=&quot;topbar-right&quot;&gt;</code> → abre el contenedor derecho de la barra superior; se conecta con rol, campana, usuario y salida; si se quita, esos elementos pierden su agrupación y alineación.

Línea 62: <code>      &lt;span class=&quot;badge-rol&quot;&gt;Trabajador&lt;/span&gt;</code> → muestra visualmente el rol `Trabajador`; se conecta con la protección PHP que exige ese rol; si se quita, el usuario pierde una pista visual de su tipo de cuenta.

Línea 63: <code>      &lt;div class=&quot;notif-wrapper&quot;&gt;</code> → agrupa el botón de notificaciones; se conecta con el panel incluido al final y con `toggleNotifPanel()`; si se quita, la campana puede quedar sin posición o sin contenedor.

Línea 64: <code>        &lt;button type=&quot;button&quot; class=&quot;notif-btn&quot; onclick=&quot;toggleNotifPanel()&quot; aria-label=&quot;Notificaciones&quot;&gt;🔔&lt;/button&gt;</code> → crea el botón de campana para abrir notificaciones; se conecta con `toggleNotifPanel()` del panel incluido; si se quita, el trabajador no podría abrir sus notificaciones desde esta vista.

Línea 65: <code>      &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 66: <code>      &lt;a href=&quot;perfil.php&quot; class=&quot;topbar-user&quot; title=&quot;Mi perfil&quot;&gt;</code> → crea el enlace al perfil del trabajador; se conecta con `perfil.php` y con el nombre de usuario de la sesión; si se quita, el usuario pierde acceso rápido a su perfil.

Línea 67: <code>        👤 &lt;?= htmlspecialchars($_SESSION[&#x27;username&#x27;]) ?&gt;</code> → imprime el username de la sesión escapado para evitar HTML malicioso; se conecta con el login que guardó `$_SESSION['username']`; si se quita, no se mostraría el usuario logueado.

Línea 68: <code>      &lt;/a&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 69: <code>      &lt;a href=&quot;../../controllers/LogoutController.php&quot; class=&quot;btn-logout&quot;&gt;↪ Cerrar sesión&lt;/a&gt;</code> → crea el enlace de cierre de sesión hacia `LogoutController.php`; se conecta con el controlador que destruye la sesión; si se quita, el usuario no tendría forma visible de salir.

Línea 70: <code>    &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 71: <code>  &lt;/header&gt;</code> → cierra la sección técnica del documento; se conecta con el inicio del cuerpo; si se quita, el HTML queda mal estructurado.

Línea 73: <code>  &lt;main class=&quot;content&quot;&gt;</code> → abre el área principal del contenido de la vista; se conecta con los estilos `content`; si se quita, el contenido perdería el contenedor que controla márgenes y ancho.


## Bloque 5: Mensaje global de retroalimentación

Línea 75: <code>    &lt;div id=&quot;msgGlobal&quot; style=&quot;display:none;padding:10px 16px;border-radius:8px;margin-bottom:16px;font-size:14px;font-weight:500;&quot;&gt;&lt;/div&gt;</code> → crea un contenedor oculto para mensajes de éxito o error; se conecta con JavaScript que cambia su texto y estilos; si se quita, el usuario no vería respuesta después de completar tareas, editar perfil o enviar solicitudes.


## Bloque 6: Tarjeta de perfil, banner, avatar, nombre y botón de edición

Línea 77: <code>    &lt;div class=&quot;prf-card&quot;&gt;</code> → crea la tarjeta principal del perfil; se conecta con los estilos `prf-*` y contiene toda la información del usuario; si se quita, el perfil pierde su contenedor central.

Línea 80: <code>      &lt;div class=&quot;prf-banner&quot;&gt;&lt;/div&gt;</code> → crea el banner superior decorativo del perfil; se conecta con el diseño visual de la tarjeta; si se quita, no afecta datos pero la vista pierde presentación.

Línea 83: <code>      &lt;div class=&quot;prf-header&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 84: <code>        &lt;div class=&quot;prf-avatar-wrap&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 85: <code>          &lt;div class=&quot;prf-avatar&quot; id=&quot;avatarCircle&quot;&gt;&lt;?= htmlspecialchars($iniciales) ?&gt;&lt;/div&gt;</code> → muestra el avatar con iniciales escapadas; se conecta con `$iniciales` calculado en PHP; si se quita, el perfil pierde identificación visual rápida.

Línea 86: <code>        &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 87: <code>        &lt;div class=&quot;prf-header-info&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 88: <code>          &lt;h1 class=&quot;prf-nombre&quot; id=&quot;displayNombre&quot;&gt;</code> → muestra el nombre completo del usuario y deja un id para actualizarlo con JavaScript; se conecta con `$user['nombres']`, `$user['apellidos']` y `submitDatos()`; si se quita, no se vería el nombre principal del perfil.

Línea 89: <code>            &lt;?= htmlspecialchars($user[&#x27;nombres&#x27;] . &#x27; &#x27; . $user[&#x27;apellidos&#x27;]) ?&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 90: <code>          &lt;/h1&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 91: <code>          &lt;p class=&quot;prf-meta&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 92: <code>            &lt;span class=&quot;prf-meta-rol&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 93: <code>              &lt;svg width=&quot;14&quot; height=&quot;14&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#2e9e4f&quot; stroke-width=&quot;2.5&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 94: <code>                &lt;path d=&quot;M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z&quot;/&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 95: <code>              &lt;/svg&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.


## Bloque 9: Estado de la cuenta, fecha de membresía, usuario y rol

Línea 96: <code>              &lt;?= htmlspecialchars(ucfirst(strtolower($user[&#x27;rol&#x27;]))) ?&gt;</code> → muestra el rol con formato legible; se conecta con `$user['rol']`; si se quita, el perfil perdería la información de rol o mostraría datos sin formato.

Línea 97: <code>            &lt;/span&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.


## Bloque 6: Tarjeta de perfil, banner, avatar, nombre y botón de edición

Línea 98: <code>            &lt;span class=&quot;prf-meta-sep&quot;&gt;•&lt;/span&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 99: <code>            &lt;span&gt;Finca AgroFinca&lt;/span&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 100: <code>          &lt;/p&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 101: <code>        &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 102: <code>        &lt;button class=&quot;prf-btn-editar&quot; id=&quot;btnEditarPerfil&quot; onclick=&quot;toggleEdicion()&quot;&gt;Editar Perfil&lt;/button&gt;</code> → crea el botón que activa o desactiva la edición del perfil; se conecta con `toggleEdicion()`; si se quita, los campos quedarían de solo lectura sin forma visible de editarlos.

Línea 103: <code>      &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 106: <code>      &lt;div class=&quot;prf-body&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 109: <code>        &lt;div class=&quot;prf-col&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 110: <code>          &lt;h2 class=&quot;prf-seccion-titulo&quot;&gt;Información Personal&lt;/h2&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.


## Bloque 7: Formulario de información personal editable

Línea 111: <code>          &lt;form id=&quot;formDatos&quot; onsubmit=&quot;submitDatos(event)&quot;&gt;</code> → abre el formulario de datos personales y evita recarga mediante `submitDatos(event)`; se conecta con `PerfilController.php` por fetch; si se quita, no habría formulario para actualizar nombres, apellidos, documento o teléfono.

Línea 112: <code>            &lt;input type=&quot;hidden&quot; name=&quot;accion&quot; value=&quot;actualizar_datos&quot;&gt;</code> → envía al controlador la acción `actualizar_datos`; se conecta con `PerfilController.php` para distinguir este formulario del cambio de contraseña; si se quita, el controlador no sabría qué operación ejecutar.

Línea 114: <code>            &lt;div class=&quot;prf-campo&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 115: <code>              &lt;label class=&quot;prf-label&quot;&gt;Nombre Completo&lt;/label&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 116: <code>              &lt;div class=&quot;prf-input-wrap&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 117: <code>                &lt;svg class=&quot;prf-input-icon&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 118: <code>                  &lt;path d=&quot;M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2&quot;/&gt;&lt;circle cx=&quot;12&quot; cy=&quot;7&quot; r=&quot;4&quot;/&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 119: <code>                &lt;/svg&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 120: <code>                &lt;div class=&quot;prf-nombre-grid&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 121: <code>                  &lt;input type=&quot;text&quot; id=&quot;fNombres&quot;   name=&quot;nombres&quot;   value=&quot;&lt;?= htmlspecialchars($user[&#x27;nombres&#x27;]) ?&gt;&quot;   placeholder=&quot;Nombres&quot;   class=&quot;prf-input&quot; readonly&gt;</code> → crea un campo editable de nombres o apellidos cargado desde `$user`; se conecta con el formulario de perfil y con `submitDatos()`; si se quita, el usuario no podría ver ni modificar esa parte de su nombre.

Línea 122: <code>                  &lt;input type=&quot;text&quot; id=&quot;fApellidos&quot; name=&quot;apellidos&quot; value=&quot;&lt;?= htmlspecialchars($user[&#x27;apellidos&#x27;]) ?&gt;&quot; placeholder=&quot;Apellidos&quot; class=&quot;prf-input&quot; readonly&gt;</code> → crea un campo editable de nombres o apellidos cargado desde `$user`; se conecta con el formulario de perfil y con `submitDatos()`; si se quita, el usuario no podría ver ni modificar esa parte de su nombre.

Línea 123: <code>                &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 124: <code>              &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 125: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 127: <code>            &lt;div class=&quot;prf-campo&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 128: <code>              &lt;label class=&quot;prf-label&quot;&gt;Documento&lt;/label&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 129: <code>              &lt;div class=&quot;prf-input-wrap&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 130: <code>                &lt;svg class=&quot;prf-input-icon&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 131: <code>                  &lt;rect x=&quot;2&quot; y=&quot;5&quot; width=&quot;20&quot; height=&quot;14&quot; rx=&quot;2&quot;/&gt;&lt;line x1=&quot;2&quot; y1=&quot;10&quot; x2=&quot;22&quot; y2=&quot;10&quot;/&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 132: <code>                &lt;/svg&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 133: <code>                &lt;input type=&quot;text&quot; id=&quot;fDocumento&quot; name=&quot;documento&quot; value=&quot;&lt;?= htmlspecialchars($user[&#x27;documento&#x27;]) ?&gt;&quot; placeholder=&quot;Número de documento&quot; class=&quot;prf-input&quot; readonly&gt;</code> → crea el campo del documento del usuario cargado desde la base de datos; se conecta con `$user['documento']`; si se quita, el perfil pierde un dato de identificación importante.

Línea 134: <code>              &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 135: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 137: <code>            &lt;div class=&quot;prf-campo&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 138: <code>              &lt;label class=&quot;prf-label&quot;&gt;Teléfono&lt;/label&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 139: <code>              &lt;div class=&quot;prf-input-wrap&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 140: <code>                &lt;svg class=&quot;prf-input-icon&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;currentColor&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 141: <code>                  &lt;path d=&quot;M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.18 2 2 0 0 1 3.6 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z&quot;/&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 142: <code>                &lt;/svg&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 143: <code>                &lt;input type=&quot;text&quot; id=&quot;fTelefono&quot; name=&quot;telefono&quot; value=&quot;&lt;?= htmlspecialchars($user[&#x27;telefono&#x27;] ?? &#x27;&#x27;) ?&gt;&quot; placeholder=&quot;+57 300 000 0000&quot; class=&quot;prf-input&quot; readonly&gt;</code> → crea el campo del teléfono usando valor vacío si no existe; se conecta con `$user['telefono']`; si se quita, el trabajador no podría ver ni actualizar su teléfono.

Línea 144: <code>              &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 145: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 147: <code>            &lt;div id=&quot;accionesDatos&quot; style=&quot;display:none;margin-top:16px;&quot;&gt;</code> → crea el bloque oculto de acciones para guardar o cancelar edición; se conecta con `toggleEdicion()`; si se quita, al activar edición no aparecerían botones para guardar o cancelar.

Línea 148: <code>              &lt;div id=&quot;msgDatos&quot; style=&quot;display:none;padding:8px 12px;border-radius:6px;font-size:13px;font-weight:500;margin-bottom:10px;&quot;&gt;&lt;/div&gt;</code> → crea el contenedor de mensajes específicos del formulario de datos; se conecta con `mostrarMsg()`; si se quita, los errores de actualización de datos no tendrían dónde mostrarse.

Línea 149: <code>              &lt;div style=&quot;display:flex;gap:10px;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 150: <code>                &lt;button type=&quot;submit&quot; class=&quot;prf-btn-guardar&quot; id=&quot;btnGuardarDatos&quot;&gt;Guardar cambios&lt;/button&gt;</code> → crea el botón que envía los cambios del perfil; se conecta con `submitDatos(event)`; si se quita, el usuario no podría guardar cambios.

Línea 151: <code>                &lt;button type=&quot;button&quot; class=&quot;prf-btn-cancelar&quot; onclick=&quot;cancelarEdicion()&quot;&gt;Cancelar&lt;/button&gt;</code> → crea el botón para cancelar la edición recargando la vista; se conecta con `cancelarEdicion()`; si se quita, el usuario tendría menos control para deshacer cambios.

Línea 152: <code>              &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 153: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 154: <code>          &lt;/form&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 155: <code>        &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 158: <code>        &lt;div class=&quot;prf-col&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 159: <code>          &lt;h2 class=&quot;prf-seccion-titulo&quot;&gt;Seguridad y Estado&lt;/h2&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 162: <code>          &lt;div class=&quot;prf-seg-card&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 163: <code>            &lt;div class=&quot;prf-seg-card-header&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 164: <code>              &lt;div class=&quot;prf-seg-card-left&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 165: <code>                &lt;svg width=&quot;18&quot; height=&quot;18&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#374151&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 166: <code>                  &lt;circle cx=&quot;12&quot; cy=&quot;16&quot; r=&quot;1&quot;/&gt;&lt;rect x=&quot;3&quot; y=&quot;11&quot; width=&quot;18&quot; height=&quot;11&quot; rx=&quot;2&quot; ry=&quot;2&quot;/&gt;&lt;path d=&quot;M7 11V7a5 5 0 0 1 10 0v4&quot;/&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 167: <code>                &lt;/svg&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 168: <code>                &lt;div&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 169: <code>                  &lt;p class=&quot;prf-seg-titulo&quot;&gt;Contraseña&lt;/p&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 170: <code>                  &lt;p class=&quot;prf-seg-sub&quot;&gt;Mantén tu cuenta segura con una contraseña fuerte&lt;/p&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 171: <code>                &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 172: <code>              &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 173: <code>              &lt;button class=&quot;prf-btn-cambiar&quot; onclick=&quot;toggleCambioPassword()&quot;&gt;Cambiar&lt;/button&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 174: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 8: Sección de seguridad y cambio de contraseña

Línea 175: <code>            &lt;div id=&quot;formPasswordWrap&quot; style=&quot;display:none;margin-top:16px;border-top:1px solid #f3f4f6;padding-top:16px;&quot;&gt;</code> → crea el contenedor oculto del formulario de contraseña; se conecta con `toggleCambioPassword()`; si se quita, no se podría mostrar ni ocultar el cambio de contraseña.

Línea 176: <code>              &lt;form id=&quot;formPassword&quot; onsubmit=&quot;submitPassword(event)&quot;&gt;</code> → abre el formulario de cambio de contraseña y lo conecta con `submitPassword(event)`; se conecta con `PerfilController.php`; si se quita, no habría forma de actualizar la contraseña desde la vista.

Línea 177: <code>                &lt;input type=&quot;hidden&quot; name=&quot;accion&quot; value=&quot;cambiar_password&quot;&gt;</code> → envía al controlador la acción `cambiar_password`; se conecta con la lógica del controlador de perfil; si se quita, el backend no sabría que debe procesar una contraseña.

Línea 178: <code>                &lt;div style=&quot;margin-bottom:12px;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 179: <code>                  &lt;label style=&quot;font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:4px;&quot;&gt;Contraseña actual *&lt;/label&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 180: <code>                  &lt;input type=&quot;password&quot; name=&quot;password_actual&quot; class=&quot;prf-input-activo&quot; placeholder=&quot;••••••••&quot; required&gt;</code> → crea el campo obligatorio para escribir la contraseña actual; se conecta con la validación del controlador; si se quita, se podría intentar cambiar contraseña sin confirmar identidad.

Línea 181: <code>                &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 182: <code>                &lt;div style=&quot;margin-bottom:12px;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 183: <code>                  &lt;label style=&quot;font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:4px;&quot;&gt;Nueva contraseña *&lt;/label&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 184: <code>                  &lt;input type=&quot;password&quot; name=&quot;password_nueva&quot; class=&quot;prf-input-activo&quot; placeholder=&quot;Mínimo 6 caracteres&quot; minlength=&quot;6&quot; required&gt;</code> → crea el campo obligatorio para la nueva contraseña con mínimo de seis caracteres; se conecta con la validación del navegador y del controlador; si se quita, no se puede capturar la nueva clave.

Línea 185: <code>                &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 186: <code>                &lt;div style=&quot;margin-bottom:16px;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 187: <code>                  &lt;label style=&quot;font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:4px;&quot;&gt;Confirmar nueva contraseña *&lt;/label&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 188: <code>                  &lt;input type=&quot;password&quot; name=&quot;password_confirmar&quot; class=&quot;prf-input-activo&quot; placeholder=&quot;Repite la nueva contraseña&quot; required&gt;</code> → crea el campo de confirmación de la nueva contraseña; se conecta con la validación de coincidencia en el controlador; si se quita, aumenta el riesgo de guardar una clave escrita por error.

Línea 189: <code>                &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 190: <code>                &lt;div id=&quot;msgPassword&quot; style=&quot;display:none;padding:8px 12px;border-radius:6px;font-size:13px;font-weight:500;margin-bottom:10px;&quot;&gt;&lt;/div&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 191: <code>                &lt;div style=&quot;display:flex;gap:10px;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 192: <code>                  &lt;button type=&quot;submit&quot; class=&quot;prf-btn-guardar&quot; id=&quot;btnGuardarPassword&quot;&gt;Actualizar contraseña&lt;/button&gt;</code> → crea el botón para enviar el cambio de contraseña; se conecta con `submitPassword()`; si se quita, el formulario no tendría acción visible de actualización.

Línea 193: <code>                  &lt;button type=&quot;button&quot; class=&quot;prf-btn-cancelar&quot; onclick=&quot;toggleCambioPassword()&quot;&gt;Cancelar&lt;/button&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 194: <code>                &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 195: <code>              &lt;/form&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 196: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 197: <code>          &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 9: Estado de la cuenta, fecha de membresía, usuario y rol

Línea 200: <code>          &lt;div class=&quot;prf-estado-grid&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 201: <code>            &lt;div class=&quot;prf-estado-row&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 202: <code>              &lt;span class=&quot;prf-estado-label&quot;&gt;Estado de la cuenta&lt;/span&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 203: <code>              &lt;span style=&quot;display:inline-block;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:600;background:&lt;?= $user[&#x27;activo&#x27;] ? &#x27;#dcfce7&#x27; : &#x27;#f3f4f6&#x27; ?&gt;;color:&lt;?= $user[&#x27;activo&#x27;] ? &#x27;#166534&#x27; : &#x27;#6b7280&#x27; ?&gt;;&quot;&gt;</code> → muestra el estado activo o inactivo de la cuenta con estilos dinámicos; se conecta con `$user['activo']`; si se quita, el trabajador no vería si su cuenta está habilitada.

Línea 204: <code>                &lt;?= $user[&#x27;activo&#x27;] ? &#x27;Activo&#x27; : &#x27;Inactivo&#x27; ?&gt;</code> → muestra el estado activo o inactivo de la cuenta con estilos dinámicos; se conecta con `$user['activo']`; si se quita, el trabajador no vería si su cuenta está habilitada.

Línea 205: <code>              &lt;/span&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 206: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 207: <code>            &lt;div class=&quot;prf-estado-row&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 208: <code>              &lt;span class=&quot;prf-estado-label&quot;&gt;Miembro desde&lt;/span&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 209: <code>              &lt;strong class=&quot;prf-estado-valor&quot;&gt;&lt;?= $miembroDesde ?&gt;&lt;/strong&gt;</code> → muestra la fecha desde la que el usuario pertenece al sistema; se conecta con `$miembroDesde`; si se quita, se pierde ese dato histórico del perfil.

Línea 210: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 211: <code>            &lt;div class=&quot;prf-estado-row&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 212: <code>              &lt;span class=&quot;prf-estado-label&quot;&gt;Usuario&lt;/span&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 213: <code>              &lt;span class=&quot;prf-estado-valor&quot;&gt;@&lt;?= htmlspecialchars($user[&#x27;username&#x27;]) ?&gt;&lt;/span&gt;</code> → muestra el nombre de usuario con escape HTML; se conecta con `$user['username']`; si se quita, el trabajador no vería su usuario interno.

Línea 214: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 215: <code>            &lt;div class=&quot;prf-estado-row&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 216: <code>              &lt;span class=&quot;prf-estado-label&quot;&gt;Rol&lt;/span&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 217: <code>              &lt;span class=&quot;prf-estado-valor&quot;&gt;&lt;?= htmlspecialchars(ucfirst(strtolower($user[&#x27;rol&#x27;]))) ?&gt;&lt;/span&gt;</code> → muestra el rol con formato legible; se conecta con `$user['rol']`; si se quita, el perfil perdería la información de rol o mostraría datos sin formato.

Línea 218: <code>            &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 219: <code>          &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 220: <code>        &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 222: <code>      &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 223: <code>    &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 225: <code>  &lt;/main&gt;</code> → cierra el área principal de contenido; se conecta con el `<main>` abierto antes; si se quita, la estructura HTML queda incompleta.

Línea 226: <code>&lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 9: Estilos CSS propios de la vista

Línea 228: <code>&lt;style&gt;</code> → abre un bloque de estilos internos propios de esta vista; se conecta con las clases usadas en el HTML del mismo archivo; si se quita, estos estilos específicos no se aplicarían.


## Bloque 6: Tarjeta de perfil, banner, avatar, nombre y botón de edición

Línea 229: <code>  .prf-card { background:#fff; border:1px solid #e5e7eb; border-radius:16px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.07); max-width:960px; }</code> → define en una sola línea estilos para `.prf-card`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 230: <code>  .prf-banner { height:110px; background:linear-gradient(135deg,#2e9e4f 0%,#1a7a38 100%); }</code> → define en una sola línea estilos para `.prf-banner`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 231: <code>  .prf-header { display:flex; align-items:flex-end; gap:20px; padding:0 32px 20px; margin-top:-44px; flex-wrap:wrap; }</code> → define en una sola línea estilos para `.prf-header`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 232: <code>  .prf-avatar-wrap { position:relative; flex-shrink:0; }</code> → define en una sola línea estilos para `.prf-avatar-wrap`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 233: <code>  .prf-avatar { width:88px; height:88px; border-radius:50%; background:#e8f5ec; border:4px solid #fff; display:flex; align-items:center; justify-content:center; font-size:28px; font-weight:700; color:#2e9e4f; box-shadow:0 2px 8px rgba(0,0,0,0.12); user-select:none; }</code> → define en una sola línea estilos para `.prf-avatar`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 6: Tarjeta de perfil, banner, avatar, nombre y botón de edición

Línea 234: <code>  .prf-header-info { flex:1; padding-bottom:4px; }</code> → define en una sola línea estilos para `.prf-header-info`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 235: <code>  .prf-nombre { font-size:22px; font-weight:700; color:#111827; margin:0 0 4px; }</code> → define en una sola línea estilos para `.prf-nombre`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 6: Tarjeta de perfil, banner, avatar, nombre y botón de edición

Línea 236: <code>  .prf-meta { display:flex; align-items:center; gap:8px; font-size:14px; color:#6b7280; margin:0; }</code> → define en una sola línea estilos para `.prf-meta`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 237: <code>  .prf-meta-rol { display:flex; align-items:center; gap:4px; color:#2e9e4f; font-weight:600; }</code> → define en una sola línea estilos para `.prf-meta-rol`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 238: <code>  .prf-meta-sep { color:#d1d5db; }</code> → define en una sola línea estilos para `.prf-meta-sep`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 239: <code>  .prf-btn-editar { background:#fff; border:1.5px solid #d1d5db; color:#374151; font-size:14px; font-weight:600; padding:8px 20px; border-radius:8px; cursor:pointer; transition:border-color 0.2s,background 0.2s; white-space:nowrap; align-self:center; margin-bottom:4px; }</code> → define en una sola línea estilos para `.prf-btn-editar`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 240: <code>  .prf-btn-editar:hover, .prf-btn-editar.activo { border-color:#2e9e4f; background:#f0fdf4; color:#2e9e4f; }</code> → define en una sola línea estilos para `.prf-btn-editar:hover, .prf-btn-editar.activo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 241: <code>  .prf-body { display:grid; grid-template-columns:1fr 1fr; gap:0; padding:0 32px 32px; }</code> → define en una sola línea estilos para `.prf-body`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 242: <code>  .prf-col:first-child { padding-right:32px; border-right:1px solid #f3f4f6; }</code> → define en una sola línea estilos para `.prf-col:first-child`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 243: <code>  .prf-col:last-child { padding-left:32px; }</code> → define en una sola línea estilos para `.prf-col:last-child`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 244: <code>  .prf-seccion-titulo { font-size:15px; font-weight:700; color:#111827; margin:0 0 20px; padding-bottom:12px; border-bottom:1px solid #f3f4f6; }</code> → define en una sola línea estilos para `.prf-seccion-titulo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 245: <code>  .prf-campo { margin-bottom:16px; }</code> → define en una sola línea estilos para `.prf-campo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 246: <code>  .prf-label { display:block; font-size:13px; font-weight:600; color:#374151; margin-bottom:6px; }</code> → define en una sola línea estilos para `.prf-label`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 247: <code>  .prf-input-wrap { display:flex; align-items:center; gap:10px; background:#f9fafb; border:1px solid #e5e7eb; border-radius:8px; padding:0 14px; transition:border-color 0.2s,background 0.2s; }</code> → define en una sola línea estilos para `.prf-input-wrap`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 248: <code>  .prf-input-wrap:focus-within { border-color:#2e9e4f; background:#fff; }</code> → define en una sola línea estilos para `.prf-input-wrap:focus-within`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 249: <code>  .prf-input-icon { width:16px; height:16px; color:#9ca3af; flex-shrink:0; }</code> → define en una sola línea estilos para `.prf-input-icon`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 250: <code>  .prf-nombre-grid { display:grid; grid-template-columns:1fr 1fr; gap:8px; flex:1; padding:2px 0; }</code> → define en una sola línea estilos para `.prf-nombre-grid`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 251: <code>  .prf-input { flex:1; height:42px; border:none; background:transparent; font-size:14px; color:#374151; outline:none; font-family:inherit; width:100%; }</code> → define en una sola línea estilos para `.prf-input`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 252: <code>  .prf-input[readonly] { cursor:default; color:#6b7280; }</code> → define en una sola línea estilos para `.prf-input[readonly]`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 253: <code>  .prf-input-activo { background:#fff; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; height:40px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; width:100%; font-family:inherit; display:block; }</code> → define en una sola línea estilos para `.prf-input-activo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 254: <code>  .prf-input-activo:focus { border-color:#2e9e4f; }</code> → define en una sola línea estilos para `.prf-input-activo:focus`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 255: <code>  .prf-seg-card { background:#f9fafb; border:1px solid #e5e7eb; border-radius:10px; padding:16px 18px; margin-bottom:14px; }</code> → define en una sola línea estilos para `.prf-seg-card`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 256: <code>  .prf-seg-card-header { display:flex; align-items:flex-start; justify-content:space-between; gap:12px; }</code> → define en una sola línea estilos para `.prf-seg-card-header`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 257: <code>  .prf-seg-card-left { display:flex; align-items:flex-start; gap:12px; }</code> → define en una sola línea estilos para `.prf-seg-card-left`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 258: <code>  .prf-seg-titulo { font-size:14px; font-weight:700; color:#111827; margin:0 0 2px; }</code> → define en una sola línea estilos para `.prf-seg-titulo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 259: <code>  .prf-seg-sub { font-size:12px; color:#6b7280; margin:0; }</code> → define en una sola línea estilos para `.prf-seg-sub`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 260: <code>  .prf-btn-cambiar { background:none; border:none; color:#2e9e4f; font-size:13px; font-weight:700; cursor:pointer; padding:0; white-space:nowrap; flex-shrink:0; }</code> → define en una sola línea estilos para `.prf-btn-cambiar`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 261: <code>  .prf-btn-cambiar:hover { text-decoration:underline; }</code> → define en una sola línea estilos para `.prf-btn-cambiar:hover`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estado de la cuenta, fecha de membresía, usuario y rol

Línea 262: <code>  .prf-estado-grid { margin-top:4px; }</code> → define en una sola línea estilos para `.prf-estado-grid`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 263: <code>  .prf-estado-row { display:flex; align-items:center; justify-content:space-between; padding:10px 0; border-bottom:1px solid #f3f4f6; font-size:14px; }</code> → define en una sola línea estilos para `.prf-estado-row`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 264: <code>  .prf-estado-row:last-child { border-bottom:none; }</code> → define en una sola línea estilos para `.prf-estado-row:last-child`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 265: <code>  .prf-estado-label { color:#6b7280; }</code> → define en una sola línea estilos para `.prf-estado-label`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 266: <code>  .prf-estado-valor { font-weight:600; color:#111827; }</code> → define en una sola línea estilos para `.prf-estado-valor`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 267: <code>  .prf-btn-guardar { background:#2e9e4f; color:#fff; border:none; height:38px; padding:0 18px; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:background 0.2s; }</code> → define en una sola línea estilos para `.prf-btn-guardar`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 268: <code>  .prf-btn-guardar:hover { background:#237a3d; }</code> → define en una sola línea estilos para `.prf-btn-guardar:hover`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 269: <code>  .prf-btn-cancelar { background:#f3f4f6; color:#374151; border:none; height:38px; padding:0 18px; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:background 0.2s; }</code> → define en una sola línea estilos para `.prf-btn-cancelar`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 270: <code>  .prf-btn-cancelar:hover { background:#e5e7eb; }</code> → define en una sola línea estilos para `.prf-btn-cancelar:hover`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 271: <code>  @media (max-width:768px) {</code> → abre una regla responsive para pantallas pequeñas; se conecta con el diseño móvil de la vista; si se quita, la pantalla puede verse mal en celulares.

Línea 272: <code>    .prf-body { grid-template-columns:1fr; padding:0 20px 24px; }</code> → define en una sola línea estilos para `.prf-body`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 273: <code>    .prf-col:first-child { padding-right:0; border-right:none; border-bottom:1px solid #f3f4f6; padding-bottom:24px; margin-bottom:24px; }</code> → define en una sola línea estilos para `.prf-col:first-child`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 274: <code>    .prf-col:last-child { padding-left:0; }</code> → define en una sola línea estilos para `.prf-col:last-child`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 6: Tarjeta de perfil, banner, avatar, nombre y botón de edición

Línea 275: <code>    .prf-header { padding:0 20px 16px; }</code> → define en una sola línea estilos para `.prf-header`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 276: <code>    .prf-nombre-grid { grid-template-columns:1fr; }</code> → define en una sola línea estilos para `.prf-nombre-grid`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 277: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 278: <code>&lt;/style&gt;</code> → cierra el bloque de CSS interno; se conecta con el `<style>` abierto antes; si se quita, el navegador podría interpretar mal el resto del documento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 280: <code>&lt;script&gt;</code> → abre el bloque JavaScript que se ejecutará en el navegador; se conecta con botones, formularios, ids del HTML y controladores PHP por `fetch`; si se quita, la vista pierde interacciones dinámicas.

Línea 281: <code>  const CTRL = &#x27;../../controllers/PerfilController.php&#x27;;</code> → guarda en una constante la ruta del controlador de perfil; se conecta con `PerfilController.php` y evita repetir la ruta en cada `fetch`; si se quita, las funciones de perfil no sabrían a qué backend enviar datos.

Línea 283: <code>  function toggleSidebar() {</code> → declara la función que abre o cierra el menú lateral; se conecta con el botón hamburguesa de la topbar; si se quita, ese botón dejaría de funcionar.

Línea 284: <code>    document.getElementById(&#x27;sidebar&#x27;).classList.toggle(&#x27;sidebar-open&#x27;);</code> → agrega o quita la clase `sidebar-open` al elemento `sidebar`; se conecta con CSS responsive del menú; si se quita, el sidebar no cambiaría de estado al hacer clic.

Línea 285: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 287: <code>  function mostrarMsg(id, texto, ok) {</code> → declara una función reutilizable para mostrar mensajes visuales; se conecta con `msgGlobal`, `msgDatos` o `msgPassword`; si se quita, las respuestas de éxito o error no se mostrarían de forma centralizada.

Línea 288: <code>    const el = document.getElementById(id);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.

Línea 289: <code>    if (!el) return;</code> → detiene la función si no existe el elemento buscado; se conecta con validación defensiva del DOM; si se quita, podría aparecer un error JavaScript al intentar modificar un elemento inexistente.

Línea 290: <code>    el.textContent = texto;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 291: <code>    el.style.display = &#x27;block&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 292: <code>    el.style.background = ok ? &#x27;#dcfce7&#x27; : &#x27;#fdecea&#x27;;</code> → cambia el fondo según éxito o error; se conecta con la variable booleana `ok`; si se quita, los mensajes perderían color de estado.

Línea 293: <code>    el.style.color      = ok ? &#x27;#166534&#x27; : &#x27;#b91c1c&#x27;;</code> → cambia el color del texto según éxito o error; se conecta con la variable `ok`; si se quita, el mensaje sería menos claro visualmente.

Línea 294: <code>    setTimeout(() =&gt; { el.style.display = &#x27;none&#x27;; }, 5000);</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 295: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 297: <code>  let _modoEdicion = false;</code> → crea una variable booleana para saber si el perfil está en modo edición; se conecta con `toggleEdicion()`; si se quita, la vista no podría alternar correctamente entre lectura y edición.

Línea 299: <code>  function toggleEdicion() {</code> → declara la función que activa o desactiva la edición de datos personales; se conecta con el botón `Editar Perfil`; si se quita, los campos quedarían bloqueados.

Línea 300: <code>    _modoEdicion = !_modoEdicion;</code> → invierte el estado de edición; se conecta con los campos readonly y los botones de acción; si se quita, el botón no alternaría entre editar y cancelar.


## Bloque 7: Formulario de información personal editable

Línea 301: <code>    [&#x27;fNombres&#x27;,&#x27;fApellidos&#x27;,&#x27;fDocumento&#x27;,&#x27;fTelefono&#x27;].forEach(id =&gt; {</code> → recorre varios ids de campos para aplicarles el mismo cambio; se conecta con nombres, apellidos, documento y teléfono; si se quita, habría que repetir manualmente esa lógica.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 302: <code>      const el = document.getElementById(id);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.

Línea 303: <code>      if (_modoEdicion) el.removeAttribute(&#x27;readonly&#x27;);</code> → quita el modo solo lectura a un input; se conecta con el modo edición; si se quita, el usuario no podría escribir en ese campo.

Línea 304: <code>      else el.setAttribute(&#x27;readonly&#x27;, true);</code> → vuelve a bloquear un input como solo lectura; se conecta con la salida del modo edición; si se quita, los campos podrían quedar editables cuando no corresponde.

Línea 305: <code>    });</code> → cierra una función anónima y el registro del evento asociado; se conecta con `addEventListener`; si se quita, el listener queda incompleto y JavaScript falla.


## Bloque 7: Formulario de información personal editable

Línea 306: <code>    document.getElementById(&#x27;accionesDatos&#x27;).style.display = _modoEdicion ? &#x27;block&#x27; : &#x27;none&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.


## Bloque 6: Tarjeta de perfil, banner, avatar, nombre y botón de edición

Línea 307: <code>    const btn = document.getElementById(&#x27;btnEditarPerfil&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 308: <code>    btn.classList.toggle(&#x27;activo&#x27;, _modoEdicion);</code> → activa o desactiva la clase visual del botón de edición; se conecta con CSS `.activo`; si se quita, el botón no reflejaría visualmente el estado actual.

Línea 309: <code>    btn.textContent = _modoEdicion ? &#x27;Cancelar edición&#x27; : &#x27;Editar Perfil&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 310: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 312: <code>  function cancelarEdicion() { location.reload(); }</code> → declara una función que recarga la página para cancelar cambios no guardados; se conecta con el botón Cancelar; si se quita, ese botón no podría restaurar los datos originales.

Línea 314: <code>  async function submitDatos(e) {</code> → declara una función asíncrona para enviar datos al servidor sin recargar inmediatamente; se conecta con `fetch`, formularios y controladores PHP; si se quita, esa acción dinámica no existirá.

Línea 315: <code>    e.preventDefault();</code> → evita que el formulario recargue la página de forma tradicional; se conecta con el envío por AJAX; si se quita, el navegador recargaría y se perdería el control del mensaje dinámico.

Línea 316: <code>    const btn = document.getElementById(&#x27;btnGuardarDatos&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.

Línea 317: <code>    btn.disabled = true; btn.textContent = &#x27;Guardando…&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 318: <code>    const fd = new FormData(e.target);</code> → crea un paquete con los datos del formulario para enviarlo al backend; se conecta con los campos `name` del HTML; si se quita, el controlador no recibiría los datos necesarios.

Línea 319: <code>    try {</code> → abre un bloque para intentar una petición que puede fallar; se conecta con `catch` para manejar errores; si se quita, los fallos de red podrían romper la ejecución sin mensaje claro.

Línea 320: <code>      const res = await fetch(CTRL, { method: &#x27;POST&#x27;, body: fd });</code> → envía una petición HTTP al controlador `PerfilController.php`; se conecta con el backend que actualiza o registra datos en la base de datos; si se quita, la acción del usuario no llegaría al servidor.

Línea 321: <code>      const json = await res.json();</code> → convierte la respuesta del servidor en un objeto JavaScript; se conecta con los campos esperados como `ok`, `msg` o `mensaje`; si se quita, no se podría saber si la operación fue exitosa.

Línea 322: <code>      if (json.ok) {</code> → valida si el servidor respondió que la operación fue correcta; se conecta con la respuesta JSON del controlador; si se quita, la vista no distinguiría éxito de error.


## Bloque 7: Formulario de información personal editable

Línea 323: <code>        const nombres   = document.getElementById(&#x27;fNombres&#x27;).value.trim();</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.

Línea 324: <code>        const apellidos = document.getElementById(&#x27;fApellidos&#x27;).value.trim();</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 6: Tarjeta de perfil, banner, avatar, nombre y botón de edición

Línea 325: <code>        document.getElementById(&#x27;displayNombre&#x27;).textContent = nombres + &#x27; &#x27; + apellidos;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 326: <code>        document.getElementById(&#x27;avatarCircle&#x27;).textContent  = ((nombres[0]??&#x27;&#x27;) + (apellidos[0]??&#x27;&#x27;)).toUpperCase();</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.


## Bloque 5: Mensaje global de retroalimentación

Línea 327: <code>        mostrarMsg(&#x27;msgGlobal&#x27;, json.mensaje, true);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 328: <code>        toggleEdicion();</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 329: <code>      } else {</code> → abre el camino alternativo cuando la condición anterior no se cumple; se conecta con errores o casos negativos; si se quita, no habría manejo visual cuando el backend rechaza la operación.

Línea 330: <code>        mostrarMsg(&#x27;msgDatos&#x27;, json.mensaje, false);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 331: <code>        btn.disabled = false; btn.textContent = &#x27;Guardar cambios&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 332: <code>      }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 333: <code>    } catch {</code> → captura errores de conexión o ejecución de la petición; se conecta con el bloque `try`; si se quita, un fallo de red dejaría errores en consola sin avisar al usuario.

Línea 334: <code>      mostrarMsg(&#x27;msgDatos&#x27;, &#x27;Error de conexión&#x27;, false);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 335: <code>      btn.disabled = false; btn.textContent = &#x27;Guardar cambios&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 336: <code>    }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 337: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 339: <code>  function toggleCambioPassword() {</code> → declara la función que muestra u oculta el formulario de contraseña; se conecta con el botón Cambiar; si se quita, no se podría abrir ese formulario.


## Bloque 8: Sección de seguridad y cambio de contraseña

Línea 340: <code>    const wrap = document.getElementById(&#x27;formPasswordWrap&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 341: <code>    const visible = wrap.style.display !== &#x27;none&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 342: <code>    wrap.style.display = visible ? &#x27;none&#x27; : &#x27;block&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 343: <code>    if (!visible) {</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.


## Bloque 8: Sección de seguridad y cambio de contraseña

Línea 344: <code>      document.getElementById(&#x27;formPassword&#x27;).reset();</code> → limpia los campos del formulario; se conecta con el formulario de contraseña o solicitud; si se quita, podrían quedar valores anteriores escritos.

Línea 345: <code>      document.getElementById(&#x27;msgPassword&#x27;).style.display = &#x27;none&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 346: <code>    }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 347: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 349: <code>  async function submitPassword(e) {</code> → declara una función asíncrona para enviar datos al servidor sin recargar inmediatamente; se conecta con `fetch`, formularios y controladores PHP; si se quita, esa acción dinámica no existirá.

Línea 350: <code>    e.preventDefault();</code> → evita que el formulario recargue la página de forma tradicional; se conecta con el envío por AJAX; si se quita, el navegador recargaría y se perdería el control del mensaje dinámico.

Línea 351: <code>    const btn = document.getElementById(&#x27;btnGuardarPassword&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.

Línea 352: <code>    btn.disabled = true; btn.textContent = &#x27;Actualizando…&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 353: <code>    const fd = new FormData(e.target);</code> → crea un paquete con los datos del formulario para enviarlo al backend; se conecta con los campos `name` del HTML; si se quita, el controlador no recibiría los datos necesarios.

Línea 354: <code>    try {</code> → abre un bloque para intentar una petición que puede fallar; se conecta con `catch` para manejar errores; si se quita, los fallos de red podrían romper la ejecución sin mensaje claro.

Línea 355: <code>      const res = await fetch(CTRL, { method: &#x27;POST&#x27;, body: fd });</code> → envía una petición HTTP al controlador `PerfilController.php`; se conecta con el backend que actualiza o registra datos en la base de datos; si se quita, la acción del usuario no llegaría al servidor.

Línea 356: <code>      const json = await res.json();</code> → convierte la respuesta del servidor en un objeto JavaScript; se conecta con los campos esperados como `ok`, `msg` o `mensaje`; si se quita, no se podría saber si la operación fue exitosa.

Línea 357: <code>      if (json.ok) {</code> → valida si el servidor respondió que la operación fue correcta; se conecta con la respuesta JSON del controlador; si se quita, la vista no distinguiría éxito de error.

Línea 358: <code>        toggleCambioPassword();</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.


## Bloque 5: Mensaje global de retroalimentación

Línea 359: <code>        mostrarMsg(&#x27;msgGlobal&#x27;, json.mensaje, true);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 360: <code>      } else {</code> → abre el camino alternativo cuando la condición anterior no se cumple; se conecta con errores o casos negativos; si se quita, no habría manejo visual cuando el backend rechaza la operación.


## Bloque 8: Sección de seguridad y cambio de contraseña

Línea 361: <code>        mostrarMsg(&#x27;msgPassword&#x27;, json.mensaje, false);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 362: <code>        btn.disabled = false; btn.textContent = &#x27;Actualizar contraseña&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 363: <code>      }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 364: <code>    } catch {</code> → captura errores de conexión o ejecución de la petición; se conecta con el bloque `try`; si se quita, un fallo de red dejaría errores en consola sin avisar al usuario.


## Bloque 8: Sección de seguridad y cambio de contraseña

Línea 365: <code>      mostrarMsg(&#x27;msgPassword&#x27;, &#x27;Error de conexión&#x27;, false);</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 366: <code>      btn.disabled = false; btn.textContent = &#x27;Actualizar contraseña&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 367: <code>    }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 368: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 369: <code>&lt;/script&gt;</code> → cierra el bloque JavaScript; se conecta con el `<script>` abierto antes; si se quita, el HTML posterior podría interpretarse como JavaScript y fallar.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 371: <code>&lt;?php require_once __DIR__ . &#x27;/includes/notificaciones_panel.php&#x27;; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.


## Bloque 11: Inclusión del panel de notificaciones y cierre del documento

Línea 373: <code>&lt;/body&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 374: <code>&lt;/html&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.
