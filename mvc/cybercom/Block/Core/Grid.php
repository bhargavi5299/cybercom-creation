<?php
namespace Block\Core;

\Mage::getController("Block\Core\Template");
class Grid extends Template
{

    protected $collection = [];
    protected $actions = [];
    protected $buttons = [];
    protected $columns = [];
    
    public function __construct(){
    parent::__construct();
    $this->setTemplate('./core/grid.php');
    $this->prepareColumns();
    $this->prepareActions();
    $this->prepareButtons();
    }
    public function setCollection($collection){
        $this->collection = $collection;
        return $this;
    }

    public function getCollection(){
        if(!$this->collection){
            $this->setCollection($collection =null);
        }
        return $this->collection;
    }
    
    public function setAction($actions){
    $this->actions = $actions;
    return $this;
    }
    
    public function getAction(){
    return $this->actions;
    }
    
    public function prepareActions(){
    return $this;
    }
    
    public function setButton($buttons){
    $this->buttons = $buttons;
    return $this;
    }
    
    public function getButton(){
    return $this->button;
    }
    
    public function prepareButtons(){
    return $this;
    }
    
    public function addButton($key, $value){
    $this->button[$key] = $value;
    return $this;
    }
    
    public function setColumns($columns){
    $this->columns = $columns;
    return $this;
    }
    
    public function getColumns(){
    return $this->columns;
    }
    
    public function addColumn($key, $value){
    $this->columns[$key] = $value;
    return $this;
    }
    
    public function prepareColumns(){
    return $this;
    }
    
    public function getFieldValue($row ,$field){
    return $row->$field;
    }
    
    public function addAction($key, $value){
    $this->actions[$key] = $value;
    return $this;
    }
    
    public function getMethodUrl($row, $methodName){
    return $this->$methodName($row);
    }
    
    public function getTitle(){
    return 'Manage Module';
    }
    
    public function getButtonUrl($methodName){
    return $this->$methodName();
    }
    
    public function getAddNewUrl(){
    $url = $this->getUrl()->getUrl('form');
    return "object.setUrl('{$url}').resetParams().load()";
    }
    
  

}



        

       

?>