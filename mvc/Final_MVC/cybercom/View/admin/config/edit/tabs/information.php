<form id="attributeForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" enctype="multipart/form-data"  method="post">
    <?php if ($this->getTableRow()->configId): ?>
        <p class="h2 text-center">Update config Details</p>
    <?php else: ?>
        <p class="h2 text-center">Add config Details</p>
    <?php endif;?>
    <?php $config = $this->getTableRow();?>
    <div class="form-row">
    <div class="col-lg-4">
            <label for="sku">Group Id</label>
            <select class="form-control" name="config[groupId]" id="status">
                <?php foreach ($config->getOptions() as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if ($config->groupId == $value): ?> selected <?php endif;?>> <?php echo $value; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="price">title</label>
            <input type="text" name="config[title]" class="form-control" placeholder="title" value="<?php echo $config->title; ?>">
        </div>
        
        <div class="col-lg-2"></div>
    </div>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Code</label>
            <input type="number" name="config[code]" class="form-control" placeholder="Code" value="<?php echo $config->code; ?>">
        </div>
        <div class="col-lg-4">
            <label for="price">value</label>
            <input type="number" name="config[value]" class="form-control" placeholder="value" value="<?php echo $config->value; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mb-3">
            <?php if ($this->getTableRow()->configId) : ?>
                <button type="button" onclick="object.resetParams().setForm('#attributeForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#attributeForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>
