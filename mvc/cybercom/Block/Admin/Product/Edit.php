<?php
namespace Block\Admin\Product; 
\Mage::loadClassByFileName('Block\Core\Template');
class Edit extends \Block\Core\Template
{
    
    public function __construct()
    {
        $this->setTemplate('admin/Product/edit.php');
    }
    
    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('block\admin\product\edit\tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        $blockName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockName)->toHtml();
    }
}
    




?>