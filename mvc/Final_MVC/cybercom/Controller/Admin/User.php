<?php
namespace Controller\Admin;
class User extends \Controller\Core\Admin
{
    public function testAction()
    {
        $product = \Mage::getModel('model\product');
        $query = "SELECT * FROM product
        WHERE productId ='60'
        ORDER BY productId ASC";
        $product = $product->fetchRow($query);
        $product->name='abc';
        $product->sku='#abc';
        echo "<pre>";

        print_r($product);
    }
}


?>