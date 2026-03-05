/* ================= TRANSFER PAGE ================= */

.transfer-header{
display:flex;
align-items:center;
justify-content:center;
padding:15px;
background:linear-gradient(90deg,#2c1f16,#4a3324);
color:#fff;
position:relative;
}

.transfer-header a{
position:absolute;
left:15px;
color:#fff;
font-size:18px;
cursor:pointer;
}


/* SUCCESS */

.transfer-success{
margin:20px;
background:#4CAF50;
padding:12px;
border-radius:10px;
text-align:center;
}


/* MAIN */

.transfer-wrapper{
margin:20px;
}


/* BALANCE PANEL */

.transfer-balance{
background:linear-gradient(90deg,#e6cf9b,#e7b55f);
border-radius:12px;
padding:18px;
display:flex;
align-items:center;
justify-content:space-between;
color:#000;
}

.transfer-box{
text-align:center;
}

.transfer-box p{
margin:0;
font-size:12px;
}

.transfer-box h3{
margin-top:5px;
font-size:20px;
}


/* SWAP BUTTON */

.transfer-icon{
background:#000;
color:#fff;
width:42px;
height:42px;
display:flex;
align-items:center;
justify-content:center;
border-radius:50%;
cursor:pointer;
transition:.3s;
}

.transfer-icon:hover{
transform:rotate(180deg) scale(1.1);
}


/* FORM */

.transfer-container{
margin-top:20px;
background:linear-gradient(135deg,#3a2b20,#5a402e);
padding:20px;
border-radius:12px;
}


/* INPUT */

.transfer-input{
width:100%;
padding:14px;
border:none;
border-radius:10px;
margin-bottom:15px;
background:rgba(255,255,255,0.08);
color:#fff;
}


/* PASSWORD */

.password-box{
position:relative;
}

.password-box i{
position:absolute;
right:12px;
top:15px;
opacity:.7;
cursor:pointer;
}


/* BUTTON */

.transfer-btn{
width:100%;
padding:14px;
background:#f0b24b;
border:none;
border-radius:30px;
font-size:16px;
cursor:pointer;
}


/* ERROR */

.transfer-error{
margin-top:10px;
color:#ff6b6b;
text-align:center;
}


/* SWAP ANIMATION */

.swap-anim{
transform:translateY(-10px);
opacity:.4;
transition:all .3s ease;
}
