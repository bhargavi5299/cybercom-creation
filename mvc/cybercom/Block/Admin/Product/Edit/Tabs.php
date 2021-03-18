<?php
namespace Block\Admin\Product\Edit;

\Mage::loadClassByFileName('block\core\template');


class Tabs extends \Block\Core\Template 
{
    protected $tabs = [];
    protected $defaultTab;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/product/edit/tab.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'Product Information','block'=>'block\admin\product\edit\tabs\information']);
        $this->addTab('media',['label'=>'Product Media','block'=>'block\admin\product\edit\tabs\Media']);
        $this->addTab('groupPrice',['label'=>'Customer Group Price','block'=>'block\admin\product\edit\tabs\groupPrice']);
        

        $this->setDefalutTab('information');
        return $this;
    }
   
}

