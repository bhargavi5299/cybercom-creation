<?php
$file='file1.txt';
if (file_exists($file)) {
	echo readfile('file1.txt');//read krva mate

	copy($file,"newfile.txt");//copy mate
	rename("newfile.txt", "oldfile.txt");//rename krva
	//unlink(filename)//file ne remove krva
	
	echo "<pre>";
	echo filetype($file)."<br>";
	echo filesize($file)."<br>";
	echo realpath($file)."<br>";
	print_r(pathinfo($file));
	echo "</pre>";
}
else
{
	echo "file does not exist";
}


?>