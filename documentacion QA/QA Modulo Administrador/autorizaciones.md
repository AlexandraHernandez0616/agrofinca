Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete PHP del servidor.
Para qué sirve: Permite ejecutar sesiones, validaciones, conexión a base de datos y carga del modelo antes de mostrar el HTML.
Qué pasaría si se quita: El servidor no interpretaría correctamente las instrucciones PHP iniciales.

Líneas 2 a 19: Comentario de documentación
Qué hace exactamente: Explica que este archivo pertenece a views/admin/autorizaciones.php y que maneja la gestión de liquidaciones temporales.
Con qué se conecta: Con models/AutorizacionDelegada.php y controllers/AutorizacionDelegadaController.php.
Para qué sirve: Documenta las funciones principales: tarjetas resumen, filtros, tabla, modal para otorgar permiso, modal para ver registros y acción de revocar.
Qué pasaría si se quita: El sistema funcionaría igual, pero el archivo sería más difícil de entender para otro programador.

Línea 20: session_start();
Qué hace exactamente: Inicia o reanuda la sesión del usuario.
Con qué se conecta: Con $_SESSION['id_usuario'] y $_SESSION['rol'].
Para qué sirve: Permite saber si el usuario inició sesión y si tiene rol ADMINISTRADOR.
Qué pasaría si se quita: No se podrían leer correctamente los datos de sesión y la protección del módulo podría fallar.

Línea 21: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'ADMINISTRADOR') {
Qué hace exactamente: Verifica si no hay usuario logueado o si el rol no es ADMINISTRADOR.
Con qué se conecta: Con las variables de sesión creadas al iniciar sesión.
Para qué sirve: Protege esta vista para que solo un administrador pueda entrar.
Qué pasaría si se quita: Cualquier usuario podría intentar entrar al módulo de autorizaciones temporales.

Línea 22: header("Location: ../../views/usuarios/login.php"); exit;
Qué hace exactamente: Redirige al login y detiene la ejecución del archivo.
Con qué se conecta: Con la vista de login ubicada en views/usuarios/login.php.
Para qué sirve: Evita que usuarios no autorizados vean el contenido del módulo.
Qué pasaría si se quita: Aunque se detecte un usuario no autorizado, el archivo podría seguir cargando.

Línea 23: }
Qué hace exactamente: Cierra el bloque if de validación de sesión y rol.
Con qué se conecta: Con la línea 21.
Para qué sirve: Finaliza la condición de seguridad.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 25: require_once __DIR__ . '/../../config/database.php';
Qué hace exactamente: Importa el archivo de conexión a la base de datos.
Con qué se conecta: Con config/database.php y la clase Database.
Para qué sirve: Permite crear la conexión PDO en la línea 28.
Qué pasaría si se quita: La clase Database no estaría disponible y fallaría la conexión.

Línea 26: require_once __DIR__ . '/../../models/AutorizacionDelegada.php';
Qué hace exactamente: Importa el modelo AutorizacionDelegada.
Con qué se conecta: Con models/AutorizacionDelegada.php.
Para qué sirve: Permite consultar resumen, lista de autorizaciones y mayordomos.
Qué pasaría si se quita: No se podría crear new AutorizacionDelegada($db).

Línea 28: $db = (new Database())->conectar();
Qué hace exactamente: Crea una instancia de Database y llama al método conectar().
Con qué se conecta: Con la base de datos mediante PDO.
Para qué sirve: Obtiene la conexión que usará el modelo.
Qué pasaría si se quita: No habría conexión para consultar autorizaciones.

Línea 29: $model = new AutorizacionDelegada($db);
Qué hace exactamente: Crea el modelo de autorizaciones delegadas usando la conexión.
Con qué se conecta: Con models/AutorizacionDelegada.php.
Para qué sirve: Permite llamar métodos del modelo desde esta vista.
Qué pasaría si se quita: No se podrían obtener datos para mostrar el módulo.

Línea 30: $resumen = $model->resumen();
Qué hace exactamente: Consulta los conteos generales de permisos.
Con qué se conecta: Con el método resumen() del modelo.
Para qué sirve: Alimenta las tarjetas: total, activas, expiradas y revocadas.
Qué pasaría si se quita: Las tarjetas resumen no tendrían datos.

Línea 31: $lista = $model->listar();
Qué hace exactamente: Obtiene la lista de permisos registrados.
Con qué se conecta: Con el método listar() del modelo.
Para qué sirve: Llena la tabla principal de autorizaciones.
Qué pasaría si se quita: La tabla no tendría registros para mostrar.

