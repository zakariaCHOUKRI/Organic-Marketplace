<?php

require '../models/dbconfig.php';
require '../models/User.php';

$user= new User($conn);
$_SESSION["id"] = $user->getUsernameFromId($_SESSION["userId"]);

?>