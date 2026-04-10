<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {

    public function registrar() {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: ../views/usuarios/registre.php");
            exit;
        }

        $nombres = trim($_POST['nombres'] ?? '');
        $apellidos = trim($_POST['apellidos'] ?? '');
        $documento = trim($_POST['documento'] ?? '');
        $telefono = trim ($_POST['telefono']??'');
        $eps = trim($_POST['eps'] ?? '');
        $RH = trim($_POST['RH'] ?? '');
        $nombre_de_usuario = trim($_POST['nombre_de_usuario'] ?? '');
        $contraseña = trim($_POST['contraseña'] ?? '');
        $confirmar_contraseña = trim($_POST['confirmar_contraseña'] ?? '');

        if (empty($nombres) || empty($apellidos) || empty($documento) || empty($telefoono) || empty($eps) || empty($RH) || empty($nombre_de_usuario) || empty($contraseña) || empty($confirmar_contraseña)) {
            $_SESSION['alert'] = [
                'icon' => 'warning',
                'title' => 'Campos incompletos',
                'text' => 'Debe completar todos los campos'
            ];
            header("Location: ../views/usuarios/registre.php");
            exit;
        }

        }

        if ($contraseña !== $confirmar_contraseña) {
            $_SESSION['alert'] = [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'Las contraseñas no coinciden'
            ];
            header("Location: ../views/usuarios/registre.php");
            exit;
        }

        if (strlen($contraseña) < 6) {
            $_SESSION['alert'] = [
                'icon' => 'warning',
                'title' => 'Contraseña inválida',
                'text' => 'La contraseña debe tener al menos 6 caracteres'
            ];
            header("Location: ../views/usuarios/registre.php");
            exit;
        }


        $database = new Database();
        $db = $database->conectar();

        $usuario = new Usuario($db);


        $datos = [
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'documento' => $documento,
            'telefono' => $telefono,
            'eps' => $eps,
            'RH' => $RH,
            'nombre_de_usuario' => $nombre_de_usuario
            'contraseña' => contraseña($contraseña),
        ];

        $resultado = $usuario->registrar($datos);

        if ($resultado === true) {
            $_SESSION['alert'] = [
                'icon' => 'success',
                'title' => 'Registro exitoso',
                'text' => 'Tu cuenta fue creada correctamente',
                'redirect' => 'login.php'
            ];

            header("Location: ../views/usuarios/registre.php");
            exit;

        } else {
            $_SESSION['alert'] = [
                'icon' => 'error',
                'title' => 'Error',
                'text' => $resultado
            ];

            header("Location: ../views/usuarios/registre.php");
            exit;
        }
    }
}

$controller = new UsuarioController();
$controller->registrar();
?>