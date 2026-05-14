Línea 1: </main><!-- /content -->
Qué hace exactamente: Cierra la etiqueta <main> que fue abierta en sidebar.php.
Con qué se conecta: Con <main class="content"> del archivo sidebar.php.
Para qué sirve: Finaliza el área principal donde cada vista coloca su contenido.
Qué pasaría si se quita: El HTML quedaría mal cerrado y podría afectar el diseño de toda la página.

Línea 2: </div><!-- /main-wrapper -->
Qué hace exactamente: Cierra el contenedor principal main-wrapper.
Con qué se conecta: Con <div class="main-wrapper"> abierto en sidebar.php.
Para qué sirve: Termina la estructura que contiene topbar y contenido principal.
Qué pasaría si se quita: El layout podría romperse porque quedaría un div abierto.

Línea 3: Línea en blanco
Qué hace exactamente: No ejecuta nada.
Con qué se conecta: No se conecta con ninguna parte funcional.
Para qué sirve: Mejora la organización visual del archivo.
Qué pasaría si se quita: El código funcionaría igual.

Líneas 4 a 6: Comentario del modal cerrar sesión
Qué hace exactamente: Indica que desde ahí empieza el modal para confirmar cierre de sesión.
Con qué se conecta: Con el bloque HTML del modal logoutOverlay.
Para qué sirve: Ayuda a identificar esa sección del archivo.
Qué pasaría si se quita: El código funciona, pero sería menos claro para leer.

Línea 7: <div id="logoutOverlay" ...>
Qué hace exactamente: Crea el fondo oscuro del modal de cerrar sesión.
Con qué se conecta: Con las funciones abrirLogoutModal() y cerrarLogoutModal().
Para qué sirve: Mostrar una capa sobre toda la pantalla cuando el usuario quiere cerrar sesión.
Qué pasaría si se quita: No habría modal visual para confirmar el cierre de sesión.

Línea 8: <div style="background:#fff;...">
Qué hace exactamente: Crea la caja blanca central del modal.
Con qué se conecta: Con el contenedor logoutOverlay de la línea 7.
Para qué sirve: Dentro de esta caja se muestra el mensaje y los botones Cancelar / Confirmar.
Qué pasaría si se quita: El contenido del modal no tendría contenedor visual.

Línea 9: <p ...>¿Deseas cerrar sesión?</p>
Qué hace exactamente: Muestra el mensaje de confirmación.
Con qué se conecta: Con el modal de cerrar sesión.
Para qué sirve: Pregunta al usuario si realmente desea cerrar sesión.
Qué pasaría si se quita: El modal aparecería sin explicación clara.

Línea 10: <div style="display:flex;...">
Qué hace exactamente: Crea un contenedor flexible para los botones.
Con qué se conecta: Con los botones Cancelar y Confirmar.
Para qué sirve: Alinea los botones horizontalmente y con separación.
Qué pasaría si se quita: Los botones podrían quedar desordenados.

Línea 11: <button onclick="cerrarLogoutModal()"
Qué hace exactamente: Crea el botón Cancelar y le asigna una acción JavaScript.
Con qué se conecta: Con la función cerrarLogoutModal().
Para qué sirve: Permite cerrar el modal sin cerrar sesión.
Qué pasaría si se quita: El usuario no tendría botón para cancelar desde el modal.

Línea 12: style="background:#f3f4f6;..."
Qué hace exactamente: Define el diseño visual del botón Cancelar.
Con qué se conecta: Con el botón abierto en la línea 11.
Para qué sirve: Le da color, tamaño, bordes y cursor al botón.
Qué pasaría si se quita: El botón seguiría funcionando, pero se vería con estilo básico del navegador.

Línea 13: Cancelar
Qué hace exactamente: Es el texto visible del botón.
Con qué se conecta: Con el botón de la línea 11.
Para qué sirve: Indica al usuario que esa acción cancela el cierre de sesión.
Qué pasaría si se quita: El botón aparecería sin texto.

Línea 14: </button>
Qué hace exactamente: Cierra el botón Cancelar.
Con qué se conecta: Con la línea 11.
Para qué sirve: Finaliza correctamente la etiqueta button.
Qué pasaría si se quita: El HTML quedaría mal estructurado.

