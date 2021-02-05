<?php
$age=21;
try
{
	if ($age>18) 
	{
			echo "old enough";
	}
	else
	{
		throw new Exception('not old enogh');
		
	}
}catch(Exception $ex)
{
	echo "error".$ex->getmessage();
}
?>