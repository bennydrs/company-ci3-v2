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
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Absensi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

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

                            <table class="table table-hover absen" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Hadir</th>
                                        <th scope="col">Izin</th>
                                        <th scope="col">Sakit</th>
                                        <th scope="col">Alpha</th>
                                        <th scope="col">Total Absen</th>
                                        <th scope="col">Lembur (m)</th>
                                        <th scope="col">Lembur (j)</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($absent_r as $a) : ?>
                                        <tr>
                                            <td scope="row"><?= $i;  ?></td>
                                            <td><?= $a['employee_id'] ?></td>
                                            <td><?= $a['name'] ?></td>
                                            <td><?= $a['name_position'] ?></td>
                                            <td class="text-center p">
                                                <a href="#" class="present" data-type="text" data-pk="<?= $a['id'] ?>" data-url="<?= base_url('employee/edit_absen/' . $a['id']) ?>" data-name="present" data-title="Enter present"><?= $a['present'] ?></a>
                                            </td>
                                            <td class="text-center" id="izin"><?= $a['permission'] ?></td>
                                            <td class="text-center" id="sakit"><?= $a['sick'] ?></td>
                                            <td class="text-center"><?= $a['alpha'] ?></td>
                                            <td class="text-dark text-center">
                                                <div id="jumlah"></div>
                                            </td>
                                            <td class="text-center"><?= $a['lembur'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                $menit = $a['lembur'];
                                                // $jam = intdiv($menit, 60) . ' jam ' . ($menit % 60) . ' menit';
                                                $h = round($menit / 60, 1);
                                                echo $h;
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="" class="badge badge-success" data-toggle="modal" data-target="#exampleModal<?= $a['id'] ?>">Edit</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php if ($absent_n > 0) : ?>
                                    <tr>
                                        <td colspan="12">
                                            <a href="<?= base_url('employee/editAbsent/') . $month; ?>" class="btn btn-success">Edit Data Absen</a>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="12" class="text-center">
                                            Untuk menampilkan data absen, silahkan pilih bulan dan tahun!
                                        </td>
                                    </tr>
                                <?php endif; ?>

                            </table>
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

<!-- Modal -->
<?php foreach ($absent_r as $a) : ?>
    <div class="modal fade" id="exampleModal<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Absen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('employee/editAbsentById/' . $a['id']) ?>" method="post">
                    <div class="modal-body" id="s">
                        <input type="hidden" name="month" value="<?= $a['month']; ?>">

                        <div class="form-group row">
                            <label for="present" class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" name="employee_id" class="form-control" value="<?= $a['employee_id']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" value="<?= $a['name']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <input type="text" name="position" class="form-control" id="position" value="<?= $a['name_position']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="present" class="col-sm-3 col-form-label">Hadir</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="present" max="26" id="present" value="<?= $a['present']; ?>" require>
                                <div class="invalid-feedback">
                                    The present field is required!
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="permission" class="col-sm-3 col-form-label">Izin</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="permission" max="26" id="permission" value="<?= $a['permission']; ?>">
                                <div class="invalid-feedback">
                                    The permission field is required!
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sick" class="col-sm-3 col-form-label">Sakit</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="sick" max="26" id="sick" value="<?= $a['sick']; ?>">
                                <div class="invalid-feedback">
                                    The sick field is required!
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alpha" class="col-sm-3 col-form-label">Alpha</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="alpha" max="26" id="alpha" value="<?= $a['alpha']; ?>">
                                <div class="invalid-feedback">
                                    The alpha field is required!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="total" class="col-sm-3 col-form-label">Total</label>
                            <div class="col-sm-9">
                                <?php $total = $a['present'] + $a['permission'] + $a['alpha'] ?>
                                <input type="number" class="form-control readonly" name="total" max="26" value="<?= $total; ?>" id="total">
                                <div class="invalid-feedback">
                                    Please check data absent. Total absent dont more than 31
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lembur" class="col-sm-3 col-form-label">Lembur</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="lembur" max="2400" id="lembur" value="<?= $a['lembur']; ?>">
                                <div class="invalid-feedback">
                                    The lembur field is required!
                                </div>
                            </div>
                        </div>
                        <!-- <input type="submit" class="btn btn-success" value="Simpan Edit" name="save"> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    // editable
    $(document).ready(function() {
        $('.present').editable({
            validate: function(value) {
                if ($.trim(value) == '') {
                    return 'This field is required';
                }
                var regex = /^[0-9]+$/;
                if (!regex.test(value)) {
                    return 'Numbers only!';
                }

            }
        });
    });

    // auto count
    $(document).ready(function() {
        $('.absen tbody tr').each(function() {
            var pct = parseInt($('.p', this).text());

            var winy = parseInt($('#izin', this).text());
            // var losy = parseInt($('.data-l', this).text(), 10);

            var jumlah = (pct) + (winy);
            // $('.data-pct', this).text(pkt);
            $('#jumlah', this).append(jumlah)
        });
    })
</script>

<script>
    // <!-- count absent realtime -->
    (function() {
        "use strict";

        $("form").on("change", "input", function() {
            var row = $(this).closest("#s");
            var present = parseFloat(row.find("#present").val());
            var permission = parseFloat(row.find("#permission").val());
            var sick = parseFloat(row.find("#sick").val());
            var alpha = parseFloat(row.find("#alpha").val());
            var total = present + permission + sick + alpha;
            row.find("#total").val(isNaN(total) ? "" : total);
        });
    })();

    $(".readonly").on('keydown paste', function(e) {
        e.preventDefault();
    });
</script>