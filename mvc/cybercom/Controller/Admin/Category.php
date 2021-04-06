<?php
namespace Controller\Admin;

\Mage::loadClassByFileName('controller\core\admin');

class Category extends \Controller\Core\Admin
{
    public function gridHtmlAction()
    {
        $grid = \Mage::getBLock('block\admin\Category\grid')->toHtml();
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
        header("Content-Type:application/json; charset=utf-8");
        echo json_encode($response);
    }

    public function formAction()
    {
        $edit = \Mage::getBlock('block\admin\category\edit');
        $category = \Mage::getModel('model\category');
        if ($id = $this->getRequest()->getGet('id')) {
            if (!$category->load($id)) {
                throw new \Exception("No category Found");
            }
        }
        $edit->setTableRow($category);
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
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalid Request");
            }
            $category = \Mage::getModel('model\category');
            $categoryId = $this->getRequest()->getGet('id');
            if ($categoryId) {
                $category = $category->load($categoryId);
                if (!$category) {
                    throw new \Exception("Data Not Found");
                }
                $this->getMessage()->setSuccess("Data Update Successfully..");
            } else {
                $this->getMessage()->setSuccess("Data Insert Successfully..");
            }
            $categoryPathId = $category->pathId;
            $categoryData = $this->getRequest()->getPost('category');
            $category->setData($categoryData);
            $category->Save();
            $category->updatePathId();
            $category->updateChildernPathIds($categoryPathId, $parentId = null);
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
            $category = \Mage::getModel('model\category');
            if (($id = $this->getRequest()->getGet('id'))) {
                $category = $category->load($id);
                if (!$category) {
                    throw new \Exception("Invalid Data");
                }
            }
            $pathId = $category->pathId;
            $parentId = $category->parentId;
            $category->updateChildernPathIds($pathId, $parentId);
            $category->delete($id);
            $this->getMessage()->setSuccess("Data Delete Successfully..");
            $this->redirectUrl('gridHtml', null, [], true);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirectUrl('gridHtml', null, [], true);
        }

    }

}
