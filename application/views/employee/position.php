<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('position', '<div class="alert alert-danger" role="alert">', '</div>');  ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPositionModal">Tambah Jabatan</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Jabatan</th>
                                    <th scope="col">Gaji</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($position as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $p['name_position'] ?></td>
                                        <td><?= rupiah($p['salary']) ?></td>

                                        <td>
                                            <a href="" data-toggle="modal" data-target="#editPositionModal<?= $p['id'];  ?>" class="badge badge-success">Edit</a>
                                            <a href="<?= base_url('employee/delete_position/') . $p['id']; ?>" class="badge badge-danger delete">Delete</a>
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

<!-- Modal Add -->
<div class="modal fade" id="newPositionModal" tabindex="-1" role="dialog" aria-labelledby="newPositionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPositionModalLabel">Tambah Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('employee/position'); ?>" method="post" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="position" name="position" placeholder="Nama jabatan" required>
                        <div class="invalid-feedback">
                            The position name field is required!
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control money" id="salary" name="salary" placeholder="Gaji" value="" required>
                            <div class="invalid-feedback">
                                The salary name field is required!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- modal edit -->
<?php foreach ($position as $p) : ?>
    <div class="modal fade" id="editPositionModal<?= $p['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="editPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPositionModalLabel">Edit Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('employee/edit_position'); ?>" method="post" novalidate>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $p['id']; ?>">
                        <input type="hidden" name="name_position_old" id="name_position_old" value="<?= $p['name_position']; ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name_position" name="name_position" value="<?= $p['name_position']; ?>">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" class="form-control money" id="salary" name="salary" value="<?= $p['salary']; ?>">
                            </div>
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
<?php endforeach; ?>