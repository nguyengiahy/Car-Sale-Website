<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 1">
	<meta name="keywords"    content="COS100011, assignment 1, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/style3.css">
	<title>Enquiry</title>
</head>
<body>
	<?php
		$page = "enhancementsPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
	?>

	<main>
		<h1 class="align-center" id="ehm-title">Enhancements of assignment 2 (JavaScript)</h1>
		<!-- First enhancement -->
		<section>
			<h2>Scroll to top button</h2>		<!-- enhancement title -->
			<p class="align-center">			<!-- enhancement content -->
				A button which can scroll to top of the page using pre-defined browser object properties and HTML element's properties modification by JavaScript.<br><br>
				The button only appears when a user has scrolled down for more than 100 pixels.
				The smooth scrolling behaviour was set in css file.<br><br>
				To achieve this, 2 functions are used:<br>
				1. controlScroll() to check if the browser has been scrolled down for more than 100 pixels, then displays the button.<br>
				2. goToTop() to move to top of the page when the user has clicked on scroll to top button.<br>
                <br>
			</p>
			<p class="align-center"><a href="index.html">View here</a></p>		<!-- enhancement location -->
		</section>
		<br><br><br>

		<!-- Second enhancement -->
		<section>
			<h2>Using timer to display an assistant pop up</h2>		<!-- enhancement title -->
			<p class="align-center">								<!-- enhancement content -->
				If you stay on index.html page for more than 10 seconds, an assistant pop up will appear.<br><br>
				This is done by using setInterval for a counter variable to count and check whether 10 seconds have passed or not.<br>
				If the time is up, show() method is called to display the pop up, otherwise it remains hidden.<br>
				After that, if a user click on close button or area outside of the pop up box, the pop up will disappear.<br>
			</p>
			<p class="align-center"><a href="index.html">View here</a></p>		<!-- enhancement location -->
		</section>
		<br>

		<a href="enhancements.php"><button id="switchEnhancement">View enhancements of assignment 3</button></a>		<!-- button for switching enhancements.html and enhancements2.html -->
		<br><br>
	</main>

	<!-- Footer -->
	<?php
		include_once("includes/footer.inc");
	?>
</body>
</html>