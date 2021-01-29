<?php

$servername="localhost";
$username="root";
$password="";
$dbname="prac";

$conn= mysqli_connect($servername,$username,$password);

if (!$conn) 
{
	die("connection failed".mysqli_connect_error());
}
//echo "connect successfully!";
/*
$db = mysqli_select_db($conn,$dbname);
if($db) 
{
	echo "Database Selected";
}
else 
{
	echo "Database Not selected";
}*/

?>