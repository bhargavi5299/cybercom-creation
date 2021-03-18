<?php
namespace Block\Admin\Category\Edit;

\Mage::loadClassByFileName('block_core_template');

class Tabs extends \Block\Core\Template 
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/Category/edit/tabs.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'Category Information','block'=>'block\admin\category\edit\tabs\information']);
        $this->addTab('media',['label'=>'Category Media','block'=>'block\admin\category\edit\tabs\media']);

        $this->setDefalutTab('information');
        return $this;
    }
}

