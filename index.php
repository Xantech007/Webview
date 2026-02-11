<?php
// index.php — exact visual clone of https://gs1dp5.optiseccs.com as of Feb 2025/2026
// Micheal — this is ready to run, no PHP logic yet (pure HTML+CSS replica)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>BINANCE DIGITAL</title>
    
    <!-- Link to CSS in the clean assets folder -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<!-- Repeated branding header (exact match) -->
<div class="branding">BINANCE DIGITAL</div>
<div class="branding">BINANCE DIGITAL</div>
<div class="branding">BINANCE DIGITAL</div>

<!-- Language selector (only visible option) -->
<div class="language">English</div>

<!-- Top action buttons -->
<div class="top-actions">
    <button class="action-btn">Recharge</button>
    <button class="action-btn">Withdraw</button>
    <button class="action-btn">App</button>
</div>

<!-- Bottom navigation bar (fixed at bottom) -->
<nav class="bottom-nav">
    <div>Regulatory Authority</div>
    <div>Home</div>
    <div>Task</div>
    <div>Team</div>
    <div>VIP</div>
    <div>Me</div>
</nav>

<!-- Main content wrapper -->
<main>

    <!-- VIP Levels section -->
    <h2 class="section-title">VIP Levels</h2>
    <div class="vip-grid">
        <div class="vip-item">
            <span class="vip-level">VIP1</span>
            <span class="vip-unlock">Unlock amount: $ 10.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP2</span>
            <span class="vip-unlock">Unlock amount: $ 50.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP3</span>
            <span class="vip-unlock">Unlock amount: $ 200.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP4</span>
            <span class="vip-unlock">Unlock amount: $ 600.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP5</span>
            <span class="vip-unlock">Unlock amount: $ 1,200.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP6</span>
            <span class="vip-unlock">Unlock amount: $ 2,400.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP7</span>
            <span class="vip-unlock">Unlock amount: $ 4,800.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP8</span>
            <span class="vip-unlock">Unlock amount: $ 9,600.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP9</span>
            <span class="vip-unlock">Unlock amount: $ 19,200.00</span>
        </div>
        <div class="vip-item">
            <span class="vip-level">VIP10</span>
            <span class="vip-unlock">Unlock amount: $ 38,400.00</span>
        </div>
    </div>

    <!-- Member / Earnings showcase -->
    <h2 class="section-title">Member</h2>
    <div class="member-list">
        <div class="member-entry">
            <span class="member-vip">VIP2</span>
            <span class="member-profit">+$ 16.00</span>
            <span class="member-name">DFFDD******</span>
        </div>
        <div class="member-entry">
            <span class="member-vip">VIP5</span>
            <span class="member-profit">+$ 480.00</span>
            <span class="member-name">******98554</span>
        </div>
        <div class="member-entry">
            <span class="member-vip">VIP3</span>
            <span class="member-profit">+$ 68.00</span>
            <span class="member-name">cxvbb******</span>
        </div>
        <div class="member-entry">
            <span class="member-vip">VIP6</span>
            <span class="member-profit">+$ 1,104.00</span>
            <span class="member-name">fgfghgh******</span>
        </div>
        <div class="member-entry">
            <span class="member-vip">VIP4</span>
            <span class="member-profit">+$ 216.00</span>
            <span class="member-name">******2154</span>
        </div>
        <!-- You can duplicate more entries here if you want longer scroll -->
    </div>

</main>

</body>
</html>
