<?php

$host = "sql304.infinityfree.com";
$db   = "if0_41120839_webcl";
$user = "if0_41120839";
$pass = "v6OWzaMSbz";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    die("Database connection failed: " . $e->getMessage());

}

?>
