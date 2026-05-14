Líneas 1 a 6: Comentario de documentación
Qué hace exactamente: Explica que este archivo es views/admin/styles/modulos.css y contiene estilos compartidos para módulos del administrador.
Con qué se conecta: Con vistas como mayordomos.php, trabajadores.php, lotes.php, inventarios.php, tarifas.php, pagos.php, reportes.php y otras.
Para qué sirve: Documentar que este CSS se carga además de dashboard.css.
Qué pasaría si se quita: El CSS funciona, pero se pierde claridad sobre su propósito.

Línea 8: Comentario Cabecera del módulo
Qué hace exactamente: Marca la sección de estilos para encabezados de módulos.
Con qué se conecta: Con .mod-header, .mod-titulo y .mod-subtitulo.
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: No afecta el diseño.

Líneas 9 a 16: .mod-header
Qué hace exactamente: Organiza la cabecera del módulo con flex, separación, margen inferior y ajuste responsive.
Con qué se conecta: Con los encabezados de las vistas admin.
Para qué sirve: Permite poner título/subtítulo a la izquierda y botones a la derecha.
Qué pasaría si se quita: Las cabeceras podrían verse desordenadas.

Línea 17: .mod-titulo
Qué hace exactamente: Define tamaño, grosor, color y margen del título.
Con qué se conecta: Con h1 o títulos de módulo.
Para qué sirve: Dar estilo uniforme a títulos como “Gestión de Trabajadores”.
Qué pasaría si se quita: Los títulos usarían estilos por defecto.

Línea 18: .mod-subtitulo
Qué hace exactamente: Define tamaño, color y margen del subtítulo.
Con qué se conecta: Con descripciones debajo del título.
Para qué sirve: Mostrar explicaciones secundarias de forma suave.
Qué pasaría si se quita: Los subtítulos perderían estilo.

Línea 20: Comentario Botón primario
Qué hace exactamente: Marca la sección del botón principal.
Con qué se conecta: Con .btn-primary.
Para qué sirve: Organizar el CSS.
Qué pasaría si se quita: No afecta.

Líneas 21 a 32: .btn-primary
Qué hace exactamente: Estiliza botones principales con fondo verde, texto blanco, padding, radio y transición.
Con qué se conecta: Con botones como “+ Nueva Tarifa”, “Registrar”, “Generar Liquidación”.
Para qué sirve: Mantener botones de acción principal con el mismo diseño.
Qué pasaría si se quita: Los botones principales perderían estilo.

Línea 33: .btn-primary:hover
Qué hace exactamente: Oscurece el verde al pasar el mouse.
Con qué se conecta: Con botones primarios.
Para qué sirve: Dar interacción visual.
Qué pasaría si se quita: El botón no tendría efecto hover.

Línea 35: Comentario Buscador
Qué hace exactamente: Marca la sección de búsqueda y filtros.
Con qué se conecta: Con .buscador-wrap, .buscador y .select-filtro.
Para qué sirve: Organizar estilos de filtros.
Qué pasaría si se quita: No afecta.

Líneas 36 a 38: .buscador-wrap
Qué hace exactamente: Agrega margen inferior al contenedor del buscador.
Con qué se conecta: Con los bloques de búsqueda de las vistas.
Para qué sirve: Separar filtros de la tabla.
Qué pasaría si se quita: El buscador quedaría pegado a otros elementos.

Líneas 39 a 43: .buscador-con-filtro
Qué hace exactamente: Alinea buscador y select en una fila con separación.
Con qué se conecta: Con módulos que tienen input de búsqueda y filtros.
Para qué sirve: Mostrar filtros ordenados horizontalmente.
Qué pasaría si se quita: Los filtros podrían quedar apilados o mal alineados.

Líneas 44 a 57: .buscador y focus
Qué hace exactamente: Define ancho, alto, borde, padding, tamaño, color, fondo y borde verde al enfocar.
Con qué se conecta: Con inputs de búsqueda.
Para qué sirve: Dar estilo uniforme a los campos de búsqueda.
Qué pasaría si se quita: Los buscadores se verían como inputs básicos.

Líneas 59 a 69: .select-filtro
Qué hace exactamente: Estiliza select de filtros con altura, borde, padding, fondo, cursor y ancho mínimo.
Con qué se conecta: Con filtros de estado, tipo, método, etc.
Para qué sirve: Hacer que los selects combinen con los inputs.
Qué pasaría si se quita: Los selects tendrían estilo nativo del navegador.

