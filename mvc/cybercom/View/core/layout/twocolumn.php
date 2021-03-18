<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/Js/jquery-3.6.0.js')?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/Admin/Js/mage.js')?>"></script> 
    <script src="skin/ckeditor.js"></script>
    <script src="skin/sample.js"></script>
  </head>
  <body>
  <div class="container-fluid">
            <div class = "row">
            <div class="w-100">
                 <div class ="text-white text-center"> <?php echo  $this->getChild('header')->toHtml();?> </div>
            </div>
            </div>
        
            <div class = "row mt-4">
                <div class="col-sm-2 border" style="height:530px">
                    <h2 class="text-black"></h2>
                    <?php echo $this->getChild('leftTab')->toHtml();?>
                </div>

                <div class="col-sm-10 border" >
                    <?php  echo $this->createChild('Block\core\layout\message')->toHtml();?>
                    <?php  echo $this->getChild('content')->toHtml();?>
                  
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="w-100">
                    <?php echo  $this->getChild('footer')->toHtml();?>
                </div>
        </div>
  </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>