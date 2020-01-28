<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <div class="alert alert-info">
        <span>Month : </span> <?= tgl_art($date); ?>
    </div>
    <form action="<?= base_url('employee/prosesEditAbsent'); ?>" method="post" class="needs-validation" novalidate>
        <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Hadir</th>
                    <th scope="col">Izin</th>
                    <th scope="col">Alpha</th>
                    <th scope="col">Total</th>
                    <th scope="col">Lembur</th>
                </tr>

            </thead>
            <tbody>

                <?php $i = 1; ?>
                <?php foreach ($absent_r as $a) : ?>

                    <tr class="count">
                        <input type="hidden" name="bulan" value="<?= $a['month']; ?>">
                        <input type="hidden" name="month[]" value="<?= $a['month']; ?>">
                        <input type="hidden" name="id[]" value="<?= $a['id']; ?>">
                        <input type="hidden" name="employee_id[]" value="<?= $a['e_id_number']; ?>">
                        <td><?= $i;  ?></td>
                        <td> <?= $a['e_id_number']; ?></td>
                        <td> <?= $a['name']; ?></td>
                        <td> <?= $a['name_position']; ?></td>
                        <td><input type="number" class="form-control" name="present[]" max="26" id="present" value="<?= $a['present']; ?>"></td>
                        <td><input type="number" class="form-control" name="permission[]" max="26" id="permission" value="<?= $a['permission']; ?>"></td>
                        <td><input type="number" class="form-control" name="alpha[]" max="26" id="alpha" value="<?= $a['alpha']; ?>"></td>
                        <?php $total = $a['present'] + $a['permission'] + $a['alpha'] ?>
                        <td><input type="number" class="form-control readonly" name="total[]" max="26" value="<?= $total; ?>" id="total">
                            <div class="invalid-feedback">
                                Please check data absent. Total absent dont more than 31
                            </div>
                        </td>
                        <td><input type="number" class="form-control" name="lembur[]" max="2400" id="lembur" value="<?= $a['lembur']; ?>"></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
            <tr>
                <td colspan="9">
                    <input type="submit" class="btn btn-success" value="Simpan Edit" name="save">
                </td>
            </tr>

        </table>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->