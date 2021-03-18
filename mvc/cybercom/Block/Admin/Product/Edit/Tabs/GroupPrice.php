<?php
namespace  Block\Product\Edit\Tabs;
\Mage::loadClassByFileName('block\core\template');

class GroupPrice extends \Block\Core\Template
{
    protected $product = null;
    protected $customerGroups = null;
 
    public function __construct()
    {
        $this->setTemplate('admin/product/edit/tabs/groupPrice.php');
    }

    public function setProduct($product = null)
    {
        if (!$product) {
            $product = \Mage::getModel('Model\product');
            $product = $product->load($this->getRequest()->getGet('id'),null);
        }
        $this->product = $product;
        return $this;
    }
    public function getProduct()
    {
        if (!$this->product) {
            $this->setProduct();  
        }
        return $this->product;
    }

    public function setCustomerGroup()
    {
        $query = "SELECT cg.*,pgp.productId,pgp.entityId,pgp.price as groupPrice,
        if(p.price IS NULL,'{$this->getProduct()->price}',p.price) as price
        FROM customergroup cg
        LEFT JOIN product_group_price pgp
            ON pgp.customerGroupId = cg.groupId
                AND pgp.productId = '{$this->getProduct()->productId}'
        LEFT JOIN product p
            ON pgp.productId = p.productId";
        
        $customerGroups = \Mage::getModel('model\GroupPrice');
        $this->customerGroups = $customerGroups->fetchAll($query);
        return $this->customerGroups;
    }
    public function getCustomerGroup()
    {
        if (!$this->customerGroups) {
            $this->setCustomerGroup();            
        }
        return $this->customerGroups;
    }
}
