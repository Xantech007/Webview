<?php

/* CONNECT DATABASE IF NOT CONNECTED */

if (!isset($conn)) {

    require_once __DIR__ . "/../config/database.php";

    $db = new Database();
    $conn = $db->connect();
}

/* GET WHATSAPP NUMBER */

$whatsapp = '';

try {

    $stmt = $conn->prepare("SELECT whatsapp FROM admins LIMIT 1");
    $stmt->execute();

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($admin['whatsapp'])) {

        $whatsapp = preg_replace('/[^0-9]/', '', $admin['whatsapp']);
    }

} catch (Exception $e) {

    $whatsapp = '';
}

?>

<?php if(!empty($whatsapp)): ?>

<a href="https://wa.me/<?php echo $whatsapp; ?>"
   class="whatsapp-support-btn"
   target="_blank">

    <i class="fa-brands fa-whatsapp"></i>

</a>

<?php endif; ?>

<style>

.whatsapp-support-btn{
    position:fixed;
    right:18px;
    bottom:95px;
    width:60px;
    height:60px;
    background:#25D366;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    z-index:100000;
    box-shadow:0 4px 15px rgba(0,0,0,0.35);
    animation:whatsappPulse 1.5s infinite;
}

.whatsapp-support-btn i{
    color:#fff;
    font-size:34px;
}

.whatsapp-support-btn:hover{
    transform:scale(1.08);
}

@keyframes whatsappPulse{

    0%{
        transform:scale(1);
    }

    50%{
        transform:scale(1.08);
    }

    100%{
        transform:scale(1);
    }
}

</style>
