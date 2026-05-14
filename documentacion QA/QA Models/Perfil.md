Línea 1: <?php
Qué hace exactamente: Abre el archivo como código PHP.
Con qué se conecta: Con el intérprete PHP del servidor.
Para qué sirve: Le indica al servidor que el contenido de este archivo debe ejecutarse como PHP.
Qué pasaría si se quita: El servidor podría no interpretar correctamente el archivo y el modelo Perfil no funcionaría.

Líneas 2 a 12: Comentario de documentación
Qué hace exactamente: Explica que este archivo es models/Perfil.php y que su propósito es manejar operaciones de base de datos para el módulo Perfil de usuario.
Con qué se conecta: Con la tabla usuario de la base de datos.
Para qué sirve: Sirve para documentar qué archivo es, qué módulo maneja y qué columnas de la tabla usuario utiliza.
Qué pasaría si se quita: El código seguiría funcionando, pero sería más difícil entender para qué sirve este modelo.

Línea 13: class Perfil {
Qué hace exactamente: Declara una clase llamada Perfil.
Con qué se conecta: Con el controlador del perfil, normalmente algo como PerfilController.php, donde se podría crear el modelo usando new Perfil($db).
Para qué sirve: Agrupa todos los métodos relacionados con el perfil del usuario: obtener datos, actualizar datos, cambiar contraseña, verificar contraseña y validar documento.
Qué pasaría si se quita: No existiría la clase Perfil y el controlador no podría usar este modelo.

Línea 14: Línea en blanco
Qué hace exactamente: No ejecuta ninguna acción.
Con qué se conecta: No se conecta con ninguna parte del sistema.
Para qué sirve: Mejora la legibilidad visual del código.
Qué pasaría si se quita: El código funcionaría igual, pero se vería menos organizado.

Línea 15: private $conn;
Qué hace exactamente: Declara una propiedad privada llamada $conn.
Con qué se conecta: Con la conexión PDO que viene desde config/database.php.
Para qué sirve: Guarda dentro del modelo la conexión a la base de datos.
Qué pasaría si se quita: Los métodos no tendrían dónde guardar la conexión y no podrían ejecutar consultas SQL usando $this->conn.

Línea 16: Línea en blanco
Qué hace exactamente: Solo separa visualmente la propiedad del constructor.
Con qué se conecta: No se conecta con ninguna variable o tabla.
Para qué sirve: Ayuda a leer mejor el archivo.
Qué pasaría si se quita: El código seguiría funcionando.

Línea 17: public function __construct($db) {
Qué hace exactamente: Declara el constructor de la clase Perfil.
Con qué se conecta: Con el controlador que crea el objeto Perfil y le pasa la conexión $db.
Para qué sirve: Permite recibir la conexión a la base de datos cuando se crea el modelo.
Qué pasaría si se quita: La clase no guardaría automáticamente la conexión y los métodos podrían fallar.

Línea 18: $this->conn = $db;
Qué hace exactamente: Guarda la conexión recibida en la propiedad interna $conn.
Con qué se conecta: Con la variable $db que llega desde el controlador y con $this->conn que se usa en todos los métodos.
Para qué sirve: Permite que obtener(), actualizarDatos(), cambiarPassword(), verificarPassword() y documentoEnUso() usen la base de datos.
Qué pasaría si se quita: $this->conn quedaría vacío y las consultas SQL fallarían.

Línea 19: }
Qué hace exactamente: Cierra el constructor.
Con qué se conecta: Con la línea 17.
Para qué sirve: Indica que terminó la función __construct().
Qué pasaría si se quita: Habría error de sintaxis.

Línea 20: Línea en blanco
Qué hace exactamente: Separa el constructor del siguiente bloque de comentario.
Con qué se conecta: No se conecta con ninguna parte lógica.
Para qué sirve: Mejora el orden visual.
Qué pasaría si se quita: El código funcionaría igual.

Líneas 21 a 23: Comentario del método obtener()
Qué hace exactamente: Explica que el método obtiene todos los datos del usuario logueado.
Con qué se conecta: Con el método obtener() que empieza en la línea 24.
Para qué sirve: Documenta que esta función sirve para consultar la información del perfil.
Qué pasaría si se quita: El método funcionaría igual, pero sería menos claro para otro programador.

Línea 24: public function obtener(int $id): array|false {
Qué hace exactamente: Declara el método público obtener(), que recibe un ID de usuario entero.
Con qué se conecta: Con la tabla usuario, usando usuario.id_usuario.
Para qué sirve: Sirve para buscar y devolver los datos del usuario que está viendo su perfil.
Qué pasaría si se quita: No se podrían cargar los datos del perfil del usuario desde este modelo.

Línea 25: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta SQL usando la conexión guardada en $this->conn.
Con qué se conecta: Con PDO y con la consulta SELECT de las líneas siguientes.
Para qué sirve: Crea una consulta segura antes de ejecutarla.
Qué pasaría si se quita: No habría consulta preparada para obtener los datos del usuario.

Línea 26: "SELECT id_usuario, nombres, apellidos, documento,
Qué hace exactamente: Inicia la consulta SELECT y selecciona columnas principales del usuario.
Con qué se conecta: Con las columnas id_usuario, nombres, apellidos y documento de la tabla usuario.
Para qué sirve: Permite traer datos básicos del perfil.
Qué pasaría si se quita: La consulta quedaría incompleta y no se obtendrían esos datos.

Línea 27: telefono, username, rol, activo, fecha_creacion
Qué hace exactamente: Continúa seleccionando más columnas del usuario.
Con qué se conecta: Con las columnas telefono, username, rol, activo y fecha_creacion de la tabla usuario.
Para qué sirve: Permite mostrar teléfono, nombre de usuario, rol, estado y fecha de creación del usuario.
Qué pasaría si se quita: Esos datos no estarían disponibles para la vista del perfil.

Línea 28: FROM usuario
Qué hace exactamente: Indica que la información se va a consultar desde la tabla usuario.
Con qué se conecta: Con la tabla usuario de la base de datos.
Para qué sirve: Define de dónde salen los datos del perfil.
Qué pasaría si se quita: La consulta SQL sería inválida porque no sabría de qué tabla leer.

Línea 29: WHERE id_usuario = :id
Qué hace exactamente: Filtra la consulta para buscar únicamente el usuario cuyo ID coincida con :id.
Con qué se conecta: Con usuario.id_usuario y con el parámetro :id que se asigna en la línea 32.
Para qué sirve: Evita traer todos los usuarios y permite consultar solo el perfil del usuario logueado.
Qué pasaría si se quita: Podría traer datos incorrectos o muchos usuarios, lo cual sería un problema de seguridad.

Línea 30: LIMIT 1"
Qué hace exactamente: Limita el resultado a una sola fila.
Con qué se conecta: Con la consulta SELECT.
Para qué sirve: Asegura que solo se devuelva un usuario, aunque por error hubiera más coincidencias.
Qué pasaría si se quita: La consulta podría devolver más de un registro si la base de datos tuviera inconsistencias.

Línea 31: );
Qué hace exactamente: Cierra la llamada a prepare().
Con qué se conecta: Con la línea 25.
Para qué sirve: Finaliza la preparación de la consulta SQL.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 32: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Vincula el parámetro :id con la variable $id.
Con qué se conecta: Con el WHERE id_usuario = :id de la línea 29.
Para qué sirve: Envía el ID del usuario de forma segura y como entero.
Qué pasaría si se quita: La consulta fallaría porque :id no tendría valor.

Línea 33: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta preparada.
Con qué se conecta: Con la base de datos mediante PDO.
Para qué sirve: Busca realmente el usuario en la tabla usuario.
Qué pasaría si se quita: La consulta estaría preparada, pero nunca se ejecutaría.

Línea 34: return $stmt->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Devuelve una fila como arreglo asociativo o false si no encuentra usuario.
Con qué se conecta: Con el controlador o vista que pidió los datos del perfil.
Para qué sirve: Entrega datos como $usuario['nombres'], $usuario['documento'], $usuario['rol'], etc.
Qué pasaría si se quita: El método no devolvería los datos del usuario.

Línea 35: }
Qué hace exactamente: Cierra el método obtener().
Con qué se conecta: Con la línea 24.
Para qué sirve: Finaliza la función que consulta el perfil.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 36: Línea en blanco
Qué hace exactamente: Separa visualmente métodos diferentes.
Con qué se conecta: No se conecta con nada lógico.
Para qué sirve: Hace el código más fácil de leer.
Qué pasaría si se quita: El código seguiría funcionando.

