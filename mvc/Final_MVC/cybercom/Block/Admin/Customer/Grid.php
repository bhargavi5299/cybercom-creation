<?php
namespace Block\Admin\Customer;

\Mage::loadClassByFileName('block\core\grid');

class Grid extends \Block\Core\Grid
{
    protected $customer = null;

    public function __construct()
    {
        parent::__construct();
       // $this->setTemplate('admin/Customer/grid.php');
    }
    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('Model\Customer');
        $collection = $collectionModel->fetchAll();
        }
        $this->collection = $collection;
        return $this;
        }
        
        public function getCollection(){
        if(!$this->collection){
        $this->setCollection();
        }
        return $this->collection;
        }
        
        public function prepareColumns(){
        $this->addColumn('customerId',[
        'field' => 'customerId',
        'label' => 'customerId',
        'type' => 'number'
        ]);
        $this->addColumn('groupId',[
            'field' => 'groupId',
            'label' => 'groupId',
            'type' => 'number'
            ]);
        $this->addColumn('firstname',[
        'field' => 'firstname',
        'label' => 'firstname',
        'type' => 'varchar'
        ]);
        $this->addColumn('lastname',[
            'field' => 'lastname',
            'label' => 'lastname',
            'type' => 'varchar'
         ]);
        $this->addColumn('email',[
            'field' => 'email',
            'label' => 'email',
            'type' => 'varchar'
            ]);
            $this->addColumn('password',[
                'field' => 'password',
                'label' => 'password',
                'type' => 'varchar'
                ]);
        return $this;
        }
        
        public function prepareActions(){
        $this->addAction('edit',[
        'label' => 'Edit',
        'method' => 'getEditUrl'
        ]);
        $this->addAction('delete',[
        'label' => 'Delete',
        'method' => 'getDeleteUrl'
        ]);
        return $this;
        }
        
        public function getEditUrl($row){
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->customerId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->customerId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getTitle(){
        return 'Customer';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New Customer',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }
    public function getGroupName($id)
    {
        $customerGroup = \Mage::getModel('model\customer\group');
        $customerData = $customerGroup->load($id);
        return $customerData->groupName;
    }

}
