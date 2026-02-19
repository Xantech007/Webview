<?php require "../app/views/layouts/header.php"; ?>

<div class="cards">
    <div class="card">
        <h3>Balance</h3>
        <p>$<?= number_format($user['balance'],2) ?></p>
    </div>

    <div class="card">
        <h3>Total Tasks</h3>
        <p><?= $stats['total_tasks'] ?></p>
    </div>

    <div class="card">
        <h3>Total Deposits</h3>
        <p>$<?= number_format($stats['total_deposits'],2) ?></p>
    </div>

    <div class="card">
        <h3>Total Withdrawals</h3>
        <p>$<?= number_format($stats['total_withdrawals'],2) ?></p>
    </div>
</div>

<?php require "../app/views/layouts/footer.php"; ?>
