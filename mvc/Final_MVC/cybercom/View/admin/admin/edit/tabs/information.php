<form id="adminForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
    <?php if ($this->getTableRow()->adminId): ?>
        <p class="h2 text-center">Update Admin Details</p><br>
    <?php else: ?>
        <p class="h2 text-center">Add Admin Details</p><br>
    <?php endif;?>
    <?php $row = $this->getTableRow();?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">User Name</label>
            <input type="text" name="admin[username]" class="form-control" placeholder="Enter User Name" value="<?php echo $row->username; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Password</label>
            <input type="password" name="admin[password]" class="form-control" placeholder="Enter Password" value="<?php echo $row->password; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
        <label for="price">Status</label>
        <select class="form-control" name="admin[status]">
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
            <?php if ($this->getRequest()->getGet('id')): ?>
                <button type="button" onclick="object.resetParams().setForm('#adminForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#adminForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>