<?php
namespace Controller\Admin;



class Config extends \Controller\Core\Admin
{
    public function gridAction()
    {
        $grid = \Mage::getBLock('block\admin\config\grid')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $grid,
                ],
                [
                    'selector' => '#tabHtml',
                    'html' => null,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    public function formAction()
    {
        $edit = \Mage::getBlock('block\admin\config\edit');
        $config = \Mage::getModel('model\config');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$config->load($id)) {
                throw new \Exception("No Product Data Found");
            }
        }
        $edit->setTableRow($config);
        $contentHtml = $edit->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $contentHtml,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    public function saveAction()
    {
        try
        {
            $config = \Mage::getModel('model\config');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Post Request");
            }
            $configId = $this->getRequest()->getGet('id');
            
            if (!$configId) {
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $config = $config->load($configId);
                if (!$config) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }

            $configData = $this->getRequest()->getPost('config');
            $query = "ALTER TABLE {$configData['title']} ADD {$configData['code']} {$configData['value']}";
            $config->getAdapter()->query($query);
            $config->setData($configData);
            $config->Save();
            $this->redirectUrl('grid', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid', null, [], true);
        }
    }
    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Id is not exits");
            }
            $config = \Mage::getModel('model\config');
            $delete = $config->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('grid', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('grid', null, [], true);
        }

    }
}