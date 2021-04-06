<?php
namespace Block\Admin\Brand;
class Grid extends \Block\Core\Template
{
    protected $brands;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/Brand/grid.php');
    }
    protected function setBrands($brands = null)
    {
        if ($this->brands) {
            $this->brands = $brands;
        }
        if (!$brands) {
            $brand = \Mage::getModel('Model\Brand');
            $rows = $brand->fetchAll();
            $this->brands = $rows;
        }
        return $this;
    }
    public function getBrands()
    {
        if (!$this->brands) {
            $this->setBrands();
        }
        return $this->brands;
    }
}


?>