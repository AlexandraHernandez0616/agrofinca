Este bloque carga los archivos necesarios para que el controlador o vista pueda trabajar con la base de datos y con el modelo Trabajador. La primera línea importa la configuración de conexión desde config/database.php, mientras que la segunda importa la clase Trabajador desde la carpeta models. Se utiliza require_once para evitar inclusiones duplicadas y __DIR__ para construir rutas seguras basadas en la ubicación real del archivo. Si se elimina este bloque, el sistema podría perder acceso a la base de datos o generar errores al intentar usar la clase Trabajador.
___________________________________________________________________________________________________________________________________________________

Este bloque inicializa la conexión a la base de datos, crea una instancia del modelo Trabajador, captura los filtros enviados por la URL mediante GET y obtiene una lista de trabajadores aplicando búsqueda y estado. La variable $db permite que el modelo consulte la base de datos, mientras que $busqueda y $estado permiten filtrar los resultados. Si se elimina este bloque, no se podrá obtener ni mostrar la lista de trabajadores en la vista.

____________________________________________________________________________________________________________________________________________________

Este bloque configura los datos principales de la vista de trabajadores antes de cargar el sidebar. Define el título de la página, el módulo activo para resaltar la opción correspondiente en el menú, el archivo CSS principal y un CSS adicional para estilos específicos del módulo. Luego incluye el archivo sidebar.php, que probablemente utiliza estas variables para construir el layout general de la página. Si se elimina este bloque, la vista podría perder el título, los estilos, la navegación lateral y la marca visual del módulo activo.

_________________________________________________________________________________________________________________________________________________________

Este bloque define el encabezado visual del módulo de trabajadores. Su función es mostrar el título principal “Gestión de Trabajadores” y un subtítulo descriptivo que indica que desde esta sección se pueden consultar y administrar los trabajadores de la finca. Se conecta con las clases CSS mod-header, mod-titulo y mod-subtitulo, encargadas del diseño visual. Si se elimina, la página seguirá funcionando, pero perderá claridad visual, estructura y contexto para el usuario.

________________________________________________________________________________________________________________________________________________________

buscador-- filtro 

Este bloque crea una sección de búsqueda y filtrado para el módulo de trabajadores. El campo de texto permite buscar por nombre, apellido o documento, mientras que el selector permite filtrar por estado. Se conecta con las variables PHP $busqueda y $estado, con las funciones JavaScript filtrarTabla() y filtrarEstado(), y con el método del modelo que lista trabajadores según esos filtros. Si se elimina este bloque, el usuario perderá la posibilidad de buscar y filtrar trabajadores desde la interfaz.

__________________________________________________________________________________________________________________________________________________________
<!-- TABLA -->
Este bloque crea la tabla principal del módulo de trabajadores. Muestra los datos obtenidos desde la variable $lista, valida si no hay resultados, recorre cada trabajador y genera una fila con nombre, apellido, documento, EPS, RH, estado, fecha de registro y acciones. También agrega atributos data-busqueda y data-estado para permitir filtros desde JavaScript, y usa un botón que llama a verDetalle() para mostrar información detallada del trabajador. Si se elimina este bloque, el módulo perderá la visualización principal de trabajadores y las acciones asociadas a cada registro.
____________________________________________________________________________________________________________________________________________________________

<!-- MODAL VER DETALLE -->
Este bloque define el modal de detalle del trabajador. Su función es mostrar en una ventana emergente la información seleccionada desde la tabla, como nombre, apellido, documento, EPS, RH, estado y fecha de ingreso. Se conecta con la función JavaScript verDetalle(), que llena dinámicamente los campos del modal, y con cerrarModal('modalVer'), que permite cerrarlo. Si se elimina este bloque, el usuario ya no podrá visualizar el detalle completo de un trabajador desde la tabla.

_____________________________________________________________________________________________________________________________________________________________

