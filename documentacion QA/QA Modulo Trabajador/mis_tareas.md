# Documentación línea por línea: `views/trabajador/mis_tareas.php`

Archivo documentado: `mis_tareas.php`. Propósito general: Módulo Mis Tareas del trabajador. Esta documentación está organizada por bloques para no enredar el flujo, pero cada línea de código queda explicada completa en una sola entrada continua: qué hace, con qué se conecta, por qué importa y qué pasa si se quita. No se documentan las líneas que son únicamente comentarios del código original.

Trazabilidad general: esta vista pertenece al módulo del trabajador y depende de la sesión iniciada, de `config/database.php`, del modelo `models/TrabajadorTarea.php`, del controlador `controllers/TrabajadorTareaController.php` para completar tareas, del CSS base `styles/dashboard.css`, del panel `includes/notificaciones_panel.php` y de otras vistas del trabajador como `dashboard.php`, `mis_prestamos.php`, `solicitar_herramienta.php` y `perfil.php`.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 1: <code>&lt;?php</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 6: <code>session_start();</code> → inicia o reanuda la sesión del usuario para poder leer `$_SESSION`; se conecta con el login, con `id_usuario`, `rol` y `username`; si se quita, el archivo no puede saber quién está logueado y la protección de ruta podría fallar.

