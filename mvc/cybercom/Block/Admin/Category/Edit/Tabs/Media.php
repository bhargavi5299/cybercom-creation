<?php
namespace Block\Admin\Category\Edit\Tabs;


class Media extends \Block\Core\Edit
{
    protected $image = null;

    public function __construct()
    {
        $this->setTemplate('admin/category/edit/tabs/media.php');
    }

    public function setImage($image = null)
    {
        if ($this->image) {
            $this->image = $image;
        }
        if (!$image) {
            $id = $this->getTableRow()->categoryId;
            $imageModel = \Mage::getModel('model\category\Media');
            $query = "SELECT * FROM `{$imageModel->getTableName()}` WHERE `categoryId` = $id";
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