Líneas 37 a 41: Comentario del método actualizarDatos()
Qué hace exactamente: Explica que el método actualiza datos personales del usuario y que no modifica password_hash ni rol.
Con qué se conecta: Con el método actualizarDatos() que empieza en la línea 42.
Para qué sirve: Aclara que este método solo cambia nombres, apellidos, documento y teléfono.
Qué pasaría si se quita: El código funcionaría, pero sería menos claro qué campos se pueden modificar desde aquí.

Línea 42: public function actualizarDatos(
Qué hace exactamente: Declara el método público actualizarDatos().
Con qué se conecta: Con el formulario del perfil donde el usuario edita sus datos personales.
Para qué sirve: Permite actualizar datos básicos del usuario.
Qué pasaría si se quita: No se podrían actualizar los datos personales desde este modelo.

Línea 43: int    $id,
Qué hace exactamente: Recibe el ID del usuario que se va a actualizar.
Con qué se conecta: Con usuario.id_usuario.
Para qué sirve: Indica qué registro de la tabla usuario se debe modificar.
Qué pasaría si se quita: No se sabría qué usuario actualizar.

Línea 44: string $nombres,
Qué hace exactamente: Recibe los nuevos nombres del usuario.
Con qué se conecta: Con la columna nombres de la tabla usuario.
Para qué sirve: Actualizar el nombre del usuario.
Qué pasaría si se quita: No se podría actualizar el campo nombres.

Línea 45: string $apellidos,
Qué hace exactamente: Recibe los nuevos apellidos del usuario.
Con qué se conecta: Con la columna apellidos de la tabla usuario.
Para qué sirve: Actualizar los apellidos del usuario.
Qué pasaría si se quita: No se podría actualizar el campo apellidos.

Línea 46: string $documento,
Qué hace exactamente: Recibe el documento actualizado del usuario.
Con qué se conecta: Con la columna documento de la tabla usuario.
Para qué sirve: Permite modificar el documento personal.
Qué pasaría si se quita: No se podría actualizar el documento.

Línea 47: string $telefono
Qué hace exactamente: Recibe el teléfono actualizado del usuario.
Con qué se conecta: Con la columna telefono de la tabla usuario.
Para qué sirve: Permite modificar el número telefónico.
Qué pasaría si se quita: No se podría actualizar el teléfono.

Línea 48: ): bool {
Qué hace exactamente: Cierra la declaración de parámetros e indica que el método devuelve true o false.
Con qué se conecta: Con return $stmt->execute() de la línea 64.
Para qué sirve: Permite saber si la actualización fue exitosa.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 49: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta UPDATE.
Con qué se conecta: Con la conexión PDO.
Para qué sirve: Crear una actualización segura para la tabla usuario.
Qué pasaría si se quita: No se podría preparar la actualización.

Línea 50: "UPDATE usuario
Qué hace exactamente: Inicia una consulta para modificar registros en la tabla usuario.
Con qué se conecta: Con la tabla usuario.
Para qué sirve: Indica que se van a actualizar datos personales.
Qué pasaría si se quita: La consulta SQL quedaría incompleta.

Línea 51: SET nombres   = :nombres,
Qué hace exactamente: Indica que la columna nombres se actualizará con el parámetro :nombres.
Con qué se conecta: Con usuario.nombres y con la variable $nombres.
Para qué sirve: Cambiar los nombres del usuario.
Qué pasaría si se quita: No se actualizaría el nombre.

Línea 52: apellidos = :apellidos,
Qué hace exactamente: Indica que la columna apellidos se actualizará con :apellidos.
Con qué se conecta: Con usuario.apellidos y la variable $apellidos.
Para qué sirve: Cambiar los apellidos del usuario.
Qué pasaría si se quita: No se actualizarían los apellidos.

Línea 53: documento = :documento,
Qué hace exactamente: Indica que la columna documento se actualizará con :documento.
Con qué se conecta: Con usuario.documento y la variable $documento.
Para qué sirve: Cambiar el documento del usuario.
Qué pasaría si se quita: No se actualizaría el documento.

Línea 54: telefono  = :telefono
Qué hace exactamente: Indica que la columna telefono se actualizará con :telefono.
Con qué se conecta: Con usuario.telefono y la variable $telefono.
Para qué sirve: Cambiar el teléfono del usuario.
Qué pasaría si se quita: No se actualizaría el teléfono.

Línea 55: WHERE id_usuario = :id"
Qué hace exactamente: Limita la actualización al usuario cuyo ID coincida con :id.
Con qué se conecta: Con usuario.id_usuario y el parámetro :id.
Para qué sirve: Evita actualizar todos los usuarios de la tabla.
Qué pasaría si se quita: Sería muy peligroso porque podría actualizar todos los registros de usuario.

Línea 56: );
Qué hace exactamente: Cierra la llamada a prepare().
Con qué se conecta: Con la línea 49.
Para qué sirve: Finaliza la consulta UPDATE preparada.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 57: $stmt->bindParam(':nombres',   $nombres,   PDO::PARAM_STR);
Qué hace exactamente: Vincula :nombres con la variable $nombres.
Con qué se conecta: Con la línea 51 del UPDATE.
Para qué sirve: Envía el nuevo nombre como texto seguro.
Qué pasaría si se quita: La consulta fallaría porque :nombres no tendría valor.

