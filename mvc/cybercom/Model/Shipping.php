<?php
namespace Model; 
\Mage::loadClassByFileName('Model\Core\Table');
class Shipping  extends Core\Table
{
    const STATUS_ENABLED = 'Enable';
    const STATUS_DISABLED ='Disable';

    public function __construct()
    {

        $this->setPrimaryKey('method_id');
        $this->setTableName('shipping');
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