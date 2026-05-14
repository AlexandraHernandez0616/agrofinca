-- ============================================================
-- Script para insertar el usuario administrador inicial
-- Contraseña: admin123
-- ============================================================

USE agrofinca;

INSERT INTO usuario (nombres, apellidos, documento, telefono, username, password_hash, rol, activo, fecha_creacion)
VALUES (
    'Admin',
    'Principal',
    '000000001',
    '3000000000',
    'admin',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'ADMINISTRADOR',
    1,
    NOW()
);

-- Verifica que se insertó correctamente
SELECT id_usuario, username, rol, activo FROM usuario;
