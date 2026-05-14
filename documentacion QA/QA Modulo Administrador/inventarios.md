Líneas 1 a 15:
Qué hace exactamente: Abren PHP y documentan el módulo de inventarios.
Con qué se conecta: Con models/Inventario.php y controllers/InventarioController.php.
Para qué sirve: Explica que el módulo tiene dos pestañas: herramientas e insumos.
Qué pasaría si se quita: El código puede funcionar, pero se pierde la explicación general.

Líneas 16 a 19:
Qué hace exactamente: Inician sesión y validan que el usuario sea ADMINISTRADOR.
Con qué se conecta: Con $_SESSION.
Para qué sirve: Protege el módulo de inventarios.
Qué pasaría si se quita: Usuarios no autorizados podrían gestionar inventario.

Líneas 21 a 22:
Qué hace exactamente: Importan conexión y modelo Inventario.
Con qué se conecta: Con database.php e Inventario.php.
Para qué sirve: Permiten consultar herramientas, insumos y resumen.
Qué pasaría si se quita: No habría acceso a datos de inventario.

Líneas 24 a 30:
Qué hace exactamente: Crean conexión, modelo, pestaña activa y cargan resumen, herramientas e insumos.
Con qué se conecta: Con $model->resumen(), listarHerramientas() y listarInsumos().
Para qué sirve: Prepara toda la información para mostrar el módulo.
Qué pasaría si se quita: Las tablas y tarjetas quedarían vacías.

Líneas 32 a 36:
Qué hace exactamente: Configuran título, módulo activo, CSS y cargan sidebar.
Con qué se conecta: Con includes/sidebar.php.
Para qué sirve: Mantener el diseño del panel administrativo.
Qué pasaría si se quita: La página perdería layout y estilos comunes.

Líneas 39 a 45:
Qué hace exactamente: Muestran la cabecera “Gestión de Inventarios”.
Con qué se conecta: Con clases mod-header, mod-titulo y mod-subtitulo.
Para qué sirve: Presentar el módulo.
Qué pasaría si se quita: El usuario no vería título ni descripción.

Líneas 47 a 65:
Qué hace exactamente: Muestran tarjetas resumen de herramientas disponibles, mantenimiento, dañadas e insumos en alerta.
Con qué se conecta: Con $resumen.
Para qué sirve: Mostrar indicadores rápidos del inventario.
Qué pasaría si se quita: Se perdería visión general del estado de bodegas.

Líneas 67 a 77:
Qué hace exactamente: Crean pestañas para herramientas e insumos.
Con qué se conecta: Con $_GET['tab'] y la variable $tab.
Para qué sirve: Permite alternar entre Bodega 1 y Bodega 2.
Qué pasaría si se quita: No se podría cambiar fácilmente entre herramientas e insumos.

Líneas 79 a 156:
Qué hace exactamente: Renderizan la pestaña de herramientas.
Con qué se conecta: Con $herramientas.
Para qué sirve: Muestra tabla de herramientas con foto, ID, nombre, cantidad, estado, fecha y acciones.
Qué pasaría si se quita: No se podrían consultar herramientas.

Líneas 91 a 96:
Qué hace exactamente: Muestran encabezado de herramientas y botón “+ Registrar Herramienta”.
Con qué se conecta: Con abrirModalHerramienta().
Para qué sirve: Permite abrir el formulario para registrar herramientas.
Qué pasaría si se quita: No habría acceso visual al registro de herramientas.

Líneas 101 a 116:
Qué hace exactamente: Construyen encabezados de la tabla de herramientas.
Con qué se conecta: Con columnas de herramienta.
Para qué sirve: Organizar los datos visibles.
Qué pasaría si se quita: La tabla perdería estructura.

Líneas 117 a 151:
Qué hace exactamente: Recorren herramientas y muestran cada fila.
Con qué se conecta: Con $h['id_herramienta'], $h['nombre'], $h['cantidad_total'], $h['estado'], $h['foto_referencia'].
Para qué sirve: Mostrar herramientas registradas y sus acciones.
Qué pasaría si se quita: No aparecerían registros.

Líneas 123 a 133:
Qué hace exactamente: Calculan badge de estado y ruta de foto.
Con qué se conecta: Con estado y foto_referencia.
Para qué sirve: Mostrar visualmente si está disponible, en labor, mantenimiento o dañada.
Qué pasaría si se quita: El estado sería menos claro y la foto no se cargaría.

Líneas 139 a 148:
Qué hace exactamente: Crean botones editar y eliminar herramienta.
Con qué se conecta: Con editarHerramienta() y confirmarEliminarHerramienta().
Para qué sirve: Permiten modificar o borrar herramientas.
Qué pasaría si se quita: No habría acciones CRUD desde la tabla.

Líneas 158 a 235:
Qué hace exactamente: Renderizan la pestaña de insumos.
Con qué se conecta: Con $insumos.
Para qué sirve: Muestra tabla de insumos con stock, unidad, mínimo, vencimiento, estado y acciones.
Qué pasaría si se quita: No se podrían consultar insumos.

Líneas 172 a 191:
Qué hace exactamente: Construyen encabezados de la tabla de insumos.
Con qué se conecta: Con columnas del modelo Inventario.
Para qué sirve: Organizar datos del inventario de insumos.
Qué pasaría si se quita: La tabla perdería claridad.

