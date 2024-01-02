<?php
	if (!isset($_SESSION)) {
		session_start();
	}
?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg  navigation">
					<a class="navbar-brand" href="home.php">
						<img src="images/logo.png" alt="logo" height=50px>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="home.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="profile.php">My ads</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">About us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Help</a>
							</li>
							<!--
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pages <span><i class="fa fa-angle-down"></i></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="category.html">Category</a>
									<a class="dropdown-item" href="single.html">Single Page</a>
									<a class="dropdown-item" href="store-single.html">Store Single</a>
									<a class="dropdown-item" href="dashboard.html">Dashboard</a>
									<a class="dropdown-item" href="user-profile.html">User Profile</a>
									<a class="dropdown-item" href="submit-coupon.html">Submit Coupon</a>
									<a class="dropdown-item" href="blog.html">Blog</a>
									<a class="dropdown-item" href="single-blog.html">Single Post</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Listing <span><i class="fa fa-angle-down"></i></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
								-->
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<?php
									if (!isset($_SESSION['username'])) {
										echo '<a class="nav-link login-button" href="login.php">Login/Register</a>';
									} else {
										echo '<a class="nav-link login-button" href="../controllers/logout.php">Logout</a>';
									}
								?>
							</li>
							<li class="nav-item">
								<a class="nav-link add-button" href="./createad.php"><i class="fa fa-plus-circle"></i> Post an ad</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>