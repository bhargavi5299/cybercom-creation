<?php
namespace Block\Admin\Customergroup;

\Mage::loadClassByFileName('block\core\template');


class Grid extends \Block\Core\Template  
{
    protected $customers = null;
    public function __construct()
    {
      
       $this->setTemplate('admin/CustomerGroup/grid.php');
    }
    
    public function setCustomerGroup($customers = null)
    {
        if (!$customers) {
            $customers = \Mage::getModel('Model\customergroup');
            $customers= $customers->fetchAll();
        }
        $this->customers = $customers;
        return $this;
    }
    public function getCustomerGroup()
    {
        if (!$this->customers) {
            $this->setCustomerGroup();
        }
        return $this->customers;     
    }
    
}

?>