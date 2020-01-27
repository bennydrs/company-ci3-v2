<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- <?php

            $mytime = strtotime("9/2019");
            $dayinmonth = cal_days_in_month(CAL_GREGORIAN, 9, 2019);
            $work = 0;

            while ($dayinmonth > 0) {
                $day = date("D", $mytime);
                if ($day != "Sun")
                    $work++;

                $dayinmonth--;
                $mytime += 86400;
            }
            echo "$work";

            ?> -->


    <div class="row">
        <div class="col-sm">
            <form action="<?= base_url('employee/salary'); ?>" method="get">
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <input type="month" name="month" id="month" class="form-control" value="<?= date('Y-m'); ?>">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success">Show</button>
                    </div>
                    <!-- <div class="col-auto">
                        <a href="<?= base_url('employee/addAbsent'); ?>" class="btn btn-primary">Add Absent</a>
                    </div> -->
                </div>
            </form>


            <div class="alert alert-info">
                <span>Month :</span>
                <?php if ($date == "") {
                    echo "select month to see salary";
                } else {
                    echo tgl_art($date);
                }
                ?>
            </div>

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

                        $total_lembur = $a['overtime'] * $a['lembur'];

                        $pendapatan = $a['salary'] + $a['tj_married'] + $total_lembur;

                        $alpha_cut = $a['alpha'] * $a['alpha_cuts'];
                        // $permission_cut = $a['permission'] * $a['permission_cuts'];
                        // $total_cuts = $alpha_cut;
                        $total = $pendapatan - $alpha_cut
                        // $ab = $a['present'] + $a['permission'] + $a['alpha'];
                        ?>

                        <?php if ($a['total_absent'] > 24) : ?>

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
                    <?php if ($salary_n > 0) : ?>
                        <tr>
                            <td colspan="9">
                                <a href="" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    <?php else : ?>
                        <tr>
                            <td colspan="9" class="text-center">
                                To show data absent, please choose month and year!
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