Línea 32: $mayordomos = $model->listarMayordomos();
Qué hace exactamente: Consulta los mayordomos disponibles.
Con qué se conecta: Con el método listarMayordomos() del modelo y la tabla usuario.
Para qué sirve: Llena el select del modal “Otorgar Permiso”.
Qué pasaría si se quita: No habría opciones de mayordomos al crear un permiso.

Línea 34: $titulo_pagina = 'Liquidaciones Temporales - AgroFinca';
Qué hace exactamente: Define el título de la página.
Con qué se conecta: Con includes/sidebar.php, que probablemente usa esta variable en el layout.
Para qué sirve: Mostrar el título correcto del módulo.
Qué pasaría si se quita: El layout podría no mostrar el título correcto.

Línea 35: $modulo_activo = 'autorizaciones';
Qué hace exactamente: Define cuál módulo está activo.
Con qué se conecta: Con el sidebar.
Para qué sirve: Permite marcar visualmente el menú de autorizaciones como seleccionado.
Qué pasaría si se quita: El menú lateral podría no resaltar este módulo.

Línea 36: $css_path = 'styles/dashboard.css';
Qué hace exactamente: Define la hoja CSS principal.
Con qué se conecta: Con el layout/sidebar.
Para qué sirve: Cargar estilos generales del dashboard.
Qué pasaría si se quita: La vista podría perder estilos generales.

Línea 37: $css_extra = 'styles/modulos.css';
Qué hace exactamente: Define una hoja CSS adicional.
Con qué se conecta: Con el layout/sidebar.
Para qué sirve: Cargar estilos específicos de módulos administrativos.
Qué pasaría si se quita: Tablas, botones, badges o modales podrían verse mal.

Línea 38: require_once __DIR__ . '/includes/sidebar.php';
Qué hace exactamente: Carga el sidebar y probablemente la estructura principal del dashboard.
Con qué se conecta: Con views/admin/includes/sidebar.php.
Para qué sirve: Inserta menú lateral, topbar y estructura visual común.
Qué pasaría si se quita: La página quedaría sin layout administrativo.

Línea 39: ?>
Qué hace exactamente: Cierra temporalmente el bloque PHP para comenzar a escribir HTML.
Con qué se conecta: Con el HTML que empieza después.
Para qué sirve: Permite mezclar PHP con estructura visual.
Qué pasaría si se quita: El HTML podría interpretarse incorrectamente como PHP.

Líneas 41 a 47: Cabecera del módulo
Qué hace exactamente: Muestra el título “Gestión de Liquidaciones Temporales” y una descripción.
Con qué se conecta: Con las clases CSS mod-header, mod-titulo y mod-subtitulo.
Para qué sirve: Presenta visualmente el propósito del módulo al administrador.
Qué pasaría si se quita: El usuario no vería encabezado ni explicación del módulo.

Línea 50: <div class="aut-resumen">
Qué hace exactamente: Abre el contenedor de tarjetas resumen.
Con qué se conecta: Con la clase CSS .aut-resumen.
Para qué sirve: Organiza las tarjetas en una cuadrícula.
Qué pasaría si se quita: Las tarjetas perderían su contenedor principal.

Líneas 51 a 54: Tarjeta “Total Permisos”
Qué hace exactamente: Muestra el total de permisos usando $resumen['total'].
Con qué se conecta: Con el resultado de $model->resumen().
Para qué sirve: Permite ver cuántos permisos temporales existen en total.
Qué pasaría si se quita: No se mostraría el total general.

Líneas 55 a 58: Tarjeta “Activos”
Qué hace exactamente: Muestra la cantidad de permisos activos usando $resumen['activas'].
Con qué se conecta: Con el resumen del modelo.
Para qué sirve: Indica cuántos mayordomos tienen permiso vigente.
Qué pasaría si se quita: El administrador no vería permisos activos rápidamente.

Líneas 59 a 62: Tarjeta “Expirados”
Qué hace exactamente: Muestra permisos vencidos usando $resumen['expiradas'].
Con qué se conecta: Con el resumen del modelo.
Para qué sirve: Permite identificar permisos que ya no están vigentes.
Qué pasaría si se quita: Se pierde una métrica importante de control.

Líneas 63 a 66: Tarjeta “Revocados”
Qué hace exactamente: Muestra permisos revocados usando $resumen['revocadas'].
Con qué se conecta: Con el resumen del modelo.
Para qué sirve: Indica cuántos permisos fueron cancelados manualmente.
Qué pasaría si se quita: No se vería el conteo de permisos revocados.

