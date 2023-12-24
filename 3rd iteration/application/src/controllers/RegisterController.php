<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once('../models/UserModel.php');

class RegisterController {
    private $userModel;

    public function __construct() {
        $this->userModel = UserModel::getInstance();
    }

    public function registerUser($username, $password, $email, $contactDetails) {
        // Implement validation if needed

        $this->userModel->createAccount($username, $password, $email, $contactDetails);
    }
}

// Retrieve data from the POST request
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$contactDetails = $_POST['phoneNumber'];

try {

    $regController = new RegisterController();
    $regController->registerUser($username, $password, $email, $contactDetails);

    $_SESSION["username"] = $username;
    header('Location: ../views/home.php');

} catch (Exception $e) {
    // Send an error response to the frontend
    http_response_code(500); // Internal Server Error
    echo "Registration failed: " . $e->getMessage();
}

?>