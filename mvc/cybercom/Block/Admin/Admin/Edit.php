<?php
namespace Block\Admin\Admin;
\Mage::loadClassByFileName('Block\core\template');
class Edit extends \Block\Core\Template
{
    protected $admin = null;
    public function __construct()
    {
       
        $this->setTemplate('admin/Admin/edit.php');
        
    }
    public function getTabContent()
    {
        $tabBlock = \Mage::getBlock('block\admin\admin\edit\tabs');
        $tabs=$tabBlock->getTabs();
        $tab = $this->getRequest()->getGet('tab', $tabBlock->getDefaultTab());
        $blockName = $tabs[$tab]['block'];
        echo \Mage::getBlock($blockName)->toHtml();
    }
    
   
}
    




?>