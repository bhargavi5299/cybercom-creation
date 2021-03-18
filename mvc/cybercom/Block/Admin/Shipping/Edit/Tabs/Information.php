<?php
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadClassByFileName('block\core\template');

class Information extends \Block\Core\Template
{
    protected $shipping = null;
    
    public function __construct()
    {
        $this->setTemplate('admin/shipping/edit/tabs/information.php');
    }
    public function setShipping($shipping = null)
    {
        if (!$shipping) 
        {
            $shipping =  \Mage::getModel('model\shipping');
            if ($id = $this->getRequest()->getGet('id')) 
            {
                $shipping = $shipping->load($id);
                if (!$shipping) {
                    return null;
                }
            }  
        }
        $this->shipping = $shipping;
        return $this;
    }
    public function getShipping()
    {
        if (!$this->shipping) {
            $this->setShipping();
        }
        return $this->shipping;     
    }
}
