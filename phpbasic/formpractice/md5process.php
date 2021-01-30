<?php
var_dump($_POST);
if (!isset($_POST['btn_sb'])) 
{
	header("location:md5.php");
	exit();
	
}

	else
	{
	$username=$_POST['user'];
	$password=md5($_POST['pass']);
	echo "username ".  $username ."<br>". "   password is ".$password;
	}





?>