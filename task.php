<?php
require_once "includes/db_connect.php";
require_once "includes/auth.php";

$user_id = $_SESSION['user_id'];

$today = date("Y-m-d");

$stmt = $pdo->prepare("
SELECT COUNT(*) FROM task_logs 
WHERE user_id = :id AND DATE(created_at) = :today
");
$stmt->execute([':id'=>$user_id, ':today'=>$today]);
$count = $stmt->fetchColumn();

$stmt = $pdo->prepare("
SELECT daily_tasks,daily_profit 
FROM vip_levels 
WHERE id = (SELECT vip_level FROM users WHERE id = :id)
");
$stmt->execute([':id'=>$user_id]);
$vip = $stmt->fetch();

if ($count < $vip['daily_tasks']) {

    $pdo->prepare("INSERT INTO task_logs (user_id,profit) VALUES (:id,:profit)")
        ->execute([':id'=>$user_id, ':profit'=>$vip['daily_profit']]);

    $pdo->prepare("
        UPDATE users 
        SET balance = balance + :profit,
            total_earnings = total_earnings + :profit
        WHERE id = :id
    ")->execute([':profit'=>$vip['daily_profit'], ':id'=>$user_id]);

    echo "Task completed!";
} else {
    echo "Daily limit reached.";
}
?>
