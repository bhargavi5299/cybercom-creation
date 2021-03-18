<?php
namespace Block\Admin\Shipping\Edit\Tabs;

\Mage::loadClassByFileName('block\core\template');

class Media extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('admin/shipping/edit/tabs/media.php');
    }
}
