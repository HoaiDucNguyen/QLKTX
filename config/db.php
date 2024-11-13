<?php

// db.php
$host = 'localhost';
$db = 'qlktx';
$user = 'root';
<<<<<<< HEAD
$pass = '322003';
=======
$pass = 'hao123';


>>>>>>> 32695277d9b3017808e2706b2077a8c29ad3bd01


try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}