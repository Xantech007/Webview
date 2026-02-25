<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
<style>
*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#111;
}

/* ================= HEADER ================= */

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 20px;
    background:#111;
    color:#fff;
}

.logo{
    font-size:18px;
    font-weight:bold;
}

.lang select{
    padding:5px 8px;
    border-radius:5px;
    border:none;
}

/* ================= NEWS SCROLL ================= */

.news-wrapper{
    background:#111;
    padding:10px 0;
    overflow:hidden;
    border-bottom:1px solid #111;
}

.news-marquee{
    white-space:nowrap;
    overflow:hidden;
}

.news-content{
    display:inline-block;
    padding-left:100%;
    animation:scroll-left 20s linear infinite;
}

.news-item{
    margin-right:50px;
    font-weight:500;
    color:#fff;
}

@keyframes scroll-left{
    0%{ transform:translateX(0); }
    100%{ transform:translateX(-100%); }
}

/* ================= DASHBOARD ACTION SECTION ================= */

.dashboard-container{
    margin:20px;
    padding:20px;
    border-radius:18px;
    background:linear-gradient(135deg,#3a2b20,#5a402e);
    box-shadow:0 6px 18px rgba(0,0,0,0.3);
    color:#fff;
}

/* Top row */
.dashboard-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
}

.user-email{
    font-size:14px;
    opacity:0.9;
}

.vip-badge{
    background:#f6c27a;
    color:#000;
    padding:3px 8px;
    font-size:12px;
    border-radius:12px;
    margin-left:8px;
    font-weight:bold;
}

/* Wallet button */
.wallet-btn{
    width:38px;
    height:38px;
    background:#111;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
    text-decoration:none;
    font-size:16px;
}

/* Balance */
.balance-box{
    background:#111;
    padding:15px;
    border-radius:30px;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
    font-size:16px;
    margin-bottom:20px;
}

.balance-box strong{
    font-size:20px;
    color:#f6c27a;
}

/* Action icons */
.dashboard-actions{
    display:flex;
    justify-content:space-between;
    text-align:center;
}

.action-item{
    text-decoration:none;
    color:#fff;
    flex:1;
}

.icon-circle{
    width:55px;
    height:55px;
    margin:0 auto 8px auto;
    border-radius:50%;
    background:linear-gradient(145deg,#f5c16c,#d89c3a);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:20px;
    box-shadow:0 4px 10px rgba(0,0,0,0.4);
}

.action-item span{
    font-size:13px;
}
/* ================= SMOOTH SLIDER ================= */

.banner-slider{
    margin:20px;
    border-radius:15px;
    overflow:hidden;
}

.banner-track{
    display:flex;
    transition:transform 0.6s ease-in-out;
}

.banner-track img{
    width:100%;
    height:auto;
    flex-shrink:0;
}

/* ================= COMMON TITLES ================= */

.task-title,
.member-title,
.reg-title{
    font-size:18px;
    font-weight:bold;
    margin-bottom:15px;
    color:#fff;
}

/* ================= TASK HALL ================= */

.task-section{
    margin:20px;
}

.task-card{
    width:100%;
    background:linear-gradient(135deg,#3a2b20,#5a402e);
    border-radius:15px;
    padding:15px;
    margin-bottom:15px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    box-shadow:0 4px 12px rgba(0,0,0,0.2);
    color:#fff;
}

.task-left{
    width:45px;
    height:45px;
    object-fit:cover;
    border-radius:8px;
}

.task-content{
    flex:1;
    margin:0 15px;
}

.task-content h3{
    margin:0;
    font-size:15px;
}

.task-content p{
    margin:4px 0 0 0;
    font-size:13px;
    color:#ddd;
}

.task-right{
    width:18px;
    height:auto;
}

/* ================= MEMBER LIST ================= */

.member-section{
    margin:20px;
}

.member-wrapper{
    height:210px;
    overflow:hidden;
    position:relative;
}

.member-track{
    display:flex;
    flex-direction:column;
    animation:scrollUp 15s linear infinite;
}

.member-row{
    margin-bottom:15px;
}

.member-card{
    background:linear-gradient(135deg,#3a2b20,#5a402e);
    border-radius:18px;
    padding:20px;
    color:#fff;
    box-shadow:0 4px 12px rgba(0,0,0,0.2);
}

.vip-level{
    font-size:14px;
    opacity:0.9;
}

.earning{
    font-size:22px;
    font-weight:bold;
    margin:8px 0;
    color:#f6c27a;
}

.email{
    font-size:13px;
    opacity:0.8;
}

@keyframes scrollUp{
    0% { transform:translateY(0); }
    100% { transform:translateY(-50%); }
}

/* ================= REGULATORY AUTHORITY ================= */

.reg-section{
    margin:20px;
}

.reg-container{
    background:linear-gradient(135deg,#3a2b20,#5a402e);
    border-radius:15px;
    padding:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 4px 12px rgba(0,0,0,0.2);
}

.reg-container img{
    width:48%;
    height:auto;
    object-fit:cover;
    border-radius:15px;
}

/* ================= FOOTER ================= */

.footer{
    position:fixed;
    bottom:0;
    width:100%;
    background:#111;
    display:flex;
    justify-content:space-around;
    padding:10px 0;
}

.footer a{
    color:#fff;
    text-decoration:none;
    font-size:12px;
    text-align:center;
}

</style>
</head>
<body>

<div class="header">
    <div class="logo">Binance</div>
    <div class="lang">
        <select>
            <option>EN</option>
            <option>FR</option>
        </select>
    </div>
</div>
