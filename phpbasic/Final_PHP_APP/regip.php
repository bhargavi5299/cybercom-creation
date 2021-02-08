<?php
require 'dbconnect.php';
var_dump($_GET);
if (isset($_GET['btn_sb'])) 
{
	if (empty($_GET['txt_fn'])&&empty($_GET['txt_email'])&&empty($_GET['txt_pw'])&&empty($_GET['txt_ti'])&& empty($_GET['txt_num'])&&empty($_GET['date'])) 
	{
		header("location:reg.php");
		exit();
	}
	else
	{
		$fn=$_GET['txt_fn'];
		
		$email=$_GET['txt_email'];
		$ps=$_GET['txt_pw'];
		$title=$_GET['txt_ti'];
		$mobile=$_GET['txt_num'];
		$dt =$_GET['date'];
		$isactive=1;
		$usertype=2;
		$profile='upload/2.jpg';

		$qry="INSERT into user(fname,email,password,title,mobile_no,date_created,profile,isactive,usertype)
			VALUES('".$fn."','".$email."','".$ps."','".$title."','".$mobile."','".$dt."','".$profile."',$isactive,$usertype)";

			$rs=mysqli_query($conn,$qry);
			if ($rs) 
			{
				echo "Insert Successfully";
				header("location:viewfile.php");
				exit();
			}
			else
			{
				echo "Insert Error!";
			}








	}
}
else
{
	header("location:reg.php");
	exit();
}







?>
