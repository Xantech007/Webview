<?php
$is_logged_in = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="<?= SITE_URL ?>"><?= SITE_NAME ?></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= SITE_URL ?>">Home</a>
                </li>
                <?php if ($is_logged_in): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= SITE_URL ?>pages/dashboard.php">Dashboard</a>
                </li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav ms-auto">
                <?php if ($is_logged_in): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE_URL ?>pages/logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE_URL ?>pages/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE_URL ?>pages/register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
