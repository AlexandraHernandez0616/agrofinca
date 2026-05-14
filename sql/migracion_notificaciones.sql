-- ============================================================
-- MIGRACIÓN: Agregar columna 'link' a notificacion_operativa
-- Ejecutar una sola vez en la base de datos agrofinca
-- ============================================================

USE agrofinca;

-- Agrega la columna 'link' si no existe
ALTER TABLE notificacion_operativa
  ADD COLUMN IF NOT EXISTS link VARCHAR(255) NULL
  AFTER mensaje;
