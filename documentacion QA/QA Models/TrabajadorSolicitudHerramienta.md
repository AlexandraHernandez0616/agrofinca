Línea 1: <?php
Qué hace exactamente: Abre el archivo PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Permite ejecutar la clase TrabajadorSolicitudHerramienta.
Qué pasaría si se quita: El archivo podría no interpretarse correctamente.

Líneas 2 a 8: Comentario de documentación
Qué hace exactamente: Explica que el modelo maneja solicitudes de herramientas.
Con qué se conecta: Con prestamo, detalle_prestamo, herramienta y usuario.
Para qué sirve: Documentar el propósito del archivo.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 9: class TrabajadorSolicitudHerramienta {
Qué hace exactamente: Declara la clase.
Con qué se conecta: Con TrabajadorSolicitudHerramientaController.php.
Para qué sirve: Agrupar métodos para solicitar herramientas.
Qué pasaría si se quita: No se podría usar este modelo.

Línea 11: private $conn;
Qué hace exactamente: Declara conexión privada.
Con qué se conecta: Con PDO.
Para qué sirve: Guardar conexión a base de datos.
Qué pasaría si se quita: Los métodos no podrían consultar o insertar.

Línea 13: public function __construct($db) {
Qué hace exactamente: Declara constructor.
Con qué se conecta: Con new TrabajadorSolicitudHerramienta($db).
Para qué sirve: Recibir conexión.
Qué pasaría si se quita: No se inicializaría $conn.

Línea 14: $this->conn = $db;
Qué hace exactamente: Guarda la conexión.
Con qué se conecta: Con todos los métodos.
Para qué sirve: Permitir consultas SQL.
Qué pasaría si se quita: Las consultas fallarían.

Línea 15: }
Qué hace exactamente: Cierra constructor.
Con qué se conecta: Con línea 13.
Para qué sirve: Finaliza inicialización.
Qué pasaría si se quita: Error de sintaxis.

Líneas 17 a 20: Comentario listarHerramientas()
Qué hace exactamente: Explica que lista herramientas disponibles.
Con qué se conecta: Con herramienta.estado.
Para qué sirve: Documentar que solo muestra DISPONIBLE.
Qué pasaría si se quita: No afecta ejecución.

Línea 21: public function listarHerramientas(): array {
Qué hace exactamente: Declara método para listar herramientas disponibles.
Con qué se conecta: Con la vista/formulario de solicitud del trabajador.
Para qué sirve: Llenar el select de herramientas.
Qué pasaría si se quita: El trabajador no tendría herramientas para seleccionar.

Líneas 22 a 27: SELECT herramientas disponibles
Qué hace exactamente: Consulta id, nombre y cantidad_total de herramientas DISPONIBLE.
Con qué se conecta: Con tabla herramienta.
Para qué sirve: Mostrar solo herramientas que pueden solicitarse.
Qué pasaría si se quita: No habría lista de herramientas.

Línea 28: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve herramientas como arreglo asociativo.
Con qué se conecta: Con la vista o controlador.
Para qué sirve: Entregar opciones para el formulario.
Qué pasaría si se quita: El método no devolvería datos.

Línea 29: }
Qué hace exactamente: Cierra listarHerramientas().
Con qué se conecta: Con línea 21.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 31 a 37: Comentario obtenerMayordomo()
Qué hace exactamente: Explica la prioridad para asignar mayordomo.
Con qué se conecta: Con tareas activas y usuarios mayordomos.
Para qué sirve: Documentar la lógica de asignación.
Qué pasaría si se quita: No afecta ejecución, pero se pierde claridad.

Línea 38: public function obtenerMayordomo(int $id_trabajador): ?int {
Qué hace exactamente: Declara método que devuelve ID de mayordomo o null.
Con qué se conecta: Con TrabajadorSolicitudHerramientaController.php.
Para qué sirve: Saber a qué mayordomo enviar la solicitud.
Qué pasaría si se quita: No se podría asignar responsable.

Líneas 40 a 49: SELECT mayordomo de tarea activa
Qué hace exactamente: Busca el mayordomo de la tarea pendiente o en progreso más reciente del trabajador.
Con qué se conecta: Con tarea_trabajador y tarea.
Para qué sirve: Enviar la solicitud al mayordomo que gestiona al trabajador.
Qué pasaría si se quita: No se respetaría la relación operativa del trabajador.

Líneas 50 a 52: bind, execute y fetch
Qué hace exactamente: Busca el mayordomo según id_trabajador.
Con qué se conecta: Con :id.
Para qué sirve: Obtener el primer resultado.
Qué pasaría si se quitan: No se ejecutaría la búsqueda.

Línea 53: if ($row) return (int) $row['id_mayordomo'];
Qué hace exactamente: Si encontró mayordomo, devuelve su ID.
Con qué se conecta: Con tarea.id_mayordomo.
Para qué sirve: Usar mayordomo asignado por tarea.
Qué pasaría si se quita: Aunque exista mayordomo por tarea, pasaría al respaldo.

Líneas 56 a 61: SELECT cualquier mayordomo activo
Qué hace exactamente: Busca un usuario con rol MAYORDOMO y activo = 1.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Tener un mayordomo de respaldo.
Qué pasaría si se quita: Si el trabajador no tiene tarea, no habría mayordomo.

Línea 62: $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Obtiene el resultado del mayordomo de respaldo.
Con qué se conecta: Con la consulta anterior.
Para qué sirve: Saber si existe un mayordomo activo.
Qué pasaría si se quita: No habría resultado de respaldo.

Línea 63: return $row2 ? (int) $row2['id_usuario'] : null;
Qué hace exactamente: Devuelve ID del mayordomo o null.
Con qué se conecta: Con usuario.id_usuario.
Para qué sirve: Informar al controlador si puede crear la solicitud.
Qué pasaría si se quita: El método no devolvería responsable.

Línea 64: }
Qué hace exactamente: Cierra obtenerMayordomo().
Con qué se conecta: Con línea 38.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 66 a 71: Comentario solicitar()
Qué hace exactamente: Explica que registra préstamo y detalle dentro de una transacción.
Con qué se conecta: Con prestamo y detalle_prestamo.
Para qué sirve: Documentar el flujo.
Qué pasaría si se quita: No afecta ejecución.

Línea 72: public function solicitar(
Qué hace exactamente: Declara método para registrar solicitud.
Con qué se conecta: Con TrabajadorSolicitudHerramientaController.php.
Para qué sirve: Crear préstamo pendiente con herramienta solicitada.
Qué pasaría si se quita: No se podrían solicitar herramientas.

Líneas 73 a 77: Parámetros solicitar()
Qué hace exactamente: Reciben trabajador, mayordomo, herramienta, cantidad y observación.
Con qué se conecta: Con formulario y tablas prestamo/detalle_prestamo.
Para qué sirve: Tener datos para crear solicitud.
Qué pasaría si se quitan: No habría datos suficientes.

Línea 78: ): bool {
Qué hace exactamente: Indica que devuelve true o false.
Con qué se conecta: Con el controlador.
Para qué sirve: Informar si se guardó.
Qué pasaría si se quita: Error de sintaxis.

Línea 79: $this->conn->beginTransaction();
Qué hace exactamente: Inicia transacción.
Con qué se conecta: Con commit y rollBack.
Para qué sirve: Asegura que préstamo y detalle se guarden juntos.
Qué pasaría si se quita: Podría quedar préstamo sin detalle.

Línea 80: try {
Qué hace exactamente: Inicia bloque de errores.
Con qué se conecta: Con catch.
Para qué sirve: Revertir si falla algo.
Qué pasaría si se quita: No habría manejo seguro.

Líneas 82 a 89: INSERT INTO prestamo
Qué hace exactamente: Inserta solicitud principal en estado PENDIENTE.
Con qué se conecta: Con tabla prestamo.
Para qué sirve: Crear cabecera del préstamo.
Qué pasaría si se quita: No se crearía préstamo.

Líneas 90 a 92: bindParam préstamo
Qué hace exactamente: Vincula trabajador, mayordomo y observación.
Con qué se conecta: Con los parámetros del INSERT.
Para qué sirve: Guardar los datos correctos.
Qué pasaría si se quitan: El INSERT fallaría.

Línea 93: $stmt->execute();
Qué hace exactamente: Ejecuta el INSERT del préstamo.
Con qué se conecta: Con base de datos.
Para qué sirve: Crear registro principal.
Qué pasaría si se quita: No se insertaría préstamo.

Línea 95: $id_prestamo = (int) $this->conn->lastInsertId();
Qué hace exactamente: Obtiene ID del préstamo creado.
Con qué se conecta: Con el INSERT anterior.
Para qué sirve: Usarlo en detalle_prestamo.
Qué pasaría si se quita: No se sabría a qué préstamo asociar la herramienta.

Líneas 98 a 101: INSERT detalle_prestamo
Qué hace exactamente: Inserta herramienta y cantidad asociadas al préstamo.
Con qué se conecta: Con detalle_prestamo.
Para qué sirve: Guardar qué herramienta se solicita.
Qué pasaría si se quita: El préstamo quedaría sin detalle.

Líneas 102 a 104: bindParam detalle
Qué hace exactamente: Vincula préstamo, herramienta y cantidad.
Con qué se conecta: Con detalle_prestamo.
Para qué sirve: Guardar detalle correcto.
Qué pasaría si se quitan: El INSERT fallaría.

Línea 105: $det->execute();
Qué hace exactamente: Ejecuta el INSERT del detalle.
Con qué se conecta: Con base de datos.
Para qué sirve: Guarda la herramienta solicitada.
Qué pasaría si se quita: No se guardaría detalle.

Línea 107: $this->conn->commit();
Qué hace exactamente: Confirma la transacción.
Con qué se conecta: Con beginTransaction().
Para qué sirve: Guarda préstamo y detalle definitivamente.
Qué pasaría si se quita: La transacción podría no confirmarse.

Línea 108: return true;
Qué hace exactamente: Devuelve éxito.
Con qué se conecta: Con el controlador.
Para qué sirve: Informar que la solicitud se registró.
Qué pasaría si se quita: No habría confirmación.

Líneas 109 a 112: catch
Qué hace exactamente: Captura errores, revierte y devuelve false.
Con qué se conecta: Con rollBack().
Para qué sirve: Evitar datos incompletos.
Qué pasaría si se quita: Podrían quedar registros a medias.

Línea 113: }
Qué hace exactamente: Cierra solicitar().
Con qué se conecta: Con línea 72.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 114: }
Qué hace exactamente: Cierra clase.
Con qué se conecta: Con línea 9.
Para qué sirve: Finaliza modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 115: ?>
Qué hace exactamente: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin formal.
Qué pasaría si se quita: Puede funcionar, pero aquí se usa cierre formal.

Conclusión:
Este modelo permite que un trabajador solicite herramientas. Se conecta con herramienta para listar disponibles, con tarea_trabajador/tarea para encontrar el mayordomo correcto, y con prestamo/detalle_prestamo para registrar la solicitud.