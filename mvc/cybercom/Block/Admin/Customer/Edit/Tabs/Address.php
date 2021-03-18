<?php
namespace Block\Admin\Customer\Edit\Tabs; 

\Mage::loadClassByFileName('Block\Core\Template');
class Address extends \Block\Core\Template
{
    protected $customers = null;
    protected $shipping;
    protected $billing;
    public function __construct()
    {
      
       $this->setTemplate('admin/Customer/edit/tabs/address.php');
    }
    protected function setBilling($billing = NULL)
    {
        if ($this->billing) 
        {
            $this->billing = $billing;
        }
        $billing = \Mage::getModel('model\customerAddress');
        if( $id = $this->getRequest()->getGet('id'))
        {
            $query = "SELECT * FROM `address` WHERE `customerId` = $id AND type = 'Billing'";
            $row = $billing->load(NULL,$query);
            $this->billing = $row;
        }
        $this->billing = $billing;
        return $this;
    }
    public function getBilling()
    {
        if (!$this->billing) 
        {
            $this->setBilling();
        }
        return $this->billing;
    }
    
    protected function setShipping($shipping = NULL)
    {
        if ($this->shipping) 
        {
            $this->shipping = $shipping;
        }
        $shipping = \Mage::getModel('model\customerAddress');
        if( $id = $this->getRequest()->getGet('id'))
        {
            $query = "SELECT * FROM `address` WHERE `customerId` = $id AND type = 'Shipping'";
            $row = $shipping->load(NULL,$query);
            $this->shipping = $row;
        }
        $this->shipping = $shipping;
        return $this;
    }
    public function getShipping()
    {
        if (!$this->shipping)
        {
            $this->setShipping();
        }
        return $this->shipping;
    }
}
    







?>