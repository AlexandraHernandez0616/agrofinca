# Documentación línea por línea — `mis_prestamos.php`

Archivo documentado: `views/trabajador/mis_prestamos.php`  
Módulo: Trabajador / Mis Préstamos  
Función general: este archivo muestra al trabajador el historial de solicitudes o préstamos de herramientas. Es una vista de solo lectura: no aprueba, no rechaza, no entrega y no devuelve herramientas; solamente consulta datos desde el modelo `TrabajadorPrestamo`, los organiza en tarjetas de resumen y los muestra en una tabla.

Trazabilidad general: este archivo se conecta con la sesión PHP para saber qué usuario está autenticado, con `config/database.php` para abrir conexión a la base de datos, con `models/TrabajadorPrestamo.php` para consultar el resumen y listado de préstamos del trabajador, con `styles/dashboard.css` para estilos generales del panel, con `controllers/LogoutController.php` para cerrar sesión y con `includes/notificaciones_panel.php` para cargar el panel de notificaciones. Si este archivo se quita, el trabajador pierde la pantalla donde consulta sus préstamos y solicitudes de herramientas.

## Bloque 1 — Inicio PHP, sesión, protección de ruta, conexión y carga de datos

Línea 1: `<?php` → Abre el bloque de código PHP del archivo, permitiendo ejecutar lógica del servidor antes de enviar HTML al navegador; se conecta directamente con el intérprete PHP del servidor, porque sin esta apertura el servidor trataría las siguientes instrucciones como texto normal y no ejecutaría la sesión, la protección de ruta ni las consultas; si se quita, todo el bloque PHP inicial dejaría de funcionar y el archivo podría mostrar errores o código visible al usuario.

Línea 6: `session_start();` → Inicia o reanuda la sesión del usuario en PHP para poder leer variables como `$_SESSION['id_usuario']`, `$_SESSION['rol']` y `$_SESSION['username']`; se conecta con el sistema de autenticación que guardó esos datos cuando el usuario inició sesión; si se quita, el archivo no podría validar correctamente quién está logueado y podrían fallar la protección de ruta, el nombre del usuario y la consulta de préstamos del trabajador.

Línea 7: `if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'TRABAJADOR') {` → Verifica si no existe un usuario autenticado o si el rol del usuario no es `TRABAJADOR`; se conecta con las variables de sesión creadas por el login, y sirve para impedir que administradores, mayordomos, usuarios sin sesión o visitantes entren a esta vista; si se quita, cualquier persona que conozca la ruta podría intentar acceder a la pantalla de préstamos del trabajador.

Línea 8: `header("Location: ../../views/usuarios/login.php"); exit;` → Redirige al login cuando la condición anterior detecta que no hay sesión válida o que el rol no corresponde, y luego detiene la ejecución del archivo con `exit`; se conecta con la vista `views/usuarios/login.php`, que es el punto donde el usuario debe autenticarse; si se quita, aunque el usuario no tenga permiso, el archivo podría seguir ejecutándose y tratar de usar datos de sesión inexistentes, causando errores o exposición de información.

Línea 9: `}` → Cierra el bloque `if` de protección de ruta; se conecta con la condición de la línea 7 porque delimita hasta dónde llega la redirección de seguridad; si se quita, PHP no sabría dónde termina la condición y el archivo tendría un error de sintaxis.

Línea 11: `require_once __DIR__ . '/../../config/database.php';` → Importa el archivo de configuración de base de datos para poder usar la clase `Database`; se conecta con `config/database.php`, donde debe existir el método `conectar()`; si se quita, la línea que crea `$db` no encontraría la clase `Database` y el módulo no podría consultar préstamos.

Línea 12: `require_once __DIR__ . '/../../models/TrabajadorPrestamo.php';` → Importa el modelo encargado de consultar los préstamos o solicitudes de herramientas del trabajador; se conecta con `models/TrabajadorPrestamo.php`, donde deben existir métodos como `resumen()` y `listar()`; si se quita, la creación de `new TrabajadorPrestamo($db)` fallaría porque PHP no conocería esa clase.

Línea 14: `$db            = (new Database())->conectar();` → Crea una instancia de `Database` y llama a `conectar()` para obtener la conexión real a la base de datos; se conecta con `config/database.php` y con todas las consultas que hará el modelo; si se quita, el modelo no tendría conexión y no podría traer el resumen ni la lista de préstamos.

Línea 15: `$model         = new TrabajadorPrestamo($db);` → Crea el objeto del modelo `TrabajadorPrestamo` y le entrega la conexión `$db`; se conecta con la clase del modelo y permite consultar datos relacionados con herramientas prestadas, solicitudes pendientes, aprobadas, negadas y devueltas; si se quita, no existiría `$model` y fallarían las líneas que llaman `resumen()` y `listar()`.

Línea 16: `$id_trabajador = (int) $_SESSION['id_usuario'];` → Toma el identificador del usuario logueado desde la sesión y lo convierte a entero para usarlo como identificador del trabajador; se conecta con la sesión del login y con las consultas del modelo, porque ese id sirve para filtrar solo los préstamos de ese trabajador; si se quita, el sistema no sabría de qué trabajador debe traer los préstamos.

Línea 18: `$resumen  = $model->resumen($id_trabajador);` → Llama al método `resumen()` del modelo para obtener cantidades agrupadas como total, pendientes, aprobados, negados y devueltos; se conecta con `TrabajadorPrestamo.php` y probablemente con la tabla de préstamos o solicitudes de herramientas en la base de datos; si se quita, las tarjetas resumen no tendrían datos y aparecerían errores al intentar usar `$resumen['total']`, `$resumen['pendientes']`, etc.

Línea 19: `$prestamos= $model->listar($id_trabajador);` → Llama al método `listar()` del modelo para traer el historial detallado de préstamos o solicitudes del trabajador; se conecta con `TrabajadorPrestamo.php` y con la base de datos, recuperando herramienta, cantidad, fechas y estado; si se quita, la tabla no tendría información para recorrer y mostrar, y fallaría la variable `$prestamos`.

Línea 20: `?>` → Cierra el bloque PHP inicial para empezar a escribir HTML normal; se conecta con el cambio entre lógica de servidor y estructura visual del navegador; si se quita en este punto, el HTML siguiente podría interpretarse incorrectamente como PHP y generar errores.

## Bloque 2 — Estructura HTML inicial, cabecera del documento y recursos visuales

Línea 21: `<!DOCTYPE html>` → Declara que el documento usa HTML5, ayudando al navegador a interpretar correctamente la página; se conecta con el renderizado del navegador; si se quita, algunos navegadores podrían entrar en modo de compatibilidad y mostrar estilos o tamaños de forma inconsistente.

Línea 22: `<html lang="es">` → Abre la estructura principal del documento e indica que el idioma de la página es español; se conecta con accesibilidad, lectores de pantalla, buscadores y configuración del navegador; si se quita, el documento queda mal formado y pierde información de idioma.

