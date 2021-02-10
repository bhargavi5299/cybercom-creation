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
	<form action="addcategory.php" method="POST">
    <hr class="my-2"><br>
    <div class="form-row">
        <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" placeholder="title" require>
            </div>

            <div class="col-lg-4">
                <label for="content">Content</label>
                <input type="text" class="form-control" placeholder="name@example.com" name="uemail" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please Enter Email in Correct Format" required>
            </div>

            <div class="col-lg-2"></div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <label for="name">Phone</label>
                <input type="text" class="form-control" name="uphone" placeholder="Phone Nu." maxlength="10" require>
                </div>
            <div class="col-lg-4">
                <label for="">Meta title</label>
                <input type="text" class="form-control" placeholder="Title" name="utitle" required>
            </div>
            <div class="col-lg-2">
                        
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <label for="name">Create time</label>
                <input type="datetime-local" class="form-control" name="udatetime" require>
            </div>
            <div class="col-lg-4">
            	
            </div>
            <div class="col-lg-2">
            	<div class="col-lg-4">
            		<select class="form-control">
            		<option></option>
            	</select>
            	</div>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <button type="submit" name="addcontact" class="btn btn-lg btn-success">Create</button>
            </div>
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