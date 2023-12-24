<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once('Database.php');

// This class uses the sigleton design pattern
class UserModel {
    private $db;
    private static $instance = null;

    private function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function createAccount($username, $password, $email, $contactDetails) {
        // Validate input parameters
        if (empty($username) || empty($password) || empty($email) || empty($contactDetails)) {
            // Handle validation error (throw exception, return error message, etc.)
            throw new Exception("All fields are required");
        }
    
        // Sanitize input parameters
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $contactDetails = filter_var($contactDetails, FILTER_SANITIZE_STRING);
    
        try {
            // Check if the username or email already exists in the database
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM User WHERE username = ? OR email = ?");
            $stmt->execute([$username, $email]);
            $count = $stmt->fetchColumn();
    
            if ($count > 0) {
                // Username or email already exists, redirect to a page of your choice
                header("Location: ../views/login.php?error=1");
                exit();
            }
    
            // Use PDO prepared statement to insert user data into the database
            $stmt = $this->db->prepare("INSERT INTO User (username, password, email, contactDetails) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $password, $email, $contactDetails]);
        } catch (PDOException $e) {
            // Handle database error (throw exception, log error, etc.)
            throw new Exception("Error creating user account: " . $e->getMessage());
        }
    }

    public function login($username, $password) {
        if (empty($username) || empty($password)) {
            // Handle validation error (throw exception, return error message, etc.)
            throw new Exception("All fields are required");
        }
    
        // Sanitize input parameters
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
    
        try {
            // Use PDO prepared statement to retrieve user data from the database
            $stmt = $this->db->prepare("SELECT * FROM User WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION["username"] = $username;
                header('Location: ../views/home.php');
                return true;
            } else {
                header("Location: ../views/login.php?error=0");
                return false;
            }
        } catch (PDOException $e) {
            // Handle database error (throw exception, log error, etc.)
            throw new Exception("Error during login: " . $e->getMessage());
        }
    }

}
?>