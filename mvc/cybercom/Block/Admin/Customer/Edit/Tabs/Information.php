<?php
namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadClassByFileName('block\core\Edit');

class Information extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/customer/edit/tabs/information.php');
    }
}
