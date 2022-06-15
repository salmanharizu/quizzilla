<?php
// session
include('session.php');
?>
<html>
<head>
<style>
ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: black;
}

li {
	float: left;
}

li a, .dropbtn {
	display: inline-block;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-weight: bold;
}

li a:hover, .dropdown:hover .dropbtn {
	background-color: yellow;
	color: black;
}

li.dropdown {
	display: inline-block;
	float:right;
}

.dropdown-content {
	display: none;
	position: absolute;
	right: 17; /* adjust */
	background-color: lightgray;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}

.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
	text-align: left;
}

.dropdown-content a:hover {background-color: yellow;}

.dropdown:hover .dropdown-content {
	display: block;
}

/* Responsive layout - when the screen is less than 400px wide,
   make the navigation links stack on top of each other
   instead of next to each other */
@media screen and (max-width: 400px) {
	.topnav a {
		float: none;
		width: 100%;
	}
}
</style>
</head>
<body>

<ul>
	<li><a href="quiz_collection.php">Home</a></li>
	<li class="dropdown">
	<a href="#" class="dropbtn">Hye, <?php echo $name; ?></a>
		<div class="dropdown-content">
		<!-- different menus for different users -->
		<?php
			if ($cat == "T") // Teacher
			{
				$menu1='<a href="quiz_collection.php">Quiz Collection</a>';
				$menu2='<a href="quiz_form.php">Add Quiz</a>';
				$menu3='<a href="student_performance.php">Student Performance</a>';
			}
			else // Student
			{
				$menu1='<a href="quiz_collection.php">Quiz Collection</a>';
				$menu2='<a href="student_performance2.php">Performance</a>';
				$menu3='';
			}
		echo $menu1;
		echo $menu2;
		echo $menu3;
		?>
		<a href="logout.php">Log Out</a>
		</div>
	</li>
</ul>
</body>
</html>