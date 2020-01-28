<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Gaji</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm">
                                <form action="<?= base_url('employee/salary'); ?>" method="get">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="input-group mb-3">
                                                <input type="month" name="month" id="date" class="form-control" value="<?= date('Y-m'); ?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" name="show" type="submit" id="button-addon2">Tampilkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <div class="alert alert-info">
                                    <span>Bulan :</span>
                                    <?php if ($date == "") {
                                        echo "pilih bulan untuk menampilkan gaji";
                                    } else {
                                        echo tgl_art($date);
                                    }
                                    ?>
                                </div>

                                <?php if (isset($_GET['show'])) : ?>
                                    <?php if ($salary_n == 0) : ?>
                                        <div class="alert alert-warning">Data gaji bulan <?= tgl_art($date) ?> belum tersedia</div>
                                    <?php else : ?>
                                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Position</th>
                                                    <th scope="col">Group</th>
                                                    <th scope="col">Salary</th>
                                                    <th scope="col">Tj. S/I</th>
                                                    <th scope="col">Lembur</th>
                                                    <th scope="col">Pendapatan</th>
                                                    <th scope="col">Potongan</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($salary_r as $a) :

                                                    if ($a['status'] == "Married") {
                                                        $tj_husbend = "150000";
                                                    } else {
                                                        $tj_husbend = "0";
                                                    }

                                                    $total_absen = $a['present'] + $a['permission'] + $a['alpha'];
                                                    $total_lembur = $a['overtime'] * $a['lembur'];

                                                    $pendapatan = $a['salary'] + $a['tj_married'] + $total_lembur;

                                                    $alpha_cut = $a['alpha'] * $a['alpha_cuts'];
                                                    // $permission_cut = $a['permission'] * $a['permission_cuts'];
                                                    // $total_cuts = $alpha_cut;
                                                    $total = $pendapatan - $alpha_cut
                                                    // $ab = $a['present'] + $a['permission'] + $a['alpha'];
                                                ?>

                                                    <?php if ($total_absen > 24) : ?>

                                                        <tr>
                                                            <th scope="row"><?= $i;  ?></th>
                                                            <td><?= $a['e_id_number'] ?></td>
                                                            <td><?= $a['name'] ?></td>
                                                            <td><?= $a['name_position'] ?></td>
                                                            <td><?= $a['name_group'] ?></td>
                                                            <td><?= rupiah($a['salary']) ?></td>
                                                            <td><?= rupiah($a['tj_married']) ?></td>
                                                            <td><?= rupiah($total_lembur); ?></td>
                                                            <td><?= rupiah($pendapatan); ?></td>
                                                            <td><?= rupiah($alpha_cut); ?></td>
                                                            <td class="text-dark"><?= rupiah($total); ?></td>

                                                            <td>
                                                                <a href="<?= base_url('employee/print_Salary/') . $a['id']; ?>" class="badge badge-primary" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="fas fa-fw fa-print"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>

                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->