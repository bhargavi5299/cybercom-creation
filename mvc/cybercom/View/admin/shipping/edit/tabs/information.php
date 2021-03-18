<?php if($this->getRequest()->getGet('method_id')) :?>
        <?php $row = $this->getShipping(); ?>
            <p class="h2 text-center">Update Shipping Details</p><br>
        <?php else: ?>
            <p class="h2 text-center">Add Shipping Details</p><br>
        <?php endif;?>
        <?php  $row = $this->getShipping();?>

        <div class="form-row">
            <div class="col-lg-2"></div>
            
            <div class="col-lg-4">
                <label for="name">Name</label>
                <input type="text" name="shipping[name]" class="form-control" placeholder=" Name" value="<?php echo $row->name;?>">
            </div>
            <div class="col-lg-4">
                <label for="name">Description</label>
                <input type="text" name="shipping[description]" class="form-control" placeholder="Description" value="<?php echo $row->description;?>" >
            </div>
            <div class="col-lg-2"></div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <label for="price">code</label>
                <input type="tel" name="shipping[code]" class="form-control" placeholder="code" value="<?php echo $row->code;?>">
            </div>
            <div class="col-lg-4">
                <label for="name">Amount</label>
                <input type="text" name="shipping[amount]" class="form-control" placeholder="amount" value="<?php echo $row->amount;?>" >
            </div>
            
           
          
 </div><br>
           <div class="form-row">
            <div class="col-lg-2"></div>
            
           
            
        </div>
        <br>
       
        <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
            <select class="form-control" name="product[status]" id="status">
                <?php foreach ($row->getStatusOption() as $key=>$value): ?>
				<option value="<?php echo $key;?>" <?php if($row->status == $value) :?> selected <?php endif;?>> <?php echo $value;?></option>
                <?php endforeach;?>
			</select>
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <?php if($this->getRequest()->getGet('method_id')) :?>
                    <button type="submit" class="btn btn-lg btn-success">Update</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-lg btn-success">Add</button>
                <?php endif; ?>
                <input type="reset" value="Reset" class="btn btn-lg btn-dark">
            </div>
        </div>