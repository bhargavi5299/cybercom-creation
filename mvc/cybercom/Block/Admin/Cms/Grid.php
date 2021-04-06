<?php
namespace Block\Admin\Cms;

\Mage::loadClassByFileName('block\core\grid');

class Grid extends \Block\Core\Grid   
{
    protected $cms = null;

    public function __construct()
    {
        parent::__construct();
       /// $this->setTemplate('admin/cms/grid.php');
    }
    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('Model\Cms');
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
        $this->addColumn('pageId',[
        'field' => 'pageId',
        'label' => 'pageId',
        'type' => 'number'
        ]);
        $this->addColumn('title',[
        'field' => 'title',
        'label' => 'title',
        'type' => 'varchar'
        ]);
        $this->addColumn('indentifier',[
            'field' => 'indentifier',
            'label' => 'indentifier',
            'type' => 'varchar'
            ]);
            $this->addColumn('content',[
                'field' => 'content',
                'label' => 'content',
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
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->pageId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->pageId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getTitle(){
        return 'Cms';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New Cms',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }
}


?>