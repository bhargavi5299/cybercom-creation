<?php
namespace Model;

\Mage::loadClassByFileName('model\core\table');


class ProductMedia extends Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('imageId');
        $this->setTableName('productmedia');
    }
    
    public function getImagePath()
    {
        return \Mage::getBaseDir('Image\Product\\');
    }
}

?>