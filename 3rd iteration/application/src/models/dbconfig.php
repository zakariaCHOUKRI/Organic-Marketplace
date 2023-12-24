<?php

$db_name='OrganicMarketplace';
$password="";
$user="root";
$host="localhost";
$dsn="mysql:host=$host;port=3306;dbname=$db_name";
$conn=null;

try {
    $conn= new PDO($dsn,$user,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>