Línea 15: <a id="logoutConfirmBtn" href="../../controllers/LogoutController.php"
Qué hace exactamente: Crea el enlace/botón Confirmar que lleva al controlador de cierre de sesión.
Con qué se conecta: Con controllers/LogoutController.php.
Para qué sirve: Cuando el usuario confirma, ejecuta el cierre de sesión.
Qué pasaría si se quita: El usuario no podría confirmar el cierre de sesión desde el modal.

Línea 16: style="background:#e53935;..."
Qué hace exactamente: Define el diseño visual del botón Confirmar.
Con qué se conecta: Con el enlace de la línea 15.
Para qué sirve: Lo muestra como botón rojo, indicando una acción importante.
Qué pasaría si se quita: El enlace seguiría funcionando, pero se vería sin estilo de botón.

Línea 17: Confirmar
Qué hace exactamente: Es el texto visible del botón de confirmación.
Con qué se conecta: Con el enlace a LogoutController.php.
Para qué sirve: Indica que al hacer clic se cerrará sesión.
Qué pasaría si se quita: El botón no tendría texto visible.

Línea 18: </a>
Qué hace exactamente: Cierra el enlace Confirmar.
Con qué se conecta: Con la línea 15.
Para qué sirve: Finaliza correctamente la etiqueta <a>.
Qué pasaría si se quita: El HTML quedaría mal estructurado.

Línea 19: </div>
Qué hace exactamente: Cierra el contenedor de botones.
Con qué se conecta: Con la línea 10.
Para qué sirve: Termina el bloque donde están Cancelar y Confirmar.
Qué pasaría si se quita: El contenedor quedaría abierto.

Línea 20: </div>
Qué hace exactamente: Cierra la caja blanca del modal.
Con qué se conecta: Con la línea 8.
Para qué sirve: Termina el contenido visual del modal.
Qué pasaría si se quita: El modal quedaría mal cerrado.

Línea 21: </div>
Qué hace exactamente: Cierra el overlay logoutOverlay.
Con qué se conecta: Con la línea 7.
Para qué sirve: Finaliza todo el modal de cerrar sesión.
Qué pasaría si se quita: El overlay quedaría abierto y podría afectar el resto del HTML.

Línea 22: Línea en blanco
Qué hace exactamente: No ejecuta ninguna acción.
Con qué se conecta: No se conecta con nada.
Para qué sirve: Separar HTML del JavaScript.
Qué pasaría si se quita: El archivo funcionaría igual.

Línea 23: <script>
Qué hace exactamente: Abre el bloque JavaScript.
Con qué se conecta: Con funciones del navegador.
Para qué sirve: Permite agregar interacción al sidebar, logout y animación de escritura.
Qué pasaría si se quita: Todo el JavaScript de este archivo dejaría de ejecutarse.

Línea 24: /* Panel de notificaciones: ver includes/sidebar.php */
Qué hace exactamente: Comentario que indica que la lógica de notificaciones está en sidebar.php.
Con qué se conecta: Con el archivo sidebar.php.
Para qué sirve: Orienta al programador para buscar esa funcionalidad.
Qué pasaría si se quita: No afecta el funcionamiento.

Línea 26: /* ── Sidebar ── */
Qué hace exactamente: Comentario que separa la sección del sidebar.
Con qué se conecta: Con la función toggleSidebar().
Para qué sirve: Organizar el JavaScript.
Qué pasaría si se quita: No afecta el funcionamiento.

Línea 27: function toggleSidebar() {
Qué hace exactamente: Declara una función llamada toggleSidebar.
Con qué se conecta: Con el botón del menú en sidebar.php que tiene onclick="toggleSidebar()".
Para qué sirve: Permite abrir o cerrar el menú lateral.
Qué pasaría si se quita: El botón ☰ del topbar no funcionaría.

Línea 28: document.getElementById('sidebar').classList.toggle('sidebar-open');
Qué hace exactamente: Busca el elemento con id sidebar y le agrega o quita la clase sidebar-open.
Con qué se conecta: Con <aside id="sidebar"> en sidebar.php y con la clase CSS sidebar-open.
Para qué sirve: Controla visualmente si el menú lateral está abierto o cerrado.
Qué pasaría si se quita: La función existiría, pero no haría nada.

Línea 29: }
Qué hace exactamente: Cierra la función toggleSidebar().
Con qué se conecta: Con la línea 27.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 31: /* ── Modal cerrar sesión ── */
Qué hace exactamente: Comentario que marca la sección del modal de logout.
Con qué se conecta: Con abrirLogoutModal() y cerrarLogoutModal().
Para qué sirve: Organizar el código.
Qué pasaría si se quita: No afecta el funcionamiento.

