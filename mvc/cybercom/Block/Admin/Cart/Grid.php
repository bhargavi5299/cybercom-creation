<?php

namespace Block\Admin\Cart;

class Grid extends \Block\Core\Grid
{
    protected $cart = null;
    public function __construct()
    {
        $this->setTemplate('admin/cart/grid.php');
    }

    public function getCustomers()
    {
        return \Mage::getModel('Model\Customer')->fetchAll();
    }

    public function getGoUrl()
    {
        return $this->getUrl()->getUrl('saveCustomer', 'cart');
    }

    public function getUpdateCartUrl()
    {
        return $this->getUrl()->getUrl('updateCart', 'Cart');
    }

    public function getDeleteUrl($id)
    {
        return $this->getUrl()->getUrl('delete', 'Cart', ['id' => $id]);
    }

    public function getProcessToPayUrl()
    {
        return $this->getUrl()->getUrl('checkOut', 'cart_checkOut');
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function getCart()
    {
        return $this->cart;
    }
}
