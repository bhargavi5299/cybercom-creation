<?php
if (isset($_GET['txt_fn'])) {
	$fn=$_GET['txt_fn'];
	if (!empty($fn)) {
		echo "firstname".$fn;
	}
	else
	{
		echo "error";
	}
}


?>