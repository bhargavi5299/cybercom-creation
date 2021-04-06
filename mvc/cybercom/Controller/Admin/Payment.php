<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Payment extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('block\admin\payment\grid')->toHtml();
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
        $edit = \Mage::getBLock('block\admin\payment\edit');
        $payment = \Mage::getModel('model\payment');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$payment->load($id)) {
                throw new \Exception("No Product Data Found");
            }
        }
        $edit->setTableRow($payment);
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
            $payment = \Mage::getModel('model\payment');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            $methodId = $this->getRequest()->getGet('id');
            if (!$methodId) {
                date_default_timezone_set('Asia/Kolkata');
                $payment->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $payment = $payment->load($methodId);
                if (!$payment) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }

            $paymentData = $this->getRequest()->getPost('payment');
            $payment->setData($paymentData);
            $payment->Save();
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
                throw new \Exception("Id is not exits");
            }
            $payment = \Mage::getModel('model\payment');
            $delete = $payment->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }
}
