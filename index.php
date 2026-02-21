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
<div class="action-box">
    <a href="#" class="action-item">Recharge</a>
    <a href="#" class="action-item">Withdraw</a>
    <a href="#" class="action-item">App</a>
    <a href="#" class="action-item">Company Profile</a>
</div>

<?php include "inc/footer.php"; ?>
