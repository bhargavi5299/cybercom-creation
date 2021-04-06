<?php
namespace Controller\Admin\Product;

\Mage::loadClassByFileName('controller\core\admin');

class Media extends \Controller\Core\Admin
{
    public function gridHtml()
    {
        $grid = \Mage::getBLock('block\admin\product\grid')->toHtml();
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
        $edit = \Mage::getBlock('block\admin\product\edit');
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
    }

    public function UploadAction()
    {
        $productMedia = \Mage::getModel('model\product\media');
        $photo = $_FILES['file']['name'];
        $temName = $_FILES['file']['tmp_name'];
        $path = $productMedia->getImagePath();
        $newName = time() . "-" . rand(1000, 9999) . "-" . $photo;
        move_uploaded_file($temName, $path . $newName);
        $productMedia->image = $newName;
        $productMedia->productId = $this->getRequest()->getGet('id');
        $productMedia->Save();
        $this->redirectUrl('form', 'product_media', ["tab" => "media"], false);
    }

    public function updateAction()
    {
        $data = $this->getRequest()->getPost('img');
        foreach ($data['data'] as $key => $value) {
            $productMedia = \Mage::getModel('model\product\Media');
            $productMedia->load($key, null);
            if (array_key_exists('gallary', $value)) {
                if ($value['gallary'] == 'on') {
                    $value['gallary'] = 1;
                } else {
                    $value['gallary'] = 0;
                }
            }

            $productMedia->SetData($value);
            $productMedia->Save();
        }
        array_shift($data);
        foreach ($data as $key => $value) {
            $productMedia = \Mage::getModel('model\product\Media');
            print_r($value);
            if ($value != []) {
                $id = $this->getRequest()->getGet('id');
                $query = "UPDATE `{$productMedia->getTableName()}` set $key=0 where `productId` = $id";
                $productMedia->getAdapter()->updateData($query);
                $productMedia->load($value);
                $productMedia->$key = 1;
                $productMedia->Save();
            }
        }
        $this->redirectUrl('form', 'product_Media', ["tab" => "media"], false);
    }

    public function deleteAction()
    {
        $data = $this->getRequest()->getPost('remove');
        $deleteId = [];
        foreach ($data as $id => $value) {
            $deleteId[] = $id;
            $imageModel = \Mage::getModel('model\product\Media');
            $collection = $imageModel->load($id);
            $name = $collection->image;
            unlink("Images\Product\\" . $name);
        }
        $imageModel = \Mage::getModel('model\product\media');
        $deleteId = implode(",", $deleteId);
        $query = "DELETE FROM `{$imageModel->getTableName()}` where `{$imageModel->getPrimaryKey()}` IN ({$deleteId})";
        $imageModel->getAdapter()->deleteData($query);
        $this->redirectUrl('form', 'product_Media', ["tab" => "media"], false);
    }
}
