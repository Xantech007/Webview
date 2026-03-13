<?php
session_start();
require_once "config/database.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;
}

$user_id=$_SESSION['user_id'];

/* FETCH USER DATA */
$stmt=$pdo->prepare("SELECT id,email,balance,password,country FROM users WHERE id=?");
$stmt->execute([$user_id]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);

$balance=$user['balance'];
$user_country=$user['country'];

/* FETCH PAYMENT METHODS (COUNTRY BASED) */

$stmt=$pdo->prepare("
SELECT * FROM payment_methods
WHERE status=1
AND (active_country IS NULL OR active_country='' OR active_country=?)
ORDER BY id ASC
");

$stmt->execute([$user_country]);
$methods=$stmt->fetchAll(PDO::FETCH_ASSOC);

$msg="";

if($_SERVER['REQUEST_METHOD']=="POST"){

$method=$_POST['method'];
$amount=floatval($_POST['amount']);
$password=$_POST['password'];

$address=trim($_POST['address'] ?? '');

$network_bank=$_POST['network_bank'] ?? null;
$account_name=$_POST['account_name'] ?? null;
$account_number=$_POST['account_number'] ?? null;

/* FETCH METHOD CONFIG */

$stmt=$pdo->prepare("SELECT withdrawal_fee,min_withdraw FROM payment_methods WHERE name=?");
$stmt->execute([$method]);
$methodData=$stmt->fetch(PDO::FETCH_ASSOC);

$feeRate=$methodData['withdrawal_fee'] ?? 0;
$minWithdraw=$methodData['min_withdraw'] ?? 0;

/* PASSWORD CHECK */

if(!password_verify($password,$user['password'])){

$msg="Incorrect password";

}elseif($amount>$balance){

$msg="Insufficient balance";

}elseif($amount<=0){

$msg="Invalid withdrawal amount";

}elseif($amount < $minWithdraw){

$msg="Minimum withdrawal for this method is ".$minWithdraw." USDT";

}else{

$fee=$amount * $feeRate;
$received=$amount-$fee;

/* SAVE WITHDRAWAL */

$stmt=$pdo->prepare("
INSERT INTO withdrawals
(user_id,method,amount,address,network_bank,account_name,account_number,fee,received)
VALUES(?,?,?,?,?,?,?,?,?)
");

$stmt->execute([
$user_id,
$method,
$amount,
$address,
$network_bank,
$account_name,
$account_number,
$fee,
$received
]);

/* DEDUCT BALANCE */

$pdo->prepare("UPDATE users SET balance=balance-? WHERE id=?")
->execute([$amount,$user_id]);

$_SESSION['withdraw_msg']="Withdrawal request submitted successfully";

header("Location: index.php");
exit;

}

}
?>

<?php include "inc/header.php"; ?>

<div class="withdraw-header">
<a href="#" onclick="goBack()">
<i class="fa fa-arrow-left"></i>
</a>
<span>Withdraw</span>
</div>

<div class="withdraw-container">

<h3>Withdrawal account</h3>
<p class="withdraw-note">24 hours withdrawal</p>

<div class="withdraw-balance">
Total balance
<strong><?php echo number_format($balance,2); ?> USDT</strong>
</div>

<form method="POST">

<label>Withdrawal method:</label>

<div class="withdraw-methods">

<?php foreach($methods as $m): ?>

<label class="method">

<input type="radio"
name="method"
value="<?php echo htmlspecialchars($m['name']); ?>"
data-type="<?php echo $m['crypto'] ? 'crypto' : $m['type']; ?>"
data-fee="<?php echo $m['withdrawal_fee']; ?>"
data-min="<?php echo $m['min_withdraw']; ?>"
required>

<img src="<?php echo htmlspecialchars($m['image']); ?>" class="method-icon">

<?php echo htmlspecialchars($m['name']); ?>

</label>

<?php endforeach; ?>

</div>


<input
type="number"
step="0.01"
name="amount"
placeholder="Enter withdrawal amount"
required
class="withdraw-input">


<!-- CRYPTO ADDRESS -->

<div id="cryptoFields">

<input
type="text"
name="address"
placeholder="Withdrawal Address"
class="withdraw-input">

</div>


<!-- BANK FIELDS -->

<div id="bankFields" style="display:none">

<input
type="text"
name="network_bank"
placeholder="Bank"
class="withdraw-input">

<input
type="text"
name="account_name"
placeholder="Account Name"
class="withdraw-input">

<input
type="text"
name="account_number"
placeholder="Account Number"
class="withdraw-input">

</div>


<!-- MOMO FIELDS -->

<div id="momoFields" style="display:none">

<input
type="text"
name="network_bank"
placeholder="Network"
class="withdraw-input">

<input
type="text"
name="account_name"
placeholder="MOMO Name"
class="withdraw-input">

<input
type="text"
name="account_number"
placeholder="MOMO Number"
class="withdraw-input">

</div>


<input
type="password"
name="password"
placeholder="Enter your password"
required
class="withdraw-input">


<div class="withdraw-summary">

<div>
Fees
<span id="fee">0 USDT</span>
</div>

<div>
Actually received
<span id="received">0 USDT</span>
</div>

</div>

<button class="withdraw-btn">
Confirm
</button>

</form>

<?php if(!empty($msg)): ?>

<div class="withdraw-error">
<?php echo htmlspecialchars($msg); ?>
</div>

<?php endif; ?>

<div class="withdraw-info">

TRC20 minimum withdrawal: $10  
BEP20, POLYGON minimum withdrawal is $1

</div>

</div>


<script>

function goBack(){

if(document.referrer){
window.history.back();
}else{
window.location.href="index.php";
}

}


/* WITHDRAWAL METHOD DATA */

const amountInput=document.querySelector("input[name='amount']");
const radios=document.querySelectorAll("input[name='method']");

let feeRate=0;
let minWithdraw=0;

/* METHOD CHANGE */

radios.forEach(radio=>{

radio.addEventListener("change",function(){

feeRate=parseFloat(this.dataset.fee) || 0;
minWithdraw=parseFloat(this.dataset.min) || 0;

toggleFields(this.dataset.type);
calculateWithdrawal();

});

});


/* CALCULATE FEES */

amountInput.addEventListener("input",calculateWithdrawal);

function calculateWithdrawal(){

let amount=parseFloat(amountInput.value) || 0;

let fee=amount * feeRate;
let received=amount - fee;

document.getElementById("fee").innerText=fee.toFixed(2)+" USDT";

if(amount>0 && amount < minWithdraw){

document.getElementById("received").innerText="Min withdrawal: "+minWithdraw+" USDT";

}else{

document.getElementById("received").innerText=received.toFixed(2)+" USDT";

}

}


/* TOGGLE WITHDRAWAL FIELDS */

const cryptoFields=document.getElementById("cryptoFields");
const bankFields=document.getElementById("bankFields");
const momoFields=document.getElementById("momoFields");

function toggleFields(type){

cryptoFields.style.display="none";
bankFields.style.display="none";
momoFields.style.display="none";

if(type==="crypto"){
cryptoFields.style.display="block";
}

if(type==="bank"){
bankFields.style.display="block";
}

if(type==="momo"){
momoFields.style.display="block";
}

}

</script>

<?php include "inc/footer.php"; ?>
