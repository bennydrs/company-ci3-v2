<script src="<?= base_url('assets/'); ?>js/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content-info'))
        .catch(error => {
            console.error(error);
        });
</script>