Línea 58: $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
Qué hace exactamente: Vincula :apellidos con la variable $apellidos.
Con qué se conecta: Con la línea 52 del UPDATE.
Para qué sirve: Envía los nuevos apellidos como texto seguro.
Qué pasaría si se quita: La consulta fallaría porque :apellidos no tendría valor.

Línea 59: $stmt->bindParam(':documento', $documento, PDO::PARAM_STR);
Qué hace exactamente: Vincula :documento con la variable $documento.
Con qué se conecta: Con la línea 53 del UPDATE.
Para qué sirve: Envía el documento actualizado como texto.
Qué pasaría si se quita: La consulta fallaría porque :documento no tendría valor.

Línea 60: $stmt->bindParam(':telefono',  $telefono,  PDO::PARAM_STR);
Qué hace exactamente: Vincula :telefono con la variable $telefono.
Con qué se conecta: Con la línea 54 del UPDATE.
Para qué sirve: Envía el teléfono actualizado como texto.
Qué pasaría si se quita: La consulta fallaría porque :telefono no tendría valor.

Línea 61: $stmt->bindParam(':id',        $id,        PDO::PARAM_INT);
Qué hace exactamente: Vincula :id con el ID del usuario.
Con qué se conecta: Con WHERE id_usuario = :id.
Para qué sirve: Asegura que solo se actualice el usuario correcto.
Qué pasaría si se quita: La consulta fallaría porque :id no tendría valor.

