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
    <div class="banner-track">
        <img src="assets/images/banner1.jpeg">
        <img src="assets/images/banner2.jpeg">
    </div>
</div>

<?php
$vipQuery = $conn->query("SELECT * FROM vip ORDER BY id ASC");
?>

<!-- ================= TASK HALL ================= -->

<?php
$vipQuery = $conn->query("SELECT * FROM vip WHERE status = 1 ORDER BY id ASC");
?>

<div class="task-section">
    <h2 class="task-title">Task Hall</h2>

    <?php while($vip = $vipQuery->fetch_assoc()): ?>
        <div class="task-card">

            <img src="assets/images/vip.jpg" class="task-left">

            <div class="task-content">
                <h3><?php echo htmlspecialchars($vip['name']); ?></h3>
                <p>Amount: ₦<?php echo number_format($vip['amount'],2); ?></p>
            </div>

            <img src="assets/images/arrow.jpeg" class="task-right">

        </div>
    <?php endwhile; ?>

</div>

<!-- ================= MEMBER LIST ================= -->

<div class="member-section">
    <h2 class="member-title">Member list</h2>

    <div class="member-grid">

        <?php
        $members = [
            ["VIP1","johnb****@gmail.com"],
            ["VIP2","maryc****@yahoo.com"],
            ["VIP3","alexd****@gmail.com"],
            ["VIP4","kelvine****@hotmail.com"],
            ["VIP5","amaka****@gmail.com"],
            ["VIP6","fghgh****@gmail.com"],
            ["VIP7","sandra****@yahoo.com"],
            ["VIP8","jamesk****@gmail.com"],
            ["VIP1","emilyt****@gmail.com"],
            ["VIP2","chinedu****@gmail.com"],
            ["VIP3","robertp****@gmail.com"],
            ["VIP4","danielm****@hotmail.com"],
            ["VIP5","victora****@gmail.com"],
            ["VIP6","precious****@gmail.com"],
            ["VIP7","anthony****@yahoo.com"],
            ["VIP8","gloria****@gmail.com"],
            ["VIP1","stephen****@gmail.com"],
            ["VIP2","mercy****@gmail.com"],
            ["VIP3","patrick****@hotmail.com"],
            ["VIP4","queen****@gmail.com"],
            ["VIP5","samuel****@gmail.com"],
            ["VIP6","esther****@yahoo.com"],
            ["VIP7","brian****@gmail.com"],
            ["VIP8","faith****@gmail.com"],
            ["VIP1","kelly****@gmail.com"],
            ["VIP2","isaac****@gmail.com"],
            ["VIP3","rachel****@gmail.com"],
            ["VIP4","tony****@gmail.com"],
            ["VIP5","blessing****@gmail.com"],
            ["VIP6","victor****@gmail.com"],
            ["VIP7","charles****@gmail.com"],
            ["VIP8","olivia****@gmail.com"],
            ["VIP1","henry****@gmail.com"],
            ["VIP2","grace****@gmail.com"],
            ["VIP3","benjamin****@gmail.com"],
            ["VIP4","david****@gmail.com"],
            ["VIP5","sophia****@gmail.com"],
            ["VIP6","andrew****@gmail.com"],
            ["VIP7","jennifer****@gmail.com"],
            ["VIP8","michael****@gmail.com"],
            ["VIP1","lucas****@gmail.com"],
            ["VIP2","emma****@gmail.com"],
            ["VIP3","noah****@gmail.com"],
            ["VIP4","liam****@gmail.com"],
            ["VIP5","ava****@gmail.com"],
            ["VIP6","ethan****@gmail.com"],
            ["VIP7","mia****@gmail.com"],
            ["VIP8","logan****@gmail.com"],
            ["VIP3","cvxbb****@gmail.com"],
            ["VIP6","fghgh****@gmail.com"]
        ];

        shuffle($members); // random order

        foreach($members as $member):
            $earning = rand(50, 1200); // random earning
        ?>

        <div class="member-card">
            <div class="vip-level"><?php echo $member[0]; ?></div>
            <div class="earning">+$<?php echo number_format($earning,2); ?></div>
            <div class="email"><?php echo $member[1]; ?></div>
        </div>

        <?php endforeach; ?>

    </div>
</div>

<?php include "inc/footer.php"; ?>
