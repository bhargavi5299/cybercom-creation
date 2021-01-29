<?php
session_start();
//print_r($_SESSION);

//session_unset();//session unset krva
//session_destroy();//session destroy krva
?>
<!DOCTYPE html>
<html>
<head>
	<title>session store</title>
</head>
<body>
	<?php echo $_SESSION["username"]."<br>";
		 echo  $_SESSION["password"];
		  ?>



</body>
</html>