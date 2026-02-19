<?php
require_once "includes/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $_POST['email']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid login.";
    }
}
?>

<form method="POST">
<input name="email" type="email">
<input name="password" type="password">
<button>Login</button>
</form>
