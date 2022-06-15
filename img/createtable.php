<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE user_registration (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
age int(20),
state VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user_registration created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>