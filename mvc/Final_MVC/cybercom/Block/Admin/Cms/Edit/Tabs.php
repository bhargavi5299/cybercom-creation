<?php
namespace Block\Admin\Cms\Edit; 

\Mage::loadClassByFileName('block\core\edit\tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information',['label'=>'CMS Page Information','block'=>'block\admin\cms\edit\tabs\information']);
        $this->addTab('media',['label'=>'CMS Media','block'=>'block\admin\cms\edit\tabs\media']);

        $this->setDefalutTab('information');
        return $this;
    }
}

