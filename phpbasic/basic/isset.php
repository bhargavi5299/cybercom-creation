<?php
if (isset($_POST['txt_fn']) &&!empty($_POST['txt_fn'])) 
{
	echo $username=$_POST['txt_fn'];
}

?>
<form action="isset.php" method="POST">>
	Name:<input type="text" name="txt_fn" value="<?php echo $username;?>">



	<input type="submit" name="submit">
	
</form>