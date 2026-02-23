<div class="footer">
    <a href="index.php">Home</a>
    <a href="#">Task</a>
    <a href="#">Team</a>
    <a href="#">VIP</a>
    <a href="#">Me</a>
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
