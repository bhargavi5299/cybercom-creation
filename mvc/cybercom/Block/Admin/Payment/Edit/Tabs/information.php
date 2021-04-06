<?php
namespace Block\Admin\Payment\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Information extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/payment/edit/tabs/information.php');
    }
}
