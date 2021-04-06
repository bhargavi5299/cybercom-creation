<?php
namespace Block\Admin\Config\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Information extends \Block\Core\Edit
{

    
    public function __construct()
    {
        $this->setTemplate('Admin/config/edit/tabs/information.php');
    }
}
?>