La función filtrarTabla(q) permite filtrar dinámicamente la tabla de trabajadores según el texto escrito en el buscador y el estado seleccionado en el filtro. Se conecta con el input inputBusqueda, el selector filtroEstado, la tabla tablaTrabajadores y los atributos data-busqueda y data-estado de cada fila. Si se elimina esta función, el buscador dejará de filtrar la tabla y el usuario perderá la capacidad de encontrar trabajadores rápidamente desde la interfaz.

__________________________________________________________________________________________________________________________________________________________

La función filtrarEstado() se encarga de actualizar la tabla cuando el usuario cambia el filtro de estado. Obtiene el texto actual del buscador inputBusqueda y llama nuevamente a filtrarTabla(q), que combina el filtro por texto y el filtro por estado. Se conecta con el selector filtroEstado, el input de búsqueda y la función filtrarTabla(). Si se elimina esta función, el filtro por estado dejará de actualizar la tabla automáticamente.

___________________________________________________________________________________________________________________________________________________________

La función verDetalle() recibe la información de un trabajador seleccionado desde la tabla y la carga dinámicamente dentro del modal de detalle. Llena los campos de nombre, apellido, documento, EPS, RH, estado y fecha de ingreso, asignando además una clase visual al estado mediante badges. Finalmente, muestra el modal agregando la clase modal-visible. Si se elimina esta función, el botón de ver detalle dejará de abrir el modal y el usuario no podrá consultar la información completa del trabajador desde la tabla.

____________________________________________________________________________________________________________________________________________________

Este bloque permite cerrar los modales del sistema. La función cerrarModal(id) oculta un modal específico eliminando la clase modal-visible, mientras que el segundo bloque agrega a todos los elementos .modal-overlay la capacidad de cerrarse cuando el usuario hace clic sobre el fondo externo del modal. Se conecta con los modales HTML, con los botones de cierre y con la clase CSS modal-visible. Si se elimina este bloque, los modales podrían abrirse, pero no cerrarse correctamente desde el botón ni al hacer clic fuera del contenido.

_______________________________________________________________________________________________________________________________________________________

Este bloque incluye el archivo footer.php dentro de la vista actual. Su función es cargar el pie de página del sistema, cerrar correctamente la estructura HTML del layout y posiblemente importar scripts generales usados por la interfaz. Se conecta con la carpeta includes, con el layout principal iniciado en archivos como sidebar.php o header.php, y con los estilos o scripts compartidos del dashboard. Si se elimina, la página podría quedar sin cierres HTML, sin footer visual o sin funciones JavaScript comunes.



Líneas 1 a 14:
Qué hace exactamente: Abren PHP y documentan el módulo de trabajadores.
Con qué se conecta: Con models/Trabajador.php.
Para qué sirve: Explica que esta vista solo consulta trabajadores y no los registra directamente.
Qué pasaría si se quita: Se pierde documentación importante.

Líneas 15 a 18:
Qué hace exactamente: Inician sesión y validan rol ADMINISTRADOR.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Protege la vista.
Qué pasaría si se quita: Usuarios no autorizados podrían ver trabajadores.

Líneas 20 a 21:
Qué hace exactamente: Importan conexión y modelo Trabajador.
Con qué se conecta: Con Database y Trabajador.php.
Para qué sirve: Permiten consultar trabajadores.
Qué pasaría si se quita: La tabla no tendría datos.

Líneas 23 a 27:
Qué hace exactamente: Crean conexión, modelo, leen filtros GET y listan trabajadores.
Con qué se conecta: Con $_GET['q'], $_GET['estado'] y $model->listar().
Para qué sirve: Cargar trabajadores filtrados.
Qué pasaría si se quita: No se mostrarían trabajadores.

Líneas 29 a 37:
Qué hace exactamente: Configuran título, módulo activo, CSS y cargan sidebar.
Con qué se conecta: Con includes/sidebar.php.
Para qué sirve: Mantener el layout administrativo.
Qué pasaría si se quita: La vista perdería estructura.
Nota: En este archivo las líneas 29 a 36 están repetidas dos veces con los mismos valores. No rompe el sistema, pero es código duplicado.

