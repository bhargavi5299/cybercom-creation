<?php

require 'dbconnect1.php';

if (!isset($_POST['submit'])) 
{
	header("location:task5.php");
	exit();
}


          $pass=$_POST['upass'];
          $email=$_POST['uemail'];

          echo "your Email Id : ".$email."<br>";
          echo "Your Password is : ".$pass."<br>";

          $sql="INSERT into signin_user(email,password)VALUES('".$email."','".$pass."')";
          $rs=mysqli_query($conn,$sql);

          if($rs){

          	echo "Record insert..";
          	
          }
          else
          {
          	echo "insert failed";
          }


?>

