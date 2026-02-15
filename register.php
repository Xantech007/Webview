<?php
// register.php

require_once 'includes/db_connect.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if ($stmt->fetch()) {
        $error = "Email or username taken.";
    } else {
        $hash = password_hash($password, PASSWORD_ARGON2ID);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
        if ($stmt->execute([$username, $email, $hash])) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Registration failed.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BINANCE DIGITAL</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <h2 class="section-title">Register</h2>
    <?php if ($error): ?>
        <p style="color: #ff4d4f;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required class="input-field">
        <input type="email" name="email" placeholder="Email" required class="input-field">
        <input type="password" name="password" placeholder="Password" required class="input-field">
        <button type="submit" class="btn-gold">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>
