# Documento: prestamos.php

Archivo del sistema: views/mayordomo/prestamos.php

Formato: explicación línea por línea, separada para copiar y pegar.

Regla aplicada: en “Con qué se conecta” se mencionan otros archivos del sistema o documentos necesarios para que funcione.



Línea 1: ﻿<?php
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 2: session_start();
Qué hace exactamente: Inicia o reanuda la sesión del usuario.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Activar la sesión para validar usuario, rol e información guardada al iniciar sesión.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 3: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Qué hace exactamente: Verifica si existe una sesión válida y si el rol del usuario coincide con MAYORDOMO.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Proteger la vista para que solo el rol correcto pueda usar este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 4:     header("Location: ../../views/usuarios/login.php"); exit;
Qué hace exactamente: Redirige al usuario a otra ruta.
Con qué se conecta en el sistema: Se conecta con views/usuarios/login.php porque redirige allí cuando el usuario no tiene permiso.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 5: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 6: require_once __DIR__ . '/../../config/database.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 7: require_once __DIR__ . '/../../models/MayordomoPrestamo.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con models/MayordomoPrestamo.php porque ese modelo entrega los datos que esta vista muestra.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 8: $db           = (new Database())->conectar();
Qué hace exactamente: Crea la conexión PDO usando la clase Database.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Crear la conexión a la base de datos que usarán el modelo o las consultas.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 9: $model        = new MayordomoPrestamo($db);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoPrestamo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Crear el modelo que consulta, registra o actualiza datos relacionados con este módulo.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 10: $id_mayordomo = (int) $_SESSION['id_usuario'];
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 11: $resumen      = $model->resumen($id_mayordomo);
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoPrestamo.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener datos resumidos para las tarjetas superiores.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 12: $prestamos    = $model->listar($id_mayordomo);
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/MayordomoPrestamo.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 13: $titulo_pagina = 'Prestamos - AgroFinca';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir el título que usará el layout de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 14: $modulo_activo = 'prestamos';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar al sidebar qué opción del menú debe aparecer activa.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 15: $css_extra     = 'styles/modulos.css';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar qué hoja de estilos adicional debe cargarse para este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 16: require_once __DIR__ . '/includes/sidebar.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/sidebar.php, que abre el layout, sidebar, topbar y panel de notificaciones.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 17: ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 18: <div class="mod-header">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 19:   <div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 20:     <h1 class="mod-titulo">Gestión de Préstamos</h1>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h1.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 21:     <p class="mod-subtitulo">Aprueba, niega y registra devolución de herramientas solicitadas por trabajadores</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 22:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 23: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 24: <div class="pres-resumen">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 25:   <div class="lote-card-stat lote-stat-verde">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 26:     <span class="lote-stat-label">Total Préstamos</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 27:     <span class="lote-stat-valor"><?= $resumen['total'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 28:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 29:   <div class="lote-card-stat lote-stat-amarillo">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 30:     <span class="lote-stat-label">Pendientes</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 31:     <span class="lote-stat-valor"><?= $resumen['pendientes'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 32:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 33:   <div class="lote-card-stat lote-stat-azul">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 34:     <span class="lote-stat-label">Aprobados</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 35:     <span class="lote-stat-valor"><?= $resumen['aprobados'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 36:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 37:   <div class="lote-card-stat" style="background:#f0fdf4;border:1px solid #bbf7d0;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 38:     <span class="lote-stat-label">Devueltos</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 39:     <span class="lote-stat-valor" style="color:#166534;"><?= $resumen['devueltos'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 40:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 41: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 42: <div class="buscador-wrap buscador-con-filtro" style="margin-bottom:16px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 43:   <input type="text" id="inputBusqueda" class="buscador" placeholder="Buscar por trabajador o herramienta..." oninput="filtrarTabla()">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (filtrarTabla()) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 44:   <select class="select-filtro" id="filtroEstado" onchange="filtrarTabla()">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (filtrarTabla()) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 45:     <option value="">Todos los estados</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 46:     <option value="PENDIENTE">Pendiente</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 47:     <option value="APROBADO">Aprobada</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 48:     <option value="NEGADO">Negada</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 49:     <option value="DEVUELTO">Devuelta</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 50:   </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 51: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 52: <div id="msgGlobal" class="msg-form" style="display:none;margin-bottom:12px;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 53: <div class="tabla-wrap">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 54:   <table class="tabla" id="tablaPrestamos">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una tabla para mostrar registros.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 55:     <thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 56:       <tr><th>Trabajador</th><th>Herramienta</th><th>Cantidad</th><th>Fecha Solicitud</th><th>Estado</th><th>Acciones</th></tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 57:     </thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 58:     <tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 59:       <?php if (empty($prestamos)): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 60:         <tr><td colspan="6" class="tabla-vacia">No hay préstamos registrados</td></tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 61:       <?php else: foreach ($prestamos as $p):
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 62:         [$cls,$lbl] = match($p['estado_prestamo']) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 63:           'PENDIENTE' => ['badge-pres-pendiente','Pendiente'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 64:           'APROBADO'  => ['badge-pres-aprobado', 'Aprobada'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 65:           'NEGADO'    => ['badge-pres-negado',   'Negada'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 66:           'DEVUELTO'  => ['badge-pres-devuelto', 'Devuelta'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 67:           default     => ['badge-inactivo', htmlspecialchars($p['estado_prestamo'])],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 68:         };
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 69:       ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 70:         <tr data-busqueda="<?= strtolower(htmlspecialchars(($p['trabajador']??'').' '.($p['herramientas']??''))) ?>"
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 71:             data-estado="<?= htmlspecialchars($p['estado_prestamo']) ?>">
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 72:           <td><?= htmlspecialchars($p['trabajador']) ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 73:           <td class="pres-herr-celda"><?= htmlspecialchars($p['herramientas'] ?? '—') ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 74:           <td><?= (int)($p['cantidad_total'] ?? 0) ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 75:           <td><?= htmlspecialchars($p['fecha_solicitud']) ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 76:           <td><span class="badge <?= $cls ?>"><?= $lbl ?></span></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 77:           <td class="acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 78:             <button class="btn-icono" title="Ver detalle" onclick="verDetalle(<?= $p['id_prestamo'] ?>)">👁</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (verDetalle(<?= $p['id_prestamo'] ?>)) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 79:             <?php if ($p['estado_prestamo'] === 'PENDIENTE'): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 80:               <button class="btn-pres btn-aprobar" onclick="accionPrestamo(<?= $p['id_prestamo'] ?>,'aprobar')">✓ Aprobar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (accionPrestamo(<?= $p['id_prestamo'] ?>,'aprobar')) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 81:               <button class="btn-pres btn-negar"   onclick="abrirModalNegar(<?= $p['id_prestamo'] ?>,'<?= addslashes($p['trabajador']) ?>')">✕ Negar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (abrirModalNegar(<?= $p['id_prestamo'] ?>,'<?= addslashes($p['trabajador']) ?>')) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 82:             <?php elseif ($p['estado_prestamo'] === 'APROBADO'): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 83:               <button class="btn-pres btn-devolucion" onclick="abrirModalDevolucion(<?= $p['id_prestamo'] ?>,'<?= addslashes($p['trabajador']) ?>')">Registrar Devolución</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (abrirModalDevolucion(<?= $p['id_prestamo'] ?>,'<?= addslashes($p['trabajador']) ?>')) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 84:             <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 85:           </td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 86:         </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 87:       <?php endforeach; endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 88:     </tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 89:   </table>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 90: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 91: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 92: <!-- MODAL NEGAR -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 93: <div class="modal-overlay" id="modalNegar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 94:   <div class="modal" style="max-width:440px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 95:     <h2 class="modal-titulo" id="tituloNegar">Negar Préstamo</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 96:     <div id="msgModalNegar" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 97:     <form id="formNegar" onsubmit="submitNegar(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitNegar(event)) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 98:       <input type="hidden" name="accion" value="negar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 99:       <input type="hidden" name="id" id="negarId">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 100:       <div class="form-group" style="margin-bottom:16px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 101:         <label for="negarObs">Motivo / Observación</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 102:         <textarea id="negarObs" name="observacion" rows="3" class="tarea-textarea" placeholder="Indica el motivo del rechazo (opcional)"></textarea>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo textarea.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 103:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 104:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 105:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalNegar')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalNegar')) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 106:         <button type="submit" class="btn-primary" style="background:#dc2626;" id="btnNegar">Negar Préstamo</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 107:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 108:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 109:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 110: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 111: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 112: <!-- MODAL DEVOLUCIÓN -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 113: <div class="modal-overlay" id="modalDevolucion">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 114:   <div class="modal" style="max-width:480px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 115:     <h2 class="modal-titulo" id="tituloDevolucion">Registrar Devolución</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 116:     <div id="msgModalDevolucion" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 117:     <form id="formDevolucion" onsubmit="submitDevolucion(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitDevolucion(event)) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 118:       <input type="hidden" name="accion" value="registrar_devolucion">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 119:       <input type="hidden" name="id" id="devId">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 120:       <div class="form-grid-2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 121:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 122:           <label for="devFecha">Fecha Devolución *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 123:           <input type="date" id="devFecha" name="fecha_devolucion" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 124:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 125:         <div class="form-group">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 126:           <label for="devEstado">Estado de las Herramientas *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 127:           <select id="devEstado" name="estado_devolucion" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 128:             <option value="BUENO">Buen estado</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 129:             <option value="DAÑADO">Dañado</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 130:             <option value="PARCIAL">Devolución parcial</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 131:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 132:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 133:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 134:           <label for="devObs">Observación</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 135:           <textarea id="devObs" name="observacion" rows="2" class="tarea-textarea" placeholder="Notas sobre la devolución (opcional)"></textarea>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo textarea.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 136:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 137:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 138:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 139:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalDevolucion')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalDevolucion')) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 140:         <button type="submit" class="btn-primary" id="btnDevolucion">Registrar Devolución</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 141:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 142:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 143:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 144: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 145: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 146: <!-- MODAL VER DETALLE -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 147: <div class="modal-overlay" id="modalDetalle">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 148:   <div class="modal" style="max-width:520px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 149:     <h2 class="modal-titulo">Detalle del Préstamo</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 150:     <div id="detalleContenido" style="min-height:80px;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 151:     <div class="modal-acciones" style="margin-top:16px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 152:       <button class="btn-primary" onclick="cerrarModal('modalDetalle')">Cerrar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalDetalle')) y con controllers/MayordomoPrestamoController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 153:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 154:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 155: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 156: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 157: <style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 158:   .pres-resumen { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:24px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 159:   .badge-pres-pendiente { background:#fef3c7; color:#92400e; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 160:   .badge-pres-aprobado  { background:#dcfce7; color:#166534; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 161:   .badge-pres-negado    { background:#fdecea; color:#b91c1c; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 162:   .badge-pres-devuelto  { background:#dbeafe; color:#1e40af; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 163:   .pres-herr-celda { max-width:180px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; font-size:13px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 164:   .btn-pres { border:none; border-radius:6px; padding:5px 12px; font-size:12px; font-weight:600; cursor:pointer; transition:opacity 0.15s; white-space:nowrap; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 165:   .btn-pres:hover { opacity:0.82; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 166:   .btn-aprobar   { background:#dcfce7; color:#166534; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 167:   .btn-negar     { background:#fdecea; color:#b91c1c; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 168:   .btn-devolucion{ background:#dbeafe; color:#1e40af; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 169:   .herr-fila { display:none; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 170:   .herr-select { display:none; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 171:   .herr-cant { display:none; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 172:   .btn-add-herr { display:none; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 173:   .btn-remove-herr { display:none; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 174:   .tarea-textarea { width:100%; border:1px solid #d1d5db; border-radius:8px; padding:8px 12px; font-size:14px; font-family:inherit; resize:vertical; outline:none; transition:border-color 0.2s; color:#111827; background:#fff; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 175:   .tarea-textarea:focus { border-color:#2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 176:   .form-group select { height:40px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 177:   .form-group select:focus { border-color:#2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 178:   .select-filtro { height:42px; border:1px solid #e5e7eb; border-radius:8px; padding:0 12px; font-size:14px; color:#374151; background:#fff; outline:none; cursor:pointer; min-width:160px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 179:   .select-filtro:focus { border-color:#2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 180:   .buscador-con-filtro { display:flex; gap:12px; align-items:center; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 181:   .detalle-herr-tabla { width:100%; border-collapse:collapse; font-size:13px; margin-top:8px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 182:   .detalle-herr-tabla th { background:#f9fafb; padding:8px 12px; text-align:left; font-weight:600; color:#374151; border-bottom:1px solid #e5e7eb; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 183:   .detalle-herr-tabla td { padding:8px 12px; border-bottom:1px solid #f3f4f6; color:#374151; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 184:   @media (max-width:900px) { .pres-resumen { grid-template-columns:1fr 1fr; } }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 185:   @media (max-width:560px) { .pres-resumen { grid-template-columns:1fr; } .buscador-con-filtro { flex-wrap:wrap; } }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 186: </style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 187: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 188: <script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 189: const CTRL = '../../controllers/MayordomoPrestamoController.php';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con controllers/MayordomoPrestamoController.php, que recibe las peticiones fetch de esta pantalla.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 190: const hoy  = new Date().toISOString().split('T')[0];
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoPrestamo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 191: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 192: function mostrarMsg(id, texto, tipo) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 193:   const el = document.getElementById(id);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 194:   if (!el) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 195:   el.textContent = texto;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 196:   el.className = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 197:   el.style.display = 'block';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 198:   setTimeout(() => { el.style.display = 'none'; }, 4500);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 199: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 200: function recargar() { setTimeout(() => location.reload(), 800); }
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Declarar una función JavaScript que controla una interacción de la pantalla.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 201: function cerrarModal(id) { document.getElementById(id).classList.remove('modal-visible'); }
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Declarar una función JavaScript que controla una interacción de la pantalla.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 202: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 203: function filtrarTabla() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 204:   const q = document.getElementById('inputBusqueda').value.toLowerCase();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 205:   const estado = document.getElementById('filtroEstado').value;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 206:   document.querySelectorAll('#tablaPrestamos tbody tr[data-busqueda]').forEach(tr => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 207:     const matchQ = tr.dataset.busqueda.includes(q);
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 208:     const matchE = !estado || tr.dataset.estado === estado;
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 209:     tr.style.display = (matchQ && matchE) ? '' : 'none';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 210:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 211: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 212: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 213: // APROBAR directo
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 214: async function accionPrestamo(id, accion) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 215:   const fd = new FormData();
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoPrestamo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 216:   fd.append('accion', accion); fd.append('id', id);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 217:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 218:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoPrestamoController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 219:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 220:     mostrarMsg('msgGlobal', json.mensaje, json.ok ? 'ok' : 'error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 221:     if (json.ok) recargar();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 222:   } catch { mostrarMsg('msgGlobal', 'Error de conexión', 'error'); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 223: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 224: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 225: // MODAL NEGAR
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 226: function abrirModalNegar(id, trabajador) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 227:   document.getElementById('negarId').value = id;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 228:   document.getElementById('tituloNegar').textContent = `Negar préstamo de "${trabajador}"`;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 229:   document.getElementById('negarObs').value = '';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 230:   document.getElementById('msgModalNegar').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 231:   document.getElementById('modalNegar').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 232: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 233: async function submitNegar(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 234:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 235:   const btn = document.getElementById('btnNegar');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 236:   btn.disabled = true; btn.textContent = 'Negando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 237:   const fd = new FormData(e.target);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoPrestamo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 238:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 239:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoPrestamoController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 240:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 241:     if (json.ok) { cerrarModal('modalNegar'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 242:     else { mostrarMsg('msgModalNegar', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Negar Préstamo'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 243:   } catch { mostrarMsg('msgModalNegar', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Negar Préstamo'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 244: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 245: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 246: // MODAL DEVOLUCIÓN
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 247: function abrirModalDevolucion(id, trabajador) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 248:   document.getElementById('devId').value = id;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 249:   document.getElementById('tituloDevolucion').textContent = `Devolución — ${trabajador}`;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 250:   document.getElementById('devFecha').value = hoy;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 251:   document.getElementById('devEstado').value = 'BUENO';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 252:   document.getElementById('devObs').value = '';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 253:   document.getElementById('msgModalDevolucion').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 254:   document.getElementById('modalDevolucion').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 255: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 256: async function submitDevolucion(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 257:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 258:   const btn = document.getElementById('btnDevolucion');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 259:   btn.disabled = true; btn.textContent = 'Registrando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 260:   const fd = new FormData(e.target);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/MayordomoPrestamo.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 261:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 262:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoPrestamoController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 263:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 264:     if (json.ok) { cerrarModal('modalDevolucion'); mostrarMsg('msgGlobal', json.mensaje, 'ok'); recargar(); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 265:     else { mostrarMsg('msgModalDevolucion', json.mensaje, 'error'); btn.disabled = false; btn.textContent = 'Registrar Devolución'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 266:   } catch { mostrarMsg('msgModalDevolucion', 'Error de conexión', 'error'); btn.disabled = false; btn.textContent = 'Registrar Devolución'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 267: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 268: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 269: // VER DETALLE (fetch al servidor)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 270: async function verDetalle(id) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 271:   document.getElementById('detalleContenido').innerHTML = '<p style="color:#9ca3af;padding:16px;">Cargando...</p>';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 272:   document.getElementById('modalDetalle').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 273:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 274:     const res = await fetch(`${CTRL}?accion=detalle&id=${id}`);
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoPrestamoController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 275:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoPrestamoController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 276:     if (json.ok && json.detalle.length > 0) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 277:       let html = '<table class="detalle-herr-tabla"><thead><tr><th>Herramienta</th><th>Cantidad</th><th>Devuelta</th><th>Estado Dev.</th></tr></thead><tbody>';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una tabla para mostrar registros.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 278:       json.detalle.forEach(d => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 279:         html += `<tr><td>${d.herramienta}</td><td>${d.cantidad}</td><td>${d.cantidad_devuelta}</td><td>${d.estado_devolucion||'—'}</td></tr>`;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 280:       });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 281:       html += '</tbody></table>';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 282:       document.getElementById('detalleContenido').innerHTML = html;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 283:     } else {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 284:       document.getElementById('detalleContenido').innerHTML = '<p style="color:#9ca3af;padding:16px;">Sin detalle disponible.</p>';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 285:     }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 286:   } catch {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 287:     document.getElementById('detalleContenido').innerHTML = '<p style="color:#dc2626;padding:16px;">Error al cargar el detalle.</p>';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 288:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 289: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 290: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 291: document.querySelectorAll('.modal-overlay').forEach(overlay => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 292:   overlay.addEventListener('click', function(e) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 293:     if (e.target === this) this.classList.remove('modal-visible');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 294:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 295: });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 296: </script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/prestamos.php; según el contexto también depende de models/MayordomoPrestamo.php, controllers/MayordomoPrestamoController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 297: <?php require_once __DIR__ . '/includes/footer.php'; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/footer.php, que cierra el layout y carga JavaScript común.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Conclusión:
Este archivo pertenece a views/mayordomo/prestamos.php. Se apoya principalmente en models/MayordomoPrestamo.php, en controllers/MayordomoPrestamoController.php, en views/mayordomo/includes/sidebar.php y en views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css. Su función es construir la vista, cargar datos necesarios, mostrar tablas/formularios/modales y enviar acciones al controlador correspondiente cuando el usuario interactúa con el módulo.