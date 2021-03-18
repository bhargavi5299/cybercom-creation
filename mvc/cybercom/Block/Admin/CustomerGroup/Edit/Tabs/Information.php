<?php
namespace Block\Admin\Customergroup\Edit\Tabs;

\Mage::loadClassByFileName('block\core\template');
class Information extends \Block\Core\Template
{
    protected $customers = null;
    public function __construct()
    {
      
        $this->setTemplate('admin/customergroup/edit/tabs/information.php');
    }
    
    public function setCustomerGroup($customers = null)
    {
        if (!$customers) {
            $customers = \Mage::getModel('Model\customergroup');
            if($id = $this->getRequest()->getGet('id'))
        {
            $customers = $customers->load($id);
            if (!$customers)
            {
              throw new \Exception("ID not get");
            }
        }
            
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