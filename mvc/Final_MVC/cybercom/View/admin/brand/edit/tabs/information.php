<form id="paymentForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
    <?php if ($this->getTableRow()->brandId): ?>
        <p class="h2 text-center">Update Brand Details</p><br>
    <?php else: ?>
        <p class="h2 text-center">Add Brand Details</p><br>
    <?php endif;?>
    <?php $row = $this->getTableRow();?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">Name</label>
            <input type="text" name="brand[name]" class="form-control" placeholder="Enter Name" value="<?php echo $row->name; ?>">
        </div>
        <div class="col-lg-4">
        <div class="text-center">
            <div class="input-group mb-3">
                    <input type="file" id="file" name="file">
                <div class="input-group-prepend">
                    <button type="button" id="btn_upload" class="input-group-text">Upload</button>
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mt-3 mb-3">
        <?php if ($this->getTableRow()->brandId): ?>
                <button type="button" onclick="object.resetParams().setForm('#paymentForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#paymentForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>