<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class GroupPrice extends \Block\Core\Edit
{
    protected $customerGroups = null;

    public function __construct()
    {
        $this->setTemplate('admin/product/edit/tabs/groupPrice.php');
    }

    public function setCustomerGroup()
    {
        $query = "SELECT cg.*,pgp.productId,pgp.entityId,pgp.price as groupPrice,
        if(p.price IS NULL,'{$this->getTableRow()->price}',p.price) as price
        FROM customergroup cg
        LEFT JOIN product_group_price pgp
            ON pgp.customerGroupId = cg.groupId
                AND pgp.productId = '{$this->getTableRow()->productId}'
        LEFT JOIN product p
            ON pgp.productId = p.productId";

        $customerGroups = \Mage::getModel('model\customer\Group');
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
