<form id="addressForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
    <?php $billing = $this->getBilling();?>
    <?php $shipping = $this->getShipping();?>

    <p class="h2 text-center">Billing Address</p><br>
    <?php if ($billing->addressId): ?>
    <input type="hidden" name="billing[addressId]" value="<?php echo $billing->addressId ?>">
    <?php endif;?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="address">Address</label>
            <input type="hidden" name="billing[customerId]" value="<?php echo $this->getTableRow()->customerId ?>">
            <textarea name="billing[address]" cols="10" rows="3" class="form-control" placeholder="Enter Address"><?php echo $billing->address; ?></textarea>
        </div>
        <div class="col-lg-4">
            <label for="city">City</label>
            <input type="text" name="billing[city]" class="form-control" placeholder="City" value="<?php echo $billing->city; ?>">
        </div>
        <div class="col-lg-"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">State</label>
            <input type="text" name="billing[state]" class="form-control" placeholder="State" value="<?php echo $billing->state; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Zip Code</label>
            <input type="number" name="billing[zipcode]" class="form-control" placeholder="Zip Code" value="<?php echo $billing->zipcode; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Country</label>
            <input type="text" name="billing[country]" class="form-control" placeholder="Country" value="<?php echo $billing->country; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Address Type</label>
            <input type="text" name="billing[type]" class="form-control" placeholder="Address Type" value="Billing" readonly>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <p class="h2 text-center">Shipping Address</p><br>
    <?php if ($shipping->addressId): ?>
    <input type="hidden" name="shipping[addressId]" value="<?php echo $shipping->addressId ?>">
    <?php endif;?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="address">Address</label>
            <input type="hidden" name="shipping[customerId]" value="<?php echo $this->getTableRow()->customerId ?>">
            <textarea name="shipping[address]" cols="10" rows="3" class="form-control" placeholder="Enter Address"><?php echo $shipping->address; ?></textarea>
        </div>
        <div class="col-lg-4">
            <label for="city">City</label>
            <input type="text" name="shipping[city]" class="form-control" placeholder="City" value="<?php echo $shipping->city; ?>">
        </div>
        <div class="col-lg-"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">State</label>
            <input type="text" name="shipping[state]" class="form-control" placeholder="State" value="<?php echo $shipping->state; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Zip Code</label>
            <input type="number" name="shipping[zipcode]" class="form-control" placeholder="Zip Code" value="<?php echo $shipping->zipcode; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="price">Country</label>
            <input type="text" name="shipping[country]" class="form-control" placeholder="Country" value="<?php echo $shipping->country; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Address Type</label>
            <input type="text" name="shipping[type]" class="form-control" placeholder="Address Type" value="Shipping" readonly>
        </div>
        <div class="col-lg-2"></div>
    </div>
    <div class="form-row mt-3">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mb-3">
            <?php if ($this->getRequest()->getGet('addressId')): ?>
                <button type="button" onclick="object.resetParams().setForm('#addressForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setForm('#addressForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
</form>