<?php 
require_once 'config.php';
$id = $_GET['id'];
$conn = connect();
$sql = "UPDATE `tbl_requests` SET `visit` = 'Scheduled' WHERE `tbl_requests`.`request_id` = ". $id;
if($results = mysqli_query($conn,$sql)){
	header('location:../vet.php');
}

?>