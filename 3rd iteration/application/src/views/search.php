<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search</title>
  
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

<!-- Advance Search -->
<div class="advance-search2">
	<form action="search.php" method="POST">
		<div class="row">
			<!-- Store Search -->
			<div class="col-lg-12 col-md-12">
				<div class="block d-flex">
					<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="search" id="search" placeholder="What are you looking for ?">
					<select class="form-control mb-2 mr-sm-2 mb-sm-0" name="category">
						<option selected disabled>Choose a category</option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<select class="form-control mb-2 mr-sm-2 mb-sm-0" name="location">
						<option selected value="0">All Morocco</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<button class="btn btn-main">SEARCH</button>
				</div>
			</div>
		</div>
	</form>
</div>

<section class="section-sm vegetables-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray" style="border-radius: 14px;">
					<h2>Results For "Electronics"</h2>
					<p>123 Results on 12 December, 2017</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="category-search-filter" style="border-radius: 14px;">
					<div class="row">
						<div class="col-md-6">
							<strong>Short</strong>
							<select>
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
						<div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="javascript:void(0);"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30">
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-2.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">Study Table Combo</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-3.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-2.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">Study Table Combo</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-3.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-1.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-2.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">Study Table Combo</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Furnitures</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<!-- <div class="price">$200</div> -->
			<a href="">
				<img class="card-img-top img-fluid" src="images/products/products-3.jpg" alt="Card image cap">
			</a>
		</div>
		<div class="card-body">
			<h4 class="card-title"><a href="">11inch Macbook Air</a></h4>
			<ul class="list-inline product-meta">
				<li class="list-inline-item">
					<a href=""><i class="fa fa-folder-open-o"></i>Electronics</a>
				</li>
				<li class="list-inline-item">
					<a href=""><i class="fa fa-calendar"></i>26th December</a>
				</li>
			</ul>
			<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
			<div class="product-ratings">
				<ul class="list-inline">
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
					<li class="list-inline-item"><i class="fa fa-star"></i></li>
				</ul>
			</div>
		</div>
	</div>
</div>



						</div>
					</div>
				</div>
				
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

</body>

</html>