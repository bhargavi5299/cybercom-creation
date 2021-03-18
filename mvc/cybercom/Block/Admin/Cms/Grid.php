<?php
namespace  Block\Admin\Cms; 
\Mage::loadClassByFileName('block\core\template'); 
class Grid extends \Block\Core\Template
{
    protected $cms = null;

    public function __construct()
    {
        $this->setTemplate('admin/cms/grid.php');
    }
    public function setCms($cms = null)
    {
        if (!$cms) 
        {
            $cms = \Mage::getModel('model\cms');
            $cms = $cms->fetchAll();
        }
        $this->cms = $cms;
        return $this;
    }
    public function getCms()
    {
        if (!$this->cms) {
            $this->setCms();
        }
        return $this->cms;     
    }    
}


?>