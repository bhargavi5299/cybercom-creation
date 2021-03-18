<?php
namespace Block\Admin\Category;
\Mage::loadClassByFileName('block\core\template'); 


class Edit extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('/admin/Category/edit.php');
       
    }

    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('block\category\edit\tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        if (!array_key_exists($tab,$tabs))
        {
            return null;
        }
        $blockName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockName)->toHtml();
    }
   
}



?>