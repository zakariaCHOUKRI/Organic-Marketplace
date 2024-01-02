<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once '../models/Database.php';
include_once '../models/ProductDAO.php';
include_once '../models/UserDAO.php';


$us = new UserDAO();
$prod = new ProductDAO();

// Retrieve product ID from the URL parameters
$productId = isset($_GET['productId']) ? intval($_GET['productId']) : 0;

// Retrieve the userId from the session based on the username
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

$user = $us->getUserObject($username);

$userId = $user['userId'];

try {

    $prod->delete($productId, $userId);
    $prod->deleteImages($productId);

    header("Location: ../views/home.php");
    exit();
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
    exit();
}
?>
