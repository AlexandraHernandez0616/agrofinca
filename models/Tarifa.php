<?php
/**
 * ============================================================
 * ARCHIVO: models/Tarifa.php
 * PROPÓSITO: Operaciones de BD para el módulo Tarifas de Pago
 * ============================================================
 * Tabla: tarifa
 * Columnas:
 *   id_tarifa              INT PK AUTO_INCREMENT
 *   tipo_pago              VARCHAR(20)  → JORNAL | PRODUCCION | MIXTO
 *   valor                  DECIMAL(10,2)
 *   fecha_inicio_vigencia  DATE
 *   fecha_fin_vigencia     DATE (nullable)
 *   activa                 BOOLEAN
 * ============================================================
 */
class Tarifa {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // ══════════════════════════════════════════════════════
    //  LECTURA
    // ══════════════════════════════════════════════════════

    /**
     * Lista todas las tarifas, más recientes primero.
     * Acepta filtro opcional por tipo_pago o estado.
     *
     * @param string $busqueda  Texto libre (tipo_pago)
     * @param string $filtro    'activa' | 'inactiva' | '' (todos)
     */
    public function listar(string $busqueda = '', string $filtro = ''): array {
        $where  = [];
        $params = [];

        if ($busqueda !== '') {
            $where[]          = "tipo_pago LIKE :busqueda";
            $params[':busqueda'] = '%' . $busqueda . '%';
        }

        if ($filtro === 'activa') {
            $where[] = "activa = 1";
        } elseif ($filtro === 'inactiva') {
            $where[] = "activa = 0";
        }

        $sql = "SELECT id_tarifa, tipo_pago, valor,
                       fecha_inicio_vigencia, fecha_fin_vigencia, activa
                FROM tarifa"
             . ($where ? ' WHERE ' . implode(' AND ', $where) : '')
             . " ORDER BY id_tarifa DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una tarifa por su ID.
     */
    public function obtener(int $id): array|false {
        $stmt = $this->conn->prepare(
            "SELECT * FROM tarifa WHERE id_tarifa = :id LIMIT 1"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Resumen rápido para las tarjetas superiores.
     */
    public function resumen(): array {
        $row = $this->conn->query(
            "SELECT COUNT(*) AS total,
                    SUM(activa = 1) AS activas,
                    SUM(activa = 0) AS inactivas
             FROM tarifa"
        )->fetch(PDO::FETCH_ASSOC);

        return [
            'total'    => (int) ($row['total']    ?? 0),
            'activas'  => (int) ($row['activas']  ?? 0),
            'inactivas'=> (int) ($row['inactivas'] ?? 0),
        ];
    }

    // ══════════════════════════════════════════════════════
    //  ESCRITURA
    // ══════════════════════════════════════════════════════

    /**
     * Registra una nueva tarifa.
     */
    public function crear(
        string $tipo_pago,
        float  $valor,
        string $fecha_inicio,
        ?string $fecha_fin,
        bool   $activa
    ): bool {
        $stmt = $this->conn->prepare(
            "INSERT INTO tarifa
               (tipo_pago, valor, fecha_inicio_vigencia, fecha_fin_vigencia, activa)
             VALUES
               (:tipo, :valor, :inicio, :fin, :activa)"
        );
        $stmt->bindParam(':tipo',   $tipo_pago,   PDO::PARAM_STR);
        $stmt->bindParam(':valor',  $valor);
        $stmt->bindParam(':inicio', $fecha_inicio, PDO::PARAM_STR);
        $stmt->bindParam(':fin',    $fecha_fin,    PDO::PARAM_STR);
        $stmt->bindParam(':activa', $activa,       PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    /**
     * Actualiza una tarifa existente.
     */
    public function actualizar(
        int    $id,
        string $tipo_pago,
        float  $valor,
        string $fecha_inicio,
        ?string $fecha_fin,
        bool   $activa
    ): bool {
        $stmt = $this->conn->prepare(
            "UPDATE tarifa
             SET tipo_pago             = :tipo,
                 valor                 = :valor,
                 fecha_inicio_vigencia = :inicio,
                 fecha_fin_vigencia    = :fin,
                 activa                = :activa
             WHERE id_tarifa = :id"
        );
        $stmt->bindParam(':id',     $id,           PDO::PARAM_INT);
        $stmt->bindParam(':tipo',   $tipo_pago,    PDO::PARAM_STR);
        $stmt->bindParam(':valor',  $valor);
        $stmt->bindParam(':inicio', $fecha_inicio, PDO::PARAM_STR);
        $stmt->bindParam(':fin',    $fecha_fin,    PDO::PARAM_STR);
        $stmt->bindParam(':activa', $activa,       PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    /**
     * Cambia solo el campo activa (habilitar / deshabilitar).
     */
    public function toggleActiva(int $id, bool $activa): bool {
        $stmt = $this->conn->prepare(
            "UPDATE tarifa SET activa = :activa WHERE id_tarifa = :id"
        );
        $stmt->bindParam(':activa', $activa, PDO::PARAM_BOOL);
        $stmt->bindParam(':id',     $id,     PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Elimina una tarifa por ID.
     * Solo se permite si no tiene liquidaciones asociadas.
     */
    public function eliminar(int $id): bool {
        $stmt = $this->conn->prepare(
            "DELETE FROM tarifa WHERE id_tarifa = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Verifica si una tarifa tiene liquidaciones asociadas.
     */
    public function tieneUso(int $id): bool {
        $stmt = $this->conn->prepare(
            "SELECT COUNT(*) FROM liquidacion WHERE id_tarifa = :id"
        );
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return (int) $stmt->fetchColumn() > 0;
    }
}
?>
