<?php $attributes = $this->getAttribute();?>
<?php $options = $this->getOptions();?>
<div class="float-right mb-2 mr-2">
    <!-- <button type="button" onclick="object.resetParams().setForm('#priceForm').load()" class="btn btn-success text-left mt-3 mb-2">Update</button> -->
</div><br>
<div class="h2 text-center mb-3">
    <p>Attributes Details</p>
</div>
<div class="container">
    <div class="form-row">
        <?php if (!$attributes): ?>
            <?php echo '<p class=text-center><strong>No Attributes Found</strong><p>'; ?>
        <?php else: ?>
        <?php foreach ($attributes->data as $key => $attribute): ?>
            <div class="form-group col-md-12">
                <label for="inputType"><?php echo $attribute->name; ?></label>
                <?php //TEXT AREA?>
                <?php if ($attribute->inputType == 'textarea'): ?>
                    <textarea class="form-control" rows="5"></textarea>
                <?php endif;?>

                <?php //TEXT ?>
                <?php if ($attribute->inputType == 'text'): ?>
                    <input type="<?php echo $attribute->inputType; ?>" name="" class="form-control" placeholder="<?php echo $attribute->inputType; ?>"  value="<?php echo $options->name; ?>">
                <?php endif;?>

                <?php //FOR SELECT ?>
                <?php if ($attribute->inputType == 'select'): ?>
                    <select class="form-control" <?php echo $multi; ?>>
                        <?php if (!$options): ?>
                            <option value=""><<< No Options Avaible >>></option>
                        <?php else: ?>
                            <option value=""><<< Select Option >>></option>
                        <?php foreach ($options->data as $key => $option): ?>
                                <option value="<?php echo $option->name ?>"><?php echo $option->name; ?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                    </select>
                <?php endif;?>

                <?php //FOR CHECKBOX ?>
                <?php if ($attribute->inputType == 'checkbox'): ?>
                    <?php if (!$options): ?>
                        <label><<< NO Options Avaible >>></label>
                    <?php else: ?>
                        <?php foreach ($options->data as $key => $option): ?>
                            <?php foreach ($option->data as $option): ?>
                                <div class="form-check">
                                    <input type="<?php echo $attribute->inputType; ?>" class="form-check-input" value="<?php echo $attribute->inputType; ?>">
                                </div>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    <?php endif?>
                <?php endif;?>
            </div>
        <?php endforeach;?>
        <?php endif;?>
    </div>
</div>
