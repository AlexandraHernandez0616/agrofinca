# Documento: cultivos.php

Archivo del sistema: views/mayordomo/cultivos.php

Formato: explicación línea por línea, separada para copiar y pegar.

Regla aplicada: en “Con qué se conecta” se mencionan otros archivos del sistema o documentos necesarios para que funcione.



Línea 1: <?php
Qué hace exactamente: Abre el modo PHP del archivo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Permitir que el servidor ejecute instrucciones PHP antes de enviar HTML al navegador.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 2: /**
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 3:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 4:  * ARCHIVO: views/mayordomo/cultivos.php
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 5:  * PROPÓSITO: Módulo Gestión de Cultivos (vista mayordomo)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 6:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 7:  * Funcionalidades:
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 8:  *   - 3 tarjetas resumen: total, activos, inhabilitados
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 9:  *   - Buscador en tiempo real + filtro por estado
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 10:  *   - Tabla: Nombre | Variedad | Cantidad Cultivada | Fecha Registro
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 11:  *            | Estado | Lotes Asociados | Acciones
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 12:  *   - Botón "+ Registrar Cultivo" → modal crear
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 13:  *   - Botón ✏️ editar | 🚫 toggle estado | 🗑️ eliminar por fila
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 14:  *
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 15:  * Conecta con:
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 16:  *   models/MayordomoCultivo.php              (lectura directa)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 17:  *   controllers/MayordomoCultivoController.php (POST via fetch → JSON)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 18:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 19:  */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
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
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 24: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 25: require_once __DIR__ . '/../../config/database.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 26: require_once __DIR__ . '/../../models/MayordomoCultivo.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php porque ese modelo entrega los datos que esta vista muestra.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 27: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 28: $db      = (new Database())->conectar();
Qué hace exactamente: Crea la conexión PDO usando la clase Database.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Crear la conexión a la base de datos que usarán el modelo o las consultas.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 29: $model   = new MayordomoCultivo($db);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Crear el modelo que consulta, registra o actualiza datos relacionados con este módulo.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 30: $resumen = $model->resumen();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener datos resumidos para las tarjetas superiores.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 31: $cultivos= $model->listar();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 32: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 33: $titulo_pagina = 'Cultivos - AgroFinca';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir el título que usará el layout de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 34: $modulo_activo = 'cultivos';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar al sidebar qué opción del menú debe aparecer activa.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 35: $css_extra     = 'styles/modulos.css';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar qué hoja de estilos adicional debe cargarse para este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 36: require_once __DIR__ . '/includes/sidebar.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/sidebar.php, que abre el layout, sidebar, topbar y panel de notificaciones.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 37: ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 38: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 39: <!-- ── CABECERA ─────────────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 40: <div class="mod-header">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 41:   <div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 42:     <h1 class="mod-titulo">Gestión de Cultivos</h1>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h1.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 43:     <p class="mod-subtitulo">Consulta, registra y administra los cultivos de la finca</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 44:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 45:   <button class="btn-primary" onclick="abrirModalRegistrar()">+ Registrar Cultivo</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (abrirModalRegistrar()) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 46: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 47: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 48: <!-- ── TARJETAS RESUMEN ─────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 49: <div class="cult-resumen">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 50:   <div class="lote-card-stat lote-stat-verde">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 51:     <span class="lote-stat-label">Total Cultivos</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 52:     <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 53:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 54:   <div class="lote-card-stat lote-stat-azul">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 55:     <span class="lote-stat-label">Activos</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 56:     <span class="lote-stat-valor"><?= $resumen['activos'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 57:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 58:   <div class="lote-card-stat lote-stat-amarillo">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 59:     <span class="lote-stat-label">Inhabilitados</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 60:     <span class="lote-stat-valor"><?= $resumen['inhabilitados'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 61:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 62: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 63: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 64: <!-- ── FILTROS ───────────────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 65: <div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 66:   <input type="text" id="inputBusqueda" class="buscador"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 67:          placeholder="🔍  Buscar por nombre o variedad..."
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 68:          oninput="filtrarTabla()">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (filtrarTabla()) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 69:   <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (filtrarTabla()) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 70:     <option value="">Todos</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 71:     <option value="ACTIVO">Activo</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 72:     <option value="INHABILITADO">Inhabilitado</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 73:   </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 74: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 75: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 76: <!-- ── MENSAJE FEEDBACK ─────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 77: <div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 78: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 79: <!-- ── TABLA ─────────────────────────────────────────────── -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 80: <div class="tabla-wrap">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 81:   <table class="tabla" id="tablaCultivos">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una tabla para mostrar registros.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 82:     <thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 83:       <tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 84:         <th>Nombre</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 85:         <th>Variedad</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 86:         <th>Cantidad Cultivada</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 87:         <th>Fecha Registro</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 88:         <th>Estado</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 89:         <th>Lotes Asociados</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 90:         <th>Acciones</th>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo th.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 91:       </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 92:     </thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 93:     <tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 94:       <?php if (empty($cultivos)): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 95:         <tr><td colspan="7" class="tabla-vacia">No hay cultivos registrados</td></tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 96:       <?php else: ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 97:         <?php foreach ($cultivos as $c): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 98:           <?php
Qué hace exactamente: Abre el modo PHP del archivo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Permitir que el servidor ejecute instrucciones PHP antes de enviar HTML al navegador.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 99:             $activo    = strtoupper($c['estado']) === 'ACTIVO';
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 100:             $clsEstado = $activo ? 'badge-activo' : 'badge-inactivo';
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 101:             $lblEstado = $activo ? 'Activo' : 'Inhabilitado';
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 102:             $lotes     = (int) $c['lotes_asociados'];
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 103:             $lblLotes  = $lotes > 0
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 104:               ? $lotes . ' activo' . ($lotes !== 1 ? 's' : '')
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 105:               : 'Historial';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 106:           ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 107:           <tr data-busqueda="<?= strtolower(htmlspecialchars($c['nombre'] . ' ' . $c['variedad'])) ?>"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 108:               data-estado="<?= strtoupper($c['estado']) ?>">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 109:             <td><strong><?= htmlspecialchars($c['nombre']) ?></strong></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 110:             <td><?= htmlspecialchars($c['variedad']) ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 111:             <td><?= number_format((float)$c['cantidad_cultivada'], 0) ?> hectáreas</td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 112:             <td><?= htmlspecialchars($c['fecha_registro'] ?? '—') ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 113:             <td><span class="badge <?= $clsEstado ?>"><?= $lblEstado ?></span></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 114:             <td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 115:               <span class="cult-lotes-badge <?= $lotes > 0 ? 'cult-lotes-activos' : 'cult-lotes-historial' ?>">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 116:                 <?= $lblLotes ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 117:               </span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 118:             </td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 119:             <td class="acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 120:               <!-- Editar -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 121:               <button class="btn-icono" title="Editar"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 122:                 onclick="abrirModalEditar(
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con JavaScript del mismo archivo y con estilos de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 123:                   <?= $c['id_cultivo'] ?>,
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 124:                   '<?= addslashes($c['nombre']) ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 125:                   '<?= addslashes($c['variedad']) ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 126:                   <?= (float)$c['cantidad_cultivada'] ?>,
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 127:                   '<?= $c['fecha_registro'] ?? '' ?>',
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 128:                   '<?= $c['estado'] ?>'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 129:                 )">✏️</button>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 130: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 131:               <!-- Toggle estado -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 132:               <button class="btn-icono" title="<?= $activo ? 'Inhabilitar' : 'Habilitar' ?>"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 133:                 onclick="toggleEstado(<?= $c['id_cultivo'] ?>, '<?= $activo ? 'INHABILITADO' : 'ACTIVO' ?>', '<?= addslashes($c['nombre']) ?>')">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (toggleEstado(<?= $c['id_cultivo'] ?>, '<?= $activo ? 'INHABILITADO' : 'ACTIVO' ?>', '<?= addslashes($c['nombre']) ?>')) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 134:                 <?= $activo ? '🚫' : '✅' ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 135:               </button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 136: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 137:               <!-- Eliminar -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 138:               <button class="btn-icono" title="Eliminar"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 139:                 onclick="confirmarEliminar(<?= $c['id_cultivo'] ?>, '<?= addslashes($c['nombre']) ?>', <?= $lotes ?>)">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (confirmarEliminar(<?= $c['id_cultivo'] ?>, '<?= addslashes($c['nombre']) ?>', <?= $lotes ?>)) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Escapar comillas para pasar textos a JavaScript sin romper el onclick.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 140:                 🗑️
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 141:               </button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 142:             </td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 143:           </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 144:         <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 145:       <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 146:     </tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 147:   </table>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 148: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 149: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 150: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 151: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 152:      MODAL: REGISTRAR CULTIVO
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 153: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 154: <div class="modal-overlay" id="modalRegistrar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 155:   <div class="modal">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 156:     <h2 class="modal-titulo">Registrar Cultivo</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 157:     <div id="msgModalRegistrar" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 158: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 159:     <form id="formRegistrar" onsubmit="submitRegistrar(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitRegistrar(event)) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 160:       <input type="hidden" name="accion" value="registrar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 161: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 162:       <div class="form-grid-2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 163:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 164:           <label for="rNombre">Nombre *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 165:           <input type="text" id="rNombre" name="nombre"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 166:                  placeholder="Ej: Café" maxlength="100" required>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 167:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 168:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 169:           <label for="rVariedad">Variedad *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 170:           <input type="text" id="rVariedad" name="variedad"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 171:                  placeholder="Ej: Castillo" maxlength="100" required>
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 172:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 173:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 174:           <label for="rCantidad">Cantidad Cultivada (ha)</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 175:           <input type="number" id="rCantidad" name="cantidad_cultivada"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 176:                  min="0" step="0.01" placeholder="Ej: 5">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 177:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 178:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 179:           <label for="rFecha">Fecha Registro *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 180:           <input type="date" id="rFecha" name="fecha_registro" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 181:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 182:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 183:           <label for="rEstado">Estado</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 184:           <select id="rEstado" name="estado">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 185:             <option value="ACTIVO">Activo</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 186:             <option value="INHABILITADO">Inhabilitado</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 187:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 188:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 189:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 190: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 191:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 192:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalRegistrar')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalRegistrar')) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 193:         <button type="submit" class="btn-primary" id="btnRegistrar">Registrar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 194:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 195:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 196:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 197: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 198: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 199: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 200: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 201:      MODAL: EDITAR CULTIVO
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 202: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 203: <div class="modal-overlay" id="modalEditar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 204:   <div class="modal">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 205:     <h2 class="modal-titulo">Editar Cultivo</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 206:     <div id="msgModalEditar" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 207: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 208:     <form id="formEditar" onsubmit="submitEditar(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitEditar(event)) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 209:       <input type="hidden" name="accion" value="editar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 210:       <input type="hidden" name="id" id="eId">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 211: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 212:       <div class="form-grid-2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 213:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 214:           <label for="eNombre">Nombre *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 215:           <input type="text" id="eNombre" name="nombre" maxlength="100" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 216:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 217:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 218:           <label for="eVariedad">Variedad *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 219:           <input type="text" id="eVariedad" name="variedad" maxlength="100" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 220:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 221:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 222:           <label for="eCantidad">Cantidad Cultivada (ha)</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 223:           <input type="number" id="eCantidad" name="cantidad_cultivada" min="0" step="0.01">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 224:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 225:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 226:           <label for="eFecha">Fecha Registro *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 227:           <input type="date" id="eFecha" name="fecha_registro" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 228:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 229:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 230:           <label for="eEstado">Estado</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 231:           <select id="eEstado" name="estado">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 232:             <option value="ACTIVO">Activo</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 233:             <option value="INHABILITADO">Inhabilitado</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 234:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 235:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 236:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 237: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 238:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 239:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalEditar')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalEditar')) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 240:         <button type="submit" class="btn-primary" id="btnEditar">Guardar cambios</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 241:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 242:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 243:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 244: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 245: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 246: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 247: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 248:      MODAL: CONFIRMAR ELIMINAR
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 249: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 250: <div class="modal-overlay" id="modalEliminar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 251:   <div class="modal" style="max-width:420px;text-align:center;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 252:     <div style="font-size:40px;margin-bottom:12px;">🗑️</div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 253:     <h2 class="modal-titulo" style="text-align:center;" id="tituloEliminar">¿Eliminar cultivo?</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 254:     <p style="font-size:14px;color:#6b7280;margin-bottom:24px;" id="subEliminar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 255:       Esta acción no se puede deshacer.
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 256:     </p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 257:     <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 258:       <button class="btn-cancelar" onclick="cerrarModal('modalEliminar')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalEliminar')) y con controllers/MayordomoCultivoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 259:       <button class="btn-primary" style="background:#dc2626;" id="btnConfirmarEliminar">Eliminar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 260:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 261:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 262: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 263: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 264: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 265: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 266:      ESTILOS PROPIOS DEL MÓDULO
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 267: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 268: <style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 269:   /* Tarjetas resumen */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 270:   .cult-resumen {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 271:     display: grid;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 272:     grid-template-columns: repeat(3, 1fr);
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 273:     gap: 14px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 274:     margin-bottom: 24px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 275:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 276: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 277:   /* Badge de lotes asociados */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 278:   .cult-lotes-badge {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 279:     display: inline-block;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 280:     padding: 3px 10px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 281:     border-radius: 20px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 282:     font-size: 12px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 283:     font-weight: 600;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 284:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 285:   .cult-lotes-activos  { background: #dbeafe; color: #1e40af; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 286:   .cult-lotes-historial{ background: #f3f4f6; color: #6b7280; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 287: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 288:   /* Selects en formulario */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 289:   .form-group select {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 290:     height: 40px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 291:     border: 1px solid #d1d5db;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 292:     border-radius: 8px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 293:     padding: 0 12px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 294:     font-size: 14px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 295:     color: #111827;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 296:     outline: none;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 297:     transition: border-color 0.2s;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 298:     background: #fff;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 299:     cursor: pointer;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 300:     width: 100%;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 301:     font-family: inherit;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 302:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 303:   .form-group select:focus { border-color: #2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 304: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 305:   /* Select filtro en barra */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 306:   .select-filtro {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 307:     height: 42px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 308:     border: 1px solid #e5e7eb;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 309:     border-radius: 8px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 310:     padding: 0 12px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 311:     font-size: 14px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 312:     color: #374151;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 313:     background: #fff;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 314:     outline: none;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 315:     cursor: pointer;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 316:     min-width: 130px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 317:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 318:   .select-filtro:focus { border-color: #2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 319: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 320:   .buscador-con-filtro {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 321:     display: flex;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 322:     gap: 12px;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 323:     align-items: center;
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 324:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 325: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 326:   @media (max-width: 768px) {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 327:     .cult-resumen { grid-template-columns: 1fr 1fr; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 328:     .buscador-con-filtro { flex-wrap: wrap; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 329:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 330:   @media (max-width: 480px) {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 331:     .cult-resumen { grid-template-columns: 1fr; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 332:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 333: </style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 334: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 335: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 336: <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 337:      JAVASCRIPT
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 338: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 339: <script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 340: const CTRL = '../../controllers/MayordomoCultivoController.php';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con controllers/MayordomoCultivoController.php, que recibe las peticiones fetch de esta pantalla.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 341: const hoy  = new Date().toISOString().split('T')[0];
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 342: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 343: /* ── Utilidades ─────────────────────────────────────────── */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 344: function mostrarMsg(id, texto, tipo) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 345:   const el = document.getElementById(id);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 346:   if (!el) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 347:   el.textContent   = texto;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 348:   el.className     = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 349:   el.style.display = 'block';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 350:   setTimeout(() => { el.style.display = 'none'; }, 4500);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 351: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 352: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 353: function recargar() { setTimeout(() => location.reload(), 800); }
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Declarar una función JavaScript que controla una interacción de la pantalla.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 354: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 355: function cerrarModal(id) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 356:   document.getElementById(id).classList.remove('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 357: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 358: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 359: /* ── Filtro en tiempo real ──────────────────────────────── */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 360: function filtrarTabla() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 361:   const q      = document.getElementById('inputBusqueda').value.toLowerCase();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 362:   const estado = document.getElementById('filtroEstado').value;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 363: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 364:   document.querySelectorAll('#tablaCultivos tbody tr[data-busqueda]').forEach(tr => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 365:     const matchQ = tr.dataset.busqueda.includes(q);
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 366:     const matchE = !estado || tr.dataset.estado === estado;
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 367:     tr.style.display = (matchQ && matchE) ? '' : 'none';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 368:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 369: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 370: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 371: /* ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 372:    MODAL REGISTRAR
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 373: ══════════════════════════════════════════════════════════ */
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 374: function abrirModalRegistrar() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 375:   document.getElementById('formRegistrar').reset();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 376:   document.getElementById('rFecha').value  = hoy;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 377:   document.getElementById('rEstado').value = 'ACTIVO';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 378:   document.getElementById('msgModalRegistrar').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 379:   document.getElementById('modalRegistrar').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 380: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 381: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 382: async function submitRegistrar(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 383:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 384:   const btn = document.getElementById('btnRegistrar');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 385:   btn.disabled    = true;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 386:   btn.textContent = 'Registrando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 387: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 388:   const fd = new FormData(e.target);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 389:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 390:     const res  = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoCultivoController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 391:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 392:     if (json.ok) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 393:       cerrarModal('modalRegistrar');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 394:       mostrarMsg('msgGlobal', json.mensaje, 'ok');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 395:       recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 396:     } else {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 397:       mostrarMsg('msgModalRegistrar', json.mensaje, 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 398:       btn.disabled    = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 399:       btn.textContent = 'Registrar';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 400:     }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 401:   } catch {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 402:     mostrarMsg('msgModalRegistrar', 'Error de conexión', 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 403:     btn.disabled    = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 404:     btn.textContent = 'Registrar';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 405:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 406: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 407: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 408: /* ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 409:    MODAL EDITAR
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 410: ══════════════════════════════════════════════════════════ */
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 411: function abrirModalEditar(id, nombre, variedad, cantidad, fecha, estado) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 412:   document.getElementById('eId').value        = id;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 413:   document.getElementById('eNombre').value    = nombre;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 414:   document.getElementById('eVariedad').value  = variedad;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 415:   document.getElementById('eCantidad').value  = cantidad;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 416:   document.getElementById('eFecha').value     = fecha;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 417:   document.getElementById('eEstado').value    = estado;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 418:   document.getElementById('msgModalEditar').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 419:   document.getElementById('modalEditar').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 420: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 421: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 422: async function submitEditar(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 423:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 424:   const btn = document.getElementById('btnEditar');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 425:   btn.disabled    = true;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 426:   btn.textContent = 'Guardando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 427: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 428:   const fd = new FormData(e.target);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 429:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 430:     const res  = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoCultivoController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 431:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 432:     if (json.ok) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 433:       cerrarModal('modalEditar');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 434:       mostrarMsg('msgGlobal', json.mensaje, 'ok');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 435:       recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 436:     } else {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 437:       mostrarMsg('msgModalEditar', json.mensaje, 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 438:       btn.disabled    = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 439:       btn.textContent = 'Guardar cambios';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 440:     }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 441:   } catch {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 442:     mostrarMsg('msgModalEditar', 'Error de conexión', 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 443:     btn.disabled    = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 444:     btn.textContent = 'Guardar cambios';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 445:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 446: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 447: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 448: /* ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 449:    TOGGLE ESTADO
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 450: ══════════════════════════════════════════════════════════ */
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 451: async function toggleEstado(id, nuevoEstado, nombre) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 452:   const accion = nuevoEstado === 'INHABILITADO' ? 'inhabilitar' : 'habilitar';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 453:   if (!confirm(`¿${accion.charAt(0).toUpperCase() + accion.slice(1)} el cultivo "${nombre}"?`)) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 454: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 455:   const fd = new FormData();
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 456:   fd.append('accion', 'toggle_estado');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 457:   fd.append('id',     id);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 458:   fd.append('estado', nuevoEstado);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 459: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 460:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 461:     const res  = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoCultivoController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 462:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 463:     mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 464:     if (json.ok) recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 465:   } catch {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 466:     mostrarMsg('msgGlobal', 'Error de conexión', 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 467:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 468: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 469: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 470: /* ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 471:    ELIMINAR
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 472: ══════════════════════════════════════════════════════════ */
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 473: let _idEliminar = null;
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 474: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 475: function confirmarEliminar(id, nombre, lotes) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 476:   _idEliminar = id;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 477:   document.getElementById('tituloEliminar').textContent = `¿Eliminar "${nombre}"?`;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 478:   document.getElementById('subEliminar').textContent = lotes > 0
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 479:     ? `Este cultivo tiene ${lotes} lote(s) asociado(s) y no podrá eliminarse.`
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 480:     : 'Esta acción no se puede deshacer.';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 481:   document.getElementById('modalEliminar').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 482: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 483: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 484: document.getElementById('btnConfirmarEliminar').addEventListener('click', async () => {
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 485:   if (!_idEliminar) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 486:   const btn = document.getElementById('btnConfirmarEliminar');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 487:   btn.disabled = true;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 488: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 489:   const fd = new FormData();
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoCultivo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 490:   fd.append('accion', 'eliminar');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 491:   fd.append('id',     _idEliminar);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 492: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 493:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 494:     const res  = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoCultivoController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 495:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoCultivoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 496:     cerrarModal('modalEliminar');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 497:     mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 498:     if (json.ok) recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 499:   } catch {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 500:     mostrarMsg('msgGlobal', 'Error de conexión', 'error');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 501:   } finally {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 502:     btn.disabled = false;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 503:     _idEliminar  = null;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 504:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 505: });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 506: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 507: /* ── Cerrar modales al hacer clic fuera ──────────────── */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 508: document.querySelectorAll('.modal-overlay').forEach(overlay => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 509:   overlay.addEventListener('click', function(e) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 510:     if (e.target === this) this.classList.remove('modal-visible');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 511:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 512: });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 513: </script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 514: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/cultivos.php; según el contexto también depende de models/MayordomoCultivo.php, controllers/MayordomoCultivoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 515: <?php require_once __DIR__ . '/includes/footer.php'; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/footer.php, que cierra el layout y carga JavaScript común.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Conclusión:
Este archivo pertenece a views/mayordomo/cultivos.php. Se apoya principalmente en models/MayordomoCultivo.php, en controllers/MayordomoCultivoController.php, en views/mayordomo/includes/sidebar.php y en views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css. Su función es construir la vista, cargar datos necesarios, mostrar tablas/formularios/modales y enviar acciones al controlador correspondiente cuando el usuario interactúa con el módulo.