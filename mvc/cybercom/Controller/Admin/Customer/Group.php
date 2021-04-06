<?php
namespace Controller\Admin\Customer;

\Mage::loadClassByFileName('controller\core\admin');

class Group extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('block\admin\Customergroup\grid')->toHtml();
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
        $edit = \Mage::getBlock('block\admin\Customergroup\edit');
        $customerGroup = \Mage::getModel('model\customer\group');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$customerGroup->load($id)) {
                throw new Exception("No Group Found");
            }
        }
        $edit->setTableRow($customerGroup);
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
            $customerGroup = \Mage::getModel('model\customer\group');
            if (!$this->getRequest()->isPost()) {
                throw new Exception("Invalid Request");
            }
            $customerGroupId = $this->getRequest()->getGet('id');
            if (!$customerGroupId) {
                date_default_timezone_set('Asia/Kolkata');
                $customerGroup->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $customerGroupData = $customerGroup->load($customerGroupId);
                if (!$customerGroupData) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }
            $customerGroupData = $this->getRequest()->getPost('group');
            $customerGroup->setData($customerGroupData);
            $customerGroup = $customerGroup->Save();
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }

    public function deleteAction()
    {
        try
        {
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Invalid Data");
            }
            $customerGroup = \Mage::getModel('model\customer\group');
            $delete = $customerGroup->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }
}
