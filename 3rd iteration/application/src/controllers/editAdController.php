<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once '../models/Database.php';

$db = Database::getInstance()->getConnection();

// Retrieve form data
$name = isset($_POST['name']) ? $_POST['name'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
$category = isset($_POST['category']) ? $_POST['category'] : '';
$locationId = isset($_POST['locationId']) ? intval($_POST['locationId']) : 0;
$imageLinks = isset($_POST['imageLinks']) ? $_POST['imageLinks'] : '';
$productId = isset($_POST['productId']) ? intval($_POST['productId']) : 0;

// Split the comma-separated string into an array
$imageLinksArray = explode(',', $imageLinks);

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

// Update data in the database
try {
    // Update the Product table
    $stmt = $db->prepare("UPDATE Product SET name = ?, description = ?, price = ?, category = ?, userId = ?, locationId = ? WHERE productId = ?");
    $stmt->execute([$name, $description, $price, $category, $userId, $locationId, $productId]);

    // Delete existing records in the ProductImages table for the product
    $stmt = $db->prepare("DELETE FROM ProductImages WHERE productId = ?");
    $stmt->execute([$productId]);

    // Insert new records into the ProductImages table
    $stmt = $db->prepare("INSERT INTO ProductImages (productId, imageUrl) VALUES (?, ?)");
    foreach ($imageLinksArray as $imageLink) {
        $stmt->execute([$productId, $imageLink]);
    }

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