Línea 23: `<head>` → Abre la sección de metadatos del documento, donde se cargan título, codificación, responsive y estilos; se conecta con el navegador antes de mostrar el cuerpo visual; si se quita, los metadatos quedarían mezclados con el contenido y el HTML sería inválido.

Línea 24: `<meta charset="UTF-8"/>` → Define la codificación de caracteres como UTF-8 para que tildes, eñes, emojis e iconos se muestren correctamente; se conecta con todos los textos de la vista como `Préstamos`, `Notificaciones` y `Cerrar sesión`; si se quita, podrían verse caracteres raros o símbolos dañados.

Línea 25: `<meta name="viewport" content="width=device-width, initial-scale=1.0"/>` → Hace que la página se adapte al tamaño real de la pantalla, especialmente en celulares; se conecta con el CSS responsive del archivo y con las reglas `@media`; si se quita, la vista puede verse demasiado ancha o pequeña en dispositivos móviles.

Línea 26: `<title>Mis Préstamos - AgroFinca</title>` → Define el título que aparece en la pestaña del navegador; se conecta con la identidad visual del módulo y ayuda al usuario a saber qué pantalla tiene abierta; si se quita, el navegador mostraría un título genérico o la ruta del archivo.

Línea 27: `<link rel="stylesheet" href="styles/dashboard.css"/>` → Carga la hoja de estilos general del dashboard del trabajador; se conecta con `views/trabajador/styles/dashboard.css`, que probablemente define `sidebar`, `topbar`, `content`, `badge-rol`, botones y layout general; si se quita, la página perdería gran parte del diseño compartido con otros módulos.

Línea 28: `<link rel="preconnect" href="https://fonts.googleapis.com"/>` → Prepara una conexión anticipada con Google Fonts para cargar más rápido la fuente usada; se conecta con el servicio externo de fuentes de Google; si se quita, la fuente aún podría cargar por la línea siguiente, pero posiblemente un poco más lento.

Línea 29: `<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>` → Carga la fuente `Inter` con varios pesos visuales para usarla en textos normales, medios y negritas; se conecta con Google Fonts y con el CSS que usa `font-family: inherit`; si se quita, el navegador usará una fuente por defecto y el diseño se verá diferente.

Línea 30: `</head>` → Cierra la sección de metadatos; se conecta con la apertura de `<head>` en la línea 23; si se quita, el navegador puede interpretar mal dónde terminan los recursos y dónde inicia el contenido visible.

Línea 31: `<body>` → Abre el cuerpo visible de la página, donde se renderizan sidebar, topbar, tarjetas, tabla, modal y scripts; se conecta con todo lo que el usuario ve e interactúa; si se quita, el HTML queda incompleto y puede renderizarse de forma incorrecta.

## Bloque 3 — Sidebar o menú lateral del trabajador

Línea 34: `<aside class="sidebar" id="sidebar">` → Crea el contenedor lateral del menú y le asigna el id `sidebar`; se conecta con el CSS `sidebar` del dashboard y con la función JavaScript `toggleSidebar()` que busca este id para abrir o cerrar el menú; si se quita, el trabajador pierde el menú lateral de navegación.

Línea 35: `<div class="sidebar-logo">` → Abre el contenedor del logo y nombre de la aplicación dentro del sidebar; se conecta con estilos del dashboard que ordenan imagen y texto; si se quita, el logo y el nombre podrían quedar sin alineación o fuera del diseño.

Línea 36: `<img src="../../img/logo.png" alt="AgroFinca" class="sidebar-logo-img"/>` → Muestra el logo de AgroFinca usando la imagen ubicada en `../../img/logo.png`; se conecta con los recursos gráficos del proyecto y con la clase `sidebar-logo-img`; si se quita, el menú pierde identificación visual de la aplicación.

Línea 37: `<span>AgroFinca</span>` → Muestra el nombre de la aplicación junto al logo; se conecta visualmente con el branding del sistema; si se quita, el usuario solo vería el logo o podría no identificar claramente el sistema.

Línea 38: `</div>` → Cierra el contenedor del logo del sidebar; se conecta con la apertura de la línea 35; si se quita, la estructura del menú queda mal anidada.

Línea 39: `<nav class="sidebar-nav">` → Abre el bloque de navegación del sidebar; se conecta con las rutas internas del módulo trabajador y con estilos de navegación; si se quita, los enlaces seguirían existiendo si no se eliminan, pero perderían su agrupación semántica y visual.

Línea 40: `<a href="dashboard.php"             class="nav-item"><span class="nav-icon">⊞</span> Dashboard</a>` → Crea el enlace para volver al dashboard principal del trabajador; se conecta con `dashboard.php` y usa la clase `nav-item` para verse como opción del menú; si se quita, el trabajador no tendría acceso directo desde este menú a su resumen principal.

Línea 41: `<a href="mis_tareas.php"            class="nav-item"><span class="nav-icon">📋</span> Mis Tareas</a>` → Crea el enlace hacia el módulo de tareas asignadas; se conecta con `mis_tareas.php`, donde el trabajador puede ver o completar tareas; si se quita, se rompe la navegación rápida hacia las tareas desde esta pantalla.

Línea 42: `<a href="mis_prestamos.php"         class="nav-item active"><span class="nav-icon">🔑</span> Mis Préstamos</a>` → Crea el enlace de la página actual y lo marca como activo con la clase `active`; se conecta con este mismo archivo y con el CSS que resalta la opción seleccionada; si se quita, el usuario perdería la indicación visual de que está en Mis Préstamos.

Línea 43: `<a href="solicitar_herramienta.php" class="nav-item"><span class="nav-icon">+</span> Solicitar Herramienta</a>` → Crea el enlace para ir al formulario donde el trabajador solicita herramientas; se conecta con `solicitar_herramienta.php`; si se quita, el trabajador tendría menos facilidad para ir desde el historial de préstamos a crear una solicitud.

Línea 44: `</nav>` → Cierra el bloque de navegación del sidebar; se conecta con la línea 39; si se quita, la estructura semántica de navegación queda abierta y puede afectar el renderizado.

Línea 45: `</aside>` → Cierra completamente el sidebar; se conecta con la línea 34; si se quita, el resto del contenido podría quedar interpretado como parte del menú lateral.

## Bloque 4 — Contenedor principal y barra superior

Línea 48: `<div class="main-wrapper">` → Abre el contenedor principal que envuelve topbar y contenido; se conecta con el CSS del layout general, normalmente dejando espacio para el sidebar; si se quita, la página podría perder alineación y el contenido podría montarse sobre el menú.

Línea 51: `<header class="topbar">` → Crea la barra superior de la pantalla; se conecta con estilos del dashboard para mostrar menú móvil, título, rol, notificaciones, usuario y logout; si se quita, el usuario pierde la zona superior de navegación y acciones.

Línea 52: `<button class="menu-toggle" onclick="toggleSidebar()" aria-label="Abrir menú">☰</button>` → Crea el botón de menú, especialmente útil en pantallas pequeñas, y al hacer clic ejecuta `toggleSidebar()`; se conecta con la función JavaScript de la línea 231 y con el elemento `#sidebar`; si se quita, en móvil sería más difícil abrir o cerrar el menú lateral.

