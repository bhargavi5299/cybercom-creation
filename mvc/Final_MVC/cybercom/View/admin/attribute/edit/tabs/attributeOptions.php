<form id="optionsForm" action="<?php echo $this->getUrl()->getUrl('update', 'attribute_Options'); ?>" method="post">
    <div class="float-right mb-2 mr-2">
        <button type="button" onclick="object.resetParams().setForm('#optionsForm').load()" class="btn btn-success text-left mt-3 mb-2">Update</button>
    </div><br>
    <div class="h2 text-center mb-2" >
        <p>Attribute Options</p>
    </div>
    <?php $attribute = $this->getAttribute();?>
    <?php if (!empty($attribute)): ?>
    <table id="existingOption" class="table table-hover">
        <?php foreach ($attribute->getData() as $key => $option): ?>
            <tr>
                <div class="form-row">
                    <div class="col-lg-4">
                        <td><input type="text" name="exist[<?php echo $option->optionId; ?>][name]" class="form-control" value="<?php echo $option->name; ?>"></td>
                    </div>
                    <div class="col-lg-4 ">
                        <td><input type="text" name="exist[<?php echo $option->optionId; ?>][sortOrder]" class="form-control" value="<?php echo $option->sortOrder; ?>"></td>
                    </div>
                    <div class="col-lg-4">
                        <td><button type="submit" class="btn btn-danger text-left" onclick="removeOption(this)">Remove Option</button></td>
                    </div>
                </div>
            </tr>
        <?php endforeach;?>
    </table>
    <?php else: ?>
        <table id="existingOption" class="table table-hover">
        <tr>
            <div class="form-row">
                <div class="col-lg-4">
                    <td><input type="text" name="new[]" class="form-control" require></td>
                </div>
                <div class="col-lg-4 ">
                    <td><input type="text" name="new[]" class="form-control" require></td>
                </div>
                <div class="col-lg-4">
                    <td><button type="submit" class="btn btn-danger text-left" onclick="removeOption(this)">Remove Option</button></td>
                </div>
            </div>
        </tr>
    </table>
    <?php endif;?>
</form>
<div style="display:none;">
    <table id="newOption" class="table table-hover">
        <tr>
            <div class="form-row">
                <div class="col-lg-4">
                    <td><input type="text" name="new[]" class="form-control" require></td>
                </div>
                <div class="col-lg-4 ">
                    <td><input type="text" name="new[]" class="form-control" require></td>
                </div>
                <div class="col-lg-4">
                    <td><button type="submit" class="btn btn-danger text-left" onclick="removeOption(this)">Remove Option</button></td>
                </div>
            </div>
        </tr>
    </table>
</div>
<div class="float-right mb-2 mr-2">
    <button type="button" class="btn btn-success text-left mt-3 mb-2" onclick="addRow()">Add Options</button>
</div>
<script>
    function removeOption(button){
        var objectTr = $(button).closest('tr');
        objectTr.remove();
    }

    function addRow(){
        var newOptionTable = document.getElementById('newOption');
        var existingOptionTable = document.getElementById('existingOption').children[0];
        existingOptionTable.appendChild(newOptionTable.children[0].children[0].cloneNode(true));
    }
</script>
