<?php
    class ConnectionDB {
        private static $instance = null;
        private $conn;
    
        private $host = 'localhost';
        private $dbname = 'olakehace';
        private $username = 'teo';
        private $password = 'i-am-root';
        private $charset = 'utf8mb4';
    
        private function __construct() {
            try {
                // Cambiar el DSN a MySQL
                $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
                $this->conn = new PDO($dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error en la conexión: " . $e->getMessage();
            }
        }
    
        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new ConnectionDB();
            }
            return self::$instance;
        }
    
        public function getConnection() {
            return $this->conn;
        }
    }
?>