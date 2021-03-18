<?php
namespace Block\Admin\Admin\Edit;

\Mage::loadClassByFileName('block\core\template');

class Tabs extends \Block\Core\Template 
{
    protected $tabs = [];
    protected $defaultTab;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/Admin/edit/tabs.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'Admin Information','block'=>'block\admin\admin\edit\tabs\information']);
       $this->addTab('category',['label'=>' Category','block'=>'block\admin\admin\edit\tabs\category']);
       // $this->addTab('media',['label'=>'Product Media','block'=>'block_product_edit_tabs_media']);

        $this->setDefalutTab('information');
        return $this;
    }
   
}

