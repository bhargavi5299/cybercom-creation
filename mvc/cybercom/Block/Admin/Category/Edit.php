<?php
namespace Block\Admin\Category;

\Mage::loadClassByFileName('block\core\edit');

class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabclass('block\admin\category\edit\tabs');
    }
}
