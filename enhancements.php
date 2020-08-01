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
		<h1 class="align-center" id="ehm-title">Enhancements of assignment 3 (PHP, MySQL)</h1>
		<!-- First enhancement -->
		<section>
			<h2>Advanced manager reports</h2>			<!-- enhancement title -->
			<p class="align-center">					<!-- enhancement content -->
				Provide more advance options for manager reports, including: <br>
				<br><strong>1. Showing best selling product: </strong><br>using strpos function to find each individual product in order purchases,
					   then I incrementing corresponding product counter variable.<br> 
					   Finally I use two temporary variables to hold the values for name of the best selling product, together with how many times that product was sold.<br>
				<br><strong>2. Showing the customer has the highest bill:</strong><br>a combination of in_array() and array_search() methods, 
					   which allow me to adjust the list of customers and associates that list with a list of amount spent of each customer. <br>
					   After that, a for loop was called, using 2 arrays to determine the customer with the highest bill.<br>
				<br><strong>3. Calculate the average profit per transaction:</strong><br>fetch each record into an associative array then getting the order cost, also incrementing the number of orders<br>
					   Average profit per transaction was calculated by total order cost divided by number of orders.<br>
				<br><strong>4. Showing the number of orders corresponding to status:</strong><br>fetch each record into an associative array then incrementing corresponding order status<br>
						and display it.
			</p><br>
			<p class="align-center">View enhancement at the bottom of <a href="manager.php">manager page</a></p>		<!-- enhancement location -->
		</section>
		<br><br><br>

		<!-- Second enhancement -->
		<section>
			<h2>Sort orders by selected field:</h2>			<!-- enhancement title -->
			<p class="align-center">						<!-- enhancement content -->
				Provide user the ability to <strong>sort table by selected field</strong>. The ascending and descending order <strong>can be toggle</strong> if the field is selected again.<br>
				This is achieved by a flag stored in session, it can switch between ascending and descending order between sessions.<br>
				The sort query is carefully manipulated to avoid syntax error when combining different sorting requirements.<br>
			</p>		
			<p class="align-center">View enhancement in <a href="manager.php">manager page</a></p>		<!-- enhancement location -->
		</section>
		<br>

		<a href="enhancements2.php"><button id="switchEnhancement">View enhancements of assignment 2</button></a>		<!-- button for switching enhancements.html and enhancements2.html -->
		<br><br>
	</main>

	<?php
		include_once("includes/footer.inc");
	?>
</body>
</html>