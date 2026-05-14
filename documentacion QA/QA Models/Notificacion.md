Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete de PHP del servidor.
Para qué sirve: Le indica al servidor que desde esta línea empieza código PHP que debe ejecutarse.
Qué pasaría si se quita: El servidor podría no interpretar correctamente el archivo como PHP, dependiendo de la configuración.

Líneas 2 a 14: Comentario de documentación
Qué hace exactamente: Explica el nombre del archivo, su propósito, cómo se usa el helper Notificacion y qué tipos de notificación permite.
Con qué se conecta: Con la documentación interna del proyecto y con la tabla notificacion_operativa.
Para qué sirve: Sirve para que cualquier programador entienda rápidamente que este archivo se usa para insertar notificaciones operativas en la base de datos.
Qué pasaría si se quita: El código seguiría funcionando, pero sería más difícil entender para qué sirve el archivo y cómo usarlo.

Línea 15: class Notificacion {
Qué hace exactamente: Declara la clase Notificacion.
Con qué se conecta: Con controladores que envían notificaciones, por ejemplo PagoController.php, SolicitudController.php, LiquidacionController.php, MayordomoTareaController.php y otros.
Para qué sirve: Agrupa métodos relacionados con el envío de notificaciones dentro del sistema.
Qué pasaría si se quita: Las llamadas como Notificacion::enviar() o Notificacion::enviarAVarios() dejarían de funcionar porque la clase no existiría.

Líneas 17 a 27: Comentario del método enviar()
Qué hace exactamente: Explica que el método insertar una notificación para un usuario destino y que si la columna link no existe, intenta guardar sin ella.
Con qué se conecta: Con el método enviar() que empieza en la línea 28.
Para qué sirve: Documenta los parámetros que necesita el método: conexión PDO, ID del usuario destino, tipo, mensaje y link opcional.
Qué pasaría si se quita: El método funcionaría igual, pero quien lea el código tendría menos claridad sobre cómo usarlo.

Línea 28: public static function enviar(
Qué hace exactamente: Declara un método público y estático llamado enviar.
Con qué se conecta: Con llamadas como Notificacion::enviar($db, $id_destino, 'info', 'Mensaje', 'ruta.php').
Para qué sirve: Permite enviar una notificación a un solo usuario sin tener que crear un objeto con new Notificacion().
Qué pasaría si se quita: No se podrían enviar notificaciones individuales desde los controladores.

Línea 29: PDO     $db,
Qué hace exactamente: Recibe la conexión activa a la base de datos.
Con qué se conecta: Con la clase Database del archivo config/database.php, que normalmente devuelve una conexión PDO.
Para qué sirve: Permite ejecutar el INSERT dentro de la tabla notificacion_operativa.
Qué pasaría si se quita: El método no tendría conexión para guardar la notificación.

Línea 30: int     $id_destino,
Qué hace exactamente: Recibe el ID del usuario que va a recibir la notificación.
Con qué se conecta: Con la columna id_usuario_destino de la tabla notificacion_operativa y con la tabla usuario.
Para qué sirve: Define a qué usuario le aparecerá la notificación.
Qué pasaría si se quita: El sistema no sabría quién debe recibir la notificación.

Línea 31: string  $tipo,
Qué hace exactamente: Recibe el tipo de notificación.
Con qué se conecta: Con la columna tipo de la tabla notificacion_operativa.
Para qué sirve: Permite clasificar la notificación como error, warning, success o info.
Qué pasaría si se quita: No se podría guardar el tipo de alerta y la interfaz no sabría cómo mostrarla visualmente.

Línea 32: string  $mensaje,
Qué hace exactamente: Recibe el texto que verá el usuario.
Con qué se conecta: Con la columna mensaje de la tabla notificacion_operativa.
Para qué sirve: Guarda el contenido principal de la notificación.
Qué pasaría si se quita: La notificación no tendría mensaje para mostrar.

Línea 33: ?string $link = null
Qué hace exactamente: Recibe un enlace opcional. El signo ? indica que puede ser string o null.
Con qué se conecta: Con la columna link de la tabla notificacion_operativa.
Para qué sirve: Permite que la notificación lleve al usuario a una vista específica del sistema, por ejemplo dashboard.php o prestamos.php.
Qué pasaría si se quita: Las notificaciones no podrían guardar una ruta de destino.

Línea 34: ): bool {
Qué hace exactamente: Cierra la declaración de parámetros e indica que el método devuelve un booleano.
Con qué se conecta: Con los return true y return false del método.
Para qué sirve: Permite que el controlador sepa si la notificación fue creada correctamente.
Qué pasaría si se quita: La firma del método quedaría incompleta y habría error de sintaxis.

Línea 35: // Intentar con columna 'link'
Qué hace exactamente: Es un comentario que explica que primero se intentará insertar la notificación incluyendo la columna link.
Con qué se conecta: Con el bloque try que empieza en la línea 36.
Para qué sirve: Ayuda a entender la intención del primer intento de inserción.
Qué pasaría si se quita: No afecta el funcionamiento, solo se pierde explicación.

Línea 36: try {
Qué hace exactamente: Inicia un bloque try para intentar ejecutar código que podría fallar.
Con qué se conecta: Con el catch de la línea 48.
Para qué sirve: Si el INSERT falla, el código puede capturar el error y hacer un segundo intento sin link.
Qué pasaría si se quita: Si ocurre un error, no habría manejo controlado y el sistema podría romper el flujo.

Línea 37: $stmt = $db->prepare(
Qué hace exactamente: Prepara una consulta SQL usando la conexión $db.
Con qué se conecta: Con el objeto PDO recibido en la línea 29.
Para qué sirve: Crea una sentencia SQL segura para insertar la notificación.
Qué pasaría si se quita: No se prepararía la consulta y no se podría hacer el INSERT.

Líneas 38 a 40: "INSERT INTO notificacion_operativa ..."
Qué hace exactamente: Define la consulta SQL para insertar una notificación con destino, tipo, mensaje, link, fecha actual y estado de lectura.
Con qué se conecta: Con la tabla notificacion_operativa.
Para qué sirve: Guarda una nueva notificación en la base de datos.
Qué pasaría si se quita: No se insertaría ninguna notificación.

Línea 41: );
Qué hace exactamente: Cierra la llamada a prepare().
Con qué se conecta: Con la línea 37.
Para qué sirve: Finaliza la preparación de la consulta.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 42: $stmt->bindValue(':destino', $id_destino, PDO::PARAM_INT);
Qué hace exactamente: Asocia el parámetro :destino con el valor de $id_destino.
Con qué se conecta: Con id_usuario_destino dentro del INSERT.
Para qué sirve: Guarda el ID del usuario que recibirá la notificación de forma segura.
Qué pasaría si se quita: La consulta fallaría porque :destino no tendría valor.

Línea 43: $stmt->bindValue(':tipo',    $tipo,       PDO::PARAM_STR);
Qué hace exactamente: Asocia el parámetro :tipo con la variable $tipo.
Con qué se conecta: Con la columna tipo de la tabla notificacion_operativa.
Para qué sirve: Guarda el tipo de notificación.
Qué pasaría si se quita: La consulta fallaría porque :tipo no tendría valor.

Línea 44: $stmt->bindValue(':mensaje', $mensaje,    PDO::PARAM_STR);
Qué hace exactamente: Asocia el parámetro :mensaje con la variable $mensaje.
Con qué se conecta: Con la columna mensaje de la tabla notificacion_operativa.
Para qué sirve: Guarda el texto que verá el usuario.
Qué pasaría si se quita: La consulta fallaría porque :mensaje no tendría valor.

Línea 45: $stmt->bindValue(':link',    $link,       $link === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
Qué hace exactamente: Asocia el parámetro :link con la variable $link. Si $link es null, lo guarda como NULL; si tiene texto, lo guarda como string.
Con qué se conecta: Con la columna link de la tabla notificacion_operativa.
Para qué sirve: Permite guardar enlaces opcionales sin causar errores cuando no hay link.
Qué pasaría si se quita: La consulta fallaría porque :link no tendría valor asignado.

Línea 46: $stmt->execute();
Qué hace exactamente: Ejecuta el INSERT preparado.
Con qué se conecta: Con la base de datos mediante PDO.
Para qué sirve: Guarda realmente la notificación en la tabla notificacion_operativa.
Qué pasaría si se quita: La consulta estaría preparada, pero nunca se ejecutaría.

Línea 47: return true;
Qué hace exactamente: Devuelve true indicando que la notificación fue insertada correctamente.
Con qué se conecta: Con el controlador que llamó Notificacion::enviar().
Para qué sirve: Permite saber que el proceso fue exitoso.
Qué pasaría si se quita: El método no devolvería confirmación de éxito después del INSERT.

Línea 48: } catch (Exception $e) {
Qué hace exactamente: Captura cualquier error ocurrido dentro del primer try.
Con qué se conecta: Con el try de la línea 36.
Para qué sirve: Permite hacer un segundo intento si falla la inserción con la columna link.
Qué pasaría si se quita: Si falla el primer INSERT, el sistema no tendría fallback y podría mostrar error.

Línea 49: // Fallback: insertar sin 'link' (columna puede no existir aún)
Qué hace exactamente: Comentario que explica que el segundo intento insertará la notificación sin la columna link.
Con qué se conecta: Con el try de la línea 50.
Para qué sirve: Aclara que este bloque existe por compatibilidad con bases de datos que aún no tienen la columna link.
Qué pasaría si se quita: No afecta el funcionamiento, pero se pierde explicación importante.

Línea 50: try {
Qué hace exactamente: Inicia un segundo bloque try.
Con qué se conecta: Con el catch de la línea 61.
Para qué sirve: Intenta insertar la notificación sin usar link.
Qué pasaría si se quita: No habría segundo intento si falla el primero.

Línea 51: $stmt2 = $db->prepare(
Qué hace exactamente: Prepara una segunda consulta SQL.
Con qué se conecta: Con la misma conexión PDO $db.
Para qué sirve: Crear un INSERT alternativo sin la columna link.
Qué pasaría si se quita: No se podría preparar el fallback.

Líneas 52 a 54: "INSERT INTO notificacion_operativa ..."
Qué hace exactamente: Define una consulta INSERT que guarda destino, tipo, mensaje, fecha actual y leida, pero no guarda link.
Con qué se conecta: Con la tabla notificacion_operativa.
Para qué sirve: Permite guardar notificaciones aunque la columna link no exista en la base de datos.
Qué pasaría si se quita: Si falla el primer INSERT, no se guardaría ninguna notificación.

Línea 55: );
Qué hace exactamente: Cierra la llamada a prepare() del segundo INSERT.
Con qué se conecta: Con la línea 51.
Para qué sirve: Finaliza la preparación de la consulta alternativa.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 56: $stmt2->bindValue(':destino', $id_destino, PDO::PARAM_INT);
Qué hace exactamente: Asocia el parámetro :destino con el ID del usuario destino.
Con qué se conecta: Con id_usuario_destino de la tabla notificacion_operativa.
Para qué sirve: Indica quién recibirá la notificación en el segundo intento.
Qué pasaría si se quita: El segundo INSERT fallaría.

Línea 57: $stmt2->bindValue(':tipo',    $tipo,       PDO::PARAM_STR);
Qué hace exactamente: Asocia el tipo de notificación al segundo INSERT.
Con qué se conecta: Con la columna tipo.
Para qué sirve: Guarda la clasificación de la notificación.
Qué pasaría si se quita: El segundo INSERT fallaría.

Línea 58: $stmt2->bindValue(':mensaje', $mensaje,    PDO::PARAM_STR);
Qué hace exactamente: Asocia el mensaje al segundo INSERT.
Con qué se conecta: Con la columna mensaje.
Para qué sirve: Guarda el texto de la notificación.
Qué pasaría si se quita: El segundo INSERT fallaría.

Línea 59: $stmt2->execute();
Qué hace exactamente: Ejecuta el segundo INSERT.
Con qué se conecta: Con la base de datos.
Para qué sirve: Guarda la notificación sin link.
Qué pasaría si se quita: La notificación no se guardaría en el fallback.

Línea 60: return true;
Qué hace exactamente: Devuelve true si el segundo intento funcionó.
Con qué se conecta: Con el controlador que llamó el método.
Para qué sirve: Informa que la notificación sí fue creada, aunque sin link.
Qué pasaría si se quita: El método no confirmaría que el fallback funcionó.

Línea 61: } catch (Exception $e2) {
Qué hace exactamente: Captura errores del segundo intento.
Con qué se conecta: Con el try de la línea 50.
Para qué sirve: Evita que el sistema se rompa si también falla el INSERT sin link.
Qué pasaría si se quita: Un error del fallback podría generar un error fatal o romper la respuesta.

Línea 62: return false;
Qué hace exactamente: Devuelve false si fallaron ambos intentos.
Con qué se conecta: Con el controlador que llamó Notificacion::enviar().
Para qué sirve: Indica que no se pudo guardar la notificación.
Qué pasaría si se quita: El método no tendría una respuesta clara en caso de fallo total.

Línea 63: }
Qué hace exactamente: Cierra el catch interno.
Con qué se conecta: Con la línea 61.
Para qué sirve: Finaliza el manejo de error del segundo intento.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 64: }
Qué hace exactamente: Cierra el catch externo.
Con qué se conecta: Con la línea 48.
Para qué sirve: Finaliza el manejo de error del primer intento.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 65: }
Qué hace exactamente: Cierra el método enviar().
Con qué se conecta: Con la línea 28.
Para qué sirve: Finaliza el método que envía una notificación individual.
Qué pasaría si se quita: Habría error de sintaxis.

Líneas 67 a 75: Comentario del método enviarAVarios()
Qué hace exactamente: Explica que se enviará la misma notificación a varios usuarios.
Con qué se conecta: Con el método enviarAVarios() que empieza en la línea 76.
Para qué sirve: Documenta que recibe un arreglo de IDs de usuarios destino.
Qué pasaría si se quita: El método funciona, pero se pierde claridad.

Línea 76: public static function enviarAVarios(
Qué hace exactamente: Declara un método público y estático llamado enviarAVarios.
Con qué se conecta: Con controladores que necesitan notificar a varios usuarios al mismo tiempo.
Para qué sirve: Evita repetir manualmente Notificacion::enviar() muchas veces en los controladores.
Qué pasaría si se quita: No habría método para envío masivo de notificaciones.

Línea 77: PDO     $db,
Qué hace exactamente: Recibe la conexión activa a la base de datos.
Con qué se conecta: Con Database::conectar() y con el método enviar().
Para qué sirve: Pasar la conexión a cada envío individual.
Qué pasaría si se quita: No se podrían insertar las notificaciones.

Línea 78: array   $ids_destino,
Qué hace exactamente: Recibe un arreglo con IDs de usuarios destino.
Con qué se conecta: Con la tabla usuario y con notificacion_operativa.id_usuario_destino.
Para qué sirve: Define a qué usuarios se les enviará la misma notificación.
Qué pasaría si se quita: El método no sabría a quién enviar las notificaciones.

Línea 79: string  $tipo,
Qué hace exactamente: Recibe el tipo de notificación.
Con qué se conecta: Con el parámetro $tipo del método enviar().
Para qué sirve: Usar la misma categoría para todos los destinatarios.
Qué pasaría si se quita: No se podría definir el tipo de notificación masiva.

Línea 80: string  $mensaje,
Qué hace exactamente: Recibe el mensaje que se enviará a todos.
Con qué se conecta: Con el parámetro $mensaje del método enviar().
Para qué sirve: Usar el mismo texto para cada usuario destino.
Qué pasaría si se quita: No habría mensaje para enviar.

Línea 81: ?string $link = null
Qué hace exactamente: Recibe un link opcional para todos los destinatarios.
Con qué se conecta: Con el parámetro $link del método enviar().
Para qué sirve: Permite que todas las notificaciones apunten a la misma vista.
Qué pasaría si se quita: Las notificaciones masivas no podrían incluir enlace.

Línea 82: ): void {
Qué hace exactamente: Indica que el método no devuelve ningún valor.
Con qué se conecta: Con el flujo del controlador que llama enviarAVarios().
Para qué sirve: Este método solo ejecuta envíos; no entrega true o false general.
Qué pasaría si se quita: La declaración del método quedaría incompleta.

Línea 83: foreach ($ids_destino as $id) {
Qué hace exactamente: Recorre cada ID dentro del arreglo $ids_destino.
Con qué se conecta: Con el arreglo de usuarios que recibirán la notificación.
Para qué sirve: Enviar una notificación individual a cada usuario.
Qué pasaría si se quita: No se recorrerían los destinatarios y no se enviaría nada.

Línea 84: self::enviar($db, (int) $id, $tipo, $mensaje, $link);
Qué hace exactamente: Llama al método enviar() para cada ID del arreglo.
Con qué se conecta: Con el método enviar() de esta misma clase.
Para qué sirve: Reutiliza la lógica de envío individual para crear notificaciones masivas.
Qué pasaría si se quita: El foreach recorrería los IDs, pero no insertaría notificaciones.

Línea 85: }
Qué hace exactamente: Cierra el foreach.
Con qué se conecta: Con la línea 83.
Para qué sirve: Finaliza el recorrido de destinatarios.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 86: }
Qué hace exactamente: Cierra el método enviarAVarios().
Con qué se conecta: Con la línea 76.
Para qué sirve: Finaliza el método de envío masivo.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 87: }
Qué hace exactamente: Cierra la clase Notificacion.
Con qué se conecta: Con la línea 15.
Para qué sirve: Finaliza toda la clase.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 88: ?>
Qué hace exactamente: Cierra el bloque PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Marca el final del archivo PHP.
Qué pasaría si se quita: En archivos PHP puros normalmente puede funcionar, pero aquí se usa como cierre formal.

Conclusión:
Este archivo es un helper central de notificaciones. Sirve para insertar avisos en la tabla notificacion_operativa. Tiene un método para enviar una notificación a un usuario y otro para enviar la misma notificación a varios usuarios. Se conecta directamente con la base de datos mediante PDO y es usado por varios controladores del sistema para informar acciones importantes como pagos, solicitudes, tareas o liquidaciones.