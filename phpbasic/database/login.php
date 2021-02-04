<?php
session_start();

/*if (isset($_SESSION["username"]))
 {
	header("location:dashboard.php");
	exit();
}
if (isset($_COOKIE["username"]))
 {
	$username=$_COOKIE['username'];
	$password=$_COOKIE['password'];
}
else
{
	$username=" ";
	$password=" ";
}*/


?>




<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
</head>
<body>
	<form action="checklogin.php" method="POST">
		Username:<input type="text" name="txt_un"  > <br>
													
	Password:<input type="text" name="txt_ps"  ><br>
	<input type="checkbox" name="rem" value="1" >remember<br>
<input type="submit" name="btn_sub" value="submit">
	</form>
	

</body>

</html>