<?php  
$string = "Hii everyone!";  
$search = 'Hii';  
$replace = 'Hello';  
echo '<b>'."String before replacement:".'</br></b>';  
echo $string.'</br>';  
$newstr = str_replace($search, $replace, $string, $count);  
echo '<b>'."New replaced string is:".'</br></b>';  
echo $newstr.'</br>';  
echo 'Number of replacement ='.$count;  
?>  