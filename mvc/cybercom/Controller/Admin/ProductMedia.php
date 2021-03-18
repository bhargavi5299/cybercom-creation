<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');


class ProductMedia extends Admin
{
    public function indexAction()
    {
        $this->randerLayout();   
    }
    public function gridAction()
    {  
        try     
        {   
            $grid = \Mage::getBLock('block\Admin\product\grid');
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
            $edit = \Mage::getBLock('block\admin\product\edit');
            $layout = $this->getLayout();
            $layout->templateEdit();
            $content = $layout->getContent()->addChild($edit,'Edit');
            
           
            if ($this->getRequest()->getGet('id')) 
            {
                $left = $layout->getLeft();
                $leftTab = \Mage::getBlock('block\admin\product\edit\tabs');
                $left->addChild($leftTab,'LeftTab');
            }
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
       
        $this->_imageUpload();
    }

    protected function _imageUpload()
    {
        $productMedia = \Mage::getModel('model\productMedia');
        $photo = $_FILES['img']['name'];
        $temName = $_FILES['img']['tmp_name'];
        $path = $productMedia->getImagePath();
        move_uploaded_file($temName, $path.$photo);    

        $productMedia->image = $photo;
        $productMedia->productId = $this->getRequest()->getGet('id');
        $productMedia->Save();
        $this->redirectUrl('form');
    }

    public function updateAction()
    {
        // echo "<pre>";
        $data = $this->getRequest()->getPost('img');
        // print_r($data);
        // die();
        foreach ($data['data'] as $key => $value) 
        {
            $productMedia = \Mage::getModel('model\productMedia');
            $productMedia->load($key);
            if (array_key_exists('gallary',$value)) 
            {
                if ($value['gallary'] == 'on') 
                {
                    $value['gallary'] = 1;
                } 
                else 
                {
                    $value['gallary'] = 0;
                }
            }
            
            $productMedia->SetData($value);
            $productMedia->save();
        }
        array_shift($data);
        foreach ($data as $key => $value) 
        {
            if ($value != []) {
                $productMedia = \Mage::getModel('model\productMedia');
                $id = $this->getRequest()->getGet('id');
                $query = "update productmedia set $key=0 where productId=$id";
                $productMedia->getAdapter()->updateData($query);
                $productMedia->load($value);
                $productMedia->$key = 1;
                $productMedia->Save();
            }
        }
        $this->redirectUrl('form','ProductMedia',["tab"=>"media"],false);
    }
    
    public function deleteAction()
    {
        $data = $this->getRequest()->getPost('remove');
        $deleteId = [];
        foreach ($data as $id => $value) {
            $deleteId[] = $id;
            $productMedia = \Mage::getModel('model\productMedia');
            $imageData = $productMedia->load($id);
            $name = $imageData->image;
            unlink("Images\Product\\".$name);
        }
        $productMedia = \Mage::getModel('model\productMedia');
        $deleteId = implode(",",$deleteId);
        $query = "DELETE FROM `{$productMedia->getTableName()}` WHERE `{$productMedia->getPrimaryKey()}` = ({$deleteId}) ";
        $productMedia->getAdapter()->deleteData($query);
        $this->redirectUrl('form','ProductMedia',["tab"=>"media"],false);
    }
}

?>