Línea 67: </div>
Qué hace exactamente: Cierra el contenedor de tarjetas resumen.
Con qué se conecta: Con la línea 50.
Para qué sirve: Finaliza la sección visual de estadísticas.
Qué pasaría si se quita: El HTML quedaría mal estructurado.

Línea 70: <div class="aut-panel">
Qué hace exactamente: Abre el panel principal del módulo.
Con qué se conecta: Con la clase CSS .aut-panel.
Para qué sirve: Agrupa cabecera, filtros, mensaje y tabla.
Qué pasaría si se quita: El contenido principal perdería su caja visual.

Líneas 73 a 76: Cabecera del panel
Qué hace exactamente: Muestra el título “Permisos Otorgados” y el botón “+ Otorgar Permiso”.
Con qué se conecta: Con la función JavaScript abrirModalOtorgar().
Para qué sirve: Permite abrir el formulario para crear un permiso temporal.
Qué pasaría si se quita: El administrador no tendría botón para otorgar permisos desde esta vista.

Líneas 79 a 82: Input de búsqueda
Qué hace exactamente: Crea un campo de texto para buscar por mayordomo.
Con qué se conecta: Con la función JavaScript filtrarTabla().
Para qué sirve: Filtra la tabla en tiempo real mientras el usuario escribe.
Qué pasaría si se quita: No habría búsqueda rápida por mayordomo.

Líneas 83 a 88: Select de filtro por estado
Qué hace exactamente: Crea un filtro con estados ACTIVA, EXPIRADA y REVOCADA.
Con qué se conecta: Con filtrarTabla() y con data-estado de cada fila.
Para qué sirve: Permite mostrar solo permisos según su estado.
Qué pasaría si se quita: No se podrían filtrar autorizaciones por estado.

Línea 92: <div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>
Qué hace exactamente: Crea un contenedor oculto para mensajes globales.
Con qué se conecta: Con la función mostrarMsg().
Para qué sirve: Mostrar mensajes como “permiso revocado” o errores.
Qué pasaría si se quita: El usuario no vería feedback después de acciones.

Líneas 95 a 107: Estructura inicial de la tabla
Qué hace exactamente: Crea la tabla con encabezados: mayordomo, fechas, estado, liquidaciones, autorizado por y acciones.
Con qué se conecta: Con $lista, que contiene las autorizaciones.
Para qué sirve: Mostrar los permisos registrados.
Qué pasaría si se quita: No habría tabla para consultar permisos.

Línea 109: <?php if (empty($lista)): ?>
Qué hace exactamente: Verifica si la lista de permisos está vacía.
Con qué se conecta: Con la variable $lista de la línea 31.
Para qué sirve: Decidir si se muestra mensaje vacío o registros.
Qué pasaría si se quita: La vista no manejaría correctamente el caso sin datos.

Línea 110: <tr><td colspan="7" class="tabla-vacia">No hay permisos registrados</td></tr>
Qué hace exactamente: Muestra un mensaje dentro de la tabla si no hay permisos.
Con qué se conecta: Con el if de la línea 109.
Para qué sirve: Informar al usuario que no hay registros.
Qué pasaría si se quita: La tabla aparecería vacía sin explicación.

Línea 111: <?php else: ?>
Qué hace exactamente: Indica qué hacer si sí existen permisos.
Con qué se conecta: Con el if de la línea 109.
Para qué sirve: Permite entrar al foreach.
Qué pasaría si se quita: El flujo PHP quedaría incompleto.

Línea 112: <?php foreach ($lista as $a): ?>
Qué hace exactamente: Recorre cada autorización guardada en $lista.
Con qué se conecta: Con los datos devueltos por $model->listar().
Para qué sirve: Crear una fila de tabla por cada permiso.
Qué pasaría si se quita: No se mostrarían los permisos registrados.

Líneas 113 a 120: match del estado
Qué hace exactamente: Convierte el estado técnico en clase CSS, etiqueta visible e ícono.
Con qué se conecta: Con $a['estado'] y las clases badge-aut-activa, badge-aut-expirada y badge-aut-revocada.
Para qué sirve: Mostrar estados de forma visual y clara.
Qué pasaría si se quita: No habría color ni texto amigable para el estado.

Líneas 121 a 122: <tr data-busqueda... data-estado...>
Qué hace exactamente: Crea una fila con atributos usados para filtros.
Con qué se conecta: Con la función filtrarTabla().
Para qué sirve: Permite buscar por mayordomo y filtrar por estado desde JavaScript.
Qué pasaría si se quita: Los filtros en tiempo real no funcionarían bien.

