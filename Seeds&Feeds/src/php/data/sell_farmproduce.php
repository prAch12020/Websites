<?php 

$allowed = ["jpg", "jpeg", "png", "webp"];
$ext = strtolower(pathinfo($_POST['img'], PATHINFO_EXTENSION));
if (!in_array($ext, $allowed)) {
  	echo "$ext file type not allowed - " . $_POST['img'];
}
else{
	require_once 'config.php';
	addFarmProduce($_POST['name'], $_POST['desc'], $_POST['stock'], $_POST['unit'], $_POST['pri'], $_POST['img']);
}
 
?>