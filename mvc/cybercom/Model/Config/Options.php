<?php
namespace Model\Config;


class Options extends \Model\Core\Table
{
	
	public function __construct(){
		
		$this->setTableName('config_group');
		$this->setPrimaryKey('groupId');
	}
	
	
}


?>