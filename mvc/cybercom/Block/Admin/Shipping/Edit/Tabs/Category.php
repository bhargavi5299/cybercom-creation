<?php
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadClassByFileName('block\core\template');

class Category extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('admin/shipping/edit/tabs/category.php');
    }
}