Línea 62: return $stmt->execute();
Qué hace exactamente: Ejecuta el UPDATE y devuelve true o false.
Con qué se conecta: Con la base de datos y con el controlador que espera una respuesta.
Para qué sirve: Guarda los cambios personales del usuario.
Qué pasaría si se quita: No se actualizarían los datos.

Línea 63: }
Qué hace exactamente: Cierra actualizarDatos().
Con qué se conecta: Con la línea 42.
Para qué sirve: Finaliza el método de actualización de datos.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 64: Línea en blanco
Qué hace exactamente: Separa el método actualizarDatos() del siguiente comentario.
Con qué se conecta: No se conecta con la lógica.
Para qué sirve: Mejora la lectura.
Qué pasaría si se quita: El código funcionaría igual.

Líneas 65 a 69: Comentario del método cambiarPassword()
Qué hace exactamente: Explica que este método cambia la contraseña y que recibe el hash ya generado con password_hash().
Con qué se conecta: Con el método cambiarPassword() y con el controlador que genera el hash.
Para qué sirve: Aclara que el método no recibe la contraseña en texto plano, sino una versión segura.
Qué pasaría si se quita: El código funcionaría, pero sería menos claro cómo debe llegar la contraseña.

Línea 70: public function cambiarPassword(int $id, string $hash): bool {
Qué hace exactamente: Declara el método para cambiar la contraseña del usuario.
Con qué se conecta: Con el formulario de cambio de contraseña del perfil y con password_hash().
Para qué sirve: Actualizar la contraseña guardada en la tabla usuario.
Qué pasaría si se quita: No se podría cambiar la contraseña desde este modelo.

Línea 71: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta UPDATE.
Con qué se conecta: Con la conexión PDO.
Para qué sirve: Crear una consulta segura para cambiar password_hash.
Qué pasaría si se quita: No se podría preparar el cambio de contraseña.

Línea 72: "UPDATE usuario SET password_hash = :hash WHERE id_usuario = :id"
Qué hace exactamente: Define que se actualizará la columna password_hash del usuario indicado.
Con qué se conecta: Con usuario.password_hash y usuario.id_usuario.
Para qué sirve: Guardar la nueva contraseña cifrada del usuario.
Qué pasaría si se quita: No se actualizaría la contraseña.

Línea 73: );
Qué hace exactamente: Cierra la preparación de la consulta.
Con qué se conecta: Con línea 71.
Para qué sirve: Finaliza el prepare().
Qué pasaría si se quita: Habría error de sintaxis.