Línea 53: `<div class="topbar-title">Sistema de Gestión de Finca</div>` → Muestra el título general del sistema en la barra superior; se conecta visualmente con el diseño común del panel; si se quita, el encabezado queda menos claro para el usuario.

Línea 54: `<div class="topbar-right">` → Abre el grupo de elementos ubicados a la derecha de la topbar; se conecta con estilos que acomodan rol, campana, usuario y cierre de sesión; si se quita, esos elementos podrían quedar desorganizados.

Línea 55: `<span class="badge-rol">Trabajador</span>` → Muestra una etiqueta que indica el rol actual del usuario; se conecta con la protección de sesión que exige rol `TRABAJADOR`; si se quita, el usuario no ve visualmente con qué rol está usando el sistema.

Línea 56: `<div class="notif-wrapper">` → Abre el contenedor del botón de notificaciones; se conecta con el panel incluido al final mediante `notificaciones_panel.php`; si se quita, el botón de campana podría quedar sin estructura adecuada.

Línea 57: `<button class="notif-btn" onclick="toggleNotifPanel()" aria-label="Notificaciones">🔔</button>` → Crea el botón de notificaciones y llama a `toggleNotifPanel()` al hacer clic; se conecta con una función que probablemente viene desde `includes/notificaciones_panel.php`; si se quita, el trabajador no podría abrir el panel de notificaciones desde esta vista.

Línea 58: `</div>` → Cierra el contenedor de notificaciones; se conecta con la apertura de la línea 56; si se quita, la estructura de la topbar queda mal cerrada.

Línea 59: `<a href="perfil.php" class="topbar-user" title="Mi perfil">` → Abre el enlace hacia el perfil del trabajador; se conecta con `perfil.php` y permite que el usuario acceda a sus datos personales; si se quita, el nombre mostrado en la línea siguiente ya no funcionaría como enlace al perfil.

Línea 60: `👤 <?= htmlspecialchars($_SESSION['username']) ?>` → Muestra el nombre de usuario guardado en sesión y lo protege con `htmlspecialchars()` para evitar que caracteres peligrosos se interpreten como HTML; se conecta con la variable `$_SESSION['username']` creada al iniciar sesión; si se quita, no se mostraría el usuario logueado, y si se quitara solo `htmlspecialchars`, habría riesgo de inyección visual o XSS si el username contiene HTML.

Línea 61: `</a>` → Cierra el enlace al perfil; se conecta con la apertura de la línea 59; si se quita, otros elementos como el botón de cerrar sesión podrían quedar dentro del enlace por error.

Línea 62: `<a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>` → Crea el enlace de cierre de sesión apuntando al controlador de logout; se conecta con `controllers/LogoutController.php` y también con el JavaScript que intercepta `.btn-logout` para mostrar primero un modal de confirmación; si se quita, el usuario no tendría botón visible para cerrar sesión desde esta pantalla.

Línea 63: `</div>` → Cierra el grupo derecho de la topbar; se conecta con la línea 54; si se quita, la topbar queda mal anidada.

Línea 64: `</header>` → Cierra la barra superior; se conecta con la apertura de la línea 51; si se quita, el contenido principal podría quedar incluido dentro del header incorrectamente.

Línea 66: `<main class="content">` → Abre el área principal donde se muestra la información de préstamos; se conecta con estilos del dashboard para márgenes, ancho y separación; si se quita, el contenido puede perder semántica y estilos.

## Bloque 5 — Cabecera visible del módulo Mis Préstamos

Línea 69: `<div style="margin-bottom:20px;">` → Abre un contenedor con margen inferior para separar el título del resto del contenido; se conecta con la presentación visual del módulo; si se quita, el título y las tarjetas podrían quedar demasiado pegados.

Línea 70: `<h1 style="font-size:22px;font-weight:700;color:#111827;margin:0 0 4px;">Mis Préstamos</h1>` → Muestra el título principal de la página con estilos en línea; se conecta con el propósito del archivo porque indica al trabajador que está en su historial de préstamos; si se quita, la pantalla pierde su encabezado principal y puede ser menos entendible.

Línea 71: `<p style="font-size:14px;color:#6b7280;margin:0;">Consulta el historial de tus solicitudes de herramientas</p>` → Muestra una descripción corta de lo que puede hacer el usuario en la pantalla; se conecta con el módulo de solicitudes y préstamos de herramientas; si se quita, el usuario tendría menos contexto sobre el contenido mostrado.

Línea 72: `</div>` → Cierra el contenedor de cabecera; se conecta con la línea 69; si se quita, la estructura del contenido queda abierta.

## Bloque 6 — Tarjetas de resumen de préstamos

Línea 75: `<div class="mp-resumen">` → Abre el contenedor de las tarjetas resumen; se conecta con el CSS `.mp-resumen` que organiza las tarjetas en fila flexible; si se quita, las tarjetas podrían perder su layout agrupado.

Línea 76: `<div class="mp-stat">` → Abre la primera tarjeta de estadística; se conecta con el CSS `.mp-stat`; si se quita, el número total y su etiqueta perderían el diseño de tarjeta.

Línea 77: `<span class="mp-stat-num"><?= $resumen['total'] ?></span>` → Muestra el número total de solicitudes o préstamos del trabajador; se conecta con `$resumen`, que fue calculado por `$model->resumen($id_trabajador)`; si se quita, el trabajador no vería el total general.

Línea 78: `<span class="mp-stat-lbl">Total</span>` → Muestra la etiqueta que explica que el número anterior corresponde al total; se conecta visualmente con la línea 77; si se quita, el número quedaría sin significado claro.

Línea 79: `</div>` → Cierra la tarjeta del total; se conecta con la línea 76; si se quita, las siguientes tarjetas podrían quedar dentro de la primera.

Línea 80: `<div class="mp-stat">` → Abre la tarjeta de préstamos pendientes; se conecta con el diseño común `.mp-stat`; si se quita, el conteo de pendientes no tendría tarjeta propia.

Línea 81: `<span class="mp-stat-num" style="color:#92400e;"><?= $resumen['pendientes'] ?></span>` → Muestra la cantidad de solicitudes pendientes con color café/naranja; se conecta con `$resumen['pendientes']` que viene del modelo y representa solicitudes aún no resueltas; si se quita, el usuario no sabrá cuántas solicitudes están esperando revisión.

Línea 82: `<span class="mp-stat-lbl">Pendientes</span>` → Muestra la etiqueta de la tarjeta de pendientes; se conecta con el número de la línea 81; si se quita, el número perdería contexto.

Línea 83: `</div>` → Cierra la tarjeta de pendientes; se conecta con la línea 80; si se quita, la estructura de tarjetas se dañaría.

Línea 84: `<div class="mp-stat">` → Abre la tarjeta de aprobados; se conecta con el mismo componente visual de resumen; si se quita, el conteo de aprobados no tendría contenedor.

