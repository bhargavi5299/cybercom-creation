<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadClassByFileName('block\core\template');


class Block_Product_Edit_Tabs_Media extends \Block\Core\Template
{
    protected $image = null;
    public function __construct()
    {
        $this->setTemplate('admin/Product/edit/tabs/media.php');
    }

    public function setImage($image = null)
    {
        if (!$image) {
            $id = $this->getRequest()->getGet('id');
            $image =  \Mage::getModel('model\productMedia');
            $query = "SELECT * FROM `{$image->getTableName()}` WHERE `productId` = $id";
            $image = $image->fetchAll($query);
        }
        $this->image = $image;
        return $this;
    }
    public function getImage()
    {
        if (!$this->image) {
            $this->setImage();
        }
        return $this->image;     
    }        
}
