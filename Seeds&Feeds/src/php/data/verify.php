<?php 
if($_POST['dig1']+$_POST['dig2']+$_POST['dig3']+$_POST['dig4']+$_POST['dig5']+$_POST['dig6'] == $_SESSION['email-code']){
	echo "Email Address verified successfully";
}
if($_POST['num1']+$_POST['num2']+$_POST['num3']+$_POST['num4'] == $_SESSION['phone-code']){
	echo "Phone Number verified successfully";
}
?>