Línea 123: <td><strong><?= htmlspecialchars($a['mayordomo']) ?></strong></td>
Qué hace exactamente: Muestra el nombre del mayordomo autorizado.
Con qué se conecta: Con $a['mayordomo'].
Para qué sirve: Identificar a quién pertenece el permiso.
Qué pasaría si se quita: La tabla no mostraría el mayordomo.

Línea 124: <td><?= htmlspecialchars($a['fecha_inicio']) ?></td>
Qué hace exactamente: Muestra la fecha de inicio del permiso.
Con qué se conecta: Con $a['fecha_inicio'].
Para qué sirve: Saber desde cuándo aplica la autorización.
Qué pasaría si se quita: No se vería el inicio del permiso.

Línea 125: <td><?= htmlspecialchars($a['fecha_fin']) ?></td>
Qué hace exactamente: Muestra la fecha final del permiso.
Con qué se conecta: Con $a['fecha_fin'].
Para qué sirve: Saber hasta cuándo dura la autorización.
Qué pasaría si se quita: No se vería el vencimiento del permiso.

Líneas 126 a 130: Badge visual del estado
Qué hace exactamente: Muestra ícono, texto y color del estado.
Con qué se conecta: Con $clsEstado, $iconoEstado y $lblEstado.
Para qué sirve: Ayuda a reconocer rápidamente si está activo, vencido o revocado.
Qué pasaría si se quita: El estado sería menos claro visualmente.

Línea 131: <td><?= (int) $a['total_liquidaciones'] ?></td>
Qué hace exactamente: Muestra cuántas liquidaciones están asociadas al permiso.
Con qué se conecta: Con $a['total_liquidaciones'].
Para qué sirve: Permite ver si ese permiso ya fue usado.
Qué pasaría si se quita: No se vería la cantidad de liquidaciones relacionadas.

Línea 132: <td><?= htmlspecialchars($a['administrador']) ?></td>
Qué hace exactamente: Muestra el administrador que otorgó el permiso.
Con qué se conecta: Con $a['administrador'].
Para qué sirve: Da trazabilidad de quién autorizó.
Qué pasaría si se quita: No se sabría quién otorgó el permiso.

Líneas 133 a 138: Botón “Ver registros”
Qué hace exactamente: Crea un botón que llama a verLiquidaciones().
Con qué se conecta: Con el id_autorizacion y el nombre del mayordomo.
Para qué sirve: Abre un modal con liquidaciones asociadas a ese permiso.
Qué pasaría si se quita: No se podrían consultar las liquidaciones del permiso desde la tabla.

Líneas 140 a 145: Botón “Revocar”
Qué hace exactamente: Muestra el botón de revocar solo si el estado es ACTIVA.
Con qué se conecta: Con confirmarRevocar().
Para qué sirve: Permite cancelar un permiso vigente.
Qué pasaría si se quita: El administrador no podría revocar permisos desde esta vista.

Líneas 146 a 153: Cierres de fila, tabla y panel
Qué hace exactamente: Cierran td, tr, foreach, if, tbody, table, tabla-wrap y panel.
Con qué se conecta: Con las estructuras abiertas antes.
Para qué sirve: Mantener el HTML correctamente organizado.
Qué pasaría si se quita: La tabla o el panel podrían romperse visualmente.

Líneas 156 a 158: Comentario del modal Otorgar Permiso
Qué hace exactamente: Marca el inicio del modal para crear permisos.
Con qué se conecta: Con el bloque HTML del modalOtorgar.
Para qué sirve: Organiza el archivo.
Qué pasaría si se quita: No afecta funcionamiento.

Línea 159: <div class="modal-overlay" id="modalOtorgar">
Qué hace exactamente: Crea el fondo oscuro del modal de otorgar permiso.
Con qué se conecta: Con abrirModalOtorgar() y cerrarModal().
Para qué sirve: Mostrar el formulario emergente.
Qué pasaría si se quita: No habría modal para otorgar permisos.

Líneas 160 a 162: Contenedor, título y mensaje del modal
Qué hace exactamente: Define la caja del modal, el título y el área para mensajes.
Con qué se conecta: Con msgModalOtorgar y mostrarMsg().
Para qué sirve: Mostrar errores o confirmaciones del formulario.
Qué pasaría si se quita: El formulario tendría menos estructura y no mostraría errores dentro del modal.

