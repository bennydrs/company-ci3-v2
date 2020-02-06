<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->userdata('message'); ?>
            <?= form_open_multipart('user/edit/' . $user['id']); ?>


            <input type="hidden" class="form-control" id="id" name="e_id_number" value="<?= $user['e_id_number']; ?>" readonly>


            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" required>
                    <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="birth_place" name="birth_place" value="<?= $user['birth_place'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $user['birth_date'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-control" name="sex" id="sex">
                        <option value="">Pilih jenis kelamin...</option>
                        <option <?php
                                if ($user['sex'] == 'Laki-Laki') {
                                    echo "selected";
                                }
                                ?> value="Laki-Laki">Laki-Laki</option>
                        <option <?php
                                if ($user['sex'] == 'Perempuan') {
                                    echo "selected";
                                }
                                ?> value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status" id="status">
                        <option <?php
                                if ($user['status'] == 'Menikah') {
                                    echo "selected";
                                }
                                ?> value="Menikah">Menikah</option>
                        <option <?php
                                if ($user['status'] == 'Belum Menikah') {
                                    echo "selected";
                                }
                                ?> value="Belum Menikah">Belum Menikah</option>
                    </select>
                </div>
            </div>

            <!-- <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div> -->

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">No Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_phone" name="no_phone" value="<?= $user['no_phone'] ?>" data-mask="0000-0000-0000" data-mask-reverse="true">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Address"><?= $user['address'] ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                    <select class="form-control" name="religion">
                        <option value="">Pilih agama...</option>

                        <option <?php
                                if ($user['religion'] == 'Islam') {
                                    echo "selected";
                                }
                                ?> value="Islam">Islam
                        </option>
                        <option <?php
                                if ($user['religion'] == 'Kristen') {
                                    echo "selected";
                                }
                                ?> value="Kristen">Kristen
                        </option>
                        <option <?php
                                if ($user['religion'] == 'Katolik') {
                                    echo "selected";
                                }
                                ?> value="Kristen">Katolik
                        </option>
                        <option <?php
                                if ($user['religion'] == 'Buddha') {
                                    echo "selected";
                                }
                                ?> value="Kristen">Buddha
                        </option>
                        <option <?php
                                if ($user['religion'] == 'Katolik') {
                                    echo "selected";
                                }
                                ?> value="Kristen">Katolik
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">No NPWP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_npwp" name="no_npwp" data-mask="00.000.000.0-000.000" data-mask-reverse="true" value="<?= $user['no_npwp'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-10">
                    <select class="form-control" name="position">
                        <option value="">Pilih Jabatan...</option>
                        <?php foreach ($position as $p) : ?>
                            <?php if ($p['id_position'] == $user['position_id']) : ?>
                                <option value="<?= $p['id_position']; ?>" selected><?= $p['name_position']; ?></option>
                            <?php else : ?>
                                <option value="<?= $p['id_position']; ?>"><?= $p['name_position']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Golongan</label>
                <div class="col-sm-10">
                    <select class="form-control" name="group">
                        <option value="">Pilih golongan...</option>
                        <?php foreach ($group as $p) : ?>
                            <?php if ($p['id'] == $user['group_id']) : ?>
                                <option value="<?= $p['id']; ?>" selected><?= $p['name_group']; ?></option>
                            <?php else : ?>
                                <option value="<?= $p['id']; ?>"><?= $p['name_group']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('group', '<small class="text-danger">', '</small>'); ?>
                    <div class="invalid-feedback">
                        Golongan harus diisi!
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Pendidikan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="academic" name="academic" value="<?= $user['academic'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col sm 3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" name="image" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button class="btn btn-success">Ubah</button>
                    <a href="<?= base_url('employee') ?>" class="btn btn-warning">Batal</a>
                </div>
            </div>

            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->load->view('templates/load/load_mask'); ?>