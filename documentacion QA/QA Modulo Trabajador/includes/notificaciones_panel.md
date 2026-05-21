# Documentación línea por línea — `notificaciones_panel.php`

Archivo documentado: `views/trabajador/includes/notificaciones_panel.php`  
Módulo: Trabajador / Panel de notificaciones  
Función general: este archivo es un include reutilizable que se inserta al final del `<body>` en las vistas del trabajador. Su trabajo es crear el overlay visual de notificaciones, abrirlo y cerrarlo desde la campana de la barra superior, consultar el controlador `NotificacionController.php`, pintar las notificaciones recibidas, marcar una o todas como leídas y mantener actualizado el contador de notificaciones sin leer.

Trazabilidad general: este archivo se conecta con las vistas del trabajador que tienen un botón con clase `.notif-btn`, por ejemplo `dashboard.php`, `mis_tareas.php`, `mis_prestamos.php`, `perfil.php` y `solicitar_herramienta.php`. También se conecta con `../../controllers/NotificacionController.php`, que debe responder en JSON a peticiones `GET` y `POST`. En el `GET`, espera datos como `ok`, `notificaciones` y `no_leidas`. En el `POST`, espera acciones como `marcar_leidas` y `marcar_una`. Además se conecta con estilos CSS que deben existir para clases como `notif-overlay`, `notif-panel`, `notif-count`, `notif-unread`, `notif-item`, entre otras. Si este archivo se quita, la campana de notificaciones de las vistas del trabajador puede quedar sin panel, sin contador actualizado y con errores porque funciones como `toggleNotifPanel()` ya no existirían.

## Bloque 1 — Estructura HTML del overlay y panel de notificaciones

Línea 8: `<div class="notif-overlay" id="notifOverlay">` → Crea la capa principal del panel de notificaciones, normalmente oculta hasta que el usuario toca la campana; se conecta con JavaScript mediante el id `notifOverlay`, especialmente con `toggleNotifPanel()`, `cerrarNotifPanel()` y los eventos que cierran el panel al hacer clic fuera; si se quita, no existiría el contenedor visual que se muestra y oculta para abrir las notificaciones.

Línea 9: `<div class="notif-panel" id="notifPanel" role="dialog" aria-modal="true" aria-label="Notificaciones">` → Crea el panel interno donde se muestran el encabezado y la lista de notificaciones; se conecta con el id `notifPanel`, usado para detectar si el clic ocurrió dentro o fuera del panel, y con atributos de accesibilidad como `role="dialog"` y `aria-modal="true"`; si se quita, el overlay existiría pero no habría caja interna organizada para mostrar las notificaciones.

Línea 10: `<div class="notif-panel-header">` → Abre el encabezado del panel, donde van el título, subtítulo y botones; se conecta con los estilos del panel de notificaciones; si se quita, los elementos del encabezado podrían quedar desordenados y sin estructura visual.

Línea 11: `<div class="notif-panel-header-left">` → Abre la zona izquierda del encabezado, destinada al título y subtítulo; se conecta con estilos que seguramente alinean esta parte a la izquierda frente a los botones de la derecha; si se quita, el título y subtítulo perderían su agrupación.

Línea 12: `<h2>🔔 Notificaciones</h2>` → Muestra el título principal del panel junto con el icono de campana; se conecta con la función visual del módulo, indicando al usuario que está viendo notificaciones; si se quita, el panel abriría sin encabezado claro y sería menos entendible.

Línea 13: `<p id="notifSubtitulo">Cargando...</p>` → Muestra un subtítulo inicial mientras se consultan las notificaciones, y luego JavaScript cambia ese texto por mensajes como “Tienes X notificaciones sin leer” o “Todas las notificaciones leídas”; se conecta con `renderNotificaciones()`, que busca este elemento por id `notifSubtitulo`; si se quita, la función intentaría usar `sub.textContent` y podría causar error porque `sub` sería `null`.

Línea 14: `</div>` → Cierra la zona izquierda del encabezado; se conecta con la apertura de la línea 11; si se quita, la estructura del encabezado queda mal anidada y puede afectar el diseño.

Línea 15: `<div class="notif-panel-header-right">` → Abre la zona derecha del encabezado, donde están los botones de marcar como leídas y cerrar; se conecta con estilos que organizan los botones a la derecha; si se quita, los botones perderían su contenedor visual.

Línea 16: `<button class="btn-marcar-leidas" id="btnMarcarLeidas" onclick="marcarTodasLeidas()" style="display:none;">` → Crea el botón para marcar todas las notificaciones como leídas, inicialmente oculto con `display:none`; se conecta con la función global `marcarTodasLeidas()` y con `renderNotificaciones()`, que lo muestra solo si hay notificaciones sin leer; si se quita, el usuario no tendría una acción rápida para marcar todas como leídas.

