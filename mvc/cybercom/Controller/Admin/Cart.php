<?php

namespace Controller\Admin;

class Cart extends \Controller\Core\Admin
{
    public function getCart($customerId = null)
    {
        $session = \Mage::getModel('Model\Admin\Session');
        if ($customerId) {
            $session->customerId = $customerId;
        }
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM {$cart->getTableName()} WHERE `customerId` = '{$session->customerId}'";
        $cart = $cart->load(null, $query);

        if ($cart) {
            return $cart;
        }

        $cart = \Mage::getModel('Model\Cart');
        $cart->customerId = $session->customerId;
        $cart->createdDate = date("Y-m-d H:i:s");
        $cart->save();
        return $cart;
    }

    public function saveCustomerAction()
    {
        $customerId = $this->getRequest()->getPost('customer');
        $this->getMessage()->setSuccess('Customer Selected');
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart($customerId['customerId']))->toHtml();
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

    public function addToCartAction()
    {
        $productId = $this->getRequest()->getGet('id');
        $product = \Mage::getModel('Model\Product')->load($productId);
        $this->getCart()->addItemToCart($product);
        $this->getMessage()->setSuccess('Item add to cart.');
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
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

    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
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

    public function updateCartAction()
    {
        $itemData = $this->getRequest()->getPost('quantity');
        
        foreach ($itemData as $cartitemId => $quantity) {
            // $item = \Mage::getModel('\Model\Cart\Item')->load($itemData);
            // echo "<pre>";
            // print_r($item);
            
            if ($quantity != 0) {
                $item = \Mage::getModel('\Model\Cart\Item')->load($cartitemId);
                print_r($item->quantity);
                print_r($itemData);
                 die();
                $item->Save();
            }
            if ($quantity == 0) {
                $this->deleteAction($cartitemId);
            }
        }
        $this->getMessage()->setSuccess('Cart update Successfully.');
        $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
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

    public function deleteAction($itemId = null)
    {
        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItemId = $this->getRequest()->getGet('id');
        if ($itemId) {
            $cartItemId = $itemId;
        }
        $cartItem = $cartItem->load($cartItemId);
        if ($cartItem) {
            $cartItem->delete($cartItemId);
        }
        if ($itemId) {
            return true;
        } else {
            $this->getMessage()->setSuccess('Item deleted.');
            $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
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
    }
}
