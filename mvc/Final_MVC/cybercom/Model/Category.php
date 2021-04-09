<?php
namespace Model; 

\Mage::loadClassByFileName('model\core\table');

class Category extends Core\Table
{
    const STATUS_ENABLED = 'Enable';
    const STATUS_DISABLED ='Disable';
    public function __construct()
    {
        $this->setPrimaryKey('categoryId');
        $this->setTableName('category');
    }
    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable'
        ];    
    }  

    public function updatePathId()
    {
        if (!$this->parentId) {
            $pathId = $this->categoryId;  
        }
        else
        {   
            $parent = \Mage::getModel('model\category')->load($this->parentId);
            if (!$parent) {
                throw new \Exception("Unable to load parent");
            } 
            $pathId = $parent->pathId."/".$this->categoryId;
        }
        $this->pathId = $pathId;
        $this->Save();                    
    }

    public function updateChildernPathIds($categoryPathId, $parentId = null)
    {
        $categoryPathId = $categoryPathId."/";
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `pathId` LIKE '{$categoryPathId}%' ORDER BY `pathId` ASC";
        $categories = $this->getAdapter()->fetchAll($query);
        if ($categories) {
            foreach ($categories as $key => $row) 
            {
                $row = $this->load($row['categoryId']);
                if ($parentId != null) {
                    $row->parentId = $parentId;
                }
                $row->updatePathId();  
            }
        }
    }
}   
?>