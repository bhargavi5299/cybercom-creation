<?php
namespace Model;
\Mage::loadClassByFileName('model\core\table');  
    
class Admin extends Core\Table
{
    const STATUS_ENABLE = 'Enable';
    const STATUS_DISABLE ='Disable';

    public function __construct()
    {
        $this->setPrimaryKey('adminId');
        $this->setTableName('admin');
    }
    public function getStatusOption()
    {
        return[

            self::STATUS_ENABLE =>'Enable',
            self::STATUS_DISABLE =>'Disable'
        ];
    }
}
?>