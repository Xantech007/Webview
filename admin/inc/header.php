<?php
// admin/inc/header.php
session_start();

// Simple protection - redirect if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/../../config/database.php'; // adjust path if needed

// Determine current page (for hiding "Back to Dashboard" on dashboard itself)
$current_page = basename($_SERVER['PHP_SELF']);
$is_dashboard = ($current_page === 'dashboard.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BINANCE DIGITAL - Admin Panel</title>
  
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    :root {
      --bg: #0d1117;
      --card: #161b22;
      --text: #e6edf3;
      --text-muted: #8b949e;
      --primary: #1e90ff;
      --primary-dark: #1565c0;
      --green: #238636;
      --red: #f85149;
      --border: #30363d;
      --logout: #f85149;
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
      padding: 30px 20px;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    /* Updated header with buttons */
    .header-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .header-actions {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }
    .logo-section {
      text-align: center;
      flex: 1;
    }
    .logo img {
      width: 80px;
      height: auto;
      border-radius: 10px;
    }
    .page-title {
      font-size: 2.1rem;
      margin: 0.8rem 0 0.3rem;
    }
    .welcome {
      color: var(--text-muted);
      font-size: 1.1rem;
    }

    /* Buttons in header */
    .btn-header {
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
      padding: 0.7rem 1.4rem;
      border-radius: 8px;
      font-size: 0.98rem;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.2s;
      border: none;
      cursor: pointer;
    }
    .btn-back {
      background: var(--primary);
      color: white;
    }
    .btn-back:hover {
      background: var(--primary-dark);
    }
    .btn-logout {
      background: var(--logout);
      color: white;
    }
    .btn-logout:hover {
      background: #c62828;
    }

    /* Rest of your existing styles (stats-grid, card, etc.) remain unchanged */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 1.5rem;
      margin-bottom: 3rem;
    }
    .card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 1.8rem;
      text-align: center;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.4);
    }
    /* ... rest of your card, actions-grid, .btn styles ... */
  </style>
</head>
<body>

<div class="container">

  <header>
    <div class="header-top">
      <div class="header-actions">
        <?php if (!$is_dashboard): ?>
          <a href="dashboard.php" class="btn-header btn-back">
            <i class="fas fa-arrow-left"></i> Back to Dashboard
          </a>
        <?php endif; ?>
      </div>

      <div class="logo-section">
        <div class="logo">
          <img src="../assets/images/vip.jpg" alt="BINANCE DIGITAL">
        </div>
        <h1 class="page-title">Admin Panel</h1>
        <div class="welcome">
          Welcome back, <?= htmlspecialchars($_SESSION['admin_fullname'] ?? $_SESSION['admin_username'] ?? 'Admin') ?>
        </div>
      </div>

      <div class="header-actions">
        <a href="logout.php" class="btn-header btn-logout">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </div>
  </header>
