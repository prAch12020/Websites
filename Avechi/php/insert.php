<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thankyou</title>
	<link href="https://fonts.googleapis.com/css2?family=Luxurious+Script&family=Pacifico&display=swap" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: 'Pacifico', cursive;
			font-size: 40px;
			color: white;
			padding-top: 90px;
		}
		h3{
			font-size: 40px;
			color: white;
		}
		center{
			width: 382px;  
        overflow: hidden;  
        margin: auto;  
        margin: 20 0 0 450px;  
        padding: 80px;

        background: #130435;  
        border-radius: 15px ; 
		}
	</style>
</head>
<body>
	<center>
		<?php
		require_once "../config.php";
		

        
		$nameoncard = $_POST['name_card'];
		$card_no =$_POST['card_no'];
		$expmonth = $_POST['expmonth'];
		$expyear =$_POST['expyear'];
		$cvv = $_POST['cvv'];
		$city = $_POST['city'];
		$country = $_POST['country'];


		$sql = "INSERT INTO credit_method VALUES (DEFAULT,'$nameoncard','$card_no','$expmonth','$expyear','$cvv','$city','$country')";
		if(mysqli_query($con, $sql)){
			echo "<h3> Thank you <br>"

			     ."payment made successfull";


			 } else{
			 	echo "Error: payment not successfull". mysqli_error($con);
			 }
			 mysqli_close($con);

		

		


	
			
		
			 ?>	
	</center>

</body>
</html>