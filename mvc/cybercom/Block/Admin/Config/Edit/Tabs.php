<?php
namespace Block\Admin\Config\Edit;

\Mage::loadClassByFileName('block\core\edit\tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information',['label'=>'Config Form','block'=>'block\admin\config\edit\tabs\information']);
        $this->addTab('configOption',['label'=>'Config Options','block'=>'block\admin\config\edit\tabs\config']);
        $this->setDefalutTab('information');
        return $this;
    }

}

