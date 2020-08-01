<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="COS100011 assignment 1">
	<meta name="keywords"    content="COS100011, assignment 1, creating web applications">
	<meta name="author"      content="Hy Gia Nguyen">
	<meta name="viewport"	 content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="styles/style3.css">
	<title>About Us</title>
</head>
<body>
	<?php
        $page = "aboutPage";
        include_once("includes/header.inc");
        include_once("includes/nav.inc");
    ?>

	<article>
        <!-- Description list -->
		<section class="basic-information">
			<h1 class="align-center">HY GIA NGUYEN</h1>
			<dl id="myprofile">                              <!-- Profile wrapper -->
                <dt>Name</dt>       <!-- name -->
                <dd>Hy Gia Nguyen</dd>      
                <dt>Student ID</dt>     <!-- student ID-->
                <dd>101922778</dd>
                <dt>Tutor</dt>          <!-- tutor's name-->
                <dd>Gamunu Dassanayake</dd>
                <dt>Course</dt>         <!-- course name-->
                <dd>Bachelor of Software Engineering</dd>
                <dt>Home Town</dt>      <!-- home town -->
                <dd>Vietnam</dd>
                <dt>Favorite book Series</dt>       <!-- favourite book -->
                <dd>Harry Potter, Sherlock Holmes</dd>
                <dt>Email</dt>      <!-- email address -->
                <dd><a href="mailto:101922778@student.swin.edu.au">101922778@student.swin.edu.au</a></dd>       <!-- anchor tag with href mailto -->
            </dl>
            <!-- profile picture -->
            <figure>
            	<a href="images/me.jpg">       <!-- import profile picture -->
            		<img src="images/me.jpg" alt="my portrait">
            	</a>
            </figure>
		</section>

        <!-- Class timetable -->
		<section class="timetable">
			<h1>Timetable</h1>
			<table>
				<tr>            <!-- first row of table -->
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>
                <tr>        <!-- second row of table -->
                    <th>08:30</th>
                    <td rowspan="3">MEE20002<br />Lab 1 : BA601</td>  <!-- merge 3 rows -->
                    <td rowspan="2">COS10011<br />Lab 1 : BA411</td>    <!-- merge 2 rows -->
                    <td></td>
                    <td></td>
                    <td rowspan="2">MEE40003<br />Tutorial 1 : EN204</td>      <!-- merge 2 rows -->
                </tr>
                <tr>            <!-- third row of table-->
                    <th>09:30</th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>            <!-- fourth row of table-->
                    <th>10:30</th>
                    <td rowspan="2">MEE20002<br />Lab 2 : BA601</td>        <!-- merge 2 rows -->
                    <td></td>
                    <td></td>
                    <td>MEE40003<br />Practical : EN108M</td>
                </tr>
                <tr>            <!-- fifth row of table-->
                    <th>11:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>            <!-- sixth row of table-->
                    <th>12:30</th>
                    <td rowspan="2">RME30002<br />Lecture 1 : EN715</td>        <!-- merge 2 rows -->
                    <td rowspan="2">RME30002<br />Practical 1 : ATC704</td>     <!-- merge 2 rows -->
                    <td></td>
                    <td></td>
                    <td rowspan="2">RME30002<br />Tutorial 1 : ATC320</td>      <!-- merge 2 rows -->
                </tr>
                <tr>            <!-- seventh row of table-->
                    <th>13:30</th>
                    <td>RME30002<br />Lecture 2 : EN715</td>
                    <td></td>
                </tr>
                <tr>            <!-- 8th row of table-->
                    <th>14:30</th>
                    <td rowspan="2">COS10011<br />Lecture 1 : BA302</td>        <!-- merge 2 rows -->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>            <!-- 9th row of table-->
                    <th>15:30</th>
                    <td>MEE40003<br />Lecture 2 : BA201</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>   
                <tr>            <!-- 10th row of table-->
                    <th>16:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>            <!-- 11th row of table-->
                    <th>17:30</th>
                    <td rowspan="2">MEE40003<br />Lecture 1 : BA201</td>        <!-- merge 2 rows -->
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>            <!-- 12th row of table-->
                    <th>18:30</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
		</section>
	</article>

    <?php
        include_once("includes/footer.inc");
    ?>
</body>
</html>