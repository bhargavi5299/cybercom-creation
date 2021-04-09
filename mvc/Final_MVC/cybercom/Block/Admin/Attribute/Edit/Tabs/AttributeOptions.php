<?php
namespace Block\Admin\Attribute\Edit\Tabs;



class AttributeOptions extends \Block\Core\Edit 
{
    protected $attribute = null;

    public function __construct()
    {
        $this->setTemplate('admin/attribute/edit/tabs/attributeOptions.php');
    }

    public function setAttribute($attribute = null)
    {
        if (!$attribute) {
            $option = \Mage::getModel('model\attribute\options');
            if ($id = $this->getTableRow()->attributeId) 
            {
                $query = "SELECT * FROM `{$option->getTableName()}` WHERE `attributeId` = '$id' ORDER BY `sortOrder` ASC";
                $attribute = $option->fetchAll($query);
                if (!$attribute) {
                    return null;
                }
            }  
        }
        
        $this->attribute = $attribute;
        return $this;
    }
    public function getAttribute()
    {
        if (!$this->attribute) {
            $this->setAttribute();
        }
        return $this->attribute;
    }
}