Línea 164: <form id="formOtorgar" onsubmit="submitOtorgar(event)">
Qué hace exactamente: Crea el formulario para otorgar permiso.
Con qué se conecta: Con submitOtorgar().
Para qué sirve: Envía los datos al controlador sin recargar manualmente.
Qué pasaría si se quita: No habría formulario funcional.

Línea 165: <input type="hidden" name="accion" value="otorgar">
Qué hace exactamente: Envía una acción oculta llamada otorgar.
Con qué se conecta: Con AutorizacionDelegadaController.php.
Para qué sirve: El controlador sabe que debe crear un permiso.
Qué pasaría si se quita: El controlador no sabría qué operación ejecutar.

Líneas 167 a 176: Select de mayordomo
Qué hace exactamente: Muestra una lista de mayordomos obtenidos desde $mayordomos.
Con qué se conecta: Con $model->listarMayordomos().
Para qué sirve: Seleccionar el mayordomo que recibirá el permiso.
Qué pasaría si se quita: No se podría elegir a quién otorgar permiso.

Líneas 177 a 180: Campo fecha inicio
Qué hace exactamente: Crea un input de fecha obligatorio para fecha_inicio.
Con qué se conecta: Con el controlador y la base de datos.
Para qué sirve: Define desde cuándo empieza el permiso.
Qué pasaría si se quita: El permiso no tendría fecha inicial.

Líneas 181 a 184: Campo fecha fin
Qué hace exactamente: Crea un input de fecha obligatorio para fecha_fin.
Con qué se conecta: Con el controlador y la base de datos.
Para qué sirve: Define cuándo termina el permiso.
Qué pasaría si se quita: El permiso no tendría vencimiento.

Líneas 185 a 190: Campo acciones permitidas
Qué hace exactamente: Crea un input para escribir qué acciones puede hacer el mayordomo.
Con qué se conecta: Con acciones_permitidas del formulario.
Para qué sirve: Guardar el alcance del permiso.
Qué pasaría si se quita: No quedaría claro qué puede hacer el mayordomo autorizado.

Líneas 191 a 195: Campo monto máximo
Qué hace exactamente: Crea un input numérico opcional para limitar el monto permitido.
Con qué se conecta: Con monto_maximo del formulario.
Para qué sirve: Permite definir un límite económico para liquidaciones.
Qué pasaría si se quita: El permiso no tendría control de monto máximo.

Líneas 198 a 201: Botones del modal Otorgar
Qué hace exactamente: Muestra botón Cancelar y botón Otorgar Permiso.
Con qué se conecta: Con cerrarModal() y submitOtorgar().
Para qué sirve: Permite cerrar o enviar el formulario.
Qué pasaría si se quita: El usuario no podría cancelar ni enviar fácilmente.

Líneas 202 a 204: Cierre del formulario y modal
Qué hace exactamente: Cierra form, modal y overlay.
Con qué se conecta: Con las etiquetas abiertas en líneas anteriores.
Para qué sirve: Mantener estructura HTML válida.
Qué pasaría si se quita: El modal quedaría mal formado.

Líneas 207 a 218: Modal Ver Liquidaciones
Qué hace exactamente: Define el modal donde se mostrarán las liquidaciones asociadas a un permiso.
Con qué se conecta: Con verLiquidaciones(), tituloLiquidaciones y liquidacionesContenido.
Para qué sirve: Permite consultar registros relacionados sin salir de la página.
Qué pasaría si se quita: El botón “Ver registros” no tendría dónde mostrar la información.

Líneas 221 a 236: Modal Confirmar Revocar
Qué hace exactamente: Define el modal de confirmación antes de revocar un permiso.
Con qué se conecta: Con confirmarRevocar() y btnConfirmarRevocar.
Para qué sirve: Evita revocar permisos por accidente.
Qué pasaría si se quita: La revocación sería menos segura visualmente o no tendría confirmación.

Líneas 242 a 249: CSS .aut-resumen
Qué hace exactamente: Define la cuadrícula de tarjetas resumen.
Con qué se conecta: Con el div class="aut-resumen".
Para qué sirve: Muestra las tarjetas en cuatro columnas con separación.
Qué pasaría si se quita: Las tarjetas podrían verse desordenadas.

Líneas 252 a 258: CSS .aut-panel
Qué hace exactamente: Estiliza el panel principal con fondo blanco, borde, radio, padding y sombra.
Con qué se conecta: Con <div class="aut-panel">.
Para qué sirve: Dar apariencia de tarjeta grande al contenido principal.
Qué pasaría si se quita: El panel perdería diseño visual.

