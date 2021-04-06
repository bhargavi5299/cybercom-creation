<?php
namespace Block\Admin\Payment\Edit;

\Mage::loadClassByFileName('block\core\edit\tabs');

class Tabs extends \Block\Core\Edit\Tabs 
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information',['label'=>'Payment Information','block'=>'block\admin\payment\edit\tabs\information']);
        $this->addTab('method',['label'=>'Payment Method','block'=>'block\admin\payment\edit\tabs\method']);
        $this->setDefalutTab('information');
        return $this;
    }
}

