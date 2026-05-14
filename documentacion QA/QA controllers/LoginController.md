Línea 1: <?php
Abre el bloque de código PHP.

Líneas 2 a 25: Comentario de documentación
Explica el propósito del controlador, el flujo del login, las sesiones y las redirecciones.

Línea 26: session_start();
Inicia la sesión para guardar datos del usuario.

Línea 28: require_once __DIR__ . '/../config/database.php';
Incluye la conexión a la base de datos.

Línea 29: require_once __DIR__ . '/../models/Usuario.php';
Incluye el modelo Usuario.

Línea 31: class LoginController {
Crea la clase LoginController.

Línea 33: public function login() {
Crea el método login.

Línea 36: if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
Verifica si la petición no es POST.

Línea 37: header("Location: ../views/usuarios/login.php");
Redirige al formulario de login.

Línea 38: exit;
Detiene la ejecución.

Línea 41: $usuario = trim($_POST['usuario'] ?? '');
Obtiene el usuario enviado y elimina espacios.

Línea 42: $password = trim($_POST['password'] ?? '');
Obtiene la contraseña enviada.

Línea 45: if (empty($usuario) || empty($password)) {
Valida si algún campo está vacío.

Líneas 46 a 50: $_SESSION['alert'] = [...]
Guarda una alerta de campos incompletos.

Línea 51: header("Location: ../views/usuarios/login.php");
Redirige nuevamente al login.

Línea 52: exit;
Detiene la ejecución.

Línea 56: $database = new Database();
Crea el objeto Database.

Línea 57: $db = $database->conectar();
Obtiene la conexión.

Línea 58: $usuarioModel = new Usuario($db);
Crea el modelo Usuario.

Línea 59: $registro = $usuarioModel->obtenerPorUsuario($usuario);
Busca el usuario en la base de datos.

Línea 63: if (!$registro || !password_verify($password, $registro['password_hash'])) {
Valida si el usuario no existe o la contraseña es incorrecta.

Líneas 64 a 68: $_SESSION['alert'] = [...]
Guarda una alerta de acceso denegado.

Línea 69: header("Location: ../views/usuarios/login.php");
Redirige al login.

Línea 70: exit;
Detiene la ejecución.

Línea 74: $_SESSION['id_usuario'] = $registro['id_usuario'];
Guarda el ID del usuario en sesión.

Línea 75: $_SESSION['username'] = $registro['username'];
Guarda el nombre de usuario en sesión.

Línea 76: $_SESSION['rol'] = $registro['rol'];
Guarda el rol del usuario.

Línea 79: switch ($registro['rol']) {
Evalúa el rol para decidir a qué dashboard enviarlo.

Línea 80: case 'ADMINISTRADOR':
Caso para administrador.

Línea 81: header("Location: ../views/admin/dashboard.php");
Redirige al dashboard del administrador.

Línea 83: case 'MAYORDOMO':
Caso para mayordomo.

Línea 84: header("Location: ../views/mayordomo/dashboard.php");
Redirige al dashboard del mayordomo.

Línea 86: case 'TRABAJADOR':
Caso para trabajador.

Línea 87: header("Location: ../views/trabajador/dashboard.php");
Redirige al dashboard del trabajador.

Línea 89: default:
Caso si el rol no coincide.

Línea 90: header("Location: ../views/usuarios/login.php");
Redirige al login.

Línea 93: exit;
Detiene la ejecución.

Línea 98: $controller = new LoginController();
Crea el controlador.

Línea 99: $controller->login();
Ejecuta el método login.

Línea 100: ?>
Cierra PHP.

Conclusión:
Este controlador procesa el inicio de sesión. Valida usuario y contraseña, guarda los datos en sesión y redirige al dashboard correspondiente según el rol.