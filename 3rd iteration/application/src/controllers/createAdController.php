<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once '../models/Database.php';
include_once '../models/UserDAO.php';
include_once '../models/ProductDAO.php';

$us = new UserDAO();
$prod = new ProductDAO();

// Retrieve form data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
$category = isset($_POST['category']) ? $_POST['category'] : '';
$locationId = isset($_POST['locationId']) ? intval($_POST['locationId']) : 0;
$imageLinks = isset($_POST['imageLinks']) ? $_POST['imageLinks'] : '';

// Split the comma-separated string into an array
$imageLinksArray = explode(',', $imageLinks);

// Retrieve the userId from the session based on the username
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

$user = $us->getUserObject($username);

$userId = $user['userId'];

// Insert data into the database
try {
    $prod->handleCreation($name, $description, $price, $category, $userId, $locationId, $imageLinksArray);

    header("Location: ../views/home.php");
    exit();
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
    exit();
}
?>