Línea 17: `✓ Marcar todas como leídas` → Define el texto visible dentro del botón de la línea anterior; se conecta directamente con la acción de `marcarTodasLeidas()`; si se quita, el botón podría aparecer vacío o poco claro para el usuario.

Línea 18: `</button>` → Cierra el botón de marcar todas como leídas; se conecta con la apertura de la línea 16; si se quita, el botón podría tragarse otros elementos del panel y romper la estructura HTML.

Línea 19: `<button class="btn-cerrar-notif" onclick="cerrarNotifPanel()" aria-label="Cerrar">✕</button>` → Crea el botón para cerrar el panel de notificaciones y ejecuta `cerrarNotifPanel()` al hacer clic; se conecta con la función global creada más abajo en JavaScript y mejora accesibilidad con `aria-label="Cerrar"`; si se quita, el usuario solo podría cerrar el panel con clic afuera o tecla Escape, perdiendo el botón visible de cierre.

Línea 20: `</div>` → Cierra la zona derecha del encabezado; se conecta con la línea 15; si se quita, la estructura del encabezado queda incompleta.

Línea 21: `</div>` → Cierra el encabezado completo del panel; se conecta con la línea 10; si se quita, la lista de notificaciones podría quedar dentro del encabezado por error.

Línea 22: `<div class="notif-list" id="notifList">` → Crea el contenedor donde JavaScript insertará dinámicamente las notificaciones; se conecta con `renderNotificaciones()` y `cargarNotificaciones()`, que buscan este id para reemplazar su contenido; si se quita, no habría dónde pintar la lista y las funciones podrían dejar de mostrar resultados.

Línea 23: `<p class="notif-empty">Cargando notificaciones...</p>` → Muestra un mensaje inicial mientras se carga la información desde el controlador; se conecta con la experiencia visual previa al `fetch`; si se quita, el panel podría abrir vacío mientras espera la respuesta.

Línea 24: `</div>` → Cierra el contenedor de lista de notificaciones; se conecta con la línea 22; si se quita, el panel queda mal estructurado.

Línea 25: `</div>` → Cierra el panel interno de notificaciones; se conecta con la línea 9; si se quita, el overlay podría envolver incorrectamente otros elementos.

Línea 26: `</div>` → Cierra el overlay completo de notificaciones; se conecta con la línea 8; si se quita, el HTML queda abierto y podría afectar el resto de la página donde se incluye este archivo.

## Bloque 2 — Inicio del script e inicialización de variables principales

Línea 28: `<script>` → Abre el bloque de JavaScript que controlará el comportamiento del panel; se conecta con el navegador, con el HTML del panel y con el controlador de notificaciones; si se quita, todo el código JavaScript se mostraría o se ignoraría como texto, y el panel no funcionaría.

Línea 29: `(function () {` → Inicia una función anónima autoejecutable para encerrar las variables y funciones internas, evitando contaminar demasiado el espacio global del navegador; se conecta con todo el código JavaScript del archivo, porque lo agrupa en un solo ámbito; si se quita sin ajustar el cierre final, el script tendría error, y si se deja todo global, aumentaría el riesgo de choques con otras variables.

Línea 30: `var NOTIF_URL = '../../controllers/NotificacionController.php';` → Define la ruta del controlador que recibirá las peticiones de notificaciones; se conecta directamente con `controllers/NotificacionController.php`, que debe devolver JSON y procesar acciones POST; si se quita, las funciones `fetch()` no sabrían a qué archivo llamar para cargar o actualizar notificaciones.

Línea 31: `var iconos = { error: '⚠', warning: '△', success: '✓', info: 'ℹ' };` → Crea un mapa de iconos según el tipo de notificación; se conecta con el campo `tipo` de cada notificación recibida desde el controlador; si se quita, el renderizado no podría traducir tipos como `error`, `warning`, `success` o `info` en iconos visibles.

## Bloque 3 — Función `tiempoRelativo(fechaStr)`

Línea 33: `function tiempoRelativo(fechaStr) {` → Declara una función que convierte una fecha en un texto fácil de leer como “Hace 5 min” o “Hace 2 días”; se conecta con `renderNotificaciones()`, que la usa para mostrar `n.fecha_hora`; si se quita, las notificaciones no podrían mostrar tiempo relativo.

Línea 34: `if (!fechaStr) return '';` → Si no llega fecha, devuelve texto vacío para evitar errores; se conecta con posibles notificaciones que no tengan `fecha_hora`; si se quita, una fecha vacía podría generar cálculos inválidos o mostrar `NaN`.

Línea 35: `var diff = Math.floor((Date.now() - new Date(fechaStr).getTime()) / 1000);` → Calcula la diferencia en segundos entre el momento actual y la fecha de la notificación; se conecta con el objeto `Date` del navegador y con el campo `fecha_hora`; si se quita, la función no tendría base numérica para decidir si mostrar segundos, minutos, horas o días.

