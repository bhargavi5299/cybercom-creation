<?php

namespace Block\Admin\Product; 
\Mage::loadClassByFileName('Block\Core\Template');


class Grid extends \Block\Core\Template
{
    protected $products = null;
    

    public function __Construct()
    {
        $this->setTemplate('admin/product/grid.php');
       
    }

    public function setProduct($products = null)
    {
        if (!$products) {
            $products =  \Mage::getModel('model\product');
            $products = $products->fetchAll();
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

?>