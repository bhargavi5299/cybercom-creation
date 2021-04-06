<?php
namespace Block\Admin\Config\Edit\Tabs;



class Config extends \Block\Core\Edit 
{
    protected $config = null;

    public function __construct()
    {
        $this->setTemplate('admin/config/edit/tabs/config.php');
    }

    public function setConfig($config = null)
    {
        if (!$config) {
            $option = \Mage::getModel('model\config\options');
            if ($id = $this->getTableRow()->configId) 
            {
                $query = "SELECT * FROM `{$option->getTableName()}` WHERE `configId` = '$id' ORDER BY `sortOrder` ASC";
                $config = $option->fetchAll($query);
                if (!$config) {
                    return null;
                }
            }  
        }
        
        $this->config = $config;
        return $this;
    }
    public function getConfig()
    {
        if (!$this->config) {
            $this->setConfig();
        }
        return $this->config;
    }
}