Línea 32: function abrirLogoutModal() {
Qué hace exactamente: Declara la función para abrir el modal de cerrar sesión.
Con qué se conecta: Con los enlaces que tienen clase btn-logout.
Para qué sirve: Mostrar el modal cuando el usuario intenta cerrar sesión.
Qué pasaría si se quita: No se podría abrir el modal.

Línea 33: document.getElementById('logoutOverlay').style.display = 'flex';
Qué hace exactamente: Cambia el display del modal a flex.
Con qué se conecta: Con el div id="logoutOverlay".
Para qué sirve: Hace visible el modal y centra su contenido.
Qué pasaría si se quita: La función abrirLogoutModal() no mostraría el modal.

Línea 34: }
Qué hace exactamente: Cierra abrirLogoutModal().
Con qué se conecta: Con línea 32.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Error de sintaxis.

Línea 35: function cerrarLogoutModal() {
Qué hace exactamente: Declara la función para cerrar el modal.
Con qué se conecta: Con el botón Cancelar y eventos de clic/Escape.
Para qué sirve: Ocultar el modal de cerrar sesión.
Qué pasaría si se quita: No se podría cerrar el modal desde JavaScript.

Línea 36: document.getElementById('logoutOverlay').style.display = 'none';
Qué hace exactamente: Oculta el modal cambiando display a none.
Con qué se conecta: Con logoutOverlay.
Para qué sirve: Hace desaparecer la ventana de confirmación.
Qué pasaría si se quita: La función cerrarLogoutModal() no ocultaría nada.

Línea 37: }
Qué hace exactamente: Cierra cerrarLogoutModal().
Con qué se conecta: Con línea 35.
Para qué sirve: Finaliza la función.
Qué pasaría si se quita: Error de sintaxis.

Línea 38: document.querySelectorAll('.btn-logout').forEach(function(btn) {
Qué hace exactamente: Busca todos los elementos con clase btn-logout y los recorre.
Con qué se conecta: Con el enlace “Cerrar sesión” del sidebar/topbar.
Para qué sirve: Permite interceptar el clic de cerrar sesión.
Qué pasaría si se quita: El enlace cerraría sesión directamente sin mostrar confirmación.

Línea 39: btn.addEventListener('click', function(e) {
Qué hace exactamente: Agrega un evento click a cada botón de logout.
Con qué se conecta: Con cada elemento encontrado en la línea 38.
Para qué sirve: Ejecutar código cuando el usuario presiona cerrar sesión.
Qué pasaría si se quita: No se capturaría el clic.

Línea 40: e.preventDefault();
Qué hace exactamente: Cancela el comportamiento normal del enlace.
Con qué se conecta: Con el evento click del enlace de logout.
Para qué sirve: Evita que vaya directamente a LogoutController.php antes de confirmar.
Qué pasaría si se quita: Se cerraría sesión sin mostrar el modal.

Línea 41: abrirLogoutModal();
Qué hace exactamente: Llama la función que muestra el modal.
Con qué se conecta: Con abrirLogoutModal().
Para qué sirve: Mostrar la confirmación al usuario.
Qué pasaría si se quita: El clic se cancelaría, pero no aparecería el modal.

Línea 42: });
Qué hace exactamente: Cierra el addEventListener del botón.
Con qué se conecta: Con línea 39.
Para qué sirve: Finaliza el evento click.
Qué pasaría si se quita: Error de sintaxis.

Línea 43: });
Qué hace exactamente: Cierra el forEach.
Con qué se conecta: Con línea 38.
Para qué sirve: Finaliza el recorrido de botones logout.
Qué pasaría si se quita: Error de sintaxis.

