<?php
namespace Block\Admin\Customer;

\Mage::loadClassByFileName('Block\Core\Template');

class Block_Customer_Edit extends \Block\Core\Template
{
    
    public function __construct()
    {
        $this->setTemplate('admin/Customer/edit.php');
    }
    
    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('block\admin\customer\edit\tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        $blockName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockName)->toHtml();
    }
}
    




?>