<?php
/**
 * ============================================================
 * ARCHIVO: controllers/LoginController.php
 * PROPÓSITO: Procesa el formulario de inicio de sesión
 * ============================================================
 *
 * Flujo completo:
 *   1. El formulario de login.php hace POST aquí
 *   2. Valida que los campos no estén vacíos
 *   3. Busca el usuario en la BD con Usuario::obtenerPorUsuario()
 *   4. Verifica la contraseña con password_verify() (bcrypt)
 *   5. Guarda los datos en $_SESSION
 *   6. Redirige al dashboard según el rol:
 *      - ADMINISTRADOR → views/admin/dashboard.php
 *      - MAYORDOMO     → views/mayordomo/dashboard.php (pendiente)
 *      - TRABAJADOR    → views/trabajador/dashboard.php (pendiente)
 *
 * Si algo falla, guarda un mensaje en $_SESSION['alert']
 * y redirige de vuelta al login para mostrarlo.
 *
 * Datos de sesión que guarda:
 *   $_SESSION['id_usuario'] → ID del usuario en la BD
 *   $_SESSION['username']   → Nombre de usuario
 *   $_SESSION['rol']        → Rol: ADMINISTRADOR / MAYORDOMO / TRABAJADOR
 * ============================================================
 */
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {

    public function login() {

        // Si no es POST, redirige al formulario de login
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: ../views/usuarios/login.php");
            exit;
        }

        // Recoge y limpia los datos del formulario
        $usuario  = trim($_POST['usuario'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Validación: campos vacíos
        if (empty($usuario) || empty($password)) {
            $_SESSION['alert'] = [
                'icon'  => 'warning',
                'title' => 'Campos incompletos',
                'text'  => 'Ingresa tu usuario y contraseña'
            ];
            header("Location: ../views/usuarios/login.php");
            exit;
        }

        // Conecta a la BD y busca el usuario
        $database     = new Database();
        $db           = $database->conectar();
        $usuarioModel = new Usuario($db);
        $registro     = $usuarioModel->obtenerPorUsuario($usuario);

        // Verifica que el usuario exista y la contraseña sea correcta
        // password_verify() compara el texto plano con el hash bcrypt guardado en BD
        if (!$registro || !password_verify($password, $registro['password_hash'])) {
            $_SESSION['alert'] = [
                'icon'  => 'error',
                'title' => 'Acceso denegado',
                'text'  => 'Usuario o contraseña incorrectos'
            ];
            header("Location: ../views/usuarios/login.php");
            exit;
        }

        // Login exitoso: guarda datos en sesión
        $_SESSION['id_usuario'] = $registro['id_usuario'];
        $_SESSION['username']   = $registro['username'];
        $_SESSION['rol']        = $registro['rol'];

        // Redirige al dashboard correspondiente según el rol
        switch ($registro['rol']) {
            case 'ADMINISTRADOR':
                header("Location: ../views/admin/dashboard.php");
                break;
            case 'MAYORDOMO':
                header("Location: ../views/mayordomo/dashboard.php"); // Vista pendiente de crear
                break;
            case 'TRABAJADOR':
                header("Location: ../views/trabajador/dashboard.php"); // Vista pendiente de crear
                break;
            default:
                header("Location: ../views/usuarios/login.php");
                break;
        }
        exit;
    }
}

// Instancia el controller y ejecuta el login
$controller = new LoginController();
$controller->login();
?>
