<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <a href="<?= base_url('info/add') ?>" class="btn btn-primary mb-3">Buat Informasi</a>
    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi informasi</th>
                <th scope="col">Penulis</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($information as $inf) : ?>
                <tr>
                    <th scope="row"><?= $i;  ?></th>
                    <td><?= $inf['title'] ?></td>
                    <td><?= word_limiter($inf['content'], 5); ?></td>
                    <td><?= $inf['name']; ?></td>
                    <td><?= date('d F Y h:m:s', strtotime($inf['created_at'])) ?></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#detailInfoModal<?= $inf['id']; ?>" class="badge badge-warning">Detail</a>
                        <a href="<?= base_url('info/edit/') . $inf['id'] ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('info/delete/') . $inf['id']; ?>" class="badge badge-danger delete">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Detail -->
<?php foreach ($information as $inf) : ?>
    <div class="modal fade" id="detailInfoModal<?= $inf['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailInfoModalLabel"><?= $inf['title']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $inf['content']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end modal -->