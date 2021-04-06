<?php
namespace Block\Admin\Attribute\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Information extends \Block\Core\Edit
{
    protected $attribute = null;
    
    public function __construct()
    {
        $this->setTemplate('Admin/attribute/edit/tabs/information.php');
    }
}
?>
