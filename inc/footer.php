<div class="footer-wrapper">
    <div class="footer">
        <a href="index.php" class="active">
            <i class="fa-solid fa-house"></i>
            <span>Home</span>
        </a>

        <a href="#">
            <i class="fa-solid fa-list-check"></i>
            <span>Task</span>
        </a>

        <a href="#">
            <i class="fa-solid fa-people-group"></i>
            <span>Team</span>
        </a>

        <a href="#">
            <i class="fa-solid fa-crown"></i>
            <span>VIP</span>
        </a>

        <a href="#">
            <i class="fa-solid fa-user"></i>
            <span>Me</span>
        </a>
    </div>
</div>
<script>
window.onload = function(){

    var track = document.querySelector(".banner-track");
    var slides = document.querySelectorAll(".banner-track img");
    var current = 0;

    if(slides.length < 2) return;

    setInterval(function(){
        current = (current + 1) % slides.length;
        track.style.transform = "translateX(-" + (current * 100) + "%)";
    }, 1500);

};

document.addEventListener("scroll", function () {
    const header = document.getElementById("header");
    if (window.scrollY > 10) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }
});


function adjustSpacing() {
    const header = document.querySelector('.header');
    const footer = document.querySelector('.footer-wrapper');

    const headerHeight = header.offsetHeight;
    const footerHeight = footer.offsetHeight;

    document.body.style.paddingTop = headerHeight + "px";
    document.body.style.paddingBottom = footerHeight + "px";
}

window.onload = adjustSpacing;
window.onresize = adjustSpacing;
    
</script>

</body>
</html>
