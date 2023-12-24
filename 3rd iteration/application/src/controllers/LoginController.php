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
        $this->userModel->login($username, $password);
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
