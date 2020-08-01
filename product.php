<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 1">
	<meta name="keywords"    content="COS100011, assignment 1, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/style3.css">
	<script src="scripts/product3.js"></script>
	<title>Products</title>
</head>
<body>
	<?php
		$page = "productPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
	?>

	<article>
		<h1>Great deals from us</h1>
		<!-- Aside section, showing compared prices -->
		<aside>														<!-- Aside section to display average prices of car brands -->
			<h2>Average price of car brands</h2>
	        <p>
	            Struggling in finding which brand is the most suitable for your budget? Check out the avarage prices of popular brands below
	        </p>
        	<ol>
            	<li><a href="product.html#product1">Mercedes</a></li>		
            	<li><a href="product.html#product2">Audi</a></li>
            	<li><a href="product.html#product3">BMW</a></li>
            	<li><a href="product.html#product4">Tesla</a></li>
        	</ol>

	        <section id="aside_table">					<!-- A statistic table for prices -->
	            <table>
	                <tr>			<!-- 1st row of table -->
	                    <th>Types</th>
	                    <th>Mercedes</th>
	                    <th>Tesla</th>
	                    <th>BMW</th>
	                    <th>Audi</th>
	                </tr>

	                <tr>		<!-- 2nd row of table -->
	                    <th>Sedan</th>
	                    <td>$232.300</td>
	                    <td>$435.000</td>
	                    <td>$232.400</td>
	                    <td>$132.400</td>
	                </tr>

	                <tr>		<!-- 3rd row of table -->
	                    <th>SUV</th>
	                    <td>$192.300</td>
	                    <td>$335.000</td>
	                    <td>$192.400</td>
	                    <td>$132.400</td>
	                </tr>

	                <tr>		<!-- 4th row of table -->
	                    <th>Convertible</th>
	                    <td>$132.300</td>
	                    <td>$235.000</td>
	                    <td>$132.400</td>
	                    <td>$122.400</td>
	                </tr>
	            </table>
	        </section>
		</aside>

		<!-- Page main content -->
		<section class="products-container">
			<!-- Product 1 -->
			<section class="product">
                <section class="text">
	                <h2 id="product1">1. Mercedes Benz E-Class</h2>
	                <h3>A new breed of E-Class</h3>
	                <p>A spur-of-the-moment detour off-road, along a farm track or across sand – the All-Terrain relishes getting off the asphalt. Its looks reflect this assertiveness: design highlights include the SUV-style radiator trim, robust detachable body parts and large alloy wheels. The All-Terrain is ready</p>
	                <p>Technical data:</p>
	                <ul>
	                	<li>Fuel: Premium</li>
	                	<li>Performance: 155kW (211 HP)</li>
	                	<li>Transmission: 9G-Tronic</li>
	                </ul>

	                <!-- Product optional features-->
	                <div>													<!-- Colors picker -->
		                <p class="choice">Available colors:</p>
		                <select name="color">
		                	<option value="0">Pick a color</option>
		                	<option value="red">Red</option>
		                	<option value="black">Black</option>
		                	<option value="yellow">Yellow</option>
		                </select>
	                </div>

	                <div>													<!-- Models picker -->
		                <p class="choice">Available models:</p>
		                <select name="model">
		                	<option value="0">Pick a model</option>
		                	<option value="e300">E300</option>
		                	<option value="e450">E450 4Matic</option>
		                	<option value="e53">E53 4Matic+</option>
		                </select>
		            </div>

		            <div>													<!-- Condition picker -->
		                <p class="choice">Car condition:</p>
		                <select name="condition">
		                	<option value="0">Choose condition</option>
		                	<option value="used">Used</option>
		                	<option value="new">New</option>
		                </select>
	            	</div>

	            	<p>														<!-- Price of this product-->
	            		<label for="price1">Price: </label>
	            		<input type="text" id="price1" value="130.000$" readonly>
	            	</p>

	            	<button type="button" class="buyBtn">BUY THIS</button>		<!-- Buy button -->

	            	<p>Reference: <a href="https://www.mercedes-benz.com.au/passengercars/mercedes-benz-cars/models/e-class/e-class-all-terrain/explore.html" target="blank"> Mercedes E-class</a></p>
	            </section>

	            <!-- Product image -->
	            <img class="img_product" src="images/product1.jpg" alt="product1"/>
        	</section>

        	<!-- Product 2 -->
        	<section class="product">
        		<section class="text">
	                <h2 id="product2">2. Audi RS serial models</h2>
	                <h3>Higher performance</h3>
	                <p>Audi RS cars are some of the most powerful vehicles ever offered by Audi as well as R8. Audi RS 6, for instance, is more powerful than the physically larger Audi S8. However, the 2012 — 2015 Audi S8 shares the same engine as the 2013.</p>
	                <p>Technical data:</p>
	                <ul>
	                	<li>Fuel: Premium</li>
	                	<li>Performance: 294kW (400 HP)</li>
	                	<li>Transmission: 6-Speed Manual</li>
	                </ul>

	                <!-- Product optional features-->
	                <div>																	<!-- Colors picker -->
		                <p class="choice">Available colors:</p>
		                <select name="color">
		                	<option value="0">Pick a color</option>
		                	<option value="red">Red</option>
		                	<option value="blue">Dark blue</option>
		                	<option value="white">White</option>
		                </select>
	                </div>

	                <div>																	<!-- Models picker -->
		                <p class="choice">Available models:</p>
		                <select name="model">
		                	<option value="0">Pick a model</option>
		                	<option value="rs7">RS7</option>
		                	<option value="rs6">RS6 Avant</option>
		                	<option value="rs5">RS5 Sportback</option>
		                </select>
		            </div>

		            <div>																	<!-- Condition picker -->
		                <p class="choice">Car condition:</p>
		                <select name="condition">
		                	<option value="0">Choose condition</option>
		                	<option value="used">Used</option>
		                	<option value="new">New</option>
		                </select>
	            	</div>

	            	<p>																		<!-- Price of this product-->
	            		<label for="price2">Price: </label>
	            		<input type="text" id="price2" value="99.000$" readonly>
	            	</p>

	            	<button type="button" class="buyBtn">BUY THIS</button>		<!-- Buy button -->

	            	<p>Reference: <a href="https://en.wikipedia.org/wiki/Audi_S_and_RS_models" target="blank"> Audi RS series</a></p>
				</section>

				<!-- Product image -->
	            <img class="img_product" src="images/product2.jpg" alt="product2"/>
	        </section>
        	
        	<!-- Product 3 -->
        	<section class="product">
        		<section class="text">
	                <h2 id="product3">3. BMW i-series</h2>
	                <h3>The spirit of the time</h3>
	                <p>The BMW i-series do not follow any trend; it's an expression of a self-conscious lifestyle. Designed in a progressive form language that communicates clarity and an interior lounge character. Equipped with an effortlessness that thrills you through sustainable materials and functional details. A vehicle that will set trends with its individuality.</p>
	                <p>Technical data:</p>
	                <ul>
	                	<li>Fuel: Premium</li>
	                	<li>Performance: 98kW (131 HP)</li>
	                	<li>Transmission: Aisin F21-360 FT EOP</li>
	                </ul>

	                <!-- Product optional features-->
	                <div>																<!-- Colors picker -->
		                <p class="choice">Available colors:</p>
		                <select name="color">
		                	<option value="0">Pick a color</option>
		                	<option value="brown">Brown</option>
		                	<option value="silver">Silver</option>
		                	<option value="copper">Copper</option>
		                </select>
	                </div>

	                <div>																<!-- Models picker -->
		                <p class="choice">Available models:</p>
		                <select name="model">
		                	<option value="0">Pick a model</option>
		                	<option value="rs7">BMW i3</option>
		                	<option value="rs6">BMW i8 Coupe</option>
		                	<option value="rs5">BMW i8 Roadster</option>
		                </select>
		            </div>

		            <div>																<!-- Condition picker -->
		                <p class="choice">Car condition:</p>
		                <select name="condition">
		                	<option value="0">Choose condition</option>
		                	<option value="used">Used</option>
		                	<option value="new">New</option>
		                </select>
	            	</div>

	            	<p>																	<!-- Price of this product-->
	            		<label for="price3">Price: </label>
	            		<input type="text" id="price3" value="164.000$" readonly>
	            	</p>

	            	<button type="button" class="buyBtn">BUY THIS</button>					<!-- Buy button -->

	            	<p>Reference: <a href="https://www.bmw.com.au/en/index.html?gclid=CjwKCAjw95D0BRBFEiwAcO1KDEEIM9mRRr64KJbvvz8oGhJYMQG0b6dKwrp7v5xVsbQHuh3E40X2jBoCP-4QAvD_BwE&gclsrc=aw.ds" target="blank">BMW i-series</a></p>
				</section>

				<!-- Product image -->
	            <img class="img_product" src="images/product3.jpg" alt="product3"/>
	        </section>

	        <!-- Product 4 -->
	        <section class="product">
        		<section class="text">
	                <h2 id="product4">4. Tesla Roadster</h2>
	                <h3>The quickest car in the world</h3>
	                <p>As an all-electric supercar, Roadster maximises the potential of aerodynamic engineering—with record-setting performance and efficiency. The first supercar to set every performance record and still fit seating for four.</p>
	                <p>Technical data:</p>
	                <ul>
	                	<li>Fuel: Premium</li>
	                	<li>Performance: 200kW (268 HP)</li>
	                	<li>Transmission: 1.5 Powertrain</li>
	                </ul>

	                <!-- Product optional features-->
	                <div>															<!-- Colors picker -->
		                <p class="choice">Available colors:</p>
		                <select name="color">
		                	<option value="0">Pick a color</option>
		                	<option value="silver">Silver Metallic</option>
		                	<option value="yellow">Brilliant Yellow</option>
		                	<option value="green">Green Lotus</option>
		                </select>
	                </div>

	                <div>															<!-- Models picker -->
		                <p class="choice">Available models:</p>
		                <select name="model">
		                	<option value="0">Pick a model</option>
		                	<option value="rs7">Tesla Roadster</option>
		                	<option value="rs6">Tesla Model S</option>
		                	<option value="rs5">Tesla cybertruck</option>
		                </select>
		            </div>

		            <div>															<!-- Condition picker -->
		                <p class="choice">Car condition:</p>
		                <select name="condition">
		                	<option value="0">Choose condition</option>
		                	<option value="used">Used</option>
		                	<option value="new">New</option>
		                </select>
	            	</div>

	            	<p>																<!-- Price of this product-->
	            		<label for="price4">Price: </label>
	            		<input type="text" id="price4" value="245.000$" readonly>
	            	</p>

	            	<button type="button" class="buyBtn">BUY THIS</button>				<!-- Buy button -->

	            	<p>Reference: <a href="https://www.tesla.com/en_AU/roadster" target="blank">Tesla</a></p>
				</section>

				<!-- Product image -->
	            <img class="img_product" src="images/product4.jpg" alt="product4"/>
	        </section>

		</section>
	</article>

	<?php
		include_once("includes/footer.inc");
	?>
</body>
</html>