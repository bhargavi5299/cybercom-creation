<?php
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadClassByFileName('block\core\Edit');

class Information extends \Block\Core\Edit
{
    protected $categoryOptions = null;

    public function __construct()
    {
        $this->setTemplate('admin/category/edit/tabs/information.php');
    }
    public function getFormUrl()
    {
        return $this->getUrl('category', 'save');
    }

    public function getCategoryOptions()
    {
        if (!$this->categoryOptions) {
            $query = "SELECT `categoryId`,`name` FROM `{$this->getTableRow()->getTableName()}`;";
            $options = $this->getTableRow()->getAdapter()->fetchPairs($query);
            // echo $query;
            // echo "<pre>";
            // print_r($options);
            // die();

            if (!$this->getRequest()->getGet('id')) {
                $query = "SELECT `categoryId`,`pathId` FROM `{$this->getTableRow()->getTableName()}` ORDER BY `pathId` ASC";
            } else {
                $query = "SELECT `categoryId`,`pathId` FROM `{$this->getTableRow()->getTableName()}` where `pathId` NOT LIKE '{$this->getTableRow()->pathId}%' ORDER BY pathId ASC;";
            }
            $this->categoryOptions = $this->getTableRow()->getAdapter()->fetchPairs($query);

            if ($this->categoryOptions) {
                foreach ($this->categoryOptions as $categoryId => &$pathId) {
                    $pathIds = explode("/", $pathId);
                    foreach ($pathIds as $key => &$id) {
                        if (array_key_exists($id, $options)) {
                            $id = $options[$id];
                        }
                    }
                    $pathId = implode("=>", $pathIds);
                }
            }
            $this->categoryOptions = ["0" => "Select Category"] + $this->categoryOptions;
        }
        return $this->categoryOptions;
    }
}