Líneas 259 a 266: CSS .aut-panel-header
Qué hace exactamente: Alinea título y botón del panel usando flex.
Con qué se conecta: Con la cabecera del panel.
Para qué sirve: Pone el título a la izquierda y el botón a la derecha.
Qué pasaría si se quita: La cabecera podría verse desordenada.

Líneas 267 a 272: CSS .aut-panel-titulo
Qué hace exactamente: Define tamaño, grosor, color y margen del título del panel.
Con qué se conecta: Con el h2 “Permisos Otorgados”.
Para qué sirve: Dar estilo consistente al título.
Qué pasaría si se quita: El título tomaría estilos por defecto.

Líneas 275 a 277: CSS badges de estado
Qué hace exactamente: Define colores para permisos activos, expirados y revocados.
Con qué se conecta: Con $clsEstado del match.
Para qué sirve: Mostrar estados con colores diferentes.
Qué pasaría si se quita: Los badges no tendrían colores personalizados.

Líneas 280 a 290: CSS .btn-aut
Qué hace exactamente: Define estilo base de botones de acción.
Con qué se conecta: Con botones “Ver registros” y “Revocar”.
Para qué sirve: Dar borde, tamaño, peso y comportamiento visual.
Qué pasaría si se quita: Los botones se verían sin diseño personalizado.

Líneas 291 a 295: CSS hover y variantes de botones
Qué hace exactamente: Agrega efecto hover y colores específicos para ver registros y revocar.
Con qué se conecta: Con .btn-ver-reg y .btn-revocar.
Para qué sirve: Diferenciar visualmente acciones normales y peligrosas.
Qué pasaría si se quita: Los botones serían menos claros.

Líneas 298 a 301: CSS .liq-tabla
Qué hace exactamente: Da estilo a la tabla de liquidaciones dentro del modal.
Con qué se conecta: Con la tabla creada dinámicamente en verLiquidaciones().
Para qué sirve: Mostrar registros asociados de forma ordenada.
Qué pasaría si se quita: La tabla del modal se vería básica o desordenada.

Líneas 304 a 318: CSS para selects del formulario
Qué hace exactamente: Estiliza los select dentro de form-group.
Con qué se conecta: Con el select de mayordomo y otros selects del módulo.
Para qué sirve: Mantener apariencia uniforme.
Qué pasaría si se quita: Los selects tendrían estilo por defecto del navegador.

Líneas 320 a 332: CSS .select-filtro
Qué hace exactamente: Estiliza los filtros desplegables del módulo.
Con qué se conecta: Con filtroEstado.
Para qué sirve: Hacer consistente el diseño del filtro.
Qué pasaría si se quita: El filtro se vería menos integrado con la interfaz.

Línea 334: .buscador-con-filtro { display: flex; gap: 12px; align-items: center; }
Qué hace exactamente: Organiza buscador y filtro en una misma fila.
Con qué se conecta: Con el contenedor de filtros.
Para qué sirve: Mantener búsqueda y select alineados.
Qué pasaría si se quita: Los filtros podrían quedar mal alineados.

Líneas 336 a 342: Media queries responsive
Qué hace exactamente: Ajustan tarjetas y filtros en pantallas pequeñas.
Con qué se conecta: Con .aut-resumen y .buscador-con-filtro.
Para qué sirve: Mejorar visualización en tablets y celulares.
Qué pasaría si se quita: La vista podría romperse en pantallas pequeñas.

Línea 343: </style>
Qué hace exactamente: Cierra el bloque de estilos CSS.
Con qué se conecta: Con la etiqueta style abierta en línea 242.
Para qué sirve: Finaliza los estilos propios del módulo.
Qué pasaría si se quita: El navegador podría interpretar mal el resto del archivo.

Línea 349: <script>
Qué hace exactamente: Abre el bloque JavaScript.
Con qué se conecta: Con funciones del navegador.
Para qué sirve: Agregar interacción: filtros, modales, fetch y revocación.
Qué pasaría si se quita: No funcionarían las acciones dinámicas.

Línea 350: const CTRL = '../../controllers/AutorizacionDelegadaController.php';
Qué hace exactamente: Guarda la ruta del controlador en una constante.
Con qué se conecta: Con fetch() en submitOtorgar(), verLiquidaciones() y revocar.
Para qué sirve: Evita repetir la ruta del controlador muchas veces.
Qué pasaría si se quita: Las peticiones AJAX no sabrían a qué controlador enviar datos.

