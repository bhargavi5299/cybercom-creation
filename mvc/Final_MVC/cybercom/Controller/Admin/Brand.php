<?php
namespace Controller\Admin;
class Brand extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Brand\Grid')->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $grid,
                ],
            ],
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }
    public function uploadAction()
    {
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];

        $newName = time() . "-" . rand(1000, 9999) . "-" . $file_name;
        $brand = \Mage::getModel('Model\Brand');
        $fileUploadPath = $brand->getImagePath() . $newName;
        move_uploaded_file($file_tmp, $fileUploadPath);

        $data['brandImage'] = $newName;

        $brand->setData($data);
        $brand->Save();
        $this->redirectUrl('gridHtml', null, [], true);
    }
    public function updateAction()
    {
        try
        {
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request..");
            }
            $data = $this->getRequest()->getPost('label');
            foreach ($data['brand'] as $key => $value) {
                $brand = \Mage::getModel('Model\Brand');
                if (array_key_exists('brandId', $value)) {
                    $brand->brandId = $value['brandId'];
                }
                if (array_key_exists('brandName', $value)) {
                    $brand->brandName = $value['brandName'];
                }
                if (array_key_exists('sortOrder', $value)) {
                    $brand->sortOrder = $value['sortOrder'];
                }
                if (array_key_exists('createdDate', $value)) {
                    $brand->createdDate = date("Y-m-d H:i:s");
                }
                $brand->save();
            }
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $message = \Mage::getModel('Model\Admin\Message');
            $message->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }
    public function deleteAction()
    {
        $data = $this->getRequest()->getPost('remove');
        if ($data) {
            $delete = array_keys($data);
            $ids = '(';
            foreach ($delete as $value) {
                $ids .= $value . ',';
            }
            $ids = trim($ids, ',');
            $ids .= ')';
            $brand = \Mage::getModel('Model\Brand');

            //delete image from folder
            $queryImage = "SELECT brandImage FROM brand where brandId IN $ids";
            $rows = $brand->fetchAll($queryImage);

            foreach ($rows->getData() as $key => $imageName) {

                foreach ($imageName->data as $value) {
                    unlink('Images/Brand/' . $value);
                }
            }
            $query = "DELETE FROM `brand` WHERE `brandId` in $ids";
            $brand->getAdapter()->query($query);
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }
}

?>