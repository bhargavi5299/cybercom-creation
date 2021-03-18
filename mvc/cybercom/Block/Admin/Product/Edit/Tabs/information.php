<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadClassByFileName('block\core\template');

class Information extends \Block\Core\Template
{
    protected $products = null;
    
    public function __construct()
    {
        $this->setTemplate('admin/product/edit/tabs/information.php');
    }
    public function setProduct($products = null)
    {
        if (!$products) 
        {
            $products = \Mage::getModel('model\product');
            if ($id = $this->getRequest()->getGet('id')) 
            {
                $product = $products->load($id);
                if (!$product) {
                    return null;
                }
            }  
        }
        $this->products = $products;
        return $this;
    }
    public function getProduct()
    {
        if (!$this->products) {
            $this->setProduct();
        }
        return $this->products;     
    }    
}
