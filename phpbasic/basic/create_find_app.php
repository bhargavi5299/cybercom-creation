<?php
$offset=0;
if (isset($_POST['text'])&& isset($_POST['s'])&& isset($_POST['r'])) {
	 $text=$_POST['text'];
	 $se=$_POST['s'];
	 $re=$_POST['r'];

	 $str_len=strlen($se);


	 if (!empty($_POST['text'])&&!empty($_POST['s'])&&!empty($_POST['r']))
 {
	while ($strpos=strpos($text,$se,$offset)) {
		$offset=$strpos + $str_len;
		$text=substr_replace($text, $re, $strpos,$str_len);
	}
	echo $text;
}
else
{
	echo " Please fill!!!!!!!!" ;
}


}

?>

<form action="create_find_app.php" method="POST">
	<textarea  rows="7" cols="30" name="text"></textarea><br>
	Search for:<br>
	<input type="text" name="s" ><br><br>
	Replace with<br>
	<input type="text" name="r"><br><br>
	<input type="submit" name="sub" value="create and replace">
	

	
</form>