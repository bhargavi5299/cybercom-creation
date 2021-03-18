<?php
namespace Model; 
\Mage::loadClassByFileName('Model\Core\Table');

class Customer extends core\table 
{
    const STATUS_ENABLED = 'Enable';
    const STATUS_DISABLED ='Disable';
    protected $all=null;
    public function __construct()
    {
        $this->setPrimaryKey('customerId');
        $this->setTableName('customers');    
    }

    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable'
        ];    
    }

    public function getCustomerGroup()
    {
        $all = \Mage::getModel('Model\CustomerGroup');
        $customergroup=$all->fetchAll();
        return $customergroup;
      
        
    }
    
}
?>