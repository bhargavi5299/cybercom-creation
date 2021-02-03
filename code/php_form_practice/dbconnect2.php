<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="user_contact_form";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$db = mysqli_select_db($conn,$dbname);

if($db)
{
	//echo "Database Selected!";
}
else{
	//echo "Database Not Selected!";
}
?>