<?php
if (isset($_GET['txt_fn'])&&isset($_GET['txt_ln'])) {
	$fn=$_GET['txt_fn'];
	$ln=$_GET['txt_ln'];
	if (!empty($fn) && !empty($ln)) {
		echo "firstname  :-".$fn."<br>";
		echo "lastname ".$ln."<br><br>";
	}
	else
	{
		echo "error";
	}
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>form1</title>
</head>
<body>
	<form action="redirectpage.php" method="GET">
		fn:<input type="text" name="txt_fn"><br>
		ln:<input type="text" name="txt_ln"><br>
		
		<input type="submit" name="btn_sb">
		<input type="reset" name="reset">
		
	</form>

</body>
</html>