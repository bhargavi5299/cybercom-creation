<?php
namespace  Model\Core; 

class Table
{
    protected $primaryKey = null;
    protected $tableName = null;
    protected $adapter = null;
    protected $data = [];

    public function getPrimaryKey()
    {
        if (!$this->primaryKey) 
        {
            $this->setPrimaryKey($primaryKey = null);
        }
        return $this->primaryKey;
    }
    public function setPrimaryKey($primaryKey)
    {
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getTableName()
    {
        return $this->tableName;
    }
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }
    public function setAdapter(Adapter $adapter = null)
    {
    
        $this->adapter = \Mage::getModel('Model\Core\Adapter');
        return $this;
    }
    public function getAdapter()
    {
        if(!$this->adapter)
        {
            $this->setAdapter();
        }
        return $this->adapter;
    }

    public function getData()
    {
        return $this->data;
    }
    public function setData(array $data)
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }
   

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }
    public function __get($key)
    {
        if (!array_key_exists($key,$this->data)) {
            return null;
        }
        return $this->data[$key];
    }

    public function Save()
    {        
        if (!array_key_exists($this->getPrimaryKey(),$this->data))
        {          
            $key = implode(",",array_keys($this->data));
            $values = array_values($this->data);
            
            for($i=0; $i<count($values); $i++)
            {
                $values[$i]= "'".$values[$i]."'";
            }
            $values = implode(",",$values);
            $query= "INSERT into `{$this->getTableName()}`  ({$key})  VALUES ({$values})";
        
            $this->getAdapter()->Connection();
            $id = $this->getAdapter()->insertData($query);       
        }
        else
        {
            $keys= [];
            $id = $this->data[$this->getPrimaryKey()]; 
            array_shift($this->data);     
            foreach ($this->data as $key => $value)
            {
                $keys[] ="`".$key."` = '".$value."'";
                
            }
            $keys = implode(",",$keys);
            $query= " UPDATE  `{$this->getTableName()}` set  {$keys} WHERE  `{$this->getPrimaryKey()}` = {$id} ";
            $this->getAdapter()->Connection();
            return $this->getAdapter()->updateData($query);
        }
        $this->load($id);
        return $this;       
    }
    public function load($value)
    {
        $value = (int)$value;
        if (!$value){
            return null;
        }
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = {$value}";
        $this->getAdapter()->Connection();
        $row =  $this->getAdapter()->fetchRow($query);
        $this->setData($row);
        return $this;
    }
    public function fetchAll($query = null)
    {
        if (!$query) {
            $query="SELECT * FROM {$this->getTableName()}";
        }
        $this->getAdapter()->Connection();
        $rows=$this->getAdapter()->fetchAll($query);
        if(!$rows)
        {
            return false;
        }
        foreach ($rows as $key => $value) 
        {
            $key = new $this;
            $key->setData($value);
            $rowArray[] =$key;
        }
       // return $rowArray;
        $collection = get_class($this).'\collection';
        $collection = \Mage::getModel($collection);
        $collection->setData($rowArray);
        unset($rowArray);
        return $collection;
    
    }
    public function delete($id)
    {   
        $query = "DELETE from `{$this->getTableName()}` WHERE  `{$this->getPrimaryKey()}` = '$id'   ";   
        $this->getAdapter()->Connection();
        $delete=$this->getAdapter()->deleteData($query);
        if(!$delete)
        {
            return false;
        }
    }

   


}


?>