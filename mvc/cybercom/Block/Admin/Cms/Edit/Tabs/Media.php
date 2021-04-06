<?php
namespace Block\Admin\Cms\Edit\Tabs; 

\Mage::loadClassByFileName('block\core\edit');

class Media extends \Block\Core\Edit
{
    public function __construct()
    {
        $this->setTemplate('admin/cms/edit/tabs/media.php');
    }
}
