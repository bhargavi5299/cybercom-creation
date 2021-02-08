<?php
require "dbconnect.php";
session_start();
//var_dump($_GET);
 $id=$_GET['id'];
//echo $id;
$qry="SELECT * FROM user WHERE id=$id";
$rs=mysqli_query($conn,$qry);
$row=mysqli_fetch_assoc($rs);



?>



<!DOCTYPE html>
<html>
<head>
  <title></title>
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
      <a class="navbar-brand" href="#" style="color:#fff;">WebSite Title</a>
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

<div class="container register-form">
            <div class="form">
                
              <a style="color: black; font-weight: bold; font-size: 20px; " href="regi.php">Create Contact</a>
              <hr>
              <form action="updatep.php?id=<?php $row['id'];?>" method="GET">
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                                <input type="text" class="form-control" placeholder="ID *" name="txt_id" value="<?php echo $row['id']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your First Name *" name="txt_fn" value="<?php echo $row['fname'];?>">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *"name="txt_email" value="<?php echo $row['email'];?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="txt_ti"placeholder="title *" value="<?php echo $row['title'];?>">
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Password *" name="txt_pw" value="<?php echo $row['password'];?>">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="phone *" name="txt_num" value="<?php echo $row['mobile_no'];?>">
                            </div>
                            <div class="form-group">
                                <input type="datetime-local" class="form-control" name="date" value="<?php echo $row['date_created'];?>">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btnSubmit" name="btn_sb" style="color: #fff;background-color: green; width: 100px; height: 40px;">
                  </form>
                </div>
            </div>
        </div>
</body>
</html>
