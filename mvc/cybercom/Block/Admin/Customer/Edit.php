<?php
namespace Block\Admin\Customer;

\Mage::loadClassByFileName('block\core\edit');

class Edit extends \Block\Core\Edit
{
    public function __Construct()
    {
        parent::__Construct();
        $this->setTabclass('block\admin\customer\edit\tabs');
    }
}
