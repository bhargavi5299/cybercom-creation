<?php
namespace Block\Admin\Customergroup;

\Mage::loadClassByFileName('block\core\grid');

class Grid extends \Block\Core\Grid
{
    protected $customerGroup = null;

    public function __construct()
    {
        parent::__construct();
        //$this->setTemplate('admin/customergroup/grid.php');
    }
   
    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('model\customer\group');
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
        $this->addColumn('groupId',[
        'field' => 'groupId',
        'label' => 'groupId',
        'type' => 'number'
        ]);
        $this->addColumn('groupName',[
        'field' => 'groupName',
        'label' => 'groupName',
        'type' => 'varchar'
        ]);
        $this->addColumn('status',[
            'field' => 'status',
            'label' => 'status',
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
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->groupId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->groupId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getTitle(){
        return 'CustomerGroup';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New CustomerGroup',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }

}
