<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');


class Customer extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try 
        {
            $grid = \Mage::getBlock('block\admin\customer\grid');
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
            $edit = \Mage::getBlock('block\admin\customer\edit');
            $layout = $this->getLayout();
            $layout->templateEdit();
            $content = $layout->getContent()->addChild($edit,'Edit');

            $left = $layout->getLeft();
            $leftTab = \Mage::getBlock('block\admin\customer\edit\tabs');
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
            $customer = \Mage::getModel('model\customer');
            if(!$this->getRequest()->isPost())
            {
                throw new \Exception("Invalid Request");
            }
            if ($this->getRequest()->getGet('tab')) {
                $billing = \Mage::getModel('model\customerAddress');
                $shipping = \Mage::getModel('model\customerAddress');
                
                $billingData = $this->getRequest()->getPost('billing');
                $shippingData = $this->getRequest()->getPost('shipping');
                
                $billing->setData($billingData);
                $billing->Save();
                
                $shipping->setData($shippingData);
                $shipping->Save();
                
                $this->redirectUrl('grid',null,[],true);

            }
            $customerId = $this->getRequest()->getGet('id');
            if (!$customerId) {
                date_default_timezone_set('Asia/Kolkata');
                $customer->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            }
            else{
                $customer =  $customer->load($customerId);
                if (!$customer) {
                    throw new \Exception("Data Not Found");
                }
                date_default_timezone_set('Asia/Kolkata');
                $customer->updatedDate = date("y-m-d h:i:s");
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }   
            $customerData = $this->getRequest()->getPost('customer');
            if ($customerData['password']) {
                $customerData['password'] = Md5($customerData['password']);
            }
            $customer->setData($customerData);  
            $customer = $customer->Save();
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
                throw new \Exception("Invalid Data");
            }   
            $customer = \Mage::getModel('model\customer');
            $delete = $customer->delete($id);
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