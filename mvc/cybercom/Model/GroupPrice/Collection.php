<?php
    class Model_GroupPrice_Collection
    {
        public $data = [];  
        public function setData(array $data)
        {
            $this->data = $data;
            return $this;       
        }
        public function getData()
        {
            return $this->data;
        }
        public function Count()
        {
            return count($this->data);
        }
    }
?>