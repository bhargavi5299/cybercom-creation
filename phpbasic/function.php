
<!--************function with argument*********-->


<?php
function abc()
{
	echo "hello <br><br>";
}

abc();
$num1=10;
$num2=20;
function add($num1,$num2)
{
	echo "addition is <br>";
	echo  $num1+$num2.'<br>' ;
}
add($num1,$num2);


function DisplayDate($day,$month,$year)
{
	echo  $day .' '. $month.' '. $year.' ';
}
DisplayDate('Monday','jan',2021);
?>