<?php
namespace Model;

class Customer extends Core\Table
{
    const STATUS_ENABLED = 'Enable';
    const STATUS_DISABLED = 'Disable';
    public function __construct()
    {
        $this->setPrimaryKey('customerId');
        $this->setTableName('customers');
    }
    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
        ];
    }
    public function getCustomerGroup()
    {
        $customerGroup = \Mage::getModel('model\customer\group');
        $groupName = $customerGroup->fetchAll();
        return $groupName;
    }
    public function setBillingAddress()
    {
        $address = \Mage::getModel('Model\Customer\Address');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `customerId` = '{$this->customerId}' AND `addressType` = 'Billing'";
        $address = $address->load(null, $query);
        $this->shipping = $address;
        return $this;
    }

    public function getBillingAddress()
    {
        if (!$this->shipping) {
            $this->setBillingAddress();
        }
        return $this->shipping;
    }

    public function setShippingAddress()
    {
        $address = \Mage::getModel('Model\Customer\Address');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `customerId` = '{$this->customerId}' AND `addressType` = 'Shipping'";
        $address = $address->load(null, $query);
        $this->billing = $address;
        return $this;
    }

    public function getShippingAddress()
    {
        if (!$this->billing) {
            $this->setShippingAddress();
        }
        return $this->billing;
    }


}
