<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 3">
	<meta name="keywords"    content="COS100011, assignment 3, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/style3.css">
	<title>Manager</title>
</head>
<body>
	<?php
		$page = "managerPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
		session_start();
	?>
	<h1 class="align-center">Manager</h1>
	<br><br>
	<!-- Search criteria and sort options -->
	<h2 class="align-center">Order Search</h2>
	<form method="post" action="manager.php">
		<fieldset>
			<legend>Search for a particular order (leave all blank if you want to display all orders)</legend>
			<p>
				<label for="firstName">Customer's first name:</label>
				<input type="text" name="firstName" id="firstName">
			</p>
			<p>
				<label for="lastName">Customer's last name:</label>
				<input type="text" name="lastName" id="lastName">
			</p>
			<p>
				<label>Search for particular product:</label>
			</p>
			<p>
            	<input type="checkbox" id="product1" name="productSearch[]" value="merc">               
                <label for="product1">Mercedes</label>
            </p>
            <p>
            	<input type="checkbox" id="product2" name="productSearch[]" value="audi">               
                <label for="product2">Audi</label>
            </p>
			<p>
            	<input type="checkbox" id="product3" name="productSearch[]" value="bmw">               
                <label for="product3">BMW</label>
            </p>
            <p>
            	<input type="checkbox" id="product4" name="productSearch[]" value="tesla">               
                <label for="product4">Tesla</label>
            </p>
			<p>
				<label>Search for pending orders:</label>
				<span>
                	<input type="radio" id="searchPending" name="pendingSearch" value="yes">               
                    <label for="searchPending">Yes</label>
                </span>
                <span>
                	<input type="radio" id="noSearchPending" name="pendingSearch" value="no" checked>               
                    <label for="noSearchPending">No</label>
                </span>
			</p>
			<p>
				<label>Sort orders by cost:</label>
				<span>
                	<input type="radio" id="orderSorted" name="orderSort" value="yes">               
                    <label for="orderSorted">Yes</label>
                </span>
                <span>
                	<input type="radio" id="orderUnsorted" name="orderSort" value="no" checked>               
                    <label for="orderUnsorted">No</label>
                </span>
			</p>
			<p>
				<label for="sort">Sort results by other criteria (choose again to reverse order):</label>
                <select name="sort" id="sort">
                    <option value="">Select field...</option>
                    <option value="orderIDSort">Order ID</option>
                    <option value="orderDateSort">Order Date</option>
                    <option value="orderStatusSort">Order Status</option>
                    <option value="firstNameSort">First Name</option>
                    <option value="lastNameSort">Last Name</option>
                </select>
			</p>
		</fieldset>
		<input class="button" type="submit" value="Search" name="Search">
	</form>

	<?php
		//if search form was submitted
		if (isset($_POST["Search"])){
			$sortQuery = "";
			$condition = "";
			// If sort by cost was chosen
			if ($_POST["orderSort"] == "yes")
				$sortQuery = " ORDER BY order_cost";
			// If sort by other criteria was chosen
			if (isset($_POST["sort"])){
				
				$flag = "";
				//sortFlag used for switching between ascending and descending order
				if (!isset($_SESSION["sortFlag"])){		// If sortFlag has not been set => set it
					$flag = "ASC";
					$_SESSION["sortFlag"] = $flag;
				}
				else{			
					if ($_SESSION["sortFlag"] == "ASC"){		//switch form ascending order from previous sort to descending order for the current sort
						$flag = "DESC";
						$_SESSION["sortFlag"] = $flag;
					}
					else{ 									//switch form descending order to ascending
						$flag = "ASC";
						$_SESSION["sortFlag"] = $flag;
					}		
				}

				if ($_POST["sort"] == "orderIDSort"){
					if ($sortQuery != "")
						$sortQuery .= ", order_id $flag";
					else
						$sortQuery = " ORDER BY order_id $flag";
				}
				if ($_POST["sort"] == "orderDateSort"){
					if ($sortQuery != "")
						$sortQuery .= ", order_date $flag";
					else
						$sortQuery = " ORDER BY order_date $flag";
				}
				if ($_POST["sort"] == "orderStatusSort"){
					if ($sortQuery != "")
						$sortQuery .= ", order_status $flag";
					else
						$sortQuery = " ORDER BY order_status $flag";
				}
				if ($_POST["sort"] == "firstNameSort"){
					if ($sortQuery != "")
						$sortQuery .= ", first_name $flag";
					else
						$sortQuery = " ORDER BY first_name $flag";
				}
				if ($_POST["sort"] == "lastNameSort"){
					if ($sortQuery != "")
						$sortQuery .= ", last_name $flag";
					else
						$sortQuery = " ORDER BY last_name $flag";
				}
			}

			// If at least one search criteria was chosen
			if ( isset($_POST["firstName"]) || isset($_POST["lastName"]) || $_POST["pendingSearch"] == "yes" || isset($_POST['productSearch'])){

				function sanitise_input($data){
					$data = trim($data);				//remove spaces
					$data = stripslashes($data);		//remove backslashes in front of quotes
					$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
					return $data;
				}

				$fname = sanitise_input($_POST["firstName"]);
				$lname = sanitise_input($_POST["lastName"]);
				$pending = $_POST["pendingSearch"];

				require_once('settings.php');		//Acquire connection to database
        		$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        		if (!$conn){
        			echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        		}
        		else{
        			
        			if ($fname != ""){
        				if ($condition != "")
        					$condition .= " AND ";
        				$condition .= "first_name LIKE '%$fname%'";
        			}
        			if ($lname != ""){
        				if ($condition != "")
        					$condition .= " AND ";
        				$condition .= "last_name LIKE '%$lname%'";
        			}
        			if ($pending == "yes"){
        				if ($condition != "")
        					$condition .= " AND ";
        				$condition .= "order_status LIKE 'PENDING'";
        			}

	        		if (isset($_POST['productSearch'])){
        				$products = $_POST["productSearch"];
        				$product_list = "";
        				if ($condition != "")
        					$condition .= " AND (";
        				else
        					$condition .= " (";
	        			if (in_array('merc', $products)){
	        				if ($product_list != "")
	        					$condition .= " OR ";
	        				
	        				$condition .= "purchases LIKE '%Mercedes%'";
	        				$product_list .= "merc";
	        			}
	        			if (in_array('audi', $products)){
	        				if ($product_list != "")
	        					$condition .= " OR ";
	        				
	        				$condition .= "purchases LIKE '%Audi%'";
	        				$product_list .= "audi";
	        			}
	        			if (in_array('bmw', $products)){
	        				if ($product_list != "")
	        					$condition .= " OR ";
	        				
	        				$condition .= "purchases LIKE '%BMW%'";
	        				$product_list .= "bmw";
	        			}
	        			if (in_array('tesla', $products)){
	        				if ($product_list != "")
	        					$condition .= " OR ";
	        				
	        				$condition .= "purchases LIKE '%Tesla%'";
	        				$product_list .= "bmw";
	        			}
	        			$condition .= ")";
	        		}

        		}
			}

			$condition = ($condition != "") ? " WHERE " . $condition : $condition;

			$query = "SELECT * FROM orders" . $condition . $sortQuery . ";";

			$result = mysqli_query($conn, $query);				//execute the query and store the result into result pointer

			if (!$result){
				echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
			}
			else{
				if (mysqli_num_rows($result) > 0){
					echo "<h2 class='align-center'>Search result</h2>";
					echo "<table id='searchResult'>
							<tr>
								<th>Order ID</th>
								<th>Total cost ($)</th>
								<th>Order date</th>
								<th>Order status</th>
								<th>First name</th>
								<th>Last name</th>
								<th>Purchases</th>
							</tr>";
					while ($record = mysqli_fetch_assoc ($result) ){
						echo "<tr>
								<td>{$record['order_id']}</td>
								<td>{$record['order_cost']}</td>
								<td>{$record['order_date']}</td>
								<td>{$record['order_status']}</td>
								<td>{$record['first_name']}</td>
								<td>{$record['last_name']}</td>
								<td>{$record['purchases']}</td>
							  </tr>";
					}
					echo "</table>";
					mysqli_free_result($result);
				}
				else{
					echo "<h2 class='align-center'>No result matches your search criteria</h2>";
					echo "<p class='align-center'>Your query: $query</p>";
				}
			}
			mysqli_close($conn);
		}
	?>
	<br><br><br>
	<!-- Enable manager to modify orders' status -->
	<h2 class="align-center">Update order's status</h2>
	<form method="post" action="manager.php">
		<fieldset>
			<legend>Update status of an order:</legend>
			<p>
                <label for="orderID">Order ID:</label>
                <input type="number" name="orderID" id="orderID" required="required">
            </p>
            <p>
            	<label for="orderStatus">Order status:</label>
                <select name="orderStatus" id="orderStatus" required>
                    <option value="">Select Status...</option>
                    <option value="PENDING">PENDING</option>
                    <option value="FULFILLED">FULFILLED</option>
                    <option value="PAID">PAID</option>
                    <option value="ARCHIVED">ARCHIVED</option>
                </select>
            </p>
		</fieldset>
		<input class="button" type="submit" value="Update" name="Update">
	</form>

	<?php
		//if update form was submitted
		if (isset($_POST["Update"])){

			require_once('settings.php');		//Acquire connection to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if (!$conn){
        		echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        	}
        	else{
        		function sanitise_input($data){
					$data = trim($data);				//remove spaces
					$data = stripslashes($data);		//remove backslashes in front of quotes
					$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
					return $data;
				}

				$orderID = sanitise_input($_POST["orderID"]);
        		$status = $_POST["orderStatus"];

        		$query = "UPDATE orders SET order_status='$status' WHERE order_id='$orderID'";

        		$result = mysqli_query($conn, $query);		//execute the query and store the result into result pointer
        		if (!$result){
					echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
				}
				else{
					echo "<h2 class='align-center'>Order status has been updated.</h2>";
				}
				mysqli_close($conn);
        	}
		}
	?>
	<br><br><br>
	<!-- Enable manager to delete pending orders -->
	<h2 class="align-center">Delete PENDING order</h2>
	<form method="post" action="manager.php">
		<fieldset>
			<legend>Delete an order (only PENDING orders can be deleted):</legend>
			<p>
                <label for="orderID2">Order ID:</label>
                <input type="number" name="orderID2" id="orderID2" required="required">
            </p>
		</fieldset>
		<input class="button" type="submit" value="Delete" name="Delete">
	</form>

	<?php
		//if delete form was submitted
		if (isset($_POST["Delete"])){

			require_once('settings.php');		//Acquire connection to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if (!$conn){
        		echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        	}
        	else{
        		function sanitise_input($data){
					$data = trim($data);				//remove spaces
					$data = stripslashes($data);		//remove backslashes in front of quotes
					$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
					return $data;
				}

				$orderID2 = sanitise_input($_POST["orderID2"]);
        		
        		$query = "SELECT order_status FROM orders WHERE order_id='$orderID2'";

        		$result = mysqli_query($conn, $query);		//execute the query and store the result into result pointer

        		if (!$result){
					echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
				}
				else{
					$record = mysqli_fetch_assoc ($result);
					if ($record["order_status"] != "PENDING"){
						echo "<h2 class='align-center'>Sorry you cannot delete this order, only existed orders or PENDING orders can be deleted.</h2>";
					}
					else{
						$delete = "DELETE FROM orders WHERE order_id='$orderID2'";
						$execute = mysqli_query($conn, $delete);
						if (!$execute){
							echo "<h2 class='align-center'>Failed to execute query: ", $delete, ".</h2>";
						}
						else{
							echo "<h2 class='align-center'>The order has been deleted.</h2>";
						}
					}
				}
				mysqli_close($conn);
        	}
		}
	?>
	<br><br><br>
	<!-- Enhancement -->
	<h2 class="align-center">Advance Report</h2>
	<form method="post" action="manager.php">
		<fieldset>
			<legend>More advanced manager report:</legend>
			<p>
				<label>Show best selling product: </label>
				<span>
                	<input type="radio" id="showBest" name="bestSelling" value="yes">               
                    <label for="showBest">Yes</label>
                </span>
                <span>
                	<input type="radio" id="noShowBest" name="bestSelling" value="no" checked>               
                    <label for="noShowBest">No</label>
                </span>
			</p>

			<p>
				<label>Show customer has the highest bill: </label>
				<span>
                	<input type="radio" id="showPerson" name="customerPurchase" value="yes">               
                    <label for="showPerson">Yes</label>
                </span>
                <span>
                	<input type="radio" id="noShowPerson" name="customerPurchase" value="no" checked>               
                    <label for="noShowPerson">No</label>
                </span>
			</p>

			<p>
				<label>Show average profit per transaction: </label>
				<span>
                	<input type="radio" id="showAvgProfit" name="avgProfit" value="yes">               
                    <label for="showAvgProfit">Yes</label>
                </span>
                <span>
                	<input type="radio" id="noShowAvgProfit" name="avgProfit" value="no" checked>               
                    <label for="noShowAvgProfit">No</label>
                </span>
			</p>

			<p>
				<label>Show number of PENDING | FULFILLED | PAID | ARCHIVED orders: </label>
				<span>
                	<input type="radio" id="showStatusNumber" name="statusNumber" value="yes">               
                    <label for="showStatusNumber">Yes</label>
                </span>
                <span>
                	<input type="radio" id="noShowStatusNumber" name="statusNumber" value="no" checked>               
                    <label for="noShowStatusNumber">No</label>
                </span>
			</p>
		</fieldset>
		<input class="button" type="submit" value="Check" name="Check">
	</form>

	<?php
		//if enhancement form was submitted
		if (isset($_POST["Check"])){
			require_once('settings.php');		//Acquire connection to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if (!$conn){
        		echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        	}
        	else{
        		if ($_POST["bestSelling"] == "yes" || $_POST["customerPurchase"] == "yes" || $_POST["avgProfit"] == "yes" || $_POST["statusNumber"] == "yes"){
        			$query = "SELECT * FROM orders";
        			$result = mysqli_query($conn, $query);				//execute the query and store the result into result pointer
        			if (!$result) {
        				echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
        			}
        			else{
        				$mercCount = 0; $audiCount = 0; $bmwCount = 0; $teslaCount = 0;		//for best selling product
        				$customers = array();   $customerBills = array_fill(0, 100, 0);		//for customer with the highest bill
        				$sum = 0; $numberOfOrders = 0;
        				$pendingCount = 0; $fulfilledCount = 0; $paidCount = 0; $archivedCount = 0;

        				while ($record = mysqli_fetch_assoc ($result) ){					//fetch all the records
        					// if showing best selling product was chosen
        					if ($_POST["bestSelling"] == "yes"){
		        				if (strpos($record["purchases"], "Mercedes") !== false)		//if mercedes is selected
		        					$mercCount++;
		        				if (strpos($record["purchases"], "Audi") !== false)			//if audi is selected
		        					$audiCount++;
		        				if (strpos($record["purchases"], "BMW") !== false)			//if bmw is selected
		        					$bmwCount++;
		        				if (strpos($record["purchases"], "Tesla") !== false)		//if tesla is selected
		        					$teslaCount++;
			        		}
			        		// if showing customer with the highest bill was chosen
			        		if ($_POST["customerPurchase"] == "yes"){
			        			if (!in_array($record["last_name"], $customers)){
			        				$customers[] = $record["last_name"];		//add customer name into array
			        			}
			        			$index = array_search($record["last_name"], $customers);
			        			$customerBills[$index] += $record["order_cost"];
			        		}
			        		// if showing average profit per transaction was chosen
			        		if ($_POST["avgProfit"] == "yes"){
			        			$numberOfOrders++;
			        			$sum += $record["order_cost"];
			        		}
			        		// if showing average profit per transaction was chosen
			        		if ($_POST["statusNumber"] == "yes"){
			        			if ($record["order_status"] == "PENDING")
			        				$pendingCount++;
			        			if ($record["order_status"] == "FULFILLED")
			        				$fulfilledCount++;
			        			if ($record["order_status"] == "PAID")
			        				$paidCount++;
			        			if ($record["order_status"] == "ARCHIVED")
			        				$archivedCount++;
			        		}
        				}
        				echo "<h2 class='align-center'>Advance report result</h2>";
        				if ($_POST["bestSelling"] == "yes"){
        					$max = $mercCount; $name = "Mercedes";
        					if ($audiCount > $max){
        						$max = $audiCount;
        						$name = "Audi";
        					}
        					if ($bmwCount > $max){
        						$max = $bmwCount;
        						$name = "BMW";
        					}
        					if ($teslaCount > $max){
        						$max = $teslaCount;
        						$name = "Tesla";
        					}
        					echo "<p class='align-center'>Best selling product is: $name, purchased by $max customer(s).</p>";
        				}

        				if ($_POST["customerPurchase"] == "yes"){
        					$max = $customerBills[0];
        					$index = 0;
        					for ($i = 1; $i < count($customers); $i++){
        						if ($customerBills[$i] > $max){
        							$max = $customerBills[$i];
        							$index = $i;
        						}
        					}
        					echo "<p class='align-center'>Customer with the highest bill is: $customers[$index], total amount spent is $max$.</p>";
        				}

        				if ($_POST["avgProfit"] == "yes"){
        					$avg = $sum / (float)$numberOfOrders;
        					echo "<p class='align-center'>The average profit per transaction is: ", number_format((float) $avg, 3, '.', ''), "$.</p>";
        				}

        				if ($_POST["statusNumber"] == "yes"){
        					echo "<p class='align-center'>The number of each order status:</p>";
        					echo "<p class='align-center'>PENDING: $pendingCount order(s)</p>";
        					echo "<p class='align-center'>FULFILLED: $fulfilledCount order(s)</p>";
        					echo "<p class='align-center'>PAID: $paidCount order(s)</p>";
        					echo "<p class='align-center'>ARCHIVED: $archivedCount order(s)</p>";
        				}
	        		}
        		}
        		mysqli_close($conn);
        	}
		}
	?>

	<?php
		include_once("includes/footer.inc");
	?>
</body>
</html>