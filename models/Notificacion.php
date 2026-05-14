<?php
/**
 * ============================================================
 * ARCHIVO: models/Notificacion.php
 * PROPÓSITO: Helper estático para insertar notificaciones
 *            operativas en la tabla notificacion_operativa.
 * ============================================================
 * Uso:
 *   Notificacion::enviar($db, $id_destino, 'info', 'Mensaje', 'link/relativo.php');
 *
 * Tipos válidos: error | warning | success | info
 * El campo 'link' es opcional; si se omite queda NULL.
 * ============================================================
 */
class Notificacion {

    /**
     * Inserta una notificación para un usuario destino.
     * Si la columna 'link' no existe aún en la BD, reintenta sin ella.
     *
     * @param PDO         $db         Conexión activa a la BD
     * @param int         $id_destino ID del usuario que recibirá la notificación
     * @param string      $tipo       error | warning | success | info
     * @param string      $mensaje    Texto de la notificación (máx 255 chars)
     * @param string|null $link       Ruta relativa a la vista destino (opcional)
     * @return bool
     */
    public static function enviar(
        PDO     $db,
        int     $id_destino,
        string  $tipo,
        string  $mensaje,
        ?string $link = null
    ): bool {
        // Intentar con columna 'link'
        try {
            $stmt = $db->prepare(
                "INSERT INTO notificacion_operativa
                   (id_usuario_destino, tipo, mensaje, link, fecha_hora, leida)
                 VALUES (:destino, :tipo, :mensaje, :link, NOW(), 0)"
            );
            $stmt->bindValue(':destino', $id_destino, PDO::PARAM_INT);
            $stmt->bindValue(':tipo',    $tipo,       PDO::PARAM_STR);
            $stmt->bindValue(':mensaje', $mensaje,    PDO::PARAM_STR);
            $stmt->bindValue(':link',    $link,       $link === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            // Fallback: insertar sin 'link' (columna puede no existir aún)
            try {
                $stmt2 = $db->prepare(
                    "INSERT INTO notificacion_operativa
                       (id_usuario_destino, tipo, mensaje, fecha_hora, leida)
                     VALUES (:destino, :tipo, :mensaje, NOW(), 0)"
                );
                $stmt2->bindValue(':destino', $id_destino, PDO::PARAM_INT);
                $stmt2->bindValue(':tipo',    $tipo,       PDO::PARAM_STR);
                $stmt2->bindValue(':mensaje', $mensaje,    PDO::PARAM_STR);
                $stmt2->execute();
                return true;
            } catch (Exception $e2) {
                return false;
            }
        }
    }

    /**
     * Envía la misma notificación a múltiples usuarios.
     *
     * @param PDO         $db
     * @param int[]       $ids_destino
     * @param string      $tipo
     * @param string      $mensaje
     * @param string|null $link
     */
    public static function enviarAVarios(
        PDO     $db,
        array   $ids_destino,
        string  $tipo,
        string  $mensaje,
        ?string $link = null
    ): void {
        foreach ($ids_destino as $id) {
            self::enviar($db, (int) $id, $tipo, $mensaje, $link);
        }
    }
}
?>
