<?php
namespace Model;

\Mage::getModel('model\core\table');

class GroupPrice extends Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('entityId');
        $this->setTableName('product_group_price');
    }
}
