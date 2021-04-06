<?php
namespace Block\Admin\Shipping;

\Mage::loadClassByFileName('block\core\grid');

class Grid extends \Block\Core\Grid  
{
    protected $shipping = null;

    public function __construct()
    {
        parent::__construct();
       // $this->setTemplate('admin/Shipping/grid.php');
    }
    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('Model\shipping');
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
        $this->addColumn('methodId',[
        'field' => 'methodId',
        'label' => 'methodId ',
        'type' => 'number'
        ]);
        $this->addColumn('name',[
        'field' => 'name',
        'label' => 'Name',
        'type' => 'varchar'
        ]);

        $this->addColumn('code ',[
            'field' => 'code',
            'label' => 'code',
            'type' => 'number'
            ]);
            $this->addColumn('amount ',[
                'field' => 'amount ',
                'label' => 'amount ',
                'type' => 'number'
                ]);
                $this->addColumn('description',[
                    'field' => 'description',
                    'label' => 'description',
                    'type' => 'varchar'
                    ]);
                    $this->addColumn('status',[
                        'field' => 'status',
                        'label' => 'status',
                        'type' => 'varchar'
                        ]);
                        $this->addColumn('createdDate',[
                            'field' => 'createdDate',
                            'label' => 'createdDate',
                            'type' => 'datetime'
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
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->methodId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->methodId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getTitle(){
        return 'shipping';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New shipping',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }
}


?>