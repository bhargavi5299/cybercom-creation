
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color: #2B65EC;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff;">WebSiteName</a>
    </div>
    <!--<ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>-->
    <ul class="nav navbar-nav navbar-right" >
      <li><a href="dashboard.php" style="color: #fff;"><span class="glyphicon glyphicon-home" style="color:white; "></span> Home</a></li>

      <li><a href="viewfile.php" style="color: #fff;"><span class="glyphicon glyphicon-log-in"></span> Contact</a></li>
       <li><a href="logout.php" style="color: #fff;"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h3>Home Page</h3>
  
</div>
  <?php

require 'dbconnect.php';

session_start();
//var_dump($_SESSION);
if (!isset($_SESSION['email'])) 
{
  header("location:login.php");
}
?>
<div class="container">
  <?php
?>
<hr>
<?php

echo "<h3> Welcome ". $em=$_SESSION['email']."</h3>";
?>
</div>





</body>
</html>



