<?php
namespace Block\Core\Layout; 
\Mage::loadClassByFileName('block\core\template');

class Rightbar extends \Block\Core\Template 
{
    public function __construct()
    {
        $this->setTemplate('core/layout/rightBar.php');
    }
}


?>