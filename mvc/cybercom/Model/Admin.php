<?php
namespace Model;
class Admin extends Core\Table
{
    const STATUS_ENABLED = 'Enable';
    const STATUS_DISABLED ='Disable';
    public function __construct()
    {
       
        $this->setPrimaryKey('adminId');
        $this->setTableName('admin');
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