<?php
$collections = $this->getCollection();
$collection = $collections->data;
$columns = $this->getColumns();
$actions = $this->getAction();
$button = $this->getButton();
$title = $this->getTitle();
// print_r($title);
// print_r($actions);
// print_r($button);

?>
<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
<div class="shadow-lg p-0 mb-2 bg-white rounded">
        <div class="float-right mb-2 mr-2">
        </div>
        <div class="h2 text-center mb-2" >
            <p>Questcom</p>
        </div>


<div class="container">

<div class="bg-white p 2 rounded ">
    <h3><?php echo $title;?></h3>
    

        <?php if ($button): ?>
            <?php foreach ($button as $key => $button): ?>
               
                <td class="text-center"><a  class="btn btn-dark"  href="javascript:void(0)" class="<?php echo $button['class'] ?>" onclick="<?php echo $this->getButtonUrl($button['method'])?>" ><?php echo $button['label']?></a><br><br></td>
               
              
            <?php endforeach;?>
        <?php endif;?>
        <table class="table table-hover table table-active center">
        
        <thead class="table-dark">
            <tr>
            <?php foreach($columns as $key => $column): ?>
                <td scope="row" > <?php echo $column['label']?></td>
                <?php endforeach ;?>
                <td colspan="3">Action</td>
            </tr>

    </thead>
    <tbody>
    <?php if(!$collection): ?>
    <tr>
    <td colspan="3"> No records Found</td>
    </tr>
    <?php else: foreach($collection as $row): ?>
    <tr id="data">


    <?php foreach($columns as $key => $column ):?>
        <td><?php echo $this->getFieldValue($row, $column['field']);?></td>
    <?php endforeach;?>
    <?php if ($actions): ?>
        <?php foreach ($actions as $key => $action): ?>
            <td class="text-center"><a  class="btn btn-danger"  href="javascript:void(0)" class="<?php echo $action['class'] ?>" onclick="<?php echo $this->getMethodUrl($row, $action['method'])?>" ><?php echo $action['label']?> </a></td>
        

    <?php endforeach;?>
    <?php endif;?>

</tr>
    

        <?php endforeach ;?>
        <?php endif ;?>

    
    </tbody>
    </table>
    <br><br>
</div>
</div>


   
   