Línea 44: document.getElementById('logoutOverlay').addEventListener('click', function(e) {
Qué hace exactamente: Agrega un evento click al fondo oscuro del modal.
Con qué se conecta: Con logoutOverlay.
Para qué sirve: Permite cerrar el modal haciendo clic fuera de la caja blanca.
Qué pasaría si se quita: El modal solo se podría cerrar con el botón Cancelar o Escape.

Línea 45: if (e.target === this) cerrarLogoutModal();
Qué hace exactamente: Verifica si el clic fue directamente sobre el fondo y, si sí, cierra el modal.
Con qué se conecta: Con cerrarLogoutModal().
Para qué sirve: Evita que el modal se cierre al hacer clic dentro de la caja blanca.
Qué pasaría si se quita: Podría no cerrarse al hacer clic fuera, o habría que manejarlo de otra forma.

Línea 46: });
Qué hace exactamente: Cierra el evento click del overlay.
Con qué se conecta: Con línea 44.
Para qué sirve: Finaliza esa escucha de evento.
Qué pasaría si se quita: Error de sintaxis.

Línea 47: document.addEventListener('keydown', function(e) {
Qué hace exactamente: Escucha cuando el usuario presiona una tecla.
Con qué se conecta: Con todo el documento HTML.
Para qué sirve: Detectar la tecla Escape.
Qué pasaría si se quita: Escape no cerraría modales.

Línea 48: if (e.key === 'Escape') {
Qué hace exactamente: Verifica si la tecla presionada fue Escape.
Con qué se conecta: Con el evento keydown.
Para qué sirve: Ejecutar cierre de ventanas flotantes.
Qué pasaría si se quita: Cualquier tecla podría activar el cierre o no habría validación.

Línea 49: if (typeof cerrarNotifPanel === 'function') cerrarNotifPanel();
Qué hace exactamente: Verifica si existe la función cerrarNotifPanel y la ejecuta.
Con qué se conecta: Con la función definida en sidebar.php para cerrar notificaciones.
Para qué sirve: Cierra el panel de notificaciones si está abierto.
Qué pasaría si se quita: Escape cerraría logout, pero no necesariamente notificaciones.

Línea 50: cerrarLogoutModal();
Qué hace exactamente: Cierra el modal de cerrar sesión.
Con qué se conecta: Con cerrarLogoutModal().
Para qué sirve: Ocultar el modal al presionar Escape.
Qué pasaría si se quita: Escape no cerraría el modal de logout.

Línea 51: }
Qué hace exactamente: Cierra el if de Escape.
Con qué se conecta: Con línea 48.
Para qué sirve: Finaliza la condición.
Qué pasaría si se quita: Error de sintaxis.

Línea 52: });
Qué hace exactamente: Cierra el evento keydown.
Con qué se conecta: Con línea 47.
Para qué sirve: Finaliza la escucha del teclado.
Qué pasaría si se quita: Error de sintaxis.

Líneas 54 a 59: Comentario de animación de escritura
Qué hace exactamente: Explica que se agrega la clase typing-active cuando el usuario escribe en inputs, textareas o selects.
Con qué se conecta: Con la clase CSS typing-active y la animación typingPulse.
Para qué sirve: Documenta el efecto visual de borde pulsante.
Qué pasaría si se quita: El efecto seguiría funcionando, pero sería menos claro para el programador.

