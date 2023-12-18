<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	if (isset($_SESSION["role"])) {
		include_once '../controllers/redirect.php';
	  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login / Register</title>
	<link rel="stylesheet" href="../../assets/login_style.css">
	<script src="../../assets/login_script.js"></script>
	<?php include 'head.html' ?>
</head>
<body>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">
			<img src="../../assets/img/bg.jpg" alt="Transparent Image" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 500px; height: auto; z-index: -1;">
			<div class="signup">
				<form action="../controllers/RegistrationController.php" method="post">
					<label for="chk" aria-hidden="true">Register</label>
					<input type="email" name="email" placeholder="Email" required>
					<input type="text" name="username" placeholder="Username" required>
					<input type="password" name="password" placeholder="Password" required>
					<select id="role" name="role" required>
						<option selected disabled value="">--- Choose a role ---</option>
						<option value="sales">Sales</option>
						<option value="logistics">Logistics</option>
						<option value="adv">Adv</option>
						<option value="admin">Admin</option>
					  </select>
					<button>Register</button>
				</form>
			</div>

			<div class="login">
				<form action="../controllers/LoginController.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required>
					<input type="password" name="password" placeholder="Password" required>
					<button>Login</button>
				</form>
			</div>
	</div>
	<style>
		.erreur {
			position: fixed;
			top: 150px;
		}
	</style>
	<div class="erreur">
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == 0)
				{
					echo '<div id="error-popup">Incorrect email or password. Please try again.<button id="close-btn">Close</button></div>';
				} else if ($_GET['error'] == 1)
				{
					echo '<div id="error-popup">Email or username already used. Please try again.<button id="close-btn">Close</button></div>';
				}
			}
		?>
	</div>
</body>
</html>