Línea 36: `if (diff < 60)    return 'Hace ' + diff + ' seg';` → Si la diferencia es menor a un minuto, devuelve el tiempo en segundos; se conecta con el valor calculado en `diff`; si se quita, las notificaciones muy recientes no tendrían formato de segundos y pasarían al siguiente caso.

Línea 37: `if (diff < 3600)  return 'Hace ' + Math.floor(diff / 60) + ' min';` → Si la diferencia es menor a una hora, devuelve el tiempo en minutos; se conecta con el cálculo de segundos dividido entre 60; si se quita, las notificaciones de minutos recientes no se mostrarían correctamente.

Línea 38: `if (diff < 86400) return 'Hace ' + Math.floor(diff / 3600) + ' h';` → Si la diferencia es menor a un día, devuelve el tiempo en horas; se conecta con el cálculo de segundos dividido entre 3600; si se quita, las notificaciones del mismo día no tendrían formato de horas.

Línea 39: `return 'Hace ' + Math.floor(diff / 86400) + ' días';` → Para diferencias mayores o iguales a un día, devuelve el tiempo en días; se conecta con el cálculo de segundos dividido entre 86400; si se quita, la función no devolvería nada para notificaciones antiguas.

Línea 40: `}` → Cierra la función `tiempoRelativo`; se conecta con la línea 33; si se quita, JavaScript tendría error de sintaxis.

## Bloque 4 — Función `escHtml(str)` para proteger texto

Línea 42: `function escHtml(str) {` → Declara una función para escapar texto antes de insertarlo como HTML; se conecta con mensajes y enlaces que vienen desde el controlador; si se quita, el sistema tendría más riesgo de inyección HTML o XSS al pintar datos dinámicos.

Línea 43: `var d = document.createElement('div');` → Crea un elemento temporal `div` en memoria para usarlo como herramienta de escapado; se conecta con el DOM del navegador; si se quita, no habría contenedor seguro para convertir texto plano en HTML escapado.

Línea 44: `d.appendChild(document.createTextNode(str || ''));` → Inserta el texto recibido como nodo de texto, no como HTML, usando cadena vacía si viene nulo o indefinido; se conecta con la protección contra código malicioso, porque los caracteres especiales se tratan como texto; si se quita, no se escaparía el contenido recibido.

Línea 45: `return d.innerHTML;` → Devuelve el HTML escapado resultante del texto insertado; se conecta con las líneas donde se arma `innerHTML` para mensajes y links; si se quita, la función no devolvería el valor protegido y el renderizado mostraría `undefined`.

Línea 46: `}` → Cierra la función `escHtml`; se conecta con la línea 42; si se quita, el script tendría error.

## Bloque 5 — Función `renderNotificaciones(notifs, noLeidas)`

Línea 48: `function renderNotificaciones(notifs, noLeidas) {` → Declara la función encargada de pintar en pantalla las notificaciones recibidas y actualizar el subtítulo y botón de marcar leídas; se conecta con `cargarNotificaciones()`, que la llama después de recibir JSON del controlador; si se quita, aunque se carguen datos, no se mostrarían en el panel.

Línea 49: `var list = document.getElementById('notifList');` → Busca el contenedor de la lista de notificaciones; se conecta con el `<div id="notifList">` de la línea 22; si se quita, la función no sabría dónde insertar las notificaciones.

Línea 50: `var sub  = document.getElementById('notifSubtitulo');` → Busca el subtítulo del panel para cambiar su texto según cuántas notificaciones hay sin leer; se conecta con el `<p id="notifSubtitulo">` de la línea 13; si se quita, no se actualizaría el mensaje de estado del panel.

Línea 51: `var btn  = document.getElementById('btnMarcarLeidas');` → Busca el botón que marca todas las notificaciones como leídas; se conecta con el botón de la línea 16; si se quita, no podría mostrarse u ocultarse automáticamente según `noLeidas`.

Línea 52: `if (!list) return;` → Si no existe la lista, detiene la función para evitar errores; se conecta con la posibilidad de que el include se cargue en una vista incompleta o sin el HTML esperado; si se quita, el código podría fallar al intentar modificar `list.innerHTML`.

Línea 54: `sub.textContent = noLeidas > 0` → Empieza una asignación condicional del subtítulo según si existen notificaciones sin leer; se conecta con el contador `noLeidas` recibido del controlador; si se quita, el subtítulo no se actualizaría y se quedaría en “Cargando...”.

Línea 55: `? 'Tienes ' + noLeidas + ' notificación' + (noLeidas === 1 ? '' : 'es') + ' sin leer'` → Define el texto cuando hay notificaciones sin leer, cuidando singular o plural; se conecta con `noLeidas`; si se quita, el usuario no sabría cuántas notificaciones pendientes tiene dentro del panel.

