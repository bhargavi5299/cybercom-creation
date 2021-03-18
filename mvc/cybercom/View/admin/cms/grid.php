
<!doctype html>
<html lang="en">
  <head>
    <title>CMS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
   
    <div class="shadow-lg p-0 mb-2 bg-white rounded">    
        <div class="float-right mb-2 mr-2">
            <a href="<?php echo $this->getUrl()->getUrl('form');?>"  type="submit" name="create" class="btn btn-success text-left mt-3 mb-2">Add Cms Page</a>
        </div><br>
        <div class="h2 text-center mb-2" >
            <p>CMS Details</p>
        </div>
        <?php
            $cmsData = $this->getCms();
            if(!empty($cmsData)): ?>
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th>Page Id</th>
                    <th>Title</th>
                    <th>Indentifier</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th colspan="2" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cmsData->data as $key => $value): ?>
                    <tr id="txtData" class="text-center">
                        <td scope="row"><?php echo $value->pageId;?></td>
                        <td><?php echo $value->title;?></td>
                        <td><?php echo $value->indentifier;?></td>
                        <td><?php echo $value->content;?></td>
                        <td><?php echo $value->status;?></td>
                        <td><?php echo $value->createdDate;?></td>


                        <td class="text-center"><a href="<?php echo $this->getUrl()->getUrl('form',null,["id"=>$value->pageId])?>" class="btn btn-warning text-center" >Update</a></td>
                        <td class="text-center"><a href="<?php echo $this->getUrl()->getUrl('delete',null,["id"=>$value->pageId])?>" class="btn btn-danger text-center" >Delete</a></td>
                    </tr>
                    <?php endforeach;?>    
                <?php else:?> 
                    <?php echo '<p class=text-center><strong>No Record Found</strong><p>';?>
                <?php endif;?>                        
            </tbody>
        </table> 
    </div>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>