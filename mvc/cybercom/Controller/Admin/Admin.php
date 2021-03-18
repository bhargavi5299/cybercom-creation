<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Admin extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try 
        {
            $grid = \Mage::getBLock('block\admin\admin\grid');
            $this->getLayout()->getChild('content')->addChild($grid,'Grid');
            $this->randerLayout();
        } 
        catch (\Exception $e) 
        { 
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid');
        }        
    }

    public function formAction()
    {    
        try 
        {
            $edit = \Mage::getBlock('block\admin\admin\edit');
            $layout = $this->getLayout();
            $layout->templateEdit();
            $content = $layout->getContent()->addChild($edit,'Edit');

            $left = $layout->getLeft();
            $leftTab = \Mage::getBlock('block\admin\admin\edit\tabs');
            $left->addChild($leftTab,'leftTab');
            $this->randerLayout();;    
        } 
        catch (\Exception $e) 
        { 
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid');
        }      
    }
    public function saveAction()
    {
        try 
        { 
            $admin = \Mage::getModel('model\admin');
            if(!$this->getRequest()->isPost())
            {
                throw new \Exception("Invalid Post Request");
            }
            $adminId = $this->getRequest()->getGet('id');
            if (!$adminId) {
                date_default_timezone_set('Asia/Kolkata');
                $admin->createdDate = date("Y-m-d H:i:s");  
                $this->getMessage()->setSuccess("Data Insert Successfully..");             
            }
            else{
                $admin =  $admin->load($adminId);
                if (!$admin) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }   
            $adminData = $this->getRequest()->getPost('admin');
            if ($adminData['password']) {
                $adminData['password'] = Md5($adminData['password']);
            }
            $admin->setData($adminData);  
            $admin = $admin->Save();
            $this->redirectUrl('grid');
        } 
        catch (\Exception $e) 
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid');
        }          
    }
    
    public function deleteAction()
    {
        try {
            $id=$this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Id is not exits");
            }
            $admin = \Mage::getModel('model\admin');
            $delete = $admin->delete($id);
            if (!$delete) {
                throw new \Exception("Data Can't Delete");
            }
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('grid');
        }
        catch (\Exception $e) 
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid');
        }         
    }    
    
}

?>