<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    if (isset($_SESSION["username"])) {
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
    <link rel="stylesheet" href="css/login_style.css">
    <script src="js/login_script.js"></script>
    <?php include_once 'head.php' ?>
</head>
<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
            <img src="../../assets/img/logo.png" alt="Transparent Image" style="position: fixed; top: 90%; left: 50%; transform: translate(-50%, -50%); width: 500px; height: auto; z-index: -1;">
            <div class="signup">
                <form action="../controllers/RegisterController.php" method="post">
                    <label for="chk" aria-hidden="true">Register</label>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="tel" name="phoneNumber" placeholder="Phone Number" required>
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
        <?php include_once '../controllers/LoginError.php' ?>
    </div>
</body>
</html>