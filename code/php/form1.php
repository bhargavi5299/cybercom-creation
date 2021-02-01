
<?php
//var_dump($_POST); 
 if (isset($_POST['submit']))
  {
 $fn=$_POST["name"];
 $pass=$_POST["password"];
  $adress=$_POST["add"];
 $gender=$_POST["gen"];
 $age=$_POST["age"];
 $file=$_POST["file"];
$game=$_POST['game'];

 echo $fn."<br>";
  echo $pass ."<br>";
 echo $adress ."<br>";
echo $age ."<br>";
 echo $gender ."<br>";
echo $file;
 }




?>
 <!DOCTYPE html>
<html>
<head>
	<title>Form1</title>
	
	<style type="text/css">
		td
		{
			background-color: #6495ED;
		}
		input[type=text] {
  				width: 74%;
  				padding-left: 55px;
  				background-color: #9FE2BF;
  				
  				
		}
		input[type=file]
		{
			background-color: #9FE2BF;
		}
		input[type=submit]
		{
			background-color: #9FE2BF;
		}
		th
		{
			background-color: yellow;
			color:red;
		}
		
		
		
		textarea
		{
			width: 74%;
  			padding-left: 55px;
  			background-color: #9FE2BF;
		}
		select
		{
			width: 74%;
  			padding-left: 55px;
  			background-color: #9FE2BF;
		}

		th
		{
			margin-top: 20px;
		}
		table
		{
			border:2px solid grey;
		}

	</style>
	<script type="text/javascript" src="script1.js"></script>
</head>
<body>
	
		<center>
		<table border="1" width="40%">
			<tr>
				<th>User Form</th>
			</tr>
		</table>
		<form  method="POST" name="form" action="#" id="myform" onsubmit="return validation()" >
		<table border="1"  width="40%" >
			<tr>
				<td width="30%">Enter Name:</td>
				<td width="50%" height="60%"><center><input type="text" id="name" name="name"></center><span id="span_name"></span></td>
				
			</tr>
			<tr>
				<td width="30%">Enter Password:</td>
				<td width="50%" height="60%"><center><input type="text" id="pass" name="password"> <span id="span_pass"></span></center></td>
				
			</tr>
			<tr>
	         	<td><label for="uaddress">Enter Address:</label></td>
	         	<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="add" id="add" rows="3" cols="20"></textarea><span id="span_add"></span></td>
	         </tr>
			<tr>
				<td width="30%">Select Game</td>
				<td >&nbsp;
				
					Hockey<input type="checkbox" name="game" id="game" value="Hockey">
					Football<input type="checkbox" name="game"  id="game" value="Football">
				Badminton<input type="checkbox" name="game" id="game" value="Badminton">
		&nbsp;&nbsp;cricket <input type="checkbox" name="game" id="game" value="cricket">
		vollyball <input type="checkbox" name="game" id="game" value="vollyball">
				<span id="span_game"></span></td>
			
			</tr>
			<tr>
				<td>Gender</td>
				<td> &nbsp;&nbsp;&nbsp;Male<input type="radio" name="gen" value="male">
					Female<input type="radio" name="gen" value="female"></td>
			</tr>
			<tr>
	         	<td><label for="age">Select ur age</label></td>
	         	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	         		<select name="age">
	         			<option value="none">select age</option>
	         			<option value="1-15">1-15</option>
	         			<option value="16-30">16-30</option>
	         			<option value="31-60">31-60</option>
	         			<option value="60 above">60 above</option>

	         		</select>

	         	</td>
	         </tr>
			 <tr>
	         	<td colspan="2"><center><form action="#" method="POST" enctype="multipart/form-data"><input type="file" name="file"></center></form>
	         </tr>


			 <tr>
	         	<td colspan="2">
	         		<center><input type="submit" name="reset" value="Reset">
	         		<input type="submit" name="submit" value="submit" ></center>
	         	</td>
	         </tr>
	        
		</table>
		

		
	</center>
		
	</form>


</body>
</html>