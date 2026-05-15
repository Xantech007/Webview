<?php
$currentPage = basename($_SERVER['PHP_SELF']);

/* CONNECT DATABASE IF NOT CONNECTED */
if (!isset($conn)) {

    require_once "config/database.php";

    $db = new Database();
    $conn = $db->connect();
}

/* FETCH WHATSAPP NUMBER */
$whatsapp = '';

try {

    $adminStmt = $conn->prepare("SELECT whatsapp FROM admins LIMIT 1");
    $adminStmt->execute();

    $admin = $adminStmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($admin['whatsapp'])) {

        $whatsapp = preg_replace('/[^0-9]/', '', $admin['whatsapp']);
    }

} catch (Exception $e) {

    $whatsapp = '';
}
?>

<div class="footer-wrapper">

    <div class="footer">

        <a href="index.php" class="<?php if($currentPage=='index.php') echo 'active'; ?>">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>

        <a href="mission.php" class="<?php if($currentPage=='mission.php') echo 'active'; ?>">
            <i class="fa-solid fa-list-check"></i>
            <span>Task</span>
        </a>

        <a href="team.php" class="<?php if($currentPage=='team.php') echo 'active'; ?>">
            <i class="fa-solid fa-people-group"></i>
            <span>Team</span>
        </a>

        <a href="vip.php" class="<?php if($currentPage=='vip.php') echo 'active'; ?>">
            <i class="fa-solid fa-crown"></i>
            <span>VIP</span>
        </a>

        <a href="mine.php" class="<?php if($currentPage=='mine.php') echo 'active'; ?>">
            <i class="fa-solid fa-user"></i>
            <span>Me</span>
        </a>

    </div>

</div>

<!-- FLOATING WHATSAPP BUTTON -->

<?php if(!empty($whatsapp)): ?>

<a href="https://wa.me/<?php echo $whatsapp; ?>"
   class="whatsapp-support-btn"
   target="_blank">

    <i class="fa-brands fa-whatsapp"></i>

</a>

<?php endif; ?>

<style>

/* FOOTER */

.footer-wrapper{
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    padding:10px;
    z-index:99999;
    background:transparent;
}

.footer{
    background:linear-gradient(135deg,#3a2b20,#5a402e);
    padding:12px 0;
    display:flex;
    justify-content:space-around;
    border-radius:20px;
}

.footer a{
    color:#bdbdbd;
    text-decoration:none;
    font-size:12px;
    display:flex;
    flex-direction:column;
    align-items:center;
}

.footer i{
    font-size:20px;
    margin-bottom:4px;
}

.footer a.active{
    color:#f4c277;
}

.footer a.active i{
    color:#f4c277;
}

.footer a:hover,
.footer a:hover i{
    color:#e4b060;
}

/* WHATSAPP BUTTON */

.whatsapp-support-btn{
    position:fixed;
    right:18px;
    bottom:95px;
    width:60px;
    height:60px;
    background:#25D366;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    z-index:100000;
    box-shadow:0 4px 15px rgba(0,0,0,0.35);
    animation:whatsappPulse 1.5s infinite;
}

.whatsapp-support-btn i{
    color:#fff;
    font-size:34px;
}

.whatsapp-support-btn:hover{
    transform:scale(1.08);
}

@keyframes whatsappPulse{

    0%{
        transform:scale(1);
    }

    50%{
        transform:scale(1.08);
    }

    100%{
        transform:scale(1);
    }
}

</style>

<script>

/* BANNER SLIDER */

window.addEventListener("load", function(){

    var track = document.querySelector(".banner-track");
    var slides = document.querySelectorAll(".banner-track img");

    if(!track || slides.length < 2) return;

    var current = 0;

    setInterval(function(){

        current = (current + 1) % slides.length;

        track.style.transform =
        "translateX(-" + (current * 100) + "%)";

    },1500);

});


/* HEADER SCROLL EFFECT */

document.addEventListener("scroll", function () {

    const header = document.getElementById("header");

    if(!header) return;

    if (window.scrollY > 10) {

        header.classList.add("scrolled");

    } else {

        header.classList.remove("scrolled");
    }
});


/* HEADER + FOOTER SPACING */

function adjustSpacing() {

    const header = document.querySelector('.header');
    const footer = document.querySelector('.footer-wrapper');

    if(!header || !footer) return;

    const headerHeight = header.offsetHeight;
    const footerHeight = footer.offsetHeight;

    document.body.style.paddingTop =
    headerHeight + "px";

    document.body.style.paddingBottom =
    footerHeight + 30 + "px";
}

window.addEventListener("load", adjustSpacing);
window.addEventListener("resize", adjustSpacing);

</script>

<script>

function googleTranslateElementInit() {

new google.translate.TranslateElement(
{
pageLanguage:'en',
includedLanguages:'en,es,fr,pt,ru,ar,zh-CN,hi',
autoDisplay:false
},
'google_translate_element'
);

}

</script>

<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>

let deferredPrompt;

window.addEventListener("beforeinstallprompt", (e) => {

    e.preventDefault();

    deferredPrompt = e;

    console.log("PWA install ready");

});

function installApp(){

    if(deferredPrompt){

        deferredPrompt.prompt();

        deferredPrompt.userChoice.then((choiceResult) => {

            if(choiceResult.outcome === "accepted"){

                console.log("User installed the app");

            } else {

                console.log("User dismissed install");
            }

            deferredPrompt = null;

        });

    } else {

        alert("Install not available yet. Use Chrome and visit again.");
    }
}

</script>

</body>
</html>