Línea 351: const hoy = new Date().toISOString().split('T')[0];
Qué hace exactamente: Calcula la fecha actual en formato YYYY-MM-DD.
Con qué se conecta: Con el campo oInicio.
Para qué sirve: Poner automáticamente la fecha de inicio al abrir el modal.
Qué pasaría si se quita: El campo fecha inicio no se llenaría automáticamente.

Líneas 354 a 361: function mostrarMsg(id, texto, tipo)
Qué hace exactamente: Muestra mensajes de éxito o error en un contenedor HTML.
Con qué se conecta: Con msgGlobal y msgModalOtorgar.
Para qué sirve: Dar feedback al usuario después de una acción.
Qué pasaría si se quita: No se mostrarían mensajes visuales.

Línea 362: function recargar() { setTimeout(() => location.reload(), 800); }
Qué hace exactamente: Recarga la página después de 800 milisegundos.
Con qué se conecta: Con submitOtorgar() y revocar.
Para qué sirve: Actualizar tabla y tarjetas después de cambios.
Qué pasaría si se quita: La vista no se actualizaría automáticamente.

Línea 363: function cerrarModal(id) { document.getElementById(id).classList.remove('modal-visible'); }
Qué hace exactamente: Cierra un modal quitando la clase modal-visible.
Con qué se conecta: Con los botones cancelar/cerrar.
Para qué sirve: Ocultar modales.
Qué pasaría si se quita: Los botones de cerrar modal dejarían de funcionar.

Líneas 366 a 374: function filtrarTabla()
Qué hace exactamente: Filtra las filas según texto escrito y estado seleccionado.
Con qué se conecta: Con inputBusqueda, filtroEstado y data-busqueda/data-estado.
Para qué sirve: Buscar permisos en tiempo real sin recargar.
Qué pasaría si se quita: Los filtros de la tabla no funcionarían.

Líneas 379 a 384: function abrirModalOtorgar()
Qué hace exactamente: Limpia el formulario, pone fecha actual, oculta mensajes y abre el modal.
Con qué se conecta: Con formOtorgar, oInicio, msgModalOtorgar y modalOtorgar.
Para qué sirve: Preparar el formulario para crear un permiso nuevo.
Qué pasaría si se quita: El botón “+ Otorgar Permiso” no abriría correctamente el modal.

Líneas 386 a 407: async function submitOtorgar(e)
Qué hace exactamente: Envía el formulario al controlador mediante fetch POST.
Con qué se conecta: Con AutorizacionDelegadaController.php.
Para qué sirve: Crear un permiso temporal sin recargar inmediatamente la página.
Qué pasaría si se quita: El formulario no enviaría datos por AJAX.

Línea 387: e.preventDefault();
Qué hace exactamente: Evita que el formulario recargue la página de forma tradicional.
Con qué se conecta: Con el evento submit.
Para qué sirve: Permite manejar el envío con JavaScript.
Qué pasaría si se quita: La página podría recargarse antes de procesar el fetch.

Líneas 388 a 389: Deshabilitar botón
Qué hace exactamente: Desactiva el botón y cambia el texto a “Otorgando…”.
Con qué se conecta: Con btnOtorgar.
Para qué sirve: Evitar doble envío.
Qué pasaría si se quita: El usuario podría enviar el formulario varias veces.

Línea 391: const fd = new FormData(e.target);
Qué hace exactamente: Crea un FormData con todos los campos del formulario.
Con qué se conecta: Con formOtorgar.
Para qué sirve: Preparar datos para enviar al controlador.
Qué pasaría si se quita: No habría datos para el fetch.

Líneas 392 a 406: try/catch del envío
Qué hace exactamente: Envía datos, recibe JSON, muestra éxito o error y reactiva botón si falla.
Con qué se conecta: Con fetch(), mostrarMsg(), cerrarModal() y recargar().
Para qué sirve: Controlar correctamente la creación del permiso.
Qué pasaría si se quita: No habría manejo de respuesta ni errores de conexión.

Líneas 412 a 449: async function verLiquidaciones(id, mayordomo)
Qué hace exactamente: Abre el modal de liquidaciones y consulta registros asociados al permiso.
Con qué se conecta: Con AutorizacionDelegadaController.php usando GET.
Para qué sirve: Mostrar liquidaciones vinculadas a una autorización.
Qué pasaría si se quita: El botón “Ver registros” no funcionaría.

Línea 419: const res = await fetch(`${CTRL}?accion=liquidaciones&id=${id}`);
Qué hace exactamente: Envía una petición GET al controlador para pedir liquidaciones de una autorización.
Con qué se conecta: Con AutorizacionDelegadaController.php.
Para qué sirve: Obtener datos relacionados sin recargar.
Qué pasaría si se quita: No se cargarían registros asociados.

