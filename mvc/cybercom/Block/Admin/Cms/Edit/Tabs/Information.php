<?php
namespace  Block\Admin\Cms\Edit\Tabs; 
\Mage::loadClassByFileName('block\core\template'); 

class Information extends \Block\Core\Template
{
    protected $cms = null;
    
    public function __construct()
    {
        $this->setTemplate('admin/cms/edit/tabs/information.php');
    }
    public function setCms($cms = null)
    {
        if (!$cms) 
        {
            $cms =  \Mage::getModel('model\cms');
            if ($id = $this->getRequest()->getGet('id')) 
            {
                $cms = $cms->load($id);
                if (!$cms) {
                    return null;
                }
            }  
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