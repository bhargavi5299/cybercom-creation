<?php
namespace Block\Admin\Config;


class Edit extends \Block\Core\Edit
{
    public function __Construct()
    {
        parent::__Construct();
        $this->setTabClass('block\admin\config\edit\tabs');
    }    
}


?>