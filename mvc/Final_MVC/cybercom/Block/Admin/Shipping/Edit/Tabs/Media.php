<?php
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Media extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/shipping/edit/tabs/media.php');
    }
}
