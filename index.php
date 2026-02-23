<?php
require_once "config/database.php";

// Fetch latest news (you can limit if needed)
$query = $conn->query("SELECT title FROM news ORDER BY id DESC");
?>

<?php include "inc/header.php"; ?>

<!-- Scrolling News Section -->
<div class="news-wrapper">
    <div class="news-marquee">
        <div class="news-content">
            <?php
            while ($row = $query->fetch_assoc()) {
                echo "<span class='news-item'>" . htmlspecialchars($row['title']) . "</span>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Action Buttons Section -->
<div class="action-container">
    <a href="#" class="action-card">
        <div class="icon-circle">💰</div>
        <span>Recharge</span>
    </a>

    <a href="#" class="action-card">
        <div class="icon-circle">🏧</div>
        <span>Withdraw</span>
    </a>

    <a href="#" class="action-card">
        <div class="icon-circle">📥</div>
        <span>App</span>
    </a>

    <a href="#" class="action-card">
        <div class="icon-circle">📄</div>
        <span>Company Profile</span>
    </a>
</div>

<div class="banner-slider">
    <img src="assets/images/banner1.webp" class="slide">
    <img src="assets/images/banner2.webp" class="slide">
</div>


<?php include "inc/footer.php"; ?>
