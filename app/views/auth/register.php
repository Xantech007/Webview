<?php require "../app/views/layouts/header.php"; ?>

<div class="auth-box">
    <h2>Create Account</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form method="POST" action="/registerPost">

        <input type="text" name="username" placeholder="Username" required>

        <input type="email" name="email" placeholder="Email Address" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>

    </form>

    <p>Already have an account? <a href="/login">Login</a></p>
</div>

<?php require "../app/views/layouts/footer.php"; ?>
