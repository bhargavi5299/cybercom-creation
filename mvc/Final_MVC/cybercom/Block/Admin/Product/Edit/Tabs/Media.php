<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Media extends \Block\Core\Edit
{
    protected $image = null;

    public function __construct()
    {
        $this->setTemplate('Admin/product/edit/tabs/media.php');
    }

    public function setImage($image = null)
    {
        if ($this->image) {
            $this->image = $image;
        }
        if (!$image) {
            $id = $this->getTableRow()->productId;
            $imageModel = \Mage::getModel('model\product\Media');
            $query = "SELECT * FROM `{$imageModel->getTableName()}` WHERE `productId` = $id";
            $collection = $imageModel->fetchAll($query);
            $this->image = $collection;
        }
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
