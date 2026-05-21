# Documento: inventarios(1).php

Archivo del sistema: views/mayordomo/inventarios.php

Formato: explicación línea por línea, separada para copiar y pegar.

Regla aplicada: en “Con qué se conecta” se mencionan otros archivos del sistema o documentos necesarios para que funcione.



Línea 1: ﻿<?php
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
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
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 6: require_once __DIR__ . '/../../config/database.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 7: require_once __DIR__ . '/../../models/Inventario.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php porque ese modelo entrega los datos que esta vista muestra.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 8: $db           = (new Database())->conectar();
Qué hace exactamente: Crea la conexión PDO usando la clase Database.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Crear la conexión a la base de datos que usarán el modelo o las consultas.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 9: $model        = new Inventario($db);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Crear el modelo que consulta, registra o actualiza datos relacionados con este módulo.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 10: $tab          = $_GET['tab'] ?? 'herramientas';
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 11: $resumen      = $model->resumen();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener datos resumidos para las tarjetas superiores.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 12: $herramientas = $model->listarHerramientas();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 13: $insumos      = $model->listarInsumos();
Qué hace exactamente: Llama un método del modelo para obtener o preparar información.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php; esa llamada trae datos desde la base de datos para esta vista.
Para qué sirve: Obtener registros para llenar tablas o selects de la vista.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 14: $titulo_pagina = 'Inventarios - AgroFinca';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir el título que usará el layout de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 15: $modulo_activo = 'inventarios';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar al sidebar qué opción del menú debe aparecer activa.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 16: $css_extra     = 'styles/modulos.css';
Qué hace exactamente: Asigna una variable de configuración usada por el layout.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Indicar qué hoja de estilos adicional debe cargarse para este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 17: require_once __DIR__ . '/includes/sidebar.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/sidebar.php, que abre el layout, sidebar, topbar y panel de notificaciones.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 18: ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 19: <div class="mod-header">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 20:   <div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 21:     <h1 class="mod-titulo">Gestión de Inventarios</h1>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h1.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 22:     <p class="mod-subtitulo">Administra las bodegas de herramientas e insumos</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 23:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 24: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 25: <div class="inv-resumen-may">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 26:   <div class="lote-card-stat lote-stat-verde">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 27:     <span class="lote-stat-label">Herramientas Disponibles</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 28:     <span class="lote-stat-valor"><?= $resumen['herramientas_disponibles'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 29:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 30:   <div class="lote-card-stat lote-stat-amarillo">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 31:     <span class="lote-stat-label">En Mantenimiento</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 32:     <span class="lote-stat-valor"><?= $resumen['herramientas_mantenimiento'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 33:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 34:   <div class="lote-card-stat" style="background:#fef2f2;border:1px solid #fecaca;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 35:     <span class="lote-stat-label">Herramientas Dañadas</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 36:     <span class="lote-stat-valor" style="color:#dc2626;"><?= $resumen['herramientas_danadas'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 37:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 38:   <div class="lote-card-stat lote-stat-azul">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 39:     <span class="lote-stat-label">Insumos en Alerta</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 40:     <span class="lote-stat-valor" style="color:#1e40af;"><?= $resumen['insumos_alerta'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 41:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 42: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 43: <div class="tabs-wrap">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 44:   <a href="inventarios.php?tab=herramientas" class="tab <?= $tab==='herramientas'?'tab-activo':'' ?>">🔧 Bodega 1 - Herramientas</a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 45:   <a href="inventarios.php?tab=insumos"      class="tab <?= $tab==='insumos'?'tab-activo':'' ?>">🧪 Bodega 2 - Insumos</a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 46: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 47: <?php if ($tab === 'herramientas'): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 48: <div class="mod-header" style="margin-bottom:16px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 49:   <h2 style="font-size:17px;font-weight:700;color:#111827;margin:0;">Herramientas</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 50:   <button class="btn-primary" onclick="abrirModalHerramienta()">+ Registrar Herramienta</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (abrirModalHerramienta()) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 51: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 52: <div id="msgHerramienta" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 53: <div class="tabla-wrap">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 54:   <table class="tabla">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una tabla para mostrar registros.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 55:     <thead><tr><th>Foto</th><th>ID</th><th>Nombre</th><th>Cantidad</th><th>Estado</th><th>Fecha Registro</th><th>Acciones</th></tr></thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 56:     <tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 57:       <?php if (empty($herramientas)): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 58:         <tr><td colspan="7" class="tabla-vacia">No hay herramientas registradas</td></tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 59:       <?php else: foreach ($herramientas as $h):
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 60:         $estado = strtoupper($h['estado'] ?? '');
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 61:         [$cls,$label] = match($estado) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 62:           'DISPONIBLE'    => ['badge-activo','Disponible'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 63:           'EN LABOR','EN_LABOR' => ['badge-labor','En labor'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 64:           'MANTENIMIENTO' => ['badge-mant','Mantenimiento'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 65:           'DAÑADA','DANADA' => ['badge-danada','Dañada'],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 66:           default => ['badge-inactivo', htmlspecialchars($h['estado']??'—')],
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 67:         };
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 68:         $fotoSrc = !empty($h['foto_referencia']) ? '../../uploads/inventario/'.htmlspecialchars($h['foto_referencia']) : null;
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 69:       ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 70:         <tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 71:           <td><?php if($fotoSrc): ?><img src="<?=$fotoSrc?>" class="tabla-foto" onclick="verFoto('<?=$fotoSrc?>','<?=addslashes($h['nombre'])?>')"><?php else: ?><div class="tabla-foto-vacia">📷</div><?php endif; ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (verFoto('<?=$fotoSrc?>','<?=addslashes($h['nombre'])?>')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 72:           <td><?=$h['id_herramienta']?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 73:           <td><?=htmlspecialchars($h['nombre'])?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 74:           <td><?=$h['cantidad_total']?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 75:           <td><span class="badge <?=$cls?>"><?=$label?></span></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 76:           <td><?=htmlspecialchars($h['fecha_registro']??'—')?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 77:           <td class="acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 78:             <button class="btn-icono" title="Editar" onclick="editarHerramienta(<?=$h['id_herramienta']?>,'<?=addslashes($h['nombre'])?>',<?=$h['cantidad_total']?>,'<?=$h['estado']?>','<?=$h['fecha_registro']?>','<?=$fotoSrc??''?>')">✏️</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (editarHerramienta(<?=$h['id_herramienta']?>,'<?=addslashes($h['nombre'])?>',<?=$h['cantidad_total']?>,'<?=$h['estado']?>','<?=$h['fecha_registro']?>','<?=$fotoSrc??''?>')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 79:           </td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 80:         </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 81:       <?php endforeach; endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 82:     </tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 83:   </table>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 84: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 85: <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 86: <?php if ($tab === 'insumos'): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 87: <div class="mod-header" style="margin-bottom:16px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 88:   <h2 style="font-size:17px;font-weight:700;color:#111827;margin:0;">Insumos</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 89:   <button class="btn-primary" onclick="abrirModalInsumo()">+ Registrar Insumo</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (abrirModalInsumo()) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 90: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 91: <div id="msgInsumo" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 92: <div class="tabla-wrap">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 93:   <table class="tabla">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una tabla para mostrar registros.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 94:     <thead><tr><th>Foto</th><th>ID</th><th>Nombre</th><th>Stock Actual</th><th>Unidad</th><th>Stock Mínimo</th><th>Vencimiento</th><th>Estado</th><th>Fecha Registro</th><th>Acciones</th></tr></thead>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo thead.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 95:     <tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 96:       <?php if (empty($insumos)): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 97:         <tr><td colspan="10" class="tabla-vacia">No hay insumos registrados</td></tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 98:       <?php else: foreach ($insumos as $i):
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 99:         $enAlerta = ($i['stock_actual'] <= $i['cantidad_minima']);
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 100:         $clsStock = $enAlerta ? 'badge-danada' : 'badge-activo';
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 101:         $lblStock = $enAlerta ? 'Stock crítico' : 'Normal';
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 102:         $fotoSrc  = !empty($i['foto_referencia']) ? '../../uploads/inventario/'.htmlspecialchars($i['foto_referencia']) : null;
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 103:       ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 104:         <tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 105:           <td><?php if($fotoSrc): ?><img src="<?=$fotoSrc?>" class="tabla-foto" onclick="verFoto('<?=$fotoSrc?>','<?=addslashes($i['nombre'])?>')"><?php else: ?><div class="tabla-foto-vacia">📷</div><?php endif; ?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (verFoto('<?=$fotoSrc?>','<?=addslashes($i['nombre'])?>')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 106:           <td><?=$i['id_insumo']?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 107:           <td><?=htmlspecialchars($i['nombre'])?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 108:           <td><strong><?=number_format($i['stock_actual'],2)?></strong></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 109:           <td><?=htmlspecialchars($i['unidad_medida']??'—')?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 110:           <td><?=$i['cantidad_minima']!==null?number_format($i['cantidad_minima'],2):'—'?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 111:           <td><?=htmlspecialchars($i['fecha_vencimiento']??'—')?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 112:           <td><span class="badge <?=$clsStock?>"><?=$lblStock?></span></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 113:           <td><?=htmlspecialchars($i['fecha_registro']??'—')?></td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 114:           <td class="acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Construir la estructura de filas y columnas de la tabla.
Qué pasaría si se quita: La tabla podría quedar incompleta o mal formada visualmente.

Línea 115:             <button class="btn-icono" title="Editar" onclick="editarInsumo(<?=$i['id_insumo']?>,'<?=addslashes($i['nombre'])?>',<?=$i['stock_actual']?>,'<?=addslashes($i['unidad_medida']??'')?>','<?=$i['fecha_vencimiento']??''?>',<?=$i['cantidad_minima']??0?>,'<?=$i['fecha_registro']??''?>','<?=$fotoSrc??''?>')">✏️</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (editarInsumo(<?=$i['id_insumo']?>,'<?=addslashes($i['nombre'])?>',<?=$i['stock_actual']?>,'<?=addslashes($i['unidad_medida']??'')?>','<?=$i['fecha_vencimiento']??''?>',<?=$i['cantidad_minima']??0?>,'<?=$i['fecha_registro']??''?>','<?=$fotoSrc??''?>')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 116:           </td>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo td.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 117:         </tr>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tr.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 118:       <?php endforeach; endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 119:     </tbody>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo tbody.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 120:   </table>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo table.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 121: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 122: <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 123: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 124: <!-- MODAL HERRAMIENTA -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 125: <div class="modal-overlay" id="modalHerramienta">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 126:   <div class="modal">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 127:     <h2 class="modal-titulo" id="tituloModalH">Registrar Herramienta</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 128:     <div id="msgModalH" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 129:     <form id="formH" onsubmit="submitH(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitH(event)) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 130:       <input type="hidden" id="hId" name="id">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 131:       <input type="hidden" id="hAccion" name="accion" value="crear_herramienta">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 132:       <div class="form-grid-2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 133:         <div class="form-group" style="grid-column:1/-1;"><label>Nombre *</label><input type="text" id="hNombre" name="nombre" required maxlength="100"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 134:         <div class="form-group"><label>Cantidad *</label><input type="number" id="hCantidad" name="cantidad" min="1" required></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 135:         <div class="form-group"><label>Estado *</label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 136:           <select id="hEstado" name="estado" required>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear una lista desplegable para seleccionar una opción.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 137:             <option value="DISPONIBLE">Disponible</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 138:             <option value="EN LABOR">En labor</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 139:             <option value="MANTENIMIENTO">Mantenimiento</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 140:             <option value="DAÑADA">Dañada</option>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo option.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Crear una opción dentro de un select.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 141:           </select>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo select.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 142:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 143:         <div class="form-group"><label>Fecha Registro *</label><input type="date" id="hFecha" name="fecha" required></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 144:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 145:           <label>Foto <span id="hFotoReq" style="color:#dc2626;">*</span></label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 146:           <div class="foto-upload-wrap" id="hFotoWrap" onclick="document.getElementById('hFoto').click()">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (document.getElementById('hFoto').click()) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 147:             <img id="hFotoPreview" src="" style="display:none;max-width:100%;max-height:160px;border-radius:6px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo img.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 148:             <div id="hFotoPlaceholder" class="foto-upload-placeholder"><span class="foto-upload-icon">📷</span><span class="foto-upload-texto">Haz clic para subir una foto</span><span class="foto-upload-hint">JPG, PNG o WEBP · máx. 3 MB</span></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 149:           </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 150:           <input type="file" id="hFoto" name="foto" accept="image/jpeg,image/png,image/webp" style="display:none;" onchange="previewFoto(this,'hFotoPreview','hFotoPlaceholder','hFotoWrap')">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (previewFoto(this,'hFotoPreview','hFotoPlaceholder','hFotoWrap')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 151:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 152:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 153:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 154:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalHerramienta')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalHerramienta')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 155:         <button type="submit" class="btn-primary" id="btnH">Registrar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 156:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 157:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 158:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 159: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 160: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 161: <!-- MODAL INSUMO -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 162: <div class="modal-overlay" id="modalInsumo">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 163:   <div class="modal">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 164:     <h2 class="modal-titulo" id="tituloModalI">Registrar Insumo</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 165:     <div id="msgModalI" class="msg-form" style="display:none;"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 166:     <form id="formI" onsubmit="submitI(event)">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (submitI(event)) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 167:       <input type="hidden" id="iId" name="id">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 168:       <input type="hidden" id="iAccion" name="accion" value="crear_insumo">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 169:       <div class="form-grid-2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 170:         <div class="form-group" style="grid-column:1/-1;"><label>Nombre *</label><input type="text" id="iNombre" name="nombre" required maxlength="100"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 171:         <div class="form-group"><label>Stock Actual *</label><input type="number" id="iStock" name="stock" min="0" step="0.01" required></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 172:         <div class="form-group"><label>Unidad de Medida</label><input type="text" id="iUnidad" name="unidad" maxlength="50"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 173:         <div class="form-group"><label>Stock Mínimo</label><input type="number" id="iMinimo" name="minimo" min="0" step="0.01"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 174:         <div class="form-group"><label>Fecha Vencimiento</label><input type="date" id="iVencimiento" name="vencimiento"></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 175:         <div class="form-group"><label>Fecha Registro *</label><input type="date" id="iFecha" name="fecha" required></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: Faltaría un campo o formulario necesario para capturar datos del usuario.

Línea 176:         <div class="form-group" style="grid-column:1/-1;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 177:           <label>Foto <span id="iFotoReq" style="color:#dc2626;">*</span></label>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo label.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 178:           <div class="foto-upload-wrap" id="iFotoWrap" onclick="document.getElementById('iFoto').click()">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (document.getElementById('iFoto').click()) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 179:             <img id="iFotoPreview" src="" style="display:none;max-width:100%;max-height:160px;border-radius:6px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo img.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 180:             <div id="iFotoPlaceholder" class="foto-upload-placeholder"><span class="foto-upload-icon">📷</span><span class="foto-upload-texto">Haz clic para subir una foto</span><span class="foto-upload-hint">JPG, PNG o WEBP · máx. 3 MB</span></div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 181:           </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 182:           <input type="file" id="iFoto" name="foto" accept="image/jpeg,image/png,image/webp" style="display:none;" onchange="previewFoto(this,'iFotoPreview','iFotoPlaceholder','iFotoWrap')">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo input.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (previewFoto(this,'iFotoPreview','iFotoPlaceholder','iFotoWrap')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un campo de formulario para capturar o guardar un dato.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 183:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 184:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 185:       <div class="modal-acciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 186:         <button type="button" class="btn-cancelar" onclick="cerrarModal('modalInsumo')">Cancelar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalInsumo')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 187:         <button type="submit" class="btn-primary" id="btnI">Registrar</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 188:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 189:     </form>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo form.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 190:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 191: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 192: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 193: <!-- MODAL FOTO AMPLIADA -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 194: <div class="modal-overlay" id="modalFoto" onclick="cerrarModal('modalFoto')">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalFoto')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 195:   <div class="modal-foto-inner" onclick="event.stopPropagation()">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (event.stopPropagation()) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 196:     <button class="modal-foto-cerrar" onclick="cerrarModal('modalFoto')">✕</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarModal('modalFoto')) y con controllers/InventarioController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 197:     <img id="modalFotoImg" src="" alt="">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo img.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 198:     <p id="modalFotoNombre" style="text-align:center;font-size:14px;color:#6b7280;margin-top:10px;"></p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 199:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 200: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 201: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 202: <style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 203:   .inv-resumen-may { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; margin-bottom:24px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 204:   .badge-mant   { background:#fef3c7; color:#92400e; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 205:   .badge-danada { background:#fdecea; color:#b91c1c; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 206:   .tabs-wrap { display:flex; gap:4px; border-bottom:2px solid #e5e7eb; margin-bottom:24px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 207:   .tab { padding:10px 18px; font-size:14px; font-weight:500; color:#6b7280; text-decoration:none; border-bottom:2px solid transparent; margin-bottom:-2px; transition:color 0.15s,border-color 0.15s; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 208:   .tab:hover { color:#2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 209:   .tab-activo { color:#2e9e4f; border-bottom-color:#2e9e4f; font-weight:600; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 210:   .tabla-foto { width:48px; height:48px; object-fit:cover; border-radius:8px; border:1px solid #e5e7eb; cursor:zoom-in; transition:transform 0.15s,box-shadow 0.15s; display:block; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 211:   .tabla-foto:hover { transform:scale(1.08); box-shadow:0 4px 12px rgba(0,0,0,0.15); }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 212:   .tabla-foto-vacia { width:48px; height:48px; border-radius:8px; border:1px dashed #d1d5db; background:#f9fafb; display:flex; align-items:center; justify-content:center; font-size:20px; color:#9ca3af; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 213:   .foto-upload-wrap { border:2px dashed #d1d5db; border-radius:10px; padding:16px; cursor:pointer; transition:border-color 0.2s,background 0.2s; display:flex; align-items:center; justify-content:center; min-height:110px; background:#fafafa; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 214:   .foto-upload-wrap:hover { border-color:#2e9e4f; background:#f0fdf4; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 215:   .foto-upload-wrap.tiene-foto { border-color:#2e9e4f; border-style:solid; padding:6px; min-height:auto; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 216:   .foto-upload-placeholder { display:flex; flex-direction:column; align-items:center; gap:4px; pointer-events:none; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 217:   .foto-upload-icon { font-size:28px; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 218:   .foto-upload-texto { font-size:13px; font-weight:600; color:#374151; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 219:   .foto-upload-hint { font-size:11px; color:#9ca3af; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 220:   .modal-foto-inner { position:relative; background:#fff; border-radius:14px; padding:20px; max-width:560px; width:90%; box-shadow:0 20px 60px rgba(0,0,0,0.3); }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 221:   .modal-foto-inner img { width:100%; max-height:420px; object-fit:contain; border-radius:8px; display:block; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 222:   .modal-foto-cerrar { position:absolute; top:10px; right:12px; background:#f3f4f6; border:none; border-radius:50%; width:30px; height:30px; font-size:14px; cursor:pointer; display:flex; align-items:center; justify-content:center; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 223:   .modal-foto-cerrar:hover { background:#e5e7eb; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 224:   .form-group select { height:40px; border:1px solid #d1d5db; border-radius:8px; padding:0 12px; font-size:14px; color:#111827; outline:none; transition:border-color 0.2s; background:#fff; cursor:pointer; width:100%; font-family:inherit; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 225:   .form-group select:focus { border-color:#2e9e4f; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 226:   @media (max-width:768px) { .inv-resumen-may { grid-template-columns:1fr 1fr; } }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 227:   @media (max-width:480px) { .inv-resumen-may { grid-template-columns:1fr; } }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 228: </style>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo style.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Abrir o cerrar estilos CSS internos propios de esta vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 229: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 230: <script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 231: const CTRL = '../../controllers/MayordomoInventarioController.php';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con controllers/InventarioController.php, que recibe las peticiones fetch de esta pantalla.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 232: const hoy  = new Date().toISOString().split('T')[0];
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 233: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 234: function mostrarMsg(id, texto, tipo) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 235:   const el = document.getElementById(id);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 236:   if (!el) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 237:   el.textContent = texto;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 238:   el.className = 'msg-form ' + (tipo === 'ok' ? 'msg-ok' : 'msg-error');
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 239:   el.style.display = 'block';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 240:   setTimeout(() => { el.style.display = 'none'; }, 4000);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 241: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 242: function recargar() { setTimeout(() => location.reload(), 800); }
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Declarar una función JavaScript que controla una interacción de la pantalla.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 243: function cerrarModal(id) { document.getElementById(id).classList.remove('modal-visible'); }
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Declarar una función JavaScript que controla una interacción de la pantalla.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 244: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 245: function previewFoto(input, previewId, placeholderId, wrapId) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 246:   const file = input.files[0];
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 247:   if (!file) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 248:   if (file.size > 3 * 1024 * 1024) { alert('La imagen no puede superar 3 MB'); input.value = ''; return; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 249:   const reader = new FileReader();
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 250:   reader.onload = (e) => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 251:     const preview = document.getElementById(previewId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 252:     const placeholder = document.getElementById(placeholderId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 253:     const wrap = document.getElementById(wrapId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 254:     preview.src = e.target.result; preview.style.display = 'block';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 255:     placeholder.style.display = 'none'; wrap.classList.add('tiene-foto');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 256:   };
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 257:   reader.readAsDataURL(file);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 258: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 259: function resetFotoWrap(previewId, placeholderId, wrapId) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 260:   const preview = document.getElementById(previewId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 261:   const placeholder = document.getElementById(placeholderId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 262:   const wrap = document.getElementById(wrapId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 263:   if (preview) { preview.src = ''; preview.style.display = 'none'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 264:   if (placeholder) { placeholder.style.display = 'flex'; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 265:   if (wrap) { wrap.classList.remove('tiene-foto'); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 266: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 267: function cargarFotoExistente(src, previewId, placeholderId, wrapId) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 268:   if (!src) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 269:   const preview = document.getElementById(previewId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 270:   const placeholder = document.getElementById(placeholderId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 271:   const wrap = document.getElementById(wrapId);
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 272:   preview.src = src; preview.style.display = 'block';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 273:   placeholder.style.display = 'none'; wrap.classList.add('tiene-foto');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 274: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 275: function verFoto(src, nombre) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 276:   document.getElementById('modalFotoImg').src = src;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 277:   document.getElementById('modalFotoNombre').textContent = nombre;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 278:   document.getElementById('modalFoto').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 279: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 280: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 281: // HERRAMIENTAS
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 282: function abrirModalHerramienta() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 283:   document.getElementById('tituloModalH').textContent = 'Registrar Herramienta';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 284:   document.getElementById('btnH').textContent = 'Registrar';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 285:   document.getElementById('hAccion').value = 'crear_herramienta';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 286:   document.getElementById('hId').value = '';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 287:   document.getElementById('formH').reset();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 288:   document.getElementById('hFecha').value = hoy;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 289:   document.getElementById('hFoto').required = true;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 290:   document.getElementById('hFotoReq').style.display = 'inline';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 291:   resetFotoWrap('hFotoPreview','hFotoPlaceholder','hFotoWrap');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 292:   document.getElementById('msgModalH').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 293:   document.getElementById('modalHerramienta').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 294: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 295: function editarHerramienta(id, nombre, cantidad, estado, fecha, fotoSrc) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 296:   document.getElementById('tituloModalH').textContent = 'Editar Herramienta';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 297:   document.getElementById('btnH').textContent = 'Guardar cambios';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 298:   document.getElementById('hAccion').value = 'editar_herramienta';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 299:   document.getElementById('hId').value = id;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 300:   document.getElementById('hNombre').value = nombre;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 301:   document.getElementById('hCantidad').value = cantidad;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 302:   document.getElementById('hEstado').value = estado;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 303:   document.getElementById('hFecha').value = fecha;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 304:   document.getElementById('hFoto').required = false;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 305:   document.getElementById('hFotoReq').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 306:   resetFotoWrap('hFotoPreview','hFotoPlaceholder','hFotoWrap');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 307:   if (fotoSrc) cargarFotoExistente(fotoSrc,'hFotoPreview','hFotoPlaceholder','hFotoWrap');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 308:   document.getElementById('msgModalH').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 309:   document.getElementById('modalHerramienta').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 310: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 311: async function submitH(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 312:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 313:   const btn = document.getElementById('btnH');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 314:   const accion = document.getElementById('hAccion').value;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 315:   if (accion === 'crear_herramienta' && !document.getElementById('hFoto').files.length) {
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 316:     mostrarMsg('msgModalH','Debes subir una foto de la herramienta','error'); return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 317:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 318:   btn.disabled = true; btn.textContent = 'Guardando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 319:   const fd = new FormData(document.getElementById('formH'));
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 320:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 321:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/InventarioController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 322:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 323:     if (json.ok) { cerrarModal('modalHerramienta'); mostrarMsg('msgHerramienta', json.mensaje, 'ok'); recargar(); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 324:     else { mostrarMsg('msgModalH', json.mensaje, 'error'); btn.disabled = false; btn.textContent = accion === 'crear_herramienta' ? 'Registrar' : 'Guardar cambios'; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 325:   } catch { mostrarMsg('msgModalH','Error de conexión','error'); btn.disabled = false; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 326: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 327: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 328: // INSUMOS
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 329: function abrirModalInsumo() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 330:   document.getElementById('tituloModalI').textContent = 'Registrar Insumo';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 331:   document.getElementById('btnI').textContent = 'Registrar';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 332:   document.getElementById('iAccion').value = 'crear_insumo';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 333:   document.getElementById('iId').value = '';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 334:   document.getElementById('formI').reset();
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 335:   document.getElementById('iFecha').value = hoy;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 336:   document.getElementById('iFoto').required = true;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 337:   document.getElementById('iFotoReq').style.display = 'inline';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 338:   resetFotoWrap('iFotoPreview','iFotoPlaceholder','iFotoWrap');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 339:   document.getElementById('msgModalI').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 340:   document.getElementById('modalInsumo').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 341: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 342: function editarInsumo(id, nombre, stock, unidad, vencimiento, minimo, fecha, fotoSrc) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 343:   document.getElementById('tituloModalI').textContent = 'Editar Insumo';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 344:   document.getElementById('btnI').textContent = 'Guardar cambios';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 345:   document.getElementById('iAccion').value = 'editar_insumo';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 346:   document.getElementById('iId').value = id;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 347:   document.getElementById('iNombre').value = nombre;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 348:   document.getElementById('iStock').value = stock;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 349:   document.getElementById('iUnidad').value = unidad;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 350:   document.getElementById('iVencimiento').value = vencimiento;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 351:   document.getElementById('iMinimo').value = minimo;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 352:   document.getElementById('iFecha').value = fecha;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 353:   document.getElementById('iFoto').required = false;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 354:   document.getElementById('iFotoReq').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 355:   resetFotoWrap('iFotoPreview','iFotoPlaceholder','iFotoWrap');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 356:   if (fotoSrc) cargarFotoExistente(fotoSrc,'iFotoPreview','iFotoPlaceholder','iFotoWrap');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 357:   document.getElementById('msgModalI').style.display = 'none';
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 358:   document.getElementById('modalInsumo').classList.add('modal-visible');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 359: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 360: async function submitI(e) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 361:   e.preventDefault();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evitar que el formulario recargue la página y permitir enviarlo con JavaScript.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 362:   const btn = document.getElementById('btnI');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 363:   const accion = document.getElementById('iAccion').value;
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 364:   if (accion === 'crear_insumo' && !document.getElementById('iFoto').files.length) {
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 365:     mostrarMsg('msgModalI','Debes subir una foto del insumo','error'); return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 366:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 367:   btn.disabled = true; btn.textContent = 'Guardando…';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 368:   const fd = new FormData(document.getElementById('formI'));
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con models/Inventario.php porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 369:   try {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 370:     const res = await fetch(CTRL, { method: 'POST', body: fd });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/InventarioController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 371:     const json = await res.json();
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/InventarioController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 372:     if (json.ok) { cerrarModal('modalInsumo'); mostrarMsg('msgInsumo', json.mensaje, 'ok'); recargar(); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 373:     else { mostrarMsg('msgModalI', json.mensaje, 'error'); btn.disabled = false; btn.textContent = accion === 'crear_insumo' ? 'Registrar' : 'Guardar cambios'; }
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: La funcionalidad puede seguir, pero el diseño de esa parte se vería afectado.

Línea 374:   } catch { mostrarMsg('msgModalI','Error de conexión','error'); btn.disabled = false; }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 375: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 376: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 377: document.querySelectorAll('.modal-overlay').forEach(overlay => {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 378:   overlay.addEventListener('click', function(e) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 379:     if (e.target === this) this.classList.remove('modal-visible');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 380:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 381: });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 382: </script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/inventarios.php; según el contexto también depende de models/Inventario.php, controllers/InventarioController.php, views/mayordomo/includes/sidebar.php y views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 383: <?php require_once __DIR__ . '/includes/footer.php'; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/includes/footer.php, que cierra el layout y carga JavaScript común.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Conclusión:
Este archivo pertenece a views/mayordomo/inventarios.php. Se apoya principalmente en models/Inventario.php, en controllers/InventarioController.php, en views/mayordomo/includes/sidebar.php y en views/mayordomo/styles/modulos.css y views/mayordomo/styles/dashboard.css. Su función es construir la vista, cargar datos necesarios, mostrar tablas/formularios/modales y enviar acciones al controlador correspondiente cuando el usuario interactúa con el módulo.