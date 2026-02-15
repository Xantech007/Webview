<?php
// index.php - Main protected page

require_once 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$page_title = SITE_NAME;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>BINANCE DIGITAL</title>
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Top Bar -->
<div class="top-bar">
    <div class="balance">$0</div>
    <div class="icons">
        <img src="https://img.icons8.com/fluency/48/000000/gold-medal.png" alt="medal">
        <img src="https://img.icons8.com/fluency/48/000000/coins.png" alt="coins">
        <img src="https://img.icons8.com/fluency/48/000000/diamond.png" alt="diamond">
    </div>
</div>

<!-- Countdown Section -->
<div class="countdown-section">
    <div class="ultimate-title">THE ULTIMATE GUIDE</div>
    <div class="timer">02:24:32</div>
</div>

<!-- Task Hall -->
<div class="task-hall">
    <div class="task-title">Task Hall - The Most Real Candidate</div>
    <div class="task-list">
        <div class="task-item">
            <div class="task-left">
                <img class="lock-icon" src="https://img.icons8.com/fluency/48/lock.png" alt="lock">
                <span>$10.00</span>
            </div>
            <div class="progress-bar"><div class="progress-fill yellow-bar" style="width:0%"></div></div>
        </div>
        <!-- Repeat for other VIP levels -->
        <div class="task-item">
            <div class="task-left">
                <img class="lock-icon" src="https://img.icons8.com/fluency/48/lock.png" alt="lock">
                <span>$50.00</span>
            </div>
            <div class="progress-bar"><div class="progress-fill yellow-bar" style="width:0%"></div></div>
        </div>
        <!-- Add all 10 as in original -->
    </div>
</div>

<!-- Member Hall -->
<div class="member-hall">
    <div class="member-title">Member</div>
    <div class="member-item">
        <div class="member-left">VIP2</div>
        <div class="member-right">+$16.00</div>
    </div>
    <!-- Add more as in original -->
</div>

<!-- Bottom Regulatory Section -->
<div class="bottom-section">
    <img class="lock-big" src="https://img.icons8.com/fluency/96/lock.png" alt="big lock">
    <div class="safe-text">KEEP YOUR ASSETS SAFE</div>
    <div class="time-text">24/7 SUPPORT</div>
</div>

<!-- Bottom Navigation -->
<div class="bottom-nav">
    <div>Regulatory Authority</div>
    <div>Home</div>
    <div>Task</div>
    <div>Team</div>
    <div>VIP</div>
    <div>Me</div>
</div>

</body>
</html>
