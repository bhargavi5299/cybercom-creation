<?php
namespace Block\Admin\Customer;

\Mage::loadClassByFileName('Block\Core\Template');
class Grid extends \Block\Core\Template  
{
    protected $customers = null;
    public function __construct()
    {
      
       $this->setTemplate('admin/Customer/grid.php');
    }
    
    public function setCustomer($customers = null)
    {
        if (!$customers) {
            $customers = \Mage::getModel('Model\customer');
            $customers= $customers->fetchAll();
        }
        $this->customers = $customers;
        return $this;
    }
    public function getCustomer()
    {
        if (!$this->customers) {
            $this->setCustomer();
        }
        return $this->customers;     
    }
    public function getGroupName($id)
    {
        $customerGroup = \Mage::getModel('Model\CustomerGroup');
        $customerData = $customerGroup->load($id);
        return  $customerData->groupName;
    } 
    
}

?>