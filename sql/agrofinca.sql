-- ============================================================
-- ARCHIVO: sql/agrofinca.sql
-- PROPÓSITO: Esquema completo de la base de datos AgroFinca
-- ============================================================
--
-- Cómo usarlo:
--   Ejecuta este archivo en phpMyAdmin o cualquier cliente MySQL
--   para crear todas las tablas del sistema desde cero.
--
-- Tablas y su función:
--
--   usuario              → Usuarios activos del sistema con sus roles
--                          Roles posibles: ADMINISTRADOR, MAYORDOMO, TRABAJADOR
--
--   solicitud_registro   → Solicitudes de nuevos trabajadores pendientes
--                          de aprobación. Estado: PENDIENTE, APROBADA, RECHAZADA
--
--   trabajador           → Extiende usuario con datos específicos del trabajador
--                          (eps, rh, fecha de ingreso, estado)
--
--   cultivo              → Tipos de cultivos registrados en la finca
--
--   lote                 → Lotes físicos de la finca, asociados a un cultivo
--
--   tarea                → Tareas asignadas a lotes, gestionadas por mayordomos
--
--   tarea_trabajador     → Relación entre tareas y trabajadores asignados
--
--   asistencia           → Registro de entrada/salida diaria de trabajadores
--
--   herramienta          → Inventario de herramientas disponibles
--
--   insumo               → Inventario de insumos con control de stock mínimo
--
--   tarea_insumo         → Insumos asignados y consumidos por tarea
--
--   prestamo             → Préstamos de herramientas a trabajadores
--
--   detalle_prestamo     → Detalle de herramientas por préstamo
--
--   notificacion_operativa → Notificaciones internas del sistema por usuario
--
--   produccion           → Registro de producción por trabajador y lote
--
--   tarifa               → Tarifas de pago (jornal, producción, mixto)
--
--   autorizacion_delegada → Delegaciones de permisos del admin al mayordomo
--
--   liquidacion          → Liquidaciones de pago calculadas por periodo
--
--   pago                 → Pagos realizados sobre liquidaciones
--
--   bitacora_operacion   → Registro de auditoría de todas las operaciones
-- ============================================================

CREATE DATABASE IF NOT EXISTS agrofinca;
USE agrofinca;


CREATE TABLE usuario (
  id_usuario INT PRIMARY KEY AUTO_INCREMENT,
  nombres VARCHAR(100) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  documento VARCHAR(50) NOT NULL UNIQUE,
  telefono VARCHAR(30),
  username VARCHAR(50) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  rol VARCHAR(20) NOT NULL COMMENT 'ADMINISTRADOR, MAYORDOMO, TRABAJADOR',
  activo BOOLEAN NOT NULL DEFAULT TRUE,
  fecha_creacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE solicitud_registro (
  id_solicitud INT PRIMARY KEY AUTO_INCREMENT,
  nombres VARCHAR(100) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  documento VARCHAR(50) NOT NULL,
  telefono VARCHAR(30) NOT NULL,
  eps VARCHAR(100),
  rh VARCHAR(10),
  username VARCHAR(50) NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  estado VARCHAR(20) NOT NULL DEFAULT 'PENDIENTE' COMMENT 'PENDIENTE, APROBADA, RECHAZADA',
  fecha_solicitud DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  fecha_gestion DATETIME,
  id_mayordomo_gestor INT,
  observacion TEXT,
  CONSTRAINT uq_solicitud_documento UNIQUE (documento),
  CONSTRAINT uq_solicitud_username UNIQUE (username),
  CONSTRAINT fk_solicitud_mayordomo FOREIGN KEY (id_mayordomo_gestor) REFERENCES usuario(id_usuario)
);

CREATE TABLE trabajador (
  id_trabajador INT PRIMARY KEY,
  eps VARCHAR(100),
  rh VARCHAR(10),
  estado_trabajador VARCHAR(30) NOT NULL DEFAULT 'ACTIVO',
  fecha_ingreso DATE,
  CONSTRAINT fk_trabajador_usuario FOREIGN KEY (id_trabajador) REFERENCES usuario(id_usuario)
);

CREATE TABLE cultivo (
  id_cultivo INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  variedad VARCHAR(100) NOT NULL,
  cantidad_cultivada DECIMAL(10,2) NOT NULL,
  fecha_registro DATE NOT NULL,
  estado VARCHAR(20) NOT NULL DEFAULT 'ACTIVO' COMMENT 'ACTIVO, INHABILITADO',
  CONSTRAINT uq_cultivo_nombre_variedad UNIQUE (nombre, variedad)
);

CREATE TABLE lote (
  id_lote INT PRIMARY KEY AUTO_INCREMENT,
  id_cultivo INT NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  ubicacion_descripcion VARCHAR(150),
  extension DECIMAL(10,2),
  fecha_registro DATE,
  CONSTRAINT fk_lote_cultivo FOREIGN KEY (id_cultivo) REFERENCES cultivo(id_cultivo)
);

CREATE TABLE tarea (
  id_tarea INT PRIMARY KEY AUTO_INCREMENT,
  id_lote INT NOT NULL,
  id_mayordomo INT NOT NULL COMMENT 'Referencia a usuario con rol MAYORDOMO',
  nombre VARCHAR(100) NOT NULL,
  descripcion TEXT,
  fecha_inicio DATE,
  fecha_fin_estimada DATE,
  estado_tarea VARCHAR(30) NOT NULL DEFAULT 'PENDIENTE' COMMENT 'PENDIENTE, EN_PROGRESO, COMPLETADA',
  CONSTRAINT fk_tarea_lote FOREIGN KEY (id_lote) REFERENCES lote(id_lote),
  CONSTRAINT fk_tarea_mayordomo FOREIGN KEY (id_mayordomo) REFERENCES usuario(id_usuario)
);

CREATE TABLE tarea_trabajador (
  id_tarea_trabajador INT PRIMARY KEY AUTO_INCREMENT,
  id_tarea INT NOT NULL,
  id_trabajador INT NOT NULL,
  fecha_asignacion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  fecha_finalizacion DATETIME,
  observacion_cierre TEXT,
  evidencia_fotografica VARCHAR(255),
  estado_detalle VARCHAR(30) NOT NULL DEFAULT 'ASIGNADA',
  CONSTRAINT uq_tarea_trabajador UNIQUE (id_tarea, id_trabajador),
  CONSTRAINT fk_tarea_trabajador_tarea FOREIGN KEY (id_tarea) REFERENCES tarea(id_tarea),
  CONSTRAINT fk_tarea_trabajador_trabajador FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador)
);

