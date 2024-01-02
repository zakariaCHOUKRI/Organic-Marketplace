<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once '../models/Database.php';

$db = Database::getInstance()->getConnection();

// Retrieve product ID from the URL parameters
$productId = isset($_GET['productId']) ? intval($_GET['productId']) : 0;

// Retrieve the userId from the session based on the username
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Handle the case where the user is not logged in
    // Redirect or show an error message
    // Example: header("Location: login.php");
    exit();
}

// Retrieve the userId from the User table based on the username
$stmt = $db->prepare("SELECT userId FROM User WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    // Handle the case where the user is not found
    // Redirect or show an error message
    // Example: header("Location: login.php");
    exit();
}

$userId = $user['userId'];

// Delete data from the database
try {
    // Delete from the Product table
    $stmt = $db->prepare("DELETE FROM Product WHERE productId = ? AND userId = ?");
    $stmt->execute([$productId, $userId]);

    // Delete from the ProductImages table
    $stmt = $db->prepare("DELETE FROM ProductImages WHERE productId = ?");
    $stmt->execute([$productId]);

    // Close the database connection
    $db = null;

    // Redirect to a success page or do further processing
    header("Location: ../views/home.php");
    exit();
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
    exit();
}
?>
