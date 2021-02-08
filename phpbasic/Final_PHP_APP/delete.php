<?php
require 'dbconnect.php';
var_dump($_GET);
$c_id=$_GET['id'];

echo $c_id;

$sql=" DELETE FROM user WHERE id=$c_id";

if($rs=mysqli_query($conn,$sql))
{
	echo 1;
}
else{
	echo 0;
}



?>