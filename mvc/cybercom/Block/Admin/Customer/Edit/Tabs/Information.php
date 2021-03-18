<?php
namespace Block\Admin\Customer\Edit\Tabs; 
\Mage::loadClassByFileName('Block\Core\Template');
class Information extends \Block\Core\Template
{
    protected $customers = null;
    public function __construct()
    {
      
       $this->setTemplate('admin/Customer/edit/tabs/information.php');
    }
    
    public function setCustomer($customers = null)
    {
        if (!$customers) {
            $customers = \Mage::getModel('Model\customer');
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
    public function getCustomer()
    {
        if (!$this->customers) {
            $this->setCustomer();
        }
        return $this->customers;     
    }
}
    







?>