Línea 56: `: 'Todas las notificaciones leídas';` → Define el texto cuando no hay notificaciones pendientes; se conecta con el caso contrario de la condición de la línea 54; si se quita, no habría mensaje para el estado sin pendientes.

Línea 58: `if (btn) btn.style.display = noLeidas > 0 ? 'inline-flex' : 'none';` → Muestra el botón de marcar todas como leídas solo cuando hay notificaciones sin leer; se conecta con `btnMarcarLeidas` y con el contador `noLeidas`; si se quita, el botón podría estar oculto siempre o visible cuando no hace falta.

Línea 60: `if (!notifs || notifs.length === 0) {` → Verifica si no llegaron notificaciones o si la lista está vacía; se conecta con el arreglo `notifs` del JSON del controlador; si se quita, el código intentaría hacer `.map()` sobre algo vacío o nulo y podría fallar.

Línea 61: `list.innerHTML = '<p class="notif-empty">Sin notificaciones nuevas</p>';` → Muestra un mensaje cuando no hay notificaciones para listar; se conecta con la clase visual `notif-empty`; si se quita, el panel quedaría vacío y el usuario no sabría si está cargando o si no hay datos.

Línea 62: `return;` → Detiene la función después de mostrar el mensaje vacío; se conecta con la condición de la línea 60; si se quita, el código seguiría y trataría de recorrer una lista vacía o inexistente.

Línea 63: `}` → Cierra la condición de lista vacía; se conecta con la línea 60; si se quita, el bloque condicional queda mal cerrado.

Línea 65: `list.innerHTML = notifs.map(function (n) {` → Recorre cada notificación y construye una cadena HTML para insertarla dentro de la lista; se conecta con el arreglo `notifs` recibido del controlador; si se quita, las notificaciones no se pintarían.

Línea 66: `var tipo   = n.tipo || 'info';` → Obtiene el tipo de la notificación o usa `info` si no existe; se conecta con el campo `tipo` de cada notificación; si se quita, no habría tipo para elegir icono ni clase CSS.

Línea 67: `var icono  = iconos[tipo] || 'ℹ';` → Busca el icono correspondiente al tipo y usa el icono de información si el tipo no existe en el mapa; se conecta con el objeto `iconos` de la línea 31; si se quita, las notificaciones no tendrían icono visual.

Línea 68: `var unread = !parseInt(n.leida) ? 'notif-unread' : '';` → Define si la notificación debe tener la clase `notif-unread` cuando no está leída; se conecta con el campo `leida` de cada notificación; si se quita, las notificaciones sin leer no se diferenciarían visualmente.

Línea 69: `var linkHtml = n.link` → Empieza a crear un enlace opcional si la notificación trae una ruta o enlace; se conecta con el campo `link` de cada notificación; si se quita, no se podrían mostrar enlaces “Ver →”.

Línea 70: `? '<a href="' + escHtml(n.link) + '" class="notif-item-link" onclick="marcarUnaLeida(' + n.id_notificacion + ')">Ver →</a>'` → Si existe link, crea un enlace que lleva al destino y marca esa notificación como leída al hacer clic; se conecta con `escHtml()`, con `n.id_notificacion` y con la función global `marcarUnaLeida()`; si se quita, las notificaciones con destino no permitirían ir a ver el detalle ni marcarse individualmente desde el enlace.

Línea 71: `: '';` → Si no hay link, deja vacío el HTML del enlace; se conecta con la condición de la línea 69; si se quita, la variable `linkHtml` quedaría incompleta.

Línea 72: `return '<div class="notif-item notif-tipo-' + tipo + ' ' + unread + '">'` → Empieza a construir el HTML de una notificación individual, agregando clases según tipo y si está sin leer; se conecta con los estilos `notif-item`, `notif-tipo-*` y `notif-unread`; si se quita, no se crearía el contenedor principal de cada notificación.

Línea 73: `+ '<div class="notif-item-icon">' + icono + '</div>'` → Agrega el bloque visual del icono de la notificación; se conecta con la variable `icono`; si se quita, las notificaciones perderían su indicador visual de tipo.

Línea 74: `+ '<div class="notif-item-body">'` → Abre el cuerpo de la notificación donde van el mensaje y el tiempo; se conecta con el diseño interno de cada item; si se quita, mensaje y hora no tendrían contenedor agrupado.

Línea 75: `+ '<p class="notif-msg">' + escHtml(n.mensaje) + '</p>'` → Inserta el mensaje de la notificación escapado para evitar inyección HTML; se conecta con el campo `mensaje` que viene del controlador y con `escHtml()`; si se quita, no se vería el texto principal de la notificación, y si se quitara solo `escHtml`, habría riesgo de XSS.

