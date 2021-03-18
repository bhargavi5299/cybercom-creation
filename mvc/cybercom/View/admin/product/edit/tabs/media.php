<form action="<?php echo $this->getUrl()->getUrl('save','admin_ProductMedia');?>" enctype="multipart/form-data"  method="post">
    <div class="float-right mb-2 mr-2">
        <button type="button" onclick="submitForm(this)" class="btn btn-success text-left mt-3 mb-2">Update</button>
        <button type="button" onclick="deleteMedia(this)" class="btn btn-primary text-left mt-3 mb-2">Remove</button>

    </div><br>
    <div class="h2 text-center mb-2" >
        <p>Media Details</p>
    </div>
    <?php $image = $this->getImage();
        if (!empty($image)) :?>
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th scope="row" style="white-space: nowrap;">Image</th>
                <th>Label</th>
                <th>Small</th>
                <th>Thumb</th>
                <th>Base</th>
                <th>Gallery</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody> 
        <?php foreach ($image->data as $key => $value): ?>              
            <tr class="text-center">
                <th scope="row" style="white-space: nowrap;"><img src="Images\Product\<?php echo $value->image; ?>" style="height:100px; width:100px" alt=""></th>
                <th><input type="text" name="img[data][<?php echo $value->imageId?>][label]" value="<?php echo $value->label?>" ></th>
                <th><input type="radio" name="img[small]" value="<?php echo $value->imageId?>" <?php if ($value->small == 1) : ?> <?php echo "checked" ?> <?php endif; ?>></th>
                <th><input type="radio" name="img[thumb]" value="<?php echo $value->imageId?>" <?php if ($value->thumb == 1) : ?> <?php echo "checked" ?> <?php endif; ?>></th>
                <th><input type="radio" name="img[base]" value="<?php echo $value->imageId?>" <?php if ($value->base == 1) : ?> <?php echo "checked" ?> <?php endif; ?>></th>
                <th><input type="checkbox" name="img[data][<?php echo $value->imageId?>][gallary]" <?php if ($value->gallary == 1) : ?> <?php echo "checked" ?> <?php endif; ?>></th>
                <th><input type="checkbox" name="remove[<?php echo $value->imageId?>]" ></th>
            </tr>
            <?php endforeach;?>    
            <?php else: ?>
                <?php echo '<p class=text-center><strong>No Image Found</strong><p>';?>
            <?php endif;?>
        </tbody>
    </table>
    <div class="text-center">
        <div class="input-group mb-3">
                <input type="file" name="img">
            <div class="input-group-prepend">
                <button type="submit" name="upload" class="input-group-text">Upload</button>
            </div>
        </div>
    </div>
</form>

<script>
    function submitForm(button){
        var form = $(button).closest('form');
        form.attr('action', "<?php echo $this->getUrl()->getUrl('update','ProductMedia'); ?>");
        form.submit();
        // e.preventDefault();
    }
    
    function deleteMedia(button) {
        var form = $(button).closest('form');
        form.attr('action',"<?php echo $this->getUrl()->getUrl('delete','ProductMedia'); ?>");
        form.submit();
    }
</script>
