<?php 
$id = $_GET['id'];
require_once 'config.php';
$conn = connect();
if(getPreviousPage() == 'seller'){
	$sql = "DELETE FROM `tbl_inputs` WHERE input_id = ".$id;
	if($results = mysqli_query($conn,$sql))
		header('location:../seller.php');
}
else if(getPreviousPage() == 'sell_produce'){
	$sql = "DELETE FROM `tbl_farmproduce` WHERE produce_id = ".$id;
	if($results = mysqli_query($conn,$sql))
		header('location:../sell_produce.php');
}
else if(getPreviousPage() == 'trolley'){
	if (!empty($_SESSION["shopping_cart"])) {
	    array_splice($_SESSION["shopping_cart"], $id, 1);
		header('location:../trolley.php');
	}
}
else if(getPreviousPage() == 'cart'){
	if (!empty($_SESSION["shopping_cart"])) {
	    array_splice($_SESSION["shopping_cart"], $id, 1);
		header('location:../cart.php');
	}
}
else echo "Unable to delete. Try again";
?>