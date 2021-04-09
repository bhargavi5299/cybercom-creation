<?php
namespace Block\Admin\index;

use Block\Core\Template;

\Mage::loadClassByFileName('block\core\template');

class Grid extends Template
{
    public function __Construct()
    {
        $this->setTemplate('admin/index/grid.php');

    }
}
