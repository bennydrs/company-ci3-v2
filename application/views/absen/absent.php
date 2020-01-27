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
        <div class="col-sm">
            <form action="<?= base_url('employee/absent'); ?>" method="get">
                <div class="row">
                    <div class="col-auto">
                        <div class="input-group mb-3">
                            <input type="month" name="month" id="date" class="form-control" value="<?= date('Y-m'); ?>">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit" id="button-addon2">Tampilkan</button>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="col-auto">
                <a href="<?= base_url('employee/addAbsent'); ?>" class="btn btn-primary">Tambah Absen</a>
            </div>
        </div>
        <div class="alert alert-info">
            <span>Bulan :</span>
            <?php if ($month == "") {
                echo "pilih bulan untuk melihat data absen";
            } else {

                echo tgl_art($month);
            }
            ?>
        </div>

        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Hadir</th>
                    <th scope="col">Izin</th>
                    <th scope="col">Alpha</th>
                    <th scope="col">Total</th>
                    <th scope="col">Lembur</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($absent_r as $a) : ?>
                    <tr>
                        <th scope="row"><?= $i;  ?></th>
                        <td><?= $a['employee_id'] ?></td>
                        <td><?= $a['name'] ?></td>
                        <td><?= $a['name_position'] ?></td>
                        <td class="text-center"><?= $a['present'] ?></td>
                        <td class="text-center"><?= $a['permission'] ?></td>
                        <td class="text-center"><?= $a['alpha'] ?></td>
                        <td class="text-dark text-center"><?= $a['total_absent'] ?></td>
                        <td class="text-center"><?= $a['lembur'] ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
            <?php if ($absent_n > 0) : ?>
                <tr>
                    <td colspan="9">
                        <a href="<?= base_url('employee/editAbsent/') . $month; ?>" class="btn btn-success">Edit Data Absen</a>
                    </td>
                </tr>
            <?php else : ?>
                <tr>
                    <td colspan="9" class="text-center">
                        Untuk menampilkan data absen, silahkan pilih bulan dan tahun!
                    </td>
                </tr>
            <?php endif; ?>

        </table>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->