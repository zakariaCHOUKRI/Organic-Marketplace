<?php
include_once("../controllers/redirect.php");
include_once '../models/Database.php';

if (!isset($_SESSION)) {
    session_start();
}

$db = Database::getInstance()->getConnection();

// Get the productId from the URL
$productId = isset($_GET['productId']) ? intval($_GET['productId']) : 0;

// Retrieve the product information from the database
$stmt = $db->prepare("SELECT * FROM Product WHERE productId = ?");
$stmt->execute([$productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the product exists
if (!$product) {
    // Handle the case where the product is not found
    // Redirect or show an error message
    // Example: header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<!-- SITE TITTLE -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Ad</title>
	
	<!-- PLUGINS CSS STYLE -->
	<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- Owl Carousel -->
	<link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
	<link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
	<!-- Fancy Box -->
	<link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
	<link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="plugins/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css" rel="stylesheet">
	<!-- CUSTOM CSS -->
	<link href="css/style.css" rel="stylesheet">

	<!-- FAVICON -->
	<link href="img/favicon.png" rel="shortcut icon">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body class="body-wrapper">

<?php include_once 'navbar.php' ?>

<section class="create-ad-area vegetables-bg text-center">
	<div class="container mt-5 create-ad-container">
		<div class="row">
			<div class="col-md-12">
				<h2>Edit Ad</h2>
				<form action="../controllers/editAdController.php" method="POST">
					<!-- Product Information -->
					<input type="hidden" name="productId" value="<?php echo $productId; ?>">
					<div class="form-group">
						<label for="name">Product Name:</label>
						<input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
					</div>
					<div class="form-group">
						<label for="description">Product Description:</label>
						<textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="price">Price:</label>
						<input type="text" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
					</div>
					<div class="form-group">
						<label for="category">Choose Category:</label>
						<select class="form-control" id="category" name="category" required>
							<?php
								include_once('../controllers/GetCategories.php');
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="location">Choose Location:</label>
						<select class="form-control" id="location" name="locationId" required>
							<?php
								include_once('../controllers/GetLocations.php');
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="imageLinks">Image Links (comma-separated):</label>
						<input type="text" class="form-control" id="imageLinks" name="imageLinks" value="<?php echo isset($product['imageLinks']) ? $product['imageLinks'] : ''; ?>" required>
					</div>
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</section>

	<!-- JAVASCRIPTS -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="plugins/tether/js/tether.min.js"></script>
	<script src="plugins/raty/jquery.raty-fa.js"></script>
	<script src="plugins/bootstrap/dist/js/popper.min.js"></script>
	<script src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="plugins/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
	<script src="plugins/slick-carousel/slick/slick.min.js"></script>
	<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
	<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
	<script src="js/scripts.js"></script>

	<script>
		$(document).ready(function(){
			$("#productCarousel").carousel();
		});
	</script>

</body>

</html>
