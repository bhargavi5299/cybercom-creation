<?php
namespace  Model;  
\Mage::loadClassByFileName('model\core\table');


class Cms extends core\table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    public function __construct()
    {
        $this->setPrimaryKey('pageId');
        $this->setTableName('cms');
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