<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f5f5f5;
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
    background:#fff;
    padding:10px 0;
    overflow:hidden;
    border-bottom:1px solid #ddd;
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
    color:#333;
}

@keyframes scroll-left{
    0%{ transform:translateX(0); }
    100%{ transform:translateX(-100%); }
}

/* ================= ACTION SECTION ================= */

.action-container{
    margin:20px;
    padding:20px 10px;
    border-radius:15px;
    background:linear-gradient(135deg, #2b2b2b, #1c1c1c);
    display:flex;
    justify-content:space-around;
    align-items:center;
    box-shadow:0 4px 15px rgba(0,0,0,0.3);
}

.action-card{
    text-decoration:none;
    color:#fff;
    text-align:center;
    flex:1;
}

.icon-circle{
    width:55px;
    height:55px;
    margin:0 auto 8px auto;
    border-radius:50%;
    background:linear-gradient(145deg, #f5c16c, #d89c3a);
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:22px;
    box-shadow:0 4px 10px rgba(0,0,0,0.4);
}

.action-card span{
    font-size:13px;
    display:block;
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

/* ================= TASK HALL ================= */

.task-section{
    margin:20px;
}

.task-title{
    font-size:18px;
    font-weight:bold;
    margin-bottom:15px;
}

/* Same width as banner */
.task-card{
    width:100%;
    background:#fff;
    border-radius:15px;
    padding:15px;
    margin-bottom:15px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

/* Optimize VIP image size */
.task-left{
    width:45px;
    height:45px;
    object-fit:cover;
    border-radius:8px;
}

/* Middle content */
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
    color:#666;
}

/* Arrow image optimized */
.task-right{
    width:18px;
    height:auto;
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


