<?php
if (isset($_GET['txt_fn'])&& ! empty($_GET['txt_fn'])) {
	echo $username=$_GET['txt_fn'];
}

?>
<form action="isset.php" method="GET">
	Name: <input type="text" name="txt_fn"><br><br>
	<input type="submit" name="submit">
	
</form>