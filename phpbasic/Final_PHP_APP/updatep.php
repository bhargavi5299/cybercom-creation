<?php
	
require 'dbconnect.php';
session_start();
var_dump($_GET);
$id=$_GET['txt_id'];
$fn=$_GET['txt_fn'];
$email=$_GET['txt_email'];
$ps=$_GET['txt_pw'];

$mobile=$_GET['txt_num'];

echo $id;

/*$qry="SELECT * FROM user WHERE id=$id";
$rs=mysqli_query($conn,$qry);
$row=mysqli_fetch_assoc($rs);*/


$qry1="UPDATE user SET fname='".$fn."',email='".$email."',password='".$ps."',mobile_no='".$mobile."'  WHERE id=$id";
echo $qry1;

$rs1=mysqli_query($conn,$qry1);
if($rs1)
{
	echo "Updated";
	header("location:viewfile.php");
	exit();
}
else
{
	echo "Error";
}

?>