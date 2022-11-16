<?php 	
	require_once 'data/config.php';
	$_SESSION['title'] = "Seeds & Feeds | Payment Information";
	include_once 'header.php';
	saveShipping();
?>
</section>
<?php
	$id = getShipping();
?>

	<h2 class="animate__animated animate__fadeInDown">Payment</h2>
<main ><br><br>
	<div class="pay-container">
		<input type='hidden' id='amount' value='<?php echo $_SESSION['tot'] + 100; ?>'>
		<p>Total: <?php echo $_SESSION['tot'] + 100; ?></p>
				<img src="../../images/mpesa.png" width="55px" height="50px"/>
			<section id="pay_options">
				<div id="pay_mpesa" class="tabcontent paymethod">
			  	<h2 style="color: #68b916;">Mpesa</h2>
					<form action="data/pay_mpesa.php?id=<?php echo $id; ?>" method="post">
						<ol>
						    <li>Go to M-PESA on your phone menu.</li>
						    <li>Select PayBill.</li>
						    <li>Enter the Business Number: <strong>242424</strong></li>
						    <li>Enter your <strong>name</strong> as the <strong>Account Number</strong></li>
						    <li>Enter the <strong>amount</strong></li>
						    <li>Enter your <strong>pin</strong> and Pay</li>
						</ol> 
						<label for="mpesa_code">Fill the Mpesa <strong>Transaction Code</strong> </label><br><br>
						<input type="text" name="mpesa_code" id="mpesa_code">
						<br><br>
						<button type="submit" class="pri-button paybtn">Pay Now</button> 
				</form>
			</div>
		</section>				
	</div>
</main>
<?php include_once 'footer.php'; ?>