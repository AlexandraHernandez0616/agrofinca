<?php
/**
 * ============================================================
 * ARCHIVO: models/TrabajadorMayordomo.php
 * PROPÓSITO: Operaciones de BD para el módulo Trabajadores
 *            del panel del mayordomo.
 * ============================================================
 * Diferencia con models/Trabajador.php (del admin):
 *   Este modelo incluye la asistencia del día actual para
 *   mostrar hora de entrada, salida y estado de asistencia.
 *
 * Tablas que usa:
 *   - trabajador  → datos del trabajador
 *   - usuario     → nombres, apellidos, documento
 *   - asistencia  → registro de entrada/salida del día
 *
 * Usado por: views/mayordomo/trabajadores.php (directo, sin controller)
 * ============================================================
 */
class TrabajadorMayordomo {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lista todos los trabajadores activos con su asistencia de hoy.
     * Hace LEFT JOIN con asistencia WHERE fecha = CURDATE() para
     * mostrar entrada, salida y calcular si la asistencia está completa.
     *
     * Estado de asistencia:
     *   - 'Completa'   → tiene hora_entrada Y hora_salida
     *   - 'Incompleta' → tiene hora_entrada pero NO hora_salida
     *   - 'Sin marcar' → no tiene registro de asistencia hoy
     *
     * @return array
     */
    public function listarConAsistenciaHoy() {
        $sql = "SELECT
                    u.id_usuario,
                    u.nombres,
                    u.apellidos,
                    u.documento,
                    t.eps,
                    t.rh,
                    t.estado_trabajador,
                    a.hora_entrada,
                    a.hora_salida,
                    CASE
                        WHEN a.hora_entrada IS NOT NULL AND a.hora_salida IS NOT NULL
                            THEN 'Completa'
                        WHEN a.hora_entrada IS NOT NULL AND a.hora_salida IS NULL
                            THEN 'Incompleta'
                        ELSE 'Sin marcar'
                    END AS estado_asistencia
                FROM trabajador t
                INNER JOIN usuario u ON u.id_usuario = t.id_trabajador
                LEFT JOIN asistencia a
                    ON a.id_trabajador = t.id_trabajador
                    AND a.fecha = CURDATE()
                WHERE t.estado_trabajador IN ('ACTIVO', 'En labor')
                ORDER BY u.nombres ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Registra o actualiza la asistencia de un trabajador para hoy.
     * Si ya existe el registro del día, actualiza la hora de salida.
     * Si no existe, inserta con la hora de entrada.
     *
     * @param int    $id_trabajador
     * @param string $hora_entrada  Formato HH:MM
     * @param string $hora_salida   Formato HH:MM (puede ser vacío)
     * @return true|string
     */
    public function marcarAsistencia($id_trabajador, $hora_entrada, $hora_salida = null) {
        try {
            // Verificar si ya existe registro hoy
            $check = $this->conn->prepare(
                "SELECT id_asistencia FROM asistencia
                 WHERE id_trabajador = :id AND fecha = CURDATE() LIMIT 1"
            );
            $check->bindParam(':id', $id_trabajador, PDO::PARAM_INT);
            $check->execute();
            $existe = $check->fetch(PDO::FETCH_ASSOC);

            if ($existe) {
                // Actualizar hora de salida
                $sql  = "UPDATE asistencia
                         SET hora_salida = :salida
                         WHERE id_trabajador = :id AND fecha = CURDATE()";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':salida', $hora_salida);
                $stmt->bindParam(':id',     $id_trabajador, PDO::PARAM_INT);
            } else {
                // Insertar nueva entrada
                $sql  = "INSERT INTO asistencia
                            (id_trabajador, fecha, hora_entrada, hora_salida)
                         VALUES
                            (:id, CURDATE(), :entrada, :salida)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id',      $id_trabajador, PDO::PARAM_INT);
                $stmt->bindParam(':entrada', $hora_entrada);
                $stmt->bindParam(':salida',  $hora_salida);
            }

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return "Error al marcar asistencia: " . $e->getMessage();
        }
    }
}
?>
