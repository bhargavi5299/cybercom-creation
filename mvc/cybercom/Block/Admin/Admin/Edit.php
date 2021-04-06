<?php
namespace Block\Admin\Admin;
class Edit extends \Block\Core\Edit
{
    public function __Construct()
    {
        parent::__Construct();
        $this->setTabClass('block\admin\admin\edit\tabs');
    }
}


?>