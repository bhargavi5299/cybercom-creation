<?php if($this->getRequest()->getGet('id')) :?>
            <p class="h2 text-center">Update Admin Details</p><br>
        <?php else: ?>
            <p class="h2 text-center">Add Admin Details</p><br>
        <?php endif;?>

        <?php  $row = $this->getAdmin();?>
        <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <label for="name">username</label>
                <input type="text" name="admin[username]" class="form-control" placeholder=" Enter  username" value="<?php echo $row->username;?>">
            </div>
            <div class="col-lg-4">
                <label for="name">password</label>
                <input type="text" name="admin[password]" class="form-control" placeholder=" Enter password" value="<?php echo $row->password;?>" ><br><br>
                <!--<textarea rows="7" cols="20" name="admin[password]" placeholder=" Enter password"><?php echo $row->password;?></textarea>-->
                <!-- <input type="text" name="desc" class="form-control" placeholder="Enter description"> -->
            </div>
                
            <div class="col-lg-2"></div>
        </div>
         <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
            <select class="form-control" name="admin[status]" id="status">
                <?php foreach ($row->getStatusOption() as $key=>$value): ?>
				<option value="<?php echo $key;?>" <?php if($row->status == $value) :?> selected <?php endif;?>> <?php echo $value;?></option>
                <?php endforeach;?>
			</select>
            </div>
        </div>
      <br><br>
       
        
      <div class="form-row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <?php if($this->getRequest()->getGet('id')) :?>
                    <button type="submit" class="btn btn-lg btn-success">Update</button>
                <?php else: ?>
                    <button type="submit" class="btn btn-lg btn-success">Add</button>
                <?php endif; ?>
                <input type="reset" value="Reset" class="btn btn-lg btn-dark">
            </div>
        </div> 