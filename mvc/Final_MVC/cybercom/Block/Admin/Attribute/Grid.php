<?php
namespace Block\Admin\Attribute;
class Grid extends \Block\core\Grid
{
    protected $attributes = null;

    public function __Construct()
    {
        parent::__Construct();
      
    }

    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('Model\Attribute');
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
        $this->addColumn('attributeId',[
        'field' => 'attributeId',
        'label' => 'attributeId',
        'type' => 'number'
        ]);
        $this->addColumn('name',[
        'field' => 'name',
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
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->attributeId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->attributeId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getTitle(){
        return 'Attribute';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New Attribute',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }
        
}

?>