<form id='productForm' action="<?php echo $this->getUrl()->getUrl('save'); ?>" enctype="multipart/form-data"  method="post">
    <?php if ($this->getTableRow()->productId): ?>
        <p class="h2 text-center">Update Product Details</p>
    <?php else: ?>
        <p class="h2 text-center">Add Product Details</p>
    <?php endif;?>
    <?php $row = $this->getTableRow();?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">SKU</label>
            <input type="tel" name="product[sku]" class="form-control" placeholder="Stock Keeping Unit" value="<?php echo $row->sku; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Name</label>
            <input type="text" name="product[name]" class="form-control" placeholder="Product Name" value="<?php echo $row->name; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Price</label>
            <input type="tel" name="product[price]" class="form-control" placeholder="Price" value="<?php echo $row->price; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Discount</label>
            <input type="tel" name="product[discount]" class="form-control" placeholder="Discount" value="<?php echo $row->discount; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Quantity</label>
            <input type="tel" name="product[quantity]" class="form-control" placeholder="Quantity" value="<?php echo $row->quantity; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Description</label>
            <input type="text" name="product[description]" class="form-control" placeholder="Description" value="<?php echo $row->description; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
        <label for="price">Status</label>
        <select class="form-control" name="product[status]" id="status">
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
            <?php if ($this->getTableRow()->productId): ?>
                <button type="button" onclick="object.resetParams().setForm('#productForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#productForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>
