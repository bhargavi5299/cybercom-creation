<?php
namespace Model\Admin;

\Mage::loadClassByFileName('model\core\session');

class Session extends \Model\Core\Session 
{
    public function __construct()
    {
        parent::__construct();
        $this->setNameSpace('admin');
    }
}
