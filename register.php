<?php
require_once "config/database.php";

$msg="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$type=$_POST['type'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$invite=$_POST['invite'];

if($password!=$confirm){
$msg="Passwords do not match";
}else{

$hash=password_hash($password,PASSWORD_DEFAULT);

if($type=="email"){

$email=$_POST['email'];

$stmt=$pdo->prepare(
"INSERT INTO users(email,password,invite_code)
VALUES(?,?,?)");

$stmt->execute([$email,$hash,$invite]);

}else{

$phone=$_POST['phone'];

$stmt=$pdo->prepare(
"INSERT INTO users(phone,password,invite_code)
VALUES(?,?,?)");

$stmt->execute([$phone,$hash,$invite]);
}

header("Location: login.php");
exit;
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<title>Register</title>

<style>

body{
margin:0;
background:#0f1115;
font-family:Arial;
display:flex;
justify-content:center;
align-items:center;
min-height:100vh;
}

/* BIG LAYOUT */
.wrapper{
width:100%;
max-width:650px;
padding:40px;
}

.box{
background:#14161c;
border-radius:20px;
padding:60px 45px;
position:relative;
overflow:hidden;
box-shadow:0 0 40px rgba(0,0,0,.6);
}

/* FLOAT IMAGE */
.bg{
position:absolute;
right:-40px;
bottom:-20px;
width:340px;
opacity:.25;
animation:float 4s ease-in-out infinite;
}

@keyframes float{
0%,100%{transform:translateY(0)}
50%{transform:translateY(-20px)}
}

/* LOGO */
.logo{
width:110px;
height:110px;
border-radius:50%;
display:block;
margin:auto;
object-fit:cover;
}

.title{
text-align:center;
color:#f0b24b;
font-size:30px;
margin:15px 0 30px;
}

/* TABS */
.tabs{
display:flex;
margin-bottom:25px;
}

.tabs div{
flex:1;
text-align:center;
padding:12px;
color:#aaa;
cursor:pointer;
border-bottom:2px solid transparent;
}

.tabs .active{
color:#fff;
border-color:#fff;
}

/* INPUT */
.input{
display:flex;
align-items:center;
background:rgba(240,178,75,.25);
padding:15px;
border-radius:10px;
margin-bottom:18px;
backdrop-filter:blur(6px);
}

.input i{
color:white;
margin-right:10px;
}

.input input{
border:none;
background:transparent;
outline:none;
color:white;
flex:1;
font-size:16px;
}

/* BUTTON */
.btn{
width:100%;
padding:16px;
border:none;
border-radius:30px;
font-size:17px;
cursor:pointer;
background:#f0b24b;
color:#fff;
margin-top:10px;
}

/* FORMS */
.form{
display:none;
}

.form.active{
display:block;
}

.msg{
color:red;
text-align:center;
}

</style>
</head>

<body>

<div class="wrapper">
<div class="box">

<img src="assets/images/wallet.png" class="bg">
<img src="assets/images/logo.webp" class="logo">

<div class="title">Create Account</div>

<div class="tabs">
<div class="active" onclick="switchTab('emailForm')">
Email Sign Up
</div>

<div onclick="switchTab('phoneForm')">
Phone Sign Up
</div>
</div>

<!-- EMAIL REGISTER -->
<form method="POST"
id="emailForm"
class="form active">

<input type="hidden" name="type" value="email">

<div class="input">
<i class="fa fa-envelope"></i>
<input type="email"
name="email"
placeholder="Email"
required>
</div>

<div class="input">
<i class="fa fa-lock"></i>
<input type="password"
name="password"
placeholder="Password"
required>
</div>

<div class="input">
<i class="fa fa-lock"></i>
<input type="password"
name="confirm"
placeholder="Re-enter Password"
required>
</div>

<div class="input">
<i class="fa fa-thumbs-up"></i>
<input type="text"
name="invite"
placeholder="Invitation Code">
</div>

<button class="btn">Sign Up</button>

</form>


<!-- PHONE REGISTER -->
<form method="POST"
id="phoneForm"
class="form">

<input type="hidden" name="type" value="phone">

<div class="input">
<i class="fa fa-phone"></i>
<input type="text"
name="phone"
placeholder="Phone Number"
required>
</div>

<div class="input">
<i class="fa fa-lock"></i>
<input type="password"
name="password"
placeholder="Password"
required>
</div>

<div class="input">
<i class="fa fa-lock"></i>
<input type="password"
name="confirm"
placeholder="Re-enter Password"
required>
</div>

<div class="input">
<i class="fa fa-thumbs-up"></i>
<input type="text"
name="invite"
placeholder="Invitation Code">
</div>

<button class="btn">Sign Up</button>

</form>

<?php if($msg): ?>
<p class="msg"><?= $msg ?></p>
<?php endif; ?>

</div>
</div>

<script>
function switchTab(id){

document.querySelectorAll('.form')
.forEach(f=>f.classList.remove('active'));

document.getElementById(id)
.classList.add('active');

document.querySelectorAll('.tabs div')
.forEach(t=>t.classList.remove('active'));

event.target.classList.add('active');
}
</script>

</body>
</html>
