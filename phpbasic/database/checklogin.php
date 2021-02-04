<?php 

require 'dbconnect.php';
//var_dump($_POST);

$un=$_POST['txt_un'];
$ps=$_POST['txt_ps'];

echo $un;
echo $ps;

$qry="SELECT * FROM `user_tbl` WHERE `firstname`='$un' AND `password`='$ps'";
//echo "<br>".$qry;

if($sql_run=mysqli_query($conn,$qry)){

				$sql_num_rows=mysqli_num_rows($sql_run);
					if($sql_num_rows >= 1){


								while($sql_row=mysqli_fetch_assoc($sql_run)){
									$firstname=$sql_row['firstname'];
									$pass=$sql_row['password'];
								}
								//echo "pass : ".$pass;
								$_session['username']=$firstname;

								//header("location:index.php");
						



					}
				}
	/*$_SESSION["username"]=$user_name;
	$_SESSION["password"]=$user_pass;

	$_SESSION['firstname']=$row['firstname'];
	$_SESSION['password']=$row['password'];
	if (isset($_POST['rem'])) 
	{
		setcookie("username",$un,time() + (86400*30),"/");
		setcookie("password",$ps,time() +  (86400*30),"/");
	}
		header("location:dashboard.php");
		exit();*/
	

?>