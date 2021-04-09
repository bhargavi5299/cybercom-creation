<form id="groupForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
    <?php if ($this->getTableRow()->groupId): ?>
        <p class="h2 text-center">Update Customer Group Details</p><br>
    <?php else: ?>
        <p class="h2 text-center">Add Customer Group Details</p><br>
    <?php endif;?>
    <?php $row = $this->getTableRow();?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">Group Name</label>
            <input type="tel" name="group[groupName]" class="form-control" placeholder="Customer Group Name" value="<?php echo $row->groupName; ?>">
        </div>
        <div class="col-lg-4">
            <label for="price">Status</label>
            <select class="form-control" name="group[status]" id="status">
                <?php foreach ($row->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key; ?>" name="<?php echo $key; ?>" <?php if ($row->status == $value): ?><?php echo "selected"; ?> <?php endif;?> ><?php echo $value; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="form-row mt-4">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mb-3">
            <?php if ($this->getTableRow()->groupId): ?>
                <button type="button" onclick="object.resetParams().setForm('#groupForm').load();" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#groupForm').load();" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>