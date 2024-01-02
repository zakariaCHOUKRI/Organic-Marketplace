<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once '../models/Database.php';

$db = Database::getInstance()->getConnection();

$search = isset($_POST['search']) ? $_POST['search'] : '';
$location = isset($_POST['location']) ? $_POST['location'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : '';

if ($location == '23102003') {
    $locationFilter = '';
} else {
    $locationFilter = ' AND l.locationId = :location';
}

if ($category == '23102003') {
    $categoryFilter = '';
} else {
    $categoryFilter = ' AND p.category = :category';
}

$query = "SELECT
        p.productId,
        p.name,
        p.description,
        p.price,
        p.category,
        l.name AS locationName,
        pi.imageUrl
    FROM Product p
    JOIN Location l ON p.locationId = l.locationId
    LEFT JOIN (
        SELECT productId, MIN(imageUrl) AS imageUrl
        FROM ProductImages
        GROUP BY productId
    ) pi ON p.productId = pi.productId
    WHERE 
        (p.name LIKE :search OR p.description LIKE :search)" . $locationFilter . $categoryFilter;

$stmt = $db->prepare($query);
$stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);

if ($location != '23102003') {
    $stmt->bindValue(':location', $location, PDO::PARAM_INT);
}

if ($category != '23102003') {
    $stmt->bindValue(':category', $category, PDO::PARAM_STR);
}

$stmt->execute();
$searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