Líneas 422 a 440: Construcción dinámica de tabla
Qué hace exactamente: Si hay liquidaciones, genera HTML con trabajador, período, valor y estado.
Con qué se conecta: Con json.liquidaciones y liquidacionesContenido.
Para qué sirve: Mostrar resultados dentro del modal.
Qué pasaría si se quita: El modal no mostraría la tabla de liquidaciones.

Líneas 441 a 448: Mensaje vacío o error
Qué hace exactamente: Muestra mensaje si no hay liquidaciones o si falla la carga.
Con qué se conecta: Con liquidacionesContenido.
Para qué sirve: Dar respuesta clara al usuario.
Qué pasaría si se quita: El modal podría quedarse vacío.

Línea 454: let _idRevocar = null;
Qué hace exactamente: Declara una variable global para guardar el ID del permiso a revocar.
Con qué se conecta: Con confirmarRevocar() y el evento del botón btnConfirmarRevocar.
Para qué sirve: Recordar qué permiso se revocará cuando el usuario confirme.
Qué pasaría si se quita: No se sabría qué autorización revocar.

Líneas 456 a 460: function confirmarRevocar(id, mayordomo)
Qué hace exactamente: Guarda el ID, cambia el título del modal y abre la confirmación.
Con qué se conecta: Con modalRevocar y tituloRevocar.
Para qué sirve: Preparar la revocación con confirmación visual.
Qué pasaría si se quita: El botón Revocar no abriría confirmación.

Líneas 462 a 483: Evento click de btnConfirmarRevocar
Qué hace exactamente: Envía al controlador la acción revocar y el ID del permiso.
Con qué se conecta: Con AutorizacionDelegadaController.php mediante POST.
Para qué sirve: Revocar permisos activos desde la interfaz.
Qué pasaría si se quita: El botón final de revocar no haría nada.

Línea 463: if (!_idRevocar) return;
Qué hace exactamente: Detiene la función si no hay ID guardado.
Con qué se conecta: Con la variable _idRevocar.
Para qué sirve: Evitar enviar una revocación sin permiso seleccionado.
Qué pasaría si se quita: Podría enviarse una petición inválida.

Líneas 467 a 469: FormData para revocar
Qué hace exactamente: Crea datos con accion=revocar e id=_idRevocar.
Con qué se conecta: Con el controlador.
Para qué sirve: Indicar qué operación ejecutar y sobre qué registro.
Qué pasaría si se quita: El controlador no recibiría datos suficientes.

Líneas 471 a 482: try/catch/finally de revocación
Qué hace exactamente: Envía la solicitud, cierra modal, muestra mensaje, recarga si fue exitoso y limpia estado.
Con qué se conecta: Con fetch(), mostrarMsg(), cerrarModal() y recargar().
Para qué sirve: Completar el flujo de revocación.
Qué pasaría si se quita: No habría manejo correcto de revocación ni errores.

Líneas 486 a 490: Cierre de modales al hacer clic fuera
Qué hace exactamente: Agrega evento a cada modal-overlay para cerrarlo si se hace clic fuera del modal.
Con qué se conecta: Con todos los modales de la página.
Para qué sirve: Mejorar la experiencia de usuario.
Qué pasaría si se quita: El usuario solo podría cerrar modales con botones.

Línea 491: </script>
Qué hace exactamente: Cierra el bloque JavaScript.
Con qué se conecta: Con la etiqueta script de la línea 349.
Para qué sirve: Finaliza las funciones del módulo.
Qué pasaría si se quita: El navegador podría interpretar mal el final del archivo.

Línea 493: <?php require_once __DIR__ . '/includes/footer.php'; ?>
Qué hace exactamente: Carga el footer común del panel administrativo.
Con qué se conecta: Con views/admin/includes/footer.php.
Para qué sirve: Cierra la estructura del layout y carga elementos comunes finales.
Qué pasaría si se quita: La página podría quedar sin cierre visual o sin scripts generales del layout.

Conclusión:
Este archivo construye la vista administrativa de Liquidaciones Temporales. Primero protege el acceso para que solo entren administradores, luego conecta con la base de datos y el modelo AutorizacionDelegada para cargar resumen, lista de permisos y mayordomos. Después muestra tarjetas, filtros, tabla, modales y JavaScript para otorgar permisos, ver liquidaciones asociadas y revocar autorizaciones activas mediante fetch hacia AutorizacionDelegadaController.php.