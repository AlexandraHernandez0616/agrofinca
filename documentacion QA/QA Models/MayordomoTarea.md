Línea 1: <?php
Qué hace exactamente: Abre el archivo PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Ejecutar el modelo MayordomoTarea.
Qué pasaría si se quita: No se interpretaría correctamente.

Líneas 2 a 17: Comentario de documentación
Qué hace exactamente: Explica que el modelo maneja tareas del mayordomo y sus tablas.
Con qué se conecta: Con tarea, tarea_trabajador, lote, trabajador y usuario.
Para qué sirve: Documentar estructura y estados.
Qué pasaría si se quita: Código funciona, pero se entiende menos.

Línea 18: class MayordomoTarea {
Qué hace exactamente: Declara la clase.
Con qué se conecta: Con MayordomoTareaController.php.
Para qué sirve: Agrupar operaciones de tareas.
Qué pasaría si se quita: No se podría usar el modelo.

Líneas 20 a 24: private $conn y constructor
Qué hace exactamente: Guarda conexión PDO.
Con qué se conecta: Con Database::conectar().
Para qué sirve: Ejecutar consultas.
Qué pasaría si se quita: Métodos fallarían.

Línea 34: public function listar(int $id_mayordomo, string $busqueda = '', string $estado = ''): array {
Qué hace exactamente: Declara método para listar tareas del mayordomo.
Con qué se conecta: Con la vista de tareas.
Para qué sirve: Mostrar tareas filtradas por búsqueda o estado.
Qué pasaría si se quita: No habría listado.

Línea 35: $where = ['t.id_mayordomo = :mayordomo'];
Qué hace exactamente: Filtra tareas del mayordomo logueado.
Con qué se conecta: Con tarea.id_mayordomo.
Para qué sirve: Evitar ver tareas de otros mayordomos.
Qué pasaría si se quita: Se podrían mostrar tareas ajenas.

Línea 36: $params = [':mayordomo' => $id_mayordomo];
Qué hace exactamente: Guarda parámetro del mayordomo.
Con qué se conecta: Con :mayordomo.
Para qué sirve: Ejecutar filtro seguro.
Qué pasaría si se quita: Consulta fallaría.

Líneas 38 a 41: filtro búsqueda
Qué hace exactamente: Busca por nombre de tarea o lote.
Con qué se conecta: Con tarea.nombre y lote.nombre.
Para qué sirve: Encontrar tareas rápidamente.
Qué pasaría si se quita: No habría búsqueda.

Líneas 42 a 45: filtro estado
Qué hace exactamente: Filtra por estado_tarea.
Con qué se conecta: Con tarea.estado_tarea.
Para qué sirve: Ver pendientes, en progreso o completadas.
Qué pasaría si se quita: No habría filtro por estado.

Líneas 47 a 67: SELECT listar tareas
Qué hace exactamente: Consulta tarea, lote y trabajadores asignados.
Con qué se conecta: Con tarea, lote, tarea_trabajador, trabajador y usuario.
Para qué sirve: Mostrar datos completos de cada tarea.
Qué pasaría si se quita: No habría listado.

Líneas 55 a 59: GROUP_CONCAT trabajadores
Qué hace exactamente: Une nombres de trabajadores asignados en un texto.
Con qué se conecta: Con tarea_trabajador y usuario.
Para qué sirve: Mostrar trabajadores en una sola fila.
Qué pasaría si se quita: No se verían trabajadores asignados.

Línea 65: GROUP BY t.id_tarea
Qué hace exactamente: Agrupa por tarea.
Con qué se conecta: Con GROUP_CONCAT.
Para qué sirve: Evitar duplicados cuando hay varios trabajadores.
Qué pasaría si se quita: Se repetirían tareas.

Líneas 69 a 71: prepare, execute, fetchAll
Qué hace exactamente: Ejecuta y devuelve tareas.
Con qué se conecta: Con PDO y vista.
Para qué sirve: Entregar datos filtrados.
Qué pasaría si se quita: No habría resultados.

Línea 77: public function resumen(int $id_mayordomo): array {
Qué hace exactamente: Declara método de resumen.
Con qué se conecta: Con tarjetas superiores.
Para qué sirve: Contar tareas por estado.
Qué pasaría si se quita: No habría métricas.

Líneas 78 a 86: SELECT resumen
Qué hace exactamente: Cuenta total, pendientes, en progreso y completadas.
Con qué se conecta: Con tabla tarea.
Para qué sirve: Mostrar estadísticas del mayordomo.
Qué pasaría si se quita: No habría resumen.

Líneas 87 a 96: bind, execute, fetch y return
Qué hace exactamente: Ejecuta resumen y devuelve conteos.
Con qué se conecta: Con la vista.
Para qué sirve: Mostrar tarjetas.
Qué pasaría si se quita: No se tendrían métricas.

Línea 102: public function listarLotes(): array {
Qué hace exactamente: Lista lotes para select.
Con qué se conecta: Con lote y cultivo.
Para qué sirve: Elegir lote al crear tarea.
Qué pasaría si se quita: El formulario no tendría lotes.

Líneas 103 a 110: SELECT lotes
Qué hace exactamente: Trae lotes con cultivo.
Con qué se conecta: Con tabla lote y cultivo.
Para qué sirve: Mostrar opciones claras.
Qué pasaría si se quita: No habría opciones.

Línea 116: public function listarTrabajadores(): array {
Qué hace exactamente: Lista trabajadores activos.
Con qué se conecta: Con trabajador y usuario.
Para qué sirve: Seleccionar trabajadores para asignar.
Qué pasaría si se quita: No se podrían asignar trabajadores.

Líneas 117 a 125: SELECT trabajadores
Qué hace exactamente: Consulta trabajadores activos con nombre completo.
Con qué se conecta: Con trabajador.estado_trabajador y usuario.
Para qué sirve: Llenar select múltiple.
Qué pasaría si se quita: No habría lista de trabajadores.

Línea 131: public function trabajadoresDeTarea(int $id_tarea): array {
Qué hace exactamente: Obtiene IDs de trabajadores asignados.
Con qué se conecta: Con tarea_trabajador.
Para qué sirve: Saber quién está asignado a una tarea.
Qué pasaría si se quita: No se podría precargar edición o notificar correctamente.

Líneas 132 a 137: SELECT id_trabajador
Qué hace exactamente: Consulta asignaciones por tarea.
Con qué se conecta: Con tarea_trabajador.id_tarea.
Para qué sirve: Obtener lista simple de IDs.
Qué pasaría si se quita: No habría asignaciones.

Línea 151: public function crear(...)
Qué hace exactamente: Declara método para crear tarea y asignar trabajadores.
Con qué se conecta: Con MayordomoTareaController.php accion crear.
Para qué sirve: Registrar tarea completa.
Qué pasaría si se quita: No se podrían crear tareas.

Línea 162: $this->conn->beginTransaction();
Qué hace exactamente: Inicia transacción.
Con qué se conecta: Con PDO.
Para qué sirve: Guardar tarea y asignaciones juntas.
Qué pasaría si se quita: Podría crearse tarea sin trabajadores si falla algo.

Líneas 165 a 177: INSERT INTO tarea
Qué hace exactamente: Inserta lote, mayordomo, nombre, descripción, fechas y estado.
Con qué se conecta: Con tabla tarea.
Para qué sirve: Crear la tarea principal.
Qué pasaría si se quita: No se crearía la tarea.

Línea 180: $id_tarea = (int) $this->conn->lastInsertId();
Qué hace exactamente: Obtiene ID de la tarea recién creada.
Con qué se conecta: Con el INSERT anterior.
Para qué sirve: Usarlo para asignar trabajadores.
Qué pasaría si se quita: No se sabría a qué tarea asignar trabajadores.

Línea 183: $this->asignarTrabajadores($id_tarea, $trabajadores);
Qué hace exactamente: Llama método privado para insertar asignaciones.
Con qué se conecta: Con tarea_trabajador.
Para qué sirve: Relacionar tarea con trabajadores.
Qué pasaría si se quita: La tarea quedaría sin asignados.

Líneas 185 a 190: commit/catch rollBack
Qué hace exactamente: Confirma o revierte la transacción.
Con qué se conecta: Con beginTransaction().
Para qué sirve: Mantener consistencia.
Qué pasaría si se quita: Podrían quedar datos incompletos.

Línea 196: public function editar(...)
Qué hace exactamente: Declara método para editar tarea.
Con qué se conecta: Con accion editar.
Para qué sirve: Actualizar tarea y reemplazar trabajadores.
Qué pasaría si se quita: No se podrían editar tareas.

Línea 207: $this->conn->beginTransaction();
Qué hace exactamente: Inicia transacción de edición.
Con qué se conecta: Con PDO.
Para qué sirve: Actualizar tarea y asignaciones juntas.
Qué pasaría si se quita: Podrían cambiar datos pero no asignaciones.

Líneas 210 a 225: UPDATE tarea
Qué hace exactamente: Actualiza lote, nombre, descripción, fechas y estado.
Con qué se conecta: Con tabla tarea.
Para qué sirve: Guardar cambios principales.
Qué pasaría si se quita: No se modificaría la tarea.

Líneas 228 a 233: DELETE asignaciones actuales
Qué hace exactamente: Borra trabajadores asignados antes de reinsertar.
Con qué se conecta: Con tarea_trabajador.
Para qué sirve: Reemplazar la lista completa.
Qué pasaría si se quita: Se duplicarían o conservarían asignaciones antiguas.

Línea 235: $this->asignarTrabajadores($id_tarea, $trabajadores);
Qué hace exactamente: Inserta nueva lista de trabajadores.
Con qué se conecta: Con método privado asignarTrabajadores().
Para qué sirve: Guardar asignaciones actualizadas.
Qué pasaría si se quita: La tarea quedaría sin nuevas asignaciones.

Línea 247: public function cambiarEstado(int $id_tarea, string $estado): bool {
Qué hace exactamente: Declara método para cambiar estado.
Con qué se conecta: Con accion cambiar_estado.
Para qué sirve: Pasar tarea a PENDIENTE, EN_PROGRESO o COMPLETADA.
Qué pasaría si se quita: No se podría cambiar estado.

Líneas 248 a 253: UPDATE estado_tarea
Qué hace exactamente: Actualiza solo estado_tarea por ID.
Con qué se conecta: Con tabla tarea.
Para qué sirve: Cambiar estado sin tocar otros datos.
Qué pasaría si se quita: No se actualizaría estado.

Línea 261: public function eliminar(int $id_tarea): bool {
Qué hace exactamente: Declara método para eliminar tarea.
Con qué se conecta: Con accion eliminar.
Para qué sirve: Borrar tarea pendiente y sus asignaciones.
Qué pasaría si se quita: No se podrían eliminar tareas.

Línea 262: $this->conn->beginTransaction();
Qué hace exactamente: Inicia transacción.
Con qué se conecta: Con PDO.
Para qué sirve: Borrar asignaciones y tarea juntas.
Qué pasaría si se quita: Podrían quedar asignaciones huérfanas.

Líneas 265 a 270: DELETE tarea_trabajador
Qué hace exactamente: Borra asignaciones primero.
Con qué se conecta: Con tabla tarea_trabajador.
Para qué sirve: Evitar errores por llaves foráneas.
Qué pasaría si se quita: La tarea podría no eliminarse por relaciones.

Líneas 273 a 278: DELETE tarea pendiente
Qué hace exactamente: Borra la tarea solo si está PENDIENTE.
Con qué se conecta: Con tarea.estado_tarea.
Para qué sirve: Evitar borrar tareas ya avanzadas.
Qué pasaría si se quita: Podrían eliminarse tareas en progreso o completadas.

Línea 280: $eliminada = $stmt->rowCount() > 0;
Qué hace exactamente: Verifica si se eliminó alguna fila.
Con qué se conecta: Con el DELETE.
Para qué sirve: Saber si la tarea cumplía condición.
Qué pasaría si se quita: No se sabría si realmente se borró.

Líneas 281 a 285: commit/catch rollBack
Qué hace exactamente: Confirma o revierte.
Con qué se conecta: Con transacción.
Para qué sirve: Mantener datos consistentes.
Qué pasaría si se quita: Podrían quedar borrados parciales.

Línea 296: private function asignarTrabajadores(int $id_tarea, array $trabajadores): void {
Qué hace exactamente: Declara método privado para insertar asignaciones.
Con qué se conecta: Con crear() y editar().
Para qué sirve: Reutilizar lógica de asignación.
Qué pasaría si se quita: crear() y editar() fallarían al llamarlo.

Línea 297: if (empty($trabajadores)) return;
Qué hace exactamente: Sale si no hay trabajadores.
Con qué se conecta: Con el arreglo $trabajadores.
Para qué sirve: Evitar ejecutar inserts innecesarios.
Qué pasaría si se quita: Podría intentar recorrer arreglo vacío sin problema grave, pero es menos eficiente.

Líneas 299 a 302: INSERT IGNORE tarea_trabajador
Qué hace exactamente: Prepara inserción de relación tarea-trabajador.
Con qué se conecta: Con tabla tarea_trabajador.
Para qué sirve: Asignar trabajadores evitando duplicados.
Qué pasaría si se quita: No habría asignaciones.

Líneas 303 a 310: foreach trabajadores
Qué hace exactamente: Recorre IDs, valida que sean positivos, vincula y ejecuta insert.
Con qué se conecta: Con tarea_trabajador.id_tarea e id_trabajador.
Para qué sirve: Guardar cada trabajador asignado.
Qué pasaría si se quita: No se asignaría nadie.

Línea 313: }
Qué hace exactamente: Cierra la clase.
Con qué se conecta: Con class MayordomoTarea.
Para qué sirve: Finalizar el modelo.
Qué pasaría si se quita: Error de sintaxis.

Conclusión:
Este modelo administra tareas del mayordomo. Se conecta con tarea, tarea_trabajador, lote, trabajador y usuario. Permite listar, resumir, crear, editar, cambiar estado, eliminar tareas pendientes y asignar trabajadores usando transacciones para proteger la consistencia de los datos.