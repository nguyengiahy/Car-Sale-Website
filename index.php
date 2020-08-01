<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 3">
	<meta name="keywords"    content="COS100011, assignment 3, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/style3.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">  <!-- this is for the icon of scroll to top button -->
	<script src="scripts/enhancements.js"></script>
	<title>Home</title>
</head>

<body>
	<?php
		$page = "indexPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
	?>
	
	<!-- Jumbotron -->
	<section class="jumbotron" id="enhancement2">
		<button id="scrollToTopButton"><i class="fa fa-arrow-up"></i></button>
		<h1>BEST QUALITY CARS 			<!-- Jumbotron title -->
			<span>With the guarantee lowest price in the market</span>
		</h1>
		<form action="about.php">
			<button>LEARN MORE</button>		<!-- Learn more button link to about.html -->
		</form>
	</section>

	<article>
		<section id="section1">			<!-- paragraph 1 -->
			<img src="images/mission.jpg" alt="Mission image">  <!-- paragraph 1 picture imported -->
			<h2>Mission</h2>   <!-- title -->
			<p>			<!-- content -->
				We provide a range of classified advertising services across our network of sites to dealers, consumers and corporate customers. Our offering is enhanced by our other value-added services such as software services, specification data, vehicle news and reviews, stocking and pricing tools for dealers, data and insights for all of our customers, finance, inspections, warranty and tyre products
			</p>
		</section>

		<section id="section2">		<!-- paragraph 2 -->
			<img src="images/service.jpg" alt="Service image">	 <!-- paragraph 2 picture imported -->
			<h2>Our services</h2>	<!-- title -->
			<p> 		<!-- content -->
				We offer a range of car services dependent upon your needs and the needs of your car. Complete a few quick pieces of information about the make, model and age of your vehicle and you can book your fixed price service online today.
			</p>
			<p>Our services include:</p>
			<ul>
				<li>Log Book Service</li>
				<li>Yearly Service</li>
				<li>3 Year Service</li>
				<li>The Ultimate Service – our most comprehensive service possible</li>
			</ul>
		</section>

		<section id="section3">			<!-- paragraph 3 -->
			<img src="images/offer.jpg" alt="Unique image">		 <!-- paragraph 3 picture imported -->
			<h2>What's unique?</h2>	<!-- title -->
			<p>		<!-- content -->
				This unrivalled access to our showroom and warehouse also allows you to book services online and even order car parts and accessories from our comprehensive catalogue.

				Aside from our 7-year warranty - which is a first in the motor vehicle industry and a testament to the faith we have in the quality of our products - we are also proud of our Wheels Gold Star Value Award, where City Kia as awarded an outstanding five-stars.

				In addition, our cars have been listed as the number one new car that all Australians should be driving, according to the in-depth assessment conducted by the Wheels magazine annual report.
			</p>
		</section>

		<!-- Picture slideshow -->
		<section class="slide-wrapper" id="enhancement1">
			<h1>CHECK OUT OUR BEST SELLING PRODUCTS</h1>
			<section class="slideshow middle">
				<div class="slides">
					<!-- Radio button -->
					<input type="radio" name="r" id="r1" checked>		<!-- initial slide -->
					<input type="radio" name="r" id="r2">
					<input type="radio" name="r" id="r3">
					<input type="radio" name="r" id="r4">
					<input type="radio" name="r" id="r5">
					<!-- slide images -->
					<div class="slide s1">	
						<img src="images/car1.jpg" width="500" height="250" alt="car1 image">		<!-- slide 1 -->
					</div>
					<div class="slide">
						<img src="images/car2.jpg" width="500" height="250" alt="car2 image">		<!-- slide 2 -->
					</div>
					<div class="slide">
						<img src="images/car3.jpg" width="500" height="250" alt="car3 image">		<!-- slide 3 -->
					</div>
					<div class="slide">
						<img src="images/car4.jpg" width="500" height="250" alt="car4 image">		<!-- slide 4 -->
					</div>
					<div class="slide">
						<img src="images/car5.jpg" width="500" height="250" alt="car5 image">		<!-- slide 5 -->
					</div>
				</div>

				<div class="buttons">		<!-- buttons for switching slides -->
					<label for="r1" class="bar"></label>
					<label for="r2" class="bar"></label>
					<label for="r3" class="bar"></label>
					<label for="r4" class="bar"></label>
					<label for="r5" class="bar"></label>
				</div>
			</section>
		</section>

		<section id="section4">			<!-- Assistant section -->
			<div>
				<span id="need-help">Need Help?</span><br>
				Contact us and we will get back to you within 24 hours<br>
				Operating hours<br>
				Monday - Friday : 0700 - 1500<br>
				Saturday - Sunday: 0700-1200<br>
 				Victoria, Aus <br>
 				101533222@student.swin.edu.au<br><br>
 				<form action="about.html">
					<button>CONTACT</button>		<!-- contact button links to about.html -->
				</form>
			</div>
		</section>

		<!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&#735;</span>
                    <h2>Do you need a real-time assistant?</h2>
                </div>
                <div class="modal-body">
                    <p>Contact us and we will get back to you within 24 hours
                        <br />
                        Operating hours
                        <br />
                        Monday - Friday : 0700 - 1500
                        <br />
                        Saturday - Sunday: 0700 - 1200</p>
                    <p>Location: Victoria, Aus </p>

                    <p>Mail: <a href="mailto:101922778@student.swin.edu.au"> 101922778@student.swin.edu.au</a></p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
	</article>

	<?php
		include_once("includes/footer.inc");
	?>
</body>
</html>