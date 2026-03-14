<?php
session_start();
require_once "config/database.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;
}

$user_id = $_SESSION['user_id'];

/* ================= USER BALANCE ================= */

$stmt = $pdo->prepare("SELECT balance FROM users WHERE id=?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$balance = $user['balance'] ?? 0;


/* ================= TOTAL DEPOSIT ================= */

$stmt = $pdo->prepare("
SELECT 
SUM(paid_amount) as total_deposit,
COUNT(*) as deposit_count
FROM deposits
WHERE user_id=? AND status=1
");

$stmt->execute([$user_id]);
$deposit_data = $stmt->fetch(PDO::FETCH_ASSOC);

$total_deposit = $deposit_data['total_deposit'] ?? 0;
$deposit_count = $deposit_data['deposit_count'] ?? 0;


/* ================= TOTAL WITHDRAW ================= */

$stmt = $pdo->prepare("
SELECT 
SUM(amount) as total_withdraw,
COUNT(*) as withdraw_count
FROM withdrawals
WHERE user_id=? AND status=1
");

$stmt->execute([$user_id]);
$withdraw_data = $stmt->fetch(PDO::FETCH_ASSOC);

$total_withdraw = $withdraw_data['total_withdraw'] ?? 0;
$withdraw_count = $withdraw_data['withdraw_count'] ?? 0;


/* ================= LAST DEPOSIT ================= */

$stmt = $pdo->prepare("
SELECT paid_amount, created_at
FROM deposits
WHERE user_id=? AND status=1
ORDER BY id DESC
LIMIT 1
");

$stmt->execute([$user_id]);
$last_deposit = $stmt->fetch(PDO::FETCH_ASSOC);

$last_deposit_amount = $last_deposit['paid_amount'] ?? 0;
$last_deposit_date = $last_deposit['created_at'] ?? "-";


/* ================= LAST WITHDRAW ================= */

$stmt = $pdo->prepare("
SELECT amount, created_at
FROM withdrawals
WHERE user_id=? AND status=1
ORDER BY id DESC
LIMIT 1
");

$stmt->execute([$user_id]);
$last_withdraw = $stmt->fetch(PDO::FETCH_ASSOC);

$last_withdraw_amount = $last_withdraw['amount'] ?? 0;
$last_withdraw_date = $last_withdraw['created_at'] ?? "-";

?>

<?php include "inc/header.php"; ?>


<div class="balance-header">

<a href="#" onclick="goBack()">
<i class="fa fa-arrow-left"></i>
</a>

</div>


<div class="balance-container">

<div class="balance-card">

<div class="balance-left">

<div class="balance-item">

<p>Total Deposit</p>

<h3>
<?php echo number_format($total_deposit,2); ?>
<span>USD</span>
</h3>

</div>


<div class="balance-item">

<p>Total Withdrawal</p>

<h3>
<?php echo number_format($total_withdraw,2); ?>
<span>USD</span>
</h3>

</div>

</div>


<div class="balance-right">

<img src="assets/images/bag.png">

</div>

</div>


<!-- ================= DETAILED STATS ================= -->

<div class="balance-card" style="margin-top:20px;">

<div class="balance-left">

<div class="balance-item">

<p>Current Balance</p>

<h3>
<?php echo number_format($balance,2); ?>
<span>USD</span>
</h3>

</div>

<div class="balance-item">

<p>Total Deposits Made</p>

<h3>
<?php echo $deposit_count; ?>
</h3>

</div>

<div class="balance-item">

<p>Total Withdrawals Made</p>

<h3>
<?php echo $withdraw_count; ?>
</h3>

</div>

</div>

</div>


<!-- ================= LAST TRANSACTIONS ================= -->

<div class="balance-card" style="margin-top:20px;">

<div class="balance-left">

<div class="balance-item">

<p>Last Deposit</p>

<h3>
<?php echo number_format($last_deposit_amount,2); ?>
<span>USD</span>
</h3>

<small><?php echo $last_deposit_date; ?></small>

</div>

<div class="balance-item">

<p>Last Withdrawal</p>

<h3>
<?php echo number_format($last_withdraw_amount,2); ?>
<span>USD</span>
</h3>

<small><?php echo $last_withdraw_date; ?></small>

</div>

</div>

</div>

</div>



<?php include "inc/footer.php"; ?>


<script>

function goBack(){

if(document.referrer){
window.history.back();
}else{
window.location.href="index.php";
}

}

</script>
