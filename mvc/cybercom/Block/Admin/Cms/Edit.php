<?php
namespace Block\Admin\Cms;

\Mage::loadClassByFileName('block\core\edit');

class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass('block\admin\cms\edit\tabs');
    } 
}



?>