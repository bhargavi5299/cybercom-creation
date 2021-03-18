<?php
namespace  Block\Payment\Edit;

\Mage::loadClassByFileName('block_core_template');

class Tabs extends \Block\Core\Template 
{
    protected $tabs = [];
    protected $defaultTab;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/Payment/edit/tabs.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'Payment Information','block'=>'block\admin\payment\edit\tabs\information']);
        $this->addTab('category',['label'=>'Payment Category','block'=>'block\admin\payment\edit\tabs\category']);
       

        $this->setDefalutTab('information');
        return $this;
    }
   
}

