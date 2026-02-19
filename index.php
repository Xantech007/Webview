<?php
session_start();
require_once 'includes/db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* =========================
   GET USER DATA SECURELY
========================= */
$stmt = $conn->prepare("SELECT balance, username FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$balance = $user ? $user['balance'] : 0;
$username = $user ? htmlspecialchars($user['username']) : "User";

/* =========================
   TASK LEVELS ARRAY
========================= */
$tasks = [
    10, 50, 200, 600, 1200,
    2400, 4800, 9600, 19200, 38400
];

/* =========================
   COUNTDOWN TIMER (2 HOURS)
========================= */
$end_time = time() + (2 * 60 * 60); // 2 hours
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="assets/css/style.css">

<style>
body {margin:0;font-family:Arial;background:#111;color:#fff;}
.top-bar {display:flex;justify-content:space-between;padding:15px;background:#1c1c1c;}
.balance {font-size:18px;font-weight:bold;color:#00ff99;}
.countdown-section{text-align:center;padding:20px;background:#222;}
.timer{font-size:28px;color:#ffcc00;margin-top:10px;}
.task-hall{padding:15px;}
.task-item{background:#1e1e1e;padding:10px;margin-bottom:10px;border-radius:6px;}
.progress-bar{height:6px;background:#333;border-radius:5px;margin-top:5px;}
.progress-fill{height:6px;background:#00ff99;border-radius:5px;width:0%;}
.member-hall{padding:15px;background:#181818;}
.member-item{display:flex;justify-content:space-between;margin-bottom:8px;}
.bottom-section{text-align:center;padding:20px;background:#222;}
.bottom-nav{display:flex;justify-content:space-around;background:#1c1c1c;padding:10px 0;position:fixed;bottom:0;width:100%;}
.bottom-nav a{text-decoration:none;color:#fff;font-size:14px;}
</style>
</head>

<body>

<!-- TOP BAR -->
<div class="top-bar">
    <div>Welcome, <?php echo $username; ?></div>
    <div class="balance">$<?php echo number_format($balance, 2); ?></div>
</div>

<!-- COUNTDOWN -->
<div class="countdown-section">
    <div>THE ULTIMATE GUIDE</div>
    <div class="timer" id="timer"></div>
</div>

<!-- TASK HALL -->
<div class="task-hall">
    <h3>Task Hall</h3>

    <?php foreach ($tasks as $task): ?>
        <div class="task-item">
            <div>$<?php echo number_format($task, 2); ?></div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<!-- MEMBER HALL -->
<div class="member-hall">
    <h3>VIP Earnings</h3>

    <?php
    $vip_levels = [
        "VIP2" => 16,
        "VIP3" => 68,
        "VIP4" => 216,
        "VIP5" => 480,
        "VIP6" => 1104,
        "VIP7" => 2496,
        "VIP10" => 32640
    ];

    foreach ($vip_levels as $vip => $amount):
    ?>
        <div class="member-item">
            <div><?php echo $vip; ?></div>
            <div>+$<?php echo number_format($amount, 2); ?></div>
        </div>
    <?php endforeach; ?>

</div>

<!-- BOTTOM SECTION -->
<div class="bottom-section">
    <div>KEEP YOUR ASSETS SAFE</div>
    <div>24/7 SUPPORT</div>
</div>

<!-- NAVIGATION -->
<div class="bottom-nav">
    <a href="#">Regulatory</a>
    <a href="dashboard.php">Home</a>
    <a href="tasks.php">Task</a>
    <a href="team.php">Team</a>
    <a href="vip.php">VIP</a>
    <a href="profile.php">Me</a>
</div>

<!-- COUNTDOWN SCRIPT -->
<script>
let countDownDate = <?php echo $end_time * 1000; ?>;

let x = setInterval(function() {
    let now = new Date().getTime();
    let distance = countDownDate - now;

    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("timer").innerHTML =
        hours + "h " + minutes + "m " + seconds + "s ";

    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timer").innerHTML = "EXPIRED";
    }
}, 1000);
</script>

</body>
</html>
