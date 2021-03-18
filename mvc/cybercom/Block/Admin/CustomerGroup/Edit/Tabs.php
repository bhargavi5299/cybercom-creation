<?php
namespace Block\Admin\Customergroup\Edit;

\Mage::loadClassByFileName('block\core\template');
class Tabs extends \Block\Core\Template
{
    protected $tabs = [];
    protected $defaultTab;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/customergroup/edit/tabs.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'customer Information','block'=>'block\admin\customergroup\edit\tabs\information']);
        $this->setDefalutTab('information');
        return $this;
    }
   
}
?>