
<!--*************88function within function***********-->

<?php
function add($n1,$n2)
{
	$res=$n1+$n2;
	return $res;
}
function div($n1,$n2)
{
	$res=$n1/$n2;
	return $res;
}
$sum=div(add(10,10) , add(5,5));
echo $sum;



?>