Línea 85: `<span class="mp-stat-num" style="color:#166534;"><?= $resumen['aprobados'] ?></span>` → Muestra la cantidad de solicitudes aprobadas con color verde; se conecta con `$resumen['aprobados']`, que viene del modelo; si se quita, el trabajador no verá cuántas solicitudes fueron aprobadas.

Línea 86: `<span class="mp-stat-lbl">Aprobados</span>` → Muestra la etiqueta de aprobados; se conecta con el valor de la línea 85; si se quita, el número no tendría explicación visible.

Línea 87: `</div>` → Cierra la tarjeta de aprobados; se conecta con la línea 84; si se quita, las tarjetas siguientes podrían quedar mal anidadas.

Línea 88: `<div class="mp-stat">` → Abre la tarjeta de rechazados; se conecta con `.mp-stat`; si se quita, el resumen de rechazados pierde su contenedor visual.

Línea 89: `<span class="mp-stat-num" style="color:#b91c1c;"><?= $resumen['negados'] ?></span>` → Muestra la cantidad de solicitudes negadas o rechazadas con color rojo; se conecta con `$resumen['negados']` del modelo; si se quita, el usuario no podrá ver rápidamente cuántas solicitudes fueron rechazadas.

Línea 90: `<span class="mp-stat-lbl">Rechazados</span>` → Muestra la etiqueta textual para el conteo de negados; se conecta con la línea 89; si se quita, el color y número podrían no ser suficientes para entender el dato.

Línea 91: `</div>` → Cierra la tarjeta de rechazados; se conecta con la línea 88; si se quita, se rompe la estructura del resumen.

Línea 92: `<div class="mp-stat">` → Abre la tarjeta de devueltos; se conecta con el diseño de tarjetas de resumen; si se quita, el conteo de herramientas devueltas no tendría bloque visual.

Línea 93: `<span class="mp-stat-num" style="color:#1e40af;"><?= $resumen['devueltos'] ?></span>` → Muestra la cantidad de préstamos devueltos con color azul; se conecta con `$resumen['devueltos']` consultado en el modelo; si se quita, el trabajador no sabrá cuántos préstamos figuran como devueltos.

Línea 94: `<span class="mp-stat-lbl">Devueltos</span>` → Muestra la etiqueta de devueltos; se conecta con el valor de la línea 93; si se quita, el número azul no tendría descripción clara.

Línea 95: `</div>` → Cierra la tarjeta de devueltos; se conecta con la línea 92; si se quita, el HTML queda mal estructurado.

Línea 96: `</div>` → Cierra el contenedor general de tarjetas resumen; se conecta con la línea 75; si se quita, la tabla siguiente podría quedar dentro del contenedor flexible de tarjetas.

## Bloque 7 — Tabla de historial de préstamos y solicitudes

Línea 99: `<div class="mp-tabla-wrap">` → Abre el contenedor visual de la tabla con borde, fondo y sombra; se conecta con el CSS `.mp-tabla-wrap`; si se quita, la tabla seguiría existiendo, pero perdería el panel visual que la encierra.

Línea 100: `<table class="mp-tabla">` → Crea la tabla principal del historial; se conecta con el CSS `.mp-tabla` y con los datos de `$prestamos`; si se quita, no habría estructura tabular para mostrar herramientas, cantidad, fechas y estado.

Línea 101: `<thead>` → Abre la cabecera de la tabla; se conecta con las columnas que explican cada dato; si se quita, las celdas de título podrían mezclarse con el cuerpo de la tabla.

Línea 102: `<tr>` → Abre la fila de encabezados de columna; se conecta con los cinco `th` siguientes; si se quita, las cabeceras no estarían agrupadas correctamente en una fila.

Línea 103: `<th>Herramienta</th>` → Define la columna donde se mostrará el nombre de la herramienta; se conecta con `$p['herramienta']` de la línea 126; si se quita, el usuario no tendría título para identificar la primera columna.

Línea 104: `<th>Cantidad</th>` → Define la columna de cantidad solicitada o prestada; se conecta con `$p['cantidad']` de la línea 127; si se quita, el número de cantidad quedaría sin encabezado.

Línea 105: `<th>Fecha Solicitud</th>` → Define la columna de fecha en que se solicitó la herramienta; se conecta con `$p['fecha_solicitud']` de la línea 128; si se quita, el usuario no sabría qué fecha representa esa columna.

Línea 106: `<th>Fecha Entrega</th>` → Define la columna de fecha en que se entregó la herramienta; se conecta con `$p['fecha_entrega']` de la línea 129; si se quita, el usuario no tendría encabezado para la fecha de entrega.

Línea 107: `<th>Estado</th>` → Define la columna de estado del préstamo o solicitud; se conecta con `$p['estado']`, `$cls` y `$lbl` de las líneas 117 a 130; si se quita, el badge de estado quedaría sin título de columna.

Línea 108: `</tr>` → Cierra la fila de encabezados; se conecta con la línea 102; si se quita, el encabezado de tabla queda abierto y la estructura puede fallar.

Línea 109: `</thead>` → Cierra la cabecera de la tabla; se conecta con la línea 101; si se quita, el navegador podría considerar que el cuerpo sigue siendo parte del encabezado.

Línea 110: `<tbody>` → Abre el cuerpo de la tabla donde van los datos reales; se conecta con la condición de préstamos vacíos y con el `foreach`; si se quita, las filas de datos no quedarían separadas semánticamente del encabezado.

Línea 111: `<?php if (empty($prestamos)): ?>` → Evalúa si la lista de préstamos está vacía; se conecta con `$prestamos`, que viene de `$model->listar($id_trabajador)`; si se quita, el sistema no tendría forma de mostrar el mensaje cuando no hay solicitudes registradas.

Línea 112: `<tr>` → Abre una fila especial para el caso en que no hay datos; se conecta con la condición de la línea 111; si se quita, el mensaje vacío no quedaría dentro de una fila válida de tabla.

Línea 113: `<td colspan="5" class="mp-vacia">No tienes solicitudes de herramientas registradas</td>` → Muestra un mensaje ocupando las cinco columnas cuando no hay préstamos; se conecta con la clase `.mp-vacia` para centrar y suavizar el texto; si se quita, la tabla aparecería vacía y el usuario podría pensar que hay un error.

Línea 114: `</tr>` → Cierra la fila del mensaje vacío; se conecta con la línea 112; si se quita, la tabla queda mal cerrada en el caso sin datos.

Línea 115: `<?php else: ?>` → Define el camino alternativo cuando sí existen préstamos; se conecta con el `if` de la línea 111; si se quita, no se separaría correctamente el caso vacío del caso con datos.

Línea 116: `<?php foreach ($prestamos as $p):` → Inicia un recorrido por cada préstamo o solicitud dentro de `$prestamos`, guardando cada registro temporalmente en `$p`; se conecta con el resultado del modelo `listar()`; si se quita, no se podrían imprimir múltiples filas de préstamos.

