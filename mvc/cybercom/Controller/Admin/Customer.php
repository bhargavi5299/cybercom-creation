<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Customer extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('block\admin\customer\grid')->toHtml();
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
        $edit = \Mage::getBlock('block\admin\customer\edit');
        $customer = \Mage::getModel('model\customer');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$customer->load($id)) {
                throw new Exception("No Product Data Found");
            }
        }
        $edit->setTableRow($customer);
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
            $customer = \Mage::getModel('model\customer');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            if ($this->getRequest()->getGet('tab')) {
                $billing = \Mage::getModel('model\customer\Address');
                $shipping = \Mage::getModel('model\customer\Address');

                $billingData = $this->getRequest()->getPost('billing');
                $shippingData = $this->getRequest()->getPost('shipping');

                $billing->setData($billingData);
                $billing->Save();

                $shipping->setData($shippingData);
                $shipping->Save();

                $this->redirectUrl('gridHtml', null, [], true);

            }
            $customerId = $this->getRequest()->getGet('id');
            if (!$customerId) {
                date_default_timezone_set('Asia/Kolkata');
                $customer->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $customer = $customer->load($customerId);
                if (!$customer) {
                    throw new \Exception("Data Not Found");
                }
                date_default_timezone_set('Asia/Kolkata');
                $customer->updatedDate = date("y-m-d h:i:s");
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }
            $customerData = $this->getRequest()->getPost('customer');
            if ($customerData['password']) {
                $customerData['password'] = Md5($customerData['password']);
            }
            $customer->setData($customerData);
            $customer = $customer->Save();
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
                throw new \Exception("Invalid Data");
            }
            $customer = \Mage::getModel('model\customer');
            $delete = $customer->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }

}
