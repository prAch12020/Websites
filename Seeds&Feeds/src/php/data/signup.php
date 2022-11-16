<?php 

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role = $_POST['role'];

require_once 'config.php';
signup($fname, $lname, $email, $phone, $password, $role); 
?>