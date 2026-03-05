<?php
session_start();
require_once "config/database.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;
}

$user_id = $_SESSION['user_id'];

/* GET USER DATA */

$stmt = $pdo->prepare("SELECT email,balance,vip_level FROM users WHERE id=?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $user['email'];
$balance = $user['balance'];
$vip = "VIP".$user['vip_level'];

/* TOTAL RECHARGE */

$stmt = $pdo->prepare("SELECT SUM(amount) as total FROM deposits WHERE user_id=? AND status='approved'");
$stmt->execute([$user_id]);
$recharge = $stmt->fetch(PDO::FETCH_ASSOC);

$recharge_amount = $recharge['total'] ?? 0;

?>

<?php include "inc/header.php"; ?>


<div class="mine-container">

<!-- USER INFO -->

<div class="mine-header">

<div class="mine-user">

<h3>Hi, <?php echo htmlspecialchars($email); ?></h3>

<span class="vip-badge">
<?php echo $vip; ?>
</span>

</div>

<div class="mine-usdt">
<img src="assets/images/usdt-gif.gif">
</div>

</div>



<!-- BALANCE BOX -->

<div class="mine-balance">

<div>

<p>Total balance (USDT)</p>
<h2><?php echo number_format($balance,2); ?></h2>

</div>

<div>

<p>Recharge amount (USDT)</p>
<h2><?php echo number_format($recharge_amount,2); ?></h2>

</div>

</div>



<!-- MENU LIST -->

<div class="mine-menu">

<a href="balance.php" class="menu-item">
<i class="fa-solid fa-wallet"></i>
<span>Account</span>
<i class="fa-solid fa-angle-right"></i>
</a>

<a href="recharge.php" class="menu-item">
<i class="fa-solid fa-coins"></i>
<span>Recharge</span>
<i class="fa-solid fa-angle-right"></i>
</a>

<a href="withdraw.php" class="menu-item">
<i class="fa-solid fa-money-bill-wave"></i>
<span>Withdraw</span>
<i class="fa-solid fa-angle-right"></i>
</a>

<a href="financial.php" class="menu-item">
<i class="fa-solid fa-chart-line"></i>
<span>Financial records</span>
<i class="fa-solid fa-angle-right"></i>
</a>

<a href="transfer.php" class="menu-item">
<i class="fa-solid fa-right-left"></i>
<span>Transfer</span>
<i class="fa-solid fa-angle-right"></i>
</a>

<a href="changePwd.php" class="menu-item">
<i class="fa-solid fa-key"></i>
<span>Change Password</span>
<i class="fa-solid fa-angle-right"></i>
</a>

<a href="logout.php" class="menu-item">
<i class="fa-solid fa-right-from-bracket"></i>
<span>Sign out</span>
<i class="fa-solid fa-angle-right"></i>
</a>

</div>

</div>


<?php include "inc/footer.php"; ?>
