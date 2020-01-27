<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data Cuti</h6>
                </div>
                <div class="card-body">

                    <form action="<?= base_url('employee/addLeave'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id">NIP</label>
                                <input type="text" class="form-control" id="id" name="id" list="e-id">
                                <datalist id="e-id">
                                    <?php
                                    foreach ($employee as $e) {
                                        echo "<option value='$e[e_id_number]'>
                        $e[name]</option>";
                                    }
                                    ?>
                                </datalist>
                                <?php echo form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="day">Jumlah Hari</label>
                                <input type="number" class="form-control" id="day" name="day">
                            </div>
                            <div class="form-group">
                                <label for="date_start">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="date_start" name="date_start">
                            </div>
                            <div class="form-group">
                                <label for="date_finish">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="date_finish" name="date_finish">
                            </div>
                            <div class="form-group">
                                <label for="reason">Alasan</label>
                                <textarea name="reason" id="reason" class="form-control" cols="30"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="<?= base_url('employee/leave');  ?>" class="btn btn-secondary">Batal</a>
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