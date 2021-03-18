<?php
namespace Block\Admin\Shipping;

\Mage::loadClassByFileName('block\core\template');

class Grid extends \Block\Core\Template   
{
    protected $shipping = null;

    public function __construct()
    {
        $this->setTemplate('admin/Shipping/grid.php');
    }
    public function setShipping($shipping = null)
    {
        if (!$shipping) 
        {
            $shipping = \Mage::getModel('model\shipping');
            $shipping = $shipping->fetchAll();
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


?>