Línea 1: <?php
Qué hace exactamente: Abre el archivo como PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Permite ejecutar la clase Usuario.
Qué pasaría si se quita: El archivo podría no interpretarse correctamente.

Líneas 2 a 16: Comentario de documentación
Qué hace exactamente: Explica que el modelo maneja usuarios y solicitudes de registro.
Con qué se conecta: Con usuario y solicitud_registro.
Para qué sirve: Documentar que lo usan LoginController.php y UsuarioController.php.
Qué pasaría si se quita: El código funciona, pero se pierde contexto.

Línea 17: class Usuario {
Qué hace exactamente: Declara la clase Usuario.
Con qué se conecta: Con LoginController.php y UsuarioController.php.
Para qué sirve: Agrupar autenticación y registro de solicitudes.
Qué pasaría si se quita: No se podría usar new Usuario($db).

Línea 19: private $conn;
Qué hace exactamente: Declara conexión privada.
Con qué se conecta: Con PDO.
Para qué sirve: Guardar acceso a la base de datos.
Qué pasaría si se quita: Los métodos no funcionarían.

Línea 20: private $tabla = "usuario";
Qué hace exactamente: Guarda el nombre de la tabla principal.
Con qué se conecta: Con la tabla usuario.
Para qué sirve: Reutilizar el nombre de tabla en consultas.
Qué pasaría si se quita: Las consultas que usan $this->tabla fallarían.

Líneas 22 a 25: Comentario del constructor
Qué hace exactamente: Explica que recibe conexión PDO.
Con qué se conecta: Con controladores.
Para qué sirve: Documentar el constructor.
Qué pasaría si se quita: No afecta.

Línea 26: public function __construct($db) {
Qué hace exactamente: Declara constructor.
Con qué se conecta: Con new Usuario($db).
Para qué sirve: Recibir conexión.
Qué pasaría si se quita: No se inicializaría $conn.

Línea 27: $this->conn = $db;
Qué hace exactamente: Guarda conexión.
Con qué se conecta: Con todos los métodos.
Para qué sirve: Ejecutar consultas.
Qué pasaría si se quita: Las consultas fallarían.

Línea 28: }
Qué hace exactamente: Cierra constructor.
Con qué se conecta: Con línea 26.
Para qué sirve: Finaliza inicialización.
Qué pasaría si se quita: Error de sintaxis.

Líneas 30 a 36: Comentario existeUsuario()
Qué hace exactamente: Explica que verifica username duplicado.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Documentar validación.
Qué pasaría si se quita: No afecta.

Línea 37: public function existeUsuario($nombre_de_usuario) {
Qué hace exactamente: Declara método para verificar si un username existe.
Con qué se conecta: Con UsuarioController.php.
Para qué sirve: Evitar duplicados.
Qué pasaría si se quita: No se podría validar usuario existente.

Línea 38: $sql = "SELECT id_usuario FROM " . $this->tabla . " WHERE username = :username LIMIT 1";
Qué hace exactamente: Crea consulta para buscar username.
Con qué se conecta: Con tabla usuario y columna username.
Para qué sirve: Saber si ya hay una cuenta con ese nombre.
Qué pasaría si se quita: No habría consulta.

Línea 39: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutarla de forma segura.
Qué pasaría si se quita: No se podría ejecutar.

Línea 40: $stmt->bindParam(":username", $nombre_de_usuario);
Qué hace exactamente: Vincula el username.
Con qué se conecta: Con :username.
Para qué sirve: Buscar el valor enviado.
Qué pasaría si se quita: La consulta fallaría.

Línea 41: $stmt->execute();
Qué hace exactamente: Ejecuta consulta.
Con qué se conecta: Con base de datos.
Para qué sirve: Verificar existencia.
Qué pasaría si se quita: No se consultaría.

Línea 43: return $stmt->rowCount() > 0;
Qué hace exactamente: Devuelve true si encontró registros.
Con qué se conecta: Con UsuarioController.php.
Para qué sirve: Informar si el username ya existe.
Qué pasaría si se quita: El método no devolvería resultado.

Línea 44: }
Qué hace exactamente: Cierra existeUsuario().
Con qué se conecta: Con línea 37.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 46 a 52: Comentario obtenerPorUsuario()
Qué hace exactamente: Explica que busca usuario activo por username.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Documentar autenticación.
Qué pasaría si se quita: No afecta.

Línea 53: public function obtenerPorUsuario($username) {
Qué hace exactamente: Declara método para buscar usuario por username.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Obtener datos para validar contraseña y rol.
Qué pasaría si se quita: El login no podría buscar usuarios.

Línea 54: $sql = "SELECT * FROM " . $this->tabla . " WHERE username = :username AND activo = 1 LIMIT 1";
Qué hace exactamente: Busca usuario activo con ese username.
Con qué se conecta: Con usuario.username y usuario.activo.
Para qué sirve: Permitir login solo a cuentas activas.
Qué pasaría si se quita: No habría consulta de autenticación.

Línea 55: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar de forma segura.
Qué pasaría si se quita: No se podría buscar usuario.

Línea 56: $stmt->bindParam(":username", $username);
Qué hace exactamente: Vincula username.
Con qué se conecta: Con :username.
Para qué sirve: Buscar el usuario enviado en login.
Qué pasaría si se quita: La consulta fallaría.

Línea 57: $stmt->execute();
Qué hace exactamente: Ejecuta consulta.
Con qué se conecta: Con base de datos.
Para qué sirve: Obtener usuario activo.
Qué pasaría si se quita: No se consultaría.

Línea 59: return $stmt->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve usuario o false.
Con qué se conecta: Con LoginController.php.
Para qué sirve: Entregar password_hash, rol, id_usuario, username, etc.
Qué pasaría si se quita: El login no recibiría datos.

Línea 60: }
Qué hace exactamente: Cierra obtenerPorUsuario().
Con qué se conecta: Con línea 53.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Líneas 62 a 76: Comentario registrar()
Qué hace exactamente: Explica que inserta solicitud, no usuario activo.
Con qué se conecta: Con solicitud_registro.
Para qué sirve: Documentar el flujo solicitud → aprobación → usuario activo.
Qué pasaría si se quita: No afecta ejecución, pero se pierde una explicación importante.

Línea 77: public function registrar($datos) {
Qué hace exactamente: Declara método para registrar solicitud.
Con qué se conecta: Con UsuarioController.php.
Para qué sirve: Insertar solicitud pendiente de aprobación.
Qué pasaría si se quita: No se podrían registrar solicitudes.

Línea 78: try {
Qué hace exactamente: Inicia manejo de errores.
Con qué se conecta: Con catch.
Para qué sirve: Capturar fallos y hacer rollback.
Qué pasaría si se quita: Un error podría romper el sistema.

Línea 79: $this->conn->beginTransaction();
Qué hace exactamente: Inicia transacción.
Con qué se conecta: Con commit y rollBack.
Para qué sirve: Controlar la inserción de solicitud.
Qué pasaría si se quita: Se perdería control transaccional.

Líneas 81 a 84: INSERT INTO solicitud_registro
Qué hace exactamente: Prepara inserción de nombres, apellidos, documento, teléfono, EPS, RH, username y password_hash.
Con qué se conecta: Con tabla solicitud_registro.
Para qué sirve: Guardar solicitud pendiente.
Qué pasaría si se quita: No se registraría la solicitud.

Línea 86: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara INSERT.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar de forma segura.
Qué pasaría si se quita: No se podría insertar.

Líneas 87 a 94: bindParam de solicitud
Qué hace exactamente: Vincula los datos del arreglo $datos al INSERT.
Con qué se conecta: Con claves nombres, apellidos, documento, telefono, eps, RH, nombre_de_usuario y contraseña.
Para qué sirve: Guardar los datos enviados desde el formulario.
Qué pasaría si se quitan: El INSERT fallaría.

Línea 94: $stmt->bindParam(":password_hash", $datos['contraseña']);
Qué hace exactamente: Guarda la contraseña ya hasheada.
Con qué se conecta: Con UsuarioController.php, donde se usa password_hash().
Para qué sirve: Evitar guardar contraseña en texto plano.
Qué pasaría si se quita: La solicitud no tendría contraseña para crear usuario al aprobar.

Línea 95: $stmt->execute();
Qué hace exactamente: Ejecuta INSERT.
Con qué se conecta: Con base de datos.
Para qué sirve: Guarda la solicitud.
Qué pasaría si se quita: No se insertaría nada.

Línea 97: $this->conn->commit();
Qué hace exactamente: Confirma transacción.
Con qué se conecta: Con beginTransaction().
Para qué sirve: Guarda definitivamente la solicitud.
Qué pasaría si se quita: La transacción podría no confirmarse.

Línea 98: return true;
Qué hace exactamente: Devuelve éxito.
Con qué se conecta: Con UsuarioController.php.
Para qué sirve: Informar que el registro fue exitoso.
Qué pasaría si se quita: El controlador no sabría si funcionó.

Líneas 100 a 105: catch
Qué hace exactamente: Si falla, revierte transacción y devuelve mensaje.
Con qué se conecta: Con rollBack().
Para qué sirve: Evitar datos incompletos y mostrar error.
Qué pasaría si se quita: Podrían quedar errores sin controlar.

Línea 107: }
Qué hace exactamente: Cierra registrar().
Con qué se conecta: Con línea 77.
Para qué sirve: Finaliza método.
Qué pasaría si se quita: Error de sintaxis.

Línea 108: }
Qué hace exactamente: Cierra clase Usuario.
Con qué se conecta: Con línea 17.
Para qué sirve: Finaliza modelo.
Qué pasaría si se quita: Error de sintaxis.

Línea 109: ?>
Qué hace exactamente: Cierra PHP.
Con qué se conecta: Con intérprete PHP.
Para qué sirve: Fin formal.
Qué pasaría si se quita: Puede funcionar, pero aquí se usa cierre formal.

Conclusión:
Este modelo maneja usuarios y solicitudes de registro. Se conecta con usuario para login y validación de username, y con solicitud_registro para guardar nuevos registros pendientes. Es usado por LoginController.php y UsuarioController.php.