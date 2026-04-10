CREATE TABLE `usuario` (
  `id_usuario` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `documento` varchar(50) UNIQUE NOT NULL,
  `username` varchar(50) UNIQUE NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL COMMENT 'ADMINISTRADOR, MAYORDOMO, TRABAJADOR',
  `fecha_creacion` datetime NOT NULL,
  `activo` boolean NOT NULL DEFAULT true
);

CREATE TABLE `trabajador` (
  `id_trabajador` int PRIMARY KEY,
  `eps` varchar(100),
  `rh` varchar(10),
  `estado_trabajador` varchar(50),
  `fecha_ingreso` date
);

CREATE TABLE `asignacion_trabajador_mayordomo` (
  `id_asignacion` int PRIMARY KEY AUTO_INCREMENT,
  `id_trabajador` int NOT NULL,
  `id_mayordomo` int NOT NULL COMMENT 'Referencia a usuario con rol MAYORDOMO',
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date,
  `estado` varchar(30) NOT NULL DEFAULT 'ACTIVA'
);

CREATE TABLE `lote` (
  `id_lote` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(150),
  `extension` decimal(10,2),
  `tipo_cultivo` varchar(100),
  `fecha_registro` date
);

CREATE TABLE `tarea` (
  `id_tarea` int PRIMARY KEY AUTO_INCREMENT,
  `id_lote` int NOT NULL,
  `id_mayordomo` int NOT NULL COMMENT 'Referencia a usuario con rol MAYORDOMO',
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `fecha_inicio` date,
  `fecha_fin` date,
  `estado_tarea` varchar(50)
);

CREATE TABLE `tarea_trabajador` (
  `id_tarea` int NOT NULL,
  `id_trabajador` int NOT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `fecha_finalizacion` datetime,
  `cantidad_producida` decimal(10,2),
  `observacion` text,
  `observacion_cierre` text,
  `evidencia_fotografica` varchar(255),
  `estado_detalle` varchar(50),
  PRIMARY KEY (`id_tarea`, `id_trabajador`)
);

CREATE TABLE `asistencia` (
  `id_asistencia` int PRIMARY KEY AUTO_INCREMENT,
  `id_trabajador` int NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time,
  `hora_salida` time
);

CREATE TABLE `herramienta` (
  `id_herramienta` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `cantidad_total` int NOT NULL,
  `estado` varchar(50),
  `foto_referencia` varchar(255),
  `fecha_registro` date
);

CREATE TABLE `prestamo` (
  `id_prestamo` int PRIMARY KEY AUTO_INCREMENT,
  `id_trabajador` int NOT NULL,
  `id_mayordomo` int NOT NULL COMMENT 'Referencia a usuario con rol MAYORDOMO',
  `fecha_solicitud` date NOT NULL,
  `fecha_aprobacion` date,
  `estado_prestamo` varchar(50),
  `observacion` text
);

CREATE TABLE `detalle_prestamo` (
  `id_detalle_prestamo` int PRIMARY KEY AUTO_INCREMENT,
  `id_prestamo` int NOT NULL,
  `id_herramienta` int NOT NULL,
  `cantidad` int NOT NULL,
  `cantidad_devuelta` int DEFAULT 0,
  `fecha_devolucion` date,
  `fecha_entrega_real` date,
  `estado_devolucion` varchar(50),
  `observacion` text,
  `recibido_por` int COMMENT 'Referencia a usuario'
);

CREATE TABLE `insumo` (
  `id_insumo` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `stock_actual` decimal(10,2) NOT NULL,
  `unidad_medida` varchar(50),
  `fecha_vencimiento` date,
  `cantidad_minima` decimal(10,2),
  `foto_referencia` varchar(255),
  `fecha_registro` date
);

CREATE TABLE `tarea_insumo` (
  `id_tarea_insumo` int PRIMARY KEY AUTO_INCREMENT,
  `id_tarea` int NOT NULL,
  `id_insumo` int NOT NULL,
  `cantidad_asignada` decimal(10,2) NOT NULL,
  `cantidad_consumida` decimal(10,2) DEFAULT 0,
  `cantidad_reintegrada` decimal(10,2) DEFAULT 0
);

CREATE TABLE `tarifa` (
  `id_tarifa` int PRIMARY KEY AUTO_INCREMENT,
  `tipo_pago` varchar(20) NOT NULL COMMENT 'JORNAL, PRODUCCION, MIXTO',
  `valor` decimal(10,2) NOT NULL,
  `fecha_inicio_vigencia` date NOT NULL,
  `fecha_fin_vigencia` date,
  `activa` boolean NOT NULL DEFAULT true
);

CREATE TABLE `liquidacion` (
  `id_liquidacion` int PRIMARY KEY AUTO_INCREMENT,
  `id_trabajador` int NOT NULL,
  `id_tarifa` int NOT NULL,
  `periodo_inicio` date NOT NULL,
  `periodo_fin` date NOT NULL,
  `jornadas_consideradas` decimal(10,2) DEFAULT 0,
  `produccion_considerada` decimal(10,2) DEFAULT 0,
  `valor_calculado` decimal(10,2) NOT NULL,
  `fecha_generacion` date NOT NULL,
  `fecha_liquidacion` date,
  `estado` varchar(30) NOT NULL DEFAULT 'PENDIENTE',
  `observacion` text
);

CREATE TABLE `pago` (
  `id_pago` int PRIMARY KEY AUTO_INCREMENT,
  `id_liquidacion` int NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `metodo_pago` varchar(30),
  `referencia_pago` varchar(100),
  `observacion` text
);

CREATE UNIQUE INDEX `asistencia_index_0` ON `asistencia` (`id_trabajador`, `fecha`);

CREATE UNIQUE INDEX `tarea_insumo_index_1` ON `tarea_insumo` (`id_tarea`, `id_insumo`);

ALTER TABLE `trabajador` ADD FOREIGN KEY (`id_trabajador`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `asignacion_trabajador_mayordomo` ADD FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`);

ALTER TABLE `asignacion_trabajador_mayordomo` ADD FOREIGN KEY (`id_mayordomo`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `tarea` ADD FOREIGN KEY (`id_lote`) REFERENCES `lote` (`id_lote`);

ALTER TABLE `tarea` ADD FOREIGN KEY (`id_mayordomo`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `tarea_trabajador` ADD FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id_tarea`);

ALTER TABLE `tarea_trabajador` ADD FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`);

ALTER TABLE `asistencia` ADD FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`);

ALTER TABLE `prestamo` ADD FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`);

ALTER TABLE `prestamo` ADD FOREIGN KEY (`id_mayordomo`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `detalle_prestamo` ADD FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`);

ALTER TABLE `detalle_prestamo` ADD FOREIGN KEY (`id_herramienta`) REFERENCES `herramienta` (`id_herramienta`);

ALTER TABLE `detalle_prestamo` ADD FOREIGN KEY (`recibido_por`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `tarea_insumo` ADD FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id_tarea`);

ALTER TABLE `tarea_insumo` ADD FOREIGN KEY (`id_insumo`) REFERENCES `insumo` (`id_insumo`);

ALTER TABLE `liquidacion` ADD FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id_trabajador`);

ALTER TABLE `liquidacion` ADD FOREIGN KEY (`id_tarifa`) REFERENCES `tarifa` (`id_tarifa`);

ALTER TABLE `pago` ADD FOREIGN KEY (`id_liquidacion`) REFERENCES `liquidacion` (`id_liquidacion`);