Línea 76: `+ '<span class="notif-time">' + tiempoRelativo(n.fecha_hora) + '</span>'` → Inserta el tiempo relativo de la notificación; se conecta con `tiempoRelativo()` y el campo `fecha_hora`; si se quita, el usuario no sabría cuándo ocurrió o llegó la notificación.

Línea 77: `+ '</div>'` → Cierra el cuerpo interno de la notificación; se conecta con la apertura de la línea 74; si se quita, el HTML de cada notificación queda mal formado.

Línea 78: `+ linkHtml` → Agrega el enlace opcional “Ver →” si fue construido; se conecta con la variable `linkHtml` de las líneas 69 a 71; si se quita, aunque la notificación tenga link, no aparecería el acceso al detalle.

Línea 79: `+ '</div>';` → Cierra el contenedor principal de la notificación individual; se conecta con la línea 72; si se quita, las notificaciones quedarían mal anidadas.

Línea 80: `}).join('');` → Cierra el `map()` y une todos los fragmentos HTML en una sola cadena sin separadores; se conecta con `list.innerHTML`; si se quita, el resultado sería un arreglo o el código quedaría incompleto y no se pintaría correctamente.

Línea 81: `}` → Cierra la función `renderNotificaciones`; se conecta con la línea 48; si se quita, JavaScript marcaría error de sintaxis.

## Bloque 6 — Función `actualizarBadge(noLeidas)`

Línea 83: `function actualizarBadge(noLeidas) {` → Declara la función que actualiza el contador pequeño de notificaciones sobre la campana; se conecta con la clase `.notif-btn` de las vistas principales; si se quita, el badge no se crearía, actualizaría ni eliminaría.

Línea 84: `var badge = document.querySelector('.notif-btn .notif-count');` → Busca si ya existe un contador dentro del botón de notificaciones; se conecta con el botón `.notif-btn` de la topbar y con el span `.notif-count`; si se quita, la función no sabría si debe actualizar un badge existente o crear uno nuevo.

Línea 85: `if (noLeidas > 0) {` → Verifica si hay notificaciones sin leer; se conecta con el número recibido del controlador; si se quita, la función no diferenciaría entre mostrar y quitar el contador.

Línea 86: `if (!badge) {` → Comprueba si todavía no existe el span del contador; se conecta con la creación dinámica del badge; si se quita, podría intentar actualizar un elemento inexistente o crear duplicados sin control.

Línea 87: `badge = document.createElement('span');` → Crea un nuevo elemento `span` para usarlo como contador; se conecta con el DOM del navegador; si se quita, no podría aparecer el badge cuando no existe.

Línea 88: `badge.className = 'notif-count';` → Asigna la clase CSS que da estilo al contador; se conecta con los estilos del sistema para `.notif-count`; si se quita, el número podría aparecer sin forma ni posición correcta.

Línea 89: `var btn = document.querySelector('.notif-btn');` → Busca el botón de campana donde debe insertarse el contador; se conecta con la topbar de cada vista que incluye este archivo; si se quita, no habría referencia al botón donde agregar el badge.

Línea 90: `if (btn) btn.appendChild(badge);` → Inserta el badge dentro del botón si el botón existe; se conecta con `.notif-btn`; si se quita, el badge se crearía en memoria pero no aparecería en pantalla.

Línea 91: `}` → Cierra la condición que crea el badge cuando no existe; se conecta con la línea 86; si se quita, el bloque queda mal cerrado.

Línea 92: `badge.textContent = noLeidas;` → Actualiza el número visible del badge con la cantidad de notificaciones sin leer; se conecta con `noLeidas`; si se quita, el badge podría aparecer vacío o con un número viejo.

Línea 93: `} else {` → Abre el caso contrario, cuando no hay notificaciones sin leer; se conecta con el `if` de la línea 85; si se quita, no se ejecutaría la lógica para quitar el contador.

Línea 94: `if (badge) badge.remove();` → Elimina el badge si ya no hay notificaciones sin leer; se conecta con el contador `.notif-count`; si se quita, el usuario podría seguir viendo un contador aunque ya no tenga pendientes.

Línea 95: `}` → Cierra el bloque `else`; se conecta con la línea 93; si se quita, la estructura condicional queda incompleta.

Línea 96: `}` → Cierra la función `actualizarBadge`; se conecta con la línea 83; si se quita, JavaScript tendría error.

## Bloque 7 — Función `cargarNotificaciones()`

Línea 98: `function cargarNotificaciones() {` → Declara la función que consulta al controlador para traer notificaciones actualizadas; se conecta con `toggleNotifPanel()` y con `marcarTodasLeidas()`; si se quita, el panel no podría cargar datos reales.

Línea 99: `fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })` → Envía una petición GET al controlador de notificaciones usando cookies de la misma sesión; se conecta con `NotificacionController.php` y con la sesión del usuario autenticado; si se quita, no habría comunicación con el backend.

