<?php
namespace Block\Admin\Shipping\Edit;

\Mage::loadClassByFileName('block\core\edit\Tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information',['label'=>'Shippping Information','block'=>'block\admin\shipping\edit\tabs\information']);
        $this->addTab('category',['label'=>'Shipping Category','block'=>'block\admin\shipping\edit\tabs\category']);
        $this->addTab('media',['label'=>'Shipping Media','block'=>'block\admin\shipping\edit\tabs\media']);

        $this->setDefalutTab('information');
        return $this;
    }
}

