<?php
$servername="localhost";
$username="root";
$password="";
$dbname="project";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
	die("connection failed".mysqli_connect_error());
}
else
{
	//echo "connected suceessfully....<br>";

	$db=mysqli_select_db($conn,$dbname);
	if (!$db) 
	{
		

		//echo "database not selected";
	}
	else
	{
		//echo "database seleceted";
	}
}

?>