<header>
	<nav>
		<a href="index.php" id="logo">
			<img src="images/logo.jpg" title="Home" alt="Company Logo" height="75" width="200">
		</a>
		<!-- Navigation links -->
	
		<ul>      
			<li><a href="index.php"   		<?php echo ($page == "indexPage") ? "class='active'" : ""; ?>   	 >Home</a></li>
			<li><a href="about.php"   		<?php echo ($page == "aboutPage") ? "class='active'" : ""; ?>   	 >About</a></li>
	        <li><a href="product.php" 		<?php echo ($page == "productPage") ? "class='active'" : ""; ?> 	 >Products</a></li>
	        <li><a href="enquire.php" 		<?php echo ($page == "enquirePage") ? "class='active'" : ""; ?> 	 >Enquiry</a></li>
	        <li><a href="enhancements.php"  <?php echo ($page == "enhancementsPage") ? "class='active'" : ""; ?> >Enhancements</a></li>
	        <li><a href="payment.php"		<?php echo ($page == "paymentPage") ? "class='active'" : ""; ?> 	 >Payment</a></li>
	        <li><a href="manager.php"		<?php echo ($page == "managerPage") ? "class='active'" : ""; ?> 	 >Manager</a></li>
		</ul>
	</nav>
</header>