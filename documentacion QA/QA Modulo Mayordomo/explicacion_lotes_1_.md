# Documento: lotes(1).php

Archivo del sistema: views/mayordomo/lotes.php

Formato: explicación línea por línea, separada para copiar y pegar.

Regla aplicada: en “Con qué se conecta” se mencionan otros archivos del sistema o documentos necesarios para que funcione.



Línea 1: <?php
Qué hace exactamente: Abre el modo PHP del archivo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Permitir que el servidor ejecute instrucciones PHP antes de enviar HTML al navegador.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 2: /**
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 3:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 4:  * ARCHIVO: views/mayordomo/lotes.php
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 5:  * PROPÓSITO: Módulo Gestión de Lotes (vista mayordomo)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 6:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 7:  * Funcionalidades:
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 8:  *   - 3 tarjetas resumen: total lotes, extensión total, tipos de cultivo
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 9:  *   - Buscador en tiempo real (nombre, ubicación, cultivo)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 10:  *   - Tabla: Nombre | Ubicación | Extensión | Tipo de Cultivo | Fecha Registro | Acciones
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 11:  *   - Botón "+ Registrar Lote" → modal crear
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 12:  *   - Botón ✏️ por fila → modal editar
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 13:  *   - Botón 👁 por fila → modal ver detalle
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 14:  *
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 15:  * Conecta con:
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 16:  *   models/MayordomoLote.php              (lectura directa)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 17:  *   controllers/MayordomoLoteController.php (POST via fetch → JSON)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 18:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 19:  */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 20: session_start();
Qué hace exactamente: Inicia o reanuda la sesión del usuario.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Activar la sesión para validar usuario, rol e información guardada al iniciar sesión.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 21: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Qué hace exactamente: Verifica si existe una sesión válida y si el rol del usuario coincide con MAYORDOMO.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Proteger la vista para que solo el rol correcto pueda usar este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 22:     header("Location: ../../views/usuarios/login.php"); exit;
Qué hace exactamente: Redirige al usuario a otra ruta.
Con qué se conecta en el sistema: Se conecta con views/usuarios/login.php porque redirige allí cuando el usuario no tiene permiso.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 23: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 24: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 25: require_once __DIR__ . '/../../config/database.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 26: require_once __DIR__ . '/../../models/MayordomoLote.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con models/MayordomoLote.php porque ese modelo entrega los datos que esta vista muestra.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 27: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 28: $db      = (new Database())->conectar();
Qué hace exactamente: Crea la conexión PDO usando la clase Database.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Crear la conexión a la base de datos que usarán el modelo o las consultas.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 29: $model   = new MayordomoLote($db);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoLote.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Crear el modelo que consulta, registra o actualiza datos relacionados con este módulo.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 30: $resumen = $model->resumen();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoLote.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener datos resumidos para las tarjetas superiores.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 31: $lotes   = $model->listar();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoLote.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 32: $cultivos= $model->listarCultivos();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoLote.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 33: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 34: $titulo_pagina = 'Lotes - AgroFinca';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir el título que usará el layout de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 35: $modulo_activo = 'lotes';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar al sidebar qué opción del menú debe aparecer activa.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 36: $css_extra     = 'styles/modulos.css';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar qué hoja de estilos adicional debe cargarse para este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 37: require_once __DIR__ . '/includes/sidebar.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/sidebar.php, que abre el layout, sidebar, topbar y panel de notificaciones.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 38: ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 39: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 40: <!-- ── CABECERA ─────────────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 41: <div class="mod-header">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 42:   <div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 43:     <h1 class="mod-titulo">Gestión de Lotes</h1>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h1.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 44:     <p class="mod-subtitulo">Registra y consulta los lotes de la finca</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 45:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 46:   <button class="btn-primary" onclick="abrirModalRegistrar()">+ Registrar Lote</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (abrirModalRegistrar()) y con controllers/MayordomoLoteController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 47: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 48: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 49: <!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 50: <div class="lot-resumen">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 51:   <div class="lote-card-stat lote-stat-verde">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 52:     <span class="lote-stat-label">Total Lotes</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 53:     <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 54:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 55:   <div class="lote-card-stat lote-stat-azul">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 56:     <span class="lote-stat-label">Extensión Total</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 57:     <span class="lote-stat-valor"><?= number_format($resumen['extension_total'], 1) ?> ha</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Formatear números para mostrarlos de forma más legible.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 58:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 59:   <div class="lote-card-stat lote-stat-amarillo">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 60:     <span class="lote-stat-label">Tipos de Cultivo</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 61:     <span class="lote-stat-valor"><?= $resumen['tipos_cultivo'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 62:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 63: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 64: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 65: <!-- ── BUSCADOR ──────────────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 66: <div class="buscador-wrap" style="margin-bottom:16px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 67:   <input type="text" id="inputBusqueda" class="buscador"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 68:          placeholder="🔍  Buscar por nombre, ubicación o cultivo..."
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 69:          oninput="filtrarTabla()">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (filtrarTabla()) y con controllers/MayordomoLoteController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 70: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 71: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 72: <!-- ── MENSAJE FEEDBACK ─────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 73: <div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 74: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 75: <!-- ── TABLA ─────────────────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 76: <div class="tabla-wrap">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 77:   <table class="tabla" id="tablaLotes">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una tabla para mostrar registros.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 78:     <thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 79:       <tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 80:         <th>Nombre</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 81:         <th>Ubicación</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 82:         <th>Extensión</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 83:         <th>Tipo de Cultivo</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 84:         <th>Fecha Registro</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 85:         <th>Acciones</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 86:       </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 87:     </thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 88:     <tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 89:       <?php if (empty($lotes)): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 90:         <tr><td colspan="6" class="tabla-vacia">No hay lotes registrados</td></tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 91:       <?php else: ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 92:         <?php foreach ($lotes as $l): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 93:           <tr data-busqueda="<?= strtolower(
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 94:                 htmlspecialchars(
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 95:                   ($l['nombre'] ?? '') . ' ' .
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 96:                   ($l['ubicacion_descripcion'] ?? '') . ' ' .
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 97:                   ($l['cultivo_nombre'] ?? '')
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 98:                 )
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 99:               ) ?>">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 100:             <td><strong><?= htmlspecialchars($l['nombre']) ?></strong></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 101:             <td><?= htmlspecialchars($l['ubicacion_descripcion'] ?? '—') ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 102:             <td><?= $l['extension'] ? number_format((float)$l['extension'], 1) . ' hectáreas' : '—' ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 103:             <td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 104:               <?php if ($l['cultivo_nombre']): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 105:                 <span class="badge badge-cultivo"><?= htmlspecialchars($l['cultivo_nombre']) ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 106:               <?php else: ?>—<?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 107:             </td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 108:             <td><?= htmlspecialchars($l['fecha_registro'] ?? '—') ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 109:             <td class="acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 110:               <!-- Ver detalle -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 111:               <button class="btn-icono" title="Ver detalle"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 112:                 onclick="verDetalle(
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con JavaScript del mismo archivo y con estilos de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 113:                   '<?= addslashes($l['nombre']) ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 114:                   '<?= addslashes($l['ubicacion_descripcion'] ?? '') ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 115:                   '<?= $l['extension'] ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 116:                   '<?= addslashes($l['cultivo_nombre'] ?? '') ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 117:                   '<?= $l['fecha_registro'] ?? '' ?>'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 118:                 )">👁</button>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 119:               <!-- Editar -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 120:               <button class="btn-icono" title="Editar"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 121:                 onclick="abrirModalEditar(
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con JavaScript del mismo archivo y con estilos de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 122:                   <?= $l['id_lote'] ?>,
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 123:                   '<?= addslashes($l['nombre']) ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 124:                   '<?= addslashes($l['ubicacion_descripcion'] ?? '') ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 125:                   <?= (float)($l['extension'] ?? 0) ?>,
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 126:                   <?= (int)($l['id_cultivo'] ?? 0) ?>,
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 127:                   '<?= $l['fecha_registro'] ?? '' ?>'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 128:                 )">✏️</button>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 129:             </td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 130:           </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 131:         <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 132:       <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 133:     </tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 134:   </table>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 135: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 136: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 137: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 138: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 139:      MODAL: REGISTRAR LOTE
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 140: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 141: <div class="modal-overlay" id="modalRegistrar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 142:   <div class="modal">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 143:     <h2 class="modal-titulo">Registrar Lote</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 144:     <div id="msgModalRegistrar" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 145: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 146:     <form id="formRegistrar" onsubmit="submitRegistrar(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitRegistrar(event)) y con controllers/MayordomoLoteController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 147:       <input type="hidden" name="accion" value="registrar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 148: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

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

