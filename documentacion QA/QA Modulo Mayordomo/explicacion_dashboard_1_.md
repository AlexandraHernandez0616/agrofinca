# Documento: dashboard(1).php

Archivo del sistema: views/mayordomo/dashboard.php

Formato: explicación línea por línea, separada para copiar y pegar.

Regla aplicada: en “Con qué se conecta” se mencionan otros archivos del sistema o documentos necesarios para que funcione.



Línea 1: ﻿<?php
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 2: /**
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 3:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 4:  * ARCHIVO: views/mayordomo/dashboard.php
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 5:  * PROPÓSITO: Dashboard operativo del mayordomo
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 6:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 7:  *
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 8:  * Protección de ruta:
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 9:  *   Solo usuarios con rol = 'MAYORDOMO' pueden acceder.
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 10:  *   Si no hay sesión o el rol es diferente → redirige al login.
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 11:  *
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 12:  * Datos que carga (via MayordomoDashboardController):
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 13:  *   Fila 1: Trabajadores Activos | Trabajadores en Labor | Asistencia Marcada Hoy
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 14:  *   Fila 2: Solicitudes Pendientes | Tareas Pendientes | Tareas en Progreso
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 15:  *   Fila 3: Préstamos Pendientes | Producción del Día (kg)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 16:  *   Panel izquierdo: Notificaciones Recientes
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 17:  *   Panel derecho:   Accesos Rápidos (4 botones)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 18:  *
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 19:  * Accesos rápidos conectados:
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 20:  *   Asignar Tarea    → tareas.php
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 21:  *   Aprobar Préstamo → prestamos.php
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 22:  *   Ver Solicitudes  → solicitudes.php
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 23:  *   Registrar Producción → produccion.php
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 24:  *
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 25:  * Estilos: views/mayordomo/styles/dashboard.css
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 26:  * Fuente:  Inter (Google Fonts)
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 27:  * ============================================================
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 28:  */
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 29: session_start();
Qué hace exactamente: Inicia o reanuda la sesión del usuario.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Activar la sesión para validar usuario, rol e información guardada al iniciar sesión.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 30: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 31: // ── Protección de ruta ────────────────────────────────────
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 32: if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'MAYORDOMO') {
Qué hace exactamente: Verifica si existe una sesión válida y si el rol del usuario coincide con MAYORDOMO.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Proteger la vista para que solo el rol correcto pueda usar este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 33:     header("Location: ../../views/usuarios/login.php");
Qué hace exactamente: Redirige al usuario a otra ruta.
Con qué se conecta en el sistema: Se conecta con views/usuarios/login.php porque redirige allí cuando el usuario no tiene permiso.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 34:     exit;
Qué hace exactamente: Detiene la ejecución del archivo después de una redirección o respuesta.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 35: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 36: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 37: // ── Dependencias ──────────────────────────────────────────
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 38: require_once __DIR__ . '/../../config/database.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 39: require_once __DIR__ . '/../../controllers/MayordomoDashboardController.php';
Qué hace exactamente: Importa un archivo PHP necesario para que esta vista funcione.
Con qué se conecta en el sistema: Se conecta con controllers/MayordomoDashboardController.php porque ese controlador prepara o procesa datos usados por la vista.
Para qué sirve: Cargar un archivo necesario una sola vez para usar sus clases o layout.
Qué pasaría si se quita: Faltaría una dependencia y podrían aparecer errores de clase no encontrada o layout incompleto.

Línea 40: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 41: // ── Conexión y datos ──────────────────────────────────────
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 42: $db         = (new Database())->conectar();
Qué hace exactamente: Crea la conexión PDO usando la clase Database.
Con qué se conecta en el sistema: Se conecta con config/database.php, que entrega la conexión PDO a la base de datos.
Para qué sirve: Crear la conexión a la base de datos que usarán el modelo o las consultas.
Qué pasaría si se quita: La vista no tendría datos para mostrar o no podría comunicarse con la base de datos.

Línea 43: $controller = new MayordomoDashboardController($db, $_SESSION['id_usuario']);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 44: $datos      = $controller->obtenerDatos();
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 45: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 46: // ── Helper tiempo relativo ────────────────────────────────
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 47: function tiempoRelativo($fecha) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 48:     if (empty($fecha)) return '';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 49:     $diff = time() - strtotime($fecha);
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 50:     if ($diff < 60)    return 'Hace ' . $diff . ' seg';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 51:     if ($diff < 3600)  return 'Hace ' . floor($diff / 60) . ' min';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 52:     if ($diff < 86400) return 'Hace ' . floor($diff / 3600) . ' h';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 53:     return 'Hace ' . floor($diff / 86400) . ' días';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 54: }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 55: ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 56: <!DOCTYPE html>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 57: <html lang="es">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo html.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 58: <head>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo head.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 59:   <meta charset="UTF-8" />
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo meta.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 60:   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo meta.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 61:   <title>Dashboard Mayordomo - AgroFinca</title>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo title.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 62:   <link rel="stylesheet" href="styles/dashboard.css" />
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo link.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/styles/dashboard.css para aplicar estilos visuales.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 63:   <link rel="preconnect" href="https://fonts.googleapis.com" />
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo link.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 64:   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo link.
Con qué se conecta en el sistema: Se conecta con views/mayordomo/styles/dashboard.css para aplicar estilos visuales.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 65: </head>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo head.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 66: <body>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo body.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 67: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 68: <!-- ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 69:      SIDEBAR
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 70:      Menú de navegación del mayordomo con 8 módulos.
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 71:      El ítem activo se marca con la clase CSS 'active'.
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 72: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 73: <aside class="sidebar" id="sidebar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo aside.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 74:   <div class="sidebar-logo">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 75:     <img src="../../img/logo.png" alt="AgroFinca" class="sidebar-logo-img" />
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo img.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 76:     <span>AgroFinca</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 77:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 78:   <nav class="sidebar-nav">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo nav.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 79:     <!-- Dashboard → esta misma página -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 80:     <a href="dashboard.php" class="nav-item active">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 81:       <span class="nav-icon">⊞</span> Dashboard
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 82:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 83:     <!-- Solicitudes → aprobación de nuevos trabajadores -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 84:     <a href="solicitudes.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 85:       <span class="nav-icon">📋</span> Solicitudes
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 86:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 87:     <!-- Trabajadores → listado de trabajadores asignados -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 88:     <a href="trabajadores.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 89:       <span class="nav-icon">👷</span> Trabajadores
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 90:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 91:     <!-- Cultivos → gestión de cultivos de la finca -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 92:     <a href="cultivos.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 93:       <span class="nav-icon">🌿</span> Cultivos
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 94:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 95:     <!-- Lotes → lotes de la finca -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 96:     <a href="lotes.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 97:       <span class="nav-icon">🌍</span> Lotes
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 98:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 99:     <!-- Tareas → asignación y seguimiento de tareas -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 100:     <a href="tareas.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 101:       <span class="nav-icon">✅</span> Tareas
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 102:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 103:     <!-- Inventarios → herramientas e insumos -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 104:     <a href="inventarios.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 105:       <span class="nav-icon">📦</span> Inventarios
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 106:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 107:     <!-- Préstamos → gestión de préstamos de herramientas -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 108:     <a href="prestamos.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 109:       <span class="nav-icon">🔑</span> Préstamos
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 110:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 111:     <!-- Producción → registro de producción diaria -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 112:     <a href="produccion.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 113:       <span class="nav-icon">📈</span> Producción
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 114:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 115:     <!-- Reportes → reportes operativos -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 116:     <a href="reportes.php" class="nav-item">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 117:       <span class="nav-icon">📊</span> Reportes
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 118:     </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 119:   </nav>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo nav.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 120: </aside>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo aside.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 121: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 122: <!-- ══════════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 123:      CONTENIDO PRINCIPAL
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 124: ══════════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 125: <div class="main-wrapper">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 126: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 127:   <!-- TOPBAR
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 128:        Muestra: título del sistema | badge rol | campana | nombre | cerrar sesión -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 129:   <header class="topbar">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo header.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 130:     <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Abrir menú">☰</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (toggleSidebar()) y con controllers/MayordomoDashboardController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 131:     <div class="topbar-title">Sistema de Gestión de Finca</div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 132:     <div class="topbar-right">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 133: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 134:       <!-- Badge de rol -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 135:       <span class="badge-rol">Mayordomo</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 136: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 137:       <!-- Campana de notificaciones -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 138:       <div class="notif-wrapper">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 139:         <button class="notif-btn" onclick="toggleNotifPanel()" aria-label="Notificaciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (toggleNotifPanel()) y con controllers/MayordomoDashboardController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 140:           🔔
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 141:           <?php
Qué hace exactamente: Abre el modo PHP del archivo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Permitir que el servidor ejecute instrucciones PHP antes de enviar HTML al navegador.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 142:             $no_leidas = count(array_filter($datos['notificaciones'], fn($n) => !$n['leida']));
Qué hace exactamente: Asigna o calcula una variable PHP usada después por la vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 143:             if ($no_leidas > 0):
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 144:           ?>
Qué hace exactamente: Cierra el modo PHP para continuar con HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Salir del bloque PHP y continuar escribiendo HTML.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 145:             <span class="notif-count"><?= $no_leidas ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 146:           <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 147:         </button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 148:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 149: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 150:       <!-- Nombre del mayordomo logueado (viene de $_SESSION) -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 151:       <span class="topbar-user">👤 <?= htmlspecialchars($_SESSION['username']) ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con el sistema de sesión PHP iniciado por el login y con views/usuarios/login.php cuando debe redirigir.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: Podría fallar la protección de acceso o permitir/ver datos sin validar correctamente el rol.

