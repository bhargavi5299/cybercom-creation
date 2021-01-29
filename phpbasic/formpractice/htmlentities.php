<?php
$string =" thia is 'so' <b>beautiful</b>";
echo $string."<br><br>";
$htmlent=htmlentities($string,ENT_QUOTES);
//echo htmlentities($string,ENT_NOQUOTES);
echo $htmlent;
echo html_entity_decode($htmlent);

?>