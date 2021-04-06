<?php
namespace Block\Admin\Payment\Edit\Tabs;

\Mage::loadClassByFileName('block\core\Edit');

class Method extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/payment/edit/tabs/method.php');
    }
}