Línea 7: <code>if (!isset($_SESSION[&#x27;id_usuario&#x27;]) || $_SESSION[&#x27;rol&#x27;] !== &#x27;TRABAJADOR&#x27;) {</code> → valida que exista un usuario autenticado y que su rol sea `TRABAJADOR`; se conecta con los datos guardados por el login en `$_SESSION`; si se quita, cualquier usuario sin permiso podría entrar a esta vista del trabajador.

Línea 8: <code>    header(&quot;Location: ../../views/usuarios/login.php&quot;); exit;</code> → redirige al login cuando la validación de sesión falla; se conecta con `views/usuarios/login.php`; si se quita, el usuario no autorizado no sería enviado fuera de la página y podría quedar viendo una pantalla insegura o rota.

Línea 9: <code>}</code> → cierra el bloque lógico anterior; se conecta con la estructura `if`, `foreach`, `try`, `catch`, función o regla que esté abierta justo antes; si se quita, el archivo queda con llaves desbalanceadas y puede romper PHP, JavaScript o CSS según el bloque.

Línea 11: <code>require_once __DIR__ . &#x27;/../../config/database.php&#x27;;</code> → carga una sola vez la clase `Database`; se conecta con `config/database.php`, que contiene el método para abrir la conexión; si se quita, `new Database()` no existiría y no se podrían consultar datos de la base de datos.

Línea 12: <code>require_once __DIR__ . &#x27;/../../models/TrabajadorTarea.php&#x27;;</code> → carga el modelo `TrabajadorTarea` que contiene las consultas propias de esta vista; se conecta con `models/TrabajadorTarea.php` y con la conexión `$db`; si se quita, no se podría crear `$model` ni traer la información que se muestra en pantalla.

Línea 14: <code>$db           = (new Database())-&gt;conectar();</code> → crea la conexión a la base de datos usando la clase `Database`; se conecta con `config/database.php` y con los modelos que necesitan ejecutar consultas SQL; si se quita, el modelo no recibe conexión y la vista no puede obtener datos reales.

Línea 15: <code>$model        = new TrabajadorTarea($db);</code> → instancia el modelo `TrabajadorTarea` y le entrega la conexión `$db`; se conecta con la capa de datos encargada de consultar tablas del sistema; si se quita, la vista no tendría objeto para pedir información al sistema.

Línea 16: <code>$id_trabajador= (int) $_SESSION[&#x27;id_usuario&#x27;];</code> → convierte el id de usuario de sesión en entero y lo guarda como identificador del trabajador actual; se conecta con `$_SESSION['id_usuario']` y con las consultas del modelo; si se quita, las tareas o datos podrían no filtrarse por el trabajador logueado.

Línea 18: <code>$filtro  = trim($_GET[&#x27;estado&#x27;] ?? &#x27;&#x27;);</code> → lee el parámetro `estado` que viene por URL y lo limpia con `trim`; se conecta con los enlaces de filtro de la misma vista y con `listar()` del modelo; si se quita, no funcionaría el filtrado por tareas pendientes, en proceso o completadas.

Línea 19: <code>$resumen = $model-&gt;resumen($id_trabajador);</code> → pide al modelo un resumen numérico de las tareas del trabajador; se conecta con `TrabajadorTarea::resumen()` y con las tarjetas superiores de conteo; si se quita, las tarjetas de resumen no tendrían valores para mostrar.

Línea 20: <code>$tareas  = $model-&gt;listar($id_trabajador, $filtro);</code> → pide al modelo la lista de tareas del trabajador aplicando el filtro seleccionado; se conecta con `TrabajadorTarea::listar()` y con el recorrido `foreach` que pinta cada tarjeta; si se quita, la vista no tendría tareas para mostrar.

Línea 21: <code>?&gt;</code> → cierra el bloque PHP inicial y permite que el archivo continúe escribiendo HTML normal; se conecta con todo el marcado que viene después porque libera la salida hacia el navegador; si se quita en este punto, el HTML podría quedar mezclado dentro de PHP y producir errores de sintaxis.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 22: <code>&lt;!DOCTYPE html&gt;</code> → declara que el documento usa HTML5; se conecta con el navegador para que interprete correctamente la página; si se quita, algunos navegadores podrían activar modos antiguos de renderizado.

Línea 23: <code>&lt;html lang=&quot;es&quot;&gt;</code> → abre el documento HTML e indica que el idioma principal es español; se conecta con accesibilidad, traducción automática y SEO básico; si se quita, la estructura raíz de la página quedaría inválida.

Línea 24: <code>&lt;head&gt;</code> → abre la sección técnica de la página donde se cargan metadatos, título, estilos y fuentes; se conecta con el navegador antes de pintar el cuerpo; si se quita, esos recursos quedarían mal ubicados.

Línea 25: <code>  &lt;meta charset=&quot;UTF-8&quot;/&gt;</code> → define la codificación UTF-8 para que tildes, ñ e iconos se vean correctamente; se conecta con todo el texto del sistema; si se quita, podrían aparecer caracteres dañados.

Línea 26: <code>  &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;/&gt;</code> → configura la escala responsive para móviles; se conecta con los estilos CSS y media queries; si se quita, la página puede verse demasiado pequeña o mal ajustada en celular.

Línea 27: <code>  &lt;title&gt;Mis Tareas - AgroFinca&lt;/title&gt;</code> → define el título que aparece en la pestaña del navegador; se conecta con la identidad de esta vista; si se quita, la pestaña no mostraría un nombre claro para el usuario.

Línea 28: <code>  &lt;link rel=&quot;stylesheet&quot; href=&quot;styles/dashboard.css&quot;/&gt;</code> → carga la hoja de estilos base del dashboard; se conecta con clases como `sidebar`, `topbar`, `content` y botones comunes; si se quita, la vista perdería gran parte del diseño general.

Línea 29: <code>  &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.googleapis.com&quot;/&gt;</code> → prepara la conexión con Google Fonts para cargar la fuente más rápido; se conecta con el enlace de fuente `Inter`; si se quita, la fuente puede tardar más en descargarse.

Línea 30: <code>  &lt;link href=&quot;https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap&quot; rel=&quot;stylesheet&quot;/&gt;</code> → carga la familia tipográfica Inter con varios pesos; se conecta con el diseño visual del sistema; si se quita, el navegador usará una fuente por defecto y cambiará la apariencia.

Línea 31: <code>&lt;/head&gt;</code> → cierra la sección técnica del documento; se conecta con el inicio del cuerpo; si se quita, el HTML queda mal estructurado.

Línea 32: <code>&lt;body&gt;</code> → abre el cuerpo visible de la página; se conecta con todo lo que el usuario ve e interactúa; si se quita, el documento pierde su contenedor visual principal.


## Bloque 3: Sidebar o menú lateral del trabajador

Línea 35: <code>&lt;aside class=&quot;sidebar&quot; id=&quot;sidebar&quot;&gt;</code> → abre el menú lateral del trabajador y le asigna el id `sidebar`; se conecta con `toggleSidebar()` en JavaScript y con los estilos de navegación; si se quita, el usuario pierde el menú lateral.

Línea 36: <code>  &lt;div class=&quot;sidebar-logo&quot;&gt;</code> → crea el contenedor del logo dentro del menú lateral; se conecta con el estilo visual de marca; si se quita, la barra lateral quedaría sin encabezado institucional.

Línea 37: <code>    &lt;img src=&quot;../../img/logo.png&quot; alt=&quot;AgroFinca&quot; class=&quot;sidebar-logo-img&quot;/&gt;</code> → crea el contenedor del logo dentro del menú lateral; se conecta con el estilo visual de marca; si se quita, la barra lateral quedaría sin encabezado institucional.

Línea 38: <code>    &lt;span&gt;AgroFinca&lt;/span&gt;</code> → muestra el nombre de la aplicación al lado del logo; se conecta con el encabezado del sidebar; si se quita, el menú queda menos identificable para el usuario.

Línea 39: <code>  &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 40: <code>  &lt;nav class=&quot;sidebar-nav&quot;&gt;</code> → abre la navegación del menú lateral; se conecta con los enlaces a módulos del trabajador; si se quita, los accesos del menú no quedan agrupados correctamente.

Línea 41: <code>    &lt;a href=&quot;dashboard.php&quot;          class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;⊞&lt;/span&gt; Dashboard&lt;/a&gt;</code> → crea el enlace hacia el dashboard del trabajador; se conecta con `views/trabajador/dashboard.php`; si se quita, el usuario pierde acceso directo al resumen principal.

Línea 42: <code>    &lt;a href=&quot;mis_tareas.php&quot;         class=&quot;nav-item active&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;📋&lt;/span&gt; Mis Tareas&lt;/a&gt;</code> → crea el enlace hacia Mis Tareas; se conecta con esta vista de tareas del trabajador; si se quita, el usuario no podría navegar fácilmente a sus tareas desde el sidebar.

Línea 43: <code>    &lt;a href=&quot;mis_prestamos.php&quot;      class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;🔑&lt;/span&gt; Mis Préstamos&lt;/a&gt;</code> → crea el enlace hacia Mis Préstamos; se conecta con el módulo de herramientas prestadas; si se quita, el trabajador pierde acceso rápido a sus préstamos.

Línea 44: <code>    &lt;a href=&quot;solicitar_herramienta.php&quot; class=&quot;nav-item&quot;&gt;&lt;span class=&quot;nav-icon&quot;&gt;+&lt;/span&gt; Solicitar Herramienta&lt;/a&gt;</code> → crea el enlace hacia Solicitar Herramienta; se conecta con el módulo donde el trabajador pide herramientas; si se quita, se rompe la navegación rápida hacia solicitudes.

Línea 45: <code>  &lt;/nav&gt;</code> → cierra el grupo de navegación lateral; se conecta con el `<nav>` abierto antes; si se quita, el HTML del sidebar queda incompleto.

Línea 46: <code>&lt;/aside&gt;</code> → cierra el menú lateral; se conecta con el `<aside>` inicial; si se quita, el resto de la página podría quedar dentro del sidebar por error.


## Bloque 4: Contenedor principal, barra superior, usuario, notificaciones y cierre de sesión

Línea 49: <code>&lt;div class=&quot;main-wrapper&quot;&gt;</code> → abre el contenedor principal que envuelve topbar y contenido; se conecta con el CSS base del dashboard; si se quita, la distribución entre menú y contenido puede romperse.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 52: <code>  &lt;header class=&quot;topbar&quot;&gt;</code> → abre la sección técnica de la página donde se cargan metadatos, título, estilos y fuentes; se conecta con el navegador antes de pintar el cuerpo; si se quita, esos recursos quedarían mal ubicados.

Línea 53: <code>    &lt;button class=&quot;menu-toggle&quot; onclick=&quot;toggleSidebar()&quot; aria-label=&quot;Abrir menú&quot;&gt;☰&lt;/button&gt;</code> → crea el botón hamburguesa que abre o cierra el sidebar en pantallas pequeñas; se conecta con `toggleSidebar()` y el id `sidebar`; si se quita, en móvil sería más difícil abrir el menú.


## Bloque 4: Contenedor principal, barra superior, usuario, notificaciones y cierre de sesión

Línea 54: <code>    &lt;div class=&quot;topbar-title&quot;&gt;Sistema de Gestión de Finca&lt;/div&gt;</code> → muestra el nombre general del sistema en la barra superior; se conecta con la identidad visual de AgroFinca; si se quita, la cabecera queda menos clara.

Línea 55: <code>    &lt;div class=&quot;topbar-right&quot;&gt;</code> → abre el contenedor derecho de la barra superior; se conecta con rol, campana, usuario y salida; si se quita, esos elementos pierden su agrupación y alineación.

Línea 56: <code>      &lt;span class=&quot;badge-rol&quot;&gt;Trabajador&lt;/span&gt;</code> → muestra visualmente el rol `Trabajador`; se conecta con la protección PHP que exige ese rol; si se quita, el usuario pierde una pista visual de su tipo de cuenta.

Línea 57: <code>      &lt;div class=&quot;notif-wrapper&quot;&gt;</code> → agrupa el botón de notificaciones; se conecta con el panel incluido al final y con `toggleNotifPanel()`; si se quita, la campana puede quedar sin posición o sin contenedor.

Línea 58: <code>        &lt;button class=&quot;notif-btn&quot; onclick=&quot;toggleNotifPanel()&quot; aria-label=&quot;Notificaciones&quot;&gt;🔔&lt;/button&gt;</code> → crea el botón de campana para abrir notificaciones; se conecta con `toggleNotifPanel()` del panel incluido; si se quita, el trabajador no podría abrir sus notificaciones desde esta vista.

Línea 59: <code>      &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 60: <code>      &lt;a href=&quot;perfil.php&quot; class=&quot;topbar-user&quot; title=&quot;Mi perfil&quot;&gt;</code> → crea el enlace al perfil del trabajador; se conecta con `perfil.php` y con el nombre de usuario de la sesión; si se quita, el usuario pierde acceso rápido a su perfil.

Línea 61: <code>        👤 &lt;?= htmlspecialchars($_SESSION[&#x27;username&#x27;]) ?&gt;</code> → imprime el username de la sesión escapado para evitar HTML malicioso; se conecta con el login que guardó `$_SESSION['username']`; si se quita, no se mostraría el usuario logueado.

Línea 62: <code>      &lt;/a&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 63: <code>      &lt;a href=&quot;../../controllers/LogoutController.php&quot; class=&quot;btn-logout&quot;&gt;↪ Cerrar sesión&lt;/a&gt;</code> → crea el enlace de cierre de sesión hacia `LogoutController.php`; se conecta con el controlador que destruye la sesión; si se quita, el usuario no tendría forma visible de salir.

Línea 64: <code>    &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 2: Estructura HTML inicial, cabecera técnica, estilos globales y fuente

Línea 65: <code>  &lt;/header&gt;</code> → cierra la sección técnica del documento; se conecta con el inicio del cuerpo; si se quita, el HTML queda mal estructurado.

Línea 67: <code>  &lt;main class=&quot;content&quot;&gt;</code> → abre el área principal del contenido de la vista; se conecta con los estilos `content`; si se quita, el contenido perdería el contenedor que controla márgenes y ancho.


## Bloque 5: Cabecera visual de Mis Tareas

Línea 70: <code>    &lt;div class=&quot;mt-header&quot;&gt;</code> → pinta la cabecera específica del módulo Mis Tareas; se conecta con el contenido de tareas del trabajador; si se quita, la pantalla seguiría funcionando pero sería menos clara para el usuario.

Línea 71: <code>      &lt;div&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 72: <code>        &lt;h1 class=&quot;mt-titulo&quot;&gt;Mis Tareas&lt;/h1&gt;</code> → pinta la cabecera específica del módulo Mis Tareas; se conecta con el contenido de tareas del trabajador; si se quita, la pantalla seguiría funcionando pero sería menos clara para el usuario.

Línea 73: <code>        &lt;p class=&quot;mt-subtitulo&quot;&gt;Consulta y completa tus tareas asignadas&lt;/p&gt;</code> → pinta la cabecera específica del módulo Mis Tareas; se conecta con el contenido de tareas del trabajador; si se quita, la pantalla seguiría funcionando pero sería menos clara para el usuario.

Línea 74: <code>      &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 75: <code>    &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 6: Tarjetas resumen y filtros por estado de tarea

Línea 78: <code>    &lt;div class=&quot;mt-resumen&quot;&gt;</code> → abre el grupo de tarjetas resumen que funcionan como filtros; se conecta con `$resumen` y `$filtro`; si se quita, el usuario pierde los accesos rápidos para filtrar tareas por estado.

Línea 79: <code>      &lt;a href=&quot;mis_tareas.php&quot; class=&quot;mt-stat &lt;?= $filtro===&#x27;&#x27;?&#x27;mt-stat-activo&#x27;:&#x27;&#x27; ?&gt;&quot;&gt;</code> → crea el enlace hacia Mis Tareas; se conecta con esta vista de tareas del trabajador; si se quita, el usuario no podría navegar fácilmente a sus tareas desde el sidebar.

Línea 80: <code>        &lt;span class=&quot;mt-stat-num&quot;&gt;&lt;?= $resumen[&#x27;total&#x27;] ?&gt;&lt;/span&gt;</code> → muestra un número de resumen calculado en PHP; se conecta con `$resumen`; si se quita, la tarjeta no mostraría cuántas tareas hay.

Línea 81: <code>        &lt;span class=&quot;mt-stat-lbl&quot;&gt;Todas&lt;/span&gt;</code> → muestra la etiqueta textual del filtro; se conecta con la tarjeta de resumen; si se quita, el número quedaría sin contexto.

Línea 82: <code>      &lt;/a&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 83: <code>      &lt;a href=&quot;mis_tareas.php?estado=PENDIENTE&quot; class=&quot;mt-stat &lt;?= $filtro===&#x27;PENDIENTE&#x27;?&#x27;mt-stat-activo&#x27;:&#x27;&#x27; ?&gt;&quot;&gt;</code> → crea una tarjeta/enlace de filtro de tareas; se conecta con el parámetro `estado` de la URL y con `$model->listar()`; si se quita, ese filtro específico no podrá usarse.

Línea 84: <code>        &lt;span class=&quot;mt-stat-num mt-num-pendiente&quot;&gt;&lt;?= $resumen[&#x27;pendientes&#x27;] ?&gt;&lt;/span&gt;</code> → muestra un número de resumen calculado en PHP; se conecta con `$resumen`; si se quita, la tarjeta no mostraría cuántas tareas hay.

Línea 85: <code>        &lt;span class=&quot;mt-stat-lbl&quot;&gt;Pendientes&lt;/span&gt;</code> → muestra la etiqueta textual del filtro; se conecta con la tarjeta de resumen; si se quita, el número quedaría sin contexto.

Línea 86: <code>      &lt;/a&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 87: <code>      &lt;a href=&quot;mis_tareas.php?estado=EN_PROGRESO&quot; class=&quot;mt-stat &lt;?= $filtro===&#x27;EN_PROGRESO&#x27;?&#x27;mt-stat-activo&#x27;:&#x27;&#x27; ?&gt;&quot;&gt;</code> → crea una tarjeta/enlace de filtro de tareas; se conecta con el parámetro `estado` de la URL y con `$model->listar()`; si se quita, ese filtro específico no podrá usarse.

Línea 88: <code>        &lt;span class=&quot;mt-stat-num mt-num-proceso&quot;&gt;&lt;?= $resumen[&#x27;en_proceso&#x27;] ?&gt;&lt;/span&gt;</code> → muestra un número de resumen calculado en PHP; se conecta con `$resumen`; si se quita, la tarjeta no mostraría cuántas tareas hay.

Línea 89: <code>        &lt;span class=&quot;mt-stat-lbl&quot;&gt;En proceso&lt;/span&gt;</code> → muestra la etiqueta textual del filtro; se conecta con la tarjeta de resumen; si se quita, el número quedaría sin contexto.

Línea 90: <code>      &lt;/a&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 91: <code>      &lt;a href=&quot;mis_tareas.php?estado=COMPLETADA&quot; class=&quot;mt-stat &lt;?= $filtro===&#x27;COMPLETADA&#x27;?&#x27;mt-stat-activo&#x27;:&#x27;&#x27; ?&gt;&quot;&gt;</code> → crea una tarjeta/enlace de filtro de tareas; se conecta con el parámetro `estado` de la URL y con `$model->listar()`; si se quita, ese filtro específico no podrá usarse.

Línea 92: <code>        &lt;span class=&quot;mt-stat-num mt-num-completada&quot;&gt;&lt;?= $resumen[&#x27;completadas&#x27;] ?&gt;&lt;/span&gt;</code> → muestra un número de resumen calculado en PHP; se conecta con `$resumen`; si se quita, la tarjeta no mostraría cuántas tareas hay.

Línea 93: <code>        &lt;span class=&quot;mt-stat-lbl&quot;&gt;Completadas&lt;/span&gt;</code> → muestra la etiqueta textual del filtro; se conecta con la tarjeta de resumen; si se quita, el número quedaría sin contexto.

Línea 94: <code>      &lt;/a&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 95: <code>    &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 7: Mensaje global de retroalimentación

Línea 98: <code>    &lt;div id=&quot;msgGlobal&quot; style=&quot;display:none;padding:10px 16px;border-radius:8px;margin-bottom:16px;font-size:14px;font-weight:500;&quot;&gt;&lt;/div&gt;</code> → crea un contenedor oculto para mensajes de éxito o error; se conecta con JavaScript que cambia su texto y estilos; si se quita, el usuario no vería respuesta después de completar tareas, editar perfil o enviar solicitudes.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 101: <code>    &lt;?php if (empty($tareas)): ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 102: <code>      &lt;div class=&quot;mt-vacia&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 103: <code>        &lt;span style=&quot;font-size:40px;&quot;&gt;📋&lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 6: Tarjetas resumen y filtros por estado de tarea

Línea 104: <code>        &lt;p&gt;No tienes tareas &lt;?= $filtro ? &#x27;con ese estado&#x27; : &#x27;asignadas&#x27; ?&gt; actualmente.&lt;/p&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 105: <code>      &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 106: <code>    &lt;?php else: ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 107: <code>      &lt;?php foreach ($tareas as $t):</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 108: <code>        [$clsBadge, $lblBadge] = match($t[&#x27;estado_tarea&#x27;]) {</code> → evalúa el estado de una tarea y devuelve valores según el caso; se conecta con `$t['estado_tarea']` obtenido del modelo; si se quita, la vista no podría asignar correctamente clases o etiquetas de estado.

Línea 109: <code>          &#x27;PENDIENTE&#x27;   =&gt; [&#x27;mt-badge-pendiente&#x27;, &#x27;Pendiente&#x27;],</code> → define una opción dentro de una estructura `match` o arreglo; se conecta con el estado que viene de la base de datos; si se quita, ese caso perdería su etiqueta o estilo específico.

Línea 110: <code>          &#x27;EN_PROGRESO&#x27; =&gt; [&#x27;mt-badge-proceso&#x27;,   &#x27;En proceso&#x27;],</code> → define una opción dentro de una estructura `match` o arreglo; se conecta con el estado que viene de la base de datos; si se quita, ese caso perdería su etiqueta o estilo específico.

Línea 111: <code>          &#x27;COMPLETADA&#x27;  =&gt; [&#x27;mt-badge-completada&#x27;,&#x27;Completada&#x27;],</code> → define una opción dentro de una estructura `match` o arreglo; se conecta con el estado que viene de la base de datos; si se quita, ese caso perdería su etiqueta o estilo específico.

Línea 112: <code>          default       =&gt; [&#x27;&#x27;, htmlspecialchars($t[&#x27;estado_tarea&#x27;])],</code> → define una opción dentro de una estructura `match` o arreglo; se conecta con el estado que viene de la base de datos; si se quita, ese caso perdería su etiqueta o estilo específico.

Línea 113: <code>        };</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 114: <code>        $completada = ($t[&#x27;estado_tarea&#x27;] === &#x27;COMPLETADA&#x27;);</code> → guarda si la tarea está completada como valor booleano; se conecta con `$t['estado_tarea']` y con el botón de completar; si se quita, la vista no sabría si debe mostrar el botón o la etiqueta de tarea completada.

Línea 115: <code>      ?&gt;</code> → cierra el bloque PHP inicial y permite que el archivo continúe escribiendo HTML normal; se conecta con todo el marcado que viene después porque libera la salida hacia el navegador; si se quita en este punto, el HTML podría quedar mezclado dentro de PHP y producir errores de sintaxis.

Línea 116: <code>      &lt;div class=&quot;mt-card &lt;?= $completada ? &#x27;mt-card-completada&#x27; : &#x27;&#x27; ?&gt;&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 119: <code>        &lt;div class=&quot;mt-card-header&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 120: <code>          &lt;div class=&quot;mt-card-info&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 121: <code>            &lt;h2 class=&quot;mt-card-nombre&quot;&gt;&lt;?= htmlspecialchars($t[&#x27;nombre&#x27;]) ?&gt;&lt;/h2&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 122: <code>            &lt;p class=&quot;mt-card-lote&quot;&gt;&lt;?= htmlspecialchars($t[&#x27;lote&#x27;]) ?&gt;&lt;/p&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 123: <code>            &lt;?php if ($t[&#x27;descripcion&#x27;]): ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 124: <code>              &lt;p class=&quot;mt-card-desc&quot;&gt;&lt;?= htmlspecialchars($t[&#x27;descripcion&#x27;]) ?&gt;&lt;/p&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 125: <code>            &lt;?php endif; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 126: <code>          &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 127: <code>          &lt;span class=&quot;mt-badge &lt;?= $clsBadge ?&gt;&quot;&gt;&lt;?= $lblBadge ?&gt;&lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 128: <code>        &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 131: <code>        &lt;div class=&quot;mt-card-fechas&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 132: <code>          &lt;div class=&quot;mt-fecha-item&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 133: <code>            &lt;span class=&quot;mt-fecha-label&quot;&gt;Fecha Asignación&lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 134: <code>            &lt;span class=&quot;mt-fecha-valor&quot;&gt;&lt;?= htmlspecialchars($t[&#x27;fecha_inicio&#x27;] ?? &#x27;—&#x27;) ?&gt;&lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 135: <code>          &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 136: <code>          &lt;div class=&quot;mt-fecha-item&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 137: <code>            &lt;span class=&quot;mt-fecha-label&quot;&gt;Fecha Vencimiento&lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 138: <code>            &lt;span class=&quot;mt-fecha-valor &lt;?= (!$completada &amp;&amp; $t[&#x27;fecha_fin_estimada&#x27;] &amp;&amp; $t[&#x27;fecha_fin_estimada&#x27;] &lt; date(&#x27;Y-m-d&#x27;)) ? &#x27;mt-fecha-vencida&#x27; : &#x27;&#x27; ?&gt;&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 139: <code>              &lt;?= htmlspecialchars($t[&#x27;fecha_fin_estimada&#x27;] ?? &#x27;—&#x27;) ?&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 140: <code>            &lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 141: <code>          &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 142: <code>          &lt;div class=&quot;mt-fecha-item&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 143: <code>            &lt;span class=&quot;mt-fecha-label&quot;&gt;Asignado por&lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 144: <code>            &lt;span class=&quot;mt-fecha-valor&quot;&gt;&lt;?= htmlspecialchars($t[&#x27;mayordomo&#x27;]) ?&gt;&lt;/span&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 145: <code>          &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 146: <code>        &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 149: <code>        &lt;?php if (!$completada): ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 150: <code>          &lt;button class=&quot;mt-btn-completar&quot;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 151: <code>                  id=&quot;btn-&lt;?= $t[&#x27;id_tarea&#x27;] ?&gt;&quot;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 152: <code>                  onclick=&quot;completarTarea(&lt;?= $t[&#x27;id_tarea&#x27;] ?&gt;)&quot;&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 153: <code>            ✓ Completar Tarea</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 154: <code>          &lt;/button&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 155: <code>        &lt;?php else: ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 156: <code>          &lt;div class=&quot;mt-completada-label&quot;&gt;✓ Tarea completada&lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 157: <code>        &lt;?php endif; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 159: <code>      &lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 160: <code>      &lt;?php endforeach; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 161: <code>    &lt;?php endif; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.

Línea 163: <code>  &lt;/main&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 164: <code>&lt;/div&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.


## Bloque 9: Estilos CSS propios de la vista

Línea 166: <code>&lt;style&gt;</code> → abre un bloque de estilos internos propios de esta vista; se conecta con las clases usadas en el HTML del mismo archivo; si se quita, estos estilos específicos no se aplicarían.


## Bloque 5: Cabecera visual de Mis Tareas

Línea 168: <code>  .mt-header { margin-bottom: 20px; }</code> → define en una sola línea estilos para `.mt-header`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 169: <code>  .mt-titulo  { font-size: 22px; font-weight: 700; color: #111827; margin: 0 0 4px; }</code> → define en una sola línea estilos para `.mt-titulo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 170: <code>  .mt-subtitulo { font-size: 14px; color: #6b7280; margin: 0; }</code> → define en una sola línea estilos para `.mt-subtitulo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 6: Tarjetas resumen y filtros por estado de tarea

Línea 173: <code>  .mt-resumen {</code> → abre la regla CSS para `.mt-resumen`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 174: <code>    display: flex;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 175: <code>    gap: 12px;</code> → define separación entre hijos mediante la propiedad CSS `gap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 176: <code>    margin-bottom: 24px;</code> → define separación inferior mediante la propiedad CSS `margin-bottom`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 177: <code>    flex-wrap: wrap;</code> → aplica una propiedad visual mediante la propiedad CSS `flex-wrap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 178: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 6: Tarjetas resumen y filtros por estado de tarea

Línea 179: <code>  .mt-stat {</code> → abre la regla CSS para `.mt-stat`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 180: <code>    display: flex;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 181: <code>    flex-direction: column;</code> → define dirección de elementos flex mediante la propiedad CSS `flex-direction`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 182: <code>    align-items: center;</code> → alinea elementos en el eje transversal mediante la propiedad CSS `align-items`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 183: <code>    gap: 4px;</code> → define separación entre hijos mediante la propiedad CSS `gap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 184: <code>    background: #fff;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 185: <code>    border: 1.5px solid #e5e7eb;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 186: <code>    border-radius: 10px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 187: <code>    padding: 14px 24px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 188: <code>    text-decoration: none;</code> → aplica una propiedad visual mediante la propiedad CSS `text-decoration`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 189: <code>    transition: border-color 0.2s, box-shadow 0.2s;</code> → suaviza cambios visuales mediante la propiedad CSS `transition`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 190: <code>    min-width: 90px;</code> → define ancho mínimo mediante la propiedad CSS `min-width`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 191: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 6: Tarjetas resumen y filtros por estado de tarea

Línea 192: <code>  .mt-stat:hover { border-color: #2e9e4f; box-shadow: 0 2px 8px rgba(46,158,79,0.12); }</code> → define en una sola línea estilos para `.mt-stat:hover`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 193: <code>  .mt-stat-activo { border-color: #2e9e4f; background: #f0fdf4; }</code> → define en una sola línea estilos para `.mt-stat-activo`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 194: <code>  .mt-stat-num { font-size: 26px; font-weight: 700; color: #111827; line-height: 1; }</code> → define en una sola línea estilos para `.mt-stat-num`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 195: <code>  .mt-stat-lbl { font-size: 12px; color: #6b7280; font-weight: 500; }</code> → define en una sola línea estilos para `.mt-stat-lbl`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 196: <code>  .mt-num-pendiente  { color: #92400e; }</code> → define en una sola línea estilos para `.mt-num-pendiente`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 197: <code>  .mt-num-proceso    { color: #1e40af; }</code> → define en una sola línea estilos para `.mt-num-proceso`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 198: <code>  .mt-num-completada { color: #166534; }</code> → define en una sola línea estilos para `.mt-num-completada`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 201: <code>  .mt-card {</code> → abre la regla CSS para `.mt-card`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 202: <code>    background: #fff;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 203: <code>    border: 1px solid #e5e7eb;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 204: <code>    border-radius: 12px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 205: <code>    padding: 22px 24px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 206: <code>    margin-bottom: 16px;</code> → define separación inferior mediante la propiedad CSS `margin-bottom`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 207: <code>    box-shadow: 0 1px 4px rgba(0,0,0,0.06);</code> → agrega sombra para profundidad mediante la propiedad CSS `box-shadow`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 208: <code>    transition: box-shadow 0.2s;</code> → suaviza cambios visuales mediante la propiedad CSS `transition`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 209: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 210: <code>  .mt-card:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.09); }</code> → define en una sola línea estilos para `.mt-card:hover`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 211: <code>  .mt-card-completada { opacity: 0.75; }</code> → define en una sola línea estilos para `.mt-card-completada`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 213: <code>  .mt-card-header {</code> → abre la regla CSS para `.mt-card-header`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 214: <code>    display: flex;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 215: <code>    align-items: flex-start;</code> → alinea elementos en el eje transversal mediante la propiedad CSS `align-items`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 216: <code>    justify-content: space-between;</code> → distribuye elementos en el eje principal mediante la propiedad CSS `justify-content`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 217: <code>    gap: 16px;</code> → define separación entre hijos mediante la propiedad CSS `gap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 218: <code>    margin-bottom: 16px;</code> → define separación inferior mediante la propiedad CSS `margin-bottom`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 219: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 220: <code>  .mt-card-nombre { font-size: 17px; font-weight: 700; color: #111827; margin: 0 0 4px; }</code> → define en una sola línea estilos para `.mt-card-nombre`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 221: <code>  .mt-card-lote   { font-size: 13px; color: #2e9e4f; font-weight: 600; margin: 0 0 6px; }</code> → define en una sola línea estilos para `.mt-card-lote`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 222: <code>  .mt-card-desc   { font-size: 13px; color: #6b7280; margin: 0; }</code> → define en una sola línea estilos para `.mt-card-desc`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 225: <code>  .mt-badge {</code> → abre la regla CSS para `.mt-badge`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 226: <code>    display: inline-block;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 227: <code>    padding: 5px 14px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 228: <code>    border-radius: 20px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 229: <code>    font-size: 12px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 230: <code>    font-weight: 700;</code> → define el grosor del texto mediante la propiedad CSS `font-weight`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 231: <code>    white-space: nowrap;</code> → controla saltos de línea mediante la propiedad CSS `white-space`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 232: <code>    flex-shrink: 0;</code> → controla reducción en flex mediante la propiedad CSS `flex-shrink`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 233: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 234: <code>  .mt-badge-pendiente  { background: #fef3c7; color: #92400e; }</code> → define en una sola línea estilos para `.mt-badge-pendiente`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 235: <code>  .mt-badge-proceso    { background: #dbeafe; color: #1e40af; }</code> → define en una sola línea estilos para `.mt-badge-proceso`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 236: <code>  .mt-badge-completada { background: #dcfce7; color: #166534; }</code> → define en una sola línea estilos para `.mt-badge-completada`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 239: <code>  .mt-card-fechas {</code> → abre la regla CSS para `.mt-card-fechas`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 240: <code>    display: flex;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 241: <code>    gap: 32px;</code> → define separación entre hijos mediante la propiedad CSS `gap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 242: <code>    flex-wrap: wrap;</code> → aplica una propiedad visual mediante la propiedad CSS `flex-wrap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 243: <code>    margin-bottom: 18px;</code> → define separación inferior mediante la propiedad CSS `margin-bottom`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 244: <code>    padding-top: 14px;</code> → aplica una propiedad visual mediante la propiedad CSS `padding-top`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 245: <code>    border-top: 1px solid #f3f4f6;</code> → aplica una propiedad visual mediante la propiedad CSS `border-top`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 246: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 247: <code>  .mt-fecha-item { display: flex; flex-direction: column; gap: 3px; }</code> → define en una sola línea estilos para `.mt-fecha-item`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 248: <code>  .mt-fecha-label { font-size: 11px; color: #9ca3af; font-weight: 500; text-transform: uppercase; letter-spacing: 0.04em; }</code> → define en una sola línea estilos para `.mt-fecha-label`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 249: <code>  .mt-fecha-valor { font-size: 14px; font-weight: 600; color: #111827; }</code> → define en una sola línea estilos para `.mt-fecha-valor`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 250: <code>  .mt-fecha-vencida { color: #dc2626; }</code> → define en una sola línea estilos para `.mt-fecha-vencida`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 253: <code>  .mt-btn-completar {</code> → abre la regla CSS para `.mt-btn-completar`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 254: <code>    width: 100%;</code> → define el ancho mediante la propiedad CSS `width`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 255: <code>    background: #2e9e4f;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 256: <code>    color: #fff;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 257: <code>    border: none;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 258: <code>    border-radius: 8px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 259: <code>    padding: 13px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 260: <code>    font-size: 15px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 261: <code>    font-weight: 700;</code> → define el grosor del texto mediante la propiedad CSS `font-weight`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 262: <code>    cursor: pointer;</code> → cambia el cursor del mouse mediante la propiedad CSS `cursor`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 263: <code>    transition: background 0.2s, opacity 0.2s;</code> → suaviza cambios visuales mediante la propiedad CSS `transition`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 264: <code>    display: flex;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 265: <code>    align-items: center;</code> → alinea elementos en el eje transversal mediante la propiedad CSS `align-items`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 266: <code>    justify-content: center;</code> → distribuye elementos en el eje principal mediante la propiedad CSS `justify-content`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 267: <code>    gap: 8px;</code> → define separación entre hijos mediante la propiedad CSS `gap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 268: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 269: <code>  .mt-btn-completar:hover    { background: #237a3d; }</code> → define en una sola línea estilos para `.mt-btn-completar:hover`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 270: <code>  .mt-btn-completar:disabled { opacity: 0.6; cursor: not-allowed; }</code> → define en una sola línea estilos para `.mt-btn-completar:disabled`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 273: <code>  .mt-completada-label {</code> → abre la regla CSS para `.mt-completada-label`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.


## Bloque 9: Estilos CSS propios de la vista

Línea 274: <code>    width: 100%;</code> → define el ancho mediante la propiedad CSS `width`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 275: <code>    text-align: center;</code> → alinea texto mediante la propiedad CSS `text-align`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 276: <code>    padding: 12px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 277: <code>    font-size: 14px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 278: <code>    font-weight: 600;</code> → define el grosor del texto mediante la propiedad CSS `font-weight`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 279: <code>    color: #166534;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 280: <code>    background: #f0fdf4;</code> → define el color o fondo visual mediante la propiedad CSS `background`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 281: <code>    border-radius: 8px;</code> → redondea las esquinas mediante la propiedad CSS `border-radius`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 282: <code>    border: 1px solid #bbf7d0;</code> → define el borde del elemento mediante la propiedad CSS `border`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 283: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 286: <code>  .mt-vacia {</code> → abre la regla CSS para `.mt-vacia`; se conecta con los elementos HTML que usan esa clase o selector; si se quita, esos elementos dejan de recibir este grupo de estilos.

Línea 287: <code>    text-align: center;</code> → alinea texto mediante la propiedad CSS `text-align`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 288: <code>    padding: 60px 20px;</code> → define espacio interno mediante la propiedad CSS `padding`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 289: <code>    color: #9ca3af;</code> → define el color del texto mediante la propiedad CSS `color`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 290: <code>    font-size: 15px;</code> → define el tamaño del texto mediante la propiedad CSS `font-size`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 291: <code>    display: flex;</code> → define cómo se comporta el elemento en layout mediante la propiedad CSS `display`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 292: <code>    flex-direction: column;</code> → define dirección de elementos flex mediante la propiedad CSS `flex-direction`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 293: <code>    align-items: center;</code> → alinea elementos en el eje transversal mediante la propiedad CSS `align-items`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 294: <code>    gap: 12px;</code> → define separación entre hijos mediante la propiedad CSS `gap`; se conecta con el selector CSS que está abierto y con los elementos HTML que usan esa clase; si se quita, cambia la presentación visual aunque la lógica del sistema normalmente seguiría funcionando.

Línea 295: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 297: <code>  @media (max-width: 600px) {</code> → abre una regla responsive para pantallas pequeñas; se conecta con el diseño móvil de la vista; si se quita, la pantalla puede verse mal en celulares.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 298: <code>    .mt-card-fechas { gap: 16px; }</code> → define en una sola línea estilos para `.mt-card-fechas`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 6: Tarjetas resumen y filtros por estado de tarea

Línea 299: <code>    .mt-resumen { gap: 8px; }</code> → define en una sola línea estilos para `.mt-resumen`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.

Línea 300: <code>    .mt-stat { padding: 10px 16px; min-width: 70px; }</code> → define en una sola línea estilos para `.mt-stat`; se conecta con elementos HTML que usan esa clase, estado o media query; si se quita, esa parte concreta del diseño pierde margen, color, tamaño o comportamiento visual.


## Bloque 9: Estilos CSS propios de la vista

Línea 301: <code>  }</code> → cierra la regla CSS o el bloque responsive actual; se conecta con el selector o `@media` abierto; si se quita, las reglas siguientes pueden quedar mal interpretadas.

Línea 302: <code>&lt;/style&gt;</code> → cierra el bloque de CSS interno; se conecta con el `<style>` abierto antes; si se quita, el navegador podría interpretar mal el resto del documento.

Línea 305: <code>&lt;div id=&quot;logoutOverlay&quot; style=&quot;display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:9999;align-items:center;justify-content:center;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 306: <code>  &lt;div style=&quot;background:#fff;border-radius:16px;padding:32px 36px;max-width:380px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.25);text-align:center;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 307: <code>    &lt;p style=&quot;font-size:18px;font-weight:700;color:#111827;margin:0 0 24px;&quot;&gt;¿Deseas cerrar sesión?&lt;/p&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 308: <code>    &lt;div style=&quot;display:flex;gap:12px;justify-content:center;&quot;&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 309: <code>      &lt;button onclick=&quot;cerrarLogoutModal()&quot; style=&quot;background:#f3f4f6;color:#374151;border:none;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:600;cursor:pointer;&quot;&gt;Cancelar&lt;/button&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.


## Bloque 4: Contenedor principal, barra superior, usuario, notificaciones y cierre de sesión

Línea 310: <code>      &lt;a href=&quot;../../controllers/LogoutController.php&quot; style=&quot;background:#e53935;color:#fff;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;&quot;&gt;Confirmar&lt;/a&gt;</code> → crea o cierra una parte de la interfaz HTML que el trabajador ve en el navegador; se conecta con clases CSS, ids usados por JavaScript o variables PHP impresas; si se quita, puede desaparecer contenido visual o romper la estructura de la página.

Línea 311: <code>    &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 312: <code>  &lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.

Línea 313: <code>&lt;/div&gt;</code> → cierra un contenedor `div` abierto previamente; se conecta con la organización visual del bloque actual; si se quita, el diseño puede desordenarse porque los contenedores quedarían abiertos.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 315: <code>&lt;script&gt;</code> → abre el bloque JavaScript que se ejecutará en el navegador; se conecta con botones, formularios, ids del HTML y controladores PHP por `fetch`; si se quita, la vista pierde interacciones dinámicas.

Línea 316: <code>  function toggleSidebar() {</code> → declara la función que abre o cierra el menú lateral; se conecta con el botón hamburguesa de la topbar; si se quita, ese botón dejaría de funcionar.

Línea 317: <code>    document.getElementById(&#x27;sidebar&#x27;).classList.toggle(&#x27;sidebar-open&#x27;);</code> → agrega o quita la clase `sidebar-open` al elemento `sidebar`; se conecta con CSS responsive del menú; si se quita, el sidebar no cambiaría de estado al hacer clic.

Línea 318: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 321: <code>  function abrirLogoutModal() {</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 322: <code>    document.getElementById(&#x27;logoutOverlay&#x27;).style.display = &#x27;flex&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 323: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 324: <code>  function cerrarLogoutModal() {</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 325: <code>    document.getElementById(&#x27;logoutOverlay&#x27;).style.display = &#x27;none&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 326: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 327: <code>  document.querySelectorAll(&#x27;.btn-logout&#x27;).forEach(function(btn) {</code> → recorre varios ids de campos para aplicarles el mismo cambio; se conecta con nombres, apellidos, documento y teléfono; si se quita, habría que repetir manualmente esa lógica.

Línea 328: <code>    btn.addEventListener(&#x27;click&#x27;, function(e) {</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 329: <code>      e.preventDefault();</code> → evita que el formulario recargue la página de forma tradicional; se conecta con el envío por AJAX; si se quita, el navegador recargaría y se perdería el control del mensaje dinámico.

Línea 330: <code>      abrirLogoutModal();</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 331: <code>    });</code> → cierra una función anónima y el registro del evento asociado; se conecta con `addEventListener`; si se quita, el listener queda incompleto y JavaScript falla.

Línea 332: <code>  });</code> → cierra una función anónima y el registro del evento asociado; se conecta con `addEventListener`; si se quita, el listener queda incompleto y JavaScript falla.

Línea 333: <code>  document.getElementById(&#x27;logoutOverlay&#x27;).addEventListener(&#x27;click&#x27;, function(e) {</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 334: <code>    if (e.target === this) cerrarLogoutModal();</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 335: <code>  });</code> → cierra una función anónima y el registro del evento asociado; se conecta con `addEventListener`; si se quita, el listener queda incompleto y JavaScript falla.


## Bloque 8: Listado de tareas, estados, fechas y botón para completar

Línea 337: <code>  async function completarTarea(idTarea) {</code> → declara una función asíncrona para enviar datos al servidor sin recargar inmediatamente; se conecta con `fetch`, formularios y controladores PHP; si se quita, esa acción dinámica no existirá.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 338: <code>    const btn = document.getElementById(&#x27;btn-&#x27; + idTarea);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.

Línea 339: <code>    if (!btn) return;</code> → ejecuta una instrucción JavaScript que manipula la interfaz o comunica la vista con el backend; se conecta con ids del HTML, formularios o controladores PHP; si se quita, puede fallar una interacción del usuario.

Línea 340: <code>    btn.disabled = true;</code> → deshabilita el botón mientras se procesa la acción; se conecta con prevención de doble envío; si se quita, el usuario podría enviar varias veces la misma solicitud.

Línea 341: <code>    btn.textContent = &#x27;Completando…&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 343: <code>    const fd = new FormData();</code> → crea un paquete con los datos del formulario para enviarlo al backend; se conecta con los campos `name` del HTML; si se quita, el controlador no recibiría los datos necesarios.

Línea 344: <code>    fd.append(&#x27;accion&#x27;,   &#x27;completar&#x27;);</code> → agrega manualmente un dato al `FormData`; se conecta con el controlador que espera `accion` o `id_tarea`; si se quita, el backend no sabría qué operación realizar o sobre qué registro actuar.

Línea 345: <code>    fd.append(&#x27;id_tarea&#x27;, idTarea);</code> → agrega manualmente un dato al `FormData`; se conecta con el controlador que espera `accion` o `id_tarea`; si se quita, el backend no sabría qué operación realizar o sobre qué registro actuar.

Línea 347: <code>    try {</code> → abre un bloque para intentar una petición que puede fallar; se conecta con `catch` para manejar errores; si se quita, los fallos de red podrían romper la ejecución sin mensaje claro.

Línea 348: <code>      const res  = await fetch(&#x27;../../controllers/TrabajadorTareaController.php&#x27;, {</code> → envía una petición HTTP al controlador `TrabajadorTareaController.php`; se conecta con el backend que actualiza o registra datos en la base de datos; si se quita, la acción del usuario no llegaría al servidor.

Línea 349: <code>        method: &#x27;POST&#x27;, body: fd</code> → configura la petición para enviar datos por POST y adjunta el `FormData`; se conecta con el controlador PHP que lee `$_POST`; si se quita, el backend puede no recibir correctamente la información.

Línea 350: <code>      });</code> → cierra una función anónima y el registro del evento asociado; se conecta con `addEventListener`; si se quita, el listener queda incompleto y JavaScript falla.

Línea 351: <code>      const data = await res.json();</code> → convierte la respuesta del servidor en un objeto JavaScript; se conecta con los campos esperados como `ok`, `msg` o `mensaje`; si se quita, no se podría saber si la operación fue exitosa.


## Bloque 7: Mensaje global de retroalimentación

Línea 353: <code>      const msg = document.getElementById(&#x27;msgGlobal&#x27;);</code> → busca un elemento del HTML por su id y lo guarda en una constante; se conecta con los ids definidos en la vista; si se quita, las líneas siguientes no podrían modificar ese elemento.


## Bloque 10: JavaScript de interacción, formularios, AJAX y mensajes

Línea 354: <code>      msg.textContent   = data.msg;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 355: <code>      msg.style.display = &#x27;block&#x27;;</code> → cambia si un elemento se muestra u oculta; se conecta con paneles, mensajes y formularios ocultos; si se quita, el elemento puede quedarse siempre visible o siempre oculto.

Línea 356: <code>      msg.style.background = data.ok ? &#x27;#dcfce7&#x27; : &#x27;#fdecea&#x27;;</code> → cambia el fondo según éxito o error; se conecta con la variable booleana `ok`; si se quita, los mensajes perderían color de estado.

Línea 357: <code>      msg.style.color      = data.ok ? &#x27;#166534&#x27; : &#x27;#b91c1c&#x27;;</code> → cambia el color del texto según éxito o error; se conecta con la variable `ok`; si se quita, el mensaje sería menos claro visualmente.

Línea 359: <code>      if (data.ok) {</code> → valida si el servidor respondió que la operación fue correcta; se conecta con la respuesta JSON del controlador; si se quita, la vista no distinguiría éxito de error.

Línea 360: <code>        setTimeout(() =&gt; location.reload(), 1000);</code> → programa una acción después de unos segundos; se conecta con ocultar mensajes o recargar la página; si se quita, el mensaje quedaría fijo o la pantalla no se actualizaría automáticamente.

Línea 361: <code>      } else {</code> → abre el camino alternativo cuando la condición anterior no se cumple; se conecta con errores o casos negativos; si se quita, no habría manejo visual cuando el backend rechaza la operación.

Línea 362: <code>        btn.disabled    = false;</code> → vuelve a habilitar el botón después de un error o finalización; se conecta con recuperación de la interfaz; si se quita, el botón podría quedar bloqueado.

Línea 363: <code>        btn.textContent = &#x27;✓ Completar Tarea&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 364: <code>      }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 365: <code>    } catch {</code> → captura errores de conexión o ejecución de la petición; se conecta con el bloque `try`; si se quita, un fallo de red dejaría errores en consola sin avisar al usuario.

Línea 366: <code>      btn.disabled    = false;</code> → vuelve a habilitar el botón después de un error o finalización; se conecta con recuperación de la interfaz; si se quita, el botón podría quedar bloqueado.

Línea 367: <code>      btn.textContent = &#x27;✓ Completar Tarea&#x27;;</code> → cambia el texto visible de un elemento; se conecta con mensajes, botones o datos actualizados en pantalla; si se quita, el usuario no vería ese cambio visual.

Línea 368: <code>    }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 369: <code>  }</code> → cierra el bloque JavaScript anterior; se conecta con la función, condición, try/catch o evento abierto; si se quita, el script queda con estructura inválida.

Línea 370: <code>&lt;/script&gt;</code> → cierra el bloque JavaScript; se conecta con el `<script>` abierto antes; si se quita, el HTML posterior podría interpretarse como JavaScript y fallar.


## Bloque 1: PHP inicial, seguridad, conexión a base de datos y carga de información

Línea 372: <code>&lt;?php require_once __DIR__ . &#x27;/includes/notificaciones_panel.php&#x27;; ?&gt;</code> → abre el bloque de PHP del lado del servidor; desde aquí el archivo puede validar sesión, cargar modelos y preparar datos antes de imprimir HTML; se conecta con el motor PHP de Apache/XAMPP y con las variables de sesión; si se quita, el servidor no interpreta las instrucciones PHP iniciales y la vista deja de cargar datos dinámicos.


## Bloque 11: Inclusión del panel de notificaciones y cierre del documento

Línea 374: <code>&lt;/body&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.

Línea 375: <code>&lt;/html&gt;</code> → ejecuta una instrucción PHP necesaria para preparar o controlar datos del lado del servidor; se conecta con variables de sesión, modelos o estructuras de plantilla; si se quita, puede romper la carga de información o el flujo dinámico de la vista.
