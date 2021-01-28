<?php
if (isset($_POST['roll'])) {
	$rand=rand(1, 6);
	echo "You Rolled!!" .$rand;
}

?>
<form action="rand.php" method="POST">
	<input type="submit" name="roll" value="roll dice">
	
</form>