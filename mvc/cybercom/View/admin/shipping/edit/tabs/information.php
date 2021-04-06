<form id="shippingForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
    <?php if ($this->getTableRow()->methodId): ?>
        <p class="h2 text-center">Update Shipping Details</p><br>
    <?php else: ?>
        <p class="h2 text-center">Add Shipping Details</p><br>
    <?php endif;?>
    <?php $row = $this->getTableRow();?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">Name</label>
            <input type="text" name="shipping[name]" class="form-control" placeholder="Enter Name" value="<?php echo $row->name; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Code</label>
            <input type="text" name="shipping[code]" class="form-control" placeholder="Enter Shipping Code" value="<?php echo $row->code; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Amount</label>
            <input type="tel" name="shipping[amount]" class="form-control" placeholder="Amount" value="<?php echo $row->amount; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Description</label>
            <input type="text" name="shipping[description]" class="form-control" placeholder="Enter Description" value="<?php echo $row->description; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
        <label for="price">Status</label>
        <select class="form-control" name="shipping[status]">
        <?php foreach ($row->getStatusOption() as $key => $value): ?>
            <option value="<?php echo $key; ?>" <?php if ($row->status == $value): ?> selected <?php endif;?>> <?php echo $value; ?></option>
            <?php endforeach;?>
        </select>
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mb-3">
            <?php if ($this->getTableRow()->methodId): ?>
                <button type="button" onclick="object.resetParams().setForm('#shippingForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#shippingForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>
