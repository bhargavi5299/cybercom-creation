<?php
namespace Controller\Admin;
\Mage::loadClassByFileName('Controller\Core\Admin');

class Product  extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try
        {
        
            $grid = \Mage::getBLock('block\Admin\product\grid');
            $this->getLayout()->getChild('content')->addChild($grid,'Grid');
            $this->randerLayout();             
        }        
        catch(\Exception $e)
        {
            echo $e->getMessage();
            $this->redirectUrl('grid',null,[],true);
        }       
    }
    public function formAction()
    {
        $edit = \Mage::getBLock('block\admin\product\edit');
        $layout = $this->getLayout();
        $layout->templateEdit();
        $content = $layout->getContent()->addChild($edit,'Edit');

        if ($this->getRequest()->getGet('id')) {
            $left = $layout->getLeft();
            $leftTab = \Mage::getBlock('Block\admin\Product\Edit\Tabs');
            $left->addChild($leftTab,'LeftTab');
        }
        $this->randerLayout();    
    }
    
    public function saveAction()
    {
        try 
        { 
           
            $product = \Mage::getModel('model\product');
            if(!$this->getRequest()->isPost())
            {
                throw new \Exception("Invalid Post Request");
            }
            $productId =$this->getRequest()->getGet('id');
            
            print_r($productId);
           
            if (!$productId) {
                date_default_timezone_set('Asia/Kolkata');
                $product->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            }
            else{
                $product =  $product->load($productId);
                if (!$product) {
                    throw new \Exception("Data Not Found");
                }
                date_default_timezone_set('Asia/Kolkata');
                $product->updatedDate = date("y-m-d h:i:s");
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }   
            
            $productData = $this->getRequest()->getPost('product');
            $product->setData($productData);  
            $products = $product->Save();
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
            if (!$id) 
            {
               throw new \Exception("Id not Available");              
            }

            $product = \Mage::getModel('Model\product');
            $product->delete($id);
            $this->redirectUrl('grid',null,[],true);
        }
        catch(\Exception $e)
        {
            $this->getMessage()->setFailure($e->getMessage());   
            $this->redirectUrl('grid',null,[],true);    
        }
    }    
    
}


?>