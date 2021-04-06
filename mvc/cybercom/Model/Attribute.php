<?php
namespace Model;

\Mage::getModel('model\core\table');

class Attribute extends Core\Table
{
    const ENTITY_TYPE_PRODUCT = 'product';
    const ENTITY_TYPE_CATEGORY = 'category';

    const INPUT_TYPE_TEXT = 'text';
    const INPUT_TYPE_RADIO = 'radio';
    const INPUT_TYPE_CHECKBOX = 'checkbox';
    const INPUT_TYPE_SELECT = 'select';
    const INPUT_TYPE_TEXTAREA = 'textarea';

    const BACKEND_TYPE_VARCHAR = 'varchar';
    const BACKEND_TYPE_INT = 'int';
    const BACKEND_TYPE_DECIMAL = 'decimal';
    const BACKEND_TYPE_TEXT = 'text';

    public function __construct()
    {
        $this->setPrimaryKey('attributeId');
        $this->setTableName('attribute');
    }

    public function getInputType()
    {
        return [
            self::INPUT_TYPE_TEXT => 'Text',
            self::INPUT_TYPE_RADIO => 'Radio',
            self::INPUT_TYPE_CHECKBOX => 'CheckBox',
            self::INPUT_TYPE_SELECT => 'Select',
            self::INPUT_TYPE_TEXTAREA => 'textarea',
        ];
    }
    public function getBackendType()
    {
        return [
            self::BACKEND_TYPE_VARCHAR => 'Varchar',
            self::BACKEND_TYPE_INT => 'Int',
            self::BACKEND_TYPE_DECIMAL => 'Decimal',
            self::BACKEND_TYPE_TEXT => 'Text',
        ];
    }
    public function getEntityType()
    {
        return [
            self::ENTITY_TYPE_PRODUCT => 'Product',
            self::ENTITY_TYPE_CATEGORY => 'Category',
        ];
    }
    public function getOptions()
	{
		if(!$this->attributeId)
		{
			return false;
		}
		 $query="SELECT * FROM `attribute_option`
		WHERE `attributeId`='{$this->attributeId}'
		ORDER BY `sortOrder` ASC";
		$options=\Mage::getModel('Model\Attribute\option')->fetchAll($query);
		if(!$options){
			return null;
		}
		return $options;
	}
}
