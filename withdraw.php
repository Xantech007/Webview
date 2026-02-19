<?php
require_once "includes/db_connect.php";
require_once "includes/auth.php";

$user_id = $_SESSION['user_id'];

if ($_POST) {

    $amount = floatval($_POST['amount']);

    $stmt = $pdo->prepare("SELECT balance FROM users WHERE id=:id");
    $stmt->execute([':id'=>$user_id]);
    $balance = $stmt->fetchColumn();

    if ($amount > 0 && $amount <= $balance) {

        $pdo->prepare("INSERT INTO withdrawals (user_id,amount) VALUES (:id,:amount)")
            ->execute([':id'=>$user_id, ':amount'=>$amount]);

        $pdo->prepare("UPDATE users SET balance=balance-:amount WHERE id=:id")
            ->execute([':amount'=>$amount, ':id'=>$user_id]);

        echo "Withdrawal submitted.";
    } else {
        echo "Invalid amount.";
    }
}
?>

<form method="POST">
<input name="amount">
<button>Withdraw</button>
</form>