Línea 117: `[$cls, $lbl] = match(strtoupper($p['estado'])) {` → Usa `match` para convertir el estado del préstamo en dos valores: una clase CSS (`$cls`) y una etiqueta legible (`$lbl`); se conecta con `$p['estado']` de la base de datos y con los estilos `.mp-badge-*`; si se quita, el sistema no sabría qué color ni qué texto mostrar en el badge de estado.

Línea 118: `'PENDIENTE' => ['mp-badge-pendiente', 'Pendiente'],` → Define que si el estado es `PENDIENTE`, el badge usará la clase amarilla/café y el texto `Pendiente`; se conecta con las solicitudes que aún no han sido aprobadas ni rechazadas; si se quita, los préstamos pendientes caerían en el caso por defecto o podrían no mostrarse con el color correcto.

Línea 119: `'APROBADO'  => ['mp-badge-aprobado',  'Aprobado'],` → Define que si el estado es `APROBADO`, se usará la clase verde y el texto `Aprobado`; se conecta con solicitudes aceptadas por el mayordomo o responsable; si se quita, los aprobados no tendrían su estilo correcto.

Línea 120: `'NEGADO'    => ['mp-badge-negado',    'Rechazado'],` → Define que si el estado guardado es `NEGADO`, el usuario verá `Rechazado` con estilo rojo; se conecta con la decisión negativa sobre una solicitud; si se quita, los préstamos negados podrían mostrarse con texto técnico o sin color adecuado.

Línea 121: `'DEVUELTO'  => ['mp-badge-devuelto',  'Devuelto'],` → Define que si el estado es `DEVUELTO`, se usará la clase azul y el texto `Devuelto`; se conecta con el cierre del ciclo del préstamo cuando la herramienta ya fue regresada; si se quita, los préstamos devueltos no se diferenciarían visualmente.

Línea 122: `default     => ['mp-badge-pendiente', htmlspecialchars($p['estado'])],` → Define un valor por defecto para estados no contemplados, usando una clase de pendiente y mostrando el estado protegido con `htmlspecialchars()`; se conecta con seguridad visual y tolerancia a estados nuevos en la base de datos; si se quita, un estado inesperado podría causar error de `match` no exhaustivo o mostrarse sin protección.

Línea 123: `};` → Cierra la estructura `match` y termina la asignación de `$cls` y `$lbl`; se conecta con la línea 117; si se quita, PHP marcaría error de sintaxis.

Línea 124: `?>` → Cierra temporalmente PHP para volver a escribir HTML de la fila; se conecta con el patrón de mezclar lógica y vista; si se quita, las etiquetas HTML siguientes podrían interpretarse como PHP y fallar.

Línea 125: `<tr>` → Abre una fila de tabla para un préstamo específico; se conecta con el registro actual `$p` dentro del `foreach`; si se quita, las celdas no estarían agrupadas correctamente.

Línea 126: `<td><strong><?= htmlspecialchars($p['herramienta']) ?></strong></td>` → Muestra el nombre de la herramienta en negrita y protegido con `htmlspecialchars()`; se conecta con el campo `herramienta` traído por el modelo; si se quita, no aparecería el nombre de la herramienta, y si se quita la protección, podría haber riesgo de inyección HTML si el nombre viene contaminado.

Línea 127: `<td><?= (int) $p['cantidad'] ?></td>` → Muestra la cantidad solicitada o prestada convirtiéndola a entero; se conecta con el campo `cantidad` de cada préstamo; si se quita, el usuario no vería cuántas unidades pidió o recibió.

Línea 128: `<td><?= htmlspecialchars($p['fecha_solicitud'] ?? '—') ?></td>` → Muestra la fecha de solicitud protegida, o un guion largo si no existe; se conecta con el campo `fecha_solicitud` de la base de datos; si se quita, el historial pierde la fecha en que se hizo la solicitud.

Línea 129: `<td><?= htmlspecialchars($p['fecha_entrega'] ?? '—') ?></td>` → Muestra la fecha de entrega protegida, o un guion si todavía no se ha entregado; se conecta con el campo `fecha_entrega`; si se quita, el usuario no sabrá si la herramienta ya fue entregada ni cuándo.

Línea 130: `<td><span class="mp-badge <?= $cls ?>"><?= $lbl ?></span></td>` → Muestra el estado del préstamo como badge usando la clase CSS calculada en `$cls` y el texto calculado en `$lbl`; se conecta con el `match` de las líneas 117 a 123 y con los estilos `.mp-badge-*`; si se quita, la tabla no mostraría el estado de cada solicitud, que es uno de los datos más importantes.

Línea 131: `</tr>` → Cierra la fila del préstamo actual; se conecta con la apertura de la línea 125; si se quita, las siguientes filas podrían mezclarse.

Línea 132: `<?php endforeach; ?>` → Finaliza el recorrido de todos los préstamos; se conecta con el `foreach` de la línea 116; si se quita, PHP no sabría dónde termina el ciclo y generaría error.

Línea 133: `<?php endif; ?>` → Finaliza la condición que decide entre mensaje vacío o lista de préstamos; se conecta con el `if` de la línea 111; si se quita, PHP marcaría error porque el bloque condicional queda abierto.

Línea 134: `</tbody>` → Cierra el cuerpo de la tabla; se conecta con la línea 110; si se quita, la tabla queda incompleta.

Línea 135: `</table>` → Cierra la tabla de préstamos; se conecta con la línea 100; si se quita, el HTML queda mal formado y puede afectar elementos posteriores.

Línea 136: `</div>` → Cierra el contenedor visual de la tabla; se conecta con la línea 99; si se quita, el panel de tabla queda abierto.

Línea 138: `</main>` → Cierra el contenido principal de la página; se conecta con la línea 66; si se quita, los estilos o estructura semántica de la página pueden quedar mal.

Línea 139: `</div>` → Cierra el `main-wrapper`; se conecta con la línea 48; si se quita, el modal, estilos o scripts podrían quedar anidados incorrectamente dentro del wrapper principal.

## Bloque 8 — Estilos CSS propios del módulo Mis Préstamos

Línea 141: `<style>` → Abre un bloque de CSS interno para estilos específicos de esta pantalla; se conecta con las clases `mp-*` usadas en tarjetas, tabla y badges; si se quita, todas las reglas CSS internas dejarían de aplicarse.

Línea 143: `.mp-resumen {` → Inicia la regla CSS para el contenedor de tarjetas resumen; se conecta con el `<div class="mp-resumen">` de la línea 75; si se quita esta regla, las tarjetas no tendrían configuración de distribución propia.

Línea 144: `display: flex;` → Hace que las tarjetas resumen se organicen en una fila flexible; se conecta con los elementos `.mp-stat`; si se quita, las tarjetas podrían apilarse o comportarse como bloques normales.

Línea 145: `gap: 12px;` → Agrega separación uniforme entre tarjetas; se conecta con la presentación visual del resumen; si se quita, las tarjetas pueden quedar pegadas.

