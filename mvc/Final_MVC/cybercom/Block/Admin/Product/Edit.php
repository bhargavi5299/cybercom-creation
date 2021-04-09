<?php
namespace Block\Admin\Product;

\Mage::loadClassByFileName('block\core\Edit');

class Edit extends \Block\Core\Edit
{
    public function __Construct()
    {
        parent::__construct();
        $this->setTabclass('block\admin\product\edit\tabs');
    }

}
