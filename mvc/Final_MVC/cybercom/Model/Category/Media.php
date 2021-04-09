<?php
namespace Model\Category;


class Media extends \Model\Core\Table
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function __construct()
    {
        $this->setPrimaryKey('imageId');
        $this->setTableName('categorymedia');
    }

    public function getImagePath()
    {
        return \Mage::getBaseDir('Images\Category\\');
    }
}
