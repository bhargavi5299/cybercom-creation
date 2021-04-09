<form id="cmsForm" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="post">
    <?php if ($this->getTableRow()->pageId): ?>
        <p class="h2 text-center">Update CMS Details</p><br>
    <?php else: ?>
        <p class="h2 text-center">Add CMS Details</p><br>
    <?php endif;?>
    <?php $row = $this->getTableRow();?>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <label for="sku">Title</label>
            <input type="text" name="Cms[title]" class="form-control" placeholder="Enter CMS Page Name" value="<?php echo $row->title; ?>">
        </div>
        <div class="col-lg-4">
            <label for="name">Indentifier</label>
            <input type="text" name="Cms[indentifier]" class="form-control" placeholder="Indentifier" value="<?php echo $row->indentifier; ?>">
        </div>
        <div class="col-lg-2"></div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 mb-1">
            <div class="adjoined-bottom">
                <div class="grid-container">
                    <div class="grid-width-100">
                        <div id="editor">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2"></div>
    </div>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <label for="price">Status</label>
            <select class="form-control" name="Cms[status]">
            <?php foreach ($row->getStatusOption() as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if ($row->status == $key): ?> selected <?php endif;?>> <?php echo $value; ?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-2"></div>
        <div class="col-lg-4 mt-3">
            <?php if ($this->getTableRow()->pageId): ?>
                <button type="button" onclick="object.resetParams().setParams(getContent()).setForm('#cmsForm').load()" class="btn btn-lg btn-success">Update</button>
            <?php else: ?>
                <button type="button" onclick="object.resetParams().setParams(getContent()).setForm('#cmsForm').load()" class="btn btn-lg btn-success">Add</button>
            <?php endif;?>
            <input type="reset" value="Reset" class="btn btn-lg btn-dark">
        </div>
    </div>
    <input type="hidden" name="Cms[content]" id="myContent">
    <input type="hidden" value="<?php echo htmlentities($row->content); ?>" id="setcontent">
</form>
<script>
    initSample();
    function getContent() {
        var data = CKEDITOR.instances.editor.getData();
        document.getElementById("myContent").value = data;
    }
    var setdata = document.getElementById("setcontent").value;
    CKEDITOR.instances['editor'].setData(setdata);
</script>