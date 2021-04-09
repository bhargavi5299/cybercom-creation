<!doctype html>
<html lang="en">
<head>
        <title>Questcom</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/Js/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/Js/mage.js') ?>"></script>
        <script src="skin/ckeditor.js"></script>
	    <script src="skin/sample.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class = "row text-center">
                <div class="w-100">
                    <?php echo $this->getChild('Header')->toHtml(); ?>
                </div>
            </div>

            <div class = "row mt-4 d-flex align-items-center justify-content-center">
                <div class="container-fluid">
                    <?php echo $this->createChild('block\core\layout\message')->toHtml(); ?>
                </div>
                <div class="col-lg-12" >
                        <?php echo $this->getChild('Content')->toHtml(); ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="w-100">
                    <?php echo $this->getChild('Footer')->toHtml(); ?>
                </div>
            </div>
    </body>
</html>