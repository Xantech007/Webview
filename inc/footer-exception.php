<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<script>

/* BANNER SLIDER */

window.addEventListener("load", function(){

    var track = document.querySelector(".banner-track");
    var slides = document.querySelectorAll(".banner-track img");

    if(!track || slides.length < 2) return;

    var current = 0;

    setInterval(function(){
        current = (current + 1) % slides.length;
        track.style.transform = "translateX(-" + (current * 100) + "%)";
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

    document.body.style.paddingTop = headerHeight + "px";
    document.body.style.paddingBottom = footerHeight + "px";
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

</body>
</html>
