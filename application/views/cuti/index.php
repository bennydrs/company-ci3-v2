<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg">
            <?= form_error('position', '<div class="alert alert-danger" role="alert">', '</div>');  ?>
            <a href="<?= base_url('employee/addLeave'); ?>" class="btn btn-primary mb-3">Tambah Cuti</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Cuti</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah Hari</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Akhir</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($leave as $l) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $l['employee_id'] ?></td>
                                        <td><?= $l['name'] ?></td>
                                        <td><?= $l['date'] ?></td>
                                        <td><?= $l['total_days'] ?></td>
                                        <td><?= $l['date_start'] ?></td>
                                        <td><?= $l['date_finish'] ?></td>
                                        <td><?= $l['reason'] ?></td>

                                        <td>
                                            <a href="" data-toggle="modal" data-target="#editPositionModal<?= $l['id'];  ?>" class="badge badge-success">Edit</a>
                                            <a href="<?= base_url('employee/delete_position/') . $l['id']; ?>" class="badge badge-danger delete">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal edit -->
<!-- <?php foreach ($leave as $p) : ?>
                    <div class="modal fade" id="editPositionModal<?= $p['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="editPositionModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editPositionModalLabel">Edit Position</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('employee/edit_position'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id" value="<?= $p['id']; ?>">
                                            <input type="text" class="form-control" id="position" name="position" placeholder="Position name" value="<?= $p['name_position']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
<?php endforeach; ?> -->