<?php
session_start();
require_once "config/database.php";
require_once "inc/countries.php";

if(!isset($_SESSION['user_id'])){
header("Location: login.php");
exit;
}

$user_id = $_SESSION['user_id'];

$msg="";
$success="";

/* ================= GET USER DATA ================= */

$stmt=$pdo->prepare("SELECT email,phone,country,password,invite_code,referral_code,vip_level,balance,created_at FROM users WHERE id=?");
$stmt->execute([$user_id]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);


/* ================= UPDATE COUNTRY ================= */

if(isset($_POST['update_country'])){

$country=$_POST['country'];

$stmt=$pdo->prepare("UPDATE users SET country=? WHERE id=?");
$stmt->execute([$country,$user_id]);

$success="Country updated successfully";

/* refresh data */
$stmt=$pdo->prepare("SELECT email,phone,country,password,invite_code,referral_code,vip_level,balance,created_at FROM users WHERE id=?");
$stmt->execute([$user_id]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);

}


/* ================= CHANGE PASSWORD ================= */

if(isset($_POST['change_password'])){

$old=$_POST['old_password'];
$new=$_POST['new_password'];
$confirm=$_POST['confirm_password'];

if(!password_verify($old,$user['password'])){
$msg="Old password is incorrect";
}
elseif(strlen($new) < 6){
$msg="Password must be at least 6 characters";
}
elseif($new != $confirm){
$msg="New passwords do not match";
}
else{

$newHash=password_hash($new,PASSWORD_DEFAULT);

$stmt=$pdo->prepare("UPDATE users SET password=? WHERE id=?");
$stmt->execute([$newHash,$user_id]);

$success="Password changed successfully";

}

}

?>

<?php include "inc/header.php"; ?>


<div class="change-header">

<a onclick="goBack()">
<i class="fa fa-arrow-left"></i>
</a>

<span>Account Settings</span>

</div>


<div class="change-container">


<!-- ================= USER DETAILS ================= -->

<label>Email</label>
<div class="pwd-box">
<input type="text" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
</div>


<label>Phone</label>
<div class="pwd-box">
<input type="text" value="<?php echo htmlspecialchars($user['phone']); ?>" readonly>
</div>


<label>VIP Level</label>
<div class="pwd-box">
<input type="text" value="VIP<?php echo $user['vip_level']; ?>" readonly>
</div>


<label>Account Balance</label>
<div class="pwd-box">
<input type="text" value="<?php echo number_format($user['balance'],2); ?> USD" readonly>
</div>


<label>Invitation Code</label>
<div class="pwd-box">
<input type="text" value="<?php echo htmlspecialchars($user['invite_code']); ?>" readonly>
</div>


<label>Referral Code</label>
<div class="pwd-box">
<input type="text" value="<?php echo htmlspecialchars($user['referral_code']); ?>" readonly>
</div>


<label>Registration Date</label>
<div class="pwd-box">
<input type="text" value="<?php echo $user['created_at']; ?>" readonly>
</div>



<!-- ================= COUNTRY UPDATE ================= -->

<label>Country</label>

<form method="POST">

<div class="pwd-box">

<select name="country" required style="width:100%;background:transparent;border:none;color:white;outline:none;">

<?php
foreach($countries as $c){

$selected = ($c == $user['country']) ? "selected" : "";

echo "<option value=\"$c\" $selected>$c</option>";

}
?>

</select>

</div>

<button class="change-btn" name="update_country">
Update Country
</button>

</form>



<!-- ================= SPACING BEFORE PASSWORD ================= -->

<div style="height:40px;"></div>



<!-- ================= CHANGE PASSWORD ================= -->

<h3 style="margin-bottom:15px;">Change Password</h3>

<form method="POST">

<div class="pwd-box">

<input
type="password"
name="old_password"
placeholder="Old Password"
required>

<i class="fa fa-eye toggle"></i>

</div>


<div class="pwd-box">

<input
type="password"
name="new_password"
placeholder="New Password"
required>

<i class="fa fa-eye toggle"></i>

</div>


<div class="pwd-box">

<input
type="password"
name="confirm_password"
placeholder="Reenter new password"
required>

<i class="fa fa-eye toggle"></i>

</div>


<button class="change-btn" name="change_password">
Change Password
</button>

</form>



<?php if($msg): ?>

<div class="change-error">
<?php echo htmlspecialchars($msg); ?>
</div>

<?php endif; ?>


<?php if($success): ?>

<div class="change-success">
<?php echo htmlspecialchars($success); ?>
</div>

<?php endif; ?>


</div>


<?php include "inc/footer.php"; ?>


<script>

/* BACK BUTTON */

function goBack(){

if(document.referrer){
window.history.back();
}else{
window.location.href="index.php";
}

}


/* PASSWORD TOGGLE */

document.querySelectorAll(".toggle").forEach(function(icon){

icon.onclick=function(){

let input=this.previousElementSibling;

input.type = input.type === "password" ? "text" : "password";

}

});

</script>
