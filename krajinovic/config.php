<?php
$host = 'localhost';
$db = 'padel';
$user = 'root';  
$pass = '';      

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Konekcija nije uspjela: " . $e->getMessage());
}
?>