Línea 71: Comentario Tabla
Qué hace exactamente: Marca la sección de tablas.
Con qué se conecta: Con .tabla-wrap y .tabla.
Para qué sirve: Organizar el CSS.
Qué pasaría si se quita: No afecta.

Líneas 72 a 80: .tabla-wrap
Qué hace exactamente: Crea contenedor blanco con borde, radio, overflow oculto y sombra.
Con qué se conecta: Con tablas de los módulos administrativos.
Para qué sirve: Encerrar las tablas dentro de una tarjeta visual.
Qué pasaría si se quita: Las tablas no tendrían contenedor elegante.

Líneas 81 a 85: .tabla
Qué hace exactamente: Define ancho completo, border-collapse y tamaño de fuente.
Con qué se conecta: Con las tablas de registros.
Para qué sirve: Hacer que la tabla ocupe todo el ancho y no tenga espacios entre bordes.
Qué pasaría si se quita: La tabla podría verse con espacios o tamaño inconsistente.

Líneas 86 a 90: .tabla thead tr
Qué hace exactamente: Da fondo gris claro y borde inferior al encabezado.
Con qué se conecta: Con filas del thead.
Para qué sirve: Diferenciar encabezados de datos.
Qué pasaría si se quita: El encabezado no se distinguiría tanto.

Líneas 91 a 98: .tabla th
Qué hace exactamente: Define padding, alineación, grosor, color y tamaño de encabezados.
Con qué se conecta: Con columnas de tablas.
Para qué sirve: Dar legibilidad a títulos de columnas.
Qué pasaría si se quita: Los encabezados se verían básicos.

Líneas 99 a 104: .tabla td
Qué hace exactamente: Define padding, color y borde inferior de celdas.
Con qué se conecta: Con datos de cada fila.
Para qué sirve: Separar visualmente los registros.
Qué pasaría si se quita: Las filas se verían pegadas.

Línea 105: .tabla tbody tr:last-child td
Qué hace exactamente: Quita borde inferior a la última fila.
Con qué se conecta: Con la última fila de cada tabla.
Para qué sirve: Evitar doble borde al final.
Qué pasaría si se quita: La última fila tendría borde.

Línea 106: .tabla tbody tr:hover
Qué hace exactamente: Cambia fondo al pasar el mouse por una fila.
Con qué se conecta: Con filas de tablas.
Para qué sirve: Ayudar al usuario a seguir visualmente la fila.
Qué pasaría si se quita: No habría efecto hover.

Líneas 107 a 111: .tabla-vacia
Qué hace exactamente: Centra y suaviza el texto cuando no hay registros.
Con qué se conecta: Con filas que dicen “No hay registros”.
Para qué sirve: Mostrar estados vacíos con diseño claro.
Qué pasaría si se quita: El mensaje vacío se vería como celda normal.

Línea 108: Comentario Badges
Qué hace exactamente: Marca sección de etiquetas visuales.
Con qué se conecta: Con .badge y variantes.
Para qué sirve: Organizar estilos.
Qué pasaría si se quita: No afecta.

Líneas 109 a 116: .badge
Qué hace exactamente: Define forma general de badges: inline-block, padding, radio, tamaño y peso.
Con qué se conecta: Con estados de trabajadores, liquidaciones, tarifas y otros módulos.
Para qué sirve: Mostrar estados como pequeñas etiquetas.
Qué pasaría si se quita: Los badges perderían forma.

Líneas 117 a 119: .badge-activo, .badge-inactivo, .badge-labor
Qué hace exactamente: Define colores para estados activo, inactivo y en labor.
Con qué se conecta: Con trabajadores y usuarios.
Para qué sirve: Diferenciar estados visualmente.
Qué pasaría si se quita: Los estados se verían iguales.

Líneas 121 a 128: .badge-cultivo
Qué hace exactamente: Estiliza etiquetas de cultivo con fondo amarillo suave.
Con qué se conecta: Con lotes y cultivos.
Para qué sirve: Mostrar tipo de cultivo como badge.
Qué pasaría si se quita: El cultivo aparecería como texto normal.

Línea 130: Comentario Botones de acción
Qué hace exactamente: Marca estilos de botones dentro de tablas.
Con qué se conecta: Con .acciones, .btn-icono y .link-ver.
Para qué sirve: Organizar el archivo.
Qué pasaría si se quita: No afecta.

Líneas 131 a 135: .acciones
Qué hace exactamente: Organiza botones de acción en fila.
Con qué se conecta: Con columnas de acciones en tablas.
Para qué sirve: Alinear botones de ver, editar, eliminar.
Qué pasaría si se quita: Los botones podrían quedar mal alineados.

