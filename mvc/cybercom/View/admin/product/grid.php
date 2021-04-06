
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
            <a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').resetParams().load();" name="create" class="btn btn-success text-left mt-3 mb-2">Add Product</a>
        </div><br>
        <div class="h2 text-center mb-2" >
           
        </div>

        <?php $data = $this->getProduct();
if (!empty($data)): ?>
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th scope="row" style="white-space: nowrap;">Product Id</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>

                    <th class="text-center" colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data->data as $key => $value): ?>
                    <tr id="txtData" class="text-center">
                        <td><?php echo $value->productId; ?></td>
                        <td><?php echo $value->sku; ?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->price; ?></td>
                        <td><?php echo $value->discount; ?></td>
                        <td><?php echo $value->quantity; ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->status; ?></td>
                        <td><?php echo $value->createdDate; ?></td>
                        <td><?php echo $value->updatedDate; ?></td>

                        <td class="text-center"><a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', null, ['id' => $value->productId]); ?>').resetParams().load()"  class="btn btn-warning" >Update</a></td>
                        <td class="text-center"><a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $value->productId]); ?>').resetParams().load()"  class="btn btn-danger" >Delete</a></td>
                        <td class="text-center"><a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $value->productId]); ?>').resetParams().load()"  class="btn btn-danger" >Delete</a></td>
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