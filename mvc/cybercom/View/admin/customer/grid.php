
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
    <div class="container-fluid">
    
    </div>
    <form action="" method="post">
    <div class="jumbotron pb-1 mb-3">
            <hr class="my-2">
            <p>Customer Details</p>
            <p class="lead">
            <a href="<?php echo $this->getUrl()->getUrl('form');?>" type="submit" name="create" class="btn btn-success">Create Customer</a>
               
        </div>
        
        <?php
            $data = $this->getCustomer();
            if(!empty($data))
            { 
        ?>
        <table class="table">
            <thead>
                <tr>
                <th>Customer Group</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Mobile Nu.</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>

                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                     foreach($data->data as $key =>$value)
                    {
                    ?>
                    <tr id="txtData">
                    <td scope="row"><?php echo $value->customerId;?></td>
                            <td><?php echo $this->getGroupName($value->groupId);?></td>
                            <td><?php echo $value->firstname;?></td>
                            <td><?php echo $value->lastname;?></td>
                            <td><?php echo $value->mobilenu;?></td>
                            <td><?php echo $value->email;?></td>
                            <td><?php echo $value->status;?></td>
                            <td><?php echo $value->createdDate;?></td>
                            <td><?php echo $value->updatedDate;?></td>


                        <td><a href="<?php echo $this->getUrl()->getUrl('form',null,["id"=>$value->customerId])?> name="update" class="btn btn-light" >Update</a></td>
                        <td><a href="<?php echo $this->getUrl()->getUrl('delete',null,["id" =>$value->customerId])?> name="delete" class="btn btn-dark" >Delete</a></td>
                       
                    </tr>
                    <?php
                    } 
                }?>                        
            </tbody>
        </table> 
        </form><br><br><br><br><br><br><br><br> 
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>