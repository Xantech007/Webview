<?php
$page_title = "Dashboard";
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/db.php';

// Protect page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Welcome, <?= htmlspecialchars($user['username'] ?? 'User') ?>!</h4>
            </div>
            <div class="card-body">
                <p>This is your dashboard.</p>
                <p>Email: <strong><?= htmlspecialchars($user['email']) ?></strong></p>
                <p>Member since: <strong><?= date('M d, Y', strtotime($user['created_at'])) ?></strong></p>

                <a href="logout.php" class="btn btn-outline-danger mt-3">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
