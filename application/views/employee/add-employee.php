<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data Pegawai</h6>
                </div>
                <div class="card-body">

                    <?= form_open_multipart('employee/addemployee'); ?>

                    <div class="form-group row">
                        <label for="e_id_number" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="e_id_number" name="e_id_number" placeholder="Masukkan nip" value="<?= set_value('e_id_number') ?>">
                            <?php echo form_error('e_id_number', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="<?= set_value('name') ?>">
                            <?php echo form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth_place" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="Masukkan tempat lahir" value="<?= set_value('birth_place') ?>">
                            <?php echo form_error('birth_place', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth_date" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Masukkan tanggal lahir" value="<?= set_value('birth_date') ?>">
                            <?php echo form_error('birth_date', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sex" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="sex" id="sex">
                                <option value="">Pilih jenis kelamin...</option>
                                <option value="Laki-Laki" <?= set_select('sex', 'Laki-Laki'); ?>>Laki-Laki</option>
                                <option value="Perempuan" <?= set_select('sex', 'Perempuan'); ?>>Perempuan</option>
                            </select>
                            <?php echo form_error('sex', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status">
                                <option value="">Pilih Status...</option>
                                <option value="Menikah" <?= set_select('status', 'Menikah'); ?>>Menikah</option>
                                <option value="Belum Menikah" <?= set_select('status', 'Belum Menikah'); ?>>Belum Menikah</option>
                            </select>
                            <?php echo form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
                            <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_phone" class="col-sm-2 col-form-label">No Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_phone" name="no_phone" placeholder="Masukkan no phone" data-mask="0000-0000-0000" data-mask-reverse="true" value="<?= set_value('no_phone') ?>">
                            <?php echo form_error('no_phone', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat"><?= set_value('address') ?></textarea>
                            <?php echo form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="religion" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="religion" id="religion">
                                <option value="">Pilih Agama...</option>
                                <option value="Islam" <?= set_select('religion', 'Islam'); ?>>Islam</option>
                                <option value="Kristen" <?= set_select('religion', 'Kristen'); ?>>Kristen</option>
                                <option value="Katolik" <?= set_select('religion', 'Katolik'); ?>>Katolik</option>
                                <option value="Budha" <?= set_select('religion', 'Buddha'); ?>>Buddha</option>
                                <option value="Hindu" <?= set_select('religion', 'Hindu'); ?>>Hindu</option>
                                <option value="Kong Hu Cu" <?= set_select('religion', 'Kong Hu Cu'); ?>>Kong Hu Cu</option>
                            </select>
                            <?php echo form_error('religion', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_npwp" class="col-sm-2 col-form-label">No NPWP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_npwp" name="no_npwp" placeholder="Masukkan No NPWP" data-mask="00.000.000.0-000.000" data-mask-reverse="true" value="<?= set_value('no_npwp') ?>">
                            <?php echo form_error('no_npwp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="position" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="position" id="position">
                                <option value="">Pilih jabatan...</option>
                                <?php foreach ($position as $p) : ?>
                                    <option value="<?= $p['id']; ?>" <?= set_select('position', $p['id']); ?>><?= $p['name_position']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('position', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="group" class="col-sm-2 col-form-label">Golongan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="group" id="group">
                                <option value="">Pilih golongan...</option>
                                <?php foreach ($group as $g) : ?>
                                    <option value="<?= $g['id']; ?>" <?= set_select('group', $g['id']); ?>><?= $g['name_group']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('group', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="academic" class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="academic" name="academic" placeholder="Masukkan pendidikan" value="<?= set_value('academic') ?>">
                            <?php echo form_error('academic', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('employee') ?>" class="btn btn-warning">Batal</a>
                        </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->