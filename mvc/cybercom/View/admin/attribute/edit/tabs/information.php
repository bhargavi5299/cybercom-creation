<form id="attributeForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" enctype="multipart/form-data"  method="post">
    <?php if ($this->getTableRow()->attributeId): ?>
        <p class="h2 text-center">Update Attribute Details</p>
    <?php else: ?>
        <p class="h2 text-center">Add Attribute Details</p>
    <?php endif;?>
    <?php $attribute = $this->getTableRow();?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">Entity Type Id</label>
            <select class="form-control" name="attribute[entityTypeId]" id="status">
                <?php foreach ($attribute->getEntityType() as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if ($attribute->entityTypeId == $value): ?> selected <?php endif;?>> <?php echo $value; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="name">Name</label>
            <input type="text" name="attribute[name]" class="form-control" placeholder="attribute Name" value="<?php echo $attribute->name; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Code</label>
            <input type="number" name="attribute[code]" class="form-control" placeholder="Code" value="<?php echo $attribute->code; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Input Type</label>
            <select class="form-control" name="attribute[inputType]" id="status">
                <?php foreach ($attribute->getInputType() as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if ($attribute->inputType == $value): ?> selected <?php endif;?>> <?php echo $value; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Backend Type</label>
            <select class="form-control" name="attribute[backendType]" id="status">
                <?php foreach ($attribute->getBackendType() as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if ($attribute->backendType == $value): ?> selected <?php endif;?>> <?php echo $value; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="name">Sort Order</label>
            <input type="number" name="attribute[sortOrder]" class="form-control" placeholder="Sort Order" value="<?php echo $attribute->sortOrder; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="name">Backend Model</label>
            <input type="text" name="attribute[backendModel]" class="form-control" placeholder="Backend Model" value="<?php echo $attribute->backendModel; ?>">
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mb-3">
            <?php if ($this->getTableRow()->attributeId) : ?>
                <button type="button" onclick="object.resetParams().setForm('#attributeForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#attributeForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>
