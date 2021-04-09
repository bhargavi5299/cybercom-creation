<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Product extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('block\admin\product\grid')->toHtml();
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
        try {
            $edit = \Mage::getBLock('block\admin\product\edit');
            $product = \Mage::getModel('model\product');
            if ($id = $this->getRequest()->getGet('id')) {
                if (!$product->load($id)) {
                    throw new \Exception("No Product Data Found");
                }
            }
            $edit->setTableRow($product);

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
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }

    }
    public function saveAction()
    {
        try
        {

            $product = \Mage::getModel('model\product');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Post Request");
            }
            $productId = $this->getRequest()->getGet('id');
            if (!$productId) {
                date_default_timezone_set('Asia/Kolkata');
                $product->createdDate = date("Y-m-d H:i:s");
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $product = $product->load($productId);
                if (!$product) {
                    throw new \Exception("Data Not Found");
                }
                date_default_timezone_set('Asia/Kolkata');
                $product->updatedDate = date("y-m-d h:i:s");
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }

            $productData = $this->getRequest()->getPost('product');
            $product->setData($productData);
            $products = $product->Save();
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
            $product = \Mage::getModel('model\product');
            if ($id = $this->getRequest()->getGet('id')) {
                $product = $product->load($id);
                if (!$product) {
                    throw new \Exception("Invalid Data");
                }
            }
            $product->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }
}
