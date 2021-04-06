<?php
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadClassByFileName('block\core\edit');

class Information extends \Block\Core\Edit
{
    protected $products = null;

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('Admin/product/edit/tabs/information.php');
    }
}
