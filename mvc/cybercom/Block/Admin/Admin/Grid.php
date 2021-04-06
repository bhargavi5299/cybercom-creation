<?php
namespace Block\Admin\Admin;
class Grid extends \Block\Core\Grid
{
    protected $admin = null;

    public function __Construct()
    {
        parent::__Construct();
        //$this->setTemplate('admin/admin/grid.php');
    }

    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('Model\Admin');
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
        $this->addColumn('adminId',[
        'field' => 'adminId',
        'label' => 'Admin Id',
        'type' => 'number'
        ]);
        $this->addColumn('username',[
        'field' => 'username',
        'label' => 'Name',
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
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->adminId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->adminId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getTitle(){
        return 'Admin Details';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New Admin',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }
}
