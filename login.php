<?php
session_start();
require_once "config/database.php";

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $login = trim($_POST['login']);
    $password = $_POST['password'];

    if(!empty($login) && !empty($password)){

        $stmt = $pdo->prepare("
            SELECT * FROM users
            WHERE email = :login OR phone = :login
            LIMIT 1
        ");

        $stmt->execute(['login'=>$login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password,$user['password'])){
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit;
        }else{
            $error = "Invalid login credentials";
        }
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
    font-family:Arial, Helvetica, sans-serif;
    background:#0f1115;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

/* ===== BIGGER DESKTOP LAYOUT ===== */
.login-wrapper{
    width:100%;
    max-width:520px;
    padding:40px;
}

/* ================= CARD ================= */
.login-box{
    position:relative;
    background:#14161c;
    border-radius:20px;
    padding:45px 35px;
    overflow:hidden;
    box-shadow:0 0 40px rgba(0,0,0,.6);
}

/* ================= FLOATING IMAGE ================= */
.bg-animation{
    position:absolute;
    bottom:-20px;
    right:-40px;
    width:320px;
    opacity:.25;
    animation:float 4s ease-in-out infinite;
}

@keyframes float{
    0%{transform:translateY(0)}
    50%{transform:translateY(-20px)}
    100%{transform:translateY(0)}
}

/* ================= LOGO ================= */
.logo{
    width:110px;
    height:110px;
    margin:auto;
    display:block;
    border-radius:50%;
    object-fit:cover;
    background:#000;
}

/* ================= TITLE ================= */
.title{
    text-align:center;
    color:#f0b24b;
    font-size:28px;
    margin-top:15px;
    margin-bottom:30px;
}

/* ================= TABS ================= */
.tabs{
    display:flex;
    justify-content:space-between;
    margin-bottom:25px;
}

.tabs span{
    width:50%;
    text-align:center;
    padding:10px;
    color:#aaa;
    cursor:pointer;
    border-bottom:2px solid transparent;
}

.tabs .active{
    color:#fff;
    border-color:#fff;
}

/* ================= INPUT ================= */
.input-group{
    margin-bottom:20px;
}

.input-box{
    display:flex;
    align-items:center;
    background:rgba(240,178,75,.25);
    border-radius:10px;
    padding:14px;
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
    margin-top:10px;
}

.signin{
    background:#f0b24b;
    color:white;
}

.signup{
    background:transparent;
    border:1px solid white;
    color:white;
}

/* ================= ERROR ================= */
.error{
    color:#ff4d4d;
    text-align:center;
}

/* ===== DESKTOP SCALE ===== */
@media(min-width:1000px){

.login-wrapper{
    max-width:650px;
}

.login-box{
    padding:60px;
}

.title{
    font-size:32px;
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

<div class="tabs">
<span class="active">Email / Phone Login</span>
</div>

<form method="POST">

<div class="input-group">
<div class="input-box">
<i class="fa-solid fa-user"></i>
<input type="text"
name="login"
placeholder="Email or Phone"
required>
</div>
</div>

<div class="input-group">
<div class="input-box">
<i class="fa-solid fa-lock"></i>
<input type="password"
name="password"
id="password"
placeholder="Password"
required>

<i class="fa-regular fa-eye eye"
onclick="togglePassword()"></i>
</div>
</div>

<?php if(!empty($error)): ?>
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
function togglePassword(){
    const input=document.getElementById("password");
    input.type =
        input.type==="password"
        ?"text":"password";
}
</script>

</body>
</html>
