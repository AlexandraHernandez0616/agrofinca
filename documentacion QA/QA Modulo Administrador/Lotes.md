Este bloque protege el acceso a una página administrativa. Inicia la sesión, verifica que exista un usuario autenticado y confirma que su rol sea ADMINISTRADOR. Si el usuario no cumple estas condiciones, lo redirige al login y detiene la ejecución del archivo con exit. Si se elimina este bloque, usuarios no autorizados podrían acceder a secciones restringidas del sistema.

_________________________________________________________________________________________________________________________________________________________________________
coneccion base de datos 
Este bloque carga los archivos necesarios para trabajar con el módulo de lotes. Primero incluye la configuración de la base de datos desde config/database.php, permitiendo crear la conexión al sistema. Luego importa el modelo Lote, que contiene la lógica para consultar, registrar, actualizar o administrar los lotes. Se usa require_once para evitar cargas duplicadas y __DIR__ para construir rutas seguras según la ubicación real del archivo. Si se elimina este bloque, el sistema podría perder acceso a la base de datos o generar errores al intentar usar la clase Lote.

_____________________________________________________________________________________________________________________________________________________________________________
24-25
Este bloque inicializa la conexión a la base de datos y crea una instancia del modelo Lote. La variable $db almacena la conexión generada por la clase Database, mientras que $model permite acceder a los métodos del modelo para gestionar los lotes del sistema. Si se elimina este bloque, el módulo no podrá consultar ni administrar la información de los lotes en la base de datos.

_____________________________________________________________________________________________________________________________________________________________________________
Datos para las 3 pestañas
Este bloque obtiene desde el modelo Lote la información necesaria para construir la vista del módulo de lotes. La variable $resumen guarda datos estadísticos generales, $lotes almacena la lista principal de lotes, $lotes_cultivos contiene los lotes relacionados con cultivos y $lotes_produccion contiene los lotes relacionados con producción. Se conecta con el modelo Lote, la base de datos y las secciones visuales donde se muestran estadísticas, tablas o reportes. Si se elimina este bloque, la vista no tendrá datos para mostrar los lotes, cultivos asociados ni producción por lote.
_____________________________________________________________________________________________________________________________________________________________________________
// Detalle al hacer clic en un lote (pestaña cultivos o producción)
Este bloque controla la navegación interna del módulo de lotes mediante parámetros enviados por la URL. Define qué pestaña está activa, obtiene el lote seleccionado y, según la pestaña actual, consulta los cultivos o la producción asociados a ese lote. Se conecta con el modelo Lote, con los métodos cultivosPorLote() y produccionPorLote(), y con las secciones visuales de cultivos y producción. Si se elimina este bloque, la vista no podrá mostrar detalles específicos por lote según la pestaña seleccionada.



Líneas 1 a 15:
Qué hace exactamente: Abren PHP y documentan el módulo Lotes y Producción.
Con qué se conecta: Con models/Lote.php.
Para qué sirve: Explica las tres pestañas: lotes, cultivos por lote y producción por lote.
Qué pasaría si se quita: Se pierde contexto del archivo.

Líneas 16 a 19:
Qué hace exactamente: Inician sesión y validan rol ADMINISTRADOR.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Protege el módulo.
Qué pasaría si se quita: Usuarios no autorizados podrían acceder.

Líneas 21 a 22:
Qué hace exactamente: Importan conexión y modelo Lote.
Con qué se conecta: Con database.php y Lote.php.
Para qué sirve: Permiten consultar lotes, cultivos y producción.
Qué pasaría si se quita: La vista no podría cargar datos.

Líneas 24 a 25:
Qué hace exactamente: Crean conexión y modelo.
Con qué se conecta: Con Database y Lote.
Para qué sirve: Permite llamar métodos del modelo.
Qué pasaría si se quita: No habría acceso a datos de lotes.

Líneas 28 a 31:
Qué hace exactamente: Cargan resumen, lotes, lotes con cultivos y lotes con producción.
Con qué se conecta: Con métodos resumen(), listar(), listarConCultivos() y listarConProduccion().
Para qué sirve: Alimentan las tres pestañas.
Qué pasaría si se quita: Las pestañas quedarían sin datos.

