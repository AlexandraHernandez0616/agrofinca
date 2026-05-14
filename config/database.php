<?php
/**
 * ============================================================
 * ARCHIVO: config/database.php
 * PROPÓSITO: Configuración y conexión a la base de datos MySQL
 * ============================================================

 * Esta clase es el punto central de conexión a la BD.
 * Todos los controllers la usan haciendo:

 *   require_once __DIR__ . '/../config/database.php';
 *   $db = (new Database())->conectar();

 * Retorna un objeto PDO listo para hacer consultas.
 * ============================================================
 */
class Database {

    // ── Datos de conexión ──────────────────────────────────
    private $host     = "127.0.0.1"; // Servidor MySQL (localhost)
    private $port     = "3306";      // Puerto MySQL por defecto
    private $db_name  = "agrofinca"; // Nombre de la base de datos
    private $username = "root";      // Usuario MySQL
    private $password = "";          // Contraseña MySQL (vacía en local)

    public $conn; // Almacena la conexión PDO activa

    /**
     * Crea y retorna la conexión PDO a MySQL.
     * Usa charset utf8mb4 para soportar tildes y caracteres especiales.
     * Si falla, detiene la ejecución con un mensaje de error.
     *
     * @return PDO
     */
    public function conectar() {

        $this->conn = null;

        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8mb4";

            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Hace que PDO lance excepciones en vez de fallar silenciosamente
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }

        return $this->conn;
    }
}
?>