Líneas 136 a 146: .btn-icono y hover
Qué hace exactamente: Quita fondo y borde del botón icono, define cursor, tamaño, padding y hover.
Con qué se conecta: Con botones de ojo, lápiz, papelera, etc.
Para qué sirve: Mostrar acciones compactas dentro de tablas.
Qué pasaría si se quita: Los botones se verían como botones normales.

Líneas 148 a 154: .link-ver y hover
Qué hace exactamente: Estiliza enlaces de ver detalle en verde y subraya al pasar mouse.
Con qué se conecta: Con enlaces tipo “Ver”.
Para qué sirve: Indicar acción secundaria.
Qué pasaría si se quita: El link se vería básico.

Línea 151: Comentario Modales
Qué hace exactamente: Marca la sección de ventanas emergentes.
Con qué se conecta: Con .modal-overlay y .modal.
Para qué sirve: Organizar estilos.
Qué pasaría si se quita: No afecta.

Líneas 152 a 162: .modal-overlay
Qué hace exactamente: Crea fondo oscuro fijo de pantalla completa para modales.
Con qué se conecta: Con modales de crear, editar, ver y eliminar.
Para qué sirve: Mostrar la ventana emergente encima de la página.
Qué pasaría si se quita: Los modales no tendrían overlay.

Líneas 163 a 165: .modal-overlay.modal-visible
Qué hace exactamente: Cambia display a flex cuando el modal debe mostrarse.
Con qué se conecta: Con JavaScript que agrega modal-visible.
Para qué sirve: Mostrar/ocultar modales.
Qué pasaría si se quita: Los modales no aparecerían.

Líneas 166 a 176: .modal
Qué hace exactamente: Define caja blanca, radio, padding, ancho máximo, altura máxima, scroll y sombra.
Con qué se conecta: Con formularios y detalles en ventanas emergentes.
Para qué sirve: Dar estructura visual a los modales.
Qué pasaría si se quita: El modal perdería diseño.

Líneas 177 a 180: .modal-titulo
Qué hace exactamente: Estiliza título del modal.
Con qué se conecta: Con títulos como “Registrar”, “Editar”, “Detalle”.
Para qué sirve: Dar jerarquía visual.
Qué pasaría si se quita: El título se vería normal.

Línea 181: Comentario Formulario dentro del modal
Qué hace exactamente: Marca la sección de formularios.
Con qué se conecta: Con .form-grid-2, .form-group, inputs y botones.
Para qué sirve: Organizar el CSS.
Qué pasaría si se quita: No afecta.

Líneas 182 a 186: .form-grid-2
Qué hace exactamente: Crea formulario en dos columnas.
Con qué se conecta: Con formularios de modales.
Para qué sirve: Ahorrar espacio y ordenar campos.
Qué pasaría si se quita: Los campos no se organizarían en grid.

Líneas 187 a 192: .form-group
Qué hace exactamente: Organiza label e input en columna con separación.
Con qué se conecta: Con cada campo del formulario.
Para qué sirve: Mantener formularios ordenados.
Qué pasaría si se quita: Labels e inputs podrían quedar pegados.

Líneas 193 a 197: .form-group label
Qué hace exactamente: Estiliza etiquetas de formulario.
Con qué se conecta: Con label de cada input.
Para qué sirve: Mostrar nombres de campos con peso y color.
Qué pasaría si se quita: Los labels se verían por defecto.

Líneas 198 a 209: .form-group input y focus
Qué hace exactamente: Define altura, borde, radio, padding, fuente, color y borde verde al enfocar.
Con qué se conecta: Con inputs de formularios.
Para qué sirve: Unificar diseño de campos.
Qué pasaría si se quita: Los inputs se verían básicos.

Líneas 211 a 225: .checkbox-label y checkbox
Qué hace exactamente: Estiliza etiquetas con checkbox y color verde del check.
Con qué se conecta: Con campos booleanos como activo.
Para qué sirve: Hacer checkboxes más claros y clicables.
Qué pasaría si se quita: Los checkboxes se verían por defecto.

Líneas 227 a 244: .modal-acciones y .btn-cancelar
Qué hace exactamente: Organiza botones del modal y estiliza botón cancelar.
Con qué se conecta: Con botones “Cancelar”, “Guardar”, “Registrar”.
Para qué sirve: Mantener acciones del modal ordenadas.
Qué pasaría si se quita: Los botones podrían quedar desalineados.

