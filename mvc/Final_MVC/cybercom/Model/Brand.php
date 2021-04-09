<?php
namespace Model;
class Brand extends Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    public function __construct()
    {
      
        $this->setPrimaryKey('brandId');
        $this->setTableName('brand');
    }
    public function getImagePath()
    {
        return \Mage::getBaseDir('Images\Brand\\');
    }
    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
        ];
    }

}
?>