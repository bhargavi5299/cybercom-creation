<?php
namespace Block\Admin\Customergroup\Edit;

\Mage::loadClassByFileName('block\core\edit\tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information', ['label' => 'Customer Group Information', 'block' => 'block\admin\customergroup\edit\tabs\information']);
        $this->setDefalutTab('information');
        return $this;
    }
}
