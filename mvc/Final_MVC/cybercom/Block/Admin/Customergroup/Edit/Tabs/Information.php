<?php
namespace Block\Admin\Customergroup\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Information extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/customergroup/edit/tabs/information.php');
    }
}
