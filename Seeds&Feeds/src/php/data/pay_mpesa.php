<?php
	require_once 'config.php';
	$conn = connect();
	$mpesa_code = $_POST['mpesa_code'];
	$id = getOrder();
	$id1 = getProductOrder();
	$id=$_GET['id'];
	$sql = "INSERT INTO `tbl_paymentdetails`(`shippingdetail_id`, `order_id`, `paymentdetails`) VALUES ('$id', $id, '$mpesa_code'); ";
	$sql1 = "INSERT INTO `tbl_paymentdetails`(`shippingdetail_id`, `inputorder_id`, `paymentdetails`) VALUES ('$id', $id1, '$mpesa_code'); ";
	
	if(isset($_SESSION['farmer'])){
		mysqli_query($conn, $sql);
		savePayment();
	}

	if(isset($_SESSION['buyer'])){
		mysqli_query($conn, $sql1);
		savePayment();
	}
		
	else
		echo "Error in processing payment". mysqli_error($conn);		
	mysqli_close($conn);
?>