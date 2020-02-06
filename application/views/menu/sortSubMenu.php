<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Mengatur Urutan Sub Menu</h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <hr>
    <span>Drag and Drop the table rows and <button class="btn btn-info btn-sm" onclick="window.location.reload()">REFRESH</button></span>
    <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-warning btn-sm">Kembali</a>

    <?php
    $queryMenu = "SELECT * FROM `user_menu`
                ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Urutan</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody id="content">

                                <?php foreach ($submenu as $sm) : ?>
                                    <tr class="row1" data-id="<?= $sm['id'] ?>">
                                        <td>
                                            <div style="color:rgb(124,77,255); text-align:center; font-size: 20px; cursor: pointer;" title="change display order">
                                                <i class="fa fa-fw fa-grip-lines"></i>
                                            </div>
                                        </td>
                                        <td><?= $sm['order_by'] ?></td>
                                        <td><?= $sm['title'] ?></td>
                                        <td><?= $sm['menu'] ?></td>
                                    </tr>
                                <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

</div>
<script>
    $(function() {
        $("#DataTable").DataTable();

        $("#content").sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {
            var order = [];
            $('tr.row1').each(function(index, element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index + 1
                });
            });

            $.ajax({
                type: 'POST',
                dataType: "json",
                url: "<?php echo base_url('menu/updateSortMenu'); ?>",
                data: {
                    order: order
                },
                success: function(response) {
                    if (response.status == "success") {
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            });
        }
    });
</script>