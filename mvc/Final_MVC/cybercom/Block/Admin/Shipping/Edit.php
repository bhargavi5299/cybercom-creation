<?php
namespace Block\Admin\Shipping;

\Mage::loadClassByFileName('block\core\edit');

class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass('block\admin\shipping\edit\tabs');
    } 
}



?>