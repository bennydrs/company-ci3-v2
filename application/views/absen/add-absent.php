<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <form action="<?= base_url('employee/addAbsent'); ?>" method="get">
        <div class="row">
            <div class="col-auto">
                <div class="input-group mb-3">
                    <input type="month" name="month" id="date" class="form-control" value="<?= date('Y-m'); ?>">
                    <div class="input-group-append">
                        <button type="submit" name="generate" class="btn btn-success">Generate Form</button>
                    </div>
                </div>
            </div>


        </div>

    </form>

    <div class="alert alert-info">
        <span>Bulan :</span>
        <?php if ($date == "") {
            echo "pilih bulan untuk menampilkan absen";
        } else {
            echo tgl_art($date);
        }
        ?>
    </div>


    <?php if (isset($_GET['generate'])) : ?>

        <?php if ($absent_n == 0) : ?>
            <div class="alert alert-danger">
                <span>Data absen bulan <?= tgl_art($date) ?> sudah di generate</span>
            </div>

        <?php else : ?>
            <form action="<?= base_url('employee/saveAbsent'); ?>" method="post">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">NIP</th>
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">Jabatan</th>
                            <th scope="col" class="text-center">Hadir</th>
                            <th scope="col" class="text-center">Izin</th>
                            <th scope="col" class="text-center">Alpha</th>
                            <th scope="col" class="text-center">Total Absen</th>
                            <th scope="col" class="text-center">Lembur (m)</th>
                        </tr>

                    </thead>
                    <tbody>

                        <?php $i = 1; ?>
                        <?php foreach ($absent_r as $a) : ?>

                            <tr>
                                <input type="hidden" name="month[]" value="<?= $date; ?>">
                                <input type="hidden" name="id[]" value="<?= $a['e_id_number']; ?>">
                                <td><?= $i;  ?></td>
                                <td> <?= $a['e_id_number']; ?></td>
                                <td> <?= $a['name']; ?></td>
                                <td> <?= $a['name_position']; ?></td>
                                <td><input type="number" class="form-control" max="31" id="present" name="present[]" value="0"></td>
                                <td><input type="number" class="form-control" max="31" id="permission" name="permission[]" value="0"></td>
                                <td><input type="number" class="form-control" max="31" id="alpha" name="alpha[]" value="0"></td>
                                <td><input type="number" class="form-control readonly" max="31" id="total" name="total[]" value="0"></td>
                                <td><input type="number" class="form-control" max="2400" id="lembur" name="lembur[]" value="0"></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>

                    <?php if ($absent_n > 0) : ?>
                        <tr>
                            <td colspan="9">
                                <input type="submit" class="btn btn-primary" value="Simpan" name="save">
                            </td>
                        </tr>
                    <?php endif; ?>

                </table>
            </form>
        <?php endif; ?>
    <?php endif; ?>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->