Línea 74: $stmt->bindParam(':hash', $hash, PDO::PARAM_STR);
Qué hace exactamente: Vincula :hash con el hash recibido.
Con qué se conecta: Con password_hash de la línea 72.
Para qué sirve: Envía la contraseña cifrada a la base de datos.
Qué pasaría si se quita: La consulta fallaría porque :hash no tendría valor.

Línea 75: $stmt->bindParam(':id',   $id,   PDO::PARAM_INT);
Qué hace exactamente: Vincula :id con el ID del usuario.
Con qué se conecta: Con WHERE id_usuario = :id.
Para qué sirve: Asegura que se cambie la contraseña del usuario correcto.
Qué pasaría si se quita: La consulta fallaría porque :id no tendría valor.

Línea 76: return $stmt->execute();
Qué hace exactamente: Ejecuta el UPDATE y devuelve true o false.
Con qué se conecta: Con la base de datos y con el controlador.
Para qué sirve: Guarda la nueva contraseña cifrada.
Qué pasaría si se quita: No se cambiaría la contraseña.

Línea 77: }
Qué hace exactamente: Cierra cambiarPassword().
Con qué se conecta: Con línea 70.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 78: Línea en blanco
Qué hace exactamente: Separa métodos.
Con qué se conecta: No se conecta con ninguna parte lógica.
Para qué sirve: Mejora la legibilidad.
Qué pasaría si se quita: No afectaría el funcionamiento.

