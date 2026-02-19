<?php require "../app/views/layouts/header.php"; ?>

<div class="auth-box">
    <h2>Login</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <form method="POST" action="/loginPost">

        <input type="email" name="email" placeholder="Email Address" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>

    </form>

    <p>Don't have an account? <a href="/register">Register</a></p>
</div>

<?php require "../app/views/layouts/footer.php"; ?>
