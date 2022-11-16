<?php 	
	include_once 'templates/header.php';
	require_once 'config.php';
	$id = getShipping();
?>
<main><br><br><br><br>
	<h2 align='center'> Select payment method</h2>
	<div class="pay-container">
		<input type='hidden' id='amount' value='<?php echo $_SESSION['tot'] + 100; ?>'>
		<div class="button-align">
			<button title="M-Pesa" class="tablinks active-tab" onclick="openMenu(event, 'pay_mpesa')">
				<img src="../../images/mpesa.png" width="55px" height="50px"/>
			</button>
			<button title="Card" class="tablinks " onclick="openMenu(event, 'pay_visa')">
				<img src="../../images/visa.png" width="50px" height="50px" />
			</button>
			<button title="Cash | Cheque" class="tablinks" onclick="openMenu(event, 'pay_cash')">
		  		<img src="../../images/cheque.png" width="50px" height="50px"/>
		  	</button>
			<div id="paypal_btn" title="PayPal" id='paypal_btn' class="tablinks">
				<input type="hidden" name="formtype" value="4">
			</div>
      </div>
		<section id="pay_options">
			<div id="pay_visa" class="tabcontent paymethod">
				<h2 style="color: #dd9e07;">Debit/Credit Card</h2>
			 	<h3>Fill The Form Below</h3>
				<form method="post">
					<input type="hidden" name="formtype" value="3">
					<div class='formpanel'>
						<div>
							<label for='name_card'>Name on Card:</label>
							<br><br>
							<label for='card_no'>Card Number:</label>
							<br><br>
							<label for="calendar">Expiry:</label>
							<br><br>
							<label for="cvv">CVV:</label>
							<br><br>
							<label for='city'>City:</label>
							<br><br>
							<label for='country'>Country:</label>
							<br><br>
						</div>
						<div>
							<input type="text" id="name_card" name="name_card" required>
							<br><br>	
							<input type="text" id="card_no" name="card_no" required>	
							<br><br>
							<input id='calendar' name="date" required />
							<br><br>				
							<input type="number" id="cvv" min='100' max='999' name="cvv" required>
							<br><br>				    
							<input type="text" id="city" name="city" required>
							<br><br>					
							<input type="text" id="country" name="country" required>
							<br><br>
						</div>
					</div>
					<button type="submit" name='submit' class="paybtn">Pay Now</button>
				</form>
				<?php
					if(isset($_POST['submit']))
						insertCard($id);
				?>
			</div>

			<div id="pay_mpesa" class="tabcontent paymethod">
			  	<h2 style="color: #68b916;">Mpesa</h2>
				<form action="pay_mpesa.php?id=<?php echo $id; ?>" method="post">
					<input type="hidden" name="formtype" value="1">
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
					<button type="submit" class="paybtn">Pay Now</button> 
				</form>
			</div>

			<div id="pay_cash" class="tabcontent paymethod">
			  	<h2 style="color: #07c9dd">Cash / Cheque</h2>
				<form action="pay_cash.php?id=<?php echo $id; ?>" method="post">
					<input type="hidden" name="formtype" value="2">
					<p>Please pick the method of payment<br>
					<b>Note that this method of payment will apply on delivery</b></p>
					<input type="radio" id="cash" name="cash-cheque" onclick="enableEdit('cash_order', 'cheque_order', this.checked)">
					<label for="cash" >Cash</label>
					<input type="radio" id="cheque" name="cash-cheque" onclick="enableEdit('cheque_order', 'cash_order', this.checked)">
					<label for="cheque">Cheque</label>					        
					<br><br>
					<div class='formpanel'>
						<div>
							<label for="cash_order"><strong>Cash Receipt Number: &nbsp;</strong></label>
							<br><br>
							<label for="cheque_order"><strong>Cheque Number: &nbsp;</strong></label>
						</div>
						<div>
							<input class='paymode_delivery' type="number" name="cash_order" id="cash_order" disabled>
							<br><br>
							<input class='paymode_delivery' type="number" name="cheque_order" id="cheque_order" disabled>
						</div>
					</div><br><br>
					<button type="submit" class="paybtn">Pay Now</button>
				</form>
			</div>
		</section>				
	</div>
</main>
<script src="https://jsuites.net/v4/jsuites.js"></script>
<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script>
	let currentDte= new Date().toISOString().slice(0, 10);
	jSuites.calendar(document.getElementById('calendar'), {
		type: 'year-month-picker',
		format: 'MMM-YYYY',
		validRange: [currentDte, new Date().getFullYear+10]
	});
	$("#zoid-paypal-buttons-uid_f371156971_mdc6mdc6mjc").html = " ";
</script>
	
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" ></script>
  <script>
    function initPayPalButton() {
		let amount = (document.getElementById('amount').value)/121;
      	paypal.Buttons({
			createOrder: function(data, actions) {
			return actions.order.create({
				purchase_units: [{"amount":{"currency_code":"USD","value":amount.toFixed(2)}}]
			});
			},

			onApprove: function(data, actions) {
				return actions.order.capture().then(function(orderData) {
				
				// Full available details
				console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
				actions.redirect('thanks.php');
				
			});
			},

			onError: function(err) {
				console.log(err);
			}
		}).render('#paypal_btn');
		}
		initPayPalButton();
  </script>
<?php include_once 'templates/footer.php'; ?>