Línea 151:           <label for="rNombre">Nombre del Lote *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 152:           <input type="text" id="rNombre" name="nombre"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 153:                  placeholder="Ej: Lote Norte" maxlength="100" required>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 154:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 155:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 156:           <label for="rUbicacion">Ubicación / Descripción</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 157:           <input type="text" id="rUbicacion" name="ubicacion_descripcion"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 158:                  placeholder="Ej: Zona A, sector norte" maxlength="150">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 159:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 160:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 161:           <label for="rExtension">Extensión (hectáreas)</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 162:           <input type="number" id="rExtension" name="extension"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 163:                  min="0" step="0.01" placeholder="Ej: 5.5">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 164:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 165:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 166:           <label for="rFecha">Fecha Registro *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 167:           <input type="date" id="rFecha" name="fecha_registro" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 168:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 169:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 170:           <label for="rCultivo">Tipo de Cultivo *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 171:           <select id="rCultivo" name="id_cultivo" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 172:             <option value="">Selecciona un cultivo</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 173:             <?php foreach ($cultivos as $c): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 174:               <option value="<?= $c['id_cultivo'] ?>">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 175:                 <?= htmlspecialchars($c['nombre']) ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 176:                 <?= $c['variedad'] ? '— ' . htmlspecialchars($c['variedad']) : '' ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 177:               </option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 178:             <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 179:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 180:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 181:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 182: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 183:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 184:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalRegistrar')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalRegistrar')) y con controllers/MayordomoLoteController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 185:         <button type="submit" class="btn-primary" id="btnRegistrar">Registrar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 186:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 187:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 188:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 189: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 190: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 191: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 192: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 193:      MODAL: EDITAR LOTE
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 194: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 195: <div class="modal-overlay" id="modalEditar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 196:   <div class="modal">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 197:     <h2 class="modal-titulo">Editar Lote</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 198:     <div id="msgModalEditar" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 199: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 200:     <form id="formEditar" onsubmit="submitEditar(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitEditar(event)) y con controllers/MayordomoLoteController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 201:       <input type="hidden" name="accion" value="editar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 202:       <input type="hidden" name="id" id="eId">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 203: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 204:       <div class="form-grid-2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 205:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 206:           <label for="eNombre">Nombre del Lote *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 207:           <input type="text" id="eNombre" name="nombre" maxlength="100" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 208:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 209:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 210:           <label for="eUbicacion">Ubicación / Descripción</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 211:           <input type="text" id="eUbicacion" name="ubicacion_descripcion" maxlength="150">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 212:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 213:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 214:           <label for="eExtension">Extensión (hectáreas)</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 215:           <input type="number" id="eExtension" name="extension" min="0" step="0.01">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 216:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 217:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 218:           <label for="eFecha">Fecha Registro *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 219:           <input type="date" id="eFecha" name="fecha_registro" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 220:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 221:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 222:           <label for="eCultivo">Tipo de Cultivo *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 223:           <select id="eCultivo" name="id_cultivo" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 224:             <option value="">Selecciona un cultivo</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 225:             <?php foreach ($cultivos as $c): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 226:               <option value="<?= $c['id_cultivo'] ?>">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 227:                 <?= htmlspecialchars($c['nombre']) ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 228:                 <?= $c['variedad'] ? '— ' . htmlspecialchars($c['variedad']) : '' ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 229:               </option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 230:             <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 231:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 232:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 233:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 234: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 235:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 236:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalEditar')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalEditar')) y con controllers/MayordomoLoteController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 237:         <button type="submit" class="btn-primary" id="btnEditar">Guardar cambios</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 238:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 239:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 240:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 241: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 242: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 243: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 244: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 245:      MODAL: VER DETALLE
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 246: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 247: <div class="modal-overlay" id="modalDetalle">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 248:   <div class="modal" style="max-width:480px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 249:     <h2 class="modal-titulo">Detalle del Lote</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 250:     <div class="detalle-grid">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 251:       <div class="detalle-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 252:         <span class="detalle-label">Nombre</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 253:         <span id="dNombre"></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 254:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 255:       <div class="detalle-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 256:         <span class="detalle-label">Ubicación</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 257:         <span id="dUbicacion"></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 258:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 259:       <div class="detalle-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 260:         <span class="detalle-label">Extensión</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 261:         <span id="dExtension"></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 262:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 263:       <div class="detalle-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 264:         <span class="detalle-label">Tipo de Cultivo</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 265:         <span id="dCultivo"></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 266:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 267:       <div class="detalle-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 268:         <span class="detalle-label">Fecha Registro</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 269:         <span id="dFecha"></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 270:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 271:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 272:     <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 273:       <button class="btn-primary" onclick="cerrarModal('modalDetalle')">Cerrar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalDetalle')) y con controllers/MayordomoLoteController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 274:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 275:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 276: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 277: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 278: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 279: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 280:      ESTILOS PROPIOS DEL MÓDULO
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 281: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 282: <style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 283:   /* Tarjetas resumen */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 284:   .lot-resumen {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 285:     display: grid;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 286:     grid-template-columns: repeat(3, 1fr);
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 287:     gap: 14px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 288:     margin-bottom: 24px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 289:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 290: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 291:   /* Selects en formulario */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 292:   .form-group select {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 293:     height: 40px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 294:     border: 1px solid #d1d5db;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 295:     border-radius: 8px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 296:     padding: 0 12px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 297:     font-size: 14px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 298:     color: #111827;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 299:     outline: none;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 300:     transition: border-color 0.2s;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 301:     background: #fff;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 302:     cursor: pointer;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 303:     width: 100%;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 304:     font-family: inherit;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 305:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 306:   .form-group select:focus { border-color: #2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 307: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 308:   @media (max-width: 768px) {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 309:     .lot-resumen { grid-template-columns: 1fr 1fr; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 310:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 311:   @media (max-width: 480px) {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 312:     .lot-resumen { grid-template-columns: 1fr; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 313:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 314: </style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 315: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 316: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 317: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 318:      JAVASCRIPT
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 319: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 320: <script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 321: const CTRL = '../../controllers/MayordomoLoteController.php';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con controllers/MayordomoLoteController.php, que recibe las peticiones fetch de esta pantalla.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 322: const hoy  = new Date().toISOString().split('T')[0];
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoLote.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 323: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 324: /* ── Utilidades ─────────────────────────────────────────── */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 325: function mostrarMsg(id, texto, tipo) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 326:   const el = document.getElementById(id);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 327:   if (!el) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 328:   el.textContent   = texto;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 329:   el.className     = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 330:   el.style.display = 'block';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 331:   setTimeout(() => { el.style.display = 'none'; }, 4500);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 332: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 333: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 334: function recargar() { setTimeout(() => location.reload(), 800); }
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Declarar una función JavaScript que controla una interacción de la pantalla.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 335: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 336: function cerrarModal(id) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 337:   document.getElementById(id).classList.remove('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 338: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 339: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 340: /* ── Filtro en tiempo real ──────────────────────────────── */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 341: function filtrarTabla() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 342:   const q = document.getElementById('inputBusqueda').value.toLowerCase();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 343:   document.querySelectorAll('#tablaLotes tbody tr[data-busqueda]').forEach(tr => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 344:     tr.style.display = tr.dataset.busqueda.includes(q) ? '' : 'none';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 345:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 346: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 347: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 348: /* ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 349:    MODAL REGISTRAR
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 350: ══════════════════════════════════════════════════════════ */
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 351: function abrirModalRegistrar() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 352:   document.getElementById('formRegistrar').reset();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 353:   document.getElementById('rFecha').value = hoy;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 354:   document.getElementById('msgModalRegistrar').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 355:   document.getElementById('modalRegistrar').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 356: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 357: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 358: async function submitRegistrar(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 359:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 360:   const btn = document.getElementById('btnRegistrar');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 361:   btn.disabled    = true;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 362:   btn.textContent = 'Registrando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 363: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 364:   const fd = new FormData(e.target);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoLote.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 365:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 366:     const res  = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoLoteController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 367:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 368:     if (json.ok) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 369:       cerrarModal('modalRegistrar');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 370:       mostrarMsg('msgGlobal', json.mensaje, 'ok');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 371:       recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 372:     } else {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 373:       mostrarMsg('msgModalRegistrar', json.mensaje, 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 374:       btn.disabled    = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 375:       btn.textContent = 'Registrar';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 376:     }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 377:   } catch {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 378:     mostrarMsg('msgModalRegistrar', 'Error de conexión', 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 379:     btn.disabled    = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 380:     btn.textContent = 'Registrar';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 381:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 382: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 383: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 384: /* ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 385:    MODAL EDITAR
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 386: ══════════════════════════════════════════════════════════ */
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 387: function abrirModalEditar(id, nombre, ubicacion, extension, idCultivo, fecha) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 388:   document.getElementById('eId').value        = id;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 389:   document.getElementById('eNombre').value    = nombre;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 390:   document.getElementById('eUbicacion').value = ubicacion;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 391:   document.getElementById('eExtension').value = extension;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 392:   document.getElementById('eCultivo').value   = idCultivo;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 393:   document.getElementById('eFecha').value     = fecha;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 394:   document.getElementById('msgModalEditar').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 395:   document.getElementById('modalEditar').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 396: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 397: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 398: async function submitEditar(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 399:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 400:   const btn = document.getElementById('btnEditar');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 401:   btn.disabled    = true;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 402:   btn.textContent = 'Guardando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 403: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 404:   const fd = new FormData(e.target);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoLote.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 405:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 406:     const res  = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoLoteController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 407:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 408:     if (json.ok) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 409:       cerrarModal('modalEditar');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 410:       mostrarMsg('msgGlobal', json.mensaje, 'ok');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 411:       recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 412:     } else {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 413:       mostrarMsg('msgModalEditar', json.mensaje, 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 414:       btn.disabled    = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 415:       btn.textContent = 'Guardar cambios';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 416:     }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 417:   } catch {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 418:     mostrarMsg('msgModalEditar', 'Error de conexión', 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 419:     btn.disabled    = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 420:     btn.textContent = 'Guardar cambios';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 421:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 422: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 423: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 424: /* ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 425:    VER DETALLE
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 426: ══════════════════════════════════════════════════════════ */
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 427: function verDetalle(nombre, ubicacion, extension, cultivo, fecha) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoLoteController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 428:   document.getElementById('dNombre').textContent    = nombre;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 429:   document.getElementById('dUbicacion').textContent = ubicacion || '—';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 430:   document.getElementById('dExtension').textContent = extension ? extension + ' hectáreas' : '—';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 431:   document.getElementById('dCultivo').textContent   = cultivo || '—';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 432:   document.getElementById('dFecha').textContent     = fecha || '—';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 433:   document.getElementById('modalDetalle').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 434: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 435: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 436: /* ── Cerrar modales al hacer clic fuera ──────────────── */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 437: document.querySelectorAll('.modal-overlay').forEach(overlay => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 438:   overlay.addEventListener('click', function(e) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 439:     if (e.target === this) this.classList.remove('modal-visible');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 440:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 441: });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 442: </script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 443: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/lotes.php; según el contexto también depende de models/MayordomoLote.php, controllers/MayordomoLoteController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 444: <?php require_once __DIR__ . '/includes/footer.php'; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/footer.php, que cierra el layout y carga JavaScript común.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Conclusión:
Este archivo pertenece a views/mayordomo/lotes.php. Se apoya principalmente en models/MayordomoLote.php, en controllers/MayordomoLoteController.php, en views/mayordomo/includes/sidebar.php y en views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css. Su función es construir la vista, cargar datos necesarios, mostrar tablas/formularios/modales y enviar acciones al controlador correspondiente cuando el usuario interactúa con el módulo.