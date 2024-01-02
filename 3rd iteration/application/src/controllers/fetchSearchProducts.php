<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once '../models/Database.php';
include_once '../models/ProductDAO.php';

$search = isset($_POST['search']) ? $_POST['search'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';

$product = new ProductDAO();

$searchResults = $product->fetchSearchProducts($search, $location, $category);

foreach ($searchResults as $result) {
    echo '<div class="col-sm-12 col-lg-4 col-md-6">';
    echo '<div class="product-item bg-light">';
    echo '<div class="card">';
    echo '<div class="thumb-content">';
    echo '<a href="/src/views/adpage.php?productId='.$result["productId"].'">';
    echo '<img class="card-img-top img-fluid product-image" src="' . $result['imageUrl'] . '" alt="Product Image">';
    echo '</a>';
    echo '</div>';
    echo '<div class="card-body">';
    echo '<h4 class="card-title"><a href="/src/views/adpage.php?productId='.$result["productId"].'">' . $result['name'] . '</a></h4>';
    echo '<ul class="list-inline product-meta">';
    echo '<li class="list-inline-item">';
    echo '<a href="/src/views/adpage.php?productId='.$result["productId"].'"><i class="fa fa-folder"></i>' . $result['category'] . '</a>';
    echo '</li>';
    echo '<li class="list-inline-item">';
    echo '<a href="/src/views/adpage.php?productId='.$result["productId"].'"><i class="fa fa-money"></i>' . $result['price'] . '</a>';
    echo '</li>';
    echo '<li class="list-inline-item">';
    echo '<a href="/src/views/adpage.php?productId='.$result["productId"].'"><i class="fa fa-location-arrow"></i>' . $result['locationName'] . '</a>';
    echo '</li>';
    echo '</ul>';
    echo '<p class="card-text">' . $result['description'] . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

if (empty($searchResults)) {
    echo '<p style="color: white; font-size:24px">No results found.</p>';
}
?>