Línea 100: `.then(function (r) { return r.json(); })` → Convierte la respuesta del controlador a JSON; se conecta con el formato que debe devolver `NotificacionController.php`; si se quita, el siguiente paso no recibiría un objeto usable.

Línea 101: `.then(function (data) {` → Recibe el JSON convertido para procesarlo; se conecta con las propiedades `ok`, `notificaciones` y `no_leidas`; si se quita, no se podrían usar los datos devueltos.

Línea 102: `if (data.ok) {` → Verifica que el controlador haya respondido exitosamente; se conecta con la propiedad `ok` del JSON; si se quita, el código intentaría renderizar incluso respuestas fallidas o incompletas.

Línea 103: `renderNotificaciones(data.notificaciones, data.no_leidas);` → Dibuja la lista de notificaciones usando los datos recibidos; se conecta con la función `renderNotificaciones()`; si se quita, el panel se abriría pero no actualizaría su lista.

Línea 104: `actualizarBadge(data.no_leidas);` → Actualiza el contador de la campana con el número recibido; se conecta con la función `actualizarBadge()` y la topbar; si se quita, la lista podría actualizarse pero el badge quedaría desactualizado.

Línea 105: `}` → Cierra la validación `if (data.ok)`; se conecta con la línea 102; si se quita, el bloque queda mal cerrado.

Línea 106: `})` → Cierra el `then` que procesa el JSON; se conecta con la línea 101; si se quita, la cadena de promesas queda incompleta.

Línea 107: `.catch(function () {` → Define qué hacer si falla la petición, la conexión o el procesamiento JSON; se conecta con errores de red o backend; si se quita, un fallo quedaría silencioso y el usuario seguiría viendo “Cargando...”.

Línea 108: `var list = document.getElementById('notifList');` → Busca la lista donde se puede mostrar un mensaje de error; se conecta con el contenedor de la línea 22; si se quita, no habría dónde escribir el error.

Línea 109: `if (list) list.innerHTML = '<p class="notif-empty">Error al cargar notificaciones.</p>';` → Muestra un mensaje de error si existe la lista; se conecta con la experiencia del usuario cuando el backend falla; si se quita, el usuario no sabría que hubo error al cargar.

Línea 110: `});` → Cierra el `catch` y la cadena `fetch`; se conecta con la línea 107; si se quita, el script queda incompleto.

Línea 111: `}` → Cierra la función `cargarNotificaciones`; se conecta con la línea 98; si se quita, JavaScript tendría error.

## Bloque 8 — Funciones globales para abrir, cerrar y marcar notificaciones

Línea 113: `window.toggleNotifPanel = function () {` → Expone globalmente la función que abre o cierra el panel, para que pueda llamarse desde botones HTML en otras vistas; se conecta con `onclick="toggleNotifPanel()"` usado en la campana; si se quita, las vistas que llaman esa función mostrarían error al hacer clic.

Línea 114: `var overlay = document.getElementById('notifOverlay');` → Busca el overlay de notificaciones; se conecta con el div de la línea 8; si se quita, la función no sabría qué elemento mostrar u ocultar.

Línea 115: `if (!overlay) return;` → Detiene la función si el overlay no existe; se conecta con seguridad ante vistas incompletas; si se quita, podría fallar al intentar usar `classList` sobre `null`.

Línea 116: `var visible = overlay.classList.toggle('notif-overlay-visible');` → Alterna la clase que muestra u oculta el overlay y guarda si quedó visible; se conecta con el CSS que debe definir `notif-overlay-visible`; si se quita, el panel no cambiaría de estado visual.

Línea 117: `if (visible) cargarNotificaciones();` → Si el panel acaba de abrirse, carga las notificaciones actualizadas; se conecta con `cargarNotificaciones()`; si se quita, el panel podría abrir mostrando datos viejos o el texto inicial de carga.

Línea 118: `};` → Cierra la función asignada a `window.toggleNotifPanel`; se conecta con la línea 113; si se quita, el script quedaría con error.

Línea 120: `window.cerrarNotifPanel = function () {` → Expone globalmente una función para cerrar el panel desde el botón X y desde Escape; se conecta con `onclick="cerrarNotifPanel()"` y con el evento de teclado; si se quita, el botón de cerrar dejaría de funcionar.

Línea 121: `var overlay = document.getElementById('notifOverlay');` → Busca el overlay que debe cerrarse; se conecta con el div de la línea 8; si se quita, la función no tendría referencia al panel.

Línea 122: `if (overlay) overlay.classList.remove('notif-overlay-visible');` → Si existe el overlay, elimina la clase que lo hace visible; se conecta con el CSS de visibilidad; si se quita, la función se ejecutaría pero no cerraría el panel.

Línea 123: `};` → Cierra la función `cerrarNotifPanel`; se conecta con la línea 120; si se quita, JavaScript queda incompleto.

