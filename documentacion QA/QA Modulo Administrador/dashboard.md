Validación de acceso por rol
Permite restringir el acceso a una página únicamente a usuarios autenticados con rol de ADMINISTRADOR.
Primero se verifica si existe la variable de sesión id_usuario, la cual indica que el usuario ha iniciado sesión. Luego se valida que el valor de $_SESSION['rol' ] sea exactamente igual a ADMINISTRADOR.
Si alguna de estas condiciones no se cumple, el usuario es redirigido a la página de inicio de sesión mediante header("Location: ..."), y posteriormente se usa exit para detener la ejecución del script.

______________________________________________________________________________________________________________________________________________

Se incluyen los archivos necesarios para el funcionamiento del dashboard.

-database.php: contiene la configuración y conexión a la base de datos.
-AdminDashboardController.php: contiene la lógica del controlador encargado de gestionar la información del panel de administrador.

-Se usa require_once para evitar que los archivos sean incluidos más de una vez.
-La constante __DIR_ permite construir una ruta segura desde la ubicación actual del archivo.

______________________________________________________________________________________________________________________________________________

Primero crea el objeto encargado de la base de datos. Luego abre la conexión. Después crea el controlador del dashboard usando esa conexión. 
Finalmente, obtiene los datos necesarios para mostrar la información en el panel de administrador.

Ese bloque hace que el dashboard tenga datos. Si lo quitas, la página puede cargar incompleta o mostrar errores, porque no tendría conexión a la base de datos ni información para mostrar.

______________________________________________________________________________________________________________________________________________  

Función que convierte una fecha en un tiempo relativo.
Si se elimina esta función, las partes del sistema que la utilicen
para mostrar fechas como "Hace 5 min" o "Hace 2 h" generarán error,
ya que PHP no encontrará la función tiempoRelativo().

______________________________________________________________________________________________________________________________________________ 



Líneas 1 a 7:
Qué hace exactamente: Abren PHP y documentan que este archivo es la vista principal del administrador.
Con qué se conecta: Con el panel administrativo.
Para qué sirve: Identifica el propósito del archivo.
Qué pasaría si se quita: El código puede funcionar, pero pierde documentación.

Línea 8:
Qué hace exactamente: Inicia la sesión.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Permite saber quién está logueado.
Qué pasaría si se quita: No se podrían validar los permisos correctamente.

Líneas 10 a 14:
Qué hace exactamente: Protegen la ruta para que solo entre un ADMINISTRADOR.
Con qué se conecta: Con $_SESSION['id_usuario'] y $_SESSION['rol'].
Para qué sirve: Evita accesos no autorizados al dashboard.
Qué pasaría si se quita: Cualquier usuario podría intentar ver el panel principal.

Líneas 16 a 17:
Qué hace exactamente: Importan database.php y AdminDashboardController.php.
Con qué se conecta: Con la conexión de base de datos y el controlador del dashboard.
Para qué sirve: Permiten obtener todos los datos estadísticos del panel.
Qué pasaría si se quita: No se podrían cargar las estadísticas.

Líneas 19 a 22:
Qué hace exactamente: Crean la conexión, instancian el controlador y obtienen los datos del dashboard.
Con qué se conecta: Con AdminDashboardController::obtenerDatos().
Para qué sirve: Carga trabajadores, lotes, inventarios, producción, alertas y notificaciones.
Qué pasaría si se quita: El dashboard quedaría sin datos dinámicos.

Líneas 24 a 31:
Qué hace exactamente: Declaran la función tiempoRelativo().
Con qué se conecta: Con fechas de alertas o notificaciones.
Para qué sirve: Convierte fechas en textos como “Hace 5 min” o “Hace 2 días”.
Qué pasaría si se quita: Las fechas podrían mostrarse en formato crudo.

Líneas 33 a 42:
Qué hace exactamente: Crean el documento HTML, idioma, metadatos, título, CSS y fuente Inter.
Con qué se conecta: Con styles/dashboard.css y Google Fonts.
Para qué sirve: Prepara la estructura visual del dashboard.
Qué pasaría si se quita: El navegador no tendría estructura HTML correcta o perdería estilos.

Líneas 45 a 64:
Qué hace exactamente: Construyen el sidebar del administrador.
Con qué se conecta: Con rutas como mayordomos.php, trabajadores.php, lotes.php, inventarios.php, pagos.php, reportes.php y bitacora.php.
Para qué sirve: Permite navegar entre módulos administrativos.
Qué pasaría si se quita: El usuario no tendría menú lateral.

