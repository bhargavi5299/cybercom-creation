<?php error_reporting(E_ALL ^ E_NOTICE);

require './connection/connection.php';
if(isset($_POST['fname']) && isset($_POST['lname']) &&isset($_POST['email']) && isset($_POST['pswd']) && isset($_POST['cpswd']))
    {
        $email = $_POST['email'];
        $password = $_POST['pswd'];
        $password_hash = MD5($password);
        $password_again = $_POST['cpswd'];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];

        if(!empty($email) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($lastname))
        {
            if($password != $password_again){
                echo 'Password don\'t match...';
            }
            else
            {

                $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
                $query_run = @mysqli_query($conn,$query);

                if(@mysqli_num_rows($query_run) == 1){
                    echo 'The email id  '.$email.' already exists <br><br>';
                    echo 'Login please..';
                    header('refresh:5; url=register.php');
                }
                else
                {
                    $query = "INSERT  into `users` VALUES ('".mysqli_real_escape_string($conn,$firstname)."','".mysqli_real_escape_string($conn,$lastname)."','".mysqli_real_escape_string($conn,$email)."','".mysqli_real_escape_string($conn,$password_hash)."')";
                    if($query_run = mysqli_query($conn, $query))
                    {
                        echo 'registerd successfully.....';
                        header('refresh:4; url=login.php');
                        //header('Location: register_success.php');
                    }else{
                        echo 'We couldn\'t register at this time. Try again later.';
                    }
                }
            }
        }
        else{
            echo 'All field required...';
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
    <form action="register.php" method="POST" class="needs-validation" novalidate>
        <h1 class="text-center my-3">Registration Form</h1>
        <hr class="my-2"><br>
        <div class="form-row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <label for="uname">Firstname:</label>
                <input type="text" class="form-control" id="fname" placeholder="Enter firstname" name="fname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-lg-4"></div>
            
        </div>
        <div class="form-row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <label for="lname">Lastname:</label>
                <input type="text" class="form-control" id="lname" placeholder="Enter lastname" name="lname" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="form-row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="name@example.com" name="email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="form-row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <label for="phone">Mobile Number:</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter mobilenumber" name="phone" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="form-row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-lg-4"></div>
        </div><div class="form-row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <label for="cpwd">Conform Password:</label>
                <input type="password" class="form-control" id="cpwd" placeholder="Enter password" name="cpswd" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="form-row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <label for="info">Information:</label>
                <input type="text" class="form-control" id="info"  name="info" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-lg-4"></div>
        </div><br>
        <div class="form-row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <!-- <label class="form-check-label "> -->
                <input class="form-check-input" type="checkbox" name="remember" required> Hereby, I Accept T&C.
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
                </label>
            </div>
            <div class="col-lg-4"></div>    
        </div>
        <div class="form-row ">
            <div class="col-lg-4"></div>    
            <div class="col-lg-4">
                <button type="submit" name="register" class="btn btn-block btn-primary">Register Now</button>
            </div>    
            <div class="col-lg-4"></div>
        </div>    
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    // Disable form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>
  </body>
</html>