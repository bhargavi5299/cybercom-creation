<?php
namespace Block\Admin\Cms\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Information extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/cms/edit/tabs/information.php');
    }
}
