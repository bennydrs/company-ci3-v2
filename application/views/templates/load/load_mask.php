<script src="<?= base_url('assets/'); ?>jquerymask/jquery.mask.min.js"></script>

<script>
    // Format mata uang.
    $(document).ready(function() {
        $('.money').mask('000.000.000', {
            reverse: true
        });

    })
</script>