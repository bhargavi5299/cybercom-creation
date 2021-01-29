<?php
var_dump($_POST);
var_dump($_FILES);
$target_dir="uploads/";
 $target_file=$target_dir.basename($_FILES["image"]["name"]);

$uploadOk=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (isset($_POST["submit"])) 
{
   if($_FILES["image"]["name"]=="")
   {
      echo "no file selected";
      exit();
   };
   $check=getimagesize($_FILES["image"]["tmp_name"]);
   if($check!==false)
   {
      var_dump($check);
      echo "file is an image -".$check["mime"].".";
      $uploadOk=1;
   }
   else
   {
      echo "file is not image";
      $uploadOk=0;
   }
   if (file_exists($target_file)) {
      echo "sorry file already exists";
      $uploadOk=0;
   }
   if ($_FILES["image"]["size"]>5000000) {
      echo "sorry your file is to large";
      $uploadOk=0;
   }
   if($imageFileType!="jpg"  && $imageFileType!="png"  && $imageFileType!="jpeg"  && $imageFileType!="gif")
   {
      echo "sorry only jpg,jpeg,png,gif files are allow";
      $uploadOk=0;
   }
   if ($uploadOk==0) {
      echo "sorry your file was not uploaded";
   }
   else
   {
      if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file))
      {
         echo "this file ".basename($_FILES["image"]["name"])."has been uploaded.";
      }
      else
      {
         echo "sorry there was an error uploading y0ur file";
      }
   }
}
?>