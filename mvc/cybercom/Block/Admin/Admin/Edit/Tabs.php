<?php
namespace Block\Admin\Admin\Edit;


class Tabs extends \Block\Core\Edit\Tabs
{
    public function prepareTabs()
    {
        parent::prepareTabs();
        $this->addTab('information', ['label' => 'Admin Information', 'block' => 'block\admin\admin\edit\tabs\information']);
        $this->addTab('user', ['label' => 'Users Information', 'block' => 'block\admin\admin\edit\tabs\user']);

        $this->setDefalutTab('information');
        return $this;
    }

}
