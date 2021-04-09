<!doctype html>
<html lang="en">
    <head>
        <title>Questcom</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="skin/ckeditor.js"></script>
	    <script src="skin/sample.js"></script>
    </head>
    <body>
        <div class="container-fluid" style="height:100vh; width:100vh;">
            <div class = "row text-center">
                <div class="w-100">
                    <?php echo $this->getChild('Header')->toHtml(); ?>
                </div>
            </div>

            <div class = "row mt-4">
                <div class="col-sm-2" >
                   <?php echo $this->getChild('leftTab')->toHtml(); ?>
                </div>

                <div class="col-lg-10 " >
                    <div>
                        <?php echo $this->getChild('Content')->toHtml(); ?>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="w-100">
                    <?php echo $this->getChild('Footer')->toHtml(); ?>
                </div>
        </div>
    </body>
</html>