<?php
namespace Block\Admin\Config;

\Mage::loadClassByFileName('block\core\grid');

class Grid extends \Block\core\Grid
{
    

    public function __Construct()
    {
        parent::__Construct();
      
    }

    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('Model\Config');
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
        $this->addColumn('configId',[
        'field' => 'configId',
        'label' => 'configId',
        'type' => 'number'
        ]);
        // $this->addColumn('groupId',[
        //     'field' => 'groupId',
        //     'label' => 'groupId',
        //     'type' => 'number'
        //     ]);
        $this->addColumn('title',[
        'field' => 'title',
        'label' => 'title',
        'type' => 'varchar'
        ]);
       
        $this->addColumn('code',[
        'field' => 'code',
        'label' => 'code',
        'type' => 'number'
        ]);
        $this->addColumn('value',[
            'field' => 'value',
            'label' => 'value',
            'type' => 'number'
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
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->configId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->configId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getTitle(){
        return 'Config';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New Config',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }
        
}

?>