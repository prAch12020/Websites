<?php
	require_once 'config.php';
	$order = getOrder();
	$mpesa_code = $_POST['mpesa_code'];
	$id=$_GET['id'];
	$sql = "INSERT INTO `tbl_paymentdetails`(`shippingdetail_id`, `order_id`, `payment_details`) VALUES ('$id', '$order', '$mpesa_code'); ";
	$result = mysqli_query($GLOBALS['conn'], $sql);

	if($result)
		savePayment();
	else
		echo "Error in processing payment". mysqli_error($GLOBALS['conn']);		
	mysqli_close($GLOBALS['conn']);
?>