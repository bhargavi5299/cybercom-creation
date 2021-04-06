<?php
namespace Model\Customer;

\Mage::loadClassByFileName('model\core\table');

class Address extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('addressId');
        $this->setTableName('address');
    }
}
