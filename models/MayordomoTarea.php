<?php
/**
 * ============================================================
 * ARCHIVO: models/MayordomoTarea.php
 * PROPÓSITO: Operaciones de BD para el módulo Tareas (mayordomo)
 * ============================================================
 * Tablas: tarea, tarea_trabajador, lote, trabajador, usuario
 *
 * Columnas de tarea:
 *   id_tarea           INT PK AUTO_INCREMENT
 *   id_lote            INT FK → lote
 *   id_mayordomo       INT FK → usuario (rol MAYORDOMO)
 *   nombre             VARCHAR(100)
 *   descripcion        TEXT
 *   fecha_inicio       DATE
 *   fecha_fin_estimada DATE
 *   estado_tarea       VARCHAR(30) → PENDIENTE | EN_PROGRESO | COMPLETADA
 * ============================================================
 */
class MayordomoTarea {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista las tareas del mayordomo logueado con lote y trabajadores asignados.
     * Acepta filtros por búsqueda (nombre/lote) y estado.
     */
    public function listar(int $id_mayordomo, string $busqueda = '', string $estado = ''): array {
        $where  = ['t.id_mayordomo = :mayordomo'];
        $params = [':mayordomo' => $id_mayordomo];

        if ($busqueda !== '') {
            $where[]      = "(t.nombre LIKE :b OR l.nombre LIKE :b)";
            $params[':b'] = '%' . $busqueda . '%';
        }
        if ($estado !== '') {
            $where[]          = "t.estado_tarea = :estado";
            $params[':estado'] = $estado;
        }

        $sql = "SELECT t.id_tarea,
                       t.nombre,
                       t.descripcion,
                       l.nombre          AS lote,
                       t.fecha_inicio,
                       t.fecha_fin_estimada,
                       t.estado_tarea,
                       GROUP_CONCAT(
                         CONCAT(u.nombres, ' ', u.apellidos)
                         ORDER BY u.nombres
                         SEPARATOR ', '
                       ) AS trabajadores
                FROM tarea t
                INNER JOIN lote l ON l.id_lote = t.id_lote
                LEFT JOIN tarea_trabajador tt ON tt.id_tarea = t.id_tarea
                LEFT JOIN trabajador tr ON tr.id_trabajador = tt.id_trabajador
                LEFT JOIN usuario    u  ON u.id_usuario     = tr.id_trabajador
                WHERE " . implode(' AND ', $where) . "
                GROUP BY t.id_tarea
                ORDER BY t.fecha_inicio DESC, t.id_tarea DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen de tareas del mayordomo para las tarjetas superiores.
     */
    public function resumen(int $id_mayordomo): array {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*)                              AS total,
                    SUM(estado_tarea = 'PENDIENTE')        AS pendientes,
                    SUM(estado_tarea = 'EN_PROGRESO')      AS en_progreso,
                    SUM(estado_tarea = 'COMPLETADA')       AS completadas
             FROM tarea
             WHERE id_mayordomo = :id"
        );
        $stmt->bindParam(':id', $id_mayordomo, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'total'       => (int) ($row['total']       ?? 0),
            'pendientes'  => (int) ($row['pendientes']  ?? 0),
            'en_progreso' => (int) ($row['en_progreso'] ?? 0),
            'completadas' => (int) ($row['completadas'] ?? 0),
        ];
    }

    /**
     * Lista los lotes disponibles para el select del formulario.
     */
    public function listarLotes(): array {
        $stmt = $this->conn->query(
            "SELECT l.id_lote, l.nombre,
                    c.nombre AS cultivo
             FROM lote l
             LEFT JOIN cultivo c ON c.id_cultivo = l.id_cultivo
             ORDER BY l.nombre"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lista los trabajadores activos para el select múltiple del formulario.
     */
    public function listarTrabajadores(): array {
        $stmt = $this->conn->query(
            "SELECT tr.id_trabajador,
                    CONCAT(u.nombres, ' ', u.apellidos) AS nombre_completo
             FROM trabajador tr
             INNER JOIN usuario u ON u.id_usuario = tr.id_trabajador
             WHERE tr.estado_trabajador = 'ACTIVO'
             ORDER BY u.nombres, u.apellidos"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene los IDs de trabajadores asignados a una tarea.
     */
    public function trabajadoresDeTarea(int $id_tarea): array {
        $stmt = $this->conn->prepare(
            "SELECT id_trabajador FROM tarea_trabajador WHERE id_tarea = :id"
        );
        $stmt->bindParam(':id', $id_tarea, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Crea una nueva tarea y asigna los trabajadores indicados.
     * Usa transacción para garantizar consistencia.
     *
     * @param array $trabajadores  IDs de trabajadores a asignar
     */
    public function crear(
        int    $id_mayordomo,
        int    $id_lote,
        string $nombre,
        string $descripcion,
        string $fecha_inicio,
        string $fecha_fin,
        string $estado,
        array  $trabajadores
    ): bool {
        $this->conn->beginTransaction();
        try {
            // Insertar tarea
            $stmt = $this->conn->prepare(
                "INSERT INTO tarea
                   (id_lote, id_mayordomo, nombre, descripcion,
                    fecha_inicio, fecha_fin_estimada, estado_tarea)
                 VALUES
                   (:lote, :mayordomo, :nombre, :desc,
                    :inicio, :fin, :estado)"
            );
            $stmt->bindParam(':lote',      $id_lote,     PDO::PARAM_INT);
            $stmt->bindParam(':mayordomo', $id_mayordomo, PDO::PARAM_INT);
            $stmt->bindParam(':nombre',    $nombre,      PDO::PARAM_STR);
            $stmt->bindParam(':desc',      $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':inicio',    $fecha_inicio, PDO::PARAM_STR);
            $stmt->bindParam(':fin',       $fecha_fin,   PDO::PARAM_STR);
            $stmt->bindParam(':estado',    $estado,      PDO::PARAM_STR);
            $stmt->execute();

            $id_tarea = (int) $this->conn->lastInsertId();

            // Asignar trabajadores
            $this->asignarTrabajadores($id_tarea, $trabajadores);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    /**
     * Actualiza una tarea existente y reemplaza los trabajadores asignados.
     */
    public function editar(
        int    $id_tarea,
        int    $id_lote,
        string $nombre,
        string $descripcion,
        string $fecha_inicio,
        string $fecha_fin,
        string $estado,
        array  $trabajadores
    ): bool {
        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare(
                "UPDATE tarea
                 SET id_lote           = :lote,
                     nombre            = :nombre,
                     descripcion       = :desc,
                     fecha_inicio      = :inicio,
                     fecha_fin_estimada= :fin,
                     estado_tarea      = :estado
                 WHERE id_tarea = :id"
            );
            $stmt->bindParam(':id',     $id_tarea,    PDO::PARAM_INT);
            $stmt->bindParam(':lote',   $id_lote,     PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $nombre,      PDO::PARAM_STR);
            $stmt->bindParam(':desc',   $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(':inicio', $fecha_inicio, PDO::PARAM_STR);
            $stmt->bindParam(':fin',    $fecha_fin,   PDO::PARAM_STR);
            $stmt->bindParam(':estado', $estado,      PDO::PARAM_STR);
            $stmt->execute();

            // Reemplazar trabajadores: borrar los actuales y reinsertar
            $del = $this->conn->prepare(
                "DELETE FROM tarea_trabajador WHERE id_tarea = :id"
            );
            $del->bindParam(':id', $id_tarea, PDO::PARAM_INT);
            $del->execute();

            $this->asignarTrabajadores($id_tarea, $trabajadores);

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    /**
     * Cambia solo el estado de una tarea.
     */
    public function cambiarEstado(int $id_tarea, string $estado): bool {
        $stmt = $this->conn->prepare(
            "UPDATE tarea SET estado_tarea = :estado WHERE id_tarea = :id"
        );
        $stmt->bindParam(':estado', $estado,   PDO::PARAM_STR);
        $stmt->bindParam(':id',     $id_tarea, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Elimina una tarea y sus asignaciones de trabajadores.
     * Solo se permite si la tarea está en estado PENDIENTE.
     */
    public function eliminar(int $id_tarea): bool {
        $this->conn->beginTransaction();
        try {
            // Borrar asignaciones primero (FK)
            $del = $this->conn->prepare(
                "DELETE FROM tarea_trabajador WHERE id_tarea = :id"
            );
            $del->bindParam(':id', $id_tarea, PDO::PARAM_INT);
            $del->execute();

            // Borrar tarea
            $stmt = $this->conn->prepare(
                "DELETE FROM tarea WHERE id_tarea = :id AND estado_tarea = 'PENDIENTE'"
            );
            $stmt->bindParam(':id', $id_tarea, PDO::PARAM_INT);
            $stmt->execute();

            $eliminada = $stmt->rowCount() > 0;
            $this->conn->commit();
            return $eliminada;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    // ══════════════════════════════════════════════════════
    //  PRIVADOS
    // ══════════════════════════════════════════════════════

    /**
     * Inserta los registros en tarea_trabajador para una tarea.
     */
    private function asignarTrabajadores(int $id_tarea, array $trabajadores): void {
        if (empty($trabajadores)) return;

        $stmt = $this->conn->prepare(
            "INSERT IGNORE INTO tarea_trabajador (id_tarea, id_trabajador)
             VALUES (:tarea, :trabajador)"
        );
        foreach ($trabajadores as $id_t) {
            $id_t = (int) $id_t;
            if ($id_t <= 0) continue;
            $stmt->bindParam(':tarea',      $id_tarea, PDO::PARAM_INT);
            $stmt->bindParam(':trabajador', $id_t,     PDO::PARAM_INT);
            $stmt->execute();
        }
    }
}
?>
