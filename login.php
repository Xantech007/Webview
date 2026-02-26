<?php
session_start();
require_once "config/database.php";

$error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $login = trim($_POST['login']);
    $password = $_POST['password'];

    $stmt=$pdo->prepare("
        SELECT * FROM users
        WHERE email=:login OR phone=:login
        LIMIT 1
    ");

    $stmt->execute(['login'=>$login]);
    $user=$stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password,$user['password'])){
        $_SESSION['user_id']=$user['id'];
        header("Location: dashboard.php");
        exit;
    }else{
        $error="Invalid login details";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Login</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

/* ================= BODY ================= */
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#0f1115;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

/* ================= WRAPPER ================= */
.login-wrapper{
    width:100%;
    max-width:650px;
    padding:40px;
}

.login-box{
    position:relative;
    background:#14161c;
    border-radius:22px;
    padding:60px 45px;
    overflow:hidden;
    box-shadow:0 0 40px rgba(0,0,0,.6);
}

/* ================= FLOAT IMAGE ================= */
/* reduced by 50% */
.bg-animation{
    position:absolute;
    bottom:-10px;
    right:-20px;
    width:160px;
    opacity:.25;
    animation:float 4s ease-in-out infinite;
}

@keyframes float{
0%{transform:translateY(0)}
50%{transform:translateY(-18px)}
100%{transform:translateY(0)}
}

/* ================= LOGO ================= */
.logo{
    width:110px;
    height:110px;
    border-radius:50%;
    object-fit:cover;
    display:block;
    margin:auto;
}

/* ================= TITLE ================= */
.title{
    text-align:center;
    color:#f0b24b;
    font-size:30px;
    margin:20px 0 30px;
}

/* ================= LOGIN TABS ================= */
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
    border-bottom:2px solid white;
}

/* ================= INPUT ================= */
.input-group{
    margin-bottom:20px;
}

.input-box{
    display:flex;
    align-items:center;
    padding:15px;
    border-radius:10px;
    background:rgba(240,178,75,.25);
    backdrop-filter:blur(8px);
}

.input-box i{
    color:white;
    margin-right:10px;
}

.input-box input{
    flex:1;
    border:none;
    outline:none;
    background:transparent;
    color:white;
    font-size:16px;
}

.eye{
    cursor:pointer;
}

/* ================= BUTTON ================= */
.btn{
    width:100%;
    padding:16px;
    border:none;
    border-radius:30px;
    font-size:17px;
    cursor:pointer;
    margin-top:12px;
}

/* solid buttons */
.signin{
    background:#f0b24b;
    color:#fff;
}

.signup{
    background:#2a2a2a;
    color:#fff;
}

/* ================= FORM SWITCH ================= */
.form{
    display:none;
}

.form.active{
    display:block;
}

.error{
    color:#ff4d4d;
    text-align:center;
}

/* ================= DESKTOP ================= */
@media(min-width:1000px){

.title{
font-size:34px;
}

}

</style>
</head>

<body>

<div class="login-wrapper">
<div class="login-box">

<img src="assets/images/wallet.png" class="bg-animation">
<img src="assets/images/logo.webp" class="logo">

<div class="title">BINANCE DIGITAL</div>

<!-- LOGIN SWITCH -->
<div class="tabs">
<div id="emailTab" class="active"
onclick="switchTab('email')">Email Login</div>

<div id="phoneTab"
onclick="switchTab('phone')">Phone Login</div>
</div>

<form method="POST">

<!-- EMAIL LOGIN -->
<div id="emailForm" class="form active">

<div class="input-group">
<div class="input-box">
<i class="fa-solid fa-envelope"></i>
<input type="email"
name="login"
placeholder="E-mail"
required>
</div>
</div>

<div class="input-group">
<div class="input-box">
<i class="fa-solid fa-lock"></i>
<input type="password"
name="password"
id="password1"
placeholder="Password"
required>

<i class="fa-regular fa-eye eye"
onclick="togglePassword('password1')"></i>
</div>
</div>

</div>

<!-- PHONE LOGIN -->
<div id="phoneForm" class="form">

<div class="input-group">
<div class="input-box">
<i class="fa-solid fa-phone"></i>
<input type="text"
name="login"
placeholder="Phone Number">
</div>
</div>

<div class="input-group">
<div class="input-box">
<i class="fa-solid fa-lock"></i>
<input type="password"
name="password"
id="password2"
placeholder="Password">

<i class="fa-regular fa-eye eye"
onclick="togglePassword('password2')"></i>
</div>
</div>

</div>

<?php if($error): ?>
<p class="error"><?= $error ?></p>
<?php endif; ?>

<button class="btn signin">Sign In</button>

<button type="button"
class="btn signup"
onclick="location.href='register.php'">
Sign Up
</button>

</form>

</div>
</div>

<script>

function switchTab(type){

document.getElementById("emailTab").classList.remove("active");
document.getElementById("phoneTab").classList.remove("active");

document.getElementById("emailForm").classList.remove("active");
document.getElementById("phoneForm").classList.remove("active");

if(type==="email"){
emailTab.classList.add("active");
emailForm.classList.add("active");
}else{
phoneTab.classList.add("active");
phoneForm.classList.add("active");
}
}

function togglePassword(id){
let input=document.getElementById(id);
input.type=input.type==="password"?"text":"password";
}

</script>

</body>
</html>
