<?php
namespace Block\Admin\Attribute;
class Edit extends \Block\Core\Edit
{
    public function __Construct()
    {
        parent::__Construct();
        $this->setTabClass('block\admin\attribute\edit\tabs');
    }    
}


?>