Líneas 192 a 229:
Qué hace exactamente: Recorren cada insumo y calculan si está en alerta.
Con qué se conecta: Con stock_actual y cantidad_minima.
Para qué sirve: Identificar si el stock está crítico.
Qué pasaría si se quita: No se mostrarían alertas de stock.

Líneas 220 a 228:
Qué hace exactamente: Crean botones editar y eliminar insumo.
Con qué se conecta: Con editarInsumo() y confirmarEliminarInsumo().
Para qué sirve: Permiten modificar o borrar insumos.
Qué pasaría si se quita: No habría acciones CRUD para insumos.

Líneas 237 a 292:
Qué hace exactamente: Crean el modal para registrar o editar herramienta.
Con qué se conecta: Con formHerramienta, hAccion, hId y submitHerramienta().
Para qué sirve: Permite crear o editar herramientas con foto.
Qué pasaría si se quita: No habría formulario emergente para herramientas.

Líneas 294 a 352:
Qué hace exactamente: Crean el modal para registrar o editar insumo.
Con qué se conecta: Con formInsumo, iAccion, iId y submitInsumo().
Para qué sirve: Permite crear o editar insumos con datos de stock y foto.
Qué pasaría si se quita: No habría formulario emergente para insumos.

Líneas 354 a 368:
Qué hace exactamente: Crean modal de confirmación para eliminar.
Con qué se conecta: Con confirmarEliminarHerramienta(), confirmarEliminarInsumo() y cerrarModalEliminar().
Para qué sirve: Evita eliminaciones accidentales.
Qué pasaría si se quita: La eliminación sería menos segura.

Líneas 370 a 379:
Qué hace exactamente: Crean modal para ver foto ampliada.
Con qué se conecta: Con verFoto() y cerrarModalFoto().
Para qué sirve: Permite ampliar imágenes de herramientas e insumos.
Qué pasaría si se quita: Las fotos solo se verían pequeñas en la tabla.

Líneas 384 a 521:
Qué hace exactamente: Definen estilos CSS propios.
Con qué se conecta: Con clases de fotos, upload, modales y responsive.
Para qué sirve: Da diseño al módulo, previsualización de fotos y modales.
Qué pasaría si se quita: La interfaz perdería diseño y usabilidad.

Línea 528:
Qué hace exactamente: Define la constante CTRL con la ruta del controlador.
Con qué se conecta: Con InventarioController.php.
Para qué sirve: Centraliza la ruta de fetch().
Qué pasaría si se quita: Las peticiones AJAX no sabrían a dónde enviar datos.

Líneas 532 a 544:
Qué hace exactamente: Definen mostrarMsg() y recargar().
Con qué se conecta: Con mensajes de formularios y location.reload().
Para qué sirve: Mostrar feedback y actualizar la vista.
Qué pasaría si se quita: El usuario no vería resultados claros de las acciones.

Líneas 546 a 588:
Qué hace exactamente: Manejan previsualización, limpieza y carga de fotos existentes.
Con qué se conecta: Con inputs file, previews y contenedores de foto.
Para qué sirve: Permite ver la imagen antes de enviarla.
Qué pasaría si se quita: No habría vista previa de imágenes.

Líneas 591 a 599:
Qué hace exactamente: Abren y cierran el modal de foto ampliada.
Con qué se conecta: Con modalFoto, fotoAmpliada y tituloFoto.
Para qué sirve: Mostrar imagen grande.
Qué pasaría si se quita: El clic en fotos no tendría efecto.

Líneas 603 a 672:
Qué hace exactamente: Manejan abrir, editar, cerrar y enviar herramienta.
Con qué se conecta: Con formHerramienta y InventarioController.php.
Para qué sirve: Gestionan CRUD de herramientas vía fetch.
Qué pasaría si se quita: No se podrían registrar ni editar herramientas desde la interfaz.

Líneas 676 a 690:
Qué hace exactamente: Preparan eliminación de herramienta.
Con qué se conecta: Con modalEliminar y btnConfirmarEliminar.
Para qué sirve: Configuran qué herramienta se eliminará.
Qué pasaría si se quita: El botón eliminar no funcionaría correctamente.

Líneas 695 a 766:
Qué hace exactamente: Manejan abrir, editar, cerrar y enviar insumo.
Con qué se conecta: Con formInsumo e InventarioController.php.
Para qué sirve: Gestionan CRUD de insumos vía fetch.
Qué pasaría si se quita: No se podrían registrar ni editar insumos.

Líneas 768 a 790:
Qué hace exactamente: Preparan eliminación de insumo y cierre del modal eliminar.
Con qué se conecta: Con btnConfirmarEliminar y modalEliminar.
Para qué sirve: Permiten eliminar insumos con confirmación.
Qué pasaría si se quita: El botón eliminar insumo no funcionaría.

Líneas 798 a 806:
Qué hace exactamente: Cierran modales al hacer clic fuera.
Con qué se conecta: Con .modal-overlay.
Para qué sirve: Mejora la experiencia de usuario.
Qué pasaría si se quita: Solo se cerrarían con botones específicos.

Línea 809:
Qué hace exactamente: Incluye el footer.
Con qué se conecta: Con includes/footer.php.
Para qué sirve: Cierra el layout administrativo.
Qué pasaría si se quita: Podrían faltar cierres o scripts comunes.

Conclusión:
Este archivo construye el módulo administrativo de inventarios. Maneja herramientas e insumos en dos pestañas, muestra resumen, tablas, fotos, modales de creación/edición/eliminación y se comunica con InventarioController.php mediante fetch.