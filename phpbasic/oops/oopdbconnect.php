<?php
/**
 * 
 */
class DataBaseConnect
{
	
	public function __construct($db_host,$db_username,$db_password)
	{
		if (!@$this->Connect($db_host,$db_username,$db_password)) {
			echo "connection failed!!!";
		}
		else if ($this->Connect($db_host,$db_username,$db_password)) {
			echo "connected".$db_host;
		}
	}
	public function connect($db_host,$db_username,$db_password)
	{
		return true;
	}
}

$connection=new DataBaseConnect('localhost','root','password');

?>