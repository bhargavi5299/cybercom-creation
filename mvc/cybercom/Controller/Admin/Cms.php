<?php
namespace Controller\Admin; 

\Mage::loadClassByFileName('controller\core\admin');

class Cms extends \Controller\Core\Admin
{
    
    public function gridAction()
    {  
        try 
        {
            $grid = \Mage::getBlock('block\admin\cms\grid');
            $this->getLayout()->getChild('content')->addChild($grid,'Grid');
            $this->randerLayout();    
           
        } 
        catch (\Exception $e) 
        { 
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid',null,[],true);
        }
    }
    
    public function formAction()
    {  
        try 
        {
            $edit = \Mage::getBLock('block\admin\cms\edit');
            $layout = $this->getLayout();
            $layout->templateEdit();
            $content = $layout->getContent()->addChild($edit,'Edit');

            $left = $layout->getLeft();
            $leftTab = \Mage::getBlock('block\admin\cms\edit\tabs');
            $left->addChild($leftTab,'LeftTab');
            $this->randerLayout();  
        } 
        catch (\Exception $e) 
        { 
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid',null,[],true);
        }   
    }
    public function saveAction()
    {
        try 
        { 
            $cms = \Mage::getModel('model\cms');
            if(!$this->getRequest()->isPost())
            {
                throw new \Exception("Invalid Post Request");
            }
            $cmsId =$this->getRequest()->getGet('id');
            if (!$cmsId) {
                date_default_timezone_set('Asia/Kolkata');
                $cms->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            }
            else{
                $cms =  $cms->load($cmsId);
                if (!$cms) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }   
            $cmsData = $this->getRequest()->getPost('Cms');
            $cms->setData($cmsData);  
            $cms->Save();
            $this->redirectUrl('grid',null,[],true);
        } 
        catch (\Exception $e) 
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid',null,[],true);
        }             
    }
    public function deleteAction()
    {
        try {
            $id=$this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Id is not exits");
            }
            $cms = \Mage::getModel('model\cms');
            $delete = $cms->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('grid',null,[],true);
        } 
        catch (\Exception $e) 
        {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid',null,[],true);
        }   
        
    }    
}

?>