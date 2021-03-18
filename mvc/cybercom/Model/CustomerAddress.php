<?php
namespace Model;

\Mage::loadClassByFileName('model\core\table');

class CustomerAddress extends Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('addressId');
        $this->setTableName('address');
    } 
}

?>