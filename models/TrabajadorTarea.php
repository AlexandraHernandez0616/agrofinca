<?php
/**
 * ============================================================
 * ARCHIVO: models/TrabajadorTarea.php
 * PROPÓSITO: Consultas de BD para el módulo Mis Tareas (trabajador)
 * ============================================================
 * Tablas: tarea, tarea_trabajador, lote, usuario (mayordomo)
 * ============================================================
 */
class TrabajadorTarea {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Lista todas las tareas asignadas al trabajador.
     * Acepta filtro por estado.
     */
    public function listar(int $id_trabajador, string $estado = ''): array {
        $where  = ['tt.id_trabajador = :id'];
        $params = [':id' => $id_trabajador];

        if ($estado !== '') {
            $where[]          = "t.estado_tarea = :estado";
            $params[':estado'] = $estado;
        }

        $sql = "SELECT t.id_tarea,
                       t.nombre,
                       t.descripcion,
                       t.estado_tarea,
                       t.fecha_inicio,
                       t.fecha_fin_estimada,
                       l.nombre AS lote,
                       CONCAT(u.nombres, ' ', u.apellidos) AS mayordomo,
                       tt.fecha_asignacion,
                       tt.estado_detalle
                FROM tarea_trabajador tt
                INNER JOIN tarea   t ON t.id_tarea   = tt.id_tarea
                INNER JOIN lote    l ON l.id_lote     = t.id_lote
                INNER JOIN usuario u ON u.id_usuario  = t.id_mayordomo
                WHERE " . implode(' AND ', $where) . "
                ORDER BY
                  FIELD(t.estado_tarea, 'PENDIENTE', 'EN_PROGRESO', 'COMPLETADA'),
                  t.fecha_fin_estimada ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen de tareas del trabajador para las tarjetas.
     */
    public function resumen(int $id_trabajador): array {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*)                              AS total,
                    SUM(t.estado_tarea = 'PENDIENTE')      AS pendientes,
                    SUM(t.estado_tarea = 'EN_PROGRESO')    AS en_proceso,
                    SUM(t.estado_tarea = 'COMPLETADA')     AS completadas
             FROM tarea_trabajador tt
             INNER JOIN tarea t ON t.id_tarea = tt.id_tarea
             WHERE tt.id_trabajador = :id"
        );
        $stmt->bindParam(':id', $id_trabajador, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'total'      => (int) ($row['total']      ?? 0),
            'pendientes' => (int) ($row['pendientes'] ?? 0),
            'en_proceso' => (int) ($row['en_proceso'] ?? 0),
            'completadas'=> (int) ($row['completadas'] ?? 0),
        ];
    }

    /**
     * Marca una tarea como COMPLETADA desde la perspectiva del trabajador.
     * Actualiza tarea_trabajador.estado_detalle y, si todos los trabajadores
     * de la tarea la completaron, cambia tarea.estado_tarea a COMPLETADA.
     */
    public function completar(int $id_tarea, int $id_trabajador): bool {
        $this->conn->beginTransaction();
        try {
            // Marcar el detalle del trabajador como completado
            $stmt = $this->conn->prepare(
                "UPDATE tarea_trabajador
                 SET estado_detalle    = 'COMPLETADA',
                     fecha_finalizacion = NOW()
                 WHERE id_tarea = :tarea AND id_trabajador = :trabajador"
            );
            $stmt->bindParam(':tarea',      $id_tarea,      PDO::PARAM_INT);
            $stmt->bindParam(':trabajador', $id_trabajador, PDO::PARAM_INT);
            $stmt->execute();

            // Verificar si todos los trabajadores de la tarea la completaron
            $check = $this->conn->prepare(
                "SELECT COUNT(*) FROM tarea_trabajador
                 WHERE id_tarea = :tarea AND estado_detalle != 'COMPLETADA'"
            );
            $check->bindParam(':tarea', $id_tarea, PDO::PARAM_INT);
            $check->execute();
            $pendientes = (int) $check->fetchColumn();

            // Si no quedan pendientes, marcar la tarea como COMPLETADA
            if ($pendientes === 0) {
                $upd = $this->conn->prepare(
                    "UPDATE tarea SET estado_tarea = 'COMPLETADA'
                     WHERE id_tarea = :id"
                );
                $upd->bindParam(':id', $id_tarea, PDO::PARAM_INT);
                $upd->execute();
            } else {
                // Si hay al menos uno trabajando, poner EN_PROGRESO
                $upd = $this->conn->prepare(
                    "UPDATE tarea SET estado_tarea = 'EN_PROGRESO'
                     WHERE id_tarea = :id AND estado_tarea = 'PENDIENTE'"
                );
                $upd->bindParam(':id', $id_tarea, PDO::PARAM_INT);
                $upd->execute();
            }

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }
}
?>
