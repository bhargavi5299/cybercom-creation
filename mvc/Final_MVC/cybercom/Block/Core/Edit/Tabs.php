<?php
namespace Block\Core\Edit;
class Tabs extends \Block\Core\Template
{
    protected $tableRow = null;

    public function __construct()
    {
        $this->setTemplate('core/edit/tabs.php');
        $this->prepareTabs();
    }

    public function setTableRow(\Model\Core\Table $tableRow)
    {
        $this->tableRow = $tableRow;
        return $this;
    }

    public function getTableRow()
    {
        return $this->tableRow;
    }

    public function prepareTabs()
    {
        return $this;
    }
    public function setDefalutTab($defaultTab) 
    {
        $this->defaultTab = $defaultTab;
        return $this;
    }
    public function getDefaultTab()
    {
        return $this->defaultTab;
    }

    public function setTabs(array $tabs = [])   
    {
        $this->tabs = $tabs;
        return $this;
    }
    public function getTabs()
    {
        return $this->tabs;
    }
    public function addTab($key,$tab =[])
    {
        $this->tabs[$key] = $tab;
        return $this;
    }
    public function removeTab($key)
    {
        if (array_key_exists($key,$this->tabs)) {
            unset($this->tabs[$key]);
        }
    }
}
