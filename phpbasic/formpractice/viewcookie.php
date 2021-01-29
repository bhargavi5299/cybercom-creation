<?php
echo $_COOKIE["user"];
setcookie("user","",time() - (86400*30),"/");//deleted cookie cookiew delete krva (+ ni jagya a (-) lagai devanu ne value blank 6odi devani)
?>