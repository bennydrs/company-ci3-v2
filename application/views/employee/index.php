<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>



    <div class="row">
        <div class="col-lg">
            <!-- <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>');  ?> -->
            <a href="<?= base_url('employee/addemployee'); ?>" class="btn btn-primary mb-3">Tambah Pegawai</a>
            <a href="<?= base_url('employee/printPDF'); ?> " class="btn btn-warning mb-3" target="_blank">Cetak</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover display" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($employee as $e) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $e['e_id_number'] ?></td>
                                        <td><?= $e['name'] ?></td>
                                        <td><?= $e['name_position'] ?></td>
                                        <td><?= $e['email'] ?></td>
                                        <td>
                                            <a href="<?= base_url('employee/detail/') . $e['e_id_number']; ?>" class="badge badge-warning">Detail</a>
                                            <a href="<?= base_url('employee/edit/') . $e['id']; ?>" class="badge badge-success">Edit</a>
                                            <a href="<?= base_url('employee/deleteEmployee/') . $e['user_id']; ?>" class="badge badge-danger delete">Delete</a>
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