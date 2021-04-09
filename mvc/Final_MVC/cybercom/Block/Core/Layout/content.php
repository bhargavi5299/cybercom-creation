<?php
namespace Block\Core\Layout;

\Mage::loadClassByFileName('block\core\template');

class Content extends \Block\Core\Template 
{
    public function __construct()
    {
        $this->setTemplate('core/layout/content.php');
    }
}



?>