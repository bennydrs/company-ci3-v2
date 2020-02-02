<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah informasi</h6>
                </div>
                <div class="card-body">

                    <form action="<?= base_url('info/edit/' . $info['id']); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $info['title'] ?>">
                                <?php echo form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="content-info">Isi konten</label>
                                <textarea name="content" id="content-info" class="form-control"><?= $info['content'] ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url('info');  ?>" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->load->view('templates/load/load_ckeditor'); ?>