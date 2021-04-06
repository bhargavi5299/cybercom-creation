<?php
namespace Block\Admin\Attribute\Edit;

\Mage::loadClassByFileName('block\core\edit\tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information',['label'=>'Attribute Form','block'=>'block\admin\attribute\edit\tabs\information']);
        $this->addTab('attributeOption',['label'=>'Attribute Options','block'=>'block\admin\attribute\edit\tabs\attributeOptions']);
        $this->setDefalutTab('information');
        return $this;
    }

}

