<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Shipping extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('block\admin\shipping\grid')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $grid,
                ],
                [
                    'selector' => '#tabhtml',
                    'html' => null,
                ],
            ],
        ];
        header("Content-Type:application/json; charset=utf-8");
        echo json_encode($response);
    }

    public function formAction()
    {
        $edit = \Mage::getBLock('block\admin\shipping\edit');
        $shipping = \Mage::getModel('model\shipping');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$shipping->load($id)) {
                throw new \Exception("No shipping Data Found");
            }
        }
        $edit->setTableRow($shipping);
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
            $shipping = \Mage::getModel('model\shipping');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Post Request");
            }
            $ShippingId = $this->getRequest()->getGet('id');
            if (!$ShippingId) {
                date_default_timezone_set('Asia/Kolkata');
                $shipping->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $shipping = $shipping->load($ShippingId);
                if (!$shipping) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }
            $pshippingData = $this->getRequest()->getPost('shipping');
            $shipping->setData($pshippingData);

            $shipping = $shipping->Save();
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
            $shipping = \Mage::getModel('model\shipping');
            $delete = $shipping->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }
}