Línea 60: (function() {
Qué hace exactamente: Inicia una función anónima autoejecutable.
Con qué se conecta: Con el bloque de animación de escritura.
Para qué sirve: Encapsular variables y evitar contaminar el ámbito global.
Qué pasaría si se quita: Habría que llamar manualmente la función o el código quedaría mal estructurado.

Línea 61: let _typingTimer = null;
Qué hace exactamente: Declara una variable para guardar el temporizador.
Con qué se conecta: Con clearTimeout() y setTimeout().
Para qué sirve: Controla cuándo quitar la clase typing-active.
Qué pasaría si se quita: No se podría cancelar el temporizador anterior correctamente.

Línea 62: document.addEventListener('input', function(e) {
Qué hace exactamente: Escucha cualquier evento de escritura/cambio en la página.
Con qué se conecta: Con inputs, textareas y selects.
Para qué sirve: Detectar cuando el usuario escribe o modifica un campo.
Qué pasaría si se quita: La animación de escritura no se activaría.

Línea 63: const el = e.target;
Qué hace exactamente: Guarda el elemento que disparó el evento.
Con qué se conecta: Con el input, textarea o select donde el usuario escribió.
Para qué sirve: Aplicar la clase typing-active al elemento correcto.
Qué pasaría si se quita: No se sabría qué campo recibió el input.

Línea 64: if (!['INPUT', 'TEXTAREA', 'SELECT'].includes(el.tagName)) return;
Qué hace exactamente: Verifica que el evento venga de un input, textarea o select.
Con qué se conecta: Con el elemento el.
Para qué sirve: Evita aplicar la animación a otros elementos.
Qué pasaría si se quita: Podría intentar animar elementos que no son campos de formulario.

Línea 65: el.classList.remove('typing-active');
Qué hace exactamente: Quita la clase typing-active antes de volverla a agregar.
Con qué se conecta: Con la clase CSS typing-active.
Para qué sirve: Reiniciar la animación cada vez que el usuario escribe.
Qué pasaría si se quita: La animación podría no reiniciarse correctamente.

Línea 66: void el.offsetWidth;
Qué hace exactamente: Fuerza un reflow del navegador.
Con qué se conecta: Con el motor de renderizado CSS.
Para qué sirve: Reiniciar visualmente la animación CSS.
Qué pasaría si se quita: Puede que la animación no se reproduzca de nuevo en cada escritura.

Línea 67: el.classList.add('typing-active');
Qué hace exactamente: Agrega la clase typing-active al campo.
Con qué se conecta: Con CSS que define la animación.
Para qué sirve: Activa el efecto visual de escritura.
Qué pasaría si se quita: No se vería la animación.

Línea 68: clearTimeout(_typingTimer);
Qué hace exactamente: Cancela el temporizador anterior.
Con qué se conecta: Con _typingTimer.
Para qué sirve: Evita quitar la clase demasiado pronto si el usuario sigue escribiendo.
Qué pasaría si se quita: La animación podría desaparecer antes de tiempo.

Línea 69: _typingTimer = setTimeout(function() {
Qué hace exactamente: Crea un nuevo temporizador.
Con qué se conecta: Con la variable _typingTimer.
Para qué sirve: Programar que la clase typing-active se quite después de 700 ms.
Qué pasaría si se quita: La clase podría quedarse activa permanentemente.

Línea 70: el.classList.remove('typing-active');
Qué hace exactamente: Quita la clase de animación.
Con qué se conecta: Con el campo que recibió escritura.
Para qué sirve: Detener el efecto visual después de que el usuario deja de escribir.
Qué pasaría si se quita: El campo podría quedarse con animación activa.

Línea 71: }, 700);
Qué hace exactamente: Define que el temporizador dura 700 milisegundos.
Con qué se conecta: Con setTimeout().
Para qué sirve: Esperar un pequeño tiempo antes de quitar la animación.
Qué pasaría si se quita: El setTimeout quedaría incompleto.

Línea 72: }, true);
Qué hace exactamente: Cierra el evento input y activa captura con true.
Con qué se conecta: Con document.addEventListener().
Para qué sirve: Permite detectar el evento en fase de captura.
Qué pasaría si se quita: Error de sintaxis o cambio en el comportamiento del evento.

Línea 73: })();
Qué hace exactamente: Cierra y ejecuta inmediatamente la función anónima.
Con qué se conecta: Con la línea 60.
Para qué sirve: Activa la lógica de animación apenas carga la página.
Qué pasaría si se quita: La función no se ejecutaría.

Línea 74: </script>
Qué hace exactamente: Cierra el bloque JavaScript.
Con qué se conecta: Con <script> de la línea 23.
Para qué sirve: Finaliza el código JS.
Qué pasaría si se quita: El navegador podría interpretar mal el resto del documento.

Línea 75: </body>
Qué hace exactamente: Cierra el cuerpo del documento HTML.
Con qué se conecta: Con <body> abierto en sidebar.php.
Para qué sirve: Finaliza todo el contenido visible de la página.
Qué pasaría si se quita: El HTML quedaría incompleto.

Línea 76: </html>
Qué hace exactamente: Cierra el documento HTML.
Con qué se conecta: Con <html lang="es"> abierto en sidebar.php.
Para qué sirve: Indica el final completo de la página.
Qué pasaría si se quita: El documento HTML quedaría formalmente incompleto.

Conclusión:
footer.php completa la estructura que empieza en sidebar.php. Cierra el contenido principal, agrega el modal de confirmación para cerrar sesión, controla el menú lateral, maneja el cierre de sesión con confirmación y añade una animación visual cuando el usuario escribe en campos de formulario.