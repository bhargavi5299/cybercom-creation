<?php
require 'dbconnect2.php';
  if(isset($_POST['uname']) && isset($_POST['uemail']) && isset($_POST['usubject']) && isset($_POST['umsg'])){

      if(!empty($_POST['uname']) && !empty($_POST['uemail']) && !empty($_POST['usubject']) && !empty($_POST['umsg'])){

          $uname=$_POST['uname'];
          $uemail=$_POST['uemail'];
          $usubject=$_POST['usubject'];
          $umsg=$_POST['umsg'];

          echo "Name is : ".$uname."<br>";
          echo "Email is : ".$uemail."<br>";
          echo "Subject is : ".$usubject."<br>";
          echo "Massege is : ".$umsg."<br>";
      }

        $qry="INSERT into user_contact_form(name,email,subject,msg) VALUES ('".$uname."','".$uemail."','".$usubject."','".$umsg."')";

          //echo $qry;

          $rs = mysqli_query($conn,$qry);
            if($rs)

              {
                echo "Insert Success!";
              }
            else
              {
                echo "Insert Error!";
              }

  }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<script type="text/javascript" src="task4.js"></script>
  <style type="text/css">
     
        
       
      
           input[type=text] {
                        
                      font-size: 16px;
                      width: 60%;
                      box-sizing: border-box;
              }
              input[type=email] {
                    font-size: 16px;
                    width: 60%;
                    box-sizing: border-box;
                  }
        
          form{
                  background-color: #EDC364;
                  width:400px;
                  height:500px;
                  border:8px solid #523810;
                  margin-left: 400px;

            } 
            input[type=submit]{
                    width: 60%;
                    
                   
                    font-size: 16px;
                    background-color: lightblue;
                    
                    height: 30px;
            }

        textarea
        {
          width: 60%;
          box-sizing: border-box;
          border: 2px solid #ccc;
         border-radius: 4px;
          font-size: 16px;
          
          padding-left: 50px;
        }
      
      </style>
</head>
<body>
<form action="task4.php" name="uForm" method="post" onsubmit="return validation()">
	
	<center>
    <h1>Contact Us</h1>

    <input type="text" name="uname" id="uname" placeholder="Name....."><br><span id="uname_e"></span>
	<br>
  <input type="email" name="uemail" id="uemail" placeholder="Email....."><br><span id="uemail_e"></span>
  <br>
  <input type="text" name="usubject" id="usubject" placeholder="Subject....."><br><span id="usubject_e"></span>
  <br>
  <textarea name="umsg" id="umsg" rows="5" cols="20"></textarea><br><span id="umsg_e"></span><br>
	<input type="submit" name="submit" value="submit"></center>
</form>
</body>
</html>