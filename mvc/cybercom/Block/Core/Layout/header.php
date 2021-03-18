<?php
namespace Block\Core\Layout;
\Mage::loadClassByFileName('block\core\template');
class Header extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('/core/layout/header.php');
        
    }
}
?>