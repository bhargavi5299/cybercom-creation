<?php  
    //initialize a variable of string type  
    $website = "amazon is a best online platform to buy product.";   
    $res = preg_match("/amazon/i", $website);  //i thi string print thay
      
    if ($res) {  
        echo "Pattern matched in string.</br>";  
        print_r($website);  
    } else {  
        echo "Pattern not matched in string.";  
    }  
?>  