<?php
/**
 * ============================================================
 * ARCHIVO: controllers/UsuarioController.php
 * PROPÓSITO: Procesa el formulario de solicitud de registro
 *            de nuevos trabajadores
 * ============================================================
 *
 * Flujo completo:
 *   1. El formulario registre.php hace POST aquí
 *   2. Valida que todos los campos estén completos
 *   3. Verifica que las contraseñas coincidan
 *   4. Verifica que la contraseña tenga mínimo 6 caracteres
 *   5. Hashea la contraseña con bcrypt (password_hash)
 *   6. Llama a Usuario::registrar() para insertar en BD
 *   7. Redirige al login con mensaje de éxito, o de vuelta
 *      al formulario con el mensaje de error
 *
 * IMPORTANTE: El registro NO crea un usuario activo directamente.
 * Inserta en la tabla solicitud_registro con estado 'PENDIENTE'.
 * Un mayordomo debe aprobar la solicitud para que el trabajador
 * pueda iniciar sesión.
 *
 * Campos que recibe del formulario (POST):
 *   nombres, apellidos, documento, telefono, eps, RH,
 *   nombre_de_usuario, contraseña, confirmar_contraseña
 * ============================================================
 */
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Notificacion.php';

class UsuarioController {

    public function registrar() {

        // Si no es POST, redirige al formulario
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: ../views/usuarios/registre.php");
            exit;
        }

        // Recoge y limpia todos los campos del formulario
        $nombres              = trim($_POST['nombres'] ?? '');
        $apellidos            = trim($_POST['apellidos'] ?? '');
        $documento            = trim($_POST['documento'] ?? '');
        $telefono             = trim($_POST['telefono'] ?? '');
        $eps                  = trim($_POST['eps'] ?? '');
        $RH                   = trim($_POST['RH'] ?? '');
        $nombre_de_usuario    = trim($_POST['nombre_de_usuario'] ?? '');
        $contraseña           = trim($_POST['contraseña'] ?? '');
        $confirmar_contraseña = trim($_POST['confirmar_contraseña'] ?? '');

        // Validación 1: ningún campo puede estar vacío
        if (empty($nombres) || empty($apellidos) || empty($documento) || empty($telefono) ||
            empty($eps) || empty($RH) || empty($nombre_de_usuario) ||
            empty($contraseña) || empty($confirmar_contraseña)) {
            $_SESSION['alert'] = [
                'icon'  => 'warning',
                'title' => 'Campos incompletos',
                'text'  => 'Debe completar todos los campos'
            ];
            header("Location: ../views/usuarios/registre.php");
            exit;
        }

        // Validación 2: las dos contraseñas deben ser iguales
        if ($contraseña !== $confirmar_contraseña) {
            $_SESSION['alert'] = [
                'icon'  => 'error',
                'title' => 'Error',
                'text'  => 'Las contraseñas no coinciden'
            ];
            header("Location: ../views/usuarios/registre.php");
            exit;
        }

        // Validación 3: mínimo 6 caracteres en la contraseña
        if (strlen($contraseña) < 6) {
            $_SESSION['alert'] = [
                'icon'  => 'warning',
                'title' => 'Contraseña inválida',
                'text'  => 'La contraseña debe tener al menos 6 caracteres'
            ];
            header("Location: ../views/usuarios/registre.php");
            exit;
        }

        // Conecta a la BD
        $database = new Database();
        $db       = $database->conectar();
        $usuario  = new Usuario($db);

        // Prepara los datos para insertar
        // La contraseña se hashea con bcrypt ANTES de guardarla
        $datos = [
            'nombres'           => $nombres,
            'apellidos'         => $apellidos,
            'documento'         => $documento,
            'telefono'          => $telefono,
            'eps'               => $eps,
            'RH'                => $RH,
            'nombre_de_usuario' => $nombre_de_usuario,
            'contraseña'        => password_hash($contraseña, PASSWORD_BCRYPT), // Hash seguro
        ];

        $resultado = $usuario->registrar($datos);

        if ($resultado === true) {
            // Avisar a los mayordomos para que revisen solicitudes pendientes
            try {
                $idsMayordomos = $db->query(
                    "SELECT id_usuario FROM usuario WHERE rol = 'MAYORDOMO' AND activo = 1"
                )->fetchAll(PDO::FETCH_COLUMN);
                if (!empty($idsMayordomos)) {
                    Notificacion::enviarAVarios(
                        $db,
                        array_map('intval', $idsMayordomos),
                        'info',
                        'Nueva solicitud de registro de trabajador (usuario: ' . $nombre_de_usuario . ').',
                        '../../views/mayordomo/solicitudes.php'
                    );
                }
            } catch (Exception $e) {
                /* no interrumpir el registro */
            }

            // Éxito: redirige al login con mensaje
            $_SESSION['alert'] = [
                'icon'  => 'success',
                'title' => 'Registro exitoso',
                'text'  => 'Tu solicitud fue enviada. Espera la aprobación del mayordomo.',
            ];
            header("Location: ../views/usuarios/login.php");
            exit;
        } else {
            // Error de BD: muestra el mensaje de error
            $_SESSION['alert'] = [
                'icon'  => 'error',
                'title' => 'Error',
                'text'  => $resultado
            ];
            header("Location: ../views/usuarios/registre.php");
            exit;
        }
    }
}

// Instancia el controller y ejecuta el registro
$controller = new UsuarioController();
$controller->registrar();
?>
