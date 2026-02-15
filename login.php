<?php
// login.php

require_once 'includes/db_connect.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BINANCE DIGITAL</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
    <h2 class="section-title">Login</h2>
    <?php if ($error): ?>
        <p style="color: #ff4d4f;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required class="input-field">
        <input type="password" name="password" placeholder="Password" required class="input-field">
        <button type="submit" class="btn-gold">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register</a></p>
</div>

</body>
</html>
