<?php 

$email = $_POST['em'];
$password = $_POST['pass'];

require_once 'config.php';
login($email, $password); 
?>