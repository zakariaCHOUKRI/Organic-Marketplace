<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    include_once '../models/Database.php';
    include_once '../models/UserDAO.php';
    
    $username = $_SESSION['username'];

    $user = new UserDAO();

    $contactDetails = $user->getContactDetails($username);

    echo($contactDetails);
?>