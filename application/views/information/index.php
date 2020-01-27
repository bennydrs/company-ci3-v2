<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newInfoModal">Add Information</a>
    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col">Title</th>
                <th scope="col">date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($information as $inf) : ?>
                <tr>
                    <th scope="row"><?= $i;  ?></th>
                    <td><?= $inf['title'] ?></td>
                    <td><?= $inf['date_created'] ?></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#detailInfoModal<?= $inf['id']; ?>" class="badge badge-warning">Detail</a>
                        <a href="" data-toggle="modal" data-target="#editInfoModal<?= $inf['id']; ?>" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('information/delete/') . $inf['id']; ?>" class="badge badge-danger delete">Delete</a>
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

<!-- Modal Add -->
<div class="modal fade" id="newInfoModal" tabindex="-1" role="dialog" aria-labelledby="newInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newInfoModalLabel">Add New Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('information'); ?>" method="post" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" required>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <textarea name="info" class="form-control" id="info" rows="10" placeholder="information" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Modal Edit -->
<?php foreach ($information as $inf) : ?>
    <div class="modal fade" id="editInfoModal<?= $inf['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInfoModalLabel">Add Edit Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('information/edit'); ?>" method="post" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="title" name="id" value="<?= $inf['id']; ?>">
                            <input type="text" class="form-control" id="title" name="title" value="<?= $inf['title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <textarea name="info" class="form-control" id="info" rows="10" placeholder="information" required><?= $inf['info']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end modal -->

<!-- Modal Detail -->
<?php foreach ($information as $inf) : ?>
    <div class="modal fade" id="detailInfoModal<?= $inf['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailInfoModalLabel"><?= $inf['title']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $inf['info']; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary save">Edit</button> -->
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end modal -->