Línea 246: Comentario Mensajes del formulario
Qué hace exactamente: Marca la sección de mensajes.
Con qué se conecta: Con .msg-form, .msg-ok y .msg-error.
Para qué sirve: Organizar estilos.
Qué pasaría si se quita: No afecta.

Líneas 247 a 254: .msg-form
Qué hace exactamente: Define estilo base de mensajes de formulario.
Con qué se conecta: Con contenedores de mensajes en modales.
Para qué sirve: Mostrar errores o confirmaciones con padding y radio.
Qué pasaría si se quita: Los mensajes se verían sin formato.

Líneas 255 a 256: .msg-ok y .msg-error
Qué hace exactamente: Define colores para mensajes exitosos y errores.
Con qué se conecta: Con JavaScript que asigna estas clases.
Para qué sirve: Diferenciar visualmente resultado correcto o fallido.
Qué pasaría si se quita: Los mensajes no tendrían colores por tipo.

Línea 258: Comentario Detalle
Qué hace exactamente: Marca estilos de modal de detalle.
Con qué se conecta: Con .detalle-grid y .detalle-item.
Para qué sirve: Organizar.
Qué pasaría si se quita: No afecta.

Líneas 259 a 264: .detalle-grid
Qué hace exactamente: Crea una cuadrícula de dos columnas para detalles.
Con qué se conecta: Con modales de ver información.
Para qué sirve: Mostrar datos en orden y no en una sola columna larga.
Qué pasaría si se quita: El detalle se vería menos organizado.

Líneas 265 a 269: .detalle-item
Qué hace exactamente: Organiza etiqueta y valor en columna.
Con qué se conecta: Con cada dato del modal.
Para qué sirve: Separar visualmente campos del detalle.
Qué pasaría si se quita: Los datos podrían quedar confusos.

Líneas 270 a 276: .detalle-label
Qué hace exactamente: Estiliza etiquetas pequeñas en mayúscula.
Con qué se conecta: Con nombres de campos del detalle.
Para qué sirve: Diferenciar título del valor.
Qué pasaría si se quita: El detalle perdería jerarquía.

Línea 278: Comentario Pestañas
Qué hace exactamente: Marca sección de tabs.
Con qué se conecta: Con lotes.php.
Para qué sirve: Organizar estilos de pestañas.
Qué pasaría si se quita: No afecta.

Líneas 279 a 285: .tabs-wrap
Qué hace exactamente: Crea contenedor de pestañas con borde inferior.
Con qué se conecta: Con pestañas de lotes.
Para qué sirve: Separar visualmente navegación por secciones.
Qué pasaría si se quita: Las pestañas no tendrían barra inferior.

Líneas 286 a 297: .tab y hover
Qué hace exactamente: Define padding, fuente, color, borde inferior transparente y hover.
Con qué se conecta: Con enlaces de pestañas.
Para qué sirve: Mostrar pestañas clicables.
Qué pasaría si se quita: Las pestañas se verían como enlaces normales.

Líneas 298 a 301: .tab-activo
Qué hace exactamente: Cambia color y borde inferior del tab activo.
Con qué se conecta: Con la pestaña seleccionada.
Para qué sirve: Indicar qué sección está activa.
Qué pasaría si se quita: No se sabría qué pestaña está abierta.

Línea 302: Comentario Tarjetas resumen de lotes
Qué hace exactamente: Marca sección de resumen de lotes.
Con qué se conecta: Con lotes.php.
Para qué sirve: Organizar.
Qué pasaría si se quita: No afecta.

Líneas 303 a 309: .lotes-resumen
Qué hace exactamente: Crea grid de cuatro columnas para tarjetas de lotes.
Con qué se conecta: Con tarjetas estadísticas de lotes.
Para qué sirve: Mostrar resumen de lotes ordenado.
Qué pasaría si se quita: Las tarjetas se apilarían sin control.

Líneas 310 a 318: .lote-card-stat y variantes de color
Qué hace exactamente: Estiliza tarjetas de resumen y sus colores verde, azul y amarillo.
Con qué se conecta: Con tarjetas de lotes.
Para qué sirve: Mostrar métricas visualmente diferenciadas.
Qué pasaría si se quita: Las tarjetas perderían diseño.

Líneas 319 a 320: .lote-stat-label y .lote-stat-valor
Qué hace exactamente: Define estilo de etiqueta y número del resumen.
Con qué se conecta: Con textos de tarjetas de lotes.
Para qué sirve: Diferenciar descripción y valor.
Qué pasaría si se quita: Las métricas se verían planas.

