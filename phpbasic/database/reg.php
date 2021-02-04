<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
<form action="regprocess.php" method="get">
	First Name : <input type="text" name="txt_fn"><br>
	Last Name : <input type="text" name="txt_ln"><br>
	Email : <input type="text" name="txt_email"><br>
	Mobile : <input type="text" name="txt_mobile"><br>
	Gender : <br> <input type="radio" name="gen" value="male">Male
	<input type="radio" name="gen" value="female">Female<br>
	Password : <input type="text" name="txt_pass"><br>
	Confirm Password : <input type="text" name="txt_cpass"><br>
	<input type="submit" name="btn_sb">
	<input type="reset" value="Clear">
	
</form>
</body>
</html>