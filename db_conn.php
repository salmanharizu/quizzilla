<?php
$db_host = "localhost";
$db_uname = "root";
$db_pwd = "";
$db_name = "quizzilla";
		
// Create connection
$conn = mysqli_connect($db_host, $db_uname, $db_pwd, $db_name);

// Check connection
if (!$conn) {
	die(mysqli_connect_error());
}	
// echo "Connection to DB successful";

?>