<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 1">
	<meta name="keywords"    content="COS100011, assignment 1, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/style3.css">
    <script src="scripts/enquire3.js"></script>
	<title>Enquiry</title>
</head>
<body>

	<?php
        $page = "enquirePage";
        include_once("includes/header.inc");
        include_once("includes/nav.inc");
    ?>

	<section>              <!-- main content starts here -->
		<h1 class="align-center">Application Form</h1>
            <!-- Form -->
            <form class="container" method="post" action="payment.php" id="enquireForm" novalidate="novalidate">
                <fieldset>                                                          <!-- Personal details -->
                    <legend>Applicant details</legend>
                    <p>
                        <label for="first_name">First Name:</label>                    <!-- first name -->
                        <input type="text" name="first_name" id="first_name" maxlength="25" size="30"
                            pattern="[a-zA-Z]{1,25}" required="required" />
                    </p>
                    <p>
                        <label for="last_name">Last Name:</label>                       <!-- last name -->
                        <input type="text" name="last_name" id="last_name" maxlength="25" size="30"
                            pattern="[a-zA-Z]{1,25}" required="required" />
                    </p>
                    <p> 
                        <label for="email">Email:</label>                               <!-- email -->
                        <input type="email" name="email" id="email" required="required" />
                    </p>

                    <fieldset>
                        <legend>Address</legend>
                        <p> 
	                        <label for="address">Street Address:</label>               <!-- address -->
	                        <input type="text" name="address" id="address" maxlength="40" size="45" required="required" />
	                    </p>
	                    <p>
	                        <label for="suburb">Suburb/Town:</label>                   <!-- suburb -->
	                        <input type="text" name="suburb" id="suburb" maxlength="20" size="25"
	                            pattern="[a-zA-Z]{1,20}" required="required" />
	                    </p>
	                    <p>
	                        <label for="state">State:</label>                            <!-- state -->
	                        <select id="state" name="state">
			                    <option value="none">Please select</option>              <!-- Initial select -->
			                    <option value="VIC">VIC</option>
			                    <option value="NSW">NSW</option>
			                    <option value="QLD">QLD</option>
			                    <option value="NT">NT</option>
			                    <option value="WA">WA</option>
			                    <option value="SA">SA</option>
			                    <option value="TAS">TAS</option>
			                    <option value="ACT">ACT</option>
                			</select>
	                    </p>
	                    <p>
                            <label for="post_code">Post Code</label>                    <!-- post code -->
                            <input type="text" name="post_code" id="post_code" maxlength="4" size="4" />
                        </p>
                    </fieldset>

                    <fieldset>
                        <legend>Contact Details</legend>
                        <p>
                            <label for="phone">Phone Number</label>                     <!-- phone number -->
                            <input type="text" name="phone" id="phone" maxlength="20" size="20"
                                pattern="[\d\s]{8,12}" required="required" placeholder="Enter your phone number" />
                        </p>
                        <div id="contactMethod">                                        <!-- preferred contact method -->
                        	<p>Preferred Contact:</p>
                        	<p>
                        		<input type="radio" id="by_email" name="Contact" required="required" value="by_email"     
			                    	   checked='checked'>                                                           <!-- contact by email -->
			                    <label for="by_email">Email</label>
			                    <span>
			                    	<input type="radio" id="by_post" name="Contact" value="by_post"/>               <!-- contact by post -->
			                        <label for="by_post">Post</label>
			                    </span>
			                    <span>
			                    	<input type="radio" id="by_phone" name="Contact" value="by_phone"/>             <!-- contact by phone -->
			                        <label for="by_phone">Phone</label>
			                    </span>
                			</p>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Enquiry</legend>                <!-- enquiry section -->
                        <p>
                        	<label for="enquire_about">Product:</label>                <!-- enquire topic -->
	                        <select required='required' id="enquire_about" name="enquire_about">
			                    <option value="">What issue you want to enquire about</option>
			                    <option value="car_price">Car prices</option>            <!-- car price topic -->
			                    <option value="warranty">Warranty</option>               <!-- warranty topic -->
			                    <option value="services">Car services</option>           <!-- car services topic -->
                			</select>
                        </p>
                        <div>
                        	<p>Product features</p>                                    <!-- product featurs with checkbox inputs implementation -->
                            <p>
                            	<input type="checkbox" name="features[]" value="feature1" id="ft1" checked="checked">
                            	<label for="ft1">Feature 1</label>
                            </p>
                            <p>
                            	<input type="checkbox" name="features[]" value="feature2" id="ft2">
                        		<label for="ft2">Feature 2</label>
                        	</p>
                        	<p>
                        		<input type="checkbox" name="features[]" value="feature3" id="ft3">
                        		<label for="ft3">Feature 3</label>
                            </p>
                        </div>
                        
                        <p>
                            <label for="cmt_text">Comments</label>                      <!-- ccomment section implmented by textarea input -->
                        </p>
                        <p>
                            <textarea id="cmt_text" name="comments" rows="4" cols="80"
                                placeholder="Write your comment here..."></textarea>
                        </p>
                    </fieldset>
                </fieldset>

                <fieldset>
                    <legend>Purchase product</legend>                                        <!-- Purchase section -->
                    <div>                                                                    <!-- Product 1-->
                        <p>
                            <input type="checkbox" name="mercCheckbox" value="mercedes" id="mercCheckbox">
                            <label for="mercCheckbox">Mercedes Benz E-class</label>
                        </p>                                               
                        <ul class="extraOptions">                                           <!-- Extra options-->
                            <li>
                                <label for="mercQuantity">Quantity: </label>                <!-- Quantity picker-->
                                <input type="text" name="mercQuantity" id="mercQuantity" placeholder="Please enter quantity here">
                            </li>
                            <li>                                                            <!-- Color picker-->
                                <label for="mercColor">Color: </label>
                                <select id="mercColor">
                                    <option value="red">Red</option>
                                    <option value="black">Black</option>
                                    <option value="yellow">Yellow</option>
                                </select>
                            </li>
                            <li>                                                            <!-- Model picker-->
                                <label for="mercModel">Model: </label>
                                <select id="mercModel">
                                    <option value="e300">E300</option>
                                    <option value="e450">E450 4matic</option>
                                    <option value="e53">E53 4matic+</option>
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
                            <input type="checkbox" name="audiCheckbox" value="audi" id="audiCheckbox">
                            <label for="audiCheckbox">Audi RS Serial Models</label>
                        </p>                                               
                        <ul class="extraOptions">                                           <!-- Extra options-->
                            <li>
                                <label for="audiQuantity">Quantity: </label>                <!-- Quantity picker-->
                                <input type="text" name="audiQuantity" id="audiQuantity" placeholder="Please enter quantity here">
                            </li>
                            <li>                                                            <!-- Color picker-->
                                <label for="audiColor">Color: </label>
                                <select id="audiColor">
                                    <option value="red">Red</option>
                                    <option value="blue">Dark blue</option>
                                    <option value="white">White</option>
                                </select>
                            </li>
                            <li>                                                            <!-- Model picker-->
                                <label for="audiModel">Model: </label>
                                <select id="audiModel">
                                    <option value="rs7">RS7</option>
                                    <option value="rs6">RS6 Avant</option>
                                    <option value="rs5">RS5 Sportback</option>
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
                            <input type="checkbox" name="bmwCheckbox" value="bmw" id="bmwCheckbox">
                            <label for="bmwCheckbox">BMW i-series</label>
                        </p>                                               
                        <ul class="extraOptions">                                           <!-- Extra options-->
                            <li>
                                <label for="bmwQuantity">Quantity: </label>                <!-- Quantity picker-->
                                <input type="text" name="bmwQuantity" id="bmwQuantity" placeholder="Please enter quantity here">
                            </li>
                            <li>                                                            <!-- Color picker-->
                                <label for="bmwColor">Color: </label>
                                <select id="bmwColor">
                                    <option value="brown">Brown</option>
                                    <option value="silver">Silver</option>
                                    <option value="copper">Copper</option>
                                </select>
                            </li>
                            <li>                                                            <!-- Model picker-->
                                <label for="bmwModel">Model: </label>
                                <select id="bmwModel">
                                    <option value="i3">BMW i3</option>
                                    <option value="i8">BMW i8 coupe</option>
                                    <option value="i9">BMW i9 Roadster</option>
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
                            <input type="checkbox" name="teslaCheckbox" value="tesla" id="teslaCheckbox">
                            <label for="teslaCheckbox">Tesla Roadster</label>
                        </p>                                               
                        <ul class="extraOptions">                                           <!-- Extra options-->
                            <li>
                                <label for="teslaQuantity">Quantity: </label>                <!-- Quantity picker-->
                                <input type="text" name="teslaQuantity" id="teslaQuantity" placeholder="Please enter quantity here">
                            </li>
                            <li>                                                            <!-- Color picker-->
                                <label for="teslaColor">Color: </label>
                                <select id="teslaColor">
                                    <option value="metallic">Metallic</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="lotus">Lotus</option>
                                </select>
                            </li>
                            <li>                                                            <!-- Model picker-->
                                <label for="teslaModel">Model: </label>
                                <select id="teslaModel">
                                    <option value="roadster">Roadster</option>
                                    <option value="modelS">Model S</option>
                                    <option value="truck">Cyber truck</option>
                                </select>
                            </li>
                            <li>                                                            <!-- Price showing -->
                                <label for="teslaPrice">Price: </label>
                                <input type="text" name="teslaPrice" id="teslaPrice" value="245.000$ / each" readonly>
                            </li>
                        </ul>
                    </div>

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