Líneas 79 a 81: Comentario del método verificarPassword()
Qué hace exactamente: Explica que este método verifica si la contraseña actual es correcta.
Con qué se conecta: Con el método verificarPassword().
Para qué sirve: Documentar que antes de cambiar contraseña se puede comprobar la actual.
Qué pasaría si se quita: El código funciona igual, pero se entiende menos.

Línea 82: public function verificarPassword(int $id, string $password_actual): bool {
Qué hace exactamente: Declara el método verificarPassword().
Con qué se conecta: Con el formulario de cambio de contraseña.
Para qué sirve: Comprobar que el usuario escribió correctamente su contraseña actual.
Qué pasaría si se quita: No se podría validar la contraseña anterior antes de cambiarla.

Línea 83: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta SELECT.
Con qué se conecta: Con PDO y la tabla usuario.
Para qué sirve: Obtener el password_hash del usuario.
Qué pasaría si se quita: No se podría preparar la consulta.

Línea 84: "SELECT password_hash FROM usuario WHERE id_usuario = :id LIMIT 1"
Qué hace exactamente: Consulta la contraseña cifrada del usuario indicado.
Con qué se conecta: Con usuario.password_hash y usuario.id_usuario.
Para qué sirve: Obtener el hash guardado para compararlo con la contraseña escrita.
Qué pasaría si se quita: No habría forma de verificar la contraseña actual.

Línea 85: );
Qué hace exactamente: Cierra prepare().
Con qué se conecta: Con línea 83.
Para qué sirve: Finaliza la consulta preparada.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 86: $stmt->bindParam(':id', $id, PDO::PARAM_INT);
Qué hace exactamente: Vincula :id con el ID del usuario.
Con qué se conecta: Con WHERE id_usuario = :id.
Para qué sirve: Buscar el hash del usuario correcto.
Qué pasaría si se quita: La consulta fallaría.

Línea 87: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Obtiene el password_hash desde la tabla usuario.
Qué pasaría si se quita: No se obtendría el hash.

Línea 88: $row = $stmt->fetch(PDO::FETCH_ASSOC);
Qué hace exactamente: Guarda la fila encontrada en la variable $row.
Con qué se conecta: Con el resultado del SELECT.
Para qué sirve: Permite acceder a $row['password_hash'].
Qué pasaría si se quita: No habría variable con el hash para verificar.

Línea 89: if (!$row) return false;
Qué hace exactamente: Si no se encontró usuario, devuelve false.
Con qué se conecta: Con $row.
Para qué sirve: Evita llamar password_verify() con datos inexistentes.
Qué pasaría si se quita: Podría producir error si el usuario no existe.

Línea 90: return password_verify($password_actual, $row['password_hash']);
Qué hace exactamente: Compara la contraseña escrita con el hash guardado.
Con qué se conecta: Con la función nativa password_verify() de PHP y con usuario.password_hash.
Para qué sirve: Validar si la contraseña actual es correcta sin revelar ni descifrar el hash.
Qué pasaría si se quita: No se podría confirmar si la contraseña actual es válida.

Línea 91: }
Qué hace exactamente: Cierra verificarPassword().
Con qué se conecta: Con línea 82.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 92: Línea en blanco
Qué hace exactamente: Separa métodos.
Con qué se conecta: No se conecta con la lógica.
Para qué sirve: Mejora el orden visual.
Qué pasaría si se quita: No afectaría.

Líneas 93 a 95: Comentario del método documentoEnUso()
Qué hace exactamente: Explica que verifica si un documento ya está en uso por otro usuario.
Con qué se conecta: Con el método documentoEnUso().
Para qué sirve: Documentar una validación importante antes de actualizar el perfil.
Qué pasaría si se quita: El código funciona igual, pero se entiende menos.

