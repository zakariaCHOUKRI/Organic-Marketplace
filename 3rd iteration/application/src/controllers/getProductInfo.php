<?php

if (!isset($_SESSION)) {
	session_start();
}

include_once '../models/Database.php';


$db = Database::getInstance()->getConnection();


if (!isset($_GET['productId'])) {
   header('Location: redirect.php');
}

$productId = $_GET['productId'];

// Query to fetch product information
$productQuery = "SELECT p.*, u.contactDetails 
				 FROM Product p
				 JOIN User u ON p.userId = u.userId
				 WHERE p.productId = :productId";

$productStmt = $db->prepare($productQuery);
$productStmt->bindValue(':productId', $productId, PDO::PARAM_INT);
$productStmt->execute();
$productInfo = $productStmt->fetch(PDO::FETCH_ASSOC);

// Query to fetch product images
$imagesQuery = "SELECT * FROM ProductImages WHERE productId = :productId";
$imagesStmt = $db->prepare($imagesQuery);
$imagesStmt->bindValue(':productId', $productId, PDO::PARAM_INT);
$imagesStmt->execute();
$productImages = $imagesStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row d-flex flex-column">
	<div class="col-md-12">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php foreach ($productImages as $index => $image): ?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $index; ?>" class="<?php echo ($index === 0) ? 'active' : ''; ?>"></li>
				<?php endforeach; ?>
			</ol>
			<div class="carousel-inner">
				<?php foreach ($productImages as $index => $image): ?>
					<div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
						<img height="500px" width="auto" class="d-block w-100" src="<?php echo $image['imageUrl']; ?>" alt="Product Image <?php echo $index + 1; ?>">
					</div>
				<?php endforeach; ?>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<div class="col-md-12">
		<h2><?php echo $productInfo['name']; ?></h2>
		<p>Price: $<?php echo $productInfo['price']; ?></p>
		<p>Category: <?php echo $productInfo['category']; ?></p>
		<p>Contact Details: <?php echo $productInfo['contactDetails']; ?></p>
		<p>Description: <?php echo $productInfo['description']; ?></p>
	</div>
</div>
