<?php
namespace Model;
class Config extends core\Table
{
    public function __construct()
    {
        $this->setPrimaryKey('configId');
        $this->setTableName('config');
    }

    public function setOptions(\Model\Config\Options\Collection $items)
    {
        $this->items = $items;
        return $items;
    }
    public function getOptions()
    {

        $query ="SELECT * FROM `config_group` WHERE `groupId`='{$this->groupId}'";
        $item =\Mage::getModel('Model\Config\Options')->fetchAll($query);
        return $this->item;
        // if (!$this->configId) {
        //     return false;
        // }
        // $query = "SELECT * FROM `config_group` WHERE `groupId`='{$this->configId}';";
        // $items = \Mage::getModel('Model\Config\Options')->fetchAll($query);

        // if ($items) {
        //     $this->setOptions($items);
        // }
        // return $this->items;
    }
}
?>