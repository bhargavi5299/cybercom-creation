<?php
namespace Model\Product;

\Mage::getModel('model\core\table');

class GroupPrice extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('entityId');
        $this->setTableName('product_group_price');
    }
}
