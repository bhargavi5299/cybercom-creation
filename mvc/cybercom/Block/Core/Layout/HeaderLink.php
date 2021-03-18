<?php
namespace  Block\Core\Layout;
\Mage::loadClassByFileName('block\core\template');
class HeaderLink extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('/core/layout/headerlink.php');
        
    }
}
?>