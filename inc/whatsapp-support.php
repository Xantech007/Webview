<?php

if (!isset($pdo)) {
    require_once __DIR__ . "/../config/database.php";
}

/* FETCH WHATSAPP NUMBER */
$adminStmt = $pdo->prepare("SELECT whatsapp FROM admins LIMIT 1");
$adminStmt->execute();

$admin = $adminStmt->fetch(PDO::FETCH_ASSOC);

$whatsapp = !empty($admin['whatsapp'])
    ? preg_replace('/[^0-9]/', '', $admin['whatsapp'])
    : '';

?>

<?php if(!empty($whatsapp)): ?>

<a href="https://wa.me/<?php echo $whatsapp; ?>"
   class="whatsapp-support-btn"
   target="_blank">

    <i class="fa-brands fa-whatsapp"></i>

</a>

<style>

.whatsapp-support-btn{
    position:fixed;
    right:18px;
    bottom:90px;
    width:58px;
    height:58px;
    background:#25D366;
    color:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
    text-decoration:none;
    box-shadow:0 4px 12px rgba(0,0,0,0.25);
    z-index:99999;
    animation:whatsappPulse 1.5s infinite;
}

.whatsapp-support-btn:hover{
    transform:scale(1.08);
}

@keyframes whatsappPulse{

    0%{
        box-shadow:0 0 0 0 rgba(37,211,102,0.6);
    }

    70%{
        box-shadow:0 0 0 15px rgba(37,211,102,0);
    }

    100%{
        box-shadow:0 0 0 0 rgba(37,211,102,0);
    }

}

</style>

<?php endif; ?>