Línea 146: `margin-bottom: 20px;` → Deja espacio debajo del resumen antes de la tabla; se conecta con la separación visual entre tarjetas y tabla; si se quita, la tabla quedaría demasiado cerca.

Línea 147: `flex-wrap: wrap;` → Permite que las tarjetas bajen a otra línea si no caben en pantallas pequeñas; se conecta con diseño responsive; si se quita, las tarjetas podrían salirse horizontalmente.

Línea 148: `}` → Cierra la regla `.mp-resumen`; se conecta con la línea 143; si se quita, el CSS siguiente se mezclaría dentro de la misma regla.

Línea 149: `.mp-stat {` → Inicia la regla para cada tarjeta individual de resumen; se conecta con los `div class="mp-stat"`; si se quita, las tarjetas no tendrían forma de tarjeta.

Línea 150: `display: flex;` → Convierte cada tarjeta en contenedor flexible; se conecta con los `span` internos de número y etiqueta; si se quita, el control de alineación vertical sería menor.

Línea 151: `flex-direction: column;` → Ordena el número y la etiqueta uno debajo del otro; se conecta con `mp-stat-num` y `mp-stat-lbl`; si se quita, podrían quedar en fila horizontal.

Línea 152: `align-items: center;` → Centra horizontalmente el contenido de cada tarjeta; se conecta con la estética del resumen; si se quita, los textos podrían alinearse a la izquierda.

Línea 153: `gap: 4px;` → Deja un pequeño espacio entre el número y la etiqueta; se conecta con la legibilidad de la tarjeta; si se quita, los textos pueden quedar muy juntos.

Línea 154: `background: #fff;` → Define fondo blanco para la tarjeta; se conecta con el diseño limpio del dashboard; si se quita, podría heredar otro fondo y perder contraste.

Línea 155: `border: 1px solid #e5e7eb;` → Agrega borde gris claro a la tarjeta; se conecta con la delimitación visual; si se quita, las tarjetas se verían menos separadas del fondo.

Línea 156: `border-radius: 10px;` → Redondea las esquinas de la tarjeta; se conecta con la estética general del sistema; si se quita, las tarjetas tendrían esquinas rectas.

Línea 157: `padding: 14px 22px;` → Agrega espacio interno dentro de cada tarjeta; se conecta con comodidad visual del número y etiqueta; si se quita, el contenido quedaría pegado al borde.

Línea 158: `min-width: 90px;` → Define un ancho mínimo para mantener tarjetas uniformes; se conecta con el layout del resumen; si se quita, algunas tarjetas podrían quedar demasiado pequeñas.

Línea 159: `}` → Cierra la regla `.mp-stat`; se conecta con la línea 149; si se quita, el CSS siguiente puede fallar.

Línea 160: `.mp-stat-num { font-size: 26px; font-weight: 700; color: #111827; line-height: 1; }` → Define tamaño grande, peso fuerte, color oscuro y altura compacta para los números del resumen; se conecta con todos los `span class="mp-stat-num"`; si se quita, los números perderían importancia visual.

Línea 161: `.mp-stat-lbl { font-size: 12px; color: #6b7280; font-weight: 500; }` → Define estilo más pequeño y gris para las etiquetas del resumen; se conecta con los textos `Total`, `Pendientes`, `Aprobados`, `Rechazados` y `Devueltos`; si se quita, las etiquetas se verían como texto normal.

Línea 164: `.mp-tabla-wrap {` → Inicia la regla del contenedor de la tabla; se conecta con el `<div class="mp-tabla-wrap">`; si se quita, el panel de la tabla no tendría estilo propio.

Línea 165: `background: #fff;` → Establece fondo blanco para el panel de tabla; se conecta con el contraste de filas; si se quita, el fondo podría mezclarse con el de la página.

Línea 166: `border: 1px solid #e5e7eb;` → Agrega borde al contenedor de tabla; se conecta con separación visual; si se quita, la tabla se vería menos contenida.

Línea 167: `border-radius: 12px;` → Redondea las esquinas del panel de tabla; se conecta con el diseño de tarjetas del sistema; si se quita, las esquinas quedarían cuadradas.

Línea 168: `overflow: hidden;` → Oculta lo que sobresalga del borde redondeado, especialmente fondos de filas; se conecta con `border-radius`; si se quita, algunos fondos internos podrían salirse visualmente de las esquinas.

Línea 169: `box-shadow: 0 1px 4px rgba(0,0,0,0.06);` → Agrega una sombra suave al panel; se conecta con profundidad visual del diseño; si se quita, el panel se verá más plano.

Línea 170: `}` → Cierra la regla `.mp-tabla-wrap`; se conecta con la línea 164; si se quita, el CSS se rompe.

Línea 171: `.mp-tabla {` → Inicia la regla para la tabla interna; se conecta con `<table class="mp-tabla">`; si se quita, la tabla usará estilos básicos del navegador.

Línea 172: `width: 100%;` → Hace que la tabla ocupe todo el ancho disponible del contenedor; se conecta con la visualización completa del historial; si se quita, la tabla podría ajustarse solo al contenido y verse angosta.

Línea 173: `border-collapse: collapse;` → Une los bordes de las celdas para evitar espacios dobles; se conecta con la presentación limpia de filas; si se quita, pueden aparecer separaciones no deseadas.

Línea 174: `font-size: 14px;` → Define tamaño de texto de la tabla; se conecta con legibilidad del historial; si se quita, heredará otro tamaño y puede verse inconsistente.

Línea 175: `}` → Cierra la regla `.mp-tabla`; se conecta con la línea 171; si se quita, el CSS siguiente queda mal.

Línea 176: `.mp-tabla thead tr {` → Inicia la regla para la fila del encabezado de la tabla; se conecta con el `<tr>` dentro de `<thead>`; si se quita, el encabezado perderá fondo y separación.

Línea 177: `background: #f9fafb;` → Da un fondo gris muy claro al encabezado de la tabla; se conecta con diferenciación entre cabecera y datos; si se quita, los títulos podrían verse como una fila normal.

Línea 178: `border-bottom: 1px solid #e5e7eb;` → Agrega una línea inferior al encabezado; se conecta con separación visual de columnas y filas; si se quita, el encabezado no se separa claramente del cuerpo.

Línea 179: `}` → Cierra la regla del encabezado; se conecta con la línea 176; si se quita, se rompe el CSS.

Línea 180: `.mp-tabla th {` → Inicia la regla para celdas de encabezado; se conecta con las columnas `Herramienta`, `Cantidad`, `Fecha Solicitud`, `Fecha Entrega` y `Estado`; si se quita, los títulos usarán el estilo por defecto.

Línea 181: `padding: 12px 20px;` → Agrega espacio interno a los encabezados; se conecta con legibilidad de columnas; si se quita, los títulos quedarían pegados.

Línea 182: `text-align: left;` → Alinea los encabezados a la izquierda; se conecta con la lectura natural de la tabla; si se quita, algunos navegadores podrían centrar encabezados por defecto.

