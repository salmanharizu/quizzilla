<?php
// session
include('session.php');

// get Quiz ID
$idquiz = $_GET['idQ'];

// get the .csv file and save it in the temp folder
$file = $_FILES["csv_file"]["tmp_name"];

// make sure (verify) only .csv files are uploaded
if (($_FILES["csv_file"]["type"] == "application/vnd.ms-excel"))
{
	// open and read the file, r = readonly
	$file_open = fopen($file, "r");
	
	// as long as there is still data in the csv file (EOF),
	// read line by line
	while(($data = fgetcsv($file_open)) !== FALSE)
	{
		$mysql = "INSERT INTO question
				  (question, answer, option_a, option_b, option_c,
				  option_d, id_quiz)
				  VALUES
				  ('".$data[0]."','".$data[1]."','".$data[2]."',
				   '".$data[3]."','".$data[4]."','".$data[5]."',
				   '$idquiz')";
		
			if (mysqli_query($conn, $mysql))
			{
				// show js popus message if question successfully uploaded
				echo '<script>alert("Question upload SUCCESSFUL!");
							  window.location.href="quiz_collection.php";
					  </script>';
			} else {
					echo "Error ; " . mysqli_error($conn); }
	}
}

// Close connection
mysqli_close($conn);
?>