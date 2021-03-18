<?php
namespace Controller\Admin;; 

\Mage::loadClassByFileName('Controller\Core\Admin');



class CustomerGroup extends \Controller\Core\Admin
{
   
    public function gridAction()
    {
        try
        { 
            $grid = \Mage::getBLock('block\admin\customergroup\grid');
            $this->getLayout()->getChild('content')->addChild($grid,'Grid');
            $this->randerLayout();     
        }        
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }       
    }


    public function formAction()
    {
        $edit = \Mage::getBlock('Block\admin\customergroup\Edit');
        $layout = $this->getLayout();
        $layout->templateEdit();
        $content = $layout->getContent()->addChild($edit,'Edit');

        $left = $layout->getLeft();
        $leftTab = \Mage::getBlock('Block\customergroup\Edit\Tabs');
        $left->addChild($leftTab,'LeftTab');
        $this->randerLayout();    

    }


    public function saveAction()
    {
       try
        {
            
            $customer = \Mage::getModel('Model\Customergroup');
            if(!$this->getRequest()->isPost())
            {
                throw new \Exception(" Invalid Post Request");
            }
            $id = $this->getRequest()->getGet('id');
            if(!$id)
            {
                $customer->createdDate = date('Y-m-d H:i:s');
            }
            else
            {
                $customer= $customer->load($id);
                if(!$customer)
                {
                    throw new \Exception("ID not get");
                }
                
            }
            $customerData = $this->getRequest()->getPost('customergroup');
            $customer->setData($customerData);
            $customer=$customer->Save();
            $this->redirectUrl('grid',null,[],true);    
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }
   
    public function deleteAction()
    {
       
        try
        {
            $id=$this->getRequest()->getGet('id');
            if (!$id) 
            {
               throw new \Exception("Id not Available");
                
            }

            $customer = \Mage::getModel('model\Customergroup');
            $customer->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('grid',null,[],true);
        
        }
        catch(\Exception $e)
        {
            echo $e->getMessage();
        }
    }    
 }




?>