Línea 96: public function documentoEnUso(string $documento, int $excluir_id): bool {
Qué hace exactamente: Declara el método documentoEnUso().
Con qué se conecta: Con la edición de perfil, antes de actualizar documento.
Para qué sirve: Verificar si el documento ya pertenece a otro usuario.
Qué pasaría si se quita: Se podrían guardar documentos duplicados entre usuarios.

Línea 97: $stmt = $this->conn->prepare(
Qué hace exactamente: Prepara una consulta SELECT.
Con qué se conecta: Con PDO.
Para qué sirve: Crear una consulta segura para validar duplicados.
Qué pasaría si se quita: No se podría preparar la validación.

Línea 98: "SELECT id_usuario FROM usuario
Qué hace exactamente: Inicia una consulta que busca usuarios por documento.
Con qué se conecta: Con la tabla usuario.
Para qué sirve: Encontrar si existe otro usuario con ese documento.
Qué pasaría si se quita: La consulta quedaría incompleta.

Línea 99: WHERE documento = :doc AND id_usuario != :id
Qué hace exactamente: Busca el mismo documento, pero excluye el usuario actual.
Con qué se conecta: Con usuario.documento y usuario.id_usuario.
Para qué sirve: Permite que el usuario conserve su propio documento sin detectarlo como duplicado.
Qué pasaría si se quita: El sistema podría decir que el documento ya está en uso por el mismo usuario.

Línea 100: LIMIT 1"
Qué hace exactamente: Limita la búsqueda a un solo resultado.
Con qué se conecta: Con la consulta SELECT.
Para qué sirve: Hace la validación más eficiente porque solo necesita saber si existe uno.
Qué pasaría si se quita: La consulta podría devolver más filas de las necesarias.

Línea 101: );
Qué hace exactamente: Cierra prepare().
Con qué se conecta: Con línea 97.
Para qué sirve: Finaliza la consulta preparada.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 102: $stmt->bindParam(':doc', $documento, PDO::PARAM_STR);
Qué hace exactamente: Vincula :doc con el documento recibido.
Con qué se conecta: Con WHERE documento = :doc.
Para qué sirve: Envía el documento de forma segura.
Qué pasaría si se quita: La consulta fallaría porque :doc no tendría valor.

Línea 103: $stmt->bindParam(':id',  $excluir_id, PDO::PARAM_INT);
Qué hace exactamente: Vincula :id con el ID del usuario que se debe excluir.
Con qué se conecta: Con id_usuario != :id.
Para qué sirve: Evita comparar el documento contra el mismo usuario que está editando su perfil.
Qué pasaría si se quita: La consulta fallaría porque :id no tendría valor.

Línea 104: $stmt->execute();
Qué hace exactamente: Ejecuta la consulta.
Con qué se conecta: Con la base de datos.
Para qué sirve: Busca si existe otro usuario con el mismo documento.
Qué pasaría si se quita: No se haría la validación.

Línea 105: return $stmt->rowCount() > 0;
Qué hace exactamente: Devuelve true si encontró al menos un usuario con ese documento.
Con qué se conecta: Con el controlador que valida antes de actualizar.
Para qué sirve: Bloquear documentos duplicados.
Qué pasaría si se quita: El método no devolvería resultado.

Línea 106: }
Qué hace exactamente: Cierra documentoEnUso().
Con qué se conecta: Con línea 96.
Para qué sirve: Finaliza el método.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 107: }
Qué hace exactamente: Cierra la clase Perfil.
Con qué se conecta: Con línea 13.
Para qué sirve: Finaliza todo el modelo.
Qué pasaría si se quita: Habría error de sintaxis.

Línea 108: ?>
Qué hace exactamente: Cierra el bloque PHP.
Con qué se conecta: Con el intérprete PHP.
Para qué sirve: Marca el final formal del archivo.
Qué pasaría si se quita: En archivos PHP puros normalmente puede funcionar, pero aquí se usa como cierre formal.

Conclusión:
Este archivo es el modelo del módulo Perfil de usuario. Se conecta directamente con la tabla usuario. Permite consultar los datos del usuario logueado, actualizar datos personales, cambiar contraseña, verificar la contraseña actual y validar si un documento ya está usado por otra persona.