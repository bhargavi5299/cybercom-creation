<?php
namespace Block\Admin\Admin\Edit\Tabs;
\Mage::loadClassByFileName('block\core\template'); 

class Information extends \Block\Core\Template
{
    protected $admin = null;
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('admin/Admin/edit/tabs/information.php');
        
    }
    
    public function setAdmin($admin = null)
    {
        if (!$admin) 
        {
            $admin = \Mage:: getModel('Model\Admin');
            if($id = $this->getRequest()->getGet('id'))
            {
                $admin = $admin->load($id);
            if (!$admin)
                {
                    throw new \Exception("ID not get");
                }
            }
            
        }
            $this->admin = $admin;
            return $this;
    }
    public function getAdmin()
    {
        if (!$this->admin) {
            $this->setAdmin();
        }
        return $this->admin;     
    }
}
?>