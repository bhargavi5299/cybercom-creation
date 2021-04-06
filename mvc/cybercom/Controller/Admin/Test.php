<?php
namespace Controller\Admin;
class Test extends \Controller\Core\Admin
{
    protected $array =[];
    public function LcmAction()
     {
    
       $number =$_GET['n'];
       $factor =2;
       while ($number != 1) 
       {
            if($number % $factor ==0)
            {
                $number = $number/$factor;
                array_push($this->array,$factor);
             }
            else
            {
                $factor++;
            }          
       }
       print_r($this->array);
       

        


    }
}
?>