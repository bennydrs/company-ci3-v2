<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->userdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 1000px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $employee['image']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title text-dark"><?= $employee['name']; ?></h4>
                    <p><?= $employee['name_position']; ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">NIP</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $employee['e_id_number']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Email</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $employee['email']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Tempat Tanggal Lahir</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $employee['birth_place']; ?> , <?= date('d F Y', strtotime($employee['birth_date'])); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Usia</label>
                        </div>
                        <div class="col-md-8">
                            <?php
                            // tanggal lahir
                            $tanggal = new DateTime($employee['birth_date']);
                            // tanggal hari ini
                            $today = new DateTime('today');
                            // tahun
                            $y = $today->diff($tanggal)->y;
                            // bulan
                            $m = $today->diff($tanggal)->m;
                            // hari
                            $d = $today->diff($tanggal)->d;
                            ?>
                            <p><?= $y . " tahun " . $m . " bulan " . $d . " hari"; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $employee['sex']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">No Telepon</label>
                        </div>
                        <div class="col-md-8">
                            <p>
                                <?php $phone = $employee['no_phone'];
                                $format = preg_replace("/(\w{4})(\w{4})(\w{4})/i", "$1-$2-$3", $phone);
                                // $format = substr($phone, 0, 4) . '-' . substr($phone, 0, 4) . '-' . substr($phone, 0, 4);
                                echo $format;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Alamat</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $employee['address']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Agama</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $employee['religion']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">No NPWP</label>
                        </div>
                        <div class="col-md-8">
                            <p>
                                <?php $npwp = $employee['no_npwp'];
                                $no_npwp = preg_replace("/(\w{2})(\w{3})(\w{3})(\w{1})(\w{3})(\w{3})/i", "$1.$2.$3.$4-$5.$6", $npwp);
                                echo $no_npwp;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Golongan</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $employee['name_group']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Pendidikan</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $employee['academic']; ?></p>
                        </div>
                    </div>



                    <p class="card-text"><small class="text-muted">Masuk sejak <?= date('d F Y', strtotime($employee['date_join'])) ?></small></p>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->