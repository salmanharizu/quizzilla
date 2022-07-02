<html>
<head>
<style>
#mainbody
{
	background-color: white;
	padding: 20px;
}

#title
{
	font-size: 30px;
	font-family: Tw Cen MT Condensed;
	font-weight: bold;
	text-align: center;
}

table {
	margin-left: auto;
	margin-right: auto;
	border-collapse: collapse;
	margin: auto;
	background-color: lavender;
}

td {
	text-align: left;
	height: 25px;
}

th {
	height: 30px;
	text-align: left;
	font-weight: bold;
	color: white;
	background-color: darkorchid;
}

</style>
</head>

<body>
<?php
include ("header.php");
include ("topnav.php");
?>
<!-- <div id="mainbody">
	<div id="title"><p>Quiz Collection</p></div> -->
	<main class="flex-shrink-0">
        <div class="container">
            <div class="card p-5 my-5">
                <h1 class="p-5 bg-dark text-white rounded">Quiz Collection</h1>
                <br>
<form action="" method="post">
<!-- SEARCH -->
<p><center>Find Quiz :
	<input type="text" name="search">
	<input type="submit" value="Find" name="find">
</p></center>
</form>

<?php
// if the user clicks the "Find" button and the search textbox is not empty
if(isset($_POST['find']) && !empty($_POST['search']) )
{
	$query = "SELECT * FROM quiz
			  WHERE title_quiz LIKE '%$_POST[search]%'";
} else {
	// if the user does not search, display all quiz collections
	$query = "SELECT * FROM quiz";
}
$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

if (mysqli_num_rows($result) > 0)
{
// table for data display
echo "<table border='0'>";
echo "<col width='20'>";  // column size 1
echo "<col width='80'>";  // column size 2
echo "<col width='400'>"; // column size 3
echo "<col width='150'>"; // column size 4
echo "<col width='150'>"; // column size 5
echo "<col width='20'>";  // column size 6
echo "<tr>";
echo "<th></th>";			   //column 1
echo "<th>ID</th>"; 		   //column 2
echo "<th>Title</th>"; 		   //column 3
echo "<th></th>"; 			   //column 4
echo "<th></th>"; 			   //column 5
echo "<th></th>"; 			   //column 6
echo "</tr>";

  // display all data from the quiz table in the DB
  while($row = mysqli_fetch_assoc($result))
  {
  
  // if the teacher category, display the following button
  if ($cat == "T")
  {
	$button1 = "<td><a href='edit_quiz.php?idQ=".$row['id_quiz']."'><button>Update Quiz</button></a></td>";
	$button2 = "<td><a href='delete_quiz.php?idQ=".$row['id_quiz']."'><button>Delete Quiz</button></a></td>";
  }
  else // if student category, display 1 button only
  {
	$button1 = "<td><a href='answer_quiz.php?idQ=".$row['id_quiz']."'><button>Answer Quiz</button></a></td>";
	$button2 = "";
  }
  
  // data display
  echo "<tr height='50'>";
  echo "<td></td>";
  echo "<td>".$row['id_quiz']."</td>";
  echo "<td>".$row['title_quiz']."</td>";
  echo $button1;
  echo $button2;
  echo "</tr>";
  }
echo "</table>";
}
else { echo "<center>The quiz doesn't exist yet</center>"; }
?>
<!-- </div> -->
			</div>
		</div>
	</main>
<?php
include ("footer.php");
?>
</body>
</html>