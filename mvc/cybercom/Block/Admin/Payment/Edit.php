<?php
namespace Block\Admin\Payment;

\Mage::loadClassByFileName('block\core\template');

class Edit extends \Block\Core\Template
{
    public function __construct()
    {
        $this->setTemplate('admin/payment/edit.php');    
    }
    
    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('block\admin\payment\edit\tabs');
        $tabs = $tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        $blockName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockName)->toHtml();
    }
}



?>