<?php
require 'dbconnect.php';
var_dump($_GET);
if(!isset($_GET['btn_sb']))
{
	header("location:reg.php");
	exit();
}
$fn=$_GET['txt_fn'];
$ln=$_GET['txt_ln'];
$email=$_GET['txt_email'];
$pass=$_GET['txt_pass'];
$cpass=$_GET['txt_cpass'];
$gen=$_GET['gen'];
$mobile=$_GET['txt_mobile'];
$isactive = 1;
$usertype=2;


if($pass!=$cpass)
{
	header("location:reg.php");
	exit();
}
$qry="INSERT into user_tbl(firstname,lastname,password,cpassword,gender,mobile,isactive,usertype)
VALUES ('".$fn."','".$ln."','".$pass."','".$cpass."','".$gen."','".$mobile."',$isactive,$usertype)";

$rs=mysqli_query($conn,$qry);
if ($rs) 
{
	echo "Inserted Succesfully";
	header("location:login.php");
	exit();
}
else
{
	echo "insert error";
}