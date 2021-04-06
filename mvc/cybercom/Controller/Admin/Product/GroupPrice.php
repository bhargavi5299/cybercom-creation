<?php
namespace Controller\Admin\Product;

\Mage::loadClassByFileName('controller\core\admin');

class GroupPrice extends \Controller\Core\Admin
{
    public function saveAction()
    {
        $groupData = $this->getRequest()->getPost('groupPrice');
        $productId = $this->getRequest()->getGet('id');

        foreach ($groupData['exist'] as $groupId => $price) {
            $groupPrice = \Mage::getModel('model\product\groupPrice');
            $query = "SELECT * FROM `{$groupPrice->getTableName()}`
            WHERE `productId` = '{$productId}'
            AND `customerGroupId` = '{$groupId}'";
            $groupPrice->load(null, $query);
            $groupPrice->price = $price;
            $groupPrice->Save();
        }
        foreach ($groupData['new'] as $groupId => $price) {
            $groupPrice = \Mage::getModel('model\product\groupPrice');
            $groupPrice->productId = $productId;
            $groupPrice->customerGroupId = $groupId;
            $groupPrice->price = $price;
            $groupPrice->Save();
        }
        $this->redirectUrl('form', 'admin_product_groupPrice', [], false);
    }
}
