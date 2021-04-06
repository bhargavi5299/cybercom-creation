<form id="customerForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
    <?php if ($this->getTableRow()->addressId): ?>
        <p class="h2 text-center">Update Customer Details</p><br>
    <?php else: ?>
        <p class="h2 text-center">Add Customer Details</p><br>
    <?php endif;?>
    <?php
$customer = $this->getTableRow();
$groupName = $customer->getCustomerGroup();
?>

    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">Select Group</label>
            <select class="form-control" name="customer[groupId]">
            <?php foreach ($groupName->data as $key => $value): ?>
            <option value="<?php echo $value->groupId; ?>" <?php if ($value->groupId == $customer->groupId): ?><?php echo "selected"; ?><?php endif;?>> <?php echo $value->groupName; ?> </option>
            <?php endforeach;?>
        </select>
        </div>
        <div class="col-lg-4">
            <label for="sku">First Name</label>
            <input type="tel" name="customer[firstname]" class="form-control" placeholder="Customer Name" value="<?php echo $customer->firstname; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="name">Last Name</label>
            <input type="text" name="customer[lastname]" class="form-control" placeholder="Last Name" value="<?php echo $customer->lastname; ?>">
        </div>
        <div class="col-lg-4">
                <label for="price">Mobile Number</label>
                <input type="tel" name="customer[mobilenu]" class="form-control" placeholder="Mobile Number" value="<?php echo $customer->mobilenu; ?>">
            </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="name">Email</label>
            <input type="email" name="customer[email]" class="form-control" placeholder="abc@example.com" value="<?php echo $customer->email; ?>">
        </div>
        <div class="col-lg-4">
        <label for="price">Status</label>
        <select class="form-control" name="customer[status]">
            <?php foreach ($customer->getStatusOption() as $key => $value): ?>
            <option value="<?php echo $key; ?>" name="<?php echo $key; ?>" <?php if ($customer->status == $value): ?><?php echo "selected"; ?><?php endif;?> ><?php echo $value; ?></option>
            <?php endforeach;?>
        </select>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <?php if (!$this->getRequest()->getGet('id')): ?>
                <label for="price">Password</label>
                <input type="password" name="customer[password]" class="form-control" placeholder="Enter Password">
            <?php else: ?>
                <input type="hidden">
            <?php endif;?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mt-3 mb-3">
            <?php if ($this->getTableRow()->addressId): ?>
                <button type="button" onclick="object.resetParams().setForm('#customerForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#customerForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>