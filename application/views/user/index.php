<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->userdata('message'); ?>
        </div>
    </div>

    <div class="card shadow mb-3" style="max-width: 1000px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title text-dark"><?= $user['name']; ?></h4>
                    <p><?= $user['name_position']; ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">NIP</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $user['e_id_number']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Email</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $user['email']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Tempat Tanggal Lahir</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $user['birth_place']; ?> , <?= date('d F Y', strtotime($user['birth_date'])); ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Jenis Kelamin</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $user['sex']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">No Telepon</label>
                        </div>
                        <div class="col-md-8">
                            <p>
                                <?php $phone = $user['no_phone'];
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
                            <p><?= $user['address']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Agama</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $user['religion']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">No NPWP</label>
                        </div>
                        <div class="col-md-8">
                            <p>
                                <?php $npwp = $user['no_npwp'];
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
                            <p><?= $user['name_group']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="text-dark">Pendidikan</label>
                        </div>
                        <div class="col-md-8">
                            <p><?= $user['academic']; ?></p>
                        </div>
                    </div>
                    <p class="card-text"><small class="text-muted">Masuk Sejak <?= date('d F Y', strtotime($user['date_join'])) ?></small></p>

                    <a href="<?= base_url('employee/edit/'.$user['e_id_number']) ?>" class="btn btn-success btn-md">Ubah Profil</a>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->