<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <?php echo $this->session->flashdata('gagal'); ?>



    <div class="row">
        <div class="col-lg">
            <!-- <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>');  ?> -->
            <a href="<?= base_url('employee/addemployee'); ?>" class="btn btn-primary mb-3">Tambah Pegawai</a>
            <a href="<?= base_url('employee/export_pegawai_pdf'); ?> " class="btn btn-warning mb-3" target="_blank">Export</a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- <table class="table table-hover display" id="mytable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($employee as $e) : ?>
                                    <tr>
                                        <th scope="row"><?= $i;  ?></th>
                                        <td><?= $e['e_id_number'] ?></td>
                                        <td><?= $e['name'] ?></td>
                                        <td><?= $e['name_position'] ?></td>
                                        <td><?= $e['email'] ?></td>
                                        <td>
                                            <a href="<?= base_url('employee/detail/') . $e['e_id_number']; ?>" class="badge badge-warning">Detail</a>
                                            <a href="<?= base_url('employee/edit/') . $e['id']; ?>" class="badge badge-success">Edit</a>
                                            <a href="<?= base_url('employee/deleteEmployee/') . $e['user_id']; ?>" class="badge badge-danger delete">Delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table> -->

                        <table class="table table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    $(document).ready(function() {
        // Setup datatables
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var table = $("#mytable").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('input.DT', function() {
                        api.search(this.value).draw();
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?php echo base_url('employee/get_employee_json') ?>",
                "type": "POST"
            },
            columns: [{
                    "data": "id"
                },
                {
                    "data": "e_id_number"
                },
                {
                    "data": "name"
                },
                {
                    "data": "name_position"
                },
                {
                    "data": "email"
                },
                {
                    "data": "sex"
                },
                {
                    "data": "action"
                }
            ],
            order: [
                [1, 'asc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }

        });
        // end setup datatables

        // get delete Records
        $('#mytable').on('click', '.delete', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal({
                title: 'Are you sure?',
                text: "One delete, you will not be able to recover this file",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete Data!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })

        });
        // End delete Records
    });
</script>