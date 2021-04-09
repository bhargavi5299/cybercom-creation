<?php
namespace Block\Admin\Product;

\Mage::loadClassByFileName('block\core\grid');

class Grid extends \Block\Core\Grid
{
    protected $products = null;

    public function __Construct()
    {
        parent::__Construct();
        //$this->setTemplate('Admin/product/grid.php');
    }
    public function setCollection($collection = null){
        if(!$collection){
        $collectionModel = \Mage::getModel('Model\Product');
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
        $this->addColumn('productId',[
        'field' => 'productId',
        'label' => 'productId',
        'type' => 'number'
        ]);
        $this->addColumn('sku',[
        'field' => 'sku',
        'label' => 'sku',
        'type' => 'varchar'
        ]);
        $this->addColumn('name',[
        'field' => 'name',
        'label' => 'name',
        'type' => 'varchar'
        ]);
        $this->addColumn('price',[
        'field' => 'price',
        'label' => 'price',
        'type' => 'number'
        ]);
        $this->addColumn('discount',[
        'field' => 'sku',
        'label' => 'sku',
        'type' => 'number'
        ]);
        $this->addColumn('quantity',[
        'field' => 'quantity',
        'label' => 'quantity',
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
        $this->addColumn('updatedDate',[
        'field' => 'updatedDate',
        'label' => 'updatedDate',
        'type' => 'datetime'
        ]);
        // $this->addColumn('brand',[
        // 'field' => 'brand',
        // 'label' => 'brand',
        // 'type' => 'varchar'
        // ]);
        // $this->addColumn('color',[
        // 'field' => 'color',
        // 'label' => 'color',
        // 'type' => 'varchar'
        // ]);
        // $this->addColumn('size',[
        // 'field' => 'size',
        // 'label' => 'size',
        // 'type' => 'number'
        // ]);
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
        $this->addAction('cart',[
            'label' => 'Add to cart',
            'method' => 'getCartUrl'
            ]);
        return $this;
        }
        
        public function getEditUrl($row){
        $url = $this->getUrl()->getUrl('form',null,['id' => $row->productId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        
        public function getDeleteUrl($row){
        $url = $this->getUrl()->getUrl('delete',null,['id' => $row->productId]);
        return "object.setUrl('{$url}').resetParams().load()";
        }
        public function getCartUrl($row)
        {
            $url = $this->getUrl()->getUrl('addToCart','Cart',['id' =>$row->productId]);
            return "object.setUrl('{$url}').resetParams().load()";
        }
       
        
        public function getTitle(){
        return 'Product Deatils';
        }
        
        public function prepareButtons(){
        $this->addButton('addNew',[
        'label' => 'New Product',
        'method' => 'getAddNewUrl'
        ]);
        return $this;
        }

    // public function setProduct($products = null)
    // {
    //     if (!$products) {
    //         $products = \Mage::getModel('model\product');
    //         $products = $products->fetchAll();
    //         $count = $products->count();
    //         $pager = \Mage::getController('controller\core\pager');
    //         $pager->setTotalRecords($count);
    //         $pager->setCurrentPage($this->getRequest()->getGet('page'));
    //         $pager->calculate();
    //         echo "<pre>";
    //         print_r($pager);
    //     }
    //     $this->products = $products;
    //     return $this;
    // }
    // public function getProduct()
    // {
    //     if (!$this->products) {
    //         $this->setProduct();
    //     }
    //     return $this->products;
    // }
}
