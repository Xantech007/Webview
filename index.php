<?php
$page_title = "Home";
require_once __DIR__ . '/includes/header.php';
?>

<div class="text-center py-5">
    <h1 class="display-4 fw-bold">Welcome to <?= SITE_NAME ?></h1>
    <p class="lead text-muted mb-4">
        A modern web application — sign in or create an account to get started.
    </p>

    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
        <a href="pages/login.php" class="btn btn-primary btn-lg px-5">Login</a>
        <a href="pages/register.php" class="btn btn-outline-primary btn-lg px-5">Register</a>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
