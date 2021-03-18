<?php
namespace Block\Payment\Edit\Tabs; 
\Mage::loadClassByFileName('Block\Core\Template');
class Information extends \Block\Core\Template
{
    protected $payments = null;
    public function __construct()
    {
       
        $this->setTemplate('admin/Payment/edit/tabs/information.php');
        
    }
    
    public function setPayment($payments = null)
    {
        if (!$payments) {
            $payments = \Mage::getModel('Model\payment');
            if($id = $this->getRequest()->getGet('id'))
        {
            $payments = $payments->load($id);
            if (!$payments)
            {
              throw new \Exception("ID not get");
            }
        }
            
        }
        $this->payments = $payments;
        return $this;
    }
    public function getPayment()
    {
        if (!$this->payments) {
            $this->setPayment();
        }
        return $this->payments;     
    }
}
    




?>