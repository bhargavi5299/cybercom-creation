<?php
$time= time();
$actual_time=date("h:i:sa",$time);
$date=date('D:M:Y @ H:i:s',$time);
$time_m=date('D:M:Y @ H:i:S',strtotime('+1 week'));

echo "current time ".$date."   modified time  ".$time_m;
/*echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");*/





?>