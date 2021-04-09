
<!doctype html>
<html lang="en">
  <head>
    <title>Customer</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<body>
<div class="container-fluid">
    <div class="shadow-lg p-0 mb-2 bg-white rounded">
            <div class="float-right mb-2 mr-2">
                <a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form'); ?>').resetParams().load();" name="create" class="btn btn-success text-left mt-3 mb-2">Add Customer</a>
            </div> <br>
            <div class="h2 text-center mb-2" >
                <p>Customer Details</p>
            </div>
            <?php
$data = $this->getCustomer();
if (!empty($data)):
?>
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th style="white-space: nowrap;">Customer Id</th>
                        <th>Customer Group</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Mobile Nu.</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>

                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data->data as $key => $value): ?>
                        <tr id="txtData" class="text-center">
                            <td scope="row"><?php echo $value->customerId; ?></td>
                            <td><?php echo $this->getGroupName($value->groupId); ?></td>
                            <td><?php echo $value->firstname; ?></td>
                            <td><?php echo $value->lastname; ?></td>
                            <td><?php echo $value->mobilenu; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->status; ?></td>
                            <td><?php echo $value->createdDate; ?></td>
                            <td><?php echo $value->updatedDate; ?></td>


                            <td><a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form', null, ['id' => $value->customerId]); ?>').resetParams().load()" class="btn btn-warning text-center" >Update</a></td>
                            <td><a href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $value->customerId]); ?>').resetParams().load()" class="btn btn-danger text-center" >Delete</a></td>
                        </tr>
                        <?php endforeach;?>
                        <?php else: ?>
                            <?php echo '<p class=text-center><strong>No Record Found</strong><p>'; ?>
                        <?php endif;?>
                </tbody>
            </table>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>