<?php
namespace Model;

\Mage::loadClassByFileName('model\core\table');

class Product extends Core\Table
{
    const STATUS_ENABLED = 'Enable';
    const STATUS_DISABLED ='Disable';
    public function __construct()
    {
        $this->setPrimaryKey('productId');
        $this->setTableName('product');
    }
    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable'
        ];    
    }
    

}

?>