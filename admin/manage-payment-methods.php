<?php
require_once __DIR__ . '/inc/header.php';

$message='';
$error='';

/* Upload directories */

$qr_upload_dir=$_SERVER['DOCUMENT_ROOT']."/assets/images/qr/";
$logo_upload_dir=$_SERVER['DOCUMENT_ROOT']."/assets/images/";

$qr_url="assets/images/qr/";
$logo_url="assets/images/";

/* Ensure folders exist */

if(!is_dir($qr_upload_dir)) mkdir($qr_upload_dir,0755,true);
if(!is_dir($logo_upload_dir)) mkdir($logo_upload_dir,0755,true);


function uploadImage($file,$dir,$url_prefix){

if(empty($file['name'])) return null;

$allowed=['jpg','jpeg','png','webp','gif'];
$ext=strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));

if(!in_array($ext,$allowed)){
throw new Exception("Invalid image format.");
}

$filename=uniqid().".".$ext;
$target=$dir.$filename;

if(!move_uploaded_file($file['tmp_name'],$target)){
throw new Exception("Image upload failed.");
}

return $url_prefix.$filename;

}



if($_SERVER['REQUEST_METHOD']=="POST"){

try{

$action=$_POST['action'];

$name=trim($_POST['name']);
$crypto=(int)($_POST['crypto'] ?? 0);
$type=$_POST['type'] ?? null;
$status=(int)$_POST['status'];

$wallet_address=trim($_POST['wallet_address']);
$network=trim($_POST['network']);
$account_name=trim($_POST['account_name']);
$account_number=trim($_POST['account_number']);

if(!$name){
throw new Exception("Method name required");
}


/* upload qr */

$qr_image=uploadImage($_FILES['qr_image'],$qr_upload_dir,$qr_url);


/* upload logo */

$image=uploadImage($_FILES['image'],$logo_upload_dir,$logo_url);


if($action=="add"){

$stmt=$pdo->prepare("INSERT INTO payment_methods
(name,crypto,type,wallet_address,network,account_name,account_number,qr_image,image,status)
VALUES(?,?,?,?,?,?,?,?,?,?)");

$stmt->execute([
$name,
$crypto,
$type,
$wallet_address,
$network,
$account_name,
$account_number,
$qr_image,
$image,
$status
]);

$message="Payment method added";

}


if($action=="edit"){

$id=(int)$_POST['id'];

$current_qr=$_POST['current_qr'];
$current_logo=$_POST['current_logo'];

if(!$qr_image) $qr_image=$current_qr;
if(!$image) $image=$current_logo;

$stmt=$pdo->prepare("UPDATE payment_methods SET
name=?,
crypto=?,
type=?,
wallet_address=?,
network=?,
account_name=?,
account_number=?,
qr_image=?,
image=?,
status=?
WHERE id=?");

$stmt->execute([
$name,
$crypto,
$type,
$wallet_address,
$network,
$account_name,
$account_number,
$qr_image,
$image,
$status,
$id
]);

$message="Payment method updated";

}

}catch(Exception $e){

$error=$e->getMessage();

}

}



/* delete */

if(isset($_POST['action']) && $_POST['action']=="delete"){

$id=(int)$_POST['id'];

$stmt=$pdo->prepare("DELETE FROM payment_methods WHERE id=?");
$stmt->execute([$id]);

$message="Payment method deleted";

}



/* load */

$stmt=$pdo->query("SELECT * FROM payment_methods ORDER BY id DESC");
$methods=$stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main>

<h1 style="text-align:center;margin:30px 0;">Manage Payment Methods</h1>


<?php if($message): ?>
<div class="success"><?=htmlspecialchars($message)?></div>
<?php endif; ?>


<?php if($error): ?>
<div class="error"><?=htmlspecialchars($error)?></div>
<?php endif; ?>


<h2>Add Payment Method</h2>

<form method="POST" enctype="multipart/form-data">

<input type="hidden" name="action" value="add">


<label>Name</label>
<input type="text" name="name" required>


<label>Crypto?</label>
<select name="crypto">
<option value="1">Yes (Crypto)</option>
<option value="0">No</option>
</select>


<label>Type</label>
<select name="type">
<option value="">None</option>
<option value="bank">Bank</option>
<option value="momo">MOMO</option>
</select>


<label>Wallet Address</label>
<input type="text" name="wallet_address">


<label>Network / Bank</label>
<input type="text" name="network">


<label>Account Name / MOMO Name</label>
<input type="text" name="account_name">


<label>Account Number / MOMO Number</label>
<input type="text" name="account_number">


<label>QR Code</label>
<input type="file" name="qr_image">


<label>Logo</label>
<input type="file" name="image">


<label>Status</label>
<select name="status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>


<button>Add Method</button>

</form>



<h2 style="margin-top:50px;">Existing Methods</h2>

<table border="1" width="100%">

<tr>

<th>ID</th>
<th>Name</th>
<th>Logo</th>
<th>Crypto</th>
<th>Type</th>
<th>Network</th>
<th>Account</th>
<th>QR</th>
<th>Status</th>
<th>Action</th>

</tr>


<?php foreach($methods as $m): ?>

<tr>

<td><?=$m['id']?></td>

<td><?=$m['name']?></td>

<td>
<?php if($m['image']): ?>
<img src="/<?=$m['image']?>" width="40">
<?php endif; ?>
</td>

<td><?=$m['crypto']?></td>

<td><?=$m['type']?></td>

<td><?=$m['network']?></td>

<td><?=$m['account_number']?></td>

<td>
<?php if($m['qr_image']): ?>
<img src="/<?=$m['qr_image']?>" width="50">
<?php endif; ?>
</td>

<td><?=$m['status']?></td>

<td>

<form method="POST">
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?=$m['id']?>">
<button>Delete</button>
</form>

</td>

</tr>

<?php endforeach; ?>

</table>

</main>

<?php require_once __DIR__ . '/inc/footer.php'; ?>
