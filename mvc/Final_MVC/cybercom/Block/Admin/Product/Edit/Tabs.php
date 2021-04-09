<?php
namespace Block\Admin\Product\Edit;

\Mage::loadClassByFileName('block\core\edit\tabs');

class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information', ['label' => 'Product Information', 'block' => 'block\admin\product\edit\tabs\information']);
        $this->addTab('attribute', ['label' => 'Product Attribute', 'block' => 'block\admin\product\edit\tabs\attribute']);
        $this->addTab('media', ['label' => 'Product Media', 'block' => 'block\admin\product\edit\tabs\media']);
        $this->addTab('groupPrice', ['label' => 'Customer Group Price', 'block' => 'block\admin\product\edit\tabs\groupPrice']);
        $this->setDefalutTab('information');
        return $this;
    }

}