Línea 322: Comentario Tarjetas de lotes
Qué hace exactamente: Marca sección de tarjetas clicables de lotes.
Con qué se conecta: Con lotes.php.
Para qué sirve: Organizar.
Qué pasaría si se quita: No afecta.

Líneas 323 a 327: .lotes-cards-grid y .lote-card-link
Qué hace exactamente: Crea grid de dos columnas y quita estilos a enlaces de tarjeta.
Con qué se conecta: Con tarjetas de cultivos/producción por lote.
Para qué sirve: Mostrar lotes como tarjetas clicables.
Qué pasaría si se quita: Las tarjetas podrían verse como enlaces comunes.

Líneas 328 a 341: .lote-card y hover
Qué hace exactamente: Estiliza cada tarjeta de lote con fondo, borde, radio, padding, cursor, transición y hover.
Con qué se conecta: Con cards de lotes.
Para qué sirve: Dar apariencia interactiva.
Qué pasaría si se quita: Las tarjetas perderían interacción visual.

Líneas 342 a 368: Elementos internos de tarjeta de lote
Qué hace exactamente: Organiza encabezado, pie, nombre, metadatos, variedades, flecha e icono.
Con qué se conecta: Con contenido interno de tarjetas de lotes.
Para qué sirve: Mantener información de lote alineada y clara.
Qué pasaría si se quita: El contenido se vería desordenado.

Línea 369: Comentario Detalle de lote
Qué hace exactamente: Marca sección de detalle.
Con qué se conecta: Con detalle de cultivos y producción por lote.
Para qué sirve: Organizar.
Qué pasaría si se quita: No afecta.

Líneas 370 a 380: .detalle-lote-header y .detalle-prod-header
Qué hace exactamente: Crea cabecera visual para detalle de lote y variante azul para producción.
Con qué se conecta: Con vistas de detalle en lotes.php.
Para qué sirve: Destacar información principal del lote.
Qué pasaría si se quita: El detalle perdería encabezado visual.

Líneas 381 a 397: Textos y badges del detalle
Qué hace exactamente: Estiliza nombre, metadatos, etiqueta, valor y color de badge.
Con qué se conecta: Con datos de lote seleccionado.
Para qué sirve: Mostrar resumen del lote de forma clara.
Qué pasaría si se quita: El detalle se vería plano.

Líneas 398 a 400: .link-volver y hover
Qué hace exactamente: Estiliza el enlace para volver.
Con qué se conecta: Con enlaces “Volver”.
Para qué sirve: Dar navegación secundaria clara.
Qué pasaría si se quita: El enlace se vería por defecto.

Líneas 401 a 414: Responsive
Qué hace exactamente: Ajusta formularios, botones, detalles, resumen, tarjetas y filtros en pantallas pequeñas.
Con qué se conecta: Con módulos admin en móviles.
Para qué sirve: Hacer las vistas adaptables.
Qué pasaría si se quita: Los módulos podrían verse mal en celulares.

Líneas 416 a 419: Badges de estado de liquidación
Qué hace exactamente: Define colores para pendiente, generada y liquidada.
Con qué se conecta: Con autorizaciones.php y liquidaciones.
Para qué sirve: Mostrar estados de liquidación con colores claros.
Qué pasaría si se quita: Los estados se verían sin diferenciación.

Línea 421: Comentario Animación de escritura
Qué hace exactamente: Marca sección de typing indicator.
Con qué se conecta: Con footer.php.
Para qué sirve: Organizar la animación.
Qué pasaría si se quita: No afecta.

Líneas 422 a 426: @keyframes typingPulse
Qué hace exactamente: Define animación de borde verde pulsante.
Con qué se conecta: Con campos que reciben la clase typing-active.
Para qué sirve: Mostrar efecto cuando el usuario escribe.
Qué pasaría si se quita: No habría animación.

Líneas 427 a 433: input.typing-active, textarea.typing-active, select.typing-active
Qué hace exactamente: Aplica la animación, borde verde y quita outline.
Con qué se conecta: Con JavaScript de footer.php.
Para qué sirve: Activar visualmente la animación en formularios de módulos.
Qué pasaría si se quita: La clase typing-active no produciría efecto visible.

Conclusión:
modulos.css es la hoja de estilos compartida para las vistas internas del administrador. Se conecta con módulos como trabajadores, mayordomos, lotes, inventarios, tarifas, pagos, liquidaciones y reportes. Define cabeceras, botones, buscadores, tablas, badges, modales, formularios, detalles, pestañas, tarjetas de lotes, responsive y animación de escritura. Complementa a dashboard.css porque dashboard.css da la estructura general y modulos.css da estilos específicos para los módulos.