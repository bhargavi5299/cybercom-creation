<?php
namespace Block\Admin\Cms\Edit\Tabs; 
\Mage::loadClassByFileName('block\core\template'); 

class Category extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('admin/Admin/edit/tabs/category.php');       
    }
   
}
?>