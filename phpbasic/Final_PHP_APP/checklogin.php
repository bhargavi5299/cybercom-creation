<?php
require 'dbconnect.php';
session_start();
var_dump($_POST);
if (!isset($_POST['btn_sb'])) 
{
	header("location:login.php");
	exit();
}
$email=$_POST['txt_email'];
$password=$_POST['txt_pass'];


$_SESSION['email']=$email;
$_SESSION['password']=$password;


$em=$_SESSION['email'];
$ps=$_SESSION['password'];


$qry="SELECT * FROM user WHERE  email='".$email."'AND password='".$password."' AND isactive=1 ";



echo $qry;

$rs=mysqli_query($conn,$qry);
if (mysqli_num_rows($rs)>0) 
{
	$row=mysqli_fetch_assoc($rs);

	echo "email id and password  match with registartion table";
	$email_login=$row['email'];
	$password_login=$row['password'];

	if ($_POST['rem']) 
	{
		setcookie("email",$em,time() + (86400*30),"/");
		setcookie("password",$ps,time() + (86400*30), "/");
	}
	
	if ($email==$email_login)
	 {
		if ($password==$password_login) 
		{
	
			echo "welcome user";
			header("location:dashboard.php");
			exit();
		}
		else
		{
			echo "row not match";
		}
	}
	else
	{
		echo header("location:login.php");
		exit();
	}



}else
{
	echo header("location:login.php");
	exit();
}







?>