<!DOCTYPE html>
<html>
<body>

<p>Search an array for the value "RED", and then replace it with "pink".</p>

<?php
$arr = array("blue","red","green","yellow");
print_r(str_ireplace("RED","pink",$arr,$i)); // Case-insensitive
echo "<br>" . "Replacements: $i";
?>
<p>Search the string "Hello good world!", find the value "WORLD" and replace it with "Peter":</p>

<?php
echo str_ireplace("WORLD","Peter","Hello good world!");
?>
</body>
</html>