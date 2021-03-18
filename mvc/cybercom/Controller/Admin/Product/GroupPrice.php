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
            echo $query = "SELECT * FROM product_group_price 
            WHERE `productId` = '{$productId}'
            AND `customerGroupId` = '{$groupId}'";
            $groupPrice = \Mage::getModel('model\groupPrice');
            $groupPrice->load(null,$query);
            $groupPrice->price = $price;
            $groupPrice->Save();
        }
        foreach ($groupData['new'] as $groupId => $price) {
            $groupPrice = \Mage::getModel('model\groupPrice');
            $groupPrice->productId = $productId;
            $groupPrice->customerGroupId = $groupId;
            $groupPrice->price = $price;
            print_r($groupPrice);
            $groupPrice->Save();
        }
        $this->redirectUrl('form','admin_product',[],false);
    }
}