Línea 183: `font-weight: 600;` → Da peso seminegrita a los encabezados; se conecta con jerarquía visual; si se quita, los títulos tendrían menos fuerza.

Línea 184: `color: #374151;` → Define color gris oscuro para encabezados; se conecta con paleta visual del sistema; si se quita, heredaría color por defecto.

Línea 185: `font-size: 13px;` → Define tamaño ligeramente menor para encabezados; se conecta con compactación visual de la tabla; si se quita, puede verse más grande que los datos.

Línea 186: `}` → Cierra la regla `.mp-tabla th`; se conecta con la línea 180; si se quita, el CSS se desordena.

Línea 187: `.mp-tabla td {` → Inicia la regla para celdas de datos; se conecta con todas las filas de préstamos; si se quita, los datos no tendrían formato uniforme.

Línea 188: `padding: 14px 20px;` → Agrega espacio interno a cada celda de datos; se conecta con legibilidad de cada fila; si se quita, los datos quedarían pegados a los bordes.

Línea 189: `color: #374151;` → Define color de texto para los datos; se conecta con la paleta general; si se quita, heredaría otro color.

Línea 190: `border-bottom: 1px solid #f3f4f6;` → Agrega línea divisoria suave entre filas; se conecta con separación del historial; si se quita, las filas pueden confundirse.

Línea 191: `}` → Cierra la regla de celdas; se conecta con la línea 187; si se quita, se rompe el bloque CSS.

Línea 192: `.mp-tabla tbody tr:last-child td { border-bottom: none; }` → Quita la línea inferior de la última fila para que el borde no se duplique con el contenedor; se conecta con estética de la tabla; si se quita, puede verse una línea extra al final.

Línea 193: `.mp-tabla tbody tr:hover { background: #f9fafb; }` → Cambia el fondo de una fila cuando el usuario pasa el cursor encima; se conecta con la interacción visual de la tabla; si se quita, no habrá respuesta visual al pasar el mouse.

Línea 194: `.mp-vacia {` → Inicia la regla para el mensaje de tabla vacía; se conecta con la celda de la línea 113; si se quita, el mensaje sin préstamos no tendría estilo especial.

Línea 195: `text-align: center;` → Centra el mensaje de tabla vacía; se conecta con la legibilidad del estado sin datos; si se quita, el mensaje quedaría alineado a la izquierda.

Línea 196: `color: #9ca3af;` → Da color gris claro al mensaje vacío; se conecta con la idea visual de estado informativo secundario; si se quita, el texto puede verse demasiado fuerte.

Línea 197: `padding: 40px !important;` → Agrega mucho espacio interno al mensaje vacío y fuerza esta regla sobre otros paddings; se conecta con la celda `td` que también tiene padding; si se quita, el mensaje podría verse comprimido.

Línea 198: `}` → Cierra la regla `.mp-vacia`; se conecta con la línea 194; si se quita, el CSS siguiente quedaría incluido por error.

Línea 201: `.mp-badge {` → Inicia la regla base para todos los badges de estado; se conecta con `<span class="mp-badge <?= $cls ?>">`; si se quita, los estados no se verían como etiquetas.

Línea 202: `display: inline-block;` → Permite que el badge acepte padding y forma sin ocupar toda la fila; se conecta con el estado dentro de una celda de tabla; si se quita, el padding puede comportarse distinto.

Línea 203: `padding: 4px 12px;` → Agrega espacio interno al badge; se conecta con legibilidad y apariencia de etiqueta; si se quita, el texto quedaría muy pegado.

Línea 204: `border-radius: 20px;` → Redondea mucho el badge para darle forma tipo píldora; se conecta con estilo de estados; si se quita, el badge se vería rectangular.

Línea 205: `font-size: 12px;` → Define tamaño pequeño para el texto del badge; se conecta con tabla compacta; si se quita, podría verse demasiado grande.

Línea 206: `font-weight: 700;` → Da negrita fuerte al estado; se conecta con la importancia de identificar el estado rápidamente; si se quita, el badge perdería fuerza visual.

Línea 207: `}` → Cierra la regla base del badge; se conecta con la línea 201; si se quita, las clases específicas podrían mezclarse.

Línea 208: `.mp-badge-pendiente { background: #fef3c7; color: #92400e; }` → Define fondo amarillo claro y texto café para estado pendiente; se conecta con el caso `PENDIENTE` del `match`; si se quita, los pendientes no tendrían color específico.

Línea 209: `.mp-badge-aprobado  { background: #dcfce7; color: #166534; }` → Define fondo verde claro y texto verde para estado aprobado; se conecta con el caso `APROBADO`; si se quita, los aprobados no se diferenciarían visualmente.

Línea 210: `.mp-badge-negado    { background: #fdecea; color: #b91c1c; }` → Define fondo rojo claro y texto rojo para estado negado/rechazado; se conecta con el caso `NEGADO`; si se quita, los rechazados no llamarían la atención.

Línea 211: `.mp-badge-devuelto  { background: #dbeafe; color: #1e40af; }` → Define fondo azul claro y texto azul para estado devuelto; se conecta con el caso `DEVUELTO`; si se quita, los devueltos no tendrían identificación visual propia.

Línea 213: `@media (max-width: 600px) {` → Inicia una regla responsive para pantallas pequeñas de hasta 600px; se conecta con celulares y diseño móvil; si se quita, la tabla puede verse demasiado ancha en pantallas pequeñas.

Línea 214: `.mp-tabla th:nth-child(4),` → Selecciona el cuarto encabezado de la tabla, que corresponde a `Fecha Entrega`; se conecta con la adaptación móvil; si se quita, solo se ocultaría la celda de datos o la regla quedaría incompleta.

Línea 215: `.mp-tabla td:nth-child(4) { display: none; }` → Oculta la cuarta columna de datos en móvil para ahorrar espacio horizontal; se conecta con la columna `Fecha Entrega`; si se quita, la tabla puede desbordarse en celulares.

Línea 216: `}` → Cierra la regla responsive; se conecta con la línea 213; si se quita, el CSS queda inválido.

Línea 217: `</style>` → Cierra el bloque de estilos internos; se conecta con la línea 141; si se quita, el navegador podría interpretar el HTML siguiente como CSS.

## Bloque 9 — Modal de confirmación para cerrar sesión

Línea 220: `<div id="logoutOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:9999;align-items:center;justify-content:center;">` → Crea la capa oscura del modal de cierre de sesión, inicialmente oculta con `display:none`; se conecta con las funciones `abrirLogoutModal()` y `cerrarLogoutModal()` que cambian su `display`; si se quita, ya no habría confirmación visual antes de cerrar sesión.

Línea 221: `<div style="background:#fff;border-radius:16px;padding:32px 36px;max-width:380px;width:90%;box-shadow:0 20px 60px rgba(0,0,0,0.25);text-align:center;">` → Crea la caja blanca central del modal con estilo visual; se conecta con el overlay de la línea 220; si se quita, el texto y botones quedarían directamente sobre el fondo oscuro sin contenedor.

