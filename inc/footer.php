<div class="footer">
    <a href="index.php">Home</a>
    <a href="#">Task</a>
    <a href="#">Team</a>
    <a href="#">VIP</a>
    <a href="#">Me</a>
</div>

<script>
window.onload = function(){

    var slides = document.querySelectorAll(".banner-slider img");
    var current = 0;

    if(slides.length < 2) return;

    setInterval(function(){
        slides[current].style.display = "none";
        current = (current + 1) % slides.length;
        slides[current].style.display = "block";
    }, 1500);

};
</script>

</body>
</html>
