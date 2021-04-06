<!doctype html>
<html lang="en">
  <head>
    <title>Product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
    <div class="shadow-lg p-0 mb-2 bg-white rounded">
        <div class="float-right mb-2 mr-2">
            <a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').resetParams().load();" name="create" class="btn btn-success text-left mt-3 mb-2">Add Attribute</a>
        </div><br>
        <div class="h2 text-center mb-2" >
            <p>Attribute Details</p>
        </div>

        <?php $attributes = $this->getAttributes();
if (!empty($attributes)): ?>
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="row" style="white-space: nowrap;">Attribute Id</th>
                    <th>Entity Type Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Input Type</th>
                    <th>Backend Type</th>
                    <th>Sort Order</th>
                    <th>backend Model</th>

                    <th class="text-center" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attributes->data as $key => $attribute): ?>
                    <tr id="txtData" class="text-center">
                        <td><?php echo $attribute->attributeId; ?></td>
                        <td><?php echo $attribute->entityTypeId; ?></td>
                        <td><?php echo $attribute->name; ?></td>
                        <td><?php echo $attribute->code; ?></td>
                        <td><?php echo $attribute->inputType; ?></td>
                        <td><?php echo $attribute->backendType; ?></td>
                        <td><?php echo $attribute->sortOrder; ?></td>
                        <td><?php echo $attribute->backendModel; ?></td>

                        <td class="text-center"><a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', null, ['id' => $attribute->attributeId]); ?>').resetParams().load()"  class="btn btn-warning" >Update</a></td>
                        <td class="text-center"><a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $attribute->attributeId]); ?>').resetParams().load()"  class="btn btn-danger" >Delete</a></td>
                    </tr>
                <?php endforeach;?>
                <?php else: ?>
                    <?php echo '<p class=text-center><strong>No Record Found</strong><p>'; ?>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</body>
</html>