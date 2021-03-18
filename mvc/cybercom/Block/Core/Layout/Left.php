<?php
namespace  Block\Core\Layout;
\Mage::loadClassByFileName('block\core\template');
class Left extends \Block\Core\Template
{
    function __construct()
    {
        $this->setTemplate('/core/layout/left.php');   
    }
}
?>