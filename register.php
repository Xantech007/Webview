<?php
require_once "config/database.php";

$msg="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$invite=$_POST['invite'];

if($password!=$confirm){
$msg="Passwords do not match";
}else{

$hash=password_hash($password,PASSWORD_DEFAULT);

$stmt=$pdo->prepare(
"INSERT INTO users(email,password,invite_code)
VALUES(?,?,?)");

$stmt->execute([$email,$hash,$invite]);

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
}

.bg{
position:absolute;
right:-40px;
bottom:-20px;
width:340px;
opacity:.25;
animation:float 4s infinite;
}

@keyframes float{
50%{transform:translateY(-20px)}
}

.logo{
width:110px;
height:110px;
border-radius:50%;
display:block;
margin:auto;
}

.title{
text-align:center;
color:#f0b24b;
font-size:28px;
margin:20px 0;
}

.input{
display:flex;
align-items:center;
background:rgba(240,178,75,.25);
padding:15px;
border-radius:10px;
margin-bottom:18px;
}

.input i{
color:white;
margin-right:10px;
}

.input input{
border:none;
background:transparent;
color:white;
outline:none;
flex:1;
}

.btn{
width:100%;
padding:16px;
border:none;
border-radius:30px;
background:#f0b24b;
color:white;
font-size:17px;
cursor:pointer;
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

<form method="POST">

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

<button class="btn">Register</button>

</form>

<?php if($msg): ?>
<p class="msg"><?= $msg ?></p>
<?php endif; ?>

</div>
</div>

</body>
</html>
