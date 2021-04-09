<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Attribute extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBLock('block\admin\attribute\grid')->toHtml();
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
        $edit = \Mage::getBLock('block\admin\attribute\edit');
        $attribute = \Mage::getModel('model\attribute');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$attribute->load($id)) {
                throw new \Exception("No Product Data Found");
            }
        }
        $edit->setTableRow($attribute);
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
            $attribute = \Mage::getModel('model\attribute');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Post Request");
            }
            $attributeId = $this->getRequest()->getGet('id');
            if (!$attributeId) {
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            } else {
                $attribute = $attribute->load($attributeId);
                if (!$attribute) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            }

            $attributeData = $this->getRequest()->getPost('attribute');
            $query = "ALTER TABLE {$attributeData['entityTypeId']} ADD {$attributeData['name']} {$attributeData['backendType']}";
            $attribute->getAdapter()->query($query);
            $attribute->setData($attributeData);
            $attribute->Save();
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
            $attribute = \Mage::getModel('model\attribute');
            $delete = $attribute->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }
    }
}
