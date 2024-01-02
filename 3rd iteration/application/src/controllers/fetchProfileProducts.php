<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once '../models/Database.php';

$username = $_SESSION['username'];

$db = Database::getInstance()->getConnection();

// Fetch the user's ID based on the username
$queryUserId = "SELECT userId FROM User WHERE username = :username";
$stmtUserId = $db->prepare($queryUserId);
$stmtUserId->bindParam(':username', $username, PDO::PARAM_STR);
$stmtUserId->execute();
$userId = $stmtUserId->fetchColumn();

// Fetch the user's products
$queryProducts = "SELECT * FROM Product WHERE userId = :userId";
$stmtProducts = $db->prepare($queryProducts);
$stmtProducts->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmtProducts->execute();
$userProducts = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);

// Loop through user's products and generate HTML
foreach ($userProducts as $product) {

    $productId = $product['productId'];
    $productName = $product['name'];
    $category = $product['category'];
    $locationId = $product['locationId'];

    // Fetch the location name based on the location ID
    $queryLocation = "SELECT name FROM Location WHERE locationId = :locationId";
    $stmtLocation = $db->prepare($queryLocation);
    $stmtLocation->bindParam(':locationId', $locationId, PDO::PARAM_INT);
    $stmtLocation->execute();
    $locationName = $stmtLocation->fetchColumn();

    // Assuming you have another table to store product images named ProductImages
    $queryProductImages = "SELECT imageUrl FROM ProductImages WHERE productId = :productId";
    $stmtProductImages = $db->prepare($queryProductImages);
    $stmtProductImages->bindParam(':productId', $productId, PDO::PARAM_INT);
    $stmtProductImages->execute();
    $productImages = $stmtProductImages->fetchAll(PDO::FETCH_COLUMN);

    // Generate HTML for each product
    echo '<tr>';
    echo '<td class="product-thumb">';
    echo '<img width="80px" height="auto" src="' . $productImages[0] . '" alt="Product Image"></td>';
    echo '<td class="product-details">';
    echo '<h3 class="title">' . $productName . '</h3>';
    echo '<span class="add-id"><strong>Ad ID:</strong> ' . $productId . '</span>'; // Change 'adId' to 'productId'
    echo '<span class="location"><strong>Location:</strong> ' . $locationName . '</span>';
    echo '</td>';
    echo '<td class="product-category"><span class="categories">' . $category . '</span></td>';
    echo '<td class="action" data-title="Action">';
    echo '<div class="">';
    echo '<ul class="list-inline justify-content-center">';
    echo '<li class="list-inline-item">';
    echo '<a data-toggle="tooltip" data-placement="top" title="View" class="view" href="../views/adpage.php?productId='.$productId.'">';
    echo '<i class="fa fa-eye"></i>';
    echo '</a>';
    echo '</li>';
    echo '<li class="list-inline-item">';
    echo '<a class="edit" href="../views/editad.php?productId='.$productId.'">';
    echo '<i class="fa fa-pencil"></i>';
    echo '</a>';
    echo '</li>';
    echo '<li class="list-inline-item">';
    echo '<a class="delete" href="../controllers/deleteAdController.php?productId='.$productId.'">';
    echo '<i class="fa fa-trash"></i>';
    echo '</a>';
    echo '</li>';
    echo '</ul>';
    echo '</div>';
    echo '</td>';
    echo '</tr>';
}
?>
