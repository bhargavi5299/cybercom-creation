<?php
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadClassByFileName('block\core\Edit');

class Information extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/shipping/edit/tabs/information.php');
    }
}
