<!--<?php


//$file_name=$_FILES['image']['name'];
//echo $file_tmp=$_FILES['image']['tmp_name'];
//if (isset($file_name)) 
{
	//if (!empty($file_name)) 
	{
	
		//$location='uploads/';
		//if(move_uploaded_file($file_tmp, $location.$file_name))
		{
			//echo "uploads";
		}
	}
	//else
	{
		//echo "please choose file";
	}
}



?>-->

<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<form action="fileupload.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="image"><br><br>
		<input type="submit" name="submit">
		
	</form>

</body>
</html>