<?php error_reporting(E_ALL ^ E_NOTICE);
require './connection/connection.php';

session_start();

if (isset($_POST['email']) && isset($_POST['pswd'])){
    $username = $_POST['email'];
    $password = $_POST['pswd'];
    $password_hash = MD5($password);

    // echo $username.'<br>';
    // echo $password_hash.'<br>';

    if (!empty($username) && !empty($password)){
        $query = "SELECT `email`,`upassword` FROM `users` WHERE `email`='".mysqli_real_escape_string($conn,$username)."' AND `upassword`='".mysqli_real_escape_string($conn,$password_hash)."'";
        if($query_run = @mysqli_query($conn,$query)){
            $query_num_rows = mysqli_num_rows($query_run);
            //echo $query_num_rows;
            if($query_num_rows == 0){
                echo 'Invalid details..';
            }
            elseif($query_num_rows == 1){
                while($row=mysqli_fetch_assoc($query_run)){
                    $user_fname=$row['firstname'];
                    $_SESSION['user_fname']=$user_fname;
                    $_SESSION['email']=$username;
                    $_SESSION['password']=$password_hash;
                    
                    echo 'Login successfully.....';
                    header('refresh:2; url=blogpost.php');
                }
            }
        }
    }else{
        echo 'Please Enter username\password';
    }
}

?>


<!doctype html>
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
        <form action="" method="post" >
            <div class="containerfluid">
                <h1 class="text-center my-3">Login</h1>
                <hr class="my-2"><br><br>

                <div class="form-row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <label for="email">Email</label><br>
                        <input type="email" class="form-control" name="email" placeholder ="name@example.com" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Email in Correct Format" required>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <br><br>    
                <div class="form-row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <label for="password">Password</label><br>
                        <input type="password" class="form-control" name="pswd" placeholder ="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" Required>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <br><br>    
                <div class="form-row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-2">
                        <button type="submit" name="login" class="btn btn-block btn-success">Login</button>    
                    </div>
                    <div class="col-lg-2">
                        <a href="register.php" name="register" class="btn btn-block btn-info">Register Now</a>    
                    </div>
                    <div class="col-lg-4"></div><br><br>
                </div>

            </div>
        </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>