<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Category extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try 
        {
            $grid = \Mage::getBLock('block\admin\Category\grid');
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
            $edit = \Mage::getBlock('block\admin\category\edit');
            $layout = $this->getLayout();
            $layout->templateEdit();
            $content = $layout->getContent()->addChild($edit,'Edit');

            $left = $layout->getLeft();
            $leftTab = \Mage::getBlock('block\admin\category\edit\tabs');
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
            if (!$this->getRequest()->isPost()) 
            {
                throw new \Exception("Invalid Request");
            }
            $category = \Mage::getModel('model\category');
            $categoryId = $this->getRequest()->getGet('id');
            if ($categoryId) 
            {
                $category = $category->load($categoryId);
                if (!$category) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }
            else 
            {
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            }
            $categoryPathId = $category->pathId;
            $categoryData = $this->getRequest()->getPost('category');
            $category->setData($categoryData);  
            $category->Save();    
            $category->updatePathId();
            $category->updateChildernPathIds($categoryPathId, $parentId = null);
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
            $category = \Mage::getModel('model\category');
            if(($id=$this->getRequest()->getGet('id'))){
                $category = $category->load($id);
                if (!$category) {
                    throw new \Exception("Invalid Data");
                }
            }
            $pathId = $category->pathId;
            $parentId = $category->parentId;
            $category->updateChildernPathIds($pathId, $parentId);
            $category->delete($id);
            // if (!$delete) {
            //     throw new Exception("Data Can't Delete");
            // }
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