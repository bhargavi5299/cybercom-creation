<?php
namespace Controller\Admin\Config;

\Mage::loadClassByFileName('controller\core\admin');

class Options extends \Controller\Core\Admin
{
    public function updateAction()
    {
        $config = \Mage::getModel('model\config\options');
        $configId = $this->getRequest()->getGet('id');
        $existData = $this->getRequest()->getPost('exist');
        if ($existData) {
            $deleteId = [];
            foreach ($existData as $key => $value) {
                $deleteId[] = $key;
            }
            $deleteId = implode(",", $deleteId);
            $query = "DELETE FROM `{$config->getTableName()}` WHERE  `{$config->getPrimaryKey()}` NOT IN ({$deleteId}) AND `configId`=$configId";
            $config->getAdapter()->deleteData($query);
        }

        foreach ($existData as $optionId => $option) {
            $config = \Mage::getModel('model\config\options');
            $query = "SELECT * FROM `{$config->getTableName()}` WHERE `configId` = '{$configId}' AND `{$config->getPrimaryKey()}` = '{$optionId}';";
            $config->load(null, $query);
            $config->name = $option['code'];
            $config->sortOrder = $option['title'];
            $config = $config->Save();
            if ($config) {
                $this->getMessage()->setSuccess("Options Update Successfully..");
            }
        }

        if ($newData = $this->getRequest()->getPost('new')) {
            if ($id = $this->getRequest()->getGet('id')) {
                for ($i = 0; $i < count($newData); $i = $i + 2) {
                    $config = \Mage::getModel('model\config\options');
                    $nextAddr = $i + 1;
                    $query = "INSERT INTO `{$config->getTableName()}` (`code`,`configId`,`title`) VALUES ('$newData[$i]','$id','$newData[$nextAddr]')";
                    $config->getAdapter()->insertData($query);
                }
            }
        }
        $this->redirectUrl('form', 'config', ["tab" => "config"], false);
    }
}