Líneas 66 a 94:
Qué hace exactamente: Construyen el contenedor principal y la topbar.
Con qué se conecta: Con toggleSidebar(), toggleNotifPanel(), $_SESSION['username'] y LogoutController.php.
Para qué sirve: Muestra botón de menú, título, rol, notificaciones, perfil y cierre de sesión.
Qué pasaría si se quita: El dashboard perdería navegación superior y opciones de sesión.

Líneas 79 a 87:
Qué hace exactamente: Calculan notificaciones no leídas y muestran badge si existen.
Con qué se conecta: Con $datos['notificaciones'].
Para qué sirve: Avisar al administrador si tiene notificaciones pendientes.
Qué pasaría si se quita: No se mostraría contador de notificaciones.

Líneas 96 a 101:
Qué hace exactamente: Inician el contenido principal y muestran título “Dashboard General”.
Con qué se conecta: Con clases content y page-header.
Para qué sirve: Presenta la vista ejecutiva del sistema.
Qué pasaría si se quita: La página no tendría encabezado principal.

Líneas 103 a 162:
Qué hace exactamente: Muestran la primera fila de tarjetas estadísticas.
Con qué se conecta: Con $datos['trabajadores_registrados'], $datos['trabajadores_activos'], $datos['solicitudes_pendientes'] y $datos['mayordomos_activos'].
Para qué sirve: Resume información de usuarios y personal.
Qué pasaría si se quita: El administrador perdería métricas importantes del personal.

Líneas 164 a 218:
Qué hace exactamente: Muestran la segunda fila de tarjetas.
Con qué se conecta: Con $datos['lotes_registrados'], $datos['insumos_alerta'], $datos['herramientas_mantenimiento'] y $datos['produccion_total'].
Para qué sirve: Resume datos de lotes, inventario y producción.
Qué pasaría si se quita: El dashboard no mostraría indicadores operativos.

Líneas 220 a 264:
Qué hace exactamente: Construyen la sección inferior con alertas del sistema y notificaciones recientes.
Con qué se conecta: Con $datos['alertas'] y $datos['notificaciones'].
Para qué sirve: Muestra eventos recientes o elementos que requieren atención.
Qué pasaría si se quita: El administrador no vería alertas ni avisos recientes.

Líneas 269 a 279:
Qué hace exactamente: Definen toggleSidebar().
Con qué se conecta: Con el botón ☰ y el elemento #sidebar.
Para qué sirve: Permite abrir o cerrar el menú lateral en pantallas pequeñas.
Qué pasaría si se quita: El botón de menú no funcionaría.

Líneas 281 a 299:
Qué hace exactamente: Crean el overlay dinámico de notificaciones.
Con qué se conecta: Con toggleNotifPanel() y renderNotificaciones().
Para qué sirve: Muestra un panel flotante con notificaciones.
Qué pasaría si se quita: La campana no tendría panel visible.

Líneas 300 a 314:
Qué hace exactamente: Definen utilidades JavaScript tiempoRelativo() y escHtml().
Con qué se conecta: Con renderNotificaciones().
Para qué sirve: Formatean fechas y evitan que contenido peligroso se inserte como HTML.
Qué pasaría si se quita: Las notificaciones podrían mostrarse mal o sin protección adecuada.

Líneas 318 a 345:
Qué hace exactamente: Definen renderNotificaciones().
Con qué se conecta: Con $datos['notificaciones'] recibidas por JSON.
Para qué sirve: Dibuja notificaciones dentro del panel flotante.
Qué pasaría si se quita: El panel de notificaciones no mostraría contenido.

Líneas 346 a 356:
Qué hace exactamente: Definen actualizarBadge().
Con qué se conecta: Con la campana de notificaciones.
Para qué sirve: Actualiza o elimina el contador de no leídas.
Qué pasaría si se quita: El contador podría quedar desactualizado.

Líneas 358 a 413:
Qué hace exactamente: Definen cargarNotificaciones() y lógica del panel de notificaciones.
Con qué se conecta: Con el controlador que devuelve notificaciones y con el DOM.
Para qué sirve: Actualiza notificaciones sin recargar la página.
Qué pasaría si se quita: Las notificaciones no se refrescarían dinámicamente.

Línea 417:
Qué hace exactamente: Cierra el HTML.
Con qué se conecta: Con toda la estructura de la página.
Para qué sirve: Finaliza el documento.
Qué pasaría si se quita: El HTML quedaría incompleto.

Conclusión:
Este archivo es el dashboard principal del administrador. Se conecta con AdminDashboardController para cargar métricas generales, alertas y notificaciones. También construye el menú lateral, la barra superior, las tarjetas estadísticas y el sistema dinámico de notificaciones.