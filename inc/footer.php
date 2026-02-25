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
</script>

</body>
</html>
