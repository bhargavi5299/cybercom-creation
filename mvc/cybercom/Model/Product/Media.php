<?php
namespace Model\Product;

\Mage::loadClassByFileName('model\core\table');


class Media extends \Model\Core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('imageId');
        $this->setTableName('productmedia');
    }
    
    public function getImagePath()
    {
        return \Mage::getBaseDir('Images\Product\\');
    }
}

?>