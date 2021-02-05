<?php
   class Books {
      /* Member variables */
       public $price=100;
     
      
      /* Member functions */
      public function SetPrice(){
        echo "price". $this->price ;
      }
       public function GetPrice($par){
          $this->price =$this->price - $par;
      }
      
   }
   $bhargavi=new Books();

   $bhargavi->GetPrice(50);
   $bhargavi->SetPrice();
?>