Líneas 40 a 46:
Qué hace exactamente: Muestran cabecera del módulo.
Con qué se conecta: Con clases mod-header.
Para qué sirve: Presenta “Gestión de Trabajadores”.
Qué pasaría si se quita: No habría encabezado.

Líneas 48 a 61:
Qué hace exactamente: Crean buscador y filtro por estado.
Con qué se conecta: Con filtrarTabla() y filtrarEstado().
Para qué sirve: Buscar por nombre, apellido o documento y filtrar ACTIVO, En labor o Inactivo.
Qué pasaría si se quita: No habría filtros.

Líneas 64 a 126:
Qué hace exactamente: Construyen tabla de trabajadores.
Con qué se conecta: Con $lista.
Para qué sirve: Muestra nombre, apellido, documento, EPS, RH, estado, fecha y acciones.
Qué pasaría si se quita: No se podrían consultar trabajadores.

Líneas 82 a 89:
Qué hace exactamente: Calculan clase del badge según estado del trabajador.
Con qué se conecta: Con $t['estado_trabajador'].
Para qué sirve: Mostrar visualmente activo, en labor o inactivo.
Qué pasaría si se quita: Los estados no tendrían color distintivo.

Líneas 91 a 106:
Qué hace exactamente: Pintan datos de cada trabajador.
Con qué se conecta: Con nombres, apellidos, documento, eps, rh, estado_trabajador y fecha_ingreso.
Para qué sirve: Mostrar información laboral del trabajador.
Qué pasaría si se quita: La tabla no tendría contenido.

Líneas 107 a 120:
Qué hace exactamente: Crean botón de ver detalle.
Con qué se conecta: Con verDetalle().
Para qué sirve: Abre modal con información del trabajador.
Qué pasaría si se quita: No se podría ver detalle.

Líneas 129 a 136:
Qué hace exactamente: Crean modal de detalle del trabajador.
Con qué se conecta: Con campos verNombres, verApellidos, verDocumento, verEps, verRh, verEstado y verFecha.
Para qué sirve: Mostrar información completa en ventana emergente.
Qué pasaría si se quita: El botón 👁 no tendría dónde mostrar datos.

Líneas 138 a 145:
Qué hace exactamente: Definen filtrarTabla(q).
Con qué se conecta: Con inputBusqueda, filtroEstado y data-busqueda.
Para qué sirve: Filtrar filas por texto y estado.
Qué pasaría si se quita: El buscador no funcionaría.

Líneas 147 a 149:
Qué hace exactamente: Definen filtrarEstado(val).
Con qué se conecta: Con inputBusqueda y filtrarTabla().
Para qué sirve: Reaplica filtro cuando cambia el estado.
Qué pasaría si se quita: El select de estado no filtraría.

Líneas 151 a 160:
Qué hace exactamente: Definen verDetalle().
Con qué se conecta: Con modalVer y campos del detalle.
Para qué sirve: Llena y abre el modal con datos del trabajador.
Qué pasaría si se quita: El botón de ojo no funcionaría.

Líneas 162 a 164:
Qué hace exactamente: Definen cerrarModal().
Con qué se conecta: Con modalVer.
Para qué sirve: Cerrar el modal.
Qué pasaría si se quita: El botón Cerrar no funcionaría.

Línea 170:
Qué hace exactamente: Incluye footer común.
Con qué se conecta: Con includes/footer.php.
Para qué sirve: Cierra el layout administrativo.
Qué pasaría si se quita: Puede faltar cierre visual o scripts comunes.

Conclusión:
Este archivo muestra la vista administrativa de trabajadores. Se conecta con Trabajador.php para listar trabajadores y permite buscarlos, filtrarlos por estado y ver detalles. No permite registrar trabajadores directamente, porque los trabajadores se crean desde la aprobación de solicitudes.