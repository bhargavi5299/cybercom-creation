<?php
namespace Block\Admin\Category\Edit\Tabs;
\Mage::loadClassByFileName('block\core\template'); 

class Category extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('admin/Category/edit/tabs/category.php');
    }
}
?>