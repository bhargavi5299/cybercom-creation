<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Cms extends \Controller\Core\Admin
{

    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('block\admin\cms\grid')->toHtml();
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
        $edit = \Mage::getBLock('block\admin\cms\edit');
        $cms = \Mage::getModel('model\cms');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$cms->load($id)) {
                throw new  \Exception("No Product Data Found");
            }
        }
        $edit->setTableRow($cms);
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
            $cms = \Mage::getModel('model\cms');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Post Request");
            }
            $cmsId = $this->getRequest()->getGet('id');
            if (!$cmsId) {
                date_default_timezone_set('Asia/Kolkata');
                $cms->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $cms = $cms->load($cmsId);
                if (!$cms) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }
            $cmsData = $this->getRequest()->getPost('Cms');
            $cms->setData($cmsData);
            $cms->Save();
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
            $cms = \Mage::getModel('model\cms');
            $delete = $cms->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }

    }
}
