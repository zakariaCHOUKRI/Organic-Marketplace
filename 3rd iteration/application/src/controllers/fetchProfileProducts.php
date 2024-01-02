<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once '../models/Database.php';
include_once '../models/UserDAO.php';
include_once '../models/ProductDAO.php';
include_once '../models/LocationDAO.php';

$username = $_SESSION['username'];

$db = Database::getInstance()->getConnection();

$user = new UserDAO();
$prod = new ProductDAO();
$loc = new LocationDAO();

$userId = $user->getIdFromUsername($username);
$userProducts = $prod->fetchUserProducts($userId);

// Loop through user's products and generate HTML
foreach ($userProducts as $product) {

    $productId = $product['productId'];
    $productName = $product['name'];
    $category = $product['category'];
    $locationId = $product['locationId'];

    $locationName = $loc->fetchLocationFromId($locationId);
    $productImages = $prod->getImageURLs($productId);

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
