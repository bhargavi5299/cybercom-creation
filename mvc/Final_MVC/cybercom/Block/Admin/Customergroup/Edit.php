<?php
namespace Block\Admin\Customergroup;

\Mage::loadClassByFileName('block\core\edit');


class Edit extends \Block\Core\Edit
{
    public function __construct()
    {
        parent::__construct();
        $this->setTabClass('block\admin\customergroup\edit\tabs');
    }
}

?>
