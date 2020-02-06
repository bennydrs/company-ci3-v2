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
        <div class="col-lg">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Golongan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?= form_error('name_group', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newGroupModal">Tambah Golongan</a>

                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Golongan</th>
                                    <th scope="col">Tunjangan Nikah</th>
                                    <th scope="col">Uang Makan</th>
                                    <th scope="col">Uang Lembur</th>
                                    <th scope="col">Potongan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($group as $g) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $g['name_group'] ?></td>
                                        <td><?= rupiah($g['tj_married']) ?></td>
                                        <td><?= rupiah($g['meal']) ?></td>
                                        <td><?= rupiah($g['overtime']) ?></td>
                                        <td><?= rupiah($g['alpha_cuts']) ?></td>

                                        <td>
                                            <a href="" data-toggle="modal" data-target="#editGroupModal<?= $g['id'];  ?>" class="badge badge-success">Edit</a>
                                            <a href="<?= base_url('employee/delete_group/') . $g['id']; ?>" class="badge badge-danger delete">Delete</a>
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
<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="newGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newGroupModalLabel">Tambah Golongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('employee/group'); ?>" method="post" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name_group" name="name_group" placeholder="Nama golongan" value="<?= set_value('name_group') ?>" required>

                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control money" id="tj_married" name="tj_married" placeholder="Tunjangan nikah" value="<?= set_value('tj_married') ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control money" id="meal" name="meal" placeholder="Uang makan" value="<?= set_value('meal') ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control money" id="overtime" name="overtime" placeholder="Uang lembur" value="<?= set_value('overtime') ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control money" id="alpha_cut" name="alpha_cut" placeholder="potongan" value="<?= set_value('alpha_cut') ?>" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- modal edit -->
<?php foreach ($group as $g) : ?>
    <div class="modal fade" id="editGroupModal<?= $g['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editGroupModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGroupModalLabel">Edit Golongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('employee/editGroup'); ?>" method="post" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="<?= $g['id'] ?>">
                        <input type="hidden" id="name_group_old" name="name_group_old" value="<?= $g['name_group'] ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name_group" name="name_group" placeholder="group name" value="<?= $g['name_group'] ?>" data-toggle="tooltip" data-placement="bottom" title="Group name" required>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" class="form-control money" id="tj_married" name="tj_married" placeholder="Tunjangan Married" value="<?= $g['tj_married'] ?>" data-toggle="tooltip" data-placement="bottom" title="Tunjangan nikah" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" class="form-control money" id="meal" name="meal" placeholder="Meal money" value="<?= $g['meal'] ?>" data-toggle="tooltip" data-placement="bottom" title="Meal money" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" class="form-control money" id="overtime" name="overtime" placeholder="Overtime money" value="<?= $g['overtime'] ?>" data-toggle="tooltip" data-placement="bottom" title="Overtime" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" class="form-control money" id="alpha_cut" name="alpha_cut" placeholder="Alpha cut money" value="<?= $g['alpha_cuts'] ?>" data-toggle="tooltip" data-placement="bottom" title="Alpha cut money" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php $this->load->view('templates/load/load_mask'); ?>