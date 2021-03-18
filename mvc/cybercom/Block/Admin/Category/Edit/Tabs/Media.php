<?php

namespace  Block\Admin\Category\Edit\Tabs;
\Mage::loadClassByFileName('block\core\template');

class Media extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('admin/category/edit/tabs/media.php');
    }
}
