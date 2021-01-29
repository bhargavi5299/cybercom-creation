<?php
$cookie_name="user";
$cookie_value="bhargavi";

setcookie($cookie_name,$cookie_value,time() + (86400*30),"/");
?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if (!isset($_COOKIE[$cookie_name])) {
		echo "error";
	}
	else
	{
	echo $_COOKIE[$cookie_name];
}
	?>

</body>
</html>