<?php

// This class uses the singleton design pattern
class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $db_name = 'OrganicMarketplace';
        $password = '';
        $user = 'root';
        $host = 'localhost';
        $dsn = "mysql:host=$host;port=3306;dbname=$db_name";

        try {
            $this->conn = new PDO($dsn, $user, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>