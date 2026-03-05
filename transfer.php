<?php
session_start();
require_once "config/database.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;
}

$user_id = $_SESSION['user_id'];

/* GET USER DATA */

$stmt = $pdo->prepare("
SELECT balance,withdrawal_balance,password
FROM users
WHERE id=?
");

$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$basic = $user['balance'];
$withdraw = $user['withdrawal_balance'];

$msg="";

if($_SERVER['REQUEST_METHOD']=="POST"){

$amount=floatval($_POST['amount']);
$password=$_POST['password'];
$direction=$_POST['direction'];

/* PASSWORD CHECK */

if(!password_verify($password,$user['password'])){

$msg="Incorrect password";

}elseif($amount<=0){

$msg="Invalid amount";

}else{

if($direction=="basic_to_withdraw"){

if($amount>$basic){

$msg="Insufficient Basic balance";

}else{

$pdo->prepare("
UPDATE users
SET balance=balance-?,
withdrawal_balance=withdrawal_balance+?
WHERE id=?
")->execute([$amount,$amount,$user_id]);

$_SESSION['transfer_msg']="Transferred to Withdrawal account";

header("Location: transfer.php");
exit;

}

}else{

if($amount>$withdraw){

$msg="Insufficient Withdrawal balance";

}else{

$pdo->prepare("
UPDATE users
SET withdrawal_balance=withdrawal_balance-?,
balance=balance+?
WHERE id=?
")->execute([$amount,$amount,$user_id]);

$_SESSION['transfer_msg']="Transferred to Basic account";

header("Location: transfer.php");
exit;

}

}

}

}
?>

<?php include "inc/header.php"; ?>


<div class="transfer-header">

<a onclick="goBack()">
<i class="fa fa-arrow-left"></i>
</a>

<span>Transfer</span>

</div>


<?php if(isset($_SESSION['transfer_msg'])): ?>

<div class="transfer-success">
<?php
echo $_SESSION['transfer_msg'];
unset($_SESSION['transfer_msg']);
?>
</div>

<?php endif; ?>


<div class="transfer-wrapper">


<!-- BALANCE PANEL -->

<div class="transfer-balance">

<div class="transfer-box" id="withdrawBox">

<p>Withdrawal account</p>
<h3 id="withdrawBalance">
<?php echo number_format($withdraw,2); ?>
</h3>

</div>


<div class="transfer-icon" id="swapBtn">
<i class="fa-solid fa-right-left"></i>
</div>


<div class="transfer-box" id="basicBox">

<p>Basic account</p>
<h3 id="basicBalance">
<?php echo number_format($basic,2); ?>
</h3>

</div>

</div>



<!-- TRANSFER FORM -->

<div class="transfer-container">

<form method="POST">

<input type="hidden" name="direction" id="direction" value="basic_to_withdraw">

<input
type="number"
step="0.01"
name="amount"
placeholder="Conversion quantity"
required
class="transfer-input">


<div class="password-box">

<input
type="password"
name="password"
placeholder="Password"
required
class="transfer-input">

<i class="fa fa-eye toggle-pass"></i>

</div>


<button class="transfer-btn">
Confirm
</button>

</form>


<?php if($msg): ?>

<div class="transfer-error">
<?php echo htmlspecialchars($msg); ?>
</div>

<?php endif; ?>

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


/* PASSWORD SHOW */

document.querySelector(".toggle-pass").onclick=function(){

let input=document.querySelector("input[name='password']");

input.type=input.type==="password"?"text":"password";

}


/* SWAP DIRECTION */

let direction="basic_to_withdraw";

document.getElementById("swapBtn").onclick=function(){

const basicBox=document.getElementById("basicBox");
const withdrawBox=document.getElementById("withdrawBox");

const basicBalance=document.getElementById("basicBalance").innerText;
const withdrawBalance=document.getElementById("withdrawBalance").innerText;

/* animation */

basicBox.classList.add("swap-anim");
withdrawBox.classList.add("swap-anim");

setTimeout(()=>{

document.getElementById("basicBalance").innerText=withdrawBalance;
document.getElementById("withdrawBalance").innerText=basicBalance;

basicBox.classList.remove("swap-anim");
withdrawBox.classList.remove("swap-anim");

},300);

/* change direction */

direction = direction === "basic_to_withdraw"
? "withdraw_to_basic"
: "basic_to_withdraw";

document.getElementById("direction").value=direction;

}

</script>
