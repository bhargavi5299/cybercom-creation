<div class="list-group p-0 mt-5 h-100 w-100">
    <?php foreach ($this->getTabs() as $key => $tab): ?>
        <a class="list-group-item list-group-item-action" href="javascript:void(0)" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl(null, null, ['tab' => $key], false); ?>').load()"><?=$tab['label']?></a>
    <?php endforeach;?>
</div>