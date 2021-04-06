<?php
namespace Block\Admin\Product\Edit\Tabs;

class Attribute extends \Block\Core\Template
{
    protected $attribute = null;
    protected $options = null;

    public function __construct()
    {
        $this->setTemplate('admin/product/edit/tabs/attribute.php');
    }

    public function setOptions($options = null)
    {
        if (!$options) {
            $options = \Mage::getModel('model\attribute\options');
            $query = "SELECT * FROM `{$options->getTableName()}` ORDER BY `sortOrder` ASC";
            $options = $options->fetchAll($query);
        }
        $this->options = $options;
        return $this;
    }
    public function getOptions()
    {
        if (!$this->options) {
            $this->setOptions();
        }
        return $this->options;
    }

    public function setAttribute($attribute = null)
    {
        if (!$attribute) {
            $attribute = \Mage::getModel('model\attribute');
            $query = "SELECT * FROM `{$attribute->getTableName()}` ORDER BY `sortOrder` ASC";
            $attribute = $attribute->fetchAll($query);
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
