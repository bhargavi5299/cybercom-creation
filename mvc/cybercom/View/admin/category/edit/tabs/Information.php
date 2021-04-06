<form id="categoryForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
    <?php if ($this->getRequest()->getGet('id')): ?>
        <p class="h2 text-center">Update Category Details</p><br>
    <?php else: ?>
        <p class="h2 text-center">Add Category Details</p><br>
    <?php endif;?>
    <?php
$category = $this->getTableRow();
$categoryOptions = $this->getCategoryOptions();
?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">select Category</label>
            <select class="form-control" name="category[parentId]">
                <?php foreach ($categoryOptions as $categoryId => $name): ?>
                    <option value="<?php echo $categoryId; ?>" <?php if ($categoryId == $category->parentId): ?> selected <?php endif;?>> <?php echo $name; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="sku">Category Name</label>
            <input type="text" name="category[name]" class="form-control" placeholder="Category Name" value="<?php echo $category->name; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Description</label>
            <textarea name="category[description]" cols="10" rows="5" class="form-control" placeholder="Category Description"><?php echo $category->description; ?></textarea>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
        <label for="price">Status</label>
        <select class="form-control" name="category[status]" >
            <?php foreach ($category->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if ($category->status == $value): ?> selected <?php endif;?>> <?php echo $value; ?></option>
            <?php endforeach;?>
        </select>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mb-3">
        <?php if ($this->getRequest()->getGet('id')): ?>
                <button type="button" onclick="object.resetParams().setForm('#categoryForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#categoryForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>