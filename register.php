<?php
require_once "includes/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $referral_code = substr(md5(uniqid()),0,8);

    $stmt = $pdo->prepare("
        INSERT INTO users (username,email,password,referral_code)
        VALUES (:username,:email,:password,:ref)
    ");

    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        ':ref' => $referral_code
    ]);

    header("Location: login.php");
    exit();
}
?>

<form method="POST">
<input name="username" required placeholder="Username">
<input name="email" type="email" required>
<input name="password" type="password" required>
<button>Register</button>
</form>
