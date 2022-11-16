<?php
require_once 'config.php'; 
$value;
$id=$_GET['id'];
if(isset($_POST['cheque_order'])){
	$value = $_POST['cheque_order'];
}
else{
	$value = $_POST['cash_order'];
}
$order = getOrder();
$sql = "INSERT INTO `tbl_paymentdetails`(`shippingdetail_id`, `order_id`, `payment_details`) VALUES ('$id', '$order', '$value'); ";
$result = mysqli_query($GLOBALS['conn'], $sql);

if($result)
	savePayment();
else
	echo "Error in processing payment". mysqli_error($GLOBALS['conn']);		
mysqli_close($GLOBALS['conn']);
?>