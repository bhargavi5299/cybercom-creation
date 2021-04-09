<div class="container-fluid">
    <div class="center mt-2">
        <?php if($success = $this->getMessage()->getSuccess()): $this->getMessage()->clearSuccess() ; ?>
            <div class="alert alert-success fadoutMassage" role="alert">
                <p class="mb-0 text-center">
                <?php echo $success; ?>
                </p>
            </div> 
        <?php endif;?>
        <?php if($faliure = $this->getMessage()->getFailure()) : $this->getMessage()->clearFailure(); ?>
            <div class="alert alert-danger fadoutMassage" role="alert">
                <p class="mb-0 text-center">
                    <?php echo $faliure; ?>
                </p>
            </div> 
        <?php endif; ?>
    </div>
</div>
<script>
    $('.fadoutMassage').fadeOut(3000);
</script>