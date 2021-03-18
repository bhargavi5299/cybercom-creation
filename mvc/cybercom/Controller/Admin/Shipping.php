<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Shipping extends \Controller\Core\Admin
{
    
    public function gridAction()
    {  
        try 
        {
            $grid = \Mage::getBlock('block\admin\shipping\grid');
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
            $edit = \Mage::getBLock('block\admin\shipping\edit');
            $layout = $this->getLayout();
            $layout->templateEdit();
            $content = $layout->getContent()->addChild($edit,'Edit');

            $left = $layout->getLeft();
            $leftTab = \Mage::getBlock('block\admin\shipping\edit\tabs');
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
            $shipping = \Mage::getModel('model\shipping');
            if(!$this->getRequest()->isPost())
            {
                throw new \Exception("Invalid Post Request");
            }
            $ShippingId =$this->getRequest()->getGet('id');
            if (!$ShippingId) {
                date_default_timezone_set('Asia/Kolkata');
                $shipping->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            }
            else{
                $shipping =  $shipping->load($ShippingId);
                if (!$shipping) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }   
            $pshippingData = $this->getRequest()->getPost('shipping');
            $shipping->setData($pshippingData);  
            
            $shipping = $shipping->Save();
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
            $shipping = \Mage::getModel('model\shipping');
            $delete = $shipping->delete($id);
            if (!$delete) {
                throw new \Exception("Data Can't  Delete");
            }
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