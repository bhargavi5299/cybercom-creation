<?php

namespace  Block\Admin\Category\Edit\Tabs;
\Mage::loadClassByFileName('Block\Core\Template');

class Information extends \Block\Core\Template
{
    protected $category = null;
    protected $categoryOptions = null;
    
    public function __construct()
    {
        $this->setTemplate('admin/Category/edit/tabs/information.php');
    }
    public function setCategory($category = null)
    {
        if (!$category) {
            $category = \Mage::getModel('model_category');
            if ($id = $this->getRequest()->getGet('id')) 
            {
                $category = $category->load($id);
                if (!$category) 
                {
                    return null;    
                }
            } 
        }
        $this->category = $category;
        return $this;
    }
    public function getCategory()
    {
        if (!$this->category) {
           $this->setCategory();
        }
        return $this->category;
    }

    public function getFormUrl()
    {
        return $this->getUrl('category','save');
    }

    public function getCategoryOptions()
    {
        if (!$this->categoryOptions) 
        {
            $query = "SELECT `categoryId`,`name` FROM `{$this->getCategory()->getTableName()}`;";
            $options = $this->getCategory()->getAdapter()->fetchPairs($query);

            $query = "SELECT `categoryId`,`pathId` FROM `{$this->getCategory()->getTableName()}`;";
            $this->categoryOptions = $this->getCategory()->getAdapter()->fetchPairs($query);
            
            if ($this->categoryOptions) {
                foreach ($this->categoryOptions as $categoryId => &$pathId) {
                    $pathIds = explode("/",$pathId);
                    foreach ($pathIds as $key => &$id) {
                        if (array_key_exists($id,$options)) {
                            $id = $options[$id];
                        }
                    }
                    $pathId = implode("=>",$pathIds);
                }
            }
            $this->categoryOptions = ["0"=>"Select Category"] + $this->categoryOptions;
        }
        return $this->categoryOptions;
    }
}
