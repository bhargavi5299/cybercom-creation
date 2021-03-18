<?php
namespace Block\Admin\Cms\Edit\Tabs;
\Mage::loadClassByFileName('block\core\template'); 

class Media extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('admin/Cms/edit/tabs/media.php');
    }
}
?>