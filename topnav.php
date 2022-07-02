<?php
// session
include('session.php');
?>
<html>
<head>
<style>
/* ul {
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
} */

#user {
	display: inline-block;
	/* float: right; */
	font-size:small;
	height: 50px;
}
#registerBtn {
	float: right;
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

<!-- <ul>
	<li><a href="quiz_collection.php">Home</a></li>
	<li class="dropdown">
	<a href="#" class="dropbtn">Hye,</a>
		<div class="dropdown-content">
		different menus for different users
		<a href="logout.php">Log Out</a>
		</div>
	</li>
</ul> -->
<nav class="px-3 py-2 bg-white border-bottom mb-3">
            <div class="container-fluid d-flex flex-wrap justify-content-center">
                <ul class="nav col-md-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto text-small">
					<?php if ($cat == "T") {?>
                    <li>
                        <a href="quiz_collection.php" class="nav-link text-dark">
						Quiz Collection
                        </a>
                    </li>
                    <li>
                        <a href="quiz_form.php" class="nav-link text-dark">
						Quiz Form
                        </a>
                    </li>
                    <li>
                        <a href="student_performance.php" class="nav-link text-dark">
						Student Performance
                        </a>
                    </li>
					<li>
					<a href="registration_form.php" class="nav-link text-dark">Register for Teacher</a>
					</li>
					<li>
					<a href="registration_form2.php" class="nav-link text-dark">Register for Student</a>
					</li>
					<?php } else { ?>
                    <li>
                        <a href="quiz_collection.php" class="nav-link text-dark">
						Quiz Collection
                        </a>
                    </li>
                    <li>
                        <a href="student_performance2.php" class="nav-link text-dark">
						Performance
                        </a>
                    </li>
					<?php } ?>
                </ul>
				<div class="alert alert-success" role="alert" id="user">Hye <?php echo $name.' !'; ?></div>
            </div>
        </nav>
</body>
</html>