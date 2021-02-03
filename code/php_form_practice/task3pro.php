<?php
require 'dbconnect3.php';
var_dump($_POST);
if (!isset($_POST['submit'])) 
{
	header("location:task3.php");
	exit();
}
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$month=$_POST['Month'];
$day=$_POST['Day'];
$year=$_POST['Year'];
$gen=$_POST['gen'];
$con=$_POST['country'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['pass'];
$cpass=$_POST['cpass'];

echo"<h2>welcome</h2><br>".    "<h3>". $fn."<br>"  .$ln.  "</h3>";

echo "your DOB is<br>". $month.$day.$year."<br>";
echo  $gen."<br>";
echo $con ."<br>";
echo $phone."<br>";
echo $email ."<br>";
echo $password ."<br>";



$qry="INSERT into signup(fname,lname,dob,gender,country,email,phone,password,cpassword)
VALUES ('".$fn."','".$ln."','".$month.$day.$year."','".$gen."','".$con."','".$email."','".$phone."','".$password."','".$cpass."')";

echo $qry;
$rs=mysqli_query($conn,$qry);
if ($rs)
 {
	echo "insert sucess";
 }
 else
 {
 	echo "error";
 }

?>