Línea 125: `window.marcarTodasLeidas = function () {` → Expone globalmente la función para marcar todas las notificaciones como leídas; se conecta con el botón `btnMarcarLeidas` de la línea 16; si se quita, el botón generaría error al hacer clic.

Línea 126: `var fd = new FormData();` → Crea un objeto `FormData` para enviar datos por POST al controlador; se conecta con el backend que espera parámetros tipo formulario; si se quita, no habría contenedor para enviar la acción.

Línea 127: `fd.append('accion', 'marcar_leidas');` → Agrega al formulario la acción `marcar_leidas`, indicando al controlador que debe marcar todas como leídas; se conecta con la lógica de `NotificacionController.php`; si se quita, el controlador no sabría qué operación ejecutar.

Línea 128: `fetch(NOTIF_URL, { method: 'POST', body: fd, credentials: 'same-origin' })` → Envía la petición POST al controlador con la acción correspondiente y credenciales de sesión; se conecta con `NotificacionController.php` y con la sesión del trabajador; si se quita, no se enviaría la orden de marcar leídas.

Línea 129: `.then(function () { cargarNotificaciones(); });` → Después de enviar la acción, vuelve a cargar las notificaciones para refrescar lista y contador; se conecta con `cargarNotificaciones()`; si se quita, el backend podría marcar como leídas pero la pantalla no se actualizaría inmediatamente.

Línea 130: `};` → Cierra la función `marcarTodasLeidas`; se conecta con la línea 125; si se quita, el código queda incompleto.

Línea 132: `window.marcarUnaLeida = function (id) {` → Expone globalmente una función para marcar una sola notificación como leída usando su id; se conecta con el enlace “Ver →” creado en la línea 70; si se quita, al hacer clic en el enlace no se marcaría esa notificación como leída.

Línea 133: `var fd = new FormData();` → Crea un formulario para enviar la acción individual al backend; se conecta con la petición POST de esta función; si se quita, no habría estructura para mandar parámetros.

Línea 134: `fd.append('accion', 'marcar_una');` → Indica que la acción del controlador es marcar una notificación específica; se conecta con `NotificacionController.php`; si se quita, el backend no sabría que debe marcar una sola.

Línea 135: `fd.append('id_notificacion', id);` → Envía el id de la notificación que debe marcarse como leída; se conecta con el campo `n.id_notificacion` usado al construir el enlace; si se quita, el controlador no sabría cuál notificación actualizar.

Línea 136: `fetch(NOTIF_URL, { method: 'POST', body: fd, credentials: 'same-origin' });` → Envía la petición al controlador para marcar una notificación como leída; se conecta con la base de datos a través del controlador; si se quita, hacer clic en “Ver” podría abrir el enlace, pero no registraría la notificación como leída.

Línea 137: `};` → Cierra la función `marcarUnaLeida`; se conecta con la línea 132; si se quita, el script queda mal cerrado.

## Bloque 9 — Eventos para cerrar el panel con clic fuera o tecla Escape

Línea 140: `document.addEventListener('click', function (e) {` → Agrega un evento global al documento para detectar clics fuera del panel; se conecta con el overlay, el panel y el botón de campana; si se quita, el panel no se cerraría al hacer clic fuera.

Línea 141: `var overlay = document.getElementById('notifOverlay');` → Busca el overlay dentro del evento de clic; se conecta con el div principal de la línea 8; si se quita, no se podría saber si el panel está visible.

Línea 142: `var panel   = document.getElementById('notifPanel');` → Busca el panel interno para verificar si el clic fue dentro de él; se conecta con el div de la línea 9; si se quita, no se podría diferenciar clic dentro del panel de clic fuera.

Línea 143: `var btn     = document.querySelector('.notif-btn');` → Busca el botón de campana para evitar que el clic sobre la campana cierre el panel inmediatamente; se conecta con la topbar de las vistas que incluyen este archivo; si se quita, el comportamiento de abrir/cerrar desde la campana podría volverse incómodo o fallar.

Línea 144: `if (overlay && overlay.classList.contains('notif-overlay-visible')) {` → Verifica que el overlay exista y esté actualmente visible antes de intentar cerrarlo; se conecta con la clase que muestra el panel; si se quita, el evento haría comprobaciones innecesarias o podría fallar si no existe el overlay.

Línea 145: `if (panel && btn && !panel.contains(e.target) && !btn.contains(e.target)) {` → Comprueba que el clic no haya ocurrido dentro del panel ni dentro del botón de campana; se conecta con `panel`, `btn` y el elemento clicado `e.target`; si se quita o se hace mal, el panel podría cerrarse incluso cuando el usuario intenta interactuar con una notificación.

Línea 146: `overlay.classList.remove('notif-overlay-visible');` → Cierra el panel quitando la clase de visibilidad; se conecta con el CSS del overlay; si se quita, el clic fuera no cerraría nada.

