<?php
//var_dump($_GET);
if (!isset($_GET['btn_sb'])) 
{
	echo "direct url called";
	header("location:form.php");
	exit();
}
else
{
$fn=$_GET["fname"];
$ln=$_GET["lname"];
$email=$_GET["email"];
$pass=$_GET["pass"];

echo "welcome  ".$fn." ".$ln."<br>";
echo "your email is : " .$email."<br>";
echo "your password is : " .$pass."<br>";

}