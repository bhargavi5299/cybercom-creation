<?php
namespace Block\Admin\Category;

\Mage::loadClassByFileName('block\core\grid');

class Grid extends \Block\Core\Grid
{
    protected $category = null;
    protected $categoryOptions = [];

    public function __construct()
    {
        parent::__construct();
        //$this->setTemplate('admin/category/grid.php');
    }
   
    public function getName($category)
    {
        $categoryModel = \Mage::getModel('model\category');
        if (!$this->categoryOptions) {
            $query = "SELECT `categoryId`,`name` FROM `{$categoryModel->getTableName()}`;";
            $this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($query);
        }

        $pathIds = explode("/", $category->pathId);
        foreach ($pathIds as $key => &$id) {
            if (array_key_exists($id, $this->categoryOptions)) {
                $id = $this->categoryOptions[$id];
            }
        }
        $name = implode("=>", $pathIds);
        return $name;
    }
    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('Model\Category');
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
        $this->addColumn('categoryId',[
        'field' => 'categoryId',
        'label' => 'categoryId',
        'type' => 'number'
        ]);
        $this->addColumn('parentId',[
            'field' => 'parentId',
            'label' => 'parentId',
            'type' => 'number'
            ]);
        $this->addColumn('name',[
        'field' => 'name',
        'label' => 'name',
        'type' => 'varchar'
        ]);
        $this->addColumn('status',[
            'field' => 'status',
            'label' => 'status',
            'type' => 'varchar'
            ]);
            $this->addColumn('description',[
                'field' => 'description',
                'label' => 'description',
                'type' => 'varchar'
                ]);
                $this->addColumn('pathId',[
                    'field' => 'pathId',
                    'label' => 'pathId',
                    'type' => 'varchar'
                    ]);
                    $this->addColumn('ca',[
                        'field' => 'ca',
                        'label' => 'ca',
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
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->categoryId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->categoryId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getTitle(){
        return 'category';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New category',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }
}
