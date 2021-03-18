<?php
namespace Block\Admin\Customer\Edit; 
\Mage::loadClassByFileName('Block\Core\Template');
class Tabs extends \Block\Core\Template
{
    protected $tabs = [];
    protected $defaultTab;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/Customer/edit/tabs.php');
        $this->prepareTabs();
    }
    
   

    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'customer Information','block'=>'block\admin\customer\edit\tabs\information']);
        $this->addTab('Address',['label'=>'customer Address','block'=>'block\admin\customer\edit\tabs\address']);
        //$this->addTab('media',['label'=>'Product Media','block'=>'block_product_edit_tabs_media']);

        $this->setDefalutTab('information');
        return $this;
    }
  
}
?>