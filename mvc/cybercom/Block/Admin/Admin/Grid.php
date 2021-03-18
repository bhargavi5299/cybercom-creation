<?php
namespace Block\Admin\Admin;
\Mage::loadClassByFileName('Block\Core\Template');
class Grid extends \Block\Core\Template  
{
    protected $admin = null;

    public function __construct()
    {
        $this->setTemplate('admin/Admin/grid.php');
       
    }
   
    
    public function setAdmin($admin = null)
    {
        if (!$admin) {
            $admin = \Mage::getModel('Model_Admin');
            $admin= $admin->fetchAll();
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