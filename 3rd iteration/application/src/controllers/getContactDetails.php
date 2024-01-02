<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    include_once '../models/Database.php';
    
    $username = $_SESSION['username'];
    
    $db = Database::getInstance()->getConnection();
    
    // Fetch the user's ID based on the username
    $querycontactDetails = "SELECT contactDetails FROM User WHERE username = :username";
    $stmtcontactDetails = $db->prepare($querycontactDetails);
    $stmtcontactDetails->bindParam(':username', $username, PDO::PARAM_STR);
    $stmtcontactDetails->execute();
    $contactDetails = $stmtcontactDetails->fetchColumn();

    echo($contactDetails);
?>