<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Payment extends \Controller\Core\Admin
{
    public function gridAction()
    {  
        try 
        {
            $grid = \Mage::getBlock('block\admin\payment\grid');
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
            $edit = \Mage::getBLock('block\admin\payment\edit');
            $layout = $this->getLayout();
            $layout->templateEdit();
            $content = $layout->getContent()->addChild($edit,'Edit');

            $left = $layout->getLeft();
            $leftTab = \Mage::getBlock('block\admin\payment\edit\tabs');
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
            $payment = \Mage::getModel('model\payment');
            if(!$this->getRequest()->isPost())
            {
                throw new \Exception("Invalid Request");
            }
            $methodId =$this->getRequest()->getGet('id');
            if (!$methodId) {
                date_default_timezone_set('Asia/Kolkata');
                $payment->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            }
            else{
                $payment =  $payment->load($methodId);
                if (!$payment) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }   
        
            $paymentData = $this->getRequest()->getPost('payment');
            $payment->setData($paymentData);  
            $payment->Save();
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
        try 
        {
            $id=$this->getRequest()->getGet('id');
            if(!$id){
                throw new \Exception("Id is not exits");
            }
            $payment = \Mage::getModel('model\payment');
            $delete = $payment->delete($id);
            if (!$delete) {
                throw new \Exception("Data Can't Delete");
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