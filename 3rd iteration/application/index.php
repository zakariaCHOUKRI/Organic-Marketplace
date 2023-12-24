<?php

if(!isset($_SESSION['username'])) {
    header('Location: ./src/views/home.php');
} else {
    require_once './src/models/User.php';
    require_once './src/controllers/LoginController.php';
    require_once './src/models/dbconfig.php';

    $userModel = new User($conn);
    $loginController = new LoginController($userModel);
    try {
        $loginController->login();
    }
    catch(Exception $e) {
        echo $e->getMessage();
    }
}

?>