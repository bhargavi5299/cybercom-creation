

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

      <li><a href="dashboard.php" style="color: #fff;"><span class="glyphicon glyphicon-log-in"></span> Contact</a></li>
       <li><a href="logout.php" style="color: #fff;"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container register-form">
       <div class="form">
                
              <a style="color: black; font-weight: bold; font-size: 20px; ">Read Contact</a>
              <div style="width: 100px;height: 30px;text-align: center; padding-top: 5px; color: #fff;background-color: green;" ><a href="regi.php" style="color: #fff;">Create Contact</a></div>
              

              <hr>
            
 <form action="viewfile.php" method="GET">
  <table class="table table-striped">
   
    <tbody>
      <tr>
      <td>
        Id
      </td>
      <td>
        First name
      </td>
      
      <td>
        Email
      </td>
      <td>
        Password
      </td>
      
      <td>
        Mobile
      </td>
      <td>
        Date
      </td>
      
      <!--<td>
        Isactive
      </td>-->
      <!--<td>
        status
      </td>-->
      <td>
        Edit
      </td>
      <td>
        Delete
      </td>
      
      
      
      

    </tr>

    </tbody>
    <?php
      require 'dbconnect.php';
          $qry="SELECT * FROM user";
          $rs=mysqli_query($conn,$qry);
          $result_per_page=10;


        ?>
      <?php
         if (mysqli_num_rows($rs)>0)
        {
          while ($row=mysqli_fetch_assoc($rs)) 

          {
            //echo $number_result=ceil(mysqli_num_rows($rs)/$result_per_page);
            if($row['isactive']==1 OR $row['isactive']==0)
            {
      ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password'];?></td>
            
            <td><?php echo $row['mobile_no']; ?></td>
            <td><?php echo $row ['date_created']; ?></td>
            <!--<td><?php //echo $row['isactive']; ?></td>-->
            <!--<td><a href="change.php?id=<?php// echo $row['id'];?>">Change</a></td>-->
            <td><a href="editp.php?id=<?php echo $row['id'];?>"> <span class="glyphicon glyphicon-pencil"></span></a></td>
           <td><button class="delete-btn" data-id='<?php echo $row["id"]?>'>Delete</a></button>
           
          </td>
            <!--<td> <a href="delete.php?data-id=<?php echo $row['id'];?>"> <span class="glyphicon glyphicon-trash"></span></a></td>-->

            </tr>

      <?php     
          }
        }
      }
      ?>
  </table>
</form>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
  
  $(document).ready(function()
  {

    $(document).on("click",".delete-btn",function(){

      var eId=$(this).data("id");
      //alert(eId);
      var element=this;

      $.ajax({
        url:"delete.php",
        type: "GET",
        data :{id:eId },
        success :function(data)
        {
          if (data == 1)
          {

              $(element).fadeOut().remove();
             
          }else
          {
            alert("error");
          }
        }
      });

      





    });


  });




</script>
</body>

</html>
