<?php
$db_host = "localhost";
$db_name = "cginvoice";  // nama database
$db_user = "root";  
$db_pass = "";  

try {
    $dbh = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('pdo connection error: ' . $e->getMessage());
}
?>

