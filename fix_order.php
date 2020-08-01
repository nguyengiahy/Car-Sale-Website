<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 3">
	<meta name="keywords"    content="COS100011, assignment 3, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/style3.css">
	<title>Fix order</title>
</head>
<body>
	<?php
		//Prevent accessing directly from URL
		if(!isset($_SERVER['HTTP_REFERER'])){
		    header('location:enquire.php');		//redirect to enquire.php if attempted to access directly
		    exit;
		}
        else{
			//Include header, navigation bar
			$page = "processPage";
			include_once("includes/header.inc");
			include_once("includes/nav.inc");
			//Print out error message
			session_start();
	    	print_r($_SESSION["errMsg"]);
	    }
    ?>
    	<!-- Display form again, filled with information entered from previous pages -->
    	<section>              
		<h1 class="align-center">Application Form</h1>
            <!-- Form -->
            <form class="container" method="post" action="process_order.php" id="enquireForm" novalidate="novalidate">
                <fieldset>                                                          
                    <legend>Applicant details</legend>
                    <p>
                        <label for="first_name">First Name:</label>                    <!-- first name -->
                        <input type="text" name="firstName" id="first_name" maxlength="25" size="30"
                            pattern="[a-zA-Z]{1,25}" required="required" value="<?php echo $_SESSION["fname"] ?>" />	<!-- get first name by SESSION -->
                    </p>
                    <p>
                        <label for="last_name">Last Name:</label>                       <!-- last name -->
                        <input type="text" name="lastName" id="last_name" maxlength="25" size="30"
                            pattern="[a-zA-Z]{1,25}" required="required" value="<?php echo $_SESSION["lname"] ?>"/>		<!-- get last name by SESSION -->
                    </p>
                    <p> 
                        <label for="email">Email:</label>                               <!-- email -->
                        <input type="email" name="email" id="email" required="required" value="<?php echo $_SESSION["email"] ?>"/>	<!-- get email by SESSION -->
                    </p>

                    <fieldset>
                        <legend>Address</legend>
                        <p> 
	                        <label for="address">Street Address:</label>               	<!-- address -->
	                        <input type="text" name="address" id="address" maxlength="40" size="45" required="required" 
	                        		value="<?php echo $_SESSION["address"] ?>"/>		<!-- get address by SESSION -->
	                    </p>
	                    <p>
	                        <label for="suburb">Suburb/Town:</label>                   <!-- suburb -->
	                        <input type="text" name="suburb" id="suburb" maxlength="20" size="25" pattern="[a-zA-Z]{1,20}" 
	                        		required="required" value="<?php echo $_SESSION["suburb"] ?>" />		<!-- get suburb by SESSION -->
	                    </p>
	                    <p>
	                        <label for="state">State:</label>                            <!-- state -->
	                        <select id="state" name="state">
			                    <option value="none">Please select</option>              <!-- Initial select -->
			                    <!-- check which state was selected -->
			                    <option value="VIC" <?php echo ($_SESSION["state"] == "VIC") ? "selected" : "" ?> >VIC</option>		
			                    <option value="NSW" <?php echo ($_SESSION["state"] == "NSW") ? "selected" : "" ?> >NSW</option>
			                    <option value="QLD" <?php echo ($_SESSION["state"] == "QLD") ? "selected" : "" ?> >QLD</option>
			                    <option value="NT"  <?php echo ($_SESSION["state"] == "NT") ? "selected" : "" ?>  >NT</option>
			                    <option value="WA"  <?php echo ($_SESSION["state"] == "WA") ? "selected" : "" ?>  >WA</option>
			                    <option value="SA"  <?php echo ($_SESSION["state"] == "SA") ? "selected" : "" ?>  >SA</option>
			                    <option value="TAS" <?php echo ($_SESSION["state"] == "TAS") ? "selected" : "" ?> >TAS</option>
			                    <option value="ACT" <?php echo ($_SESSION["state"] == "ACT") ? "selected" : "" ?> >ACT</option>
                			</select>
	                    </p>
	                    <p>
                            <label for="post_code">Post Code</label>                    <!-- post code -->
                            <input type="text" name="postCode" id="post_code" maxlength="4" size="4" value="<?php echo $_SESSION["postCode"] ?>"/>  <!-- get post code by SESSION -->
                        </p>
                    </fieldset>

                    <fieldset>
                        <legend>Contact Details</legend>
                        <p>
                            <label for="phone">Phone Number</label>                     <!-- phone number -->
                            <input type="text" name="phone" id="phone" maxlength="20" size="20"
                                pattern="[\d\s]{8,12}" required="required" placeholder="Enter your phone number" value="<?php echo $_SESSION["phone"] ?>"/> <!-- get phone number by SESSION -->
                        </p>
                        <div id="contactMethod">                                        <!-- preferred contact method -->
                        	<p>Preferred Contact:</p>
                        	<p>
                        		<!-- contact by email -->
                        		<input type="radio" id="by_email" name="contact" required="required" value="by_email"     
			                    	   <?php echo ($_SESSION["contact"] == "by_email") ? "checked" : "" ?>>       <!-- check if email method was selected -->  
			                    <label for="by_email">Email</label>
			                    <span>
			                    	<!-- contact by post -->
			                    	<input type="radio" id="by_post" name="contact" value="by_post"
			                    	<?php echo ($_SESSION["contact"] == "by_post") ? "checked" : "" ?>>           <!-- check if post method was selected -->   
			                        <label for="by_post">Post</label>
			                    </span>
			                    <span>
			                    	<!-- contact by phone -->
			                    	<input type="radio" id="by_phone" name="contact" value="by_phone"
			                    	<?php echo ($_SESSION["contact"] == "by_phone") ? "checked" : "" ?>>          <!-- check if phone method was selected -->     
			                        <label for="by_phone">Phone</label>
			                    </span>
                			</p>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Enquiry</legend>                <!-- enquiry section -->
                        <p>
                        	<label for="enquire_about">Product:</label>                <!-- enquire topic -->
	                        <select required='required' id="enquire_about" name="enquire">
			                    <option value="">What issue you want to enquire about</option>
			                    <option value="car_price" <?php echo ($_SESSION["enquire"] == "car_price") ? "selected" : "" ?> >Car prices</option>             <!-- car price topic -->
			                    <option value="warranty"  <?php echo ($_SESSION["enquire"] == "warranty") ? "selected" : "" ?>  >Warranty</option>               <!-- warranty topic -->
			                    <option value="services"  <?php echo ($_SESSION["enquire"] == "services") ? "selected" : "" ?>  >Car services</option>           <!-- car services topic -->
                			</select>
                        </p>
                        <div>
                        	<p>Product features</p>                                    <!-- product features with checkbox inputs implementation -->
                        	<?php
                        		//Split the value stored in $_SESSION["features"] into an array of strings
                        		function splitFeatures($string){
                        			return explode(",", $string);
                        		}
                        		$features = splitFeatures($_SESSION["features"]);
                        		$isFeature1 = false;
                        		$isFeature2 = false;
                        		$isFeature3 = false;
                        		for ($i = 0; $i < count($features); $i++){
                        			if ($features[$i] == "feature 1")
                        				$isFeature1 = true;
                        			if ($features[$i] == "feature 2")
                        				$isFeature2 = true;
                        			if ($features[$i] == "feature 3")
                        				$isFeature3 = true;
                        		}
                        	?>
                            <p>
                            	<input type="checkbox" name="ft[]" value="feature1" id="ft1" <?php echo ($isFeature1) ? "checked" : "" ?>>	<!-- Checked if feature1 was selected -->
                            	<label for="ft1">Feature 1</label>
                            </p>
                            <p>
                            	<input type="checkbox" name="ft[]" value="feature2" id="ft2" <?php echo ($isFeature2) ? "checked" : "" ?>>	<!-- Checked if feature2 was selected -->
                        		<label for="ft2">Feature 2</label>
                        	</p>
                        	<p>
                        		<input type="checkbox" name="ft[]" value="feature3" id="ft3" <?php echo ($isFeature3) ? "checked" : "" ?>>	<!-- Checked if feature3 was selected -->
                        		<label for="ft3">Feature 3</label>
                            </p>
                            <!--<p>
                            	<input type="hidden" name="features" value="<?php echo $_SESSION["features"] ?>">	
                            </p>-->
                        </div>
                        
                        <p>
                            <label for="cmt_text">Comments</label>                      <!-- ccomment section implmented by textarea input -->
                        </p>
                        <p>
                            <textarea id="cmt_text" name="comment" rows="4" cols="80"
                                placeholder="Write your comment here..." > <?php echo $_SESSION["comment"] ?> </textarea>
                        </p>
                    </fieldset>
                </fieldset>

                <fieldset>
                    <legend>Purchase product</legend>                                        <!-- Purchase section -->
                    <div>                                                                    <!-- Product 1-->
                        <p>
                        	<!-- Checked if Mercedes was selected -->
                            <input type="checkbox" name="isMerc" value="true" id="mercCheckbox" <?php echo ($_SESSION["isMerc"] == "true") ? "checked" : "" ?> >
                            <label for="mercCheckbox">Mercedes Benz E-class</label>
                        </p>                                               
                        <ul class="extraOptions">                                           <!-- Extra options-->
                            <li>
                                <label for="mercQuantity">Quantity: </label>                <!-- Quantity picker-->
                                <input type="text" name="mercQuantity" id="mercQuantity" placeholder="Please enter quantity here" 
                                value="<?php echo $_SESSION["mercQuantity"] ?>">
                            </li>
                            <li>                                                            <!-- Color picker-->
                                <label for="mercColor">Color:</label>
                                <select id="mercColor" name="mercColor">
                                    <option value="red" <?php echo ($_SESSION["mercColor"] == "red") ? "selected" : "" ?> >Red</option>				<!-- if red was selected then initialise-->
                                    <option value="black" <?php echo ($_SESSION["mercColor"] == "black") ? "selected" : "" ?> >Black</option>  		<!-- if black was selected then initialise-->
                                    <option value="yellow" <?php echo ($_SESSION["mercColor"] == "yellow") ? "selected" : "" ?> >Yellow</option>	<!-- if yellow was selected then initialise-->
                                </select>
                            </li>
                            <li>                                                            <!-- Model picker-->
                                <label for="mercModel">Model: </label>
                                <select id="mercModel" name="mercModel">
                                    <option value="e300" <?php echo ($_SESSION["mercModel"] == "e300") ? "selected" : "" ?> >E300</option>			<!-- if e300 was selected then initialise-->
                                    <option value="e450" <?php echo ($_SESSION["mercModel"] == "e450") ? "selected" : "" ?> >E450 4matic</option>	<!-- if e450 was selected then initialise-->
                                    <option value="e53" <?php echo ($_SESSION["mercModel"] == "e53") ? "selected" : "" ?> >E53 4matic+</option>		<!-- if e53 was selected then initialise-->
                                </select>
                            </li>
                            <li>                                                            <!-- Price showing -->
                                <label for="mercPrice">Price: </label>
                                <input type="text" name="mercPrice" id="mercPrice" value="130.000$ / each" readonly>
                            </li>
                        </ul>
                    </div>

                    <div>                                                                    <!-- Product 2-->
                        <p>
                        	<!-- Checked if Audi was selected -->
                            <input type="checkbox" name="isAudi" value="true" id="audiCheckbox" <?php echo ($_SESSION["isAudi"] == "true") ? "checked" : "" ?>>
                            <label for="audiCheckbox">Audi RS Serial Models</label>
                        </p>                                               
                        <ul class="extraOptions">                                           <!-- Extra options-->
                            <li>
                                <label for="audiQuantity">Quantity: </label>                <!-- Quantity picker-->
                                <input type="text" name="audiQuantity" id="audiQuantity" placeholder="Please enter quantity here"
                                value="<?php echo $_SESSION["audiQuantity"] ?>">
                            </li>
                            <li>                                                            <!-- Color picker-->
                                <label for="audiColor">Color: </label>
                                <select id="audiColor" name="audiColor">
                                    <option value="red" <?php echo ($_SESSION["audiColor"] == "red") ? "selected" : "" ?> >Red</option>			<!-- if red was selected then initialise-->
                                    <option value="blue" <?php echo ($_SESSION["audiColor"] == "blue") ? "selected" : "" ?> >Dark blue</option>	<!-- if blue was selected then initialise-->
                                    <option value="white" <?php echo ($_SESSION["audiColor"] == "white") ? "selected" : "" ?> >White</option>	<!-- if white was selected then initialise-->
                                </select>
                            </li>
                            <li>                                                            <!-- Model picker-->
                                <label for="audiModel">Model: </label>
                                <select id="audiModel" name="audiModel">
                                    <option value="rs7" <?php echo ($_SESSION["audiModel"] == "rs7") ? "selected" : "" ?> >RS7</option>				<!-- if rs7 was selected then initialise-->
                                    <option value="rs6" <?php echo ($_SESSION["audiModel"] == "rs6") ? "selected" : "" ?> >RS6 Avant</option>		<!-- if rs6 was selected then initialise-->
                                    <option value="rs5" <?php echo ($_SESSION["audiModel"] == "rs5") ? "selected" : "" ?> >RS5 Sportback</option>	<!-- if rs5 was selected then initialise-->
                                </select>
                            </li>
                            <li>                                                            <!-- Price showing -->
                                <label for="audiPrice">Price: </label>
                                <input type="text" name="audiPrice" id="audiPrice" value="99.000$ / each" readonly>
                            </li>
                        </ul>
                    </div>

                    <div>                                                                    <!-- Product 3-->
                        <p>
                        	<!-- Checked if BMW was selected -->
                            <input type="checkbox" name="isBMW" value="true" id="bmwCheckbox" <?php echo ($_SESSION["isBMW"] == "true") ? "checked" : "" ?>>
                            <label for="bmwCheckbox">BMW i-series</label>
                        </p>                                               
                        <ul class="extraOptions">                                           <!-- Extra options-->
                            <li>
                                <label for="bmwQuantity">Quantity: </label>                <!-- Quantity picker-->
                                <input type="text" name="bmwQuantity" id="bmwQuantity" placeholder="Please enter quantity here"
                                value="<?php echo $_SESSION["bmwQuantity"] ?>">
                            </li>
                            <li>                                                            <!-- Color picker-->
                                <label for="bmwColor">Color: </label>
                                <select id="bmwColor" name="bmwColor">
                                    <option value="brown" <?php echo ($_SESSION["bmwColor"] == "brown") ? "selected" : "" ?> >Brown</option>	<!-- if brown was selected then initialise-->
                                    <option value="silver" <?php echo ($_SESSION["bmwColor"] == "silver") ? "selected" : "" ?> >Silver</option>	<!-- if silver was selected then initialise-->
                                    <option value="copper" <?php echo ($_SESSION["bmwColor"] == "copper") ? "selected" : "" ?> >Copper</option>	<!-- if copper was selected then initialise-->
                                </select>
                            </li>
                            <li>                                                            <!-- Model picker-->
                                <label for="bmwModel">Model: </label>
                                <select id="bmwModel" name="bmwModel">	
                                    <option value="i3" <?php echo ($_SESSION["bmwModel"] == "i3") ? "selected" : "" ?> >BMW i3</option>				<!-- if i3 was selected then initialise-->
                                    <option value="i8" <?php echo ($_SESSION["bmwModel"] == "i8") ? "selected" : "" ?> >BMW i8 coupe</option>		<!-- if i8 was selected then initialise-->
                                    <option value="i9" <?php echo ($_SESSION["bmwModel"] == "i9") ? "selected" : "" ?> >BMW i9 Roadster</option>	<!-- if i9 was selected then initialise-->
                                </select>
                            </li>
                            <li>                                                            <!-- Price showing -->
                                <label for="bmwPrice">Price: </label>
                                <input type="text" name="bmwPrice" id="bmwPrice" value="164.000$ / each" readonly>
                            </li>
                        </ul>
                    </div>

                    <div>                                                                    <!-- Product 4-->
                        <p>
                        	<!-- Checked if Tesla was selected -->
                            <input type="checkbox" name="isTesla" value="true" id="teslaCheckbox" <?php echo ($_SESSION["isTesla"] == "true") ? "checked" : "" ?>>
                            <label for="teslaCheckbox">Tesla Roadster</label>
                        </p>                                               
                        <ul class="extraOptions">                                           <!-- Extra options-->
                            <li>
                                <label for="teslaQuantity">Quantity: </label>                <!-- Quantity picker-->
                                <input type="text" name="teslaQuantity" id="teslaQuantity" placeholder="Please enter quantity here"
                                value="<?php echo $_SESSION["teslaQuantity"] ?>">
                            </li>
                            <li>                                                            <!-- Color picker-->
                                <label for="teslaColor">Color: </label>
                                <select id="teslaColor" name="teslaColor">
                                    <option value="metallic" <?php echo ($_SESSION["teslaColor"] == "metallic") ? "selected" : "" ?> >Metallic</option>	<!-- if metallic was selected then initialise-->
                                    <option value="yellow" <?php echo ($_SESSION["teslaColor"] == "yellow") ? "selected" : "" ?> >Yellow</option>		<!-- if yellow was selected then initialise-->
                                    <option value="lotus" <?php echo ($_SESSION["teslaColor"] == "lotus") ? "selected" : "" ?> >Lotus</option>			<!-- if lotus was selected then initialise-->
                                </select>
                            </li>
                            <li>                                                            <!-- Model picker-->
                                <label for="teslaModel">Model: </label>
                                <select id="teslaModel" name="teslaModel">
                                    <option value="roadster" <?php echo ($_SESSION["teslaModel"] == "roadster") ? "selected" : "" ?> >Roadster</option>	<!-- if roadster was selected then initialise-->
                                    <option value="modelS" <?php echo ($_SESSION["teslaModel"] == "modelS") ? "selected" : "" ?> >Model S</option>		<!-- if modelS was selected then initialise-->
                                    <option value="truck" <?php echo ($_SESSION["teslaModel"] == "truck") ? "selected" : "" ?> >Cyber truck</option>	<!-- if truck was selected then initialise-->
                                </select>
                            </li>
                            <li>                                                            <!-- Price showing -->
                                <label for="teslaPrice">Price: </label>
                                <input type="text" name="teslaPrice" id="teslaPrice" value="245.000$ / each" readonly>
                            </li>
                        </ul>
                    </div>

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

                <!-- Submit and reset buttons -->
                <input class="button" type="submit" value="Pay now" />
                <input class="button" type="reset" value="Reset Form" />
            </form>
	</section>

	<?php
    	include_once("includes/footer.inc");
	?>
</body>
</html>