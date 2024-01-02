<!DOCTYPE html>
<html lang="en">
<head>

	<!-- SITE TITTLE -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Organic Marketplace</title>
	
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

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area vegetables-bg text-center">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12 pad-90">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Organic Marketplace</h1>
					<p>The freshest organic products from all around Morocco right at your fingertips!</p>
					
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
					<form action="search.php" method="POST">
						<div class="row">
							<!-- Store Search -->
							<div class="col-lg-12 col-md-12">
								<div class="block d-flex">
									<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="search" id="search" placeholder="What are you looking for ?">
									<select class="form-control mb-2 mr-sm-2 mb-sm-0" name="category">
										<option selected value="23102003">Choose a category</option>
										<?php
											include_once('../controllers/GetCategories.php');
										?>
									</select>
									<select class="form-control mb-2 mr-sm-2 mb-sm-0" name="location">
										<option selected value="23102003">All Morocco</option>
										<?php
											include_once('../controllers/GetLocations.php');
										?>
									</select>
									<button class="btn btn-main">SEARCH</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
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

</body>

</html>



