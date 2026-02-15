<?php
// index.php - Exact clone of the BINANCE DIGITAL page you showed
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
  <title>BINANCE DIGITAL</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #0a0e17;
      color: #e0e0e0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      min-height: 100vh;
      padding-bottom: 90px;
    }

    /* Header / Balance bar */
    .top-bar {
      background: linear-gradient(180deg, #1a2538, #0f1622);
      padding: 12px 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #2a3b5c;
    }

    .balance {
      font-size: 1.4rem;
      font-weight: bold;
      color: #f0b90b;
    }

    .icons {
      display: flex;
      gap: 16px;
    }

    .icons img {
      width: 28px;
      height: 28px;
      object-fit: contain;
    }

    /* Countdown + Ultimate Guide */
    .countdown-section {
      background: #111827;
      padding: 16px;
      text-align: center;
      border-bottom: 1px solid #2a3b5c;
    }

    .ultimate-title {
      font-size: 1.35rem;
      font-weight: 700;
      color: #f0b90b;
      margin-bottom: 8px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .timer {
      font-size: 1.5rem;
      font-weight: bold;
      color: #ff4d4f;
      background: rgba(255, 77, 79, 0.12);
      display: inline-block;
      padding: 6px 16px;
      border-radius: 30px;
      border: 1px solid #ff4d4f;
    }

    /* Task Hall */
    .task-hall {
      padding: 16px;
    }

    .task-title {
      font-size: 1.3rem;
      color: #f0b90b;
      margin-bottom: 12px;
      font-weight: 600;
    }

    .task-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .task-item {
      background: #111827;
      border: 1px solid #2a3b5c;
      border-radius: 10px;
      padding: 14px 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .task-left {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .lock-icon {
      width: 24px;
      height: 24px;
    }

    .task-text {
      font-size: 1rem;
      color: #d0d0d0;
    }

    .progress-bar {
      width: 100%;
      height: 6px;
      background: #2a3b5c;
      border-radius: 3px;
      margin-top: 8px;
      overflow: hidden;
    }

    .progress-fill {
      height: 100%;
      background: linear-gradient(90deg, #f0b90b, #ffc107);
      width: 0%; /* change per item if you want different progress */
      border-radius: 3px;
    }

    .yellow-bar {
      background: #f0b90b;
      height: 100%;
    }

    /* Member Hall */
    .member-hall {
      padding: 16px;
      margin-top: 12px;
    }

    .member-title {
      font-size: 1.3rem;
      color: #f0b90b;
      margin-bottom: 12px;
      font-weight: 600;
    }

    .member-item {
      background: #111827;
      border: 1px solid #2a3b5c;
      border-radius: 10px;
      padding: 12px 16px;
      margin-bottom: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.95rem;
    }

    .member-left {
      color: #d0d0d0;
    }

    .member-right {
      color: #f0b90b;
      font-weight: bold;
    }

    /* Bottom Regulatory + Lock */
    .bottom-section {
      padding: 16px;
      text-align: center;
      background: #0f1622;
      border-top: 1px solid #2a3b5c;
    }

    .lock-big {
      width: 60px;
      height: 60px;
      margin: 12px auto;
    }

    .safe-text {
      font-size: 1.1rem;
      color: #f0b90b;
      margin: 8px 0;
      font-weight: 600;
    }

    .time-text {
      font-size: 0.95rem;
      color: #a0a0a0;
    }

    /* Bottom Navigation */
    .bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: #0B0E11;
      border-top: 2px solid #f0b90b;
      display: flex;
      justify-content: space-around;
      padding: 10px 0;
      font-size: 0.8rem;
      color: #f0b90b;
      box-shadow: 0 -4px 12px rgba(240, 185, 11, 0.15);
    }

    .bottom-nav div {
      text-align: center;
      flex: 1;
      padding: 6px 4px;
    }

    /* Responsive adjustments */
    @media (min-width: 480px) {
      .top-bar, .task-hall, .member-hall, .bottom-section {
        padding-left: 24px;
        padding-right: 24px;
      }
    }
  </style>
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
      <div class="task-item">
        <div class="task-left">
          <img class="lock-icon" src="https://img.icons8.com/fluency/48/lock.png" alt="lock">
          <span>$50.00</span>
        </div>
        <div class="progress-bar"><div class="progress-fill yellow-bar" style="width:0%"></div></div>
      </div>
      <div class="task-item">
        <div class="task-left">
          <img class="lock-icon" src="https://img.icons8.com/fluency/48/lock.png" alt="lock">
          <span>$200.00</span>
        </div>
        <div class="progress-bar"><div class="progress-fill yellow-bar" style="width:0%"></div></div>
      </div>
      <div class="task-item">
        <div class="task-left">
          <img class="lock-icon" src="https://img.icons8.com/fluency/48/lock.png" alt="lock">
          <span>$600.00</span>
        </div>
        <div class="progress-bar"><div class="progress-fill yellow-bar" style="width:0%"></div></div>
      </div>
      <div class="task-item">
        <div class="task-left">
          <img class="lock-icon" src="https://img.icons8.com/fluency/48/lock.png" alt="lock">
          <span>$1,200.00</span>
        </div>
        <div class="progress-bar"><div class="progress-fill yellow-bar" style="width:0%"></div></div>
      </div>
      <!-- Add more items as needed -->
    </div>
  </div>

  <!-- Member Hall -->
  <div class="member-hall">
    <div class="member-title">Member</div>
    <div class="member-item">
      <div class="member-left">VIP2</div>
      <div class="member-right">+$16.00</div>
    </div>
    <div class="member-item">
      <div class="member-left">VIP5</div>
      <div class="member-right">+$480.00</div>
    </div>
    <div class="member-item">
      <div class="member-left">VIP3</div>
      <div class="member-right">+$68.00</div>
    </div>
    <!-- more members -->
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
