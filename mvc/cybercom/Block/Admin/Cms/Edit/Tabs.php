<?php
namespace Block\Admin\Cms\Edit; 
\Mage::loadClassByFileName('Block\core\template');
class Tabs extends \Block\Core\Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/cms/edit/tabs.php');
        $this->prepareTabs();
    }

    public function prepareTabs()
    {
        $this->addTab('information',['label'=>'CMS Page Information','block'=>'block\admin\cms\edit\tabs\
        information']);
        $this->addTab('media',['label'=>'CMS Media','block'=>'block\admin\cms\edit\tabs\media']);

        $this->setDefalutTab('information');
        return $this;
    }
}


?>