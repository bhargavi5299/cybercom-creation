<div class="container d-flex">
    <div class="mr-5">
        <?php if ($this->getRequest()->getGet('id')): ?>
            <?php echo $this->getTabHtml(); ?>
        <?php endif;?>
    </div>
    <div class="p-2 w-75">
        <?php echo $this->getTabContent(); ?>
    </div>
</div>