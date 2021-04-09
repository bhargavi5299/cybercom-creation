<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Admin extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getModel('model\admin');
        // echo $query ="SELECT * FROM admin";
        // $grid->fetchAll($query);
        // die();
        $grid = \Mage::getBLock('block\admin\admin\grid')->toHtml();
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
        $edit = \Mage::getBlock('block\admin\admin\edit');
        $admin = \Mage::getModel('model\admin');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$admin->load($id)) {
                throw new \Exception("No Product Data Found");
            }
        }
        $edit->setTableRow($admin);

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
            $admin = \Mage::getModel('model\admin');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Post Request");
            }
            $adminId = $this->getRequest()->getGet('id');
            if (!$adminId) {
                date_default_timezone_set('Asia/Kolkata');
                $admin->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $admin = $admin->load($adminId);
                if (!$admin) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }
            $adminData = $this->getRequest()->getPost('admin');
            if ($adminData['password']) {
                $adminData['password'] = Md5($adminData['password']);
            }
            // echo "<pre>";
            // print_r($adminData);
            // die();
            $admin->setData($adminData);
            $admin = $admin->Save();
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }

    public function deleteAction()
    {
        try {
            $id = $this->getRequest()->getGet('id');
            if (!$id) {
                throw new \Exception("Id is not exits");
            }
            $admin = \Mage::getModel('model\admin');
            $delete = $admin->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }

}