Líneas 34 a 37:
Qué hace exactamente: Leen tab y lote desde GET y cargan detalle si corresponde.
Con qué se conecta: Con $_GET['tab'], $_GET['lote'], cultivosPorLote() y produccionPorLote().
Para qué sirve: Permite entrar al detalle de un lote.
Qué pasaría si se quita: Las vistas de detalle no funcionarían.

Líneas 39 a 43:
Qué hace exactamente: Configuran layout y cargan sidebar.
Con qué se conecta: Con includes/sidebar.php.
Para qué sirve: Mantener diseño administrativo.
Qué pasaría si se quita: La vista perdería menú y estilos.

Líneas 46 a 52:
Qué hace exactamente: Muestran cabecera del módulo.
Con qué se conecta: Con clases de diseño.
Para qué sirve: Presentar “Lotes y Producción”.
Qué pasaría si se quita: No habría título principal.

Líneas 54 a 68:
Qué hace exactamente: Crean pestañas de navegación.
Con qué se conecta: Con la variable $tab.
Para qué sirve: Permiten cambiar entre Lotes, Cultivos por Lote y Producción por Lote.
Qué pasaría si se quita: No habría navegación entre secciones.

Líneas 72 a 128:
Qué hace exactamente: Renderizan pestaña Lotes.
Con qué se conecta: Con $resumen y $lotes.
Para qué sirve: Muestra tarjetas resumen y tabla de lotes.
Qué pasaría si se quita: No se vería el listado principal de lotes.

Líneas 76 a 91:
Qué hace exactamente: Muestran tarjetas de total de lotes, extensión total y lotes por cultivo.
Con qué se conecta: Con $resumen['total_lotes'], extension_total y por_cultivo.
Para qué sirve: Dar visión general de lotes.
Qué pasaría si se quita: Se pierden estadísticas rápidas.

Líneas 94 a 127:
Qué hace exactamente: Construyen tabla de lotes.
Con qué se conecta: Con $lotes.
Para qué sirve: Muestra nombre, ubicación, extensión, cultivo, producción total y fecha.
Qué pasaría si se quita: No se podrían consultar lotes.

Líneas 130 a 219:
Qué hace exactamente: Renderizan pestaña Cultivos por Lote.
Con qué se conecta: Con $detalle_cult y $lotes_cultivos.
Para qué sirve: Muestra tarjetas de lotes o detalle de variedades de un lote.
Qué pasaría si se quita: No se podría consultar cultivos por lote.

Líneas 133 a 177:
Qué hace exactamente: Si hay lote seleccionado, muestra detalle del lote y tabla de variedades.
Con qué se conecta: Con cultivosPorLote().
Para qué sirve: Ver variedades, cantidad de plantas y estado de salud.
Qué pasaría si se quita: El detalle de cultivos no funcionaría.

Líneas 180 a 219:
Qué hace exactamente: Si no hay lote seleccionado, muestra tarjetas de lotes.
Con qué se conecta: Con $lotes_cultivos.
Para qué sirve: Permite seleccionar un lote para ver cultivos.
Qué pasaría si se quita: No habría entrada al detalle.

Líneas 222 a 285:
Qué hace exactamente: Renderizan pestaña Producción por Lote.
Con qué se conecta: Con $detalle_prod y $lotes_produccion.
Para qué sirve: Muestra producción total por lote o registros de producción.
Qué pasaría si se quita: No se podría consultar producción por lote.

Líneas 286 a 303:
Qué hace exactamente: Definen estilos propios.
Con qué se conecta: Con tarjetas, badges, tabs y detalle.
Para qué sirve: Dar diseño al módulo.
Qué pasaría si se quita: La vista se vería básica.

Línea 305:
Qué hace exactamente: Incluye footer común.
Con qué se conecta: Con includes/footer.php.
Para qué sirve: Cierra layout.
Qué pasaría si se quita: Puede faltar estructura final.

Conclusión:
Este archivo muestra la vista administrativa de lotes, cultivos y producción. No usa AJAX; carga datos directamente desde Lote.php y permite navegar entre tres pestañas usando parámetros GET.