CREATE TABLE asistencia (
  id_asistencia INT PRIMARY KEY AUTO_INCREMENT,
  id_trabajador INT NOT NULL,
  fecha DATE NOT NULL,
  hora_entrada TIME,
  hora_salida TIME,
  CONSTRAINT uq_asistencia_trabajador_fecha UNIQUE (id_trabajador, fecha),
  CONSTRAINT fk_asistencia_trabajador FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador)
);

CREATE TABLE herramienta (
  id_herramienta INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  cantidad_total INT NOT NULL,
  estado VARCHAR(50),
  foto_referencia VARCHAR(255),
  fecha_registro DATE
);

CREATE TABLE insumo (
  id_insumo INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  stock_actual DECIMAL(10,2) NOT NULL,
  unidad_medida VARCHAR(50),
  fecha_vencimiento DATE,
  cantidad_minima DECIMAL(10,2),
  foto_referencia VARCHAR(255),
  fecha_registro DATE
);

CREATE TABLE tarea_insumo (
  id_tarea_insumo INT PRIMARY KEY AUTO_INCREMENT,
  id_tarea INT NOT NULL,
  id_insumo INT NOT NULL,
  cantidad_asignada DECIMAL(10,2) NOT NULL,
  cantidad_consumida DECIMAL(10,2) DEFAULT 0,
  cantidad_reintegrada DECIMAL(10,2) DEFAULT 0,
  CONSTRAINT uq_tarea_insumo UNIQUE (id_tarea, id_insumo),
  CONSTRAINT fk_tarea_insumo_tarea FOREIGN KEY (id_tarea) REFERENCES tarea(id_tarea),
  CONSTRAINT fk_tarea_insumo_insumo FOREIGN KEY (id_insumo) REFERENCES insumo(id_insumo)
);

CREATE TABLE prestamo (
  id_prestamo INT PRIMARY KEY AUTO_INCREMENT,
  id_trabajador INT NOT NULL,
  id_mayordomo INT NOT NULL COMMENT 'Referencia a usuario con rol MAYORDOMO',
  fecha_solicitud DATE NOT NULL,
  fecha_aprobacion DATE,
  estado_prestamo VARCHAR(30) NOT NULL DEFAULT 'PENDIENTE',
  observacion TEXT,
  CONSTRAINT fk_prestamo_trabajador FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador),
  CONSTRAINT fk_prestamo_mayordomo FOREIGN KEY (id_mayordomo) REFERENCES usuario(id_usuario)
);

CREATE TABLE detalle_prestamo (
  id_detalle_prestamo INT PRIMARY KEY AUTO_INCREMENT,
  id_prestamo INT NOT NULL,
  id_herramienta INT NOT NULL,
  cantidad INT NOT NULL,
  cantidad_devuelta INT DEFAULT 0,
  fecha_entrega_real DATE,
  fecha_devolucion DATE,
  estado_devolucion VARCHAR(50),
  observacion TEXT,
  recibido_por INT,
  CONSTRAINT fk_detalle_prestamo_prestamo FOREIGN KEY (id_prestamo) REFERENCES prestamo(id_prestamo),
  CONSTRAINT fk_detalle_prestamo_herramienta FOREIGN KEY (id_herramienta) REFERENCES herramienta(id_herramienta),
  CONSTRAINT fk_detalle_prestamo_recibido_por FOREIGN KEY (recibido_por) REFERENCES usuario(id_usuario)
);

