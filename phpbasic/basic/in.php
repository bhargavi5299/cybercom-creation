<?php
include 'die_exit.php';
$db = mysqli_select_db($conn,$dbname);
if($db) 
{
	echo "Database Selected";
}
else 
{
	echo "Database Not selected";
}



?>