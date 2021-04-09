<?php
namespace Block\Admin\Category\Edit;

\Mage::loadClassByFileName('block\core\edit\tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information', ['label' => 'Category Information', 'block' => 'block\admin\category\edit\tabs\information']);
        $this->addTab('media', ['label' => 'Category Media', 'block' => 'block\admin\category\edit\tabs\media']);

        $this->setDefalutTab('information');
        return $this;
    }
}