CREATE TABLE notificacion_operativa (
  id_notificacion INT PRIMARY KEY AUTO_INCREMENT,
  id_usuario_destino INT NOT NULL,
  tipo VARCHAR(50) NOT NULL,
  mensaje VARCHAR(255) NOT NULL,
  link VARCHAR(255) NULL,
  fecha_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  leida BOOLEAN NOT NULL DEFAULT FALSE,
  CONSTRAINT fk_notificacion_usuario FOREIGN KEY (id_usuario_destino) REFERENCES usuario(id_usuario)
);

CREATE TABLE produccion (
  id_produccion INT PRIMARY KEY AUTO_INCREMENT,
  id_trabajador INT NOT NULL,
  id_lote INT NOT NULL,
  fecha DATE NOT NULL,
  cantidad DECIMAL(10,2) NOT NULL,
  unidad_medida VARCHAR(50) NOT NULL,
  CONSTRAINT fk_produccion_trabajador FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador),
  CONSTRAINT fk_produccion_lote FOREIGN KEY (id_lote) REFERENCES lote(id_lote)
);

CREATE TABLE tarifa (
  id_tarifa INT PRIMARY KEY AUTO_INCREMENT,
  tipo_pago VARCHAR(20) NOT NULL COMMENT 'JORNAL, PRODUCCION, MIXTO',
  valor DECIMAL(10,2) NOT NULL,
  fecha_inicio_vigencia DATE NOT NULL,
  fecha_fin_vigencia DATE,
  activa BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE autorizacion_delegada (
  id_autorizacion INT PRIMARY KEY AUTO_INCREMENT,
  id_administrador INT NOT NULL,
  id_mayordomo INT NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  acciones_permitidas VARCHAR(255) NOT NULL,
  monto_maximo DECIMAL(10,2),
  estado VARCHAR(30) NOT NULL DEFAULT 'ACTIVA' COMMENT 'ACTIVA, REVOCADA, EXPIRADA',
  CONSTRAINT fk_autorizacion_admin FOREIGN KEY (id_administrador) REFERENCES usuario(id_usuario),
  CONSTRAINT fk_autorizacion_mayordomo FOREIGN KEY (id_mayordomo) REFERENCES usuario(id_usuario)
);

CREATE TABLE liquidacion (
  id_liquidacion INT PRIMARY KEY AUTO_INCREMENT,
  id_trabajador INT NOT NULL,
  id_tarifa INT NOT NULL,
  id_autorizacion INT,
  periodo_inicio DATE NOT NULL,
  periodo_fin DATE NOT NULL,
  jornadas_consideradas DECIMAL(10,2) DEFAULT 0,
  produccion_considerada DECIMAL(10,2) DEFAULT 0,
  valor_calculado DECIMAL(10,2) NOT NULL,
  fecha_generacion DATE NOT NULL,
  fecha_liquidacion DATE,
  estado VARCHAR(30) NOT NULL DEFAULT 'PENDIENTE',
  observacion TEXT,
  CONSTRAINT fk_liquidacion_trabajador FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador),
  CONSTRAINT fk_liquidacion_tarifa FOREIGN KEY (id_tarifa) REFERENCES tarifa(id_tarifa),
  CONSTRAINT fk_liquidacion_autorizacion FOREIGN KEY (id_autorizacion) REFERENCES autorizacion_delegada(id_autorizacion)
);

CREATE TABLE pago (
  id_pago INT PRIMARY KEY AUTO_INCREMENT,
  id_liquidacion INT NOT NULL,
  id_autorizacion INT,
  id_usuario_registra INT NOT NULL,
  fecha_pago DATE NOT NULL,
  monto DECIMAL(10,2) NOT NULL,
  metodo_pago VARCHAR(30),
  referencia_pago VARCHAR(100),
  observacion TEXT,
  CONSTRAINT fk_pago_liquidacion FOREIGN KEY (id_liquidacion) REFERENCES liquidacion(id_liquidacion),
  CONSTRAINT fk_pago_autorizacion FOREIGN KEY (id_autorizacion) REFERENCES autorizacion_delegada(id_autorizacion),
  CONSTRAINT fk_pago_usuario FOREIGN KEY (id_usuario_registra) REFERENCES usuario(id_usuario)
);

CREATE TABLE bitacora_operacion (
  id_bitacora INT PRIMARY KEY AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  fecha_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  operacion VARCHAR(100) NOT NULL,
  modulo VARCHAR(100) NOT NULL,
  detalle TEXT,
  CONSTRAINT fk_bitacora_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);
