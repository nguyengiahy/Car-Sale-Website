<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 3">
	<meta name="keywords"    content="COS100011, assignment 3, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/style3.css">
	<title>Receipt</title>
</head>
<body>
	<?php
		$page = "receiptPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");

		echo "<h2 class='align-center'>Receipt</h2>";
		if (!isset($_GET["db_msg"])) {// not from process_order.php, redirection
			header("location:enquire.php");
			exit();
		}
		else { // from process_order.php, display receipt
			echo $_GET["db_msg"];
		}

		include_once("includes/footer.inc");
	?>
</body>
</html>