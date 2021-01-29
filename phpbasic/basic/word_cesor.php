<?php
$list = array('bhargavi','mansi','janvi');
$replace = array('b******i','ma***','ja**i');


if(isset($_POST['data'])&&!empty($_POST['data']))
{         
     $user = $_POST['data'];
     $reuser= str_ireplace($list, $replace, $user);
     echo $reuser;

    
}
?>


	<hr>
	<form action="" method="POST">
    <textarea name="data" cols="30" rows="7" ><?php echo $user; ?></textarea><br>
    <input type="submit" value="submit"/>
</form>
