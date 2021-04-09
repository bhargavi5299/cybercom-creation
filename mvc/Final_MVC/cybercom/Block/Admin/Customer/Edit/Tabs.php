<?php
namespace Block\Admin\Customer\Edit;

\Mage::loadClassByFileName('block\core\edit\tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'Customer Information','block'=>'block\admin\customer\edit\tabs\information']);
        $this->addTab('address',['label'=>'Customer Address','block'=>'block\admin\customer\edit\tabs\address']);

        $this->setDefalutTab('information');
        return $this;
    }
    
}

