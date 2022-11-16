<?php 
	require_once 'data/config.php';
	$_SESSION['title'] = "Seeds & Feeds | Shipping Information";
	include_once 'header.php';
	if(getPreviousPage() == 'trolley')
		$_SESSION['farmer'] = true;
	else if(getPreviousPage() == 'cart')
		$_SESSION['buyer'] = true;
?>
</section>

	<h2 class="animate__animated animate__fadeInDown">Shipping Information.</h2>
<main><br>
	<section id='ship-details'>
	<h3>Enter your Shipping Address</h3><br>
		<div class="details-body">
			
	
		<form action="payment.php" method="post">
			<label for="client_name">Name: </label><br>
			<input type="text" name="client_name" id="client_name">
			<br><br>

			<label for="client_phone">Phone number: </label><br>
			<input type="text" name="client_phone" id="client_phone">
			<br><br>

			<label for="client_email">Email: </label><br>
			<input type="text" name="client_email" id="client_email">
			<br><br>

			<label for="client_location">Street Address: </label><br>
			<input type="text" name="client_location" id="client_location">
			<br><br>

			<label for="client_city">City: </label><br>
			<input type="text" name="client_city" id="client_city">
			<br><br>

			<label for="client_country">Country: </label><br>
			<input type="text" name="client_country" id="client_country" value='Kenya'>
			<br><br>

			<button class="save pri-button" name='save'>Confirm</button>
		</form>
		<div id="shipping-invoice">
			<h1>Your Order</h1>
			<table>
				<tr>
					<th><strong>SUBTOTAL</strong></th>
					<td>Ksh. <?php echo $_SESSION['tot'] ?>.00</td>
				</tr>
				<tr>
					<td><strong>Shipping</strong></td>
					<td>Ksh. 100.00</td>
				</tr>
				<tr>
					<td><strong>TOTAL</strong></td>
					<td>Ksh. <?php echo $_SESSION['tot'] + 100.00 ?>.00</td>
				</tr>
			</table>
		</div>
</main><br><br>

<?php include_once 'footer.php'; ?>