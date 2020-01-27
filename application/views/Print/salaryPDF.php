<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salary</title>
</head>

<body>
    <!-- <table border="1" cellspacing="0">
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
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($salary as $a) :

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
                                                                                                            </tr>
                                                                                                            <?php $i++; ?>

                                                            <?php endif; ?>
            <?php endforeach; ?>
    </table> -->

    <h1 class="center">SLIP GAJI</h1>



    <?php
    if ($salary['status'] == "Married") {
        $tj_husbend = "150000";
    } else {
        $tj_husbend = "0";
    }

    $total_lembur = $salary['overtime'] * $salary['lembur'];

    $pendapatan = $salary['salary'] + $salary['tj_married'] + $total_lembur;

    $alpha_cut = $salary['alpha'] * $salary['alpha_cuts'];
    // $permission_cut = $a['permission'] * $a['permission_cuts'];
    // $total_cuts = $alpha_cut;
    $total = $pendapatan - $alpha_cut
    // $ab = $a['present'] + $a['permission'] + $a['alpha'];
    ?>


    <table>

        <tr>
            <td>Bulan</td>
            <td> : <?= tgl_art($salary['month']) ?></td>
        </tr>
        <tr>
            <td>ID</td>
            <td> : <?= $salary['e_id_number'] ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td> : <?= $salary['name'] ?></td>
        </tr>
        <tr>
            <td>Position</td>
            <td> : <?= $salary['name_position'] ?></td>
        </tr>
        <tr>
            <td>Group</td>
            <td> : <?= $salary['name_group'] ?></td>
        </tr>
        <tr>
            <td>Gaji</td>
            <td> : <?= rupiah($salary['salary']) ?></td>
        </tr>
        <tr>
            <td>Tunjangan nikah</td>
            <td> : <?= rupiah($salary['tj_married']) ?></td>
        </tr>
        <tr>
            <td>Lembur</td>
            <td> : <?= rupiah($total_lembur); ?></td>
        </tr>
        <tr>
            <td>Pendapatan</td>
            <td> : <?= rupiah($pendapatan); ?></td>
        </tr>
        <tr>
            <td>Potongan</td>
            <td> : <?= rupiah($alpha_cut); ?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td> : <?= rupiah($total); ?></td>
        </tr>

    </table>
</body>

</html>