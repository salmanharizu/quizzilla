<?php
session_start();
// destroying all the session
if(session_destroy()) {
	header("Location: index.php");
	// return to login
}
?>