Línea 147: `}` → Cierra la condición interna que detecta clic fuera; se conecta con la línea 145; si se quita, el bloque queda mal formado.

Línea 148: `}` → Cierra la condición que verifica overlay visible; se conecta con la línea 144; si se quita, JavaScript queda mal estructurado.

Línea 149: `});` → Cierra el evento global de clic; se conecta con la línea 140; si se quita, el script tendría error.

Línea 152: `document.addEventListener('keydown', function (e) {` → Agrega un evento para detectar teclas presionadas; se conecta con la funcionalidad de cerrar el panel con Escape; si se quita, el usuario no podría cerrar el panel desde el teclado.

Línea 153: `if (e.key === 'Escape') cerrarNotifPanel();` → Si la tecla presionada es Escape, llama a `cerrarNotifPanel()`; se conecta con accesibilidad y con la función global de cierre; si se quita, la tecla Escape no tendría efecto.

Línea 154: `});` → Cierra el evento de teclado; se conecta con la línea 152; si se quita, el script queda incompleto.

## Bloque 10 — Carga inicial y refresco automático del badge

Línea 157: `fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })` → Al cargar la página, consulta el controlador para saber cuántas notificaciones sin leer hay; se conecta con `NotificacionController.php` y la sesión del trabajador; si se quita, el badge inicial de la campana no aparecería hasta que el usuario abra el panel o pase el intervalo.

Línea 158: `.then(function (r) { return r.json(); })` → Convierte la respuesta inicial a JSON; se conecta con el formato esperado del controlador; si se quita, no se podría leer `data.no_leidas`.

Línea 159: `.then(function (data) { if (data.ok) actualizarBadge(data.no_leidas); })` → Si la respuesta fue correcta, actualiza el badge con las no leídas; se conecta con `actualizarBadge()`; si se quita, el contador de la campana no se actualizaría al cargar la vista.

Línea 160: `.catch(function () {});` → Captura errores de la consulta inicial sin mostrar nada; se conecta con tolerancia a fallos para que la página no se rompa si las notificaciones fallan; si se quita, podría aparecer un error en consola no controlado.

Línea 163: `setInterval(function () {` → Inicia un temporizador que ejecutará una consulta repetida cada cierto tiempo; se conecta con la actualización automática del contador; si se quita, el badge no se refrescaría automáticamente mientras el usuario permanece en la página.

Línea 164: `fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })` → En cada intervalo, consulta nuevamente el controlador para traer el número actualizado de no leídas; se conecta con `NotificacionController.php`; si se quita, el intervalo no tendría petición al backend.

Línea 165: `.then(function (r) { return r.json(); })` → Convierte la respuesta del refresco periódico a JSON; se conecta con el formato de respuesta del controlador; si se quita, no se podría acceder a los datos.

Línea 166: `.then(function (data) { if (data.ok) actualizarBadge(data.no_leidas); })` → Si el controlador responde bien, actualiza el badge con el nuevo total; se conecta con `actualizarBadge()`; si se quita, el intervalo consultaría pero no reflejaría cambios en pantalla.

Línea 167: `.catch(function () {});` → Ignora errores del refresco automático para no interrumpir la experiencia del usuario; se conecta con estabilidad de la página ante fallos de red; si se quita, podrían verse errores no manejados en consola.

Línea 168: `}, 60000);` → Cierra el intervalo y define que se repita cada 60000 milisegundos, es decir, cada 60 segundos; se conecta con la frecuencia de actualización del badge; si se quita o cambia mal, el refresco automático dejaría de funcionar o se ejecutaría demasiado rápido.

Línea 169: `})();` → Cierra y ejecuta inmediatamente la función anónima iniciada en la línea 29; se conecta con todo el script, porque sin esta ejecución las funciones internas no se prepararían ni se harían las consultas iniciales; si se quita, gran parte del código quedaría declarado pero no se ejecutaría correctamente.

Línea 170: `</script>` → Cierra el bloque de JavaScript; se conecta con la apertura de la línea 28; si se quita, el navegador podría interpretar el resto del documento como JavaScript.

## Conclusión general del archivo

Este archivo es una pieza reutilizable del módulo trabajador. No carga datos con PHP directamente, sino que crea una interfaz HTML y usa JavaScript para comunicarse con `NotificacionController.php`. Su flujo es: la vista principal muestra una campana, este include crea el overlay oculto, `toggleNotifPanel()` lo abre, `cargarNotificaciones()` consulta el controlador, `renderNotificaciones()` pinta la lista, `actualizarBadge()` actualiza el contador, y las funciones `marcarTodasLeidas()` y `marcarUnaLeida()` envían acciones al backend. Si este include se elimina de las vistas, la campana puede quedar visible pero sin funcionalidad real, porque faltarían el panel HTML y las funciones globales que esas vistas llaman.
