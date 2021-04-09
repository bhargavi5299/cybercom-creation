<?php
namespace Model\Attribute;


class Options extends \Model\Core\Table
{
	
	public function __construct(){
		
		$this->setTableName('attribute_option');
		$this->setPrimaryKey('optionId');
	}
	
}


?>