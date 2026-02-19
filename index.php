<?php
require_once "includes/db_connect.php";
require_once "includes/auth.php";

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([':id' => $_SESSION['user_id']]);
$user = $stmt->fetch();
?>

<h2>Welcome <?= htmlspecialchars($user['username']) ?></h2>
<p>Balance: $<?= number_format($user['balance'],2) ?></p>
<p>VIP Level: <?= $user['vip_level'] ?></p>

<a href="task.php">Do Task</a><br>
<a href="deposit.php">Deposit</a><br>
<a href="withdraw.php">Withdraw</a><br>
<a href="logout.php">Logout</a>
