<?php
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Category extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/shipping/edit/tabs/category.php');
    }
}
