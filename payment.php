<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 2">
	<meta name="keywords"    content="COS100011, assignment 2, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/style3.css">
    <script src="scripts/payment3.js"></script>
	<title>Payment</title>
</head>
<body>
	<?php
		$page = "paymentPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
	?>

	<main>					<!-- main content starts here -->
		<h1 class="align-center">Please confirm the information below</h1>
		<form id="paymentForm" method="post" action="process_order.php" novalidate="novalidate">		<!-- form to submit to server -->
			<fieldset>				<!-- Customer's personal details -->
				<legend>Personal details</legend>
				<p>Full Name: <span id="fullName"></span></p>							<!-- name -->
				<p>Email: <span id="email"></span></p>									<!-- email -->
				<p>Address: <span id="address"></span></p>								<!-- address -->
				<p>Suburb/Town: <span id="suburb"></span></p>							<!-- suburb -->
				<p>State: <span id="state"></span></p>									<!-- state -->
				<p>Post Code: <span id="postCode"></span></p>							<!-- post code-->
				<p>Phone number: <span id="phone"></span></p>							<!-- phone -->
				<p>Contact method: <span id="contact"></span></p>						<!-- contact method -->
			</fieldset>

			<fieldset>				<!-- Customer's enquiry details -->
				<legend>Your enquiries</legend>
				<p>Enquire about: <span id="enquire"></span></p>
				<p>Chosen product features: <span id="feature"></span></p>				<!-- displays all the chosen products information from enquire.html -->
				<p>Your comment: <span id="comment"></span></p>							<!-- customer's comment -->
			</fieldset>

			<fieldset>				<!-- Purchase information -->
				<legend>Your Selected Products</legend>
				<div id="purchases"></div>
				<p class="align-center">Total bill: <span id="cost"></span></p>			<!-- display total cost -->
			</fieldset>

			<fieldset>				<!-- Payment and card details -->
				<legend>Payment details</legend>
				<p>																<!-- Card types -->
					<label for="cardType">Card Type:</label>
					<select name="cardType" id="cardType">
						<option value="none">Please select your card type</option>
						<option value="visa">Visa</option>			
						<option value="master">MasterCard</option>
						<option value="amex">American Express</option>
					</select>
				</p>	
				<p>																<!-- Name on card -->
					<label for="cardName">Name on Card:</label> 
					<input type="text" name= "cardName" id="cardName" >
				</p>
				<p> 															<!-- Card number -->
					<label for="cardNumber">Card Number:</label> 
					<input type="text" name= "cardNumber" id="cardNumber"  >
				</p>
				<p> 															<!-- Expiry date -->
					<label for="cardExpiry">Card Expiry date:</label> 
					<input type="text" name= "cardExpiry" id="cardExpiry" placeholder="mm/yy" >
				</p>
				<p> 
					<label for="cardCVV">Card verification value:</label> 		<!-- Card CVV -->
					<input type="text" name= "cardCVV" id="cardCVV"  >
				</p>
			</fieldset>

			<!-- All the hidden inputs are declared here -->
			<input type="hidden" name="firstName" id="firstNameSend">
			<input type="hidden" name="lastName" id="lastNameSend">
			<input type="hidden" name="email" id="emailSend">
			<input type="hidden" name="address" id="addressSend">
			<input type="hidden" name="suburb" id="suburbSend">
			<input type="hidden" name="state" id="stateSend">
			<input type="hidden" name="postCode" id="postCodeSend">
			<input type="hidden" name="phone" id="phoneSend">
			<input type="hidden" name="contact" id="contactSend">
			<input type="hidden" name="enquire" id="enquireSend">
			<input type="hidden" name="features" id="featuresSend">
			<input type="hidden" name="comment" id="commentSend">
			<input type="hidden" name="purchases" id="purchasesSend">
			<input type="hidden" name="cost" id="costSend">

			<input type="hidden" name="isMerc" id="isMercSend">
			<input type="hidden" name="isAudi" id="isAudiSend">
			<input type="hidden" name="isBMW" id="isBMWSend">
			<input type="hidden" name="isTesla" id="isTeslaSend">

			<input type="hidden" name="mercQuantity" id="mercQuantitySend">
			<input type="hidden" name="audiQuantity" id="audiQuantitySend">
			<input type="hidden" name="bmwQuantity" id="bmwQuantitySend">
			<input type="hidden" name="teslaQuantity" id="teslaQuantitySend">

			<input type="hidden" name="mercColor" id="mercColorSend">
			<input type="hidden" name="audiColor" id="audiColorSend">
			<input type="hidden" name="bmwColor" id="bmwColorSend">
			<input type="hidden" name="teslaColor" id="teslaColorSend">

			<input type="hidden" name="mercModel" id="mercModelSend">
			<input type="hidden" name="audiModel" id="audiModelSend">
			<input type="hidden" name="bmwModel" id="bmwModelSend">
			<input type="hidden" name="teslaModel" id="teslaModelSend">

			<p>
				<input type="submit" value="Check Out" class="button">							<!-- submit form to server -->
				<input type="reset" value="Cancel Order" id="cancelOrder" class="button">		<!-- destroy the memory and redirect to index.html -->
			</p>
		</form>

	</main>

	<?php
		include_once("includes/footer.inc");
	?>
</body>
</html>