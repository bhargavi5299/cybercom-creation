
<!DOCTYPE html>
<html>
<head>
	<title>
	Task3
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="task3.css">-->
	<script type="text/javascript" src="script3.js"></script>
</head>
<body onload="disablebutton()">
	<div class="bg">
		<div class="or">Sign Up</div><br>
		<form action="task3pro.php" name="UserForm" method="POST" onsubmit="return validation()">
			<label>First Name</label>
		    <input type="text" name="fname" id="fname" placeholder="Enter First Name" required="">
		    <div class="span_width" >
		    	<span id="span_fname"></span>
		    </div><br><br>

			<label>Last Name</label>
			<input type="text" name="lname" id="lname" placeholder="Enter Last Name" required=""><span id="span_lname"></span><br><br>
            
            <label>Date Of Birth</label>
			<select name="Month" id="Month" required="">
				<option name="select" value="none" >Month</option>
				<option value="Jan">Jan</option>
				<option value="Feb">Feb</option>
			    <option value="March">March</option>
				<option value="April">April</option>
            </select>
           
                        
            <select name="Day" id="Day" required="">
               <option name="select" value="none" >Day</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			
            
            <select name="Year" id="Year" required="">
               <option name="select" value="none" >Year</option>
				<option value="2021">2021</option>
				<option value="2020">2020</option>
				<option value="2019">2019</option>
				<option value="2018">2018</option>
			</select>
			<span id="span_bod" class="red"> </span><br><br>

            <label>Gender </label>
            <input type="radio" name="gen" id="gen" value="male" required="">Male
            <input type="radio" name="gen" id="gen" value="female" required="">Female	
            <span id="span_gender"></span><br><br>
            
            <label>Country</label>
			<select name="country" id="country" required="">
			<option name="select" value="none" >select country</option>
				<option value="India">India</option>
				<option value="Canada">Canada</option>
				<option value="Switzerland">Switzerland</option>
			</select><span id="span_country"></span><br><br>

			<label>E-mail</label>
			<input type="email" name="email" placeholder="Enter E-mail " required="">
			<span id="span_email"></span><br><br>


			<label>Phone</label>
			<input type="tel" name="phone" required=""><span id="span_phone"></span><br><br>


			<label>Password</label>
			<input type="text" name="pass" required=""><span id="span_pass"></span>
			<br><br>

			<div><label>Confirm Password</label>
                <input type="text" name="cpass" required="">
                <span id="span_cpass"></span>
            </div>

			<br>
			<div class="lable_width">
               <input type="checkbox" name="agree" id="terms" onchange="activateButton(this)"  required="">I accept this agreement
					<span id="span_agee" class="red"></span>
            </div>	
			<div class="or-btn" style="height: 40px;">
				<input type="submit" name="submit" id="submit" value="submit">
				<input type="reset" name=" reset" value="reset">
			</div>	
		</form>
	</div>
</body>
</html>