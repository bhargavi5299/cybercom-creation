<?php

$uname=$uemail=$subject=$msg='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  	 $uname = testdetails($_POST["uname"]);
  	 $uemail=testdetails($_POST["uemail"]);
  	 $subject=testdetails($_POST["subject"]);
  	 
  	 $msg=testdetails($_POST['msg']);
  	 


	 }

	 
 function testdetails($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }



?>




<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	
	<title></title>
</head>
<body>
	<style type="text/css">
		 
        
       
        
      
      		 input[type=text] {
      		 	width:250px;
         
          border: 2px solid red;
         border-radius: 4px;
          font-size: 16px;
          color: red;
          
          padding: 10px 10px 10px 40px;
          padding-left: 50px;
  				
  				
  			}
  			 input[type=email] {
  				width: 250px;
  				 border: 2px solid red;
         border-radius: 4px;
          font-size: 16px;
          color: red;
          padding: 10px 10px 10px 40px;
          padding-left: 50px;
  			}
  			 input[type=tel] {
  				width: 30%;
  				box-sizing: border-box;
  			 border: 2px solid red;
 				 border-radius: 4px;
  				font-size: 16px;
  				color: red;
  				padding: 12px 20px 12px 40px;
  				padding-left: 50px;
  			}
  			textarea
  			{
  				width:250px;
  				 border: 2px solid red;
         border-radius: 4px;
          font-size: 16px;
          color: red;
          padding: 10px 10px 10px 40px;
          padding-left: 50px;
  			}
  			 button {
  				width: 400px;
  			padding-bottom: 10px;
        color: #523810;
  				
          font-weight: bold;
  				font-size: 20px;
  				background-color:#FFBF00;
  				height: 65px;
  				
  				
  				
  			
  			}
	</style>
	
​
	

<body>
  <center>

<form style="background-color: #EDC364; width: 400px;height: 500px; border:8px solid #523810; border-radius: 8px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST" >
	
   


	
	<div style="box-shadow: 12px 10px solid grey;background-color:red;
          color: #fff; height: 50px; padding-top:20px; font-weight: bold;font-size: 20px;"><center>CONTACT US!</center></div>
	

<br>

<center>
  <input  type="text" id="uname" name="uname" placeholder="Name...." required><p id=uname_e></p>
  
<br>
   <input  type="email" id="uemail" name="uemail" placeholder="Email....." required><p id=uemail_e></p><br>
   <input  type="text" id="subject" name="subject" placeholder="Subject......" required><p id=subject_e></p><br>
   <textarea id="msg" name="msg" rows="4" cols="40" required></textarea><p id=msg_e></p>
</center>
  <center><button onclick="submitFunction()">SEND MEASSAGE</button></center>
</form>


</div>
</body>

<script src="contactus.js"></script>
<?php 



         echo ("<p>Your name is $uname</p>");
         echo ("<p> your email address is $uemail</p>");
         echo ("<p>Your subject $subject</p>");
         echo ("<p>your msg $msg </p>");
        
?>

</html>