Línea 222: `<p style="font-size:18px;font-weight:700;color:#111827;margin:0 0 24px;">¿Deseas cerrar sesión?</p>` → Muestra la pregunta de confirmación al usuario; se conecta con la acción de logout; si se quita, el modal aparecería sin explicar qué decisión debe tomar el usuario.

Línea 223: `<div style="display:flex;gap:12px;justify-content:center;">` → Agrupa los botones del modal en fila y centrados; se conecta con los botones cancelar y confirmar; si se quita, los botones pueden quedar desordenados o apilados sin intención.

Línea 224: `<button onclick="cerrarLogoutModal()" style="background:#f3f4f6;color:#374151;border:none;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:600;cursor:pointer;">Cancelar</button>` → Crea el botón para cancelar el cierre de sesión y llama a `cerrarLogoutModal()`; se conecta con la función JavaScript de la línea 235; si se quita, el usuario no tendría una forma clara de cerrar el modal sin salir.

Línea 225: `<a href="../../controllers/LogoutController.php" style="background:#e53935;color:#fff;padding:11px 28px;border-radius:10px;font-size:15px;font-weight:700;text-decoration:none;display:inline-flex;align-items:center;">Confirmar</a>` → Crea el enlace definitivo para cerrar sesión y envía al usuario a `LogoutController.php`; se conecta con el controlador que destruye la sesión; si se quita, el modal permitiría cancelar pero no confirmar el cierre.

Línea 226: `</div>` → Cierra el contenedor de botones; se conecta con la línea 223; si se quita, la estructura del modal queda mal anidada.

Línea 227: `</div>` → Cierra la caja blanca del modal; se conecta con la línea 221; si se quita, el overlay no quedaría bien estructurado.

Línea 228: `</div>` → Cierra el overlay completo del modal; se conecta con la línea 220; si se quita, el modal puede envolver scripts o contenido posterior por error.

## Bloque 10 — JavaScript para sidebar y modal de cierre de sesión

Línea 230: `<script>` → Abre un bloque de JavaScript en el navegador; se conecta con los botones que usan `onclick` y con los eventos del modal; si se quita, las funciones de interacción no se ejecutarían.

Línea 231: `function toggleSidebar() {` → Declara la función que abre o cierra el menú lateral; se conecta con el botón de menú de la línea 52; si se quita, al hacer clic en el botón ☰ se produciría error porque la función no existiría.

Línea 232: `document.getElementById('sidebar').classList.toggle('sidebar-open');` → Busca el elemento con id `sidebar` y alterna la clase `sidebar-open`; se conecta con el `<aside id="sidebar">` de la línea 34 y con el CSS que debe definir cómo se abre el menú; si se quita, la función existe pero no cambiaría nada visualmente.

Línea 233: `}` → Cierra la función `toggleSidebar`; se conecta con la línea 231; si se quita, JavaScript marcaría error de sintaxis.

Línea 234: `function abrirLogoutModal() { document.getElementById('logoutOverlay').style.display = 'flex'; }` → Declara la función que muestra el modal cambiando su estilo a `display:flex`; se conecta con el overlay `logoutOverlay` de la línea 220 y con el evento del botón logout; si se quita, no podría abrirse el modal de confirmación.

Línea 235: `function cerrarLogoutModal() { document.getElementById('logoutOverlay').style.display = 'none'; }` → Declara la función que oculta el modal cambiando su estilo a `display:none`; se conecta con el botón Cancelar y con el clic fuera de la caja; si se quita, el usuario no podría cerrar el modal sin confirmar o recargar.

Línea 236: `document.querySelectorAll('.btn-logout').forEach(function(btn) {` → Busca todos los elementos con clase `.btn-logout` y recorre cada botón encontrado; se conecta con el enlace de cerrar sesión de la línea 62; si se quita, el enlace llevaría directo al controlador sin mostrar modal.

Línea 237: `btn.addEventListener('click', function(e) { e.preventDefault(); abrirLogoutModal(); });` → Agrega un evento click al botón de cerrar sesión, evita la navegación inmediata y abre el modal; se conecta con `abrirLogoutModal()` y con `LogoutController.php`, porque solo deja ir al controlador cuando el usuario confirma; si se quita, no habría confirmación y el usuario cerraría sesión inmediatamente al hacer clic.

Línea 238: `});` → Cierra el recorrido `forEach` de los botones de logout; se conecta con la línea 236; si se quita, JavaScript queda incompleto.

Línea 239: `document.getElementById('logoutOverlay').addEventListener('click', function(e) {` → Agrega un evento de clic al fondo oscuro del modal; se conecta con el overlay de la línea 220; si se quita, hacer clic fuera de la caja no cerraría el modal.

Línea 240: `if (e.target === this) cerrarLogoutModal();` → Verifica que el clic haya sido exactamente sobre el fondo del modal y no sobre la caja interna, y en ese caso lo cierra; se conecta con `cerrarLogoutModal()`; si se quita, el clic en el fondo no haría nada, o si se hiciera mal, podría cerrar el modal incluso al hacer clic dentro de la caja.

Línea 241: `});` → Cierra el evento del overlay; se conecta con la línea 239; si se quita, JavaScript queda con error.

Línea 243: `</script>` → Cierra el bloque JavaScript; se conecta con la línea 230; si se quita, el navegador podría interpretar el PHP o HTML siguiente como JavaScript y fallar.

## Bloque 11 — Inclusión del panel de notificaciones y cierre HTML

Línea 245: `<?php require_once __DIR__ . '/includes/notificaciones_panel.php'; ?>` → Incluye el archivo del panel de notificaciones del trabajador; se conecta con `includes/notificaciones_panel.php` y probablemente aporta el HTML/JS de `toggleNotifPanel()` usado por el botón de campana; si se quita, el botón de notificaciones podría dejar de funcionar o no mostrar ningún panel.

Línea 247: `</body>` → Cierra el cuerpo visible del documento; se conecta con la apertura de `<body>` en la línea 31; si se quita, el HTML queda incompleto aunque muchos navegadores intenten corregirlo.

Línea 248: `</html>` → Cierra el documento HTML completo; se conecta con la apertura de `<html lang="es">` en la línea 22; si se quita, el documento queda formalmente incompleto.

## Conclusión general del archivo

Este archivo funciona como una vista de consulta para el trabajador. Primero valida que el usuario tenga sesión y rol correcto, luego carga la conexión a base de datos, usa el modelo `TrabajadorPrestamo` para obtener resumen y listado, y finalmente presenta esa información en tarjetas y tabla. La parte visual se apoya en `dashboard.css` y estilos internos `mp-*`. La parte interactiva solo maneja abrir el sidebar y confirmar cierre de sesión. Su conexión más importante es con `TrabajadorPrestamo.php`, porque de ahí salen los datos que alimentan `$resumen` y `$prestamos`. Si se elimina este archivo, no se daña necesariamente la base de datos, pero el trabajador pierde la pantalla para consultar su historial de préstamos y solicitudes de herramientas.
