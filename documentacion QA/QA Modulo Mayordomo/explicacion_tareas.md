# Documento: tareas.php

Archivo del sistema: views/mayordomo/tareas.php

Formato: explicación línea por línea, separada para copiar y pegar.

Regla aplicada: en “Con qué se conecta” se mencionan otros archivos del sistema o documentos necesarios para que funcione.



Línea 1: <?php
Qué hace exactamente: Abre el modo PHP del archivo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Permitir que el servidor ejecute instrucciones PHP antes de enviar HTML al navegador.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 2: /**
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 3:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 4:  * ARCHIVO: views/mayordomo/tareas.php
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 5:  * PROPÓSITO: Módulo Gestión de Tareas (vista mayordomo)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 6:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 7:  */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 8: session_start();
Qué hace exactamente: Inicia o reanuda la sesión del usuario.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Activar la sesión para validar usuario, rol e información guardada al iniciar sesión.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 9: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Qué hace exactamente: Verifica si existe una sesión válida y si el rol del usuario coincide con MAYORDOMO.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Proteger la vista para que solo el rol correcto pueda usar este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 10:     header("Location: ../../views/usuarios/login.php"); exit;
Qué hace exactamente: Redirige al usuario a otra ruta.
Con qué se conecta en el sistema: Se conecta con views/usuarios/login.php porque redirige allí cuando el usuario no tiene permiso.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 11: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 12: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 13: require_once __DIR__ . '/../../config/database.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 14: require_once __DIR__ . '/../../models/MayordomoTarea.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php porque ese modelo entrega los datos que esta vista muestra.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 15: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 16: $db           = (new Database())->conectar();
Qué hace exactamente: Crea la conexión PDO usando la clase Database.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Crear la conexión a la base de datos que usarán el modelo o las consultas.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 17: $model        = new MayordomoTarea($db);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Crear el modelo que consulta, registra o actualiza datos relacionados con este módulo.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 18: $id_mayordomo = (int) $_SESSION['id_usuario'];
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 19: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 20: $resumen      = $model->resumen($id_mayordomo);
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener datos resumidos para las tarjetas superiores.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 21: $tareas       = $model->listar($id_mayordomo);
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 22: $lotes        = $model->listarLotes();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 23: $trabajadores = $model->listarTrabajadores();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 24: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 25: $titulo_pagina = 'Tareas - AgroFinca';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir el título que usará el layout de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 26: $modulo_activo = 'tareas';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar al sidebar qué opción del menú debe aparecer activa.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 27: $css_extra     = 'styles/modulos.css';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar qué hoja de estilos adicional debe cargarse para este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 28: require_once __DIR__ . '/includes/sidebar.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/sidebar.php, que abre el layout, sidebar, topbar y panel de notificaciones.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 29: ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 30: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 31: <!-- CABECERA -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 32: <div class="mod-header">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 33:   <div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 34:     <h1 class="mod-titulo">Gestión de Tareas</h1>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h1.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 35:     <p class="mod-subtitulo">Crea y asigna tareas a trabajadores</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 36:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 37:   <button class="btn-primary" onclick="abrirModalCrear()">+ Crear Tarea</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (abrirModalCrear()) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 38: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 39: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 40: <!-- TARJETAS RESUMEN -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 41: <div class="tar-resumen-4">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 42:   <div class="lote-card-stat lote-stat-verde">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 43:     <span class="lote-stat-label">Total Tareas</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 44:     <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 45:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 46:   <div class="lote-card-stat lote-stat-amarillo">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 47:     <span class="lote-stat-label">Pendientes</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 48:     <span class="lote-stat-valor"><?= $resumen['pendientes'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 49:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 50:   <div class="lote-card-stat lote-stat-azul">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 51:     <span class="lote-stat-label">En Progreso</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 52:     <span class="lote-stat-valor"><?= $resumen['en_progreso'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 53:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 54:   <div class="lote-card-stat" style="background:#f0fdf4;border:1px solid #bbf7d0;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 55:     <span class="lote-stat-label">Completadas</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 56:     <span class="lote-stat-valor" style="color:#166534;"><?= $resumen['completadas'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 57:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 58: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 59: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 60: <!-- FILTROS -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 61: <div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 62:   <input type="text" id="inputBusqueda" class="buscador"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 63:          placeholder="Buscar por nombre de tarea o lote..."
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 64:          oninput="filtrarTabla()">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (filtrarTabla()) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 65:   <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (filtrarTabla()) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 66:     <option value="">Todos los estados</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 67:     <option value="PENDIENTE">Pendiente</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 68:     <option value="EN_PROGRESO">En progreso</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 69:     <option value="COMPLETADA">Completada</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 70:   </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 71: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 72: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 73: <div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 74: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 75: <!-- TABLA -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 76: <div class="tabla-wrap">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 77:   <table class="tabla" id="tablaTareas">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una tabla para mostrar registros.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 78:     <thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 79:       <tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 80:         <th>Nombre</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 81:         <th>Lote</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 82:         <th>Fecha Inicio</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 83:         <th>Fecha Fin</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 84:         <th>Trabajadores</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 85:         <th>Estado</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 86:         <th>Acciones</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 87:       </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 88:     </thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 89:     <tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 90:       <?php if (empty($tareas)): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 91:         <tr><td colspan="7" class="tabla-vacia">No hay tareas registradas</td></tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 92:       <?php else: ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 93:         <?php foreach ($tareas as $t): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 94:           <?php
Qué hace exactamente: Abre el modo PHP del archivo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Permitir que el servidor ejecute instrucciones PHP antes de enviar HTML al navegador.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 95:             [$clsEstado, $lblEstado] = match($t['estado_tarea']) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 96:               'PENDIENTE'   => ['badge-tarea-pendiente',  'Pendiente'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 97:               'EN_PROGRESO' => ['badge-tarea-progreso',   'En progreso'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 98:               'COMPLETADA'  => ['badge-tarea-completada', 'Completada'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 99:               default       => ['badge-inactivo',          htmlspecialchars($t['estado_tarea'])],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 100:             };
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 101:             $trabajadoresIds = $model->trabajadoresDeTarea((int)$t['id_tarea']);
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 102:           ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 103:           <tr data-busqueda="<?= strtolower(htmlspecialchars(($t['nombre'] ?? '') . ' ' . ($t['lote'] ?? ''))) ?>"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 104:               data-estado="<?= htmlspecialchars($t['estado_tarea']) ?>">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 105:             <td><strong><?= htmlspecialchars($t['nombre']) ?></strong></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 106:             <td><?= htmlspecialchars($t['lote'] ?? '—') ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 107:             <td><?= htmlspecialchars($t['fecha_inicio'] ?? '—') ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 108:             <td><?= htmlspecialchars($t['fecha_fin_estimada'] ?? '—') ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 109:             <td class="tarea-trabajadores-celda"><?= htmlspecialchars($t['trabajadores'] ?? '—') ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 110:             <td><span class="badge <?= $clsEstado ?>"><?= $lblEstado ?></span></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 111:             <td class="acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 112:               <button class="btn-icono" title="Editar"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 113:                 onclick="abrirModalEditar(
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con JavaScript del mismo archivo y con estilos de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 114:                   <?= $t['id_tarea'] ?>,
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 115:                   '<?= addslashes($t['nombre']) ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 116:                   <?= (int)($t['id_lote'] ?? 0) ?>,
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 117:                   '<?= $t['fecha_inicio'] ?? '' ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 118:                   '<?= $t['fecha_fin_estimada'] ?? '' ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 119:                   '<?= $t['estado_tarea'] ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 120:                   '<?= addslashes($t['descripcion'] ?? '') ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 121:                   [<?= implode(',', array_map('intval', $trabajadoresIds)) ?>]
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 122:                 )">✏️</button>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 123:               <?php if ($t['estado_tarea'] === 'PENDIENTE'): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 124:                 <button class="btn-estado btn-estado-progreso"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 125:                   onclick="cambiarEstado(<?= $t['id_tarea'] ?>, 'EN_PROGRESO')">Iniciar</button>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cambiarEstado(<?= $t['id_tarea'] ?>, 'EN_PROGRESO')) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 126:               <?php elseif ($t['estado_tarea'] === 'EN_PROGRESO'): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 127:                 <button class="btn-estado btn-estado-completar"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 128:                   onclick="cambiarEstado(<?= $t['id_tarea'] ?>, 'COMPLETADA')">Completar</button>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cambiarEstado(<?= $t['id_tarea'] ?>, 'COMPLETADA')) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 129:               <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 130:               <?php if ($t['estado_tarea'] === 'PENDIENTE'): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 131:                 <button class="btn-icono" title="Eliminar"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 132:                   onclick="confirmarEliminar(<?= $t['id_tarea'] ?>, '<?= addslashes($t['nombre']) ?>')">🗑️</button>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (confirmarEliminar(<?= $t['id_tarea'] ?>, '<?= addslashes($t['nombre']) ?>')) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 133:               <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 134:             </td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 135:           </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 136:         <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 137:       <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 138:     </tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 139:   </table>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 140: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 141: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 142: <!-- MODAL CREAR -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 143: <div class="modal-overlay" id="modalCrear">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 144:   <div class="modal" style="max-width:620px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 145:     <h2 class="modal-titulo">Crear Tarea</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 146:     <div id="msgModalCrear" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 147:     <form id="formCrear" onsubmit="submitCrear(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitCrear(event)) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 148:       <input type="hidden" name="accion" value="crear">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 149:       <div class="form-grid-2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 150:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 151:           <label for="cNombre">Nombre de la Tarea *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 152:           <input type="text" id="cNombre" name="nombre" placeholder="Ej: Poda de cafetos" maxlength="100" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 153:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 154:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 155:           <label for="cDescripcion">Descripción</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 156:           <textarea id="cDescripcion" name="descripcion" rows="2" class="tarea-textarea" placeholder="Descripción detallada (opcional)"></textarea>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo textarea.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 157:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 158:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 159:           <label for="cLote">Lote *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 160:           <select id="cLote" name="id_lote" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 161:             <option value="">Selecciona un lote</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 162:             <?php foreach ($lotes as $l): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 163:               <option value="<?= $l['id_lote'] ?>"><?= htmlspecialchars($l['nombre']) ?><?= $l['cultivo'] ? ' — ' . htmlspecialchars($l['cultivo']) : '' ?></option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 164:             <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 165:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 166:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 167:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 168:           <label for="cEstado">Estado</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 169:           <select id="cEstado" name="estado_tarea">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 170:             <option value="PENDIENTE">Pendiente</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 171:             <option value="EN_PROGRESO">En progreso</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 172:             <option value="COMPLETADA">Completada</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 173:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 174:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 175:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 176:           <label for="cInicio">Fecha Inicio *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 177:           <input type="date" id="cInicio" name="fecha_inicio" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 178:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 179:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 180:           <label for="cFin">Fecha Fin Estimada</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 181:           <input type="date" id="cFin" name="fecha_fin_estimada">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 182:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 183:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 184:           <label>Trabajadores Asignados</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 185:           <div class="tarea-trabajadores-grid" id="cTrabajadoresGrid">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 186:             <?php foreach ($trabajadores as $tr): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 187:               <label class="tarea-check-label">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 188:                 <input type="checkbox" name="trabajadores[]" value="<?= $tr['id_trabajador'] ?>">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 189:                 <?= htmlspecialchars($tr['nombre_completo']) ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 190:               </label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 191:             <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 192:             <?php if (empty($trabajadores)): ?><p style="font-size:13px;color:#9ca3af;">No hay trabajadores activos.</p><?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 193:           </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 194:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 195:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 196:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 197:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalCrear')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalCrear')) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 198:         <button type="submit" class="btn-primary" id="btnCrear">Crear Tarea</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 199:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 200:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 201:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 202: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 203: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 204: <!-- MODAL EDITAR -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 205: <div class="modal-overlay" id="modalEditar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 206:   <div class="modal" style="max-width:620px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 207:     <h2 class="modal-titulo">Editar Tarea</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 208:     <div id="msgModalEditar" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 209:     <form id="formEditar" onsubmit="submitEditar(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitEditar(event)) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 210:       <input type="hidden" name="accion" value="editar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 211:       <input type="hidden" name="id" id="eId">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 212:       <div class="form-grid-2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 213:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 214:           <label for="eNombre">Nombre de la Tarea *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 215:           <input type="text" id="eNombre" name="nombre" maxlength="100" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 216:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 217:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 218:           <label for="eDescripcion">Descripción</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 219:           <textarea id="eDescripcion" name="descripcion" rows="2" class="tarea-textarea"></textarea>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo textarea.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 220:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 221:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 222:           <label for="eLote">Lote *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 223:           <select id="eLote" name="id_lote" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 224:             <option value="">Selecciona un lote</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 225:             <?php foreach ($lotes as $l): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 226:               <option value="<?= $l['id_lote'] ?>"><?= htmlspecialchars($l['nombre']) ?><?= $l['cultivo'] ? ' — ' . htmlspecialchars($l['cultivo']) : '' ?></option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 227:             <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 228:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 229:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 230:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 231:           <label for="eEstado">Estado</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 232:           <select id="eEstado" name="estado_tarea">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 233:             <option value="PENDIENTE">Pendiente</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 234:             <option value="EN_PROGRESO">En progreso</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 235:             <option value="COMPLETADA">Completada</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 236:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 237:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 238:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 239:           <label for="eInicio">Fecha Inicio *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 240:           <input type="date" id="eInicio" name="fecha_inicio" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 241:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 242:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 243:           <label for="eFin">Fecha Fin Estimada</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 244:           <input type="date" id="eFin" name="fecha_fin_estimada">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 245:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 246:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 247:           <label>Trabajadores Asignados</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 248:           <div class="tarea-trabajadores-grid" id="eTrabajadoresGrid">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 249:             <?php foreach ($trabajadores as $tr): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 250:               <label class="tarea-check-label">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 251:                 <input type="checkbox" name="trabajadores[]" value="<?= $tr['id_trabajador'] ?>" class="e-trabajador-check">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 252:                 <?= htmlspecialchars($tr['nombre_completo']) ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 253:               </label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 254:             <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 255:           </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 256:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 257:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 258:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 259:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalEditar')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalEditar')) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 260:         <button type="submit" class="btn-primary" id="btnEditar">Guardar cambios</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 261:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 262:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 263:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 264: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 265: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 266: <!-- MODAL ELIMINAR -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 267: <div class="modal-overlay" id="modalEliminar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 268:   <div class="modal" style="max-width:420px;text-align:center;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 269:     <div style="font-size:40px;margin-bottom:12px;">🗑️</div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 270:     <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar tarea?</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 271:     <p style="font-size:14px;color:#6b7280;margin-bottom:24px;">Solo se pueden eliminar tareas en estado Pendiente.</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 272:     <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 273:       <button class="btn-cancelar" onclick="cerrarModal('modalEliminar')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalEliminar')) y con controllers/MayordomoTareaController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 274:       <button class="btn-primary" style="background:#dc2626;" id="btnConfirmarEliminar">Eliminar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 275:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 276:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 277: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 278: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 279: <style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 280:   .tar-resumen-4 { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:24px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 281:   .badge-tarea-pendiente  { background:#fef3c7; color:#92400e; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 282:   .badge-tarea-progreso   { background:#dbeafe; color:#1e40af; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 283:   .badge-tarea-completada { background:#dcfce7; color:#166534; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 284:   .btn-estado { border:none; border-radius:6px; padding:4px 10px; font-size:12px; font-weight:600; cursor:pointer; transition:opacity 0.15s; white-space:nowrap; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 285:   .btn-estado:hover { opacity:0.82; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 286:   .btn-estado-progreso  { background:#dbeafe; color:#1e40af; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 287:   .btn-estado-completar { background:#dcfce7; color:#166534; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 288:   .tarea-trabajadores-celda { max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; font-size:13px; color:#374151; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 289:   .tarea-textarea { width:100%; border:1px solid #d1d5db; border-radius:8px; padding:8px 12px; font-size:14px; font-family:inherit; resize:vertical; outline:none; transition:border-color 0.2s; color:#111827; background:#fff; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 290:   .tarea-textarea:focus { border-color:#2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 291:   .tarea-trabajadores-grid { display:grid; grid-template-columns:1fr 1fr; gap:8px; max-height:180px; overflow-y:auto; border:1px solid #e5e7eb; border-radius:8px; padding:10px 12px; background:#fafafa; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 292:   .tarea-check-label { display:flex; align-items:center; gap:8px; font-size:13px; color:#374151; cursor:pointer; padding:4px 6px; border-radius:6px; transition:background 0.15s; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 293:   .tarea-check-label:hover { background:#f0fdf4; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 294:   .tarea-check-label input[type="checkbox"] { width:16px; height:16px; accent-color:#2e9e4f; cursor:pointer; flex-shrink:0; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 295:   .form-group select { height:40px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 296:   .form-group select:focus { border-color:#2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 297:   .select-filtro { height:42px; border:1px solid #e5e7eb; border-radius:8px; padding:0 12px; font-size:14px; color:#374151; background:#fff; outline:none; cursor:pointer; min-width:160px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 298:   .select-filtro:focus { border-color:#2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 299:   .buscador-con-filtro { display:flex; gap:12px; align-items:center; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 300:   @media (max-width:900px) { .tar-resumen-4 { grid-template-columns:1fr 1fr; } }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 301:   @media (max-width:560px) { .tar-resumen-4 { grid-template-columns:1fr; } .tarea-trabajadores-grid { grid-template-columns:1fr; } .buscador-con-filtro { flex-wrap:wrap; } }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 302: </style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 303: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 304: <script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 305: const CTRL = '../../controllers/MayordomoTareaController.php';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con controllers/MayordomoTareaController.php, que recibe las peticiones fetch de esta pantalla.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 306: const hoy  = new Date().toISOString().split('T')[0];
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 307: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 308: function mostrarMsg(id, texto, tipo) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 309:   const el = document.getElementById(id);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 310:   if (!el) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 311:   el.textContent = texto;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 312:   el.className = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 313:   el.style.display = 'block';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 314:   setTimeout(() => { el.style.display = 'none'; }, 4500);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 315: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 316: function recargar() { setTimeout(() => location.reload(), 800); }
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Declarar una función JavaScript que controla una interacción de la pantalla.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 317: function cerrarModal(id) { document.getElementById(id).classList.remove('modal-visible'); }
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Declarar una función JavaScript que controla una interacción de la pantalla.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 318: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 319: function filtrarTabla() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 320:   const q = document.getElementById('inputBusqueda').value.toLowerCase();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 321:   const estado = document.getElementById('filtroEstado').value;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 322:   document.querySelectorAll('#tablaTareas tbody tr[data-busqueda]').forEach(tr => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 323:     const matchQ = tr.dataset.busqueda.includes(q);
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 324:     const matchE = !estado || tr.dataset.estado === estado;
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 325:     tr.style.display = (matchQ && matchE) ? '' : 'none';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 326:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 327: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 328: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 329: function abrirModalCrear() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 330:   document.getElementById('formCrear').reset();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 331:   document.getElementById('cInicio').value = hoy;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 332:   document.getElementById('cEstado').value = 'PENDIENTE';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 333:   document.querySelectorAll('#cTrabajadoresGrid input[type="checkbox"]').forEach(cb => cb.checked = false);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 334:   document.getElementById('msgModalCrear').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 335:   document.getElementById('modalCrear').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 336: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 337: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 338: async function submitCrear(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 339:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 340:   const btn = document.getElementById('btnCrear');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 341:   btn.disabled = true; btn.textContent = 'Creando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 342:   const fd = new FormData(e.target);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 343:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 344:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoTareaController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 345:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 346:     if (json.ok) { cerrarModal('modalCrear'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 347:     else { mostrarMsg('msgModalCrear', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Crear Tarea'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 348:   } catch { mostrarMsg('msgModalCrear', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Crear Tarea'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 349: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 350: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 351: function abrirModalEditar(id, nombre, idLote, inicio, fin, estado, descripcion, trabajadoresIds) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 352:   document.getElementById('eId').value = id;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 353:   document.getElementById('eNombre').value = nombre;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 354:   document.getElementById('eLote').value = idLote;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 355:   document.getElementById('eInicio').value = inicio;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 356:   document.getElementById('eFin').value = fin;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 357:   document.getElementById('eEstado').value = estado;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 358:   document.getElementById('eDescripcion').value = descripcion;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 359:   document.querySelectorAll('#eTrabajadoresGrid input[type="checkbox"]').forEach(cb => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 360:     cb.checked = trabajadoresIds.includes(parseInt(cb.value));
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 361:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 362:   document.getElementById('msgModalEditar').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 363:   document.getElementById('modalEditar').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 364: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 365: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 366: async function submitEditar(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 367:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 368:   const btn = document.getElementById('btnEditar');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 369:   btn.disabled = true; btn.textContent = 'Guardando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 370:   const fd = new FormData(e.target);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 371:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 372:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoTareaController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 373:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 374:     if (json.ok) { cerrarModal('modalEditar'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 375:     else { mostrarMsg('msgModalEditar', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Guardar cambios'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 376:   } catch { mostrarMsg('msgModalEditar', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Guardar cambios'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 377: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 378: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 379: async function cambiarEstado(id, nuevoEstado) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 380:   const fd = new FormData();
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 381:   fd.append('accion', 'cambiar_estado'); fd.append('id', id); fd.append('estado', nuevoEstado);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 382:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 383:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoTareaController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 384:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 385:     mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 386:     if (json.ok) recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 387:   } catch { mostrarMsg('msgGlobal', 'Error de conexión', 'error'); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 388: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 389: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 390: let _idEliminar = null;
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 391: function confirmarEliminar(id, nombre) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 392:   _idEliminar = id;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 393:   document.getElementById('tituloEliminar').textContent = `¿Eliminar "${nombre}"?`;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 394:   document.getElementById('modalEliminar').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 395: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 396: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 397: document.getElementById('btnConfirmarEliminar').addEventListener('click', async () => {
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 398:   if (!_idEliminar) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 399:   const btn = document.getElementById('btnConfirmarEliminar');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 400:   btn.disabled = true;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 401:   const fd = new FormData(); fd.append('accion', 'eliminar'); fd.append('id', _idEliminar);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoTarea.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 402:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 403:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoTareaController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 404:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoTareaController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 405:     cerrarModal('modalEliminar');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 406:     mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 407:     if (json.ok) recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 408:   } catch { mostrarMsg('msgGlobal', 'Error de conexión', 'error'); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 409:   finally { btn.disabled = false; _idEliminar = null; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 410: });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 411: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 412: document.querySelectorAll('.modal-overlay').forEach(overlay => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 413:   overlay.addEventListener('click', function(e) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 414:     if (e.target === this) this.classList.remove('modal-visible');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 415:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 416: });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 417: </script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 418: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/tareas.php; según el contexto también depende de models/MayordomoTarea.php, controllers/MayordomoTareaController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 419: <?php require_once __DIR__ . '/includes/footer.php'; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/footer.php, que cierra el layout y carga JavaScript común.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Conclusión:
Este archivo pertenece a views/mayordomo/tareas.php. Se apoya principalmente en models/MayordomoTarea.php, en controllers/MayordomoTareaController.php, en views/mayordomo/includes/sidebar.php y en views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css. Su función es construir la vista, cargar datos necesarios, mostrar tablas/formularios/modales y enviar acciones al controlador correspondiente cuando el usuario interactúa con el módulo.