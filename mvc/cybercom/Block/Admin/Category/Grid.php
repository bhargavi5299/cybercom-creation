<?php

namespace Block\Admin\Category;
\Mage::loadClassByFileName('block\core\template');

class Grid extends \Block\Core\Template   
{
    protected $category = null;
    protected $categoryOptions = [];

    public function __construct()
    {
        $this->setTemplate('admin/Category/grid.php');     
    }
    public function setCategory($category = null)
    {
        if (!$category) {
            $category = \Mage::getModel('model\category');
            $query = "SELECT * FROM `{$category->getTableName()}` ORDER BY `pathId` ASC";
            $category = $category->fetchAll($query);
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

    public function getName($category)
    {
        $categoryModel = \Mage::getModel('model\category');
        if (!$this->categoryOptions) {
            $query = "SELECT `categoryId`,`name` FROM `{$categoryModel->getTableName()}`;";
            $this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($query);
        }
        $pathIds = explode("/",$category->pathId);
        foreach ($pathIds as $key => &$id) {
            if (array_key_exists($id,$this->categoryOptions)) {
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode("=>",$pathIds);  
        return $name;
    }
}


?>