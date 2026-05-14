Línea 1: <?php
Qué hace exactamente: Abre PHP.
Con qué se conecta: Con el servidor PHP.
Para qué sirve: Ejecutar el modelo Mayordomo.
Qué pasaría si se quita: El archivo no se interpretaría correctamente.

Líneas 2 a 9: Comentario de documentación
Qué hace exactamente: Explica que el modelo gestiona usuarios con rol MAYORDOMO.
Con qué se conecta: Con la tabla usuario y MayordomoController.php.
Para qué sirve: Documentar el modelo.
Qué pasaría si se quita: El código funciona, pero se entiende menos.

Línea 10: class Mayordomo {
Qué hace exactamente: Declara la clase Mayordomo.
Con qué se conecta: Con controllers/MayordomoController.php.
Para qué sirve: Agrupar operaciones de mayordomos.
Qué pasaría si se quita: No se podría instanciar el modelo.

Línea 12: private $conn;
Qué hace exactamente: Declara conexión privada.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutar consultas sobre usuario.
Qué pasaría si se quita: No habría conexión interna.

Líneas 14 a 16: __construct($db)
Qué hace exactamente: Recibe y guarda la conexión.
Con qué se conecta: Con Database::conectar().
Para qué sirve: Usar $this->conn en los métodos.
Qué pasaría si se quita: Las consultas fallarían.

Línea 24: public function listar($busqueda = '') {
Qué hace exactamente: Declara método para listar mayordomos.
Con qué se conecta: Con una vista administrativa de mayordomos.
Para qué sirve: Mostrar todos los usuarios con rol MAYORDOMO.
Qué pasaría si se quita: No se podrían listar mayordomos.

Líneas 25 a 29: SELECT inicial
Qué hace exactamente: Consulta id, nombres, apellidos, documento, username, activo y fecha_creacion.
Con qué se conecta: Con la tabla usuario.
Para qué sirve: Traer datos principales de mayordomos.
Qué pasaría si se quita: No habría consulta base.

Línea 30: WHERE rol = 'MAYORDOMO'
Qué hace exactamente: Filtra solo usuarios mayordomos.
Con qué se conecta: Con usuario.rol.
Para qué sirve: Evitar traer administradores o trabajadores.
Qué pasaría si se quita: Se mezclarían otros roles.

Líneas 32 a 34: if (!empty($busqueda))
Qué hace exactamente: Si hay texto de búsqueda, agrega filtro por nombres, apellidos o documento.
Con qué se conecta: Con campos del formulario de búsqueda.
Para qué sirve: Buscar mayordomos específicos.
Qué pasaría si se quita: No habría búsqueda.

Línea 37: $sql .= " ORDER BY fecha_creacion DESC";
Qué hace exactamente: Ordena del más reciente al más antiguo.
Con qué se conecta: Con usuario.fecha_creacion.
Para qué sirve: Mostrar primero los mayordomos nuevos.
Qué pasaría si se quita: El orden podría no ser claro.

Línea 39: $stmt = $this->conn->prepare($sql);
Qué hace exactamente: Prepara la consulta.
Con qué se conecta: Con PDO.
Para qué sirve: Ejecutarla de forma segura.
Qué pasaría si se quita: No se podría ejecutar.

Líneas 41 a 44: bind de búsqueda
Qué hace exactamente: Si existe búsqueda, crea %texto% y lo asigna a :b.
Con qué se conecta: Con LIKE :b.
Para qué sirve: Permitir coincidencias parciales.
Qué pasaría si se quita: La búsqueda fallaría.

Líneas 46 a 47: execute y fetchAll
Qué hace exactamente: Ejecuta y devuelve todos los mayordomos encontrados.
Con qué se conecta: Con la vista.
Para qué sirve: Mostrar resultados.
Qué pasaría si se quita: No habría datos.

Línea 55: public function obtenerPorId($id) {
Qué hace exactamente: Declara método para buscar un mayordomo específico.
Con qué se conecta: Con editar mayordomo.
Para qué sirve: Cargar datos del mayordomo seleccionado.
Qué pasaría si se quita: No se podría obtener un mayordomo individual.

Líneas 56 a 61: SELECT por ID y rol
Qué hace exactamente: Busca usuario por id_usuario y rol MAYORDOMO.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Garantizar que el ID pertenece a un mayordomo.
Qué pasaría si se quita: Se podría traer un usuario de otro rol.

Líneas 62 a 65: prepare, bind, execute, fetch
Qué hace exactamente: Prepara, pasa ID, ejecuta y devuelve una fila.
Con qué se conecta: Con PDO.
Para qué sirve: Obtener el mayordomo exacto.
Qué pasaría si se quita: No se obtendría el registro.

Línea 73: public function existeUsername($username, $excluir_id = null) {
Qué hace exactamente: Declara método para verificar si un username ya existe.
Con qué se conecta: Con usuario.username.
Para qué sirve: Evitar nombres de usuario duplicados.
Qué pasaría si se quita: Podrían crearse usernames repetidos.

Línea 74: $sql = "SELECT id_usuario FROM usuario WHERE username = :u";
Qué hace exactamente: Crea consulta para buscar username.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Ver si el username ya está usado.
Qué pasaría si se quita: No habría validación.

Línea 75: if ($excluir_id) $sql .= " AND id_usuario != :id";
Qué hace exactamente: En edición excluye al usuario actual.
Con qué se conecta: Con id_usuario.
Para qué sirve: Permitir que el mayordomo conserve su mismo username sin marcarlo como duplicado.
Qué pasaría si se quita: Al editar, el sistema diría que su propio username ya existe.

Líneas 76 a 80: prepare, bind, execute, rowCount
Qué hace exactamente: Ejecuta la consulta y devuelve true si encontró coincidencias.
Con qué se conecta: Con MayordomoController.php.
Para qué sirve: Validar duplicados antes de guardar.
Qué pasaría si se quita: No se detectaría duplicado.

Línea 88: public function existeDocumento($documento, $excluir_id = null) {
Qué hace exactamente: Verifica si un documento ya existe.
Con qué se conecta: Con usuario.documento.
Para qué sirve: Evitar documentos duplicados.
Qué pasaría si se quita: Podrían existir dos usuarios con el mismo documento.

Líneas 89 a 95: SELECT documento con exclusión opcional
Qué hace exactamente: Busca el documento y excluye ID si se está editando.
Con qué se conecta: Con usuario.
Para qué sirve: Validar documento único.
Qué pasaría si se quita: No habría control de duplicados.

Línea 103: public function registrar($datos) {
Qué hace exactamente: Declara método para crear un mayordomo.
Con qué se conecta: Con MayordomoController.php accion registrar.
Para qué sirve: Insertar un usuario con rol MAYORDOMO.
Qué pasaría si se quita: No se podrían registrar mayordomos.

Línea 104: try {
Qué hace exactamente: Inicia manejo de errores.
Con qué se conecta: Con catch.
Para qué sirve: Devolver mensaje si falla el registro.
Qué pasaría si se quita: Un error SQL podría romper el sistema.

Líneas 105 a 109: INSERT INTO usuario
Qué hace exactamente: Inserta nombres, apellidos, documento, username, password_hash, rol, activo y fecha_creacion.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Crear un nuevo usuario mayordomo.
Qué pasaría si se quita: No se guardaría el mayordomo.

Líneas 110 a 116: bindParam de datos
Qué hace exactamente: Vincula datos del arreglo $datos al INSERT.
Con qué se conecta: Con datos validados en el controlador.
Para qué sirve: Insertar de forma segura.
Qué pasaría si se quita: La consulta fallaría.

Línea 117: $stmt->execute();
Qué hace exactamente: Ejecuta la inserción.
Con qué se conecta: Con la base de datos.
Para qué sirve: Guardar el nuevo mayordomo.
Qué pasaría si se quita: No se insertaría.

Línea 118: return true;
Qué hace exactamente: Devuelve éxito.
Con qué se conecta: Con el controlador.
Para qué sirve: Informar que se registró correctamente.
Qué pasaría si se quita: El controlador no sabría que funcionó.

Líneas 119 a 121: catch
Qué hace exactamente: Captura errores y devuelve mensaje.
Con qué se conecta: Con excepciones SQL.
Para qué sirve: Mostrar error controlado.
Qué pasaría si se quita: Error fatal no controlado.

Línea 130: public function actualizar($id, $datos) {
Qué hace exactamente: Declara método para actualizar mayordomo.
Con qué se conecta: Con MayordomoController.php accion actualizar.
Para qué sirve: Modificar datos del usuario mayordomo.
Qué pasaría si se quita: No se podrían editar mayordomos.

Líneas 132 a 138: UPDATE usuario SET...
Qué hace exactamente: Construye SQL base para actualizar nombres, apellidos, documento, username y activo.
Con qué se conecta: Con tabla usuario.
Para qué sirve: Guardar cambios sin tocar contraseña todavía.
Qué pasaría si se quita: No habría actualización.

Líneas 140 a 142: if password_hash
Qué hace exactamente: Si viene una contraseña nueva, agrega password_hash al UPDATE.
Con qué se conecta: Con el arreglo $datos['password_hash'].
Para qué sirve: Cambiar contraseña solo cuando se envía una nueva.
Qué pasaría si se quita: No se podría actualizar contraseña o se sobrescribiría incorrectamente.

Línea 144: $sql .= " WHERE id_usuario = :id AND rol = 'MAYORDOMO'";
Qué hace exactamente: Limita actualización al usuario indicado y rol MAYORDOMO.
Con qué se conecta: Con id_usuario y rol.
Para qué sirve: Evitar modificar usuarios de otro rol.
Qué pasaría si se quita: Podría actualizar usuarios incorrectos.

Líneas 146 a 154: prepare y bindParam
Qué hace exactamente: Prepara y vincula todos los datos.
Con qué se conecta: Con el formulario y tabla usuario.
Para qué sirve: Ejecutar actualización segura.
Qué pasaría si se quita: La consulta fallaría.

Líneas 156 a 158: bind password opcional
Qué hace exactamente: Vincula password_hash solo si se va a cambiar.
Con qué se conecta: Con el SQL dinámico.
Para qué sirve: Evitar errores si no existe el parámetro.
Qué pasaría si se quita: Si hay contraseña nueva, el UPDATE fallaría.

Líneas 160 a 164: execute, return true, catch
Qué hace exactamente: Ejecuta actualización o devuelve error.
Con qué se conecta: Con el controlador.
Para qué sirve: Informar resultado.
Qué pasaría si se quita: No se sabría si la edición funcionó.

Conclusión:
Este modelo administra usuarios con rol MAYORDOMO dentro de la tabla usuario. Permite listar, buscar por ID, validar duplicados, registrar y actualizar mayordomos, conectándose directamente con MayordomoController.php.