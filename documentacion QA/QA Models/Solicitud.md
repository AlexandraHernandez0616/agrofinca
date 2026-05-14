Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete PHP del servidor.
Para qué sirve: Permite ejecutar la clase Solicitud.
Qué pasaría si se quita: El archivo podría no interpretarse correctamente.

Líneas 2 a 22: Comentario de documentación
Qué hace exactamente: Explica que el modelo maneja solicitudes de registro de trabajadores.
Con qué se conecta: Con solicitud_registro, usuario y trabajador.
Para qué sirve: Documenta el flujo de aprobación y rechazo.
Qué pasaría si se quita: El código funciona, pero se pierde claridad sobre el flujo.

Línea 23: class Solicitud {
Qué hace exactamente: Declara la clase Solicitud.
Con qué se conecta: Con SolicitudController.php.
Para qué sirve: Agrupa los métodos para listar, aprobar y rechazar solicitudes.
Qué pasaría si se quita: No se podría crear new Solicitud($db).

Línea 25: private $conn;
Qué hace exactamente: Declara la conexión privada.
Con qué se conecta: Con PDO.
Para qué sirve: Guardar la conexión para consultar o modificar la base de datos.
Qué pasaría si se quita: Los métodos no podrían ejecutar consultas SQL.

Línea 27: public function __construct($db) {
Qué hace exactamente: Declara el constructor.
Con qué se conecta: Con el controlador que envía $db.
Para qué sirve: Recibir la conexión a la base de datos.
Qué pasaría si se quita: No se inicializaría la conexión.

Línea 28: $this->conn = $db;
Qué hace exactamente: Guarda la conexión en la propiedad $conn.
Con qué se conecta: Con todos los métodos de la clase.
Para qué sirve: Permite usar $this->conn en consultas.
Qué pasaría si se quita: Las consultas fallarían.

Línea 29: }
Qué hace exactamente: Cierra el constructor.
Con qué se conecta: Con la línea 27.
Para qué sirve: Finaliza la inicialización.
Qué pasaría si se quita: Error de sintaxis.

Líneas 31 a 35: Comentario de listarPendientes()
Qué hace exactamente: Explica que se listan solicitudes con estado PENDIENTE.
Con qué se conecta: Con la tabla solicitud_registro.
Para qué sirve: Documentar qué registros se muestran al mayordomo.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 36: public function listarPendientes() {
Qué hace exactamente: Declara el método para listar solicitudes pendientes.
Con qué se conecta: Con la vista del mayordomo donde se revisan solicitudes.
Para qué sirve: Mostrar solicitudes aún no aprobadas ni rechazadas.
Qué pasaría si se quita: No se podrían cargar solicitudes pendientes.

Líneas 37 a 41: SELECT solicitudes pendientes
Qué hace exactamente: Consulta datos principales de solicitudes con estado PENDIENTE.
Con qué se conecta: Con solicitud_registro.
Para qué sirve: Traer nombres, documento, username, EPS, RH y fecha.
Qué pasaría si se quita: No habría listado de solicitudes.

Línea 42: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Crear una sentencia ejecutable.
Qué pasaría si se quita: No se podría ejecutar el SELECT.

Línea 43: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtener las solicitudes pendientes.
Qué pasaría si se quita: No se consultaría nada.

Línea 44: return $stmt->fetchAll(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve todas las solicitudes como arreglo asociativo.
Con qué se conecta: Con el controlador o vista.
Para qué sirve: Entregar datos listos para mostrar.
Qué pasaría si se quita: El método no devolvería resultados.

Línea 45: }
Qué hace exactamente: Cierra listarPendientes().
Con qué se conecta: Con línea 36.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 47 a 52: Comentario de obtenerPorId()
Qué hace exactamente: Explica que se obtiene una solicitud por ID.
Con qué se conecta: Con aprobar() y rechazar().
Para qué sirve: Verificar que una solicitud existe antes de gestionarla.
Qué pasaría si se quita: El código funciona, pero se pierde explicación.

Línea 53: public function obtenerPorId($id) {
Qué hace exactamente: Declara método para buscar una solicitud específica.
Con qué se conecta: Con aprobar(), que llama a este método.
Para qué sirve: Cargar todos los datos de una solicitud.
Qué pasaría si se quita: aprobar() no podría obtener los datos necesarios.

Línea 54: $sql = "SELECT * FROM solicitud_registro WHERE id_solicitud = :id LIMIT 1";
Qué hace exactamente: Crea SQL para buscar una solicitud por ID.
Con qué se conecta: Con solicitud_registro.id_solicitud.
Para qué sirve: Obtener un solo registro.
Qué pasaría si se quita: No habría consulta para buscar la solicitud.

Línea 55: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar de forma segura.
Qué pasaría si se quita: No habría sentencia preparada.

Línea 56: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Vincula el ID recibido con :id.
Con qué se conecta: Con WHERE id_solicitud = :id.
Para qué sirve: Buscar la solicitud exacta.
Qué pasaría si se quita: La consulta fallaría.

Línea 57: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtener la solicitud.
Qué pasaría si se quita: No se consultaría nada.

Línea 58: return $stmt->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve una solicitud como arreglo o false.
Con qué se conecta: Con aprobar().
Para qué sirve: Entregar los datos que se usarán para crear usuario y trabajador.
Qué pasaría si se quita: No se retornarían datos.

Línea 59: }
Qué hace exactamente: Cierra obtenerPorId().
Con qué se conecta: Con línea 53.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 61 a 71: Comentario de aprobar()
Qué hace exactamente: Explica que aprobar inserta en usuario, inserta en trabajador y actualiza solicitud_registro.
Con qué se conecta: Con el método aprobar().
Para qué sirve: Documentar el flujo completo y la transacción.
Qué pasaría si se quita: El código funciona, pero sería menos claro.

Línea 72: public function aprobar($id_solicitud, $id_mayordomo) {
Qué hace exactamente: Declara método para aprobar una solicitud.
Con qué se conecta: Con SolicitudController.php cuando accion = aprobar.
Para qué sirve: Convertir una solicitud pendiente en un trabajador activo.
Qué pasaría si se quita: No se podrían aprobar solicitudes.

Línea 73: try {
Qué hace exactamente: Inicia un bloque de control de errores.
Con qué se conecta: Con catch de línea 123.
Para qué sirve: Manejar errores y hacer rollback si algo falla.
Qué pasaría si se quita: Un fallo podría romper el flujo.

Línea 74: $this->conn->beginTransaction();
Qué hace exactamente: Inicia una transacción de base de datos.
Con qué se conecta: Con commit() y rollBack().
Para qué sirve: Asegura que usuario, trabajador y solicitud se actualicen juntos.
Qué pasaría si se quita: Podría crearse un usuario sin trabajador si algo falla.

Línea 77: $sol = $this->obtenerPorId($id_solicitud);
Qué hace exactamente: Busca los datos de la solicitud.
Con qué se conecta: Con el método obtenerPorId().
Para qué sirve: Obtener nombres, apellidos, documento, teléfono, username, password_hash, eps y rh.
Qué pasaría si se quita: No habría datos para crear el usuario.

Línea 78: if (!$sol) throw new Exception("Solicitud no encontrada");
Qué hace exactamente: Lanza un error si la solicitud no existe.
Con qué se conecta: Con el catch.
Para qué sirve: Evitar aprobar una solicitud inexistente.
Qué pasaría si se quita: El código intentaría usar datos vacíos.

Líneas 81 a 86: INSERT INTO usuario
Qué hace exactamente: Prepara la creación del nuevo usuario con rol TRABAJADOR.
Con qué se conecta: Con la tabla usuario.
Para qué sirve: Crear la cuenta activa del trabajador.
Qué pasaría si se quita: No se crearía el usuario.

Líneas 87 a 94: bindParam de usuario
Qué hace exactamente: Vincula los datos de la solicitud con el INSERT de usuario.
Con qué se conecta: Con $sol y columnas de usuario.
Para qué sirve: Guardar correctamente los datos personales y credenciales.
Qué pasaría si se quitan: El INSERT fallaría.

Línea 95: $stmtU->execute();
Qué hace exactamente: Ejecuta el INSERT en usuario.
Con qué se conecta: Con la base de datos.
Para qué sirve: Crea la cuenta del trabajador.
Qué pasaría si se quita: No se crearía el usuario.

Línea 97: $id_usuario = $this->conn->lastInsertId();
Qué hace exactamente: Obtiene el ID del usuario recién creado.
Con qué se conecta: Con el INSERT anterior.
Para qué sirve: Usarlo como id_trabajador.
Qué pasaría si se quita: No se sabría qué ID insertar en trabajador.

Líneas 100 a 103: INSERT INTO trabajador
Qué hace exactamente: Prepara el registro laboral del trabajador.
Con qué se conecta: Con la tabla trabajador.
Para qué sirve: Crea los datos laborales: EPS, RH, estado ACTIVO y fecha de ingreso.
Qué pasaría si se quita: El usuario existiría, pero no tendría registro en trabajador.

Líneas 104 a 107: bindParam de trabajador
Qué hace exactamente: Vincula ID, EPS y RH.
Con qué se conecta: Con $id_usuario y $sol.
Para qué sirve: Crear trabajador con datos correctos.
Qué pasaría si se quitan: El INSERT fallaría.

Línea 108: $stmtT->execute();
Qué hace exactamente: Ejecuta el INSERT en trabajador.
Con qué se conecta: Con la base de datos.
Para qué sirve: Guarda el registro laboral.
Qué pasaría si se quita: No se crearía trabajador.

Líneas 111 a 115: UPDATE solicitud_registro APROBADA
Qué hace exactamente: Cambia la solicitud a estado APROBADA y guarda el mayordomo gestor.
Con qué se conecta: Con solicitud_registro.
Para qué sirve: Marcar la solicitud como gestionada.
Qué pasaría si se quita: La solicitud seguiría apareciendo como pendiente.

Líneas 116 a 118: bindParam solicitud aprobada
Qué hace exactamente: Vincula id_mayordomo e id_solicitud.
Con qué se conecta: Con id_mayordomo_gestor e id_solicitud.
Para qué sirve: Guardar quién aprobó y qué solicitud se aprobó.
Qué pasaría si se quitan: El UPDATE fallaría.

Línea 119: $stmtS->execute();
Qué hace exactamente: Ejecuta el UPDATE.
Con qué se conecta: Con la base de datos.
Para qué sirve: Actualiza el estado de la solicitud.
Qué pasaría si se quita: No se marcaría como aprobada.

Línea 121: $this->conn->commit();
Qué hace exactamente: Confirma la transacción.
Con qué se conecta: Con beginTransaction().
Para qué sirve: Guarda definitivamente todos los cambios.
Qué pasaría si se quita: La transacción podría no confirmarse correctamente.

Línea 122: return true;
Qué hace exactamente: Devuelve éxito.
Con qué se conecta: Con SolicitudController.php.
Para qué sirve: Informar que la aprobación terminó bien.
Qué pasaría si se quita: El controlador no sabría si funcionó.

Líneas 123 a 126: catch de aprobar()
Qué hace exactamente: Captura errores, revierte la transacción y devuelve mensaje.
Con qué se conecta: Con rollBack().
Para qué sirve: Evitar datos incompletos si algo falla.
Qué pasaría si se quita: Podrían quedar registros a medias.

Línea 127: }
Qué hace exactamente: Cierra aprobar().
Con qué se conecta: Con línea 72.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 129 a 139: Comentario de rechazar()
Qué hace exactamente: Explica que rechaza una solicitud y guarda observación.
Con qué se conecta: Con solicitud_registro.
Para qué sirve: Documentar el método.
Qué pasaría si se quita: No afecta funcionamiento.

Línea 140: public function rechazar($id_solicitud, $id_mayordomo, $observacion = '') {
Qué hace exactamente: Declara método para rechazar una solicitud.
Con qué se conecta: Con SolicitudController.php cuando accion = rechazar.
Para qué sirve: Cambiar una solicitud pendiente a rechazada.
Qué pasaría si se quita: No se podrían rechazar solicitudes.

Línea 141: try {
Qué hace exactamente: Inicia manejo de errores.
Con qué se conecta: Con catch de línea 157.
Para qué sirve: Capturar errores del UPDATE.
Qué pasaría si se quita: Un error SQL podría romper el sistema.

Líneas 142 a 147: UPDATE solicitud_registro RECHAZADA
Qué hace exactamente: Cambia estado, fecha de gestión, mayordomo gestor y observación.
Con qué se conecta: Con solicitud_registro.
Para qué sirve: Registrar formalmente el rechazo.
Qué pasaría si se quita: La solicitud no se rechazaría.

Líneas 148 a 151: bindParam rechazo
Qué hace exactamente: Vincula mayordomo, observación e ID.
Con qué se conecta: Con los parámetros del UPDATE.
Para qué sirve: Guardar quién rechazó y por qué.
Qué pasaría si se quitan: El UPDATE fallaría.

Línea 152: $stmt->execute();
Qué hace exactamente: Ejecuta el UPDATE.
Con qué se conecta: Con la base de datos.
Para qué sirve: Aplica el rechazo.
Qué pasaría si se quita: No se rechazaría la solicitud.

Líneas 154 a 156: Validación rowCount()
Qué hace exactamente: Si no se actualizó ninguna fila, devuelve que la solicitud no existe o ya fue gestionada.
Con qué se conecta: Con el resultado del UPDATE.
Para qué sirve: Evitar reportar éxito cuando no pasó nada.
Qué pasaría si se quita: Podría decir que rechazó aunque no haya modificado nada.

Línea 157: return true;
Qué hace exactamente: Devuelve éxito.
Con qué se conecta: Con SolicitudController.php.
Para qué sirve: Informar que la solicitud fue rechazada.
Qué pasaría si se quita: No habría confirmación.

Líneas 158 a 160: catch de rechazar()
Qué hace exactamente: Captura errores y devuelve mensaje.
Con qué se conecta: Con excepciones de PDO.
Para qué sirve: Responder de forma controlada.
Qué pasaría si se quita: Un error podría romper el sistema.

Línea 161: }
Qué hace exactamente: Cierra rechazar().
Con qué se conecta: Con línea 140.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Error de sintaxis.

Línea 162: }
Qué hace exactamente: Cierra la clase Solicitud.
Con qué se conecta: Con línea 23.
Para qué sirve: Finaliza el modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 163: ?>
Qué hace exactamente: Cierra PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Fin formal del archivo.
Qué pasaría si se quita: Puede funcionar en PHP puro, pero aquí se usa como cierre formal.

Conclusión:
Este modelo administra las solicitudes de registro de trabajadores. Se conecta con solicitud_registro, usuario y trabajador. Su parte más importante es aprobar solicitudes con una transacción, porque crea el usuario, crea el trabajador y cambia el estado de la solicitud de forma segura.