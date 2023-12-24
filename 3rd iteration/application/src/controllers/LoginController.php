<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once('../models/UserModel.php');

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = UserModel::getInstance();
    }

    public function loginUser($username, $password) {
        // Implement validation if needed

        $user = $this->userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['userId'];
            $_SESSION['username'] = $user['username'];
            echo "Login successful!";
        } else {
            // Login failed
            http_response_code(401); // Unauthorized
            echo "Login failed. Please check your username and password.";
        }
    }
}

// Retrieve data from the POST request
$username = $_POST['username'];
$password = $_POST['password'];

try {
    $loginController = new LoginController();
    $loginController->loginUser($username, $password);
} catch (Exception $e) {
    // Send an error response to the frontend
    http_response_code(500); // Internal Server Error
    echo "Login failed: " . $e->getMessage();
}
?>
