<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#f5f5f5;
}

/* Header */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:12px 15px;
    background:#111;
    color:#fff;
}

.logo{
    font-weight:bold;
    font-size:18px;
}

.lang{
    color:#fff;
}

/* News */
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

/* Action box */
.action-box{
    margin:20px;
    background:#fff;
    padding:20px;
    border-radius:8px;
    display:grid;
    grid-template-columns: repeat(2,1fr);
    gap:15px;
}

.action-item{
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
    background:#f0f0f0;
    border-radius:6px;
    text-decoration:none;
    color:#333;
    font-weight:bold;
}

/* Footer */
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
    <div class="logo">MyLogo</div>
    <div class="lang">
        <select>
            <option>EN</option>
            <option>FR</option>
        </select>
    </div>
</div>
