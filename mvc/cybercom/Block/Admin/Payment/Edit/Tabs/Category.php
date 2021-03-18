<?php
namespace Block\Payment\Edit\Tabs;
\Mage::loadClassByFileName('Block\Core\Template');
class Category extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('admin/Payment/edit/tabs/category.php');
    }
}
?>