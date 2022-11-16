<?php 

$vet = $_POST['vet'];
$msg = $_POST['msg'];
$date = $_POST['date'];

require_once 'config.php';
contactVet($vet, $msg, $date);