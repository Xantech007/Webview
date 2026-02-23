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

/* ================= BANNER SLIDER ================= */

.banner-slider{
    margin:20px;
    border-radius:15px;
    overflow:hidden;
    height:240px;
    position:relative;
}

.banner-slider .slide{
    position:absolute;
    width:100%;
    height:100%;
    object-fit:cover;
    object-position:center;
    top:0;
    left:0;
    display:none;
}

.banner-slider .slide:first-child{
    display:block;
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
    <div class="logo">MyLogo</div>
    <div class="lang">
        <select>
            <option>EN</option>
            <option>FR</option>
        </select>
    </div>
</div>
