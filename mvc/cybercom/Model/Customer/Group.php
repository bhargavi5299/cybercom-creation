<?php
namespace Model\Customer;

\Mage::loadClassByFileName('model\core\table');

class Group extends \Model\Core\Table
{
    const STATUS_ENABLED = 'Enable';
    const STATUS_DISABLED = 'Disable';
    public function __construct()
    {
        $this->setPrimaryKey('groupId');
        $this->setTableName('customergroup');
    }
    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable',
        ];
    }

}
