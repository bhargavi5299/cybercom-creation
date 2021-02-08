<?php
require 'dbconnect.php';
if (isset($_COOKIE['email'])) 
{
	$email_cookie=$_COOKIE['email'];
	$password_cookie=$_COOKIE['password'];
}
else
{
	$email_cookie="";
	$password_cookie="";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<form action="checklogin.php" method="POST">
	Email:		<input type="email" name="txt_email" value="<?php echo $email_cookie;  ?>"><br><br>
	Password:	 <input type="text" name="txt_pass" value="<?php echo $password_cookie; ?>"><br>
	<input type="checkbox" name="rem" value="1">remember<br>
	<input type="submit" name="btn_sb">
	
</form>
</body>
</html>