<?php
namespace Block\Core\Layout;

\Mage::loadClassByFileName('block\core\template');

class Message extends \Block\Core\Template 
{
    public function __construct()
    {
        $this->setTemplate('core/layout/message.php');
    }
}



?>