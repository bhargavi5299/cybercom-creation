<form action="<?php echo $this->getUrl()->getUrl('save','admin_product_groupPrice')?>" method="post">
    <div class="float-right mb-2 mr-2">
        <input type="submit" class="btn btn-success text-left mt-3 mb-2" value="Update">
    </div><br>
    <div class="h2 text-center mb-3">
        <p>Customer Group Price Details</p>
    </div>
    <?php $customerGroupRow = $this->getCustomerGroup(); ?>
    <?php if(!empty($customerGroupRow)) :?>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="row" style="white-space: nowrap;">Group Id</th>
                <th>Group Name</th>
                <th>Product Price</th>
                <th>Group Price</th>
            </tr>
        </thead>
        <tbody> 
        <?php foreach ($customerGroupRow->getData() as $key => $value): ?>
            <?php $rowStatus = ($value->entityId) ? 'exist':'new'; ?>              
            <tr class="text-center">
                <td><?php echo $value->groupId;?></td>
                <td><?php echo $value->groupName ;?></td>
                <td><?php echo $value->price;?></td>
                <td><input type="text" name="groupPrice[<?php echo $rowStatus?>][<?php echo $value->groupId?>]" value="<?php echo $value->groupPrice?>"></td>
            </tr>
            <?php endforeach;?>    
            <?php else: ?>
                <?php echo '<p class=text-center><strong>No Record Found</strong><p>';?>
            <?php endif;?>
        </tbody>
    </table>
</form>