Línea 152: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 153:       <!-- Cerrar sesión → LogoutController destruye la sesión -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 154:       <a href="../../controllers/LogoutController.php" class="btn-logout">↪ Cerrar sesión</a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 155:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 156:   </header>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo header.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 157: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 158:   <!-- CONTENIDO -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 159:   <main class="content">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo main.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 160: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 161:     <!-- Encabezado de la página -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 162:     <div class="page-header">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 163:       <h1>Dashboard Operativo</h1>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h1.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 164:       <p>Vista consolidada de las operaciones diarias</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 165:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 166: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 167:     <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 168:          FILA 1 DE TARJETAS
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 169:          Trabajadores Activos | En Labor | Asistencia Hoy
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 170:          Datos: tabla trabajador + tabla asistencia
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 171:     ══════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 172:     <div class="cards-grid">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 173: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 174:       <!-- Trabajadores Activos: COUNT WHERE estado = 'ACTIVO' -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta directamente con la base de datos mediante PDO y con las tablas mencionadas en la consulta SQL.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 175:       <div class="stat-card">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 176:         <div class="stat-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 177:           <span class="stat-label">Trabajadores Activos</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 178:           <span class="stat-value"><?= $datos['trabajadores_activos'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 179:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 180:         <div class="stat-icon icon-green">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 181:           <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 182:             <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo path.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 183:             <circle cx="9" cy="7" r="4"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo circle.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 184:             <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo path.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 185:             <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo path.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 186:           </svg>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 187:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 188:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 189: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 190:       <!-- Trabajadores en Labor: COUNT WHERE estado = 'En labor' -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta directamente con la base de datos mediante PDO y con las tablas mencionadas en la consulta SQL.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 191:       <div class="stat-card">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 192:         <div class="stat-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 193:           <span class="stat-label">Trabajadores en Labor</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 194:           <span class="stat-value"><?= $datos['trabajadores_en_labor'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 195:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 196:         <div class="stat-icon icon-blue">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 197:           <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 198:             <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo path.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 199:             <circle cx="9" cy="7" r="4"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo circle.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 200:             <polyline points="16 11 18 13 22 9"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo polyline.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 201:           </svg>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 202:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 203:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 204: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 205:       <!-- Asistencia Hoy: COUNT en tabla asistencia WHERE fecha = HOY -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta directamente con la base de datos mediante PDO y con las tablas mencionadas en la consulta SQL.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 206:       <div class="stat-card">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 207:         <div class="stat-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 208:           <span class="stat-label">Asistencia Marcada Hoy</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 209:           <span class="stat-value"><?= $datos['asistencia_hoy'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 210:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 211:         <div class="stat-icon icon-green-soft">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 212:           <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 213:             <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo rect.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 214:             <line x1="16" y1="2" x2="16" y2="6"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 215:             <line x1="8"  y1="2" x2="8"  y2="6"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 216:             <line x1="3"  y1="10" x2="21" y2="10"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 217:             <polyline points="9 16 11 18 15 14"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo polyline.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 218:           </svg>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 219:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 220:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 221: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 222:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 223: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 224:     <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 225:          FILA 2 DE TARJETAS
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 226:          Solicitudes Pendientes | Tareas Pendientes | Tareas en Progreso
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 227:          Datos: tabla solicitud_registro + tabla tarea (filtrado por mayordomo)
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 228:     ══════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 229:     <div class="cards-grid">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 230: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 231:       <!-- Solicitudes Pendientes: solicitud_registro WHERE estado = 'PENDIENTE' -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta directamente con la base de datos mediante PDO y con las tablas mencionadas en la consulta SQL.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 232:       <div class="stat-card">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 233:         <div class="stat-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 234:           <span class="stat-label">Solicitudes Pendientes</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 235:           <span class="stat-value"><?= $datos['solicitudes_pendientes'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 236:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 237:         <div class="stat-icon icon-yellow">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 238:           <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 239:             <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo path.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 240:             <line x1="12" y1="9"  x2="12" y2="13"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 241:             <line x1="12" y1="17" x2="12.01" y2="17"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 242:           </svg>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 243:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 244:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 245: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 246:       <!-- Tareas Pendientes: tarea WHERE id_mayordomo = ID AND estado = 'PENDIENTE' -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta directamente con la base de datos mediante PDO y con las tablas mencionadas en la consulta SQL.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 247:       <div class="stat-card">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 248:         <div class="stat-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 249:           <span class="stat-label">Tareas Pendientes</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 250:           <span class="stat-value"><?= $datos['tareas_pendientes'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 251:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 252:         <div class="stat-icon icon-yellow">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 253:           <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 254:             <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo path.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 255:             <polyline points="14 2 14 8 20 8"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo polyline.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 256:             <line x1="16" y1="13" x2="8" y2="13"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 257:             <line x1="16" y1="17" x2="8" y2="17"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 258:             <polyline points="10 9 9 9 8 9"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo polyline.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 259:           </svg>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 260:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 261:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 262: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 263:       <!-- Tareas en Progreso: tarea WHERE id_mayordomo = ID AND estado = 'EN_PROGRESO' -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta directamente con la base de datos mediante PDO y con las tablas mencionadas en la consulta SQL.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 264:       <div class="stat-card">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 265:         <div class="stat-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 266:           <span class="stat-label">Tareas en Progreso</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 267:           <span class="stat-value"><?= $datos['tareas_en_progreso'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 268:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 269:         <div class="stat-icon icon-blue">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 270:           <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 271:             <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo path.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 272:             <polyline points="14 2 14 8 20 8"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo polyline.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 273:             <line x1="16" y1="13" x2="8" y2="13"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 274:             <line x1="16" y1="17" x2="8" y2="17"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo line.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 275:           </svg>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 276:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 277:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 278: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 279:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 280: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 281:     <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 282:          FILA 3 DE TARJETAS (2 tarjetas)
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 283:          Préstamos Pendientes | Producción del Día
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 284:          Datos: tabla prestamo + tabla produccion (filtrado por mayordomo)
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 285:     ══════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 286:     <div class="cards-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 680px;">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 287: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 288:       <!-- Préstamos Pendientes: prestamo WHERE id_mayordomo = ID AND estado = 'PENDIENTE' -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta directamente con la base de datos mediante PDO y con las tablas mencionadas en la consulta SQL.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 289:       <div class="stat-card">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 290:         <div class="stat-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 291:           <span class="stat-label">Préstamos Pendientes</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 292:           <span class="stat-value"><?= $datos['prestamos_pendientes'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 293:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 294:         <div class="stat-icon icon-purple">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 295:           <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 296:             <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo path.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 297:           </svg>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 298:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 299:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 300: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 301:       <!-- Producción del Día: SUM produccion WHERE fecha = HOY y tareas del mayordomo -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta directamente con la base de datos mediante PDO y con las tablas mencionadas en la consulta SQL.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 302:       <div class="stat-card">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 303:         <div class="stat-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 304:           <span class="stat-label">Producción del Día (kg)</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 305:           <span class="stat-value"><?= $datos['produccion_hoy'] ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 306:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 307:         <div class="stat-icon icon-green">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 308:           <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 309:             <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo polyline.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 310:             <polyline points="17 6 23 6 23 12"/>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo polyline.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 311:           </svg>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo svg.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 312:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 313:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 314: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 315:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 316: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 317:     <!-- ══════════════════════════════════════════════════════
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 318:          SECCIÓN INFERIOR
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 319:          Izquierda: Notificaciones Recientes (tabla notificacion_operativa)
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 320:          Derecha:   Accesos Rápidos (4 botones de navegación)
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 321:     ══════════════════════════════════════════════════════ -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 322:     <div class="bottom-grid">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 323: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 324:       <!-- Panel Notificaciones Recientes -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 325:       <div class="panel">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 326:         <h2 class="panel-title">Notificaciones Recientes</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 327:         <?php if (empty($datos['notificaciones'])): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 328:           <p class="notif-empty">Sin notificaciones recientes.</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 329:         <?php else: ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir qué pasa cuando la condición anterior no se cumple.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 330:           <?php foreach ($datos['notificaciones'] as $n): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 331:             <div class="notif-row <?= !$n['leida'] ? 'notif-row-unread' : '' ?>">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 332:               <div class="notif-row-info">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 333:                 <p class="notif-row-msg"><?= htmlspecialchars($n['mensaje']) ?></p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 334:                 <span class="notif-row-time"><?= tiempoRelativo($n['fecha_hora']) ?></span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 335:               </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 336:               <?php if (!empty($n['link'])): ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 337:                 <a href="<?= htmlspecialchars($n['link'], ENT_QUOTES, 'UTF-8') ?>" class="notif-row-link" onclick="marcarUnaLeida(<?= (int)($n['id_notificacion'] ?? 0) ?>)">Ver →</a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (marcarUnaLeida(<?= (int)($n['id_notificacion'] ?? 0) ?>)) y con controllers/MayordomoDashboardController.php si esas funciones envían datos.
Para qué sirve: Mostrar texto de forma segura evitando que se interprete como HTML peligroso.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 338:               <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 339:             </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 340:           <?php endforeach; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Recorrer un arreglo de datos y mostrar un bloque por cada registro.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 341:         <?php endif; ?>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo HTML.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 342:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 343: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 344:       <!-- Panel Accesos Rápidos
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 345:            4 botones que llevan directamente a los módulos más usados -->
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 346:       <div class="panel">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 347:         <h2 class="panel-title">Accesos Rápidos</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 348:         <div class="accesos-grid">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 349: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 350:           <!-- Asignar Tarea → tareas.php -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 351:           <a href="tareas.php" class="acceso-btn">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 352:             <div class="acceso-icon acceso-verde">📋</div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 353:             <span>Asignar Tarea</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 354:           </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 355: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 356:           <!-- Aprobar Préstamo → prestamos.php -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 357:           <a href="prestamos.php" class="acceso-btn">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 358:             <div class="acceso-icon acceso-azul">🔑</div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 359:             <span>Aprobar Préstamo</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 360:           </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 361: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 362:           <!-- Ver Solicitudes → solicitudes.php -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 363:           <a href="solicitudes.php" class="acceso-btn">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 364:             <div class="acceso-icon acceso-amarillo">👤</div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 365:             <span>Ver Solicitudes</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 366:           </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 367: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 368:           <!-- Registrar Producción → produccion.php -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 369:           <a href="produccion.php" class="acceso-btn">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 370:             <div class="acceso-icon acceso-purple">📈</div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 371:             <span>Registrar Producción</span>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo span.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 372:           </a>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo a.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 373: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 374:         </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 375:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 376: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 377:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 378:   </main>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo main.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 379: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 380: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 381: <script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 382:   // Abre/cierra el sidebar en pantallas móviles
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 383:   function toggleSidebar() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 384:     document.getElementById('sidebar').classList.toggle('sidebar-open');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 385:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 386:   document.querySelectorAll('.nav-item').forEach(function(item) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 387:     item.addEventListener('click', function() {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 388:       document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 389:       this.classList.add('active');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 390:     });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 391:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 392: </script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 393: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 394: <!-- OVERLAY NOTIFICACIONES (dinámico) -->
Qué hace exactamente: Es un comentario o separador; explica una parte del archivo sin ejecutarse.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Documentar u organizar el archivo para que otro programador entienda esa sección.
Qué pasaría si se quita: El sistema seguiría funcionando, pero se perdería documentación u organización.

Línea 395: <div class="notif-overlay" id="notifOverlay">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 396:   <div class="notif-panel" id="notifPanel" role="dialog" aria-modal="true" aria-label="Notificaciones">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 397:     <div class="notif-panel-header">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 398:       <div class="notif-panel-header-left">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 399:         <h2>🔔 Notificaciones</h2>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo h2.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar un título visible en la interfaz.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 400:         <p id="notifSubtitulo">Cargando...</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 401:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 402:       <div class="notif-panel-header-right">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 403:         <button class="btn-marcar-leidas" id="btnMarcarLeidas" onclick="marcarTodasLeidas()" style="display:none;">✓ Marcar todas como leídas</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (marcarTodasLeidas()) y con controllers/MayordomoDashboardController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 404:         <button class="btn-cerrar-notif" onclick="cerrarNotifPanel()" aria-label="Cerrar">✕</button>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo button.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (cerrarNotifPanel()) y con controllers/MayordomoDashboardController.php si esas funciones envían datos.
Para qué sirve: Crear un botón que el usuario puede presionar para ejecutar una acción.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 405:       </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 406:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 407:     <div class="notif-list" id="notifList">
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 408:       <p class="notif-empty">Cargando notificaciones...</p>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo p.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 409:     </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 410:   </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 411: </div>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo div.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 412: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 413: <script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 414: (function () {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 415:   var NOTIF_URL = '../../controllers/NotificacionController.php';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 416:   var iconos = { error: '⚠', warning: '△', success: '✓', info: 'ℹ' };
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 417:   function tiempoRelativo(fechaStr) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 418:     if (!fechaStr) return '';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 419:     var diff = Math.floor((Date.now() - new Date(fechaStr).getTime()) / 1000);
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con  porque crea el objeto del modelo para consultar datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 420:     if (diff < 60)    return 'Hace ' + diff + ' seg';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 421:     if (diff < 3600)  return 'Hace ' + Math.floor(diff / 60) + ' min';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 422:     if (diff < 86400) return 'Hace ' + Math.floor(diff / 3600) + ' h';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 423:     return 'Hace ' + Math.floor(diff / 86400) + ' días';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 424:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 425:   function escHtml(str) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 426:     var d = document.createElement('div');
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 427:     d.appendChild(document.createTextNode(str || ''));
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 428:     return d.innerHTML;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 429:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 430:   function renderNotificaciones(notifs, noLeidas) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 431:     var list = document.getElementById('notifList');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 432:     var sub  = document.getElementById('notifSubtitulo');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 433:     var btn  = document.getElementById('btnMarcarLeidas');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 434:     if (!list) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 435:     sub.textContent = noLeidas > 0
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 436:       ? 'Tienes ' + noLeidas + ' notificación' + (noLeidas === 1 ? '' : 'es') + ' sin leer'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 437:       : 'Todas las notificaciones leídas';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 438:     if (btn) btn.style.display = noLeidas > 0 ? 'inline-flex' : 'none';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 439:     if (!notifs || notifs.length === 0) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 440:       list.innerHTML = '<p class="notif-empty">Sin notificaciones nuevas</p>';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 441:       return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 442:     }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 443:     list.innerHTML = notifs.map(function (n) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 444:       var tipo   = n.tipo || 'info';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 445:       var icono  = iconos[tipo] || 'ℹ';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 446:       var unread = !parseInt(n.leida) ? 'notif-unread' : '';
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 447:       var linkHtml = n.link
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 448:         ? '<a href="' + escHtml(n.link) + '" class="notif-item-link" onclick="marcarUnaLeida(' + n.id_notificacion + ')">Ver →</a>'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con funciones JavaScript de este mismo archivo (marcarUnaLeida(' + n.id_notificacion + ')) y con controllers/MayordomoDashboardController.php si esas funciones envían datos.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: El elemento se vería, pero la acción interactiva asociada dejaría de funcionar.

Línea 449:         : '';
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 450:       return '<div class="notif-item notif-tipo-' + tipo + ' ' + unread + '">'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 451:         + '<div class="notif-item-icon">' + icono + '</div>'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 452:         + '<div class="notif-item-body">'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 453:         + '<p class="notif-msg">' + escHtml(n.mensaje) + '</p>'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 454:         + '<span class="notif-time">' + tiempoRelativo(n.fecha_hora) + '</span>'
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 455:         + '</div>' + linkHtml + '</div>';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 456:     }).join('');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 457:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 458:   function actualizarBadge(noLeidas) {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 459:     var badge = document.querySelector('.notif-btn .notif-count');
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 460:     if (noLeidas > 0) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 461:       if (!badge) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 462:         badge = document.createElement('span');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 463:         badge.className = 'notif-count';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 464:         var btn = document.querySelector('.notif-btn');
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 465:         if (btn) btn.appendChild(badge);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 466:       }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 467:       badge.textContent = noLeidas;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 468:     } else { if (badge) badge.remove(); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 469:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 470:   function cargarNotificaciones() {
Qué hace exactamente: Declara una función JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 471:     fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoDashboardController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 472:       .then(function (r) { return r.json(); })
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 473:       .then(function (data) {
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 474:         if (data.ok) { renderNotificaciones(data.notificaciones, data.no_leidas); actualizarBadge(data.no_leidas); }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 475:       }).catch(function () {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 476:         var list = document.getElementById('notifList');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 477:         if (list) list.innerHTML = '<p class="notif-empty">Error al cargar notificaciones.</p>';
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con las clases CSS de views/mayordomo/styles/dashboard.css y, si tiene eventos, con JavaScript del mismo archivo.
Para qué sirve: Mostrar una descripción, aviso o texto informativo para el usuario.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 478:       });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 479:   }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 480:   window.toggleNotifPanel = function () {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 481:     var overlay = document.getElementById('notifOverlay');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 482:     if (!overlay) return;
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 483:     var visible = overlay.classList.toggle('notif-overlay-visible');
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 484:     if (visible) cargarNotificaciones();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 485:   };
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 486:   window.cerrarNotifPanel = function () {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 487:     var overlay = document.getElementById('notifOverlay');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 488:     if (overlay) overlay.classList.remove('notif-overlay-visible');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 489:   };
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 490:   window.marcarTodasLeidas = function () {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 491:     var fd = new FormData();
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con  porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 492:     fd.append('accion', 'marcar_leidas');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 493:     fetch(NOTIF_URL, { method: 'POST', body: fd, credentials: 'same-origin' })
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoDashboardController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 494:       .then(function () { cargarNotificaciones(); });
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 495:   };
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 496:   window.marcarUnaLeida = function (id) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 497:     var fd = new FormData();
Qué hace exactamente: Crea una instancia de una clase necesaria para este módulo.
Con qué se conecta en el sistema: Se conecta con  porque crea el objeto del modelo para consultar datos.
Para qué sirve: Reunir los datos del formulario para enviarlos al controlador.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 498:     fd.append('accion', 'marcar_una');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 499:     fd.append('id_notificacion', id);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 500:     fetch(NOTIF_URL, { method: 'POST', body: fd, credentials: 'same-origin' });
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoDashboardController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 501:   };
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 502:   document.addEventListener('click', function (e) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 503:     var overlay = document.getElementById('notifOverlay');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 504:     var panel   = document.getElementById('notifPanel');
Qué hace exactamente: Busca un elemento HTML por su id para leerlo o modificarlo.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 505:     var btn     = document.querySelector('.notif-btn');
Qué hace exactamente: Declara una variable JavaScript.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 506:     if (overlay && overlay.classList.contains('notif-overlay-visible')) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 507:       if (panel && btn && !panel.contains(e.target) && !btn.contains(e.target)) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 508:         overlay.classList.remove('notif-overlay-visible');
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Mostrar, ocultar o modificar visualmente un elemento de la página.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 509:       }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 510:     }
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Podría producirse un error de sintaxis o el archivo quedaría mal estructurado.

Línea 511:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 512:   document.addEventListener('keydown', function (e) {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 513:     if (e.key === 'Escape') cerrarNotifPanel();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 514:   });
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 515:   fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoDashboardController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 516:     .then(function (r) { return r.json(); })
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 517:     .then(function (data) { if (data.ok) actualizarBadge(data.no_leidas); })
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 518:     .catch(function () {});
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 519:   setInterval(function () {
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 520:     fetch(NOTIF_URL, { method: 'GET', credentials: 'same-origin' })
Qué hace exactamente: Realiza una petición HTTP desde JavaScript.
Con qué se conecta en el sistema: Se conecta por AJAX/fetch con controllers/MayordomoDashboardController.php para ejecutar acciones sin recargar manualmente.
Para qué sirve: Enviar una petición al servidor para crear, editar, eliminar, consultar o cambiar estado.
Qué pasaría si se quita: Las acciones dinámicas no llegarían al controlador y el módulo no guardaría cambios.

Línea 521:       .then(function (r) { return r.json(); })
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 522:       .then(function (data) { if (data.ok) actualizarBadge(data.no_leidas); })
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Evaluar una condición para decidir qué mostrar o qué acción ejecutar.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 523:       .catch(function () {});
Qué hace exactamente: Define una regla o propiedad CSS.
Con qué se conecta en el sistema: Se conecta con el DOM de esta vista y con controllers/MayordomoDashboardController.php cuando la función usa fetch.
Para qué sirve: Definir una regla CSS que cambia el diseño de elementos de la vista.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 524:   }, 60000);
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 525: })();
Qué hace exactamente: Ejecuta una instrucción propia de la lógica de esta vista.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 526: </script>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo script.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 527: Línea en blanco
Qué hace exactamente: Es una línea en blanco; no ejecuta código.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Separar visualmente el código para que sea más fácil de leer.
Qué pasaría si se quita: No pasaría nada funcional; solo cambia la presentación del código.

Línea 528: </body>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo body.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Línea 529: </html>
Qué hace exactamente: Crea, cierra o configura una etiqueta HTML de tipo html.
Con qué se conecta en el sistema: Se conecta principalmente con views/mayordomo/dashboard.php; según el contexto también depende de , controllers/MayordomoDashboardController.php, incluido directamente dentro del mismo archivo y views/mayordomo/styles/dashboard.css.
Para qué sirve: Cumplir una parte específica de la estructura, lógica, estilo o interacción de este módulo.
Qué pasaría si se quita: Esa parte específica del módulo podría quedar incompleta, sin diseño o sin comportamiento esperado.

Conclusión:
Este archivo pertenece a views/mayordomo/dashboard.php. Se apoya principalmente en , en controllers/MayordomoDashboardController.php, en incluido directamente dentro del mismo archivo y en views/mayordomo/styles/dashboard.css. Su función es construir la vista, cargar datos necesarios, mostrar tablas/formularios/modales y enviar acciones al controlador correspondiente cuando el usuario interactúa con el módulo.