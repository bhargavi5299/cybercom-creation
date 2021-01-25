<?php

$userid="hello user
<br>";
$password="this is your pass:123";
function login()
{
	global $userid,$password;
	$print='your deatils here<br> '.$userid .$password;
	echo $print;
}
login();


?>